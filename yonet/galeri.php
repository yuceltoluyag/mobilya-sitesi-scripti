<?php

define("guvenlik", true);
require_once 'class.upload.php';
require_once 'ust.php';
require_once 'sol.php';

if (isset($_POST)) {
    $image = new Upload($_FILES['file']);
    if ($image->uploaded) {

        $image->image_convert = 'jpg';
        $image->image_resize = true;
        $image->image_x = 1260;
        $image->image_y = 720;
        $image->allowed = array('image/*');
        // upload klasörüne değişiklik yapmadan kayıt et
        $image->Process('../resimler/galeri/');
        if ($image->processed) {

            $url = substr($image->file_dst_path, 2) . $image->file_dst_name;
            $sorgu = $db->prepare('INSERT INTO galeri SET

							galeri_url=:url,
						    urun_id =:resid

								');

            $sorgu->execute(array(

                ':url' => $url,
                ':resid' => $_POST ["galeriresim"]

            ));

            if ($sorgu) {

                echo 'yüklendi';

            } else {

                echo 'hata';
            }

        } else {
            print 'Bir sorun oluştu: ' . $image->error;
        }
    }
}


?>