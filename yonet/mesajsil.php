<?php

define('guvenlik', true);
require_once 'ust.php';

if (isset($_GET['id'])) {
    $sil = $db->prepare('DELETE FROM mesajlar WHERE  mesaj_id=?');
    $silko = $sil->execute([$_GET['id']]);
    if ($silko) {
        header('Location: ../yonet/mesajlar.php');
    } else {
        header('Location: ../yonet/mesajlar.php');
    }
} else {
    header('Location: ../yonet/mesajlar.php');
    echo 'hata';
}
