<?php

class OnBellek {
    
    // On bellek mekanizmasi bu klasorler URL'ler icin calismasin.
    var $onbellekYapma = array("yonetim", "js", "resimler");
    
    // Genel ayarlar burada yapiliyor. Varsayilan olarak true deger doner.
    var $onbellekDurumu = true;
    var $onbellekDizini = "./bellekleme";
    var $onbellekZamani = 10600;
    var $onbellekDosyasi;
    var $onbellekDosyasiAdi;
    var $onbellekKayit;
    var $onBellekKayitDosyasi;
    
}

?>