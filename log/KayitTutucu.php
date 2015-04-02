<?php
/*KayitTutucu sınıfı, istisnai durumlar ya da diğer tüm durumları kayıt eder. Şu an sadece dosya
 *KayıtTutucu sınıfının işlevleri KayıtTipi sabitleri ile aynı şekilde kullanılır.
 *Bu sınıf php 5.5.x ve üzeri sürümlerde çalışabilmektedir. Bu sınıf ücretsiz olarak dağıtılmıştır.
 *Dosya Adı: KayitTutucu.php
 *@author Ali GOREN <goren.ali@yandex.com>
 *@category Logger, Kayit Tutucu
 *@copyright 2015, Ali GOREN
 *@example KayitTutucu::debug("a.txt","Hata ayiklaniyor");, KayitTutucu::debug("a.txt","Tehlikeli bir durum olustu");
 *@version 1.0
 *@link http://www.talebemektep.com Unsigned Ali GOREN
 *@license http://www.opensource.org/licenses/mit-license.html MIT Lisansı
*/
include 'KayitTipi.php';

class KayitTutucu {
    public function __construct()
    {
        $this->debug($dosya,$mesaj);
        $this->tehlikeli($dosya,$mesaj);
        $this->bilgi($dosya,$mesaj);
        $this->hata($dosya,$mesaj);
        $this->uyari($dosya,$mesaj);
        $this->bulunamadi($dosya,$mesaj);
    }
    public static function debug($dosya,$mesaj)
    {
        if(file_exists($dosya))
        {
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::DEBUG.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
        else
        {
            touch($dosya);
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::DEBUG.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
    }
    public static function tehlikeli($dosya,$mesaj)
    {
        if(file_exists($dosya))
        {
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::TEHLIKELI.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
        else
        {
            touch($dosya);
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::TEHLIKELI.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
    }
    public static function bilgi($dosya,$mesaj)
    {
        if(file_exists($dosya))
        {
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::BILGI.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
        else
        {
            touch($dosya);
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::BILGI.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
    }
    public static function hata($dosya,$mesaj)
    {
        if(file_exists($dosya))
        {
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::HATA.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
        else
        {
            touch($dosya);
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::HATA.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
    }
    public static function uyari($dosya,$mesaj)
    {
        if(file_exists($dosya))
        {
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::UYARI.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
        else
        {
            touch($dosya);
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::UYARI.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
    }
    public static function bulunamadi($dosya,$mesaj)
    {
        if(file_exists($dosya))
        {
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::BULUNAMADI.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
        else
        {
            touch($dosya);
            if (($dosya_ac = fopen($dosya, "a")) !== false)
            { 
                fwrite($dosya_ac, KayitTipi::BULUNAMADI.$mesaj." -- ".TARIH . YENI_SATIR);   
                fclose($dosya_ac); 
            }
        }
    }
    public function __destruct()
    {
        
    }
}

//PHP_EOL "\n" ile aynıdır. Ancak "\n" bütün platformları desteklemeyebiliyor.
// Örneğin windows için "\r\n" yazmak gerektiğinden bunu bir standart hale getirmek gerekli.
//Bu da YENI_SATIR ile yapılabilir. (YENI_SATIR == PHP_EOL) KayitTipi.php icinde sabit şekilde tanımlıdır.
// Kullanım
/*KayitTutucu::debug("a.txt","Hata ayiklaniyor");
KayitTutucu::tehlikeli("a.txt","Tehlikeli bir durum olustu");
KayitTutucu::bilgi("a.txt","Enteresan bir durum olustu");
KayitTutucu::hata("a.txt","Bir hata meydana geldi");
KayitTutucu::uyari("a.txt","Bir uyari meydana geldi");
KayitTutucu::bulunamadi("a.txt","Bu dosya bulunamadi");*/