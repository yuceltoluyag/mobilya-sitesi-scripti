<?php

define('guvenlik', true);

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
                            function menuekle() {
                                var deger = $('#menuekleform').serialize();
                                $.ajax({
                                    type: "POST",
                                    url: "inc/menuekle.php",
                                    data: deger,
                                    success: function (sonuc) {
                                        if (sonuc == "bos") {
                                            sweetAlert('HATA', 'Lütfen Boş Alan Bırakmayınız', 'error');
                                        } else if (sonuc == "hata") {
                                            sweetAlert('HATA', 'Menü Eklenirken bir hata oluştu', 'error');
                                        } else if (sonuc == "ok") {
                                            sweetAlert('Tebrikler', 'Menü Başarıyla Eklendi.', 'success');
                                            setTimeout(function () {
                                                window.location.href = "menu.php"
                                            }, 3000);
                                        }
                                    }
                                })
                            }
                        </script>
                        <form id="menuekleform" method="post" class="form-horizontal" onsubmit="return false;">
                            <fieldset>
                                <legend>Menü Ekle</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="select">Menü Tipi</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="menu_ust" id="select">
                                            <option value="00">Ana Menü</option>
                                            <?php
                                            $veri = $db->prepare('SELECT * FROM  menuler WHERE menu_durum="1"');
                                            $veri->execute([]);
                                            $v = $veri->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($v as $kat) {
                                                ?>
                                                <option value="<?php echo $kat['menu_id']; ?>"
                                                        onchange="java_script_:show(this.options[this.selectedIndex].value)"><?php echo $kat['menu_ad']; ?></option>
                                            <?php
                                            } ?>
                                        </select><br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Menü Sıra</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="menusira" id="inputEmail" type="number"
                                               placeholder="Menü Sıra Numarası">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Menü Adı</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="menuad" id="inputEmail" type="text"
                                               placeholder="Menü Ad">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Menü Url</label>
                                    <div class="col-lg-10">
                                        <select class="form-control"  name="menuurl"
                                                onchange="java_script_:show(this.options[this.selectedIndex].value)">
                                            <option value="0" selected=""> Diğer( Manuel Link Ekle )</option>
                                            <optgroup  label="Sayfalar">
                                                <?php
                                                $veri = $db->prepare('SELECT * FROM  sayfalar WHERE sayfa_durum="1"');
                                                $veri->execute([]);
                                                $v = $veri->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($v as $sayfa) {
                                                    ?>
                                                    <option value="<?php echo $sayfa['sayfa_seo']; ?>"><?php echo $sayfa['sayfa_adi']; ?></option>
                                                <?php
                                                } ?>
                                            </optgroup>
                                        </select>

                                        <div id="hiddenDiv" class="form-group">
                                            <div class="col-lg-10">
                                                <label><b>Bağlantı Adresi</b> ( Manuel Link Ekle )</label>
                                                <input class="form-control" name="menuurl" id="baba" type="text"  placeholder="Bağlantı Adresini Giriniz...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                                <script type="text/javascript">
                                    function show(aval) {
                                        $("input[id='baba']").attr("name","menuurl");
                                        if (aval == "0") {
                                            hiddenDiv.style.display = 'block';
                                            Form.fileURL.focus();
                                        }
                                        else {
                                            hiddenDiv.style.display = 'none';
                                            $("input[id='baba']").removeAttr('name');
                                        }
                                    }


                                </script>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="select">Durum</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="menudurum">
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>

                                        </select><br>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button onclick="menuekle();" class="btn btn-primary" type="submit">Menu Ekle
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
