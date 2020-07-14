<?php

require_once '../sistem/fonksiyon.php';

if ($_POST) {
    $adi = post('adsoyad');
    $tel = post('telefon');
    $mes = post('mesaj');
    $ip = IP();

    if (!$adi || !$tel || !$mes) {
        echo 'bos';
    } else {
        $mesajgonder = $db->prepare('INSERT INTO mesajlar SET


               mesaj_ad =:ad,
               mesaj_tel=:tel,
               mesaj_icerik=:mes,
               mesaj_durum=:dur,
               mesaj_ip=:ip
        	');

        $mesajgonder->execute([

            ':ad'  => $adi,
            ':tel' => $tel,
            ':mes' => $mes,
            ':dur' => 2,
            ':ip'  => $ip,

        ]);

        if ($mesajgonder) {
            require '../mail/PHPMailerAutoload.php';

            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp.yandex.com';
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->SetLanguage('tr', 'phpmailer/language');
            $mail->CharSet = 'utf-8';
            $mail->Username = 'ytoluyag@yandex.com';
            $mail->Password = '12435768';
            $mail->SetFrom('ytoluyag@yandex.com', 'Mobilyacı Abi');

            $mail->AddAddress('ytoluyag@gmail.com');
            $mail->Subject = $adi; // Konu basligi
            $mail->Body = $mes; // Mailin icerigi

            if ($mail->Send()) {
                echo 'ok';
            }
        } else {
            echo 'hata';
        }
    }
} else {
    header('Location:../iletisim.php');
}
