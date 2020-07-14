-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Oca 2020, 00:54:01
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mobilya`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `site_id` int(11) NOT NULL,
  `site_url` varchar(250) NOT NULL,
  `site_baslik` varchar(250) NOT NULL,
  `site_anahtarkelime` varchar(250) NOT NULL,
  `site_aciklama` varchar(250) NOT NULL,
  `site_facebook` varchar(300) NOT NULL,
  `site_twitter` varchar(300) NOT NULL,
  `site_instagram` varchar(300) NOT NULL,
  `site_hakkinda` longtext NOT NULL,
  `site_sayfalama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_id`, `site_url`, `site_baslik`, `site_anahtarkelime`, `site_aciklama`, `site_facebook`, `site_twitter`, `site_instagram`, `site_hakkinda`, `site_sayfalama`) VALUES
(1, 'http://localhost/yeni', 'Ustalar Mobilya Hassa', 'mobilya,sitesi,tanıtım,php script', 'Yaşam Stili', 'https://www.facebook.com/yucel.toluyag.7', 'https://twitter.com/yuceltoluyag', 'https://www.instagram.com/yuceltoluyag/', '<p><img src=\"http://localhost/yeni/yonet/resimler/392718cbf72305d3e73dcdeb22c09d3e71532902.jpg\" style=\"width: 1321px;\" class=\"fr-fic fr-dib\"></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam efficitur semper enim eu auctor. Sed <strong>elementum </strong>nunc quis sapien congue, in rhoncus eros elementum. Sed pretium eleifend sapien, finibus imperdiet lectus efficitur ac. Aliquam semper vestibulum diam, ac consectetur metus euismod at. Nullam interdum tortor et metus vehicula imperdiet. Etiam sit amet sapien elit. Sed luctus semper dolor vel condimentum. Morbi commodo dui urna, a blandit ante commodo at. Sed ullamcorper est eros, eget scelerisque enim feugiat vitae. Morbi felis nisi, porttitor id imperdiet non, suscipit finibus felis.</p><p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices <strong>posuere </strong>cubilia Curae; Pellentesque eget lectus condimentum, efficitur magna at, tincidunt orci. Nullam blandit, ligula eu commodo ornare, orci felis pretium quam, vel pretium leo nibh nec ante. Fusce condimentum ut ex nec hendrerit. Ut tincidunt a urna rutrum interdum. Donec tempor dui et justo ultrices sodales. Suspendisse sed vehicula mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut condimentum tellus at pretium aliquam. Curabitur molestie neque ut leo tincidunt interdum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt lorem elit, ac lacinia urna faucibus mattis.</p><p>Vivamus orci ex, laoreet hendrerit dignissim vitae, bibendum ac turpis. Donec facilisis sem in ullamcorper tincidunt. Ut euismod neque non fringilla maximus. Morbi malesuada nulla ut augue faucibus lobortis. Vestibulum gravida lorem vel lacus interdum, sed posuere lacus scelerisque. Aliquam vestibulum ante at turpis maximus placerat. Mauris sed pulvinar lectus. Praesent augue leo, egestas blandit fringilla nec, euismod ac libero.</p><p>Donec aliquam sapien id eleifend dapibus. Donec sed <strong>turpis </strong>nec nunc elementum eleifend. Cras nec luctus turpis, eu fermentum orci. Integer eu congue sapien. Vestibulum cursus lacus quis dui vestibulum, vel laoreet mauris accumsan. Nulla hendrerit et velit in consequat. Nullam nunc ante, gravida a mauris ut, suscipit vulputate sapien. Ut molestie venenatis lectus sit amet tempor. Nullam lacus dui, volutpat sit amet dolor non, faucibus tristique neque.</p><p>Cras dictum ultricies lectus quis iaculis. Curabitur laoreet ante nulla, a dignissim ipsum blandit ut. Praesent libero turpis, auctor at nibh vitae, aliquet hendrerit dolor. Donec sollicitudin neque orci, eget condimentum ipsum luctus non. Aliquam a felis ligula. Nullam fringilla varius nunc, in sodales mi convallis ac. Duis in massa sit amet turpis hendrerit commodo. Sed suscipit metus id rutrum ultricies. Mauris rhoncus viverra tortor, nec fringilla sapien sodales nec. Integer placerat venenatis nibh, bibendum viverra sapien pharetra sed.</p><p>Suspendisse ac ultrices odio, sit amet semper eros. Aliquam mollis tempus elit, in suscipit sem fringilla sed. Duis nisl sem, lobortis cursus mauris sit amet, iaculis imperdiet tortor. Quisque semper nec neque ut suscipit. Nunc mauris risus, dictum in nisl vitae, tempor commodo erat. Donec vehicula sed tortor nec suscipit. Fusce faucibus, ipsum et euismod mattis, ligula augue cursus nulla, vel hendrerit arcu elit non augue. Praesent quis elementum felis. Sed aliquet sed quam non facilisis. Pellentesque et turpis eget arcu faucibus vehicula vel a quam. In cursus non massa eget porttitor.</p><p><br></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><ul><li>Duis vel ante nec quam maximus maximus.</li><li>Quisque quis lacus eget sem molestie convallis at id odio.</li></ul>', 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` int(11) NOT NULL,
  `galeri_url` text NOT NULL,
  `urun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `galeri_url`, `urun_id`) VALUES
(1, '/resimler/galeri/\\mavi.jpg', 1),
(2, '/resimler/galeri/\\mavi2.jpg', 1),
(3, '/resimler/galeri/\\mavi3.jpg', 1),
(4, '/resimler/galeri/\\star-tekli.jpg', 1),
(5, '/resimler/galeri/\\star-uclu.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `harita`
--

CREATE TABLE `harita` (
  `id` int(11) NOT NULL,
  `adres` text NOT NULL,
  `telefon` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `calisma` varchar(300) NOT NULL,
  `lat` varchar(300) NOT NULL,
  `lng` varchar(300) NOT NULL,
  `ggle_api` varchar(300) NOT NULL,
  `iletisim_ust` varchar(300) NOT NULL,
  `iletisim_alt` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `harita`
--

INSERT INTO `harita` (`id`, `adres`, `telefon`, `email`, `calisma`, `lat`, `lng`, `ggle_api`, `iletisim_ust`, `iletisim_alt`) VALUES
(1, 'Akbez Mahallesi, Gaziantep , Antakya Yolu Üzeri 31700 Hassa/Hatay', '123456', 'ytoluyag@gmail.com', 'Hafta İçi 8:00-17:00', '', '', '', 'Fikirlere Açık mısınız ?', 'Bir Fincan Kahve ?');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `kat_id` int(11) NOT NULL,
  `kat_adi` varchar(300) NOT NULL,
  `kat_aciklama` text NOT NULL,
  `kat_desc` varchar(300) NOT NULL,
  `kat_ust` int(11) NOT NULL,
  `kat_sef` varchar(300) NOT NULL,
  `kat_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `kat_durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kat_id`, `kat_adi`, `kat_aciklama`, `kat_desc`, `kat_ust`, `kat_sef`, `kat_tarih`, `kat_durum`) VALUES
