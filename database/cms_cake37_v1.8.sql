-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 02:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_cake37`
--

-- --------------------------------------------------------

--
-- Table structure for table `acp_phinxlog`
--

CREATE TABLE `acp_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `article_category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT '1',
  `comment_count` int(11) DEFAULT NULL,
  `allow_comment` int(11) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `home` tinyint(1) DEFAULT '0',
  `featured` tinyint(1) DEFAULT '0',
  `tag` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article_category_id`, `user_id`, `image`, `uuid`, `images`, `view_count`, `comment_count`, `allow_comment`, `order`, `status`, `home`, `featured`, `tag`, `created`, `modified`) VALUES
(2, '2', 1, NULL, '6ae1e978-0003-4e16-b11e-08b22382d1f2', NULL, 1, NULL, 0, NULL, 0, 0, 0, NULL, '2019-04-24 15:56:50', '2019-04-24 16:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE `article_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `allowed_fields` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article_categories`
--

INSERT INTO `article_categories` (`id`, `parent_id`, `type`, `image`, `uuid`, `order`, `status`, `lft`, `rght`, `created`, `modified`, `allowed_fields`) VALUES
(2, NULL, '', NULL, '84ccc684-b14c-4d83-ad29-183eb81e3d22', 0, 1, 1, 2, '2019-04-24 15:56:36', '2019-04-24 16:15:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_categories_translations`
--

CREATE TABLE `article_categories_translations` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article_categories_translations`
--

INSERT INTO `article_categories_translations` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(4, 'vi', 'ArticleCategories', 2, 'title', '123'),
(5, 'vi', 'ArticleCategories', 2, 'slug', '123'),
(6, 'vi', 'ArticleCategories', 2, 'description', '123');

-- --------------------------------------------------------

--
-- Table structure for table `article_translations`
--

CREATE TABLE `article_translations` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article_translations`
--

INSERT INTO `article_translations` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(6, 'vi', 'Articles', 2, 'title', '123213'),
(7, 'vi', 'Articles', 2, 'slug', '123213'),
(8, 'vi', 'Articles', 2, 'slug_custom', '123'),
(9, 'vi', 'Articles', 2, 'description', '123'),
(10, 'vi', 'Articles', 2, 'content', '123');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `banner_category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_list` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_category_id`, `user_id`, `image`, `image_list`, `uuid`, `sort`, `status`, `created`, `modified`) VALUES
(1, '2', 1, 'home-banner.jpg', NULL, '55055b5b-7056-4c9b-b0cc-e87bdede7572', NULL, 1, '2019-04-03 12:58:18', '2019-04-03 12:58:18'),
(2, '2', 1, 'home-banner.jpg', NULL, 'f6ece74e-f143-488c-baa4-8f33c2b5633d', NULL, 1, '2019-04-03 12:59:26', '2019-04-03 12:59:26'),
(3, '4', 1, '.png', NULL, '80607998-984f-4b11-9e7a-789e565e5b7e', NULL, 1, '2019-04-03 13:29:11', '2019-04-03 13:29:11'),
(4, '4', 1, '.png', NULL, '056ef23c-74e1-4e05-87a5-58244844a26b', NULL, 1, '2019-04-03 13:29:24', '2019-04-03 13:29:24'),
(5, '4', 1, '.png', NULL, 'd4f09860-8d91-4f1d-b1e5-f46a813ce1b1', NULL, 1, '2019-04-03 13:29:39', '2019-04-03 13:29:39'),
(6, '5', 1, NULL, NULL, '6faf898a-e677-4f36-ae05-34c2f8bdf7e3', NULL, 1, '2019-04-03 13:32:29', '2019-04-04 14:06:05'),
(7, '6', 1, 'he-thong-loi.png', NULL, 'c380fd9e-d766-4784-8160-3bbae8c5cb57', NULL, 1, '2019-04-03 13:44:31', '2019-04-03 13:44:31'),
(8, '6', 1, 'phan-mem.png', NULL, 'c5e3b14d-45ed-4e2b-a955-f3f567b15186', NULL, 1, '2019-04-03 13:44:51', '2019-04-03 13:44:51'),
(9, '6', 1, 'diem-ban-hang.png', NULL, 'ee679a57-a1ce-4131-8e88-4e9dd21a4e2f', NULL, 1, '2019-04-03 13:45:09', '2019-04-03 13:45:09'),
(10, '6', 1, 'may-quay-so.png', NULL, '2faac40e-b774-4243-b43b-4da505202c2d', NULL, 1, '2019-04-03 13:45:25', '2019-04-03 13:45:25'),
(11, '7', 1, NULL, NULL, '81c64873-9bca-45a9-b279-6d39d53e924c', NULL, 1, '2019-04-03 13:48:57', '2019-04-03 13:48:57'),
(12, '8', 1, NULL, NULL, 'ef598c57-0f44-4833-99a0-f6671642884e', NULL, 1, '2019-04-03 13:50:44', '2019-04-03 13:50:44'),
(13, '9', 1, 'home-news-5.jpg', NULL, 'cd17cfe8-20cf-4125-b37b-d2e0a94c98c1', NULL, 1, '2019-04-03 13:55:57', '2019-04-03 13:55:57'),
(14, '9', 1, 'home-news-6.jpg', NULL, '9ad6447f-6c4b-41eb-a62c-1d9e61d8e07e', NULL, 1, '2019-04-03 13:56:15', '2019-04-03 13:56:15'),
(15, '10', 1, 'home-career-1.jpg', NULL, 'f3d59396-6a76-4477-ae08-826ff29d8582', NULL, 1, '2019-04-03 13:58:48', '2019-04-03 14:00:14'),
(16, '10', 1, 'home-career-2.jpg', NULL, '951cee1f-0c12-441d-9f0b-363b97328b89', NULL, 1, '2019-04-03 13:59:06', '2019-04-03 14:00:24'),
(17, '11', 1, NULL, NULL, '81467022-a68c-4b71-b8d7-6dbe92499284', NULL, 1, '2019-04-03 14:04:08', '2019-04-03 14:04:08'),
(18, '12', 1, NULL, NULL, '653b1f4f-281c-4140-a26e-f0541d39645e', NULL, 1, '2019-04-03 14:06:38', '2019-04-03 14:06:38'),
(19, '13', 1, NULL, NULL, '1802816e-0077-4f75-8144-b2f81c7daaef', NULL, 1, '2019-04-08 04:46:28', '2019-04-08 04:46:28'),
(20, '14', 1, '.jpg', NULL, '3291ab49-a873-427d-ade0-d61f2cc7785e', NULL, 1, '2019-04-08 04:49:41', '2019-04-08 04:49:41'),
(21, '14', 1, '.jpg', NULL, '7d1ebe3f-8177-44d8-b9e4-a77a74729c14', NULL, 1, '2019-04-08 04:50:02', '2019-04-08 04:50:02'),
(22, '14', 1, '.jpg', NULL, '79e0b332-302f-4a42-8678-9f798ed31853', NULL, 1, '2019-04-08 04:50:14', '2019-04-08 04:50:14'),
(23, '13', 1, '.jpg', NULL, 'f44b6e63-0eb0-4242-9152-e386479ba299', NULL, 1, '2019-04-08 04:54:45', '2019-04-08 04:54:45'),
(24, '15', 1, NULL, NULL, 'ed2c9179-2813-4e71-bca5-8336efda939d', NULL, 1, '2019-04-08 06:23:57', '2019-04-08 06:23:57'),
(25, '15', 1, '.jpg', NULL, 'd9cfaebb-6cbf-491a-aa94-650d830c1038', NULL, 1, '2019-04-08 06:24:41', '2019-04-08 06:24:41'),
(26, '16', 1, '.jpg', NULL, 'e1b28309-680b-47e1-a0d8-ee161d958833', NULL, 1, '2019-04-08 06:24:59', '2019-04-08 06:24:59'),
(27, '16', 1, '.jpg', NULL, '435cf8ab-9b52-4fd7-a75b-65438dd3b14e', NULL, 1, '2019-04-08 06:25:11', '2019-04-08 06:25:11'),
(28, '17', 1, NULL, NULL, 'd64f316a-2e24-4278-982d-c25772fd2e44', NULL, 1, '2019-04-08 06:39:21', '2019-04-08 06:40:27'),
(29, '17', 1, '.jpg', NULL, '86881409-1f5e-4130-bc9a-e9d42209222d', NULL, 1, '2019-04-08 06:41:19', '2019-04-08 06:41:19'),
(30, '18', 1, '.jpg', NULL, 'e8f2be7b-66c8-4a40-9c11-96a95851030d', NULL, 1, '2019-04-08 06:42:20', '2019-04-08 06:42:20'),
(31, '18', 1, '.jpg', NULL, '357de551-28a1-46ca-9d2f-0a874536c690', NULL, 1, '2019-04-08 06:42:35', '2019-04-08 06:42:35'),
(32, '18', 1, '.jpg', NULL, '9f90b34e-e0f0-4332-8c66-0d6c0fcde1b0', NULL, 1, '2019-04-08 06:42:52', '2019-04-08 06:42:52'),
(33, '18', 1, '.jpg', NULL, '621924b5-ec2a-47f2-a2f7-6c91b0e689f3', NULL, 1, '2019-04-08 06:43:04', '2019-04-08 06:43:04'),
(34, '19', 1, NULL, NULL, '281a6f21-b38d-467b-b994-40e7a6f2ede5', NULL, 1, '2019-04-08 07:04:36', '2019-04-08 07:04:36'),
(35, '19', 1, 'dia-chi.jpg', NULL, '698b10c9-7568-4f81-992c-ebef3b43accb', NULL, 1, '2019-04-08 07:05:09', '2019-04-08 07:06:32'),
(36, '19', 1, '.jpg', NULL, '1d61d548-306e-40c9-b656-0c09fa907a70', NULL, 1, '2019-04-08 07:06:51', '2019-04-08 07:06:51'),
(37, '19', 1, '.jpg', NULL, 'cf705253-a0c9-4e7c-aaf1-a36c3f146ca7', NULL, 1, '2019-04-08 07:07:25', '2019-04-08 10:10:01'),
(38, '20', 1, NULL, NULL, 'bce592c2-39d4-4787-9be4-fe5b948fa666', NULL, 1, '2019-04-09 06:47:48', '2019-04-09 06:47:48'),
(39, '21', 1, '.jpg', NULL, '3d158e86-36b0-4916-8113-18a3625af309', NULL, 1, '2019-04-09 06:52:42', '2019-04-09 06:52:42'),
(40, '21', 1, '.jpg', NULL, 'a7e15f66-2659-493c-9885-ef63f18391db', NULL, 1, '2019-04-09 06:52:54', '2019-04-09 06:52:54'),
(41, '21', 1, '.jpg', NULL, 'ab51cc04-c7b5-4285-9ab3-b9f3123e5242', NULL, 1, '2019-04-09 06:53:06', '2019-04-09 06:53:06'),
(42, '20', 1, '.jpg', NULL, 'ac3c28f2-d722-4a79-a0b0-8e998019dec5', NULL, 1, '2019-04-09 06:53:50', '2019-04-09 06:53:50'),
(43, '22', 1, 'server-systems.jpg', NULL, '3fdd5b39-ce1e-427b-9d50-1b7aa4b17cef', NULL, 1, '2019-04-09 07:02:44', '2019-04-09 07:02:44'),
(44, '22', 1, '.jpg', NULL, '13ff43e8-65d2-49a9-b390-7ebe05038b80', NULL, 1, '2019-04-09 07:03:35', '2019-04-09 07:03:35'),
(45, '23', 1, 'traditional-lottery-machines.jpg', NULL, '2d9028a3-b5ee-403b-9169-dd876ff32070', NULL, 1, '2019-04-09 07:25:02', '2019-04-09 07:25:02'),
(46, '24', 1, '.jpg', NULL, '7d7e4793-2ded-49f3-9f25-e5004db884ec', NULL, 1, '2019-04-09 07:25:24', '2019-04-09 07:25:24'),
(47, '24', 1, '.jpg', NULL, '47c758f0-cca4-4c79-a530-feb5e2c9f479', NULL, 1, '2019-04-09 07:25:36', '2019-04-09 07:25:36'),
(48, '25', 1, 'field-support.jpg', NULL, '2d73bc61-d825-48fd-bb6d-0c370d3e91f7', NULL, 1, '2019-04-09 07:33:27', '2019-04-09 07:33:27'),
(49, '25', 1, '.jpg', NULL, 'e4199bd5-b65c-420d-b12f-bcd7c904ae3d', NULL, 1, '2019-04-09 07:34:02', '2019-04-09 07:34:02'),
(50, '25', 1, '.jpg', NULL, '3a15ea3a-2c31-499d-af67-2bdad1168136', NULL, 1, '2019-04-09 07:34:28', '2019-04-09 07:34:28'),
(51, '25', 1, '.jpg', NULL, '88eb1d23-130b-43fa-ba09-2bd90e276eb9', NULL, 1, '2019-04-09 07:35:00', '2019-04-09 07:35:00'),
(52, '26', 1, 'phone-numbers.jpg', NULL, '3bcb93fa-fa1b-4244-9970-78a8b0ac0517', NULL, 1, '2019-04-09 07:46:23', '2019-04-09 07:47:25'),
(53, '26', 1, '.jpg', NULL, 'c22a3b5d-76b2-4d27-a0b4-f07ded5e24ce', NULL, 1, '2019-04-09 07:48:05', '2019-04-09 07:48:05'),
(54, '26', 1, '.jpg', NULL, '243ebf00-cf04-4ec1-9a17-3e4fda02ffe5', NULL, 1, '2019-04-09 07:48:27', '2019-04-09 07:48:27'),
(55, '27', 1, 'gaming-system.jpg', NULL, '780e07dc-68d8-4fd9-8477-b6db7862c118', NULL, 1, '2019-04-09 07:57:41', '2019-04-09 07:57:41'),
(56, '27', 1, '.jpg', NULL, 'b19364ff-e600-4339-97a4-77993a9bb970', NULL, 1, '2019-04-09 07:58:36', '2019-04-09 07:58:36'),
(57, '28', 1, '.jpg', NULL, '386dec70-2f0a-4265-a704-729a4a8cc5ab', NULL, 1, '2019-04-09 07:59:09', '2019-04-09 07:59:09'),
(58, '28', 1, '.jpg', NULL, 'ec5349a5-3fda-41e5-a23f-df561b0db98b', NULL, 1, '2019-04-09 07:59:19', '2019-04-09 07:59:19'),
(59, '29', 1, 'terminal.jpg', NULL, '55016e41-2be3-4c7c-ac49-2a69a73bfb95', NULL, 1, '2019-04-09 08:09:32', '2019-04-09 08:19:19'),
(60, '29', 1, '.jpg', NULL, 'd120bcfd-8c1e-440f-9567-73caa4aeb1db', NULL, 1, '2019-04-09 08:09:51', '2019-04-09 08:09:51'),
(61, '30', 1, '.jpg', NULL, '82638570-6f3b-476b-b443-ab1f300b5228', NULL, 1, '2019-04-09 08:10:32', '2019-04-09 08:10:32'),
(62, '30', 1, '.jpg', NULL, '630a9c24-0dff-4134-9afa-eb586ae84bdf', NULL, 1, '2019-04-09 08:11:08', '2019-04-09 08:11:08'),
(63, '31', 1, 'operating-management-solution.jpg', NULL, '5b10e783-db25-4385-bd30-ab3197b8b9b5', NULL, 1, '2019-04-09 09:01:30', '2019-04-09 09:01:30'),
(64, '32', 1, '.jpg', NULL, '484ab24b-8e02-4725-832c-a09bd2593523', NULL, 1, '2019-04-09 09:01:46', '2019-04-09 09:01:46'),
(65, '32', 1, NULL, NULL, '3f5516b7-9fba-4444-b851-a2f23b96db8d', NULL, 1, '2019-04-09 09:03:31', '2019-04-09 09:03:31'),
(66, '34', 1, '.jpg', NULL, '28389be4-d979-4fea-9004-5b0f133bebfa', NULL, 1, '2019-04-09 09:32:22', '2019-04-09 09:32:22'),
(67, '34', 1, '.jpg', NULL, 'eb181229-c780-46a3-bebf-4f9e3e97512d', NULL, 1, '2019-04-09 09:32:54', '2019-04-09 09:32:54'),
(68, '35', 1, 'gioi-thieu-san-pham.png', NULL, '21beae08-8484-4a6a-bc35-0d5b5b65737f', NULL, 1, '2019-04-09 09:35:43', '2019-04-09 09:37:52'),
(69, '35', 1, '.jpg', NULL, 'b0e64055-88c7-4cc0-b840-1ad1ac25c883', NULL, 1, '2019-04-09 09:35:54', '2019-04-09 09:38:18'),
(70, '35', 1, NULL, NULL, '90139b12-e305-44b9-a580-fa12e2ffd39f', NULL, 1, '2019-04-09 09:42:21', '2019-04-09 09:42:21'),
(71, '35', 1, NULL, NULL, '5b001fc9-8cc6-4909-9463-97d5c485a0c1', NULL, 1, '2019-04-09 09:42:40', '2019-04-09 09:42:40'),
(72, '36', 1, NULL, NULL, '34d688ed-f712-4b63-84d9-52f68b041c5c', NULL, 1, '2019-04-09 09:44:46', '2019-04-09 09:44:46'),
(73, '37', 1, NULL, NULL, 'f556de92-a896-44c8-8bab-3e3802cf47d2', NULL, 1, '2019-04-09 09:46:59', '2019-04-09 09:46:59'),
(74, '38', 1, NULL, NULL, 'e447394c-b107-4049-9a17-946151ecc111', NULL, 1, '2019-04-09 09:48:48', '2019-04-09 09:48:48'),
(75, '40', 1, '.jpg', NULL, '0201c87c-3ca3-477a-a1f8-94422528c905', NULL, 1, '2019-04-09 09:52:18', '2019-04-09 09:52:18'),
(76, '40', 1, '.jpg', NULL, '64e81b7b-ab4b-4913-852b-e4977ff2d4e9', NULL, 1, '2019-04-09 09:52:41', '2019-04-09 09:52:41'),
(77, '41', 1, NULL, NULL, 'bcb5a503-385a-40b9-b383-4cc98a553ca3', NULL, 1, '2019-04-09 09:55:29', '2019-04-09 09:55:29'),
(78, '42', 1, 'cach-choi-co-ban-co-cau-giai-thuong.jpg', NULL, '848d5fb5-6bb4-45b9-9cc4-4b931a1d0ac0', NULL, 1, '2019-04-09 09:58:43', '2019-04-09 09:58:43'),
(79, '43', 1, NULL, NULL, '2864e609-9c01-4f3e-b6cf-43c393fad7fd', NULL, 1, '2019-04-09 10:02:36', '2019-04-09 10:02:36'),
(80, '44', 1, NULL, NULL, '3086f1b5-e977-43d9-8cd6-092c2ee317df', NULL, 1, '2019-04-09 10:05:31', '2019-04-09 10:05:31'),
(81, '45', 1, '1-chon-cach-choi.jpg', NULL, 'c9acb101-4934-434f-98e3-66f7ffbd69c5', NULL, 1, '2019-04-09 10:09:42', '2019-04-09 10:09:42'),
(82, '46', 1, NULL, NULL, '96ad724d-82c6-4677-ba76-db75dc48b64b', NULL, 1, '2019-04-09 10:10:25', '2019-04-09 10:10:25'),
(83, '46', 1, NULL, NULL, '485c17bc-6362-4ef3-8ea6-508611898222', NULL, 1, '2019-04-09 10:10:49', '2019-04-09 10:10:49'),
(84, '46', 1, NULL, NULL, '3bb4bf12-7859-4339-9006-4752d9030386', NULL, 1, '2019-04-09 10:11:09', '2019-04-09 10:11:09'),
(85, '47', 1, NULL, NULL, '7bc7ee1f-236d-4d19-a860-3b1e585052e5', NULL, 1, '2019-04-09 10:14:58', '2019-04-09 10:14:58'),
(86, '49', 1, '.jpg', NULL, '856190e3-b64f-4ebc-b897-79ad881f625e', NULL, 1, '2019-04-09 10:22:56', '2019-04-09 10:22:56'),
(87, '49', 1, '.jpg', NULL, 'e8712aad-0ac9-426b-bacd-7e6c68f92e75', NULL, 1, '2019-04-09 10:23:10', '2019-04-09 10:23:10'),
(88, '50', 1, NULL, NULL, '739b4bf2-b516-4d05-9e52-d0c79933c085', NULL, 1, '2019-04-09 10:28:29', '2019-04-09 10:28:29'),
(89, '51', 1, 'cach-choi-co-ban-br-co-cau-giai-thuong.png', NULL, '83d3f45d-6907-458b-ac05-01cc5ba30645', NULL, 1, '2019-04-09 10:30:36', '2019-04-09 10:30:36'),
(90, '52', 1, NULL, NULL, '1d1e928d-cbbc-423b-ad22-c7a713939728', NULL, 1, '2019-04-09 10:33:11', '2019-04-09 10:33:11'),
(91, '53', 1, NULL, NULL, '5736992c-09bd-409c-b2ad-cfc566dc411c', NULL, 1, '2019-04-09 10:35:16', '2019-04-09 10:35:16'),
(92, '54', 1, NULL, NULL, '5c2c1fe9-efee-4b2a-8fbd-a51073ce5f39', NULL, 1, '2019-04-09 10:39:01', '2019-04-09 10:39:01'),
(93, '55', 1, NULL, NULL, '290d6875-eba4-4074-aa07-cda67d3d67e9', NULL, 1, '2019-04-09 10:41:16', '2019-04-09 10:41:16'),
(94, '55', 1, NULL, NULL, '3468df8c-ca67-4bea-bef5-6cc4c973ff14', NULL, 1, '2019-04-09 10:41:35', '2019-04-09 10:41:35'),
(95, '56', 1, NULL, NULL, '83c9202a-bcf3-42a3-b826-52782b7937b3', NULL, 1, '2019-04-09 11:03:11', '2019-04-09 11:03:11'),
(96, '57', 1, NULL, NULL, '9b7076ca-93e0-4c5c-bd2e-d4c40456e298', NULL, 1, '2019-04-09 11:06:14', '2019-04-09 11:06:14'),
(97, '59', 1, '.jpg', NULL, '54f9508b-256b-4ff5-b2fb-53a55d4a2ae9', NULL, 1, '2019-04-09 11:22:10', '2019-04-09 11:22:10'),
(98, '59', 1, '.jpg', NULL, '0bda307e-6bad-4540-a82f-5c1767c57534', NULL, 1, '2019-04-09 11:22:23', '2019-04-09 11:22:23'),
(99, '60', 1, NULL, NULL, 'fb6778fe-f05d-4b33-aadf-6c27d7ae8f8f', NULL, 1, '2019-04-09 11:24:15', '2019-04-09 11:24:15'),
(100, '60', 1, NULL, NULL, 'b01e4273-926a-4977-9d9f-392014bfe5c2', NULL, 1, '2019-04-09 11:24:29', '2019-04-09 11:24:29'),
(101, '60', 1, NULL, NULL, '490180f2-3119-4fb3-90f9-bc0c8b35872a', NULL, 1, '2019-04-09 11:24:42', '2019-04-09 11:24:42'),
(102, '61', 1, 'loto-game.png', NULL, '0faa2e30-168f-43f1-ae8d-79b6afe02bd6', NULL, 1, '2019-04-09 11:28:35', '2019-04-09 11:28:35'),
(103, '62', 1, 'mega-6-45.png', NULL, '4f95f55d-4cf3-46bb-bab3-1bef290e0482', NULL, 1, '2019-04-09 11:31:10', '2019-04-09 11:31:10'),
(104, '62', 1, 'mega-6-55.png', NULL, 'cc0dfc1b-02a5-4cf3-b0d6-58a8fce5db84', NULL, 1, '2019-04-09 11:31:34', '2019-04-09 11:31:34'),
(105, '62', 1, 'mega-6-50.png', NULL, '475558a1-0ae5-415f-a092-9f1b14b0b986', NULL, 1, '2019-04-09 11:31:49', '2019-04-09 11:31:49'),
(106, '62', 1, 'mega-6-58.png', NULL, '283ce0c8-a5ea-4d33-b00c-f370310ad2ca', NULL, 1, '2019-04-09 11:32:05', '2019-04-09 11:32:05'),
(107, '63', 1, 'digit-game.png', NULL, '61f33438-79d1-401a-8318-546aa9a048fb', NULL, 1, '2019-04-09 11:39:35', '2019-04-09 11:39:35'),
(108, '64', 1, 'max-4d.png', NULL, 'd44d16e4-ae27-4c8f-8137-962e93ac1818', NULL, 1, '2019-04-09 11:42:16', '2019-04-09 11:42:16'),
(109, '64', 1, 'digit-5d.png', NULL, 'd72c620d-018f-49fe-8194-10ed14909257', NULL, 1, '2019-04-09 11:42:33', '2019-04-09 11:42:33'),
(110, '64', 1, 'digit-6d.png', NULL, '39b57f4f-05a0-4ee9-b727-6570a141f142', NULL, 1, '2019-04-09 11:42:51', '2019-04-09 11:42:51'),
(111, '65', 1, 'fast-draw-game.png', NULL, '7c34be8a-f849-4eea-a31c-ae63a0667d7c', NULL, 1, '2019-04-09 11:47:20', '2019-04-11 17:01:40'),
(112, '66', 1, 'manual.jpg', NULL, 'aba452ff-de35-4b9e-8020-1a3e76ee17f2', NULL, 1, '2019-04-12 06:44:18', '2019-04-12 06:44:18'),
(113, '66', 1, '.jpg', NULL, 'fd7029dc-b5ef-46e0-9783-3ce8378b1053', NULL, 1, '2019-04-12 06:44:46', '2019-04-12 06:44:46'),
(114, '67', 1, 'register.jpg', NULL, '13915d56-6cb5-401f-b15e-75923a8ceeea', NULL, 1, '2019-04-12 06:53:43', '2019-04-12 06:53:43'),
(115, '67', 1, '.jpg', NULL, '3ffb5d44-55bb-4282-ac9c-079b9552e753', NULL, 1, '2019-04-12 06:54:08', '2019-04-20 16:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `banner_categories`
--

CREATE TABLE `banner_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner_categories`
--

INSERT INTO `banner_categories` (`id`, `parent_id`, `image`, `uuid`, `status`, `lft`, `rght`, `created`, `modified`) VALUES
(1, 0, NULL, '260caaf3-c44f-4e7d-85e7-a521984e5547', 1, 1, 20, '2019-04-03 12:51:57', '2019-04-03 12:51:57'),
(2, 1, NULL, '557279ca-5857-4042-b92b-db1b6340e462', 0, 2, 3, '2019-04-03 12:57:31', '2019-04-24 16:13:05'),
(4, 1, NULL, '3906e763-59e1-4f17-8966-0a8b6cb83a88', 1, 4, 5, '2019-04-03 13:28:30', '2019-04-03 13:28:30'),
(5, 1, NULL, 'f379f091-bf06-4f69-862e-d2ed82ebe770', 1, 6, 7, '2019-04-03 13:31:53', '2019-04-03 13:31:53'),
(6, 1, NULL, 'ae97331f-68a9-4973-9911-408c21dc3705', 1, 8, 9, '2019-04-03 13:43:33', '2019-04-03 13:43:33'),
(7, 1, NULL, '8d0f3067-9189-4006-809b-29231f31c2b1', 1, 10, 11, '2019-04-03 13:48:06', '2019-04-03 13:48:06'),
(8, 1, NULL, '8e3ce744-a0fe-473c-8866-84306505551a', 1, 12, 15, '2019-04-03 13:50:04', '2019-04-03 13:50:04'),
(9, 8, NULL, '5775b494-e37c-4635-a2da-9f73ff020ffb', 1, 13, 14, '2019-04-03 13:53:02', '2019-04-03 13:53:02'),
(10, 1, NULL, 'd1949523-4e2c-48f6-83fc-0bd6e1d571b9', 1, 16, 17, '2019-04-03 13:58:12', '2019-04-03 13:58:12'),
(11, 1, NULL, '20a4edb4-ceb4-4e39-80da-ed354582d117', 1, 18, 19, '2019-04-03 14:02:08', '2019-04-03 14:02:31'),
(12, 0, NULL, '10ba110c-5067-4397-87f3-b7526b6fa127', 1, 21, 22, '2019-04-03 14:06:11', '2019-04-03 14:06:11'),
(13, 0, NULL, '82c03497-e724-4668-8bf8-e913c7817f4b', 1, 23, 26, '2019-04-08 04:45:23', '2019-04-08 04:45:23'),
(14, 13, NULL, 'ceb65c83-5b6a-4f1a-8f7f-090cfc707de5', 1, 24, 25, '2019-04-08 04:48:41', '2019-04-08 04:48:41'),
(15, 0, NULL, 'dc07d86f-7768-4aea-85b2-0063b006df0e', 1, 27, 30, '2019-04-08 06:22:02', '2019-04-08 06:22:02'),
(16, 15, NULL, '9fd34be0-92d8-4078-8bb1-a985d243e394', 1, 28, 29, '2019-04-08 06:24:11', '2019-04-08 06:24:11'),
(17, 0, NULL, 'b030c4b9-bbf0-42ae-bf91-e7ffa49ab27d', 1, 31, 34, '2019-04-08 06:37:06', '2019-04-08 06:37:06'),
(18, 17, NULL, 'f57ce732-b546-4141-a613-c2bd826c50b5', 1, 32, 33, '2019-04-08 06:37:26', '2019-04-08 06:37:26'),
(19, 0, NULL, 'fd1c4c2f-a088-4620-895b-57c6f728f165', 1, 35, 36, '2019-04-08 07:03:54', '2019-04-08 07:03:54'),
(20, 0, NULL, 'ecc6b851-7c68-418b-90f1-72923d37c3cd', 1, 37, 40, '2019-04-09 06:47:03', '2019-04-09 06:47:03'),
(21, 20, NULL, '405592b6-2643-43a7-9102-a7e2555217d6', 1, 38, 39, '2019-04-09 06:52:20', '2019-04-09 06:52:20'),
(22, 0, NULL, '3692c6b0-ffe5-4430-8fd0-e5e23894883f', 1, 41, 42, '2019-04-09 07:02:04', '2019-04-09 07:02:04'),
(23, 0, NULL, '4a851910-3de3-4bf0-b226-5a61ccf4d792', 1, 43, 46, '2019-04-09 07:23:34', '2019-04-09 07:23:34'),
(24, 23, NULL, 'd1dc92c8-aa14-4ae4-95c6-61d766151b5f', 1, 44, 45, '2019-04-09 07:23:57', '2019-04-09 07:23:57'),
(25, 0, NULL, 'a3fa43d5-da85-445e-94a4-3b23f9ec0b17', 1, 47, 48, '2019-04-09 07:31:55', '2019-04-09 07:31:55'),
(26, 0, NULL, '70a56c5b-eef7-4f45-8abe-e4cbdc7400c2', 1, 49, 50, '2019-04-09 07:45:40', '2019-04-09 07:45:40'),
(27, 0, NULL, 'c022ac50-e0d8-4d55-9c65-2c8bccd8bc2f', 1, 51, 54, '2019-04-09 07:56:55', '2019-04-09 07:56:55'),
(28, 27, NULL, '01486bf8-30cb-456c-b609-07b1da1ef3a2', 1, 52, 53, '2019-04-09 07:58:45', '2019-04-09 07:58:45'),
(29, 0, NULL, 'bded52a4-a4b7-4204-8c0c-ae63a823c8de', 1, 55, 58, '2019-04-09 08:07:41', '2019-04-09 08:07:41'),
(30, 29, NULL, 'ca4de7e7-e81f-4f99-97c7-1c495a3bae98', 1, 56, 57, '2019-04-09 08:10:05', '2019-04-09 08:10:05'),
(31, 0, NULL, 'be40deb9-4906-4284-b9b7-10ea7f866d4c', 1, 59, 62, '2019-04-09 09:00:31', '2019-04-09 09:00:31'),
(32, 31, NULL, '529866e1-8fe4-4c29-8003-d707a0e3f029', 1, 60, 61, '2019-04-09 09:00:49', '2019-04-09 09:00:49'),
(33, 0, NULL, '39e50ede-23ad-44c6-aeed-6a4e6eb328a1', 1, 63, 74, '2019-04-09 09:29:48', '2019-04-09 09:29:48'),
(34, 33, NULL, '5d39e7d5-0012-463b-b28d-738466501af4', 1, 64, 65, '2019-04-09 09:31:42', '2019-04-09 09:31:42'),
(35, 33, NULL, '195c05ca-2c1b-4787-ab74-119fdd9196e9', 1, 66, 67, '2019-04-09 09:34:49', '2019-04-09 09:35:20'),
(36, 33, NULL, '167b1a8c-a6d0-4745-b9b5-e930f765b573', 1, 68, 71, '2019-04-09 09:44:29', '2019-04-09 09:44:29'),
(37, 36, NULL, '780d17c7-8b99-4085-8d79-a709aeb5b430', 1, 69, 70, '2019-04-09 09:46:28', '2019-04-09 09:46:28'),
(38, 33, NULL, '3ec83d5c-855d-4ed6-b680-0bf91a26e030', 1, 72, 73, '2019-04-09 09:48:33', '2019-04-09 09:48:33'),
(39, 0, NULL, '3bd32c24-d774-4e94-ba49-3ebf9b289461', 1, 75, 92, '2019-04-09 09:51:35', '2019-04-09 09:51:35'),
(40, 39, NULL, 'fbc03161-80b8-480f-ad4f-47ead5bc3ff3', 1, 76, 77, '2019-04-09 09:51:50', '2019-04-09 09:51:50'),
(41, 39, NULL, '5b7d9c6c-9ec8-42f3-aaed-ecacffa3b0a3', 1, 78, 79, '2019-04-09 09:54:58', '2019-04-09 09:54:58'),
(42, 39, NULL, '1a4e3eec-bdf9-4de1-9738-d71e3e4f1bb5', 1, 80, 81, '2019-04-09 09:57:29', '2019-04-09 09:57:29'),
(43, 39, NULL, '0b4942fa-3af9-475b-a85c-0a6c48f071bb', 1, 82, 83, '2019-04-09 10:01:19', '2019-04-09 10:01:19'),
(44, 39, NULL, '5209948c-f4d0-4224-b293-5b23a54b38fc', 1, 84, 85, '2019-04-09 10:05:14', '2019-04-09 10:05:14'),
(45, 39, NULL, 'ceb3d26c-cfab-4978-857f-640aa0cbfb4b', 1, 86, 89, '2019-04-09 10:07:35', '2019-04-09 10:07:35'),
(46, 45, NULL, 'c2868751-8d61-4fd0-b72b-1a0bcd5365e0', 1, 87, 88, '2019-04-09 10:09:59', '2019-04-09 10:09:59'),
(47, 39, NULL, '8ba57e10-f4f0-4663-8a66-f16306461246', 1, 90, 91, '2019-04-09 10:14:10', '2019-04-09 10:14:10'),
(48, 0, NULL, '3c5564fb-719c-478d-a3d2-1a1d81395819', 1, 93, 112, '2019-04-09 10:21:58', '2019-04-09 10:21:58'),
(49, 48, NULL, '09461334-5d57-41e7-b74d-8ae4339c300b', 1, 94, 95, '2019-04-09 10:22:22', '2019-04-09 10:22:22'),
(50, 48, NULL, '3463274c-3db2-46d7-8544-b0ee737c4dbf', 1, 96, 97, '2019-04-09 10:28:02', '2019-04-09 10:28:02'),
(51, 48, NULL, 'efc680df-769e-42ef-b54e-a4e1c4ced4dd', 1, 98, 101, '2019-04-09 10:30:00', '2019-04-09 10:30:00'),
(52, 51, NULL, '2508e75f-9f96-47f8-a0a4-941019a262e1', 1, 99, 100, '2019-04-09 10:32:34', '2019-04-09 10:32:34'),
(53, 48, NULL, 'a0f688b2-ef9a-43a7-ac0d-740cd5c7de40', 1, 102, 103, '2019-04-09 10:35:00', '2019-04-09 10:35:00'),
(54, 48, NULL, '8218ff6d-2e65-4240-8cb7-f6baae18132a', 1, 104, 107, '2019-04-09 10:38:05', '2019-04-09 10:38:05'),
(55, 54, NULL, 'a4c4190b-de76-4600-a076-fe5854e55335', 1, 105, 106, '2019-04-09 10:40:47', '2019-04-09 10:40:47'),
(56, 48, NULL, '89c143f3-264b-4712-ae3f-eead3a8329c1', 1, 108, 109, '2019-04-09 11:02:18', '2019-04-09 11:02:18'),
(57, 48, NULL, 'f8923b36-cf48-473f-a156-002c22ddc9ee', 1, 110, 111, '2019-04-09 11:05:54', '2019-04-09 11:05:54'),
(58, 0, NULL, '9cd7c4c5-2ea6-4b9a-bfb3-78fb14a447c3', 1, 113, 128, '2019-04-09 11:21:22', '2019-04-09 11:21:22'),
(59, 58, NULL, 'c0e76b79-469c-4177-922d-1c7195a9dd63', 1, 114, 115, '2019-04-09 11:21:34', '2019-04-09 11:21:34'),
(60, 58, NULL, '2f5ac0ea-ad9d-4ed7-8a35-f4bb95a9a95e', 1, 116, 117, '2019-04-09 11:24:03', '2019-04-09 11:24:03'),
(61, 58, NULL, '8e0fcc3c-2e14-4e75-83e6-12439f6460f1', 1, 118, 121, '2019-04-09 11:27:39', '2019-04-09 11:27:39'),
(62, 61, NULL, '6bd24446-b016-4350-a6b6-b30c0469ad0a', 1, 119, 120, '2019-04-09 11:30:42', '2019-04-09 11:30:42'),
(63, 58, NULL, 'ff27af3b-f2c8-497a-9230-8b5b5bcaac9a', 1, 122, 125, '2019-04-09 11:38:06', '2019-04-09 11:38:06'),
(64, 63, NULL, '07dd61f5-6318-4628-a633-f5d5bf8af462', 1, 123, 124, '2019-04-09 11:38:24', '2019-04-09 11:38:24'),
(65, 58, NULL, '6540f880-4ff4-4439-b7ff-0811abdc5ca9', 1, 126, 127, '2019-04-09 11:46:30', '2019-04-09 11:46:30'),
(66, 0, NULL, '771480e4-498a-40ad-b035-96d5a606c10b', 1, 129, 130, '2019-04-12 06:43:19', '2019-04-12 06:43:19'),
(67, 0, NULL, 'f131c2e9-d956-400a-9632-00b58f50ba37', 1, 131, 132, '2019-04-12 06:50:31', '2019-04-12 06:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `banner_categories_translations`
--

CREATE TABLE `banner_categories_translations` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner_categories_translations`
--

INSERT INTO `banner_categories_translations` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'vi', 'BannerCategories', 1, 'title', 'HOME'),
(2, 'vi', 'BannerCategories', 1, 'slug', 'home'),
(3, 'vi', 'BannerCategories', 1, 'description', ''),
(4, 'vi', 'BannerCategories', 2, 'title', 'home banner'),
(5, 'vi', 'BannerCategories', 2, 'slug', 'home-banner'),
(6, 'vi', 'BannerCategories', 2, 'description', ''),
(9, 'vi', 'BannerCategories', 3, 'description', ''),
(10, 'vi', 'BannerCategories', 4, 'title', 'game'),
(11, 'vi', 'BannerCategories', 4, 'slug', 'game'),
(12, 'vi', 'BannerCategories', 4, 'description', ''),
(13, 'vi', 'BannerCategories', 5, 'title', 'about'),
(14, 'vi', 'BannerCategories', 5, 'slug', 'about'),
(15, 'vi', 'BannerCategories', 5, 'description', ''),
(16, 'vi', 'BannerCategories', 6, 'title', 'systems'),
(17, 'vi', 'BannerCategories', 6, 'slug', 'systems'),
(18, 'vi', 'BannerCategories', 6, 'description', ''),
(19, 'vi', 'BannerCategories', 7, 'title', 'info system'),
(20, 'vi', 'BannerCategories', 7, 'slug', 'info-system'),
(21, 'vi', 'BannerCategories', 7, 'description', ''),
(22, 'vi', 'BannerCategories', 8, 'title', 'port'),
(23, 'vi', 'BannerCategories', 8, 'slug', 'port'),
(24, 'vi', 'BannerCategories', 8, 'description', ''),
(25, 'vi', 'BannerCategories', 9, 'title', 'img port'),
(26, 'vi', 'BannerCategories', 9, 'slug', 'img-port'),
(27, 'vi', 'BannerCategories', 9, 'description', ''),
(28, 'vi', 'BannerCategories', 10, 'title', 'img-recruitment'),
(29, 'vi', 'BannerCategories', 10, 'slug', 'img-recruitment'),
(30, 'vi', 'BannerCategories', 10, 'description', ''),
(31, 'vi', 'BannerCategories', 11, 'title', 'info recruitment'),
(32, 'vi', 'BannerCategories', 11, 'slug', 'info-recruitment'),
(33, 'vi', 'BannerCategories', 11, 'description', ''),
(34, 'vi', 'BannerCategories', 12, 'title', 'FOOTER'),
(35, 'vi', 'BannerCategories', 12, 'slug', 'footer'),
(36, 'vi', 'BannerCategories', 12, 'description', ''),
(37, 'vi', 'BannerCategories', 13, 'title', 'ABOUT - Who We Are'),
(38, 'vi', 'BannerCategories', 13, 'slug', 'about-who-we-are'),
(39, 'vi', 'BannerCategories', 13, 'description', ''),
(40, 'vi', 'BannerCategories', 14, 'title', 'image'),
(41, 'vi', 'BannerCategories', 14, 'slug', 'image'),
(42, 'vi', 'BannerCategories', 14, 'description', ''),
(43, 'vi', 'BannerCategories', 15, 'title', 'ABOUT - Compliance'),
(44, 'vi', 'BannerCategories', 15, 'slug', 'about-compliance'),
(45, 'vi', 'BannerCategories', 15, 'description', ''),
(46, 'vi', 'BannerCategories', 16, 'title', 'image'),
(47, 'vi', 'BannerCategories', 16, 'slug', 'image'),
(48, 'vi', 'BannerCategories', 16, 'description', ''),
(49, 'vi', 'BannerCategories', 17, 'title', 'ABOUT - Responsibility'),
(50, 'vi', 'BannerCategories', 17, 'slug', 'about-responsibility'),
(51, 'vi', 'BannerCategories', 17, 'description', ''),
(52, 'vi', 'BannerCategories', 18, 'title', 'image'),
(53, 'vi', 'BannerCategories', 18, 'slug', 'image'),
(54, 'vi', 'BannerCategories', 18, 'description', ''),
(55, 'vi', 'BannerCategories', 19, 'title', 'ABOUT - Contact'),
(56, 'vi', 'BannerCategories', 19, 'slug', 'about-contact'),
(57, 'vi', 'BannerCategories', 19, 'description', ''),
(58, 'vi', 'BannerCategories', 20, 'title', 'TECHNOLORY - Betting'),
(59, 'vi', 'BannerCategories', 20, 'slug', 'technolory-betting'),
(60, 'vi', 'BannerCategories', 20, 'description', ''),
(61, 'vi', 'BannerCategories', 21, 'title', 'image'),
(62, 'vi', 'BannerCategories', 21, 'slug', 'image'),
(63, 'vi', 'BannerCategories', 21, 'description', ''),
(64, 'vi', 'BannerCategories', 22, 'title', 'TECHNOLORY - Core-System'),
(65, 'vi', 'BannerCategories', 22, 'slug', 'technolory-core-system'),
(66, 'vi', 'BannerCategories', 22, 'description', ''),
(67, 'vi', 'BannerCategories', 23, 'title', 'TECHNOLORY - Draw-Equipment'),
(68, 'vi', 'BannerCategories', 23, 'slug', 'technolory-draw-equipment'),
(69, 'vi', 'BannerCategories', 23, 'description', ''),
(70, 'vi', 'BannerCategories', 24, 'title', 'image'),
(71, 'vi', 'BannerCategories', 24, 'slug', 'image'),
(72, 'vi', 'BannerCategories', 24, 'description', ''),
(73, 'vi', 'BannerCategories', 25, 'title', 'SUPPORT - Field-Support'),
(74, 'vi', 'BannerCategories', 25, 'slug', 'support-field-support'),
(75, 'vi', 'BannerCategories', 25, 'description', ''),
(76, 'vi', 'BannerCategories', 26, 'title', 'GETSUPPORT - Get-Support'),
(77, 'vi', 'BannerCategories', 26, 'slug', 'getsupport-get-support'),
(78, 'vi', 'BannerCategories', 26, 'description', ''),
(79, 'vi', 'BannerCategories', 27, 'title', 'TECHNOLORY - Software'),
(80, 'vi', 'BannerCategories', 27, 'slug', 'technolory-software'),
(81, 'vi', 'BannerCategories', 27, 'description', ''),
(82, 'vi', 'BannerCategories', 28, 'title', 'image'),
(83, 'vi', 'BannerCategories', 28, 'slug', 'image'),
(84, 'vi', 'BannerCategories', 28, 'description', ''),
(85, 'vi', 'BannerCategories', 29, 'title', 'TECHNOLORY - Point-Of-Sales'),
(86, 'vi', 'BannerCategories', 29, 'slug', 'technolory-point-of-sales'),
(87, 'vi', 'BannerCategories', 29, 'description', ''),
(88, 'vi', 'BannerCategories', 30, 'title', 'image'),
(89, 'vi', 'BannerCategories', 30, 'slug', 'image'),
(90, 'vi', 'BannerCategories', 30, 'description', ''),
(91, 'vi', 'BannerCategories', 31, 'title', 'SERVICES - Services - Legal'),
(92, 'vi', 'BannerCategories', 31, 'slug', 'services-services-legal'),
(93, 'vi', 'BannerCategories', 31, 'description', ''),
(94, 'vi', 'BannerCategories', 32, 'title', 'image'),
(95, 'vi', 'BannerCategories', 32, 'slug', 'image'),
(96, 'vi', 'BannerCategories', 32, 'description', ''),
(97, 'vi', 'BannerCategories', 33, 'title', 'GAME KENO'),
(98, 'vi', 'BannerCategories', 33, 'slug', 'game-keno'),
(99, 'vi', 'BannerCategories', 33, 'description', ''),
(100, 'vi', 'BannerCategories', 34, 'title', 'List Banner'),
(101, 'vi', 'BannerCategories', 34, 'slug', 'list-banner'),
(102, 'vi', 'BannerCategories', 34, 'description', ''),
(103, 'vi', 'BannerCategories', 35, 'title', 'About'),
(104, 'vi', 'BannerCategories', 35, 'slug', 'about'),
(105, 'vi', 'BannerCategories', 35, 'description', ''),
(106, 'vi', 'BannerCategories', 36, 'title', 'Table'),
(107, 'vi', 'BannerCategories', 36, 'slug', 'table'),
(108, 'vi', 'BannerCategories', 36, 'description', ''),
(109, 'vi', 'BannerCategories', 37, 'title', 'List'),
(110, 'vi', 'BannerCategories', 37, 'slug', 'list'),
(111, 'vi', 'BannerCategories', 37, 'description', ''),
(112, 'vi', 'BannerCategories', 38, 'title', 'Content'),
(113, 'vi', 'BannerCategories', 38, 'slug', 'content'),
(114, 'vi', 'BannerCategories', 38, 'description', ''),
(115, 'vi', 'BannerCategories', 39, 'title', 'Game Max4d'),
(116, 'vi', 'BannerCategories', 39, 'slug', 'game-max4d'),
(117, 'vi', 'BannerCategories', 39, 'description', ''),
(118, 'vi', 'BannerCategories', 40, 'title', 'List Banner'),
(119, 'vi', 'BannerCategories', 40, 'slug', 'list-banner'),
(120, 'vi', 'BannerCategories', 40, 'description', ''),
(121, 'vi', 'BannerCategories', 41, 'title', 'Infor'),
(122, 'vi', 'BannerCategories', 41, 'slug', 'infor'),
(123, 'vi', 'BannerCategories', 41, 'description', ''),
(124, 'vi', 'BannerCategories', 42, 'title', 'PLAYING'),
(125, 'vi', 'BannerCategories', 42, 'slug', 'playing'),
(126, 'vi', 'BannerCategories', 42, 'description', ''),
(127, 'vi', 'BannerCategories', 43, 'title', 'Table'),
(128, 'vi', 'BannerCategories', 43, 'slug', 'table'),
(129, 'vi', 'BannerCategories', 43, 'description', ''),
(130, 'vi', 'BannerCategories', 44, 'title', 'Content'),
(131, 'vi', 'BannerCategories', 44, 'slug', 'content'),
(132, 'vi', 'BannerCategories', 44, 'description', ''),
(133, 'vi', 'BannerCategories', 45, 'title', 'Step 1'),
(134, 'vi', 'BannerCategories', 45, 'slug', 'step-1'),
(135, 'vi', 'BannerCategories', 45, 'description', ''),
(136, 'vi', 'BannerCategories', 46, 'title', 'List'),
(137, 'vi', 'BannerCategories', 46, 'slug', 'list'),
(138, 'vi', 'BannerCategories', 46, 'description', ''),
(139, 'vi', 'BannerCategories', 47, 'title', 'Step 2'),
(140, 'vi', 'BannerCategories', 47, 'slug', 'step-2'),
(141, 'vi', 'BannerCategories', 47, 'description', ''),
(142, 'vi', 'BannerCategories', 48, 'title', 'Mega645'),
(143, 'vi', 'BannerCategories', 48, 'slug', 'mega645'),
(144, 'vi', 'BannerCategories', 48, 'description', ''),
(145, 'vi', 'BannerCategories', 49, 'title', 'List Banner'),
(146, 'vi', 'BannerCategories', 49, 'slug', 'list-banner'),
(147, 'vi', 'BannerCategories', 49, 'description', ''),
(148, 'vi', 'BannerCategories', 50, 'title', 'Infor'),
(149, 'vi', 'BannerCategories', 50, 'slug', 'infor'),
(150, 'vi', 'BannerCategories', 50, 'description', ''),
(151, 'vi', 'BannerCategories', 51, 'title', 'Playing'),
(152, 'vi', 'BannerCategories', 51, 'slug', 'playing'),
(153, 'vi', 'BannerCategories', 51, 'description', ''),
(154, 'vi', 'BannerCategories', 52, 'title', 'Table'),
(155, 'vi', 'BannerCategories', 52, 'slug', 'table'),
(156, 'vi', 'BannerCategories', 52, 'description', ''),
(157, 'vi', 'BannerCategories', 53, 'title', 'Content'),
(158, 'vi', 'BannerCategories', 53, 'slug', 'content'),
(159, 'vi', 'BannerCategories', 53, 'description', ''),
(160, 'vi', 'BannerCategories', 54, 'title', 'Receive'),
(161, 'vi', 'BannerCategories', 54, 'slug', 'receive'),
(162, 'vi', 'BannerCategories', 54, 'description', ''),
(163, 'vi', 'BannerCategories', 55, 'title', 'Des'),
(164, 'vi', 'BannerCategories', 55, 'slug', 'des'),
(165, 'vi', 'BannerCategories', 55, 'description', ''),
(166, 'vi', 'BannerCategories', 56, 'title', 'Table'),
(167, 'vi', 'BannerCategories', 56, 'slug', 'table'),
(168, 'vi', 'BannerCategories', 56, 'description', ''),
(169, 'vi', 'BannerCategories', 57, 'title', 'Content'),
(170, 'vi', 'BannerCategories', 57, 'slug', 'content'),
(171, 'vi', 'BannerCategories', 57, 'description', ''),
(172, 'vi', 'BannerCategories', 58, 'title', 'GAME'),
(173, 'vi', 'BannerCategories', 58, 'slug', 'game'),
(174, 'vi', 'BannerCategories', 58, 'description', ''),
(175, 'vi', 'BannerCategories', 59, 'title', 'List Banner'),
(176, 'vi', 'BannerCategories', 59, 'slug', 'list-banner'),
(177, 'vi', 'BannerCategories', 59, 'description', ''),
(178, 'vi', 'BannerCategories', 60, 'title', 'Link'),
(179, 'vi', 'BannerCategories', 60, 'slug', 'link'),
(180, 'vi', 'BannerCategories', 60, 'description', ''),
(181, 'vi', 'BannerCategories', 61, 'title', 'Loto game'),
(182, 'vi', 'BannerCategories', 61, 'slug', 'loto-game'),
(183, 'vi', 'BannerCategories', 61, 'description', ''),
(184, 'vi', 'BannerCategories', 62, 'title', 'Logo'),
(185, 'vi', 'BannerCategories', 62, 'slug', 'logo'),
(186, 'vi', 'BannerCategories', 62, 'description', ''),
(187, 'vi', 'BannerCategories', 63, 'title', 'Digit Game'),
(188, 'vi', 'BannerCategories', 63, 'slug', 'digit-game'),
(189, 'vi', 'BannerCategories', 63, 'description', ''),
(190, 'vi', 'BannerCategories', 64, 'title', 'Logo'),
(191, 'vi', 'BannerCategories', 64, 'slug', 'logo'),
(192, 'vi', 'BannerCategories', 64, 'description', ''),
(193, 'vi', 'BannerCategories', 65, 'title', 'Fast draw game'),
(194, 'vi', 'BannerCategories', 65, 'slug', 'fast-draw-game'),
(195, 'vi', 'BannerCategories', 65, 'description', ''),
(196, 'vi', 'BannerCategories', 66, 'title', 'ACCOUNT - download'),
(197, 'vi', 'BannerCategories', 66, 'slug', 'account-download'),
(198, 'vi', 'BannerCategories', 66, 'description', ''),
(199, 'vi', 'BannerCategories', 67, 'title', 'ACCOUNT - profile-management'),
(200, 'vi', 'BannerCategories', 67, 'slug', 'account-profile-management'),
(201, 'vi', 'BannerCategories', 67, 'description', '');

-- --------------------------------------------------------

--
-- Table structure for table `banner_translations`
--

CREATE TABLE `banner_translations` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner_translations`
--

INSERT INTO `banner_translations` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'vi', 'Banners', 1, 'title', 'home banner'),
(2, 'vi', 'Banners', 1, 'slug', 'home-banner'),
(3, 'vi', 'Banners', 1, 'description', ''),
(4, 'vi', 'Banners', 1, 'url', ''),
(5, 'vi', 'Banners', 2, 'title', 'home banner'),
(6, 'vi', 'Banners', 2, 'slug', 'home-banner'),
(7, 'vi', 'Banners', 2, 'description', ''),
(8, 'vi', 'Banners', 2, 'url', ''),
(9, 'vi', 'Banners', 3, 'title', ''),
(10, 'vi', 'Banners', 3, 'slug', ''),
(11, 'vi', 'Banners', 3, 'description', ''),
(12, 'vi', 'Banners', 3, 'url', ''),
(13, 'vi', 'Banners', 4, 'title', ''),
(14, 'vi', 'Banners', 4, 'slug', ''),
(15, 'vi', 'Banners', 4, 'description', ''),
(16, 'vi', 'Banners', 4, 'url', ''),
(17, 'vi', 'Banners', 5, 'title', ''),
(18, 'vi', 'Banners', 5, 'slug', ''),
(19, 'vi', 'Banners', 5, 'description', ''),
(20, 'vi', 'Banners', 5, 'url', ''),
(21, 'vi', 'Banners', 6, 'title', 'về chúng tôi <br> Berjaya Gia Thịnh'),
(22, 'vi', 'Banners', 6, 'slug', 've-chung-toi-br-berjaya-gia-thinh'),
(23, 'vi', 'Banners', 6, 'description', '<p>Đồng điều hành xổ số tự chọn tại Việt Nam, Berjaya Gia Thịnh nắm sứ mệnh phát triển thị trường trò chơi giải trí có thưởng tại Việt Nam dựa trên các quy tắc và tiêu chuẩn về hiện đại, minh bạch và trách nhiệm. Chúng tôi tự hào giới thiệu ngành dịch vụ giải trí đa dạng cùng công nghệ tiên tiến hàng đầu thế giới.</p>                         <p>Với nền tảng là sự thấu hiểu về thế giới giải trí tiên tiến, Berjaya Gia Thịnh dưới sự ủy nhiệm của Tập đoàn Berjaya, cùng Công ty TNHH MTV Xổ số điện toán Việt Nam (Vietlott) với mục tiêu cam kết quản lý các trải nghiệm đầu tư mua sắm và vận hành hệ thống kỹ thuật, thiết bị, phần mềm và kinh doanh xổ số tự chọn số điện toán trên lãnh thổ Việt Nam.</p>'),
(24, 'vi', 'Banners', 6, 'url', ''),
(25, 'vi', 'Banners', 7, 'title', 'Hệ thống lõi'),
(26, 'vi', 'Banners', 7, 'slug', 'he-thong-loi'),
(27, 'vi', 'Banners', 7, 'description', ''),
(28, 'vi', 'Banners', 7, 'url', ''),
(29, 'vi', 'Banners', 8, 'title', 'Phân  mềm'),
(30, 'vi', 'Banners', 8, 'slug', 'phan-mem'),
(31, 'vi', 'Banners', 8, 'description', ''),
(32, 'vi', 'Banners', 8, 'url', ''),
(33, 'vi', 'Banners', 9, 'title', 'Điểm bán hàng'),
(34, 'vi', 'Banners', 9, 'slug', 'diem-ban-hang'),
(35, 'vi', 'Banners', 9, 'description', ''),
(36, 'vi', 'Banners', 9, 'url', ''),
(37, 'vi', 'Banners', 10, 'title', 'Máy quay số'),
(38, 'vi', 'Banners', 10, 'slug', 'may-quay-so'),
(39, 'vi', 'Banners', 10, 'description', ''),
(40, 'vi', 'Banners', 10, 'url', ''),
(41, 'vi', 'Banners', 11, 'title', 'HỆ THỐNG CÔNG NGHỆ <br> THÔNG TIN HÀNG ĐẦU'),
(42, 'vi', 'Banners', 11, 'slug', 'he-thong-cong-nghe-br-thong-tin-hang-dau'),
(43, 'vi', 'Banners', 11, 'description', 'Được hỗ trợ bởi những công nghệ tiên tiến hiện đại trên thế giới, cùng với đội ngũ phát triển hệ thống liên tục, chúng tôi cam kết mang đến dịch vụ tiện lợi, dễ dàng sử dụng và mức độ bảo mật cao cấp.'),
(44, 'vi', 'Banners', 11, 'url', ''),
(45, 'vi', 'Banners', 12, 'title', 'CỔNG THÔNG TIN CỦA BGT'),
(46, 'vi', 'Banners', 12, 'slug', 'cong-thong-tin-cua-bgt'),
(47, 'vi', 'Banners', 12, 'description', '<p>Kênh thông tin đầy đủ và chính thức những nội dung mới nhất về Berjaya Gia Thịnh.</p>                         <p>Những tin tức nóng nhất về Giá trị trúng giải, thị trường, người chơi xổ số tự chọn và kết quả xổ số tự chọn sẽ được cập nhật liên tục.</p>'),
(48, 'vi', 'Banners', 12, 'url', ''),
(49, 'vi', 'Banners', 13, 'title', 'home-news-5'),
(50, 'vi', 'Banners', 13, 'slug', 'home-news-5'),
(51, 'vi', 'Banners', 13, 'description', ''),
(52, 'vi', 'Banners', 13, 'url', ''),
(53, 'vi', 'Banners', 14, 'title', 'home-news-6'),
(54, 'vi', 'Banners', 14, 'slug', 'home-news-6'),
(55, 'vi', 'Banners', 14, 'description', ''),
(56, 'vi', 'Banners', 14, 'url', ''),
(57, 'vi', 'Banners', 15, 'title', 'nhân viên kinh doanh'),
(58, 'vi', 'Banners', 15, 'slug', 'nhan-vien-kinh-doanh'),
(59, 'vi', 'Banners', 15, 'description', ''),
(60, 'vi', 'Banners', 15, 'url', ''),
(61, 'vi', 'Banners', 16, 'title', 'nhân viên trực tổng đài'),
(62, 'vi', 'Banners', 16, 'slug', 'nhan-vien-truc-tong-dai'),
(63, 'vi', 'Banners', 16, 'description', ''),
(64, 'vi', 'Banners', 16, 'url', ''),
(65, 'vi', 'Banners', 17, 'title', 'BERJAYA GIA THỊNH <br> TUYỂN DỤNG'),
(66, 'vi', 'Banners', 17, 'slug', 'berjaya-gia-thinh-br-tuyen-dung'),
(67, 'vi', 'Banners', 17, 'description', 'Mang theo những giấc mơ về sự đột phá trong phát triển đội ngũ nhân sự, chúng tôi xây dựng nên những tương lai, mang lại cho bạn cơ hội được thử sức với những vai trò và thách thức mới, đồng thời đánh thức năng lực tiềm ẩn và khả năng sáng tạo của bạn.'),
(68, 'vi', 'Banners', 17, 'url', ''),
(69, 'vi', 'Banners', 18, 'title', 'BERJAYA GIA THỊNH'),
(70, 'vi', 'Banners', 18, 'slug', 'berjaya-gia-thinh'),
(71, 'vi', 'Banners', 18, 'description', 'CÔNG TY CỔ PHẦN ĐẦU TƯ KỸ THUẬT BERJAYA GIA THỊNH <br> 					Tầng 17, tòa nhà Lim 2, 62A Cách Mạng Tháng Tám, P6, Q3 <br> 					Điện thoại: (+84.28) 3550 0999 <br> 					Fax: (+84.28) 3910 8188 <br> 					Website: www.bgt.com.vn'),
(72, 'vi', 'Banners', 18, 'url', ''),
(73, 'vi', 'Banners', 19, 'title', 'Development History'),
(74, 'vi', 'Banners', 19, 'slug', 'development-history'),
(75, 'vi', 'Banners', 19, 'description', 'CÔNG TY CỔ PHẦN ĐẦU TƯ KỸ THUẬT BERJAYA GIA THỊNH (“Berjaya Gia Thịnh”) được thành lập và hoạt động theo Giấy chứng nhận đăng ký doanh nghiệp (“GCN ĐKDN”) số 0311715794, cấp lần đầu ngày 11/04/2012 bởi Phòng Đăng ký kinh doanh – Sở Kế hoạch và đầu tư TPHCM theo sự hợp tác giữa Tập đoàn Berjaya (Malaysia) và Công ty TNHH Đầu tư Kỹ thuật Gia Thịnh. Doanh nghiệp được chuyển đổi từ Công ty trách nhiệm hữu hạn thành Công ty cổ phần theo GCN ĐKDN sửa đổi lần thứ 4 ngày 26/10/2015.</p>                     <p>Vốn điều lệ theo GCN ĐKDN thay đổi lần thứ 7 ngày 08/06/2018 là 337.633.400.000 (ba trăm ba mươi bảy tỷ sáu trăm ba mươi ba triệu bốn trăm nghìn) đồng.</p>                     <p>Đại diện theo pháp luật của Berjaya Gia Thịnh là bà Trần Thị Lâm – Chủ tịch Hội đồng quản trị.whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather.'),
(76, 'vi', 'Banners', 19, 'url', ''),
(77, 'vi', 'Banners', 20, 'title', ''),
(78, 'vi', 'Banners', 20, 'slug', ''),
(79, 'vi', 'Banners', 20, 'description', ''),
(80, 'vi', 'Banners', 20, 'url', ''),
(81, 'vi', 'Banners', 21, 'title', ''),
(82, 'vi', 'Banners', 21, 'slug', ''),
(83, 'vi', 'Banners', 21, 'description', ''),
(84, 'vi', 'Banners', 21, 'url', ''),
(85, 'vi', 'Banners', 22, 'title', ''),
(86, 'vi', 'Banners', 22, 'slug', ''),
(87, 'vi', 'Banners', 22, 'description', ''),
(88, 'vi', 'Banners', 22, 'url', ''),
(89, 'vi', 'Banners', 23, 'title', ''),
(90, 'vi', 'Banners', 23, 'slug', ''),
(91, 'vi', 'Banners', 23, 'description', ''),
(92, 'vi', 'Banners', 23, 'url', ''),
(93, 'vi', 'Banners', 24, 'title', 'ISO 27001'),
(94, 'vi', 'Banners', 24, 'slug', 'iso-27001'),
(95, 'vi', 'Banners', 24, 'description', 'It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.  						</p> 						<p> Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the'),
(96, 'vi', 'Banners', 24, 'url', ''),
(97, 'vi', 'Banners', 25, 'title', ''),
(98, 'vi', 'Banners', 25, 'slug', ''),
(99, 'vi', 'Banners', 25, 'description', ''),
(100, 'vi', 'Banners', 25, 'url', ''),
(101, 'vi', 'Banners', 26, 'title', ''),
(102, 'vi', 'Banners', 26, 'slug', ''),
(103, 'vi', 'Banners', 26, 'description', ''),
(104, 'vi', 'Banners', 26, 'url', ''),
(105, 'vi', 'Banners', 27, 'title', ''),
(106, 'vi', 'Banners', 27, 'slug', ''),
(107, 'vi', 'Banners', 27, 'description', ''),
(108, 'vi', 'Banners', 27, 'url', ''),
(109, 'vi', 'Banners', 28, 'title', 'Corporate Social Responsibility'),
(110, 'vi', 'Banners', 28, 'slug', 'corporate-social-responsibility'),
(111, 'vi', 'Banners', 28, 'description', '<p class=\"p-title\"> lưu ý \"chơi có trách nhiệm\"</p>                         <p>It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>                         <p>                             - A portion of every Florida Lottery ticket purchased gets transferred to the Educational Enhancement Trust Fund (EETF). <br>                              - The legislature, with input from the Florida Department of Education, then determines how funds will be allocated. <br>                              - The Florida Department of Education distributes the funds to the public education system.                         </p>                         <p>Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>                          <p class=\"p-title\">lưu ý \"chơi có trách nhiệm\"</p>                         <p>Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the </p>                         <p>                             - A portion of every Florida Lottery ticket purchased gets transferred to the Educational Enhancement Trust Fund (EETF). <br>                              - The legislature, with input from the Florida Department of Education, then determines how funds will be allocated. <br>                              - The Florida Department of Education distributes the funds to the public education system.                         </p>'),
(112, 'vi', 'Banners', 28, 'url', ''),
(113, 'vi', 'Banners', 29, 'title', ''),
(114, 'vi', 'Banners', 29, 'slug', ''),
(115, 'vi', 'Banners', 29, 'description', ''),
(116, 'vi', 'Banners', 29, 'url', ''),
(117, 'vi', 'Banners', 30, 'title', ''),
(118, 'vi', 'Banners', 30, 'slug', ''),
(119, 'vi', 'Banners', 30, 'description', ''),
(120, 'vi', 'Banners', 30, 'url', ''),
(121, 'vi', 'Banners', 31, 'title', ''),
(122, 'vi', 'Banners', 31, 'slug', ''),
(123, 'vi', 'Banners', 31, 'description', ''),
(124, 'vi', 'Banners', 31, 'url', ''),
(125, 'vi', 'Banners', 32, 'title', ''),
(126, 'vi', 'Banners', 32, 'slug', ''),
(127, 'vi', 'Banners', 32, 'description', ''),
(128, 'vi', 'Banners', 32, 'url', ''),
(129, 'vi', 'Banners', 33, 'title', ''),
(130, 'vi', 'Banners', 33, 'slug', ''),
(131, 'vi', 'Banners', 33, 'description', ''),
(132, 'vi', 'Banners', 33, 'url', ''),
(133, 'vi', 'Banners', 34, 'title', 'Locations'),
(134, 'vi', 'Banners', 34, 'slug', 'locations'),
(135, 'vi', 'Banners', 34, 'description', 'It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.'),
(136, 'vi', 'Banners', 34, 'url', ''),
(137, 'vi', 'Banners', 35, 'title', 'Địa chỉ'),
(138, 'vi', 'Banners', 35, 'slug', 'dia-chi'),
(139, 'vi', 'Banners', 35, 'description', '<strong>CÔNG TY CỔ PHẦN ĐẦU TƯ KỸ THUẬT BERJAYA GIA THỊNH</strong> <br> <br>                                     17-19-21 Nguyễn Văn Trỗi, Phường 14, Quận Phú Nhuận, TP HCM, Việt Nam. <br> +84 23 6395 4666 <br>                                      info@berjaya.com'),
(140, 'vi', 'Banners', 35, 'url', ''),
(141, 'vi', 'Banners', 36, 'title', ''),
(142, 'vi', 'Banners', 36, 'slug', ''),
(143, 'vi', 'Banners', 36, 'description', ''),
(144, 'vi', 'Banners', 36, 'url', ''),
(145, 'vi', 'Banners', 37, 'title', ''),
(146, 'vi', 'Banners', 37, 'slug', ''),
(147, 'vi', 'Banners', 37, 'description', ''),
(148, 'vi', 'Banners', 37, 'url', ''),
(149, 'vi', 'Banners', 38, 'title', 'SMS Betting'),
(150, 'vi', 'Banners', 38, 'slug', 'sms-betting'),
(151, 'vi', 'Banners', 38, 'description', '  It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>                         <p>Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather.'),
(152, 'vi', 'Banners', 38, 'url', ''),
(153, 'vi', 'Banners', 39, 'title', ''),
(154, 'vi', 'Banners', 39, 'slug', ''),
(155, 'vi', 'Banners', 39, 'description', ''),
(156, 'vi', 'Banners', 39, 'url', ''),
(157, 'vi', 'Banners', 40, 'title', ''),
(158, 'vi', 'Banners', 40, 'slug', ''),
(159, 'vi', 'Banners', 40, 'description', ''),
(160, 'vi', 'Banners', 40, 'url', ''),
(161, 'vi', 'Banners', 41, 'title', ''),
(162, 'vi', 'Banners', 41, 'slug', ''),
(163, 'vi', 'Banners', 41, 'description', ''),
(164, 'vi', 'Banners', 41, 'url', ''),
(165, 'vi', 'Banners', 42, 'title', ''),
(166, 'vi', 'Banners', 42, 'slug', ''),
(167, 'vi', 'Banners', 42, 'description', ''),
(168, 'vi', 'Banners', 42, 'url', ''),
(169, 'vi', 'Banners', 43, 'title', 'Server Systems'),
(170, 'vi', 'Banners', 43, 'slug', 'server-systems'),
(171, 'vi', 'Banners', 43, 'description', ' It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>                                 <p>Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather.'),
(172, 'vi', 'Banners', 43, 'url', ''),
(173, 'vi', 'Banners', 44, 'title', ''),
(174, 'vi', 'Banners', 44, 'slug', ''),
(175, 'vi', 'Banners', 44, 'description', ''),
(176, 'vi', 'Banners', 44, 'url', ''),
(177, 'vi', 'Banners', 45, 'title', 'Traditional Lottery Machines'),
(178, 'vi', 'Banners', 45, 'slug', 'traditional-lottery-machines'),
(179, 'vi', 'Banners', 45, 'description', '   It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>                     <p>Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. </p>                     <p>It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. </p>                     <p>It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. </p>                     <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. </p>                     <p>She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then'),
(180, 'vi', 'Banners', 45, 'url', ''),
(181, 'vi', 'Banners', 46, 'title', ''),
(182, 'vi', 'Banners', 46, 'slug', ''),
(183, 'vi', 'Banners', 46, 'description', ''),
(184, 'vi', 'Banners', 46, 'url', ''),
(185, 'vi', 'Banners', 47, 'title', ''),
(186, 'vi', 'Banners', 47, 'slug', ''),
(187, 'vi', 'Banners', 47, 'description', ''),
(188, 'vi', 'Banners', 47, 'url', ''),
(189, 'vi', 'Banners', 48, 'title', 'Field Support'),
(190, 'vi', 'Banners', 48, 'slug', 'field-support'),
(191, 'vi', 'Banners', 48, 'description', ''),
(192, 'vi', 'Banners', 48, 'url', ''),
(193, 'vi', 'Banners', 49, 'title', ''),
(194, 'vi', 'Banners', 49, 'slug', ''),
(195, 'vi', 'Banners', 49, 'description', ' Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather.  It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, It showed a lady fittedraising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and </p>                         <p>housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. </p>                         <p>A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather.'),
(196, 'vi', 'Banners', 49, 'url', ''),
(197, 'vi', 'Banners', 50, 'title', ''),
(198, 'vi', 'Banners', 50, 'slug', ''),
(199, 'vi', 'Banners', 50, 'description', 'Lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, It showed a lady fittedraising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and '),
(200, 'vi', 'Banners', 50, 'url', ''),
(201, 'vi', 'Banners', 51, 'title', ''),
(202, 'vi', 'Banners', 51, 'slug', ''),
(203, 'vi', 'Banners', 51, 'description', ''),
(204, 'vi', 'Banners', 51, 'url', ''),
(205, 'vi', 'Banners', 52, 'title', 'Phone numbers'),
(206, 'vi', 'Banners', 52, 'slug', 'phone-numbers'),
(207, 'vi', 'Banners', 52, 'description', 'It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>                         <p>Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in '),
(208, 'vi', 'Banners', 52, 'url', ''),
(209, 'vi', 'Banners', 53, 'title', ''),
(210, 'vi', 'Banners', 53, 'slug', ''),
(211, 'vi', 'Banners', 53, 'description', 'It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. '),
(212, 'vi', 'Banners', 53, 'url', ''),
(213, 'vi', 'Banners', 54, 'title', ''),
(214, 'vi', 'Banners', 54, 'slug', ''),
(215, 'vi', 'Banners', 54, 'description', 'It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls.'),
(216, 'vi', 'Banners', 54, 'url', ''),
(217, 'vi', 'Banners', 55, 'title', 'gaming System'),
(218, 'vi', 'Banners', 55, 'slug', 'gaming-system'),
(219, 'vi', 'Banners', 55, 'description', 'It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.'),
(220, 'vi', 'Banners', 55, 'url', ''),
(221, 'vi', 'Banners', 56, 'title', ''),
(222, 'vi', 'Banners', 56, 'slug', ''),
(223, 'vi', 'Banners', 56, 'description', 'Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather.'),
(224, 'vi', 'Banners', 56, 'url', ''),
(225, 'vi', 'Banners', 57, 'title', ''),
(226, 'vi', 'Banners', 57, 'slug', ''),
(227, 'vi', 'Banners', 57, 'description', ''),
(228, 'vi', 'Banners', 57, 'url', ''),
(229, 'vi', 'Banners', 58, 'title', ''),
(230, 'vi', 'Banners', 58, 'slug', ''),
(231, 'vi', 'Banners', 58, 'description', ''),
(232, 'vi', 'Banners', 58, 'url', ''),
(233, 'vi', 'Banners', 59, 'title', 'TERMINAL'),
(234, 'vi', 'Banners', 59, 'slug', 'terminal'),
(235, 'vi', 'Banners', 59, 'description', 'It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.  It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine.                          </p>                         <p> It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.  It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine.'),
(236, 'vi', 'Banners', 59, 'url', ''),
(237, 'vi', 'Banners', 60, 'title', ''),
(238, 'vi', 'Banners', 60, 'slug', ''),
(239, 'vi', 'Banners', 60, 'description', ' It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.  It wasn\'t a dream. </p>                         <p>His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine.  </p>                         <p> It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.  It wasn\'t a dream. </p>                         <p>His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine.  </p>                         <p>It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>                         <p>It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.  It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine.  It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. </p>                         <p>It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.  It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine. '),
(240, 'vi', 'Banners', 60, 'url', ''),
(241, 'vi', 'Banners', 61, 'title', ''),
(242, 'vi', 'Banners', 61, 'slug', ''),
(243, 'vi', 'Banners', 61, 'description', ''),
(244, 'vi', 'Banners', 61, 'url', ''),
(245, 'vi', 'Banners', 62, 'title', ''),
(246, 'vi', 'Banners', 62, 'slug', ''),
(247, 'vi', 'Banners', 62, 'description', ''),
(248, 'vi', 'Banners', 62, 'url', ''),
(249, 'vi', 'Banners', 63, 'title', 'Operating Management solution'),
(250, 'vi', 'Banners', 63, 'slug', 'operating-management-solution'),
(251, 'vi', 'Banners', 63, 'description', ' It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>                         <p>Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>                         <p>Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. </p>                         <p>His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather.'),
(252, 'vi', 'Banners', 63, 'url', ''),
(253, 'vi', 'Banners', 64, 'title', ''),
(254, 'vi', 'Banners', 64, 'slug', ''),
(255, 'vi', 'Banners', 64, 'description', ''),
(256, 'vi', 'Banners', 64, 'url', ''),
(257, 'vi', 'Banners', 65, 'title', ''),
(258, 'vi', 'Banners', 65, 'slug', ''),
(259, 'vi', 'Banners', 65, 'description', ''),
(260, 'vi', 'Banners', 65, 'url', ''),
(261, 'vi', 'Banners', 66, 'title', ''),
(262, 'vi', 'Banners', 66, 'slug', ''),
(263, 'vi', 'Banners', 66, 'description', ''),
(264, 'vi', 'Banners', 66, 'url', ''),
(265, 'vi', 'Banners', 67, 'title', ''),
(266, 'vi', 'Banners', 67, 'slug', ''),
(267, 'vi', 'Banners', 67, 'description', ''),
(268, 'vi', 'Banners', 67, 'url', ''),
(269, 'vi', 'Banners', 68, 'title', 'giới thiệu sản phẩm'),
(270, 'vi', 'Banners', 68, 'slug', 'gioi-thieu-san-pham'),
(271, 'vi', 'Banners', 68, 'description', '<p>Chọn từ 01 số đến tối đa 10 số trong tập hợp các số từ 01 đến 80.</p> 							<p>Người chơi chọn số hoặc máy tính chọn ngẫu nhiên.</p> 							<p>Giá trị tối thiểu cho mỗi bộ số tham gia dự thưởng là 10.000 đồng.</p> 							<p>Người chơi có thể dự thưởng tối đa 30 kỳ quay số mở thưởng liên tiếp.</p> 							<p>Các kỳ quay số liên tiếp được cài đặt mặc định là 02, 03, 05, 10, 20, 30.</p> 							<p>Kết quả quay số mở thưởng bao gồm 20 số do hệ thống tự động chọn ngẫu nhiên trong tập hợp các số từ 01 đến 80.</p>'),
(272, 'vi', 'Banners', 68, 'url', ''),
(273, 'vi', 'Banners', 69, 'title', ''),
(274, 'vi', 'Banners', 69, 'slug', ''),
(275, 'vi', 'Banners', 69, 'description', '<p> 								- Dự thưởng 01 kỳ, 01 bộ số có 01 số (số 18), 10.000 đồng/bộ số giá vé là 10.000 đồng <br>  								- Dự thưởng 02 kỳ, 02 bộ số , mỗi bộ số có 02 số (số 18, 45),10.000 đồng/bộ số → giá vé là 40.000 đồng <br>  								- Dự thưởng 30 kỳ liên tiếp, 01 bộ số có 05 số (03, 18, 45, 68, 80),20.000 đồng/bộ số→giá vé là 600.000 đồng 							</p>'),
(276, 'vi', 'Banners', 69, 'url', ''),
(277, 'vi', 'Banners', 70, 'title', 'KỲ QUAY SỐ MỞ THƯỞNG'),
(278, 'vi', 'Banners', 70, 'slug', 'ky-quay-so-mo-thuong'),
(279, 'vi', 'Banners', 70, 'description', '<p><strong>10 phút/kỳ → 6 kỳ/giờ; 96 kỳ/ngày</strong></p> 				<p>• Kỳ đầu tiên trong ngày: 6:00→6:10</p> 				<p>• Kỳ cuối cùng trong ngày: 21:50→22:00</p>'),
(280, 'vi', 'Banners', 70, 'url', ''),
(281, 'vi', 'Banners', 71, 'title', ''),
(282, 'vi', 'Banners', 71, 'slug', ''),
(283, 'vi', 'Banners', 71, 'description', '<p class=\"sm\">Hệ thống cho phép bán vé liên tục trong suốt thời gian của mỗi kỳ quay số mở thưởng <br> Vé đã được phát hành sẽ không được phép hủy, trừ khi có lỗi kỹ thuật: vé không hoàn chỉnh, vé thiếu thông tin.</p>'),
(284, 'vi', 'Banners', 71, 'url', ''),
(285, 'vi', 'Banners', 72, 'title', 'cơ cấu giải thưởng'),
(286, 'vi', 'Banners', 72, 'slug', 'co-cau-giai-thuong'),
(287, 'vi', 'Banners', 72, 'description', 'Dò các số đã chọn với 20 số của kết quả, tương ứng với cách chọn số.'),
(288, 'vi', 'Banners', 72, 'url', ''),
(289, 'vi', 'Banners', 73, 'title', 'Chọn 01 số'),
(290, 'vi', 'Banners', 73, 'slug', 'chon-01-so'),
(291, 'vi', 'Banners', 73, 'description', '01 số'),
(292, 'vi', 'Banners', 73, 'url', '22.000'),
(293, 'vi', 'Banners', 74, 'title', ''),
(294, 'vi', 'Banners', 74, 'slug', ''),
(295, 'vi', 'Banners', 74, 'description', '<p>*	Người trúng thưởng chỉ được lĩnh một hạng giải thưởng duy nhất tương ứng với cách chọn số.</p>     			<p>*	Giá trị lĩnh thưởng được tính theo tỷ lệ của số lần tham gia dự thưởng của bộ số nhân với 10.000 đồng.</p>'),
(296, 'vi', 'Banners', 74, 'url', '');
INSERT INTO `banner_translations` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(297, 'vi', 'Banners', 75, 'title', ''),
(298, 'vi', 'Banners', 75, 'slug', ''),
(299, 'vi', 'Banners', 75, 'description', ''),
(300, 'vi', 'Banners', 75, 'url', ''),
(301, 'vi', 'Banners', 76, 'title', ''),
(302, 'vi', 'Banners', 76, 'slug', ''),
(303, 'vi', 'Banners', 76, 'description', ''),
(304, 'vi', 'Banners', 76, 'url', ''),
(305, 'vi', 'Banners', 77, 'title', 'Thông tin sản phẩm'),
(306, 'vi', 'Banners', 77, 'slug', 'thong-tin-san-pham'),
(307, 'vi', 'Banners', 77, 'description', '<p>Ra mắt vào 18/11/2016                             <p>Là trò chơi chọn 1 số có 4 con số từ 0000 – 9999 để có cơ hội trúng thưởng lên tới 1.500 lần chỉ từ 10.000 đồng.</p>                             <p>Người chơi có thể tự mình chọn số hoặc để máy tính chọn số ngẫu nhiên (TC).</p>                             <p>Ngày quay số mở thưởng từ 18:00 đến 18:30 các ngày thứ 3, thứ 5 và Thứ Bảy hàng tuần.</p>                             <p>Xem kết quả quay số mở thưởng và dò số:</p>'),
(308, 'vi', 'Banners', 77, 'url', '<p>                                 - Xem quay số mở thưởng trực tiếp trên truyền hình VTC3, tại fanpage: https://www.facebook.com/vietlott.vn/ hoặc tại trang web Vietlott: vietlott.vn <br>                                  - Nhắn tin vào đầu số 8179, 8351, 8139, 9939, 9141, 9911,8130, 997 <br>                                  - Có thể mang vé tới Điểm Bán Hàng để kiểm tra trúng thưởng.                             </p>'),
(309, 'vi', 'Banners', 78, 'title', 'cách chơi cơ bản & cơ cấu giải thưởng'),
(310, 'vi', 'Banners', 78, 'slug', 'cach-choi-co-ban-co-cau-giai-thuong'),
(311, 'vi', 'Banners', 78, 'description', 'Gồm 5 hạng giải và được quay số mở thưởng 6 lần trong mỗi kỳ quay số mở thưởng để chọn ra 6 số trúng giải, cụ thể như sau:'),
(312, 'vi', 'Banners', 78, 'url', '<p>Giải Nhất: Quay số mở thưởng 01 lần chọn ra 1 số có 4 chữ số.</p>                             <p>Giải Nhì: Quay số mở thưởng 02 lần chọn ra 2 số, mỗi số có 4 chữ số.</p>                             <p>Giải Ba: Quay số mở thưởng 03 lần chọn ra 3 số, mỗi số có 4 chữ số.</p>'),
(313, 'vi', 'Banners', 79, 'title', 'Giải nhất'),
(314, 'vi', 'Banners', 79, 'slug', 'giai-nhat'),
(315, 'vi', 'Banners', 79, 'description', 'Trùng 4 con số kết quả Giải Nhất'),
(316, 'vi', 'Banners', 79, 'url', '1.500 lần|15.000.000 VND'),
(317, 'vi', 'Banners', 80, 'title', ''),
(318, 'vi', 'Banners', 80, 'slug', ''),
(319, 'vi', 'Banners', 80, 'description', '* Giá trị giải thưởng được cộng gộp trong trường hợp khách hàng trúng nhiều giải cùng lúc <br>                  * Riêng 3 giải: Giải Nhất, Khuyến Khích 1 và Khuyến Khích 2 người chơi sẽ chỉ nhận giải cao nhất.'),
(320, 'vi', 'Banners', 80, 'url', ''),
(321, 'vi', 'Banners', 81, 'title', '1. Chọn cách chơi:'),
(322, 'vi', 'Banners', 81, 'slug', '1-chon-cach-choi'),
(323, 'vi', 'Banners', 81, 'description', ''),
(324, 'vi', 'Banners', 81, 'url', ''),
(325, 'vi', 'Banners', 82, 'title', 'Cuộn'),
(326, 'vi', 'Banners', 82, 'slug', 'cuon'),
(327, 'vi', 'Banners', 82, 'description', '3 con số  <br> THEO THỨ TỰ'),
(328, 'vi', 'Banners', 82, 'url', ''),
(329, 'vi', 'Banners', 83, 'title', 'Bao'),
(330, 'vi', 'Banners', 83, 'slug', 'bao'),
(331, 'vi', 'Banners', 83, 'description', '4 con số  <br> KHÔNG THEO THỨ TỰ'),
(332, 'vi', 'Banners', 83, 'url', ''),
(333, 'vi', 'Banners', 84, 'title', 'Tổ hợp'),
(334, 'vi', 'Banners', 84, 'slug', 'to-hop'),
(335, 'vi', 'Banners', 84, 'description', '4 con số  <br> KHÔNG THEO THỨ TỰ <br> với giá 10.000 VND'),
(336, 'vi', 'Banners', 84, 'url', ''),
(337, 'vi', 'Banners', 85, 'title', '2. Chọn các con số & giá trị tham gia dự thưởng:'),
(338, 'vi', 'Banners', 85, 'slug', '2-chon-cac-con-so-gia-tri-tham-gia-du-thuong'),
(339, 'vi', 'Banners', 85, 'description', '<p>Đối với cách chơi Bao và Tổ Hợp, người chơi có thể chọn 4 con số từ 0-9 và cả 4 con số không được giống nhau.</p>                         <p>Đối với cách chơi Cuộn, người chơi chọn 3 con số đầu hoặc 3 con số đuôi. Con số còn lại thì hệ thống sẽ tự động kết hợp với 10 con số từ 0 đến 9 để tạo thành 10 bộ số tham gia dự thưởng.</p>                         <p>Người chơi có thể để máy tự chọn (TC) cho tất cả các cách chơi.</p>'),
(340, 'vi', 'Banners', 85, 'url', ''),
(341, 'vi', 'Banners', 86, 'title', ''),
(342, 'vi', 'Banners', 86, 'slug', ''),
(343, 'vi', 'Banners', 86, 'description', ''),
(344, 'vi', 'Banners', 86, 'url', ''),
(345, 'vi', 'Banners', 87, 'title', ''),
(346, 'vi', 'Banners', 87, 'slug', ''),
(347, 'vi', 'Banners', 87, 'description', ''),
(348, 'vi', 'Banners', 87, 'url', ''),
(349, 'vi', 'Banners', 88, 'title', 'Thông tin sản phẩm'),
(350, 'vi', 'Banners', 88, 'slug', 'thong-tin-san-pham'),
(351, 'vi', 'Banners', 88, 'description', 'p>Ra mắt vào 18/11/2016                                 <p>Là trò chơi chọn 1 số có 4 con số từ 0000 – 9999 để có cơ hội trúng thưởng lên tới 1.500 lần chỉ từ 10.000 đồng.</p>                                 <p>Người chơi có thể tự mình chọn số hoặc để máy tính chọn số ngẫu nhiên (TC).</p>                                 <p>Ngày quay số mở thưởng từ 18:00 đến 18:30 các ngày thứ 3, thứ 5 và Thứ Bảy hàng tuần.</p>                                 <p>Xem kết quả quay số mở thưởng và dò số:</p>'),
(352, 'vi', 'Banners', 88, 'url', '<p>                                     - Xem quay số mở thưởng trực tiếp trên truyền hình VTC3, tại fanpage: https://www.facebook.com/vietlott.vn/ hoặc tại trang web Vietlott: vietlott.vn <br>                                      - Nhắn tin vào đầu số 8179, 8351, 8139, 9939, 9141, 9911,8130, 997 <br>                                      - Có thể mang vé tới Điểm Bán Hàng để kiểm tra trúng thưởng.                                 </p>'),
(353, 'vi', 'Banners', 89, 'title', 'cách chơi cơ bản <br> & cơ cấu giải thưởng'),
(354, 'vi', 'Banners', 89, 'slug', 'cach-choi-co-ban-br-co-cau-giai-thuong'),
(355, 'vi', 'Banners', 89, 'description', '<p>Người chơi chọn 6 số bất kỳ từ số 01 đến số 45  (6 số hoàn toàn khác nhau).</p>                             <p>Người chơi dò 6 số đã chọn với 6 số của kết quả quay thưởng để tìm ra số lượng con số trùng.</p>'),
(356, 'vi', 'Banners', 89, 'url', ''),
(357, 'vi', 'Banners', 90, 'title', 'Giải jackpot'),
(358, 'vi', 'Banners', 90, 'slug', 'giai-jackpot'),
(359, 'vi', 'Banners', 90, 'description', '######'),
(360, 'vi', 'Banners', 90, 'url', 'Giá trị giải Jackpot tối thiểu là 12 tỷ* và được tích lũy'),
(361, 'vi', 'Banners', 91, 'title', ''),
(362, 'vi', 'Banners', 91, 'slug', ''),
(363, 'vi', 'Banners', 91, 'description', '<strong>Ghi chú:</strong> O là các số trùng với kết quả quay số mở thưởng, không theo thứ tự <br>                 * Giá trị giải thưởng được cộng gộp trong trường hợp khách hàng trúng nhiều giải cùng lúc <br>                  * Riêng 3 giải: Giải Nhất, Khuyến Khích 1 và Khuyến Khích 2 người chơi sẽ chỉ nhận giải cao nhất.'),
(364, 'vi', 'Banners', 91, 'url', ''),
(365, 'vi', 'Banners', 92, 'title', 'KỲ QUAY SỐ MỞ THƯỞNG'),
(366, 'vi', 'Banners', 92, 'slug', 'ky-quay-so-mo-thuong'),
(367, 'vi', 'Banners', 92, 'description', 'Thông tin chơi bao:'),
(368, 'vi', 'Banners', 92, 'url', ''),
(369, 'vi', 'Banners', 93, 'title', '<strong>Bao 5:</strong> Người tham gia dự thưởng lựa chọn 5 số trong tập hợp các số từ 01 đến 45. Số thứ 6 sẽ do hệ thống phần mềm chọn trong tập hợp 40 số còn lại tạo thành 40 bộ số tham gia dự thưởng. So sánh bộ số tham gia dự thưởng tại bảng bên dưới để xác định giải thưởng.'),
(370, 'vi', 'Banners', 93, 'slug', 'strong-bao-5-strong-nguoi-tham-gia-du-thuong-lua-chon-5-so-trong-tap-hop-cac-so-tu-01-den-45-so-thu-6-se-do-he-thong-phan-mem-chon-trong-tap-hop-40-so-con-lai-tao-thanh-40-bo-so-tham-gia-du-thuong-so-sanh-bo-so-tham-gia-du-thuong-tai-bang-ben-duoi-de-xac-dinh-giai-thuong'),
(371, 'vi', 'Banners', 93, 'description', ''),
(372, 'vi', 'Banners', 93, 'url', ''),
(373, 'vi', 'Banners', 94, 'title', '<strong>Bao 7 – Bao 15 và Bao 18:</strong> Người tham gia dự thưởng lựa chọn từ 7 số đến 15 số và 18 số trong tập hợp các số từ 01 đến 45. Sau đó, hệ thống phần mềm sẽ giúp người chơi tạo ra tất cả các kết hợp 6 số trong các số mà người chơi đã chọn để tạo thành các bộ số tham gia dự thưởng. So sánh bộ số tham gia dự thưởng với kết quả quay số mở thưởng để xác định giải thưởng.'),
(374, 'vi', 'Banners', 94, 'slug', 'strong-bao-7-bao-15-va-bao-18-strong-nguoi-tham-gia-du-thuong-lua-chon-tu-7-so-den-15-so-va-18-so-trong-tap-hop-cac-so-tu-01-den-45-sau-do-he-thong-phan-mem-se-giup-nguoi-choi-tao-ra-tat-ca-cac-ket-hop-6-so-trong-cac-so-ma-nguoi-choi-da-chon-de-tao-thanh-cac-bo-so-tham-gia-du-thuong-so-sanh-bo-so-tham-gia-du-thuong-voi-ket-qua-quay-so-mo-thuong-de-xac-dinh-giai-thuong'),
(375, 'vi', 'Banners', 94, 'description', ''),
(376, 'vi', 'Banners', 94, 'url', ''),
(377, 'vi', 'Banners', 95, 'title', 'BAO 5'),
(378, 'vi', 'Banners', 95, 'slug', 'bao-5'),
(379, 'vi', 'Banners', 95, 'description', '40|400,000|390 TR (MIL) + J(*)|390 TR (MIL) + J|12 TR (MIL)|1,2 TR (MIL)'),
(380, 'vi', 'Banners', 95, 'url', ''),
(381, 'vi', 'Banners', 96, 'title', '(*) J – Jackpot – Giải thưởng được cộng dồn nếu kỳ xổ số trước không có người trúng thưởng. Trong trường hợp có nhiều người trúng giải Jackpot thì giải Jackpot <br> được chia đều theo tỷ lệ giá trị tham gia dự thưởng của người trúng thưởng.'),
(382, 'vi', 'Banners', 96, 'slug', 'j-jackpot-giai-thuong-duoc-cong-don-neu-ky-xo-so-truoc-khong-co-nguoi-trung-thuong-trong-truong-hop-co-nhieu-nguoi-trung-giai-jackpot-thi-giai-jackpot-br-duoc-chia-deu-theo-ty-le-gia-tri-tham-gia-du-thuong-cua-nguoi-trung-thuong'),
(383, 'vi', 'Banners', 96, 'description', ''),
(384, 'vi', 'Banners', 96, 'url', ''),
(385, 'vi', 'Banners', 97, 'title', ''),
(386, 'vi', 'Banners', 97, 'slug', ''),
(387, 'vi', 'Banners', 97, 'description', ''),
(388, 'vi', 'Banners', 97, 'url', ''),
(389, 'vi', 'Banners', 98, 'title', ''),
(390, 'vi', 'Banners', 98, 'slug', ''),
(391, 'vi', 'Banners', 98, 'description', ''),
(392, 'vi', 'Banners', 98, 'url', ''),
(393, 'vi', 'Banners', 99, 'title', 'lotto game'),
(394, 'vi', 'Banners', 99, 'slug', 'lotto-game'),
(395, 'vi', 'Banners', 99, 'description', ''),
(396, 'vi', 'Banners', 99, 'url', ''),
(397, 'vi', 'Banners', 100, 'title', 'digit game'),
(398, 'vi', 'Banners', 100, 'slug', 'digit-game'),
(399, 'vi', 'Banners', 100, 'description', ''),
(400, 'vi', 'Banners', 100, 'url', ''),
(401, 'vi', 'Banners', 101, 'title', 'fast draw game'),
(402, 'vi', 'Banners', 101, 'slug', 'fast-draw-game'),
(403, 'vi', 'Banners', 101, 'description', ''),
(404, 'vi', 'Banners', 101, 'url', ''),
(405, 'vi', 'Banners', 102, 'title', 'Loto game'),
(406, 'vi', 'Banners', 102, 'slug', 'loto-game'),
(407, 'vi', 'Banners', 102, 'description', 'Ra mắt vào 18/07/2016. <br>         						Là trò chơi chọn 06 số bất kỳ trong 45 số từ 01 đến 45 để tạo thành một bộ số tham gia dự thưởng chỉ từ 10.000 đồng.Người chơi có thể tự mình chọn số hoặc để máy tính chọn số ngẫu nhiên (TC). <br>         						Ngày quay số mở thưởng từ 18:00 đến 18:30 các ngày thứ 4, thứ 6 và Chủ Nhật hàng tuần.'),
(408, 'vi', 'Banners', 102, 'url', ''),
(409, 'vi', 'Banners', 103, 'title', 'Mega 6/45'),
(410, 'vi', 'Banners', 103, 'slug', 'mega-6-45'),
(411, 'vi', 'Banners', 103, 'description', ''),
(412, 'vi', 'Banners', 103, 'url', ''),
(413, 'vi', 'Banners', 104, 'title', 'Mega 6/55'),
(414, 'vi', 'Banners', 104, 'slug', 'mega-6-55'),
(415, 'vi', 'Banners', 104, 'description', ''),
(416, 'vi', 'Banners', 104, 'url', ''),
(417, 'vi', 'Banners', 105, 'title', 'Mega 6/50'),
(418, 'vi', 'Banners', 105, 'slug', 'mega-6-50'),
(419, 'vi', 'Banners', 105, 'description', ''),
(420, 'vi', 'Banners', 105, 'url', ''),
(421, 'vi', 'Banners', 106, 'title', 'Mega 6/58'),
(422, 'vi', 'Banners', 106, 'slug', 'mega-6-58'),
(423, 'vi', 'Banners', 106, 'description', ''),
(424, 'vi', 'Banners', 106, 'url', ''),
(425, 'vi', 'Banners', 107, 'title', 'Digit Game'),
(426, 'vi', 'Banners', 107, 'slug', 'digit-game'),
(427, 'vi', 'Banners', 107, 'description', 'Ra mắt vào 18/07/2016. <br>          						Là trò chơi chọn 06 số bất kỳ trong 45 số từ 01 đến 45 để tạo thành một bộ số tham gia dự thưởng chỉ từ 10.000 đồng.Người chơi có thể tự mình chọn số hoặc để máy tính chọn số ngẫu nhiên (TC). <br>          						Ngày quay số mở thưởng từ 18:00 đến 18:30 các ngày thứ 4, thứ 6 và Chủ Nhật hàng tuần.'),
(428, 'vi', 'Banners', 107, 'url', ''),
(429, 'vi', 'Banners', 108, 'title', 'MAX 4D'),
(430, 'vi', 'Banners', 108, 'slug', 'max-4d'),
(431, 'vi', 'Banners', 108, 'description', ''),
(432, 'vi', 'Banners', 108, 'url', ''),
(433, 'vi', 'Banners', 109, 'title', 'DIGIT 5D'),
(434, 'vi', 'Banners', 109, 'slug', 'digit-5d'),
(435, 'vi', 'Banners', 109, 'description', ''),
(436, 'vi', 'Banners', 109, 'url', ''),
(437, 'vi', 'Banners', 110, 'title', 'DIGIT 6D'),
(438, 'vi', 'Banners', 110, 'slug', 'digit-6d'),
(439, 'vi', 'Banners', 110, 'description', ''),
(440, 'vi', 'Banners', 110, 'url', ''),
(441, 'vi', 'Banners', 111, 'title', 'Fast draw game'),
(442, 'vi', 'Banners', 111, 'slug', 'fast-draw-game'),
(443, 'vi', 'Banners', 111, 'description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '),
(444, 'vi', 'Banners', 111, 'url', ''),
(445, 'vi', 'Banners', 112, 'title', 'MANUAL'),
(446, 'vi', 'Banners', 112, 'slug', 'manual'),
(447, 'vi', 'Banners', 112, 'description', 'It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. '),
(448, 'vi', 'Banners', 112, 'url', ''),
(449, 'vi', 'Banners', 113, 'title', ''),
(450, 'vi', 'Banners', 113, 'slug', ''),
(451, 'vi', 'Banners', 113, 'description', 'Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the '),
(452, 'vi', 'Banners', 113, 'url', ''),
(453, 'vi', 'Banners', 114, 'title', 'Register'),
(454, 'vi', 'Banners', 114, 'slug', 'register'),
(455, 'vi', 'Banners', 114, 'description', ' It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>                         <p>The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! </p>                         <p>Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! \"Now fax quiz Jack!\" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! </p>                         <p>Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch \"Jeopardy!\", Alex Trebek\'s fun TV quiz game. Woven silk pyjamas exchanged for blue quartz. Brawny gods just</p>                         <p>A collection of textile samples lay spread out on the table Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! \"Now fax quiz Jack!\" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! </p>                         <p>Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch \"Jeopardy!\", Alex Trebek\'s fun TV quiz game. Woven silk pyjamas exchanged for blue quartz. Brawny gods just'),
(456, 'vi', 'Banners', 114, 'url', ''),
(457, 'vi', 'Banners', 115, 'title', ''),
(458, 'vi', 'Banners', 115, 'slug', ''),
(459, 'vi', 'Banners', 115, 'description', ''),
(460, 'vi', 'Banners', 115, 'url', '');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(45) NOT NULL DEFAULT '',
  `currencyCode` char(3) DEFAULT NULL,
  `population` varchar(20) DEFAULT NULL,
  `fipsCode` char(2) DEFAULT NULL,
  `isoNumeric` char(4) DEFAULT NULL,
  `north` varchar(30) DEFAULT NULL,
  `south` varchar(30) DEFAULT NULL,
  `east` varchar(30) DEFAULT NULL,
  `west` varchar(30) DEFAULT NULL,
  `capital` varchar(30) DEFAULT NULL,
  `continentName` varchar(15) DEFAULT NULL,
  `continent` char(2) DEFAULT NULL,
  `areaInSqKm` varchar(20) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  `isoAlpha3` char(3) DEFAULT NULL,
  `geonameId` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `countryName`, `currencyCode`, `population`, `fipsCode`, `isoNumeric`, `north`, `south`, `east`, `west`, `capital`, `continentName`, `continent`, `areaInSqKm`, `languages`, `isoAlpha3`, `geonameId`) VALUES
(1, 'AD', 'Andorra', 'EUR', '84000', 'AN', '020', '42.65604389629997', '42.42849259876837', '1.7865427778319827', '1.4071867141112762', 'Andorra la Vella', 'Europe', 'EU', '468.0', 'ca', 'AND', 3041565),
(2, 'AE', 'United Arab Emirates', 'AED', '4975593', 'AE', '784', '26.08415985107422', '22.633329391479492', '56.38166046142578', '51.58332824707031', 'Abu Dhabi', 'Asia', 'AS', '82880.0', 'ar-AE,fa,en,hi,ur', 'ARE', 290557),
(3, 'AF', 'Afghanistan', 'AFN', '29121286', 'AF', '004', '38.483418', '29.377472', '74.879448', '60.478443', 'Kabul', 'Asia', 'AS', '647500.0', 'fa-AF,ps,uz-AF,tk', 'AFG', 1149361),
(4, 'AG', 'Antigua and Barbuda', 'XCD', '86754', 'AC', '028', '17.729387', '16.996979', '-61.672421', '-61.906425', 'St. John\'s', 'North America', 'NA', '443.0', 'en-AG', 'ATG', 3576396),
(5, 'AI', 'Anguilla', 'XCD', '13254', 'AV', '660', '18.276901971658063', '18.160292974311673', '-62.96655544577948', '-63.16808989603879', 'The Valley', 'North America', 'NA', '102.0', 'en-AI', 'AIA', 3573511),
(6, 'AL', 'Albania', 'ALL', '2986952', 'AL', '008', '42.6611669383269', '39.6448624829142', '21.0574334835312', '19.2639112711741', 'Tirana', 'Europe', 'EU', '28748.0', 'sq,el', 'ALB', 783754),
(7, 'AM', 'Armenia', 'AMD', '2968000', 'AM', '051', '41.301834', '38.830528', '46.772435045159995', '43.44978', 'Yerevan', 'Asia', 'AS', '29800.0', 'hy', 'ARM', 174982),
(8, 'AO', 'Angola', 'AOA', '13068161', 'AO', '024', '-4.376826', '-18.042076', '24.082119', '11.679219', 'Luanda', 'Africa', 'AF', '1246700.0', 'pt-AO', 'AGO', 3351879),
(9, 'AQ', 'Antarctica', '', '0', 'AY', '010', '-60.515533', '-89.9999', '179.9999', '-179.9999', '', 'Antarctica', 'AN', '1.4E7', '', 'ATA', 6697173),
(10, 'AR', 'Argentina', 'ARS', '41343201', 'AR', '032', '-21.777951173', '-55.0576984539999', '-53.637962552', '-73.566302817', 'Buenos Aires', 'South America', 'SA', '2766890.0', 'es-AR,en,it,de,fr,gn', 'ARG', 3865483),
(11, 'AS', 'American Samoa', 'USD', '57881', 'AQ', '016', '-11.0497', '-14.382478', '-169.416077', '-171.091888', 'Pago Pago', 'Oceania', 'OC', '199.0', 'en-AS,sm,to', 'ASM', 5880801),
(12, 'AT', 'Austria', 'EUR', '8205000', 'AU', '040', '49.0211627691393', '46.3726520216244', '17.1620685652599', '9.53095237240833', 'Vienna', 'Europe', 'EU', '83858.0', 'de-AT,hr,hu,sl', 'AUT', 2782113),
(13, 'AU', 'Australia', 'AUD', '21515754', 'AS', '036', '-10.062805', '-43.64397', '153.639252', '112.911057', 'Canberra', 'Oceania', 'OC', '7686850.0', 'en-AU', 'AUS', 2077456),
(14, 'AW', 'Aruba', 'AWG', '71566', 'AA', '533', '12.623718127152925', '12.411707706190716', '-69.86575120104982', '-70.0644737196045', 'Oranjestad', 'North America', 'NA', '193.0', 'nl-AW,pap,es,en', 'ABW', 3577279),
(15, 'AX', 'Åland', 'EUR', '26711', '', '248', '60.488861', '59.90675', '21.011862', '19.317694', 'Mariehamn', 'Europe', 'EU', '1580.0', 'sv-AX', 'ALA', 661882),
(16, 'AZ', 'Azerbaijan', 'AZN', '8303512', 'AJ', '031', '41.90564', '38.38915252685547', '50.370083', '44.774113', 'Baku', 'Asia', 'AS', '86600.0', 'az,ru,hy', 'AZE', 587116),
(17, 'BA', 'Bosnia and Herzegovina', 'BAM', '4590000', 'BK', '070', '45.239193', '42.546112', '19.622223', '15.718945', 'Sarajevo', 'Europe', 'EU', '51129.0', 'bs,hr-BA,sr-BA', 'BIH', 3277605),
(18, 'BB', 'Barbados', 'BBD', '285653', 'BB', '052', '13.327257', '13.039844', '-59.420376', '-59.648922', 'Bridgetown', 'North America', 'NA', '431.0', 'en-BB', 'BRB', 3374084),
(19, 'BD', 'Bangladesh', 'BDT', '156118464', 'BG', '050', '26.631945', '20.743334', '92.673668', '88.028336', 'Dhaka', 'Asia', 'AS', '144000.0', 'bn-BD,en', 'BGD', 1210997),
(20, 'BE', 'Belgium', 'EUR', '10403000', 'BE', '056', '51.5051118897455', '49.496968483036', '6.40793743953125', '2.54132898439873', 'Brussels', 'Europe', 'EU', '30510.0', 'nl-BE,fr-BE,de-BE', 'BEL', 2802361),
(21, 'BF', 'Burkina Faso', 'XOF', '16241811', 'UV', '854', '15.082593', '9.401108', '2.405395', '-5.518916', 'Ouagadougou', 'Africa', 'AF', '274200.0', 'fr-BF,mos', 'BFA', 2361809),
(22, 'BG', 'Bulgaria', 'BGN', '7148785', 'BU', '100', '44.21764', '41.242084', '28.612167', '22.371166', 'Sofia', 'Europe', 'EU', '110910.0', 'bg,tr-BG,rom', 'BGR', 732800),
(23, 'BH', 'Bahrain', 'BHD', '738004', 'BA', '048', '26.282583', '25.796862', '50.664471', '50.45414', 'Manama', 'Asia', 'AS', '665.0', 'ar-BH,en,fa,ur', 'BHR', 290291),
(24, 'BI', 'Burundi', 'BIF', '9863117', 'BY', '108', '-2.310123', '-4.465713', '30.847729', '28.993061', 'Bujumbura', 'Africa', 'AF', '27830.0', 'fr-BI,rn', 'BDI', 433561),
(25, 'BJ', 'Benin', 'XOF', '9056010', 'BN', '204', '12.418347', '6.225748', '3.851701', '0.774575', 'Porto-Novo', 'Africa', 'AF', '112620.0', 'fr-BJ', 'BEN', 2395170),
(26, 'BL', 'Saint Barthélemy', 'EUR', '8450', 'TB', '652', '17.928808791949283', '17.878183227405575', '-62.788983372985854', '-62.8739118253784', 'Gustavia', 'North America', 'NA', '21.0', 'fr', 'BLM', 3578476),
(27, 'BM', 'Bermuda', 'BMD', '65365', 'BD', '060', '32.39122351646162', '32.247551', '-64.64718648144532', '-64.88723800000002', 'Hamilton', 'North America', 'NA', '53.0', 'en-BM,pt', 'BMU', 3573345),
(28, 'BN', 'Brunei', 'BND', '395027', 'BX', '096', '5.047167', '4.003083', '115.359444', '114.071442', 'Bandar Seri Begawan', 'Asia', 'AS', '5770.0', 'ms-BN,en-BN', 'BRN', 1820814),
(29, 'BO', 'Bolivia', 'BOB', '9947418', 'BL', '068', '-9.680567', '-22.896133', '-57.45809600000001', '-69.640762', 'Sucre', 'South America', 'SA', '1098580.0', 'es-BO,qu,ay', 'BOL', 3923057),
(30, 'BQ', 'Bonaire', 'USD', '18012', '', '535', '12.304535', '12.017149', '-68.192307', '-68.416458', 'Kralendijk', 'North America', 'NA', '328.0', 'nl,pap,en', 'BES', 7626844),
(31, 'BR', 'Brazil', 'BRL', '201103330', 'BR', '076', '5.264877', '-33.750706', '-32.392998', '-73.985535', 'Brasília', 'South America', 'SA', '8511965.0', 'pt-BR,es,en,fr', 'BRA', 3469034),
(32, 'BS', 'Bahamas', 'BSD', '301790', 'BF', '044', '26.919243', '22.852743', '-74.423874', '-78.995911', 'Nassau', 'North America', 'NA', '13940.0', 'en-BS', 'BHS', 3572887),
(33, 'BT', 'Bhutan', 'BTN', '699847', 'BT', '064', '28.323778', '26.70764', '92.125191', '88.75972', 'Thimphu', 'Asia', 'AS', '47000.0', 'dz', 'BTN', 1252634),
(34, 'BV', 'Bouvet Island', 'NOK', '0', 'BV', '074', '-54.3887383509872', '-54.4507993522734', '3.434845577758324', '3.286776428037342', '', 'Antarctica', 'AN', '49.0', '', 'BVT', 3371123),
(35, 'BW', 'Botswana', 'BWP', '2029307', 'BC', '072', '-17.780813', '-26.907246', '29.360781', '19.999535', 'Gaborone', 'Africa', 'AF', '600370.0', 'en-BW,tn-BW', 'BWA', 933860),
(36, 'BY', 'Belarus', 'BYN', '9685000', 'BO', '112', '56.165806', '51.256416', '32.770805', '23.176889', 'Minsk', 'Europe', 'EU', '207600.0', 'be,ru', 'BLR', 630336),
(37, 'BZ', 'Belize', 'BZD', '314522', 'BH', '084', '18.496557', '15.8893', '-87.776985', '-89.224815', 'Belmopan', 'North America', 'NA', '22966.0', 'en-BZ,es', 'BLZ', 3582678),
(38, 'CA', 'Canada', 'CAD', '33679000', 'CA', '124', '83.110626', '41.67598', '-52.636291', '-141', 'Ottawa', 'North America', 'NA', '9984670.0', 'en-CA,fr-CA,iu', 'CAN', 6251999),
(39, 'CC', 'Cocos [Keeling] Islands', 'AUD', '628', 'CK', '166', '-12.072459094', '-12.208725839', '96.929489344', '96.816941408', 'West Island', 'Asia', 'AS', '14.0', 'ms-CC,en', 'CCK', 1547376),
(40, 'CD', 'Democratic Republic of the Congo', 'CDF', '70916439', 'CG', '180', '5.386098', '-13.455675', '31.305912', '12.204144', 'Kinshasa', 'Africa', 'AF', '2345410.0', 'fr-CD,ln,ktu,kg,sw,lua', 'COD', 203312),
(41, 'CF', 'Central African Republic', 'XAF', '4844927', 'CT', '140', '11.007569', '2.220514', '27.463421', '14.420097', 'Bangui', 'Africa', 'AF', '622984.0', 'fr-CF,sg,ln,kg', 'CAF', 239880),
(42, 'CG', 'Republic of the Congo', 'XAF', '3039126', 'CF', '178', '3.703082', '-5.027223', '18.649839', '11.205009', 'Brazzaville', 'Africa', 'AF', '342000.0', 'fr-CG,kg,ln-CG', 'COG', 2260494),
(43, 'CH', 'Switzerland', 'CHF', '7581000', 'SZ', '756', '47.8098679329775', '45.8191539516188', '10.4934735095497', '5.95661377423453', 'Bern', 'Europe', 'EU', '41290.0', 'de-CH,fr-CH,it-CH,rm', 'CHE', 2658434),
(44, 'CI', 'Ivory Coast', 'XOF', '21058798', 'IV', '384', '10.736642', '4.357067', '-2.494897', '-8.599302', 'Yamoussoukro', 'Africa', 'AF', '322460.0', 'fr-CI', 'CIV', 2287781),
(45, 'CK', 'Cook Islands', 'NZD', '21388', 'CW', '184', '-10.023114', '-21.944164', '-157.312134', '-161.093658', 'Avarua', 'Oceania', 'OC', '240.0', 'en-CK,mi', 'COK', 1899402),
(46, 'CL', 'Chile', 'CLP', '16746491', 'CI', '152', '-17.4977759459999', '-55.909795409', '-66.416152278', '-80.8370287079999', 'Santiago', 'South America', 'SA', '756950.0', 'es-CL', 'CHL', 3895114),
(47, 'CM', 'Cameroon', 'XAF', '19294149', 'CM', '120', '13.078056', '1.652548', '16.192116', '8.494763', 'Yaoundé', 'Africa', 'AF', '475440.0', 'en-CM,fr-CM', 'CMR', 2233387),
(48, 'CN', 'China', 'CNY', '1330044000', 'CH', '156', '53.56086', '15.775416', '134.773911', '73.557693', 'Beijing', 'Asia', 'AS', '9596960.0', 'zh-CN,yue,wuu,dta,ug,za', 'CHN', 1814991),
(49, 'CO', 'Colombia', 'COP', '47790000', 'CO', '170', '13.380502', '-4.225869', '-66.869835', '-81.728111', 'Bogotá', 'South America', 'SA', '1138910.0', 'es-CO', 'COL', 3686110),
(50, 'CR', 'Costa Rica', 'CRC', '4516220', 'CS', '188', '11.216819', '8.032975', '-82.555992', '-85.950623', 'San José', 'North America', 'NA', '51100.0', 'es-CR,en', 'CRI', 3624060),
(51, 'CU', 'Cuba', 'CUP', '11423000', 'CU', '192', '23.226042', '19.828083', '-74.131775', '-84.957428', 'Havana', 'North America', 'NA', '110860.0', 'es-CU,pap', 'CUB', 3562981),
(52, 'CV', 'Cape Verde', 'CVE', '508659', 'CV', '132', '17.197178', '14.808022', '-22.669443', '-25.358747', 'Praia', 'Africa', 'AF', '4033.0', 'pt-CV', 'CPV', 3374766),
(53, 'CW', 'Curacao', 'ANG', '141766', 'UC', '531', '12.385672', '12.032745', '-68.733948', '-69.157204', 'Willemstad', 'North America', 'NA', '444.0', 'nl,pap', 'CUW', 7626836),
(54, 'CX', 'Christmas Island', 'AUD', '1500', 'KT', '162', '-10.412356007', '-10.5704829995', '105.712596992', '105.533276992', 'Flying Fish Cove', 'Oceania', 'OC', '135.0', 'en,zh,ms-CC', 'CXR', 2078138),
(55, 'CY', 'Cyprus', 'EUR', '1102677', 'CY', '196', '35.701527', '34.6332846722908', '34.59791599999994', '32.27308300000004', 'Nicosia', 'Europe', 'EU', '9250.0', 'el-CY,tr-CY,en', 'CYP', 146669),
(56, 'CZ', 'Czechia', 'CZK', '10476000', 'EZ', '203', '51.058887', '48.542915', '18.860111', '12.096194', 'Prague', 'Europe', 'EU', '78866.0', 'cs,sk', 'CZE', 3077311),
(57, 'DE', 'Germany', 'EUR', '81802257', 'GM', '276', '55.0583836008072', '47.2701236047002', '15.0418156516163', '5.8663152683722', 'Berlin', 'Europe', 'EU', '357021.0', 'de', 'DEU', 2921044),
(58, 'DJ', 'Djibouti', 'DJF', '740528', 'DJ', '262', '12.706833', '10.909917', '43.416973', '41.773472', 'Djibouti', 'Africa', 'AF', '23000.0', 'fr-DJ,ar,so-DJ,aa', 'DJI', 223816),
(59, 'DK', 'Denmark', 'DKK', '5484000', 'DA', '208', '57.748417', '54.562389', '15.158834', '8.075611', 'Copenhagen', 'Europe', 'EU', '43094.0', 'da-DK,en,fo,de-DK', 'DNK', 2623032),
(60, 'DM', 'Dominica', 'XCD', '72813', 'DO', '212', '15.631809', '15.20169', '-61.244152', '-61.484108', 'Roseau', 'North America', 'NA', '754.0', 'en-DM', 'DMA', 3575830),
(61, 'DO', 'Dominican Republic', 'DOP', '9823821', 'DR', '214', '19.9321257501267', '17.5395066830409', '-68.3229591969468', '-72.0114723981787', 'Santo Domingo', 'North America', 'NA', '48730.0', 'es-DO', 'DOM', 3508796),
(62, 'DZ', 'Algeria', 'DZD', '34586184', 'AG', '012', '37.093723', '18.960028', '11.979548', '-8.673868', 'Algiers', 'Africa', 'AF', '2381740.0', 'ar-DZ', 'DZA', 2589581),
(63, 'EC', 'Ecuador', 'USD', '14790608', 'EC', '218', '1.43523516349953', '-5.01615732302488', '-75.1871465547501', '-81.0836838953894', 'Quito', 'South America', 'SA', '283560.0', 'es-EC', 'ECU', 3658394),
(64, 'EE', 'Estonia', 'EUR', '1291170', 'EN', '233', '59.6753143130129', '57.5093097920079', '28.2090381531431', '21.8285886498081', 'Tallinn', 'Europe', 'EU', '45226.0', 'et,ru', 'EST', 453733),
(65, 'EG', 'Egypt', 'EGP', '80471869', 'EG', '818', '31.667334', '21.725389', '36.89833068847656', '24.698111', 'Cairo', 'Africa', 'AF', '1001450.0', 'ar-EG,en,fr', 'EGY', 357994),
(66, 'EH', 'Western Sahara', 'MAD', '273008', 'WI', '732', '27.669674', '20.774158', '-8.670276', '-17.103182', 'Laâyoune / El Aaiún', 'Africa', 'AF', '266000.0', 'ar,mey', 'ESH', 2461445),
(67, 'ER', 'Eritrea', 'ERN', '5792984', 'ER', '232', '18.003084', '12.359555', '43.13464', '36.438778', 'Asmara', 'Africa', 'AF', '121320.0', 'aa-ER,ar,tig,kun,ti-ER', 'ERI', 338010),
(68, 'ES', 'Spain', 'EUR', '46505963', 'SP', '724', '43.7913565913767', '36.0001044260548', '4.32778473043961', '-9.30151567231899', 'Madrid', 'Europe', 'EU', '504782.0', 'es-ES,ca,gl,eu,oc', 'ESP', 2510769),
(69, 'ET', 'Ethiopia', 'ETB', '88013491', 'ET', '231', '14.89375', '3.402422', '47.986179', '32.999939', 'Addis Ababa', 'Africa', 'AF', '1127127.0', 'am,en-ET,om-ET,ti-ET,so-ET,sid', 'ETH', 337996),
(70, 'FI', 'Finland', 'EUR', '5244000', 'FI', '246', '70.096054', '59.808777', '31.580944', '20.556944', 'Helsinki', 'Europe', 'EU', '337030.0', 'fi-FI,sv-FI,smn', 'FIN', 660013),
(71, 'FJ', 'Fiji', 'FJD', '875983', 'FJ', '242', '-12.479632058714332', '-20.67597', '-178.424438', '177.14038537647912', 'Suva', 'Oceania', 'OC', '18270.0', 'en-FJ,fj', 'FJI', 2205218),
(72, 'FK', 'Falkland Islands', 'FKP', '2638', 'FK', '238', '-51.2331394719999', '-52.383984175', '-57.718087652', '-61.3474566739999', 'Stanley', 'South America', 'SA', '12173.0', 'en-FK', 'FLK', 3474414),
(73, 'FM', 'Micronesia', 'USD', '107708', 'FM', '583', '10.08904', '1.02629', '163.03717', '137.33648', 'Palikir', 'Oceania', 'OC', '702.0', 'en-FM,chk,pon,yap,kos,uli,woe,nkr,kpg', 'FSM', 2081918),
(74, 'FO', 'Faroe Islands', 'DKK', '48228', 'FO', '234', '62.3938884414274', '61.3910302656013', '-6.25655957192113', '-7.688191677774624', 'Tórshavn', 'Europe', 'EU', '1399.0', 'fo,da-FO', 'FRO', 2622320),
(75, 'FR', 'France', 'EUR', '64768389', 'FR', '250', '51.0890012279322', '41.3658213299999', '9.5596148665824', '-5.1389964684508', 'Paris', 'Europe', 'EU', '547030.0', 'fr-FR,frp,br,co,ca,eu,oc', 'FRA', 3017382),
(76, 'GA', 'Gabon', 'XAF', '1545255', 'GB', '266', '2.322612', '-3.978806', '14.502347', '8.695471', 'Libreville', 'Africa', 'AF', '267667.0', 'fr-GA', 'GAB', 2400553),
(77, 'GB', 'United Kingdom', 'GBP', '62348447', 'UK', '826', '59.3607741849963', '49.9028622252397', '1.7689121033873', '-8.61772077108559', 'London', 'Europe', 'EU', '244820.0', 'en-GB,cy-GB,gd', 'GBR', 2635167),
(78, 'GD', 'Grenada', 'XCD', '107818', 'GJ', '308', '12.318283928171299', '11.986893', '-61.57676970108031', '-61.802344', 'St. George\'s', 'North America', 'NA', '344.0', 'en-GD', 'GRD', 3580239),
(79, 'GE', 'Georgia', 'GEL', '4630000', 'GG', '268', '43.586498', '41.053196', '46.725971', '40.010139', 'Tbilisi', 'Asia', 'AS', '69700.0', 'ka,ru,hy,az', 'GEO', 614540),
(80, 'GF', 'French Guiana', 'EUR', '195506', 'FG', '254', '5.776496', '2.127094', '-51.613949', '-54.542511', 'Cayenne', 'South America', 'SA', '91000.0', 'fr-GF', 'GUF', 3381670),
(81, 'GG', 'Guernsey', 'GBP', '65228', 'GK', '831', '49.731727816705416', '49.40764156876899', '-2.1577152112246267', '-2.673194593476069', 'St Peter Port', 'Europe', 'EU', '78.0', 'en,nrf', 'GGY', 3042362),
(82, 'GH', 'Ghana', 'GHS', '24339838', 'GH', '288', '11.173301', '4.736723', '1.191781', '-3.25542', 'Accra', 'Africa', 'AF', '239460.0', 'en-GH,ak,ee,tw', 'GHA', 2300660),
(83, 'GI', 'Gibraltar', 'GIP', '27884', 'GI', '292', '36.155439135670726', '36.10903070140248', '-5.338285164001491', '-5.36626149743654', 'Gibraltar', 'Europe', 'EU', '6.5', 'en-GI,es,it,pt', 'GIB', 2411586),
(84, 'GL', 'Greenland', 'DKK', '56375', 'GL', '304', '83.627357', '59.777401', '-11.312319', '-73.04203', 'Nuuk', 'North America', 'NA', '2166086.0', 'kl,da-GL,en', 'GRL', 3425505),
(85, 'GM', 'Gambia', 'GMD', '1593256', 'GA', '270', '13.826571', '13.064252', '-13.797793', '-16.825079', 'Bathurst', 'Africa', 'AF', '11300.0', 'en-GM,mnk,wof,wo,ff', 'GMB', 2413451),
(86, 'GN', 'Guinea', 'GNF', '10324025', 'GV', '324', '12.67622', '7.193553', '-7.641071', '-14.926619', 'Conakry', 'Africa', 'AF', '245857.0', 'fr-GN', 'GIN', 2420477),
(87, 'GP', 'Guadeloupe', 'EUR', '443000', 'GP', '312', '16.516848', '15.867565', '-61', '-61.544765', 'Basse-Terre', 'North America', 'NA', '1780.0', 'fr-GP', 'GLP', 3579143),
(88, 'GQ', 'Equatorial Guinea', 'XAF', '1014999', 'EK', '226', '2.346989', '0.92086', '11.335724', '9.346865', 'Malabo', 'Africa', 'AF', '28051.0', 'es-GQ,fr', 'GNQ', 2309096),
(89, 'GR', 'Greece', 'EUR', '11000000', 'GR', '300', '41.7484999849641', '34.8020663391466', '28.2470831714347', '19.3736035624134', 'Athens', 'Europe', 'EU', '131940.0', 'el-GR,en,fr', 'GRC', 390903),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'GBP', '30', 'SX', '239', '-53.980896636', '-59.46319341', '-26.252069712', '-38.0479509639999', 'Grytviken', 'Antarctica', 'AN', '3903.0', 'en', 'SGS', 3474415),
(91, 'GT', 'Guatemala', 'GTQ', '13550440', 'GT', '320', '17.81522', '13.737302', '-88.223198', '-92.23629', 'Guatemala City', 'North America', 'NA', '108890.0', 'es-GT', 'GTM', 3595528),
(92, 'GU', 'Guam', 'USD', '159358', 'GQ', '316', '13.654402', '13.23376', '144.956894', '144.61806', 'Hagåtña', 'Oceania', 'OC', '549.0', 'en-GU,ch-GU', 'GUM', 4043988),
(93, 'GW', 'Guinea-Bissau', 'XOF', '1565126', 'PU', '624', '12.680789', '10.924265', '-13.636522', '-16.717535', 'Bissau', 'Africa', 'AF', '36120.0', 'pt-GW,pov', 'GNB', 2372248),
(94, 'GY', 'Guyana', 'GYD', '748486', 'GY', '328', '8.557567', '1.17508', '-56.480251', '-61.384762', 'Georgetown', 'South America', 'SA', '214970.0', 'en-GY', 'GUY', 3378535),
(95, 'HK', 'Hong Kong', 'HKD', '6898686', 'HK', '344', '22.559778', '22.15325', '114.434753', '113.837753', 'Hong Kong', 'Asia', 'AS', '1092.0', 'zh-HK,yue,zh,en', 'HKG', 1819730),
(96, 'HM', 'Heard Island and McDonald Islands', 'AUD', '0', 'HM', '334', '-52.909416', '-53.192001', '73.859146', '72.596535', '', 'Antarctica', 'AN', '412.0', '', 'HMD', 1547314),
(97, 'HN', 'Honduras', 'HNL', '7989415', 'HO', '340', '16.510256', '12.982411', '-83.155403', '-89.350792', 'Tegucigalpa', 'North America', 'NA', '112090.0', 'es-HN,cab,miq', 'HND', 3608932),
(98, 'HR', 'Croatia', 'HRK', '4284889', 'HR', '191', '46.53875', '42.43589', '19.427389', '13.493222', 'Zagreb', 'Europe', 'EU', '56542.0', 'hr-HR,sr', 'HRV', 3202326),
(99, 'HT', 'Haiti', 'HTG', '9648924', 'HA', '332', '20.08782', '18.021032', '-71.613358', '-74.478584', 'Port-au-Prince', 'North America', 'NA', '27750.0', 'ht,fr-HT', 'HTI', 3723988),
(100, 'HU', 'Hungary', 'HUF', '9982000', 'HU', '348', '48.585667', '45.74361', '22.906', '16.111889', 'Budapest', 'Europe', 'EU', '93030.0', 'hu-HU', 'HUN', 719819),
(101, 'ID', 'Indonesia', 'IDR', '242968342', 'ID', '360', '5.904417', '-10.941861', '141.021805', '95.009331', 'Jakarta', 'Asia', 'AS', '1919440.0', 'id,en,nl,jv', 'IDN', 1643084),
(102, 'IE', 'Ireland', 'EUR', '4622917', 'EI', '372', '55.3829431564742', '51.4475491577615', '-5.99804990172185', '-10.4800035816853', 'Dublin', 'Europe', 'EU', '70280.0', 'en-IE,ga-IE', 'IRL', 2963597),
(103, 'IL', 'Israel', 'ILS', '7353985', 'IS', '376', '33.340137', '29.496639', '35.876804', '34.270278754419145', '', 'Asia', 'AS', '20770.0', 'he,ar-IL,en-IL,', 'ISR', 294640),
(104, 'IM', 'Isle of Man', 'GBP', '75049', 'IM', '833', '54.419724', '54.055916', '-4.3115', '-4.798722', 'Douglas', 'Europe', 'EU', '572.0', 'en,gv', 'IMN', 3042225),
(105, 'IN', 'India', 'INR', '1173108018', 'IN', '356', '35.524548272882', '6.7559528993543', '97.4152926679075', '68.4840183183648', 'New Delhi', 'Asia', 'AS', '3287590.0', 'en-IN,hi,bn,te,mr,ta,ur,gu,kn,ml,or,pa,as,bh,sat,ks,ne,sd,kok,doi,mni,sit,sa,fr,lus,inc', 'IND', 1269750),
(106, 'IO', 'British Indian Ocean Territory', 'USD', '4000', 'IO', '086', '-5.268333', '-7.438028', '72.493164', '71.259972', '', 'Asia', 'AS', '60.0', 'en-IO', 'IOT', 1282588),
(107, 'IQ', 'Iraq', 'IQD', '29671605', 'IZ', '368', '37.378029', '29.069445', '48.575916', '38.795887', 'Baghdad', 'Asia', 'AS', '437072.0', 'ar-IQ,ku,hy', 'IRQ', 99237),
(108, 'IR', 'Iran', 'IRR', '76923300', 'IR', '364', '39.777222', '25.064083', '63.317471', '44.047279', 'Tehran', 'Asia', 'AS', '1648000.0', 'fa-IR,ku', 'IRN', 130758),
(109, 'IS', 'Iceland', 'ISK', '308910', 'IC', '352', '66.5377933098397', '63.394392778588', '-13.4946206239501', '-24.5326753866625', 'Reykjavik', 'Europe', 'EU', '103000.0', 'is,en,de,da,sv,no', 'ISL', 2629691),
(110, 'IT', 'Italy', 'EUR', '60340328', 'IT', '380', '47.0917837415439', '36.6440816661648', '18.5203814091888', '6.62662135986088', 'Rome', 'Europe', 'EU', '301230.0', 'it-IT,de-IT,fr-IT,sc,ca,co,sl', 'ITA', 3175395),
(111, 'JE', 'Jersey', 'GBP', '90812', 'JE', '832', '49.265057', '49.169834', '-2.022083', '-2.260028', 'Saint Helier', 'Europe', 'EU', '116.0', 'en,fr,nrf', 'JEY', 3042142),
(112, 'JM', 'Jamaica', 'JMD', '2847232', 'JM', '388', '18.524766185516', '17.7059966193696', '-76.1830989848426', '-78.3690062954957', 'Kingston', 'North America', 'NA', '10991.0', 'en-JM', 'JAM', 3489940),
(113, 'JO', 'Jordan', 'JOD', '6407085', 'JO', '400', '33.367668', '29.185888', '39.301167', '34.959999', 'Amman', 'Asia', 'AS', '92300.0', 'ar-JO,en', 'JOR', 248816),
(114, 'JP', 'Japan', 'JPY', '127288000', 'JA', '392', '45.52295736', '24.255169441', '145.817458885', '122.933653061', 'Tokyo', 'Asia', 'AS', '377835.0', 'ja', 'JPN', 1861060),
(115, 'KE', 'Kenya', 'KES', '40046566', 'KE', '404', '5.019938', '-4.678047', '41.899078', '33.908859', 'Nairobi', 'Africa', 'AF', '582650.0', 'en-KE,sw-KE', 'KEN', 192950),
(116, 'KG', 'Kyrgyzstan', 'KGS', '5776500', 'KG', '417', '43.238224', '39.172832', '80.283165', '69.276611', 'Bishkek', 'Asia', 'AS', '198500.0', 'ky,uz,ru', 'KGZ', 1527747),
(117, 'KH', 'Cambodia', 'KHR', '14453680', 'CB', '116', '14.686417', '10.409083', '107.627724', '102.339996', 'Phnom Penh', 'Asia', 'AS', '181040.0', 'km,fr,en', 'KHM', 1831722),
(118, 'KI', 'Kiribati', 'AUD', '92533', 'KR', '296', '4.71957', '-11.446881150186856', '-150.215347', '169.556137', 'Tarawa', 'Oceania', 'OC', '811.0', 'en-KI,gil', 'KIR', 4030945),
(119, 'KM', 'Comoros', 'KMF', '773407', 'CN', '174', '-11.362381', '-12.387857', '44.538223', '43.21579', 'Moroni', 'Africa', 'AF', '2170.0', 'ar,fr-KM', 'COM', 921929),
(120, 'KN', 'Saint Kitts and Nevis', 'XCD', '51134', 'SC', '659', '17.420118', '17.095343', '-62.543266', '-62.86956', 'Basseterre', 'North America', 'NA', '261.0', 'en-KN', 'KNA', 3575174),
(121, 'KP', 'North Korea', 'KPW', '22912177', 'KN', '408', '43.006054', '37.673332', '130.674866', '124.315887', 'Pyongyang', 'Asia', 'AS', '120540.0', 'ko-KP', 'PRK', 1873107),
(122, 'KR', 'South Korea', 'KRW', '48422644', 'KS', '410', '38.5933891092225', '33.1954102977009', '129.583016157998', '125.887442375577', 'Seoul', 'Asia', 'AS', '98480.0', 'ko-KR,en', 'KOR', 1835841),
(123, 'KW', 'Kuwait', 'KWD', '2789132', 'KU', '414', '30.095945', '28.524611', '48.431473', '46.555557', 'Kuwait City', 'Asia', 'AS', '17820.0', 'ar-KW,en', 'KWT', 285570),
(124, 'KY', 'Cayman Islands', 'KYD', '44270', 'CJ', '136', '19.7617', '19.263029', '-79.727272', '-81.432777', 'George Town', 'North America', 'NA', '262.0', 'en-KY', 'CYM', 3580718),
(125, 'KZ', 'Kazakhstan', 'KZT', '15340000', 'KZ', '398', '55.451195', '40.936333', '87.312668', '46.491859', 'Astana', 'Asia', 'AS', '2717300.0', 'kk,ru', 'KAZ', 1522867),
(126, 'LA', 'Laos', 'LAK', '6368162', 'LA', '418', '22.500389', '13.910027', '107.697029', '100.093056', 'Vientiane', 'Asia', 'AS', '236800.0', 'lo,fr,en', 'LAO', 1655842),
(127, 'LB', 'Lebanon', 'LBP', '4125247', 'LE', '422', '34.691418', '33.05386', '36.639194', '35.114277', 'Beirut', 'Asia', 'AS', '10400.0', 'ar-LB,fr-LB,en,hy', 'LBN', 272103),
(128, 'LC', 'Saint Lucia', 'XCD', '160922', 'ST', '662', '14.110317287646', '13.7072692224982', '-60.8732306422271', '-61.07995730159752', 'Castries', 'North America', 'NA', '616.0', 'en-LC', 'LCA', 3576468),
(129, 'LI', 'Liechtenstein', 'CHF', '35000', 'LS', '438', '47.2706251386959', '47.0484284123471', '9.63564281136796', '9.47167359782014', 'Vaduz', 'Europe', 'EU', '160.0', 'de-LI', 'LIE', 3042058),
(130, 'LK', 'Sri Lanka', 'LKR', '21513990', 'CE', '144', '9.831361', '5.916833', '81.881279', '79.652916', 'Colombo', 'Asia', 'AS', '65610.0', 'si,ta,en', 'LKA', 1227603),
(131, 'LR', 'Liberia', 'LRD', '3685076', 'LI', '430', '8.551791', '4.353057', '-7.365113', '-11.492083', 'Monrovia', 'Africa', 'AF', '111370.0', 'en-LR', 'LBR', 2275384),
(132, 'LS', 'Lesotho', 'LSL', '1919552', 'LT', '426', '-28.5708', '-30.6755750029999', '29.4557099420001', '27.011229998', 'Maseru', 'Africa', 'AF', '30355.0', 'en-LS,st,zu,xh', 'LSO', 932692),
(133, 'LT', 'Lithuania', 'EUR', '2944459', 'LH', '440', '56.446918', '53.901306', '26.871944', '20.941528', 'Vilnius', 'Europe', 'EU', '65200.0', 'lt,ru,pl', 'LTU', 597427),
(134, 'LU', 'Luxembourg', 'EUR', '497538', 'LU', '442', '50.182772453796446', '49.447858677765716', '6.5308980672559525', '5.735698938390786', 'Luxembourg', 'Europe', 'EU', '2586.0', 'lb,de-LU,fr-LU', 'LUX', 2960313),
(135, 'LV', 'Latvia', 'EUR', '2217969', 'LG', '428', '58.0856982477268', '55.6747774931332', '28.2412717372783', '20.9719557460935', 'Riga', 'Europe', 'EU', '64589.0', 'lv,ru,lt', 'LVA', 458258),
(136, 'LY', 'Libya', 'LYD', '6461454', 'LY', '434', '33.168999', '19.508045', '25.150612', '9.38702', 'Tripoli', 'Africa', 'AF', '1759540.0', 'ar-LY,it,en', 'LBY', 2215636),
(137, 'MA', 'Morocco', 'MAD', '33848242', 'MO', '504', '35.9224966985384', '27.662115', '-0.991750000000025', '-13.168586', 'Rabat', 'Africa', 'AF', '446550.0', 'ar-MA,ber,fr', 'MAR', 2542007),
(138, 'MC', 'Monaco', 'EUR', '32965', 'MN', '492', '43.75196717037228', '43.72472839869377', '7.439939260482788', '7.408962249755859', 'Monaco', 'Europe', 'EU', '1.95', 'fr-MC,en,it', 'MCO', 2993457),
(139, 'MD', 'Moldova', 'MDL', '4324000', 'MD', '498', '48.490166', '45.468887', '30.135445', '26.618944', 'Chişinău', 'Europe', 'EU', '33843.0', 'ro,ru,gag,tr', 'MDA', 617790),
(140, 'ME', 'Montenegro', 'EUR', '666730', 'MJ', '499', '43.570137', '41.850166', '20.358833', '18.461306', 'Podgorica', 'Europe', 'EU', '14026.0', 'sr,hu,bs,sq,hr,rom', 'MNE', 3194884),
(141, 'MF', 'Saint Martin', 'EUR', '35925', 'RN', '663', '18.125295191246206', '18.04717219103021', '-63.01059106320133', '-63.15036103890611', 'Marigot', 'North America', 'NA', '53.0', 'fr', 'MAF', 3578421),
(142, 'MG', 'Madagascar', 'MGA', '21281844', 'MA', '450', '-11.945433', '-25.608952', '50.48378', '43.224876', 'Antananarivo', 'Africa', 'AF', '587040.0', 'fr-MG,mg', 'MDG', 1062947),
(143, 'MH', 'Marshall Islands', 'USD', '65859', 'RM', '584', '14.62', '5.587639', '171.931808', '165.524918', 'Majuro', 'Oceania', 'OC', '181.3', 'mh,en-MH', 'MHL', 2080185),
(144, 'MK', 'Macedonia', 'MKD', '2062294', 'MK', '807', '42.361805', '40.860195', '23.038139', '20.464695', 'Skopje', 'Europe', 'EU', '25333.0', 'mk,sq,tr,rmm,sr', 'MKD', 718075),
(145, 'ML', 'Mali', 'XOF', '13796354', 'ML', '466', '25.000002', '10.159513', '4.244968', '-12.242614', 'Bamako', 'Africa', 'AF', '1240000.0', 'fr-ML,bm', 'MLI', 2453866),
(146, 'MM', 'Myanmar [Burma]', 'MMK', '53414374', 'BM', '104', '28.543249', '9.784583', '101.176781', '92.189278', 'Naypyitaw', 'Asia', 'AS', '678500.0', 'my', 'MMR', 1327865),
(147, 'MN', 'Mongolia', 'MNT', '3086918', 'MG', '496', '52.154251', '41.567638', '119.924309', '87.749664', 'Ulan Bator', 'Asia', 'AS', '1565000.0', 'mn,ru', 'MNG', 2029969),
(148, 'MO', 'Macao', 'MOP', '449198', 'MC', '446', '22.222334', '22.180389', '113.565834', '113.528946', 'Macao', 'Asia', 'AS', '254.0', 'zh,zh-MO,pt', 'MAC', 1821275),
(149, 'MP', 'Northern Mariana Islands', 'USD', '53883', 'CQ', '580', '20.55344', '14.11023', '146.06528', '144.88626', 'Saipan', 'Oceania', 'OC', '477.0', 'fil,tl,zh,ch-MP,en-MP', 'MNP', 4041468),
(150, 'MQ', 'Martinique', 'EUR', '432900', 'MB', '474', '14.878819', '14.392262', '-60.81551', '-61.230118', 'Fort-de-France', 'North America', 'NA', '1100.0', 'fr-MQ', 'MTQ', 3570311),
(151, 'MR', 'Mauritania', 'MRO', '3205060', 'MR', '478', '27.298073', '14.715547', '-4.827674', '-17.066521', 'Nouakchott', 'Africa', 'AF', '1030700.0', 'ar-MR,fuc,snk,fr,mey,wo', 'MRT', 2378080),
(152, 'MS', 'Montserrat', 'XCD', '9341', 'MH', '500', '16.824060205313184', '16.674768935441556', '-62.144100129608205', '-62.24138237036129', 'Plymouth', 'North America', 'NA', '102.0', 'en-MS', 'MSR', 3578097),
(153, 'MT', 'Malta', 'EUR', '403000', 'MT', '470', '36.0821530995456', '35.8061835000002', '14.5764915000002', '14.1834251000001', 'Valletta', 'Europe', 'EU', '316.0', 'mt,en-MT', 'MLT', 2562770),
(154, 'MU', 'Mauritius', 'MUR', '1294104', 'MP', '480', '-10.319255', '-20.525717', '63.500179', '56.512718', 'Port Louis', 'Africa', 'AF', '2040.0', 'en-MU,bho,fr', 'MUS', 934292),
(155, 'MV', 'Maldives', 'MVR', '395650', 'MV', '462', '7.091587495414767', '-0.692694', '73.637276', '72.693222', 'Malé', 'Asia', 'AS', '300.0', 'dv,en', 'MDV', 1282028),
(156, 'MW', 'Malawi', 'MWK', '15447500', 'MI', '454', '-9.367541', '-17.125', '35.916821', '32.67395', 'Lilongwe', 'Africa', 'AF', '118480.0', 'ny,yao,tum,swk', 'MWI', 927384),
(157, 'MX', 'Mexico', 'MXN', '112468855', 'MX', '484', '32.716759', '14.532866', '-86.703392', '-118.453949', 'Mexico City', 'North America', 'NA', '1972550.0', 'es-MX', 'MEX', 3996063),
(158, 'MY', 'Malaysia', 'MYR', '28274729', 'MY', '458', '7.363417', '0.855222', '119.267502', '99.643448', 'Kuala Lumpur', 'Asia', 'AS', '329750.0', 'ms-MY,en,zh,ta,te,ml,pa,th', 'MYS', 1733045),
(159, 'MZ', 'Mozambique', 'MZN', '22061451', 'MZ', '508', '-10.471883', '-26.868685', '40.842995', '30.217319', 'Maputo', 'Africa', 'AF', '801590.0', 'pt-MZ,vmw', 'MOZ', 1036973),
(160, 'NA', 'Namibia', 'NAD', '2128471', 'WA', '516', '-16.959894', '-28.97143', '25.256701', '11.71563', 'Windhoek', 'Africa', 'AF', '825418.0', 'en-NA,af,de,hz,naq', 'NAM', 3355338),
(161, 'NC', 'New Caledonia', 'XPF', '216494', 'NC', '540', '-19.549778', '-22.698', '168.129135', '163.564667', 'Noumea', 'Oceania', 'OC', '19060.0', 'fr-NC', 'NCL', 2139685),
(162, 'NE', 'Niger', 'XOF', '15878271', 'NG', '562', '23.525026', '11.696975', '15.995643', '0.16625', 'Niamey', 'Africa', 'AF', '1267000.0', 'fr-NE,ha,kr,dje', 'NER', 2440476),
(163, 'NF', 'Norfolk Island', 'AUD', '1828', 'NF', '574', '-28.995170686948427', '-29.063076742954735', '167.99773740209957', '167.91543230151365', 'Kingston', 'Oceania', 'OC', '34.6', 'en-NF', 'NFK', 2155115),
(164, 'NG', 'Nigeria', 'NGN', '154000000', 'NI', '566', '13.892007', '4.277144', '14.680073', '2.668432', 'Abuja', 'Africa', 'AF', '923768.0', 'en-NG,ha,yo,ig,ff', 'NGA', 2328926),
(165, 'NI', 'Nicaragua', 'NIO', '5995928', 'NU', '558', '15.025909', '10.707543', '-82.738289', '-87.690308', 'Managua', 'North America', 'NA', '129494.0', 'es-NI,en', 'NIC', 3617476),
(166, 'NL', 'Netherlands', 'EUR', '16645000', 'NL', '528', '53.5157125645109', '50.7503674993741', '7.22749859212922', '3.35837827202', 'Amsterdam', 'Europe', 'EU', '41526.0', 'nl-NL,fy-NL', 'NLD', 2750405),
(167, 'NO', 'Norway', 'NOK', '5009150', 'NO', '578', '71.18811', '57.977917', '31.078052520751953', '4.650167', 'Oslo', 'Europe', 'EU', '324220.0', 'no,nb,nn,se,fi', 'NOR', 3144096),
(168, 'NP', 'Nepal', 'NPR', '28951852', 'NP', '524', '30.43339', '26.356722', '88.199333', '80.056274', 'Kathmandu', 'Asia', 'AS', '140800.0', 'ne,en', 'NPL', 1282988),
(169, 'NR', 'Nauru', 'AUD', '10065', 'NR', '520', '-0.504306', '-0.552333', '166.945282', '166.899033', 'Yaren', 'Oceania', 'OC', '21.0', 'na,en-NR', 'NRU', 2110425),
(170, 'NU', 'Niue', 'NZD', '2166', 'NE', '570', '-18.951069', '-19.152193', '-169.775177', '-169.951004', 'Alofi', 'Oceania', 'OC', '260.0', 'niu,en-NU', 'NIU', 4036232),
(171, 'NZ', 'New Zealand', 'NZD', '4252277', 'NZ', '554', '-34.389668', '-47.286026', '-180', '166.7155', 'Wellington', 'Oceania', 'OC', '268680.0', 'en-NZ,mi', 'NZL', 2186224),
(172, 'OM', 'Oman', 'OMR', '2967717', 'MU', '512', '26.387972', '16.64575', '59.836582', '51.882', 'Muscat', 'Asia', 'AS', '212460.0', 'ar-OM,en,bal,ur', 'OMN', 286963),
(173, 'PA', 'Panama', 'PAB', '3410676', 'PM', '591', '9.637514', '7.197906', '-77.17411', '-83.051445', 'Panama City', 'North America', 'NA', '78200.0', 'es-PA,en', 'PAN', 3703430),
(174, 'PE', 'Peru', 'PEN', '29907003', 'PE', '604', '-0.012977', '-18.349728', '-68.677986', '-81.326744', 'Lima', 'South America', 'SA', '1285220.0', 'es-PE,qu,ay', 'PER', 3932488),
(175, 'PF', 'French Polynesia', 'XPF', '270485', 'FP', '258', '-7.903573', '-27.653572', '-134.929825', '-152.877167', 'Papeete', 'Oceania', 'OC', '4167.0', 'fr-PF,ty', 'PYF', 4030656),
(176, 'PG', 'Papua New Guinea', 'PGK', '6064515', 'PP', '598', '-1.318639', '-11.657861', '155.96344', '140.842865', 'Port Moresby', 'Oceania', 'OC', '462840.0', 'en-PG,ho,meu,tpi', 'PNG', 2088628),
(177, 'PH', 'Philippines', 'PHP', '99900177', 'RP', '608', '21.1218854788318', '4.64209796365014', '126.60497402182328', '116.9288644959', 'Manila', 'Asia', 'AS', '300000.0', 'tl,en-PH,fil,ceb,tgl,ilo,hil,war,pam,bik,bcl,pag,mrw,tsg,mdh,cbk,krj,sgd,msb,akl,ibg,yka,mta,abx', 'PHL', 1694008),
(178, 'PK', 'Pakistan', 'PKR', '184404791', 'PK', '586', '37.097', '23.786722', '77.840919', '60.878613', 'Islamabad', 'Asia', 'AS', '803940.0', 'ur-PK,en-PK,pa,sd,ps,brh', 'PAK', 1168579),
(179, 'PL', 'Poland', 'PLN', '38500000', 'PL', '616', '54.839138', '49.006363', '24.150749', '14.123', 'Warsaw', 'Europe', 'EU', '312685.0', 'pl', 'POL', 798544),
(180, 'PM', 'Saint Pierre and Miquelon', 'EUR', '7012', 'SB', '666', '47.14376802942701', '46.78264970849848', '-56.1253298443454', '-56.40709223087083', 'Saint-Pierre', 'North America', 'NA', '242.0', 'fr-PM', 'SPM', 3424932),
(181, 'PN', 'Pitcairn Islands', 'NZD', '46', 'PC', '612', '-24.3299386198549', '-24.672565', '-124.77285', '-128.35699011119425', 'Adamstown', 'Oceania', 'OC', '47.0', 'en-PN', 'PCN', 4030699),
(182, 'PR', 'Puerto Rico', 'USD', '3916632', 'RQ', '630', '18.520166', '17.926405', '-65.242737', '-67.942726', 'San Juan', 'North America', 'NA', '9104.0', 'en-PR,es-PR', 'PRI', 4566966),
(183, 'PS', 'Palestine', 'ILS', '3800000', 'WE', '275', '32.54638671875', '31.216541290283203', '35.5732955932617', '34.21665954589844', '', 'Asia', 'AS', '5970.0', 'ar-PS', 'PSE', 6254930),
(184, 'PT', 'Portugal', 'EUR', '10676000', 'PO', '620', '42.154311127408', '36.96125', '-6.18915930748288', '-9.50052660716588', 'Lisbon', 'Europe', 'EU', '92391.0', 'pt-PT,mwl', 'PRT', 2264397),
(185, 'PW', 'Palau', 'USD', '19907', 'PS', '585', '8.46966', '2.8036', '134.72307', '131.11788', 'Melekeok', 'Oceania', 'OC', '458.0', 'pau,sov,en-PW,tox,ja,fil,zh', 'PLW', 1559582),
(186, 'PY', 'Paraguay', 'PYG', '6375830', 'PA', '600', '-19.294041', '-27.608738', '-54.259354', '-62.647076', 'Asunción', 'South America', 'SA', '406750.0', 'es-PY,gn', 'PRY', 3437598),
(187, 'QA', 'Qatar', 'QAR', '840926', 'QA', '634', '26.154722', '24.482944', '51.636639', '50.757221', 'Doha', 'Asia', 'AS', '11437.0', 'ar-QA,es', 'QAT', 289688),
(188, 'RE', 'Réunion', 'EUR', '776948', 'RE', '638', '-20.868391324576944', '-21.383747301469107', '55.838193901930026', '55.21219224792685', 'Saint-Denis', 'Africa', 'AF', '2517.0', 'fr-RE', 'REU', 935317),
(189, 'RO', 'Romania', 'RON', '21959278', 'RO', '642', '48.2653912058468', '43.6190166499833', '29.7152986907701', '20.2619949052262', 'Bucharest', 'Europe', 'EU', '237500.0', 'ro,hu,rom', 'ROU', 798549),
(190, 'RS', 'Serbia', 'RSD', '7344847', 'RI', '688', '46.18138885498047', '42.232215881347656', '23.00499725341797', '18.817020416259766', 'Belgrade', 'Europe', 'EU', '88361.0', 'sr,hu,bs,rom', 'SRB', 6290252),
(191, 'RU', 'Russia', 'RUB', '140702000', 'RS', '643', '81.857361', '41.188862', '-169.05', '19.25', 'Moscow', 'Europe', 'EU', '1.71E7', 'ru,tt,xal,cau,ady,kv,ce,tyv,cv,udm,tut,mns,bua,myv,mdf,chm,ba,inh,tut,kbd,krc,ava,sah,nog', 'RUS', 2017370),
(192, 'RW', 'Rwanda', 'RWF', '11055976', 'RW', '646', '-1.04716670707785', '-2.84023010213747', '30.8997466415943', '28.8617308206209', 'Kigali', 'Africa', 'AF', '26338.0', 'rw,en-RW,fr-RW,sw', 'RWA', 49518),
(193, 'SA', 'Saudi Arabia', 'SAR', '25731776', 'SA', '682', '32.158333', '15.61425', '55.666584', '34.495693', 'Riyadh', 'Asia', 'AS', '1960582.0', 'ar-SA', 'SAU', 102358),
(194, 'SB', 'Solomon Islands', 'SBD', '559198', 'BP', '090', '-6.589611', '-11.850555', '166.980865', '155.508606', 'Honiara', 'Oceania', 'OC', '28450.0', 'en-SB,tpi', 'SLB', 2103350),
(195, 'SC', 'Seychelles', 'SCR', '88340', 'SE', '690', '-4.283717', '-9.753867', '56.29770287937299', '46.204769', 'Victoria', 'Africa', 'AF', '455.0', 'en-SC,fr-SC', 'SYC', 241170),
(196, 'SD', 'Sudan', 'SDG', '35000000', 'SU', '729', '22.232219696044922', '8.684720993041992', '38.60749816894531', '21.827774047851562', 'Khartoum', 'Africa', 'AF', '1861484.0', 'ar-SD,en,fia', 'SDN', 366755),
(197, 'SE', 'Sweden', 'SEK', '9828655', 'SW', '752', '69.0599672666879', '55.3374438220002', '24.155245238099', '11.109499387126', 'Stockholm', 'Europe', 'EU', '449964.0', 'sv-SE,se,sma,fi-SE', 'SWE', 2661886),
(198, 'SG', 'Singapore', 'SGD', '4701069', 'SN', '702', '1.471278', '1.258556', '104.007469', '103.638275', 'Singapore', 'Asia', 'AS', '692.7', 'cmn,en-SG,ms-SG,ta-SG,zh-SG', 'SGP', 1880251),
(199, 'SH', 'Saint Helena', 'SHP', '7460', 'SH', '654', '-7.887815', '-16.019543', '-5.638753', '-14.42123', 'Jamestown', 'Africa', 'AF', '410.0', 'en-SH', 'SHN', 3370751),
(200, 'SI', 'Slovenia', 'EUR', '2007000', 'SI', '705', '46.8766275518195', '45.421812998164', '16.6106311807', '13.3753342064709', 'Ljubljana', 'Europe', 'EU', '20273.0', 'sl,sh', 'SVN', 3190538),
(201, 'SJ', 'Svalbard and Jan Mayen', 'NOK', '2550', 'SV', '744', '80.762085', '79.220306', '33.287334', '17.699389', 'Longyearbyen', 'Europe', 'EU', '62049.0', 'no,ru', 'SJM', 607072),
(202, 'SK', 'Slovakia', 'EUR', '5455000', 'LO', '703', '49.603168', '47.728111', '22.570444', '16.84775', 'Bratislava', 'Europe', 'EU', '48845.0', 'sk,hu', 'SVK', 3057568),
(203, 'SL', 'Sierra Leone', 'SLL', '5245695', 'SL', '694', '10', '6.929611', '-10.284238', '-13.307631', 'Freetown', 'Africa', 'AF', '71740.0', 'en-SL,men,tem', 'SLE', 2403846),
(204, 'SM', 'San Marino', 'EUR', '31477', 'SM', '674', '43.9920929668161', '43.8937002210188', '12.5158490454421', '12.403605260165', 'San Marino', 'Europe', 'EU', '61.2', 'it-SM', 'SMR', 3168068),
(205, 'SN', 'Senegal', 'XOF', '12323252', 'SG', '686', '16.691633', '12.307275', '-11.355887', '-17.535236', 'Dakar', 'Africa', 'AF', '196190.0', 'fr-SN,wo,fuc,mnk', 'SEN', 2245662),
(206, 'SO', 'Somalia', 'SOS', '10112453', 'SO', '706', '11.979166', '-1.674868', '51.412636', '40.986595', 'Mogadishu', 'Africa', 'AF', '637657.0', 'so-SO,ar-SO,it,en-SO', 'SOM', 51537),
(207, 'SR', 'Suriname', 'SRD', '492829', 'NS', '740', '6.004546', '1.831145', '-53.977493', '-58.086563', 'Paramaribo', 'South America', 'SA', '163270.0', 'nl-SR,en,srn,hns,jv', 'SUR', 3382998),
(208, 'SS', 'South Sudan', 'SSP', '8260490', 'OD', '728', '12.219148635864258', '3.493394374847412', '35.9405517578125', '24.140274047851562', 'Juba', 'Africa', 'AF', '644329.0', 'en', 'SSD', 7909807),
(209, 'ST', 'São Tomé and Príncipe', 'STD', '175808', 'TP', '678', '1.701323', '0.024766', '7.466374', '6.47017', 'São Tomé', 'Africa', 'AF', '1001.0', 'pt-ST', 'STP', 2410758),
(210, 'SV', 'El Salvador', 'USD', '6052064', 'ES', '222', '14.445067', '13.148679', '-87.692162', '-90.128662', 'San Salvador', 'North America', 'NA', '21040.0', 'es-SV', 'SLV', 3585968),
(211, 'SX', 'Sint Maarten', 'ANG', '37429', 'NN', '534', '18.065188278978088', '18.006632279377143', '-63.0104194322962', '-63.14146165934278', 'Philipsburg', 'North America', 'NA', '21.0', 'nl,en', 'SXM', 7609695),
(212, 'SY', 'Syria', 'SYP', '22198110', 'SY', '760', '37.319138', '32.310665', '42.385029', '35.727222', 'Damascus', 'Asia', 'AS', '185180.0', 'ar-SY,ku,hy,arc,fr,en', 'SYR', 163843),
(213, 'SZ', 'Swaziland', 'SZL', '1354051', 'WZ', '748', '-25.719648', '-27.317101', '32.13726', '30.794107', 'Mbabane', 'Africa', 'AF', '17363.0', 'en-SZ,ss-SZ', 'SWZ', 934841),
(214, 'TC', 'Turks and Caicos Islands', 'USD', '20556', 'TK', '796', '21.961878', '21.422626', '-71.123642', '-72.483871', 'Cockburn Town', 'North America', 'NA', '430.0', 'en-TC', 'TCA', 3576916),
(215, 'TD', 'Chad', 'XAF', '10543464', 'CD', '148', '23.450369', '7.441068', '24.002661', '13.473475', 'N\'Djamena', 'Africa', 'AF', '1284000.0', 'fr-TD,ar-TD,sre', 'TCD', 2434508),
(216, 'TF', 'French Southern Territories', 'EUR', '140', 'FS', '260', '-37.790722', '-49.735184', '77.598808', '50.170258', 'Port-aux-Français', 'Antarctica', 'AN', '7829.0', 'fr', 'ATF', 1546748),
(217, 'TG', 'Togo', 'XOF', '6587239', 'TO', '768', '11.138977', '6.104417', '1.806693', '-0.147324', 'Lomé', 'Africa', 'AF', '56785.0', 'fr-TG,ee,hna,kbp,dag,ha', 'TGO', 2363686),
(218, 'TH', 'Thailand', 'THB', '67089500', 'TH', '764', '20.463194', '5.61', '105.639389', '97.345642', 'Bangkok', 'Asia', 'AS', '514000.0', 'th,en', 'THA', 1605651),
(219, 'TJ', 'Tajikistan', 'TJS', '7487489', 'TI', '762', '41.042252', '36.674137', '75.137222', '67.387138', 'Dushanbe', 'Asia', 'AS', '143100.0', 'tg,ru', 'TJK', 1220409),
(220, 'TK', 'Tokelau', 'NZD', '1466', 'TL', '772', '-8.553613662719727', '-9.381111145019531', '-171.21142578125', '-172.50033569335938', '', 'Oceania', 'OC', '10.0', 'tkl,en-TK', 'TKL', 4031074),
(221, 'TL', 'East Timor', 'USD', '1154625', 'TT', '626', '-8.12687015533447', '-9.504650115966797', '127.34211730957031', '124.04464721679688', 'Dili', 'Oceania', 'OC', '15007.0', 'tet,pt-TL,id,en', 'TLS', 1966436),
(222, 'TM', 'Turkmenistan', 'TMT', '4940916', 'TX', '795', '42.795555', '35.141083', '66.684303', '52.441444', 'Ashgabat', 'Asia', 'AS', '488100.0', 'tk,ru,uz', 'TKM', 1218197),
(223, 'TN', 'Tunisia', 'TND', '10589025', 'TS', '788', '37.543915', '30.240417', '11.598278', '7.524833', 'Tunis', 'Africa', 'AF', '163610.0', 'ar-TN,fr', 'TUN', 2464461),
(224, 'TO', 'Tonga', 'TOP', '122580', 'TN', '776', '-15.562988', '-21.455057', '-173.907578', '-175.682266', 'Nuku\'alofa', 'Oceania', 'OC', '748.0', 'to,en-TO', 'TON', 4032283),
(225, 'TR', 'Turkey', 'TRY', '77804122', 'TU', '792', '42.107613', '35.815418', '44.834999', '25.668501', 'Ankara', 'Asia', 'AS', '780580.0', 'tr-TR,ku,diq,az,av', 'TUR', 298795),
(226, 'TT', 'Trinidad and Tobago', 'TTD', '1328019', 'TD', '780', '11.338342', '10.036105', '-60.517933', '-61.923771', 'Port of Spain', 'North America', 'NA', '5128.0', 'en-TT,hns,fr,es,zh', 'TTO', 3573591),
(227, 'TV', 'Tuvalu', 'AUD', '10472', 'TV', '798', '-5.641972', '-10.801169', '179.863281', '176.064865', 'Funafuti', 'Oceania', 'OC', '26.0', 'tvl,en,sm,gil', 'TUV', 2110297),
(228, 'TW', 'Taiwan', 'TWD', '22894384', 'TW', '158', '25.3002899036181', '21.896606934717', '122.006739823315', '119.534691', 'Taipei', 'Asia', 'AS', '35980.0', 'zh-TW,zh,nan,hak', 'TWN', 1668284),
(229, 'TZ', 'Tanzania', 'TZS', '41892895', 'TZ', '834', '-0.990736', '-11.745696', '40.443222', '29.327168', 'Dodoma', 'Africa', 'AF', '945087.0', 'sw-TZ,en,ar', 'TZA', 149590),
(230, 'UA', 'Ukraine', 'UAH', '45415596', 'UP', '804', '52.369362', '44.390415', '40.20739', '22.128889', 'Kiev', 'Europe', 'EU', '603700.0', 'uk,ru-UA,rom,pl,hu', 'UKR', 690791),
(231, 'UG', 'Uganda', 'UGX', '33398682', 'UG', '800', '4.23136926690327', '-1.48153052848838', '35.0010535324228', '29.573465338129', 'Kampala', 'Africa', 'AF', '236040.0', 'en-UG,lg,sw,ar', 'UGA', 226074),
(232, 'UM', 'U.S. Minor Outlying Islands', 'USD', '0', '', '581', '28.219814', '-0.389006', '166.654526', '-177.392029', '', 'Oceania', 'OC', '0.0', 'en-UM', 'UMI', 5854968),
(233, 'US', 'United States', 'USD', '310232863', 'US', '840', '49.388611', '24.544245', '-66.954811', '-124.733253', 'Washington', 'North America', 'NA', '9629091.0', 'en-US,es-US,haw,fr', 'USA', 6252001),
(234, 'UY', 'Uruguay', 'UYU', '3477000', 'UY', '858', '-30.082224', '-34.980816', '-53.073933', '-58.442722', 'Montevideo', 'South America', 'SA', '176220.0', 'es-UY', 'URY', 3439705),
(235, 'UZ', 'Uzbekistan', 'UZS', '27865738', 'UZ', '860', '45.575001', '37.184444', '73.132278', '55.996639', 'Tashkent', 'Asia', 'AS', '447400.0', 'uz,ru,tg', 'UZB', 1512440),
(236, 'VA', 'Vatican City', 'EUR', '921', 'VT', '336', '41.90743830885576', '41.90027960306854', '12.45837546629481', '12.44570678169205', 'Vatican City', 'Europe', 'EU', '0.44', 'la,it,fr', 'VAT', 3164670),
(237, 'VC', 'Saint Vincent and the Grenadines', 'XCD', '104217', 'VC', '670', '13.377834', '12.583984810969037', '-61.11388', '-61.46090317727658', 'Kingstown', 'North America', 'NA', '389.0', 'en-VC,fr', 'VCT', 3577815),
(238, 'VE', 'Venezuela', 'VEF', '27223228', 'VE', '862', '12.201903', '0.626311', '-59.80378', '-73.354073', 'Caracas', 'South America', 'SA', '912050.0', 'es-VE', 'VEN', 3625428),
(239, 'VG', 'British Virgin Islands', 'USD', '21730', 'VI', '092', '18.757221', '18.383710898211305', '-64.268768', '-64.71312752730364', 'Road Town', 'North America', 'NA', '153.0', 'en-VG', 'VGB', 3577718),
(240, 'VI', 'U.S. Virgin Islands', 'USD', '108708', 'VQ', '850', '18.415382', '17.673931', '-64.565193', '-65.101333', 'Charlotte Amalie', 'North America', 'NA', '352.0', 'en-VI', 'VIR', 4796775),
(241, 'VN', 'Vietnam', 'VND', '89571130', 'VM', '704', '23.388834', '8.559611', '109.464638', '102.148224', 'Hanoi', 'Asia', 'AS', '329560.0', 'vi,en,fr,zh,km', 'VNM', 1562822),
(242, 'VU', 'Vanuatu', 'VUV', '221552', 'NH', '548', '-13.073444', '-20.248945', '169.904785', '166.524979', 'Port Vila', 'Oceania', 'OC', '12200.0', 'bi,en-VU,fr-VU', 'VUT', 2134431),
(243, 'WF', 'Wallis and Futuna', 'XPF', '16025', 'WF', '876', '-13.216758181061444', '-14.314559989820843', '-176.16174317718253', '-178.1848112896414', 'Mata-Utu', 'Oceania', 'OC', '274.0', 'wls,fud,fr-WF', 'WLF', 4034749),
(244, 'WS', 'Samoa', 'WST', '192001', 'WS', '882', '-13.432207', '-14.040939', '-171.415741', '-172.798599', 'Apia', 'Oceania', 'OC', '2944.0', 'sm,en-WS', 'WSM', 4034894),
(245, 'XK', 'Kosovo', 'EUR', '1800000', 'KV', '0', '43.2682495807952', '41.856369601859925', '21.80335088694943', '19.977481504492914', 'Pristina', 'Europe', 'EU', '10908.0', 'sq,sr', 'XKX', 831053),
(246, 'YE', 'Yemen', 'YER', '23495361', 'YM', '887', '18.9999989031009', '12.1110910264462', '54.5305388163283', '42.5325394314234', 'Sanaa', 'Asia', 'AS', '527970.0', 'ar-YE', 'YEM', 69543),
(247, 'YT', 'Mayotte', 'EUR', '159042', 'MF', '175', '-12.648891', '-13.000132', '45.29295', '45.03796', 'Mamoudzou', 'Africa', 'AF', '374.0', 'fr-YT', 'MYT', 1024031),
(248, 'ZA', 'South Africa', 'ZAR', '49000000', 'SF', '710', '-22.1250300579999', '-34.8341700029999', '32.944984945', '16.45189', 'Pretoria', 'Africa', 'AF', '1219912.0', 'zu,xh,af,nso,en-ZA,tn,st,ts,ss,ve,nr', 'ZAF', 953987),
(249, 'ZM', 'Zambia', 'ZMW', '13460305', 'ZA', '894', '-8.22436', '-18.079473', '33.705704', '21.999371', 'Lusaka', 'Africa', 'AF', '752614.0', 'en-ZM,bem,loz,lun,lue,ny,toi', 'ZMB', 895949),
(250, 'ZW', 'Zimbabwe', 'ZWL', '13061000', 'ZI', '716', '-15.608835', '-22.417738', '33.056305', '25.237028', 'Harare', 'Africa', 'AF', '390580.0', 'en-ZW,sn,nr,nd', 'ZWE', 878675);

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `def` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(355) COLLATE utf8_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `def`, `title`, `image`, `uuid`, `status`, `created`, `modified`) VALUES
('en', 'eng', 'English', 'english.png', '260caaf3-c44f-4e7d-85e7-a521984e5557', 1, '2014-01-24 15:22:49', '2019-04-13 02:20:01'),
('vi', 'vie', 'Tiếng Việt', 'tieng-viet.png', '260caaf3-d44f-4e7d-85e7-a521984e5547', 1, '2014-05-14 06:22:15', '2019-04-12 12:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `has_read` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `name`, `status`, `has_read`, `created`, `modified`) VALUES
(25, 'admin@gmail.com', '123123', 0, 0, '2019-04-21 14:01:54', '2019-04-21 14:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_list` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT '1',
  `comment_count` int(11) DEFAULT NULL,
  `allow_comment` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `home` tinyint(1) DEFAULT '0',
  `featured` tinyint(1) DEFAULT '0',
  `tag` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_category_id`, `user_id`, `image`, `image_list`, `uuid`, `view_count`, `comment_count`, `allow_comment`, `sort`, `status`, `home`, `featured`, `tag`, `created`, `modified`) VALUES
(4, '2', 1, NULL, NULL, '142db64e-b03e-443b-af58-48aa3f8ee972', 1, NULL, 0, NULL, 1, 0, 0, NULL, '2019-04-24 16:06:41', '2019-04-24 16:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `page_categories`
--

CREATE TABLE `page_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `allowed_fields` text COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_categories`
--

INSERT INTO `page_categories` (`id`, `parent_id`, `image`, `uuid`, `status`, `lft`, `rght`, `allowed_fields`, `created`, `modified`) VALUES
(2, 0, NULL, '52d689e1-224c-4c87-af93-d3f49ec2c49a', 0, 1, 2, NULL, '2019-04-24 16:06:29', '2019-04-24 16:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `page_categories_translations`
--

CREATE TABLE `page_categories_translations` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_categories_translations`
--

INSERT INTO `page_categories_translations` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(3, 'vi', 'PageCategories', 2, 'title', '123'),
(4, 'vi', 'PageCategories', 2, 'description', '123');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(16, 'vi', 'Pages', 4, 'title', '123123'),
(17, 'vi', 'Pages', 4, 'slug', '123123'),
(18, 'vi', 'Pages', 4, 'slug_custom', '123'),
(19, 'vi', 'Pages', 4, 'description', '123'),
(20, 'vi', 'Pages', 4, 'content', '123');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20190411145537, 'Initial', '2019-04-11 07:55:37', '2019-04-11 07:55:37', 0),
(20190421103510, 'Initial', '2019-04-21 03:35:11', '2019-04-21 03:35:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `permissions` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `color`, `description`, `status`, `permissions`, `created`, `modified`) VALUES
(1, 'Admin', 'admin', 'red', 'Admin', 1, NULL, '2019-04-20 01:17:16', '2019-04-21 09:15:34'),
(2, 'Manage', 'manage', 'green', 'Manage', 1, '{\"ArticleCategories\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Articles\":{\"index\":\"1\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"BannerCategories\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Banners\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"0\",\"delete\":\"0\"},\"PageCategories\":{\"index\":\"1\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Pages\":{\"dashboard\":\"1\",\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Languages\":{\"index\":\"1\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Roles\":{\"index\":\"1\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Users\":{\"index\":\"1\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Settings\":{\"edit\":\"1\"},\"Newsletters\":{\"index\":\"1\",\"delete\":\"0\"}}', '2019-04-20 01:17:16', '2019-04-21 17:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `language_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language_site` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `language_admin` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `theme_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theme_site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_per_page` int(11) NOT NULL,
  `article_per_page` int(11) NOT NULL,
  `comment_per_page` int(11) NOT NULL,
  `records_per_page` int(11) NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailcc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fax_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `yahoo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_group_default` int(11) NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_app_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fb_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_plus_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instagram_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pinterest_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_analytic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_thumbs` int(11) NOT NULL DEFAULT '256',
  `article_thumbs` int(11) NOT NULL DEFAULT '256',
  `email_emailsend` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_port` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_smtpsecure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_status` tinyint(1) NOT NULL DEFAULT '0',
  `ip_config` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_ip_config` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(4) DEFAULT NULL,
  `anysize` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `language_id`, `image`, `uuid`, `site_title`, `language_site`, `language_admin`, `theme_admin`, `theme_site`, `product_per_page`, `article_per_page`, `comment_per_page`, `records_per_page`, `currency`, `owner`, `address`, `email`, `emailcc`, `phone_number`, `fax_number`, `yahoo`, `skype`, `latitude`, `longitude`, `user_group_default`, `meta_keyword`, `meta_description`, `facebook_url`, `fb_app_id`, `fb_secret`, `google_plus_url`, `twitter_url`, `instagram_url`, `pinterest_url`, `google_analytic`, `product_thumbs`, `article_thumbs`, `email_emailsend`, `email_host`, `email_port`, `email_smtpsecure`, `email_user`, `email_password`, `email_status`, `ip_config`, `status_ip_config`, `status`, `active`, `anysize`, `created`, `modified`) VALUES
(1, 'en', 'bgt.png', '55055b5b-7056-4c9b-b0cc-e87bdede7571', 'BGT', 'vi', 'vi', 'CmsV4', 'DefaultV4', 6, 6, 15, 10, '$', 'CMS', '19 Nguyễn Văn Trỗi, phường 11, Ho Chi Minh, Vietnam', 'admin@gmail.com', 'admin@gmail.com, admin1@gmail.com', '1235689', '1235689', 'phongvan,zorom', 'skype1,skype3', '10.7962208', '106.67433030000007', 1, 'TNCL,DigitalStartup', 'Meta description', 'https://facebook.com', '1575864732626379', '70dc61756b084ff2d193e2768daa5894', 'https://google.com', 'https://twitter.com', NULL, NULL, 'AU-86743-345', 400, 500, 'admin@tncl.net', 'in-v3.mailjet.com', '587', 'tls', 'f4e409a994514c23277c90fc4a56ab07', '0120b9ccb24fc4043b851212b3901ff8', 1, '0', 0, 1, 0, 1, '2014-01-24 00:00:00', '2019-04-24 16:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ' ',
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `phone_number` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT '241',
  `note` text COLLATE utf8_unicode_ci,
  `fbid` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Facebook ID',
  `ggid` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Google ID',
  `last_visit` datetime DEFAULT NULL,
  `has_read` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role_id`, `gender`, `first_name`, `last_name`, `birthday`, `phone_number`, `image`, `uuid`, `status`, `active`, `system`, `company`, `address`, `city`, `state`, `zip_code`, `country_id`, `note`, `fbid`, `ggid`, `last_visit`, `has_read`, `created`, `modified`) VALUES
(1, 'admin@gmail.com', '$2y$10$5Dukkw0brWvfFYhVhccVdO07MF0WbkQF34VMhrlVsjIpAbsseQp8e', 1, 1, 'Nguyen', 'Ngoc', '2019-03-06', '019123', '', NULL, 1, 0, 0, '', '', '', '', '', 241, '', '', '', NULL, 0, '2019-03-06 15:08:28', '2019-03-06 15:08:28'),
(2, 'admin1@gmail.com', '$2y$10$oyeaDMTKEbeIf..gke42Ae/G.oCvLi1ag8CnIIX.wT9GtRxkO4/B2', 1, 1, ' ', '', '0000-00-00', '', '.jpg', '57170f5c-36da-4108-9ec1-2626f6303e73', 1, 1, 0, '', '', NULL, NULL, NULL, 241, '', NULL, NULL, NULL, 0, '2019-04-19 13:21:58', '2019-04-19 13:21:58'),
(3, 'admin2@gmail.com', '$2y$10$mENPMpZfKtiIoVlEwZQnNeO59beNZ2T2r35qXs2mkoYjHTMIRjMgy', 2, 1, ' ', '', '0000-00-00', '', '.jpg', 'de056476-b9ae-42e4-bce8-1e8c3aa2e629', 1, 1, 0, '', '', NULL, NULL, NULL, 241, '', NULL, NULL, NULL, 0, '2019-04-19 13:50:43', '2019-04-19 13:50:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acp_phinxlog`
--
ALTER TABLE `acp_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_categories_translations`
--
ALTER TABLE `article_categories_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `model` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `article_translations`
--
ALTER TABLE `article_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `model` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_categories`
--
ALTER TABLE `banner_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_categories_translations`
--
ALTER TABLE `banner_categories_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `model` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `banner_translations`
--
ALTER TABLE `banner_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `model` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_categories`
--
ALTER TABLE `page_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_categories_translations`
--
ALTER TABLE `page_categories_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `model` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `model` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article_categories_translations`
--
ALTER TABLE `article_categories_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `article_translations`
--
ALTER TABLE `article_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `banner_categories`
--
ALTER TABLE `banner_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `banner_categories_translations`
--
ALTER TABLE `banner_categories_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `banner_translations`
--
ALTER TABLE `banner_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_categories`
--
ALTER TABLE `page_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_categories_translations`
--
ALTER TABLE `page_categories_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
