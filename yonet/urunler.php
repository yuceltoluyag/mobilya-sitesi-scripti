<?php

define('guvenlik', true);

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
                <a class="btn btn-info edit" style="float:right;" href="urunekle.php"><i class="fa fa-plus">Ürün
                        Ekle</i></a>
                <table class="table table-striped">
                    <div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>Dikkat!</strong> Onaysız ürünler en başta ve renkli görünür.
                    </div>
                    <thead>

                    <tr class="row-name">
                        <th>Başlık</th>
                        <th>Fiyat</th>
                        <th>Tarih</th>
                        <th>Ekleyen</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $s = @intval($_GET['s']);
                    if (!$s) {
                        $s = 1;
                    }

                    $urun = $db->prepare('SELECT * FROM urunler');
                    $urun->execute();
                    $turun = $urun->rowCount();
                    $lim = $ayarrow['site_sayfalama'];
                    $goster = $s * $lim - $lim;

                    $urun = $db->prepare('SELECT * FROM urunler
           INNER JOIN kategoriler on kategoriler.kat_id = urunler.u_katid
           INNER JOIN uyeler on      uyeler.uye_id      = urunler.u_ekleyen
           ORDER BY u_durum ASC LIMIT :goster,:lim');

                    $urun->bindValue(':goster', (int) $goster, PDO::PARAM_INT);
                    $urun->bindValue(':lim', (int) $lim, PDO::PARAM_INT);
                    $urun->execute();

                    if ($urun->rowCount()) {
                        foreach ($urun as $row) {
                            ?>

                            <tr style="<?php if ($row['u_durum'] == 0) {
                                echo 'background-color:#FCF8E3;';
                            } ?>" class="row-content">
                                <td><?php echo $row['u_baslik']; ?></td>
                                <td><?php echo $row['u_fiyat']; ?></td>
                                <td><?php echo $row['u_tarih']; ?></td>
                                <td><?php echo $row['uye_adi']; ?></td>
                                <td>
                                    <a class="btn btn-info edit"
                                       href="islemler.php?islem=galeriekle&id=<?php echo $row['u_id']; ?>"> <i
                                                class="fa fa-camera"></i></a>
                                    <a class="btn btn-info edit"
                                       href="islemler.php?islem=urunduzenle&id=<?php echo $row['u_id']; ?>"
                                       aria-label="Settings">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>


 <a class="btn btn-danger danger" data-urunsil-id="<?php echo $row['u_id']; ?>"> <i class="fa fa-trash-o"></i> </a></td>

                                <script type="text/javascript">

                                    $('a.btn-danger').click(function() {
                                        var urunid = $(this).attr("data-urunsil-id");
                                        urunsil(urunid);

                                    });

                                    function urunsil(urunid) {
                                        swal({
                                            title: "Emin misiniz?",
                                            text: "Bu Slideri silmek istediğinizden emin misiniz?",
                                            type: "warning",
                                            showCancelButton: true,
                                            closeOnConfirm: false,
                                            confirmButtonText: "Evet, Onaylıyorum!",
                                            cancelButtonText : "Geri Git",
                                            html : "false"
                                        }, function() {
                                            $.ajax({
                                                url: "urunsil.php?islem=urunsil&id=" + urunid,
                                                type: "DELETE"
                                            })
                                                .done(function(data) {
                                                    swal("Silindi!", "Ürün Tamamen Silindi!", "success");
                                                    setTimeout(function () {
                                                        window.location.href = "urunler.php"
                                                    }, 3000);
                                                })
                                                .error(function(data) {
                                                    swal("Oops", "Bir Hata Oluştu,Ürün Silinemedi!", "error");
                                                    setTimeout(function () {
                                                        window.location.href = "urunler.php"
                                                    }, 3000);
                                                });
                                        });
                                    }
                                </script>

                                    &nbsp

                                </td>
                            </tr>

                            <?php
                        }
                    } else {
                        echo '<div class="alert alert-warning">Veritabanında Kayıtlı Ürün Bulunamadı</div>';
                    }

                    echo ' </tbody>
  </table>
';

                    echo '<div class="row">
                <div class="col-lg-4">
                    <div class="bs-component">
                      <ul class="pagination">
			';
                    $ssayi = ceil($turun / $lim);
                    $flim = 3;
                    if ($ssayi < 2) {
                        null;
                    } else {
                        if ($s > 4) {
                            $onceki = $s - 1;

                            echo '<li><a href="'.$ayarrow['site_url'].'/yonet//urunler.php?s=1"><<<</a></li>';
                            echo '<li><a href="'.$ayarrow['site_url'].'/yonet//urunler.php?s='.$onceki.'"></a></li>';
                        }

                        for ($i = $s - $flim; $i < $s + $flim + 1; $i++) {
                            if ($i > 0 && $i <= $ssayi) {
                                if ($i == $s) {
                                    echo '<li class="active"><a href="#">'.$i.'</a></li>';
                                } else {
                                    echo '<li><a href="'.$ayarrow['site_url'].'/yonet/urunler.php?s='.$i.'">'.$i.'</a></li>';
                                }
                            }
                        }

                        if ($s <= $ssayi - 4) {
                            echo '<li><a href="'.$ayarrow['site_url'].'/yonet//urunler.php?s='.$sonraki.'">></a></li>';
                            echo '<li><a href="'.$ayarrow['site_url'].'/yonet//urunler.php?s='.$ssayi.'">>>></a></li></ul>
                    </div>
                  </div>';
                        }
                    }

                    ?>

            </div>
        </div>
    </div>



<?php require_once 'alt.php'; ?>