(1, 'Panel Mobilya', 'Panel Mobilya', 'panel,Panel Mobilya', 0, 'panel-mobilya', '2018-02-26 10:07:04', 1),
(2, 'Yatak Odaları', 'Yatak Odası Dekorasyonları', 'yatak,yatak odası', 1, 'yatak-odalari', '2018-02-26 10:08:00', 1),
(3, 'Yemek Odaları', 'Birbirinden Güzel Yatak Odaları', 'yemek,yemek odası', 1, 'yemek-odalari', '2018-02-26 10:08:39', 1),
(4, 'Yaşam Üniteleri', 'Yaşam Ünite Dekarasyon', 'yaşam,ünite', 1, 'yasam-uniteleri', '2018-02-26 10:09:13', 1),
(5, 'Oturma Grupları', 'Birbirinden Güzel Oturma Odaları', 'oturma,oturma grubu', 0, 'oturma-gruplari', '2018-02-26 10:10:02', 1),
(6, 'Koltuk Takımları', 'Koltuk Takım Tasarımları', 'koltuk,takım', 5, 'koltuk-takimlari', '2018-02-26 10:10:45', 1),
(7, 'Köşe Takımları', 'Birbirinden Güzel Köşe Takımları', 'köşe takımları,köşe takımı', 5, 'kose-takimlari', '2018-02-26 10:11:30', 1),
(8, 'Uyku Koleksiyonu', 'Uyku Koleksiyonunlarımız', 'uyku,uyku takımı', 0, 'uyku-koleksiyonu', '2018-02-26 10:12:18', 1),
(9, 'Yatak ', 'yatak çeşitlerimiz', 'yatak,yatak tasarımı', 8, 'yatak', '2018-02-26 10:13:02', 1),
(10, 'Baza ve Başlık', 'Baza ve Başlık tasarımlarımız', 'baza,başık,baza başlık', 8, 'baza-ve-baslik', '2018-02-26 10:13:40', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuler`
--

CREATE TABLE `menuler` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` int(11) NOT NULL,
  `menu_ad` varchar(250) NOT NULL,
  `menu_sef` varchar(120) NOT NULL,
  `menu_url` varchar(250) NOT NULL,
  `menu_sira` int(11) NOT NULL,
  `menu_durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `menuler`
--

INSERT INTO `menuler` (`menu_id`, `menu_ust`, `menu_ad`, `menu_sef`, `menu_url`, `menu_sira`, `menu_durum`) VALUES
(1, 0, 'Ana Sayfa', 'ana-sayfa', 'index.php', 1, 1),
(2, 0, 'Hakkımızda', 'hakkimizda', 'hakkimda.php', 2, 1),
(3, 0, 'İletişim', 'iletisim', 'iletisim.php', 3, 1),
(4, 3, 'Misyon ve Vizyon', 'misyon-ve-vizyon', 'misyon-ve-vizyon', 1, 1),
(5, 3, 'Bayilerimiz', 'bayilerimiz', 'bayilerimiz', 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_ad` varchar(300) NOT NULL,
  `mesaj_tel` varchar(300) NOT NULL,
  `mesaj_icerik` text NOT NULL,
  `mesaj_durum` int(2) NOT NULL,
  `mesaj_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `mesaj_ip` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reklamlar`
--

CREATE TABLE `reklamlar` (
  `reklam_id` int(11) NOT NULL,
  `reklam_baslik` varchar(255) NOT NULL,
  `reklam_icerik` text NOT NULL,
  `reklam_resim` varchar(255) NOT NULL,
  `reklam_sure` int(11) NOT NULL,
  `reklam_url` varchar(255) NOT NULL,
  `reklam_zaman` int(11) NOT NULL,
  `reklam_onay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `reklamlar`
--

INSERT INTO `reklamlar` (`reklam_id`, `reklam_baslik`, `reklam_icerik`, `reklam_resim`, `reklam_sure`, `reklam_url`, `reklam_zaman`, `reklam_onay`) VALUES
(0, 'Mustafa Kemal Atatürk', '<p>Mustafa Kemal Atatürk, Türk Kurtuluş Savaşı\'nın askeri ve siyasi lideri, Türkiye Cumhuriyeti\'nin kurucusu ve 1923\'ten 1938\'e dek görev yapmış ilk Cumhurbaşkanı, Türk Ordusu Mareşali ve daha öncesinde bir Osmanlı paşası</p>', '/resimler/ty3103.png', 10, '', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `sayfa_id` int(11) NOT NULL,
  `sayfa_adi` varchar(255) NOT NULL,
  `sayfa_seo` varchar(255) NOT NULL,
  `sayfa_icerik` text NOT NULL,
  `sayfa_resim` varchar(300) NOT NULL,
  `sayfa_etiket` varchar(300) NOT NULL,
  `sayfa_desc` varchar(300) NOT NULL,
  `sayfa_durum` int(11) NOT NULL,
  `sayfa_sira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`sayfa_id`, `sayfa_adi`, `sayfa_seo`, `sayfa_icerik`, `sayfa_resim`, `sayfa_etiket`, `sayfa_desc`, `sayfa_durum`, `sayfa_sira`) VALUES
(1, 'bayilerimiz', 'bayilerimiz', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at pharetra sapien. Cras metus magna, rutrum ac erat semper, dapibus porta orci. Integer dictum dui nulla, et hendrerit arcu scelerisque vitae. Praesent quam massa, luctus quis blandit ut, elementum quis ipsum. Nullam consequat diam eu justo tempor posuere. Maecenas blandit porttitor libero, id pellentesque nisl ultrices ac. In laoreet velit vitae dolor sodales, ultricies imperdiet risus blandit. Maecenas placerat molestie velit id tempus. Cras tincidunt scelerisque dolor eget mattis. Morbi venenatis quis mauris vel ultrices. In elementum arcu nec elit venenatis blandit. Cras et accumsan augue, nec rutrum quam. Duis vehicula quam eget lacus sollicitudin, non hendrerit lectus imperdiet. Cras tristique bibendum lacinia. Nam ac felis at sapien eleifend bibendum sed quis mauris.</p><p>Nulla facilisi. Praesent id fringilla augue. Vivamus rutrum purus nec lacus pharetra ullamcorper. Nullam ac rhoncus odio. Phasellus diam erat, aliquam non volutpat non, molestie nec felis. Vivamus egestas magna et eros egestas commodo. Suspendisse tincidunt in lectus in egestas. Aliquam accumsan gravida tortor nec sagittis. Mauris molestie eget leo at placerat. Ut quis augue imperdiet, varius libero sit amet, rutrum quam. Maecenas non ligula leo. Pellentesque vel facilisis dui. Aliquam lectus mauris, porta vel dapibus ut, mollis at neque. Proin mi mi, facilisis et urna eget, rutrum semper est. Aliquam erat volutpat.</p><p>Suspendisse eu orci porta, vestibulum nisl et, dapibus nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed aliquet est lectus. Nulla eleifend massa gravida ex volutpat pretium. Duis sagittis ornare quam, sit amet placerat ante tincidunt id. Proin eu nisi quam. Nam vehicula, dui ut iaculis gravida, dui purus auctor massa, quis tempor nunc orci sed nibh. Morbi laoreet libero sit amet convallis hendrerit. Proin vitae velit id magna sagittis efficitur. Proin quis turpis sit amet odio vulputate placerat eleifend in justo. Vestibulum est dolor, vehicula eget mi non, feugiat interdum nisl. Aliquam vel magna justo. Curabitur urna nunc, ultrices nec sem at, egestas malesuada felis. Vestibulum accumsan malesuada tellus, non maximus nisi congue vitae. Proin feugiat, augue at mattis imperdiet, purus nulla efficitur orci, sit amet dapibus arcu ipsum a metus.</p><p>Sed et magna quam. Cras mollis vulputate consequat. Duis ullamcorper tincidunt ex, dictum rutrum nunc fermentum in. Integer non nisi lectus. Integer quis velit nibh. Fusce sit amet magna a arcu cursus sollicitudin. Aenean congue pellentesque velit sed interdum. Ut in tempor elit.</p><p>Duis porta, eros ut gravida auctor, mauris nunc mollis leo, posuere euismod felis nisl id dui. In eget congue nulla. Mauris laoreet justo nisl, porttitor accumsan erat scelerisque eu. Donec eget sapien in urna rutrum posuere. Phasellus consequat dignissim risus, et sodales dolor gravida vitae. Aliquam iaculis neque tortor. Nulla porta libero eu purus ullamcorper, eu pharetra urna luctus. Vivamus augue odio, rutrum id mi ac, facilisis consectetur nulla. Nulla maximus aliquam augue non congue. Ut suscipit, purus vitae gravida ullamcorper, turpis nisi tincidunt lectus, a hendrerit lorem nunc a nisl. In non tellus ultricies, eleifend diam ut, faucibus tortor.</p>', '/resimler/rt9517.jpg', 'bayiler,bayilerimiz', 'bayilerimiz hakkında iletişim bilgileri', 1, 1),
(2, 'Misyon ve Vizyon', 'misyon-ve-vizyon', '<p><strong>Vizyonumuz;</strong></p><p>X<strong>&nbsp;</strong>firmasının çözüm ortağı olmak ayrıcalığıyla,&nbsp;en yeni ve en modern ticari stratejileri ve pazar yaklaşımlarını benimseyerek gelecek hedeflerimizi ekibimizle birlikte gerçekleştirmektir.</p><p>&nbsp;</p><p><strong>Misyonumuz;</strong></p><p>Etik değerler, çalışma bilinci, sevgi ve saygı temelinde bir araya gelmiş ve ekip olabilmeyi başarmış arkadaşlarımızla birlikte, sağlık ve varlık yolunda tüm dünyaya değer katabilmek ve kazanırken kazandırmayı düstur edinmektir.</p>', '/resimler/fg7293.jpg', 'vizyon,misyon', 'Profeyonel Php Scriptleri Burada', 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `sip_id` int(11) NOT NULL,
  `s_adsoy` varchar(300) NOT NULL,
  `s_eposta` varchar(300) NOT NULL,
  `s_tel` varchar(300) NOT NULL,
  `s_mesaj` text NOT NULL,
  `s_urunid` int(11) NOT NULL,
  `s_durum` enum('Beklemede','Tedarik Sürecinde','Kargoya Verildi','Tamamlandı','İptal Edildi') NOT NULL DEFAULT 'Beklemede',
  `s_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(250) NOT NULL,
  `slider_ne` varchar(300) NOT NULL,
  `slider_aciklama` varchar(300) NOT NULL,
  `slider_resim` varchar(250) NOT NULL,
  `slider_link` varchar(300) NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_durum` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_ne`, `slider_aciklama`, `slider_resim`, `slider_link`, `slider_sira`, `slider_durum`) VALUES
(1, 'Evinizi Süslemeye', 'Hazırız', 'Hizmet yelpazemizi değerlendirebilir ve hizmetlerimizin tadını çıkarabilirler.', '/resimler/ty4971.jpg', '', 1, 1),
(2, 'Ofinizi Süslemeye', 'Hazırız', 'Hizmet yelpazemizi değerlendirebilir ve hizmetlerimizin tadını çıkarabilirler.', '/resimler/as4061.jpg', '', 3, 1),
(3, 'Dekorasyonda', 'Fark Yaratıyoruz', 'Hizmet yelpazemizi değerlendirebilir ve hizmetlerimizin tadını çıkarabilirler.', '/resimler/rt2232.jpg', '', 2, 1),
(4, '%100', 'Yerli', 'Hizmet yelpazemizi değerlendirebilir ve hizmetlerimizin tadını çıkarabilirler.', '/resimler/rt6449.jpg', '', 4, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `u_id` int(11) NOT NULL,
  `u_katid` int(11) NOT NULL,
  `u_ekleyen` int(11) NOT NULL,
  `u_baslik` varchar(300) NOT NULL,
  `u_fiyat` double NOT NULL,
  `u_sef` varchar(300) NOT NULL,
  `u_icerik` text NOT NULL,
  `u_resim` varchar(300) NOT NULL,
  `u_etiket` varchar(300) NOT NULL,
  `u_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `u_durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`u_id`, `u_katid`, `u_ekleyen`, `u_baslik`, `u_fiyat`, `u_sef`, `u_icerik`, `u_resim`, `u_etiket`, `u_tarih`, `u_durum`) VALUES
(1, 5, 2, 'Star Midi Koltuk Takımı - Lacivert', 2490, 'star-midi-koltuk-takimi---lacivert', '<p>Star Koltuk 2019 kolleksiyonumuzla siz kullanıcıların beğenisine sunulmuştur.</p>', '/resimler/\\mavi.jpg', 'Oturma Grubu , Kanepe Takımları', '2020-01-16 22:48:25', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `uye_adi` varchar(300) NOT NULL,
  `uye_eposta` varchar(100) NOT NULL,
  `uye_sifre` varchar(300) NOT NULL,
  `uye_durum` int(2) NOT NULL,
  `uye_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_adi`, `uye_eposta`, `uye_sifre`, `uye_durum`, `uye_tarih`) VALUES
(1, 'kullanici', 'kullanici@localhost.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 2, '2017-06-16 14:32:33'),
(2, 'admin', 'admin@localhost.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 1, '2017-06-16 14:32:33');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`site_id`);

--
-- Tablo için indeksler `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Tablo için indeksler `harita`
--
ALTER TABLE `harita`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`kat_id`);

--
-- Tablo için indeksler `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `reklamlar`
--
ALTER TABLE `reklamlar`
  ADD PRIMARY KEY (`reklam_id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`sayfa_id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`sip_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`u_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `harita`
--
ALTER TABLE `harita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `kat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `menuler`
--
ALTER TABLE `menuler`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `sayfa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `sip_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
