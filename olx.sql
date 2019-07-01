-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 08:35 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olx`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisments`
--

CREATE TABLE `advertisments` (
  `AdsID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Status` int(1) NOT NULL,
  `Details` varchar(200) COLLATE utf8_bin NOT NULL,
  `Price` int(6) NOT NULL,
  `Image` varchar(70) COLLATE utf8_bin NOT NULL,
  `Title` varchar(30) COLLATE utf8_bin NOT NULL,
  `UserID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `advertisments`
--

INSERT INTO `advertisments` (`AdsID`, `Date`, `Status`, `Details`, `Price`, `Image`, `Title`, `UserID`, `CategoryID`) VALUES
(1, '2019-03-13', 0, 'Easy Polo Black Edition', 55, 'dsafdasdf', 'T-Shirt', 0, 0),
(2, '2019-03-26', 1, 'asdfasdf', 3, 'asdfsadf', 'sadfasdf', 0, 0),
(4, '2019-03-17', 0, 'sadfasdfsadf', 13, 'asdfsadf', 'ssdfgdfg', 0, 0),
(5, '2019-03-25', 0, 'Easy Polo Black Edition', 25, 'asdfasdfasd', 'T-Shirt', 0, 0),
(6, '2019-03-25', 1, 'Easy Polo Black Edition', 22, 'sadfasdf', 'T-Shirt', 0, 0),
(7, '2019-03-26', 0, 'sadf', 123, 'sadfasdf', 'ssdfgdfg', 0, 0),
(8, '2019-03-25', 1, 'asdfasdfsd', 22, 'asdfsdf', 'ssdfgdfg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Status` int(1) NOT NULL,
  `Details` varchar(100) COLLATE utf8_bin NOT NULL,
  `UserID` int(11) NOT NULL,
  `AdsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(20) COLLATE utf8_bin NOT NULL,
  `Email` varchar(40) COLLATE utf8_bin NOT NULL,
  `Password` varchar(50) COLLATE utf8_bin NOT NULL,
  `street` varchar(50) COLLATE utf8_bin NOT NULL,
  `Role` tinyint(1) NOT NULL DEFAULT '0',
  `RegStatus` tinyint(1) NOT NULL DEFAULT '0',
  `areaID` int(11) NOT NULL,
  `RegDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Email`, `Password`, `street`, `Role`, `RegStatus`, `areaID`, `RegDate`) VALUES
(7, 'ahmarfrfrff', 'abo.zaky19@yahoo.comm', 'asdfsfd', '', 1, 1, 0, '2019-03-25'),
(10, 'asdfdddd', 'abo.dddzaky19@yahoo.com', 'sdfsdaf', '', 0, 0, 0, '2019-03-25'),
(11, 'ahmad', 'a.abozaky19@yahoo.com', 'asdfsdf', '', 0, 0, 0, '2019-03-25'),
(14, 'ahmaddddddd', 'a.abozaky19@yahoo.com', 'sadfsa', '', 0, 0, 0, '2019-03-25'),
(15, 'ahmadddddddsdfasd', 'a.abozaky19@yahoo.com', 'asdfasdf', '', 0, 0, 0, '2019-03-25'),
(16, 'asdfcde', 'a.abozaky19@yahoo.com', 'asdfsdf', '', 0, 0, 0, '2019-03-25'),
(17, 'asdfsaf', 'a.abozaky19@yahoo.com', 'asdfsdf', '', 0, 0, 0, '2019-03-25'),
(22, 'asdfasf', 'sdfgsdfg', 'asdfasdf', '', 0, 0, 0, '2019-03-25'),
(24, 'asdfasfd', 'cfewq', 'asdf', '', 0, 0, 0, '2019-03-25'),
(26, 'asdsdfasdf', 'asdf@lksjdfddddd', 'dsfas', '', 0, 0, 0, '2019-03-25'),
(27, 'asasdfdsdfasdf', 'asdf@lksjdfddddd', 'sadfasdfa', '', 0, 0, 0, '2019-03-25'),
(28, 'asdfasdf', 'abdo.zaky0@gmail.com', 'asdfasfd', '', 0, 0, 0, '2019-03-25'),
(29, 'feeeeeeeee', 'asdf', 'asdf', '', 0, 0, 0, '2019-03-25'),
(50, 'asdfasdfojhgjb ', 'abdo.zaky0@gmail.com', '12345rftrdgfdgfgx', '', 0, 0, 0, '2019-03-25'),
(53, 'asdfdccdsadc', 'abdo.zaky0@gmail.comdddd', 'asdfasdfasdfasdfsdf', '', 0, 0, 0, '2019-03-25'),
(54, 'mohameddasdfasdfsdfs', 'abdo.zaky0@gmail.com', 'asdfasdfasdfasdf', '', 0, 0, 0, '2019-03-25'),
(55, 'asdfasdfcsde', 'abdo.zaky0@gmail.comasdf', 'azssxcffgsadfasd', '', 0, 0, 0, '2019-03-25'),
(56, 'asdfasdfddddd', 'abdo.zaky0@gmail.comddfa', 'asdfasdfasdf', '', 0, 0, 0, '2019-03-25'),
(58, 'JJJJJ', 'JJ@JJ', 'GGGGGGGGGGGGGGGG', '', 0, 0, 0, '2019-03-25'),
(59, 'GGGGGG', 'DD@DD', 'EEEEEEEEEEEEEEEE', '', 0, 0, 0, '2019-03-25'),
(60, 'asdfasdfssss', 'ss@ss', 'sssssssssssssss', '', 0, 0, 0, '2019-03-25'),
(61, 'asdfasdfsdsds', 'dd@ss', 'ssssssssssssssss', '', 0, 0, 0, '2019-03-25'),
(62, 'asdfasdfce', 'abdo.zaky0@gmail.comdf', 'acdwsdsfasdf', '', 0, 0, 0, '2019-03-25'),
(68, 'asdfasdfdddd', 'cdsafcsd', 'asdfasdfasdfasdf', '', 0, 0, 0, '2019-03-25'),
(69, 'asdfasdfdddddv', 'abdo.zaky0@gmail.comcd', 'adsfsadadsfds', '', 0, 0, 0, '2019-03-25'),
(70, 'lkjlksajdfljkslakdf', 'lkjsaldfkjlaskjdflkj', 'asdfjlkasjdflkasjlfd', '', 0, 0, 0, '2019-03-25'),
(71, 'dsdsdsdssdsd', 'ss@dd', 'dddddddddddddddd', '', 0, 0, 0, '2019-03-25'),
(74, 'asdfasdfØ©Ù‰Ù„Ø§Ø©Ù‰', 'abdo.zaky0@gmail.com', 'ØªØ§Ù„Ø§ØªÙ„ØªÙ„', '', 0, 0, 0, '2019-03-25'),
(75, 'asdfasdfÙ‰Ø§ØºØ¹ Ù„Ø', 'Ù†ØªØ§Ù„ØªÙ„Ø§ØªÙ„', 'Ù†ØªÙ†Ù†ØªÙ†ØªØ§Ù†Ù„ØªØ§Ù„Ù„Ø§Ù„Ø§Ù„Ø§Ø§', '', 0, 0, 0, '2019-03-25'),
(76, 'mohamed ØªØ§Ø¨jnfvgh', 'jhgjhgjhg', 'jhgjhgjhgjghjg', '', 0, 0, 0, '2019-03-25'),
(77, 'xzcv', 'xzcvzx', 'zxcvxcvxzcv', '', 0, 0, 0, '2019-03-25'),
(78, 'asdfasdfa', 'asdfasdfaad', 'dasdfdsasadf', '', 0, 0, 0, '2019-03-25'),
(81, 'asdfasdfasdf', 'asdfasdf', 'asdfasdfasdfasdf', '', 0, 0, 0, '2019-03-25'),
(88, 'sadf', 'dasdfa', 'sdfasdfasdf', '', 0, 0, 0, '2019-03-25'),
(95, 'test4', 'a', 'sdfasdfasd', '', 0, 0, 0, '2019-03-25'),
(96, 'mohamedd', 'dddddd@asdf', 'asdfasdfasdfasdf', '', 0, 0, 0, '2019-03-25'),
(99, 'asdfdasdf', 'd', 'sadfdddd', '', 0, 0, 0, '2019-03-25'),
(101, 'asdfasdfddd', 'abo.dddzaky19@yahoo.comdddd', 'ddddddddddddddddddddddddddddddd', '', 0, 0, 0, '2019-03-26'),
(103, 'f', 'f', 'sdfgsdfgsdfgsdfgsdfg', '', 0, 0, 0, '2019-03-26'),
(106, 'asdfffdc', 'abo.zaky19@ydddddahoo.com', 'asdfsdfasdfasdfasdfasdf', '', 0, 0, 0, '2019-03-26'),
(107, 'asdfasdfc3', 'ds@dsfcc', 'asdfasdddddd', '', 0, 0, 0, '2019-03-26'),
(108, 'asdfsdffdsadddd', 'asdfas@gmail.com', 'sadfsadf', '', 0, 0, 0, '2019-03-26'),
(109, 'asdfc4eadg', 'abo.zaky19@yahoo.comc', 'asdfasdfasdfsdf', '', 0, 0, 0, '2019-03-26'),
(111, 'sss', '', '', '', 0, 0, 0, '2019-03-26'),
(112, '1232334123', 'abdo.zaky0@gmail.comddd', 'asdfasdfsdf', '', 0, 0, 0, '2019-03-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisments`
--
ALTER TABLE `advertisments`
  ADD PRIMARY KEY (`AdsID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `AdsID` (`AdsID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD KEY `areaID` (`areaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisments`
--
ALTER TABLE `advertisments`
  MODIFY `AdsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `AdsFK` FOREIGN KEY (`AdsID`) REFERENCES `advertisments` (`AdsID`),
  ADD CONSTRAINT `userFK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
