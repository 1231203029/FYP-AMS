-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2025 at 04:12 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `race` varchar(25) NOT NULL,
  `state` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `gender`, `race`, `state`, `nationality`, `email`, `password`, `phoneNo`) VALUES
(1, 'Harry', 'Male', 'Malay', 'Johor', 'Malaysia', 'harry@gmail.com', 'abc123', '01123456789'),
(2, 'Sam', 'Male', 'Chinese', 'Perak', 'Malaysia', 'sam@gmail.com', 'abc123', '01256123987'),
(3, 'Charlie', 'Male', 'Indian', 'Negeri Sembilan', 'Malaysia', 'charlie@gmail.com', 'abc123', '01300888222');

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE `aircraft` (
  `id` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `company` varchar(50) NOT NULL,
  `country` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cost_myr` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `horsepower_hp` int(11) NOT NULL,
  `fuel_tank_litre` int(11) NOT NULL,
  `total_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aircraft`
--

INSERT INTO `aircraft` (`id`, `model`, `company`, `country`, `image`, `cost_myr`, `type`, `quantity`, `horsepower_hp`, `fuel_tank_litre`, `total_seats`) VALUES
(1, 'Airbus A320neo', 'Airbus', 'France', 'image/A320.png', 450000000, 'Passenger Jet', 5, 27000, 24200, 180),
(2, 'Boeing 737 MAX 8', 'Boeing', 'United States', 'image/Boeing737max8.png', 400000000, 'Passenger Jet', 5, 28000, 26000, 178),
(3, 'ATR 72-600', 'ATR', 'France', 'image/ATR72-600.png', 120000000, 'Turboprop', 3, 2750, 5000, 70),
(4, 'Airbus A350-900', 'Airbus', 'France', 'image/A350-900.png', 1200000000, 'Wide-body Jet', 3, 97000, 138000, 350),
(5, 'Boeing 787-9 Dreamliner', 'Boeing', 'United States', 'image/Boeing787-8-dreamliner.png', 1100000000, 'Wide-body Jet', 3, 94000, 138700, 296),
(6, 'Cessna 172 Skyhawk', 'Cessna', 'United States', 'image/Cessna172Skyhawk.png', 1500000, 'Light Aircraft', 5, 180, 212, 4),
(7, 'Gulfstream G650', 'Gulfstream Aerospace', 'United States', 'image/GulfstreamG650.png', 300000000, 'Business Jet', 5, 17000, 18300, 18),
(8, 'Embraer E195-E2', 'Embraer', 'Brazil', 'image/EmbraerE195-E2.png', 380000000, 'Regional Jet', 5, 23000, 12900, 132),
(9, 'Bombardier Q400', 'De Havilland Canada', 'Canada', 'image/BombardierQ400.png', 150000000, 'Turboprop', 5, 5071, 8900, 82),
(10, 'Airbus A380-800', 'Airbus', 'France', 'image/AirbusA380-800.png', 1800000000, 'Super Jumbo Jet', 3, 320000, 320000, 853);

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `coordinate` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(40) NOT NULL,
  `country` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id`, `name`, `image`, `coordinate`, `address`, `state`, `country`, `status`) VALUES
(1, 'Haneda Airport', '', '35.5494°N, 139.7798°E', 'Ota', 'Tokyo', 'Japan', 'Operational'),
(2, 'Incheon International Airport', '', '37.4602°N, 126.4407°E', 'Jung-gu', 'Seoul', 'South Korea', 'Operational'),
(3, 'Pyongyang International Airport', '', '39.2241°N, 125.6700°E', 'Sunan District', 'Pyongyang', 'North Korea', 'Operational'),
(4, 'Soekarno–Hatta International Airport', '', '6.1256°S, 106.6559°E', 'Tangerang', 'Banten', 'Indonesia', 'Operational'),
(5, 'Noi Bai International Airport', '', '21.2210°N, 105.8067°E', 'Soc Son', 'Hanoi', 'Vietnam', 'Operational'),
(6, 'Suvarnabhumi Airport', '', '13.6900°N, 100.7501°E', 'Racha Thewa', 'Bangkok', 'Thailand', 'Operational'),
(7, 'Kuala Lumpur International Airport', '', '2.7456°N, 101.7072°E', 'Sepang', 'Selangor', 'Malaysia', 'Operational'),
(8, 'Brunei International Airport', '', '4.9442°N, 114.9283°E', 'Berakas', 'Brunei-Muara', 'Brunei', 'Operational'),
(9, 'Singapore Changi Airport', '', '1.3644°N, 103.9915°E', 'Airport Blvd', 'Singapore', 'Singapore', 'Operational'),
(10, 'Ngurah Rai International Airport', '', '8.7481°S, 115.1675°E', 'Tuban', 'Bali', 'Indonesia', 'Operational');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `nric` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `race` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar(11) DEFAULT NULL,
  `section` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `nric`, `name`, `image`, `gender`, `race`, `address`, `state`, `nationality`, `email`, `password`, `phoneNo`, `section`, `role`) VALUES
