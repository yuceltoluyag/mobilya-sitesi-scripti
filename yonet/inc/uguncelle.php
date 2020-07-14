<?php

define('guvenlik', true);
require_once '../../sistem/fonksiyon.php';
$data = [];
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
                $id = $_POST['urunid'];
                $bas = sef_link($_POST['siba']);
                $u = urungetir($id);
                foreach ($u as $urunul);
                $eskiresim = '../../'.$urunul['u_resim'];
                $ayarkaydet = $db->prepare('UPDATE urunler SET 

                u_baslik         =:sad,
                u_fiyat          =:slink,
                u_sef            =:ssira,
                u_icerik         =:sidurum,
                u_resim          =:sres,
                u_etiket         =:uet,
                u_durum          =:udur

                WHERE u_id =:sid');

                $noldu = $ayarkaydet->execute([
                    ':sid'         => $id,
                    ':sad'         => $_POST['siba'],
                    ':slink'       => $_POST['slink'],
                    ':ssira'       => $bas,
                    ':sidurum'     => $_POST['urunhak'],
                    ':sres'        => $url,
                    ':uet'         => $_POST['etiket'],
                    ':udur'        => $_POST['udurum'],

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
        $id = $_POST['urunid'];
        $bas = sef_link($_POST['siba']);

        $ayarkaydet = $db->prepare('UPDATE urunler SET 

              u_baslik         =:sad,
              u_fiyat          =:slink,
              u_sef            =:ssira,
              u_icerik         =:sidurum,
              u_etiket         =:uet,
              u_durum          =:udur

              WHERE u_id =:sid');

        $noldu = $ayarkaydet->execute([
            ':sid'         => $id,
            ':sad'         => $_POST['siba'],
            ':slink'       => $_POST['slink'],
            ':ssira'       => $bas,
            ':sidurum'     => $_POST['urunhak'],
            ':uet'         => $_POST['etiket'],
            ':udur'        => $_POST['udurum'],

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
    $data['message'] = 'İşlem Yapılacak Değer Bulunamadı';
}

echo json_encode($data);
