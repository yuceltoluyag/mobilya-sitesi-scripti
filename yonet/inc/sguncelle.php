<?php

define("guvenlik", true);
$data = array();
require_once '../../sistem/fonksiyon.php';

if (isset($_POST)) {

    if ($_FILES['sresim']['size'] > 0) {

        if ($_FILES["sresim"]["type"] == "image/jpeg" || $_FILES["sresim"]["type"] == "image/png") {  //dosya tipi jpeg olsun
            $dosya_adi = $_FILES["sresim"]["name"];
            //Resimi kayıt ederken yeni bir isim oluşturalım
            $uret = array("as", "rt", "ty", "yu", "fg");
            $uzanti = substr($dosya_adi, -4, 4);
            $sayi_tut = rand(1, 10000);
            $yeni_ad = "../../resimler/" . $uret[rand(0, 4)] . $sayi_tut . $uzanti;
            $url = substr($yeni_ad, 5);
            //Dosya yeni adıyla uploadklasorune kaydedilecek
            if (move_uploaded_file($_FILES["sresim"]["tmp_name"], $yeni_ad)) {


                $id = $_POST['sliderid'];
                $u = slidergetir($id);
                foreach ($u as $slider) ;
                $eskiresim = '../../' . $slider['slider_resim'];
                $ayarkaydet = $db->prepare('UPDATE slider SET 

            slider_ad            =:sad,
            slider_ne            =:nad,
            slider_aciklama      =:nac,
            slider_link          =:slink,
            slider_sira          =:ssira,
            slider_durum         =:sidurum,
            slider_resim         =:sres

            WHERE slider_id =:sid');

                $noldu = $ayarkaydet->execute(array(
                    ':sid' => $id,
                    ':sad' => $_POST['siba'],
                    ':nad' => $_POST['sibav'],
                    ':nac' => $_POST['sibac'],
                    ':slink' => $_POST['slink'],
                    ':ssira' => $_POST['ssira'],
                    ':sidurum' => $_POST['sdurum'],
                    ':sres' => $url,

                ));

                if ($noldu) {



                  unlink($eskiresim);

                    $data["status"] = "success";
                    $data["message"] = "İşlem Başarıyla Gerçekleşti";


                } else {

                    $data["status"] = "error";
                    $data["message"] = "İşlem Sırasında Bir Hata Oluştu";

                }

            }
        }
    } else {

        $id = $_POST['sliderid'];

        $ayarkaydet = $db->prepare('UPDATE slider SET 

            slider_ad            =:sad,
            slider_ne            =:nad,
            slider_aciklama      =:nac,
            slider_link          =:slink,
            slider_sira          =:ssira,
            slider_durum         =:sidurum

            WHERE slider_id =:sid');

        $noldu = $ayarkaydet->execute(array(
            ':sid' => $id,
            ':sad' => $_POST['siba'],
            ':nad' => $_POST['sibav'],
            ':nac' => $_POST['sibac'],
            ':slink' => $_POST['slink'],
            ':ssira' => $_POST['ssira'],
            ':sidurum' => $_POST['sdurum']

        ));

        if ($noldu) {

            $data["status"] = "success";
            $data["message"] = "İşlem Başarıyla Gerçekleşti";

        } else {

            $data["status"] = "error";
            $data["message"] = "İşlem Sırasında Bir Hata Oluştu";

        }


    }


} else {

    $data["status"] = "error";
    $data["message"] = "İşlem Sırasında Bir Hata Oluştu";
}


echo json_encode($data);

?>