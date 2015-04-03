<?php

include ("../OnBellek.php");

$onbellek = new OnBellek();

$onbellek->baslat();

echo 'Bu yeni onbellek dosyasi icin. 60 saniye sonra.';

$onbellek->bitir();

?>