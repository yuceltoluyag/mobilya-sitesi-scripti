<?php !defined("guvenlik") ? header('Location:index.php') : null;
require_once 'ust.php';
require_once 'sol.php';
?>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Yönetici Paneline Hoşgeldiniz</h1>
            <p>Tüm Ayarlarınızı kolayca gerçekleştirebilirsiniz.</p>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="index.php">Anasayfa</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <i class="fa fa-list-ol fa-5x"></i>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <?php
                                        $veri = $db->prepare("SELECT * FROM urunler");
                                        $veri->execute(array());
                                        $arr = $veri->fetchAll(PDO::FETCH_ASSOC);
                                        $say = $veri->rowCount();
                                        echo $say;
                                        ?>
                                        <p class="announcement-text">Toplam Ürün Sayısı</p>
                                    </div>
                                </div>
                            </div>
                            <a href="urunler.php">
                                <div class="panel-footer announcement-bottom">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Detaylar
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <i class="fa fa-usd fa-5x"></i>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <?php
                                        $veri = $db->prepare("SELECT * FROM siparisler");
                                        $veri->execute(array());
                                        $arr = $veri->fetchAll(PDO::FETCH_ASSOC);
                                        $say = $veri->rowCount();
                                        echo $say;
                                        ?>
                                        <p class="announcement-text">Toplam Sipariş</p>
                                    </div>
                                </div>
                            </div>
                            <a href="siparisler.php">
                                <div class="panel-footer announcement-bottom">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Detaylar
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <i class="fa fa-line-chart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <?php
                                        $veri = $db->prepare("SELECT z_ip FROM ziyaretci GROUP BY z_ip");
                                        $veri->execute(array());
                                        $arr = $veri->fetchAll(PDO::FETCH_ASSOC);
                                        $say = $veri->rowCount();
                                        echo $say;
                                        ?>
                                        <p class="announcement-text">Toplam Ziyaretçi</p>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer announcement-bottom">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Detaylar
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <i class="fa fa-weixin fa-5x"></i>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <?php
                                        $veri = $db->prepare("SELECT * FROM mesajlar");
                                        $veri->execute(array());
                                        $arr = $veri->fetchAll(PDO::FETCH_ASSOC);
                                        $say = $veri->rowCount();
                                        echo $say;
                                        ?>
                                        <p class="announcement-text">Gelen Mesaj Sayısı <i class=""></i></p>
                                    </div>
                                </div>
                            </div>
                            <a href="mesajlar.php">
                                <div class="panel-footer announcement-bottom">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Details
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


   