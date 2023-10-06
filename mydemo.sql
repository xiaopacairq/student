-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2022-07-23 04:59:01
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydemo`
--

-- --------------------------------------------------------

--
-- 表的结构 `stu`
--

CREATE TABLE IF NOT EXISTS `stu` (
  `stu_no` int(11) NOT NULL AUTO_INCREMENT,
  `stu_name` varchar(30) NOT NULL,
  `gender` varchar(3) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `age` int(5) NOT NULL,
  `college` varchar(50) NOT NULL,
  PRIMARY KEY (`stu_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20003 ;

--
-- 转存表中的数据 `stu`
--

INSERT INTO `stu` (`stu_no`, `stu_name`, `gender`, `telephone`, `age`, `college`) VALUES
(20001, '小张', '男', '13415159639', 22, '土木工程学院'),
(20002, '小李', '男', '13415159640', 20, '土木工程学院 ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
