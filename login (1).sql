-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 09:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
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
('kevin', '2024-04-10 10:55:49');

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
-- Table structure for table `plumbingdb`
--

CREATE TABLE `plumbingdb` (
  `FirstName` varchar(200) NOT NULL,
  `RoomNo` varchar(200) NOT NULL,
  `Issue` varchar(200) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plumbingdb`
--

INSERT INTO `plumbingdb` (`FirstName`, `RoomNo`, `Issue`, `Date`) VALUES
('Brian', 'C10', 'kkmkkm', '0000-00-00'),
('Brian', 'C2', 'NBNN', '0000-00-00'),
('Vincent', 'C20', 'Water is Leaking', '0000-00-00'),
('Vincent', 'C3', 'Water is leaking in the below Sink', '2024-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `Detail` varchar(200) NOT NULL,
  `Admin` varchar(200) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riversidebookings`
--

CREATE TABLE `riversidebookings` (
  `No` int(11) NOT NULL,
  `First Name` varchar(200) NOT NULL,
  `Last Name` varchar(200) NOT NULL,
  `Gender` varchar(200) NOT NULL,
  `NumberPaid` int(200) NOT NULL,
  `TransactionID` varchar(200) NOT NULL,
  `AmountPaid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenantaccount`
--

CREATE TABLE `tenantaccount` (
  `RoomNo` varchar(4) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `PhoneNumber` int(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `University` varchar(200) NOT NULL,
  `Checkin` date NOT NULL,
  `D-O-B` date NOT NULL,
  `MonthBalance` varchar(10000) NOT NULL DEFAULT '10,000 ',
  `Gender` varchar(200) NOT NULL,
  `FatherName` varchar(200) NOT NULL,
  `FatherNumber` varchar(200) NOT NULL,
  `Disease` varchar(200) DEFAULT NULL,
  `Doctor` varchar(200) DEFAULT NULL,
  `BloodGroup` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenantaccount`
--

INSERT INTO `tenantaccount` (`RoomNo`, `FirstName`, `LastName`, `PhoneNumber`, `Username`, `Password`, `University`, `Checkin`, `D-O-B`, `MonthBalance`, `Gender`, `FatherName`, `FatherNumber`, `Disease`, `Doctor`, `BloodGroup`, `Email`) VALUES
('C11', 'Kevin', 'Kirui', 2147483647, 'kiruikev', 'Kiprono04', 'Kapkatet Univerity', '2024-04-06', '2004-01-06', '10,000 ', 'Male', 'Robert Kipkirui Mutai', '254722540699', '', 'Vincent Ochieng', 'O+', 'Kiruikev99@gmail.com'),
('c56', 'Mark', 'Jop', 54354, 'Dex', 'Dexter', 'Kabianga Univerity', '2024-04-26', '2024-04-10', '10,000 ', 'Male', 'Kevin Kirui', '455435', 'Malaria', '', 'g', 'kiruikev99@gmail.com');

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
-- Indexes for table `tenantaccount`
--
ALTER TABLE `tenantaccount`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `loginform`
--
ALTER TABLE `loginform`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `riversidebookings`
--
ALTER TABLE `riversidebookings`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
