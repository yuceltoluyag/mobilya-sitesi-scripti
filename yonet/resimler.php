<?php
define('guvenlik', true);
require_once 'ust.php';
require_once 'sol.php';
?>

    <div class="row">

    <div class="content-wrapper">
        <a class="btn btn-warning edit" style="float:right;" href="urunler.php"><i class="fa fa-undo">Geri Git</i></a>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="image_upload_div">
                            <form action="galeri.php" class="dropzone">
                                <div class="dz-message" data-dz-message><span>Bu alana tıkladıktan sonra resimleri seçiniz.. Resimler yüklendikten sonra geri tuşuna basın. İşte Bu kadar :)</span>
                                </div>
                                <input type="hidden" name="galeriresim" value="<?php echo $_GET['id']; ?>">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php require_once 'alt.php'; ?>