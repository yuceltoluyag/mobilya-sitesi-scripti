<?php
!defined('guvenlik') ? header('Location:index.php') : null;
require_once '../sistem/fonksiyon.php';

if ($udur != 1) {
    header('Location:index.php');
} elseif (!@$_SESSION['oturum']) {
    header('Location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/dropzone.css"/>
    <link rel="stylesheet" type="text/css" href="froala/css/froala_editor.css"/>
    <link rel="stylesheet" href="froala/css/plugins/char_counter.min.css"/>
    <link rel="stylesheet" href="froala/css/plugins/code_view.min.css"/>
    <link rel="stylesheet" href="froala/css/plugins/colors.min.css"/>
    <link rel="stylesheet" href="froala/css/plugins/emoticons.min.css"/>
    <link rel="stylesheet" href="froala/css/plugins/file.min.css"/>
    <link rel="stylesheet" href="froala/css/plugins/fullscreen.min.css"/>
    <link rel="stylesheet" href="froala/css/plugins/image.min.css"/>
    <link rel="stylesheet" href="froala/css/plugins/image_manager.min.css"/>
    <link rel="stylesheet" href="froala/css/plugins/line_breaker.min.css"/>
    <link rel="stylesheet" href="froala/css/plugins/table.css"/>
    <link rel="stylesheet" href="froala/css/plugins/video.min.css"/>


    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $ayarrow['site_url']; ?>/css/sweetalert.css"/>


    <title>Yönetici Paneli</title>
</head>
<body class="sidebar-mini fixed">
<div class="wrapper">
    <!-- Navbar-->
    <header class="main-header hidden-print"><a class="logo" href="index.php">Yönetici Paneli</a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
            <!-- Navbar Right Menu-->

        </nav>
    </header>
