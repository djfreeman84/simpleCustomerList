-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 04:34 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer-sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `alpha` int(11) NOT NULL,
  `first` text NOT NULL,
  `last` text NOT NULL,
  `sex` tinyint(11) NOT NULL,
  `birthdate` int(11) NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`alpha`, `first`, `last`, `sex`, `birthdate`, `phone`, `email`, `created`, `modified`) VALUES
(3, 'YP/7z8Q=', 'YP/7z9bpJQ==', 0, 696988800, 'HqCnjJCzfge3uzgE', 'QP/7z8TGIUXq4H5eknfNg04=', 1657295993, 1657298001),
(4, 'a/7308Dn', 'a/73xNf1JEQ=', 0, 731116800, 'HaCljJ21cgexuD0B', 'RP/9xA==', 1657297513, 1657298045),
(5, 'aPn/zQ==', 'ffn/0sro', 1, 631152000, 'HaejjJCzfge3uzgE', 'SPn/zeXxIkbx4WMfnzbD', 1657297921, 1657297963);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`alpha`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `alpha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
