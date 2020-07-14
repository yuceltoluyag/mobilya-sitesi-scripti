<?php

define('guvenlik', true);
require_once '../../sistem/fonksiyon.php';
$data = [];
if (isset($_POST)) {
    $bas = $_POST['siba'];
    $seo = sef_link($bas);
    $hak = $_POST['sayfahak'];
    $eti = $_POST['setiket'];
    $des = $_POST['sdesc'];
    $dur = $_POST['sdurum'];
    $sir = $_POST['ssira'];
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
                $ayarkaydet = $db->prepare('INSERT INTO sayfalar SET sayfa_adi=?,sayfa_seo=?,sayfa_icerik=?,sayfa_resim=?,sayfa_etiket=?,sayfa_desc=?,sayfa_durum=?,sayfa_sira=?');
                $noldu = $ayarkaydet->execute([$bas, $seo, $hak, $url, $eti, $des, $dur, $sir]);

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
