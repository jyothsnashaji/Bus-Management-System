-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2019 at 11:26 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '1234', 'jyothsnashaji99@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(255) NOT NULL,
  `driver_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `driver_id`) VALUES
(101, 3),
(102, 0),
(103, 0),
(104, 0),
(105, 0),
(106, 0);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `licno` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `name`, `licno`, `age`, `password`, `email`) VALUES
(3, 'Arun', '887987', 50, '1234', 'arun@gmail.com'),
(4, 'Madhav', '8798686', 58, '1234', 'madhav@gmail.com'),
(5, 'Pavan', '786785', 45, '1234', 'pavan@gmail.com'),
(6, 'Sheela', '786875', 43, '1234', 'sheel@gmail.com'),
(7, 'Rahiba', '348729384', 46, '1234', 'rahi@gmail.com'),
(8, 'Kanaki', '247984', 53, '1234', 'kana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passenger_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stop` varchar(255) NOT NULL,
  `bus_id` int(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `name`, `category`, `stop`, `bus_id`, `dept`, `password`, `email`) VALUES
('12465456', 'Chitra', 'staff', 'Medical College', 0, 'ECE', '1234', 'chitra@gmail.com'),
('2147483647', 'farsana', 'staff', 'cccc', 0, 'cse', '1234', 'jyothsnashaji99@gmail.com'),
('6757656', 'Vineet', 'staff', 'Kattangal', 0, 'EEE', '1234', 'vineet@gmail.com'),
('74675876', 'Ganga', 'staff', 'Civil Station', 0, 'Academics', '1234', 'ganga@gmail.com'),
('97877897', 'Jaya', 'staff', 'Thondayad', 0, 'BT', '1234', 'jaya@gmail.com'),
('987752', 'Karthik', 'staff', 'Mukkam', 0, 'MECH', '1234', 'karthik78@gmail.com'),
('B160087CS', 'Amalu', 'student', 'Adivaram', 0, 'CSE', '1234', 'amalu@gmail.com'),
('B160567EE', 'Krishna', 'student', 'Medical College', 0, 'EEE', '1234', 'krish@gmail.com'),
('B160800CS', 'Nirmal', 'student', 'Civil Station', 0, 'CSE', '1234', 'nirmal@gmail.com'),
('B160806CS', 'Faris', 'student', 'Mavoor', 0, 'CSE', '1234', 'faris@gmail.com'),
('B160901CS', 'jyothsna', 'student', 'Mukkam', 0, 'CSE', '1234', 'jyothsnashaji99@gmail.com'),
('B160932CS', 'Farsana', 'student', 'Kunnamangalam', 0, 'CSE', '1234', 'farsana@gmail.com'),
('B17089CE', 'Keerthana', 'student', 'Palayam', 0, 'CIVIL', '1234', 'kithu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `bus_id` int(255) NOT NULL,
  `stop` varchar(255) NOT NULL,
  `to_time` time(6) NOT NULL,
  `from_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`bus_id`, `stop`, `to_time`, `from_time`) VALUES
(101, 'Palayam', '07:00:00.000000', '06:00:00.000000'),
(101, 'Medical College', '07:30:00.000000', '05:30:00.000000'),
(102, 'Medical College', '07:15:00.000000', '17:00:00.000000'),
(102, 'Mavoor', '07:30:00.000000', '16:45:00.000000'),
(101, 'Kunnamangalam', '08:00:00.000000', '05:00:00.000000'),
(102, 'Kattangal', '07:45:00.000000', '16:30:00.000000'),
(103, 'Areekode', '07:15:00.000000', '17:00:00.000000'),
(103, 'Mukkam', '07:45:00.000000', '16:30:00.000000'),
(103, 'College', '08:15:00.000000', '16:00:00.000000'),
(104, 'Eranjipalam', '07:00:00.000000', '18:00:00.000000'),
(104, 'Civil Station', '07:15:00.000000', '17:30:00.000000'),
(104, 'Kunnamangalam', '07:30:00.000000', '17:15:00.000000'),
(104, 'College', '07:45:00.000000', '17:00:00.000000'),
(105, 'Palazhi', '07:00:00.000000', '18:00:00.000000'),
(105, 'Thondayad', '07:15:00.000000', '17:45:00.000000'),
(105, 'Malaparamb', '07:30:00.000000', '17:30:00.000000'),
(105, 'Medical College', '07:45:00.000000', '17:15:00.000000'),
(106, 'Adivaram', '08:00:00.000000', '17:30:00.000000'),
(105, 'Kunnamangalam', '08:00:00.000000', '17:00:00.000000'),
(106, 'Koduvally', '08:15:00.000000', '17:15:00.000000'),
(106, 'Kunnamangalam', '08:30:00.000000', '17:00:00.000000'),
(106, 'College', '09:00:00.000000', '16:30:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passenger_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
