-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2019 lúc 10:47 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btn01`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `Binhluan` varchar(500) COLLATE utf8_bin NOT NULL,
  `ippost` int(11) NOT NULL,
  `timeCMT` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `userId`, `Binhluan`, `ippost`, `timeCMT`) VALUES
(1, 6, 'bin bin bin', 10, '2019-12-23 05:04:35'),
(2, 5, 'm mới gà', 10, '2019-12-23 05:04:35'),
(3, 12, '0', 14, '2019-12-23 05:04:35'),
(4, 6, 'Hello', 10, '2019-12-23 05:04:35'),
(5, 6, 'asdasd', 37, '2019-12-23 05:04:35'),
(6, 6, 'asdasd', 37, '2019-12-23 05:04:35'),
(10, 6, 'asd\r\n', 37, '2019-12-23 05:04:35'),
(11, 6, 'dddd', 38, '2019-12-23 05:04:35'),
(12, 6, 'ddddddd', 38, '2019-12-23 05:04:35'),
(13, 6, 'dddddddddddddd', 38, '2019-12-23 05:04:35'),
(15, 6, '', 38, '2019-12-23 05:04:35'),
(16, 6, 'hihi', 36, '2019-12-23 05:04:35'),
(17, 6, 'abc', 44, '2019-12-23 05:04:35'),
(18, 6, 'asd', 42, '2019-12-23 05:08:02'),
(19, 6, 'asd', 45, '2019-12-23 07:52:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `friends`
--

CREATE TABLE `friends` (
  `user1id` int(11) NOT NULL,
  `user2id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `friends`
--

INSERT INTO `friends` (`user1id`, `user2id`, `createdAt`) VALUES
(1, 2, '2018-12-31 14:47:46'),
(6, 1, '2018-12-31 14:49:54'),
(6, 2, '2018-12-14 21:55:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like`
--

CREATE TABLE `like` (
  `user1id` int(11) NOT NULL,
  `user2id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `passwordnew`
--

CREATE TABLE `passwordnew` (
  `id_rest` int(11) NOT NULL,
  `secret` varchar(255) COLLATE utf8_bin NOT NULL,
  `userid` int(11) NOT NULL,
  `createAt` datetime NOT NULL,
  `used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `passwordnew`
--

INSERT INTO `passwordnew` (`id_rest`, `secret`, `userid`, `createAt`, `used`) VALUES
(1, 'yQgIqvmro6', 10, '0000-00-00 00:00:00', 0),
(2, '48PDSair1m', 10, '0000-00-00 00:00:00', 0),
(3, '3urzYiv8hY', 10, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `userId` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `imageS` varchar(1024) NOT NULL,
  `likeS` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `content`, `userId`, `createdAt`, `imageS`, `likeS`) VALUES
(46, 'asd', 6, '2019-12-23 07:23:45', '2.jpg', 6),
(45, '', 1, '2019-12-23 07:45:28', '', 1),
(44, 'Thuc tap PHP', 6, '2019-12-20 07:16:07', '1.jpg', 0),
(43, 'ff', 6, '2019-12-17 06:38:38', '2.jpg', 0),
(42, 'aaaa', 6, '2019-12-17 06:38:28', '', 0),
(41, 'a', 6, '2019-12-17 04:31:56', '1.jpg', 0),
(40, '', 6, '2019-12-17 04:31:45', 'K5HOD6F.jpg', 0),
(39, 'aaaa', 6, '2019-12-17 04:21:41', '', 0),
(38, 'asdasd', 6, '2019-12-11 07:06:55', '1.jpg', 0),
(37, 'asdasdasd', 6, '2019-12-11 07:01:02', '', 0),
(36, 'hihiii', 6, '2019-12-11 07:00:49', '', 0),
(10, 'hehehehe', 6, '2019-12-11 06:07:29', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `displayName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `namsinh` year(4) NOT NULL,
  `image` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `displayName`, `email`, `password`, `sdt`, `namsinh`, `image`) VALUES
(1, 'Lý Văn Tèo', 'teo@gmail.com', '$2y$10$wrSR9sUwmpiEK//s7Fd4v.5GK.LYGnhVzTdjRJbYZTHhgDjAagylq', 0, 0000, '1.jpg'),
(2, 'Tô Bích Nụ', 'nu@gmail.com', '$2y$10$451oJq.gw8MlFqdvgo2Bku6rN0EharRegnh6aONcHxrwHE6NxXj1K', 0, 0000, '123123.jpg'),
(3, 'Lý Thị Mơ', 'mo@gmail.com', '$2y$10$PMlEIuXG67vVSenWqhirT.W39cM/m6z3JTrtyNbuQfR0NdYh4mzpi', 0, 0000, ''),
(4, 'phong', 'phongcao@yahoo.com', '123456', 0, 1998, ''),
(5, 'phongphong', 'phongphong@yahoo.com', '$2y$10$b0bQfO1B1OP9ZVJJisCRweq6XnWUnzyVE1Sul0Who/2M3gyBxN01q', 0, 1998, '123123.jpg'),
(6, 'Cao Thiên Phong', 'itachisama72@yahoo.com', '$2y$10$CX3OpZL/OzdCFl4irbkxgu/0KQ8OkYpULkMnJshjhVw/g5wrXNfMy', 16, 1998, '123123.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`user1id`,`user2id`);

--
-- Chỉ mục cho bảng `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`user1id`,`user2id`);

--
-- Chỉ mục cho bảng `passwordnew`
--
ALTER TABLE `passwordnew`
  ADD PRIMARY KEY (`id_rest`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `passwordnew`
--
ALTER TABLE `passwordnew`
  MODIFY `id_rest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
