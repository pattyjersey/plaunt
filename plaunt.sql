-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 04:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plaunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`, `date`) VALUES
(11, 22, 23, 'Great work :)', '2016-08-14 07:29:45'),
(12, 22, 25, 'ty', '2016-08-23 01:57:06'),
(13, 25, 39, 'hi', '2018-07-24 09:34:26'),
(14, 25, 39, 'pozzzzzzzzzzzzz', '2018-07-24 09:39:49'),
(15, 26, 39, 'select * from', '2018-07-24 09:41:04'),
(16, 27, 42, 'adsasdad', '2018-11-17 12:42:43'),
(17, 127, 25, 'Wow', '2022-03-02 05:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `parrent_msg_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `msg_sub` varchar(200) NOT NULL,
  `msg_topic` varchar(300) NOT NULL,
  `reply` varchar(300) NOT NULL,
  `status` varchar(30) NOT NULL,
  `msg_type` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `parrent_msg_id`, `sender`, `receiver`, `msg_sub`, `msg_topic`, `reply`, `status`, `msg_type`, `msg_date`) VALUES
(37, 0, 5, 5, 'Hi', 'hello', 'no_reply', 'read', 'parent', '2016-08-05 20:20:50'),
(38, 0, 5, 1, 'Hi', 'Hi mahbub you are so swett', 'no_reply', 'read', 'parent', '2016-08-05 20:21:24'),
(39, 0, 5, 1, 'Hello', 'You are cool', 'no_reply', 'read', 'parent', '2016-08-05 20:22:52'),
(40, 0, 1, 1, 'hi prapty', 'kemon acho', 'no_reply', 'read', 'parent', '2016-08-10 15:41:09'),
(41, 0, 1, 5, 'Hi prapty', 'kemon acho?', 'no_reply', 'read', 'parent', '2016-08-10 15:40:43'),
(42, 41, 5, 1, '', '', 'valo achi tumi kemon acho?', 'read', 'reply', '2016-08-10 15:40:55'),
(43, 41, 1, 5, '', '', 'eito achi motamoti', 'read', 'reply', '2016-08-10 15:41:25'),
(44, 0, 20, 21, 'Hi', 'How are you?', 'no_reply', 'read', 'parent', '2016-08-13 15:37:26'),
(45, 0, 23, 20, 'Hello', 'hi, its a great project.\r\nnice work :)', 'no_reply', 'read', 'parent', '2016-08-14 07:30:34'),
(46, 45, 20, 23, '', '', 'Hi vhaiya', 'read', 'reply', '2016-08-14 07:30:40'),
(47, 45, 23, 20, '', '', ':)\r\n', 'read', 'reply', '2016-08-14 07:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `plant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plant_title` text NOT NULL,
  `plant_content` text NOT NULL,
  `plant_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `plant_water` text NOT NULL,
  `plant_watered` text NOT NULL,
  `plant_soil` text NOT NULL,
  `plant_sun` text NOT NULL,
  `plant_plant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_water` text NOT NULL,
  `post_watered` text NOT NULL,
  `post_soil` text NOT NULL,
  `post_sun` text NOT NULL,
  `post_plant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `topic_id`, `post_title`, `post_content`, `post_date`, `post_water`, `post_watered`, `post_soil`, `post_sun`, `post_plant`) VALUES
(127, 22, 6, 'asdasd', 'sasdasda', '2022-02-27 07:43:18', '23', 'last year', 'Damp', 'Direct Sunlight', 'AAV ? (1).png'),
(128, 25, 6, 'asdsdd', 'haha', '2022-03-02 05:54:32', '3', 'Tuesday', 'Damp', 'Direct Sunlight', 'Screenshot (137).png'),
(129, 51, 8, 'Cactus', 'henlo', '2022-03-02 06:11:49', '3', '2022-03-02', 'Not Damp', 'Direct Sunlight', 'Screenshot (16).png'),
(160, 51, 8, 'asdsadsad', 'asdasdasd', '2022-03-13 14:09:05', '2', '2022-03-03', 'Not Damp', 'Direct Sunlight', '275628822_4756906474437315_7523258931607563897_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_title`) VALUES
(6, 'Show & Tell'),
(7, 'Question & Answer'),
(8, 'Buy & Sell');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_country` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_b_day` date NOT NULL,
  `user_image` text NOT NULL,
  `register_date` date NOT NULL,
  `last_login` date NOT NULL,
  `status` text NOT NULL,
  `verification_code` int(100) NOT NULL,
  `posts` text NOT NULL,
  `user_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_b_day`, `user_image`, `register_date`, `last_login`, `status`, `verification_code`, `posts`, `user_role`) VALUES
