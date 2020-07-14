<?php

define('guvenlik', true);
require_once '../../sistem/fonksiyon.php';

if (isset($_POST)) {
    $id = $_POST['menuid'];
    $seo = sef_link($_POST['menuad']);
    $kad = $_POST['menuad'];

    $menuurl = $_POST['menuurl'];
    $menu_ust = $_POST['menu_ust'];
    $menudurum = $_POST['menudurum'];
    $menusira = $_POST['menusira'];

    if (empty($kad)) {
        echo 'bos';
    } else {
        $ayarkaydet = $db->prepare('UPDATE menuler SET menu_ad=?,menu_url=?,menu_sira=?, menu_ust=?,menu_durum=?, menu_sef=?  WHERE menu_id=?');
        $noldu = $ayarkaydet->execute([$kad, $menuurl, $menusira, $menu_ust, $menudurum, $seo, $id]);

        if ($noldu) {
            echo 'ok';
        } else {
            echo 'hata';
        }
    }
} else {
    header('Location: ../menu.php');
    exit(); // öldür.com
}
