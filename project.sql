-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2021 at 05:14 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`) VALUES
(2),
(1),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`) VALUES
(1),
(3),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `Room_Name` varchar(255) NOT NULL,
  `Room_Cap` int(11) NOT NULL,
  `Room_Text` varchar(255) NOT NULL,
  `order_infos` int(11) NOT NULL,
  `type_infos` int(11) NOT NULL,
  `species_infos` int(11) NOT NULL,
  `Use_Type` varchar(255) NOT NULL,
  `Room_Durumu` int(11) NOT NULL,
  `Start_Time` varchar(255) NOT NULL,
  `Finis_Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `Room_Name`, `Room_Cap`, `Room_Text`, `order_infos`, `type_infos`, `species_infos`, `Use_Type`, `Room_Durumu`, `Start_Time`, `Finis_Time`) VALUES
(1, '12', 12, 'dsafas', 12, 12, 12, 'Classroom', 1, '', ''),
(2, '13241', 145, 'fsdgsdgs', 13241, 13241, 13241, 'Meeting', 1, '', ''),
(3, '121', 33, 'dsafasfasf', 121, 121, 121, 'Classroom', 0, '', ''),
(4, '12121', 121321412, '4fdsasgsdgsdgs', 12121, 12121, 12121, 'Classroom', 1, '', ''),
(5, '121321', 23, '1fsafasfasfs', 121321, 121321, 121321, 'Meeting', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `room_orders`
--

CREATE TABLE `room_orders` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry_time` date NOT NULL,
  `exit_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_orders`
--

INSERT INTO `room_orders` (`id`, `room_id`, `user_id`, `entry_time`, `exit_time`) VALUES
(4, 121, 3, '2021-06-20', '2021-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `room_speciess`
--

CREATE TABLE `room_speciess` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_projector` int(11) NOT NULL,
  `room_microphone` int(11) NOT NULL,
  `room_sound` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_speciess`
--

INSERT INTO `room_speciess` (`id`, `room_id`, `room_projector`, `room_microphone`, `room_sound`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 1, 0, 1),
(3, 3, 1, 1, 0),
(4, 4, 0, 1, 0),
(5, 5, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `classrom` int(11) NOT NULL,
  `meeting` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `exam`, `classrom`, `meeting`, `room_id`) VALUES
(1, 0, 1, 0, 1),
(2, 0, 0, 1, 2),
(3, 0, 1, 0, 3),
(4, 0, 1, 0, 4),
(5, 0, 0, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Kullanıcı_adı` varchar(255) NOT NULL,
  `kullanıcı_soyadı` varchar(255) NOT NULL,
  `kullanıcı_mail` varchar(255) NOT NULL,
  `kullanıcı_telefon` varchar(255) NOT NULL,
  `kullancı_sifre` varchar(255) NOT NULL,
  `kullanıcı_eski_oda` varchar(255) NOT NULL,
  `kullanıcı_yeni_oda` varchar(255) NOT NULL,
  `Kullanıcı_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Kullanıcı_adı`, `kullanıcı_soyadı`, `kullanıcı_mail`, `kullanıcı_telefon`, `kullancı_sifre`, `kullanıcı_eski_oda`, `kullanıcı_yeni_oda`, `Kullanıcı_type`) VALUES
(1, 'test', 'deneme', 'bb', '11111', 'bb', '', '', 1),
(2, 'admin', 'aa', 'a', '2131231212', 'a', '', '', 1),
(3, 'testfdsfgs', 'tegsdgsdg', 'vv', '222222222222', 'vv', '', '', 0),
(4, 'admin_test', 'test_admin', 'zz', '2131231212', 'zz', '', '', 1),
(5, 'Samet', 'Mert', 'as', '11111', 'as', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_orders`
--
ALTER TABLE `room_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_speciess`
--
ALTER TABLE `room_speciess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_orders`
--
ALTER TABLE `room_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_speciess`
--
ALTER TABLE `room_speciess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
