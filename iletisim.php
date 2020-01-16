<?php
define('guvenlik', true);
require_once("ust.php");
require_once("navi.php");
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<header class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="header-title">İletişim</h2>
            </div>
        </div>
    </div>
</header>

<script type="text/javascript">

    function mesajyolla() {

        var deger = $('#mesajform').serialize();
        $.ajax({

            type: "POST",
            url: "inc/mesajgonder.php",
            data: deger,
            success: function (sonuc) {

                if (sonuc == "bos") {

                    sweetAlert('HATA', 'Lütfen Boş Alan Bırakmayınız', 'error');
                } else if (sonuc == "hata") {

                    sweetAlert('HATA', 'Mesaj gönderilirken bir hata oluştu', 'error');
                }
                else if (sonuc == "ok") {

                    sweetAlert('Tebrikler', 'Mesajınız Başarıyla Gönderildi.', 'success');
                    setTimeout(function () {
                        window.location.href = "iletisim.php"
                    }, 3000);
                }
            }


        })
    }


</script>

<section id="contact-form-section">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h2 class="section-heading">Görüşleriniz Bizim İçin Değerlidir</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <form id="mesajform" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <input name="adsoyad" type="text" class="form-control" placeholder="Adınız Soyadınız"/>
                        <label>Telefon Numaranız</label>
                        <input name="telefon" type="number" class="form-control" placeholder="Telefon Numaranız"/>
                        <label>Mesajınız</label>
                        <textarea name="mesaj" class="" placeholder="Bize iletmek istedikleriniz"></textarea>
                        <button type="submit" onclick="mesajyolla();" class="btn btn-outline">Gönder</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6 col-sm-12">
                <p class="mb-10"><i class="fa fa-map"> <?php echo $haritas['adres']; ?></i></p>
                <p class="mb-10"><i class="fa fa-phone"> <?php echo $haritas['telefon']; ?></i></p>
                <p class="mb-10"><i class="fa fa-envelope"> <?php echo $haritas['email']; ?></i></p>
                <p class="mb-10"><i class="fa fa-clock-o"> <?php echo $haritas['calisma']; ?></i></p>
            </div>
            <div class="col-md-6 visible-md visible-lg">
                <img class="img-responsive text-center" src="img/hero-25.png" alt="iletişim">
            </div>

        </div>

    </div>
    <div class="row col-lg-12 center-block">
        <div class="map-area">
            <div id="map">


            </div>


        </div>
    </div>
</section>
<script>

    function initMap() {

        var options = {
            zoom: 14,
            <?php
            $a = $haritas["lat"];
            $b = $haritas["lng"];

            echo 'center: {lat: ' . $a . ', lng: ' . $b . '},';
            ?>

            mapTypeId: 'roadmap'

        };

        var map = new google.maps.Map(document.getElementById('map'), options);

        var marker = new google.maps.Marker({

            <?php
            $a = $haritas["lat"];
            $b = $haritas["lng"];

            echo 'position: {lat: ' . $a . ', lng: ' . $b . '},';
            ?>
            map: map

        });

        var infoWindow = new google.maps.InfoWindow({

            <?php

            $c = $haritas['adres'];
            $d = $haritas['telefon'];

            echo "content: '<h2>.$c.</h2><span>Telefon Numaramız : $d</span>'";




            ?>


        });

        marker.addListener('click', function () {

            infoWindow.open(map, marker);
        });

    }

</script>

<script src="js/jquery.ui.map.full.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $haritas['ggle_api']; ?>&callback=initMap"
        async defer></script>
<?php require_once 'alt.php'; ?>
