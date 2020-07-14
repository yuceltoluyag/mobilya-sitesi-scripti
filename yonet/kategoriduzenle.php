<?php

define('guvenlik', true);

require_once 'ust.php';
require_once 'sol.php';
$kid = $_GET['id'];

$veri = $db->prepare("SELECT * FROM  kategoriler WHERE kat_id='$kid'");
$veri->execute([]);
$v = $veri->fetchAll(PDO::FETCH_ASSOC);
foreach ($v as $kat);
$k_ust = $kat['kat_ust'];

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
                            function katduzenle() {

                                var deger = $('#katduzenle').serialize();
                                $.ajax({

                                    type: "POST",
                                    url: "inc/katguncelle.php",
                                    data: deger,
                                    success: function (sonuc) {

                                        if (sonuc == "bos") {

                                            sweetAlert('HATA', 'Lütfen Boş Alan Bırakmayınız', 'error');
                                        } else if (sonuc == "hata") {

                                            sweetAlert('HATA', 'Kategori Güncellenirken Bir HATA Oluştu', 'error');
                                        } else if (sonuc == "ok") {

                                            sweetAlert('Tebrikler', 'Kategori Başarıyla Güncellendi.', 'success');
                                            setTimeout(function () {
                                                window.location.href = "kategoriler.php"
                                            }, 3000);
                                        }
                                    }


                                })
                            }
                        </script>
                        <form id="katduzenle" method="POST" class="form-horizontal" onsubmit="return false;">
                            <fieldset>
                                <legend>Kategori Düzenle</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Kategori Adı</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="kategoriad" value="<?php echo $kat['kat_adi']; ?>" id="inputEmail" type="text">
                                        <input type="hidden" class="form-control" name="katid"
                                               value="<?php echo $kat['kat_id']; ?>" id="inputEmail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="textArea">Kategori Açıklaması</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="kataciklama" id="textArea" rows="3"><?php echo $kat['kat_aciklama']; ?></textarea>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Kategori Anahtar Kelimeler</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="katdesc" value="<?php echo $kat['kat_desc']; ?>" id="inputEmail" type="text">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="select">Kategori Tipi</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="kategori_ust">

                                            <option value="00">Ana Kategori</option>
                                            <?php

                                            $veri = $db->prepare('SELECT * FROM  kategoriler WHERE kat_durum="1"');
                                            $veri->execute([]);
                                            $v = $veri->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($v as $cat) {
                                                $kate_id = $cat['kat_id']; ?>
                                                <option <?php echo $kate_id == $k_ust ? 'selected' : ''; ?> value="<?php echo $cat['kat_id']; ?>"><?php echo $cat['kat_adi']; ?></option>


                                            <?php
                                            } ?>
                                        </select><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="select">Durum</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="kategoridurum">
                                            <option value="1" <?php echo $kat['kat_durum'] == 1 ? 'selected' : null; ?>>Onaylı</option>
                                            <option value="0" <?php echo $kat['kat_durum'] == 0 ? 'selected' : null; ?>>Onaylı Değil</option>

                                        </select><br>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">

                                        <button onclick="katduzenle();" class="btn btn-primary" type="submit">Güncelle
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
