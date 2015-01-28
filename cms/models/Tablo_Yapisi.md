-- Veritabanı: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

DROP TABLE IF EXISTS `blog`;
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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeriler`
--

DROP TABLE IF EXISTS `galeriler`;
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

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
`kategoriler_id` smallint(6) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
`kullanicilar_id` smallint(6) NOT NULL,
  `kullaniciadi` varchar(50) NOT NULL,
  `sifre` varchar(50) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `soyad` varchar(100) NOT NULL,
  `e_mail` varchar(200) NOT NULL,
  `yetki` smallint(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kutuphane`
--

DROP TABLE IF EXISTS `kutuphane`;
CREATE TABLE IF NOT EXISTS `kutuphane` (
`kutuphane_id` smallint(6) NOT NULL,
  `kutuphane_ad` varchar(200) NOT NULL,
  `kutuphane_adres` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
`menu_id` smallint(6) NOT NULL,
  `menu_ad` varchar(100) NOT NULL,
  `menu_sira` smallint(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

DROP TABLE IF EXISTS `sayfalar`;
CREATE TABLE IF NOT EXISTS `sayfalar` (
`sayfalar_id` smallint(6) NOT NULL,
  `sayfa_baslik` varchar(200) NOT NULL,
  `sayfa_icerik` mediumtext NOT NULL,
  `sayfa_aciklama` varchar(160) NOT NULL,
  `sayfa_anahtarkelimeler` text NOT NULL,
  `menu_` smallint(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sira`
--

DROP TABLE IF EXISTS `sira`;
CREATE TABLE IF NOT EXISTS `sira` (
`sira_id` smallint(6) NOT NULL,
  `menu` smallint(6) NOT NULL,
  `sayfa` smallint(6) NOT NULL,
  `sira_no` smallint(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
`site_id` tinyint(4) NOT NULL,
  `baslik` varchar(50) NOT NULL,
  `keywords` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

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