-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 09, 2020 at 03:52 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volga_it`
--
CREATE DATABASE IF NOT EXISTS `volga_it` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `volga_it`;

-- --------------------------------------------------------

--
-- Table structure for table `good`
--

DROP TABLE IF EXISTS `good`;
CREATE TABLE IF NOT EXISTS `good` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `price` float NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `good`
--

INSERT INTO `good` (`id`, `name`, `price`, `description`) VALUES
(1, 'Чашка', 250, 'Обычная чашка'),
(2, 'Пила', 380, 'Тупая'),
(3, 'Тачилка', 80, 'Точит'),
(4, 'Рюгзак', 980, 'Детский'),
(5, 'Шкатулка', 750, 'Из красного дерева'),
(6, 'Ручка', 15, 'Шариковая, тонкая'),
(7, 'Браслет', 480, 'Блестит'),
(8, 'Ракушка', 147, 'Содержит звуки моря'),
(9, 'Палатка', 5600, 'Трёхместная');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `sum` float NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(16) NOT NULL DEFAULT 'new',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `address`, `sum`, `date`, `status`) VALUES
(1, 'Машиностроителей 11', 380, '2020-10-09 13:48:34', 'new'),
(2, 'Машиностроителей 11 к2 кв239', 1940, '2020-10-09 13:49:48', 'complete'),
(3, 'Первомайскай 1А кв15', 1440, '2020-10-09 15:23:42', 'new'),
(4, 'Ленинская 18 к2 кв315', 4410, '2020-10-09 15:32:43', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `order_good`
--

DROP TABLE IF EXISTS `order_good`;
CREATE TABLE IF NOT EXISTS `order_good` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_order` int NOT NULL,
  `id_good` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL,
  `sum` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_good_good_id_fk` (`id_good`),
  KEY `order_good_order_id_fk` (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_good`
--

INSERT INTO `order_good` (`id`, `id_order`, `id_good`, `name`, `price`, `quantity`, `sum`) VALUES
(1, 1, 2, 'Пила', 380, 1, 380),
(2, 2, 2, 'Пила', 380, 1, 380),
(3, 2, 4, 'Рюгзак', 980, 1, 980),
(4, 2, 1, 'Чашка', 250, 2, 500),
(5, 2, 3, 'Тачилка', 80, 1, 80),
(6, 3, 2, 'Пила', 380, 1, 380),
(7, 3, 4, 'Рюгзак', 980, 1, 980),
(8, 3, 3, 'Тачилка', 80, 1, 80),
(9, 4, 4, 'Рюгзак', 980, 3, 2940),
(10, 4, 2, 'Пила', 380, 3, 1140),
(11, 4, 3, 'Тачилка', 80, 1, 80),
(12, 4, 1, 'Чашка', 250, 1, 250);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$13$6Nd3It8jHaF8xoKdUf/3GOV6V608febcHO0S5KHk9h6YoRrYkaz9m');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_good`
--
ALTER TABLE `order_good`
  ADD CONSTRAINT `order_good_good_id_fk` FOREIGN KEY (`id_good`) REFERENCES `good` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_good_order_id_fk` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
