<?php

define('guvenlik', true);
require_once '../../sistem/fonksiyon.php';

if ($_POST) {
    $sef = sef_link($_POST['menuad']);
    $ad = $_POST['menuad'];
    $menuurl = $_POST['menuurl'];
    $menu_ust = $_POST['menu_ust'];
    $menudurum = $_POST['menudurum'];
    $menusira = $_POST['menusira'];

    if (empty($ad) || empty($menuurl) || empty($menusira)) {
        echo 'bos';
    } else {
        $ayarkaydet = $db->prepare('INSERT INTO menuler SET  menu_ad=?,menu_url=?,menu_sira=?,menu_ust=?,menu_durum=?,menu_sef=?');
        $noldu = $ayarkaydet->execute([$ad, $menuurl, $menusira, $menu_ust, $menudurum, $sef]);
        if ($noldu) {
            echo 'ok';
        } else {
            echo 'hata';
        }
    }
} else {
    header('Location:../menu.php');
}
