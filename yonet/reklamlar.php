<?php

define('guvenlik', true);

require_once 'ust.php';
require_once 'sol.php';

?>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <div class="wrapper">
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
                            <div class="alert alert-dismissable alert-info">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Bilgi!</strong> Bir Adetten Fazla Reklam Eklemeyiniz.
                            </div>
                            <a class="btn btn-info edit" style="float:right;" href="rekle.php"><i class="fa fa-plus">Yeni
                                    Ekle</i></a>
                            <thead>
                            <tr class="row-name">
                                <th>Reklam Resim</th>
                                <th>Reklam Başlık</th>
                                <th>Reklam İçerik</th>
                                <th>Reklam Süre</th>
                                <th>Reklam Url</th>
                                <th>Reklam Saat</th>
                                <th>Reklam Durum</th>
                            </tr>
                            </thead>
                            <?php
                            $popup = $db->prepare('SELECT * FROM reklamlar');
                            $popup->execute();
                            while ($reklam = $popup->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                            <tbody>
                            <tr>
                                <td><img style="width:15vh;" class="img-responsive"
                                         src="<?php echo $ayarrow['site_url'].$reklam['reklam_resim']; ?>"
                                         alt="Reklam Resmi"></td>
                                <td><?php echo $reklam['reklam_baslik']; ?></td>
                                <td><?php echo $reklam['reklam_icerik']; ?></td>
                                <td><?php echo $reklam['reklam_sure']; ?></td>
                                <td><?php echo $reklam['reklam_url']; ?></td>
                                <td><?php echo $reklam['reklam_zaman']; ?></td>
                                <td><?php echo $reklam['reklam_onay']; ?></td>
                                <div class="clearfix"></div>
                                <td><a class="btn btn-info edit"
                                       href="rduzenle.php?&id=<?php echo $reklam['reklam_id']; ?>"
                                       aria-label="Settings">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a><a class="btn btn-danger danger"
                                           data-reklam-id="<?php echo $reklam['reklam_id']; ?>"> <i
                                                class="fa fa-trash-o"></i> </a></td>
                                <script type="text/javascript">

                                    $('a.btn-danger').click(function () {
                                        var reklamid = $(this).attr("data-reklam-id");
                                        reklamsil(reklamid);

                                    });

                                    function reklamsil(reklamid) {
                                        swal({
                                            title: "Emin misiniz?",
                                            text: "Bu Reklamı silmek istediğinizden emin misiniz?",
                                            type: "warning",
                                            showCancelButton: true,
                                            closeOnConfirm: false,
                                            confirmButtonText: "Evet, Onaylıyorum!",
                                            cancelButtonText: "Geri Git",
                                            html: "false"
                                        }, function () {
                                            $.ajax({
                                                url: "rsil.php?&id=" + reklamsil,
                                                type: "DELETE"
                                            })
                                                .done(function (data) {
                                                    swal("Silindi!", "Reklam Tamamen Silindi!", "success");
                                                    setTimeout(function () {
                                                        window.location.href = "reklamlar.php"
                                                    }, 3000);
                                                })
                                                .error(function (data) {
                                                    swal("Oops", "Bir Hata Oluştu,Reklam Silinemedi!", "error");
                                                    setTimeout(function () {
                                                        window.location.href = "reklamlar.php"
                                                    }, 3000);
                                                });
                                        });
                                    }
                                </script>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php require_once 'alt.php'; ?>