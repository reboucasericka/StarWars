-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 04:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starwars_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `request_details` text NOT NULL,
  `response_status` varchar(50) NOT NULL,
  `response_error` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `date_time`, `request_type`, `request_details`, `response_status`, `response_error`) VALUES
(1, '2025-01-25 10:38:11', 'GET', 'films', 'Sucesso', NULL),
(2, '2025-01-25 11:49:20', 'GET', 'films', 'Sucesso', NULL),
(3, '2025-01-25 11:49:29', 'GET', 'films', 'Sucesso', NULL),
(4, '2025-01-25 12:20:40', 'GET', 'films', 'Sucesso', NULL),
(5, '2025-01-25 12:20:52', 'GET', 'films', 'Sucesso', NULL),
(6, '2025-01-25 15:49:11', 'GET', 'films', 'Sucesso', NULL),
(15, '2025-01-26 03:23:01', 'GET', 'films', 'Sucesso', NULL),
(19, '2025-01-26 04:03:50', 'GET', 'films', 'Sucesso', NULL),
(26, '2025-01-26 09:35:22', 'GET', 'films/1', 'Sucesso', NULL),
(27, '2025-01-26 09:37:05', 'GET', 'films/<?= urlencode($movie[\'episode_id\']) ?>', 'Erro', 'null'),
(28, '2025-01-26 09:37:09', 'GET', 'films/<?= urlencode($movie[\'episode_id\']) ?>', 'Erro', 'null'),
(29, '2025-01-26 09:38:21', 'GET', 'films/<?= urlencode($movie[\'episode_id\']) ?>', 'Erro', 'null'),
(30, '2025-01-26 09:39:45', 'GET', 'films/1', 'Sucesso', NULL),
(31, '2025-01-26 09:42:49', 'GET', 'films/<?= urlencode($movie[\'episode_id\']) ?>', 'Erro', 'null'),
(32, '2025-01-26 09:44:05', 'GET', 'films', 'Sucesso', NULL),
(33, '2025-01-26 09:44:35', 'GET', 'films', 'Sucesso', NULL),
(34, '2025-01-26 09:44:43', 'GET', 'films', 'Sucesso', NULL),
(35, '2025-01-26 09:45:06', 'GET', 'films/<?= urlencode($movie[\'episode_id\']) ?>', 'Erro', 'null'),
(36, '2025-01-26 09:45:08', 'GET', 'films', 'Sucesso', NULL),
(37, '2025-01-26 09:45:37', 'GET', 'films', 'Sucesso', NULL),
(38, '2025-01-26 09:46:03', 'GET', 'films', 'Sucesso', NULL),
(39, '2025-01-26 09:49:33', 'GET', 'films', 'Sucesso', NULL),
(40, '2025-01-26 09:49:38', 'GET', 'films', 'Sucesso', NULL),
(41, '2025-01-26 09:49:39', 'GET', 'films/<?= urlencode($movie[\'episode_id\']) ?>', 'Erro', 'null'),
(42, '2025-01-26 09:49:40', 'GET', 'films', 'Sucesso', NULL),
(43, '2025-01-26 09:56:16', 'GET', 'films/1', 'Sucesso', NULL),
(44, '2025-01-26 09:56:16', 'GET', 'films', 'Sucesso', NULL),
(45, '2025-01-26 09:56:18', 'GET', 'films', 'Sucesso', NULL),
(46, '2025-01-26 10:06:04', 'GET', 'films', 'Sucesso', NULL),
(47, '2025-01-26 10:06:06', 'GET', 'films', 'Sucesso', NULL),
(48, '2025-01-26 10:06:08', 'GET', 'films/6', 'Sucesso', NULL),
(49, '2025-01-26 10:07:10', 'GET', 'films', 'Sucesso', NULL),
(50, '2025-01-26 10:07:10', 'GET', 'films', 'Sucesso', NULL),
(51, '2025-01-26 10:07:10', 'GET', 'films', 'Sucesso', NULL),
(52, '2025-01-26 10:07:11', 'GET', 'films', 'Sucesso', NULL),
(53, '2025-01-26 10:07:12', 'GET', 'films', 'Sucesso', NULL),
(54, '2025-01-26 10:07:12', 'GET', 'films', 'Sucesso', NULL),
(55, '2025-01-26 10:07:13', 'GET', 'films', 'Sucesso', NULL),
(56, '2025-01-26 10:07:14', 'GET', 'films', 'Sucesso', NULL),
(57, '2025-01-26 10:10:03', 'GET', 'films/6', 'Sucesso', NULL),
(58, '2025-01-26 10:10:18', 'GET', 'films/<?= urlencode($movie[\'episode_id\']) ?>', 'Erro', 'null'),
(59, '2025-01-26 10:10:28', 'GET', 'films/<?= urlencode($movie[\'episode_id\']) ?>', 'Erro', 'null'),
(60, '2025-01-26 10:10:28', 'GET', 'films/<?= urlencode($movie[\'episode_id\']) ?>', 'Erro', 'null'),
(61, '2025-01-26 10:10:33', 'GET', 'films', 'Sucesso', NULL),
(62, '2025-01-26 10:28:35', 'GET', 'films', 'Sucesso', NULL),
(63, '2025-01-26 10:28:38', 'GET', 'films/4', 'Sucesso', NULL),
(64, '2025-01-26 11:16:36', 'GET', 'films', 'Sucesso', NULL),
(65, '2025-01-26 11:25:51', 'GET', 'films', 'Sucesso', NULL),
(66, '2025-01-26 11:25:53', 'GET', 'films/4', 'Sucesso', NULL),
(67, '2025-01-26 11:26:12', 'GET', 'films', 'Sucesso', NULL),
(68, '2025-01-26 11:26:16', 'GET', 'films/6', 'Sucesso', NULL),
(69, '2025-01-26 11:33:09', 'GET', 'films/3', 'Sucesso', NULL),
(70, '2025-01-26 11:48:19', 'GET', 'films', 'Sucesso', NULL),
(71, '2025-01-26 11:48:22', 'GET', 'films/4', 'Sucesso', NULL),
(72, '2025-01-26 11:48:29', 'GET', 'films/4', 'Sucesso', NULL),
(73, '2025-01-26 11:48:29', 'GET', 'films/4', 'Sucesso', NULL),
(74, '2025-01-26 11:48:29', 'GET', 'films/4', 'Sucesso', NULL),
(75, '2025-01-26 11:48:30', 'GET', 'films/4', 'Sucesso', NULL),
(76, '2025-01-26 11:48:30', 'GET', 'films/4', 'Sucesso', NULL),
(77, '2025-01-26 11:48:30', 'GET', 'films/4', 'Sucesso', NULL),
(78, '2025-01-26 11:48:30', 'GET', 'films/4', 'Sucesso', NULL),
(79, '2025-01-26 11:48:30', 'GET', 'films/4', 'Sucesso', NULL),
(80, '2025-01-26 11:48:44', 'GET', 'films/4', 'Sucesso', NULL),
(81, '2025-01-26 11:53:40', 'GET', 'films/4', 'Sucesso', NULL),
(82, '2025-01-26 11:53:43', 'GET', 'films/4', 'Sucesso', NULL),
(83, '2025-01-26 11:55:16', 'GET', 'films', 'Sucesso', NULL),
(84, '2025-01-26 11:55:21', 'GET', 'films', 'Sucesso', NULL),
(85, '2025-01-26 11:55:23', 'GET', 'films/4', 'Sucesso', NULL),
(86, '2025-01-26 11:55:33', 'GET', 'films/4', 'Sucesso', NULL),
(87, '2025-01-26 11:57:19', 'GET', 'films/4', 'Sucesso', NULL),
(88, '2025-01-26 11:59:21', 'GET', 'films', 'Sucesso', NULL),
(89, '2025-01-26 11:59:24', 'GET', 'films/1', 'Sucesso', NULL),
(90, '2025-01-26 11:59:54', 'GET', 'films/1', 'Sucesso', NULL),
(91, '2025-01-26 12:00:11', 'GET', 'films/1', 'Sucesso', NULL),
(92, '2025-01-26 12:18:09', 'GET', 'films/1', 'Sucesso', NULL),
(93, '2025-01-26 12:18:20', 'GET', 'films/1', 'Sucesso', NULL),
(94, '2025-01-26 12:18:27', 'GET', 'films', 'Sucesso', NULL),
(95, '2025-01-26 12:18:32', 'GET', 'films', 'Sucesso', NULL),
(96, '2025-01-26 12:18:41', 'GET', 'films/5', 'Sucesso', NULL),
(97, '2025-01-26 12:18:48', 'GET', 'films', 'Sucesso', NULL),
(98, '2025-01-26 12:18:50', 'GET', 'films/3', 'Sucesso', NULL),
(99, '2025-01-26 12:19:01', 'GET', 'films', 'Sucesso', NULL),
(100, '2025-01-26 12:19:37', 'GET', 'films/1', 'Sucesso', NULL),
(101, '2025-01-26 12:20:52', 'GET', 'films', 'Sucesso', NULL),
(102, '2025-01-26 12:22:02', 'GET', 'films/4', 'Sucesso', NULL),
(103, '2025-01-26 12:40:53', 'GET', 'films', 'Sucesso', NULL),
(104, '2025-01-26 12:40:58', 'GET', 'films', 'Sucesso', NULL),
(105, '2025-01-26 12:41:30', 'GET', 'films', 'Sucesso', NULL),
(106, '2025-01-26 12:41:40', 'GET', 'films', 'Sucesso', NULL),
(107, '2025-01-26 12:45:16', 'GET', 'films', 'Sucesso', NULL),
(108, '2025-01-26 12:46:20', 'GET', 'films', 'Sucesso', NULL),
(109, '2025-01-26 12:46:28', 'GET', 'films/<?= urlencode($movie[\'episode_id\']) ?>', 'Erro', 'null'),
(110, '2025-01-26 12:46:32', 'GET', 'films', 'Sucesso', NULL),
(111, '2025-01-26 12:46:34', 'GET', 'films/4', 'Sucesso', NULL),
(112, '2025-01-26 12:46:37', 'GET', 'films/5', 'Sucesso', NULL),
(113, '2025-01-26 12:46:47', 'GET', 'films/5', 'Sucesso', NULL),
(114, '2025-01-26 12:47:11', 'GET', 'films/5', 'Sucesso', NULL),
(115, '2025-01-26 12:48:04', 'GET', 'films/5', 'Sucesso', NULL),
(116, '2025-01-26 12:48:05', 'GET', 'films', 'Sucesso', NULL),
(117, '2025-01-26 12:48:08', 'GET', 'films', 'Sucesso', NULL),
(118, '2025-01-26 12:48:20', 'GET', 'films', 'Sucesso', NULL),
(119, '2025-01-26 12:48:22', 'GET', 'films/5', 'Sucesso', NULL),
(120, '2025-01-26 12:48:39', 'GET', 'films/5', 'Sucesso', NULL),
(121, '2025-01-26 12:48:40', 'GET', 'films/5', 'Sucesso', NULL),
(122, '2025-01-26 12:48:40', 'GET', 'films/5', 'Sucesso', NULL),
(123, '2025-01-26 12:48:41', 'GET', 'films/5', 'Sucesso', NULL),
(124, '2025-01-26 12:48:42', 'GET', 'films', 'Sucesso', NULL),
(125, '2025-01-26 12:50:27', 'GET', 'films', 'Sucesso', NULL),
(126, '2025-01-26 12:50:31', 'GET', 'films/6', 'Sucesso', NULL),
(127, '2025-01-26 12:50:51', 'GET', 'films', 'Sucesso', NULL),
(128, '2025-01-26 12:51:13', 'GET', 'films', 'Sucesso', NULL),
(129, '2025-01-26 12:51:20', 'GET', 'films/1', 'Sucesso', NULL),
(130, '2025-01-26 12:51:22', 'GET', 'films', 'Sucesso', NULL),
(131, '2025-01-26 12:53:35', 'GET', 'films', 'Sucesso', NULL),
(132, '2025-01-26 13:59:24', 'GET', 'films', 'Sucesso', NULL),
(133, '2025-01-26 13:59:24', 'GET', 'films', 'Sucesso', NULL),
(134, '2025-01-26 14:02:06', 'GET', 'films', 'Sucesso', NULL),
(135, '2025-01-26 14:03:38', 'GET', 'films', 'Sucesso', NULL),
(136, '2025-01-26 14:04:46', 'GET', 'films', 'Sucesso', NULL),
(137, '2025-01-26 14:04:58', 'GET', 'films', 'Sucesso', NULL),
(138, '2025-01-26 14:18:26', 'GET', 'films', 'Sucesso', NULL),
(139, '2025-01-26 14:18:28', 'GET', 'films', 'Sucesso', NULL),
(140, '2025-01-26 14:18:28', 'GET', 'films', 'Sucesso', NULL),
(141, '2025-01-26 14:18:28', 'GET', 'films', 'Sucesso', NULL),
(142, '2025-01-26 14:18:29', 'GET', 'films', 'Sucesso', NULL),
(143, '2025-01-26 14:18:30', 'GET', 'films', 'Sucesso', NULL),
(144, '2025-01-26 14:18:30', 'GET', 'films', 'Sucesso', NULL),
(145, '2025-01-26 14:18:31', 'GET', 'films', 'Sucesso', NULL),
(146, '2025-01-26 14:18:31', 'GET', 'films', 'Sucesso', NULL),
(147, '2025-01-26 14:18:31', 'GET', 'films', 'Sucesso', NULL),
(148, '2025-01-26 14:18:33', 'GET', 'films', 'Sucesso', NULL),
(149, '2025-01-26 14:18:37', 'GET', 'films', 'Sucesso', NULL),
(150, '2025-01-26 14:18:47', 'GET', 'films/4', 'Sucesso', NULL),
(151, '2025-01-26 14:18:49', 'GET', 'films', 'Sucesso', NULL),
(152, '2025-01-26 14:18:51', 'GET', 'films/4', 'Sucesso', NULL),
(153, '2025-01-26 14:18:53', 'GET', 'films', 'Sucesso', NULL),
(154, '2025-01-26 14:19:17', 'GET', 'films', 'Sucesso', NULL),
(155, '2025-01-26 14:19:23', 'GET', 'films/<?= urlencode($movie[\'episode_id\']) ?>', 'Erro', 'null'),
(156, '2025-01-26 14:19:26', 'GET', 'films', 'Sucesso', NULL),
(157, '2025-01-26 14:22:28', 'GET', 'films', 'Sucesso', NULL),
(158, '2025-01-26 14:22:32', 'GET', 'films/4', 'Sucesso', NULL),
(159, '2025-01-26 14:22:35', 'GET', 'films', 'Sucesso', NULL),
(160, '2025-01-26 14:24:46', 'GET', 'films', 'Sucesso', NULL),
(161, '2025-01-26 14:24:48', 'GET', 'films/4', 'Sucesso', NULL),
(162, '2025-01-26 14:24:50', 'GET', 'films', 'Sucesso', NULL),
(163, '2025-01-26 14:24:51', 'GET', 'films/5', 'Sucesso', NULL),
(164, '2025-01-26 14:24:56', 'GET', 'films', 'Sucesso', NULL),
(165, '2025-01-26 14:26:21', 'GET', 'films/5', 'Sucesso', NULL),
(166, '2025-01-26 14:32:33', 'GET', 'films', 'Sucesso', NULL),
(167, '2025-01-26 14:32:35', 'GET', 'films/4', 'Sucesso', NULL),
(168, '2025-01-26 14:33:36', 'GET', 'films/4', 'Sucesso', NULL),
(169, '2025-01-26 14:33:40', 'GET', 'films', 'Sucesso', NULL),
(170, '2025-01-26 14:33:42', 'GET', 'films/6', 'Sucesso', NULL),
(171, '2025-01-26 14:37:19', 'GET', 'films/6', 'Sucesso', NULL),
(172, '2025-01-26 14:37:21', 'GET', 'films/6', 'Sucesso', NULL),
(173, '2025-01-26 14:37:27', 'GET', 'films', 'Sucesso', NULL),
(174, '2025-01-26 14:37:28', 'GET', 'films/1', 'Sucesso', NULL),
(175, '2025-01-26 14:38:50', 'GET', 'films', 'Sucesso', NULL),
(176, '2025-01-26 14:39:42', 'GET', 'films', 'Sucesso', NULL),
(177, '2025-01-26 14:39:50', 'GET', 'films', 'Sucesso', NULL),
(178, '2025-01-26 14:41:11', 'GET', 'films', 'Sucesso', NULL),
(179, '2025-01-26 14:41:13', 'GET', 'films', 'Sucesso', NULL),
(180, '2025-01-26 14:47:19', 'GET', 'films', 'Sucesso', NULL),
(181, '2025-01-26 14:49:37', 'GET', 'films', 'Sucesso', NULL),
(182, '2025-01-26 14:51:08', 'GET', 'films', 'Sucesso', NULL),
(183, '2025-01-26 14:51:13', 'GET', 'films', 'Sucesso', NULL),
(184, '2025-01-26 14:55:07', 'GET', 'films', 'Sucesso', NULL),
(185, '2025-01-26 14:55:55', 'GET', 'films', 'Sucesso', NULL),
(186, '2025-01-26 14:56:03', 'GET', 'films', 'Sucesso', NULL),
(187, '2025-01-26 14:56:25', 'GET', 'films', 'Sucesso', NULL),
(188, '2025-01-26 14:57:09', 'GET', 'films', 'Sucesso', NULL),
(189, '2025-01-26 14:57:17', 'GET', 'films', 'Sucesso', NULL),
(190, '2025-01-26 14:57:36', 'GET', 'films', 'Sucesso', NULL),
(191, '2025-01-26 14:57:39', 'GET', 'films', 'Sucesso', NULL),
(192, '2025-01-26 14:59:07', 'GET', 'films', 'Sucesso', NULL),
(193, '2025-01-26 14:59:22', 'GET', 'films', 'Sucesso', NULL),
(194, '2025-01-26 15:09:31', 'GET', 'films', 'Sucesso', NULL),
(195, '2025-01-26 15:10:05', 'GET', 'films', 'Sucesso', NULL),
(196, '2025-01-26 15:13:03', 'GET', 'films', 'Sucesso', NULL),
(197, '2025-01-26 15:15:16', 'GET', 'films', 'Sucesso', NULL),
(198, '2025-01-26 15:15:42', 'GET', 'films', 'Sucesso', NULL),
(199, '2025-01-26 15:17:21', 'GET', 'films', 'Sucesso', NULL),
(200, '2025-01-26 15:17:27', 'GET', 'films', 'Sucesso', NULL),
(201, '2025-01-26 15:17:45', 'GET', 'films', 'Sucesso', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
