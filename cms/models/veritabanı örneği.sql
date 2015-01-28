-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Oca 2015, 11:04:30
-- Sunucu sürümü: 5.6.20
-- PHP Sürümü: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `cms`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
`blog_id` int(11) NOT NULL,
  `baslik` varchar(150) NOT NULL,
  `resim` text NOT NULL,
  `icerik` mediumtext NOT NULL,
  `kategori_id` smallint(6) NOT NULL,
  `keyword` text NOT NULL,
  `description` varchar(160) NOT NULL,
  `blog_tarih` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`blog_id`, `baslik`, `resim`, `icerik`, `kategori_id`, `keyword`, `description`, `blog_tarih`) VALUES
(5, 'Bash Nedir', 'public/images/yazilar/urunyonetimi.png', '<p>1. Bash Nedir?<br />\r\nBash GNU i&cedil;sletim sistemi i&ccedil;in bir kabuk ya da ba&cedil;ska bir deyi&cedil;sle komut dili yorumlayıcısıdır. Bourne&ndash;Again<br />\r\nSHell s&ouml;zc&uuml;klerinde t&uuml;retilmi&cedil;s bir kısaltmadır. Bell Ara&cedil;stırma Laboratuarının Unix&rsquo;inin yedinci s&uuml;r&uuml;m&uuml;ndeki, &cedil;su<br />\r\nanki Unix kabu˘gu sh&rsquo;ın atasının yazarı Stephen Bourne&rsquo;a atfen bu isim verilmi&cedil;stir.</p>\r\n\r\n<p>Bash, sh&rsquo;ın hemen hemen t&uuml;m &ouml;zelliklerini ve Korn kabu˘gu olan ksh ile C kabu˘gu olarak bilinen csh&rsquo;ın kullanı&cedil;slı<br />\r\n&ouml;zelliklerini bir araya getirir. IEEE POSIX belirtiminin IEEE POSIX Kabuk ve Ara&ccedil;ları b&ouml;l&uuml;m&uuml;ne (IEEE Standardı<br />\r\n1003.1) uygun bir &uuml;r&uuml;n olması ama&ccedil;lanmı&cedil;stır. sh&rsquo;ın hem etkile&cedil;simli hem de programlama i&ccedil;in kullanımını i&cedil;slevsel<br />\r\nolarak arttıran geli&cedil;stirmeler i&ccedil;erir.<br />\r\nGNU i&cedil;sletim sistemi, csh&rsquo;ın bir s&uuml;r&uuml;m&uuml; de dahil olmak &uuml;zere ba&cedil;ska kabuklarla da te&ccedil;hiz edilmi&cedil;sse de Bash<br />\r\n&ouml;ntanımlı kabuktur. Di˘ger GNU yazılımları gibi Bash&rsquo;de bir &ccedil;ok i&cedil;sletim sistemine uyarlanabilir &ndash; MS&ndash;DOS, OS/2<br />\r\nve Windows platformları i&ccedil;in ba˘gımsız olarak desteklenen s&uuml;r&uuml;mleri vardır.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 'bash', 'Bash Nedir?', '2014-12-01'),
(7, 'ICEcoder IDE – Tarayıcıda Kod Yazmak', 'public/images/yazilar/webdesign.png', '<p>Bir s&uuml;redir&nbsp;Koding diye bir sitede yazılımcı sosyal ağı denebilecek bir sitede keşif yapıyordum. Burada &uuml;yelik aldığınızda ufak bir miktar alan ile (bende 3 gb idi) sanal sunucu temin ediyor ve bir profil sağlıyor. Ace edit&ouml;r ile phyton, ruby, php, html gibi bir &ccedil;ok dilde kod yazmanızı sağlıyor. Sanal sunucunuzun terminaline direk bağlanma imkanı sağlıyor. Bir projede arkadaşlarınızı ekleyip birden fazla kişi ile geliştirmenize olanak sağlıyor. G&uuml;zel bir sistem. Ama ben projelerimi onların sunucusunda &ccedil;alıştırmak istemedim. &Uuml;stelik verdikleri domain 24 saat a&ccedil;ık değil. Siz &ccedil;evrimi&ccedil;i iseniz a&ccedil;ık. Aksi takdirde domaine bağlanılamıyor. Fakat tarayıcı &uuml;zerinden kod yazmak istiyordum ben de. Bilgisayara bağımlı kalmayı sevmiyorum. Aynı zamanda localhost ile web arasında farklar oluşabiliyor. Bunun i&ccedil;in sunucuma y&uuml;kleyebileceğim bir ide aramaya başladım. Bir yarım saatlik arayış sonunda bulabildim.</p>\r\n\r\n<h3>ICEcoder &ndash; G&uuml;zel Bir IDE</h3>\r\n', 1, 'ICEcoder IDE – Tarayıcıda Kod Yazmak', 'ICEcoder IDE – Tarayıcıda Kod Yazmakklşk', '2014-12-05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeriler`
--

CREATE TABLE IF NOT EXISTS `galeriler` (
`galeriler_id` smallint(6) NOT NULL,
  `sayfa` smallint(6) NOT NULL,
  `kutuphane` smallint(6) NOT NULL,
  `sira` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE IF NOT EXISTS `kategoriler` (
`kategoriler_id` smallint(6) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategoriler_id`, `kategori`) VALUES
(1, 'Genel'),
(2, 'Php'),
(5, 'Yazılım'),
(6, 'Phyton'),
(7, 'Donanım');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE IF NOT EXISTS `kullanicilar` (
`kullanicilar_id` smallint(6) NOT NULL,
  `kullaniciadi` varchar(50) NOT NULL,
  `sifre` varchar(50) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `soyad` varchar(100) NOT NULL,
  `e_mail` varchar(200) NOT NULL,
  `yetki` smallint(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanicilar_id`, `kullaniciadi`, `sifre`, `ad`, `soyad`, `e_mail`, `yetki`) VALUES
(1, 'admin', 'admin', 'Erhan', 'Kılıç', 'info@ideayazilim.net', 1),
(2, 'test', 'test', 'test', 'test', 'test@test.com', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kutuphane`
--

CREATE TABLE IF NOT EXISTS `kutuphane` (
`kutuphane_id` smallint(6) NOT NULL,
  `kutuphane_ad` varchar(200) NOT NULL,
  `kutuphane_adres` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `kutuphane`
--

INSERT INTO `kutuphane` (`kutuphane_id`, `kutuphane_ad`, `kutuphane_adres`) VALUES
(1, 'Casper', 'public/images/kutuphane/casper_demo.png'),
(2, 'Dynamicnews', 'public/images/kutuphane/dynamicnews_demo.png'),
(3, 'Fictive', 'public/images/kutuphane/fictive_demo.png'),
(4, 'Hueman', 'public/images/kutuphane/hueman_demo.png'),
(5, 'Influence', 'public/images/kutuphane/influence_demo.png'),
(6, 'Inkzine', 'public/images/kutuphane/inkzine_demo.png'),
(7, 'Kathmandu', 'public/images/kutuphane/kathmandu_demo.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`menu_id` smallint(6) NOT NULL,
  `menu_ad` varchar(100) NOT NULL,
  `menu_sira` smallint(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ad`, `menu_sira`) VALUES
(1, 'Blog', 1),
(2, 'Hakkımızda', 2),
(3, 'İletişim', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE IF NOT EXISTS `sayfalar` (
`sayfalar_id` smallint(6) NOT NULL,
  `sayfa_baslik` varchar(200) NOT NULL,
  `sayfa_icerik` mediumtext NOT NULL,
  `sayfa_aciklama` varchar(160) NOT NULL,
  `sayfa_anahtarkelimeler` text NOT NULL,
  `menu_` smallint(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`sayfalar_id`, `sayfa_baslik`, `sayfa_icerik`, `sayfa_aciklama`, `sayfa_anahtarkelimeler`, `menu_`) VALUES
(1, 'Deneme Sayfa', '<p>Denemeeee Sayfaaaa</p>\r\n', 'Açıklamaa', 'Anahtar Kelimeler', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sira`
--

CREATE TABLE IF NOT EXISTS `sira` (
`sira_id` smallint(6) NOT NULL,
  `menu` smallint(6) NOT NULL,
  `sayfa` smallint(6) NOT NULL,
  `sira_no` smallint(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `sira`
--

INSERT INTO `sira` (`sira_id`, `menu`, `sayfa`, `sira_no`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site`
--

CREATE TABLE IF NOT EXISTS `site` (
`site_id` tinyint(4) NOT NULL,
  `baslik` varchar(50) NOT NULL,
  `keywords` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `site`
--

INSERT INTO `site` (`site_id`, `baslik`, `keywords`, `description`, `logo`) VALUES
(1, 'Site Başlığı', 'anahtar, kelimeler', 'site açıklaması', 'public/images/logo/contact.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
 ADD PRIMARY KEY (`blog_id`);

--
-- Tablo için indeksler `galeriler`
--
ALTER TABLE `galeriler`
 ADD PRIMARY KEY (`galeriler_id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
 ADD PRIMARY KEY (`kategoriler_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
 ADD PRIMARY KEY (`kullanicilar_id`);

--
-- Tablo için indeksler `kutuphane`
--
ALTER TABLE `kutuphane`
 ADD PRIMARY KEY (`kutuphane_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
 ADD PRIMARY KEY (`sayfalar_id`);

--
-- Tablo için indeksler `sira`
--
ALTER TABLE `sira`
 ADD PRIMARY KEY (`sira_id`);

--
-- Tablo için indeksler `site`
--
ALTER TABLE `site`
 ADD PRIMARY KEY (`site_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `galeriler`
--
ALTER TABLE `galeriler`
MODIFY `galeriler_id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
MODIFY `kategoriler_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
MODIFY `kullanicilar_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `kutuphane`
--
ALTER TABLE `kutuphane`
MODIFY `kutuphane_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
MODIFY `menu_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
MODIFY `sayfalar_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `sira`
--
ALTER TABLE `sira`
MODIFY `sira_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `site`
--
ALTER TABLE `site`
MODIFY `site_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
