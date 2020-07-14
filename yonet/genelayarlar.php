<?php

define('guvenlik', true);

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

                            function ayarguncelle() {

                                var surl = $("input[name=surl]").val();
                                surl = $.trim(surl);

                                var sibas = $("input[name=sibas]").val();
                                sibas = $.trim(sibas);

                                var sinah = $("input[name=sinah]").val();
                                sinah = $.trim(sinah);

                                var sicak = $("input[name=sicak]").val();
                                sicak = $.trim(sicak);

                                var sitehak = $("textarea[name=sitehak]").val();
                                sitehak = $.trim(sitehak);


                                if (surl == "") {

                                    sweetAlert("HATA!", "URL Boş Bırakılamaz", "error");

                                } else {


                                    var deger = "surl=" + surl + "&sibas=" + sibas + "&sinah=" + sinah + "&sicak=" + sicak + "&sitehak=" + sitehak;


                                    $.ajax({

                                        type: "POST",
                                        url: "inc/ayarguncelle.php",
                                        data: deger,
                                        success: function (sonuc) {

                                            if (sonuc == "hata") {

                                                sweetAlert('HATA', 'Ayarlar Güncellenemedi', 'error');

                                            } else if (sonuc == "bos") {

                                                sweetAlert('HATA', 'Boş Alan Bıraktınız', 'error');
                                            } else if (sonuc == "ok") {

                                                sweetAlert('Tebrikler', 'Ayarlar Başarıyla Güncellendi', 'success');
                                                setTimeout(function () {
                                                    window.location.href = "genelayarlar.php"
                                                }, 2000);
                                            }
                                        }
                                    })
                                }

                            }


                        </script>
                        <form action="" method="POST" class="form-horizontal" onsubmit="return false;">
                            <fieldset>
                                <legend>Genel Ayarlar</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Site Adresi</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="surl" id="inputEmail" type="text"
                                               value="<?php echo $ayarrow['site_url']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Site Başlık</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="sibas" id="inputEmail" type="text"
                                               value="<?php echo $ayarrow['site_baslik']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Site Anahtar Kelime</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="sinah" id="inputEmail" type="text"
                                               value="<?php echo $ayarrow['site_anahtarkelime']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Site Açıklama</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="sicak" id="inputEmail" type="text"
                                               value="<?php echo $ayarrow['site_aciklama']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="textArea">Site Hakkında</label>
                                    <div class="col-lg-10">

                                        <textarea id="yucel"
                                                  name="sitehak"><?php echo htmlspecialchars_decode($ayarrow['site_hakkinda']); ?></textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">

                                        <button class="btn btn-primary" onclick="ayarguncelle();" type="submit">
                                            Güncelle
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