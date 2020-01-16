<?php
/*
Gmail veya Yandex için Aşağıdaki ilgili yerleri değiştirin

Yandex Smtp Ayarları:
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.yandex.com';
$mail->Port = 587;

Gmail Smtp Ayarları:
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;

*/

require 'PHPMailerAutoload.php';

$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->SMTPDebug = 0; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; // Güvenli baglanti icin ssl normal baglanti icin tls
$mail->Host = "smtp.yandex.com"; // Mail sunucusuna ismi
$mail->Port = 587; // Guvenli baglanti icin 465 Normal baglanti icin 587
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = ""; // Mail adresimizin kullanicı adi
$mail->Password = ""; // Mail adresimizin sifresi
$mail->SetFrom("ytoluyag@gmail.com", "Mobilyacı Abi"); // Mail attigimizda gorulecek ismimiz

/*Toplu Mail göndermek için Burası
$epostalar=array("birbaşkası@gmail.com","birbaşkası2@hotmail.com","birbaşkası3@hotmail.com");
foreach ($epostalar as $eposta) {
$mail->AddAddress($eposta); // Maili gonderecegimiz kisi yani alici
} */

$mail->AddAddress("alıcı@gmail.com");
$mail->Subject = "Mesaj Basligi"; // Konu basligi
$mail->Body = "deneme Mesaj icerigi"; // Mailin icerigi
/*

Alternatif İçerik Hazırlama Kısmı Body $mail->Body kaldırıp yerine content koyuyoruz ve html içerik, resim, tümm css özellikleri ile yazılar vs gönderiyoruz
$content ='<div style="background: skyblue; padding: 10px; text-align:center; margin:20px;"> ............İçerik................... </div>';

$mail->MsgHTML($content); // yukarıdaki içeriği gönderiyoruz

*/
//dosya göndermek için $mail->addAttachment($file,'application/zip'); zip dosya diğer application lar farklı
//isimde

if(!$mail->Send()){
    echo "Mailer Error: ".$mail->ErrorInfo;
} else {
    echo "Mesaj Başarı İle gonderildi";
}


?>



