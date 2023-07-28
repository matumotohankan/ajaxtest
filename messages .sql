-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-07-12 03:39:26
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kansou`
--


CREATE DATABASE IF NOT EXISTS `kansou` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kansou`;
=======
-- 

-- --------------------------------------------------------

--
-- テーブルの構造 `messages`
--
-- 作成日時： 2023-07-11 05:24:13
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `no` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `fhone` int(12) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `visible` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `messages`
--

INSERT INTO `messages` (`no`, `name`, `email`, `fhone`, `age`, `message`, `created`, `visible`) VALUES
(1, 'セル', 'yaohongquan7@gmail.com', NULL, 0, 'ああああああ', '2023-07-11 08:09:35', 1),
(5, 'あ', 'yaohongquan7@gmail.com', NULL, 0, 'あああ', '2023-07-10 09:22:28', 1),
(7, 'あ', 'yaohongquan7@gmail.com', NULL, 25, 'a', '2023-07-10 09:30:26', 1),
(13, 'ベジータ', 'yaohongquan7@gmail.com', NULL, 0, 'ファイナルインパクト', '2023-07-11 07:50:38', 0),
(14, 'あｄｆはｈ', 'yaohongquan7@gmail.com', NULL, 0, 'がががががが', '2023-07-11 07:51:08', 1),
(15, 'ｓｆｇはえｈ', 'yaohongquan7@gmail.com', NULL, 0, 'あｓがへ', '2023-07-11 08:08:52', 1),
(16, 'さげｈんｗｒうぇんれｎ', 'だｂねくぁねｒ', NULL, 0, 'あｓｄｆｂなねｎ', '2023-07-11 08:09:13', 0),
(18, 'ああああ', 'あ', NULL, 0, 'ああああああああああ', '2023-07-11 08:34:52', 0),
(19, 'ある', 'だｂねくぁねｒ', NULL, 0, 'あああああああああああああああああああ', '2023-07-11 08:35:08', 0),
(20, 'ヴァージョン', '', NULL, 0, 'あえええええ', '2023-07-11 08:35:24', 1),
(21, 'ヴァージョン', '', NULL, 0, 'あえええええ', '2023-07-11 08:49:05', 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`no`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `messages`
--
ALTER TABLE `messages`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
