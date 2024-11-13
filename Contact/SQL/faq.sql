-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 04:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `questionID` int(3) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`questionID`, `question`, `answer`) VALUES
(1, 'How to Book a Ride?', 'To book a ride, first sign up or log in to your account. Then, choose the vehicle you want, and select your pickup and drop-off locations. Set the rental dates and review your booking details. After that, make the payment using your preferred method.Once done, you\'ll receive a confirmation with instructions for picking up the vehicle. It\'s quick and easy!'),
(2, 'What are the rental requirements?', 'The rental requirements typically // include being at least 18 years old, having a valid driver\'s license, and providing a credit or debit card for payment. Some companies may also require proof of insurance and may charge extra for drivers under 25.'),
(3, 'Can I modify or cancel my booking?', 'Yes, you can modify or cancel your booking, but changes may depend on availability, \r\nand cancellation could include a fee depending on the company\'s policy. Check the terms before making changes.'),
(4, 'What should I do in case of an accident or breakdown?', 'In case of an accident or breakdown, contact the rental company immediately using their emergency number. Follow their instructions, and if necessary, contact local authorities for assistance.'),
(5, 'Do I need a credit card to rent a vehicle?', 'Yes, a credit card is required to secure your reservation and to hold a security deposit. Debit cards may be accepted at some locations, but additional verification may be required...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`questionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `questionID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
