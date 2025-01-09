-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 08:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riversidedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminloginrecords`
--

CREATE TABLE `adminloginrecords` (
  `AdminName` varchar(11) NOT NULL,
  `RecordTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminloginrecords`
--

INSERT INTO `adminloginrecords` (`AdminName`, `RecordTime`) VALUES
('kevin', '2024-01-23 08:08:13'),
('kevin', '2024-01-22 22:53:29'),
('kevin', '2024-01-22 22:02:55'),
('kevin', '2024-01-23 10:56:34'),
('kevin', '2024-01-23 12:59:02'),
('kevin', '2024-01-25 08:38:55'),
('kevin', '2024-02-05 05:55:38'),
('kevin', '2024-02-05 09:13:02'),
('franco', '2024-02-13 07:52:50'),
('franco', '2024-02-13 07:57:36'),
('franco', '2024-02-13 10:00:40'),
('franco', '2024-02-15 05:47:39'),
('franco', '2024-02-21 06:57:33'),
('franco', '2024-02-21 17:04:00'),
('franco', '2024-02-21 17:07:43'),
('franco', '2024-02-22 08:20:49'),
('franco', '2024-02-22 10:38:12'),
('franco', '2024-02-22 13:05:21'),
('franco', '2024-02-22 13:06:09'),
('franco', '2024-02-22 14:43:35'),
('franco', '2024-02-22 15:21:02'),
('franco', '2024-02-22 15:21:03'),
('franco', '2024-02-22 16:21:04'),
('franco', '2024-02-22 16:34:14'),
('franco', '2024-02-23 05:23:41'),
('franco', '2024-02-25 18:23:50'),
('franco', '2024-02-25 18:27:29'),
('franco', '2024-02-25 18:27:30'),
('franco', '2024-02-25 20:30:22'),
('franco', '2024-02-25 20:59:09'),
('franco', '2024-02-26 05:34:06'),
('kevin', '2024-02-29 08:52:19'),
('kevin', '2024-02-29 08:52:19'),
('kevin', '2024-03-12 07:36:03'),
('franco', '2024-03-27 07:44:56'),
('franco', '2024-03-30 08:39:09'),
('kevin', '2024-03-30 14:01:11'),
('kevin', '2024-03-31 18:26:30'),
('kevin', '2024-04-01 13:21:05'),
('kevin', '2024-04-05 16:24:41'),
('kevin', '2024-04-05 17:18:48'),
('kevin', '2024-04-06 15:40:43'),
('kevin', '2024-04-06 17:14:12'),
('kevin', '2024-04-06 17:14:12'),
('kevin', '2024-04-06 17:14:12'),
('kevin', '2024-04-06 17:14:12'),
('kevin', '2024-04-06 17:14:12'),
('kevin', '2024-04-06 17:14:12'),
('kevin', '2024-04-06 17:14:12'),
('kevin', '2024-04-09 08:04:31'),
('kevin', '2024-04-10 10:55:49'),
('kevin', '2024-05-14 18:41:57'),
('franco', '2024-06-05 17:06:50'),
('franco', '2024-06-18 16:46:14'),
('franco', '2024-07-01 17:40:01'),
('franco', '2024-07-02 11:14:16'),
('franco', '2024-07-02 11:23:22'),
('franco', '2024-07-02 11:41:10'),
('franco', '2024-07-02 12:27:37'),
('franco', '2024-07-03 12:24:24'),
('franco', '2024-07-03 15:47:27'),
('franco', '2024-07-04 05:21:08'),
('franco', '2024-07-04 06:46:41'),
('franco', '2024-07-06 11:30:19'),
('franco', '2024-07-06 11:54:55'),
('franco', '2024-07-06 11:59:18'),
('franco', '2024-07-06 12:00:00'),
('franco', '2024-07-06 12:01:30'),
('franco', '2024-07-06 12:01:40'),
('franco', '2024-07-06 12:04:12'),
('franco', '2024-07-06 12:19:48'),
('franco', '2024-07-06 12:24:07'),
('franco', '2024-07-06 12:24:16'),
('franco', '2024-07-06 12:24:51'),
('franco', '2024-07-06 12:31:08'),
('franco', '2024-07-06 12:31:28'),
('franco', '2024-07-06 12:31:39'),
('franco', '2024-07-06 12:31:54'),
('franco', '2024-07-06 12:34:32'),
('franco', '2024-07-07 16:17:29'),
('franco', '2024-07-08 09:41:30'),
('franco', '2024-07-09 07:15:31'),
('franco', '2024-07-11 16:58:33'),
('franco', '2024-07-11 18:38:39'),
('franco', '2024-07-12 07:33:38'),
('kevin', '2024-07-14 16:45:31'),
('kevin', '2024-07-14 16:59:05'),
('kevin', '2024-07-14 17:06:40'),
('kevin', '2024-07-16 16:51:02'),
('franco', '2024-07-18 11:49:23'),
('franco', '2024-07-18 12:25:57'),
('kevin', '2024-07-18 13:56:54'),
('kevin', '2024-07-18 13:59:33'),
('kevin', '2024-07-19 06:53:13'),
('kevin', '2024-07-19 11:08:35'),
('kevin', '2024-07-19 18:16:29'),
('kevin', '2024-07-19 18:17:04'),
('kevin', '2024-07-19 18:20:50'),
('kevin', '2024-07-19 18:21:26'),
('kevin', '2024-07-19 18:21:44'),
('kevin', '2024-07-22 09:17:46'),
('kevin', '2024-07-24 16:57:05'),
('kevin', '2024-07-25 11:00:24'),
('kevin', '2024-07-27 19:00:51'),
('kevin', '2024-07-28 15:44:27'),
('kevin', '2024-07-30 09:39:03'),
('franco', '2024-08-05 20:12:17'),
('franco', '2024-08-05 20:35:14'),
('franco', '2024-08-05 20:35:31'),
('franco', '2024-08-06 16:51:21'),
('franco', '2024-08-06 17:59:37'),
('franco', '2024-08-07 06:01:38'),
('franco', '2024-08-07 06:03:02'),
('franco', '2024-08-07 06:14:30'),
('franco', '2024-08-08 15:14:42'),
('franco', '2024-08-08 15:20:30'),
('franco', '2024-08-08 17:58:54'),
('franco', '2024-08-08 21:33:14'),
('franco', '2024-08-09 08:47:41'),
('franco', '2024-08-09 08:50:15'),
('franco', '2024-08-09 09:49:55'),
('franco', '2024-08-09 13:02:53'),
('franco', '2024-08-09 13:16:50'),
('franco', '2024-08-09 14:17:35'),
('franco', '2024-08-09 14:17:40'),
('kevin', '2024-08-09 14:17:48'),
('kevin', '2024-08-09 14:17:53'),
('franco', '2024-08-09 14:18:05'),
('kevin', '2024-08-09 14:18:36'),
('franco', '2024-08-09 14:19:23'),
('franco', '2024-08-09 14:22:27'),
('kevin', '2024-09-02 17:07:41'),
('kevin', '2024-09-02 17:14:04'),
('kevin', '2024-09-05 21:04:23'),
('kevin', '2024-09-05 21:06:57'),
('kevin', '2024-09-17 09:53:04'),
('kevin', '2024-09-17 15:51:15'),
('kevin', '2024-09-18 17:22:37'),
('kevin', '2024-09-18 18:48:48'),
('kevin', '2024-09-19 08:26:09'),
('kevin', '2024-09-26 05:11:48'),
('kevin', '2024-10-02 09:10:10'),
('kevin', '2024-10-02 17:13:22'),
('kevin', '2024-10-02 17:20:43'),
('kevin', '2024-10-10 06:47:19'),
('kevin', '2024-10-10 07:19:11'),
('kevin', '2024-10-10 08:37:08'),
('kevin', '2024-10-25 16:17:23'),
('kevin', '2024-10-30 16:45:14'),
('kevin', '2024-11-01 17:48:36'),
('kevin', '2024-11-02 08:02:29'),
('kevin', '2024-11-02 08:12:06'),
('kevin', '2024-12-08 01:05:40'),
('kevin', '2024-12-14 18:03:38'),
('kevin', '2024-12-19 22:28:15'),
('kevin', '2024-12-21 10:53:01'),
('franco', '2025-01-03 08:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `blockabooking`
--

CREATE TABLE `blockabooking` (
  `RoomNo` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'Available',
  `Name` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `StudentPhoneNumber` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `NumberPaid` varchar(100) NOT NULL,
  `TransactionId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blockabooking`
--

INSERT INTO `blockabooking` (`RoomNo`, `Status`, `Name`, `LastName`, `StudentPhoneNumber`, `Gender`, `University`, `NumberPaid`, `TransactionId`) VALUES
('A1', 'Available', '', '', '', '', '', '', ''),
('A10', 'Booked', 'Eliud', 'Kamau', '254706048399', 'Male', 'Kapkatet University', '', 'SLK68G33E2'),
('A2', 'Available', '', '', '', '', '', '', ''),
('A4', 'Available', '', '', '', '', '', '', ''),
('A5', 'Available', '', '', '', '', '', '', ''),
('A6', 'Available', '', '', '', '', '', '', ''),
('A7', 'Available', '', '', '', '', '', '', ''),
('A8', 'Available', '', '', '', '', '', '', ''),
('A9', 'Available', '', '', '', '', '', '', ''),
('B1', 'Booked', 'Michelle', 'Cherono', '254743928989', 'Male', 'Kabianga University', '254743928989', 'SLK44U2WII'),
('B10', 'Available', '', '', '', '', '', '', ''),
('B2', 'Booked', 'Brian', 'Kirui', '254743928989', 'Male', 'Kabianga University', '254743928989', 'SLK84UAOG4'),
('B3', 'Booked', 'Kevin', 'Kirui', '254743928989', 'Male', 'Kabianga University', '254743928989', 'SLK24UI14K'),
('B4', 'Booked', 'Kevin', 'Kirui', '254743928989', 'Male', 'Kabianga University', '254743928989', 'SLK48VROJ0'),
('B5', 'Available', '', '', '', '', '', '', ''),
('B6', 'Available', '', '', '', '', '', '', ''),
('B7', 'Available', '', '', '', '', '', '', ''),
('B8', 'Available', '', '', '', '', '', '', ''),
('C1', 'Booked', 'Ester', 'Cherono', '254743928989', 'Female', 'Kapkatet University', '254743928989', 'SLK14V2RAR'),
('C10', 'Available', '', '', '', '', '', '', ''),
('C2', 'Available', '', '', '', '', '', '', ''),
('C3', 'Booked', 'Kevin', 'Kirui', '254743928989', 'Male', 'Kabianga University', '254727100518', 'SLL8A9X2KE'),
('C4', 'Available', '', '', '', '', '', '', ''),
('C5', 'Available', '', '', '', '', '', '', ''),
('C6', 'Available', '', '', '', '', '', '', ''),
('C7', 'Available', '', '', '', '', '', '', ''),
('C8', 'Available', '', '', '', '', '', '', ''),
('C9', 'Available', '', '', '', '', '', '', ''),
('D1', 'Available', '', '', '', '', '', '', ''),
('D10', 'Available', '', '', '', '', '', '', ''),
('D2', 'Available', '', '', '', '', '', '', ''),
('D3', 'Available', '', '', '', '', '', '', ''),
('D4', 'Available', '', '', '', '', '', '', ''),
('D5', 'Available', '', '', '', '', '', '', ''),
('D6', 'Available', '', '', '', '', '', '', ''),
('D7', 'Available', '', '', '', '', '', '', ''),
('D8', 'Available', '', '', '', '', '', '', ''),
('D9', 'Available', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blockbbooking`
--

