-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql
-- 生成日時: 2020 年 3 月 13 日 13:39
-- サーバのバージョン： 5.7.29
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `yuzunoha_sns`
--
CREATE DATABASE IF NOT EXISTS `yuzunoha_sns` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yuzunoha_sns`;

-- --------------------------------------------------------

--
-- テーブルの構造 `yuzunoha_sns_user`
--

CREATE TABLE `yuzunoha_sns_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` varchar(4000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(511) NOT NULL,
  `token` varchar(511) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `yuzunoha_sns_user`
--

INSERT INTO `yuzunoha_sns_user` (`id`, `name`, `bio`, `email`, `password_hash`, `token`, `created_at`, `updated_at`) VALUES
(14, 'd', 'd', 'd', '18ac3e7343f016890c510e93f935261169d9e3f565436429830faf0934f4f8e4', '519e5b1d0cf7dadf8aac4d31d401436501c1a6bbafde8c9a377b34eaee30b008', '2020-03-13 16:36:05', '2020-03-13 07:36:05'),
(15, 'e', 'e', 'e', '3f79bb7b435b05321651daefd374cdc681dc06faa65e374e38337b88ca046dea', '7818eab792b3f292bcb650a73408c2da1bbd8a9e1be367a3d4477dba9f842211', '2020-03-13 16:36:48', '2020-03-13 07:36:48'),
(16, 'f', 'f', 'f', '252f10c83610ebca1a059c0bae8255eba2f95be4d1d7bcfa89d7248a82d9f111', '80457ae2666b53fd563be49f81e506e0bc9e3e68f2575c475a15c79e9f1ff544', '2020-03-13 16:43:18', '2020-03-13 07:43:18'),
(17, 'g', 'g', 'g', 'cd0aa9856147b6c5b4ff2b7dfee5da20aa38253099ef1b4a64aced233c9afe29', '8195d36a75b78ea5fe7014efa51f2785c52c935a700f34294224fdc6141b9bfb', '2020-03-13 16:49:19', '2020-03-13 07:49:19'),
(18, 'a10', 'a10', 'a10', 'e80fb65ac70384bd8bab0358d60b7cbe96de5b2de7c095e0d8695852e9c673af', 'd23dd93a7fc92df0c0f4fb6e467c9087bd11de0867af6028500a7a5345c25569', '2020-03-13 18:34:19', '2020-03-13 09:34:19');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `yuzunoha_sns_user`
--
ALTER TABLE `yuzunoha_sns_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `yuzunoha_sns_user`
--
ALTER TABLE `yuzunoha_sns_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
