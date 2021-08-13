-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2021 at 06:18 PM
-- Server version: 10.2.39-MariaDB-log
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(19, 5, 'Small Article', '<p>Small article for testing behavior of previous artricles</p>', 'test,small'),
(20, 12, 'My Article', '<p><em><strong>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH</strong></em></p>', 'life,lifestyle,awesome!'),
(21, 12, 'The Bee Movie Script', '<pre>According to all known laws\r\nof aviation,\r\n\r\n  \r\nthere is no way a bee\r\nshould be able to fly.\r\n\r\n  \r\nIts wings are too small to get\r\nits fat little body off the ground.\r\n\r\n  \r\nThe bee, of course, flies anyway\r\n\r\n  \r\nbecause bees don\"t care\r\nwhat humans think is impossible.\r\n\r\n  \r\nYellow, black. Yellow, black.\r\nYellow, black. Yellow, black.\r\n\r\n  \r\nOoh, black and yellow!\r\nLet\"s shake it up a little.\r\n\r\n  \r\nBarry! Breakfast is ready!\r\n\r\n  \r\nOoming!\r\n\r\n  \r\nHang on a second.\r\n\r\n  \r\nHello?\r\n\r\n  \r\n- Barry?\r\n- Adam?\r\n\r\n  \r\n- Oan you believe this is happening?\r\n- I can\"t. I\"ll pick you up.\r\n\r\n  \r\nLooking sharp.\r\n\r\n  \r\nUse the stairs. Your father\r\npaid good money for those.\r\n\r\n  \r\nSorry. I\"m excited.\r\n\r\n  \r\nHere\"s the graduate.\r\nWe\"re very proud of you, son.\r\n\r\n  \r\nA perfect report card, all B\"s.\r\n\r\n  \r\nVery proud.\r\n\r\n  \r\nMa! I got a thing going here.\r\n\r\n  \r\n- You got lint on your fuzz.\r\n- Ow! That\"s me!\r\n\r\n  \r\n- Wave to us! We\"ll be in row 118,000.\r\n- Bye!\r\n\r\n  \r\nBarry, I told you,\r\nstop flying in the house!\r\n\r\n  \r\n- Hey, Adam.\r\n- Hey, Barry.\r\n\r\n  \r\n- Is that fuzz gel?\r\n- A little. Special day, graduation.\r\n\r\n  \r\nNever thought I\"d make it.\r\n\r\n  \r\nThree days grade school,\r\nthree days high school.\r\n\r\n  \r\nThose were awkward.\r\n\r\n  \r\nThree days college. I\"m glad I took\r\na day and hitchhiked around the hive.\r\n\r\n  \r\nYou did come back different.\r\n\r\n  \r\n- Hi, Barry.\r\n- Artie, growing a mustache? Looks good.\r\n\r\n  \r\n- Hear about Frankie?\r\n- Yeah.\r\n\r\n  \r\n- You going to the funeral?\r\n- No, I\"m not going.\r\n\r\n  \r\nEverybody knows,\r\nsting someone, you die.\r\n\r\n  \r\nDon\"t waste it on a squirrel.\r\nSuch a hothead.\r\n\r\n  \r\nI guess he could have\r\njust gotten out of the way.\r\n\r\n  \r\nI love this incorporating\r\nan amusement park into our day.\r\n\r\n  \r\nThat\"s why we don\"t need vacations.\r\n\r\n  \r\nBoy, quite a bit of pomp...\r\nunder the circumstances.\r\n\r\n  \r\n- Well, Adam, today we are men.\r\n- We are!\r\n\r\n  \r\n- Bee-men.\r\n- Amen!\r\n\r\n  \r\nHallelujah!\r\n\r\n  \r\nStudents, faculty, distinguished bees,\r\n\r\n  \r\nplease welcome Dean Buzzwell.\r\n\r\n  \r\nWelcome, New Hive Oity\r\ngraduating class of...\r\n\r\n  \r\n...9:15.\r\n\r\n  \r\nThat concludes our ceremonies.\r\n\r\n  \r\nAnd begins your career\r\nat Honex Industries!\r\n\r\n  \r\nWill we pick ourjob today?\r\n\r\n  \r\nI heard it\"s just orientation.\r\n\r\n  \r\nHeads up! Here we go.\r\n\r\n  \r\nKeep your hands and antennas\r\ninside the tram at all times.\r\n\r\n  \r\n- Wonder what it\"ll be like?\r\n- A little scary.\r\n\r\n  \r\nWelcome to Honex,\r\na division of Honesco\r\n\r\n  \r\nand a part of the Hexagon Group.\r\n\r\n  \r\nThis is it!\r\n\r\n  \r\nWow.\r\n\r\n  \r\nWow.\r\n\r\n  \r\nWe know that you, as a bee,\r\nhave worked your whole life\r\n\r\n  \r\nto get to the point where you\r\ncan work for your whole life.\r\n\r\n  \r\nHoney begins when our valiant Pollen\r\nJocks bring the nectar to the hive.\r\n\r\n  \r\nOur top-secret formula\r\n\r\n  \r\nis auto</pre>', 'script,bees,film'),
(22, 5, 'Another one', '<p>Here is another post :)</p>', 'another,post,1'),
(23, 5, 'Another one 2', '<p>The sequel of Another one</p>', 'another,post,2'),
(29, 5, 'Sample Article ', '<p>Sample article for public use</p>', 'sample,public,free'),
(25, 5, 'Another one 3', '<p>the sequel of another one 2</p>', 'another,one,3'),
(26, 5, 'The other post', '<p>post series that is a spiritual successor to the original hit post series \"Another one\"</p>', 'other,post,spirtual,successor,another,one'),
(27, 5, 'The other post 2', '<p>sequel of the other post</p>', 'the,other,post,2'),
(28, 5, 'The other post 3', '<p>sequel of the other post 2</p>', 'the,other,post,3'),
(30, 5, 'Sample Article 2', '<p><em><strong>Another Sample article that can be used</strong></em></p>', 'sample,public,free'),
(31, 5, 'The other post 4', '<p>placement into series of posts \"the other post\"</p>', 'the,other,post,4'),
(32, 5, 'The other post 5', '<p>placement into series of posts \"the other post\"</p>', 'the,other,post,5'),
(33, 5, 'The other post 6', '<p>placement into series of posts \"the other post\"</p>', 'the,other,post,6'),
(34, 5, 'The other post 7', '<p>placement into series of posts \"the other post\"</p>', 'the,other,post,7'),
(35, 5, 'The other post 8', '<p>placement into series of posts \"the other post\"</p>', 'the,other,post,8'),
(36, 5, 'Auto generated post 1', 'Sample content', '1'),
(37, 5, 'Auto generated post 2', 'Sample content', '2'),
(38, 5, 'Auto generated post 3', 'Sample content', '3'),
(39, 5, 'Auto generated post 4', 'Sample content', '4'),
(40, 5, 'Auto generated post 5', 'Sample content', '5'),
(41, 5, 'Auto generated post 6', '<p>Sample content</p>', '6'),
(42, 5, 'Auto generated post 7', '<p>Sample content</p>', '7'),
(43, 5, 'Auto generated post 8', '<p>Sample content</p>', '8'),
(44, 5, 'Auto generated post 9', '<p>Sample content</p>', '9'),
(45, 5, 'Auto generated post 10', '<p>Sample content</p>', '10'),
(46, 5, 'Auto generated post 11', '<p>Sample content</p>', '11'),
(47, 5, 'Duplicate post with different tag', 'Sample content', '1'),
(48, 5, 'Duplicate post with different tag', 'Sample content', '2'),
(49, 5, 'Duplicate post with different tag', 'Sample content', '3'),
(50, 5, 'Duplicate post with different tag', 'Sample content', '4'),
(51, 5, 'Duplicate post with different tag', 'Sample content', '5'),
(52, 5, 'Duplicate post with different tag', 'Sample content', '6'),
(53, 5, 'Duplicate post with different tag', 'Sample content', '7'),
(54, 5, 'Duplicate post with different tag', 'Sample content', '8'),
(55, 5, 'Duplicate post with different tag', 'Sample content', '9'),
(56, 5, 'Duplicate post with different tag', 'Sample content', '10'),
(57, 5, 'Duplicate post with different tag', 'Sample content', '11'),
(58, 5, 'Duplicate post with different tag', 'Sample content', '12'),
(59, 5, 'Duplicate post with different tag', 'Sample content', '13'),
(60, 5, 'Duplicate post with different tag', 'Sample content', '14'),
(61, 5, 'Duplicate post with different tag', 'Sample content', '15'),
(62, 5, 'Duplicate post with different tag', 'Sample content', '16'),
(63, 5, 'Duplicate post with different tag', 'Sample content', '17'),
(64, 5, 'Duplicate post with different tag', 'Sample content', '18'),
(65, 5, 'Duplicate post with different tag', 'Sample content', '19');

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
(11, 'NEW USER', 0, 'another@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'light'),
(12, 'Matthew Eppel', 1, 'eppel@uwindsor.ca', '7735ace3b6b085d402ebaae006ad8d6d', 'dark');

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
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
