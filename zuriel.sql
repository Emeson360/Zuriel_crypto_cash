-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2022 at 08:01 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuriel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_btc_wallet`
--

CREATE TABLE `admin_btc_wallet` (
  `admin_btc_wallet_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `admin_btc_wallet_address` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_btc_wallet`
--

INSERT INTO `admin_btc_wallet` (`admin_btc_wallet_id`, `userid`, `admin_btc_wallet_address`) VALUES
(1, 0, 'fgefdg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_busd_wallet`
--

CREATE TABLE `admin_busd_wallet` (
  `admin_busd_wallet_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `admin_busd_wallet_address` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_busd_wallet`
--

INSERT INTO `admin_busd_wallet` (`admin_busd_wallet_id`, `userid`, `admin_busd_wallet_address`) VALUES
(1, 0, 'sgf32sg435gf');

-- --------------------------------------------------------

--
-- Table structure for table `admin_eth_wallet`
--

CREATE TABLE `admin_eth_wallet` (
  `admin_eth_wallet_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `admin_eth_wallet_address` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_eth_wallet`
--

INSERT INTO `admin_eth_wallet` (`admin_eth_wallet_id`, `userid`, `admin_eth_wallet_address`) VALUES
(1, 0, 'gdgfdh');

-- --------------------------------------------------------

--
-- Table structure for table `admin_usdt_wallet`
--

CREATE TABLE `admin_usdt_wallet` (
  `admin_usdt_wallet_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `admin_usdt_wallet_address` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_usdt_wallet`
--

INSERT INTO `admin_usdt_wallet` (`admin_usdt_wallet_id`, `userid`, `admin_usdt_wallet_address`) VALUES
(1, 0, 'fhgjstet4t');

-- --------------------------------------------------------

--
-- Table structure for table `btc_wallet`
--

CREATE TABLE `btc_wallet` (
  `btc_wallet_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `btc_wallet_address` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `btc_wallet`
--

INSERT INTO `btc_wallet` (`btc_wallet_id`, `userid`, `btc_wallet_address`) VALUES
(1, 1, '10hudfu8484w8');

-- --------------------------------------------------------

--
-- Table structure for table `busd_wallet`
--

CREATE TABLE `busd_wallet` (
  `busd_wallet_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `busd_wallet_address` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `busd_wallet`
--

INSERT INTO `busd_wallet` (`busd_wallet_id`, `userid`, `busd_wallet_address`) VALUES
(1, 5, 'qwerty keyboard');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--
-- Error reading structure for table zuriel.deposit: #1932 - Table 'zuriel.deposit' doesn't exist in engine
-- Error reading data for table zuriel.deposit: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `zuriel`.`deposit`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `eth_wallet`
--

CREATE TABLE `eth_wallet` (
  `eth_wallet_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `eth_wallet_address` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eth_wallet`
--

INSERT INTO `eth_wallet` (`eth_wallet_id`, `userid`, `eth_wallet_address`) VALUES
(1, 1, 'fghhhr421567');

-- --------------------------------------------------------

--
-- Table structure for table `temp_deposit`
--

CREATE TABLE `temp_deposit` (
  `temp_deposit_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `amt_deposited` float NOT NULL,
  `transaction_reference` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_deposit`
--

INSERT INTO `temp_deposit` (`temp_deposit_id`, `userid`, `amt_deposited`, `transaction_reference`) VALUES
(1, 1, 100, '629a0c0468a3a'),
(2, 2, 300, '629a27b9e8d3d'),
(3, 5, 1000, '629a4d7f0cdf2');

-- --------------------------------------------------------

--
-- Table structure for table `usdt_wallet`
--

CREATE TABLE `usdt_wallet` (
  `usdt_wallet_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `usdt_wallet_address` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cpassword` varchar(100) CHARACTER SET latin1 NOT NULL,
  `profile_pics` varchar(100) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `country` varchar(100) CHARACTER SET latin1 NOT NULL,
  `usertype` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT 'user',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `username`, `email`, `phone`, `password`, `cpassword`, `profile_pics`, `address`, `country`, `usertype`, `date`) VALUES
(1, 'User User', 'user', 'user@gmail.com', '08064883620', '123', '123', 'pic_5543.png', 'No 8 old UNTH road Lagos', 'Australia', 'user', '2022-06-02 18:10:51'),
(2, 'Emeh Tochukwu', 'TeeCee360', 'emehtochukwu26@gmail.com', '09486378', '123asdZ', '123asdZ', '', '', 'Bangladesh', 'user', '2022-06-02 10:31:48'),
(3, 'Admin', 'Admin1', 'admin@gmail.com', '234534656665', '123', '123', '', 'No 8 Nwodo street', 'Sweden', 'admin', '2022-06-02 18:03:33'),
(4, 'Admin', 'Admin2', 'admin2@gmail.com', '234534656665', '123', '123', '', 'No 8 Nwodo street', 'Sweden', 'admin', '2022-06-03 08:22:10'),
(5, 'Obi Okonkwo', 'Obino', 'obi@gmail.com', '57679226828', '123asdZ', '123asdZ', '', '', 'Ecuador', 'user', '2022-06-03 18:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_balance`
--
-- Error reading structure for table zuriel.wallet_balance: #1932 - Table 'zuriel.wallet_balance' doesn't exist in engine
-- Error reading data for table zuriel.wallet_balance: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `zuriel`.`wallet_balance`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_btc_wallet`
--
ALTER TABLE `admin_btc_wallet`
  ADD PRIMARY KEY (`admin_btc_wallet_id`),
  ADD UNIQUE KEY `UNIQUE` (`userid`);

--
-- Indexes for table `admin_busd_wallet`
--
ALTER TABLE `admin_busd_wallet`
  ADD PRIMARY KEY (`admin_busd_wallet_id`),
  ADD UNIQUE KEY `UNIQUE` (`userid`);

--
-- Indexes for table `admin_eth_wallet`
--
ALTER TABLE `admin_eth_wallet`
  ADD PRIMARY KEY (`admin_eth_wallet_id`),
  ADD UNIQUE KEY `UNIQUE` (`userid`);

--
-- Indexes for table `admin_usdt_wallet`
--
ALTER TABLE `admin_usdt_wallet`
  ADD PRIMARY KEY (`admin_usdt_wallet_id`),
  ADD UNIQUE KEY `UNIQUE` (`userid`);

--
-- Indexes for table `btc_wallet`
--
ALTER TABLE `btc_wallet`
  ADD PRIMARY KEY (`btc_wallet_id`),
  ADD UNIQUE KEY `UNIQUE` (`userid`);

--
-- Indexes for table `busd_wallet`
--
ALTER TABLE `busd_wallet`
  ADD PRIMARY KEY (`busd_wallet_id`),
  ADD UNIQUE KEY `UNIQUE` (`userid`);

--
-- Indexes for table `eth_wallet`
--
ALTER TABLE `eth_wallet`
  ADD PRIMARY KEY (`eth_wallet_id`),
  ADD UNIQUE KEY `UNIQUE` (`userid`);

--
-- Indexes for table `temp_deposit`
--
ALTER TABLE `temp_deposit`
  ADD PRIMARY KEY (`temp_deposit_id`),
  ADD UNIQUE KEY `UNIQUE` (`userid`);

--
-- Indexes for table `usdt_wallet`
--
ALTER TABLE `usdt_wallet`
  ADD PRIMARY KEY (`usdt_wallet_id`),
  ADD UNIQUE KEY `UNIQUE` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_btc_wallet`
--
ALTER TABLE `admin_btc_wallet`
  MODIFY `admin_btc_wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_busd_wallet`
--
ALTER TABLE `admin_busd_wallet`
  MODIFY `admin_busd_wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_eth_wallet`
--
ALTER TABLE `admin_eth_wallet`
  MODIFY `admin_eth_wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_usdt_wallet`
--
ALTER TABLE `admin_usdt_wallet`
  MODIFY `admin_usdt_wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `btc_wallet`
--
ALTER TABLE `btc_wallet`
  MODIFY `btc_wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `busd_wallet`
--
ALTER TABLE `busd_wallet`
  MODIFY `busd_wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eth_wallet`
--
ALTER TABLE `eth_wallet`
  MODIFY `eth_wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_deposit`
--
ALTER TABLE `temp_deposit`
  MODIFY `temp_deposit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usdt_wallet`
--
ALTER TABLE `usdt_wallet`
  MODIFY `usdt_wallet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `btc_wallet`
--
ALTER TABLE `btc_wallet`
  ADD CONSTRAINT `btc_wallet_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `busd_wallet`
--
ALTER TABLE `busd_wallet`
  ADD CONSTRAINT `busd_wallet_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `eth_wallet`
--
ALTER TABLE `eth_wallet`
  ADD CONSTRAINT `eth_wallet_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `temp_deposit`
--
ALTER TABLE `temp_deposit`
  ADD CONSTRAINT `temp_deposit_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usdt_wallet`
--
ALTER TABLE `usdt_wallet`
  ADD CONSTRAINT `usdt_wallet_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
