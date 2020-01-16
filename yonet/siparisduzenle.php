<?php
define("guvenlik", true);
require_once 'ust.php';
require_once 'sol.php';
$sid = $_GET['id'];
$urun = $db->prepare('SELECT * FROM urunler
                       INNER JOIN siparisler on siparisler.s_urunid = urunler.u_id WHERE sip_id=?');
$urun->execute(array($sid));
$row = $urun->fetch(PDO::FETCH_ASSOC);
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
                            function sipguncelle() {

                                var deger = $('#sipduzenle').serialize();
                                $.ajax({

                                    type: "POST",
                                    url: "inc/siparisguncelle.php",
                                    data: deger,
                                    success: function (sonuc) {

                                        if (sonuc == "bos") {

                                            sweetAlert('HATA', 'Lütfen Boş Alan Bırakmayınız', 'error');
                                        } else if (sonuc == "hata") {

                                            sweetAlert('HATA', 'Sipariş Güncellenirken Bir HATA Oluştu', 'error');
                                        } else if (sonuc == "ok") {

                                            sweetAlert('Tebrikler', 'Sipariş Başarıyla Güncellendi.', 'success');
                                            setTimeout(function () {
                                                window.location.href = "siparisler.php"
                                            }, 3000);
                                        }
                                    }


                                })
                            }
                        </script>
                        <form action="" id="sipduzenle" method="POST" class="form-horizontal"  onsubmit="return false;">
                            <fieldset>
                                <legend>Sipariş Düzenle</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Ad Soyad</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="sipad" id="disabledInput" type="text"
                                               value="<?php echo $row['s_adsoy']; ?>" disabled>
                                        <input class="form-control" type="hidden" name="siparisid"  value="<?php echo $row['sip_id'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">S-Eposta</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="siposta" id="inputEmail" type="text"
                                               value="<?php echo $row['s_eposta']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Sipariş Telefon</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="siptel" id="inputEmail" type="text"
                                               value="<?php echo $row['s_tel']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Sipariş Mesajı</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="sipmesaj" id="inputEmail" type="text"
                                               value="<?php echo $row['s_mesaj']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Hangi Ürünü</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="sipbas" id="inputEmail" type="text"
                                               value="<?php echo $row['u_baslik']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Ürün Durum</label>
                                    <div class="col-lg-10">
                                        <select name="sdurum" class="form-control" id="select">

                                            <option value="1" <?php echo $row['s_durum'] == 'Beklemede' ? 'selected' : null; ?>>
                                                Beklemede
                                            </option>
                                            <option value="2" <?php echo $row['s_durum'] == 'Tedarik Sürecinde' ? 'selected' : null; ?>>
                                                Tedarik Sürecinde
                                            </option>
                                            <option value="3" <?php echo $row['s_durum'] == 'Kargoya Verildi' ? 'selected' : null; ?>>
                                                Kargoya Verildi
                                            </option>
                                            <option value="4" <?php echo $row['s_durum'] == 'Tamamlandı' ? 'selected' : null; ?>>
                                                Tamamlandı
                                            </option>
                                            <option value="5" <?php echo $row['s_durum'] == 'İptal Edildi' ? 'İptal Edildi' : null; ?>>
                                                İptal Edildi
                                            </option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">

                                        <button onclick="sipguncelle();" class="btn btn-primary" type="submit">
                                            Güncelle
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
