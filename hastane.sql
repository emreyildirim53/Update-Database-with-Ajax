-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Tem 2018, 21:05:19
-- Sunucu sürümü: 10.1.24-MariaDB
-- PHP Sürümü: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hastane`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hasta`
--

CREATE TABLE `hasta` (
  `hid` int(11) NOT NULL,
  `tc` bigint(11) NOT NULL,
  `ad` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `soyad` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `y_tc` bigint(11) NOT NULL,
  `sifre` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `oda` int(11) NOT NULL,
  `servis` text CHARACTER SET utf8 COLLATE utf8_turkish_ci,
  `izsaatbas` time NOT NULL,
  `izsaatbit` time NOT NULL,
  `sure` int(255) NOT NULL,
  `link` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `hasta`
--

INSERT INTO `hasta` (`hid`, `tc`, `ad`, `soyad`, `y_tc`, `sifre`, `oda`, `servis`, `izsaatbas`, `izsaatbit`, `sure`, `link`, `tarih`) VALUES
(1, 1, 'HAKKI', 'ATEŞ', 11, '1', 1, 'Cerrahi', '00:00:00', '23:59:00', 27, '', '2018-06-25'),
(3, 2, 'ali', 'baş', 22, '2', 2, NULL, '17:00:00', '17:30:00', 30, '', '2018-06-20');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `hasta`
--
ALTER TABLE `hasta`
  ADD PRIMARY KEY (`hid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `hasta`
--
ALTER TABLE `hasta`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
