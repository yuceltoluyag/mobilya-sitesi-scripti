<?php

define("guvenlik", true);
require_once 'ust.php';

if (isset($_GET['id'])) {


    $sil = $db->prepare("DELETE FROM siparisler WHERE  sip_id=:sid");
    $silko = $sil->execute(array(':sid' => $_GET['id']));


    if ($silko) {

        

        header("Location: ../yonet/siparisler.php");

    } else {
        header("Location: ../yonet/siparisler.php");
    }

} else {

    	 header("Location: ../yonet/siparisler.php");

    echo "hata";

}


?>