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

    <a class="btn btn-info edit" style="float:right;" href="sliderekle.php"><i class="fa fa-plus">Yeni Ekle</i></a>

    <thead>


    <tr class="row-name">
        <th>Slider Resim</th>
        <th>Slider Adı</th>
        <th>Slider Durum</th>

    </tr>
    </thead>

<?php

$slider = $db->prepare('SELECT * FROM slider ORDER BY slider_durum DESC,slider_sira ASC LIMIT 25');
$slider->execute();

while ($scek = $slider->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tbody>
    <tr>
        <td><img style="width:15vh;" class="img-responsive" src="<?php echo $ayarrow['site_url'].$scek['slider_resim']; ?>"
                 alt="Cinque Terre"></td>
        <td><?php echo $scek['slider_ad']; ?></td>
        <td><?php echo $scek['slider_sira']; ?></td>
        <td><?php echo $scek['slider_durum'] == 1 ? '<div class="label label-success">Aktif</div>' : '<div class="label label-danger">Pasif</div>' ?></td>
        <td> <a class="btn btn-info edit"
                href="sduzenle.php?&id=<?php echo $scek['slider_id']; ?>"
                aria-label="Settings">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a> |   <a class="btn btn-danger danger" data-slider-id="<?php echo $scek['slider_id']; ?>"> <i class="fa fa-trash-o"></i> </a></td>
        <script type="text/javascript">

            $('a.btn-danger').click(function() {
                var sliderid = $(this).attr("data-slider-id");
                slidersil(sliderid);

            });

            function slidersil(sliderid) {
                swal({
                    title: "Emin misiniz?",
                    text: "Bu Slideri silmek istediğinizden emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonText: "Evet, Onaylıyorum!",
                    cancelButtonText : "Geri Git",
                    html : "false"
                }, function() {
                    $.ajax({
                        url: "ssil.php?&id=" + sliderid,
                        type: "DELETE"
                    })
                        .done(function(data) {
                            swal("Silindi!", "Slider Tamamen Silindi!", "success");
                            setTimeout(function () {
                                window.location.href = "slider.php"
                            }, 3000);
                        })
                        .error(function(data) {
                            swal("Oops", "Bir Hata Oluştu,Slider Silinemedi!", "error");
                            setTimeout(function () {
                                window.location.href = "slider.php"
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
