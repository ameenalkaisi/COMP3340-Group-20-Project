-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 02:57 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(20000) NOT NULL,
  `tags` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `userid`, `title`, `content`, `tags`) VALUES
(15, 5, 'another test post', '<blockquote>\r\n<p>more testing here</p>\r\n<p>&nbsp;</p>\r\n<p>specifically, blockquote testing<em> and italics</em></p>\r\n</blockquote>', 'italic,blockquote,test'),
(13, 5, 'fdsafdsa', '<p>fdafdas</p>', 'fdafdsa'),
(14, 5, 'test title', '<p>test</p>\r\n<p>&nbsp;</p>\r\n<p><em><strong>indented bold test</strong></em></p>\r\n<p>&nbsp;</p>\r\n<div>div here</div>', 'test,post'),
(18, 5, 'lipsum test!', '<div id=\"lipsum\" style=\"margin: 0px; padding: 0px; text-align: justify; font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum vehicula quam vitae mollis. Vestibulum convallis sem id est venenatis, sed condimentum nisi dignissim. Donec vehicula velit id imperdiet accumsan. Phasellus eu lectus et felis suscipit sollicitudin sit amet nec sem. Praesent ac vehicula mi. Suspendisse tortor massa, bibendum quis dignissim vitae, imperdiet tempor mauris. Duis facilisis ultrices lobortis. Nunc fringilla diam id pulvinar pretium.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Phasellus ac posuere arcu. Mauris efficitur aliquam felis, eget scelerisque enim. Curabitur eu erat non eros dignissim vulputate eu egestas dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id risus non lacus venenatis pellentesque. Integer eget cursus urna. Nunc lobortis blandit lacus, sit amet laoreet felis elementum quis. Vestibulum lobortis maximus velit, ac eleifend urna lacinia a. Duis at lectus id justo vulputate malesuada eget ut risus. Donec a commodo ante. In a metus pretium, maximus erat quis, imperdiet turpis. Duis sit amet cursus mauris, dignissim ultrices tortor.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">In rhoncus ligula ac leo faucibus suscipit. Nam nulla diam, rhoncus eget sollicitudin non, laoreet vel odio. Phasellus nec justo tellus. Donec pretium bibendum velit non egestas. Maecenas sed quam id nibh maximus accumsan. Vivamus mattis bibendum porta. Maecenas egestas orci ut purus placerat vestibulum.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut tempor tortor sit amet massa aliquet ullamcorper. Nam porta cursus mi, at vestibulum nisl fermentum vel. Fusce lectus arcu, convallis nec lacinia sed, pretium pretium elit. Vestibulum condimentum magna id nibh vulputate ultrices. Nullam luctus risus eget urna gravida, egestas congue ante fringilla. Duis nec pellentesque leo, venenatis congue lorem. Pellentesque dolor quam, facilisis quis nunc sit amet, blandit commodo ante. Nam id faucibus purus. Vivamus sit amet velit sed velit varius ullamcorper ac quis mauris. Sed sit amet maximus nibh.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Suspendisse tortor massa, rhoncus at nibh non, suscipit faucibus sem. Quisque quis justo et nibh hendrerit pharetra. Nulla quis tortor eget turpis ultrices pulvinar gravida et risus. Mauris malesuada congue nunc, in eleifend nulla laoreet nec. Aenean sed risus at dolor interdum ultrices. Sed nec nisi at massa imperdiet elementum. Pellentesque non sapien sem. Vivamus ac mauris laoreet, scelerisque risus eu, vehicula massa. Nunc vel mi sit amet mauris interdum imperdiet et et turpis. Nulla facilisi. Sed volutpat lacus vitae est tempus ultricies. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque sit amet orci imperdiet lacus lacinia finibus.</p>\r\n</div>\r\n<div id=\"generated\" style=\"margin: 0px; padding: 0px; font-weight: bold; font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Generated 5 paragraphs, 399 words, 2720 bytes of&nbsp;<a style=\"margin: 0px; padding: 0px; color: #000000;\" title=\"Lorem Ipsum\" href=\"https://www.lipsum.com/\">Lorem Ipsum</a></div>', 'lipsum,long,test'),
(19, 5, 'Small Article', '<p>Small article for testing behavior of previous artricles</p>', 'test,small');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `theme` enum('light','dark','christmas') NOT NULL DEFAULT 'light'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `display_name`, `is_admin`, `email`, `password`, `theme`) VALUES
(5, 'Admin - Group 20', 1, 'alkaisi@uwindsor.ca', 'c2244727d61881cd77a0d5dca8d5f4b0', 'dark'),
(10, 'new user', 0, 'new@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'light'),
(11, 'NEW USER', 0, 'another@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'light');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `FK_userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
