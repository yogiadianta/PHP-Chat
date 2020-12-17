-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 09:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rivchat`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `forgotten_answer` varchar(100) NOT NULL,
  `log_in` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile`, `user_country`, `user_gender`, `forgotten_answer`, `log_in`) VALUES
(5, 'Yogi Adianta Tarigan', '12345678', 'yogiadianta0@gmail.com', 'images/VE-Anne.png.275', 'us', 'male', '', 'Offline'),
(6, 'Adianta', '12345678', 'adiantayogi@gmail.com', 'images/profile2.jpg', 'us', 'male', '', 'Offline'),
(7, 'Tinik Ropelita 3', '11221122', 'tinik@tinik.com', 'images/Violet Evergarden.jpg.178', 'us', 'female', 'Yogi Adianta', 'Offline'),
(8, 'Laura Misi', '12345678', 'misi@misi.com', 'images/profile1.jpg', 'us', 'female', '', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `receiver_username` varchar(100) NOT NULL,
  `msg_content` varchar(255) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`) VALUES
(4, 'Yogi Adianta', 'Adianta', 'Yoo', 'read', '2020-07-24 10:01:47'),
(5, 'Adianta', 'Yogi Adianta', 'Yoo again', 'read', '2020-07-24 10:03:40'),
(6, 'Yogi Adianta', 'Adianta', 'Oke', 'read', '2020-07-24 10:09:13'),
(7, 'Yogi Adianta', 'Adianta', 'Oke', 'read', '2020-07-24 10:09:16'),
(8, 'Laura Misi', 'Tinik', 'Yoo Tin', 'unread', '2020-07-25 08:44:20'),
(9, 'Tinik Ropelita 3', 'Yogi Adianta Tarigan', 'Yooo Yogi', 'unread', '2020-07-25 15:57:26'),
(10, 'Tinik Ropelita 3', 'Adianta', 'Yoo Adianta', 'unread', '2020-07-25 15:57:38'),
(11, 'Tinik Ropelita 3', 'Laura Misi', 'Yoo Misi', 'unread', '2020-07-25 15:57:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
