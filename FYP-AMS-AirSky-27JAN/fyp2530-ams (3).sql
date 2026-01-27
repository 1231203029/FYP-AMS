-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2026 at 10:08 AM
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
  `nric` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `race` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar(12) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `section_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nric`, `name`, `image`, `gender`, `race`, `address`, `state`, `nationality`, `email`, `password`, `phoneNo`, `status`, `section_id`, `role_id`) VALUES
(1, '900415105533', 'Mika Bin Rafee', 'image/mika.png', 'Male', 'Malay', 'No. 27, Jalan Setia 4, Taman Bukit Indah, 81200 Johor Bahru, Johor', 'Johor', 'Malaysia', 'mika@gmail.com', '$2y$10$u5.0j.nu8PQgt9Ruo5oG7uvOxfTdAOFvHP29ox.D6mg1DDHi3y4wG', '01123456789', 'Active', 1, 2),
(2, '880921105244', 'Shaheizy Sam', 'image/ShaheizySam.png', 'Male', 'Malay', 'No. 14, Jalan Sultan Abdullah, 31650 Ipoh, Perak', 'Perak', 'Malaysia', 'sam@gmail.com', '$2y$10$zd.Y0cTahm3hEpq9F3biRuIBkhraQSOibKXpAKvITykDvFg1jbjru', '01256123987', 'Active', 1, 2),
(3, '950712145229', 'Donnie Yen', 'image/donnieyen.png', 'Male', 'Chinese', 'No. 6, Taman Bukit Chedang, 70200 Seremban, Negeri Sembilan', 'Negeri Sembilan', 'Malaysia', 'donnieyen@gmail.com', '$2y$10$kpdyYrnPyLROHT7Lkt8Dru0UOKAlKaeIgWQVauwbFo4HjcL.Dk4Qm', '01300888222', 'Active', 1, 2);

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
(10, 'Airbus A380-800', 'Airbus', 'France', 'image/AirbusA380-800.png', 1800000000, 'Super Jumbo Jet', 3, 320000, 320000, 853),
(12, 'test', 'test', 'test', 'planesample.png', 1, 'Turboprop', 1, 10000, 50, 5),
(13, 'test', 'test 123', 'test 123', 'cat.png', 1, 'Passenger Jet', 1, 10000, 10000, 10);

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
(1, 'Haneda Airport', 'image/Haneda_Airport.png', '35.5494°N, 139.7798°E', 'Haneda Airport, 3-3-2 Hanedakuko, Ota City, Tokyo 144-0041', 'Tokyo', 'Japan', 'Operational'),
(2, 'Incheon International Airport', 'image/Incheon_International_Airport.png', '37.4602°N, 126.4407°E', '272 Gonghang-ro, Jung-gu, Incheon 22382', 'Seoul', 'South Korea', 'Operational'),
(3, 'Pyongyang International Airport', 'image/Pyongyang_International_Airport.png', '39.2241°N, 125.6700°E', 'Sunan District, Pyongyang, Democratic People’s Republic of Korea', 'Pyongyang', 'North Korea', 'Operational'),
(4, 'Soekarno–Hatta International Airport', 'image/Soekarno–Hatta_International_Airport.png', '6.1256°S, 106.6559°E', 'Jl. Prof. Sedyatmo, Pajang, Tangerang City, Banten 19120', 'Banten', 'Indonesia', 'Operational'),
(5, 'Noi Bai International Airport', 'image/Noi_Bai_International_Airport.png', '21.2210°N, 105.8067°E', 'Phú Cường, Sóc Sơn, Hanoi 100000', 'Hanoi', 'Vietnam', 'Operational'),
(6, 'Suvarnabhumi Airport', 'image/Suvarnabhumi_Airport.png', '13.6900°N, 100.7501°E', '999 Moo 1, Nong Prue, Bang Phli, Samut Prakan 10540', 'Bangkok', 'Thailand', 'Operational'),
(7, 'Kuala Lumpur International Airport', 'image/Kuala_Lumpur_International_Airport.png', '2.7456°N, 101.7072°E', 'Jalan Cta 4B, 64000 Sepang, Selangor', 'Selangor', 'Malaysia', 'Operational'),
(8, 'Brunei International Airport', 'image/Brunei_International_Airport.png', '4.9442°N, 114.9283°E', 'Jalan Lapangan Terbang, Berakas BB2513, Brunei-Muara', 'Brunei-Muara', 'Brunei', 'Operational'),
(9, 'Singapore Changi Airport', 'image/Singapore_Changi_Airport.png', '1.3644°N, 103.9915°E', 'Airport Boulevard, Singapore 819643', 'Singapore', 'Singapore', 'Operational'),
(10, 'Ngurah Rai International Airport', 'image/Ngurah_Rai_International_Airport.png', '8.7481°S, 115.1675°E', 'Jl. Raya Gusti Ngurah Rai, Tuban, Kuta, Badung Regency, Bali 80361', 'Bali', 'Indonesia', 'Operational'),
(11, 'test', '', '35.5494°N, 139.7798°E', 'MMU Bukit Beruang', 'Melaka', 'Malaysia', 'Operational');

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

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `seat_number` varchar(4) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'e.g., Pending, Confirmed, Cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `flight_id`, `seat_number`, `booking_date`, `total_price`, `status`) VALUES
(1, 1, 1, '12A', '2025-10-27 17:10:00', 2200.50, 'Confirmed'),
(2, 2, 2, '5B', '2025-10-27 18:15:00', 450.00, 'Confirmed'),
(3, 1, 3, '22F', '2025-10-27 19:20:00', 1800.00, 'Pending'),
(4, 3, 2, '5C', '2025-10-27 20:00:00', 450.00, 'Confirmed'),
(5, 5, 4, '30A', '2025-11-10 07:30:00', 2800.00, 'Confirmed'),
(6, 6, 5, '10C', '2025-11-10 08:00:00', 250.00, 'Confirmed'),
(7, 1, 5, '10D', '2025-11-10 08:05:00', 250.00, 'Confirmed'),
(8, 7, 6, '12B', '2025-11-10 17:00:00', 2200.50, 'Confirmed'),
(9, 8, 7, '6A', '2025-11-10 18:00:00', 450.00, 'Confirmed'),
(10, 9, 8, '23A', '2025-11-10 19:00:00', 1800.00, 'Confirmed'),
(11, 10, 9, '30B', '2025-11-10 20:00:00', 2800.00, 'Confirmed'),
(12, 11, 10, '10E', '2025-11-10 21:00:00', 250.00, 'Confirmed'),
(13, 12, 16, '1A', '2025-11-10 22:00:00', 150000.00, 'Confirmed'),
(14, 13, 11, '15A', '2025-11-10 23:00:00', 800.00, 'Confirmed'),
(15, 14, 12, '15B', '2025-11-11 00:00:00', 750.00, 'Confirmed'),
(16, 15, 13, '1A', '2025-11-11 01:00:00', 3500.00, 'Confirmed'),
(17, 16, 14, '1C', '2025-11-11 02:00:00', 250.00, 'Confirmed'),
(18, 17, 15, '20A', '2025-11-11 03:00:00', 400.00, 'Confirmed'),
(19, 18, 18, '1A', '2025-11-11 04:00:00', 5000.00, 'Confirmed'),
(20, 19, 18, '1B', '2025-11-11 05:00:00', 5000.00, 'Confirmed'),
(21, 20, 17, '1A', '2025-11-11 06:00:00', 200000.00, 'Confirmed'),
(22, 21, 1, '12C', '2025-11-11 17:00:00', 2200.50, 'Confirmed'),
(23, 22, 2, '5D', '2025-11-11 18:00:00', 450.00, 'Confirmed'),
(24, 23, 3, '22G', '2025-11-11 19:00:00', 1800.00, 'Confirmed'),
(25, 24, 4, '30C', '2025-11-11 20:00:00', 2800.00, 'Confirmed'),
(26, 25, 5, '10F', '2025-11-11 21:00:00', 250.00, 'Confirmed'),
(27, 26, 6, '12D', '2025-11-11 22:00:00', 2200.50, 'Confirmed'),
(28, 27, 7, '6B', '2025-11-11 23:00:00', 450.00, 'Confirmed'),
(29, 28, 8, '23B', '2025-11-12 00:00:00', 1800.00, 'Confirmed'),
(30, 29, 9, '30D', '2025-11-12 01:00:00', 2800.00, 'Confirmed'),
(31, 30, 10, '10G', '2025-11-12 02:00:00', 250.00, 'Confirmed'),
(32, 31, 11, '15C', '2025-11-12 03:00:00', 800.00, 'Confirmed'),
(33, 32, 12, '15D', '2025-11-12 04:00:00', 750.00, 'Confirmed'),
(34, 33, 13, '1C', '2025-11-12 05:00:00', 3500.00, 'Confirmed'),
(35, 34, 14, '1D', '2025-11-12 06:00:00', 250.00, 'Confirmed'),
(36, 35, 15, '20B', '2025-11-12 07:00:00', 400.00, 'Confirmed'),
(37, 36, 16, '1B', '2025-11-12 08:00:00', 150000.00, 'Confirmed'),
(38, 37, 17, '1C', '2025-11-12 09:00:00', 200000.00, 'Confirmed'),
(39, 38, 18, '1C', '2025-11-12 10:00:00', 5000.00, 'Confirmed'),
(40, 39, 19, '5E', '2025-11-12 11:00:00', 450.00, 'Confirmed'),
(41, 40, 20, '22H', '2025-11-12 12:00:00', 1800.00, 'Confirmed'),
(42, 41, 1, '12E', '2025-11-12 17:00:00', 2200.50, 'Confirmed'),
(43, 42, 2, '5F', '2025-11-12 18:00:00', 450.00, 'Confirmed'),
(44, 43, 3, '22A', '2025-11-12 19:00:00', 1800.00, 'Confirmed'),
(45, 44, 4, '30E', '2025-11-12 20:00:00', 2800.00, 'Confirmed'),
(46, 45, 5, '11A', '2025-11-12 21:00:00', 250.00, 'Confirmed'),
(47, 46, 6, '12F', '2025-11-12 22:00:00', 2200.50, 'Confirmed'),
(48, 47, 7, '6C', '2025-11-12 23:00:00', 450.00, 'Confirmed'),
(49, 48, 8, '23C', '2025-11-13 00:00:00', 1800.00, 'Confirmed'),
(50, 49, 9, '30F', '2025-11-13 01:00:00', 2800.00, 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_ref` varchar(20) DEFAULT NULL,
  `flight_id` int(11) DEFAULT NULL,
  `passenger_email` varchar(100) DEFAULT NULL,
  `passenger_name` varchar(100) DEFAULT NULL,
  `seat` varchar(10) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_ref`, `flight_id`, `passenger_email`, `passenger_name`, `seat`, `total_price`, `status`) VALUES
