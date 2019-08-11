-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 10, 2019 at 02:55 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chigap`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`, `is_parent`, `created_at`) VALUES
(13, 'برنامه نویسی', NULL, 1, 1565237664),
(14, 'بک اند ', 13, 1, 1565237674),
(15, 'کلاینت', 13, 0, 1565237682),
(16, 'اندروید', 13, 0, 1565237700),
(17, 'پی اچ پی', 14, 0, 1565237711),
(18, 'پایتون', 14, 0, 1565237723),
(19, 'سبک زندگی', NULL, 0, 1565237958);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT 0,
  `parent` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `body`, `is_parent`, `parent`, `status`, `created_at`) VALUES
(68, 18, 4, 'سلامی دوباره                                ', 0, NULL, 1, 1565423732),
(70, 18, 4, 'خیییییلیییی خوب بوداااااا', 1, NULL, 1, 1565424453),
(71, 18, 8, 'شسبشسلبش', 0, NULL, 1, 1565424815),
(72, 18, 4, 'شسبشسلبش', 1, NULL, 1, 1565424850),
(73, 18, 10, 'با ایران', 1, NULL, 1, 1565424927),
(74, 18, 10, 'بدون ایران', 1, NULL, 1, 1565424981),
(80, 18, 4, 'خیییییلیییی خوب بوداااااا', 1, 70, 1, 1565430442),
(81, 18, 8, 'چرا خوب بود ؟؟؟', 0, 80, 1, 1565430604);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `summery` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `writer` varchar(75) COLLATE utf8_persian_ci NOT NULL,
  `text` text COLLATE utf8_persian_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(250) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `summery`, `writer`, `text`, `cat_id`, `image`, `status`, `created_at`) VALUES
(18, 'تمرین های موثر برای کارهای روزمره', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. ', 'منتظری', '<p dir=\"rtl\"><span style=\"color:#e74c3c\">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;</span></p>\r\n\r\n<p dir=\"rtl\"><img alt=\"\" src=\"http://localhost:8080/alpha/panel/uploads/718206716.jpg\" style=\"height:167px; width:250px\" /></p>\r\n\r\n<p dir=\"rtl\">با توجه به تصویر بالا برای این موارد ما نیاز به تمارین زیر داریم :</p>\r\n\r\n<p dir=\"rtl\">*کار روی کد نویسی</p>\r\n\r\n<p dir=\"rtl\">*تمرین روی کد های از قبل نوشته شده&nbsp;</p>\r\n\r\n<p dir=\"rtl\">برای آشنایی بیشتر به&nbsp;<a href=\"www.chamedoon.com\" style=\"text-decoration:none\">لینک</a> مراجعه کنید.</p>\r\n', 19, 'uploads/293_تمرین های موثر برای کارهای روزمره.jpg', 0, 1565245790),
(22, 'آموزش ایجکس', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. ', 'منتظری', '<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;</p>\r\n', 15, 'uploads/520_.jpg', 0, 1565440817),
(23, 'عوامل شادابی', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. ', 'منتظری', '<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;</p>\r\n', 19, 'uploads/132_.jpg', 0, 1565440889),
(24, 'جاوا اسکریپت جلسه اول', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. ', 'منتظری', '<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;</p>\r\n', 15, 'uploads/265_.jpg', 0, 1565441024);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(75) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(75) COLLATE utf8_persian_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8_persian_ci NOT NULL DEFAULT 'user',
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `role`, `created_at`) VALUES
(4, 'mohammad', 'montazeriput95@gmail.com', '70352f41061eda4ff3c322094af068ba70c3b38b', NULL, 'admin', 1565002154),
(5, 'sfdsdfs', 'we@m.com', '123', NULL, 'user', 141414),
(8, 'ali', 'a@a.com', NULL, NULL, 'user', 1565363106),
(10, 'حسین', 'hosein@gmail.com', NULL, NULL, 'user', 1565424927);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_2` (`user_id`),
  ADD KEY `comments` (`parent`) USING BTREE,
  ADD KEY `comments_ibfk_1` (`post_id`) USING BTREE;

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories` (`cat_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`parent`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
