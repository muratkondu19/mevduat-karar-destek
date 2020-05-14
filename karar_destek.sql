-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 May 2020, 17:57:33
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `karar_destek`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `altiay_tufe`
--

CREATE TABLE `altiay_tufe` (
  `oran_id` int(11) NOT NULL,
  `Tarih` varchar(7) DEFAULT NULL,
  `oran` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `altiay_tufe`
--

INSERT INTO `altiay_tufe` (`oran_id`, `Tarih`, `oran`) VALUES
(1, '2010-S1', '9.26'),
(2, '2010-S2', '7.91'),
(3, '2011-S1', '5.12'),
(4, '2011-S2', '7.78'),
(5, '2012-S1', '9.96'),
(6, '2012-S2', '7.91'),
(7, '2013-S1', '7.10'),
(8, '2013-S2', '7.89'),
(9, '2014-S1', '8.71'),
(10, '2014-S2', '9.00'),
(11, '2015-S1', '7.60'),
(12, '2015-S2', '7.73'),
(13, '2016-S1', '7.77'),
(14, '2016-S2', '7.80'),
(15, '2017-S1', '10.8'),
(16, '2017-S2', '11.4'),
(17, '2018-S1', '11.5'),
(18, '2018-S2', '20.9'),
(19, '2019-S1', '18.9'),
(20, '2019-S2', '11.9'),
(21, '2020-S1', '12.1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ay_tufe`
--

CREATE TABLE `ay_tufe` (
  `ay_id` int(11) NOT NULL,
  `Tarih` varchar(7) DEFAULT NULL,
  `oran` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ay_tufe`
--

INSERT INTO `ay_tufe` (`ay_id`, `Tarih`, `oran`) VALUES
(1, '2019-1', '20.35'),
(2, '2019-2', '19.67'),
(3, '2019-3', '19.71'),
(4, '2019-4', '19.50'),
(5, '2019-5', '18.71'),
(6, '2019-6', '15.72'),
(7, '2019-7', '16.65'),
(8, '2019-8', '15.01'),
(9, '2019-9', '9.26'),
(10, '2019-10', '8.55'),
(11, '2019-11', '10.56'),
(12, '2019-12', '11.84'),
(13, '2020-1', '12.15'),
(14, '2020-2', '12.37'),
(15, '2020-3', '11.86'),
(16, '2020-4', '10.94');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `is_bankasi_dolar_mevduat`
--

CREATE TABLE `is_bankasi_dolar_mevduat` (
  `miktar_id` int(11) NOT NULL,
  `ana_para` varchar(17) DEFAULT NULL,
  `gun_28_31` int(1) DEFAULT NULL,
  `gun_32_60` int(1) DEFAULT NULL,
  `gun_61_1092` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `is_bankasi_dolar_mevduat`
--

INSERT INTO `is_bankasi_dolar_mevduat` (`miktar_id`, `ana_para`, `gun_28_31`, `gun_32_60`, `gun_61_1092`) VALUES
(1, '1.000 - 2.500.000', 2, 5, '2.5');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `is_bankasi_euro_mevduat`
--

CREATE TABLE `is_bankasi_euro_mevduat` (
  `miktar_id` int(11) NOT NULL,
  `ana_para` varchar(18) DEFAULT NULL,
  `gun_28_88` decimal(4,3) DEFAULT NULL,
  `gun_88_1092` decimal(4,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `is_bankasi_euro_mevduat`
--

INSERT INTO `is_bankasi_euro_mevduat` (`miktar_id`, `ana_para`, `gun_28_88`, `gun_88_1092`) VALUES
(1, '1.000 - 2.500.000 ', '0.008', '0.006');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `is_bankasi_tl_mevduat`
--

CREATE TABLE `is_bankasi_tl_mevduat` (
  `miktar_id` int(11) NOT NULL,
  `ana_para` varchar(24) DEFAULT NULL,
  `gun_28_31` decimal(3,2) DEFAULT NULL,
  `gun_32_45` decimal(3,2) DEFAULT NULL,
  `gun_46_60` decimal(3,2) DEFAULT NULL,
  `gun_61_91` decimal(3,2) DEFAULT NULL,
  `gun_92_100` decimal(3,2) DEFAULT NULL,
  `gun_101_180` decimal(3,2) DEFAULT NULL,
  `gun_181_364` decimal(3,2) DEFAULT NULL,
  `gun_365_1000` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `is_bankasi_tl_mevduat`
--

INSERT INTO `is_bankasi_tl_mevduat` (`miktar_id`, `ana_para`, `gun_28_31`, `gun_32_45`, `gun_46_60`, `gun_61_91`, `gun_92_100`, `gun_101_180`, `gun_181_364`, `gun_365_1000`) VALUES
(1, '1.000 - 40.000 TL', '7.00', '8.00', '7.75', '8.90', '8.90', '8.40', '8.40', '7.90'),
(2, '40.001 - 100.000 TL', '7.05', '8.15', '7.90', '8.90', '8.90', '8.40', '8.40', '7.90'),
(3, '100.001 - 250.000 TL', '7.25', '8.25', '8.00', '9.15', '9.15', '8.65', '8.65', '8.15'),
(4, '250.001 - 1.000.000 TL', '7.45', '8.60', '8.60', '9.40', '9.40', '8.90', '8.65', '8.15'),
(5, '1.000.001 - 2.500.000 TL', '8.55', '9.85', '9.80', '9.65', '9.40', '8.90', '8.65', '8.15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_altiay_oran`
--

CREATE TABLE `mb_altiay_oran` (
  `donem_id` int(11) NOT NULL,
  `Tarih` varchar(7) DEFAULT NULL,
  `EUR MT03` decimal(3,2) DEFAULT NULL,
  `TRY MT03` decimal(4,2) DEFAULT NULL,
  `USD MT03` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `mb_altiay_oran`
--

INSERT INTO `mb_altiay_oran` (`donem_id`, `Tarih`, `EUR MT03`, `TRY MT03`, `USD MT03`) VALUES
(1, '2010-S1', '2.50', '8.91', '2.77'),
(2, '2010-S2', '2.62', '8.86', '2.91'),
(3, '2011-S1', '2.97', '9.05', '3.64'),
(4, '2011-S2', '3.32', '10.07', '4.17'),
(5, '2012-S1', '3.58', '10.96', '3.84'),
(6, '2012-S2', '2.83', '8.93', '3.13'),
(7, '2013-S1', '2.40', '7.34', '2.63'),
(8, '2013-S2', '2.66', '8.59', '2.92'),
(9, '2014-S1', '2.38', '10.45', '2.57'),
(10, '2014-S2', '1.91', '9.54', '2.09'),
(11, '2015-S1', '1.73', '9.96', '2.11'),
(12, '2015-S2', '1.50', '10.86', '1.97'),
(13, '2016-S1', '1.35', '11.83', '2.27'),
(14, '2016-S2', '1.28', '10.63', '2.52'),
(15, '2017-S1', '1.35', '11.98', '3.13'),
(16, '2017-S2', '1.47', '13.22', '3.09'),
(17, '2018-S1', '1.43', '13.96', '3.01'),
(18, '2018-S2', '1.99', '21.95', '4.17'),
(19, '2019-S1', '1.28', '20.46', '3.21'),
(20, '2019-S2', '0.60', '14.00', '2.55'),
(21, '2020-S1', '0.22', '8.89', '1.47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_aylik_oran`
--

CREATE TABLE `mb_aylik_oran` (
  `ay_id` int(11) NOT NULL,
  `Tarih` varchar(7) DEFAULT NULL,
  `EUR MT01` decimal(3,2) DEFAULT NULL,
  `TRY MT01` decimal(4,2) DEFAULT NULL,
  `USD MT01` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `mb_aylik_oran`
--

INSERT INTO `mb_aylik_oran` (`ay_id`, `Tarih`, `EUR MT01`, `TRY MT01`, `USD MT01`) VALUES
(1, '2019-01', '1.17', '20.44', '3.04'),
(2, '2019-02', '1.10', '19.36', '2.81'),
(3, '2019-03', '1.02', '19.07', '2.75'),
(4, '2019-04', '0.95', '20.09', '2.76'),
(5, '2019-05', '0.85', '21.95', '2.64'),
(6, '2019-06', '0.73', '22.17', '2.57'),
(7, '2019-07', '0.70', '20.91', '2.50'),
(8, '2019-08', '0.58', '17.68', '2.33'),
(9, '2019-09', '0.41', '15.07', '2.10'),
(10, '2019-10', '0.31', '13.28', '1.87'),
(11, '2019-11', '0.22', '11.48', '1.64'),
(12, '2019-12', '0.17', '10.24', '1.47'),
(13, '2020-01', '0.12', '9.31', '1.15'),
(14, '2020-02', '0.11', '8.98', '0.97'),
(15, '2020-03', '0.09', '8.97', '0.77');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_ucaylık_oran`
--

CREATE TABLE `mb_ucaylık_oran` (
  `ceyrek_id` int(11) NOT NULL,
  `Tarih` varchar(7) DEFAULT NULL,
  `EUR MT02` decimal(3,2) DEFAULT NULL,
  `TRY MT02` decimal(4,2) DEFAULT NULL,
  `USD MT02` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `mb_ucaylık_oran`
--

INSERT INTO `mb_ucaylık_oran` (`ceyrek_id`, `Tarih`, `EUR MT02`, `TRY MT02`, `USD MT02`) VALUES
(1, '2010-Q2', '2.74', '9.12', '3.05'),
(2, '2010-Q3', '2.76', '9.01', '2.96'),
(3, '2010-Q4', '2.54', '8.69', '2.69'),
(4, '2011-Q1', '3.01', '8.07', '3.29'),
(5, '2011-Q2', '3.41', '8.84', '3.80'),
(6, '2011-Q3', '3.64', '9.33', '4.04'),
(7, '2011-Q4', '3.84', '9.69', '4.18'),
(8, '2012-Q1', '3.87', '10.60', '4.21'),
(9, '2012-Q2', '3.38', '10.62', '3.79'),
(10, '2012-Q3', '3.12', '9.81', '3.39'),
(11, '2012-Q4', '2.77', '8.35', '2.99'),
(12, '2013-Q1', '2.42', '7.43', '2.59'),
(13, '2013-Q2', '2.26', '6.74', '2.45'),
(14, '2013-Q3', '2.79', '8.29', '3.01'),
(15, '2013-Q4', '2.62', '8.49', '2.77'),
(16, '2014-Q1', '2.55', '10.22', '2.71'),
(17, '2014-Q2', '2.19', '10.53', '2.34'),
(18, '2014-Q3', '1.90', '9.18', '2.05'),
(19, '2014-Q4', '1.75', '9.52', '2.02'),
(20, '2015-Q1', '1.77', '9.77', '2.13'),
(21, '2015-Q2', '1.62', '10.24', '2.03'),
(22, '2015-Q3', '1.52', '10.83', '1.95'),
(23, '2015-Q4', '1.43', '11.36', '1.98'),
(24, '2016-Q1', '1.46', '11.85', '2.35'),
(25, '2016-Q2', '1.30', '11.35', '2.25'),
(26, '2016-Q3', '1.20', '10.71', '2.31'),
(27, '2016-Q4', '1.37', '10.52', '2.76'),
(28, '2017-Q1', '1.35', '10.86', '2.87'),
(29, '2017-Q2', '1.54', '12.42', '3.15'),
(30, '2017-Q3', '1.44', '12.83', '3.24'),
(31, '2017-Q4', '1.44', '13.13', '3.27'),
(32, '2018-Q1', '1.45', '13.49', '3.33'),
(33, '2018-Q2', '1.53', '14.66', '3.51'),
(34, '2018-Q3', '1.95', '19.81', '4.43'),
(35, '2018-Q4', '2.18', '24.21', '4.69'),
(36, '2019-Q1', '1.37', '21.13', '3.56'),
(37, '2019-Q2', '1.07', '22.52', '3.16'),
(38, '2019-Q3', '0.77', '18.76', '2.77'),
(39, '2019-Q4', '0.34', '12.43', '2.15'),
(40, '2020-Q1', '0.19', '10.07', '1.36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_uyg_faiz`
--

CREATE TABLE `mb_uyg_faiz` (
  `faiz_id` int(11) NOT NULL,
  `Tarih` varchar(10) DEFAULT NULL,
  `EUR MT01` decimal(3,2) DEFAULT NULL,
  `EUR MT02` decimal(3,2) DEFAULT NULL,
  `EUR MT03` decimal(3,2) DEFAULT NULL,
  `EUR MT04` decimal(3,2) DEFAULT NULL,
  `EUR MT05` decimal(3,2) DEFAULT NULL,
  `TRY MT01` decimal(3,2) DEFAULT NULL,
  `TRY MT02` decimal(4,2) DEFAULT NULL,
  `TRY MT03` decimal(3,2) DEFAULT NULL,
  `TRY MT04` decimal(3,2) DEFAULT NULL,
  `TRY MT05` decimal(3,2) DEFAULT NULL,
  `USD MT01` decimal(3,2) DEFAULT NULL,
  `USD MT02` decimal(3,2) DEFAULT NULL,
  `USD MT03` decimal(3,2) DEFAULT NULL,
  `USD MT04` decimal(3,2) DEFAULT NULL,
  `USD MT05` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `mb_uyg_faiz`
--

INSERT INTO `mb_uyg_faiz` (`faiz_id`, `Tarih`, `EUR MT01`, `EUR MT02`, `EUR MT03`, `EUR MT04`, `EUR MT05`, `TRY MT01`, `TRY MT02`, `TRY MT03`, `TRY MT04`, `TRY MT05`, `USD MT01`, `USD MT02`, `USD MT03`, `USD MT04`, `USD MT05`) VALUES
(1, '17-04-2020', '0.13', '0.24', '0.23', '0.16', '0.17', '8.91', '10.23', '9.09', '8.93', '8.39', '0.88', '1.53', '1.52', '1.11', '2.06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_yilbazinda_oran`
--

CREATE TABLE `mb_yilbazinda_oran` (
  `yil_id` int(11) NOT NULL,
  `Tarih` int(4) DEFAULT NULL,
  `EUR MT05` decimal(3,2) DEFAULT NULL,
  `TRY MT05` decimal(4,2) DEFAULT NULL,
  `USD MT05` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `mb_yilbazinda_oran`
--

INSERT INTO `mb_yilbazinda_oran` (`yil_id`, `Tarih`, `EUR MT05`, `TRY MT05`, `USD MT05`) VALUES
(1, 2010, '2.42', '9.11', '2.69'),
(2, 2011, '3.00', '8.94', '3.31'),
(3, 2012, '3.61', '9.26', '3.44'),
(4, 2013, '2.76', '7.57', '2.67'),
(5, 2014, '2.53', '9.06', '2.32'),
(6, 2015, '1.70', '9.23', '1.96'),
(7, 2016, '1.37', '9.92', '2.09'),
(8, 2017, '1.48', '11.73', '2.61'),
(9, 2018, '1.77', '16.68', '3.48'),
(10, 2019, '0.97', '15.93', '2.85'),
(11, 2020, '0.21', '8.90', '1.99');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ucay_tufe`
--

CREATE TABLE `ucay_tufe` (
  `ceyrek_id` int(11) NOT NULL,
  `Tarih` varchar(7) DEFAULT NULL,
  `oran` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ucay_tufe`
--

INSERT INTO `ucay_tufe` (`ceyrek_id`, `Tarih`, `oran`) VALUES
(1, '2010-Q2', '9.22'),
(2, '2010-Q3', '8.38'),
(3, '2010-Q4', '7.44'),
(4, '2011-Q1', '4.35'),
(5, '2011-Q2', '5.89'),
(6, '2011-Q3', '6.37'),
(7, '2011-Q4', '9.20'),
(8, '2012-Q1', '10.49'),
(9, '2012-Q2', '9.43'),
(10, '2012-Q3', '9.05'),
(11, '2012-Q4', '6.78'),
(12, '2013-Q1', '7.21'),
(13, '2013-Q2', '6.98'),
(14, '2013-Q3', '8.31'),
(15, '2013-Q4', '7.48'),
(16, '2014-Q1', '8.01'),
(17, '2014-Q2', '9.40'),
(18, '2014-Q3', '9.24'),
(19, '2014-Q4', '8.76'),
(20, '2015-Q1', '7.47'),
(21, '2015-Q2', '7.73'),
(22, '2015-Q3', '7.30'),
(23, '2015-Q4', '8.16'),
(24, '2016-Q1', '8.61'),
(25, '2016-Q2', '6.93'),
(26, '2016-Q3', '8.04'),
(27, '2016-Q4', '7.56'),
(28, '2017-Q1', '10.21'),
(29, '2017-Q2', '11.50'),
(30, '2017-Q3', '10.56'),
(31, '2017-Q4', '12.27'),
(32, '2018-Q1', '10.28'),
(33, '2018-Q2', '12.80'),
(34, '2018-Q3', '19.42'),
(35, '2018-Q4', '22.39'),
(36, '2019-Q1', '19.91'),
(37, '2019-Q2', '17.98'),
(38, '2019-Q3', '13.64'),
(39, '2019-Q4', '10.32'),
(40, '2020-Q1', '12.13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yapi_kredi_dolar_mevduat`
--

CREATE TABLE `yapi_kredi_dolar_mevduat` (
  `miktar_id` int(11) NOT NULL,
  `ana_para` varchar(20) DEFAULT NULL,
  `gun_32_740` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yapi_kredi_dolar_mevduat`
--

INSERT INTO `yapi_kredi_dolar_mevduat` (`miktar_id`, `ana_para`, `gun_32_740`) VALUES
(1, '1.000 - 24.999 $', '0.0060'),
(2, '25.000 - 1.000.000 $', '0.0065');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yapi_kredi_euro_mevduat`
--

CREATE TABLE `yapi_kredi_euro_mevduat` (
  `miktar_id` int(11) NOT NULL,
  `ana_para` varchar(18) DEFAULT NULL,
  `gun_32_730` decimal(4,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yapi_kredi_euro_mevduat`
--

INSERT INTO `yapi_kredi_euro_mevduat` (`miktar_id`, `ana_para`, `gun_32_730`) VALUES
(1, '1.000 - 1.000.000 ', '0.002');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yapi_kredi_tl_mevduat`
--

CREATE TABLE `yapi_kredi_tl_mevduat` (
  `miktar_id` int(11) NOT NULL,
  `ana_para` varchar(20) DEFAULT NULL,
  `gun_28_184` decimal(3,2) DEFAULT NULL,
  `gun_185_368` decimal(3,2) DEFAULT NULL,
  `gun_369_730` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yapi_kredi_tl_mevduat`
--

INSERT INTO `yapi_kredi_tl_mevduat` (`miktar_id`, `ana_para`, `gun_28_184`, `gun_185_368`, `gun_369_730`) VALUES
(1, '1.000 - 9.999 ', '8.90', '8.70', '4.60'),
(2, '10.000 - 49.999 ', '9.00', '8.95', '5.05'),
(3, '50.000 - 99.999 ', '9.50', '9.30', '5.35'),
(4, '50.000 - 249.999 ', '9.60', '9.40', '5.35'),
(5, '100.000 - 499.999 ', '9.60', '9.40', '5.65'),
(6, '100.000 - 2.500.000 ', '9.60', '9.40', '5.65'),
(7, '250.000 - 499.999 ', '9.60', '9.40', '5.65'),
(8, '500.000 - 2.500.000 ', '9.75', '9.40', '5.70');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yillik_tufe`
--

CREATE TABLE `yillik_tufe` (
  `tufe_yil_id` int(11) NOT NULL,
  `Tarih` int(4) DEFAULT NULL,
  `oran` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yillik_tufe`
--

INSERT INTO `yillik_tufe` (`tufe_yil_id`, `Tarih`, `oran`) VALUES
(1, 2010, '8.58'),
(2, 2011, '6.45'),
(3, 2012, '8.94'),
(4, 2013, '7.49'),
(5, 2014, '8.85'),
(6, 2015, '7.67'),
(7, 2016, '7.79'),
(8, 2017, '11.13'),
(9, 2018, '16.22'),
(10, 2019, '15.46'),
(11, 2020, '12.13');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `altiay_tufe`
--
ALTER TABLE `altiay_tufe`
  ADD PRIMARY KEY (`oran_id`);

--
-- Tablo için indeksler `ay_tufe`
--
ALTER TABLE `ay_tufe`
  ADD PRIMARY KEY (`ay_id`);

--
-- Tablo için indeksler `is_bankasi_dolar_mevduat`
--
ALTER TABLE `is_bankasi_dolar_mevduat`
  ADD PRIMARY KEY (`miktar_id`);

--
-- Tablo için indeksler `is_bankasi_euro_mevduat`
--
ALTER TABLE `is_bankasi_euro_mevduat`
  ADD PRIMARY KEY (`miktar_id`);

--
-- Tablo için indeksler `is_bankasi_tl_mevduat`
--
ALTER TABLE `is_bankasi_tl_mevduat`
  ADD PRIMARY KEY (`miktar_id`);

--
-- Tablo için indeksler `mb_altiay_oran`
--
ALTER TABLE `mb_altiay_oran`
  ADD PRIMARY KEY (`donem_id`);

--
-- Tablo için indeksler `mb_aylik_oran`
--
ALTER TABLE `mb_aylik_oran`
  ADD PRIMARY KEY (`ay_id`);

--
-- Tablo için indeksler `mb_ucaylık_oran`
--
ALTER TABLE `mb_ucaylık_oran`
  ADD PRIMARY KEY (`ceyrek_id`);

--
-- Tablo için indeksler `mb_uyg_faiz`
--
ALTER TABLE `mb_uyg_faiz`
  ADD PRIMARY KEY (`faiz_id`);

--
-- Tablo için indeksler `mb_yilbazinda_oran`
--
ALTER TABLE `mb_yilbazinda_oran`
  ADD PRIMARY KEY (`yil_id`);

--
-- Tablo için indeksler `ucay_tufe`
--
ALTER TABLE `ucay_tufe`
  ADD PRIMARY KEY (`ceyrek_id`);

--
-- Tablo için indeksler `yapi_kredi_dolar_mevduat`
--
ALTER TABLE `yapi_kredi_dolar_mevduat`
  ADD PRIMARY KEY (`miktar_id`);

--
-- Tablo için indeksler `yapi_kredi_euro_mevduat`
--
ALTER TABLE `yapi_kredi_euro_mevduat`
  ADD PRIMARY KEY (`miktar_id`);

--
-- Tablo için indeksler `yapi_kredi_tl_mevduat`
--
ALTER TABLE `yapi_kredi_tl_mevduat`
  ADD PRIMARY KEY (`miktar_id`);

--
-- Tablo için indeksler `yillik_tufe`
--
ALTER TABLE `yillik_tufe`
  ADD PRIMARY KEY (`tufe_yil_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `altiay_tufe`
--
ALTER TABLE `altiay_tufe`
  MODIFY `oran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Tablo için AUTO_INCREMENT değeri `ay_tufe`
--
ALTER TABLE `ay_tufe`
  MODIFY `ay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Tablo için AUTO_INCREMENT değeri `is_bankasi_dolar_mevduat`
--
ALTER TABLE `is_bankasi_dolar_mevduat`
  MODIFY `miktar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `is_bankasi_euro_mevduat`
--
ALTER TABLE `is_bankasi_euro_mevduat`
  MODIFY `miktar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `is_bankasi_tl_mevduat`
--
ALTER TABLE `is_bankasi_tl_mevduat`
  MODIFY `miktar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `mb_altiay_oran`
--
ALTER TABLE `mb_altiay_oran`
  MODIFY `donem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Tablo için AUTO_INCREMENT değeri `mb_aylik_oran`
--
ALTER TABLE `mb_aylik_oran`
  MODIFY `ay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Tablo için AUTO_INCREMENT değeri `mb_ucaylık_oran`
--
ALTER TABLE `mb_ucaylık_oran`
  MODIFY `ceyrek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Tablo için AUTO_INCREMENT değeri `mb_uyg_faiz`
--
ALTER TABLE `mb_uyg_faiz`
  MODIFY `faiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `mb_yilbazinda_oran`
--
ALTER TABLE `mb_yilbazinda_oran`
  MODIFY `yil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `ucay_tufe`
--
ALTER TABLE `ucay_tufe`
  MODIFY `ceyrek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Tablo için AUTO_INCREMENT değeri `yapi_kredi_dolar_mevduat`
--
ALTER TABLE `yapi_kredi_dolar_mevduat`
  MODIFY `miktar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `yapi_kredi_euro_mevduat`
--
ALTER TABLE `yapi_kredi_euro_mevduat`
  MODIFY `miktar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `yapi_kredi_tl_mevduat`
--
ALTER TABLE `yapi_kredi_tl_mevduat`
  MODIFY `miktar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `yillik_tufe`
--
ALTER TABLE `yillik_tufe`
  MODIFY `tufe_yil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
