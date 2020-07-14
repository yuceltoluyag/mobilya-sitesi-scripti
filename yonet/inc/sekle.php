<?php

define('guvenlik', true);
require_once '../../sistem/fonksiyon.php';
$data = [];
if (isset($_POST)) {
    if ($_FILES['sresim']['size'] < 10240 * 10240) {
        if ($_FILES['sresim']['type'] == 'image/jpeg' || $_FILES['sresim']['type'] == 'image/png' || $_FILES['sresim']['type'] == 'image/pjpeg') {
            $dosya_adi = $_FILES['sresim']['name'];

            //Resimi kayıt ederken yeni bir isim oluşturalım
            $uret = ['as', 'rt', 'ty', 'yu', 'fg'];
            $uzanti = substr($dosya_adi, -4, 4);
            $sayi_tut = rand(1, 10000);

            $yeni_ad = '../../resimler/'.$uret[rand(0, 4)].$sayi_tut.$uzanti;

            $url = substr($yeni_ad, 5);

            //Dosya yeni adıyla uploadklasorune kaydedilecek

            if (move_uploaded_file($_FILES['sresim']['tmp_name'], $yeni_ad)) {
                $ayarkaydet = $db->prepare('INSERT INTO slider SET

                  slider_ad             =:ad,
                  slider_ne             =:nad,
                  slider_aciklama       =:nac,
                  slider_resim          =:res,
                  slider_link           =:link,
                  slider_sira           =:sira,
                  slider_durum          =:durum

                              ');

                $noldu = $ayarkaydet->execute([

                    ':ad'    => $_POST['siba'],
                    ':nad'   => $_POST['sibav'],
                    ':nac'   => $_POST['sibac'],
                    ':res'   => $url,
                    ':link'  => $_POST['slink'],
                    ':sira'  => $_POST['ssira'],
                    ':durum' => $_POST['sdurum'],

                ]);

                $data['status'] = 'success';
                $data['message'] = 'İşlem Başarıyla Gerçekleşti';
            }
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Dosya Formatınız Geçerli Değil veya Boş Olamaz';
        }
    } else {
        $data['status'] = 'error';
        $data['message'] = 'Dosya Boyutu Büyük';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Lütfen Resim Seçiniz';
}

echo json_encode($data);
