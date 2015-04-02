<?php
/*KayitTipi sınıfı, kayıt tutucu sınıfı için kullanılan sabitleri içermektedir.
 *Kayıt tipleri birer seviyedir. Şu an için DEBUG, TEHLIKELI, BILGI, HATA, UYARI, BULUNAMADI tipleri mevcuttur.
 *Bu sınıf php 5.5.x ve üzeri sürümlerde çalışabilmektedir. Bu sınıf ücretsiz olarak dağıtılmıştır.
 *Dosya Adı: KayitTipi.php
 *@author Ali GOREN <goren.ali@yandex.com>
 *@category Logger, Kayit Tutucu
 *@copyright 2015, Ali GOREN
 *@example KayitTipi::DEBUG; $ornek = KayitTipi::DEBUG;
 *@version 1.0
 *@link http://www.talebemektep.com Unsigned Ali GOREN
 *@license http://www.opensource.org/licenses/mit-license.html MIT Lisansı
*/

// Kayıt tipleri ön ek olarak kullanılacak.
// Örnek: 06.04.2014 - DEBUG - Debug başarı ile gerçekleşti
// Örnek: 06.04.2014 - BULUNAMADI - http://site/a adresi bulunamadı

define("TARIH", date('d.m.Y H:i:s', 1375057836));
define("YENI_SATIR", PHP_EOL);

class KayitTipi {    
    const DEBUG = "DEBUG -- ";
    const TEHLIKELI = "TEHLIKELI -- ";
    const BILGI = "BILGI -- ";
    const HATA = "HATA -- ";
    const UYARI = "UYARI -- ";
    const BULUNAMADI = "BULUNAMADI -- ";
    
}

/*

echo KayitTipi::DEBUG;
echo KayitTipi::TEHLIKELI;
echo KayitTipi::BILGI;
echo KayitTipi::HATA;
echo KayitTipi::UYARI;
echo KayitTipi::BULUNAMADI;

*/