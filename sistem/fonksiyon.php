<?php

require_once 'ayar.php';

function post($parametre, $kosul = false)
{
    if ($kosul == false) {
        $sonuc = htmlspecialchars($_POST[$parametre]);
    } elseif ($kosul == true) {
        $sonuc = htmlspecialchars($_POST[$parametre]);
    }

    return $sonuc;
}

function get($parametre, $kosul = false)
{
    if ($kosul == false) {
        $sonuc = htmlspecialchars($_POST[$parametre]);
    } elseif ($kosul == true) {
        $sonuc = htmlspecialchars($_POST[$parametre]);
    }

    return $sonuc;
}

function sef_link($str)
{
    $preg = ['Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#', '.'];
    $match = ['c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp', ''];
    $perma = strtolower(str_replace($preg, $match, $str));
    $perma = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $perma);
    $perma = trim(preg_replace('/\s+/', ' ', $perma));
    $perma = str_replace(' ', '-', $perma);

    return $perma;
}

function IP()
{
    if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
        if (strstr($ip, ',')) {
            $tmp = explode(',', $ip);
            $ip = trim($tmp[0]);
        }
    } else {
        $ip = getenv('REMOTE_ADDR');
    }

    return $ip;
}

function loc()
{
    $loc = 'http';
    if (@$_SERVER['HTTPS'] == 'on') {
        $loc .= 's';
    }
    $loc .= '://';
    if (@$_SERVER['SERVER_PORT'] != '80') {
        $loc .= @$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
    } else {
        $loc .= @$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }

    return $loc;
}

/**
 *  Yazılar Başlık.
 */
function tit()
{
    global $db;
    global $settitle;
    $sef = @get('urun_bilgi');

    if ($sef) {
        $sorgu = $db->prepare('SELECT * FROM urunler WHERE u_sef=:sef');
        $sorgu->execute([':sef' => $sef]);
        $row = $sorgu->fetch(PDO::FETCH_ASSOC);
        $tit['baslik'] = $row['u_baslik'].'-'.$settitle;
        $tit['resim'] = $row['u_resim'];
        $tit['acik'] = mb_substr(strip_tags($row['u_icerik']), 0, 200);
    } elseif (@$katbas = get('kat_url')) {
        $sorgu = $db->prepare('SELECT * FROM kategoriler WHERE kat_sef=:sef');
        $sorgu->execute([':sef' => $katbas]);
        $row = $sorgu->fetch(PDO::FETCH_ASSOC);
        $tit['baslik'] = $row['kat_adi'].' - '.$settitle;
        $tit['resim'] = 'http://localhost/abi/img/logo.png';
    } else {
        $tit['baslik'] = $settitle;
        $tit['resim'] = 'http://localhost/abi/img/logo.png';
        $tit['acik'] = $settitle;
    }

    return $tit;
}

$tit = tit();

function noktasil($s)
{
    $tr = ['.', ','];
    $eng = ['', '.'];
    $s = str_replace($tr, $eng, $s);

    return $s;
}

function parayaz($para)
{
    $para = number_format($para, 2, ',', '.').' ₺';

    return $para;
}

function urungetir($par)
{
    global $db;
    $veri = $db->prepare("SELECT * FROM urunler WHERE u_id=$par");
    $veri->execute([]);
    $v = $veri->fetchAll(PDO::FETCH_ASSOC);

    return $v;
}

function slidergetir($par)
{
    global $db;
    $veri = $db->prepare("SELECT * FROM slider WHERE slider_id=$par");
    $veri->execute([]);
    $v = $veri->fetchAll(PDO::FETCH_ASSOC);

    return $v;
}

function sayfagetir($par)
{
    global $db;
    $veri = $db->prepare("SELECT * FROM sayfalar WHERE sayfa_id=$par");
    $veri->execute([]);
    $v = $veri->fetchAll(PDO::FETCH_ASSOC);

    return $v;
}

function urunresimgetir($id)
{
    global $db;
    $veri = $db->prepare("SELECT urun_resim FROM urunler WHERE u_id='$id'");
    $veri->execute([]);
    $v = $veri->fetchAll(PDO::FETCH_ASSOC);
    foreach ($v as $ur);

    return $ur['u_resim'];
}

function reklamgetir($par)
{
    global $db;
    $veri = $db->prepare("SELECT * FROM reklamlar WHERE reklam_id=$par");
    $veri->execute([]);
    $v = $veri->fetchAll(PDO::FETCH_ASSOC);

    return $v;
}

function takip()
{
    global $db;
    $gecerliadres = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    if (@$_SERVER['HTTP_REFERER']) {
        $bironceki = $_SERVER['HTTP_REFERER'];
    } else {
        $bironceki = 'boş';
    }
    $kullanicidil = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $kullaniciip = $_SERVER['REMOTE_ADDR'];
    $zaman = date('Y-m-d H:i:s');
    $veri = $db->prepare('INSERT INTO ziyaretci SET z_ip=?,z_bulunan=?,z_geldigi=?,z_dil=?,z_zaman=?');
    $veri->execute([$kullaniciip, $gecerliadres, $bironceki, $kullanicidil, $zaman]);
}

function online($ip)
{
    global $db;
    /*date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_ALL, 'tr_TR.UTF-8', 'tr_TR', 'tr', 'turkish');*/
    $zaman = date('Y-m-d H:i:s', time() - 500);
    $veri = $db->prepare("SELECT * FROM ziyaretci WHERE z_ip='$ip' AND TIMESTAMP(z_zaman) > '$zaman'");
    $veri->execute([]);
    $verisay = $veri->rowCount();
    if ($verisay > 0) {
        return 1;
    } else {
        return 0;
    }
}
