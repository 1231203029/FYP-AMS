-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2025 at 09:00 AM
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
-- Database: `fyp2530-ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `passport_number` varchar(20) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `password`, `phoneNo`, `passport_number`, `nationality`, `dob`) VALUES
(1, 'Alice Tan', 'Female', 'alice@gmail.com', 'hashed_pass_123', '0123456789', 'A12345678', 'Malaysia', '1990-05-15'),
(2, 'Bob Kumar', 'Male', 'bob@gmail.com', 'hashed_pass_456', '0198765432', 'B87654321', 'Malaysia', '1985-11-30'),
(3, 'Clara Wong', 'Female', 'clara@gmail.com', 'hashed_pass_789', '0111222333', 'S98765432C', 'Singapore', '1995-02-20'),
(4, 'David Lee', 'Male', 'david@gmail.com', 'hashed_pass_101', '0177889900', 'J55544333', 'Indonesia', '1988-08-10'),
(5, 'Emily Davis', 'Female', 'emily@gmail.com', 'hashed_pass_emily', '0134567890', 'K11223344', 'Australia', '1992-03-10'),
(6, 'Frankie Chen', 'Male', 'frankie@gmail.com', 'hashed_pass_frank', '0145678901', 'P55667788', 'Malaysia', '2000-01-25'),
(7, 'Grace Ho', 'Female', 'grace@gmail.com', 'pass123', '0100000007', 'G778899', 'Malaysia', '1991-07-19'),
(8, 'Henry Yap', 'Male', 'henry@gmail.com', 'pass123', '0100000008', 'H112233', 'Malaysia', '1982-12-01'),
(9, 'Isabel Lim', 'Female', 'isabel@gmail.com', 'pass123', '0100000009', 'I445566', 'Singapore', '1998-04-22'),
(10, 'Jack Foo', 'Male', 'jack@gmail.com', 'pass123', '0100000010', 'J998877', 'Malaysia', '1993-09-14'),
(11, 'Karen Ng', 'Female', 'karen@gmail.com', 'pass123', '0100000011', 'K665544', 'Malaysia', '1990-01-30'),
(12, 'Leo Messi', 'Male', 'leo@gmail.com', 'pass123', '0100000012', 'L101010', 'Argentina', '1987-06-24'),
(13, 'Mina Myoi', 'Female', 'mina@gmail.com', 'pass123', '0100000013', 'M242424', 'Japan', '1997-03-24'),
(14, 'Nathan Drake', 'Male', 'nathan@gmail.com', 'pass123', '0100000014', 'N334455', 'United States', '1985-11-11'),
(15, 'Olivia Ong', 'Female', 'olivia@gmail.com', 'pass123', '0100000015', 'O121212', 'Singapore', '1985-10-02'),
(16, 'Peter Pan', 'Male', 'peter@gmail.com', 'pass123', '0100000016', 'P777666', 'Malaysia', '1999-05-05'),
(17, 'Quincy Yeoh', 'Male', 'quincy@gmail.com', 'pass123', '0100000017', 'Q454545', 'Malaysia', '2001-08-10'),
(18, 'Rachel Chu', 'Female', 'rachel@gmail.com', 'pass123', '0100000018', 'R989898', 'United States', '1992-11-20'),
(19, 'Steve Rogers', 'Male', 'steve@gmail.com', 'pass123', '0100000019', 'S191807', 'United States', '1918-07-04'),
(20, 'Tony Stark', 'Male', 'tony@gmail.com', 'pass123', '0100000020', 'S197005', 'United States', '1970-05-29'),
(21, 'User Name 21', 'Female', 'user21@gmail.com', 'pass123', '0100000021', 'P0021', 'Malaysia', '1990-01-21'),
(22, 'User Name 22', 'Male', 'user22@gmail.com', 'pass123', '0100000022', 'P0022', 'Malaysia', '1990-01-22'),
(23, 'User Name 23', 'Female', 'user23@gmail.com', 'pass123', '0100000023', 'P0023', 'Malaysia', '1990-01-23'),
(24, 'User Name 24', 'Male', 'user24@gmail.com', 'pass123', '0100000024', 'P0024', 'Malaysia', '1990-01-24'),
(25, 'User Name 25', 'Female', 'user25@gmail.com', 'pass123', '0100000025', 'P0025', 'Malaysia', '1990-01-25'),
(26, 'User Name 26', 'Male', 'user26@gmail.com', 'pass123', '0100000026', 'P0026', 'Malaysia', '1990-01-26'),
(27, 'User Name 27', 'Female', 'user27@gmail.com', 'pass123', '0100000027', 'P0027', 'Malaysia', '1990-01-27'),
(28, 'User Name 28', 'Male', 'user28@gmail.com', 'pass123', '0100000028', 'P0028', 'Malaysia', '1990-01-28'),
(29, 'User Name 29', 'Female', 'user29@gmail.com', 'pass123', '0100000029', 'P0029', 'Malaysia', '1990-01-29'),
(30, 'User Name 30', 'Male', 'user30@gmail.com', 'pass123', '0100000030', 'P0030', 'Malaysia', '1990-01-30'),
(31, 'User Name 31', 'Female', 'user31@gmail.com', 'pass123', '0100000031', 'P0031', 'Malaysia', '1990-02-01'),
(32, 'User Name 32', 'Male', 'user32@gmail.com', 'pass123', '0100000032', 'P0032', 'Malaysia', '1990-02-02'),
(33, 'User Name 33', 'Female', 'user33@gmail.com', 'pass123', '0100000033', 'P0033', 'Malaysia', '1990-02-03'),
(34, 'User Name 34', 'Male', 'user34@gmail.com', 'pass123', '0100000034', 'P0034', 'Malaysia', '1990-02-04'),
(35, 'User Name 35', 'Female', 'user35@gmail.com', 'pass123', '0100000035', 'P0035', 'Malaysia', '1990-02-05'),
(36, 'User Name 36', 'Male', 'user36@gmail.com', 'pass123', '0100000036', 'P0036', 'Malaysia', '1990-02-06'),
(37, 'User Name 37', 'Female', 'user37@gmail.com', 'pass123', '0100000037', 'P0037', 'Malaysia', '1990-02-07'),
(38, 'User Name 38', 'Male', 'user38@gmail.com', 'pass123', '0100000038', 'P0038', 'Malaysia', '1990-02-08'),
(39, 'User Name 39', 'Female', 'user39@gmail.com', 'pass123', '0100000039', 'P0039', 'Malaysia', '1990-02-09'),
(40, 'User Name 40', 'Male', 'user40@gmail.com', 'pass123', '0100000040', 'P0040', 'Malaysia', '1990-02-10'),
(41, 'User Name 41', 'Female', 'user41@gmail.com', 'pass123', '0100000041', 'P0041', 'Malaysia', '1990-02-11'),
(42, 'User Name 42', 'Male', 'user42@gmail.com', 'pass123', '0100000042', 'P0042', 'Malaysia', '1990-02-12'),
(43, 'User Name 43', 'Female', 'user43@gmail.com', 'pass123', '0100000043', 'P0043', 'Malaysia', '1990-02-13'),
(44, 'User Name 44', 'Male', 'user44@gmail.com', 'pass123', '0100000044', 'P0044', 'Malaysia', '1990-02-14'),
(45, 'User Name 45', 'Female', 'user45@gmail.com', 'pass123', '0100000045', 'P0045', 'Malaysia', '1990-02-15'),
(46, 'User Name 46', 'Male', 'user46@gmail.com', 'pass123', '0100000046', 'P0046', 'Malaysia', '1990-02-16'),
(47, 'User Name 47', 'Female', 'user47@gmail.com', 'pass123', '0100000047', 'P0047', 'Malaysia', '1990-02-17'),
(48, 'User Name 48', 'Male', 'user48@gmail.com', 'pass123', '0100000048', 'P0048', 'Malaysia', '1990-02-18'),
(49, 'User Name 49', 'Female', 'user49@gmail.com', 'pass123', '0100000049', 'P0049', 'Malaysia', '1990-02-19'),
(50, 'User Name 50', 'Male', 'user50@gmail.com', 'pass123', '0100000050', 'P0050', 'Malaysia', '1990-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `membership_level` varchar(20) NOT NULL COMMENT 'e.g., Bronze, Silver, Gold, Private',
  `points` int(11) NOT NULL DEFAULT 0,
  `expiry_date` date NOT NULL,
  `private_aircraft_reg` varchar(50) DEFAULT NULL COMMENT 'For "private planes" users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `customer_id`, `membership_level`, `points`, `expiry_date`, `private_aircraft_reg`) VALUES
(1, 1, 'Gold', 8500, '2026-10-28', NULL),
(2, 2, 'Silver', 1200, '2026-05-15', NULL),
(3, 4, 'Private', 99999, '2027-01-01', '9M-DAVID'),
(4, 5, 'Bronze', 2800, '2026-11-10', NULL),
(5, 7, 'Bronze', 1500, '2026-11-11', NULL),
(6, 8, 'Silver', 3400, '2026-11-11', NULL),
(7, 9, 'Bronze', 250, '2026-11-11', NULL),
(8, 10, 'Gold', 10500, '2026-11-11', NULL),
(9, 11, 'Bronze', 250, '2026-11-11', NULL),
(10, 12, 'Private', 50000, '2027-01-01', 'ARG-10'),
(11, 13, 'Gold', 12000, '2026-11-11', NULL),
(12, 14, 'Silver', 4500, '2026-11-11', NULL),
(13, 15, 'Bronze', 1800, '2026-11-11', NULL),
(14, 16, 'Bronze', 250, '2026-11-11', NULL),
(15, 17, 'Bronze', 250, '2026-11-11', NULL),
(16, 18, 'Silver', 3000, '2026-11-11', NULL),
(17, 19, 'Gold', 25000, '2026-11-11', NULL),
(18, 20, 'Private', 150000, '2027-01-01', 'STARK-1'),
(19, 21, 'Bronze', 0, '2026-11-11', NULL),
(20, 22, 'Bronze', 0, '2026-11-11', NULL),
(21, 23, 'Bronze', 0, '2026-11-11', NULL),
(22, 24, 'Bronze', 0, '2026-11-11', NULL),
(23, 25, 'Bronze', 0, '2026-11-11', NULL),
(24, 26, 'Bronze', 0, '2026-11-11', NULL),
(25, 27, 'Bronze', 0, '2026-11-11', NULL),
(26, 28, 'Bronze', 0, '2026-11-11', NULL),
(27, 29, 'Bronze', 0, '2026-11-11', NULL),
(28, 30, 'Bronze', 0, '2026-11-11', NULL),
(29, 31, 'Bronze', 0, '2026-11-11', NULL),
(30, 32, 'Bronze', 0, '2026-11-11', NULL),
(31, 33, 'Bronze', 0, '2026-11-11', NULL),
(32, 34, 'Bronze', 0, '2026-11-11', NULL),
(33, 35, 'Bronze', 0, '2026-11-11', NULL),
(34, 36, 'Bronze', 0, '2026-11-11', NULL),
(35, 37, 'Bronze', 0, '2026-11-11', NULL),
(36, 38, 'Bronze', 0, '2026-11-11', NULL),
(37, 39, 'Bronze', 0, '2026-11-11', NULL),
(38, 40, 'Bronze', 0, '2026-11-11', NULL),
(39, 41, 'Bronze', 0, '2026-11-11', NULL),
(40, 42, 'Bronze', 0, '2026-11-11', NULL),
(41, 43, 'Bronze', 0, '2026-11-11', NULL),
(42, 44, 'Bronze', 0, '2026-11-11', NULL),
(43, 45, 'Bronze', 0, '2026-11-11', NULL),
(44, 46, 'Bronze', 0, '2026-11-11', NULL),
(45, 47, 'Bronze', 0, '2026-11-11', NULL),
(46, 48, 'Bronze', 0, '2026-11-11', NULL),
(47, 49, 'Bronze', 0, '2026-11-11', NULL),
(48, 50, 'Bronze', 0, '2026-11-11', NULL),
(49, 3, 'Silver', 2500, '2026-04-01', NULL),
(50, 6, 'Bronze', 250, '2026-06-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(11) NOT NULL,
  `flight_number` varchar(10) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `origin_airport_id` int(11) NOT NULL,
  `destination_airport_id` int(11) NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'e.g., Scheduled, Delayed, Cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `flight_number`, `aircraft_id`, `origin_airport_id`, `destination_airport_id`, `departure_time`, `arrival_time`, `status`) VALUES
(1, 'MH101', 1, 7, 1, '2025-11-15 08:00:00', '2025-11-15 16:00:00', 'Scheduled'),
(2, 'AK205', 2, 7, 10, '2025-11-16 10:30:00', '2025-11-16 13:30:00', 'Scheduled'),
(3, 'SQ119', 4, 9, 1, '2025-11-16 14:00:00', '2025-11-16 22:00:00', 'Scheduled'),
(4, 'GA881', 5, 4, 2, '2025-11-20 22:00:00', '2025-11-21 07:00:00', 'Scheduled'),
(5, 'MH502', 3, 7, 9, '2025-11-22 09:00:00', '2025-11-22 10:00:00', 'Scheduled'),
(6, 'MH102', 1, 1, 7, '2025-12-01 09:00:00', '2025-12-01 17:00:00', 'Scheduled'),
(7, 'AK206', 2, 10, 7, '2025-12-02 14:30:00', '2025-12-02 17:30:00', 'Scheduled'),
(8, 'SQ120', 4, 1, 9, '2025-12-03 10:00:00', '2025-12-03 18:00:00', 'Scheduled'),
(9, 'GA882', 5, 2, 4, '2025-12-04 09:00:00', '2025-12-04 18:00:00', 'Scheduled'),
(10, 'MH503', 3, 9, 7, '2025-12-05 11:00:00', '2025-12-05 12:00:00', 'Scheduled'),
(11, 'BI421', 9, 8, 7, '2025-12-01 15:00:00', '2025-12-01 17:15:00', 'Scheduled'),
(12, 'VN501', 1, 5, 9, '2025-12-02 12:00:00', '2025-12-02 14:00:00', 'Scheduled'),
(13, 'TG410', 4, 6, 1, '2025-12-03 23:00:00', '2025-12-04 07:00:00', 'Scheduled'),
(14, 'MH3001', 6, 7, 9, '2025-12-06 07:00:00', '2025-12-06 08:00:00', 'Scheduled'),
(15, 'AK611', 1, 7, 2, '2025-12-07 10:00:00', '2025-12-07 13:00:00', 'Scheduled'),
(16, 'PRVT01', 7, 7, 10, '2025-12-10 10:00:00', '2025-12-10 13:00:00', 'Scheduled'),
(17, 'PRVT02', 7, 1, 7, '2025-12-11 11:00:00', '2025-12-11 19:00:00', 'Scheduled'),
(18, 'MH1000', 10, 7, 1, '2025-12-15 01:00:00', '2025-12-15 09:00:00', 'Scheduled'),
(19, 'AK207', 2, 7, 10, '2025-12-16 10:30:00', '2025-12-16 13:30:00', 'Scheduled'),
(20, 'SQ125', 4, 9, 1, '2025-12-17 14:00:00', '2025-12-17 22:00:00', 'Scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `passport_number` varchar(20) NOT NULL,
  `seat_number` varchar(4) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'e.g., Pending, Confirmed, Cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `flight_id`, `passenger_name`, `passport_number`, `seat_number`, `booking_date`, `total_price`, `status`) VALUES
(1, 1, 1, 'Alice Tan', 'A12345678', '12A', '2025-10-28 01:10:00', '2200.50', 'Confirmed'),
(2, 2, 2, 'Bob Kumar', 'B87654321', '5B', '2025-10-28 02:15:00', '450.00', 'Confirmed'),
(3, 1, 3, 'Alice Tan', 'A12345678', '22F', '2025-10-28 03:20:00', '1800.00', 'Pending'),
(4, 3, 2, 'Clara Wong', 'S98765432C', '5C', '2025-10-28 04:00:00', '450.00', 'Confirmed'),
(5, 5, 4, 'Emily Davis', 'K11223344', '30A', '2025-11-10 15:30:00', '2800.00', 'Confirmed'),
(6, 6, 5, 'Frankie Chen', 'P55667788', '10C', '2025-11-10 16:00:00', '250.00', 'Confirmed'),
(7, 1, 5, 'Alice Tan', 'A12345678', '10D', '2025-11-10 16:05:00', '250.00', 'Confirmed'),
(8, 7, 6, 'Grace Ho', 'G778899', '12B', '2025-11-11 01:00:00', '2200.50', 'Confirmed'),
(9, 8, 7, 'Henry Yap', 'H112233', '6A', '2025-11-11 02:00:00', '450.00', 'Confirmed'),
(10, 9, 8, 'Isabel Lim', 'I445566', '23A', '2025-11-11 03:00:00', '1800.00', 'Confirmed'),
(11, 10, 9, 'Jack Foo', 'J998877', '30B', '2025-11-11 04:00:00', '2800.00', 'Confirmed'),
(12, 11, 10, 'Karen Ng', 'K665544', '10E', '2025-11-11 05:00:00', '250.00', 'Confirmed'),
(13, 12, 16, 'Leo Messi', 'L101010', '1A', '2025-11-11 06:00:00', '150000.00', 'Confirmed'),
(14, 13, 11, 'Mina Myoi', 'M242424', '15A', '2025-11-11 07:00:00', '800.00', 'Confirmed'),
(15, 14, 12, 'Nathan Drake', 'N334455', '15B', '2025-11-11 08:00:00', '750.00', 'Confirmed'),
(16, 15, 13, 'Olivia Ong', 'O121212', '1A', '2025-11-11 09:00:00', '3500.00', 'Confirmed'),
(17, 16, 14, 'Peter Pan', 'P777666', '1C', '2025-11-11 10:00:00', '250.00', 'Confirmed'),
(18, 17, 15, 'Quincy Yeoh', 'Q454545', '20A', '2025-11-11 11:00:00', '400.00', 'Confirmed'),
(19, 18, 18, 'Rachel Chu', 'R989898', '1A', '2025-11-11 12:00:00', '5000.00', 'Confirmed'),
(20, 19, 18, 'Steve Rogers', 'S191807', '1B', '2025-11-11 13:00:00', '5000.00', 'Confirmed'),
(21, 20, 17, 'Tony Stark', 'S197005', '1A', '2025-11-11 14:00:00', '200000.00', 'Confirmed'),
(22, 21, 1, 'User Name 21', 'P0021', '12C', '2025-11-12 01:00:00', '2200.50', 'Confirmed'),
(23, 22, 2, 'User Name 22', 'P0022', '5D', '2025-11-12 02:00:00', '450.00', 'Confirmed'),
(24, 23, 3, 'User Name 23', 'P0023', '22G', '2025-11-12 03:00:00', '1800.00', 'Confirmed'),
(25, 24, 4, 'User Name 24', 'P0024', '30C', '2025-11-12 04:00:00', '2800.00', 'Confirmed'),
(26, 25, 5, 'User Name 25', 'P0025', '10F', '2025-11-12 05:00:00', '250.00', 'Confirmed'),
(27, 26, 6, 'User Name 26', 'P0026', '12D', '2025-11-12 06:00:00', '2200.50', 'Confirmed'),
(28, 27, 7, 'User Name 27', 'P0027', '6B', '2025-11-12 07:00:00', '450.00', 'Confirmed'),
(29, 28, 8, 'User Name 28', 'P0028', '23B', '2025-11-12 08:00:00', '1800.00', 'Confirmed'),
(30, 29, 9, 'User Name 29', 'P0029', '30D', '2025-11-12 09:00:00', '2800.00', 'Confirmed'),
(31, 30, 10, 'User Name 30', 'P0030', '10G', '2025-11-12 10:00:00', '250.00', 'Confirmed'),
(32, 31, 11, 'User Name 31', 'P0031', '15C', '2025-11-12 11:00:00', '800.00', 'Confirmed'),
(33, 32, 12, 'User Name 32', 'P0032', '15D', '2025-11-12 12:00:00', '750.00', 'Confirmed'),
(34, 33, 13, 'User Name 33', 'P0033', '1C', '2025-11-12 13:00:00', '3500.00', 'Confirmed'),
(35, 34, 14, 'User Name 34', 'P0034', '1D', '2025-11-12 14:00:00', '250.00', 'Confirmed'),
(36, 35, 15, 'User Name 35', 'P0035', '20B', '2025-11-12 15:00:00', '400.00', 'Confirmed'),
(37, 36, 16, 'User Name 36', 'P0036', '1B', '2025-11-12 16:00:00', '150000.00', 'Confirmed'),
(38, 37, 17, 'User Name 37', 'P0037', '1C', '2025-11-12 17:00:00', '200000.00', 'Confirmed'),
(39, 38, 18, 'User Name 38', 'P0038', '1C', '2025-11-12 18:00:00', '5000.00', 'Confirmed'),
(40, 39, 19, 'User Name 39', 'P0039', '5E', '2025-11-12 19:00:00', '450.00', 'Confirmed'),
(41, 40, 20, 'User Name 40', 'P0040', '22H', '2025-11-12 20:00:00', '1800.00', 'Confirmed'),
(42, 41, 1, 'User Name 41', 'P0041', '12E', '2025-11-13 01:00:00', '2200.50', 'Confirmed'),
(43, 42, 2, 'User Name 42', 'P0042', '5F', '2025-11-13 02:00:00', '450.00', 'Confirmed'),
(44, 43, 3, 'User Name 43', 'P0043', '22A', '2025-11-13 03:00:00', '1800.00', 'Confirmed'),
(45, 44, 4, 'User Name 44', 'P0044', '30E', '2025-11-13 04:00:00', '2800.00', 'Confirmed'),
(46, 45, 5, 'User Name 45', 'P0045', '11A', '2025-11-13 05:00:00', '250.00', 'Confirmed'),
(47, 46, 6, 'User Name 46', 'P0046', '12F', '2025-11-13 06:00:00', '2200.50', 'Confirmed'),
(48, 47, 7, 'User Name 47', 'P0047', '6C', '2025-11-13 07:00:00', '450.00', 'Confirmed'),
(49, 48, 8, 'User Name 48', 'P0048', '23C', '2025-11-13 08:00:00', '1800.00', 'Confirmed'),
(50, 49, 9, 'User Name 49', 'P0049', '30F', '2025-11-13 09:00:00', '2800.00', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(50) NOT NULL COMMENT 'e.g., Credit Card, Bank Transfer',
  `transaction_id` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'e.g., Successful, Failed, Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `booking_id`, `amount`, `payment_date`, `payment_method`, `transaction_id`, `status`) VALUES
(1, 1, '2200.50', '2025-10-28 01:11:00', 'Credit Card', 'txn_12345abcde', 'Successful'),
(2, 2, '450.00', '2025-10-28 02:16:00', 'Bank Transfer', 'txn_67890fghij', 'Successful'),
(3, 4, '450.00', '2025-10-28 04:01:00', 'Credit Card', 'txn_55566klmno', 'Successful'),
(4, 5, '2800.00', '2025-11-10 15:31:00', 'Credit Card', 'txn_99887xxyy', 'Successful'),
(5, 6, '250.00', '2025-11-10 16:01:00', 'E-Wallet', 'txn_77665vvuu', 'Successful'),
(6, 7, '250.00', '2025-11-10 16:06:00', 'Credit Card', 'txn_11223ttss', 'Successful'),
(7, 8, '2200.50', '2025-11-11 01:01:00', 'Credit Card', 'txn_0008', 'Successful'),
(8, 9, '450.00', '2025-11-11 02:01:00', 'Bank Transfer', 'txn_0009', 'Successful'),
(9, 10, '1800.00', '2025-11-11 03:01:00', 'Credit Card', 'txn_0010', 'Successful'),
(10, 11, '2800.00', '2025-11-11 04:01:00', 'Credit Card', 'txn_0011', 'Successful'),
(11, 12, '250.00', '2025-11-11 05:01:00', 'E-Wallet', 'txn_0012', 'Successful'),
(12, 13, '150000.00', '2025-11-11 06:01:00', 'Bank Transfer', 'txn_0013', 'Successful'),
(13, 14, '800.00', '2025-11-11 07:01:00', 'Credit Card', 'txn_0014', 'Successful'),
(14, 15, '750.00', '2025-11-11 08:01:00', 'Credit Card', 'txn_0015', 'Successful'),
(15, 16, '3500.00', '2025-11-11 09:01:00', 'Credit Card', 'txn_0016', 'Successful'),
(16, 17, '250.00', '2025-11-11 10:01:00', 'E-Wallet', 'txn_0017', 'Successful'),
(17, 18, '400.00', '2025-11-11 11:01:00', 'Bank Transfer', 'txn_0018', 'Successful'),
(18, 19, '5000.00', '2025-11-11 12:01:00', 'Credit Card', 'txn_0019', 'Successful'),
(19, 20, '5000.00', '2025-11-11 13:01:00', 'Credit Card', 'txn_0020', 'Successful'),
(20, 21, '200000.00', '2025-11-11 14:01:00', 'Bank Transfer', 'txn_0021', 'Successful'),
(21, 22, '2200.50', '2025-11-12 01:01:00', 'Credit Card', 'txn_0022', 'Successful'),
(22, 23, '450.00', '2025-11-12 02:01:00', 'E-Wallet', 'txn_0023', 'Successful'),
(23, 24, '1800.00', '2025-11-12 03:01:00', 'Bank Transfer', 'txn_0024', 'Successful'),
(24, 25, '2800.00', '2025-11-12 04:01:00', 'Credit Card', 'txn_0025', 'Successful'),
(25, 26, '250.00', '2025-11-12 05:01:00', 'E-Wallet', 'txn_0026', 'Successful'),
(26, 27, '2200.50', '2025-11-12 06:01:00', 'Credit Card', 'txn_0027', 'Successful'),
(27, 28, '450.00', '2025-11-12 07:01:00', 'Credit Card', 'txn_0028', 'Successful'),
(28, 29, '1800.00', '2025-11-12 08:01:00', 'Bank Transfer', 'txn_0029', 'Successful'),
(29, 30, '2800.00', '2025-11-12 09:01:00', 'Credit Card', 'txn_0030', 'Successful'),
(30, 31, '250.00', '2025-11-12 10:01:00', 'E-Wallet', 'txn_0031', 'Successful'),
(31, 32, '800.00', '2025-11-12 11:01:00', 'Credit Card', 'txn_0032', 'Successful'),
(32, 33, '750.00', '2025-11-12 12:01:00', 'Bank Transfer', 'txn_0033', 'Successful'),
(33, 34, '3500.00', '2025-11-12 13:01:00', 'Credit Card', 'txn_0034', 'Successful'),
(34, 35, '250.00', '2025-11-12 14:01:00', 'E-Wallet', 'txn_0035', 'Successful'),
(35, 36, '400.00', '2025-11-12 15:01:00', 'Credit Card', 'txn_0036', 'Successful'),
(36, 37, '150000.00', '2025-11-12 16:01:00', 'Bank Transfer', 'txn_0037', 'Successful'),
(37, 38, '200000.00', '2025-11-12 17:01:00', 'Bank Transfer', 'txn_0038', 'Successful'),
(38, 39, '5000.00', '2025-11-12 18:01:00', 'Credit Card', 'txn_0039', 'Successful'),
(39, 40, '450.00', '2025-11-12 19:01:00', 'E-Wallet', 'txn_0040', 'Successful'),
(40, 41, '1800.00', '2025-11-12 20:01:00', 'Credit Card', 'txn_0041', 'Successful'),
(41, 42, '2200.50', '2025-11-13 01:01:00', 'Credit Card', 'txn_0042', 'Successful'),
(42, 43, '450.00', '2025-11-13 02:01:00', 'Bank Transfer', 'txn_0043', 'Successful'),
(43, 44, '1800.00', '2025-11-13 03:01:00', 'Credit Card', 'txn_0044', 'Successful'),
(44, 45, '2800.00', '2025-11-13 04:01:00', 'E-Wallet', 'txn_0045', 'Successful'),
(45, 46, '250.00', '2025-11-13 05:01:00', 'Credit Card', 'txn_0046', 'Successful'),
(46, 47, '2200.50', '2025-11-13 06:01:00', 'Bank Transfer', 'txn_0047', 'Successful'),
(47, 48, '450.00', '2025-11-13 07:01:00', 'Credit Card', 'txn_0048', 'Successful'),
(48, 49, '1800.00', '2025-11-13 08:01:00', 'E-Wallet', 'txn_0049', 'Successful'),
(49, 50, '2800.00', '2025-11-13 09:01:00', 'Credit Card', 'txn_0050', 'Successful'),
(50, 3, '1800.00', '2025-10-28 03:21:00', 'Credit Card', 'txn_0003', 'Successful');

-- --------------------------------------------------------

--
-- Table structure for table `boarding_pass`
--

CREATE TABLE `boarding_pass` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `gate` varchar(5) NOT NULL,
  `boarding_time` datetime NOT NULL,
  `sequence_number` int(11) NOT NULL,
  `qr_code_data` text NOT NULL,
  `issued_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boarding_pass`
--

INSERT INTO `boarding_pass` (`id`, `booking_id`, `gate`, `boarding_time`, `sequence_number`, `qr_code_data`, `issued_date`) VALUES
(1, 1, 'C2', '2025-11-15 07:20:00', 1, 'MFR:TAN/ALICE.E12345.MH101.15NOV.KULHND.12A.001', '2025-11-14 08:00:00'),
(2, 2, 'P4', '2025-11-16 09:50:00', 2, 'MFR:KUMAR/BOB.E67890.AK205.16NOV.KULDPS.5B.002', '2025-11-15 10:30:00'),
(3, 4, 'P4', '2025-11-16 09:50:00', 3, 'MFR:WONG/CLARA.E11122.AK205.16NOV.KULDPS.5C.003', '2025-11-15 11:00:00'),
(4, 5, 'D33', '2025-11-20 21:20:00', 4, 'MFR:DAVIS/EMILY.E44556.GA881.20NOV.CGKICN.30A.004', '2025-11-19 22:00:00'),
(5, 6, 'A5', '2025-11-22 08:30:00', 5, 'MFR:CHEN/FRANKIE.E77889.MH502.22NOV.KULSIN.10C.005', '2025-11-21 09:00:00'),
(6, 7, 'A5', '2025-11-22 08:30:00', 6, 'MFR:TAN/ALICE.E12345.MH502.22NOV.KULSIN.10D.006', '2025-11-21 09:05:00'),
(7, 8, 'C4', '2025-12-01 08:20:00', 7, 'MFR:HO/GRACE.G778899.MH102.01DEC.HNDKUL.12B.007', '2025-11-30 09:00:00'),
(8, 9, 'P5', '2025-12-02 13:50:00', 8, 'MFR:YAP/HENRY.H112233.AK206.02DEC.DPSKUL.6A.008', '2025-12-01 14:30:00'),
(9, 10, 'F30', '2025-12-03 09:20:00', 9, 'MFR:LIM/ISABEL.I445566.SQ120.03DEC.HNDSIN.23A.009', '2025-12-02 10:00:00'),
(10, 11, 'D35', '2025-12-04 08:20:00', 10, 'MFR:FOO/JACK.J998877.GA882.04DEC.ICNCGK.30B.010', '2025-12-03 09:00:00'),
(11, 12, 'A6', '2025-12-05 10:20:00', 11, 'MFR:NG/KAREN.K665544.MH503.05DEC.SINKUL.10E.011', '2025-12-04 11:00:00'),
(12, 13, 'T1', '2025-12-10 09:20:00', 12, 'MFR:MESSI/LEO.L101010.PRVT01.10DEC.KULDPS.1A.012', '2025-12-09 10:00:00'),
(13, 14, 'C20', '2025-12-01 14:20:00', 13, 'MFR:MYOI/MINA.M242424.BI421.01DEC.BWNKUL.15A.013', '2025-11-30 15:00:00'),
(14, 15, 'T2', '2025-12-02 11:20:00', 14, 'MFR:DRAKE/NATHAN.N334455.VN501.02DEC.HANSIN.15B.014', '2025-12-01 12:00:00'),
(15, 16, 'G5', '2025-12-03 22:20:00', 15, 'MFR:ONG/OLIVIA.O121212.TG410.03DEC.BKKHND.1A.015', '2025-12-02 23:00:00'),
(16, 17, 'A7', '2025-12-06 06:20:00', 16, 'MFR:PAN/PETER.P777666.MH3001.06DEC.KULSIN.1C.016', '2025-12-05 07:00:00'),
(17, 18, 'C22', '2025-12-07 09:20:00', 17, 'MFR:YEOH/QUINCY.Q454545.AK611.07DEC.KULICN.20A.017', '2025-12-06 10:00:00'),
(18, 19, 'C1', '2025-12-15 00:20:00', 18, 'MFR:CHU/RACHEL.R989898.MH1000.15DEC.KULHND.1A.018', '2025-12-14 01:00:00'),
(19, 20, 'C1', '2025-12-15 00:20:00', 19, 'MFR:ROGERS/STEVE.S191807.MH1000.15DEC.KULHND.1B.019', '2025-12-14 01:00:00'),
(20, 21, 'T1', '2025-12-11 10:20:00', 20, 'MFR:STARK/TONY.S197005.PRVT02.11DEC.HNDKUL.1A.020', '2025-12-10 11:00:00'),
(21, 22, 'C2', '2025-11-15 07:20:00', 21, 'MFR:USER/NAME21.P0021.MH101.15NOV.KULHND.12C.021', '2025-11-14 08:00:00'),
(22, 23, 'P4', '2025-11-16 09:50:00', 22, 'MFR:USER/NAME22.P0022.AK205.16NOV.KULDPS.5D.022', '2025-11-15 10:30:00'),
(23, 24, 'F30', '2025-11-16 13:20:00', 23, 'MFR:USER/NAME23.P0023.SQ119.16NOV.SINHND.22G.023', '2025-11-15 14:00:00'),
(24, 25, 'D33', '2025-11-20 21:20:00', 24, 'MFR:USER/NAME24.P0024.GA881.20NOV.CGKICN.30C.024', '2025-11-19 22:00:00'),
(25, 26, 'A5', '2025-11-22 08:30:00', 25, 'MFR:USER/NAME25.P0025.MH502.22NOV.KULSIN.10F.025', '2025-11-21 09:00:00'),
(26, 27, 'C4', '2025-12-01 08:20:00', 26, 'MFR:USER/NAME26.P0026.MH102.01DEC.HNDKUL.12D.026', '2025-11-30 09:00:00'),
(27, 28, 'P5', '2025-12-02 13:50:00', 27, 'MFR:USER/NAME27.P0027.AK206.02DEC.DPSKUL.6B.027', '2025-12-01 14:30:00'),
(28, 29, 'F30', '2025-12-03 09:20:00', 28, 'MFR:USER/NAME28.P0028.SQ120.03DEC.HNDSIN.23B.028', '2025-12-02 10:00:00'),
(29, 30, 'D35', '2025-12-04 08:20:00', 29, 'MFR:USER/NAME29.P0029.GA882.04DEC.ICNCGK.30D.029', '2025-12-03 09:00:00'),
(30, 31, 'A6', '2025-12-05 10:20:00', 30, 'MFR:USER/NAME30.P0030.MH503.05DEC.SINKUL.10G.030', '2025-12-04 11:00:00'),
(31, 32, 'C20', '2025-12-01 14:20:00', 31, 'MFR:USER/NAME31.P0031.BI421.01DEC.BWNKUL.15C.031', '2025-11-30 15:00:00'),
(32, 33, 'T2', '2025-12-02 11:20:00', 32, 'MFR:USER/NAME32.P0032.VN501.02DEC.HANSIN.15D.032', '2025-12-01 12:00:00'),
(33, 34, 'G5', '2025-12-03 22:20:00', 33, 'MFR:USER/NAME33.P0033.TG410.03DEC.BKKHND.1C.033', '2025-12-02 23:00:00'),
(34, 35, 'A7', '2025-12-06 06:20:00', 34, 'MFR:USER/NAME34.P0034.MH3001.06DEC.KULSIN.1D.034', '2025-12-05 07:00:00'),
(35, 36, 'C22', '2025-12-07 09:20:00', 35, 'MFR:USER/NAME35.P0035.AK611.07DEC.KULICN.20B.035', '2025-12-06 10:00:00'),
(36, 37, 'T1', '2025-12-10 09:20:00', 36, 'MFR:USER/NAME36.P0036.PRVT01.10DEC.KULDPS.1B.036', '2025-12-09 10:00:00'),
(37, 38, 'T1', '2025-12-11 10:20:00', 37, 'MFR:USER/NAME37.P0037.PRVT02.11DEC.HNDKUL.1C.037', '2025-12-10 11:00:00'),
(38, 39, 'C1', '2025-12-15 00:20:00', 38, 'MFR:USER/NAME38.P0038.MH1000.15DEC.KULHND.1C.038', '2025-12-14 01:00:00'),
(39, 40, 'P4', '2025-12-16 09:50:00', 39, 'MFR:USER/NAME39.P0039.AK207.16DEC.KULDPS.5E.039', '2025-12-15 10:30:00'),
(40, 41, 'F31', '2025-12-17 13:20:00', 40, 'MFR:USER/NAME40.P0040.SQ125.17DEC.SINHND.22H.040', '2025-12-16 14:00:00'),
(41, 42, 'C2', '2025-11-15 07:20:00', 41, 'MFR:USER/NAME41.P0041.MH101.15NOV.KULHND.12E.041', '2025-11-14 08:00:00'),
(42, 43, 'P4', '2025-11-16 09:50:00', 42, 'MFR:USER/NAME42.P0042.AK205.16NOV.KULDPS.5F.042', '2025-11-15 10:30:00'),
(43, 44, 'F30', '2025-11-16 13:20:00', 43, 'MFR:USER/NAME43.P0043.SQ119.16NOV.SINHND.22A.043', '2025-11-15 14:00:00'),
(44, 45, 'D33', '2025-11-20 21:20:00', 44, 'MFR:USER/NAME44.P0044.GA881.20NOV.CGKICN.30E.044', '2025-11-19 22:00:00'),
(45, 46, 'A5', '2025-11-22 08:30:00', 45, 'MFR:USER/NAME45.P0045.MH502.22NOV.KULSIN.11A.045', '2025-11-21 09:00:00'),
(46, 47, 'C4', '2025-12-01 08:20:00', 46, 'MFR:USER/NAME46.P0046.MH102.01DEC.HNDKUL.12F.046', '2025-11-30 09:00:00'),
(47, 48, 'P5', '2025-12-02 13:50:00', 47, 'MFR:USER/NAME47.P0047.AK206.02DEC.DPSKUL.6C.047', '2025-12-01 14:30:00'),
(48, 49, 'F30', '2025-12-03 09:20:00', 48, 'MFR:USER/NAME48.P0048.SQ120.03DEC.HNDSIN.23C.048', '2025-12-02 10:00:00'),
(49, 50, 'D35', '2025-12-04 08:20:00', 49, 'MFR:USER/NAME49.P0049.GA882.04DEC.ICNCGK.30F.049', '2025-12-03 09:00:00'),
(50, 3, 'F30', '2025-11-16 13:20:00', 50, 'MFR:TAN/ALICE.A12345678.SQ119.16NOV.SINHND.22F.050', '2025-11-15 14:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNo` (`phoneNo`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `flight_number` (`flight_number`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `boarding_pass`
--
ALTER TABLE `boarding_pass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `boarding_pass`
--
ALTER TABLE `boarding_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
