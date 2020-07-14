<?php

define('guvenlik', true);

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


                    <a class="btn btn-info edit" style="float:right;" href="kategoriekle.php"><i class="fa fa-plus">Yeni
                            Ekle</i></a>

                    <thead>
                    <tr class="row-name">
                        <th>Kategori Adı</th>
                        <th>Kategori Açıklaması</th>
                        <th>Kategori Durumu</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    function kategori($k_id = 0, $st = 0)
                    {
                        global $db;
                        $kategoriler = $db->prepare("SELECT * FROM kategoriler WHERE kat_ust='$k_id'");
                        $kategoriler->execute([]);
                        $tkategori = $kategoriler->fetchAll(PDO::FETCH_ASSOC);
                        $say = $kategoriler->rowCount();
                        if ($say) {
                            foreach ($tkategori as $row) {
                                ?>

                                <tr class="card-title">
                                    <td><?php echo str_repeat("<span class='fa fa-angle-right'></span>", $st).$row['kat_adi']; ?></td>
                                    <td><?php echo $row['kat_aciklama']; ?></td>
                                    <td><?php echo $row['kat_durum'] == 1 ? '<div class="label label-success">Aktif</div>' : '<div class="label label-danger">Pasif</div>' ?></td>
                                 <td>
                                        <a class="btn btn-info edit"
                                           href="islemler.php?islem=kategoriduzenle&id=<?php echo $row['kat_id']; ?>"
                                           aria-label="Settings">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                                        </a>

                                     <a class="btn btn-danger danger" data-kategori-id="<?php echo $row['kat_id']; ?>"> <i class="fa fa-trash-o"></i> </a>

                                     <script type="text/javascript">

                                         $('a.btn-danger').click(function() {
                                             var kateid = $(this).attr("data-kategori-id");
                                             kategorisil(kateid);
                                         });

                                         function kategorisil(kateid) {
                                             swal({
                                                 title: "Emin misiniz?",
                                                 text: "Bu kategoriyi silmek istediğinizden emin misiniz?",
                                                 type: "warning",
                                                 showCancelButton: true,
                                                 closeOnConfirm: false,
                                                 confirmButtonText: "Evet, Onaylıyorum!",
                                                 cancelButtonText : "Geri Git",
                                                 html : "false"
                                             }, function() {
                                                 $.ajax({
                                                     url: "katsil.php?islem=kategorisil&id=" + kateid,
                                                     type: "DELETE"
                                                 })
                                                     .done(function(data) {
                                                         swal("Silindi!", "Kategori Tamamen Silindi!", "success");
                                                         setTimeout(function () {
                                                             window.location.href = "kategoriler.php"
                                                         }, 3000);
                                                     })
                                                     .error(function(data) {
                                                         swal("Oops", "Bir Hata Oluştu,Kategori Silinemedi!", "error");
                                                         setTimeout(function () {
                                                             window.location.href = "kategoriler.php"
                                                         }, 3000);
                                                     });
                                             });
                                         }
                                     </script>






                                 </td>
                                </tr>
                                <?php kategori($row['kat_id'], $st + 1); ?>
                                <?php
                            }
                        }
                    }

                 kategori('kat_id');

                    ?>

            </div>
        </div>
    </div>
<?php require_once 'alt.php'; ?>
