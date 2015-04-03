<?php

class OnBellek {
    
    // On bellek mekanizmasi bu klasorler URL'ler icin calismasin.
    var $onbellekYapma = array("yonetim.php", "js", "resimler");
    
    // Genel ayarlar burada yapiliyor. Varsayilan olarak true deger doner.
    var $onbellekDurumu = true; // bellekleme islemi varsayilan olarak true yani aktif.
    var $onbellekDizini = "./bellekleme"; # bellekleme dizini. degistirilebilirlik ozelligi olabilir.
    var $onbellekZamani = 60; # bu kadar saniyede bir yap diyoruz. kontrol islemi var.
    var $onbellekDosyasi;
    var $onbellekDosyasiAdi;
    var $onbellekKayit;
    var $onbellekKayitDosyasi;
    
    function __construct(){
        $this->onbellekDosyasi = base64_encode($_SERVER['REQUEST_URI']);
        $this->onbellekDosyasiAdi = $this->onbellekDizini . '/' . $this->onbellekDosyasi . '.txt';
        $this->onbellekKayitDosyasi = $this->onbellekDizini . '/kayit.txt';
        if(!is_dir($this->onbellekDizini))
        {
            mkdir($this->onbellekDizini, 0755);
        }
        if(file_exists($this->onbellekKayitDosyasi))
        {
            $this->onbellekKayit = unserialize(file_get_contents($this->onbellekKayitDosyasi));
        }
        else
        {
            $this->onbellekKayit = array();
        }
    }
    
    function baslat()
    {
        # array_slice dizinin belirli bir bölümünü döndürme işini görür
        # http://php.net/manual/tr/function.array-slice.php
        $konum = array_slice(explode('/', $_SERVER['REQUEST_URI']), 2);
        if(!in_array($konum[0],$this->onbellekYapma))
        {
            /*
             * filemtime dosyanın son değişiklik tarihini geri döndürdüğü için seçtim.
             * ona göre önbellek zamanı da kontrol edilecek
             * http://php.net/manual/tr/function.filemtime.php
            */
            if(file_exists($this->onbellekDosyasiAdi) &&
               time() - filemtime($this->onbellekDosyasiAdi) < $this->onbellekZamani
               && $this->onbellekKayit[$this->onbellekDosyasi] == 1)
            {
                $this->onbellekDurumu = false;
                echo file_get_contents($this->onbellekDosyasiAdi);
                exit();
            }
            else
            {
                $this->onbellekDurumu = true;
                ob_start();
            }
        }
    }
    function bitir()
    {
        if($this->onbellekDurumu)
        {
            file_put_contents($this->onbellekDosyasiAdi,ob_get_contents());
            ob_end_flush();
            $this->onbellekKayit[$this->onbellekDosyasi] = 1;
            if(file_put_contents($this->onbellekKayitDosyasi,serialize($this->onbellekKayit)))
            {
                return true;
            }
        }
    }
    function temizle($konum)
    {
        $konum = base64_encode($konum);
        $this->onbellekKayit[$konum] = 0;
        if(file_put_contents($this->onbellekKayitDosyasi, serialize($this->onbellekKayit)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function hepsini_temizle()
    {
        if(file_exists($this->onbellekKayitDosyasi))
        {
            foreach($this->onbellekKayit as $anahtar=>$deger)
            {
                $this->onbellekKayit[$anahtar] = 0;
            }
            if(file_put_contents($this->onbellekKayitDosyasi, serialize($this->onbellekKayit)))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}

?>