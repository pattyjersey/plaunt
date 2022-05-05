-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2022 at 02:56 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16700444_plaunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_user_id` text NOT NULL,
  `comment` varchar(100) NOT NULL,
  `cm_status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `parent_user_id`, `comment`, `cm_status`, `date`) VALUES
(52, 177, 51, '64', 'gandah', 'Read', '2022-05-05 01:12:41'),
(54, 177, 51, '64', 'hi', 'Read', '2022-05-05 01:26:22'),
(55, 182, 64, '51', 'love et', 'Read', '2022-05-05 02:41:00'),
(56, 182, 64, '51', 'wowww', 'Unread', '2022-05-05 02:41:50'),
(57, 183, 51, '57', 'wehhh', 'Unread', '2022-05-05 02:52:42'),
(58, 177, 51, '64', 'niceeee', 'Unread', '2022-05-05 02:52:52');

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
(65, 0, 57, 51, 'hi', 'hello', 'no_reply', 'read', 'parent', '2022-04-20 07:17:21'),
(66, 0, 51, 57, 'gfdgfg', 'gfdgdfg', 'no_reply', 'read', 'parent', '2022-04-22 11:44:12'),
(67, 65, 51, 57, '', '', 'dsafsf', 'read', 'reply', '2022-04-20 10:35:28'),
(68, 0, 51, 57, 'gfdgdf', 'gfdgdf', 'no_reply', 'read', 'parent', '2022-04-20 12:05:49'),
(69, 0, 57, 60, 'hoi', 'hoi', 'no_reply', 'read', 'parent', '2022-04-20 12:25:51'),
(70, 68, 57, 51, '', '', 'hiii', 'read', 'reply', '2022-04-20 12:08:19'),
(71, 68, 57, 51, '', '', 'hiii', 'read', 'reply', '2022-04-20 12:12:39'),
(72, 68, 57, 51, '', '', 'hiii', 'read', 'reply', '2022-04-20 12:13:14'),
(73, 68, 57, 51, '', '', 'hiii', 'read', 'reply', '2022-04-20 12:13:43'),
(74, 68, 57, 51, '', '', 'hiii', 'read', 'reply', '2022-04-20 12:14:07'),
(75, 69, 57, 60, '', '', 'hoy', 'read', 'reply', '2022-04-20 12:25:58'),
(76, 65, 51, 57, '', '', 'huehue', 'read', 'reply', '2022-04-20 14:30:52'),
(77, 0, 57, 51, 'buy', 'Sisz how much?', 'no_reply', 'read', 'parent', '2022-04-22 11:36:33'),
(78, 68, 57, 51, '', '', 'hi', 'read', 'reply', '2022-04-22 10:24:46'),
(79, 77, 51, 57, '', '', 'Php 18,000', 'read', 'reply', '2022-04-22 11:39:16'),
(80, 0, 57, 51, 'cactus', 'how much is the cactus?', 'no_reply', 'read', 'parent', '2022-04-24 10:00:34'),
(81, 68, 57, 51, '', '', 'wowwwwww ganon', 'read', 'reply', '2022-04-24 10:00:57'),
(82, 0, 64, 51, 'cactus', 'hi :)', 'no_reply', 'read', 'parent', '2022-04-25 06:38:58'),
(83, 82, 64, 51, '', '', 'hello :)', 'read', 'reply', '2022-04-25 06:39:13'),
(84, 0, 64, 62, 'hi', 'hi', 'no_reply', 'read', 'parent', '2022-04-25 06:46:29'),
(85, 0, 64, 65, 'hi', 'hi', 'no_reply', 'read', 'parent', '2022-04-25 06:48:06'),
(86, 84, 62, 64, '', '', 'Hello', 'read', 'reply', '2022-04-25 06:47:55'),
(87, 0, 62, 64, 'hello', 'Hello', 'no_reply', 'read', 'parent', '2022-04-25 07:03:47');

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
  `plant_temperature` text NOT NULL,
  `plant_required` text NOT NULL,
  `plant_plant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`plant_id`, `user_id`, `plant_title`, `plant_content`, `plant_date`, `plant_water`, `plant_watered`, `plant_soil`, `plant_sun`, `plant_temperature`, `plant_required`, `plant_plant`) VALUES
(12, 64, 'water', 'lalalalala', '2022-05-03 07:42:42', '(3) Thric', '2022-05-12', 'Others', 'Others', 'Others', 'Others', 'twaoh.jpeg'),
(17, 57, 'yey', 'dsfsdfsdfsdf', '2022-05-04 07:20:39', 'More than 5', '2022-05-04', 'Clay soil', 'Direct Sunlight', '(24 - 45°C) Indoor and Outdoor Plants', 'All day', 'trolls.jpg');

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
  `post_temperature` text NOT NULL,
  `post_required` text NOT NULL,
  `post_plant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `topic_id`, `post_title`, `post_content`, `post_date`, `post_water`, `post_watered`, `post_soil`, `post_sun`, `post_temperature`, `post_required`, `post_plant`) VALUES