CREATE TABLE `blockbbooking` (
  `RoomNo` varchar(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'Available',
  `LastName` varchar(100) NOT NULL,
  `StudentPhoneNumber` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `NumberPaid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blockbbooking`
--

INSERT INTO `blockbbooking` (`RoomNo`, `Name`, `Status`, `LastName`, `StudentPhoneNumber`, `Gender`, `University`, `NumberPaid`) VALUES
('B1', '', 'Available', '', '', '', '', ''),
('B2', '', 'Available', '', '', '', '', ''),
('B3', '', 'Available', '', '', '', '', ''),
('B4', '', 'Available', '', '', '', '', ''),
('B4', '', 'Available', '', '', '', '', ''),
('B5', '', 'Available', '', '', '', '', ''),
('B6', '', 'Available', '', '', '', '', ''),
('B7', '', 'Available', '', '', '', '', ''),
('B8', '', 'Available', '', '', '', '', ''),
('B9', '', 'Available', '', '', '', '', ''),
('B10', '', 'Available', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blockcbooking`
--

CREATE TABLE `blockcbooking` (
  `RoomNo` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'Available',
  `Name` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `StudentPhoneNumber` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `NumberPaid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blockcbooking`
--

INSERT INTO `blockcbooking` (`RoomNo`, `Status`, `Name`, `LastName`, `StudentPhoneNumber`, `Gender`, `University`, `NumberPaid`) VALUES
('C1', 'Booked', 'Victor', 'Ochieng', '254743928989', 'Male', 'Kabianga University', '0743928989'),
('C2', 'Available', '', '', '', '', '', ''),
('C3', 'Available', '', '', '', '', '', ''),
('C4', 'Available', '', '', '', '', '', ''),
('C5', 'Available', '', '', '', '', '', ''),
('C6', 'Available', '', '', '', '', '', ''),
('C7', 'Available', '', '', '', '', '', ''),
('C8', 'Available', '', '', '', '', '', ''),
('C9', 'Available', '', '', '', '', '', ''),
('C10', 'Available', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blockdbooking`
--

CREATE TABLE `blockdbooking` (
  `RoomNo` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'Available',
  `Name` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `StudentPhoneNumber` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `NumberPaid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blockdbooking`
--

INSERT INTO `blockdbooking` (`RoomNo`, `Status`, `Name`, `LastName`, `StudentPhoneNumber`, `Gender`, `University`, `NumberPaid`) VALUES
('D3', 'Available', '', '', '', '', '', ''),
('D4', 'booked', 'Raymnond', 'Mina', '254733466789', 'Male', 'Kabianga University', '0722540699'),
('D5', 'Available', '', '', '', '', '', ''),
('D6', 'Available', '', '', '', '', '', ''),
('D7', 'Available', '', '', '', '', '', ''),
('D8', 'Available', '', '', '', '', '', ''),
('D9', 'Available', '', '', '', '', '', ''),
('D10', 'Available', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `Name`, `Email`, `Message`) VALUES
(27, 'kevin', 'kevin@gmail.com', 'Hey');

-- --------------------------------------------------------

--
-- Table structure for table `electricdb`
--

CREATE TABLE `electricdb` (
  `RoomNo` varchar(200) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `Issue` varchar(200) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loginform`
--

CREATE TABLE `loginform` (
  `NO` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginform`
--

INSERT INTO `loginform` (`NO`, `Name`, `Username`, `Password`) VALUES
(1, 'Kevin Kirui', 'Kevin', 'admin'),
(2, 'Lemy', 'kevin', 'kiprono04'),
(3, 'Charles', 'Chales123', '$2y$10$DiEE4HXYCse90xuGa4/tReY'),
(4, 'Frank', 'franco', 'franco');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_transactions`
--

CREATE TABLE `mpesa_transactions` (
  `MerchantRequestID` varchar(100) NOT NULL,
  `CheckoutRequestID` varchar(100) NOT NULL,
  `ResultCode` varchar(100) NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `TransactionId` varchar(100) NOT NULL,
  `UserPhoneNumber` varchar(100) NOT NULL,
  `Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mpesa_transactions`
--

INSERT INTO `mpesa_transactions` (`MerchantRequestID`, `CheckoutRequestID`, `ResultCode`, `Amount`, `TransactionId`, `UserPhoneNumber`, `Date`) VALUES
('', 'ws_CO_19122024135234709743928989', '0', '1', 'SLJ02811S0', '254743928989', ''),
('Michelle', 'ws_CO_19122024164332017743928989', '0', '1', 'SLJ12XQLH7', '254743928989', ''),
('', 'ws_CO_19122024154204237743928989', '0', '1', 'SLJ22O8MX8', '254743928989', ''),
('', 'ws_CO_19122024134321804743928989', '0', '1', 'SLJ326LRZH', '254743928989', ''),
('', 'ws_CO_19122024150008272743928989', '0', '1', 'SLJ42I2NLS', '254743928989', ''),
('b54f-471d-93d9-f7f3bf3f7c0e522385', 'ws_CO_19122024194436194743928989', '0', '1', 'SLJ83WP9G8', '254743928989', 'Thursday 19th of December 2024 05:44:06 PM'),
('bbcd-4a89-bd1a-6ecdc639893b542150', 'ws_CO_20122024034451309743928989', '0', '1', 'SLK14V2RAR', '254743928989', 'Friday 20th of December 2024 01:41:06 AM'),
('b54f-471d-93d9-f7f3bf3f7c0e537314', 'ws_CO_20122024011958625743928989', '0', '1', 'SLK24TECP8', '254743928989', 'Thursday 19th of December 2024 11:16:13 PM'),
('bbcd-4a89-bd1a-6ecdc639893b539535', 'ws_CO_20122024024728585743928989', '0', '1', 'SLK24UI14K', '254743928989', 'Friday 20th of December 2024 12:42:54 AM'),
('b54f-471d-93d9-f7f3bf3f7c0e539374', 'ws_CO_20122024020905514743928989', '0', '1', 'SLK44U2WII', '254743928989', 'Friday 20th of December 2024 12:05:20 AM'),
('b54f-471d-93d9-f7f3bf3f7c0e590701', 'ws_CO_20122024214959094743928989', '0', '1', 'SLK48VROJ0', '254743928989', 'Friday 20th of December 2024 07:46:30 PM'),
('b54f-471d-93d9-f7f3bf3f7c0e586786', 'ws_CO_20122024201902266706048399', '0', '1', 'SLK68G33E2', '', 'Friday 20th of December 2024 06:14:37 PM'),
('1f39-4f4f-b9d9-6476d46b30ba71548', 'ws_CO_20122024221024431743928989', '0', '1', 'SLK78Y8EHB', '254743928989', 'Friday 20th of December 2024 08:05:52 PM'),
('8db8-42b1-b82f-13000588c937511064', 'ws_CO_20122024022912855743928989', '0', '1', 'SLK84UAOG4', '254743928989', 'Friday 20th of December 2024 12:24:40 AM'),
('aba0-4119-bd0a-28c60f0ef1ef994058', 'ws_CO_21122024110825941727100518', '0', '1', 'SLL8A9X2KE', '254727100518', 'Saturday 21st of December 2024 09:03:50 AM');

-- --------------------------------------------------------

--
-- Table structure for table `plumbingdb`
--

CREATE TABLE `plumbingdb` (
  `FirstName` varchar(200) NOT NULL,
  `RoomNo` varchar(200) NOT NULL,
  `Issue` varchar(200) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `Detail` varchar(200) NOT NULL,
  `Admin` varchar(200) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`Detail`, `Admin`, `Date`) VALUES
('Hello there!', 'kevin', '2024-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `riversidebookings`
--

CREATE TABLE `riversidebookings` (
  `No` int(11) NOT NULL,
  `First Name` varchar(200) NOT NULL,
  `Last Name` varchar(200) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Gender` varchar(200) NOT NULL,
  `NumberPaid` int(200) NOT NULL,
  `TransactionID` varchar(200) NOT NULL,
  `AmountPaid` int(200) NOT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riversidebookings`
--

INSERT INTO `riversidebookings` (`No`, `First Name`, `Last Name`, `Email`, `Gender`, `NumberPaid`, `TransactionID`, `AmountPaid`, `Date`) VALUES
(98, 'Robert', 'Mutai', 'rmutai@gmail.com', 'Male', 722540699, '', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenantaccountblocka`
--

CREATE TABLE `tenantaccountblocka` (
  `RoomNo` varchar(4) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `PhoneNumber` int(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `University` varchar(200) NOT NULL,
  `Checkin` date DEFAULT NULL,
  `D-O-B` date NOT NULL,
  `MonthBalance` varchar(10000) NOT NULL DEFAULT '3500 ',
  `RentStatus` varchar(100) NOT NULL,
  `Rent_Deadline_Date` varchar(100) NOT NULL,
  `Gender` varchar(200) NOT NULL,
  `FatherName` varchar(200) NOT NULL,
  `FatherNumber` varchar(200) NOT NULL,
  `Disease` varchar(200) DEFAULT NULL,
  `Doctor` varchar(200) DEFAULT NULL,
  `BloodGroup` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenantaccountblocka`
--

INSERT INTO `tenantaccountblocka` (`RoomNo`, `FirstName`, `LastName`, `PhoneNumber`, `Username`, `Password`, `University`, `Checkin`, `D-O-B`, `MonthBalance`, `RentStatus`, `Rent_Deadline_Date`, `Gender`, `FatherName`, `FatherNumber`, `Disease`, `Doctor`, `BloodGroup`, `Email`) VALUES
('B1', 'Michelle', 'Cherono', 2147483647, 'michelle_2003', '1234', 'Kabianga University', '2024-12-31', '2003-02-28', '3499', '', '2025-01-31', 'Male', 'Kevin Kirui', '0722540699', '', '', '', 'kiruikev99@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tenantaccountblockb`
--

CREATE TABLE `tenantaccountblockb` (
  `RoomNo` varchar(4) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `PhoneNumber` int(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `University` varchar(200) NOT NULL,
  `Checkin` date DEFAULT NULL,
  `D-O-B` date NOT NULL,
  `MonthBalance` varchar(10000) NOT NULL DEFAULT '3500 ',
  `Gender` varchar(200) NOT NULL,
  `FatherName` varchar(200) NOT NULL,
  `FatherNumber` varchar(200) NOT NULL,
  `Disease` varchar(200) DEFAULT NULL,
  `Doctor` varchar(200) DEFAULT NULL,
  `BloodGroup` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenantaccountblockc`
--

CREATE TABLE `tenantaccountblockc` (
  `RoomNo` varchar(4) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `PhoneNumber` int(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `University` varchar(200) NOT NULL,
  `Checkin` date DEFAULT NULL,
  `D-O-B` date NOT NULL,
  `MonthBalance` varchar(10000) NOT NULL DEFAULT '3500 ',
  `Gender` varchar(200) NOT NULL,
  `FatherName` varchar(200) NOT NULL,
  `FatherNumber` varchar(200) NOT NULL,
  `Disease` varchar(200) DEFAULT NULL,
  `Doctor` varchar(200) DEFAULT NULL,
  `BloodGroup` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenantaccountblockd`
--

CREATE TABLE `tenantaccountblockd` (
  `RoomNo` varchar(4) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `PhoneNumber` int(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `University` varchar(200) NOT NULL,
  `Checkin` date DEFAULT NULL,
  `D-O-B` date NOT NULL,
  `MonthBalance` varchar(10000) NOT NULL DEFAULT '3500 ',
  `Gender` varchar(200) NOT NULL,
  `FatherName` varchar(200) NOT NULL,
  `FatherNumber` varchar(200) NOT NULL,
  `Disease` varchar(200) DEFAULT NULL,
  `Doctor` varchar(200) DEFAULT NULL,
  `BloodGroup` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenantregister`
--

CREATE TABLE `tenantregister` (
  `RoomNo` varchar(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `University` varchar(200) NOT NULL,
  `Course` varchar(200) NOT NULL,
  `CheckIn` year(4) NOT NULL,
  `AmountPaid` bigint(200) NOT NULL,
  `TotalAmount` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenantregister`
--

INSERT INTO `tenantregister` (`RoomNo`, `Name`, `Username`, `Password`, `University`, `Course`, `CheckIn`, `AmountPaid`, `TotalAmount`) VALUES
('', '', '', '', '', '', '0000', 0, 0),
('B8', 'japhet', 'jkiptoo', '123', 'JKUAT', 'IT', '2020', 5000, 15000),
('c1', 'Kevin Kirui', 'kiruikev', 'kiprono04', 'Kabianga University', 'Mechanical Engineer', '2021', 9000, 15000),
('C12', 'Robert', 'rmutai', 'rmutai123', 'Kenyatta University', 'Electrical Enginnering', '2022', 5000, 15000),
('C2', 'Faith Maiko', 'maiko2002', 'maiko123', 'Kabianga University', 'Internantional Relation', '2022', 13900, 15000),
('C7', 'Victor Mwangi', 'Mwangi123', 'Mwangs123', 'Kapkatet University', 'Medicine', '2023', 12300, 15000),
('C9', 'Ian Mwangi', 'ian123', 'ian123', 'Kericho University', 'IT', '2022', 14700, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `ID` int(11) NOT NULL,
  `RoomNo` varchar(200) NOT NULL,
  `First Name` varchar(200) NOT NULL,
  `Last Name` varchar(200) NOT NULL,
  `University` int(200) NOT NULL,
  `Amount Paid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenanttransactions`
--

CREATE TABLE `tenanttransactions` (
  `RoomNo` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `NumberPaid` varchar(100) NOT NULL,
  `AmountPaid` varchar(100) NOT NULL,
  `Balance` varchar(100) NOT NULL,
  `TransactionId` varchar(100) DEFAULT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twobedaccount`
--

CREATE TABLE `twobedaccount` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `D-O-B` date NOT NULL,
  `PhoneNumber` int(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Check-in Date` date NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `FatherNumber` varchar(100) NOT NULL,
  `Disease` varchar(100) DEFAULT NULL,
  `BloodType` varchar(100) DEFAULT NULL,
  `Doctor` varchar(100) NOT NULL,
  `RoommateName` varchar(100) NOT NULL,
  `RoommateLname` varchar(100) NOT NULL,
  `RoommateD-O-B` date NOT NULL,
  `RoommatePhoneNumber` varchar(100) NOT NULL,
  `RoomateEmail` varchar(100) NOT NULL,
  `RoommateUniversity` varchar(100) NOT NULL,
  `RoommateCheck-in Date` varchar(100) NOT NULL,
  `RoommateFatherName` varchar(100) NOT NULL,
  `RoommateFatherNumber` varchar(100) NOT NULL,
  `RoomateDisease` varchar(100) DEFAULT NULL,
  `RoomateBloodType` varchar(100) DEFAULT NULL,
  `RoommateDoctor` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twobedroomhostel`
--

CREATE TABLE `twobedroomhostel` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(11) NOT NULL,
  `LastName` varchar(11) NOT NULL,
  `Gender` varchar(11) NOT NULL,
  `NumberPaid` int(11) NOT NULL,
  `Transaction_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twobedroomhostel`
--

INSERT INTO `twobedroomhostel` (`Id`, `FirstName`, `LastName`, `Gender`, `NumberPaid`, `Transaction_ID`) VALUES
(5, 'Victor', 'Bett', 'Male', 21212121, NULL),
(6, 'Kevin', 'Kirui', 'Male', 2147483647, NULL),
(7, 'William', 'Ochieng', 'Male', 2147483647, NULL),
(8, 'William', 'Ochieng', 'Male', 2147483647, NULL),
(9, 'William', 'Kirui', 'Male', 2147483647, NULL),
(10, 'Benjamin', 'Kirui', 'Male', 2147483647, NULL),
(11, 'Victor', 'Ochieng', 'Male', 2147483647, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `walldb`
--

CREATE TABLE `walldb` (
  `FirstName` varchar(200) NOT NULL,
  `RoomNo` varchar(200) NOT NULL,
  `Issue` varchar(200) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blockabooking`
--
ALTER TABLE `blockabooking`
  ADD UNIQUE KEY `RoomNo` (`RoomNo`),
  ADD KEY `TransactionId` (`TransactionId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `electricdb`
--
ALTER TABLE `electricdb`
  ADD PRIMARY KEY (`RoomNo`);

--
-- Indexes for table `loginform`
--
ALTER TABLE `loginform`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `mpesa_transactions`
--
ALTER TABLE `mpesa_transactions`
  ADD PRIMARY KEY (`TransactionId`);

--
-- Indexes for table `plumbingdb`
--
ALTER TABLE `plumbingdb`
  ADD PRIMARY KEY (`RoomNo`);

--
-- Indexes for table `riversidebookings`
--
ALTER TABLE `riversidebookings`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `tenantaccountblocka`
--
ALTER TABLE `tenantaccountblocka`
  ADD PRIMARY KEY (`RoomNo`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `tenantaccountblockd`
--
ALTER TABLE `tenantaccountblockd`
  ADD PRIMARY KEY (`RoomNo`);

--
-- Indexes for table `tenantregister`
--
ALTER TABLE `tenantregister`
  ADD PRIMARY KEY (`RoomNo`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `tenanttransactions`
--
ALTER TABLE `tenanttransactions`
  ADD KEY `RoomNo` (`RoomNo`);

--
-- Indexes for table `twobedaccount`
--
ALTER TABLE `twobedaccount`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `twobedroomhostel`
--
ALTER TABLE `twobedroomhostel`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `walldb`
--
ALTER TABLE `walldb`
  ADD PRIMARY KEY (`RoomNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `loginform`
--
ALTER TABLE `loginform`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `riversidebookings`
--
ALTER TABLE `riversidebookings`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twobedaccount`
--
ALTER TABLE `twobedaccount`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `twobedroomhostel`
--
ALTER TABLE `twobedroomhostel`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `electricdb`
--
ALTER TABLE `electricdb`
  ADD CONSTRAINT `electricdb_ibfk_1` FOREIGN KEY (`RoomNo`) REFERENCES `tenantaccountblockd` (`RoomNo`);

--
-- Constraints for table `plumbingdb`
--
ALTER TABLE `plumbingdb`
  ADD CONSTRAINT `plumbingdb_ibfk_1` FOREIGN KEY (`RoomNo`) REFERENCES `tenantaccountblockd` (`RoomNo`);

--
-- Constraints for table `tenanttransactions`
--
ALTER TABLE `tenanttransactions`
  ADD CONSTRAINT `tenanttransactions_ibfk_1` FOREIGN KEY (`RoomNo`) REFERENCES `tenantaccountblockd` (`RoomNo`);

--
-- Constraints for table `twobedaccount`
--
ALTER TABLE `twobedaccount`
  ADD CONSTRAINT `twobedaccount_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `twobedroomhostel` (`Id`);

--
-- Constraints for table `walldb`
--
ALTER TABLE `walldb`
  ADD CONSTRAINT `walldb_ibfk_1` FOREIGN KEY (`RoomNo`) REFERENCES `tenanttransactions` (`RoomNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `walldb_ibfk_2` FOREIGN KEY (`RoomNo`) REFERENCES `tenantaccountblockd` (`RoomNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
