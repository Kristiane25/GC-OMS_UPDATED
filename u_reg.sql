-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 05:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(25) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_pass` text NOT NULL,
  `position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_name`, `admin_pass`, `position`) VALUES
(1, 'LLoyd', '123456789', 'Dean'),
(3, 'Kristiane', 'kld4628...', 'Dean');

-- --------------------------------------------------------

--
-- Table structure for table `adv_login`
--

CREATE TABLE `adv_login` (
  `adv_no` int(50) NOT NULL,
  `adv_name` text NOT NULL,
  `adv_pass` text NOT NULL,
  `program` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adv_login`
--

INSERT INTO `adv_login` (`adv_no`, `adv_name`, `adv_pass`, `program`) VALUES
(1, 'Layla Woodcock', 'layla123', 'BSIT'),
(2, 'Dale Lukeson', 'dale123', 'BSCS'),
(3, 'Sheila Jeffries', 'she123', 'BSEMC'),
(4, 'David Alan', 'david123', 'ACT');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log_table`
--

CREATE TABLE `log_table` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `log_entry` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_table`
--

INSERT INTO `log_table` (`id`, `u_id`, `name`, `log_entry`) VALUES
(3, 1, 'Reginald Julius Ogaya', '[2023-07-08] [18:58:41] - Started OJT session.'),
(4, 1, 'Reginald Julius Ogaya', '[2023-07-08] [21:01:45] - Ended OJT session.'),
(5, 2, 'Angelo James Aguirre', '[2023-07-08] [19:04:10] - Started OJT session.'),
(6, 2, 'Angelo James Aguirre', '[2023-07-08] [19:04:12] - Ended OJT session.'),
(7, 11, 'Shermayne Ooi Francisco', '[2023-07-08] [19:04:44] - Started OJT session.'),
(8, 11, 'Shermayne Ooi Francisco', '[2023-07-08] [22:04:46] - Ended OJT session.'),
(9, 11, 'Shermayne Ooi Francisco', '[2023-07-10] [19:58:28] - Started OJT session.'),
(10, 11, 'Shermayne Ooi Francisco', '[2023-07-10] [22:58:44] - Ended OJT session.'),
(11, 11, 'Shermayne Ooi Francisco', '[2023-07-11] [20:00:33] - Started OJT session.'),
(12, 11, 'Shermayne Ooi Francisco', '[2023-07-12] [00:00:35] - Ended OJT session.'),
(13, 11, 'Shermayne Ooi Francisco', '[2023-07-13] [03:49:16] - Started OJT session.'),
(14, 11, 'Shermayne Ooi Francisco', '[2023-07-13] [11:49:25] - Ended OJT session.'),
(15, 1, 'Reginald Julius Ogaya', '[2023-07-13] [03:50:34] - Started OJT session.'),
(16, 1, 'Reginald Julius Ogaya', '[2023-07-13] [12:50:37] - Ended OJT session.'),
(17, 1, 'Reginald Julius Ogaya', '[2023-07-14] [03:50:40] - Started OJT session.'),
(18, 1, 'Reginald Julius Ogaya', '[2023-07-14] [12:50:45] - Ended OJT session.');

-- --------------------------------------------------------

--
-- Table structure for table `stud_login`
--

