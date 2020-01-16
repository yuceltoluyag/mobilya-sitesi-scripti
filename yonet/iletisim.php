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

                            function haritaekle() {

                                var deger = $('#harita').serialize();
                                $.ajax({

                                    type: "POST",
                                    url: "inc/haritaekle.php",
                                    data: deger,
                                    success: function (sonuc) {

                                        if (sonuc == "bos") {

                                            sweetAlert('HATA', 'Lütfen Boş Alan Bırakmayınız', 'error');
                                        } else if (sonuc == "hata") {

                                            sweetAlert('HATA', 'Harita Eklenirken Bir Hata Oluştu', 'error');
                                        } else if (sonuc == "ok") {

                                            sweetAlert('Tebrikler', 'İletişim Bilgileriniz Başarıyla Güncellendi.', 'success');
                                            setTimeout(function () {
                                                window.location.href = "iletisim.php"
                                            }, 3000);
                                        }
                                    }


                                })
                            }


                        </script>


                        <form id="harita" method="POST" class="form-horizontal" onsubmit="return false;">
                            <fieldset>
                                <legend>İletişim Ayarları</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Firma Adresiniz</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="adres" id="inputEmail" type="text"
                                               value="<?php echo $haritas['adres']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Firma Telefon
                                        Numarası</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="telefon" id="inputEmail" type="text"
                                               value="<?php echo $haritas['telefon']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Firma E-mail</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="email" id="inputEmail" type="text"
                                               value="<?php echo $haritas['email']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Firma Çalışma Saatleri</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="calisma" id="inputEmail" type="text"
                                               value="<?php echo $haritas['calisma']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Enlem</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="enlem" id="inputEmail" type="text"
                                               value="<?php echo $haritas['lat']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Boylam</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="boylam" id="inputEmail" type="text"
                                               value="<?php echo $haritas['lng']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Google Maps Api
                                        Anahtarınız</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="api" id="inputEmail" type="text"
                                               value="<?php echo $haritas['ggle_api']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">İletişim Mesajı</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="iust" id="inputEmail" type="text"
                                               value="<?php echo $haritas['iletisim_ust']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">İletişim Alt Açıklama</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="ialt" id="inputEmail" type="text"
                                               value="<?php echo $haritas['iletisim_alt']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">

                                        <button class="btn btn-primary" onclick="haritaekle();" type="submit">Güncelle
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