(1, 'AIR-89327', 1, '', ' ', '3F', 164.60, 'Confirmed'),
(5, 'AIR-65941', 3, '', ' ', '4E', 3445.00, 'Confirmed'),
(7, 'AIR-36106', 1, 'john@gmail.com', 'John Doe', '5C', 264.20, 'Confirmed'),
(8, 'AIR-57239', 1, '', ' ', '3C', 164.60, 'Confirmed'),
(9, 'AIR-93891', 1, 'john@gmail.com', 'John Doe', '4C', 139.60, 'Confirmed'),
(10, 'AIR-51686', 1, 'john@gmail.com', 'John Doe', '1E', 184.00, 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nric` varchar(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `race` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar(12) DEFAULT NULL,
  `passport_number` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nric`, `name`, `image`, `gender`, `race`, `address`, `state`, `nationality`, `email`, `password`, `phoneNo`, `passport_number`, `status`) VALUES
(1, '900515011200', 'Alice Tan', 'image/defaultprofilepic.png', 'Female', 'Chinese', 'No. 12, Jalan Mawar, 40000 Shah Alam, Selangor, Malaysia', 'Selangor', 'Malaysia', 'alice@gmail.com', 'hashed_pass_123', '0123456789', 'A12345678', 'Active'),
(2, '851130015601', 'Bob Kumar', 'image/defaultprofilepic.png', 'Male', 'Indian', 'No. 45, Lorong Meranti, 30000 Ipoh, Perak, Malaysia', 'Perak', 'Malaysia', 'bob@gmail.com', 'hashed_pass_456', '0198765432', 'B87654321', 'Active'),
(3, NULL, 'Clara Wong', 'image/defaultprofilepic.png', 'Female', 'Chinese', '1 Orchard Road, 238823, Singapore', 'Singapore', 'Singapore', 'clara@gmail.com', 'hashed_pass_789', '0111222333', 'S98765432C', 'Active'),
(4, NULL, 'David Lee', 'image/defaultprofilepic.png', 'Male', 'Chinese', 'Jl. Sudirman No.55, Jakarta 10220, Indonesia', 'Indonesia', 'Indonesia', 'david@gmail.com', 'hashed_pass_101', '0177889900', 'J55544333', 'Active'),
(5, NULL, 'Emily Davis', 'image/defaultprofilepic.png', 'Female', 'Other', '23 Queen Street, Sydney, NSW 2000, Australia', 'Australia', 'Australia', 'emily@gmail.com', 'hashed_pass_emily', '0134567890', 'K11223344', 'Active'),
(6, '000125012302', 'Frankie Chen', 'image/defaultprofilepic.png', 'Male', 'Chinese', '42 Jalan Bukit Bintang, 55100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'Wilayah Persekutuan Kuala Lumpur', 'Malaysia', 'frankie@gmail.com', 'hashed_pass_frank', '0145678901', 'P55667788', 'Active'),
(7, '910719013403', 'Grace Ho', 'image/defaultprofilepic.png', 'Female', 'Chinese', '78 Jalan Ampang, 50450 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'Wilayah Persekutuan Kuala Lumpur', 'Malaysia', 'grace@gmail.com', 'pass123', '0101111127', 'G778899', 'Active'),
(8, '821201014504', 'Henry Yap', 'image/defaultprofilepic.png', 'Male', 'Chinese', '90 Jalan Sultan Ismail, 50250 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'Wilayah Persekutuan Kuala Lumpur', 'Malaysia', 'henry@gmail.com', 'pass123', '0102222238', 'H112233', 'Active'),
(9, NULL, 'Isabel Lim', 'image/defaultprofilepic.png', 'Female', 'Chinese', '12 Marina Bay Sands, 018956, Singapore', 'Singapore', 'Singapore', 'isabel@gmail.com', 'pass123', '0103333349', 'I445566', 'Active'),
(10, '930914016705', 'Jack Foo', 'image/defaultprofilepic.png', 'Male', 'Chinese', '55 Jalan Tun Razak, 50400 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'Wilayah Persekutuan Kuala Lumpur', 'Malaysia', 'jack@gmail.com', 'pass123', '0104444450', 'J998877', 'Active'),
(11, '900130017806', 'Karen Ng', 'image/defaultprofilepic.png', 'Female', 'Chinese', '31 Jalan Raja Chulan, 50200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'Wilayah Persekutuan Kuala Lumpur', 'Malaysia', 'karen@gmail.com', 'pass123', '0105555561', 'K665544', 'Active'),
(12, NULL, 'Leo Messi', 'image/defaultprofilepic.png', 'Male', 'Other', 'Calle Figueroa 102, Buenos Aires C1001, Argentina', 'Argentina', 'Argentina', 'leo@gmail.com', 'pass123', '0106666672', 'L101010', 'Active'),
(13, NULL, 'Mina Myoi', 'image/defaultprofilepic.png', 'Female', 'Other', '5 Chuo-ku, Tokyo 100-0001, Japan', 'Japan', 'Japan', 'mina@gmail.com', 'pass123', '0107777783', 'M242424', 'Active'),
(14, NULL, 'Nathan Drake', 'image/defaultprofilepic.png', 'Male', 'Other', '123 Elm Street, New York, NY 10001, USA', 'United States', 'United States', 'nathan@gmail.com', 'pass123', '0108888894', 'N334455', 'Active'),
(15, NULL, 'Olivia Ong', 'image/defaultprofilepic.png', 'Female', 'Chinese', '7 Sentosa Cove, Singapore 098231', 'Singapore', 'Singapore', 'olivia@gmail.com', 'pass123', '0109999905', 'O121212', 'Active'),
(16, '990505012307', 'Peter Pan', 'image/defaultprofilepic.png', 'Male', 'Other', '88 Jalan Petaling, 50000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'Wilayah Persekutuan Kuala Lumpur', 'Malaysia', 'peter@gmail.com', 'pass123', '0101010106', 'P777666', 'Active'),
(17, '010810013408', 'Quincy Yeoh', 'image/defaultprofilepic.png', 'Male', 'Chinese', '56 Jalan Kuching, 51200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'Wilayah Persekutuan Kuala Lumpur', 'Malaysia', 'quincy@gmail.com', 'pass123', '0102020217', 'Q454545', 'Active'),
(18, NULL, 'Rachel Chu', 'image/defaultprofilepic.png', 'Female', 'Chinese', '102 Main Street, Los Angeles, CA 90012, USA', 'United States', 'United States', 'rachel@gmail.com', 'pass123', '0103030328', 'R989898', 'Active'),
(19, NULL, 'Steve Rogers', 'image/defaultprofilepic.png', 'Male', 'Other', '89 Fifth Avenue, New York, NY 10003, USA', 'United States', 'United States', 'steve@gmail.com', 'pass123', '0104040439', 'S191807', 'Active'),
(20, NULL, 'Tony Stark', 'image/defaultprofilepic.png', 'Male', 'Other', '21 Jalan Tun Dr Ismail, 60000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'Wilayah Persekutuan Kuala Lumpur', 'United States', 'tony@gmail.com', 'pass123', '0105050540', 'S197005', 'Active'),
(21, '920305145609', 'Sophia Lim', 'image/defaultprofilepic.png', 'Female', 'Chinese', '45 Jalan Tropicana, 47410 Petaling Jaya, Selangor, Malaysia', 'Selangor', 'Malaysia', 'sophia.lim@gmail.com', 'pass123', '0123456781', 'A12345987', 'Active'),
(22, '870412112310', 'Arjun Reddy', 'image/defaultprofilepic.png', 'Male', 'Indian', '78 Jalan Bukit Bintang, 55100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'Wilayah Persekutuan Kuala Lumpur', 'Malaysia', 'arjun.reddy@gmail.com', 'pass123', '0134567891', 'B98765432', 'Active'),
(23, NULL, 'Hannah Tan', 'image/defaultprofilepic.png', 'Female', 'Chinese', '12 Marina Bay, 018956, Singapore', 'Singapore', 'Singapore', 'hannah.tan@gmail.com', 'pass123', '0112233445', 'S87654321A', 'Active'),
(24, NULL, 'Kenji Nakamura', 'image/defaultprofilepic.png', 'Male', 'Other', '5 Chiyoda, Tokyo 100-0011, Japan', 'Tokyo', 'Japan', 'kenji.nakamura@gmail.com', 'pass123', '0701234567', 'J23456789', 'Active'),
(25, NULL, 'Emily Smith', 'image/defaultprofilepic.png', 'Female', 'Other', '23 Wall Street, New York, NY 10005, USA', 'New York', 'USA', 'emily.smith@gmail.com', 'pass123', '0712345678', 'US987654', 'Active'),
(26, NULL, 'Liam O’Connor', 'image/defaultprofilepic.png', 'Male', 'Other', '11 O’Connell Street, Dublin 1, Ireland', 'Dublin', 'Ireland', 'liam.oconnor@gmail.com', 'pass123', '0709876543', 'IR123456', 'Active'),
(27, NULL, 'Chloe Dubois', 'image/defaultprofilepic.png', 'Female', 'Other', '14 Rue de Rivoli, 75001 Paris, France', 'Île-de-France', 'France', 'chloe.dubois@gmail.com', 'pass123', '0623456789', 'F987654', 'Active'),
(28, '900618011211', 'Ahmad Faiz', 'image/defaultprofilepic.png', 'Male', 'Malay', '33 Jalan Johor, 80000 Johor Bahru, Johor, Malaysia', 'Johor', 'Malaysia', 'ahmad.faiz@gmail.com', 'pass123', '0145678902', 'P99887766', 'Active'),
(29, NULL, 'Jessica Lim', 'image/defaultprofilepic.png', 'Female', 'Chinese', '77 Sentosa Avenue, 098960, Singapore', 'Singapore', 'Singapore', 'jessica.lim@gmail.com', 'pass123', '0113344556', 'S12345678B', 'Active'),
(30, NULL, 'Noah Müller', 'image/defaultprofilepic.png', 'Male', 'Other', '21 Kurfürstendamm, 10719 Berlin, Germany', 'Berlin', 'Germany', 'noah.mueller@gmail.com', 'pass123', '0171122334', 'DE987654', 'Active'),
(31, '900101012312', 'Aisha Abdullah', 'image/defaultprofilepic.png', 'Female', 'Malay', '18 Jalan Sultanah, 06000 Alor Setar, Kedah, Malaysia', 'Kedah', 'Malaysia', 'aisha.abdullah@gmail.com', 'pass123', '0123344556', 'A1234567', 'Active'),
(32, NULL, 'Mateo Rossi', 'image/defaultprofilepic.png', 'Male', 'Other', '6 Piazza Navona, 00186 Rome, Italy', 'Lazio', 'Italy', 'mateo.rossi@gmail.com', 'pass123', '0701122334', 'IT987654', 'Active'),
(33, NULL, 'Sofia Lopez', 'image/defaultprofilepic.png', 'Female', 'Other', '15 Gran Via, 28013 Madrid, Spain', 'Madrid', 'Spain', 'sofia.lopez@gmail.com', 'pass123', '0612345678', 'ES123456', 'Active'),
(34, NULL, 'Ethan Brown', 'image/defaultprofilepic.png', 'Male', 'Other', '88 Baker Street, NW1 6XE, London, UK', 'England', 'UK', 'ethan.brown@gmail.com', 'pass123', '0709988776', 'UK987654', 'Active'),
(35, '900420013413', 'Nurul Izzah', 'image/defaultprofilepic.png', 'Female', 'Malay', '22 Jalan Tun Razak, 25000 Kuantan, Pahang, Malaysia', 'Pahang', 'Malaysia', 'nurul.izzah@gmail.com', 'pass123', '0135566778', 'P11223344', 'Active'),
(36, NULL, 'Oliver Wilson', 'image/defaultprofilepic.png', 'Male', 'Other', '19 George Street, Sydney, NSW 2000, Australia', 'NSW', 'Australia', 'oliver.wilson@gmail.com', 'pass123', '0712233445', 'AU123456', 'Active'),
(37, NULL, 'Emma Johansson', 'image/defaultprofilepic.png', 'Female', 'Other', '7 Drottninggatan, 111 51 Stockholm, Sweden', 'Stockholm', 'Sweden', 'emma.johansson@gmail.com', 'pass123', '0705566778', 'SE987654', 'Active'),
(38, '900902014514', 'Farid Ismail', 'image/defaultprofilepic.png', 'Male', 'Malay', '12 Jalan Sultan Mahmud, 21000 Kuala Terengganu, Terengganu, Malaysia', 'Terengganu', 'Malaysia', 'farid.ismail@gmail.com', 'pass123', '0146677889', 'P22334455', 'Active'),
(39, NULL, 'Isabella Rossi', 'image/defaultprofilepic.png', 'Female', 'Other', '8 Via del Corso, 00186 Rome, Italy', 'Lazio', 'Italy', 'isabella.rossi@gmail.com', 'pass123', '0703344556', 'IT123456', 'Active'),
(40, NULL, 'Lucas Schmidt', 'image/defaultprofilepic.png', 'Male', 'Other', '33 Marienplatz, 80331 Munich, Germany', 'Bavaria', 'Germany', 'lucas.schmidt@gmail.com', 'pass123', '0711223344', 'DE123456', 'Active'),
(41, '900306015615', 'Siti Nur', 'image/defaultprofilepic.png', 'Female', 'Malay', '11 Jalan SS 2/72, 47300 Petaling Jaya, Selangor, Malaysia', 'Selangor', 'Malaysia', 'siti.nur@gmail.com', 'pass123', '0124455667', 'P33445566', 'Active'),
(42, NULL, 'William King', 'image/defaultprofilepic.png', 'Male', 'Other', '27 King Street, WC2E 8JB, London, UK', 'England', 'UK', 'william.king@gmail.com', 'pass123', '0709988771', 'UK123456', 'Active'),
(43, NULL, 'Amelia Martin', 'image/defaultprofilepic.png', 'Female', 'Other', '44 Avenue des Champs-Élysées, 75008 Paris, France', 'Île-de-France', 'France', 'amelia.martin@gmail.com', 'pass123', '0622334455', 'F123456', 'Active'),
(44, NULL, 'Benjamin Garcia', 'image/defaultprofilepic.png', 'Male', 'Other', '5 Calle de Alcalá, 28014 Madrid, Spain', 'Madrid', 'Spain', 'benjamin.garcia@gmail.com', 'pass123', '0611223344', 'ES987654', 'Active'),
(45, '900712016716', 'Aminah Hassan', 'image/defaultprofilepic.png', 'Female', 'Malay', '33 Jalan Raja Laut, 50350 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'Wilayah Persekutuan Kuala Lumpur', 'Malaysia', 'aminah.hassan@gmail.com', 'pass123', '0136677889', 'P44556677', 'Active'),
(46, NULL, 'Mia Svensson', 'image/defaultprofilepic.png', 'Female', 'Other', '19 Kungsgatan, 111 43 Stockholm, Sweden', 'Stockholm', 'Sweden', 'mia.svensson@gmail.com', 'pass123', '0705566771', 'SE123456', 'Active'),
(47, NULL, 'Elias Müller', 'image/defaultprofilepic.png', 'Male', 'Other', '21 Kurfürstendamm, 10719 Berlin, Germany', 'Berlin', 'Germany', 'elias.mueller@gmail.com', 'pass123', '0171122330', 'DE987123', 'Active'),
(48, '900818017817', 'Hafiz Rahman', 'image/defaultprofilepic.png', 'Male', 'Malay', '12 Jalan Penang, 10000 George Town, Penang, Malaysia', 'Penang', 'Malaysia', 'hafiz.rahman@gmail.com', 'pass123', '0143344556', 'P55667788', 'Active'),
(49, NULL, 'Olivia Brown', 'image/defaultprofilepic.png', 'Female', 'Other', '45 Baker Street, NW1 6XE, London, UK', 'England', 'UK', 'olivia.brown@gmail.com', 'pass123', '0702233445', 'UK987123', 'Active'),
(50, '900515018918', 'Zahra Abdullah', 'image/defaultprofilepic.png', 'Female', 'Malay', '33 Jalan Bukit Bintang, 55100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', 'Wilayah Persekutuan Kuala Lumpur', 'Malaysia', 'zahra.abdullah@gmail.com', 'pass123', '0122233445', 'P66778899', 'Active');

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
(10, 'MH503', 3, 9, 7, '2025-12-05 11:00:00', '2025-12-05 12:00:00', 'Delayed');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL,
  `flight_number` varchar(10) DEFAULT NULL,
  `origin_code` varchar(5) DEFAULT NULL,
  `dest_code` varchar(5) DEFAULT NULL,
  `departure_time` datetime DEFAULT NULL,
  `arrival_time` datetime DEFAULT NULL,
  `base_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_id`, `flight_number`, `origin_code`, `dest_code`, `departure_time`, `arrival_time`, `base_price`) VALUES
(1, 'AK512', 'KUL', 'SIN', '2025-12-15 10:00:00', '2025-12-15 11:00:00', 89.00),
(2, 'AK515', 'KUL', 'SIN', '2025-12-15 15:00:00', '2025-12-15 16:00:00', 129.00),
(3, 'SK901', 'JFK', 'LHR', '2025-12-15 20:00:00', '2025-12-16 08:00:00', 2450.00),
(4, 'AK501', 'KUL', 'SIN', '2025-12-15 08:00:00', '2025-12-15 09:00:00', 99.00),
(5, 'AK502', 'KUL', 'SIN', '2025-12-15 11:30:00', '2025-12-15 12:30:00', 120.00),
(6, 'AK503', 'KUL', 'SIN', '2025-12-15 14:00:00', '2025-12-15 15:00:00', 89.00),
(7, 'AK504', 'KUL', 'SIN', '2025-12-15 18:45:00', '2025-12-15 19:45:00', 150.00),
(8, 'AK505', 'KUL', 'SIN', '2025-12-16 07:00:00', '2025-12-16 08:00:00', 79.00),
(9, 'AK506', 'KUL', 'SIN', '2025-12-16 10:00:00', '2025-12-16 11:00:00', 99.00),
(10, 'AK507', 'KUL', 'SIN', '2025-12-16 13:00:00', '2025-12-16 14:00:00', 99.00),
(11, 'AK508', 'KUL', 'SIN', '2025-12-16 21:00:00', '2025-12-16 22:00:00', 110.00),
(12, 'AK601', 'SIN', 'KUL', '2025-12-15 09:00:00', '2025-12-15 10:00:00', 105.00),
(13, 'AK602', 'SIN', 'KUL', '2025-12-15 13:30:00', '2025-12-15 14:30:00', 115.00),
(14, 'AK603', 'SIN', 'KUL', '2025-12-16 08:00:00', '2025-12-16 09:00:00', 95.00),
(15, 'SK101', 'JFK', 'LHR', '2025-12-15 19:00:00', '2025-12-16 07:00:00', 2100.00),
(16, 'SK102', 'JFK', 'LHR', '2025-12-15 21:00:00', '2025-12-16 09:00:00', 2350.00),
(17, 'SK103', 'JFK', 'LHR', '2025-12-16 18:30:00', '2025-12-17 06:30:00', 1980.00),
(18, 'SK104', 'JFK', 'LHR', '2025-12-16 22:15:00', '2025-12-17 10:15:00', 2200.00),
(19, 'EK201', 'LHR', 'DXB', '2025-12-15 10:00:00', '2025-12-15 21:00:00', 1800.00),
(20, 'EK202', 'LHR', 'DXB', '2025-12-15 14:00:00', '2025-12-16 01:00:00', 1750.00),
(21, 'EK203', 'LHR', 'DXB', '2025-12-16 09:30:00', '2025-12-16 20:30:00', 1850.00),
(22, 'EK204', 'LHR', 'DXB', '2025-12-16 20:00:00', '2025-12-17 07:00:00', 1600.00),
(23, 'EK301', 'DXB', 'KUL', '2025-12-15 03:00:00', '2025-12-15 14:30:00', 1450.00),
(24, 'EK302', 'DXB', 'KUL', '2025-12-16 02:45:00', '2025-12-16 14:15:00', 1400.00),
(25, 'NH401', 'KUL', 'NRT', '2025-12-15 07:15:00', '2025-12-15 15:15:00', 1200.00),
(26, 'NH402', 'KUL', 'NRT', '2025-12-15 23:30:00', '2025-12-16 07:30:00', 1350.00),
(27, 'NH403', 'KUL', 'NRT', '2025-12-16 08:00:00', '2025-12-16 16:00:00', 1150.00),
(28, 'NH404', 'KUL', 'NRT', '2025-12-16 22:00:00', '2025-12-17 06:00:00', 1250.00),
(29, 'JL501', 'NRT', 'SIN', '2025-12-15 11:00:00', '2025-12-15 17:30:00', 1100.00),
(30, 'JL502', 'NRT', 'SIN', '2025-12-16 10:45:00', '2025-12-16 17:15:00', 1050.00),
(31, 'EK601', 'DXB', 'JFK', '2025-12-15 02:30:00', '2025-12-15 08:30:00', 3500.00),
(32, 'EK602', 'DXB', 'JFK', '2025-12-16 08:00:00', '2025-12-16 14:00:00', 3200.00),
(33, 'BA701', 'LHR', 'JFK', '2025-12-15 08:30:00', '2025-12-15 11:30:00', 2500.00),
(34, 'BA702', 'LHR', 'JFK', '2025-12-15 14:00:00', '2025-12-15 17:00:00', 2200.00),
(35, 'BA703', 'LHR', 'JFK', '2025-12-16 10:00:00', '2025-12-16 13:00:00', 2400.00),
(36, 'SQ801', 'SIN', 'DXB', '2025-12-15 01:00:00', '2025-12-15 04:30:00', 1650.00),
(37, 'SQ802', 'SIN', 'DXB', '2025-12-16 23:50:00', '2025-12-17 03:20:00', 1580.00),
(38, 'JL901', 'NRT', 'LHR', '2025-12-15 12:00:00', '2025-12-16 06:00:00', 2800.00),
(39, 'JL902', 'NRT', 'LHR', '2025-12-16 11:30:00', '2025-12-17 05:30:00', 2700.00),
(40, 'AK221', 'KUL', 'DXB', '2025-12-15 19:00:00', '2025-12-16 02:00:00', 1300.00),
(41, 'AK222', 'KUL', 'DXB', '2025-12-16 18:30:00', '2025-12-17 01:30:00', 1250.00),
(42, 'SQ111', 'SIN', 'NRT', '2025-12-15 09:30:00', '2025-12-15 17:00:00', 1400.00),
(43, 'SQ112', 'SIN', 'NRT', '2025-12-16 08:00:00', '2025-12-16 15:30:00', 1350.00),
(44, 'EK991', 'JFK', 'DXB', '2025-12-15 23:00:00', '2025-12-16 20:00:00', 3100.00),
(45, 'EK992', 'JFK', 'DXB', '2025-12-16 22:30:00', '2025-12-17 19:30:00', 3000.00),
(46, 'MH001', 'LHR', 'KUL', '2025-12-15 21:00:00', '2025-12-16 18:00:00', 2600.00),
(47, 'MH002', 'LHR', 'KUL', '2025-12-16 20:30:00', '2025-12-17 17:30:00', 2450.00),
(48, 'EK005', 'DXB', 'LHR', '2025-12-15 08:00:00', '2025-12-15 12:00:00', 1850.00),
(49, 'EK006', 'DXB', 'LHR', '2025-12-16 07:30:00', '2025-12-16 11:30:00', 1780.00),
(50, 'SQ022', 'SIN', 'JFK', '2025-12-15 23:35:00', '2025-12-16 06:00:00', 4200.00),
(51, 'SQ023', 'SIN', 'JFK', '2025-12-16 23:35:00', '2025-12-17 06:00:00', 4100.00),
(52, 'SQ021', 'JFK', 'SIN', '2025-12-15 10:00:00', '2025-12-16 17:30:00', 4000.00),
(53, 'SQ024', 'JFK', 'SIN', '2025-12-16 09:30:00', '2025-12-17 17:00:00', 3900.00);

-- --------------------------------------------------------

--
-- Table structure for table `flight_staff`
--

CREATE TABLE `flight_staff` (
  `id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight_staff`
--

INSERT INTO `flight_staff` (`id`, `flight_id`, `staff_id`, `role`) VALUES
(1, 1, 1, 'Captain'),
(2, 1, 2, 'First Officer'),
(3, 1, 4, 'Purser'),
(4, 1, 5, 'Flight Attendant'),
(5, 1, 6, 'Flight Attendant'),
(6, 2, 2, 'Captain'),
(7, 2, 3, 'Second Officer'),
(8, 2, 4, 'Purser'),
(9, 2, 5, 'Flight Attendant'),
(10, 2, 6, 'Flight Attendant'),
(11, 3, 1, 'Captain'),
(12, 3, 3, 'First Officer'),
(13, 3, 4, 'Purser'),
(14, 3, 5, 'Flight Attendant'),
(15, 3, 6, 'Flight Attendant'),
(16, 4, 2, 'Captain'),
(17, 4, 3, 'Second Officer'),
(18, 4, 4, 'Purser'),
(19, 4, 5, 'Flight Attendant'),
(20, 4, 6, 'Flight Attendant'),
(21, 5, 1, 'Captain'),
(22, 5, 2, 'First Officer'),
(23, 5, 4, 'Purser'),
(24, 5, 5, 'Flight Attendant'),
(25, 5, 6, 'Flight Attendant');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `record_id` int(11) NOT NULL,
  `activity` text NOT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `usertype`, `module`, `record_id`, `activity`, `datetime`) VALUES
(1, 1, 'Superadmin', 'Aircraft', 13, 'Aircraft ID 13 updated:\n· Type: Turboprop → Regional Jet\n', '2025-12-29 14:08:04'),
(2, 1, 'Superadmin', 'Aircraft', 13, 'Aircraft ID 13 updated:\n· Image: cat.png → planesample.png\n', '2025-12-29 14:10:54'),
(3, 1, 'Superadmin', 'Aircraft', 12, 'Aircraft ID 12 updated:\n· Image: cat.png → planesample.png\n', '2025-12-29 14:11:07'),
(4, 1, 'Superadmin', 'Aircraft', 13, 'Aircraft ID 13 updated:\n· Type: Regional Jet → Passenger Jet\n', '2025-12-29 14:33:10'),
(5, 1, 'Superadmin', 'Aircraft', 13, 'Aircraft ID 13 updated:\n· Image: planesample.png → cat.png\n', '2025-12-29 14:33:55'),
(6, 1, 'Superadmin', 'Aircraft', 13, 'Aircraft ID 13 updated:\n· Company: test → test 123\n· Country: test → test 123\n', '2025-12-29 14:35:54');

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
-- Table structure for table `old_flight`
--

CREATE TABLE `old_flight` (
  `id` int(11) NOT NULL,
  `airport_id` int(11) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `status` varchar(50) DEFAULT 'Scheduled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `old_flight`
--

INSERT INTO `old_flight` (`id`, `airport_id`, `aircraft_id`, `start_date_time`, `end_date_time`, `status`) VALUES
(1, 1, 1, '2025-11-15 08:30:00', '2025-11-15 11:30:00', 'Scheduled'),
(2, 2, 1, '2025-11-16 09:00:00', '2025-11-16 12:30:00', 'Scheduled'),
(3, 3, 2, '2025-11-17 13:00:00', '2025-11-17 17:00:00', 'Scheduled'),
(4, 4, 2, '2025-11-18 07:45:00', '2025-11-18 10:15:00', 'Scheduled'),
(5, 5, 3, '2025-11-19 15:00:00', '2025-11-19 19:00:00', 'Scheduled');

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
(1, 1, 2200.50, '2025-10-28 01:11:00', 'Credit Card', 'txn_12345abcde', 'Successful'),
(2, 2, 450.00, '2025-10-28 02:16:00', 'Bank Transfer', 'txn_67890fghij', 'Successful'),
(3, 4, 450.00, '2025-10-28 04:01:00', 'Credit Card', 'txn_55566klmno', 'Successful'),
(4, 5, 2800.00, '2025-11-10 15:31:00', 'Credit Card', 'txn_99887xxyy', 'Successful'),
(5, 6, 250.00, '2025-11-10 16:01:00', 'E-Wallet', 'txn_77665vvuu', 'Successful'),
(6, 7, 250.00, '2025-11-10 16:06:00', 'Credit Card', 'txn_11223ttss', 'Successful'),
(7, 8, 2200.50, '2025-11-11 01:01:00', 'Credit Card', 'txn_0008', 'Successful'),
(8, 9, 450.00, '2025-11-11 02:01:00', 'Bank Transfer', 'txn_0009', 'Successful'),
(9, 10, 1800.00, '2025-11-11 03:01:00', 'Credit Card', 'txn_0010', 'Successful'),
(10, 11, 2800.00, '2025-11-11 04:01:00', 'Credit Card', 'txn_0011', 'Successful'),
(11, 12, 250.00, '2025-11-11 05:01:00', 'E-Wallet', 'txn_0012', 'Successful'),
(12, 13, 150000.00, '2025-11-11 06:01:00', 'Bank Transfer', 'txn_0013', 'Successful'),
(13, 14, 800.00, '2025-11-11 07:01:00', 'Credit Card', 'txn_0014', 'Successful'),
(14, 15, 750.00, '2025-11-11 08:01:00', 'Credit Card', 'txn_0015', 'Successful'),
(15, 16, 3500.00, '2025-11-11 09:01:00', 'Credit Card', 'txn_0016', 'Successful'),
(16, 17, 250.00, '2025-11-11 10:01:00', 'E-Wallet', 'txn_0017', 'Successful'),
(17, 18, 400.00, '2025-11-11 11:01:00', 'Bank Transfer', 'txn_0018', 'Successful'),
(18, 19, 5000.00, '2025-11-11 12:01:00', 'Credit Card', 'txn_0019', 'Successful'),
(19, 20, 5000.00, '2025-11-11 13:01:00', 'Credit Card', 'txn_0020', 'Successful'),
(20, 21, 200000.00, '2025-11-11 14:01:00', 'Bank Transfer', 'txn_0021', 'Successful'),
(21, 22, 2200.50, '2025-11-12 01:01:00', 'Credit Card', 'txn_0022', 'Successful'),
(22, 23, 450.00, '2025-11-12 02:01:00', 'E-Wallet', 'txn_0023', 'Successful'),
(23, 24, 1800.00, '2025-11-12 03:01:00', 'Bank Transfer', 'txn_0024', 'Successful'),
(24, 25, 2800.00, '2025-11-12 04:01:00', 'Credit Card', 'txn_0025', 'Successful'),
(25, 26, 250.00, '2025-11-12 05:01:00', 'E-Wallet', 'txn_0026', 'Successful'),
(26, 27, 2200.50, '2025-11-12 06:01:00', 'Credit Card', 'txn_0027', 'Successful'),
(27, 28, 450.00, '2025-11-12 07:01:00', 'Credit Card', 'txn_0028', 'Successful'),
(28, 29, 1800.00, '2025-11-12 08:01:00', 'Bank Transfer', 'txn_0029', 'Successful'),
(29, 30, 2800.00, '2025-11-12 09:01:00', 'Credit Card', 'txn_0030', 'Successful'),
(30, 31, 250.00, '2025-11-12 10:01:00', 'E-Wallet', 'txn_0031', 'Successful'),
(31, 32, 800.00, '2025-11-12 11:01:00', 'Credit Card', 'txn_0032', 'Successful'),
(32, 33, 750.00, '2025-11-12 12:01:00', 'Bank Transfer', 'txn_0033', 'Successful'),
(33, 34, 3500.00, '2025-11-12 13:01:00', 'Credit Card', 'txn_0034', 'Successful'),
(34, 35, 250.00, '2025-11-12 14:01:00', 'E-Wallet', 'txn_0035', 'Successful'),
(35, 36, 400.00, '2025-11-12 15:01:00', 'Credit Card', 'txn_0036', 'Successful'),
(36, 37, 150000.00, '2025-11-12 16:01:00', 'Bank Transfer', 'txn_0037', 'Successful'),
(37, 38, 200000.00, '2025-11-12 17:01:00', 'Bank Transfer', 'txn_0038', 'Successful'),
(38, 39, 5000.00, '2025-11-12 18:01:00', 'Credit Card', 'txn_0039', 'Successful'),
(39, 40, 450.00, '2025-11-12 19:01:00', 'E-Wallet', 'txn_0040', 'Successful'),
(40, 41, 1800.00, '2025-11-12 20:01:00', 'Credit Card', 'txn_0041', 'Successful'),
(41, 42, 2200.50, '2025-11-13 01:01:00', 'Credit Card', 'txn_0042', 'Successful'),
(42, 43, 450.00, '2025-11-13 02:01:00', 'Bank Transfer', 'txn_0043', 'Successful'),
(43, 44, 1800.00, '2025-11-13 03:01:00', 'Credit Card', 'txn_0044', 'Successful'),
(44, 45, 2800.00, '2025-11-13 04:01:00', 'E-Wallet', 'txn_0045', 'Successful'),
(45, 46, 250.00, '2025-11-13 05:01:00', 'Credit Card', 'txn_0046', 'Successful'),
(46, 47, 2200.50, '2025-11-13 06:01:00', 'Bank Transfer', 'txn_0047', 'Successful'),
(47, 48, 450.00, '2025-11-13 07:01:00', 'Credit Card', 'txn_0048', 'Successful'),
(48, 49, 1800.00, '2025-11-13 08:01:00', 'E-Wallet', 'txn_0049', 'Successful'),
(49, 50, 2800.00, '2025-11-13 09:01:00', 'Credit Card', 'txn_0050', 'Successful'),
(50, 3, 1800.00, '2025-10-28 03:21:00', 'Credit Card', 'txn_0003', 'Successful');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `section_id`, `description`) VALUES
(1, 'Superadmin', 1, 'Full authority over system, manages admins, staff, and resources.'),
(2, 'Admin', 1, 'Manages staff and resources, but limited admin privileges.'),
(3, 'Pilot - Captain', 2, 'Overall authority, decision-making, and safe operation of flight.'),
(4, 'Co-Pilot - First Officer', 2, 'Assists captain in flying, navigation, and communication.'),
(5, 'Relief Pilot - Second Officer', 2, 'Take over during long-haul flights to allow main pilots to rest.'),
(6, 'Purser', 3, 'Leads cabin crew, manages service and safety procedures.'),
(7, 'Flight Attendant', 3, 'Serve food/drinks, assist passengers, handle emergencies.'),
(8, 'Ground Handler', 4, 'Load and unload luggage/cargo.'),
(9, 'Marshaler', 4, 'Guide aircraft during parking and pushback.'),
(10, 'Pushback Operator', 4, 'Move aircraft from gate using tow vehicle.'),
(11, 'Fueling Crew', 4, 'Refuel aircraft safely.'),
(12, 'Catering Crew', 4, 'Load meals and beverages.'),
(13, 'Cleaning Crew', 4, 'Clean cabin and prepare it for passengers.'),
(14, 'Aircraft Maintenance Technician', 5, 'Perform pre/post-flight checks, fix technical issues.'),
(15, 'Avionics Technician', 5, 'Maintain and repair electronic systems/instruments.'),
(16, 'Air Traffic Controller', 6, 'Guide aircraft during takeoff, en-route, and landing.'),
(17, 'Flight Dispatcher', 6, 'Plan flight paths, fuel loads, and weather monitoring.'),
(18, 'Load Controller', 6, 'Ensure safe distribution of passengers, luggage, and cargo.'),
(19, 'Traffic Inspector', 6, 'Monitor ramp and ground operations for safety, enforce rules and procedures.'),
(20, 'Ground Operations Supervisor', 6, 'Supervise all ground operations, coordinate staff, and manage workflow on the ramp.'),
(21, 'Check-in Agent', 7, 'Assist passengers with check-in, baggage tagging, and boarding procedures.'),
(22, 'Ticketing Agent', 7, 'Handle ticket sales, reservations, refunds, and passenger inquiries.'),
(23, 'Gate Agent', 7, 'Manage boarding, announcements, and gate changes.'),
(24, 'Security Personnel', 7, 'Screen passengers and baggage for safety.'),
(25, 'Customs Officer', 7, 'Inspect travel documents, manage border control.'),
(26, 'Immigration Officer', 7, 'Responsible for immigration control and checking travel documents.');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`) VALUES
(1, 'IT staff'),
(2, 'Cockpit Crew'),
(3, 'Cabin Crew'),
(4, 'Ramp/Apron Crew'),
(5, 'Technical Crew'),
(6, 'Traffic/Operational Crew'),
(7, 'Airport & Support Staff');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `nric` varchar(12) NOT NULL,
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
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `section_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `nric`, `name`, `image`, `gender`, `race`, `address`, `state`, `nationality`, `email`, `password`, `phoneNo`, `status`, `section_id`, `role_id`) VALUES
(1, '850203072345', 'Shukri Yahaya', 'image/ShukriYahaya.png', 'Male', 'Malay', 'No. 23, Jalan SS7/5, Taman Subang Jaya, 47500 Petaling Jaya, Selangor', 'Selangor', 'Malaysia', 'shukriyahaya@gmail.com', '$2y$10$UDwZoBCbZDuJhNhB5q96XOrkvw1M242DC84IpZ2mpbsPU6GVdlnGO', '01127469381', 'Active', 2, 3),
(2, '870412084562', 'Sharnaaz Ahmad', 'image/SharnaazAhmad.png', 'Male', 'Malay', 'No. 15, Jalan Ampang, Taman Desa Pandan, 55000 Kuala Lumpur', 'Kuala Lumpur', 'Malaysia', 'sharnaazahmad@gmail.com', '$2y$10$P6d4weKWI.9sWTLdCR6w6uSQHdncbqJkQ55sbCDbBUQd9b2gZDK8K', '01269487352', 'Active', 2, 4),
(3, '950728106437', 'Liyana Amelia', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 48, Jalan Burma, Taman Mutiara, 10450 Georgetown, Penang', 'Penang', 'Malaysia', 'liyanaamelia@gmail.com', 'abc123', '01984321657', 'Active', 2, 5),
(4, '981115025486', 'Aina Mariam', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 32, Jalan Permas Jaya 3, Taman Permas Jaya, 81750 Johor Bahru, Johor', 'Johor', 'Malaysia', 'ainamariam@gmail.com', 'abc123', '01756234980', 'Active', 3, 6),
(5, '881221145793', 'Siti Aisyah', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 11, Jalan Gaya, Taman Signal Hill, 88000 Kota Kinabalu, Sabah', 'Sabah', 'Malaysia', 'sitiaisyah@gmail.com', 'abc123', '01483756291', 'Active', 3, 7),
(6, '920908045126', 'Rachel Lim', 'image/defaultprofilepic.png', 'Female', 'Chinese', 'No. 28, Lorong Tabuan Jaya 6, Taman Tabuan Jaya, 93350 Kuching, Sarawak', 'Sarawak', 'Malaysia', 'rachellim@gmail.com', 'abc123', '01391245737', 'Active', 3, 7),
(7, '890320095421', 'Faizal Ahmad', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 56, Jalan Bukit Tinggi 2/1, Taman Klang Jaya, 41200 Klang, Selangor', 'Selangor', 'Malaysia', 'faizalahmad@gmail.com', 'abc123', '01627849562', 'Active', 4, 8),
(8, '970705105986', 'Darren Tan', 'image/defaultprofilepic.png', 'Male', 'Chinese', 'No. 21, Jalan Sultanah, Taman Sejati, 05100 Alor Setar, Kedah', 'Kedah', 'Malaysia', 'darrentan@gmail.com', 'abc123', '01894372157', 'Active', 4, 9),
(9, '881024085376', 'Ravi Kumar', 'image/defaultprofilepic.png', 'Male', 'Indian', 'No. 36, Jalan Seremban 2/3, Taman Bukit Chedang, 70300 Seremban, Negeri Sembilan', 'Negeri Sembilan', 'Malaysia', 'ravikumar@gmail.com', 'abc123', '01736598242', 'Active', 4, 10),
(10, '990618085924', 'Hafiz Hakim', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 44, Jalan Putra Perdana 5/2, Taman Putra Perdana, 47100 Puchong, Selangor', 'Selangor', 'Malaysia', 'hafizhakim@gmail.com', 'abc123', '01269814736', 'Active', 4, 11),
(11, '930922105731', 'Irfan Zulkifli', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 19, Jalan Klebang Restu 6, Taman Klebang Restu, 31200 Chemor, Perak', 'Perak', 'Malaysia', 'irfanzulkifli@gmail.com', 'abc123', '01957246381', 'Active', 4, 11),
(12, '970406085962', 'Aiman Faris', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 30, Jalan Tebrau, Taman Johor Jaya, 81100 Johor Bahru, Johor', 'Johor', 'Malaysia', 'aimanfaris@gmail.com', 'abc123', '01384529618', 'Active', 4, 11),
(13, '960711125834', 'Nora Syafiqah', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 7, Jalan Sungai Dua, Taman Pekaka, 11700 Gelugor, Penang', 'Penang', 'Malaysia', 'norasf@gmail.com', 'abc123', '01498237655', 'Active', 4, 12),
(14, '941230045172', 'Farah Nadia', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 8, Jalan Tun Fatimah, Taman Merdeka, 75350 Melaka', 'Melaka', 'Malaysia', 'farahnadia@gmail.com', 'abc123', '01683472592', 'Active', 4, 12),
(15, '880516105439', 'Lina Chen', 'image/defaultprofilepic.png', 'Female', 'Chinese', 'No. 5, Jalan Kangar Jaya 2, Taman Sena Indah, 01000 Kangar, Perlis', 'Perlis', 'Malaysia', 'linachen@gmail.com', 'abc123', '01927836451', 'Active', 4, 12),
(16, '981229076514', 'Hassan Ali', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 14, Jalan Tuaran Bypass, Taman Bukit Padang, 88300 Kota Kinabalu, Sabah', 'Sabah', 'Malaysia', 'hassanal@gmail.com', 'abc123', '01892736486', 'Active', 4, 13),
(17, '970108095836', 'Joko Prasetyo', 'image/defaultprofilepic.png', 'Male', 'Javanese', 'No. 6, Jalan Sungai Kapuas, Taman Mahkota, 70100 Pontianak, Kalimantan', 'Kalimantan', 'Indonesia', 'jokoprasetyo@gmail.com', 'abc123', '01769435282', 'Active', 4, 13),
(18, '990715055293', 'Rizal Azlan', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 33, Jalan Austin Heights 8/3, Taman Mount Austin, 81100 Johor Bahru, Johor', 'Johor', 'Malaysia', 'rizalazlan@gmail.com', 'abc123', '01396847254', 'Active', 4, 13),
(19, '890831095472', 'Azman Hadi', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 22, Jalan SS17/2, Taman Subang Utama, 47500 Subang Jaya, Selangor', 'Selangor', 'Malaysia', 'azmanhadi@gmail.com', 'abc123', '01638249572', 'Active', 5, 14),
(20, '951211045762', 'Zulkifli Rahman', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 17, Jalan Green Road, Taman BDC, 93250 Kuching, Sarawak', 'Sarawak', 'Malaysia', 'zulkifli@gmail.com', 'abc123', '01964873521', 'Active', 5, 15),
(21, '921017075631', 'Rahim Ismail', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 10, Jalan Damai, Taman Grace Ville, 88990 Kota Kinabalu, Sabah', 'Sabah', 'Malaysia', 'rahimismail@gmail.com', 'abc123', '01257893462', 'Active', 5, 15),
(22, '850502085497', 'Elaine Wong', 'image/defaultprofilepic.png', 'Female', 'Chinese', 'No. 3, Jalan Tun Razak, Taman Maluri, 50400 Kuala Lumpur', 'Kuala Lumpur', 'Malaysia', 'elainewong@gmail.com', 'abc123', '01478652935', 'Active', 6, 16),
(23, '870823066154', 'Naufal Hakim', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 40, Jalan Impian Emas 5, Taman Impian Emas, 81300 Skudai, Johor', 'Johor', 'Malaysia', 'naufalhakim@gmail.com', 'abc123', '01789326452', 'Active', 6, 17),
(24, '950207076935', 'Jasmine Devi', 'image/defaultprofilepic.png', 'Female', 'Indian', 'No. 27, Jalan Sungai Pinang, Taman Jelutong, 11600 Georgetown, Penang', 'Penang', 'Malaysia', 'jasminedevi@gmail.com', 'abc123', '01896734583', 'Active', 6, 18),
(25, '880330095274', 'Hakim Yusuf', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 9, Jalan Bukit Tinggi 3A, Taman Sentosa, 41200 Klang, Selangor', 'Selangor', 'Malaysia', 'hakimyusuf@gmail.com', 'abc123', '01923847562', 'Active', 6, 19),
(26, '820417086241', 'Aaron Lim', 'image/defaultprofilepic.png', 'Male', 'Chinese', 'No. 21, Taman Hougang 530100', 'Singapore', 'Singapore', 'aaronlim@gmail.com', 'abc123', '01269378460', 'Active', 6, 20),
(27, '900729105483', 'Syafiq Rahman', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 18, Taman Desa Pandan 55100', 'Kuala Lumpur', 'Malaysia', 'syafiqrahman@gmail.com', 'abc123', '01378495261', 'Active', 6, 20),
(28, '920115045238', 'Mira Izzati', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 7, Taman Bukit Beruang 75450', 'Melaka', 'Malaysia', 'mirai@gmail.com', 'abc123', '01698723452', 'Active', 7, 21),
(29, '910223085167', 'Samantha Lee', 'image/defaultprofilepic.png', 'Female', 'Chinese', 'No. 23, Taman Bayan Lepas 11900', 'Penang', 'Malaysia', 'samanthalee@gmail.com', 'abc123', '01724598631', 'Active', 7, 22),
(30, '890903095284', 'Putri Hidayah', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 16, Taman Bukit Subang 40150', 'Selangor', 'Malaysia', 'putrihidayah@gmail.com', 'abc123', '01839476513', 'Active', 7, 22),
(31, '880619045293', 'Fikri Azman', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 19, Taman Johor Jaya 81100', 'Johor', 'Malaysia', 'fikriazman@gmail.com', 'abc123', '01982347562', 'Active', 7, 23),
(32, '921002095187', 'Hannah Lim', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 28, Taman Wangsa Maju 53300', 'Kuala Lumpur', 'Malaysia', 'hannahlim@gmail.com', 'abc123', '01397524681', 'Active', 7, 23),
(33, '900324045267', 'Idris Kamal', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 12, Taman Likas Jaya 88300', 'Sabah', 'Malaysia', 'idriskamal@gmail.com', 'abc123', '01469827544', 'Active', 7, 23),
(34, '870708095416', 'Leila Sofia', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 10, Taman Ipoh Garden 31400', 'Perak', 'Malaysia', 'leilasofia@gmail.com', 'abc123', '01823459761', 'Active', 7, 24),
(35, '830211075928', 'Karim Iskandar', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 3, Taman Wakaf Che Yeh 15150', 'Kelantan', 'Malaysia', 'karimiskandar@gmail.com', 'abc123', '01786423951', 'Active', 7, 24),
(36, '810916095764', 'Huda Farhana', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 5, Kampung Sungai Liang KB1531', 'Brunei', 'Brunei', 'hudafarhana@gmail.com', 'abc123', '01976482346', 'Active', 7, 24),
(37, '900118065247', 'Zara Putri', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 8, Taman Georgetown 10200', 'Penang', 'Malaysia', 'zaraputri@gmail.com', 'abc123', '01348297616', 'Active', 7, 25),
(38, '880701085924', 'Ahmad Fikri', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 11, Taman Shah Alam 40000', 'Selangor', 'Malaysia', 'ahmadfikri@gmail.com', 'abc123', '01497286341', 'Active', 7, 26),
(39, '920912065378', 'Farid Syah', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 9, Taman Johor Bahru 80300', 'Johor', 'Malaysia', 'faridsyah@gmail.com', 'abc123', '01983647216', 'Active', 7, 26),
(40, '960101085001', 'Adam Firdaus', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 1 Taman Damai', 'Selangor', 'Malaysia', 'adamfirdaus@gmail.com', 'abc123', '0123456789', 'Active', 4, 11),
(41, '960101085002', 'Aisyah Nabila', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 2 Taman Damai', 'Selangor', 'Malaysia', 'aisyahnabila@gmail.com', 'abc123', '0134762910', 'Active', 4, 12),
(42, '960101085003', 'Daniel Akmal', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 3 Taman Damai', 'Selangor', 'Malaysia', 'danielakmal@gmail.com', 'abc123', '0145827361', 'Active', 4, 11),
(43, '960101085004', 'Nurin Alya', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 4 Taman Damai', 'Selangor', 'Malaysia', 'nurinalya@gmail.com', 'abc123', '0156938472', 'Active', 4, 12),
(44, '960101085005', 'Izzat Hakimi', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 5 Taman Damai', 'Selangor', 'Malaysia', 'izzathakimi@gmail.com', 'abc123', '0167483920', 'Active', 5, 14),
(45, '960101085006', 'Syazana Amirah', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 6 Taman Damai', 'Selangor', 'Malaysia', 'syazanaamirah@gmail.com', 'abc123', '0178592031', 'Active', 5, 15),
(46, '960101085007', 'Arif Danish', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 7 Taman Damai', 'Selangor', 'Malaysia', 'arifdanish@gmail.com', 'abc123', '0189203845', 'Active', 6, 17),
(47, '960101085008', 'Sofia Irdina', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No. 8 Taman Damai', 'Selangor', 'Malaysia', 'sofiairdina@gmail.com', 'abc123', '0191039482', 'Active', 6, 18),
(48, '960101085009', 'Haziq Luqman', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No. 9 Taman Damai', 'Selangor', 'Malaysia', 'haziqluqman@gmail.com', 'abc123', '0112345768', 'Active', 7, 23),
(49, '960101085010', 'Amirah Zulaikha', 'image/defaultprofilepic.png', 'Female', 'Malay', 'No.10 Taman Damai', 'Selangor', 'Malaysia', 'amirahzulaikha@gmail.com', 'abc123', '0123456723', 'Active', 7, 24),
(50, '960101085011', 'Rizwan Ashraf', 'image/defaultprofilepic.png', 'Male', 'Malay', 'No.11 Taman Damai', 'Selangor', 'Malaysia', 'rizwanashraf@gmail.com', 'abc123', '0134671829', 'Active', 7, 26);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `nric` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `race` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar(12) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `section_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `nric`, `name`, `image`, `gender`, `race`, `address`, `state`, `nationality`, `email`, `password`, `phoneNo`, `status`, `section_id`, `role_id`) VALUES
(1, '910305145522', 'Zayn Malik', 'image/Zayn.png', 'Male', 'Malay', 'No. 45, Jalan BK 5/3, Bandar Kinrara, 47180 Puchong, Selangor', 'Selangor', 'Malaysia', 'zayn@gmail.com', '$2y$10$TkQ9BX35dD49rae3vsMML.zscXHK8LZLh6TeeU443NDYiJx1.EXha', '01199564231', 'Active', 1, 1),
(2, '870928075611', 'Jordan', 'image/defaultprofilepic.png', 'Male', 'Chinese', 'No. 21, Lorong Permai 4, 11200 Tanjung Bungah, Pulau Pinang', 'Penang', 'Malaysia', 'jordan@gmail.com', '$2y$10$8LgKePMtAaAgDG5MlRoi/eX1ERHUhsVuz5GIE3Vmr2VlL/B1RGvjC', '01221665432', 'Active', 1, 1),
(3, '920110105877', 'Michael', 'image/defaultprofilepic.png', 'Male', 'Indian', 'No. 9, Jalan Jelatek 2, 54200 Kuala Lumpur', 'Kuala Lumpur', 'Malaysia', 'michael@gmail.com', 'abc123', '01312889977', 'Active', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'John Doe', 'john@gmail.com', '123456'),
(2, 'Sarah Lee', 'sarah@gmail.com', 'pass123'),
(3, 'Michael Tan', 'mike@yahoo.com', 'mike2025'),
(4, 'Jane Smith', 'jane@outlook.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `role_id` (`role_id`);

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
-- Indexes for table `boarding_pass`
--
ALTER TABLE `boarding_pass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_seat_per_flight` (`flight_id`,`seat`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `flight_number` (`flight_number`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `flight_staff`
--
ALTER TABLE `flight_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_member_customer` (`customer_id`);

--
-- Indexes for table `old_flight`
--
ALTER TABLE `old_flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNo` (`phoneNo`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `aircraft`
--
ALTER TABLE `aircraft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `boarding_pass`
--
ALTER TABLE `boarding_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `flight_staff`
--
ALTER TABLE `flight_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `old_flight`
--
ALTER TABLE `old_flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `flight_staff`
--
ALTER TABLE `flight_staff`
  ADD CONSTRAINT `flight_staff_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `old_flight` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flight_staff_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD CONSTRAINT `superadmin_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `superadmin_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
