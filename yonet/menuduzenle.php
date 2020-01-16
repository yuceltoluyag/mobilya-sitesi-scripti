<?php

define("guvenlik", true);

require_once 'ust.php';
require_once 'sol.php';
$kid = $_GET['id'];

$veri = $db->prepare("SELECT * FROM  menuler WHERE menu_id='$kid'");
$veri->execute(array());
$v = $veri->fetchAll(PDO::FETCH_ASSOC);
foreach ($v as $kat) ;
$k_ust = $kat['menu_ust'];

?>


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
                            function menuduzenle() {

                                var deger = $('#menuduzenle').serialize();
                                $.ajax({

                                    type: "POST",
                                    url: "inc/menuguncelle.php",
                                    data: deger,
                                    success: function (sonuc) {

                                        if (sonuc == "bos") {

                                            sweetAlert('HATA', 'Lütfen Boş Alan Bırakmayınız', 'error');
                                        } else if (sonuc == "hata") {

                                            sweetAlert('HATA', 'Menü Güncellenirken Bir HATA Oluştu', 'error');
                                        } else if (sonuc == "ok") {

                                            sweetAlert('Tebrikler', 'Menü Başarıyla Güncellendi.', 'success');
                                            setTimeout(function () {
                                                window.location.href = "menu.php"
                                            }, 3000);
                                        }
                                    }


                                })
                            }
                        </script>
                        <form id="menuduzenle" method="POST" class="form-horizontal" onsubmit="return false;">
                            <fieldset>
                                <legend>Menü Düzenle</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Menü Adı</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="menuad" value="<?php echo $kat['menu_ad']; ?>" id="inputEmail" type="text">
                                        <input type="hidden" class="form-control" name="menuid"
                                               value="<?php echo $kat['menu_id']; ?>" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Menü Url</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="menuurl" value="<?php echo $kat['menu_url']; ?>" id="inputEmail" type="text">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Menü Sıra</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="menusira" value="<?php echo $kat['menu_sira']; ?>" id="inputEmail" type="number" placeholder="Menü Sıra Numarası">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="select">Menü Tipi</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="menu_ust">

                                            <option value="00">Ana Menü</option>
                                            <?php

                                            $veri = $db->prepare('SELECT * FROM  menuler WHERE menu_durum="1"');
                                            $veri->execute(array());
                                            $v = $veri->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($v as $cat) {
                                                $kate_id = $cat['menu_id'];
                                                ?>
                                                <option <?php echo $kate_id == $k_ust ? 'selected' : ''; ?> value="<?php echo $cat['menu_id']; ?>"><?php echo $cat['menu_ad']; ?></option>


                                            <?php } ?>
                                        </select><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="select">Durum</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="menudurum">
                                            <option value="1" <?php echo $kat['menu_durum'] == 1 ? 'selected' : null; ?>>Onaylı</option>
                                            <option value="0" <?php echo $kat['menu_durum'] == 0 ? 'selected' : null; ?>>Onaylı Değil</option>

                                        </select><br>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">

                                        <button onclick="menuduzenle();" class="btn btn-primary" type="submit">Güncelle
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