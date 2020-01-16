<?php

define("guvenlik", true);

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

                    <div class="well bs-component">
                        <script type="text/javascript">

                            function sguncelle() {

                                var feysbuk = $("input[name=feysbuk]").val();
                                feysbuk = $.trim(feysbuk);

                                var twitter = $("input[name=twitter]").val();
                                twitter = $.trim(twitter);

                                var instagram = $("input[name=instagram]").val();
                                instagram = $.trim(instagram);


                                if (feysbuk == "") {

                                    sweetAlert("HATA!", "Facebook Adresi Boş Bırakılamaz", "error");

                                } else {

                                    var deger = "feysbuk=" + feysbuk + "&twitter=" + twitter + "&instagram=" + instagram;


                                    $.ajax({

                                        type: "POST",
                                        url: "inc/sosyalguncelle.php",
                                        data: deger,
                                        success: function (sonuc) {

                                            if (sonuc == "hata") {

                                                sweetAlert('HATA', 'Ayarlar Güncellenemedi', 'error');

                                            } else if (sonuc == "bos") {

                                                sweetAlert('HATA', 'Boş Alan Bıraktınız', 'error');
                                            } else if (sonuc == "ok") {

                                                sweetAlert('Tebrikler', 'Ayarlar Başarıyla Güncellendi', 'success');
                                                setTimeout(function () {
                                                    window.location.href = "sosyalayar.php"
                                                }, 2000);
                                            }
                                        }
                                    })
                                }

                            }


                        </script>
                        <form action="" method="POST" class="form-horizontal" onsubmit="return false;">
                            <fieldset>
                                <legend>Sosyal Medya Ayarlar</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Facebook Adresiniz</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="feysbuk" id="inputEmail" type="text"
                                               value="<?php echo $ayarrow['site_facebook']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Twitter Adresiniz</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="twitter" id="inputEmail" type="text"
                                               value="<?php echo $ayarrow['site_twitter']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">İnstagram Adresiniz</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="instagram" id="inputEmail" type="text"
                                               value="<?php echo $ayarrow['site_instagram']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">

                                        <button class="btn btn-primary" onclick="sguncelle();" type="submit">Güncelle
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php require_once 'alt.php'; ?>