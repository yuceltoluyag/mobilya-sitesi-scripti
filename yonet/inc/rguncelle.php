<?php

define('guvenlik', true);
$data = [];
require_once '../../sistem/fonksiyon.php';

if (isset($_POST)) {
    if ($_FILES['sresim']['size'] > 0) {
        if ($_FILES['sresim']['type'] == 'image/jpeg' || $_FILES['sresim']['type'] == 'image/png') {  //dosya tipi jpeg olsun
            $dosya_adi = $_FILES['sresim']['name'];
            //Resimi kayıt ederken yeni bir isim oluşturalım
            $uret = ['as', 'rt', 'ty', 'yu', 'fg'];
            $uzanti = substr($dosya_adi, -4, 4);
            $sayi_tut = rand(1, 10000);
            $yeni_ad = '../../resimler/'.$uret[rand(0, 4)].$sayi_tut.$uzanti;
            $url = substr($yeni_ad, 5);
            //Dosya yeni adıyla uploadklasorune kaydedilecek
            if (move_uploaded_file($_FILES['sresim']['tmp_name'], $yeni_ad)) {
                $id = $_POST['reklamid'];
                $u = reklamgetir($id);
                foreach ($u as $reklam);
                $eskiresim = '../../'.$reklam['reklam_resim'];
                $ayarkaydet = $db->prepare('UPDATE reklamlar SET 
            reklam_baslik            =:sad,
            reklam_icerik            =:nad,
            reklam_resim             =:nac,
            reklam_sure              =:slink,
            reklam_url               =:ssira,
            reklam_zaman             =:szaman,
            reklam_onay              =:sonay 
          
            WHERE reklam_id =:sid');
                $noldu = $ayarkaydet->execute([
                    ':sid'    => $id,
                    ':sad'    => $_POST['riba'],
                    ':nad'    => $_POST['racik'],
                    ':nac'    => $url,
                    ':slink'  => $_POST['resur'],
                    ':ssira'  => $_POST['rlink'],
                    ':szaman' => $_POST['resaat'],
                    ':sonay'  => $_POST['rdurum'],

                ]);

                if ($noldu) {
                    unlink($eskiresim);
                    $data['status'] = 'success';
                    $data['message'] = 'İşlem Başarıyla Gerçekleşti';
                } else {
                    $data['status'] = 'error';
                    $data['message'] = 'İşlem Sırasında Bir Hata Oluştu';
                }
            }
        }
    } else {
        $id = $_POST['reklamid'];
        $ayarkaydet = $db->prepare('UPDATE reklamlar SET 

            reklam_baslik            =:sad,
            reklam_icerik            =:nad,
            reklam_sure              =:slink,
            reklam_url               =:ssira,
            reklam_zaman             =:szaman,
            reklam_onay              =:sonay 

            WHERE reklam_id =:sid');

        $noldu = $ayarkaydet->execute([
            ':sid'    => $id,
            ':sad'    => $_POST['riba'],
            ':nad'    => $_POST['racik'],
            ':slink'  => $_POST['resur'],
            ':ssira'  => $_POST['rlink'],
            ':szaman' => $_POST['resaat'],
            ':sonay'  => $_POST['rdurum'],

        ]);

        if ($noldu) {
            $data['status'] = 'success';
            $data['message'] = 'İşlem Başarıyla Gerçekleşti';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'İşlem Sırasında Bir Hata Oluştu';
        }
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'İşlem Sırasında Bir Hata Oluştu';
}

echo json_encode($data);
