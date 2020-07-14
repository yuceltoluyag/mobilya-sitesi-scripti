<?php
define('guvenlik', true);
require_once 'ust.php';
require_once 'sol.php';
?>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $("#reklamekleform").on("submit", function (e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url: "inc/rekle.php",
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
                        <div class="well bs-component">
                            <form id="reklamekleform" method="POST" class="form-horizontal"
                                  enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Reklam Ekle</legend>
                                    <div class="alert alert-dismissable alert-info">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Bilgi!</strong> Bir Adetten Fazla Reklam Eklemeyiniz.
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Reklam Başlık</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="riba" id="inputEmail" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Reklam Açıklama</label>
                                        <div class="col-lg-10">
                                            <textarea id="yucel" name="racik"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Reklam Süre</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="rsure" type="number" id="inputEmail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Reklam Url</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="rurl" id="inputEmail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Reklam Resim</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="file" name="rresim">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Ürün Durum</label>
                                        <div class="col-lg-10">
                                            <select name="rdurum" class="form-control" id="select">

                                                <option value="1">
                                                    Onaylı
                                                </option>
                                                <option value="0">
                                                    Onaylı Değil
                                                </option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Reklam zaman</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="resaat" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button class="btn btn-primary" type="submit">Reklam Ekle</button>
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
