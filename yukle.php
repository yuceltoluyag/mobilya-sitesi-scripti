<?php
define('guvenlik', true);
require_once 'ust.php';

if (isset($_POST['sayfada'],$_POST['basla'])) {
    $sayfada = (int) $_POST['sayfada'];
    $basla = (int) $_POST['basla'];

    $u = $db->prepare('SELECT * FROM urunler WHERE u_durum=:durum');
    $u->execute([':durum' => 1]);
    $toplam = $u->rowCount();

    /* Kategori ve Urun Tablosu Birleştirme */

    $ur = $db->prepare(' SELECT * FROM urunler
        
        INNER JOIN kategoriler on kategoriler.kat_id = urunler.u_katid
        INNER JOIN uyeler on      uyeler.uye_id      = urunler.u_ekleyen
        WHERE  u_durum=:durum ORDER BY u_id DESC LIMIT :goster , :lim

        ');

    $ur->bindValue(':durum', (int) 1, PDO::PARAM_INT);
    $ur->bindValue(':goster', (int) $basla, PDO::PARAM_INT);
    $ur->bindValue(':lim', (int) $sayfada, PDO::PARAM_INT);
    $ur->execute();

    if ($ur->rowCount()) {
        foreach ($ur as $ro) {
            ?>
    <div class="col-sm-6 grid_col">
        <div class="grid_div">
            <div class="grid_img">
                <a href="<?php echo $ayarrow['site_url']; ?>/oku.php?urun_bilgi=<?php echo $ro['u_sef']; ?>"><img
                        src="<?php echo $ayarrow['site_url'].$ro['u_resim']; ?>"
                        alt="<?php echo $ro['u_sef']; ?>"></a>
            </div>
            <div class="grid_detail">
                <a href="<?php echo $ayarrow['site_url']; ?>/oku.php?urun_bilgi=<?php echo $ro['u_sef']; ?>"><?php echo $ro['u_baslik']; ?></a>

            </div>
        </div>
    </div>
    <?php
        }
    }
}
    ?>