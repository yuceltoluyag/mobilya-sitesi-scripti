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
                $id = $_POST['sayfaid'];
                $u = sayfagetir($id);
                $bas = $_POST['siba'];
                $seo = sef_link($bas);
                $hak = $_POST['sayfahak'];
                $eti = $_POST['setiket'];
                $des = $_POST['sdesc'];
                $dur = $_POST['sdurum'];
                $sir = $_POST['ssira'];

                foreach ($u as $sayfa);
                $eskiresim = '../../'.$sayfa['sayfa_resim'];
                $ayarkaydet = $db->prepare('UPDATE sayfalar SET sayfa_adi=?,sayfa_seo=?,sayfa_icerik=?,sayfa_resim=?,sayfa_etiket=?,sayfa_desc=?,sayfa_durum=?,sayfa_sira=? WHERE sayfa_id =?');
                $noldu = $ayarkaydet->execute([$bas, $seo, $hak, $url, $eti, $des, $dur, $sir, $id]);
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
        $id = $_POST['sayfaid'];
        $u = sayfagetir($id);
        $bas = $_POST['siba'];
        $seo = sef_link($bas);
        $hak = $_POST['sayfahak'];
        $eti = $_POST['setiket'];
        $des = $_POST['sdesc'];
        $dur = $_POST['sdurum'];
        $sir = $_POST['ssira'];
        $ayarkaydet = $db->prepare('UPDATE sayfalar SET  sayfa_adi=?,sayfa_seo=?,sayfa_icerik=?,sayfa_etiket=?,sayfa_desc=?,sayfa_durum=?,sayfa_sira=? WHERE sayfa_id =?');
        $noldu = $ayarkaydet->execute([$bas, $seo, $hak, $eti, $des, $dur, $sir, $id]);
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
