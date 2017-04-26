-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-26 18:30:40
-- 服务器版本： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `el`
--

-- --------------------------------------------------------

--
-- 表的结构 `el_user`
--

CREATE TABLE `el_user` (
  `uid` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` int(11) NOT NULL,
  `img` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL COMMENT '头像',
  `is_email` int(11) NOT NULL COMMENT '验证',
  `email` text NOT NULL,
  `info` longtext NOT NULL COMMENT '登入信息'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `el_user`
--
ALTER TABLE `el_user`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `el_user`
--
ALTER TABLE `el_user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
