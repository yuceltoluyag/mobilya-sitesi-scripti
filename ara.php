<?php
define('guvenlik', true);
require_once 'ust.php';
require_once 'navi.php';
?>
<header class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4>Sonuçlar</h4>

            </div>
        </div>
    </div>
</header>

<section id="search-products">
    <div class="container">
        <div class="row">

        <?php

        $s = @intval($_GET['s']);
        if (!$s) {
            $s = 1;
        }
        $ara = @$_GET['q'];
        if (!$ara) {
            header('Location:'.$ayarrow['site_url'].'');
        }

        $sorgu = $db->prepare('SELECT * FROM urunler WHERE u_durum=:durum AND u_baslik LIKE :baslik');
        $sorgu->execute([':durum' => 1, ':baslik' => '%'.$ara.'%']);
        $toplam = $sorgu->rowCount();
        $lim = $ayarrow['site_sayfalama'];
        $goster = $s * $lim - $lim;
        $sorgu = $db->prepare(' SELECT * FROM urunler
                    
                    INNER JOIN kategoriler on kategoriler.kat_id = urunler.u_katid
                    INNER JOIN uyeler on      uyeler.uye_id      = urunler.u_ekleyen
                    WHERE  u_durum=:durum AND u_baslik LIKE :baslik ORDER BY u_id DESC  LIMIT :goster,:lim');

        $sorgu->bindValue(':durum', (int) 1, PDO::PARAM_INT);
        $sorgu->bindValue(':baslik', '%'.$ara.'%', PDO::PARAM_STR);
        $sorgu->bindValue(':goster', (int) $goster, PDO::PARAM_INT);
        $sorgu->bindValue(':lim', (int) $lim, PDO::PARAM_INT);
        $sorgu->execute();

        if ($sorgu->rowCount()) {
            foreach ($sorgu

        as $row) {
                ?>

            <div class="col-md-4 col-sm-6 col-xs-12 mix home-decor" data-my-order="<?php echo $row['u_id']; ?>">
                <figure class="wow fadeIn">
                    <img class="img-responsive" src="<?php echo $ayarrow['site_url'].$row['u_resim']; ?>" alt="<?php echo $ro['u_baslik']; ?>">
                    <figcaption>
                        <a href="<?php echo $ayarrow['site_url']; ?>/oku.php?urun_bilgi=<?php echo $row['u_sef']; ?>">
                            <p class="product-title"><?php echo $row['u_baslik']; ?></p>
                            <h4 class="product-price"><?php echo parayaz($row['u_fiyat']); ?></h4>
                        </a>
                    </figcaption>
                </figure>
            </div>




            <?php
            }
            echo '<div class="row">
			<div class="col-md-12">
				<ul class="pagination pull-right">';

            $ssayi = ceil($toplam / $lim);
            $flim = 3;
            if ($ssayi < 2) {
                null;
            } else {
                if ($s > 4) {
                    $onceki = $s - 1;

                    echo '<li><a href="'.$ayarrow['site_url'].'/ara.php?q='.$ara.'&s=1"><<<</a></li>';
                    echo '<li><a href="'.$ayarrow['site_url'].'/ara.php?q='.$ara.'&s='.$onceki.'"></a></li>';
                }

                for ($i = $s - $flim; $i < $s + $flim + 1; $i++) {
                    if ($i > 0 && $i <= $ssayi) {
                        if ($i == $s) {
                            echo '<li class="active"><a href="#">'.$i.'</a></li>';
                        } else {
                            echo '<li><a href="'.$ayarrow['site_url'].'/ara.php?q='.$ara.'&s='.$i.'">'.$i.'</a></li>';
                        }
                    }
                }

                if ($s <= $ssayi - 4) {
                    $sonraki = $s + 1;
                    echo '<li><a href="'.$ayarrow['site_url'].'/ara.php?q='.$ara.'&s='.$sonraki.'">></a></li>';
                    echo '<li><a href="'.$ayarrow['site_url'].'/ara.php?q='.$ara.'&s='.$ssayi.'">>>></a></li>';
                }
            }
        } else {
                echo '<div class="alert alert-danger">
						  <strong>Üzgünüm!</strong> Aradığınız Kelimede Sonuç Bulunamadı..
						</div>';
            }
            ?>
            </ul>
        </div>

    </div></section>



<?php require_once 'alt.php'; ?>
