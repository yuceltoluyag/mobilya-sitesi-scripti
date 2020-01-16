<?php !defined('guvenlik') ? die ('Erişim Yetkiniz Yok') : null;


?>
<header class="hero-carousel-wrapper hero-area">
    <div id="owl-1" class="owl-carousel">
        <?php

        $slider = $db->prepare("SELECT * FROM slider WHERE slider_durum=1 ORDER BY slider_sira ASC LIMIT 25");
        $slider->execute();

        while ($scek = $slider->fetch(PDO::FETCH_ASSOC)) {


        ?>
        <div class="item slide-<?php echo $scek['slider_id']; ?>">
            <div class="item-img" style="background-image: url('<?php echo $ayarrow['site_url'] . $scek['slider_resim']; ?>'); " alt="<?php echo $scek['slider_ad']; ?>"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-push-3 col-sm-12 col-sm-push-0 text-center">
                        <div class="header-text">
                            <h2 class="header-heading"><?php echo $scek['slider_ad']; ?> <b><?php echo $scek['slider_ne']; ?></b></h2>
                            <h4 class="header-sub-title"><?php echo $scek['slider_aciklama']; ?></h4>
                            <a href="<?php echo $ayarrow['site_url'] . $scek['slider_link']; ?>" class="btn btn-lg">Detaylar <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</header>




