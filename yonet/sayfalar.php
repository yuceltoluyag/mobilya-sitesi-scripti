<?php

define("guvenlik", true);

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

                            <a class="btn btn-info edit" style="float:right;" href="sayfaekle.php"><i
                                        class="fa fa-plus">Sayfa Ekle</i></a>

                            <thead>


                            <tr class="row-name">
                                <th>Sayfa Resim</th>
                                <th>Sayfa Adı</th>
                                <th>Sayfa Sıra</th>
                                <th>Sayfa Durum</th>

                            </tr>
                            </thead>

                            <?php

                            $sayfa = $db->prepare("SELECT * FROM sayfalar ORDER BY sayfa_durum DESC,sayfa_sira ASC LIMIT 25");
                            $sayfa->execute();

                            while ($scek = $sayfa->fetch(PDO::FETCH_ASSOC)) {


                            ?>
                            <tbody>
                            <tr>
                                <td><img style="width:15vh;" class="img-responsive"
                                         src="<?php echo $ayarrow['site_url'] . $scek['sayfa_resim']; ?>"
                                         alt="Cinque Terre"></td>
                                <td><?php echo $scek['sayfa_adi']; ?></td>
                                <td><?php echo $scek['sayfa_sira']; ?></td>
                                <td><?php echo $scek['sayfa_durum'] == 1 ? "<div class=\"label label-success\">Aktif</div>" : "<div class=\"label label-danger\">Pasif</div>" ?></td>
                                <td><a class="btn btn-info edit"
                                       href="sayfaduzenle.php?&id=<?php echo $scek['sayfa_id']; ?>"
                                       aria-label="Settings">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a> | <a class="btn btn-danger danger"
                                              data-sayfa-id="<?php echo $scek['sayfa_id']; ?>"> <i
                                                class="fa fa-trash-o"></i> </a></td>
                                <script type="text/javascript">

                                    $('a.btn-danger').click(function () {
                                        var sayfa = $(this).attr("data-sayfa-id");
                                        sayfasil(sayfa);

                                    });

                                    function sayfasil(sayfa) {
                                        swal({
                                            title: "Emin misiniz?",
                                            text: "Bu Sayfayı silmek istediğinizden emin misiniz?",
                                            type: "warning",
                                            showCancelButton: true,
                                            closeOnConfirm: false,
                                            confirmButtonText: "Evet, Onaylıyorum!",
                                            cancelButtonText: "Geri Git",
                                            html: "false"
                                        }, function () {
                                            $.ajax({
                                                url: "sayfasil.php?&id=" + sayfa,
                                                type: "DELETE"
                                            })
                                                .done(function (data) {
                                                    swal("Silindi!", "Sayfa Tamamen Silindi!", "success");
                                                    setTimeout(function () {
                                                        window.location.href = "sayfalar.php"
                                                    }, 3000);
                                                })
                                                .error(function (data) {
                                                    swal("Oops", "Bir Hata Oluştu,Sayfa Silinemedi!", "error");
                                                    setTimeout(function () {
                                                        window.location.href = "sayfalar.php"
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