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


-- Dumping database structure for qr_code
DROP DATABASE IF EXISTS `qr_code`;
CREATE DATABASE IF NOT EXISTS `qr_code` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `qr_code`;

-- Dumping structure for table qr_code.owners
DROP TABLE IF EXISTS `owners`;
CREATE TABLE IF NOT EXISTS `owners` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `nin` varchar(50) NOT NULL,
  `vehicle_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vehicle_registration_no` varchar(50) NOT NULL,
  `drivers_id` int NOT NULL,
  `image` blob,
  PRIMARY KEY (`id`),
  KEY `drivers_id` (`drivers_id`),
  CONSTRAINT `owners_ibfk_1` FOREIGN KEY (`drivers_id`) REFERENCES `riders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table qr_code.owners: ~3 rows (approximately)
INSERT INTO `owners` (`id`, `name`, `address`, `occupation`, `phone_number`, `nin`, `vehicle_type`, `vehicle_registration_no`, `drivers_id`, `image`) VALUES
	(1, 'John Doe', '123 Maple Street, Cityville', 'Businessman', '123-456-7890', 'NIN123456', 'motorcycle', 'REG123456', 1, NULL),
	(2, 'Jane Smith', '456 Oak Avenue, Townsville', 'Teacher', '987-654-3210', 'NIN654321', 'tricycle', 'REG654321', 8, NULL),
	(3, 'Alice Johnson', '789 Pine Road, Villageville', 'Engineer', '555-666-7777', 'NIN111222', 'motorcycle', 'REG111222', 9, NULL),
	(11, 'assasa', 'victor street', 'Economist', '1234411332', '134455567554', 'tesla', '34321235', 1, _binary 0x6976692e706e67);

-- Dumping structure for table qr_code.qr_controllers
DROP TABLE IF EXISTS `qr_controllers`;
CREATE TABLE IF NOT EXISTS `qr_controllers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `profile_pics` tinyblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table qr_code.qr_controllers: ~1 rows (approximately)
INSERT INTO `qr_controllers` (`id`, `full_name`, `user_name`, `password`, `email`, `role`, `profile_pics`) VALUES
	(1, 'Jude Okechukwu', 'Jude', '$2y$10$ZlSJMUYWQDD.ZhPirmej7eWCGMyF8rhtGZRd/kYI1.iX9hOWvBE1e', 'Jude@gmail.com', 'super-admin', _binary ''),
	(2, 'John Deo', 'Deo', 'D1000', 'John@gmail.com', 'admin', NULL);

-- Dumping structure for table qr_code.qr_data_logs
DROP TABLE IF EXISTS `qr_data_logs`;
CREATE TABLE IF NOT EXISTS `qr_data_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pubuser_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `riders_nin` char(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`pubuser_email`) USING BTREE,
  CONSTRAINT `FK_qr_data_logs_qr_pub_users` FOREIGN KEY (`pubuser_email`) REFERENCES `qr_pub_users` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table qr_code.qr_data_logs: ~0 rows (approximately)

-- Dumping structure for table qr_code.qr_pub_users
DROP TABLE IF EXISTS `qr_pub_users`;
CREATE TABLE IF NOT EXISTS `qr_pub_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `email_key` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table qr_code.qr_pub_users: ~6 rows (approximately)
INSERT INTO `qr_pub_users` (`id`, `name`, `email`, `password`, `image`) VALUES
	(1, '', 'Jane@gmail.com', 'J1233', _binary ''),
	(2, '', 'jaysmuchi@gmail.com', '1234567', _binary ''),
	(3, 'assasa', 'Jaysmucci@yahoo.com', '1234567', _binary ''),
	(5, '', '', '$2y$10$hXwfspiSEPHly6jUrpe7/edIMCp4kdrwc2pDyxmcXMbY4XGGtlbE.', _binary ''),
	(6, 'Jaysmuchi', 'jasmine@gmail.com', '$2y$10$J3kEifnD8ENHT/kq44ZEpehX.jvwLqqscG2PTgbvyzqgHsGBiNGPq', _binary ''),
	(7, 'Micheal', 'Mich@gmail.com', '$2y$10$ZlSJMUYWQDD.ZhPirmej7eWCGMyF8rhtGZRd/kYI1.iX9hOWvBE1e', _binary '');

-- Dumping structure for table qr_code.riders
DROP TABLE IF EXISTS `riders`;
CREATE TABLE IF NOT EXISTS `riders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `identity_card_no` varchar(50) NOT NULL,
  `unit_no` varchar(50) NOT NULL,
  `lga` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `nin` varchar(50) NOT NULL,
  `vehicle_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `vehicle_registration_no` varchar(50) NOT NULL,
  `lga_code` varchar(50) NOT NULL,
  `owner_id` int NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `riders_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table qr_code.riders: ~7 rows (approximately)
INSERT INTO `riders` (`id`, `name`, `address`, `identity_card_no`, `unit_no`, `lga`, `phone_number`, `nin`, `vehicle_type`, `vehicle_registration_no`, `lga_code`, `owner_id`, `image`) VALUES
	(1, 'John Doe', '123 Main St', 'ID123456', 'A1', 'LGA1', '555-1234', 'NIN001', 'motorcycle', 'MC123456', 'LGA1', 1, _binary ''),
	(8, 'John Doe', '123 Main Street', '1234567890', 'Apt 101', 'LGA1', '555-1234', '9876543210', 'Sedan', 'ABC123', '001', 1, _binary 0x696d6167655f646174615f706c616365686f6c646572),
	(9, 'Jane Smith', '456 Elm Street', '0987654321', 'Unit 202', 'LGA2', '555-5678', '1234567890', 'SUV', 'XYZ789', '002', 1, _binary 0x696d6167655f646174615f706c616365686f6c646572),
	(10, 'Michael Johnson', '789 Oak Street', '4567890123', 'Apt 303', 'LGA3', '555-9012', '3456789012', 'Truck', 'DEF456', '003', 1, _binary 0x696d6167655f646174615f706c616365686f6c646572),
	(11, 'james', 'james street', '123221', 'unit a12', 'LGA3', '1234411332', '134455567554', 'tesla', '1234332', 'awka south', 1, _binary 0x6176612e706e67),
	(12, 'jane', 'jane street', '13432234', 'unit a12', 'LGA5', '1234411332', '134455567554', 'suv urus', '1234332', 'awka east', 1, _binary 0x75706c6f6164732f363635636339393936663264332d6976692e706e67),
	(13, 'max', 'max street', '121333223', 'unit 34', 'LGA4', '1234411332', '134455567554', 'benz', '1234323223', '123442', 2, _binary 0x75706c6f6164732f363635643964333065333565342d6176612e706e67);

-- Dumping structure for table qr_code.vehicles
DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `driver_id` int NOT NULL,
  `owner_id` int NOT NULL,
  `vehicle_type` enum('motorcycle','tricycle') NOT NULL,
  `vehicle_registration_no` varchar(50) NOT NULL,
  `lga` varchar(50) NOT NULL,
  `lga_code` varchar(50) NOT NULL,
  `unit_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_id` (`driver_id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `riders` (`id`),
  CONSTRAINT `vehicles_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table qr_code.vehicles: ~1 rows (approximately)
INSERT INTO `vehicles` (`id`, `driver_id`, `owner_id`, `vehicle_type`, `vehicle_registration_no`, `lga`, `lga_code`, `unit_no`) VALUES
	(1, 1, 1, 'motorcycle', 'MC123456', 'Awka South', 'LGA1', '0021019');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
