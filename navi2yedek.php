<?php !defined('guvenlik') ? die ('Erişim Yetkiniz Yok') : null; ?>
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
            <?php
            $menusor  = $db->prepare("SELECT * FROM menuler");
            $menusor->execute();

            $menu = array(
                'menus' => array(),
                'parent_menus' => array()
            );

            //Db Menü
            while ($row = $menusor->fetch(PDO::FETCH_ASSOC)) {
                $menu['menus'][$row['menu_id']] = $row;
                $menu['parent_menus'][$row['menu_ust']][] = $row['menu_id'];
            }
            // Multi Menü
            function multimenu($parent, $menu) {
                $html = "";
                if (isset($menu['parent_menus'][$parent])) {
                    if ($parent == 0) {
                        $html .= "<ul class='nav navbar-nav navbar-left'>";
                    }else{
                        $html .= "<ul class='dropdown-menu'>";
                    }

                    foreach (@$menu['parent_menus'][$parent] as $menu_id) {
                        if (!isset($menu['parent_menus'][$menu_id])) {
                            echo $menu['parent_menus'][$menu_id];
                            $html .= "<li><a href='" . $menu['menus'][$menu_id]['menu_url'] . "'>" . $menu['menus'][$menu_id]['menu_ad'] . "</a></li>";
                        }
                        if (isset($menu['parent_menus'][$menu_id])) {
                            $html .= "<li class='dropdown'>
				<a class='active dropdown-toggle' data-toggle='dropdown' href='" . $menu['menus'][$menu_id]['menu_url'] . "'>" . $menu['menus'][$menu_id]['menu_ad'] . "<b class='caret'></b></a>";
                            $html .= multimenu($menu_id, $menu);
                            $html .= "</li>";
                        }
                    }
                    $html .= "</ul>";
                }
                return $html;
            }
            ?>
            <?php echo @multimenu(0, $menu); ?>





             </ul>
        </div>

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
