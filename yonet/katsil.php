<?php

define("guvenlik", true);
require_once 'ust.php';

if (isset($_GET['id'])) {


    $sil = $db->prepare("DELETE FROM kategoriler WHERE  kat_id=:sid");
    $silko = $sil->execute(array(':sid' => $_GET['id']));

    if ($sil){

        echo 'ok';
    }else {

        echo 'hata';
    }

    if ($silko) {

        $urunsil = $db->prepare("DELETE FROM urunler WHERE u_katid=:sid");
        $urunsil->execute(array(':sid' => $_GET['id']));

        echo 'ok';

    } else {
        echo 'bos';
    }

} else {

    //	 header("Location: ../yonet/urunler.php");

    echo "hata";

}


?>