<?php

define("guvenlik", true);
require_once '../../sistem/fonksiyon.php';
$data = array();
if (isset($_POST)) {

    if ($_FILES["rresim"]["size"] < 10240 * 10240) {

        if ($_FILES["rresim"]["type"] == "image/jpeg" || $_FILES["rresim"]["type"] == "image/png" || $_FILES["rresim"]["type"] == "image/pjpeg") {


            $dosya_adi = $_FILES["rresim"]["name"];


            //Resimi kayıt ederken yeni bir isim oluşturalım
            $uret = array("as", "rt", "ty", "yu", "fg");
            $uzanti = substr($dosya_adi, -4, 4);
            $sayi_tut = rand(1, 10000);

            $yeni_ad = "../../resimler/" . $uret[rand(0, 4)] . $sayi_tut . $uzanti;

            $url = substr($yeni_ad, 5);


            //Dosya yeni adıyla uploadklasorune kaydedilecek

            if (move_uploaded_file($_FILES["rresim"]["tmp_name"], $yeni_ad)) {


                $ayarkaydet = $db->prepare('INSERT INTO reklamlar SET 
                  
                  reklam_baslik             =:bas,
                  reklam_icerik             =:racik,
                  reklam_resim              =:res,
                  reklam_sure               =:sur,
                  reklam_url                =:url,
                  reklam_zaman             =:szaman,
                  reklam_onay              =:sonay 
                 
                              
                              ');

                $noldu = $ayarkaydet->execute(array(

                    ':bas' => $_POST['riba'],
                    ':racik' => $_POST['racik'],
                    ':res' => $url,
                    ':sur' => $_POST['rsure'],
                    ':url' => $_POST['rurl'],
                    ':szaman' => $_POST['resaat'],
                    ':sonay' => $_POST['rdurum']

                ));

                $data["status"] = "success";
                $data["message"] = "İşlem Başarıyla Gerçekleşti";

            }
        } else {
            $data["status"] = "error";
            $data["message"] = "Dosya Formatınız Geçerli Değil veya Boş Olamaz";
        }

    } else {
        $data["status"] = "error";
        $data["message"] = "Dosya Boyutu Büyük";
    }
} else {
    $data["status"] = "error";
    $data["message"] = "Lütfen Resim Seçiniz";
}

echo json_encode($data);

?>

