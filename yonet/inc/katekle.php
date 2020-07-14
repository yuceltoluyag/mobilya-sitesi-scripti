<?php

define('guvenlik', true);
require_once '../../sistem/fonksiyon.php';

        if ($_POST) {
            $sef = sef_link($_POST['katadi']);
            $ad = $_POST['katadi'];
            $kac = $_POST['kataciklama'];

            if (empty($ad) || empty($kac)) {
                echo 'bos';
            } else {
                $ayarkaydet = $db->prepare('INSERT INTO kategoriler SET

                  kat_adi             =:ad,
                  kat_aciklama        =:aciklama,
                  kat_desc            =:kelime,
                  kat_ust            =:ust,
                  kat_durum          =:duru,
                  kat_sef             =:res


                              ');

                $noldu = $ayarkaydet->execute([

                    ':ad'               => post('katadi'),
                    ':aciklama'         => post('kataciklama'),
                    ':kelime'           => post('katanahtar'),
                    ':ust'              => post('kategori_ust'),
                    ':duru'             => post('kategoridurum'),
                    ':res'              => $sef,

                ]);

                if ($noldu) {
                    echo 'ok';
                } else {
                    echo 'hata';
                }
            }
        } else {
            header('Location:../kategoriler.php');
        }
