<?php

define('guvenlik', true);

require_once 'ust.php';
require_once 'sol.php';

$sbul = $db->prepare('SELECT * FROM sayfalar WHERE sayfa_id=:sid');
$sbul->execute([':sid' => $_GET['id']]);
$sicek = $sbul->fetch(PDO::FETCH_ASSOC);

?>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

    <div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <a class="btn btn-warning edit" style="float:right;" href="sayfalar.php"><i class="fa fa-undo">Geri
                            Git</i></a>
                    <div class="well bs-component">
                        <script type="text/javascript">
                            $(document).ready(function() {

                                $("#sduzenle").on("submit", function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url: "inc/sayfaguncelle.php",
                                        type: "POST",
                                        data: new FormData(this),
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            var newData = JSON.parse(data);
                                            sweetAlert('İşlem Durumu', newData.message, newData.status);

                                            if (newData.status == "success"){
                                                setTimeout(function () {
                                                    window.location.href = "sayfalar.php"
                                                }, 3000);
                                            }


                                        }

                                    })
                                })

                            })

                        </script>

                        <form id="sduzenle" method="POST" class="form-horizontal"
                              enctype="multipart/form-data" onsubmit="return false;">
                            <fieldset>
                                <legend>Sayfa Güncelleme Alanı</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Sayfa Başlık</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="siba"
                                               value="<?php echo $sicek['sayfa_adi']; ?>" id="inputEmail" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="textArea">Sayfa İçerik</label>
                                    <div class="col-lg-10">

                                        <textarea id="yucel"
                                                  name="sayfahak"><?php echo htmlspecialchars_decode($sicek['sayfa_icerik']); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-lg-10">
                                        <input type="hidden" class="form-control" name="sayfaid"
                                               value="<?php echo $sicek['sayfa_id']; ?>" id="inputEmail">
                                        <input type="hidden" class="form-control" name="resimsil"
                                               value="<?php echo $sicek['sayfa_resim']; ?>" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Sayfa Etiket</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="setiket"
                                               value="<?php echo $sicek['sayfa_etiket']; ?>" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Sayfa Açıklama</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="sdesc"
                                               value="<?php echo $sicek['sayfa_desc']; ?>" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Sayfa Sıra</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="ssira"
                                               value="<?php echo $sicek['sayfa_sira']; ?>" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Sayfa Durum</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="select" name="sdurum">

                                            <?php if ($sicek['sayfa_durum'] == 1) { ?>

                                                <option value="1">Aktif</option>
                                                <option value="0">Pasif</option>

                                                <?php
                                            } else { ?>
                                                <option value="0">Pasif</option>
                                                <option value="1">Aktif</option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Yüklü Resim</label>
                                    <div class="col-lg-10">
                                        <img class="img-responsive" src="<?php echo $ayarrow['site_url'].$sicek['sayfa_resim']; ?>" alt="">
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

                                        <button  class="btn btn-primary" type="submit">Sayfa Güncelle</button>

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