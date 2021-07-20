-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2021 at 03:19 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opinion_poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL,
  `person_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `person_type`, `username`, `password`, `first_name`, `last_name`, `voted`) VALUES
(1, 'normal', 'a', '123', 'Cadman', 'Allison', 0),
(2, 'normal', 'b', '123', 'Nicola', 'Burns', 0),
(3, 'normal', 'c', '123', 'Abigail', 'Collins', 0),
(4, 'normal', 'd', '123', 'Garry', 'Downie', 0),
(5, 'normal', 'e', '123', 'Jasmine', 'Edgar', 0),
(6, 'normal', 'f', '123', 'Samantha', 'Fraser', 0),
(7, 'normal', 'g', '123', 'Olivia', 'Graham', 0),
(8, 'normal', 'h', '123', 'Ryan', 'Harper', 0),
(9, 'normal', 'i', '123', 'Penelope', 'Irvine', 0),
(10, 'normal', 'j', '123', 'Xenia', 'Jones', 0),
(11, 'normal', 'k', '123', 'Imogen', 'Kay', 0),
(12, 'normal', 'l', '123', 'Zoya', 'Lamont', 0),
(13, 'normal', 'm', '123', 'Edward', 'Miller', 0),
(14, 'normal', 'n', '123', 'Victor', 'Neilson', 0),
(15, 'normal', 'o', '123', 'Wade', 'Owens', 0),
(16, 'normal', 'p', '123', 'Yolanda', 'Pollock', 0),
(17, 'normal', 'q', '123', 'Felix', 'Quinn', 0),
(18, 'normal', 'r', '123', 'Kian', 'Rutherford', 0),
(19, 'normal', 's', '123', 'Lewis', 'Smith', 0),
(20, 'normal', 't', '123', 'Bob', 'Taylor', 0),
(21, 'normal', 'u', '123', 'Heidi', 'Upton', 0),
(22, 'normal', 'v', '123', 'Dakota', 'Vincent', 0),
(23, 'normal', 'w', '123', 'Tyler', 'Walker', 0),
(24, 'normal', 'x', '123', 'Quinn', 'Xavier', 0),
(25, 'normal', 'y', '123', 'Mia', 'Yates', 0),
(26, 'normal', 'z', '123', 'Ursula', 'Zielinski', 0),
(27, 'system', 'admin', '123', 'System', 'Admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_path` varchar(2083) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image_path`) VALUES
(1, 'C#', 'opinion_poll/assets/images/csharp.png'),
(2, 'C++', 'opinion_poll/assets/images/cpp.png'),
(3, 'Golang (Go)', 'opinion_poll/assets/images/go.png'),
(4, 'Java', 'opinion_poll/assets/images/java.png'),
(5, 'Php', 'opinion_poll/assets/images/php.png'),
(6, 'Python', 'opinion_poll/assets/images/python.png'),
(7, 'R', 'opinion_poll/assets/images/r.png'),
(8, 'Swift', 'opinion_poll/assets/images/swift.png');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `person_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`person_id`,`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