(1, 0, 'Iskandar', '', 'Male', 'Malay', '', 'Selangor', 'Malaysia', 'isaac@gmail.com', 'abc123', '01127469381', 'Cockpit Crew', 'Captain'),
(2, 0, 'Amir', '', 'Male', 'Malay', '', 'Kuala Lumpur', 'Malaysia', 'amir@gmail.com', 'abc123', '01269487352', 'Cockpit Crew', 'First Officer'),
(3, 0, 'Liyana', '', 'Female', 'Malay', '', 'Penang', 'Malaysia', 'liyana@gmail.com', 'abc123', '01984321657', 'Cockpit Crew', 'Second Officer'),
(4, 0, 'Aina', '', 'Female', 'Malay', '', 'Johor', 'Malaysia', 'aina@gmail.com', 'abc123', '01756234980', 'Cabin Crew', 'Purser'),
(5, 0, 'Siti', '', 'Female', 'Malay', '', 'Sabah', 'Malaysia', 'siti@gmail.com', 'abc123', '01483756291', 'Cabin Crew', 'Flight Attendant'),
(6, 0, 'Rachel', '', 'Female', 'Chinese', '', 'Sarawak', 'Malaysia', 'rachel@gmail.com', 'abc123', '01391245737', 'Cabin Crew', 'Flight Attendant'),
(7, 0, 'Faiz', '', 'Male', 'Malay', '', 'Selangor', 'Malaysia', 'faiz@gmail.com', 'abc123', '01627849562', 'Ramp / Apron Crew', 'Ground Handler'),
(8, 0, 'Darren', '', 'Male', 'Chinese', '', 'Kedah', 'Malaysia', 'darren@gmail.com', 'abc123', '01894372157', 'Ramp / Apron Crew', 'Marshaler'),
(9, 0, 'Ravi', '', 'Male', 'Indian', '', 'Negeri Sembilan', 'Malaysia', 'ravi@gmail.com', 'abc123', '01736598242', 'Ramp / Apron Crew', 'Pushback Operator'),
(10, 0, 'Hafiz', '', 'Male', 'Malay', '', 'Selangor', 'Malaysia', 'hafiz@gmail.com', 'abc123', '01269814736', 'Ramp / Apron Crew', 'Fueling Crew'),
(11, 0, 'Irfan', '', 'Male', 'Malay', '', 'Perak', 'Malaysia', 'irfan@gmail.com', 'abc123', '01957246381', 'Ramp / Apron Crew', 'Fueling Crew'),
(12, 0, 'Aiman', '', 'Male', 'Malay', '', 'Johor', 'Malaysia', 'aiman@gmail.com', 'abc123', '01384529618', 'Ramp / Apron Crew', 'Fueling Crew'),
(13, 0, 'Nora', '', 'Female', 'Malay', '', 'Penang', 'Malaysia', 'nora@gmail.com', 'abc123', '01498237655', 'Ramp / Apron Crew', 'Catering Crew'),
(14, 0, 'Farah', '', 'Female', 'Malay', '', 'Melaka', 'Malaysia', 'farah@gmail.com', 'abc123', '01683472592', 'Ramp / Apron Crew', 'Catering Crew'),
(15, 0, 'Lina', '', 'Female', 'Chinese', '', 'Perlis', 'Malaysia', 'lina@gmail.com', 'abc123', '01927836451', 'Ramp / Apron Crew', 'Catering Crew'),
(16, 0, 'Hassan', '', 'Male', 'Malay', '', 'Sabah', 'Malaysia', 'hassan@gmail.com', 'abc123', '01892736486', 'Ramp / Apron Crew', 'Cleaning Crew'),
(17, 0, 'Joko', '', 'Male', 'Javanese', '', 'Kalimantan', 'Indonesia', 'joko@gmail.com', 'abc123', '01769435282', 'Ramp / Apron Crew', 'Cleaning Crew'),
(18, 0, 'Rizal', '', 'Male', 'Malay', '', 'Johor', 'Malaysia', 'rizal@gmail.com', 'abc123', '01396847254', 'Ramp / Apron Crew', 'Cleaning Crew'),
(19, 0, 'Azman', '', 'Male', 'Malay', '', 'Selangor', 'Malaysia', 'azman@gmail.com', 'abc123', '01638249572', 'Technical Crew', 'Aircraft Maintenance Engineer'),
(20, 0, 'Zulkifli', '', 'Male', 'Malay', '', 'Sarawak', 'Malaysia', 'zulkifli@gmail.com', 'abc123', '01964873521', 'Technical Crew', 'Aircraft Maintenance Technician'),
(21, 0, 'Rahim', '', 'Male', 'Malay', '', 'Sabah', 'Malaysia', 'rahim@gmail.com', 'abc123', '01257893462', 'Technical Crew', 'Avionics Technician'),
(22, 0, 'Elaine', '', 'Female', 'Chinese', '', 'Kuala Lumpur', 'Malaysia', 'elaine@gmail.com', 'abc123', '01478652935', 'Traffic / Operational Crew', 'Air Traffic Controller'),
(23, 0, 'Naufal', '', 'Male', 'Malay', '', 'Johor', 'Malaysia', 'naufal@gmail.com', 'abc123', '01789326452', 'Traffic / Operational Crew', 'Flight Dispatcher'),
(24, 0, 'Jasmine', '', 'Female', 'Indian', '', 'Penang', 'Malaysia', 'jasmine@gmail.com', 'abc123', '01896734583', 'Traffic / Operational Crew', 'Load Controller'),
(25, 0, 'Hakim', '', 'Male', 'Malay', '', 'Selangor', 'Malaysia', 'hakim@gmail.com', 'abc123', '01923847562', 'Traffic / Operational Crew', 'Traffic Inspector'),
(26, 0, 'Aaron', '', 'Male', 'Chinese', '', 'Singapore', 'Singapore', 'aaron@gmail.com', 'abc123', '01269378460', 'Traffic / Operational Crew', 'Ground Operations Supervisor'),
(27, 0, 'Syafiq', '', 'Male', 'Malay', '', 'Kuala Lumpur', 'Malaysia', 'syafiq@gmail.com', 'abc123', '01378495261', 'Traffic / Operational Crew', 'Ground Operations Supervisor'),
(28, 0, 'Mira', '', 'Female', 'Malay', '', 'Melaka', 'Malaysia', 'mira@gmail.com', 'abc123', '01698723452', 'Airport & Support Staff', 'Check-in Agent'),
(29, 0, 'Samantha', '', 'Female', 'Chinese', '', 'Penang', 'Malaysia', 'samantha@gmail.com', 'abc123', '01724598631', 'Airport & Support Staff', 'Ticketing Agent'),
(30, 0, 'Putri', '', 'Female', 'Malay', '', 'Selangor', 'Malaysia', 'putri@gmail.com', 'abc123', '01839476513', 'Airport & Support Staff', 'Ticketing Agent'),
(31, 0, 'Fikri', '', 'Male', 'Malay', '', 'Johor', 'Malaysia', 'fikri@gmail.com', 'abc123', '01982347562', 'Airport & Support Staff', 'Gate Agent'),
(32, 0, 'Hannah', '', 'Female', 'Malay', '', 'Kuala Lumpur', 'Malaysia', 'hannah@gmail.com', 'abc123', '01397524681', 'Airport & Support Staff', 'Gate Agent'),
(33, 0, 'Idris', '', 'Male', 'Malay', '', 'Sabah', 'Malaysia', 'idris@gmail.com', 'abc123', '01469827544', 'Airport & Support Staff', 'Gate Agent'),
(34, 0, 'Leila', '', 'Female', 'Malay', '', 'Perak', 'Malaysia', 'leila@gmail.com', 'abc123', '01823459761', 'Airport & Support Staff', 'Security Personnel'),
(35, 0, 'Karim', '', 'Male', 'Malay', '', 'Kelantan', 'Malaysia', 'karim@gmail.com', 'abc123', '01786423951', 'Airport & Support Staff', 'Security Personnel'),
(36, 0, 'Huda', '', 'Female', 'Malay', '', 'Brunei', 'Brunei', 'huda@gmail.com', 'abc123', '01976482346', 'Airport & Support Staff', 'Security Personnel'),
(37, 0, 'Zara', '', 'Female', 'Malay', '', 'Penang', 'Malaysia', 'zara@gmail.com', 'abc123', '01348297616', 'Airport & Support Staff', 'Customs Officer'),
(38, 0, 'Ahmad', '', 'Male', 'Malay', '', 'Selangor', 'Malaysia', 'ahmad@gmail.com', 'abc123', '01497286341', 'Airport & Support Staff', 'Immigration Officer'),
(39, 0, 'Farid', '', 'Male', 'Malay', '', 'Johor', 'Malaysia', 'farid@gmail.com', 'abc123', '01983647216', 'Airport & Support Staff', 'Immigration Officer');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `race` varchar(25) NOT NULL,
  `state` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `name`, `gender`, `race`, `state`, `nationality`, `email`, `password`, `phoneNo`) VALUES
(1, 'Zayn', 'Male', 'Malay', 'Selangor', 'Malaysia', 'zayn@gmail.com', 'abc123', '01199564231'),
(2, 'Jordan', 'Male', 'Chinese', 'Penang', 'Malaysia', 'jordan@gmail.com', 'abc123', '01221665432'),
(3, 'Michael', 'Male', 'Indian', 'Kuala Lumpur', 'Malaysia', 'michael@gmail.com', 'abc123', '01312889977');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNo` (`phoneNo`);

--
-- Indexes for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNo` (`phoneNo`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNo` (`phoneNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aircraft`
--
ALTER TABLE `aircraft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
