-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2015 at 04:21 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gob_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Id` mediumint(9) NOT NULL,
  `User_Id` smallint(6) NOT NULL,
  `Comment` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Post_Id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Id`, `User_Id`, `Comment`, `Date`, `Post_Id`) VALUES
(10, 2, 'l', '2015-12-16 17:20:30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `Id` tinyint(4) NOT NULL,
  `Currency` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `Id` mediumint(9) NOT NULL,
  `Equipment_type_Id` tinyint(4) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Rarity_Id` tinyint(4) NOT NULL,
  `Game_price` float NOT NULL,
  `Market_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`Id`, `Equipment_type_Id`, `Name`, `Rarity_Id`, `Game_price`, `Market_price`) VALUES
(6, 8, 'Mazais zobens', 2, 350, 20),
(8, 8, 'Star wars zobens', 2, 120, 9.99);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_buying`
--

CREATE TABLE `equipment_buying` (
  `Id` mediumint(9) NOT NULL,
  `User_Id` smallint(6) NOT NULL,
  `Equipment_Id` mediumint(9) NOT NULL,
  `Quantity` tinyint(3) UNSIGNED NOT NULL,
  `Date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `equipment_buying`
--

INSERT INTO `equipment_buying` (`Id`, `User_Id`, `Equipment_Id`, `Quantity`, `Date`) VALUES
(7, 10, 6, 5, '2015-12-16 16:57:06'),
(8, 9, 8, 5, '2015-12-16 17:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_type`
--

CREATE TABLE `equipment_type` (
  `Id` tinyint(4) NOT NULL,
  `Type` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `equipment_type`
--

INSERT INTO `equipment_type` (`Id`, `Type`) VALUES
(4, 'Šķēps'),
(8, 'Zobens'),
(10, 'Cimdi');

-- --------------------------------------------------------

--
-- Table structure for table `game_currency`
--

CREATE TABLE `game_currency` (
  `Id` tinyint(4) NOT NULL,
  `Currency` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Table structure for table `money_transactions`
--

CREATE TABLE `money_transactions` (
  `Id` mediumint(9) NOT NULL,
  `User_Id` smallint(6) NOT NULL,
  `Paid` smallint(6) NOT NULL,
  `Currency_Id` tinyint(4) NOT NULL,
  `Got` mediumint(9) NOT NULL,
  `Game_currency_Id` tinyint(4) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `Id` smallint(6) NOT NULL,
  `Title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Description` mediumtext CHARACTER SET utf8 NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`Id`, `Title`, `Description`, `Date`) VALUES
(15, 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend ante ac dolor commodo maximus. Donec sit amet ligula mi. In nunc metus, tempor quis faucibus a, rhoncus ut ipsum. Nam sed ex nisi. Quisque ac ornare dolor, sit amet lacinia odio. Vivamus non convallis nunc. Maecenas vel risus ut felis varius sodales.\r\n\r\nVivamus bibendum volutpat dapibus. Fusce eu eleifend metus. Vivamus ut enim consectetur, feugiat quam ut, sollicitudin mauris. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam finibus bibendum feugiat. Aliquam ornare, neque eu tincidunt commodo, nunc ligula rhoncus sem, a lobortis turpis lacus a tellus. Donec at gravida urna. Proin placerat purus pulvinar, gravida urna at, commodo nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam vulputate condimentum venenatis. Nulla ac quam augue. Morbi id nunc fringilla, rutrum ex vitae, lobortis nisl.\r\n\r\nUt vehicula nisi ac blandit interdum. Aliquam vel consequat turpis. Donec ultricies nunc purus, vitae semper urna iaculis mollis. Aliquam ut elit ac tortor accumsan elementum. Donec efficitur neque euismod diam malesuada, eu dictum leo rhoncus. Duis fermentum suscipit massa, ac feugiat risus vestibulum id. Vivamus metus libero, gravida sed scelerisque a, ultrices id lorem. Curabitur vulputate augue eget tempor pulvinar.\r\n\r\nSed aliquet blandit est ut porttitor. Quisque consequat feugiat faucibus. Proin a massa nulla. Pellentesque dapibus gravida lacus nec venenatis. Mauris ac purus a mauris sagittis condimentum sed vitae ipsum. Cras commodo diam neque. Suspendisse non volutpat eros, non fringilla nibh. Suspendisse vitae pharetra nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer condimentum eget est id volutpat.\r\n\r\nNam tristique, risus a facilisis fermentum, dolor nunc interdum ex, id cursus risus augue a odio. Donec vitae commodo lectus. Sed enim felis, iaculis a porttitor vel, finibus vel quam. Vivamus rhoncus nibh in ligula accumsan, in venenatis leo ultrices. Donec non volutpat lacus. Nulla mollis odio et elit pharetra, sed volutpat lacus tristique. Sed at nulla vel libero convallis pretium. Aliquam eget nisi finibus, varius quam in, suscipit lorem. Integer viverra porttitor ligula. Fusce vitae lacus ligula. Sed sed libero eget urna condimentum consequat. Donec ligula purus, tempor ac est imperdiet, vestibulum molestie enim. Curabitur aliquet ante sit amet odio sagittis vulputate. Mauris bibendum rhoncus tincidunt. Aliquam tristique velit id nulla hendrerit commodo iaculis vel justo. Maecenas tincidunt ullamcorper neque id luctus.', '2015-12-16 17:00:52'),
(16, 'Test 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend ante ac dolor commodo maximus.', '2015-12-16 17:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Id` mediumint(9) NOT NULL,
  `User_Id` smallint(6) NOT NULL,
  `Title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Id`, `User_Id`, `Title`, `Description`, `Date`) VALUES
(5, 9, 'Izmaiņas klimatā.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in pretium justo. Proin nec lobortis est. Nam tincidunt, turpis ac vulputate vulputate, mi nisl fringilla est, eget hendrerit turpis ante quis urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean pellentesque tristique urna, ut congue metus laoreet at. Ut at leo varius, lobortis metus sit amet, sollicitudin velit. Ut commodo orci quis semper congue.', '2015-12-14 20:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `rarity`
--

CREATE TABLE `rarity` (
  `Id` tinyint(4) NOT NULL,
  `Rarity` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `rarity`
--

INSERT INTO `rarity` (`Id`, `Rarity`) VALUES
(1, 'Parasts'),
(2, 'Rets'),
(4, 'Episks');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` smallint(6) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Password`, `Email`) VALUES
(1, 'Brolands', '6769e7e76d150eef76150fd9be900724', 'roland.strakis@gmail.com'),
(2, 'Rolands', '6769e7e76d150eef76150fd9be900724', 'rol@rol.com'),
(3, 'Roliks', '6769e7e76d150eef76150fd9be900724', 'camel456@inbox.lv'),
(4, 'Maxima', '6769e7e76d150eef76150fd9be900724', 'maxima@maxima.com'),
(5, 'Lolita', '6769e7e76d150eef76150fd9be900724', 'lolita@inbox.lv'),
(8, 'Broland', '6769e7e76d150eef76150fd9be900724', 'rols@rol.com'),
(9, 'admin', '6769e7e76d150eef76150fd9be900724', 'admin@admin.lv'),
(10, 'test', '6769e7e76d150eef76150fd9be900724', 'test@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Post_Id` (`Post_Id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Equipment_type_Id` (`Equipment_type_Id`),
  ADD KEY `Rarity_Id` (`Rarity_Id`);

--
-- Indexes for table `equipment_buying`
--
ALTER TABLE `equipment_buying`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Equipment_Id` (`Equipment_Id`),
  ADD KEY `User_Id_2` (`User_Id`);

--
-- Indexes for table `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `game_currency`
--
ALTER TABLE `game_currency`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `money_transactions`
--
ALTER TABLE `money_transactions`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Currency_Id` (`Currency_Id`),
  ADD KEY `Game_currency_Id` (`Game_currency_Id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `rarity`
--
ALTER TABLE `rarity`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `Id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `Id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `equipment_buying`
--
ALTER TABLE `equipment_buying`
  MODIFY `Id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `equipment_type`
--
ALTER TABLE `equipment_type`
  MODIFY `Id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `game_currency`
--
ALTER TABLE `game_currency`
  MODIFY `Id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `money_transactions`
--
ALTER TABLE `money_transactions`
  MODIFY `Id` mediumint(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rarity`
--
ALTER TABLE `rarity`
  MODIFY `Id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`Post_Id`) REFERENCES `posts` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`User_Id`) REFERENCES `users` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`Equipment_type_Id`) REFERENCES `equipment_type` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_ibfk_2` FOREIGN KEY (`Rarity_Id`) REFERENCES `rarity` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipment_buying`
--
ALTER TABLE `equipment_buying`
  ADD CONSTRAINT `equipment_buying_ibfk_1` FOREIGN KEY (`Equipment_Id`) REFERENCES `equipment` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_buying_ibfk_2` FOREIGN KEY (`User_Id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `money_transactions`
--
ALTER TABLE `money_transactions`
  ADD CONSTRAINT `money_transactions_ibfk_1` FOREIGN KEY (`Game_currency_Id`) REFERENCES `game_currency` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `money_transactions_ibfk_2` FOREIGN KEY (`Currency_Id`) REFERENCES `currency` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `money_transactions_ibfk_3` FOREIGN KEY (`User_Id`) REFERENCES `users` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users` (`Id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
