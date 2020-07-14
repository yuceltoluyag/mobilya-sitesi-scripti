<?php

@session_start();
ob_start();

/**
 * Veri Tabanı Ayarları adamcoder.net :).
 */
try {
    $db = new PDO('mysql:host=localhost;dbname=mobilya;charset=utf8;', 'root', '');
    /**
     * Türkçe Karakter Hataları Fix.
     */
    $db->query('SET CHARACTER SET UTF8');
    $db->query('SET NAMES UTF8');
} catch (PDOException $hata) {
    echo $hata->getMessage();
}

/**
 * Ayarlar Tablosundan Veri Çekme İşlemleri.
 */
$ayarlar = $db->prepare('SELECT * FROM ayarlar');
$ayarlar->execute();
$ayarrow = $ayarlar->fetch(PDO::FETCH_ASSOC);
$settitle = $ayarrow['site_baslik'];

/**
 * Harita Ayarları.
 */
$harita = $db->prepare('SELECT * FROM harita');
$harita->execute();
$haritas = $harita->fetch(PDO::FETCH_ASSOC);

/**
 * Oturum Ayarları.
 */
if (@$_SESSION['oturum']) {
    $sorgu = $db->prepare('SELECT * FROM uyeler WHERE uye_id=:id');
    $sorgu->execute([':id' => $_SESSION['id']]);

    if ($sorgu->rowCount()) {
        $urow = $sorgu->fetch(PDO::FETCH_ASSOC);
        $uid = $urow['uye_id'];
        $ukad = $urow['uye_adi'];
        $udur = $urow['uye_durum'];
        $upos = $urow['uye_eposta'];
    }
}
