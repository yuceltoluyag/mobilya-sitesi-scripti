<?php

define("guvenlik", true);
require_once 'ust.php';
$id =$_GET['id'];

if (isset($id)) {

    $u = sayfagetir($id);
    foreach ($u as $sayfa);
    $eskiresim = '../'.$sayfa['sayfa_resim'];

    $sil = $db->prepare("DELETE FROM sayfalar WHERE sayfa_id=?");
    $silko = $sil->execute(array($id));


    if ($silko) {
         unlink($eskiresim);
        echo 'ok';

    } else {
        echo 'hata';
    }

} else {

    echo 'bos';


}


?>