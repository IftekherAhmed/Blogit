-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2018 at 09:44 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(25) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(25) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_title`) VALUES
(5, 'Web'),
(6, 'Photoshop'),
(7, 'Video'),
(8, 'Animation');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `portfolio_id` int(25) NOT NULL AUTO_INCREMENT,
  `portfolio_title` varchar(25) NOT NULL,
  `portfolio_description` text NOT NULL,
  `portfolio_image_address` varchar(70) NOT NULL,
  PRIMARY KEY (`portfolio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_title`, `portfolio_description`, `portfolio_image_address`) VALUES
(2, 'Web Design', 'Hi, This is a sample text of portfolio. Here we just put some sample text for complete this.\r\nYou’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 'd85e7fa0883ea0c9a398a6469ff886bc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(25) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(50) NOT NULL,
  `post_description` text NOT NULL,
  `category_id` int(25) NOT NULL,
  `category_title` varchar(50) NOT NULL,
  `user_id` int(25) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_image_address` varchar(70) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`),
  UNIQUE KEY `post_image_address` (`post_image_address`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_description`, `category_id`, `category_title`, `user_id`, `user_name`, `post_date`, `post_image_address`) VALUES
(24, 'Post-1', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-10 13:48:42', 'a3038bac40327d84299e6c4e3f0db523.png'),
(25, 'Post-2', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 6, 'Photoshop', 1, 'Iftekhar', '2018-06-10 13:49:06', '4e5c0eaf69d6dd1fa132b858f2252be4.jpg'),
(26, 'Post-3', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-10 13:49:21', 'e7ce1d8c48c31d8081020a43703db18e.jpg'),
(27, 'Post-4', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 8, 'Animation', 1, 'Iftekhar', '2018-06-10 13:49:35', '36b643b08bdc54d5e40baccaafdd1f7c.jpg'),
(28, 'Post-5', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 6, 'Photoshop', 1, 'Iftekhar', '2018-06-10 13:49:52', 'f8da4a155531aa925c5476982204ee7a.jpg'),
(29, 'Post-6', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-10 13:50:14', '98215093bf6f854d9a20f024c0c257e6.png'),
(30, 'Post-7', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 7, 'Video', 1, 'Iftekhar', '2018-06-10 13:50:34', '2de317f8d56bef6e48f09a8ce254eb41.jpg'),
(31, 'Post-8', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 7, 'Video', 1, 'Iftekhar', '2018-06-10 13:50:53', '62a310740cf4a7cc615b65e6c60560e7.jpg'),
(32, 'Post-9', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 8, 'Animation', 1, 'Iftekhar', '2018-06-10 13:51:12', '30442fcb39cabe2c7a42673cbfefe5ff.jpg'),
(33, 'Post-10', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-10 13:51:29', '72dee2707fe707ee29173d2a30c43e17.jpg'),
(34, 'Post-11', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-10 13:51:44', 'de7fc1e91dbabf27c993a07fa93d03ee.jpg'),
(35, 'Post-12', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-10 13:52:16', '47596857e9d9d4cba38292eee000dd5c.jpg'),
(36, 'Post-13', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-10 13:52:30', '38f02db1281b61d02f789000683c85eb.png'),
(37, 'Post-14', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-10 13:52:48', 'c573669a68dae875d2dfd20824386ae7.jpg'),
(38, 'Post-15', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-10 13:53:06', '104fd7750fd2accc5f0e06f9bad0cd8f.jpg'),
(39, 'Post-16', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 8, 'Animation', 1, 'Iftekhar', '2018-06-10 13:53:19', '00b2b3e0b3eb69e9b362ccb4eca84a76.jpg'),
(40, 'Post-17', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-11 09:37:59', 'e64d95737ba71997a2ce75449d2ad445.jpg'),
(41, 'Post-18', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-11 09:38:09', '22d98ff15f4e96e4789d3fddf8f593c8.jpg'),
(42, 'Post-19', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-11 09:38:18', '5603f18bf6a3a88ffc9804011f6b0e15.jpg'),
(43, 'Post-20', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-11 09:38:41', 'cc0a68d87d5e256404bb4bba240fa213.jpg'),
(44, 'Post-21', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-11 09:42:22', 'e1eb83abdc85ef6c3578131f743f4dde.jpg'),
(45, 'Post-22', 'Hi, This is a sample text of post. Here we just put some sample text for complete this. You’re not connected to the Internet. To get online Help, which shows you the latest help content, you need to be connected to the Internet.', 5, 'Web', 1, 'Iftekhar', '2018-06-11 09:42:56', 'e151ec19fc8d491648d7069b099e2b87.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int(20) NOT NULL AUTO_INCREMENT,
  `slider_title` varchar(50) NOT NULL,
  `slider_description` text NOT NULL,
  `slider_button` text NOT NULL,
  `slider_image_address` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_title`, `slider_description`, `slider_button`, `slider_image_address`) VALUES
(1, 'Letter', 'Hi, what''s up? have you remember like me?', '', '72566b01729b0e197637abeae56dc55e.jpg'),
(2, 'Long way to go', 'world is not so easy for survive,here you have to fight with your friends,family or lover though you gain the game today but i can''t give surety that you can gain all the time.Nothing is permanent in this world whether power of life partner.', '', 'd7226c2aba4ca262755eefc9291fa571.jpg'),
(3, 'Easy to say, Hard to do.', 'If you don''''t know whole then shut up!', '', '8947a67033cfc47749d4d55b918e78aa.jpg'),
(8, 'Confidence', 'Stay with confidence on your passion.', 'http://www.google.com', '57076400453f1b0e1f913df424bcfd09.jpg'),
(9, 'Happiness', 'Always be happy with your own..', '', '8d7672799c6c4c53d805a51ca7df60ed.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_number` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_birthday` varchar(30) NOT NULL,
  `user_work` varchar(20) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_religion` varchar(20) NOT NULL,
  `user_country` varchar(20) NOT NULL,
  `user_loves` text NOT NULL,
  `user_about` text NOT NULL,
  `user_address` text NOT NULL,
  `user_image_address` varchar(70) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_number`, `user_email`, `user_password`, `user_birthday`, `user_work`, `user_gender`, `user_religion`, `user_country`, `user_loves`, `user_about`, `user_address`, `user_image_address`) VALUES
(1, 'Iftekhar', '+8801946522456', 'example@example.com', 'MTIzNDU2ZW1vbiMxMW1hcmNoIzE5OTchQCRXQA==', '1June1995', 'Student', 'Male', 'Islam', 'Bangladesh', 'Books', 'A simple boy.', 'Khalishpur,khulna,Bangladesh', '7023b50b2afb19b5690331b0b2efe1e4.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
