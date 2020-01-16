<?php

define("guvenlik", true);

require_once 'ust.php';
require_once 'sol.php';

?>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

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
                                $(document).ready(function() {

                                    $("#urunekleform").on("submit", function(e) {


                                        e.preventDefault();

                                        $.ajax({

                                            url: "inc/urunekle.php",
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

                            <form id="urunekleform" method="POST" class="form-horizontal"
                                  enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Ürün Ekleme Sayfası</legend>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Ürün Başlığı</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="ubas" id="inputEmail" type="text" placeholder="Ürün Adı Giriniz">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Ürün Fiyat</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" placeholder="Sadece Rakam Yazınız" name="ufiyat"
                                                   onkeyup="javascript:this.value=ParaFormat(this.value);" id="inputEmail" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Kategoriler</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" id="select" name="kategoriler">
                                                <?php
                                                $kat = $db->prepare('SELECT * FROM kategoriler  ORDER BY kat_adi ASC');
                                                $kat->execute();
                                                if ($kat->rowCount()) {
                                                    foreach ($kat as $k) {
                                                        echo '<option value="' . $k['kat_id'] . '">' . $k ['kat_adi'] . '</option> ';
                                                    }

                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Resim Anasayfa</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="file" name="uresim">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="textArea">Ürün İçerik</label>
                                        <div class="col-lg-10">
                                            <textarea id="yucel" name="uicerik"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Ürün Etiket</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="uetiket"
                                                   placeholder="Her kelime arasına virgül atmayı unutmayınız. Örneğin mobilya,sandalye vb ;)"
                                                   id="inputEmail" type="text">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">

                                            <button  class="btn btn-primary" type="submit">Ürün Ekle</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require_once 'alt.php'; ?>