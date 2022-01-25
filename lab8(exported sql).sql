-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 03:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab8`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `table_id` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`table_id`, `id`, `password`, `name`, `email`, `user_type`) VALUES
(3, '16-10103-2', '$2y$10$o8HcE9VbsDYGFXz97keTGOTO9G1uYYp5L8hszZ04EfEIVLQpGwGsy', 'Kent', 'kent@gmail.com', 'user'),
(5, '15-10101-1', '$2y$10$PmvH2dzCqU/Y7RzqYYyD/.ddFkbDT6.VYMMnYDcYPy6YePH5ok79y', 'Bob', 'bob@mail.edu', 'admin'),
(6, '16-10104-3', '$2y$10$NGpq.qHh6ty2/An26wGwBufHjL8aESRLTwg8ayMkYY9uPXHmISmlG', 'James', 'james@outlook.com', 'admin'),
(7, '16-10102-2', '$2y$10$U926L6basJtWSz7b//CDFug7Q25yaBhFCEeSNLtzBxPVBKAR.SXTe', 'Anne', 'anne@gmail.com', 'user'),
(9, '16-10102-6', '$2y$10$x1BRrQRt2MDEw/C.2sQ3NO/8CjhrbG4ExeyK44auKzJb5OkL0AQui', 'bushra', 'bushra@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`table_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
