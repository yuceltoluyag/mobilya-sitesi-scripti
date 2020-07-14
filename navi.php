<?php !defined('guvenlik') ? die('Erişim Yetkiniz Yok') : null; ?>
<!-- Menü-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="btn btn-icon-only navbar-toggle" data-toggle="collapse" data-target=".form-wrap"><i
                        class="fa fa-search"></i></a>
            <a class="navbar-brand" href="index.php">
                <div class="brand-logo"><img alt="logo" src="<?php echo $ayarrow['site_url']; ?>/img/logo.png">
                </div>
            </a>
        </div>
        <div class="nav-bar-btn">
            <a href="<?php echo $ayarrow['site_facebook']; ?>" target="_blank"
               class="btn btn-icon-only btn-nav btn-nav-desktop"><i class="fa fa-facebook"></i></a>
            <a href="<?php echo $ayarrow['site_instagram']; ?>" target="_blank"
               class="btn btn-icon-only btn-nav btn-nav-desktop"><i class="fa fa-instagram"></i></a>
            <a class="btn btn-icon-only btn-nav btn-nav-desktop" data-toggle="collapse" data-target=".form-wrap"><i
                        class="fa fa-search"></i></a>
        </div>
        <div class="collapse navbar-collapse" id="main-menu">
            <ul class="nav navbar-nav navbar-left">

                <?php
                $sql = 'SELECT * FROM menuler WHERE menu_ust = 0';
                $pquery = $db->query($sql);
                ?>

                <?php while ($parent = $pquery->fetch(PDO::FETCH_ASSOC)) { ?>
                    <?php
                    $parent_id = $parent['menu_id'];
                    $sql2 = "SELECT * FROM menuler WHERE menu_ust = '$parent_id'";
                    $cquery = $db->query($sql2);
                    $altmenu = $db->prepare('SELECT * FROM menuler WHERE menu_ust=? ORDER BY menu_sira');
                    $altmenu->execute([$parent_id]);
                    $say = $altmenu->rowCount();
                    ?>
                    <!-- Menu Items -->
                    <li <?php if ($say > 0) {
                        echo 'class="dropdown"';
                    } ?>>

                        <a href="<?php echo $parent['menu_url']; ?>" <?php if ($say > 0) {
                        echo 'class="dropdown-toggle" data-toggle="dropdown"';
                    } ?>>
                            <?php echo $parent['menu_ad']; ?>
                            <?php if ($say > 0) {
                        echo '<span class="caret"></span>';
                    } ?></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php while ($child = $cquery->fetch(PDO::FETCH_ASSOC)) { ?>
                                <li>
                                    <a href="sayfalar.php?do&sayfa=<?php echo $child['menu_url']; ?>"><?php echo $child['menu_ad']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>


        </ul>


    </div>
    <div class="container">
        <div class="form-wrap collapse">
            <form id="form-search" role="search" action="ara.php" method="get">
                <div class="form-group">
                    <input id="form-search-input" type="text" class="form-control" name="q" value="Ürün Arayın"
                           onfocus="this.value='';">
                    <button type="submit"><i class="fa fa-search"></i>
                    </button>
                    <button type="reset" data-toggle="collapse" data-target=".form-wrap"><i class="fa fa-close"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

</nav>
<!-- Navigation -->
