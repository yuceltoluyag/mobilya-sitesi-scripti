<?php

define("guvenlik", true);

require_once 'ust.php';
require_once 'sol.php';

?>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

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


                        <a class="btn btn-info edit" style="float:right;" href="menuekle.php"><i class="fa fa-plus">Yeni
                                Ekle</i></a>

                        <thead>
                        <tr class="row-name">
                            <th>Menü Adı</th>
                            <th>Menü Durumu</th>
                            <th>Menü Sırası</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        function menu($k_id = 0, $st = 0)
                        {
                            Global $db;
                            $menuler = $db->prepare("SELECT * FROM menuler WHERE menu_ust='$k_id' ORDER BY menu_sira ASC");
                            $menuler->execute(array());
                            $tmenu = $menuler->fetchAll(PDO::FETCH_ASSOC);
                            $say = $menuler->rowCount();
                            if ($say) {

                                foreach ($tmenu as $row) {


                                    ?>

                                    <tr class="card-title">
                                        <td><?php echo str_repeat("<span class='fa fa-angle-right'></span>", $st) . $row['menu_ad']; ?></td>
                                        <td><?php echo $row['menu_durum'] == 1 ? "<div class=\"label label-success\">Aktif</div>" : "<div class=\"label label-danger\">Pasif</div>" ?></td>
                                        <td><?php echo str_repeat("<span class='fa fa-angle-right'></span>", $st) . $row['menu_sira']; ?></td>

                                        <td>
                                            <a class="btn btn-info edit"
                                               href="islemler.php?islem=menuduzenle&id=<?php echo $row['menu_id']; ?>"
                                               aria-label="Settings">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>

                                            <a class="btn btn-danger danger"
                                               data-menu-id="<?php echo $row['menu_id']; ?>"> <i
                                                        class="fa fa-trash-o"></i> </a>

                                            <script type="text/javascript">

                                                $('a.btn-danger').click(function () {
                                                    var menuid = $(this).attr("data-menu-id");
                                                    menusil(menuid);
                                                });

                                                function menusil(menuid) {
                                                    swal({
                                                        title: "Emin misiniz?",
                                                        text: "Bu kategoriyi silmek istediğinizden emin misiniz?",
                                                        type: "warning",
                                                        showCancelButton: true,
                                                        closeOnConfirm: false,
                                                        confirmButtonText: "Evet, Onaylıyorum!",
                                                        cancelButtonText: "Geri Git",
                                                        html: "false"
                                                    }, function () {
                                                        $.ajax({
                                                            url: "menusil.php?islem=menusil&id=" + menuid,
                                                            type: "DELETE"
                                                        })
                                                            .done(function (data) {
                                                                swal("Silindi!", "Menü Tamamen Silindi!", "success");
                                                                setTimeout(function () {
                                                                    window.location.href = "menu.php"
                                                                }, 3000);
                                                            })
                                                            .error(function (data) {
                                                                swal("Oops", "Bir Hata Oluştu,Menu Silinemedi!", "error");
                                                                setTimeout(function () {
                                                                    window.location.href = "menu.php"
                                                                }, 3000);
                                                            });
                                                    });
                                                }
                                            </script>


                                        </td>
                                    </tr>
                                    <?php menu($row['menu_id'], $st + 1); ?>
                                    <?php
                                }

                            }

                        }

                        menu('menu_id');


                        ?>

                </div>
            </div>
        </div>
<?php require_once 'alt.php'; ?>