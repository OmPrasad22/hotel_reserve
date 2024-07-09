-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 12:53 PM
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
-- Database: `hotel_reserve`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `aduser` varchar(20) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `email` varchar(30) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `password` varchar(16) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `mobileno` varchar(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `aduser`, `email`, `password`, `mobileno`, `img`) VALUES
(1, 'om', 'omprasad0108@gmail.com', '2024', '9064763715', 'dp.jpg'),
(2, 'joy', 'joyprasad15@gmail.com', '2005', '9883646759', 'joy.jpg'),
(3, 'bhaskar', 'bhaskarpal0123@gmail.com', '2003', '6294655585', 'bhaskar.png');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `aduser` varchar(20) NOT NULL,
  `hname` varchar(30) NOT NULL,
  `htype` varchar(20) NOT NULL,
  `hloc` varchar(15) NOT NULL,
  `haddr` varchar(100) NOT NULL,
  `hdes` varchar(500) NOT NULL,
  `rent` varchar(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `avail` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `aduser`, `hname`, `htype`, `hloc`, `haddr`, `hdes`, `rent`, `img`, `avail`) VALUES
(14, 'om', 'Hotel Kamal', 'Five Star Hotel', 'New Delhi', 'Nischintapur, Rampurhat', 'Conveniently set in New Delhi, Hotel Jai Balaji Near New Delhi Railway Station provides air-conditioned rooms with free WiFi, free private parking and room service.\n\n\n', '1000', 'hotel1.jpg', '9'),
(15, 'joy', 'Hotel Bimal', 'Luxe Hotel', 'New Delhi', 'Sarita Vihar, New Delhi', 'Conveniently set in New Delhi, Hotel Jai Balaji Near New Delhi Railway Station provides air-conditioned rooms with free WiFi, free private parking and room service.', '1500', 'hotel3.jpg', '10'),
(16, 'joy', 'Hotel Prasad', 'Deluxe Hotel', 'Bengaluru', 'Kempagwada', 'Conveniently set in New Delhi, Hotel Jai Balaji Near New Delhi Railway Station provides air-conditioned rooms with free WiFi, free private parking and room service.', '2000', 'hotel2.jpg', '10'),
(17, 'bhaskar', 'Radha Hotel', 'Deluxe Hotel', 'Mumbai', 'Nala Supara, Navi Mumbai', 'Conveniently set in Navi Mumbai, Hotel Jai Balaji Near New Delhi Railway Station provides air-conditioned rooms with free WiFi, free private parking and room service.', '2000', 'roberto-nickson-MA82mPIZeGI-unsplash.jpg', '5');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `password` varchar(16) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `email` varchar(30) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `mobileno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `password`, `email`, `mobileno`) VALUES
(1, 'useom', '2004', 'omprasad0108@gmail.com', '9064763715'),
(4, 'usebhaskar', '2003', 'bhaskarpal0123@gmail.com', '6294655585'),
(9, 'usejoy', '2005', 'joyprasad15@gmail.com', '9883646759'),
(11, 'usetemp', 'temp', 'temp@gmail.com', '9999999999');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `aduser` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `hname` varchar(30) NOT NULL,
  `htype` varchar(20) NOT NULL,
  `hrtype` varchar(30) NOT NULL,
  `noroom` varchar(11) NOT NULL,
  `pid` bigint(20) NOT NULL,
  `uveri` varchar(30) NOT NULL,
  `uveride` varchar(30) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `payrup` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `rect` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`aduser`, `user`, `hname`, `htype`, `hrtype`, `noroom`, `pid`, `uveri`, `uveride`, `checkin`, `checkout`, `payrup`, `status`, `rect`) VALUES
('om', 'useom', 'Hotel Kamal', 'Five Star Hotel', 'SingleXA Suite', '1', 56, 'Aadhar No', '123456789012', '2024-07-07', '2024-07-09', '3520', 'Online', 'r3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `record_per`
--

CREATE TABLE `record_per` (
  `id` int(11) NOT NULL,
  `pid` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` varchar(11) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `mno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `record_per`
--

INSERT INTO `record_per` (`id`, `pid`, `name`, `age`, `gender`, `mno`) VALUES
(65, 56, 'Om Prasad', '18', 'Male', '9064763715');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(11) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `name` varchar(30) NOT NULL,
  `addr` varchar(40) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `name`, `addr`, `img`) VALUES
('usebhaskar', 'Bhaskar Pal', 'Srifala, Rampurhat', 'bhaskar.png'),
('usejoy', 'Joy Prasad', 'Rampurhat', 'joy.jpg'),
('useom', 'Om Prasad', 'Nischintapur, Rampurhat', 'dp.jpg'),
('usetemp', 'temp', 'Rampurhat', 'comment.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `record_per`
--
ALTER TABLE `record_per`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `pid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `record_per`
--
ALTER TABLE `record_per`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
