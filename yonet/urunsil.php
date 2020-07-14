<?php

define('guvenlik', true);
require_once 'ust.php';

$id = $_GET['id'];
if (isset($id)) {
    $u = urungetir($id);
    foreach ($u as $urunler);
    $eskiresim = '../'.$urunler['u_resim'];
    $sil = $db->prepare('DELETE FROM urunler WHERE  u_id=:sid');
    $silko = $sil->execute([':sid' => $id]);
    if ($silko) {
        unlink($eskiresim);
        $siparissil = $db->prepare('DELETE FROM siparisler WHERE s_urunid=?');
        $siparissil->execute([$id]);
    }

    $veri = $db->prepare("SELECT * FROM galeri WHERE urun_id='$id'");
    $veri->execute([]);
    $gsil = $db->prepare('DELETE FROM galeri WHERE urun_id=?');
    $gsil->execute([$id]);
    while ($cikti = $veri->fetch(PDO::FETCH_ASSOC)) {
        $galerisil = '../'.$cikti['galeri_url'];
        unlink($galerisil);
        echo 'ok';
    }
} else {

    //	 header("Location: ../yonet/urunler.php");

    echo 'bos';
}
