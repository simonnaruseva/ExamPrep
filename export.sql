-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for softuni_bazar
CREATE DATABASE IF NOT EXISTS `softuni_bazar` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `softuni_bazar`;

-- Dumping structure for table softuni_bazar.categories
CREATE TABLE IF NOT EXISTS `categories` (
                                            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                            `name` varchar(50) NOT NULL,
                                            PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table softuni_bazar.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Electronics'),
(2, 'Clothes'),
(3, 'Other');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table softuni_bazar.items
CREATE TABLE IF NOT EXISTS `items` (
                                       `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                       `title` varchar(255) NOT NULL,
                                       `price` decimal(20,6) NOT NULL DEFAULT 0.000000,
                                       `description` text NOT NULL,
                                       `image` varchar(255) NOT NULL,
                                       `category_id` int(11) unsigned NOT NULL,
                                       `user_id` int(11) unsigned NOT NULL,
                                       PRIMARY KEY (`id`),
                                       KEY `FK_items_user_id_users_id` (`user_id`),
                                       KEY `FK1_items_category_id_categories_id` (`category_id`),
                                       CONSTRAINT `FK1_items_category_id_categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
                                       CONSTRAINT `FK_items_user_id_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table softuni_bazar.items: ~0 rows (approximately)
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

-- Dumping structure for table softuni_bazar.users
CREATE TABLE IF NOT EXISTS `users` (
                                       `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                       `username` varchar(255) NOT NULL,
                                       `password` varchar(255) NOT NULL,
                                       `full_name` varchar(255) NOT NULL,
                                       `location` varchar(255) NOT NULL,
                                       `phone` varchar(255) NOT NULL,
                                       PRIMARY KEY (`id`),
                                       UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table softuni_bazar.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
