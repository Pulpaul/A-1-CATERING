-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 09:17 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `theme` varchar(100) NOT NULL,
  `pax` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `food` varchar(1000) NOT NULL,
  `quantity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `theme`, `pax`, `price`, `food`, `quantity`) VALUES
(2, 'WEDDING', '50', '50,000', 'Meal: Chicken Sriracha, Adobong Sitaw, Rice.<br>\r\nDrinks: Water, Ice Tea. <br>\r\nDessert: Buko Pandan Ice Crea', '60'),
(4, 'JS PROM', '100', '100,000', 'Meal: Chicken Teriyaki, Tofu mix Sitaw, Rice. <br>\r\nDrinks: Water, Pine-apple Juice. <br> Dessert: Chocolate Fountain.', '110');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` int(11) NOT NULL,
  `client_id` varchar(100) NOT NULL,
  `full_name` varchar(1000) NOT NULL,
  `contact_number` varchar(1000) NOT NULL,
  `email_ad` varchar(1000) NOT NULL,
  `c_address` varchar(1000) NOT NULL,
  `packs_id` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`reserve_id`, `client_id`, `full_name`, `contact_number`, `email_ad`, `c_address`, `packs_id`, `payment`, `status`, `state`) VALUES
(4, '53', 'dsa', '213', 'sample@gmail.com', '312321', '2', '', 'Paid', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`, `status`, `address`, `number`, `firstname`, `lastname`) VALUES
(53, 'user', 'user01@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '', 'Bagumbong', '09977265411', 'Shaira', 'Pineda'),
(56, 'admin', 'admin01@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'zamora caloocan', '0997726542', 'joel', 'sanchez');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
