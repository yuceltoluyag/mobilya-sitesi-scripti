<?php

define("guvenlik", true);
require_once '../../sistem/fonksiyon.php';


        if (isset($_POST)) {
            $durum = $_POST['sdurum'];
            $sid = $_POST['siparisid'];
            $ayarkaydet = $db->prepare('UPDATE siparisler SET s_durum=? WHERE sip_id=?');
            $noldu = $ayarkaydet->execute(array($durum, $sid));

            if ($noldu) {
                echo 'ok';
            } else {
                echo 'hata';
            }
        }else {
            echo 'bos';
        }

        ?>