<?php
define('guvenlik', true);
require_once '../sistem/fonksiyon.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css"/>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <title>Yönetim Paneli</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
  -->
</head>
<body>
<?php if (!isset($_SESSION['oturum'])) {
    ?>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>

    <section class="login-content">
        <div class="logo">
            <h1>Yönetici Paneli</h1>
        </div>

        <script type="text/javascript">

            function admingiris() {

                var eposta = $("input[name=eposta]").val();
                eposta = $.trim(eposta);

                var sifre = $("input[name=sifre]").val();
                sifre = $.trim(sifre);

                if (eposta == "") {

                    sweetAlert('HATA', 'Eposta Boş Bırakılamaz', 'error');
                } else if (sifre == "") {

                    sweetAlert('HATA', 'Şifreniz Boş Bırakılamaz', 'error');

                } else {

                    var deger = "eposta=" + eposta + "&sifre=" + sifre;


                    $.ajax({

                        type: "POST",
                        url: "../inc/giris.php",
                        data: deger,
                        success: function (sonuc) {

                            if (sonuc == "hata") {


                                sweetAlert("HATA", "Kullanıcı Girişi Başarısız", "error");

                            } else if (sonuc == "aktivasyon") {

                                sweetAlert("HATA", "Yetkiniz Yok", "error");

                            } else if (sonuc == "ehata") {

                                sweetAlert("HATA", "Lütfen Geçerli Bir Eposta Giriniz", "error");

                            }else if (sonuc == "ok") {

                                sweetAlert('Tebrikler', 'Başarıyla Giriş Yaptınız', 'success');
                                setTimeout(function () {
                                    window.location.href = "anasayfa.php"
                                }, 2000);

                            }

                        }

                    });


                }
            }
        </script>

        <div class="login-box">
            <form class="login-form" method="POST" action="" onsubmit="return false;">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Kullanıcı Bilgileri</h3>
                <div class="form-group">
                    <label class="control-label">Yönetici Eposta</label>
                    <input class="form-control" type="text" name="eposta" placeholder="Kullanıcı Adınız" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">Şifre</label>
                    <input class="form-control" name="sifre" type="password" placeholder="Şifreniz">
                </div>

                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" onclick="admingiris();">Giriş Yap<i
                                class="fa fa-sign-in fa-lg"></i></button>
                </div>
            </form>

        </div>


    </section>

<?php
} else {
        ?>
    <?php require_once 'anasayfa.php'; ?>
<?php
    } ?>


</body>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>
