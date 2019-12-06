-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 02:14 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagery`
--

CREATE TABLE `catagery` (
  `id` int(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagery`
--

INSERT INTO `catagery` (`id`, `title`) VALUES
(1, 'App Development'),
(3, 'IOS Development'),
(5, 'Non Tech'),
(4, 'Security'),
(2, 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `user_id`, `post_id`) VALUES
(3, 'cghjkl;1111112', 26, 7),
(5, 'nice', 25, 7),
(7, 'Testing comment feature', 32, 9),
(8, 'ok', 32, 7),
(9, 'ok', 32, 10),
(10, 'Testing', 25, 7);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(255) NOT NULL,
  `title` varchar(45) NOT NULL,
  `detail` varchar(2000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `catagery` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `detail`, `image`, `catagery`, `status`, `user_id`) VALUES
(7, 'post 1', 'I am graduated in Computer Science from the National University of Computer and Emerging Science (FAST University). I can develop different types of web-based applications such as android or web applications using the latest frameworks in any domain like C/C++, Java, PHP, etc. I have done numerous project so thatâ€™s why I can work in a fast-paced environment to meet deadlines and project works are highly organized with a creative flair. I also use an efficient algorithm to enhance application performance by utilizing minimum space. On the other hand, my interest is working in Development, Programming at different levels, finding new ways to solve the problem.', 'Screenshot (1).png', 'App Development', 1, 25),
(8, 'Security', 'dfsga', 'Screenshot (6).png', 'App Development', 1, 25),
(9, 'Post 3', 'I am graduated in Computer Science from the National University of Computer and Emerging Science (FAST University). I can develop different types of web-based applications such as android or web applications using the latest frameworks in any domain like C/C++, Java, PHP, etc. I have done numerous project so thatâ€™s why I can work in a fast-paced environment to meet deadlines and project works are highly organized with a creative flair. I also use an efficient algorithm to enhance application performance by utilizing minimum space. On the other hand, my interest is working in Development, Programming at different levels, finding new ways to solve the problem. ', '67803210_1090660981137719_6385644568376770560_o.jpg', 'Web Development', 1, 26),
(10, 'Post 4', 'Only for testing post feature, thank you', 'IMG-20160418-WA0026.jpg', 'Non Tech', 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT current_timestamp(),
  `status` int(10) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `name`, `email`, `password`, `role`, `Date`, `status`, `img`) VALUES
(24, 'test1239', 'test@gmail.com', '123', 'user', '2019-12-03', 0, '0'),
(25, 'Shujha', 'shujha@gmail.com', '12', 'admin', '2019-12-03', 1, 'dp1.jpg'),
(26, 'Author Test', 'a@gmail.com', '12345', 'author', '2019-12-03', 0, '0'),
(27, 'Ali', 'ali@gmail.com', '1234', 'user', '2019-12-03', 1, '0'),
(29, 'abc', 'wdada@dad.asda', '1', 'author', '2019-12-04', 0, '0'),
(30, 'Rana Shujha Shabbir', 'shujha.shabbir@gmail.com', '1', 'admin', '2019-12-05', 1, 'fiverr.jpg'),
(32, 'Ali', 'ali1@gmail.com', '1', 'author', '2019-12-06', 1, 'IMG-20160418-WA0023.jpg'),
(33, 'akak', 'ali12345678@gmail.com', '1', 'author', '2019-12-06', 0, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagery`
--
ALTER TABLE `catagery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagery`
--
ALTER TABLE `catagery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
