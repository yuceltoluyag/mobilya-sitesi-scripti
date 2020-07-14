<?php

define('guvenlik', true);

require_once 'ust.php';
require_once 'sol.php';

$sbul = $db->prepare('SELECT * FROM slider WHERE slider_id=:sid');
$sbul->execute([':sid' => $_GET['id']]);
$sicek = $sbul->fetch(PDO::FETCH_ASSOC);

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
                            $(document).ready(function() {

                                $("#sduzenle").on("submit", function(e) {


                                    e.preventDefault();

                                    $.ajax({

                                        url: "inc/sguncelle.php",
                                        type: "POST",
                                        data: new FormData(this),
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            var newData = JSON.parse(data);
                                            sweetAlert('İşlem Durumu', newData.message, newData.status);

                                            if (newData.status == "success"){
                                                setTimeout(function () {
                                                    window.location.href = "slider.php"
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
                                <legend>Slider Güncelleme Alanı</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Slider Başlık</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="siba"
                                               value="<?php echo $sicek['slider_ad']; ?>" id="inputEmail" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Slider Vurgu</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="sibav" value="<?php echo $sicek['slider_ne']; ?>"id="inputEmail" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Slider Açıklama</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="sibac" value="<?php echo $sicek['slider_aciklama']; ?>"id="inputEmail" type="text">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-lg-10">
                                        <input type="hidden" class="form-control" name="sliderid"
                                               value="<?php echo $sicek['slider_id']; ?>" id="inputEmail">
                                        <input type="hidden" class="form-control" name="resimsil"
                                               value="<?php echo $sicek['slider_resim']; ?>" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Slider Link</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="slink"
                                               value="<?php echo $sicek['slider_link']; ?>" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Slider Sıra</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="ssira"
                                               value="<?php echo $sicek['slider_sira']; ?>" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Slider Durum</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="select" name="sdurum">

                                            <?php if ($sicek['slider_durum'] == 1) {
    ?>

                                                <option value="1">Aktif</option>
                                                <option value="0">Pasif</option>

                                                <?php
} else {
        ?>
                                                <option value="0">Pasif</option>
                                                <option value="1">Aktif</option>
                                            <?php
    } ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Yüklü Resim</label>
                                    <div class="col-lg-10">
                                        <img class="img-responsive" src="<?php echo $ayarrow['site_url'].$sicek['slider_resim']; ?>" alt="">
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

                                        <button  class="btn btn-primary" type="submit">Slider Güncelle</button>

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
