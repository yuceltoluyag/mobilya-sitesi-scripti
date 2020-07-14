<?php

define('guvenlik', true);
require_once 'ust.php';
$id = $_GET['id'];

if (isset($id)) {
    $u = reklamgetir($id);
    foreach ($u as $reklamres);
    $eskiresim = '../'.$reklamres['reklam_resim'];

    $sil = $db->prepare('DELETE FROM reklamlar WHERE reklam_id=:sid');
    $silko = $sil->execute([':sid' => $id]);

    if ($silko) {
        unlink($eskiresim);
        echo 'ok';
    } else {
        echo 'hata';
    }
} else {
    echo 'bos';
}
