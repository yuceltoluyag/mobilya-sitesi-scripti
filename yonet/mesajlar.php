<?php

define('guvenlik', true);

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
                    <tr class="row-name">
                        <th>Mesaj Ad</th>
                        <th>Mesaj Telefon</th>
                        <th>Mesaj İçerik</th>
                       
                       <th></th> <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $s = @intval(get('s'));
                    if (!$s) {
                        $s = 1;
                    }

                    $urun = $db->prepare('SELECT * FROM mesajlar ORDER BY mesaj_id DESC LIMIT :goster,:lim');

                    $turun = $urun->rowCount();
                    $lim = $ayarrow['site_sayfalama'];
                    $goster = $s * $lim - $lim;

                    $urun->bindValue(':goster', (int) $goster, PDO::PARAM_INT);
                    $urun->bindValue(':lim', (int) $lim, PDO::PARAM_INT);
                    $urun->execute();

                    if ($urun->rowCount()) {
                        foreach ($urun as $row) {
                            ?>
                            
                             <tr> 
                                <td><?php echo $row['mesaj_ad']; ?></td>
                                <td><?php echo $row['mesaj_tel']; ?></td>
                                <td><?php echo $row['mesaj_icerik']; ?></td>
                              

                               
                                <td><a class="btn btn-danger edit"
                                       href="mesajsil.php?islem=mesajsil&id=<?php echo $row['mesaj_id']; ?>"
                                       aria-label="Settings">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a></td> 
                            </tr>

                            <?php
                        }
                    } else {
                        echo '<div class="alert alert-warning">Mesajınız Bulunmamaktadır..</div>';
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

                            echo '<li><a href="'.$ayarrow['site_url'].'/yonet//siparisler.php?s=1"><<<</a></li>';
                            echo '<li><a href="'.$ayarrow['site_url'].'/yonet//siparisler.php?s='.$onceki.'"></a></li>';
                        }

                        for ($i = $s - $flim; $i < $s + $flim + 1; $i++) {
                            if ($i > 0 && $i <= $ssayi) {
                                if ($i == $s) {
                                    echo '<li class="active"><a href="#">'.$i.'</a></li>';
                                } else {
                                    echo '<li><a href="'.$ayarrow['site_url'].'/yonet/siparisler.php?s='.$i.'">'.$i.'</a></li>';
                                }
                            }
                        }

                        if ($s <= $ssayi - 4) {
                            echo '<li><a href="'.$ayarrow['site_url'].'/yonet//siparisler.php?s='.$sonraki.'">></a></li>';
                            echo '<li><a href="'.$ayarrow['site_url'].'/yonet//siparisler.php?s='.$ssayi.'">>>></a></li></ul>
                    </div>
                  </div>';
                        }
                    }

                    ?>

            </div>
        </div>
    </div>



<?php require_once 'alt.php'; ?>