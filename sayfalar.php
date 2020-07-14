<?php
define('guvenlik', true);
require_once 'ust.php';
require_once 'navi.php';

  $g = $_GET['sayfa'];

  if ($g) {
      $sayfa = $db->prepare('SELECT * FROM sayfalar WHERE sayfa_seo=? AND sayfa_durum=?');
      $sayfa->execute([$g, 1]);
      $sayla = $sayfa->fetch(PDO::FETCH_ASSOC);
      $sayf = $sayfa->rowCount();

      if ($sayf) {
          ?>
            <header class="hero-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="header-title"><?php echo $sayla['sayfa_adi']; ?></h2>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container">
                <div class="row">
                    <div class="text-center">
                        <img src="<?php echo  $ayarrow['site_url'].$sayla['sayfa_resim']; ?>" class="img-fluid" alt="Responsive image"></div>

                    <p class="text_about"><?php echo htmlspecialchars_decode($sayla['sayfa_icerik']); ?></p>
                </div>
            </div>
            </div>
            </div>

<?php
      } else {
          echo 'Böyle Bir Sayfa YOKKKKK';
      }
  } else {
      return false;
  }
?>


<?php require_once 'alt.php'; ?>
