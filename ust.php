<?php !defined('guvenlik') ? die ('Erişim Yetkiniz Yok') : null; ?>
<?php require_once("sistem/fonksiyon.php"); ?>
<!doctype html>
<html lang="tr">

<head>
    <!--Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $ayarrow['site_aciklama']; ?>">
    <meta name="keywords" content="<?php echo $ayarrow['site_anahtarkelime']; ?>">
    <meta property="og:locate" content="tr_TR"/>
    <meta property="og:title" content="<?php echo $tit['baslik']; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo loc(); ?>"/>
    <meta property="og:site_name" content="<?php echo $tit['baslik']; ?>"/>
    <meta property="og:image" content="<?php echo $tit['resim']; ?>"/>
    <meta property="og:description" content="<?php echo $tit['acik']; ?>"/>
    <!-- Bootstrap CSS Dosyaları -->
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/bootstrap.css" rel="stylesheet">

    <link href="<?php echo $ayarrow["site_url"]; ?>/css/font-face.css" rel="stylesheet">
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/owl.theme.css" rel="stylesheet">
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/sweetalert.css" rel="stylesheet">
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/contact-2.css" rel="stylesheet">
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/detay.css" rel="stylesheet">
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/ana.css" rel="stylesheet">
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/sana.css" rel="stylesheet">
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/dana.css" rel="stylesheet">
    <link href="<?php echo $ayarrow["site_url"]; ?>/css/bana.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $ayarrow["site_url"]; ?>/css/main.css" />
    <link rel="shortcut icon" href="<?php echo $ayarrow["site_url"]; ?>/img/icon.ico" />

    <title>Mobilya Temam!</title>
    <script src="<?php echo $ayarrow["site_url"]; ?>/js/modernizr.custom.12691.js"></script>
</head>

<body>
