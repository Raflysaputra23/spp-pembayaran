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
CREATE DATABASE IF NOT EXISTS `db_spp_pembayaran` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_spp_pembayaran`;

-- Dumping structure for table db_spp_pembayaran.bulan
CREATE TABLE IF NOT EXISTS `bulan` (
  `BulanID` int NOT NULL AUTO_INCREMENT,
  `NamaBulan` varchar(50) NOT NULL,
  PRIMARY KEY (`BulanID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_spp_pembayaran.jurusan
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

-- Data exporting was unselected.

-- Dumping structure for table db_spp_pembayaran.payment
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

-- Data exporting was unselected.

-- Dumping structure for table db_spp_pembayaran.siswa
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

-- Data exporting was unselected.

-- Dumping structure for table db_spp_pembayaran.tranksaksi
CREATE TABLE IF NOT EXISTS `tranksaksi` (
  `TranksaksiID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `MetodePay` varchar(50) NOT NULL,
  `TotalHarga` double NOT NULL,
  `CreateAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`TranksaksiID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_spp_pembayaran.users
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
