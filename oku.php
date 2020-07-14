<?php
define('guvenlik', true);
require_once 'ust.php';
require_once 'navi.php';

?>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <section id="product-details">
        <div class="container">
            <div class="row">
                    <div class="col-md-6 col-sm-12 text-center">
                        <div class="wrapper">
                            <div class="gallery">

                                <?php

                                $konu_bilgi = $_GET['urun_bilgi'];
                                $urunsec = $db->prepare('SELECT * FROM urunler WHERE u_sef=:usef');
                                $urunsec->execute([':usef' => $konu_bilgi]);

                                if ($urunsec->rowCount()) {
                                    foreach ($urunsec

                                as $ro) {
                                        $row = $urunsec->fetch(PDO::FETCH_ASSOC); ?>
                                <figure>
                                    <img src="<?php echo $ayarrow['site_url'].$ro['u_resim'] ?>" alt="<?php echo $ro['u_baslik'] ?>"/>
                                    <figcaption><?php echo $ro['u_baslik'] ?>
                                        <small><?php echo $ro['u_baslik'] ?></small>
                                    </figcaption>
                                </figure>

                                <?php

                                $galeri = $db->prepare('SELECT * FROM galeri WHERE urun_id=:id');
                                        $galeri->execute([':id' => $ro['u_id']]);

                                        while ($resec = $galeri->fetch(PDO::FETCH_ASSOC)) {
                                            ?>

                                    <figure>
                                        <img src="<?php echo $ayarrow['site_url'].$resec['galeri_url'] ?>" alt="<?php echo $ro['u_baslik'] ?>"/>
                                        <figcaption><?php echo $ro['u_baslik'] ?>
                                            <small><?php echo $ro['u_baslik'] ?></small>
                                        </figcaption>
                                    </figure>

                                <?php
                                        } ?>
                            </div>
                        </div>


        </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="product-content">
                                    <a href="#"><span class="product-tag exclusive">Exclusive</span></a>
                                    <h3 class="product-title"><?php echo $ro['u_baslik']; ?></h3>
                                    <h2 class="product-price">
                                        <script type="text/javascript">
                                            function siparisver() {

                                                var uid = $("input[name=uid]").val();
                                                uid = $.trim(uid);

                                                var adsoyad = $("input[name=adsoyad]").val();
                                                adsoyad = $.trim(adsoyad);

                                                var eposta = $("input[name=eposta]").val();
                                                eposta = $.trim(eposta);

                                                var telno = $("input[name=telno]").val();
                                                telno = $.trim(telno);

                                                var mesaj = $("textarea[name=mesaj]").val();
                                                mesaj = $.trim(mesaj);


                                                if (adsoyad == "") {

                                                    sweetAlert('HATA', 'Ad Soyad Boş Bırakılamaz', 'error');
                                                } else if (eposta == "") {
                                                    sweetAlert('HATA', 'E-Posta Adresi Boş Bırakılamaz', 'error');
                                                } else if (telno == "") {

                                                    sweetAlert('HATA', 'Telefon Numarası Boş Bırakılamaz', 'error');

                                                } else if (mesaj == "") {

                                                    sweetAlert('HATA', 'Mesajınız Boş Bırakılamaz', 'error');

                                                } else {

                                                    var deger = "adsoyad=" + adsoyad + "&eposta=" + eposta + "&telno=" + telno + "&mesaj=" + mesaj + "&uid=" + uid;


                                                    $.ajax({

                                                        type: "POST",
                                                        url: "inc/siparisver.php",
                                                        data: deger,
                                                        success: function (sonuc) {

                                                            if (sonuc == "hata") {

                                                                sweetAlert('HATA', 'Ön Sipariş Alınamadı', 'error');

                                                            } else if (sonuc == "bos") {

                                                                sweetAlert('HATA', 'Boş Alan Bıraktınız', 'error');
                                                            } else if (sonuc == "ok") {

                                                                sweetAlert('Tebrikler', 'Siparişiniz Başarıyla Alındı', 'success');
                                                                setTimeout(function () {
                                                                    window.location.href = "index.php"
                                                                }, 2000);
                                                            }
                                                        }
                                                    })
                                                }

                                            }
                                        </script>
                                        <span class="promo-price"><?php echo parayaz($ro['u_fiyat']); ?></span></h2>
                                    <a href="" data-toggle="modal" data-target="#squarespaceModal" class="btn btn-action">Sipariş Ver  <i class="fa fa-chevron-right"></i></a>


                                    <!-- line modal -->
                                    <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Kapat</span></button>
                                                    <h3 class="modal-title" id="lineModalLabel">Sipariş Oluştur</h3>
                                                </div>
                                                <div class="modal-body">

                                                    <!-- content goes here -->
                                                    <div class="form-group">
                                                    <form id="contact" action="" method="post" onsubmit="return false;">
                                                        <fieldset>
                                                            <input placeholder="Adınız Soyadınız" name="adsoyad" type="text" class="form-control" >
                                                        </fieldset>
                                                        <fieldset><input type="hidden" name="uid" value="<?php echo $ro['u_id']; ?>"/></fieldset>
                                                        <fieldset>
                                                            <input placeholder="Email Adresiniz" name="eposta" type="email" class="form-control">
                                                        </fieldset>
                                                        <fieldset>
                                                            <input placeholder="Telefon Numaranız" name="telno" type="number" class="form-control">
                                                        </fieldset>
                                                        <fieldset>
                                                            <textarea placeholder="Mesajınız.." name="mesaj"></textarea>
                                                        </fieldset>
                                                        <fieldset>
                                                            <button class="btn btn-outline" type="submit" onclick="siparisver();"><i class="fa fa-paper-plane-o"
                                                                                                             aria-hidden="true"></i> Sipariş Et
                                                            </button>
                                                        </fieldset>
                                                    </form>

                                                </div>

                                                </div></div>
                                        </div>
                                    </div>
                                    <div class="product-description">
                                        <?php echo htmlspecialchars_decode($ro['u_icerik']); ?>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>

        </div>
        <section id="related-products">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-xs-10 section-heading-wrap text-left">
                        <h2 class="section-heading">Beğenilen Ürünlerimiz</h2>
                    </div>
                    <div class="col-sm-4 col-xs-2 text-right">
                        <a href="<?php echo $ayarrow['site_url']; ?>/#urunler" class="btn btn-ghost hidden-xs">Tüm Ürünlerimiz<i class="fa fa-chevron-right"></i></a>
                        <a href="#" class="btn btn-ghost btn-icon-only visible-xs-block"><i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
        <?php

        $benzersor = $db->prepare('SELECT * FROM urunler ORDER  BY rand() limit 6');
                                        $benzersor->execute();

                                        if ($benzersor->rowCount()) {
                                            foreach ($benzersor as $row) {
                                                ?>


                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <figure class="wow fadeIn">
                                    <img class="img-responsive" src="<?php echo $ayarrow['site_url'].$row['u_resim']; ?>" alt="themesnerd">
                                    <figcaption>
                                        <a href="oku.php?urun_bilgi=<?php echo $row['u_sef']; ?>">
                                            <p class="product-title"><?php echo $row['u_baslik']; ?></p>
                                            <h4 class="product-price"><span class="promo-price"><?php echo parayaz($row['u_fiyat']); ?></span></h4>
                                        </a>
                                    </figcaption>
                                </figure>
                            </div>









        <?php
                                            }
                                        } ?>
                </div>
            </div>
        </section>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
                                <symbol id="close" viewBox="0 0 18 18">
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
			S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
			l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
			c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
			s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z"/>
                                </symbol>
                            </svg>


                            <?php
                                    } ?>




                            <?php
                                } else {
                                header('location:404.php');
                            }

                            ?>
                            <script>popup = {
                                    init: function () {
                                        $('figure').click(function () {
                                            popup.open($(this));
                                        });

                                        $(document).on('click', '.popup img', function () {
                                            return false;
                                        }).on('click', '.popup', function () {
                                            popup.close();
                                        })
                                    },
                                    open: function ($figure) {
                                        $('.gallery').addClass('pop');
                                        $popup = $('<div class="popup" />').appendTo($('body'));
                                        $fig = $figure.clone().appendTo($('.popup'));
                                        $bg = $('<div class="bg" />').appendTo($('.popup'));
                                        $close = $('<div class="close"><svg><use xlink:href="#close"></use></svg></div>').appendTo($fig);
                                        $shadow = $('<div class="shadow" />').appendTo($fig);
                                        src = $('img', $fig).attr('src');
                                        $shadow.css({backgroundImage: 'url(' + src + ')'});
                                        $bg.css({backgroundImage: 'url(' + src + ')'});
                                        setTimeout(function () {
                                            $('.popup').addClass('pop');
                                        }, 10);
                                    },
                                    close: function () {
                                        $('.gallery, .popup').removeClass('pop');
                                        setTimeout(function () {
                                            $('.popup').remove()
                                        }, 100);
                                    }
                                }

                                popup.init()

                                //# sourceURL=pen.js
                            </script>
            </div>


    </section>
<?php require_once 'alt.php'; ?>