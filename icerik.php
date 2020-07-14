<?php !defined('guvenlik') ? die('Erişim Yetkiniz Yok') : null; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="col-sm-9 sidebar_right_div">
    <div class="cssload-jumping load_more hide">
        <span></span><span></span><span></span><span></span><span></span>
    </div>
    <?php
    $popup = $db->prepare('SELECT * FROM reklamlar');
    $popup->execute();
    $reklam = $popup->fetch(PDO::FETCH_OBJ);
    if ($reklam->reklam_onay == '1') {
        setcookie('reklam', $reklam->reklam_baslik, strtotime('+'.$reklam->reklam_zaman.' hours'), '/', null, null, true);
    }
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h5 id="sayac" class="text-center"></h5>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $reklam->reklam_baslik; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-responsive img-thumbnail"
                         src="<?php echo $ayarrow['site_url'].$reklam->reklam_resim; ?>"
                    <p class="p-1"><?php echo $reklam->reklam_icerik; ?></p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary btn-xs font-bold" href="<?php echo $reklam->reklam_url; ?>">Detaylar</a>
                </div>
            </div>
        </div>
    </div>
    <?php

    if ($reklam->reklam_onay == '1' and !isset($_COOKIE['reklam'])) { ?>
        <script>
            $().ready(function () {
                $("#exampleModal").modal("show");
                var sure =<?php echo $reklam->reklam_sure; ?>;
                var zamanla = setInterval(function () {
                    sure--;
                    $("#sayac").html("Reklam " + sure + " Sonra Kapanacaktır")
                    if (sure == 0) {
                        clearInterval(zamanla);
                        $("#exampleModal").modal("hide");
                        $(".close").click(function () {
                            clearInterval(zamanla);
                        });
                    }
                }, 1000);
            });


        </script>
    <?php } ?>
    <div id="urunler"></div>
    <div class="row grid_row list_page">

        <!-- Ürünleri Listeleme Alanı-->

        <div id="yuklenecek"></div>
        <div id="sonuc" class="font-weight-bold text-white text-center  mb-2 p-3"></div>


        <script>


            $( document ).ready(function() {
            var basla = 0;
            var sayfada = 4;


            sayfa_yukle(sayfada, basla);

            function sayfa_yukle(sayfada, basla) {
                $.ajax({
                    url: "yukle.php",
                    method: "POST",
                    async: true,
                    data: {sayfada: sayfada, basla: basla},
                    success: function (sonuc) {
                        $("#yuklenecek").append(sonuc);
                        if (sonuc == "") {
                            $('#sonuc').removeCookie();
                        } else {
                            $("#sonuc").html("Ürünler yükleniyor...");
                            $('#sonuc').remove();
                        }
                    }
                });
            }

                $(window).scroll(function () {
                         var scroololc =$(document).height() - $(window).height() - $(window).scrollTop();

                    if (scroololc <= 400) {
                        basla = basla + sayfada;
                        sayfa_yukle(sayfada, basla);

                    }


            });
            });
        </script>

    </div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>