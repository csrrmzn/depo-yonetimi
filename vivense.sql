-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Mar 2021, 15:44:57
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.3

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
(1, '603539b085b7z', 'Ekran Kartları'),
(2, '603539b085b7a', 'Ekranlar'),
(3, '60355d8el1b7a', 'Bilgisayar Ekipmanları'),
(4, '603539b085b7l', 'Oyuncu Masaları'),
(5, '603539b085b7t', 'Ekran Kartları'),
(6, '60355d8el1b7d', 'Bilgisayar Aksesuarları');

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
(88, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 1, 0),
(89, 'lm152452200102', 'Asus Laptop', 500.00, 1000.00, 'Laptop', 1, 0),
(90, 'lm152452200102', 'Klavye', 320.00, 540.00, 'Gaming', 1, 0),
(91, 'lm152452200102', 'RGB Klavye', 150.00, 300.00, 'Klavye', 1, 0),
(92, '60353sd5c4758', 'Telefon', 1500.00, 3000.00, 'Genel Kullanılır', 1, 0),
(93, '603k39c7c4758', 'Mause Pad', 150.00, 250.00, 'Ortopedik Mause Pad', 1, 0),
(95, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 1, 0),
(96, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 3, 0),
(97, 'lm152452200102', 'Asus Laptop', 500.00, 1000.00, 'Laptop', 3, 0),
(98, 'lm152452200102', 'Klavye', 320.00, 540.00, 'Gaming', 3, 0),
(99, 'lm152452200102', 'RGB Klavye', 150.00, 300.00, 'Klavye', 3, 0),
(100, '60353sd5c4758', 'Telefon', 1500.00, 3000.00, 'Genel Kullanılır', 3, 0),
(101, '603k39c7c4758', 'Mause Pad', 150.00, 250.00, 'Ortopedik Mause Pad', 3, 0),
(102, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 3, 0),
(103, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 2, 0),
(104, 'lm152452200102', 'Asus Laptop', 500.00, 1000.00, 'Laptop', 2, 0),
(105, 'lm152452200102', 'Klavye', 320.00, 540.00, 'Gaming', 2, 0),
(106, 'lm152452200102', 'RGB Klavye', 150.00, 300.00, 'Klavye', 2, 0),
(107, '60353sd5c4758', 'Telefon', 1500.00, 3000.00, 'Genel Kullanılır', 2, 0),
(108, '603k39c7c4758', 'Mause Pad', 150.00, 250.00, 'Ortopedik Mause Pad', 2, 0),
(109, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 2, 0),
(110, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 2, 0),
(111, 'lm152452200102', 'Asus Laptop', 500.00, 1000.00, 'Laptop', 2, 0),
(112, 'lm152452200102', 'Klavye', 320.00, 540.00, 'Gaming', 2, 0),
(113, 'lm152452200102', 'RGB Klavye', 150.00, 300.00, 'Klavye', 2, 0),
(114, '60353sd5c4758', 'Telefon', 1500.00, 3000.00, 'Genel Kullanılır', 2, 0),
(115, '603k39c7c4758', 'Mause Pad', 150.00, 250.00, 'Ortopedik Mause Pad', 2, 0),
(116, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 2, 0),
(117, 'lm152452200102', 'Klavye', 320.00, 540.00, 'Gaming', 4, 0),
(118, 'lm152452200102', 'RGB Klavye', 150.00, 300.00, 'Klavye', 4, 0),
(119, '60353sd5c4758', 'Telefon', 1500.00, 3000.00, 'Genel Kullanılır', 4, 0),
(120, '603k39c7c4758', 'Mause Pad', 150.00, 250.00, 'Ortopedik Mause Pad', 4, 0),
(121, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 4, 0),
(122, '603k39c7c4758', 'Mause Pad', 150.00, 250.00, 'Ortopedik Mause Pad', 5, 0),
(123, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 5, 0),
(124, 'lm152452200102', 'Klavye', 320.00, 540.00, 'Gaming', 5, 0),
(125, 'lm152452200102', 'RGB Klavye', 150.00, 300.00, 'Klavye', 5, 0),
(126, '60353sd5c4758', 'Telefon', 1500.00, 3000.00, 'Genel Kullanılır', 5, 0),
(127, '603k39c7c4758', 'Mause Pad', 150.00, 250.00, 'Ortopedik Mause Pad', 5, 0),
(128, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 5, 0),
(129, '60353sd5c4758', 'Telefon', 1500.00, 3000.00, 'Genel Kullanılır', 6, 0),
(130, '603k39c7c4758', 'Mause Pad', 150.00, 250.00, 'Ortopedik Mause Pad', 6, 0),
(131, 'lm152452200102', 'Asus Fan', 50.00, 70.00, 'fan', 6, 0);

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
  `UserSecretCode` int(4) NOT NULL DEFAULT 1111,
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
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- Tablo için AUTO_INCREMENT değeri `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
