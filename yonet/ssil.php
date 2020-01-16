<?php

define("guvenlik", true);
require_once 'ust.php';
$id =$_GET['id'];

if (isset($id)) {

    $u = slidergetir($id);
    foreach ($u as $slider);
    $eskiresim = '../'.$slider['slider_resim'];

    $sil = $db->prepare("DELETE FROM slider WHERE slider_id=:sid");
    $silko = $sil->execute(array(':sid' => $id));


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