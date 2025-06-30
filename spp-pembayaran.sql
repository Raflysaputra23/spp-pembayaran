-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_spp_pembayaran
DROP DATABASE IF EXISTS `db_spp_pembayaran`;
CREATE DATABASE IF NOT EXISTS `db_spp_pembayaran` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_spp_pembayaran`;

-- Dumping structure for table db_spp_pembayaran.bulan
DROP TABLE IF EXISTS `bulan`;
CREATE TABLE IF NOT EXISTS `bulan` (
  `BulanID` int NOT NULL AUTO_INCREMENT,
  `NamaBulan` varchar(50) NOT NULL,
  PRIMARY KEY (`BulanID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_spp_pembayaran.bulan: ~12 rows (approximately)
INSERT INTO `bulan` (`BulanID`, `NamaBulan`) VALUES
	(33, 'Januari'),
	(34, 'Februari'),
	(35, 'Maret'),
	(36, 'April'),
	(37, 'Mei'),
	(38, 'Juni'),
	(39, 'Juli'),
	(40, 'Agustus'),
	(41, 'September'),
	(42, 'Oktober'),
	(43, 'November'),
	(44, 'Desember');

-- Dumping structure for table db_spp_pembayaran.jurusan
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE IF NOT EXISTS `jurusan` (
  `JurusanID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NamaJurusan` varchar(50) NOT NULL,
  `SingkatanJurusan` varchar(50) NOT NULL,
  `HargaJurusan` double NOT NULL,
  `CreateAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`JurusanID`),
  UNIQUE KEY `NamaJurusan` (`NamaJurusan`),
  UNIQUE KEY `SingkatanJurusan` (`SingkatanJurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_spp_pembayaran.jurusan: ~2 rows (approximately)
INSERT INTO `jurusan` (`JurusanID`, `NamaJurusan`, `SingkatanJurusan`, `HargaJurusan`, `CreateAt`, `UpdateAt`) VALUES
	('811A', 'akutansi', 'AK', 80000000, '2025-06-30 12:29:49', '2025-06-30 12:29:49'),
	('900RPL', 'rekayasa perangkat lunak', 'RPL', 90000000, '2025-06-30 12:28:18', '2025-06-30 12:28:18');

-- Dumping structure for table db_spp_pembayaran.payment
DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `TranksaksiID` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `BulanID` int NOT NULL,
  `SiswaID` char(10) NOT NULL,
  `Harga` double NOT NULL,
  KEY `fk_payment_bulan` (`BulanID`),
  KEY `fk_payment_siswa` (`SiswaID`),
  KEY `fk_payment_tranksaksi` (`TranksaksiID`),
  CONSTRAINT `fk_payment_bulan` FOREIGN KEY (`BulanID`) REFERENCES `bulan` (`BulanID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_payment_siswa` FOREIGN KEY (`SiswaID`) REFERENCES `siswa` (`Nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_payment_tranksaksi` FOREIGN KEY (`TranksaksiID`) REFERENCES `tranksaksi` (`TranksaksiID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_spp_pembayaran.payment: ~1 rows (approximately)
INSERT INTO `payment` (`TranksaksiID`, `BulanID`, `SiswaID`, `Harga`) VALUES
	('1435204080', 38, '1338190129', 90000000);

-- Dumping structure for table db_spp_pembayaran.siswa
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE IF NOT EXISTS `siswa` (
  `Nisn` char(10) NOT NULL,
  `Foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'iconTitle.png',
  `NamaLengkap` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `NoTelp` varchar(16) DEFAULT NULL,
  `Jenkel` enum('perempuan','laki-laki') DEFAULT NULL,
  `Kelas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `JurusanID` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `Status` enum('online','offline') DEFAULT 'offline',
  `Role` enum('admin','user') DEFAULT 'user',
  `CreateAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Nisn`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `NoTelp` (`NoTelp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_spp_pembayaran.siswa: ~15 rows (approximately)
INSERT INTO `siswa` (`Nisn`, `Foto`, `NamaLengkap`, `Email`, `Password`, `NoTelp`, `Jenkel`, `Kelas`, `JurusanID`, `TanggalLahir`, `Status`, `Role`, `CreateAt`, `UpdateAt`) VALUES
	('1338190129', '68628de8b3c53.png', 'Okta Uwais', 'uwais@gmail.com', '$2y$10$1TaAeeuqPStdmZsAjqzxIuppy2BQf3R50UmIkmk667xR1ZLJggSge', '085333369015', 'perempuan', 'X-1', '900RPL', '2007-01-21', 'offline', 'user', '2025-06-30 13:12:55', '2025-06-30 13:17:29'),
	('1346699959', 'iconTitle.png', 'Wani Waluyo', NULL, '$2y$10$Er7VySm.2dFXExQ54WLmpOSTifuEZZjfu8cfHs2Ui6FvsQ93bPrqi', NULL, 'perempuan', 'XII-1', '811A', '2009-11-10', 'offline', 'user', '2025-06-30 13:12:56', '2025-06-30 13:12:56'),
	('1736443261', 'iconTitle.png', 'dr. Galak Mandala S.Pd', NULL, '$2y$10$AjOLlgbeIQmw/FOKjQHLXONAi1KyEFm3VJ5zzj9HMv9Lb98XD9rz6', NULL, 'perempuan', 'XII-1', '811A', '2007-03-07', 'offline', 'user', '2025-06-30 13:12:56', '2025-06-30 13:12:56'),
	('1834644383', 'iconTitle.png', 'Halima Usada S.I.Kom', NULL, '$2y$10$g1oq95HXA7LOLv.vhXMczuNlQn8TcWnUV0G67/ExaNcxK2ZYIUDlu', NULL, 'perempuan', 'XII-2', '900RPL', '2008-09-15', 'offline', 'user', '2025-06-30 13:12:55', '2025-06-30 13:12:55'),
	('2011291979', 'iconTitle.png', 'R.M. Cawuk Anggriawan S.T.', NULL, '$2y$10$td0b8X8fXbs5hG3SA9W5.uacbxOq2z/D2nH1JBaxJ/Nn2ZHnXfqRu', NULL, 'perempuan', 'XII-1', '900RPL', '2010-04-22', 'offline', 'user', '2025-06-30 13:12:55', '2025-06-30 13:12:55'),
	('3262958065', 'iconTitle.png', 'Aisyah Sudiati', NULL, '$2y$10$odQCHShYuzRmrD7wuBO.d.gy7ahBaEki8fvVo/nGRrRVmEBtQ3xfm', NULL, 'laki-laki', 'X-2', '900RPL', '2007-12-15', 'offline', 'user', '2025-06-30 13:12:56', '2025-06-30 13:12:56'),
	('3533661440', 'iconTitle.png', 'Umar Pratiwi', NULL, '$2y$10$VaP/SiYh3f49o5OoA1Z2VOJH4wTk.FmBuidn95NjmUuBky3PqF.q.', NULL, 'laki-laki', 'XI-2', '900RPL', '2007-04-04', 'offline', 'user', '2025-06-30 13:12:55', '2025-06-30 13:12:55'),
	('3864289787', 'iconTitle.png', 'drg. Maryanto Januar S.Sos', NULL, '$2y$10$qNpi3b3Q4f6xEveR8j8Uceozg7GySAFNsDLamOtBrr.5/3YxRy5XO', NULL, 'laki-laki', 'XI-1', '900RPL', '2009-06-08', 'offline', 'user', '2025-06-30 13:12:56', '2025-06-30 13:12:56'),
	('3957400376', 'iconTitle.png', 'Putu Putra', NULL, '$2y$10$gDrAl0PDE5fq.n8b2lbHCurYeZ1PM7iM63Wg4.8xwtjeToem7bD.C', NULL, 'perempuan', 'XII-1', '811A', '2009-03-10', 'offline', 'user', '2025-06-30 13:12:56', '2025-06-30 13:12:56'),
	('4175213778', 'iconTitle.png', 'Kamaria Pratama', NULL, '$2y$10$0ylsDFpExU0ETW8Js./2QuO6YVjF/H32q2ru0HQ7VJnX9.ZmZt.jS', NULL, 'perempuan', 'XII-1', '900RPL', '2007-11-03', 'offline', 'user', '2025-06-30 13:12:55', '2025-06-30 13:12:55'),
	('4810522016', 'iconTitle.png', 'Maman Rahmawati', NULL, '$2y$10$XPMqMI4EPADFIHzTOl9V5uNDjslwtX6jnUsMo66zdE2JireChf1tW', NULL, 'laki-laki', 'XII-1', '900RPL', '2008-09-10', 'offline', 'user', '2025-06-30 13:12:55', '2025-06-30 13:12:55'),
	('5409194233', 'iconTitle.png', 'Uli Saputra', NULL, '$2y$10$VyNnVx4knIIvAPVFESaWze8whvESxD9hhzkfeUfhhzeFryw7aqxw6', NULL, 'perempuan', 'XI-1', '811A', '2008-02-06', 'offline', 'user', '2025-06-30 13:12:55', '2025-06-30 13:12:55'),
	('5935820777', 'iconTitle.png', 'Luthfi Hariyah', NULL, '$2y$10$xQx3IehFFYXjjVkoVMFStOAYegZEQiqtIfMlkz9Ph0h0lunGYpNjK', NULL, 'perempuan', 'XI-1', '811A', '2010-01-21', 'offline', 'user', '2025-06-30 13:12:55', '2025-06-30 13:12:55'),
	('7578115075', 'iconTitle.png', 'Teguh Gunarto S.I.Kom', NULL, '$2y$10$SjcxkNbpr7OyK6Y6cOyomuLpyeJAA6Lf93RczTTv7P1GLol6XDyaO', NULL, 'laki-laki', 'XI-2', '811A', '2009-12-08', 'offline', 'user', '2025-06-30 13:12:56', '2025-06-30 13:12:56'),
	('8733673039', 'iconTitle.png', 'Zamira Lazuardi', NULL, '$2y$10$HkarfzlOv7BaoNJycoJLuuvTllT10DjACVmECKPaUnYD9dYaTn/Mm', NULL, 'laki-laki', 'XI-2', '900RPL', '2009-01-06', 'offline', 'user', '2025-06-30 13:12:55', '2025-06-30 13:12:55');

-- Dumping structure for table db_spp_pembayaran.tranksaksi
DROP TABLE IF EXISTS `tranksaksi`;
CREATE TABLE IF NOT EXISTS `tranksaksi` (
  `TranksaksiID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `MetodePay` varchar(50) NOT NULL,
  `TotalHarga` double NOT NULL,
  `CreateAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`TranksaksiID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_spp_pembayaran.tranksaksi: ~1 rows (approximately)
INSERT INTO `tranksaksi` (`TranksaksiID`, `MetodePay`, `TotalHarga`, `CreateAt`) VALUES
	('1435204080', 'bank_transfer', 90000000, '2025-06-30 13:22:08');

-- Dumping structure for table db_spp_pembayaran.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'iconTitle.png',
  `NamaLengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Jenkel` enum('laki-laki','perempuan') DEFAULT NULL,
  `NoTelp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` enum('online','offline') DEFAULT 'offline',
  `Role` enum('admin','user') DEFAULT 'admin',
  `CreateAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `NoTelp` (`NoTelp`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Foto` (`Foto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_spp_pembayaran.users: ~1 rows (approximately)
INSERT INTO `users` (`UserID`, `Username`, `Foto`, `NamaLengkap`, `Email`, `Jenkel`, `NoTelp`, `Password`, `Status`, `Role`, `CreateAt`, `UpdateAt`) VALUES
	(7, 'rafly saputra', '68628d9126760.png', 'rafly', '966raflisaputra@gmail.com', 'laki-laki', '085333369015', '$2y$10$nGYa/0jLnvoXmHo1UR69g.E3BbBduyQMP4ddVxwy8VkD6PG4ZaOy6', 'offline', 'admin', '2025-06-30 12:26:06', '2025-06-30 13:13:53');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
