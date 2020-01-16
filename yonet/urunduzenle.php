<?php

define("guvenlik", true);

require_once 'ust.php';
require_once 'sol.php';

$sbul = $db->prepare('SELECT * FROM urunler WHERE u_id=:sid');
$sbul->execute(array(':sid' => $_GET['id']));
$sicek = $sbul->fetch(PDO::FETCH_ASSOC);

if ($sicek) {


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

                                $("#uduzenle").on("submit", function(e) {


                                    e.preventDefault();

                                    $.ajax({

                                        url: "inc/uguncelle.php",
                                        type: "POST",
                                        data: new FormData(this),
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            var newData = JSON.parse(data);
                                            sweetAlert('İşlem Durumu', newData.message, newData.status);

                                            if (newData.status == "success"){
                                                setTimeout(function () {
                                                    window.location.href = "urunler.php"
                                                }, 3000);
                                            }


                                        }

                                    })
                                })

                            })

                        </script>
                        <form id="uduzenle" method="POST" class="form-horizontal"
                              enctype="multipart/form-data" onsubmit="return false;">
                            <fieldset>
                                <legend>Ürün Düzenleme Alanı</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Ürün Başlık</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="siba"
                                               value="<?php echo $sicek['u_baslik']; ?>" id="inputEmail" type="text">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Ürün Fiyatı</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="slink"
                                               value="<?php echo $sicek['u_fiyat']; ?>" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="textArea">Ürün Hakkında</label>
                                    <div class="col-lg-10">

                                        <textarea id="yucel"
                                                  name="urunhak"><?php echo htmlspecialchars_decode($sicek['u_icerik']); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Ürün Etiket</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="etiket"
                                               value="<?php echo $sicek['u_etiket']; ?>" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Yüklü Resim</label>
                                    <div class="col-lg-10">
                                        <img class="img-responsive" src="<?php echo  $ayarrow['site_url'].$sicek['u_resim']; ?>" alt="">
                                        <input type="hidden" class="form-control" name="resimsil"
                                               value="<?php echo $ayarrow['site_url'].$sicek['u_resim']; ?>" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Yeni Resim Eklemek
                                        İçin</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" type="file" name="sresim">
                                        <input type="hidden" class="form-control" name="urunid"
                                               value="<?php echo $sicek['u_id']; ?>" id="inputEmail">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Ürün Durum</label>
                                    <div class="col-lg-10">
                                        <select name="udurum" class="form-control" id="select">

                                            <option value="1" <?php echo $sicek['u_durum'] == 1 ? 'selected' : null; ?>>
                                                Onaylı
                                            </option>
                                            <option value="0" <?php echo $sicek['u_durum'] == 0 ? 'selected' : null; ?>>
                                                Onaylı Değil
                                            </option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">

                                        <button class="btn btn-primary" type="submit">Ürün Güncelle</button>

                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php } else {

    header('Location: urunler.php');
}
require_once 'alt.php'; ?>