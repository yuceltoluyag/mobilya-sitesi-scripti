<?php

$y = @$_GET["islem"];

if ($y) {

    switch ($y) {

        case 'sistem':
            require_once 'ayarguncelle.php';
            break;

        case 'slidersil':
            require_once 'inc/ssil.php';
            break;

        case 'galeriekle':
            require_once 'resimler.php';
            break;

        case 'urunduzenle':
            require_once 'urunduzenle.php';
            break;

        case 'kategorisil':
            require_once 'katsil.php';
            break;

        case 'kategoriduzenle':
            require_once 'kategoriduzenle.php';
            break;

        case 'menuduzenle':
            require_once 'menuduzenle.php';
            break;


        default:
            require_once 'index.php';
            break;
    }
} else {
    echo 'Bir Hata Oluştu..';
}

?>