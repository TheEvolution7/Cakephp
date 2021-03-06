-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2019 at 04:12 PM
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
-- Database: `cakephp3`
--

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
  `featured` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_category_id`, `user_id`, `image`, `image_list`, `uuid`, `sort`, `status`, `featured`, `created`, `modified`) VALUES
(1, '2', 1, 'home-banner.jpg', NULL, '55055b5b-7056-4c9b-b0cc-e87bdede7572', NULL, 1, 0, '2019-04-03 12:58:18', '2019-04-03 12:58:18'),
(2, '2', 1, 'home-banner.jpg', NULL, 'f6ece74e-f143-488c-baa4-8f33c2b5633d', NULL, 1, 0, '2019-04-03 12:59:26', '2019-04-03 12:59:26'),
(3, '4', 1, '.png', NULL, '80607998-984f-4b11-9e7a-789e565e5b7e', NULL, 1, 0, '2019-04-03 13:29:11', '2019-04-03 13:29:11'),
(4, '4', 1, '.png', NULL, '056ef23c-74e1-4e05-87a5-58244844a26b', NULL, 1, 0, '2019-04-03 13:29:24', '2019-04-03 13:29:24'),
(5, '4', 1, '.png', NULL, 'd4f09860-8d91-4f1d-b1e5-f46a813ce1b1', NULL, 1, 0, '2019-04-03 13:29:39', '2019-04-03 13:29:39'),
(6, '5', 1, NULL, NULL, '6faf898a-e677-4f36-ae05-34c2f8bdf7e3', NULL, 1, 0, '2019-04-03 13:32:29', '2019-04-03 13:32:29'),
(7, '6', 1, 'he-thong-loi.png', NULL, 'c380fd9e-d766-4784-8160-3bbae8c5cb57', NULL, 1, 0, '2019-04-03 13:44:31', '2019-04-03 13:44:31'),
(8, '6', 1, 'phan-mem.png', NULL, 'c5e3b14d-45ed-4e2b-a955-f3f567b15186', NULL, 1, 0, '2019-04-03 13:44:51', '2019-04-03 13:44:51'),
(9, '6', 1, 'diem-ban-hang.png', NULL, 'ee679a57-a1ce-4131-8e88-4e9dd21a4e2f', NULL, 1, 0, '2019-04-03 13:45:09', '2019-04-03 13:45:09'),
(10, '6', 1, 'may-quay-so.png', NULL, '2faac40e-b774-4243-b43b-4da505202c2d', NULL, 1, 0, '2019-04-03 13:45:25', '2019-04-03 13:45:25'),
(11, '7', 1, NULL, NULL, '81c64873-9bca-45a9-b279-6d39d53e924c', NULL, 1, 0, '2019-04-03 13:48:57', '2019-04-03 13:48:57'),
(12, '8', 1, NULL, NULL, 'ef598c57-0f44-4833-99a0-f6671642884e', NULL, 1, 0, '2019-04-03 13:50:44', '2019-04-03 13:50:44'),
(13, '9', 1, 'home-news-5.jpg', NULL, 'cd17cfe8-20cf-4125-b37b-d2e0a94c98c1', NULL, 1, 0, '2019-04-03 13:55:57', '2019-04-03 13:55:57'),
(14, '9', 1, 'home-news-6.jpg', NULL, '9ad6447f-6c4b-41eb-a62c-1d9e61d8e07e', NULL, 1, 0, '2019-04-03 13:56:15', '2019-04-03 13:56:15'),
(15, '10', 1, 'home-career-1.jpg', NULL, 'f3d59396-6a76-4477-ae08-826ff29d8582', NULL, 1, 0, '2019-04-03 13:58:48', '2019-04-03 14:00:14'),
(16, '10', 1, 'home-career-2.jpg', NULL, '951cee1f-0c12-441d-9f0b-363b97328b89', NULL, 1, 0, '2019-04-03 13:59:06', '2019-04-03 14:00:24'),
(17, '11', 1, NULL, NULL, '81467022-a68c-4b71-b8d7-6dbe92499284', NULL, 1, 0, '2019-04-03 14:04:08', '2019-04-03 14:04:08'),
(18, '12', 1, NULL, NULL, '653b1f4f-281c-4140-a26e-f0541d39645e', NULL, 1, 0, '2019-04-03 14:06:38', '2019-04-03 14:06:38');

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
(2, 1, NULL, '557279ca-5857-4042-b92b-db1b6340e462', 1, 2, 3, '2019-04-03 12:57:31', '2019-04-03 12:57:31'),
(4, 1, NULL, '3906e763-59e1-4f17-8966-0a8b6cb83a88', 1, 4, 5, '2019-04-03 13:28:30', '2019-04-03 13:28:30'),
(5, 1, NULL, 'f379f091-bf06-4f69-862e-d2ed82ebe770', 1, 6, 7, '2019-04-03 13:31:53', '2019-04-03 13:31:53'),
(6, 1, NULL, 'ae97331f-68a9-4973-9911-408c21dc3705', 1, 8, 9, '2019-04-03 13:43:33', '2019-04-03 13:43:33'),
(7, 1, NULL, '8d0f3067-9189-4006-809b-29231f31c2b1', 1, 10, 11, '2019-04-03 13:48:06', '2019-04-03 13:48:06'),
(8, 1, NULL, '8e3ce744-a0fe-473c-8866-84306505551a', 1, 12, 15, '2019-04-03 13:50:04', '2019-04-03 13:50:04'),
(9, 8, NULL, '5775b494-e37c-4635-a2da-9f73ff020ffb', 1, 13, 14, '2019-04-03 13:53:02', '2019-04-03 13:53:02'),
(10, 1, NULL, 'd1949523-4e2c-48f6-83fc-0bd6e1d571b9', 1, 16, 17, '2019-04-03 13:58:12', '2019-04-03 13:58:12'),
(11, 1, NULL, '20a4edb4-ceb4-4e39-80da-ed354582d117', 1, 18, 19, '2019-04-03 14:02:08', '2019-04-03 14:02:31'),
(12, 0, NULL, '10ba110c-5067-4397-87f3-b7526b6fa127', 1, 21, 22, '2019-04-03 14:06:11', '2019-04-03 14:06:11');

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
(36, 'vi', 'BannerCategories', 12, 'description', '');

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
(21, 'vi', 'Banners', 6, 'title', 'v??? ch??ng t??i <br> Berjaya Gia Th???nh'),
(22, 'vi', 'Banners', 6, 'slug', 've-chung-toi-br-berjaya-gia-thinh'),
(23, 'vi', 'Banners', 6, 'description', '<p>?????ng ??i???u h??nh x??? s??? t??? ch???n t???i Vi???t Nam, Berjaya Gia Th???nh n???m s??? m???nh ph??t tri???n th??? tr?????ng tr?? ch??i gi???i tr?? c?? th?????ng t???i Vi???t Nam d???a tr??n c??c quy t???c v?? ti??u chu???n v??? hi???n ?????i, minh b???ch v?? tr??ch nhi???m. Ch??ng t??i t??? h??o gi???i thi???u ng??nh d???ch v??? gi???i tr?? ??a d???ng c??ng c??ng ngh??? ti??n ti???n h??ng ?????u th??? gi???i.</p>                         <p>V???i n???n t???ng l?? s??? th???u hi???u v??? th??? gi???i gi???i tr?? ti??n ti???n, Berjaya Gia Th???nh d?????i s??? ???y nhi???m cu??a T???p ??o??n Berjaya, c??ng C??ng ty TNHH MTV X??? s??? ??i???n to??n Vi???t Nam (Vietlott) v???i m???c ti??u cam k???t qu???n l?? c??c tr???i nghi???m ??????u t?? mua s???m v?? v????n h??nh h???? th????ng ky?? thu????t, thi???t b???, ph???n m???m v?? kinh doanh x??? s??? t??? ch???n s??? ??i???n to??n tr??n l??nh th??? Vi???t Nam.</p>'),
(24, 'vi', 'Banners', 6, 'url', ''),
(25, 'vi', 'Banners', 7, 'title', 'H??? th???ng l??i'),
(26, 'vi', 'Banners', 7, 'slug', 'he-thong-loi'),
(27, 'vi', 'Banners', 7, 'description', ''),
(28, 'vi', 'Banners', 7, 'url', ''),
(29, 'vi', 'Banners', 8, 'title', 'Ph??n  m???m'),
(30, 'vi', 'Banners', 8, 'slug', 'phan-mem'),
(31, 'vi', 'Banners', 8, 'description', ''),
(32, 'vi', 'Banners', 8, 'url', ''),
(33, 'vi', 'Banners', 9, 'title', '??i???m b??n h??ng'),
(34, 'vi', 'Banners', 9, 'slug', 'diem-ban-hang'),
(35, 'vi', 'Banners', 9, 'description', ''),
(36, 'vi', 'Banners', 9, 'url', ''),
(37, 'vi', 'Banners', 10, 'title', 'M??y quay s???'),
(38, 'vi', 'Banners', 10, 'slug', 'may-quay-so'),
(39, 'vi', 'Banners', 10, 'description', ''),
(40, 'vi', 'Banners', 10, 'url', ''),
(41, 'vi', 'Banners', 11, 'title', 'H??? TH???NG C??NG NGH??? <br> TH??NG TIN H??NG ?????U'),
(42, 'vi', 'Banners', 11, 'slug', 'he-thong-cong-nghe-br-thong-tin-hang-dau'),
(43, 'vi', 'Banners', 11, 'description', '???????c h??? tr??? b???i nh???ng c??ng ngh??? ti??n ti???n hi???n ?????i tr??n th??? gi???i, c??ng v???i ?????i ng?? ph??t tri???n h??? th???ng li??n t???c, ch??ng t??i cam k???t mang ?????n d???ch v??? ti???n l???i, d??? d??ng s??? d???ng v?? m???c ????? b???o m???t cao c???p.'),
(44, 'vi', 'Banners', 11, 'url', ''),
(45, 'vi', 'Banners', 12, 'title', 'C???NG TH??NG TIN C???A BGT'),
(46, 'vi', 'Banners', 12, 'slug', 'cong-thong-tin-cua-bgt'),
(47, 'vi', 'Banners', 12, 'description', '<p>K??nh th??ng tin ?????y ????? v?? ch??nh th???c nh???ng n???i dung m???i nh???t v??? Berjaya Gia Th???nh.</p>                         <p>Nh???ng tin t???c n??ng nh???t v??? Gi?? tr??? tr??ng gi???i, th??? tr?????ng, ng?????i ch??i x??? s??? t??? ch???n v?? k???t qu??? x??? s??? t??? ch???n s??? ???????c c???p nh???t li??n t???c.</p>'),
(48, 'vi', 'Banners', 12, 'url', ''),
(49, 'vi', 'Banners', 13, 'title', 'home-news-5'),
(50, 'vi', 'Banners', 13, 'slug', 'home-news-5'),
(51, 'vi', 'Banners', 13, 'description', ''),
(52, 'vi', 'Banners', 13, 'url', ''),
(53, 'vi', 'Banners', 14, 'title', 'home-news-6'),
(54, 'vi', 'Banners', 14, 'slug', 'home-news-6'),
(55, 'vi', 'Banners', 14, 'description', ''),
(56, 'vi', 'Banners', 14, 'url', ''),
(57, 'vi', 'Banners', 15, 'title', 'nh??n vi??n kinh doanh'),
(58, 'vi', 'Banners', 15, 'slug', 'nhan-vien-kinh-doanh'),
(59, 'vi', 'Banners', 15, 'description', ''),
(60, 'vi', 'Banners', 15, 'url', ''),
(61, 'vi', 'Banners', 16, 'title', 'nh??n vi??n tr???c t???ng ????i'),
(62, 'vi', 'Banners', 16, 'slug', 'nhan-vien-truc-tong-dai'),
(63, 'vi', 'Banners', 16, 'description', ''),
(64, 'vi', 'Banners', 16, 'url', ''),
(65, 'vi', 'Banners', 17, 'title', 'BERJAYA GIA TH???NH <br> TUY???N D???NG'),
(66, 'vi', 'Banners', 17, 'slug', 'berjaya-gia-thinh-br-tuyen-dung'),
(67, 'vi', 'Banners', 17, 'description', 'Mang theo nh???ng gi???c m?? v??? s??? ?????t ph?? trong ph??t tri???n ?????i ng?? nh??n s???, ch??ng t??i x??y d???ng n??n nh???ng t????ng lai, mang l???i cho b???n c?? h???i ???????c th??? s???c v???i nh???ng vai tr?? v?? th??ch th???c m???i, ?????ng th???i ????nh th???c n??ng l???c ti???m ???n v?? kh??? n??ng s??ng t???o c???a b???n.'),
(68, 'vi', 'Banners', 17, 'url', ''),
(69, 'vi', 'Banners', 18, 'title', 'BERJAYA GIA TH???NH'),
(70, 'vi', 'Banners', 18, 'slug', 'berjaya-gia-thinh'),
(71, 'vi', 'Banners', 18, 'description', 'C??NG TY C??? PH???N ?????U T?? K??? THU???T BERJAYA GIA TH???NH <br> 					T???ng 17, t??a nh?? Lim 2, 62A C??ch M???ng Th??ng T??m, P6, Q3 <br> 					??i???n tho???i: (+84.28) 3550 0999 <br> 					Fax: (+84.28) 3910 8188 <br> 					Website: www.bgt.com.vn'),
(72, 'vi', 'Banners', 18, 'url', '');

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
(15, 'AX', '??land', 'EUR', '26711', '', '248', '60.488861', '59.90675', '21.011862', '19.317694', 'Mariehamn', 'Europe', 'EU', '1580.0', 'sv-AX', 'ALA', 661882),
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
(26, 'BL', 'Saint Barth??lemy', 'EUR', '8450', 'TB', '652', '17.928808791949283', '17.878183227405575', '-62.788983372985854', '-62.8739118253784', 'Gustavia', 'North America', 'NA', '21.0', 'fr', 'BLM', 3578476),
(27, 'BM', 'Bermuda', 'BMD', '65365', 'BD', '060', '32.39122351646162', '32.247551', '-64.64718648144532', '-64.88723800000002', 'Hamilton', 'North America', 'NA', '53.0', 'en-BM,pt', 'BMU', 3573345),
(28, 'BN', 'Brunei', 'BND', '395027', 'BX', '096', '5.047167', '4.003083', '115.359444', '114.071442', 'Bandar Seri Begawan', 'Asia', 'AS', '5770.0', 'ms-BN,en-BN', 'BRN', 1820814),
(29, 'BO', 'Bolivia', 'BOB', '9947418', 'BL', '068', '-9.680567', '-22.896133', '-57.45809600000001', '-69.640762', 'Sucre', 'South America', 'SA', '1098580.0', 'es-BO,qu,ay', 'BOL', 3923057),
(30, 'BQ', 'Bonaire', 'USD', '18012', '', '535', '12.304535', '12.017149', '-68.192307', '-68.416458', 'Kralendijk', 'North America', 'NA', '328.0', 'nl,pap,en', 'BES', 7626844),
(31, 'BR', 'Brazil', 'BRL', '201103330', 'BR', '076', '5.264877', '-33.750706', '-32.392998', '-73.985535', 'Bras??lia', 'South America', 'SA', '8511965.0', 'pt-BR,es,en,fr', 'BRA', 3469034),
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
(47, 'CM', 'Cameroon', 'XAF', '19294149', 'CM', '120', '13.078056', '1.652548', '16.192116', '8.494763', 'Yaound??', 'Africa', 'AF', '475440.0', 'en-CM,fr-CM', 'CMR', 2233387),
(48, 'CN', 'China', 'CNY', '1330044000', 'CH', '156', '53.56086', '15.775416', '134.773911', '73.557693', 'Beijing', 'Asia', 'AS', '9596960.0', 'zh-CN,yue,wuu,dta,ug,za', 'CHN', 1814991),
(49, 'CO', 'Colombia', 'COP', '47790000', 'CO', '170', '13.380502', '-4.225869', '-66.869835', '-81.728111', 'Bogot??', 'South America', 'SA', '1138910.0', 'es-CO', 'COL', 3686110),
(50, 'CR', 'Costa Rica', 'CRC', '4516220', 'CS', '188', '11.216819', '8.032975', '-82.555992', '-85.950623', 'San Jos??', 'North America', 'NA', '51100.0', 'es-CR,en', 'CRI', 3624060),
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
(66, 'EH', 'Western Sahara', 'MAD', '273008', 'WI', '732', '27.669674', '20.774158', '-8.670276', '-17.103182', 'La??youne / El Aai??n', 'Africa', 'AF', '266000.0', 'ar,mey', 'ESH', 2461445),
(67, 'ER', 'Eritrea', 'ERN', '5792984', 'ER', '232', '18.003084', '12.359555', '43.13464', '36.438778', 'Asmara', 'Africa', 'AF', '121320.0', 'aa-ER,ar,tig,kun,ti-ER', 'ERI', 338010),
(68, 'ES', 'Spain', 'EUR', '46505963', 'SP', '724', '43.7913565913767', '36.0001044260548', '4.32778473043961', '-9.30151567231899', 'Madrid', 'Europe', 'EU', '504782.0', 'es-ES,ca,gl,eu,oc', 'ESP', 2510769),
(69, 'ET', 'Ethiopia', 'ETB', '88013491', 'ET', '231', '14.89375', '3.402422', '47.986179', '32.999939', 'Addis Ababa', 'Africa', 'AF', '1127127.0', 'am,en-ET,om-ET,ti-ET,so-ET,sid', 'ETH', 337996),
(70, 'FI', 'Finland', 'EUR', '5244000', 'FI', '246', '70.096054', '59.808777', '31.580944', '20.556944', 'Helsinki', 'Europe', 'EU', '337030.0', 'fi-FI,sv-FI,smn', 'FIN', 660013),
(71, 'FJ', 'Fiji', 'FJD', '875983', 'FJ', '242', '-12.479632058714332', '-20.67597', '-178.424438', '177.14038537647912', 'Suva', 'Oceania', 'OC', '18270.0', 'en-FJ,fj', 'FJI', 2205218),
(72, 'FK', 'Falkland Islands', 'FKP', '2638', 'FK', '238', '-51.2331394719999', '-52.383984175', '-57.718087652', '-61.3474566739999', 'Stanley', 'South America', 'SA', '12173.0', 'en-FK', 'FLK', 3474414),
(73, 'FM', 'Micronesia', 'USD', '107708', 'FM', '583', '10.08904', '1.02629', '163.03717', '137.33648', 'Palikir', 'Oceania', 'OC', '702.0', 'en-FM,chk,pon,yap,kos,uli,woe,nkr,kpg', 'FSM', 2081918),
(74, 'FO', 'Faroe Islands', 'DKK', '48228', 'FO', '234', '62.3938884414274', '61.3910302656013', '-6.25655957192113', '-7.688191677774624', 'T??rshavn', 'Europe', 'EU', '1399.0', 'fo,da-FO', 'FRO', 2622320),
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
(92, 'GU', 'Guam', 'USD', '159358', 'GQ', '316', '13.654402', '13.23376', '144.956894', '144.61806', 'Hag??t??a', 'Oceania', 'OC', '549.0', 'en-GU,ch-GU', 'GUM', 4043988),
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
(139, 'MD', 'Moldova', 'MDL', '4324000', 'MD', '498', '48.490166', '45.468887', '30.135445', '26.618944', 'Chi??in??u', 'Europe', 'EU', '33843.0', 'ro,ru,gag,tr', 'MDA', 617790),
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
(155, 'MV', 'Maldives', 'MVR', '395650', 'MV', '462', '7.091587495414767', '-0.692694', '73.637276', '72.693222', 'Mal??', 'Asia', 'AS', '300.0', 'dv,en', 'MDV', 1282028),
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
(186, 'PY', 'Paraguay', 'PYG', '6375830', 'PA', '600', '-19.294041', '-27.608738', '-54.259354', '-62.647076', 'Asunci??n', 'South America', 'SA', '406750.0', 'es-PY,gn', 'PRY', 3437598),
(187, 'QA', 'Qatar', 'QAR', '840926', 'QA', '634', '26.154722', '24.482944', '51.636639', '50.757221', 'Doha', 'Asia', 'AS', '11437.0', 'ar-QA,es', 'QAT', 289688),
(188, 'RE', 'R??union', 'EUR', '776948', 'RE', '638', '-20.868391324576944', '-21.383747301469107', '55.838193901930026', '55.21219224792685', 'Saint-Denis', 'Africa', 'AF', '2517.0', 'fr-RE', 'REU', 935317),
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
(209, 'ST', 'S??o Tom?? and Pr??ncipe', 'STD', '175808', 'TP', '678', '1.701323', '0.024766', '7.466374', '6.47017', 'S??o Tom??', 'Africa', 'AF', '1001.0', 'pt-ST', 'STP', 2410758),
(210, 'SV', 'El Salvador', 'USD', '6052064', 'ES', '222', '14.445067', '13.148679', '-87.692162', '-90.128662', 'San Salvador', 'North America', 'NA', '21040.0', 'es-SV', 'SLV', 3585968),
(211, 'SX', 'Sint Maarten', 'ANG', '37429', 'NN', '534', '18.065188278978088', '18.006632279377143', '-63.0104194322962', '-63.14146165934278', 'Philipsburg', 'North America', 'NA', '21.0', 'nl,en', 'SXM', 7609695),
(212, 'SY', 'Syria', 'SYP', '22198110', 'SY', '760', '37.319138', '32.310665', '42.385029', '35.727222', 'Damascus', 'Asia', 'AS', '185180.0', 'ar-SY,ku,hy,arc,fr,en', 'SYR', 163843),
(213, 'SZ', 'Swaziland', 'SZL', '1354051', 'WZ', '748', '-25.719648', '-27.317101', '32.13726', '30.794107', 'Mbabane', 'Africa', 'AF', '17363.0', 'en-SZ,ss-SZ', 'SWZ', 934841),
(214, 'TC', 'Turks and Caicos Islands', 'USD', '20556', 'TK', '796', '21.961878', '21.422626', '-71.123642', '-72.483871', 'Cockburn Town', 'North America', 'NA', '430.0', 'en-TC', 'TCA', 3576916),
(215, 'TD', 'Chad', 'XAF', '10543464', 'CD', '148', '23.450369', '7.441068', '24.002661', '13.473475', 'N\'Djamena', 'Africa', 'AF', '1284000.0', 'fr-TD,ar-TD,sre', 'TCD', 2434508),
(216, 'TF', 'French Southern Territories', 'EUR', '140', 'FS', '260', '-37.790722', '-49.735184', '77.598808', '50.170258', 'Port-aux-Fran??ais', 'Antarctica', 'AN', '7829.0', 'fr', 'ATF', 1546748),
(217, 'TG', 'Togo', 'XOF', '6587239', 'TO', '768', '11.138977', '6.104417', '1.806693', '-0.147324', 'Lom??', 'Africa', 'AF', '56785.0', 'fr-TG,ee,hna,kbp,dag,ha', 'TGO', 2363686),
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
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `def`, `title`, `image`, `status`, `created`, `modified`) VALUES
('en', 'eng', 'English', '', 1, '2014-01-24 15:22:49', '2019-03-11 00:47:55'),
('vi', 'vie', 'Ti???ng Vi???t', '/uploads/languages/flags/hinh-anh-la-co-viet-nam-dep-nhat.jpg', 1, '2014-05-14 06:22:15', '2015-06-30 10:00:19');

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
(1, '6', 1, '123123.jpg', NULL, '72fc3cde-d846-484d-9210-ed1c2cc56a0f', 1, NULL, 0, NULL, 0, 0, 0, NULL, '2019-03-30 03:14:30', '2019-03-30 03:15:17');

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
(6, 0, '12321.jpg', '31ae1845-a2f1-432a-a741-2822ab71fefa', 0, 1, 2, NULL, '2019-03-30 03:04:52', '2019-03-30 03:04:52');

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
(1, 'en', 'BannerCategories', 1, 'title', '2131'),
(2, 'en', 'BannerCategories', 1, 'alias', '123'),
(3, 'en', 'BannerCategories', 1, 'description', ''),
(4, 'en', 'BannerCategories', 1, 'content', ''),
(5, 'en', 'BannerCategories', 2, 'title', '123123'),
(6, 'en', 'BannerCategories', 2, 'alias', 'asdad'),
(7, 'en', 'BannerCategories', 2, 'description', '23131'),
(8, 'en', 'BannerCategories', 2, 'content', ''),
(12, 'en', 'PageCategories', 1, 'content', ''),
(16, 'en', 'PageCategories', 2, 'content', ''),
(20, 'en', 'PageCategories', 3, 'content', ''),
(24, 'en', 'PageCategories', 4, 'content', ''),
(27, 'vi', 'PageCategories', 6, 'title', '12321'),
(28, 'vi', 'PageCategories', 6, 'description', '23123123');

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
(1, 'vi', 'Pages', 1, 'title', '123123'),
(2, 'vi', 'Pages', 1, 'slug', '123123'),
(3, 'vi', 'Pages', 1, 'description', '123123'),
(4, 'vi', 'Pages', 1, 'content', '1231232&nbsp;');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `alias`, `color`, `description`, `status`, `created`, `modified`) VALUES
(1, 'Admin', 'admin', 'red', 'Admin', 1, '2019-03-06 15:07:40', '2019-03-06 15:07:40');

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

INSERT INTO `users` (`id`, `email`, `password`, `role_id`, `gender`, `first_name`, `last_name`, `birthday`, `phone_number`, `image`, `status`, `active`, `system`, `company`, `address`, `city`, `state`, `zip_code`, `country_id`, `note`, `fbid`, `ggid`, `last_visit`, `has_read`, `created`, `modified`) VALUES
(1, 'admin@gmail.com', '$2y$10$5Dukkw0brWvfFYhVhccVdO07MF0WbkQF34VMhrlVsjIpAbsseQp8e', 1, 1, 'Nguyen', 'Ngoc', '2019-03-06', '019123', '', 1, 0, 0, '', '', '', '', '', 241, '', '', '', NULL, 0, '2019-03-06 15:08:28', '2019-03-06 15:08:28');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_categories_translations`
--
ALTER TABLE `article_categories_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_translations`
--
ALTER TABLE `article_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `banner_categories`
--
ALTER TABLE `banner_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `banner_categories_translations`
--
ALTER TABLE `banner_categories_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `banner_translations`
--
ALTER TABLE `banner_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_categories`
--
ALTER TABLE `page_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page_categories_translations`
--
ALTER TABLE `page_categories_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
