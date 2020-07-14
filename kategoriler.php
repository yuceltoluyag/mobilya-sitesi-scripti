<?php
define('guvenlik', true);
require_once 'ust.php';
require_once 'navi.php';
$kat_seo = $_GET['kat_url'];
?>
<header class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="header-title">Ürünlerimiz</h2>
            </div>
        </div>
    </div>
</header>
<section id="products-list">
    <div class="container">
        <div class="row">
            <div id="product-item">
<?php
if (!$kat_seo) {
    header('Location:index.php');
}
$s = @intval(get('s'));

if (!$s) {
    $s = 1;
}

$kategori = $db->prepare('SELECT * FROM kategoriler WHERE kat_sef=:sefkat');
$kategori->execute([':sefkat' => $kat_seo]);
$katrow = $kategori->fetch(PDO::FETCH_ASSOC);
$iceriksor = $db->prepare('SELECT * FROM urunler WHERE u_durum=:d AND u_katid=:yk');
$iceriksor->execute([':d' => 1, ':yk' => $katrow['kat_id']]);
$toplam = $iceriksor->rowCount();
$lim = $ayarrow['site_sayfalama'];
$goster = $s * $lim - $lim;

$sorgu = $db->prepare('SELECT * FROM urunler

             INNER JOIN kategoriler on kategoriler.kat_id = urunler.u_katid
             WHERE u_durum=:ud AND  kat_sef=:ks ORDER BY u_id DESC LIMIT :goster,:lim

            ');

$sorgu->bindValue(':ud', (int) 1, PDO::PARAM_INT);
$sorgu->bindValue(':ks', $kat_seo, PDO::PARAM_STR);
$sorgu->bindValue(':goster', (int) $goster, PDO::PARAM_INT);
$sorgu->bindValue(':lim', (int) $lim, PDO::PARAM_INT);
$sorgu->execute();

if ($sorgu->rowCount()) {
    foreach ($sorgu as $row) {
        ?>


        <div class="col-md-4 col-sm-6 col-xs-12  home-decor">
            <figure class="wow fadeIn">
                <img class="img-responsive" src="<?php echo $ayarrow['site_url'].$row['u_resim']; ?>" alt="<?php echo $row['u_sef']; ?>">
                <figcaption>
                    <a href=" <?php echo $ayarrow['site_url']; ?>/oku.php?urun_bilgi=<?php echo $row['u_sef']; ?>">
                        <p class="product-title"><?php echo $row['u_baslik']; ?></p>
                        <h4 class="product-price"><?php echo parayaz($row['u_fiyat']); ?></h4>
                    </a>
                </figcaption>
            </figure>
        </div>








        <?php
    }

    echo '<div class="row">
<div aria-label="Page navigation">
<ul class="pagination">';
    $ssayi = ceil($toplam / $lim);
    $flim = 3;
    if ($ssayi < 2) {
        null;
    } else {
        if ($s > 4) {
            $onceki = $s - 1;

            echo '<li><a href="'.$ayarrow['site_url'].'/kategoriler.php?kat_url='.$kat_seo.'&s=1"><<<</a></li>';
            echo '<li class="prev">
<a href="'.$ayarrow['site_url'].'/kategoriler.php?kat_url='.$kat_seo.'&s='.$onceki.'" aria-label="Previous" class="disable">
<span aria-hidden="true">Önceki</span>
</a>
</li>';
        }

        for ($i = $s - $flim; $i < $s + $flim + 1; $i++) {
            if ($i > 0 && $i <= $ssayi) {
                if ($i == $s) {
                    echo '<li class="active"><a href="#">'.$i.'</a></li>';
                } else {
                    echo '<li><a href="'.$ayarrow['site_url'].'/kategoriler.php?kat_url='.$kat_seo.'&s='.$i.'">'.$i.'</a></li>';
                }
            }
        }

        if ($s <= $ssayi - 4) {
            $sonraki = $s + 1;

            echo '<li><a href="'.$ayarrow['site_url'].'/kategoriler.php?kat_url='.$kat_seo.'&s='.$sonraki.'">></a></li>';
            echo '<li><a href="'.$ayarrow['site_url'].'/kategoriler.php?kat_url='.$kat_seo.'&s='.$ssayi.'">>>></a></li>';
        }
    }
} else {
    echo 'Bu kategoride ürün bulunmamaktadır';
}
?>


            </div>
        </div>


</section>
<?php

require_once 'alt.php';

?>
