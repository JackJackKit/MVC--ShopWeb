-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-11 17:32:15
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `shopping_order`
--

CREATE TABLE `shopping_order` (
  `id` int(11) NOT NULL,
  `item` int(3) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `notestatus` varchar(255) NOT NULL,
  `score` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `shopping_order`
--

INSERT INTO `shopping_order` (`id`, `item`, `product_id`, `quantity`, `notestatus`, `score`, `username`) VALUES
(1, 1, 2, 1, '已送達', '五顆星', '1'),
(2, 1, 2, 1, '已送達', '五顆星', '2'),
(3, 1, 2, 3, '已寄送', '', '1'),
(3, 2, 3, 6, '已寄送', '', '1'),
(3, 3, 4, 3, '已寄送', '', '1'),
(4, 1, 2, 1, '未處理訂單', '', '1'),
(5, 1, 2, 1, '未處理訂單', '', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `shopping_order`
--
ALTER TABLE `shopping_order`
  ADD PRIMARY KEY (`id`,`item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
