-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Mar 2021, 22:27:00
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `vivense`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `CategoryUniqid` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `CategoryName` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryUniqid`, `CategoryName`) VALUES
(1, '603539b085b7a', 'Ekran Kartları'),
(2, '603539b085b7a', 'Ekranlar'),
(3, '60355d8el1b7a', 'Bilgisayar Ekipmanları');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `ProductUniqid` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ProductName` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ProductPurchasePrice` float(9,2) DEFAULT NULL,
  `ProductSellPrice` float(9,2) DEFAULT NULL,
  `ProductContent` text COLLATE utf8_turkish_ci NOT NULL,
  `CategoryId` tinyint(11) NOT NULL DEFAULT 1,
  `SubCategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`ProductId`, `ProductUniqid`, `ProductName`, `ProductPurchasePrice`, `ProductSellPrice`, `ProductContent`, `CategoryId`, `SubCategoryId`) VALUES
(6, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(7, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(8, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(13, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(14, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(15, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(16, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(18, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(20, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(21, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(22, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(23, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(24, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(26, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(28, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(29, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(30, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(31, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(32, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(34, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(36, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(37, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(38, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(39, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(40, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(42, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(44, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(45, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(46, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(47, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(48, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(50, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(52, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(53, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(54, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(55, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(57, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(59, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(60, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(61, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(62, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(63, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(65, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(67, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(68, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(69, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(70, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(71, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(73, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(74, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 1, 1),
(75, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 2, 1),
(76, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(77, '603539c7c4758', 'Roundfix', 100.55, 10.54, '', 3, 1),
(78, '4b3403665fea2', 'Tamphomedd', 98.55, 10.54, '', 3, 1),
(79, '123456123456', 'Asus', 50.00, 70.00, '', 2, 1),
(84, '1425h0l6355', 'Test', 52.00, 68.52, 'tanıtım', 1, 1),
(85, '1425h0l6355', 'Test', 52.00, 68.52, 'tanıtım', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sub_category`
--

CREATE TABLE `sub_category` (
  `SubCategoryId` int(11) NOT NULL,
  `SubCategoryUniqid` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `SubCategoryName` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `CategoryId` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sub_category`
--

INSERT INTO `sub_category` (`SubCategoryId`, `SubCategoryUniqid`, `SubCategoryName`, `CategoryId`) VALUES
(1, '603412c7c4758', 'Gaming Ekranlar', 1),
(2, '603539c7c4475', 'Ofis Ekranları', 2),
(3, '789412c7c4758', 'Mouse', 3),
(4, '603539hhh4475', 'Klavye', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `UserName` text COLLATE utf8_turkish_ci NOT NULL,
  `UserLastname` text COLLATE utf8_turkish_ci NOT NULL,
  `UserPassword` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `UserSecretCode` int(4) NOT NULL,
  `UserPhone` int(11) NOT NULL,
  `UserEmail` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `UserBirtday` int(11) NOT NULL,
  `UserConfirm` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `registration_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `UserLastname`, `UserPassword`, `UserSecretCode`, `UserPhone`, `UserEmail`, `UserBirtday`, `UserConfirm`, `registration_time`) VALUES
(20, 'aslı', 'enver', 'ZW52ZXI=', 4455, 2147483647, 'asli@gmail.com', 1975, 1, '2021-03-29 00:39:22'),
(21, 'admin', 'admin', 'YWRtaW4=', 0, 2147483647, 'admin@gmail.com', 1987, 1, '2021-03-29 22:54:02');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`);

--
-- Tablo için indeksler `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Tablo için AUTO_INCREMENT değeri `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
