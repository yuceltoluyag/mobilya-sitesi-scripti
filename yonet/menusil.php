<?php

define('guvenlik', true);
require_once 'ust.php';
$id = $_GET['id'];
if (isset($id)) {
    $sil = $db->prepare('DELETE FROM menuler WHERE  menu_id=?');
    $silko = $sil->execute([$id]);

    if ($sil) {
        $parcala = $db->prepare('DELETE FROM menuler WHERE menu_ust=?');
        $behcet = $parcala->execute([$id]);
        echo 'ok';
    } else {
        echo 'hata';
    }
} else {

    //	 header("Location: ../yonet/urunler.php");

    echo 'hata';
}
