# PHPLogger
PHP Kayıt Tutucu &amp; PHP Logger

PHP Kayıt Tutucu basit geliştirilmeye müsait bir sistem.

**Projeye dahil ettikten sonra kullanım**

```
<?php

require 'KayitTutucu.php';
KayitTutucu::debug("a.txt","Hata ayiklaniyor");
KayitTutucu::tehlikeli("a.txt","Tehlikeli bir durum olustu");
KayitTutucu::bilgi("a.txt","Enteresan bir durum olustu");
KayitTutucu::hata("a.txt","Bir hata meydana geldi");
KayitTutucu::uyari("a.txt","Bir uyari meydana geldi");
KayitTutucu::bulunamadi("a.txt","Bu dosya bulunamadi");

?>
```
