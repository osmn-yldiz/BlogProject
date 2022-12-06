-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Ara 2021, 14:31:53
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kendi_hayatim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

CREATE TABLE `about` (
  `ID` int(11) NOT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `SeoName` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Content1` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `Content2` text COLLATE utf8_turkish_ci NOT NULL,
  `Birthday` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Web` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Target` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `City` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Adress` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `Adress_Link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `Age` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Degree` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Mail` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Freelance` tinyint(1) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`ID`, `Images`, `Name`, `SeoName`, `Content1`, `Content2`, `Birthday`, `Web`, `Target`, `Phone`, `City`, `Adress`, `Adress_Link`, `Age`, `Degree`, `Mail`, `Freelance`, `Status`) VALUES
(1, '1.jpg', 'Osman Yıldız', 'osman-yildiz', 'Merhaba ben Osman Yıldız, 2000 yılında Karabük\'de doğdum. Yazılım alanına lise yıllarımda merak ederek başladım ve zevk alarak kod yazmayı hobi haline getirdim.', 'Ben Osman, Karabük\'de yaşıyorum. 2018 yılında Anadolu lisesinden mezun oldum, Web alanında kendimi geliştirmeye devam ettim. Sıfırdan web site yapmayı öğrendim, Veritabanı ve admin panel ile birlikte çalışarak sıfırdan web siteler kodlamaya başladım. Back-End ve php alanında tecrübeli, gelişime açık, tutkulu ve özenli çalışıyorum. Çalışmış olduğum projelerde başarılı bir ekip çalışanı olup gerektiğinde sorumluluk alarak projeyi yönetebiliyorum.', '21/09/2000', 'www.yildizosman.com', '_blank', '+90(530)-158-5544', 'Karabük', 'Safranbolu / Karabük', 'https://goo.gl/maps/GPdCXiXan61bMqC28', '21', 'Junior', 'osmann_yldz7878@hotmail.com', 1, 1),
(2, '1.jpg', 'Ramazan ŞEN', 'ramazan-sen', 'Merhaba ben Ramazan ŞEN, 2000 yılında Karabük\'de doğdum. Yazılım alanına lise yıllarımda merak ederek başladım ve zevk alarak kod yazmayı hobi haline getirdim.', 'Ben Osman, Karabük\'de yaşıyorum. 2018 yılında Anadolu lisesinden mezun oldum, Web alanında kendimi geliştirmeye devam ettim. Sıfırdan web site yapmayı öğrendim, Veritabanı ve admin panel ile birlikte çalışarak sıfırdan web siteler kodlamaya başladım. Back-End ve php alanında tecrübeli, gelişime açık, tutkulu ve özenli çalışıyorum. Çalışmış olduğum projelerde başarılı bir ekip çalışanı olup gerektiğinde sorumluluk alarak projeyi yönetebiliyorum.', '21 Eylül 2000', 'www.osmanyildiz.com', '_blank', '+90 530 158 55 44', 'Karabük', 'Safranbolu / Karabük', 'https://goo.gl/maps/GPdCXiXan61bMqC28', '20', 'Junior', 'ramazansen.tr@gmil.com', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aboutimages`
--

CREATE TABLE `aboutimages` (
  `ID` int(11) NOT NULL,
  `aboutID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `aboutimages`
--

INSERT INTO `aboutimages` (`ID`, `aboutID`, `Name`, `Images`, `Status`) VALUES
(1, 1, 'Osman Yıldız', '1.jpg', 1),
(2, 1, 'Osman Yıldız', '2.jpeg', 1),
(3, 1, 'Osman Yıldız', '3.jpeg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `files`
--

CREATE TABLE `files` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `FileName` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `files`
--

INSERT INTO `files` (`ID`, `Name`, `FileName`) VALUES
(1, 'Muhasebe Bilgileri', 'muhasebe-bilgileri.pdf'),
(2, 'Dekont Dosyası', 'dekont.docx');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `home`
--

CREATE TABLE `home` (
  `ID` int(11) NOT NULL,
  `Header` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Header_Link` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Content` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Content_underline` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `home`
--

INSERT INTO `home` (`ID`, `Header`, `Header_Link`, `Content`, `Content_underline`, `Status`) VALUES
(1, 'Osman Yıldız', 'cv/osman-yildiz', 'Ben Osman Yıldız', 'Web Geliştiriciyim.', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `inbox`
--

CREATE TABLE `inbox` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `message` text COLLATE utf8_turkish_ci NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `inbox`
--

INSERT INTO `inbox` (`ID`, `name`, `email`, `subject`, `message`, `CreateDate`) VALUES
(1, 'osman', 'osmann_yldz7878@hotmail.com', 'osman', 'osman', '2021-10-01 18:23:10'),
(2, 'osman', 'osmann_yldz7878@hotmail.com', 'osman', 'osman', '2021-10-04 10:47:13'),
(3, 'osman', 'osmann_yldz7878@hotmail.com', 'osman', 'osman', '2021-10-04 11:23:20'),
(4, 'osman', 'osmann_yldz7878@hotmail.com', 'osman', 'osman', '2021-10-04 15:18:49'),
(5, 'Osman', 'alahattin3434@hotmail.com', 'osman', 'osman', '2021-10-21 19:38:00'),
(6, 'osman', 'osmann_yldz7878@hotmail.com', 'osman', 'osman', '2021-11-10 13:23:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `interestedabout`
--

CREATE TABLE `interestedabout` (
  `ID` int(11) NOT NULL,
  `AboutID` int(11) NOT NULL,
  `InsterestedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `interestedabout`
--

INSERT INTO `interestedabout` (`ID`, `AboutID`, `InsterestedID`) VALUES
(30, 2, 1),
(31, 2, 4),
(32, 2, 8),
(43, 5, 2),
(44, 43, 3),
(45, 44, 4),
(46, 45, 5),
(47, 6, 4),
(48, 47, 5),
(49, 48, 6),
(50, 49, 7),
(51, 50, 8),
(52, 51, 9),
(97, 1, 1),
(98, 1, 2),
(99, 1, 3),
(100, 1, 4),
(101, 1, 5),
(102, 1, 6),
(103, 1, 7),
(104, 1, 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `interests`
--

CREATE TABLE `interests` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Icon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Color` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `interests`
--

INSERT INTO `interests` (`ID`, `Name`, `Icon`, `Color`, `Status`) VALUES
(1, 'Seyahat Etmeyi seviyorum', 'ri-store-line', '#ffbb2c', 1),
(2, 'Simülasyon Oyunları', 'ri-bar-chart-box-line', '#5578ff', 1),
(3, 'Teknoloji Haberleri Okumak', 'ri-calendar-todo-line', '#e80368', 1),
(4, 'Teknolojik Ürünleri İncelemek', 'ri-paint-brush-line', '#e361ff', 1),
(5, 'Belgesel İzlemek', 'ri-database-2-line', '#47aeff', 1),
(6, 'Spor Yapmak', 'ri-gradienter-line', '#ffa76e', 1),
(7, 'Futbol Maçı İzlemek', 'ri-file-list-3-line', '#11dbcf', 1),
(8, 'Doğa Yürüyüşü', 'ri-price-tag-2-line', '#4233ff', 1),
(9, 'Bilgisayar Oyunu', 'ri-price-tag-2-line', '#4233ff', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `main_menu`
--

CREATE TABLE `main_menu` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Link` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `OrderNumber` int(2) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `main_menu`
--

INSERT INTO `main_menu` (`ID`, `Name`, `Link`, `OrderNumber`, `Status`) VALUES
(1, 'Anasayfa', '#header', 1, 1),
(2, 'Hakkımda', '#about', 2, 1),
(3, 'Portfolyo', '#portfolio', 3, 1),
(4, 'İletişim', '#contact', 4, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projects`
--

CREATE TABLE `projects` (
  `ID` int(11) NOT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Target` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `projects`
--

INSERT INTO `projects` (`ID`, `Images`, `Name`, `Link`, `Target`, `Status`) VALUES
(1, 'project.jpg', 'Yıldızlı Ürünler', 'https://www.yildizliurunler.com.tr/', '_blank', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `skill`
--

CREATE TABLE `skill` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `Value` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `skill`
--

INSERT INTO `skill` (`ID`, `Name`, `Value`, `Status`) VALUES
(1, 'HTML', '100', 1),
(2, 'CSS', '90', 1),
(3, 'JAVASCRİPT', '30', 1),
(4, 'PHP', '70', 1),
(8, 'PHOTOSHOP', '30', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `socialmedia`
--

CREATE TABLE `socialmedia` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Icon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Target` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `socialmedia`
--

INSERT INTO `socialmedia` (`ID`, `Name`, `Link`, `Icon`, `Target`, `Status`) VALUES
(1, 'twitter', '', 'bi bi-twitter', '_blank', 1),
(2, 'facebook', '', 'bi bi-facebook', '_blank', 1),
(3, 'linkedin', '', 'bi bi-linkedin', '_blank', 1),
(4, 'instagram', 'https://www.instagram.com/_osman.yildiz_/', 'bi bi-instagram', '_blank', 1),
(5, 'github', 'https://github.com/Osman1478', 'bi bi-github', '_blank', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `lockedCount` tinyint(1) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`ID`, `Images`, `Name`, `Email`, `Password`, `lockedCount`, `CreateDate`) VALUES
(1, 'users.jpg', 'Osman Yıldız', 'osmann_yldz7878@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2021-11-10 18:36:44');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `aboutimages`
--
ALTER TABLE `aboutimages`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `interestedabout`
--
ALTER TABLE `interestedabout`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `about`
--
ALTER TABLE `about`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `aboutimages`
--
ALTER TABLE `aboutimages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `home`
--
ALTER TABLE `home`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `interestedabout`
--
ALTER TABLE `interestedabout`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Tablo için AUTO_INCREMENT değeri `interests`
--
ALTER TABLE `interests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `projects`
--
ALTER TABLE `projects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `skill`
--
ALTER TABLE `skill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
