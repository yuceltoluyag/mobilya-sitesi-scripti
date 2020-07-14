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
                            $(document).ready(function() {

                                $("#sliderekleform").on("submit", function(e) {


                                    e.preventDefault();

                                    $.ajax({

                                        url: "inc/sekle.php",
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
                        <div class="well bs-component">
                            <form id="sliderekleform" method="POST" class="form-horizontal"
                                  enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Slider Ekle</legend>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Slider Başlık</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="siba" id="inputEmail" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Slider Vurgu</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="sibav" id="inputEmail" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Slider Açıklama</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="sibac" id="inputEmail" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Slider Link</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="slink" id="inputEmail">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Slider Sıra</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="ssira" id="inputEmail">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Slider Durum</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" id="select" name="sdurum">
                                                <option value="1">Aktif</option>
                                                <option value="0">Pasif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Slider Resim</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="file" name="sresim">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">

                                            <button class="btn btn-primary" type="submit">Slider Ekle</button>

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