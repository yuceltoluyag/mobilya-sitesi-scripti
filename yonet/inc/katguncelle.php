<?php

define('guvenlik', true);
require_once '../../sistem/fonksiyon.php';

if (isset($_POST)) {
    $id = $_POST['katid'];
    $seo = sef_link($_POST['kategoriad']);
    $kad = $_POST['kategoriad'];
    $kac = $_POST['kataciklama'];
    if (empty($kad) || empty($kac)) {
        echo 'bos';
    } else {
        $ayarkaydet = $db->prepare('UPDATE kategoriler SET
                  kat_adi=:katdi,
                  kat_aciklama=:aciklama,
                  kat_desc=:kelime,
                  kat_ust=:ust,
                  kat_durum=:duru,
                  kat_sef=:kasef  WHERE kat_id=:sid');

        $noldu = $ayarkaydet->execute([

            ':sid'      => $id,
            ':katdi'    => $_POST['kategoriad'],
            ':aciklama' => post('kataciklama'),
            ':kelime'   => post('katdesc'),
            ':ust'      => post('kategori_ust'),
            ':duru'     => post('kategoridurum'),
            ':kasef'    => $seo,
        ]);

        if ($noldu) {
            echo 'ok';
        } else {
            echo 'hata';
        }
    }
} else {
    header('Location: ../kategoriler.php');

    exit(); // öldür.com
}
