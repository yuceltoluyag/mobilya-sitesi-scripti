<?php

define("guvenlik", true);

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

                                $("#sayfaekleform").on("submit", function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url: "inc/sayfaekle.php",
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
                        <div class="well bs-component">
                            <form id="sayfaekleform" method="POST" class="form-horizontal"
                                  enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Sayfa Ekle</legend>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Sayfa Başlık</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="siba" id="inputEmail" type="text" placeholder="Sayfa Başlığı Giriniz">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="textArea">Sayfa İçerik</label>
                                        <div class="col-lg-10">
                                        <textarea id="yucel"
                                                  name="sayfahak"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Sayfa Etiket</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="setiket" id="inputEmail" type="text" placeholder="İçerikle alakalı etiket giriniz.Örn elma,armut">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Sayfa Desc</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="sdesc" id="inputEmail" placeholder="Sayfa içeriğinizi bir cümle ile anlatın">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Sayfa Sıra</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="ssira" type="number" id="inputEmail" placeholder="Kaçıncı sırada istersiniz ?">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Sayfa Durum</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" id="select" name="sdurum">
                                                <option value="1">Aktif</option>
                                                <option value="0">Pasif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Sayfa Resim</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="file" name="sresim">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">

                                            <button class="btn btn-primary" type="submit">Sayfa Ekle</button>
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