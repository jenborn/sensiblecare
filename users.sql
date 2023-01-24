-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 24, 2023 at 05:22 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sensiblecare`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `points` int(11) NOT NULL,
  `expiration` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `points`, `expiration`) VALUES
(1, 'Josh Lyman', 45, '[{\"2023-02-23 17:17:20\":45}]'),
(2, 'Toby Ziegler', 75, '[{\"2023-02-23 17:12:19\":75}]'),
(3, 'CJ Cregg', 100, '[{\"2023-02-23 17:11:11\":100}]'),
(4, 'Leo McGarry', 200, '[[{\"2023-02-23 17:10:13\":175}],{\"2023-02-23 17:13:07\":200}]'),
(5, 'Charlie Young', 125, '[[[[[{\"2023-02-23 17:07:25\":25}]]]],{\"1\":{\"1\":{\"1\":{\"2023-02-23 17:07:43\":50}}}},{\"2\":{\"2\":{\"2023-02-23 17:09:08\":75}}},{\"3\":{\"2023-02-23 17:16:05\":100}},{\"2023-02-23 17:16:30\":125}]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
