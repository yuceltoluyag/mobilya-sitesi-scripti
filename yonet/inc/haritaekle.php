<?php

define("guvenlik", true);
require_once '../../sistem/fonksiyon.php';

if (isset($_POST)) {


    $ayarkaydet = $db->prepare('UPDATE harita SET 
                  
                  adres			       =:adres,
                  telefon		       =:telefon,
                  email			       =:email,
                  calisma		       =:calisma,
                  lat                  =:lat,
                  lng                  =:lng,
                  ggle_api             =:ggle_api,
                  iletisim_ust             =:iletisimu,
                  iletisim_alt             =:iletisima
                              
                              WHERE id=1 	');

    $noldu = $ayarkaydet->execute(array(

        ':adres' => $_POST['adres'],
        ':telefon' => $_POST['telefon'],
        ':email' => $_POST['email'],
        ':calisma' => $_POST['calisma'],
        ':lat' => $_POST['enlem'],
        ':lng' => $_POST['boylam'],
        ':ggle_api' => $_POST['api'],
        ':iletisimu' => $_POST['iust'],
        ':iletisima' => $_POST['ialt']


    ));

} else {

    header("Location: iletisim.php");


}

if ($noldu) {

    echo 'ok';


} else {

    echo 'hata';


}

?>