<?php
define("guvenlik", true);
require_once 'ust.php';
require_once 'sol.php';
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
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Sipariş Veren</th>
                        <th>Sv.Tarihi</th>
                        <th>Durum</th>
                        <th></th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $s = @intval($_GET['s']);
                    if (!$s) {
                        $s = 1;
                    }
                    $urun = $db->prepare('SELECT * FROM siparisler');
                    $urun->execute();
                    $turun = $urun->rowCount();
                    $lim = $ayarrow['site_sayfalama'];
                    $goster = $s * $lim - $lim;
                    $urun = $db->prepare('SELECT * FROM urunler
                       INNER JOIN siparisler on siparisler.s_urunid = urunler.u_id
                       ORDER BY s_durum ASC LIMIT :goster,:lim');
                    $urun->bindValue(':goster', (int)$goster, PDO::PARAM_INT);
                    $urun->bindValue(':lim', (int)$lim, PDO::PARAM_INT);
                    $urun->execute();
                    if ($urun->rowCount()) {
                        foreach ($urun as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['s_adsoy']; ?></td>
                                <td><?php echo $row['s_tarih']; ?></td>
                                <td><?php if($row['s_durum'] == 'Beklemede'){
                                    echo '<span class="text-primary">Beklemede</span>';
                                    }elseif ($row['s_durum'] == 'Kargoya Verildi'){
                                        echo'<span class="text-info">Kargoya Verildi</span>';
                                    }elseif ($row['s_durum'] == 'Tedarik Sürecinde'){
                                        echo'<span class="text-warning">Tedarik Sürecinde</span>';
                                    }elseif ($row['s_durum'] == 'Tamamlandı'){
                                        echo'<span class="text-success">Tamamlandı</span>';
                                    }elseif ($row['s_durum'] == 'İptal Edildi'){
                                        echo'<span class="text-danger">İptal Edildi</span>';
                                    }

                                    ?></td>


                                <td><a href="siparisduzenle.php?islem=siparisduzenle&id=<?php echo $row['sip_id']; ?>" style="font-size: 20px;" class="text text-info"><button class="btn btn-info btn-sm"><i class="ti-pencil-alt" aria-hidden="true"></i> Detay</button></a>
                                    <a  href="siparissil.php?islem=siparissil&id=<?php echo $row['sip_id']; ?>" style="font-size: 20px;" class="text text-info"><button class="btn btn-danger btn-sm"><i class="ti-pencil-alt" aria-hidden="true"></i> Sil</button></a></td>

                            </tr>

                            <?php
                        }
                    } else {

                        echo '<div class="alert alert-warning">Siparişiniz Bulunmamaktadır..</div>';

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

                            echo '<li><a href="' . $ayarrow['site_url'] . '/yonet//siparisler.php?s=1"><<<</a></li>';
                            echo '<li><a href="' . $ayarrow['site_url'] . '/yonet//siparisler.php?s=' . $onceki . '"></a></li>';
                        }


                        for ($i = $s - $flim; $i < $s + $flim + 1; $i++) {

                            if ($i > 0 && $i <= $ssayi) {
                                if ($i == $s) {

                                    echo '<li class="active"><a href="#">' . $i . '</a></li>';

                                } else {

                                    echo '<li><a href="' . $ayarrow['site_url'] . '/yonet/siparisler.php?s=' . $i . '">' . $i . '</a></li>';

                                }
                            }
                        }

                        if ($s <= $ssayi - 4) {

                            echo '<li><a href="' . $ayarrow['site_url'] . '/yonet//siparisler.php?s=' . $sonraki . '">></a></li>';
                            echo '<li><a href="' . $ayarrow['site_url'] . '/yonet//siparisler.php?s=' . $ssayi . '">>>></a></li></ul>
                    </div>
                  </div>';

                        }
                    }


                    ?>

            </div>
        </div>
    </div>



<?php require_once 'alt.php'; ?>