CREATE TABLE `stud_login` (
  `name` text NOT NULL,
  `program` text NOT NULL,
  `email` text NOT NULL,
  `stud_password` varchar(8) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `company_name` text NOT NULL,
  `company_address` text NOT NULL,
  `company_contact_no` varchar(20) DEFAULT NULL,
  `company_email` text NOT NULL,
  `company_supervisor` text NOT NULL,
  `endorsement` longblob NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_login`
--

INSERT INTO `stud_login` (`name`, `program`, `email`, `stud_password`, `contact_no`, `company_name`, `company_address`, `company_contact_no`, `company_email`, `company_supervisor`, `endorsement`, `u_id`) VALUES
('Reginald Julius Ogaya', 'BSIT', 'Reginald@gmail.com', 'rj123', 2147483647, 'AtlasSys', '14 Williams\r\n\r\nMandaluyong City, Metro Manil', '6341323', 'AtlasSys@gmail.com', 'Valorie Conner', '', 1),
('Angelo James Aguirre', 'BSEMC', 'aj123@gmail.com', 'aj123', 2147483647, 'Hardwire', 'Kagudoy Basak, 6015\r\n\r\nLapu-Lapu City, Cebu', '+63-929-555-2804', 'Hardwire@gmail.com', 'Dana Moss', '', 2),
('John Paul Gingpis', 'BSIT', 'johnpaul@gmail.com', 'jp123', 2147483647, 'CitrusTech', 'National Road\r\n\r\nMuntinlupa City, Metro Manila', '8685257', 'CitrusTech@gmail.com', 'Kathy Eady', '', 3),
('Alex Reyes', 'BSCS', 'alex@gmail.com', 'alex123', 2147483647, 'CitrusTech', 'National Road\r\n\r\nMuntinlupa City, Metro Manila', '8685257', 'CitrusTech@gmail.com', 'Kathy Eady', '', 4),
('Neil Bitangcol', 'ACT', 'neil@gmail.com', 'neil123', 2147483647, 'Hardwire', 'Kagudoy Basak, 6015\r\n\r\nLapu-Lapu City, Cebu', '+63-929-555-2804', 'Hardwire@gmail.com', 'Dana Moss', '', 5),
('Jan Remiel Menor', 'ACT', 'jrm@gmail.com', 'miel123', 2147483647, 'Infotech', '44-7th street west tapinac', '2147483647', 'infotech@gmail.com', 'Kristiane Dizon', '', 6),
('Vince Erwin Evangelista', 'BSIT', 'erwin@gmail.com', 'vince123', 2147483647, 'NextNet', 'Perlas Building\r\n\r\nQuezon City, Metro Manila', '7122691', 'Nextnet@gmail.com', 'Cannon Rimmer', '', 7),
('Jiean Estudillo', 'BSEMC', 'Jiean@gmail.com', 'jie123', 2147483647, 'Fine Line Tech', 'G/F Do\r\n\r\nMakati City, Metro Manila', '(02) 814-0834', 'FLT@gmail.com', 'Taegan Marchand', '', 8),
('Jeonoly Toledo', 'BSIT', 'jeonoly@gmail.com', 'jeo123', 2147483647, 'codecore', 'Gahol Arcade, llustre Street\r\n\r\nDavao City, Davao del Sur', '(082) 227-4705', 'codecore@gmail.com', 'Jerred Courtenay', '', 9),
('Kristiane Dizon', 'ACT', 'kld@gmail.com', 'kld123', 2147483647, 'Stark Industries', 'Pamp.EENT and Gen.Hospital 17 San Nicolas\r\n\r\nCity of San Fernando, City of San Fernando', '045-9612751', 'StarkIndustries@gmail.com', 'Darden Perkins', '', 10),
('Shermayne Ooi Francisco', 'BSIT', 'shen@gmail.com', 'shen123', 9762795006, 'LandTech', 'Pacific Mineral & Industrial Corp.60 Kaingin RoadBalintawak 1100\r\n\r\nQuezon City, Quezon City', '3638585', 'LandTech@gmail.com', 'Pene Haden', '', 11),
('John Smith', 'BSCS', 'john.smith@example.com', 'John1234', 9123456789, 'ElectricMinds', 'Punta Tabuc\r\n\r\nRoxas City, Capiz', '(036) 621-1184', 'ElectricMinds@gmail.com', 'Chuck Wild', '', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `adv_login`
--
ALTER TABLE `adv_login`
  ADD PRIMARY KEY (`adv_no`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `log_table`
--
ALTER TABLE `log_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_login`
--
ALTER TABLE `stud_login`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adv_login`
--
ALTER TABLE `adv_login`
  MODIFY `adv_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `log_table`
--
ALTER TABLE `log_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stud_login`
--
ALTER TABLE `stud_login`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
