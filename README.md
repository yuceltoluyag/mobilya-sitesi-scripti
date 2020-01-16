# Mobilya Sitesi Scripti!

Merhaba script yazıp bırakmıştım,sürekli üzerine birşeyler ekleyip duruyordum. Cloud dosyalarımı temizlerken gördüm. PHP 'nin son sürümünde dahi çalışmaktadır. **PDO**  kullanarak geliştirmeye çalışıyordum ozamanlar  ¯\_(ツ)_/¯  Yine herhangi bir sorunla karşılaşırsanız düzeltirim,lakin şu özelliği eklesen şunuda eklesen gibi kişisel isteklerde bulunmayınız. Zira onu yapmak içimden gelmediği gibi yazılımsal faaliyetlerde bulunmak istemiyorum. ಠ_ಠ

## Uyarı.

Hatırladığım kadarıyla  yönetici panelinde [vali admin ](https://pratikborsadiya.in/vali-admin/)  temasını kullanmıştım. Admin paneli open source olduğu için aklımda kalmış  lakin ön yüz için emin değilim.  Ön yüzden tam emin değilim. Belki  araklamışda olabilirim yada ne bileyim gençlik ateşiyle nulled olarak indirmiş olabilirim. Bu yüzden ***kesinlikle  kesinlikle ve kesinlikle***  ön yüz halini olduğu gibi kullanıp sitenizi yayına felan almayın. ***Tamamen sorumluluk size aittir.***


# Kimlerin İşine Yarayabilir ?

Yukarıda da belirtiğim gibi cloud temizliği yaparken ve yazılıma olan isteksizliğimden ötürü.  Yepisyeni php'ye başlamış arkadaşlar,üzerine birşeyler katarak dahada iyisini yapabilirler. Klasör düzenim,kodlama biçimim **çorbasal,spagetti,aduket tarikatı** vb gibi olabilir, zira yeni başladıysanız youtubede udemyde olsun hepsi bu çorbasal düzeni kullanarak anlatıyor. Ancak yeni başlayan birisinin kolayca anlayabileceğini hangi özelliğin nasıl kullanıldığını dökümanı okuyarak anlayabileceğini umuyorum.

## Dosya Yapısı

**css,fonts,img,js**->  ön yüze ait dosyalar
**inc** ->  ön yüzde yapılan sipariş verme,iletişim formu ve admin paneline giriş işlemine ait dosyaların tutulduğu yer
**mail** -> [phpmailer sınıfına ait dosyalar](https://github.com/PHPMailer/PHPMailer)
**resimler**  ->ürün resimleri ve galerisine ait dosyaların tutulduğu alan
**sistem**  ->  veritabanı bağlantısı,fonksiyonların olduğu kısım
**yonet** -> admin paneli

## Neler yapmıştım

Hatırladığım kadarıyla ve bu yazıyı yazarken arada baktım  (▀̿Ĺ̯▀̿ ̿)

Ön yüzde
* Menu
* Slider
* Sayfa aşağıya indikçe yüklenen ürün listesi
* Ürünler Sayfasını Takip Eden Kategoriler
* Sipariş Ver
* Benzer Ürünler
* İletişim
* Sayfaya Özel Popup Reklam(Süreli)
* SweetAlert Kullanılmıştır.
Ön yüzde ki tüm alanlar admin panelinden kontrol ediliyor. Hatta sliderda ki kelimeler bile.  İletişim ve Sipariş iletileri admin paneline düşmektedir. İletişimden gelen mesajlar ayrıca mail  olarakta bildirim yapmaktadır.

## Görseller
![Admin Paneli](https://raw.githubusercontent.com/yuceltoluyag/mobilya-sitesi-scripti/master/sirkin%C5%9Fat/yonet.png)

![Önyüz](https://raw.githubusercontent.com/yuceltoluyag/mobilya-sitesi-scripti/master/sirkin%C5%9Fat/oku.png)

# Neler Yapmadım ?

Scriptte görünüpte, belkide yapmadığım yarım kalmış birşeyler olabilir,net hatırladığım seo url yapısı yapmamıştım.  Sizede en başlarda böyle çalışmayı tavsiye ediyorum. Udemy üzerinden bir set yada youtubeden bir video izleyip aynısını yapmaya çalışmayın. Üzerine birşeyler ekleyin,kategori mi yaptı videoda sizde alt kategorili menü yapmaya çalışın gibi gibi.


# Boş Muhabbet

Gece Gece canım sıkıldı,böyle uzunca bir ridmi dosyası yazasım geldi : )
