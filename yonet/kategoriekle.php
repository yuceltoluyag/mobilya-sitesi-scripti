<?php

define("guvenlik", true);

require_once 'ust.php';
require_once 'sol.php';

?>
    <div class="content-wrapper">
    <div class="row">
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
        <div class="col-md-12">
            <div class="card">

                <div class="row">

                    <div class="well bs-component">
                        <script type="text/javascript">
                            function katekle() {

                                var deger = $('#kategoriekleform').serialize();
                                $.ajax({

                                    type: "POST",
                                    url: "inc/katekle.php",
                                    data: deger,
                                    success: function (sonuc) {

                                        if (sonuc == "bos") {

                                            sweetAlert('HATA', 'Lütfen Boş Alan Bırakmayınız', 'error');
                                        } else if (sonuc == "hata") {

                                            sweetAlert('HATA', 'Kategori Eklenirken bir hata oluştu', 'error');
                                        } else if (sonuc == "ok") {

                                            sweetAlert('Tebrikler', 'Kategori Başarıyla Eklendi.', 'success');
                                            setTimeout(function () {
                                                window.location.href = "kategoriler.php"
                                            }, 3000);
                                        }
                                    }


                                })
                            }
                        </script>
                        <form id="kategoriekleform" method="post" class="form-horizontal" onsubmit="return false;">
                            <fieldset>
                                <legend>Kategori Ekle</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Kategori Adı</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="katadi" id="inputEmail" type="text" placeholder="Kategori Başlığını Giriniz">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="textArea">Kategori Açıklaması</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="kataciklama" id="textArea" rows="3" placeholder="Bir Cümle İle Kategorinizi Açıklayınız"></textarea>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Kategori Anahtar Kelimeler</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="katanahtar" id="inputEmail" type="text" placeholder="Kategori Anahtar Kelimelerini Virgül Kullanarak Giriniz.Elma,Armut gibi">

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="select">Kategori Tipi</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="kategori_ust" id="select">
                                            <option value="00">Ana Kategori</option>

                                            <?php

                                            $veri = $db->prepare('SELECT * FROM  kategoriler WHERE kat_durum="1"');
                                            $veri->execute(array());
                                            $v = $veri->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($v as $kat) {
                                                ?>

                                                <option value="<?php echo $kat['kat_id']; ?>"><?php echo $kat['kat_adi']; ?></option>


                                            <?php } ?>
                                        </select><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="select">Durum</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="kategoridurum">
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>

                                        </select><br>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button onclick="katekle();" class="btn btn-primary" type="submit">Kategori Ekle</button>
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