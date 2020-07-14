<?php
define('guvenlik', true);
require_once 'ust.php';
require_once 'navi.php';
?>

<header class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="header-title">Hakkımızda</h2>
            </div>
        </div>
    </div>
</header>

    <div class="container">
        <div class="row">

            <p class="text_about"><?php echo htmlspecialchars_decode($ayarrow['site_hakkinda']); ?></p>
        </div>
    </div>
</div>
</div>

<?php require_once 'alt.php'; ?>