(22, 'Mahbubur Rahman', 'lieu10ant', 'mahbuburrahmanmihir@gmail.com', 'Bangladesh', 'Male', '2016-08-13', '22POGS.png', '2016-08-13', '2016-08-13', 'verified', 1836886117, 'Yes', 'subscriber'),
(23, 'Aion', '01838424797', 'mainul.aion@gmail.com', 'Bangladesh', 'Male', '1993-03-11', '2302_Dokan Blog Post.png', '2016-08-14', '2016-08-14', 'verified', 1160617070, 'No', 'subscriber'),
(24, 'ouzhan', 'qweqwe312', 'qweqwe312@hotmail.com', 'United States', 'Male', '1996-05-05', 'default.jpg', '2016-08-22', '2016-08-22', 'unverified', 560061542, 'No', 'subscriber'),
(25, 'oguzz', 'qweqwe312', 'uguro276@gmail.com', 'Australia', 'Male', '1995-12-31', 'default.jpg', '2016-08-22', '2016-08-22', 'verified', 148386299, 'Yes', 'subscriber'),
(26, 'test', 'testtest', 'test@test.com', 'United States', 'Male', '1997-12-06', 'default.jpg', '2016-12-12', '2016-12-12', 'unverified', 455306210, 'No', 'subscriber'),
(27, 'serega', 'sereganator', 'serega@gmail.com', 'Australia', 'Male', '1995-03-16', 'default.jpg', '2017-02-14', '2017-02-14', 'unverified', 1045391388, 'No', 'subscriber'),
(28, 'sergio', '19951673', 'serega7425@yandex.ru', 'Australia', 'Male', '1995-03-16', 'default.jpg', '2017-02-14', '2017-02-14', 'verified', 994297259, 'No', 'subscriber'),
(29, 'naser', '201010aa', 'naser202640@gmail.com', 'Australia', 'Male', '1987-11-11', 'default.jpg', '2017-05-02', '2017-05-02', 'verified', 1185957613, 'No', 'subscriber'),
(30, 'oodie', 'msaintb8', 'oodieboy@gmail.com', 'United States', 'Male', '1986-02-01', 'default.jpg', '2017-05-27', '2017-05-27', 'verified', 200162462, 'Yes', 'subscriber'),
(31, 'Dmitriy Kurovsky', '16092001n', 'dmitriy_kurovsky@ukr.net', 'Australia', 'Male', '2001-09-16', 'default.jpg', '2017-06-30', '2017-06-30', 'verified', 1194611725, 'No', 'subscriber'),
(32, 'shorouqElewa', 'shosho114', 'shorouqelewa@gmail.com', 'Australia', 'Female', '1994-04-11', 'default.jpg', '2017-07-13', '2017-07-13', 'verified', 439301662, 'No', 'subscriber'),
(33, 'oodie', 'megatronics', 'kiba008@gmail.com', 'Bangladesh', 'Male', '1986-02-01', '33iconmonstr-thumb-10-16.png', '2017-07-26', '2017-07-26', 'verified', 918579238, 'No', 'subscriber'),
(34, 'vincent', 'nwaokorie', 'vincentroman94@gmail.com', 'United States', 'Male', '0000-00-00', 'default.jpg', '2017-09-18', '2017-09-18', 'verified', 728188335, 'No', 'subscriber'),
(35, 'meymey', 'mey123mey', 'meymey@gmail.com', 'United Kingdom', 'Male', '1993-12-24', 'default.jpg', '2017-10-12', '2017-10-12', 'unverified', 539846725, 'No', 'subscriber'),
(36, 'abhishek verma', 'abhi1994', 'abhishek273b@gmail.com', 'Bangladesh', 'Male', '2018-04-05', 'default.jpg', '2018-04-04', '2018-04-04', 'verified', 1695663150, 'No', 'subscriber'),
(37, 'sdfsdfsdf', 'sdfsdfsdf', 'sdfsdfsdf@mailinator.com', 'Australia', 'Male', '1990-02-02', 'default.jpg', '2018-04-17', '2018-04-17', 'verified', 1959507624, 'No', 'subscriber'),
(38, 'test', 'vlada7482', 'test@mail.com', 'Australia', 'Male', '2018-04-24', 'default.jpg', '2018-07-24', '2018-07-24', 'unverified', 704750191, 'No', 'subscriber'),
(39, 'vlada', 'vlada7482', 'vladimir_dj@mail.com', 'Australia', 'Male', '1982-04-07', 'default.jpg', '2018-07-24', '2018-07-24', 'verified', 1085092428, 'Yes', 'subscriber'),
(40, 'basar', '123456789', 'skbasarpvt@gmail.com', 'United States', 'Male', '2018-08-02', '40pp.jpg', '2018-08-02', '2018-08-02', 'verified', 1082975531, 'No', 'subscriber'),
(41, 'asdasd', 'asdasdasd', 'asdasd@gmail.com', 'Australia', 'Male', '1988-10-10', 'default.jpg', '2018-11-17', '2018-11-17', 'unverified', 2095279931, 'No', 'subscriber'),
(42, 'juan', '16778696-0', 'naturanabol@gmail.com', 'United Kingdom', 'Male', '1988-10-08', 'default.jpg', '2018-11-17', '2018-11-17', 'verified', 1496109153, 'Yes', 'subscriber'),
(43, 'SAS sis', '23042000Aa', 'gianmaria@gmail.com', 'United Kingdom', 'Male', '2000-02-01', 'default.jpg', '2019-01-22', '2019-01-22', 'unverified', 646777139, 'No', 'subscriber'),
(44, 'teste', '12345678', 'jo@o.com', 'Australia', 'Male', '1997-05-20', 'default.jpg', '2019-02-10', '2019-02-10', 'unverified', 1922191212, 'No', 'subscriber'),
(45, 'teste', '12345678', 'jaoteixeira12@gmail.com', 'Australia', 'Male', '1997-05-20', 'default.jpg', '2019-02-10', '2019-02-10', 'unverified', 213875218, 'No', 'subscriber'),
(46, 'Matan', 'jmq83183j', 'Matanc98@gmail.com', 'United States', 'Male', '2013-07-09', 'default.jpg', '2019-02-17', '2019-02-17', 'unverified', 28028873, 'No', 'subscriber'),
(47, 'ubong', 'ubongetuk', 'ubetuk82@gmail.com', 'United Kingdom', 'Male', '1987-02-23', 'default.jpg', '2019-02-25', '2019-02-25', 'unverified', 114464420, 'No', 'subscriber'),
(48, 'test2', 'test2test2', 'test2@test2.com', 'United States', 'Male', '1985-05-05', 'default.jpg', '2019-02-28', '2019-02-28', 'unverified', 1125133362, 'No', 'subscriber'),
(49, 'Tihomir', 'tisho1986', 'tihomir.rankov@gmail.com', 'United Kingdom', 'Male', '1984-12-05', 'default.jpg', '2019-02-28', '2019-02-28', 'verified', 954346384, 'Yes', 'subscriber'),
(50, 'Allan Andrew Villanueva', 'andrew123', 'allanandrew.villanueva@gmail.com', '', 'Male', '2022-02-02', '501.png.png', '2022-02-21', '2022-02-21', 'unverified', 1491603715, 'Yes', ''),
(51, 'John Louis Mariano', 'whoareyou', 'johnlouisxd@gmail.com', '', 'Male', '2000-02-25', '51FAsUn3HVgAkyho4.jpg', '2022-03-02', '2022-03-02', 'verified ', 10399465, 'Yes', 'subscriber'),
(52, 'asdasd', 'sdfasdasdasd', 'jhnlsmrn@gmail.com', '', 'Male', '0000-00-00', 'default.jpg', '2022-03-11', '2022-03-11', 'unverified', 748060549, 'No', 'subscriber'),
(53, 'dfghdsgd', 'sdfssdfgd', 'jjjjj@gmail.com', '', 'Female', '0000-00-00', 'default.jpg', '2022-03-11', '2022-03-11', 'unverified', 233860268, 'No', 'subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
