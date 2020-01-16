<?php

     require_once '../sistem/fonksiyon.php';


     if($_POST) {

          $eposta  = $_POST['eposta'];
          $sifre = sha1(md5(post('sifre')));
          if (!$eposta || !$sifre) {
            echo "bos";
       }elseif (!filter_var($eposta, FILTER_VALIDATE_EMAIL)){
              echo 'ehata';
          }else {

          $giris = $db->prepare('SELECT * FROM uyeler WHERE uye_eposta=:kadi AND uye_sifre=:s');
          $giris->execute(array(
            ':kadi'=>$eposta,
            ':s' => $sifre
            ));

          if ($giris -> rowCount()) {

               $row = $giris->fetch(PDO::FETCH_ASSOC);

               if ($row['uye_durum'] == 1){

                 
                 $_SESSION['oturum'] = true;
                 $_SESSION['id']     = $row ['uye_id']; 

                 echo "ok";


            } else {

               echo "aktivasyon";
          }
     } else{

          echo "hata";
     }
}


}else {

    header('location:../index.php');
}


 ?>