(165, 51, 6, 'Snake Plant', 'A succulent with hard, thick leaves that thrives in dry soil. It has long leaves with straight yellow edges, that can grow up to a meter. It is a very durable plant, so it is recommended for beginners.', '2022-04-29 08:13:10', '(1) Once', '2022-03-17', 'Damp', 'Indirect Sunlight', '(24 - 45°C) Indoor and Outdoor Plants', 'All day', 'plant2.jpeg'),
(166, 51, 8, 'Eugenia', 'SELLING: Eugenia plant\r\n\r\nEugenia prefers a moist, well-drained soil. Pick a big pot with a lot of holes in the bottom. To promote porosity, use a decent potting soil with a few handfuls of sand added. Young plants may require staking at first, and if you want the plant to grow into a conventional tree, you can cut it down to just one leader.', '2022-04-29 08:13:23', '(1) Once', '2022-03-17', 'Damp', 'Direct Sunlight', '(24 - 45°C) Indoor and Outdoor Plants', 'All day', 'eugenia.jpeg'),
(167, 51, 8, 'Kalachuchi', 'SELLING: KALACHUCHI. This plant is versatile—you can place it in a pot, plant it as a tree, or be grown like a bonsai. Place it in a semi-shady or in a fully sunny area. Comment or PM for price.', '2022-04-29 08:13:29', '(1) Once', '2022-03-18', 'Damp', 'Direct Sunlight', '(24 - 45°C) Indoor and Outdoor Plants', 'All day', 'kalachuchi_tree_pink_flowers_1621512349_ba978219.jpeg'),
(168, 51, 7, 'Rhapis Palm / Lady Palm', 'Hanggang saan po ang tangkad ng lady palm tree? Hehe', '2022-04-29 08:13:52', '(1) Once', '2022-03-17', 'Not Damp', 'Direct Sunlight', '(24 - 45°C) Indoor and Outdoor Plants', 'All day', 'PA-R-EXCE-7.jpg'),
(173, 60, 6, 'Echeveria', 'henlo im a tiny plant', '2022-04-29 08:14:05', '(1) Once', '2022-04-20', 'Loam', 'Direct Sunlight', '(24 - 45°C) Indoor and Outdoor Plants', 'All day', 'ef0b120b19c1557fdbe7b21811738c3e.jpg'),
(177, 64, 6, 'lady palm', 'This is a palm', '2022-04-29 08:14:16', '(1) Once', '2022-04-25', 'Clay soil', 'Direct Sunlight', '(24 - 45°C) Indoor and Outdoor Plants', 'All day', 'received_288841046640432.jpeg'),
(182, 51, 6, 'Caladium', 'They require enough of bright, yet indirect, light to thrive when planted inside. They prefer shade to dappled sunlight if planted outside. The vivid hues will fade if there is too much light. These plants prefer their rich, well-draining soil to be kept evenly moist but never soggy during the growing season.', '2022-05-02 09:15:05', '', '2022-05-02', 'Clay soil', 'Direct Sunlight', '(24 - 45°C) Indoor and Outdoor Plants', 'Afternoon', 'lanrr.jpg'),
(183, 57, 6, 'Cactus', 'nice plant', '2022-05-02 11:18:14', '(1) Once', '2022-05-03', 'Clay soil', 'Direct Sunlight', '(15 - 24°) Indoor Plants', 'Morning', 'sun.jpg');

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
  `user_gender` varchar(100) NOT NULL,
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

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_gender`, `user_image`, `register_date`, `last_login`, `status`, `verification_code`, `posts`, `user_role`) VALUES
(51, 'Test Account', 'passTest2022', 'plaunt.test@gmail.com', 'I prefer not to say', '51image.jpeg', '2022-03-02', '2022-03-02', 'verified ', 10399465, 'Yes', 'subscriber'),
(57, 'Allan Andrew Villanueva', 'drew1234', 'allanandrew.villanueva@gmail.com', 'Male', '57plauntlogo.png', '2022-03-18', '2022-03-18', 'verified', 1557983759, 'Yes', 'subscriber'),
(58, 'Ma. Postura', 'dogactually', 'posturabonita@gmail.com', 'Female', 'default.jpg', '2022-03-18', '2022-03-18', 'verified', 745027549, 'No', 'subscriber'),
(59, 'Nori', 'hatdog123', 'tolentinonori@gmail.com', 'Male', 'default.jpg', '2022-04-20', '2022-04-20', 'verified', 1858915416, 'No', 'subscriber'),
(60, 'Kobe', 'Welcome1', 'kobebryanmercado@gmail.com', 'Male', 'default.jpg', '2022-04-20', '2022-04-20', 'verified', 250460873, 'Yes', 'subscriber'),
(62, 'Jane', 'abcdefghij', 'mrabena40@gmail.com', 'Female', '62jpslogo1.png', '2022-04-25', '2022-04-25', 'verified', 467033145, 'Yes', 'subscriber'),
(63, 'Jehan', 'jdb12345', 'jbulanadi@hau.edu.ph', 'Female', 'default.jpg', '2022-04-25', '2022-04-25', 'unverified', 1466616575, 'No', 'subscriber'),
(64, 'Allan Andrew Villanueva', 'drew1234', 'tfcaballa@gmail.com', 'Male', 'default.jpg', '2022-04-25', '2022-04-25', 'verified', 2110816317, 'Yes', 'subscriber'),
(65, 'Roni', '1234567890', 'telanrm@gmail.com', '---', '652.png', '2022-04-25', '2022-04-25', 'verified', 334347942, 'Yes', 'subscriber');

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
