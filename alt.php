<?php !defined('guvenlik') ? die ('Erişim Yetkiniz Yok') : null;
takip();?>
<div id="sallama" style="position: fixed;bottom: 0;height: 11px; display: none;"></div>

    <section id="cta-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="header-text">
                        <h2 class="header-heading"><?php echo $haritas['iletisim_ust']; ?></h2>
                        <p><?php echo $haritas['iletisim_alt']; ?></p>
                        <a href="<?php echo $ayarrow['site_url'];?>/iletisim.php" class="btn btn-outline btn-lg">İletişim <i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>



<footer>
    <div class="container">
        <div class="row">


            <div class="clearfix"></div>
            <hr>
            <div class="credit">
                <div class="col-xs-12 text-center visible-sm-block visible-xs-block">
                    <ul class="list-inline social-buttons">
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <p class="credit-text">© - <?php echo $ayarrow['site_baslik'];?></p>
                </div>
                <div class="col-md-4 col-sm-6 text-center hidden-sm hidden-xs">
                    <ul class="list-inline social-buttons">
                        <li>
                            <a href="<?php echo $ayarrow['site_twitter'];?>"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo $ayarrow['site_facebook'];?>"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo $ayarrow['site_instagram'];?>"><i class="fa fa-instagram"></i></a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <p class="brand-credit"><a href="https://github.com/yuceltoluyag"><b>Y.T</b></a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Javascript Dosyaları -->
<script src="<?php echo $ayarrow['site_url']; ?>/js/jquery.min.js"></script>
<script src="<?php echo $ayarrow['site_url']; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $ayarrow['site_url']; ?>/js/wow.min.js"></script>
<script src="<?php echo $ayarrow['site_url']; ?>/js/owl.carousel.js"></script>
<script src="<?php echo $ayarrow['site_url']; ?>/js/theia-sticky-sidebar.min.js"></script>
<script src="<?php echo $ayarrow['site_url']; ?>/js/detay.js"></script>
<script src="<?php echo $ayarrow['site_url']; ?>/js/galeri.js"></script>
<script src="<?php echo $ayarrow['site_url']; ?>/js/sweetalert.min.js"></script>
<script src="<?php echo $ayarrow['site_url']; ?>/js/jquery.cookie.js"></script>
<script src="<?php echo $ayarrow['site_url']; ?>/js/main.js"></script>
<script src="<?php echo $ayarrow['site_url']; ?>/js/anasayfa.js"></script>

</body>

</html>
