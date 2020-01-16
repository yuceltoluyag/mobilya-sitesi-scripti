<?php !defined("guvenlik") ? header('Location:index.php') : null; ?>
<!-- Side-Nav-->
<aside class="main-sidebar hidden-print">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="images/admin.png" alt="User Image"></div>
            <div class="pull-left info">
                <p>Merhaba <?php echo $ukad; ?></p>
                <p class="designation"><a style="color:#ddd" href="cikis.php"><i class="fa fa-sign-out"
                                                                                 aria-hidden="true"></i>
                        Çıkış Yap || </a> <a style="color:#fff" href="<?php echo $ayarrow['site_url']; ?>"
                                             target="_blank"><i class="fa fa-eye" aria-hidden="true"></i>
                        Siteyi Gör</a></p>

            </div>
        </div>
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">

            <li class="treeview"><a href=""><i class="fa fa-wrench"></i><span>Site Ayarları</span><i
                            class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="menu.php"><i class="fa fa-bars"></i><span>Menü İşlemleri</span></a></li>
                    <li><a href="sayfalar.php"><i class="fa fa-clipboard"></i><span>Sayfa İşlemleri</span></a></li>
                    <li><a href="genelayarlar.php"><i class="fa fa-cog"></i>Genel Ayarlar</a></li>
                    <li><a href="sosyalayar.php"><i class="fa fa-share-alt"></i> Sosyal Medya Ayarları</a></li>
                    <li><a href="iletisim.php"><i class="fa fa-compress"></i> İletişim Ayarları</a></li>

                </ul>
            </li>

            <li class="treeview"><a href=""><i class="fa fa-bed"></i><span>Ürün İşlemleri</span><i
                            class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="urunler.php"><i class="fa fa-th-list"></i> Tüm Ürünler</a></li>
                    <li><a href="urunekle.php"><i class="fa fa-plus"></i> Urun Ekle</a></li>
                    <li><a href="kategoriler.php"><i class="fa fa-list-ol"></i> Kategoriler</a></li>

                </ul>
            </li>



            <li><a href="slider.php"><i class="fa fa-image"></i><span>Slider İşlemleri</span></a></li>
            <li><a href="siparisler.php"><i class="fa fa-cart-plus"></i><span>Sipariş İşlemleri</span></a></li>
            <li><a href="mesajlar.php"><i class="fa fa-envelope-o"></i><span>İletişim Mesajları</span></a></li>
            <li><a href="reklamlar.php"><i class="fa fa-bullhorn"></i><span>Reklam İşlemleri</span></a></li>
        </ul>
    </section>
</aside>