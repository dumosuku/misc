-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 07:03 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redemption`
--

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `listingID` int(11) NOT NULL,
  `listingName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `listingDesc` varchar(300) CHARACTER SET utf8 NOT NULL,
  `listingPrice` int(10) NOT NULL,
  `listingPictureURL` varchar(500) CHARACTER SET utf8 NOT NULL,
  `listingOwnerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`listingID`, `listingName`, `listingDesc`, `listingPrice`, `listingPictureURL`, `listingOwnerId`) VALUES
(0, 'test', 'test', 4444, 'https://cdn.discordapp.com/attachments/728176428205736036/1024602090867273738/20220911_005406.jpg', 1),
(1, 'kamini', 'nft lord', 200, 'https://cdn.discordapp.com/attachments/728176428205736036/1024590091324227654/lmao.png', 2),
(2, 'Carpediem', 'Best machine on HackTheBox', 1, 'https://cdn.discordapp.com/attachments/728176428205736036/1024596499121836092/carpe.png', 2),
(3, 'jbrick', 'relinquish the flesh', 15, 'https://cdn.discordapp.com/attachments/728176428205736036/1024598674845728819/jbrik.png', 3),
(4, 'swole_bryant', 'switches are heavy', 75, 'https://cdn.discordapp.com/attachments/728176428205736036/1024600658000760852/asdasd.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `walletID` varchar(300) CHARACTER SET utf8 NOT NULL,
  `accountType` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `password`, `walletID`, `accountType`) VALUES
(1, 'admin', 'VerticalEdge2020', '10795253558741239671849781637371 ', 1),
(2, 'dumosuku', 'CandlesAreCool', '72572599794787865742227065205514 ', 2),
(3, 'yaboycroot', '(a-~]{+]', '08841081794874212609728922370421', 2),
(4, 'inevitability', 'ImNotAFurry', '80530520275851204994333841644260', 2),
(5, 'stubbl', 'tiedyespeedo', '30275580014669251620894270368344', 2),
(6, 'craizel', 'Steve\'sBaby', '04187278395384657499850720622931', 2),
(7, 'hehe', 'password', 'hehe', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`listingID`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `listingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
