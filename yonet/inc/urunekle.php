<?php

define("guvenlik", true);
require_once '../../sistem/fonksiyon.php';
require_once '../class.upload.php';
$data = array();

if (isset($_POST)) {
    $image = new Upload($_FILES['uresim']);
    if ($image->uploaded) {

        $image->image_convert = 'jpg';
        $image->image_resize = true;
        $image->image_x = 1260;
        $image->image_y = 720;
        $image->allowed = array('image/*');
        $image->Process('../../resimler/');

        if ($image->processed) {
            $url = substr($image->file_dst_path, 5) . $image->file_dst_name;



            $kategori = $_POST['kategoriler'];
            $urunbas  = $_POST['ubas'];
            $seo = sef_link($urunbas);
            $ufiyat   = $_POST['ufiyat'];
            $uicerik  = $_POST['uicerik'];
            $uetiket  = $_POST['uetiket'];


   if(empty($urunbas) || empty($ufiyat) || empty($uicerik) || empty($uetiket)){

       $data["status"] = "error";
       $data["message"] = "Lütfen Boş Alan Bırakmayınız";

   } else {

                $ayarkaydet = $db->prepare('INSERT INTO urunler SET
               
                u_katid             =:kat,
                u_ekleyen           =:kim,
                u_baslik            =:baslik,
                u_sef               =:sef,
                u_fiyat             =:fiyat,
                u_icerik            =:icerik,
                u_resim             =:res,
                u_etiket            =:eti,
                u_durum             =:dur');

                $noldu = $ayarkaydet->execute(array(

                    ':kat' => $kategori,
                    ':kim' => $uid,
                    ':baslik' =>$urunbas,
                    ':sef' => $seo,
                    ':fiyat' => noktasil($ufiyat),
                    ':icerik' => $uicerik,
                    ':res' => $url,
                    ':eti' => $uetiket,
                    ':dur' => 1

                ));

                $data["status"] = "success";
                $data["message"] = "İşlem Başarıyla Gerçekleşti";


          } } else {
            $data["status"] = "error";
            $data["message"] = "Dosya Formatınız Geçerli Değildirv ";
        }

    } else {
        $data["status"] = "error";
        $data["message"] = "Dosya Boyutu Büyük";
    }
 }else {
    $data["status"] = "error";
    $data["message"] = "Lütfen Resim Seçiniz";
}

echo json_encode($data);

?>