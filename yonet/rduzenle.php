<?php
define('guvenlik', true);
require_once 'ust.php';
require_once 'sol.php';
$sbul = $db->prepare('SELECT * FROM reklamlar WHERE reklam_id=:sid');
$sbul->execute([':sid' => $_GET['id']]);
$reklam = $sbul->fetch(PDO::FETCH_ASSOC);

?>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <a class="btn btn-warning edit" style="float:right;" href="slider.php"><i class="fa fa-undo">Geri
                                Git</i></a>
                        <div class="well bs-component">
                            <script type="text/javascript">
                                $(document).ready(function () {

                                    $("#rduzenle").on("submit", function (e) {
                                        e.preventDefault();
                                        $.ajax({
                                            url: "inc/rguncelle.php",
                                            type: "POST",
                                            data: new FormData(this),
                                            contentType: false,
                                            processData: false,
                                            success: function (data) {
                                                var newData = JSON.parse(data);
                                                sweetAlert('İşlem Durumu', newData.message, newData.status);
                                                if (newData.status == "success") {
                                                    setTimeout(function () {
                                                        window.location.href = "reklamlar.php"
                                                    }, 3000);
                                                }
                                            }
                                        })
                                    })
                                })

                            </script>

                            <form id="rduzenle" method="POST" class="form-horizontal"
                                  enctype="multipart/form-data" onsubmit="return false;">
                                <fieldset>
                                    <legend>Reklam Güncelleme Alanı</legend>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Reklam Başlık</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="riba"
                                                   value="<?php echo $reklam['reklam_baslik']; ?>" id="inputEmail"
                                                   type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Reklam Açıklama</label>
                                        <div class="col-lg-10">
                                            <textarea id="yucel"
                                                      name="racik"><?php echo $reklam['reklam_icerik']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Yüklü Resim</label>
                                        <div class="col-lg-10">
                                            <img class="img-responsive"
                                                 src="<?php echo $ayarrow['site_url'].$reklam['reklam_resim']; ?>"
                                                 alt="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Reklam Süre</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="resur"
                                                   value="<?php echo $reklam['reklam_sure']; ?>" id="inputEmail"
                                                   type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Reklam zaman</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="resaat"
                                                   value="<?php echo $reklam['reklam_zaman']; ?>" id="inputEmail"
                                                   type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Reklam Link</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="rlink"
                                                   value="<?php echo $reklam['reklam_url']; ?>" id="inputEmail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <input type="hidden" class="form-control" name="reklamid"
                                                   value="<?php echo $reklam['reklam_id']; ?>" id="inputEmail">
                                            <input type="hidden" class="form-control" name="reklamsil"
                                                   value="<?php echo $reklam['reklam_resim']; ?>" id="inputEmail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Ürün Durum</label>
                                        <div class="col-lg-10">
                                            <select name="rdurum" class="form-control" id="select">

                                                <option value="1" <?php echo $reklam['reklam_onay'] == 1 ? 'selected' : null; ?>>
                                                    Onaylı
                                                </option>
                                                <option value="0" <?php echo $reklam['reklam_onay'] == 0 ? 'selected' : null; ?>>
                                                    Onaylı Değil
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Yeni Resim Eklemek
                                            İçin</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="file" name="sresim">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button class="btn btn-primary" type="submit">Reklam Güncelle</button>
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