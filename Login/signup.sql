-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2024 at 08:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flash`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Full_name` varchar(30) NOT NULL,
  `User_name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `number` int(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `bio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Full_name`, `User_name`, `Email`, `number`, `password`, `contact_no`, `address`, `bio`) VALUES
('adasfsafsafsf', 'assdasdawdwd', 'asdasd@gmail.com', 123456, '12345', 0, '', ''),
('luthfi', 'luffy', 'efefwewef@gmail.com', 715176859, '', 0, '', ''),
('luthfi', 'luffy', 'efefwewef@gmail.com', 715176859, '', 0, '', ''),
('luthfi', 'luffy', 'efefwewef@gmail.com', 715176859, '', 0, '', ''),
('luthfi', 'luffy', 'efefwewef@gmail.com', 715176859, '', 0, '', ''),
('luthfi', 'luffy', 'efefwewef@gmail.com', 715176859, '', 0, '', ''),
('luthfi', 'luffy', 'efefwewef@gmail.com', 715176859, 'qwery', 0, '', ''),
('hgnjgrntnreh', 'nrtnerthtr', 'getger@gtrrt', 2147483647, '12345', 0, '', ''),
('wewefwef', 'efwefefwe', 'efwef@gmail.com', 123456, 'qwer', 0, '', ''),
('Chethiya Herath', 'suchee', 'suchee@gamil.com', 12345566, 'asdfg', 0, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
