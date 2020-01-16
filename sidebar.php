<?php !defined('guvenlik') ? die ('Erişim Yetkiniz Yok') : null; ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="breadcumb_div heading_breadcrumb">
                <ul class="breadcrumbs">
                    <li><a href="index.html">Anasayfa</a></li>

                </ul>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-3 sidebar_div sticky">
                    <div class="theiaStickySidebar">


                        <?php
                        $kategoriler = $db->prepare("SELECT * FROM  kategoriler ");
                        $kategoriler->execute();

                        if ($kategoriler->rowCount()) {
                        foreach ($kategoriler as $row) {
                            $urunbul = $db->prepare('SELECT u_katid FROM urunler WHERE u_katid=:id');
                            $urunbul->execute(array(':id'=>$row['kat_id']));
                            if ($urunbul->rowCount()){
                        ?>

                            <?php

                            if ($row['kat_ust']=='0'){
                                echo ' <div class="sidebar_head"><a href="' . $ayarrow['site_url'] . '/kategoriler.php?kat_url=' . $row['kat_sef'] . '">' . $row['kat_adi'] . '</a></div>';
                            }else {
                               echo '<ul class="sidebar_list"> <li><a href="' . $ayarrow['site_url'] . '/kategoriler.php?kat_url=' . $row['kat_sef'] . '">' . $row['kat_adi'] . '</a></li> </ul>';

                            }

                            ?>


                        <?php
                        }
                        }
                        }
                        ?>
                    </div>
                </div>





