-- MySQL dump 10.14  Distrib 5.5.63-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: cms3_final
-- ------------------------------------------------------
-- Server version	5.5.63-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acp_phinxlog`
--

DROP TABLE IF EXISTS `acp_phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acp_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acp_phinxlog`
--

LOCK TABLES `acp_phinxlog` WRITE;
/*!40000 ALTER TABLE `acp_phinxlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `acp_phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_categories`
--

DROP TABLE IF EXISTS `album_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `allowed_fields` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_categories`
--

LOCK TABLES `album_categories` WRITE;
/*!40000 ALTER TABLE `album_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `album_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_categories_translations`
--

DROP TABLE IF EXISTS `album_categories_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_categories_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_categories_translations`
--

LOCK TABLES `album_categories_translations` WRITE;
/*!40000 ALTER TABLE `album_categories_translations` DISABLE KEYS */;
INSERT INTO `album_categories_translations` VALUES (3,'en','AlbumCategories',1,'description',''),(4,'en','AlbumCategories',1,'keyword','');
/*!40000 ALTER TABLE `album_categories_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_image_translations`
--

DROP TABLE IF EXISTS `album_image_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_image_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_image_translations`
--

LOCK TABLES `album_image_translations` WRITE;
/*!40000 ALTER TABLE `album_image_translations` DISABLE KEYS */;
INSERT INTO `album_image_translations` VALUES (2,'en','AlbumImages',1,'description',NULL),(4,'en','AlbumImages',2,'description',NULL),(5,'en','AlbumImages',3,'title','Album Our Office'),(6,'en','AlbumImages',3,'description','Dummy text'),(8,'en','AlbumImages',4,'description',NULL),(10,'en','AlbumImages',5,'description',NULL),(11,'en','AlbumImages',6,'title','Album Our Office'),(12,'en','AlbumImages',6,'description','Dummy text'),(14,'en','AlbumImages',7,'description',NULL),(15,'en','AlbumImages',8,'title',''),(16,'en','AlbumImages',8,'description',''),(17,'en','AlbumImages',9,'title',''),(18,'en','AlbumImages',9,'description',''),(20,'en','AlbumImages',10,'description',NULL),(21,'en','AlbumImages',11,'title','Album Our Office'),(22,'en','AlbumImages',11,'description',NULL);
/*!40000 ALTER TABLE `album_image_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_images`
--

DROP TABLE IF EXISTS `album_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_images`
--

LOCK TABLES `album_images` WRITE;
/*!40000 ALTER TABLE `album_images` DISABLE KEYS */;
INSERT INTO `album_images` VALUES (3,'1','album-our-office_2.jpg','2021-05-10 20:52:04','2021-05-10 21:15:19'),(6,'1','album-our-office_5.jpg','2021-05-10 20:52:05','2021-05-10 21:15:16'),(8,'2','.jpg','2021-05-19 04:59:02','2021-05-19 04:59:02'),(9,'3','.jpg','2021-05-19 04:59:36','2021-05-19 04:59:36'),(11,'1','album-our-office_8.jpg','2021-05-24 15:28:26','2021-05-24 15:28:26');
/*!40000 ALTER TABLE `album_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_translations`
--

DROP TABLE IF EXISTS `album_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_translations`
--

LOCK TABLES `album_translations` WRITE;
/*!40000 ALTER TABLE `album_translations` DISABLE KEYS */;
INSERT INTO `album_translations` VALUES (3,'en','Albums',1,'description',''),(4,'en','Albums',1,'content',''),(5,'en','Albums',1,'meta_title',''),(6,'en','Albums',1,'meta_description',''),(7,'en','Albums',1,'meta_keyword',''),(8,'en','Albums',2,'title',''),(9,'en','Albums',2,'slug',''),(10,'en','Albums',2,'description',''),(11,'en','Albums',2,'content',''),(12,'en','Albums',2,'meta_title',''),(13,'en','Albums',2,'meta_description',''),(14,'en','Albums',2,'meta_keyword',''),(15,'en','Albums',3,'title',''),(16,'en','Albums',3,'slug',''),(17,'en','Albums',3,'description',''),(18,'en','Albums',3,'content',''),(19,'en','Albums',3,'meta_title',''),(20,'en','Albums',3,'meta_description',''),(21,'en','Albums',3,'meta_keyword','');
/*!40000 ALTER TABLE `album_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '1',
  `comment_count` int(11) DEFAULT NULL,
  `allow_comment` int(11) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `home` tinyint(1) DEFAULT '0',
  `featured` tinyint(1) DEFAULT '0',
  `tag` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albums_categories`
--

DROP TABLE IF EXISTS `albums_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `album_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums_categories`
--

LOCK TABLES `albums_categories` WRITE;
/*!40000 ALTER TABLE `albums_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `albums_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_categories`
--

DROP TABLE IF EXISTS `article_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `allowed_fields` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_categories`
--

LOCK TABLES `article_categories` WRITE;
/*!40000 ALTER TABLE `article_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_categories_translations`
--

DROP TABLE IF EXISTS `article_categories_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_categories_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_categories_translations`
--

LOCK TABLES `article_categories_translations` WRITE;
/*!40000 ALTER TABLE `article_categories_translations` DISABLE KEYS */;
INSERT INTO `article_categories_translations` VALUES (3,'en','ArticleCategories',1,'description',''),(4,'en','ArticleCategories',1,'keyword',''),(7,'en','ArticleCategories',2,'description',''),(8,'en','ArticleCategories',2,'keyword','');
/*!40000 ALTER TABLE `article_categories_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_translations`
--

DROP TABLE IF EXISTS `article_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_translations`
--

LOCK TABLES `article_translations` WRITE;
/*!40000 ALTER TABLE `article_translations` DISABLE KEYS */;
INSERT INTO `article_translations` VALUES (3,'en','Articles',1,'description',''),(4,'en','Articles',1,'content',''),(5,'en','Articles',1,'meta_title',''),(6,'en','Articles',1,'meta_description',''),(7,'en','Articles',1,'meta_keyword',''),(10,'en','Articles',2,'description',''),(11,'en','Articles',2,'content',''),(12,'en','Articles',2,'meta_title',''),(13,'en','Articles',2,'meta_description',''),(14,'en','Articles',2,'meta_keyword',''),(17,'en','Articles',3,'description',''),(18,'en','Articles',3,'content',''),(19,'en','Articles',3,'meta_title',''),(20,'en','Articles',3,'meta_description',''),(21,'en','Articles',3,'meta_keyword',''),(25,'en','Articles',4,'content',''),(26,'en','Articles',4,'meta_title',''),(27,'en','Articles',4,'meta_description',''),(28,'en','Articles',4,'meta_keyword',''),(32,'en','Articles',5,'content',''),(33,'en','Articles',5,'meta_title',''),(34,'en','Articles',5,'meta_description',''),(35,'en','Articles',5,'meta_keyword',''),(39,'en','Articles',6,'content',''),(40,'en','Articles',6,'meta_title',''),(41,'en','Articles',6,'meta_description',''),(42,'en','Articles',6,'meta_keyword',''),(46,'en','Articles',7,'content',''),(47,'en','Articles',7,'meta_title',''),(48,'en','Articles',7,'meta_description',''),(49,'en','Articles',7,'meta_keyword',''),(53,'en','Articles',8,'content',''),(54,'en','Articles',8,'meta_title',''),(55,'en','Articles',8,'meta_description',''),(56,'en','Articles',8,'meta_keyword',''),(60,'en','Articles',9,'content',''),(61,'en','Articles',9,'meta_title',''),(62,'en','Articles',9,'meta_description',''),(63,'en','Articles',9,'meta_keyword',''),(67,'en','Articles',10,'content',''),(68,'en','Articles',10,'meta_title',''),(69,'en','Articles',10,'meta_description',''),(70,'en','Articles',10,'meta_keyword',''),(77,'en','Articles',11,'content',''),(78,'en','Articles',11,'url',''),(81,'en','Articles',12,'description',''),(82,'en','Articles',12,'content',''),(83,'en','Articles',12,'url',''),(86,'en','Articles',13,'description',''),(87,'en','Articles',13,'content',''),(88,'en','Articles',13,'url',''),(91,'en','Articles',14,'description',''),(92,'en','Articles',14,'content',''),(93,'en','Articles',14,'url','');
/*!40000 ALTER TABLE `article_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT '1',
  `comment_count` int(11) DEFAULT NULL,
  `allow_comment` int(11) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `home` tinyint(1) DEFAULT '0',
  `featured` tinyint(1) DEFAULT '0',
  `tag` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles_categories`
--

DROP TABLE IF EXISTS `articles_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `article_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles_categories`
--

LOCK TABLES `articles_categories` WRITE;
/*!40000 ALTER TABLE `articles_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `articles_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles_tags`
--

DROP TABLE IF EXISTS `articles_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles_tags`
--

LOCK TABLES `articles_tags` WRITE;
/*!40000 ALTER TABLE `articles_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `articles_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_translations`
--

DROP TABLE IF EXISTS `attribute_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_translations`
--

LOCK TABLES `attribute_translations` WRITE;
/*!40000 ALTER TABLE `attribute_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_values`
--

DROP TABLE IF EXISTS `attribute_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_list` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_values`
--

LOCK TABLES `attribute_values` WRITE;
/*!40000 ALTER TABLE `attribute_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_values_amounts`
--

DROP TABLE IF EXISTS `attribute_values_amounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_values_amounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_value_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_values_amounts`
--

LOCK TABLES `attribute_values_amounts` WRITE;
/*!40000 ALTER TABLE `attribute_values_amounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_values_amounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_values_products`
--

DROP TABLE IF EXISTS `attribute_values_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_values_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_value_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_values_products`
--

LOCK TABLES `attribute_values_products` WRITE;
/*!40000 ALTER TABLE `attribute_values_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_values_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_values_translations`
--

DROP TABLE IF EXISTS `attribute_values_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_values_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_values_translations`
--

LOCK TABLES `attribute_values_translations` WRITE;
/*!40000 ALTER TABLE `attribute_values_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_values_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attributes_category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_list` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner_categories`
--

DROP TABLE IF EXISTS `banner_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner_categories`
--

LOCK TABLES `banner_categories` WRITE;
/*!40000 ALTER TABLE `banner_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `banner_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner_categories_translations`
--

DROP TABLE IF EXISTS `banner_categories_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner_categories_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner_categories_translations`
--

LOCK TABLES `banner_categories_translations` WRITE;
/*!40000 ALTER TABLE `banner_categories_translations` DISABLE KEYS */;
INSERT INTO `banner_categories_translations` VALUES (3,'en','BannerCategories',1,'description',''),(6,'en','BannerCategories',2,'description',''),(9,'en','BannerCategories',3,'description',''),(12,'en','BannerCategories',4,'description',''),(15,'en','BannerCategories',5,'description',''),(16,'en','BannerCategories',6,'title','Banners'),(17,'en','BannerCategories',6,'slug','banners'),(18,'en','BannerCategories',6,'description',''),(21,'en','BannerCategories',7,'description',''),(22,'en','BannerCategories',8,'title','Offering COVID-19'),(23,'en','BannerCategories',8,'slug','offering-covid-19'),(24,'en','BannerCategories',8,'description',''),(25,'en','BannerCategories',9,'title','P23 Slide'),(26,'en','BannerCategories',9,'slug','p23-slide'),(27,'en','BannerCategories',9,'description',''),(28,'en','BannerCategories',10,'title','Slide'),(29,'en','BannerCategories',10,'slug','slide'),(30,'en','BannerCategories',10,'description',''),(31,'en','BannerCategories',11,'title','Title'),(32,'en','BannerCategories',11,'slug','title'),(33,'en','BannerCategories',11,'description',''),(34,'en','BannerCategories',12,'title','Give Back'),(35,'en','BannerCategories',12,'slug','give-back'),(36,'en','BannerCategories',12,'description',''),(39,'en','BannerCategories',13,'description',''),(40,'en','BannerCategories',14,'title','Clinical Testing'),(41,'en','BannerCategories',14,'slug','clinical-testing'),(42,'en','BannerCategories',14,'description',''),(43,'en','BannerCategories',15,'title','Video'),(44,'en','BannerCategories',15,'slug','video'),(45,'en','BannerCategories',15,'description',''),(46,'en','BannerCategories',16,'title','Clinical'),(47,'en','BannerCategories',16,'slug','clinical'),(48,'en','BannerCategories',16,'description',''),(49,'en','BannerCategories',17,'title','About us'),(50,'en','BannerCategories',17,'slug','about-us'),(51,'en','BannerCategories',17,'description',''),(52,'en','BannerCategories',18,'title','How we help'),(53,'en','BannerCategories',18,'slug','how-we-help'),(54,'en','BannerCategories',18,'description',''),(57,'en','BannerCategories',19,'description',''),(60,'en','BannerCategories',20,'description',''),(63,'en','BannerCategories',21,'description',''),(64,'en','BannerCategories',22,'title','Banner'),(65,'en','BannerCategories',22,'slug','banner'),(66,'en','BannerCategories',22,'description',''),(67,'en','BannerCategories',23,'title','Welcom '),(68,'en','BannerCategories',23,'slug','welcom'),(69,'en','BannerCategories',23,'description',''),(70,'en','BannerCategories',24,'title','Our experience'),(71,'en','BannerCategories',24,'slug','our-experience'),(72,'en','BannerCategories',24,'description',''),(73,'en','BannerCategories',25,'title','Title'),(74,'en','BannerCategories',25,'slug','title'),(75,'en','BannerCategories',25,'description',''),(76,'en','BannerCategories',26,'title','Approved COVID-19'),(77,'en','BannerCategories',26,'slug','approved-covid-19'),(78,'en','BannerCategories',26,'description',''),(79,'en','BannerCategories',27,'title','Banner'),(80,'en','BannerCategories',27,'slug','banner'),(81,'en','BannerCategories',27,'description',''),(82,'en','BannerCategories',28,'title','Order tests'),(83,'en','BannerCategories',28,'slug','order-tests'),(84,'en','BannerCategories',28,'description',''),(85,'en','BannerCategories',29,'title','Icon'),(86,'en','BannerCategories',29,'slug','icon'),(87,'en','BannerCategories',29,'description',''),(88,'en','BannerCategories',30,'title','Icon Order'),(89,'en','BannerCategories',30,'slug','icon-order'),(90,'en','BannerCategories',30,'description',''),(93,'en','BannerCategories',31,'description',''),(96,'en','BannerCategories',32,'description',''),(99,'en','BannerCategories',33,'description',''),(102,'en','BannerCategories',34,'description',''),(103,'en','BannerCategories',35,'title','Icon'),(104,'en','BannerCategories',35,'slug','icon'),(105,'en','BannerCategories',35,'description',''),(108,'en','BannerCategories',36,'description',''),(109,'en','BannerCategories',37,'title','Icon'),(110,'en','BannerCategories',37,'slug','icon'),(111,'en','BannerCategories',37,'description',''),(112,'en','BannerCategories',38,'title','Mission Vission DNA'),(113,'en','BannerCategories',38,'slug','mission-vission-dna'),(114,'en','BannerCategories',38,'description',''),(117,'en','BannerCategories',39,'description',''),(120,'en','BannerCategories',40,'description',''),(123,'en','BannerCategories',41,'description',''),(126,'en','BannerCategories',42,'description',''),(129,'en','BannerCategories',43,'description','');
/*!40000 ALTER TABLE `banner_categories_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner_translations`
--

DROP TABLE IF EXISTS `banner_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB AUTO_INCREMENT=407 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner_translations`
--

LOCK TABLES `banner_translations` WRITE;
/*!40000 ALTER TABLE `banner_translations` DISABLE KEYS */;
INSERT INTO `banner_translations` VALUES (4,'en','Banners',1,'url',''),(8,'en','Banners',2,'url',''),(12,'en','Banners',3,'url',''),(16,'en','Banners',4,'url',''),(20,'en','Banners',5,'url',''),(24,'en','Banners',6,'url',''),(28,'en','Banners',7,'url',''),(32,'en','Banners',8,'url',''),(36,'en','Banners',9,'url',''),(39,'en','Banners',10,'description',''),(40,'en','Banners',10,'url',''),(43,'en','Banners',11,'description',''),(47,'en','Banners',12,'description',''),(48,'en','Banners',12,'url',''),(51,'en','Banners',13,'description',''),(52,'en','Banners',13,'url',''),(55,'en','Banners',14,'description',''),(56,'en','Banners',14,'url',''),(59,'en','Banners',15,'description',''),(60,'en','Banners',15,'url',''),(80,'en','Banners',20,'url',''),(105,'en','Banners',25,'url',''),(106,'en','Banners',25,'title_button',''),(114,'en','Banners',27,'url',''),(118,'en','Banners',28,'url',''),(122,'en','Banners',29,'url',''),(123,'en','Banners',27,'title_button',''),(124,'en','Banners',28,'title_button',''),(125,'en','Banners',29,'title_button',''),(129,'en','Banners',30,'url',''),(130,'en','Banners',30,'title_button',''),(134,'en','Banners',31,'url',''),(135,'en','Banners',31,'title_button',''),(139,'en','Banners',32,'url',''),(143,'en','Banners',33,'url',''),(147,'en','Banners',34,'url',''),(151,'en','Banners',35,'url',''),(152,'en','Banners',35,'title_button',''),(156,'en','Banners',36,'url',''),(157,'en','Banners',36,'title_button',''),(158,'en','Banners',34,'title_button',''),(161,'en','Banners',37,'description',''),(162,'en','Banners',37,'url',''),(163,'en','Banners',37,'title_button',''),(172,'en','Banners',39,'url',''),(176,'en','Banners',40,'url',''),(180,'en','Banners',41,'url',''),(184,'en','Banners',42,'url',''),(188,'en','Banners',43,'url',''),(196,'en','Banners',45,'url',''),(197,'en','Banners',44,'title_button',''),(200,'en','Banners',46,'description',''),(201,'en','Banners',46,'url',''),(202,'en','Banners',46,'title_button',''),(205,'en','Banners',47,'description',''),(206,'en','Banners',47,'url',''),(209,'en','Banners',48,'description',''),(213,'en','Banners',49,'description',''),(214,'en','Banners',49,'url',''),(217,'en','Banners',50,'description',''),(218,'en','Banners',50,'url',''),(221,'en','Banners',51,'description',''),(222,'en','Banners',51,'url',''),(225,'en','Banners',52,'description',''),(226,'en','Banners',52,'url',''),(227,'en','Banners',48,'title_button',''),(228,'en','Banners',49,'title_button',''),(229,'en','Banners',50,'title_button',''),(230,'en','Banners',51,'title_button',''),(231,'en','Banners',52,'title_button',''),(235,'en','Banners',53,'url',''),(239,'en','Banners',54,'url',''),(240,'en','Banners',53,'title_button',''),(244,'en','Banners',55,'url',''),(248,'en','Banners',56,'url',''),(249,'en','Banners',54,'title_button',''),(250,'en','Banners',55,'title_button',''),(251,'en','Banners',56,'title_button',''),(254,'en','Banners',57,'description',''),(257,'en','Banners',47,'title_button',''),(265,'en','Banners',59,'description',''),(270,'en','Banners',60,'description',''),(271,'en','Banners',60,'url',''),(274,'en','Banners',61,'description',''),(275,'en','Banners',61,'url',''),(276,'en','Banners',61,'title_button',''),(280,'en','Banners',62,'url',''),(281,'en','Banners',62,'title_button',''),(289,'en','Banners',64,'description',''),(290,'en','Banners',64,'url',''),(294,'en','Banners',65,'url',''),(298,'en','Banners',66,'url',''),(299,'en','Banners',65,'title_button',''),(300,'en','Banners',66,'title_button',''),(304,'en','Banners',67,'url',''),(305,'en','Banners',67,'title_button',''),(308,'en','Banners',68,'description',''),(319,'en','Banners',70,'url',''),(320,'en','Banners',70,'title_button',''),(324,'en','Banners',71,'url',''),(328,'en','Banners',72,'url',''),(332,'en','Banners',73,'url',''),(336,'en','Banners',74,'url',''),(337,'en','Banners',74,'title_button',''),(338,'en','Banners',71,'title_button',''),(339,'en','Banners',72,'title_button',''),(340,'en','Banners',73,'title_button',''),(344,'en','Banners',75,'url',''),(348,'en','Banners',76,'url',''),(352,'en','Banners',77,'url',''),(355,'en','Banners',78,'description',''),(356,'en','Banners',78,'url',''),(357,'en','Banners',77,'title_button',''),(361,'en','Banners',79,'url',''),(364,'en','Banners',80,'description',''),(365,'en','Banners',80,'url',''),(369,'en','Banners',81,'url',''),(372,'en','Banners',82,'description',''),(373,'en','Banners',82,'url',''),(374,'en','Banners',82,'title_button',''),(378,'en','Banners',83,'url',''),(379,'en','Banners',83,'title_button',''),(382,'en','Banners',84,'description',''),(383,'en','Banners',84,'url',''),(384,'en','Banners',84,'title_button',''),(385,'en','Banners',1,'title_button',''),(388,'en','Banners',85,'description',''),(392,'en','Banners',86,'description',''),(394,'en','Banners',11,'title_button',''),(395,'en','Banners',85,'title_button',''),(396,'en','Banners',86,'title_button',''),(397,'en','Banners',9,'title_button',''),(398,'en','Banners',2,'title_button',''),(399,'en','Banners',3,'title_button',''),(400,'en','Banners',4,'title_button',''),(401,'en','Banners',7,'title_button',''),(402,'en','Banners',6,'title_button',''),(403,'en','Banners',8,'title_button',''),(404,'en','Banners',81,'title_button',''),(405,'en','Banners',5,'title_button',''),(406,'en','Banners',12,'title_button','');
/*!40000 ALTER TABLE `banner_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_list` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand_translations`
--

DROP TABLE IF EXISTS `brand_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand_translations`
--

LOCK TABLES `brand_translations` WRITE;
/*!40000 ALTER TABLE `brand_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `brand_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `has_read` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
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
  `geonameId` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AD','Andorra','EUR','84000','AN','020','42.65604389629997','42.42849259876837','1.7865427778319827','1.4071867141112762','Andorra la Vella','Europe','EU','468.0','ca','AND',3041565),(2,'AE','United Arab Emirates','AED','4975593','AE','784','26.08415985107422','22.633329391479492','56.38166046142578','51.58332824707031','Abu Dhabi','Asia','AS','82880.0','ar-AE,fa,en,hi,ur','ARE',290557),(3,'AF','Afghanistan','AFN','29121286','AF','004','38.483418','29.377472','74.879448','60.478443','Kabul','Asia','AS','647500.0','fa-AF,ps,uz-AF,tk','AFG',1149361),(4,'AG','Antigua and Barbuda','XCD','86754','AC','028','17.729387','16.996979','-61.672421','-61.906425','St. John\'s','North America','NA','443.0','en-AG','ATG',3576396),(5,'AI','Anguilla','XCD','13254','AV','660','18.276901971658063','18.160292974311673','-62.96655544577948','-63.16808989603879','The Valley','North America','NA','102.0','en-AI','AIA',3573511),(6,'AL','Albania','ALL','2986952','AL','008','42.6611669383269','39.6448624829142','21.0574334835312','19.2639112711741','Tirana','Europe','EU','28748.0','sq,el','ALB',783754),(7,'AM','Armenia','AMD','2968000','AM','051','41.301834','38.830528','46.772435045159995','43.44978','Yerevan','Asia','AS','29800.0','hy','ARM',174982),(8,'AO','Angola','AOA','13068161','AO','024','-4.376826','-18.042076','24.082119','11.679219','Luanda','Africa','AF','1246700.0','pt-AO','AGO',3351879),(9,'AQ','Antarctica','','0','AY','010','-60.515533','-89.9999','179.9999','-179.9999','','Antarctica','AN','1.4E7','','ATA',6697173),(10,'AR','Argentina','ARS','41343201','AR','032','-21.777951173','-55.0576984539999','-53.637962552','-73.566302817','Buenos Aires','South America','SA','2766890.0','es-AR,en,it,de,fr,gn','ARG',3865483),(11,'AS','American Samoa','USD','57881','AQ','016','-11.0497','-14.382478','-169.416077','-171.091888','Pago Pago','Oceania','OC','199.0','en-AS,sm,to','ASM',5880801),(12,'AT','Austria','EUR','8205000','AU','040','49.0211627691393','46.3726520216244','17.1620685652599','9.53095237240833','Vienna','Europe','EU','83858.0','de-AT,hr,hu,sl','AUT',2782113),(13,'AU','Australia','AUD','21515754','AS','036','-10.062805','-43.64397','153.639252','112.911057','Canberra','Oceania','OC','7686850.0','en-AU','AUS',2077456),(14,'AW','Aruba','AWG','71566','AA','533','12.623718127152925','12.411707706190716','-69.86575120104982','-70.0644737196045','Oranjestad','North America','NA','193.0','nl-AW,pap,es,en','ABW',3577279),(15,'AX','Åland','EUR','26711','','248','60.488861','59.90675','21.011862','19.317694','Mariehamn','Europe','EU','1580.0','sv-AX','ALA',661882),(16,'AZ','Azerbaijan','AZN','8303512','AJ','031','41.90564','38.38915252685547','50.370083','44.774113','Baku','Asia','AS','86600.0','az,ru,hy','AZE',587116),(17,'BA','Bosnia and Herzegovina','BAM','4590000','BK','070','45.239193','42.546112','19.622223','15.718945','Sarajevo','Europe','EU','51129.0','bs,hr-BA,sr-BA','BIH',3277605),(18,'BB','Barbados','BBD','285653','BB','052','13.327257','13.039844','-59.420376','-59.648922','Bridgetown','North America','NA','431.0','en-BB','BRB',3374084),(19,'BD','Bangladesh','BDT','156118464','BG','050','26.631945','20.743334','92.673668','88.028336','Dhaka','Asia','AS','144000.0','bn-BD,en','BGD',1210997),(20,'BE','Belgium','EUR','10403000','BE','056','51.5051118897455','49.496968483036','6.40793743953125','2.54132898439873','Brussels','Europe','EU','30510.0','nl-BE,fr-BE,de-BE','BEL',2802361),(21,'BF','Burkina Faso','XOF','16241811','UV','854','15.082593','9.401108','2.405395','-5.518916','Ouagadougou','Africa','AF','274200.0','fr-BF,mos','BFA',2361809),(22,'BG','Bulgaria','BGN','7148785','BU','100','44.21764','41.242084','28.612167','22.371166','Sofia','Europe','EU','110910.0','bg,tr-BG,rom','BGR',732800),(23,'BH','Bahrain','BHD','738004','BA','048','26.282583','25.796862','50.664471','50.45414','Manama','Asia','AS','665.0','ar-BH,en,fa,ur','BHR',290291),(24,'BI','Burundi','BIF','9863117','BY','108','-2.310123','-4.465713','30.847729','28.993061','Bujumbura','Africa','AF','27830.0','fr-BI,rn','BDI',433561),(25,'BJ','Benin','XOF','9056010','BN','204','12.418347','6.225748','3.851701','0.774575','Porto-Novo','Africa','AF','112620.0','fr-BJ','BEN',2395170),(26,'BL','Saint Barthélemy','EUR','8450','TB','652','17.928808791949283','17.878183227405575','-62.788983372985854','-62.8739118253784','Gustavia','North America','NA','21.0','fr','BLM',3578476),(27,'BM','Bermuda','BMD','65365','BD','060','32.39122351646162','32.247551','-64.64718648144532','-64.88723800000002','Hamilton','North America','NA','53.0','en-BM,pt','BMU',3573345),(28,'BN','Brunei','BND','395027','BX','096','5.047167','4.003083','115.359444','114.071442','Bandar Seri Begawan','Asia','AS','5770.0','ms-BN,en-BN','BRN',1820814),(29,'BO','Bolivia','BOB','9947418','BL','068','-9.680567','-22.896133','-57.45809600000001','-69.640762','Sucre','South America','SA','1098580.0','es-BO,qu,ay','BOL',3923057),(30,'BQ','Bonaire','USD','18012','','535','12.304535','12.017149','-68.192307','-68.416458','Kralendijk','North America','NA','328.0','nl,pap,en','BES',7626844),(31,'BR','Brazil','BRL','201103330','BR','076','5.264877','-33.750706','-32.392998','-73.985535','Brasília','South America','SA','8511965.0','pt-BR,es,en,fr','BRA',3469034),(32,'BS','Bahamas','BSD','301790','BF','044','26.919243','22.852743','-74.423874','-78.995911','Nassau','North America','NA','13940.0','en-BS','BHS',3572887),(33,'BT','Bhutan','BTN','699847','BT','064','28.323778','26.70764','92.125191','88.75972','Thimphu','Asia','AS','47000.0','dz','BTN',1252634),(34,'BV','Bouvet Island','NOK','0','BV','074','-54.3887383509872','-54.4507993522734','3.434845577758324','3.286776428037342','','Antarctica','AN','49.0','','BVT',3371123),(35,'BW','Botswana','BWP','2029307','BC','072','-17.780813','-26.907246','29.360781','19.999535','Gaborone','Africa','AF','600370.0','en-BW,tn-BW','BWA',933860),(36,'BY','Belarus','BYN','9685000','BO','112','56.165806','51.256416','32.770805','23.176889','Minsk','Europe','EU','207600.0','be,ru','BLR',630336),(37,'BZ','Belize','BZD','314522','BH','084','18.496557','15.8893','-87.776985','-89.224815','Belmopan','North America','NA','22966.0','en-BZ,es','BLZ',3582678),(38,'CA','Canada','CAD','33679000','CA','124','83.110626','41.67598','-52.636291','-141','Ottawa','North America','NA','9984670.0','en-CA,fr-CA,iu','CAN',6251999),(39,'CC','Cocos [Keeling] Islands','AUD','628','CK','166','-12.072459094','-12.208725839','96.929489344','96.816941408','West Island','Asia','AS','14.0','ms-CC,en','CCK',1547376),(40,'CD','Democratic Republic of the Congo','CDF','70916439','CG','180','5.386098','-13.455675','31.305912','12.204144','Kinshasa','Africa','AF','2345410.0','fr-CD,ln,ktu,kg,sw,lua','COD',203312),(41,'CF','Central African Republic','XAF','4844927','CT','140','11.007569','2.220514','27.463421','14.420097','Bangui','Africa','AF','622984.0','fr-CF,sg,ln,kg','CAF',239880),(42,'CG','Republic of the Congo','XAF','3039126','CF','178','3.703082','-5.027223','18.649839','11.205009','Brazzaville','Africa','AF','342000.0','fr-CG,kg,ln-CG','COG',2260494),(43,'CH','Switzerland','CHF','7581000','SZ','756','47.8098679329775','45.8191539516188','10.4934735095497','5.95661377423453','Bern','Europe','EU','41290.0','de-CH,fr-CH,it-CH,rm','CHE',2658434),(44,'CI','Ivory Coast','XOF','21058798','IV','384','10.736642','4.357067','-2.494897','-8.599302','Yamoussoukro','Africa','AF','322460.0','fr-CI','CIV',2287781),(45,'CK','Cook Islands','NZD','21388','CW','184','-10.023114','-21.944164','-157.312134','-161.093658','Avarua','Oceania','OC','240.0','en-CK,mi','COK',1899402),(46,'CL','Chile','CLP','16746491','CI','152','-17.4977759459999','-55.909795409','-66.416152278','-80.8370287079999','Santiago','South America','SA','756950.0','es-CL','CHL',3895114),(47,'CM','Cameroon','XAF','19294149','CM','120','13.078056','1.652548','16.192116','8.494763','Yaoundé','Africa','AF','475440.0','en-CM,fr-CM','CMR',2233387),(48,'CN','China','CNY','1330044000','CH','156','53.56086','15.775416','134.773911','73.557693','Beijing','Asia','AS','9596960.0','zh-CN,yue,wuu,dta,ug,za','CHN',1814991),(49,'CO','Colombia','COP','47790000','CO','170','13.380502','-4.225869','-66.869835','-81.728111','Bogotá','South America','SA','1138910.0','es-CO','COL',3686110),(50,'CR','Costa Rica','CRC','4516220','CS','188','11.216819','8.032975','-82.555992','-85.950623','San José','North America','NA','51100.0','es-CR,en','CRI',3624060),(51,'CU','Cuba','CUP','11423000','CU','192','23.226042','19.828083','-74.131775','-84.957428','Havana','North America','NA','110860.0','es-CU,pap','CUB',3562981),(52,'CV','Cape Verde','CVE','508659','CV','132','17.197178','14.808022','-22.669443','-25.358747','Praia','Africa','AF','4033.0','pt-CV','CPV',3374766),(53,'CW','Curacao','ANG','141766','UC','531','12.385672','12.032745','-68.733948','-69.157204','Willemstad','North America','NA','444.0','nl,pap','CUW',7626836),(54,'CX','Christmas Island','AUD','1500','KT','162','-10.412356007','-10.5704829995','105.712596992','105.533276992','Flying Fish Cove','Oceania','OC','135.0','en,zh,ms-CC','CXR',2078138),(55,'CY','Cyprus','EUR','1102677','CY','196','35.701527','34.6332846722908','34.59791599999994','32.27308300000004','Nicosia','Europe','EU','9250.0','el-CY,tr-CY,en','CYP',146669),(56,'CZ','Czechia','CZK','10476000','EZ','203','51.058887','48.542915','18.860111','12.096194','Prague','Europe','EU','78866.0','cs,sk','CZE',3077311),(57,'DE','Germany','EUR','81802257','GM','276','55.0583836008072','47.2701236047002','15.0418156516163','5.8663152683722','Berlin','Europe','EU','357021.0','de','DEU',2921044),(58,'DJ','Djibouti','DJF','740528','DJ','262','12.706833','10.909917','43.416973','41.773472','Djibouti','Africa','AF','23000.0','fr-DJ,ar,so-DJ,aa','DJI',223816),(59,'DK','Denmark','DKK','5484000','DA','208','57.748417','54.562389','15.158834','8.075611','Copenhagen','Europe','EU','43094.0','da-DK,en,fo,de-DK','DNK',2623032),(60,'DM','Dominica','XCD','72813','DO','212','15.631809','15.20169','-61.244152','-61.484108','Roseau','North America','NA','754.0','en-DM','DMA',3575830),(61,'DO','Dominican Republic','DOP','9823821','DR','214','19.9321257501267','17.5395066830409','-68.3229591969468','-72.0114723981787','Santo Domingo','North America','NA','48730.0','es-DO','DOM',3508796),(62,'DZ','Algeria','DZD','34586184','AG','012','37.093723','18.960028','11.979548','-8.673868','Algiers','Africa','AF','2381740.0','ar-DZ','DZA',2589581),(63,'EC','Ecuador','USD','14790608','EC','218','1.43523516349953','-5.01615732302488','-75.1871465547501','-81.0836838953894','Quito','South America','SA','283560.0','es-EC','ECU',3658394),(64,'EE','Estonia','EUR','1291170','EN','233','59.6753143130129','57.5093097920079','28.2090381531431','21.8285886498081','Tallinn','Europe','EU','45226.0','et,ru','EST',453733),(65,'EG','Egypt','EGP','80471869','EG','818','31.667334','21.725389','36.89833068847656','24.698111','Cairo','Africa','AF','1001450.0','ar-EG,en,fr','EGY',357994),(66,'EH','Western Sahara','MAD','273008','WI','732','27.669674','20.774158','-8.670276','-17.103182','Laâyoune / El Aaiún','Africa','AF','266000.0','ar,mey','ESH',2461445),(67,'ER','Eritrea','ERN','5792984','ER','232','18.003084','12.359555','43.13464','36.438778','Asmara','Africa','AF','121320.0','aa-ER,ar,tig,kun,ti-ER','ERI',338010),(68,'ES','Spain','EUR','46505963','SP','724','43.7913565913767','36.0001044260548','4.32778473043961','-9.30151567231899','Madrid','Europe','EU','504782.0','es-ES,ca,gl,eu,oc','ESP',2510769),(69,'ET','Ethiopia','ETB','88013491','ET','231','14.89375','3.402422','47.986179','32.999939','Addis Ababa','Africa','AF','1127127.0','am,en-ET,om-ET,ti-ET,so-ET,sid','ETH',337996),(70,'FI','Finland','EUR','5244000','FI','246','70.096054','59.808777','31.580944','20.556944','Helsinki','Europe','EU','337030.0','fi-FI,sv-FI,smn','FIN',660013),(71,'FJ','Fiji','FJD','875983','FJ','242','-12.479632058714332','-20.67597','-178.424438','177.14038537647912','Suva','Oceania','OC','18270.0','en-FJ,fj','FJI',2205218),(72,'FK','Falkland Islands','FKP','2638','FK','238','-51.2331394719999','-52.383984175','-57.718087652','-61.3474566739999','Stanley','South America','SA','12173.0','en-FK','FLK',3474414),(73,'FM','Micronesia','USD','107708','FM','583','10.08904','1.02629','163.03717','137.33648','Palikir','Oceania','OC','702.0','en-FM,chk,pon,yap,kos,uli,woe,nkr,kpg','FSM',2081918),(74,'FO','Faroe Islands','DKK','48228','FO','234','62.3938884414274','61.3910302656013','-6.25655957192113','-7.688191677774624','Tórshavn','Europe','EU','1399.0','fo,da-FO','FRO',2622320),(75,'FR','France','EUR','64768389','FR','250','51.0890012279322','41.3658213299999','9.5596148665824','-5.1389964684508','Paris','Europe','EU','547030.0','fr-FR,frp,br,co,ca,eu,oc','FRA',3017382),(76,'GA','Gabon','XAF','1545255','GB','266','2.322612','-3.978806','14.502347','8.695471','Libreville','Africa','AF','267667.0','fr-GA','GAB',2400553),(77,'GB','United Kingdom','GBP','62348447','UK','826','59.3607741849963','49.9028622252397','1.7689121033873','-8.61772077108559','London','Europe','EU','244820.0','en-GB,cy-GB,gd','GBR',2635167),(78,'GD','Grenada','XCD','107818','GJ','308','12.318283928171299','11.986893','-61.57676970108031','-61.802344','St. George\'s','North America','NA','344.0','en-GD','GRD',3580239),(79,'GE','Georgia','GEL','4630000','GG','268','43.586498','41.053196','46.725971','40.010139','Tbilisi','Asia','AS','69700.0','ka,ru,hy,az','GEO',614540),(80,'GF','French Guiana','EUR','195506','FG','254','5.776496','2.127094','-51.613949','-54.542511','Cayenne','South America','SA','91000.0','fr-GF','GUF',3381670),(81,'GG','Guernsey','GBP','65228','GK','831','49.731727816705416','49.40764156876899','-2.1577152112246267','-2.673194593476069','St Peter Port','Europe','EU','78.0','en,nrf','GGY',3042362),(82,'GH','Ghana','GHS','24339838','GH','288','11.173301','4.736723','1.191781','-3.25542','Accra','Africa','AF','239460.0','en-GH,ak,ee,tw','GHA',2300660),(83,'GI','Gibraltar','GIP','27884','GI','292','36.155439135670726','36.10903070140248','-5.338285164001491','-5.36626149743654','Gibraltar','Europe','EU','6.5','en-GI,es,it,pt','GIB',2411586),(84,'GL','Greenland','DKK','56375','GL','304','83.627357','59.777401','-11.312319','-73.04203','Nuuk','North America','NA','2166086.0','kl,da-GL,en','GRL',3425505),(85,'GM','Gambia','GMD','1593256','GA','270','13.826571','13.064252','-13.797793','-16.825079','Bathurst','Africa','AF','11300.0','en-GM,mnk,wof,wo,ff','GMB',2413451),(86,'GN','Guinea','GNF','10324025','GV','324','12.67622','7.193553','-7.641071','-14.926619','Conakry','Africa','AF','245857.0','fr-GN','GIN',2420477),(87,'GP','Guadeloupe','EUR','443000','GP','312','16.516848','15.867565','-61','-61.544765','Basse-Terre','North America','NA','1780.0','fr-GP','GLP',3579143),(88,'GQ','Equatorial Guinea','XAF','1014999','EK','226','2.346989','0.92086','11.335724','9.346865','Malabo','Africa','AF','28051.0','es-GQ,fr','GNQ',2309096),(89,'GR','Greece','EUR','11000000','GR','300','41.7484999849641','34.8020663391466','28.2470831714347','19.3736035624134','Athens','Europe','EU','131940.0','el-GR,en,fr','GRC',390903),(90,'GS','South Georgia and the South Sandwich Islands','GBP','30','SX','239','-53.980896636','-59.46319341','-26.252069712','-38.0479509639999','Grytviken','Antarctica','AN','3903.0','en','SGS',3474415),(91,'GT','Guatemala','GTQ','13550440','GT','320','17.81522','13.737302','-88.223198','-92.23629','Guatemala City','North America','NA','108890.0','es-GT','GTM',3595528),(92,'GU','Guam','USD','159358','GQ','316','13.654402','13.23376','144.956894','144.61806','Hagåtña','Oceania','OC','549.0','en-GU,ch-GU','GUM',4043988),(93,'GW','Guinea-Bissau','XOF','1565126','PU','624','12.680789','10.924265','-13.636522','-16.717535','Bissau','Africa','AF','36120.0','pt-GW,pov','GNB',2372248),(94,'GY','Guyana','GYD','748486','GY','328','8.557567','1.17508','-56.480251','-61.384762','Georgetown','South America','SA','214970.0','en-GY','GUY',3378535),(95,'HK','Hong Kong','HKD','6898686','HK','344','22.559778','22.15325','114.434753','113.837753','Hong Kong','Asia','AS','1092.0','zh-HK,yue,zh,en','HKG',1819730),(96,'HM','Heard Island and McDonald Islands','AUD','0','HM','334','-52.909416','-53.192001','73.859146','72.596535','','Antarctica','AN','412.0','','HMD',1547314),(97,'HN','Honduras','HNL','7989415','HO','340','16.510256','12.982411','-83.155403','-89.350792','Tegucigalpa','North America','NA','112090.0','es-HN,cab,miq','HND',3608932),(98,'HR','Croatia','HRK','4284889','HR','191','46.53875','42.43589','19.427389','13.493222','Zagreb','Europe','EU','56542.0','hr-HR,sr','HRV',3202326),(99,'HT','Haiti','HTG','9648924','HA','332','20.08782','18.021032','-71.613358','-74.478584','Port-au-Prince','North America','NA','27750.0','ht,fr-HT','HTI',3723988),(100,'HU','Hungary','HUF','9982000','HU','348','48.585667','45.74361','22.906','16.111889','Budapest','Europe','EU','93030.0','hu-HU','HUN',719819),(101,'ID','Indonesia','IDR','242968342','ID','360','5.904417','-10.941861','141.021805','95.009331','Jakarta','Asia','AS','1919440.0','id,en,nl,jv','IDN',1643084),(102,'IE','Ireland','EUR','4622917','EI','372','55.3829431564742','51.4475491577615','-5.99804990172185','-10.4800035816853','Dublin','Europe','EU','70280.0','en-IE,ga-IE','IRL',2963597),(103,'IL','Israel','ILS','7353985','IS','376','33.340137','29.496639','35.876804','34.270278754419145','','Asia','AS','20770.0','he,ar-IL,en-IL,','ISR',294640),(104,'IM','Isle of Man','GBP','75049','IM','833','54.419724','54.055916','-4.3115','-4.798722','Douglas','Europe','EU','572.0','en,gv','IMN',3042225),(105,'IN','India','INR','1173108018','IN','356','35.524548272882','6.7559528993543','97.4152926679075','68.4840183183648','New Delhi','Asia','AS','3287590.0','en-IN,hi,bn,te,mr,ta,ur,gu,kn,ml,or,pa,as,bh,sat,ks,ne,sd,kok,doi,mni,sit,sa,fr,lus,inc','IND',1269750),(106,'IO','British Indian Ocean Territory','USD','4000','IO','086','-5.268333','-7.438028','72.493164','71.259972','','Asia','AS','60.0','en-IO','IOT',1282588),(107,'IQ','Iraq','IQD','29671605','IZ','368','37.378029','29.069445','48.575916','38.795887','Baghdad','Asia','AS','437072.0','ar-IQ,ku,hy','IRQ',99237),(108,'IR','Iran','IRR','76923300','IR','364','39.777222','25.064083','63.317471','44.047279','Tehran','Asia','AS','1648000.0','fa-IR,ku','IRN',130758),(109,'IS','Iceland','ISK','308910','IC','352','66.5377933098397','63.394392778588','-13.4946206239501','-24.5326753866625','Reykjavik','Europe','EU','103000.0','is,en,de,da,sv,no','ISL',2629691),(110,'IT','Italy','EUR','60340328','IT','380','47.0917837415439','36.6440816661648','18.5203814091888','6.62662135986088','Rome','Europe','EU','301230.0','it-IT,de-IT,fr-IT,sc,ca,co,sl','ITA',3175395),(111,'JE','Jersey','GBP','90812','JE','832','49.265057','49.169834','-2.022083','-2.260028','Saint Helier','Europe','EU','116.0','en,fr,nrf','JEY',3042142),(112,'JM','Jamaica','JMD','2847232','JM','388','18.524766185516','17.7059966193696','-76.1830989848426','-78.3690062954957','Kingston','North America','NA','10991.0','en-JM','JAM',3489940),(113,'JO','Jordan','JOD','6407085','JO','400','33.367668','29.185888','39.301167','34.959999','Amman','Asia','AS','92300.0','ar-JO,en','JOR',248816),(114,'JP','Japan','JPY','127288000','JA','392','45.52295736','24.255169441','145.817458885','122.933653061','Tokyo','Asia','AS','377835.0','ja','JPN',1861060),(115,'KE','Kenya','KES','40046566','KE','404','5.019938','-4.678047','41.899078','33.908859','Nairobi','Africa','AF','582650.0','en-KE,sw-KE','KEN',192950),(116,'KG','Kyrgyzstan','KGS','5776500','KG','417','43.238224','39.172832','80.283165','69.276611','Bishkek','Asia','AS','198500.0','ky,uz,ru','KGZ',1527747),(117,'KH','Cambodia','KHR','14453680','CB','116','14.686417','10.409083','107.627724','102.339996','Phnom Penh','Asia','AS','181040.0','km,fr,en','KHM',1831722),(118,'KI','Kiribati','AUD','92533','KR','296','4.71957','-11.446881150186856','-150.215347','169.556137','Tarawa','Oceania','OC','811.0','en-KI,gil','KIR',4030945),(119,'KM','Comoros','KMF','773407','CN','174','-11.362381','-12.387857','44.538223','43.21579','Moroni','Africa','AF','2170.0','ar,fr-KM','COM',921929),(120,'KN','Saint Kitts and Nevis','XCD','51134','SC','659','17.420118','17.095343','-62.543266','-62.86956','Basseterre','North America','NA','261.0','en-KN','KNA',3575174),(121,'KP','North Korea','KPW','22912177','KN','408','43.006054','37.673332','130.674866','124.315887','Pyongyang','Asia','AS','120540.0','ko-KP','PRK',1873107),(122,'KR','South Korea','KRW','48422644','KS','410','38.5933891092225','33.1954102977009','129.583016157998','125.887442375577','Seoul','Asia','AS','98480.0','ko-KR,en','KOR',1835841),(123,'KW','Kuwait','KWD','2789132','KU','414','30.095945','28.524611','48.431473','46.555557','Kuwait City','Asia','AS','17820.0','ar-KW,en','KWT',285570),(124,'KY','Cayman Islands','KYD','44270','CJ','136','19.7617','19.263029','-79.727272','-81.432777','George Town','North America','NA','262.0','en-KY','CYM',3580718),(125,'KZ','Kazakhstan','KZT','15340000','KZ','398','55.451195','40.936333','87.312668','46.491859','Astana','Asia','AS','2717300.0','kk,ru','KAZ',1522867),(126,'LA','Laos','LAK','6368162','LA','418','22.500389','13.910027','107.697029','100.093056','Vientiane','Asia','AS','236800.0','lo,fr,en','LAO',1655842),(127,'LB','Lebanon','LBP','4125247','LE','422','34.691418','33.05386','36.639194','35.114277','Beirut','Asia','AS','10400.0','ar-LB,fr-LB,en,hy','LBN',272103),(128,'LC','Saint Lucia','XCD','160922','ST','662','14.110317287646','13.7072692224982','-60.8732306422271','-61.07995730159752','Castries','North America','NA','616.0','en-LC','LCA',3576468),(129,'LI','Liechtenstein','CHF','35000','LS','438','47.2706251386959','47.0484284123471','9.63564281136796','9.47167359782014','Vaduz','Europe','EU','160.0','de-LI','LIE',3042058),(130,'LK','Sri Lanka','LKR','21513990','CE','144','9.831361','5.916833','81.881279','79.652916','Colombo','Asia','AS','65610.0','si,ta,en','LKA',1227603),(131,'LR','Liberia','LRD','3685076','LI','430','8.551791','4.353057','-7.365113','-11.492083','Monrovia','Africa','AF','111370.0','en-LR','LBR',2275384),(132,'LS','Lesotho','LSL','1919552','LT','426','-28.5708','-30.6755750029999','29.4557099420001','27.011229998','Maseru','Africa','AF','30355.0','en-LS,st,zu,xh','LSO',932692),(133,'LT','Lithuania','EUR','2944459','LH','440','56.446918','53.901306','26.871944','20.941528','Vilnius','Europe','EU','65200.0','lt,ru,pl','LTU',597427),(134,'LU','Luxembourg','EUR','497538','LU','442','50.182772453796446','49.447858677765716','6.5308980672559525','5.735698938390786','Luxembourg','Europe','EU','2586.0','lb,de-LU,fr-LU','LUX',2960313),(135,'LV','Latvia','EUR','2217969','LG','428','58.0856982477268','55.6747774931332','28.2412717372783','20.9719557460935','Riga','Europe','EU','64589.0','lv,ru,lt','LVA',458258),(136,'LY','Libya','LYD','6461454','LY','434','33.168999','19.508045','25.150612','9.38702','Tripoli','Africa','AF','1759540.0','ar-LY,it,en','LBY',2215636),(137,'MA','Morocco','MAD','33848242','MO','504','35.9224966985384','27.662115','-0.991750000000025','-13.168586','Rabat','Africa','AF','446550.0','ar-MA,ber,fr','MAR',2542007),(138,'MC','Monaco','EUR','32965','MN','492','43.75196717037228','43.72472839869377','7.439939260482788','7.408962249755859','Monaco','Europe','EU','1.95','fr-MC,en,it','MCO',2993457),(139,'MD','Moldova','MDL','4324000','MD','498','48.490166','45.468887','30.135445','26.618944','Chişinău','Europe','EU','33843.0','ro,ru,gag,tr','MDA',617790),(140,'ME','Montenegro','EUR','666730','MJ','499','43.570137','41.850166','20.358833','18.461306','Podgorica','Europe','EU','14026.0','sr,hu,bs,sq,hr,rom','MNE',3194884),(141,'MF','Saint Martin','EUR','35925','RN','663','18.125295191246206','18.04717219103021','-63.01059106320133','-63.15036103890611','Marigot','North America','NA','53.0','fr','MAF',3578421),(142,'MG','Madagascar','MGA','21281844','MA','450','-11.945433','-25.608952','50.48378','43.224876','Antananarivo','Africa','AF','587040.0','fr-MG,mg','MDG',1062947),(143,'MH','Marshall Islands','USD','65859','RM','584','14.62','5.587639','171.931808','165.524918','Majuro','Oceania','OC','181.3','mh,en-MH','MHL',2080185),(144,'MK','Macedonia','MKD','2062294','MK','807','42.361805','40.860195','23.038139','20.464695','Skopje','Europe','EU','25333.0','mk,sq,tr,rmm,sr','MKD',718075),(145,'ML','Mali','XOF','13796354','ML','466','25.000002','10.159513','4.244968','-12.242614','Bamako','Africa','AF','1240000.0','fr-ML,bm','MLI',2453866),(146,'MM','Myanmar [Burma]','MMK','53414374','BM','104','28.543249','9.784583','101.176781','92.189278','Naypyitaw','Asia','AS','678500.0','my','MMR',1327865),(147,'MN','Mongolia','MNT','3086918','MG','496','52.154251','41.567638','119.924309','87.749664','Ulan Bator','Asia','AS','1565000.0','mn,ru','MNG',2029969),(148,'MO','Macao','MOP','449198','MC','446','22.222334','22.180389','113.565834','113.528946','Macao','Asia','AS','254.0','zh,zh-MO,pt','MAC',1821275),(149,'MP','Northern Mariana Islands','USD','53883','CQ','580','20.55344','14.11023','146.06528','144.88626','Saipan','Oceania','OC','477.0','fil,tl,zh,ch-MP,en-MP','MNP',4041468),(150,'MQ','Martinique','EUR','432900','MB','474','14.878819','14.392262','-60.81551','-61.230118','Fort-de-France','North America','NA','1100.0','fr-MQ','MTQ',3570311),(151,'MR','Mauritania','MRO','3205060','MR','478','27.298073','14.715547','-4.827674','-17.066521','Nouakchott','Africa','AF','1030700.0','ar-MR,fuc,snk,fr,mey,wo','MRT',2378080),(152,'MS','Montserrat','XCD','9341','MH','500','16.824060205313184','16.674768935441556','-62.144100129608205','-62.24138237036129','Plymouth','North America','NA','102.0','en-MS','MSR',3578097),(153,'MT','Malta','EUR','403000','MT','470','36.0821530995456','35.8061835000002','14.5764915000002','14.1834251000001','Valletta','Europe','EU','316.0','mt,en-MT','MLT',2562770),(154,'MU','Mauritius','MUR','1294104','MP','480','-10.319255','-20.525717','63.500179','56.512718','Port Louis','Africa','AF','2040.0','en-MU,bho,fr','MUS',934292),(155,'MV','Maldives','MVR','395650','MV','462','7.091587495414767','-0.692694','73.637276','72.693222','Malé','Asia','AS','300.0','dv,en','MDV',1282028),(156,'MW','Malawi','MWK','15447500','MI','454','-9.367541','-17.125','35.916821','32.67395','Lilongwe','Africa','AF','118480.0','ny,yao,tum,swk','MWI',927384),(157,'MX','Mexico','MXN','112468855','MX','484','32.716759','14.532866','-86.703392','-118.453949','Mexico City','North America','NA','1972550.0','es-MX','MEX',3996063),(158,'MY','Malaysia','MYR','28274729','MY','458','7.363417','0.855222','119.267502','99.643448','Kuala Lumpur','Asia','AS','329750.0','ms-MY,en,zh,ta,te,ml,pa,th','MYS',1733045),(159,'MZ','Mozambique','MZN','22061451','MZ','508','-10.471883','-26.868685','40.842995','30.217319','Maputo','Africa','AF','801590.0','pt-MZ,vmw','MOZ',1036973),(160,'NA','Namibia','NAD','2128471','WA','516','-16.959894','-28.97143','25.256701','11.71563','Windhoek','Africa','AF','825418.0','en-NA,af,de,hz,naq','NAM',3355338),(161,'NC','New Caledonia','XPF','216494','NC','540','-19.549778','-22.698','168.129135','163.564667','Noumea','Oceania','OC','19060.0','fr-NC','NCL',2139685),(162,'NE','Niger','XOF','15878271','NG','562','23.525026','11.696975','15.995643','0.16625','Niamey','Africa','AF','1267000.0','fr-NE,ha,kr,dje','NER',2440476),(163,'NF','Norfolk Island','AUD','1828','NF','574','-28.995170686948427','-29.063076742954735','167.99773740209957','167.91543230151365','Kingston','Oceania','OC','34.6','en-NF','NFK',2155115),(164,'NG','Nigeria','NGN','154000000','NI','566','13.892007','4.277144','14.680073','2.668432','Abuja','Africa','AF','923768.0','en-NG,ha,yo,ig,ff','NGA',2328926),(165,'NI','Nicaragua','NIO','5995928','NU','558','15.025909','10.707543','-82.738289','-87.690308','Managua','North America','NA','129494.0','es-NI,en','NIC',3617476),(166,'NL','Netherlands','EUR','16645000','NL','528','53.5157125645109','50.7503674993741','7.22749859212922','3.35837827202','Amsterdam','Europe','EU','41526.0','nl-NL,fy-NL','NLD',2750405),(167,'NO','Norway','NOK','5009150','NO','578','71.18811','57.977917','31.078052520751953','4.650167','Oslo','Europe','EU','324220.0','no,nb,nn,se,fi','NOR',3144096),(168,'NP','Nepal','NPR','28951852','NP','524','30.43339','26.356722','88.199333','80.056274','Kathmandu','Asia','AS','140800.0','ne,en','NPL',1282988),(169,'NR','Nauru','AUD','10065','NR','520','-0.504306','-0.552333','166.945282','166.899033','Yaren','Oceania','OC','21.0','na,en-NR','NRU',2110425),(170,'NU','Niue','NZD','2166','NE','570','-18.951069','-19.152193','-169.775177','-169.951004','Alofi','Oceania','OC','260.0','niu,en-NU','NIU',4036232),(171,'NZ','New Zealand','NZD','4252277','NZ','554','-34.389668','-47.286026','-180','166.7155','Wellington','Oceania','OC','268680.0','en-NZ,mi','NZL',2186224),(172,'OM','Oman','OMR','2967717','MU','512','26.387972','16.64575','59.836582','51.882','Muscat','Asia','AS','212460.0','ar-OM,en,bal,ur','OMN',286963),(173,'PA','Panama','PAB','3410676','PM','591','9.637514','7.197906','-77.17411','-83.051445','Panama City','North America','NA','78200.0','es-PA,en','PAN',3703430),(174,'PE','Peru','PEN','29907003','PE','604','-0.012977','-18.349728','-68.677986','-81.326744','Lima','South America','SA','1285220.0','es-PE,qu,ay','PER',3932488),(175,'PF','French Polynesia','XPF','270485','FP','258','-7.903573','-27.653572','-134.929825','-152.877167','Papeete','Oceania','OC','4167.0','fr-PF,ty','PYF',4030656),(176,'PG','Papua New Guinea','PGK','6064515','PP','598','-1.318639','-11.657861','155.96344','140.842865','Port Moresby','Oceania','OC','462840.0','en-PG,ho,meu,tpi','PNG',2088628),(177,'PH','Philippines','PHP','99900177','RP','608','21.1218854788318','4.64209796365014','126.60497402182328','116.9288644959','Manila','Asia','AS','300000.0','tl,en-PH,fil,ceb,tgl,ilo,hil,war,pam,bik,bcl,pag,mrw,tsg,mdh,cbk,krj,sgd,msb,akl,ibg,yka,mta,abx','PHL',1694008),(178,'PK','Pakistan','PKR','184404791','PK','586','37.097','23.786722','77.840919','60.878613','Islamabad','Asia','AS','803940.0','ur-PK,en-PK,pa,sd,ps,brh','PAK',1168579),(179,'PL','Poland','PLN','38500000','PL','616','54.839138','49.006363','24.150749','14.123','Warsaw','Europe','EU','312685.0','pl','POL',798544),(180,'PM','Saint Pierre and Miquelon','EUR','7012','SB','666','47.14376802942701','46.78264970849848','-56.1253298443454','-56.40709223087083','Saint-Pierre','North America','NA','242.0','fr-PM','SPM',3424932),(181,'PN','Pitcairn Islands','NZD','46','PC','612','-24.3299386198549','-24.672565','-124.77285','-128.35699011119425','Adamstown','Oceania','OC','47.0','en-PN','PCN',4030699),(182,'PR','Puerto Rico','USD','3916632','RQ','630','18.520166','17.926405','-65.242737','-67.942726','San Juan','North America','NA','9104.0','en-PR,es-PR','PRI',4566966),(183,'PS','Palestine','ILS','3800000','WE','275','32.54638671875','31.216541290283203','35.5732955932617','34.21665954589844','','Asia','AS','5970.0','ar-PS','PSE',6254930),(184,'PT','Portugal','EUR','10676000','PO','620','42.154311127408','36.96125','-6.18915930748288','-9.50052660716588','Lisbon','Europe','EU','92391.0','pt-PT,mwl','PRT',2264397),(185,'PW','Palau','USD','19907','PS','585','8.46966','2.8036','134.72307','131.11788','Melekeok','Oceania','OC','458.0','pau,sov,en-PW,tox,ja,fil,zh','PLW',1559582),(186,'PY','Paraguay','PYG','6375830','PA','600','-19.294041','-27.608738','-54.259354','-62.647076','Asunción','South America','SA','406750.0','es-PY,gn','PRY',3437598),(187,'QA','Qatar','QAR','840926','QA','634','26.154722','24.482944','51.636639','50.757221','Doha','Asia','AS','11437.0','ar-QA,es','QAT',289688),(188,'RE','Réunion','EUR','776948','RE','638','-20.868391324576944','-21.383747301469107','55.838193901930026','55.21219224792685','Saint-Denis','Africa','AF','2517.0','fr-RE','REU',935317),(189,'RO','Romania','RON','21959278','RO','642','48.2653912058468','43.6190166499833','29.7152986907701','20.2619949052262','Bucharest','Europe','EU','237500.0','ro,hu,rom','ROU',798549),(190,'RS','Serbia','RSD','7344847','RI','688','46.18138885498047','42.232215881347656','23.00499725341797','18.817020416259766','Belgrade','Europe','EU','88361.0','sr,hu,bs,rom','SRB',6290252),(191,'RU','Russia','RUB','140702000','RS','643','81.857361','41.188862','-169.05','19.25','Moscow','Europe','EU','1.71E7','ru,tt,xal,cau,ady,kv,ce,tyv,cv,udm,tut,mns,bua,myv,mdf,chm,ba,inh,tut,kbd,krc,ava,sah,nog','RUS',2017370),(192,'RW','Rwanda','RWF','11055976','RW','646','-1.04716670707785','-2.84023010213747','30.8997466415943','28.8617308206209','Kigali','Africa','AF','26338.0','rw,en-RW,fr-RW,sw','RWA',49518),(193,'SA','Saudi Arabia','SAR','25731776','SA','682','32.158333','15.61425','55.666584','34.495693','Riyadh','Asia','AS','1960582.0','ar-SA','SAU',102358),(194,'SB','Solomon Islands','SBD','559198','BP','090','-6.589611','-11.850555','166.980865','155.508606','Honiara','Oceania','OC','28450.0','en-SB,tpi','SLB',2103350),(195,'SC','Seychelles','SCR','88340','SE','690','-4.283717','-9.753867','56.29770287937299','46.204769','Victoria','Africa','AF','455.0','en-SC,fr-SC','SYC',241170),(196,'SD','Sudan','SDG','35000000','SU','729','22.232219696044922','8.684720993041992','38.60749816894531','21.827774047851562','Khartoum','Africa','AF','1861484.0','ar-SD,en,fia','SDN',366755),(197,'SE','Sweden','SEK','9828655','SW','752','69.0599672666879','55.3374438220002','24.155245238099','11.109499387126','Stockholm','Europe','EU','449964.0','sv-SE,se,sma,fi-SE','SWE',2661886),(198,'SG','Singapore','SGD','4701069','SN','702','1.471278','1.258556','104.007469','103.638275','Singapore','Asia','AS','692.7','cmn,en-SG,ms-SG,ta-SG,zh-SG','SGP',1880251),(199,'SH','Saint Helena','SHP','7460','SH','654','-7.887815','-16.019543','-5.638753','-14.42123','Jamestown','Africa','AF','410.0','en-SH','SHN',3370751),(200,'SI','Slovenia','EUR','2007000','SI','705','46.8766275518195','45.421812998164','16.6106311807','13.3753342064709','Ljubljana','Europe','EU','20273.0','sl,sh','SVN',3190538),(201,'SJ','Svalbard and Jan Mayen','NOK','2550','SV','744','80.762085','79.220306','33.287334','17.699389','Longyearbyen','Europe','EU','62049.0','no,ru','SJM',607072),(202,'SK','Slovakia','EUR','5455000','LO','703','49.603168','47.728111','22.570444','16.84775','Bratislava','Europe','EU','48845.0','sk,hu','SVK',3057568),(203,'SL','Sierra Leone','SLL','5245695','SL','694','10','6.929611','-10.284238','-13.307631','Freetown','Africa','AF','71740.0','en-SL,men,tem','SLE',2403846),(204,'SM','San Marino','EUR','31477','SM','674','43.9920929668161','43.8937002210188','12.5158490454421','12.403605260165','San Marino','Europe','EU','61.2','it-SM','SMR',3168068),(205,'SN','Senegal','XOF','12323252','SG','686','16.691633','12.307275','-11.355887','-17.535236','Dakar','Africa','AF','196190.0','fr-SN,wo,fuc,mnk','SEN',2245662),(206,'SO','Somalia','SOS','10112453','SO','706','11.979166','-1.674868','51.412636','40.986595','Mogadishu','Africa','AF','637657.0','so-SO,ar-SO,it,en-SO','SOM',51537),(207,'SR','Suriname','SRD','492829','NS','740','6.004546','1.831145','-53.977493','-58.086563','Paramaribo','South America','SA','163270.0','nl-SR,en,srn,hns,jv','SUR',3382998),(208,'SS','South Sudan','SSP','8260490','OD','728','12.219148635864258','3.493394374847412','35.9405517578125','24.140274047851562','Juba','Africa','AF','644329.0','en','SSD',7909807),(209,'ST','São Tomé and Príncipe','STD','175808','TP','678','1.701323','0.024766','7.466374','6.47017','São Tomé','Africa','AF','1001.0','pt-ST','STP',2410758),(210,'SV','El Salvador','USD','6052064','ES','222','14.445067','13.148679','-87.692162','-90.128662','San Salvador','North America','NA','21040.0','es-SV','SLV',3585968),(211,'SX','Sint Maarten','ANG','37429','NN','534','18.065188278978088','18.006632279377143','-63.0104194322962','-63.14146165934278','Philipsburg','North America','NA','21.0','nl,en','SXM',7609695),(212,'SY','Syria','SYP','22198110','SY','760','37.319138','32.310665','42.385029','35.727222','Damascus','Asia','AS','185180.0','ar-SY,ku,hy,arc,fr,en','SYR',163843),(213,'SZ','Swaziland','SZL','1354051','WZ','748','-25.719648','-27.317101','32.13726','30.794107','Mbabane','Africa','AF','17363.0','en-SZ,ss-SZ','SWZ',934841),(214,'TC','Turks and Caicos Islands','USD','20556','TK','796','21.961878','21.422626','-71.123642','-72.483871','Cockburn Town','North America','NA','430.0','en-TC','TCA',3576916),(215,'TD','Chad','XAF','10543464','CD','148','23.450369','7.441068','24.002661','13.473475','N\'Djamena','Africa','AF','1284000.0','fr-TD,ar-TD,sre','TCD',2434508),(216,'TF','French Southern Territories','EUR','140','FS','260','-37.790722','-49.735184','77.598808','50.170258','Port-aux-Français','Antarctica','AN','7829.0','fr','ATF',1546748),(217,'TG','Togo','XOF','6587239','TO','768','11.138977','6.104417','1.806693','-0.147324','Lomé','Africa','AF','56785.0','fr-TG,ee,hna,kbp,dag,ha','TGO',2363686),(218,'TH','Thailand','THB','67089500','TH','764','20.463194','5.61','105.639389','97.345642','Bangkok','Asia','AS','514000.0','th,en','THA',1605651),(219,'TJ','Tajikistan','TJS','7487489','TI','762','41.042252','36.674137','75.137222','67.387138','Dushanbe','Asia','AS','143100.0','tg,ru','TJK',1220409),(220,'TK','Tokelau','NZD','1466','TL','772','-8.553613662719727','-9.381111145019531','-171.21142578125','-172.50033569335938','','Oceania','OC','10.0','tkl,en-TK','TKL',4031074),(221,'TL','East Timor','USD','1154625','TT','626','-8.12687015533447','-9.504650115966797','127.34211730957031','124.04464721679688','Dili','Oceania','OC','15007.0','tet,pt-TL,id,en','TLS',1966436),(222,'TM','Turkmenistan','TMT','4940916','TX','795','42.795555','35.141083','66.684303','52.441444','Ashgabat','Asia','AS','488100.0','tk,ru,uz','TKM',1218197),(223,'TN','Tunisia','TND','10589025','TS','788','37.543915','30.240417','11.598278','7.524833','Tunis','Africa','AF','163610.0','ar-TN,fr','TUN',2464461),(224,'TO','Tonga','TOP','122580','TN','776','-15.562988','-21.455057','-173.907578','-175.682266','Nuku\'alofa','Oceania','OC','748.0','to,en-TO','TON',4032283),(225,'TR','Turkey','TRY','77804122','TU','792','42.107613','35.815418','44.834999','25.668501','Ankara','Asia','AS','780580.0','tr-TR,ku,diq,az,av','TUR',298795),(226,'TT','Trinidad and Tobago','TTD','1328019','TD','780','11.338342','10.036105','-60.517933','-61.923771','Port of Spain','North America','NA','5128.0','en-TT,hns,fr,es,zh','TTO',3573591),(227,'TV','Tuvalu','AUD','10472','TV','798','-5.641972','-10.801169','179.863281','176.064865','Funafuti','Oceania','OC','26.0','tvl,en,sm,gil','TUV',2110297),(228,'TW','Taiwan','TWD','22894384','TW','158','25.3002899036181','21.896606934717','122.006739823315','119.534691','Taipei','Asia','AS','35980.0','zh-TW,zh,nan,hak','TWN',1668284),(229,'TZ','Tanzania','TZS','41892895','TZ','834','-0.990736','-11.745696','40.443222','29.327168','Dodoma','Africa','AF','945087.0','sw-TZ,en,ar','TZA',149590),(230,'UA','Ukraine','UAH','45415596','UP','804','52.369362','44.390415','40.20739','22.128889','Kiev','Europe','EU','603700.0','uk,ru-UA,rom,pl,hu','UKR',690791),(231,'UG','Uganda','UGX','33398682','UG','800','4.23136926690327','-1.48153052848838','35.0010535324228','29.573465338129','Kampala','Africa','AF','236040.0','en-UG,lg,sw,ar','UGA',226074),(232,'UM','U.S. Minor Outlying Islands','USD','0','','581','28.219814','-0.389006','166.654526','-177.392029','','Oceania','OC','0.0','en-UM','UMI',5854968),(233,'US','United States','USD','310232863','US','840','49.388611','24.544245','-66.954811','-124.733253','Washington','North America','NA','9629091.0','en-US,es-US,haw,fr','USA',6252001),(234,'UY','Uruguay','UYU','3477000','UY','858','-30.082224','-34.980816','-53.073933','-58.442722','Montevideo','South America','SA','176220.0','es-UY','URY',3439705),(235,'UZ','Uzbekistan','UZS','27865738','UZ','860','45.575001','37.184444','73.132278','55.996639','Tashkent','Asia','AS','447400.0','uz,ru,tg','UZB',1512440),(236,'VA','Vatican City','EUR','921','VT','336','41.90743830885576','41.90027960306854','12.45837546629481','12.44570678169205','Vatican City','Europe','EU','0.44','la,it,fr','VAT',3164670),(237,'VC','Saint Vincent and the Grenadines','XCD','104217','VC','670','13.377834','12.583984810969037','-61.11388','-61.46090317727658','Kingstown','North America','NA','389.0','en-VC,fr','VCT',3577815),(238,'VE','Venezuela','VEF','27223228','VE','862','12.201903','0.626311','-59.80378','-73.354073','Caracas','South America','SA','912050.0','es-VE','VEN',3625428),(239,'VG','British Virgin Islands','USD','21730','VI','092','18.757221','18.383710898211305','-64.268768','-64.71312752730364','Road Town','North America','NA','153.0','en-VG','VGB',3577718),(240,'VI','U.S. Virgin Islands','USD','108708','VQ','850','18.415382','17.673931','-64.565193','-65.101333','Charlotte Amalie','North America','NA','352.0','en-VI','VIR',4796775),(241,'VN','Vietnam','VND','89571130','VM','704','23.388834','8.559611','109.464638','102.148224','Hanoi','Asia','AS','329560.0','vi,en,fr,zh,km','VNM',1562822),(242,'VU','Vanuatu','VUV','221552','NH','548','-13.073444','-20.248945','169.904785','166.524979','Port Vila','Oceania','OC','12200.0','bi,en-VU,fr-VU','VUT',2134431),(243,'WF','Wallis and Futuna','XPF','16025','WF','876','-13.216758181061444','-14.314559989820843','-176.16174317718253','-178.1848112896414','Mata-Utu','Oceania','OC','274.0','wls,fud,fr-WF','WLF',4034749),(244,'WS','Samoa','WST','192001','WS','882','-13.432207','-14.040939','-171.415741','-172.798599','Apia','Oceania','OC','2944.0','sm,en-WS','WSM',4034894),(245,'XK','Kosovo','EUR','1800000','KV','0','43.2682495807952','41.856369601859925','21.80335088694943','19.977481504492914','Pristina','Europe','EU','10908.0','sq,sr','XKX',831053),(246,'YE','Yemen','YER','23495361','YM','887','18.9999989031009','12.1110910264462','54.5305388163283','42.5325394314234','Sanaa','Asia','AS','527970.0','ar-YE','YEM',69543),(247,'YT','Mayotte','EUR','159042','MF','175','-12.648891','-13.000132','45.29295','45.03796','Mamoudzou','Africa','AF','374.0','fr-YT','MYT',1024031),(248,'ZA','South Africa','ZAR','49000000','SF','710','-22.1250300579999','-34.8341700029999','32.944984945','16.45189','Pretoria','Africa','AF','1219912.0','zu,xh,af,nso,en-ZA,tn,st,ts,ss,ve,nr','ZAF',953987),(249,'ZM','Zambia','ZMW','13460305','ZA','894','-8.22436','-18.079473','33.705704','21.999371','Lusaka','Africa','AF','752614.0','en-ZM,bem,loz,lun,lue,ny,toi','ZMB',895949),(250,'ZW','Zimbabwe','ZWL','13061000','ZI','716','-15.608835','-22.417738','33.056305','25.237028','Harare','Africa','AF','390580.0','en-ZW,sn,nr,nd','ZWE',878675);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon_translations`
--

DROP TABLE IF EXISTS `coupon_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupon_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon_translations`
--

LOCK TABLES `coupon_translations` WRITE;
/*!40000 ALTER TABLE `coupon_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupon_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `unit` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `used_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `limit_used_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `limit_used_amount` smallint(5) unsigned NOT NULL DEFAULT '0',
  `used_amount` smallint(5) unsigned NOT NULL DEFAULT '0',
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(355) COLLATE utf8_unicode_ci NOT NULL,
  `rate` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `currency` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'USD','','1','$',1,'2020-02-27 07:22:06','2020-02-28 08:33:33');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_categories`
--

DROP TABLE IF EXISTS `document_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_categories`
--

LOCK TABLES `document_categories` WRITE;
/*!40000 ALTER TABLE `document_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_categories_translations`
--

DROP TABLE IF EXISTS `document_categories_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_categories_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_categories_translations`
--

LOCK TABLES `document_categories_translations` WRITE;
/*!40000 ALTER TABLE `document_categories_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_categories_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_translations`
--

DROP TABLE IF EXISTS `document_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_translations`
--

LOCK TABLES `document_translations` WRITE;
/*!40000 ALTER TABLE `document_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents_roles`
--

DROP TABLE IF EXISTS `documents_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents_roles`
--

LOCK TABLES `documents_roles` WRITE;
/*!40000 ALTER TABLE `documents_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail_category_id` int(11) NOT NULL,
  `sendmail` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (1,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,'email','name',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,'123@gmail.com','123',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,'acb@gmail.com','acb',1,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_categories`
--

DROP TABLE IF EXISTS `faq_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `allowed_fields` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_categories`
--

LOCK TABLES `faq_categories` WRITE;
/*!40000 ALTER TABLE `faq_categories` DISABLE KEYS */;
INSERT INTO `faq_categories` VALUES (1,NULL,'','','a7e64650-ef29-43e7-b058-0705e78e19c3',0,1,1,2,'2020-03-09 04:11:51','2021-05-10 18:06:16',NULL);
/*!40000 ALTER TABLE `faq_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_categories_translations`
--

DROP TABLE IF EXISTS `faq_categories_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_categories_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_categories_translations`
--

LOCK TABLES `faq_categories_translations` WRITE;
/*!40000 ALTER TABLE `faq_categories_translations` DISABLE KEYS */;
INSERT INTO `faq_categories_translations` VALUES (1,'en','FaqCategories',1,'title','FAQs'),(2,'en','FaqCategories',1,'slug','faqs'),(3,'en','FaqCategories',1,'description',''),(4,'en','FaqCategories',1,'keyword','');
/*!40000 ALTER TABLE `faq_categories_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_translations`
--

DROP TABLE IF EXISTS `faq_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_translations`
--

LOCK TABLES `faq_translations` WRITE;
/*!40000 ALTER TABLE `faq_translations` DISABLE KEYS */;
INSERT INTO `faq_translations` VALUES (1,'en','Faqs',1,'title','a. Are the kits EUA/FDA approved for home/self-collect?'),(2,'en','Faqs',1,'slug','a-are-the-kits-eua-fda-approved-for-home-self-collect'),(3,'en','Faqs',1,'slug_custom',''),(4,'en','Faqs',1,'description','You can see our EUA here: https://www.fda.gov/media/138295/download, https://www.fda.gov/media/138293/download'),(5,'en','Faqs',1,'content','YES'),(6,'en','Faqs',2,'title','b. What platform is used?'),(7,'en','Faqs',2,'slug','b-what-platform-is-used'),(8,'en','Faqs',2,'slug_custom',''),(9,'en','Faqs',2,'description','QuantStudio5, ThermoFisher'),(10,'en','Faqs',2,'content','None'),(11,'en','Faqs',3,'title','c. Can you please share updated data on user error rates for the tests?'),(12,'en','Faqs',3,'slug','c-can-you-please-share-updated-data-on-user-error-rates-for-the-tests'),(13,'en','Faqs',3,'slug_custom',''),(14,'en','Faqs',3,'description','User error rates are less than 1%'),(15,'en','Faqs',3,'content','None'),(16,'en','Faqs',4,'title','d. Can you share any data on sensitivity/specificity using the overall process (self-collection and PCR testing)? '),(17,'en','Faqs',4,'slug','d-can-you-share-any-data-on-sensitivity-specificity-using-the-overall-process-self-collection-and-pcr-testing'),(18,'en','Faqs',4,'slug_custom',''),(19,'en','Faqs',4,'description','99% and 98%, respectively'),(20,'en','Faqs',4,'content','None'),(21,'en','Faqs',5,'title','e. Can your team direct ship to participants nationwide?'),(22,'en','Faqs',5,'slug','e-can-your-team-direct-ship-to-participants-nationwide'),(23,'en','Faqs',5,'slug_custom',''),(24,'en','Faqs',5,'description',''),(25,'en','Faqs',5,'content','YES'),(26,'en','Faqs',6,'title','f. Turnaround time on results?'),(27,'en','Faqs',6,'slug','f-turnaround-time-on-results'),(28,'en','Faqs',6,'slug_custom',''),(29,'en','Faqs',6,'description','48-72 hours'),(30,'en','Faqs',6,'content','None'),(33,'en','Faqs',7,'slug_custom','');
/*!40000 ALTER TABLE `faq_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `sort` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'1',1,'','850ee8c5-aa54-420e-a0c5-b202aeb30183',NULL,1,NULL,0,NULL,1,0,0,NULL,0,'2020-03-09 04:18:55','2021-05-10 18:09:16'),(2,'1',1,NULL,'14c0630f-b1fc-4cd3-af20-d01f1f82f3b0',NULL,1,NULL,0,NULL,1,0,0,NULL,0,'2021-05-10 18:09:47','2021-05-10 18:09:49'),(3,'1',1,NULL,'3f509ce7-1e76-4a58-ae38-a41f43660f79',NULL,1,NULL,0,NULL,1,0,0,NULL,0,'2021-05-10 18:10:22','2021-05-10 18:10:24'),(4,'1',1,NULL,'75039e84-995a-4e13-89a1-21dbce038ad1',NULL,1,NULL,0,NULL,1,0,0,NULL,0,'2021-05-10 18:10:49','2021-05-10 18:10:49'),(5,'1',1,NULL,'3ea4dd14-4039-4e5f-b699-4b6c4e7a2287',NULL,1,NULL,0,NULL,1,0,0,NULL,0,'2021-05-10 18:11:07','2021-05-10 18:11:07'),(6,'1',1,NULL,'c9165141-a215-4b7f-aabc-b6c69ffa70f2',NULL,1,NULL,0,NULL,1,0,0,NULL,0,'2021-05-10 18:11:32','2021-05-11 18:00:10');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `i18n`
--

DROP TABLE IF EXISTS `i18n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `i18n` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  KEY `I18N_FIELD` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `i18n`
--

LOCK TABLES `i18n` WRITE;
/*!40000 ALTER TABLE `i18n` DISABLE KEYS */;
/*!40000 ALTER TABLE `i18n` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `def` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(355) COLLATE utf8_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES ('en','eng','English','english.png','260caaf3-c44f-4e7d-85e7-a521984e5557',1,'2014-01-24 15:22:49','2020-02-27 04:17:20');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_categories`
--

DROP TABLE IF EXISTS `mail_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `allowed_fields` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_categories`
--

LOCK TABLES `mail_categories` WRITE;
/*!40000 ALTER TABLE `mail_categories` DISABLE KEYS */;
INSERT INTO `mail_categories` VALUES (1,NULL,'Email list','','','52304304-aa6c-4de2-b8b7-2ccabed3cb77',0,1,1,2,'2020-03-04 04:16:33','2020-03-04 10:22:00',NULL);
/*!40000 ALTER TABLE `mail_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails`
--

DROP TABLE IF EXISTS `mails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delay` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `has_sent` int(11) NOT NULL DEFAULT '0',
  `count_mail` int(11) NOT NULL DEFAULT '0',
  `stop` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `home` tinyint(4) NOT NULL DEFAULT '0',
  `featured` tinyint(4) NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_port` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_smtpsecure` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails`
--

LOCK TABLES `mails` WRITE;
/*!40000 ALTER TABLE `mails` DISABLE KEYS */;
INSERT INTO `mails` VALUES (1,1,1,60,'','[TNCL] Digital Creative Agency','<h2>&nbsp;</h2><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td></tr></tbody></table></figure>',0,24,0,0,1,0,0,'3','','','1','2','2020-03-04 07:04:03','2020-12-24 16:49:25');
/*!40000 ALTER TABLE `mails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `has_read` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletters`
--

LOCK TABLES `newsletters` WRITE;
/*!40000 ALTER TABLE `newsletters` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (39,14,12,'a:1:{s:4:\"size\";a:2:{s:4:\"name\";s:4:\"Size\";s:5:\"value\";s:1:\"L\";}}',2,54000000,'2019-11-19 08:18:31','2019-11-19 08:18:31'),(40,15,1,'a:1:{s:4:\"size\";a:2:{s:4:\"name\";s:4:\"Size\";s:5:\"value\";s:1:\"L\";}}',2,54000000,'2019-11-19 08:19:12','2019-11-19 08:19:12'),(41,16,12,'a:1:{s:4:\"size\";a:2:{s:4:\"name\";s:4:\"Size\";s:5:\"value\";s:1:\"L\";}}',2,54000000,'2019-11-19 08:47:33','2019-11-19 08:47:33'),(42,17,1,'a:1:{s:4:\"size\";a:2:{s:4:\"name\";s:4:\"Size\";s:5:\"value\";s:1:\"L\";}}',1,27000000,'2019-11-19 08:47:59','2019-11-19 08:47:59'),(43,18,1,'a:1:{s:4:\"size\";a:2:{s:4:\"name\";s:4:\"Size\";s:5:\"value\";s:1:\"L\";}}',1,27000000,'2019-11-19 08:49:15','2019-11-19 08:49:15'),(44,19,1,'a:1:{s:4:\"size\";a:2:{s:4:\"name\";s:4:\"Size\";s:5:\"value\";s:1:\"L\";}}',1,27000000,'2019-11-19 08:50:24','2019-11-19 08:50:24'),(45,20,1,'a:1:{s:4:\"size\";a:2:{s:4:\"name\";s:4:\"Size\";s:5:\"value\";s:1:\"L\";}}',1,27000000,'2019-11-20 04:41:18','2019-11-20 04:41:18'),(46,23,1,'a:1:{s:4:\"size\";a:2:{s:4:\"name\";s:4:\"Size\";s:5:\"value\";s:1:\"L\";}}',1,27000000,'2019-11-24 03:45:53','2019-11-24 03:45:53');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT '0',
  `currency` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` float DEFAULT '1',
  `status` int(1) DEFAULT '1',
  `full_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_method` int(1) DEFAULT NULL,
  `shipping_method` int(1) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_cost` int(11) DEFAULT '0',
  `transaction_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` int(2) DEFAULT NULL,
  `user_points` int(11) DEFAULT NULL,
  `ref_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_type` int(2) DEFAULT NULL,
  `error_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_read` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_categories`
--

DROP TABLE IF EXISTS `page_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `allowed_fields` text COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_categories`
--

LOCK TABLES `page_categories` WRITE;
/*!40000 ALTER TABLE `page_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_categories_translations`
--

DROP TABLE IF EXISTS `page_categories_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_categories_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_categories_translations`
--

LOCK TABLES `page_categories_translations` WRITE;
/*!40000 ALTER TABLE `page_categories_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_categories_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_translations`
--

DROP TABLE IF EXISTS `page_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_translations`
--

LOCK TABLES `page_translations` WRITE;
/*!40000 ALTER TABLE `page_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phinxlog`
--

LOCK TABLES `phinxlog` WRITE;
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;
INSERT INTO `phinxlog` VALUES (20190411145537,'Initial','2019-04-11 07:55:37','2019-04-11 07:55:37',0),(20190421103510,'Initial','2019-04-21 03:35:11','2019-04-21 03:35:11',0);
/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `allowed_fields` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories_translations`
--

DROP TABLE IF EXISTS `product_categories_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories_translations`
--

LOCK TABLES `product_categories_translations` WRITE;
/*!40000 ALTER TABLE `product_categories_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_categories_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_translations`
--

DROP TABLE IF EXISTS `product_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_translations`
--

LOCK TABLES `product_translations` WRITE;
/*!40000 ALTER TABLE `product_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_image` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `url_images` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(10) unsigned NOT NULL DEFAULT '0',
  `percent` int(10) unsigned NOT NULL DEFAULT '0',
  `place` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_s` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '1',
  `comment_count` int(11) DEFAULT NULL,
  `allow_comment` int(11) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `home` tinyint(1) DEFAULT '0',
  `featured` tinyint(1) DEFAULT '0',
  `tag` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_categories`
--

DROP TABLE IF EXISTS `products_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_categories`
--

LOCK TABLES `products_categories` WRITE;
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_tags`
--

DROP TABLE IF EXISTS `products_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_tags`
--

LOCK TABLES `products_tags` WRITE;
/*!40000 ALTER TABLE `products_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `permissions` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','admin','red','Admin',1,NULL,'2019-04-20 01:17:16','2019-04-21 09:15:34'),(2,'Manage','manage','green','Manage',1,'{\"AlbumCategories\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Albums\":{\"index\":\"1\",\"jRemoveImage\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"ArticleCategories\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"sort\":\"1\"},\"Articles\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"AttributeValues\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Attributes\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"BannerCategories\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Banners\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Brands\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"sort\":\"1\"},\"Contacts\":{\"index\":\"1\",\"delete\":\"1\",\"exportExcel\":\"1\"},\"Currencies\":{\"index\":\"1\",\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"DocumentCategories\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Documents\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"FaqCategories\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Faqs\":{\"index\":\"1\",\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Languages\":{\"index\":\"1\",\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"translates\":\"1\"},\"MailCategories\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"sort\":\"1\"},\"Mails\":{\"smtp\":\"1\",\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Newsletters\":{\"index\":\"1\",\"delete\":\"1\",\"exportExcel\":\"1\"},\"Orders\":{\"index\":\"1\",\"view\":\"1\",\"changeStatus\":\"1\",\"delete\":\"1\",\"exportExcel\":\"1\"},\"PageCategories\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Pages\":{\"dashboard\":\"1\",\"search\":\"1\",\"index\":\"1\",\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Pos\":{\"index\":\"1\",\"edit\":\"1\",\"main\":\"1\"},\"ProductCategories\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"sort\":\"1\"},\"Products\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"checkCode\":\"0\"},\"Roles\":{\"index\":\"1\",\"permission\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Settings\":{\"edit\":\"1\"},\"Users\":{\"index\":\"1\",\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"login\":\"1\",\"emailLogin\":\"1\",\"logout\":\"1\",\"exportExcel\":\"1\"}}','2019-04-20 01:17:16','2020-03-11 16:59:07'),(3,'User','user','#c24e4e','User',1,'{\"AlbumCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Albums\":{\"index\":\"0\",\"jRemoveImage\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"ArticleCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"sort\":\"0\"},\"Articles\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"AttributeValues\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Attributes\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"BannerCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Banners\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Brands\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"sort\":\"0\"},\"Contacts\":{\"index\":\"0\",\"delete\":\"0\",\"exportExcel\":\"0\"},\"Currencies\":{\"index\":\"0\",\"view\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"DocumentCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Documents\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"FaqCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Faqs\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Languages\":{\"index\":\"0\",\"view\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"translates\":\"0\"},\"MailCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"sort\":\"0\"},\"Mails\":{\"smtp\":\"0\",\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Newsletters\":{\"index\":\"0\",\"delete\":\"0\",\"exportExcel\":\"0\"},\"Orders\":{\"index\":\"0\",\"view\":\"0\",\"changeStatus\":\"0\",\"delete\":\"0\",\"exportExcel\":\"0\"},\"PageCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Pages\":{\"display\":\"0\",\"dashboard\":\"0\",\"search\":\"0\",\"index\":\"0\",\"view\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Pos\":{\"index\":\"0\",\"edit\":\"0\",\"main\":\"0\"},\"ProductCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"sort\":\"0\"},\"Products\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"checkCode\":\"0\"},\"Roles\":{\"index\":\"0\",\"permission\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Settings\":{\"edit\":\"0\"},\"Users\":{\"index\":\"0\",\"view\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"login\":\"0\",\"emailLogin\":\"0\",\"logout\":\"0\",\"exportExcel\":\"0\"}}','2019-09-30 10:11:47','2020-03-05 03:37:48'),(4,'Editor','editor','','',1,'{\"AlbumCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Albums\":{\"index\":\"1\",\"jRemoveImage\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"ArticleCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"sort\":\"0\"},\"Articles\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"AttributeValues\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Attributes\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"BannerCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Banners\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Brands\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"sort\":\"0\"},\"Contacts\":{\"index\":\"0\",\"delete\":\"0\",\"exportExcel\":\"0\"},\"Currencies\":{\"index\":\"0\",\"view\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"DocumentCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Documents\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"FaqCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Faqs\":{\"index\":\"1\",\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"Languages\":{\"index\":\"0\",\"view\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"translates\":\"0\"},\"MailCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"sort\":\"0\"},\"Mails\":{\"smtp\":\"0\",\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Newsletters\":{\"index\":\"0\",\"delete\":\"0\",\"exportExcel\":\"0\"},\"Orders\":{\"index\":\"0\",\"view\":\"0\",\"changeStatus\":\"0\",\"delete\":\"0\",\"exportExcel\":\"0\"},\"PageCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Pages\":{\"dashboard\":\"1\",\"search\":\"0\",\"index\":\"0\",\"view\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Pos\":{\"index\":\"0\",\"edit\":\"0\",\"main\":\"0\"},\"ProductCategories\":{\"index\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"sort\":\"0\"},\"Products\":{\"index\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"checkCode\":\"0\"},\"Roles\":{\"index\":\"0\",\"permission\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\"},\"Settings\":{\"edit\":\"0\"},\"Users\":{\"index\":\"0\",\"view\":\"0\",\"add\":\"0\",\"edit\":\"0\",\"delete\":\"0\",\"login\":\"0\",\"emailLogin\":\"0\",\"logout\":\"0\",\"exportExcel\":\"0\"}}','2020-03-05 09:21:53','2020-03-11 15:53:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` char(40) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data` blob,
  `expires` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('0483t4hrriedb27kim5m7gh642','2021-10-14 08:33:37','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1634200423;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:233;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2021-10-14 14:45:46.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}',1634286823),('06gjod6csjqr0cul9tsn232ld2','2021-05-24 07:39:08','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1621846178;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}',1621932578),('24g8deqbcjlbeekdk9ra079mi7','2021-07-13 08:46:37','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1626165998;}Flash|a:0:{}',1626252398),('2q7r5iou618u61ot2m8ichtqb7','2021-05-20 23:16:14','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1621552942;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}',1621639342),('3lgs7kcnrl23vgt936vu3veo65','2021-05-31 11:56:23','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1622641359;}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}Flash|a:0:{}',1622727759),('59d19h5nbrt0nkfrl7s718oeo1','2021-09-28 02:56:59','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1632797819;}Flash|a:0:{}',1632884219),('6hjmgru9006i3pvbaro8q118f4','2021-07-13 08:46:30','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1626165991;}Flash|a:0:{}',1626252391),('7faaau542br13u3bomlo111o43','2021-05-27 14:55:33','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1622127334;}Flash|a:0:{}Auth|a:0:{}',1622213734),('7qbvatc403r9lbvp22ccbktrh6','2021-05-20 20:03:31','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1621541075;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}',1621627475),('7sdtoal4fqiq7bfevnoo8gsqh2','2021-06-02 22:12:27','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1622671947;}Flash|a:0:{}',1622758348),('8k29aa4g6nrepmcu4rlds3dil2','2021-10-14 08:12:57','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1634200513;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:5;s:3:\"sid\";s:26:\"7qvje2huij4uggtkcom6e1dnj0\";s:5:\"email\";s:20:\"anhfighter@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:0:\"\";s:9:\"last_name\";s:10:\"anhfighter\";s:8:\"birthday\";N;s:12:\"phone_number\";s:0:\"\";s:5:\"image\";s:14:\"anhfighter.jpg\";s:4:\"uuid\";s:0:\"\";s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:1;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";N;s:5:\"state\";N;s:8:\"zip_code\";N;s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";N;s:4:\"ggid\";N;s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";N;s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:1;s:17:\"logout_email_code\";s:32:\"dbac3976acbd67a0c9f95343fffba9b2\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-03-05 10:00:15.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 14:38:46.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"  anhfighter\";}}',1634286913),('9f0k2ura9cug95fjoc5uspeth0','2021-10-14 07:34:59','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1634196899;}Flash|a:1:{s:5:\"flash\";a:1:{i:0;a:4:{s:7:\"message\";s:22:\"You do not have access\";s:3:\"key\";s:5:\"flash\";s:7:\"element\";s:15:\"Flash/fly_error\";s:6:\"params\";a:0:{}}}}',1634283299),('9k53ov8gb21hjc4sug5l4rvft1','2021-10-14 07:57:17','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1634198237;}Flash|a:1:{s:5:\"flash\";a:1:{i:0;a:4:{s:7:\"message\";s:22:\"You do not have access\";s:3:\"key\";s:5:\"flash\";s:7:\"element\";s:15:\"Flash/fly_error\";s:6:\"params\";a:0:{}}}}',1634284637),('bvaaff70a4ra1b05sam3fko1g6','2021-07-13 08:46:28','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1626165988;}Flash|a:0:{}',1626252388),('dg85rh5n35kbnluh6rkehcul82','2021-05-14 02:21:11','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1620981219;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:5;s:3:\"sid\";s:26:\"7qvje2huij4uggtkcom6e1dnj0\";s:5:\"email\";s:20:\"anhfighter@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:0:\"\";s:9:\"last_name\";s:10:\"anhfighter\";s:8:\"birthday\";N;s:12:\"phone_number\";s:0:\"\";s:5:\"image\";s:14:\"anhfighter.jpg\";s:4:\"uuid\";s:0:\"\";s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:1;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";N;s:5:\"state\";N;s:8:\"zip_code\";N;s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";N;s:4:\"ggid\";N;s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";N;s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:1;s:17:\"logout_email_code\";s:32:\"dbac3976acbd67a0c9f95343fffba9b2\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-03-05 10:00:15.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 14:38:46.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"  anhfighter\";}}',1621067619),('ebuh7dov8spmf0uq4sn8vg45l5','2021-05-19 18:24:49','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1621450110;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}',1621536511),('hniblq2bpfpaj28rqutlte6il2','2021-05-18 23:48:35','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1621381716;}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}Flash|a:0:{}',1621468116),('ibnl871rq5ba4uksp8453tmmp1','2021-05-14 02:43:48','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1620968240;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}',1621054640),('kmr0i9375s1lodn68oje8eu735','2021-05-14 03:43:25','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1620967223;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}',1621053623),('lej8opu030fu5rhid6183dpsa6','2021-05-12 08:24:47','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1620823947;}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}Flash|a:0:{}',1620910347),('m80l1j2ofiscvbk7bmg1t0g811','2021-05-12 10:01:36','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1620815324;}Auth|a:0:{}Flash|a:0:{}',1620901725),('mp8feg3vbm9iou1s0lbe3q49t0','2021-09-27 10:31:33','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1632738698;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}',1632825098),('n2rqf4mr3ks3gq469avef54gp5','2021-05-10 14:19:49','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1620657245;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}',1620743645),('o0hsemnm6nmullilp0cbtdmfb1','2021-05-13 19:25:20','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1620933920;}Flash|a:1:{s:5:\"flash\";a:1:{i:0;a:4:{s:7:\"message\";s:22:\"You do not have access\";s:3:\"key\";s:5:\"flash\";s:7:\"element\";s:15:\"Flash/fly_error\";s:6:\"params\";a:0:{}}}}',1621020320),('s1kt6n634bdfs60vttas8fs2o4','2021-05-13 19:25:02','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1620939064;}Flash|a:0:{}',1621025464),('s1oilih5k0akdkbgqp5buthm56','2021-05-27 20:37:42','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1622147985;}',1622234385),('surul4hasg719dt0tf511ajb80','2021-05-10 11:56:53','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1620647813;}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}Flash|a:0:{}',1620734213),('tmf9uc78qsb5fqaq3ji75g96v2','2021-05-24 21:56:46','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1621893426;}Flash|a:0:{}',1621979826),('u75f5b2g2f949t1ghtavcivcs2','2021-05-19 14:20:22','0000-00-00 00:00:00','Config|a:1:{s:4:\"time\";i:1621438089;}Flash|a:0:{}Auth|a:1:{s:4:\"User\";a:34:{s:2:\"id\";i:1;s:3:\"sid\";s:26:\"9e2dm3mdr65cuhrnbr26qekb70\";s:5:\"email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";i:1;s:6:\"gender\";i:1;s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:5:\"admin\";s:8:\"birthday\";O:20:\"Cake\\I18n\\FrozenDate\":3:{s:4:\"date\";s:26:\"2019-03-06 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:12:\"phone_number\";s:9:\"123456789\";s:5:\"image\";s:15:\"admin-admin.jpg\";s:4:\"uuid\";N;s:6:\"status\";b:1;s:6:\"active\";b:1;s:6:\"system\";b:0;s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:4:\"city\";s:0:\"\";s:5:\"state\";s:0:\"\";s:8:\"zip_code\";s:0:\"\";s:10:\"country_id\";i:241;s:4:\"note\";s:0:\"\";s:4:\"fbid\";s:0:\"\";s:4:\"ggid\";s:0:\"\";s:10:\"last_visit\";N;s:8:\"has_read\";i:0;s:13:\"login_code_ip\";s:36:\"65db9221-3c02-463b-b49e-27fd4ca99641\";s:15:\"login_status_ip\";b:0;s:16:\"login_code_email\";s:0:\"\";s:18:\"login_status_email\";b:0;s:17:\"logout_email_code\";s:32:\"49a60481ce6c47f699b9034e94016cb4\";s:12:\"refesh_token\";s:0:\"\";s:7:\"created\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2019-03-06 15:08:28.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:8:\"modified\";O:20:\"Cake\\I18n\\FrozenTime\":3:{s:4:\"date\";s:26:\"2020-09-27 16:12:53.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:16:\"Asia/Ho_Chi_Minh\";}s:9:\"full_name\";s:12:\"admin  admin\";}}',1621524489);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `currency_id` int(11) NOT NULL,
  `rate` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
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
  `google_analytic` text COLLATE utf8_unicode_ci NOT NULL,
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
  `status_logout_email` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(4) DEFAULT NULL,
  `anysize` tinyint(1) NOT NULL DEFAULT '0',
  `status_login_email` tinyint(1) NOT NULL DEFAULT '0',
  `check_link` tinyint(1) NOT NULL,
  `ftp_host` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ftp_usr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ftp_pwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ftp_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'en','p23-labs.png','55055b5b-7056-4c9b-b0cc-e87bdede7571','Title','en','en','CmsV4','DefaultV4',6,6,15,10,'$',1,'1','','','','','','','phongvan,zorom','skype1,skype3','','',1,'','','https://facebook.com','1575864732626379','70dc61756b084ff2d193e2768daa5894','https://google.com','https://twitter.com',NULL,NULL,'',400,500,'','in-v3.mailjet.com','587','tls','','',1,'',0,1,0,1,0,0,0,'','','','','2014-01-24 00:00:00','2021-10-14 15:28:59');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_translations`
--

DROP TABLE IF EXISTS `tag_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locale` (`locale`,`model`,`foreign_key`,`field`),
  KEY `model` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_translations`
--

LOCK TABLES `tag_translations` WRITE;
/*!40000 ALTER TABLE `tag_translations` DISABLE KEYS */;
INSERT INTO `tag_translations` VALUES (1,'en','Tags',1,'title','1'),(2,'en','Tags',1,'slug','1'),(3,'en','Tags',2,'title','2'),(4,'en','Tags',2,'slug','2'),(5,'en','Tags',3,'title','3'),(6,'en','Tags',3,'slug','3'),(7,'en','Tags',4,'title','4'),(8,'en','Tags',4,'slug','4');
/*!40000 ALTER TABLE `tag_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Articles','2020-07-23 14:10:01','2020-07-23 14:10:01'),(2,'Articles','2020-07-23 14:10:01','2020-07-23 14:10:01'),(3,'Articles','2020-07-23 14:10:01','2020-07-23 14:10:01'),(4,'Articles','2020-07-23 14:10:23','2020-07-23 14:10:23');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'test',NULL,'2020-03-28 00:00:00','Make Metronic Great Again.Lorem Ipsum Amet',2,'0000-00-00 00:00:00','2020-03-26 10:49:34',1,6),(2,'test 2',NULL,'2020-03-26 16:00:00','Make Metronic Great Again.Lorem Ipsum Amet',1,'0000-00-00 00:00:00','2020-03-26 11:06:35',1,6);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) NOT NULL,
  `gender` int(1) NOT NULL DEFAULT '0',
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
  `login_code_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_status_ip` tinyint(1) NOT NULL DEFAULT '0',
  `login_code_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login_status_email` tinyint(1) NOT NULL,
  `logout_email_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `refesh_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'9e2dm3mdr65cuhrnbr26qekb70','admin@gmail.com','$2y$10$TlDkicHroQ8C7ulTLzpaxuWWRZBtvGk7yOR3Ice/sUMUGT5pgbfbm',1,1,'admin','admin','2019-03-06','123456789','admin-admin.jpg',NULL,1,1,0,'','','','','',233,'','','',NULL,0,'65db9221-3c02-463b-b49e-27fd4ca99641',0,'',0,'49a60481ce6c47f699b9034e94016cb4','','2019-03-06 15:08:28','2021-10-14 14:45:46'),(2,'nlnleo9k9r7eg24d353ipamkf1','manager@gmail.com','$2y$10$vthXVVgfG6fuWfD7HTITCujpZLju4uO3xP5XfgnBWdXqDXEXfGO52',2,1,' Manager',' Manager','0000-00-00','','manager-manager.jpg','c9777c0d-387e-4584-974e-f28083a8219a',1,1,0,'','',NULL,NULL,NULL,233,'',NULL,NULL,NULL,0,NULL,0,'',0,'','','2020-03-03 08:32:40','2021-10-14 14:45:57'),(3,'','user@gmail.com','$2y$10$kTEgOXSkY0rWvNE.dkiX5OT76QGQ0ORQdo/Cf61SUZv2uzeAcBvSa',3,1,' User','User','0000-00-00','','user-user.jpg','565d0503-8fa0-428d-8302-827d9c86bc3a',1,1,0,'','',NULL,NULL,NULL,233,'',NULL,NULL,NULL,0,NULL,0,'',0,'','','2020-03-03 08:33:06','2021-10-14 14:46:07'),(4,'03mlde4p2e3nqgk1t4cuk1lhu6','editor@gmail.com','$2y$10$O5xZudVMRTekhGuIx.gqP.4pGAYaKoCsb2jb/wzxsXUVp4GvzTdn.',4,1,' Editor',' Editor','0000-00-00','','editor-editor.jpg','7263aa40-5e46-47ae-888e-f88505b821ca',1,1,0,'','',NULL,NULL,NULL,233,'',NULL,NULL,NULL,0,NULL,0,'',0,'','','2020-03-05 09:22:47','2021-10-14 14:46:16'),(5,'7qvje2huij4uggtkcom6e1dnj0','anhfighter@gmail.com','$2y$10$aWze2eUkkeVH9apEvJ6aA.whrlNS5rcguPboTr22yeZUosQPnNUNG',1,1,'','anhfighter','0000-00-00','','anhfighter.jpg','',1,1,1,'','',NULL,NULL,NULL,233,'',NULL,NULL,NULL,0,NULL,0,'',1,'dbac3976acbd67a0c9f95343fffba9b2','','2020-03-05 10:00:15','2021-10-14 15:13:24'),(6,'o2750101pgutdip5l6m6i0g7c7','hoangvu6296@gmail.com','$2y$10$90etG/iXcB0UyGcd5kgz1uxY0BOXa4VXxUvkOU5l3Deazv4ovwM1y',1,1,'Hoàng','Vũ','0000-00-00','','hoang-vu.jpg','b29e1c1e-997c-446f-a738-781200132bc4',1,0,1,'','',NULL,NULL,NULL,241,'',NULL,NULL,NULL,0,'',0,'',1,'b978b2896b064e67bc9bb998e4170512','','2020-03-11 15:43:22','2020-09-27 16:11:49'),(7,'','usertest1@gmail.com','$2y$10$pxHmbIMfR2Fia/9C6DecmeOrW.65p2eii4XxqtOcyKxsqZ.CksGCG',3,2,' ','','0000-00-00','','.jpg',NULL,1,0,0,'','',NULL,NULL,NULL,233,'',NULL,NULL,NULL,0,NULL,0,'',0,'','',NULL,'2021-10-14 14:45:36'),(8,'','usertest2@gmail.com','$2y$10$.WD/gdbWbcw.LIxEErPi6.nvF7XSqMRS4kXbXI8fSzxyGTjgblu.S',3,0,' ','','0000-00-00','','.jpg',NULL,1,0,0,'','',NULL,NULL,NULL,233,'',NULL,NULL,NULL,0,NULL,0,'',0,'','',NULL,'2021-10-14 14:45:22'),(9,'','demo@demo.com','$2y$10$BgbjE07EfA6V4F8JX1883uqgBhjjh2w3kp0z80EuyLPWdN9y3Hoqi',1,0,' demo','','0000-00-00','','demo.jpg','8d763b20-2afc-45ae-bd40-d8d713b061a3',0,0,0,'','',NULL,NULL,NULL,233,'',NULL,NULL,NULL,0,NULL,0,'',0,'','','2020-12-24 17:03:24','2021-10-14 14:46:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_logs`
--

DROP TABLE IF EXISTS `users_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=531 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_logs`
--

LOCK TABLES `users_logs` WRITE;
/*!40000 ALTER TABLE `users_logs` DISABLE KEYS */;
INSERT INTO `users_logs` VALUES (1,6,1,'hoangvu6296@gmail.com','14.187.55.214','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-23 17:00:22','2020-03-23 17:00:22'),(2,1,1,'admin@gmail.com','14.187.55.214','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-23 17:00:38','2020-03-23 17:00:38'),(3,2,2,'manager@gmail.com','14.187.55.214','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-23 17:22:04','2020-03-23 17:22:04'),(4,5,1,'anhfighter@gmail.com','14.187.55.214','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-23 17:23:14','2020-03-23 17:23:14'),(5,5,1,'anhfighter@gmail.com','72.130.39.144','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-23 17:30:41','2020-03-23 17:30:41'),(7,1,1,'admin@gmail.com','14.187.42.202','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-24 11:26:35','2020-03-24 11:26:35'),(8,6,1,'hoangvu6296@gmail.com','14.186.216.101','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-25 14:50:01','2020-03-25 14:50:01'),(9,1,1,'admin@gmail.com','14.186.216.101','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-25 16:16:15','2020-03-25 16:16:15'),(10,6,1,'hoangvu6296@gmail.com','14.186.216.101','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-25 16:18:30','2020-03-25 16:18:30'),(11,1,1,'admin@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-26 08:46:20','2020-03-26 08:46:20'),(12,6,1,'hoangvu6296@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-26 08:58:31','2020-03-26 08:58:31'),(13,6,1,'hoangvu6296@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/12','2020-03-26 13:37:47','2020-03-26 13:37:47'),(14,6,1,'hoangvu6296@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/12','2020-03-26 13:39:14','2020-03-26 13:39:14'),(15,1,1,'admin@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-27 09:15:19','2020-03-27 09:15:19'),(16,1,1,'admin@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-27 15:13:49','2020-03-27 15:13:49'),(17,1,1,'admin@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-28 08:55:30','2020-03-28 08:55:30'),(18,1,1,'admin@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/12','2020-03-28 09:04:12','2020-03-28 09:04:12'),(19,1,1,'admin@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/12','2020-03-28 09:22:20','2020-03-28 09:22:20'),(20,1,1,'admin@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-28 16:43:43','2020-03-28 16:43:43'),(21,5,1,'anhfighter@gmail.com','72.130.39.144','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-29 06:21:55','2020-03-29 06:21:55'),(22,1,1,'admin@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-29 08:27:01','2020-03-29 08:27:01'),(23,1,1,'admin@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-29 13:26:44','2020-03-29 13:26:44'),(24,1,1,'admin@gmail.com','113.23.17.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-30 09:00:02','2020-03-30 09:00:02'),(25,1,1,'admin@gmail.com','1.55.92.184','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-31 09:07:16','2020-03-31 09:07:16'),(26,1,1,'admin@gmail.com','1.55.92.184','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-03-31 09:14:39','2020-03-31 09:14:39'),(27,1,1,'admin@gmail.com','1.55.92.184','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-04-01 17:04:00','2020-04-01 17:04:00'),(28,1,1,'admin@gmail.com','1.55.92.184','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-04-03 13:35:01','2020-04-03 13:35:01'),(29,5,1,'anhfighter@gmail.com','72.130.39.144','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-04-06 06:47:29','2020-04-06 06:47:29'),(30,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-04-06 10:22:43','2020-04-06 10:22:43'),(31,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-06 13:01:55','2020-04-06 13:01:55'),(32,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-06 13:02:10','2020-04-06 13:02:10'),(33,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:09:19','2020-04-06 14:09:19'),(34,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:10:52','2020-04-06 14:10:52'),(35,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:11:10','2020-04-06 14:11:10'),(36,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:12:54','2020-04-06 14:12:54'),(37,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:13:02','2020-04-06 14:13:02'),(38,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:13:42','2020-04-06 14:13:42'),(39,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:14:31','2020-04-06 14:14:31'),(40,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:17:20','2020-04-06 14:17:20'),(41,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:18:42','2020-04-06 14:18:42'),(42,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:22:39','2020-04-06 14:22:39'),(43,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:23:56','2020-04-06 14:23:56'),(44,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:25:22','2020-04-06 14:25:22'),(45,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:29:22','2020-04-06 14:29:22'),(46,1,1,'admin@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.loginIp.successed','Users','/acp/users/edit/6','2020-04-06 14:33:42','2020-04-06 14:33:42'),(47,6,1,'hoangvu6296@gmail.com','1.53.195.177','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36','Users.login.successed','Users','Login success','2020-04-06 15:48:43','2020-04-06 15:48:43'),(48,6,1,'hoangvu6296@gmail.com','1.53.195.212','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-07 10:48:24','2020-04-07 10:48:24'),(49,6,1,'hoangvu6296@gmail.com','1.53.195.212','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-07 15:01:31','2020-04-07 15:01:31'),(50,6,1,'hoangvu6296@gmail.com','1.53.195.212','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-07 15:59:27','2020-04-07 15:59:27'),(51,6,1,'hoangvu6296@gmail.com','1.53.195.212','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.logout.successed','Users','/acp/users/edit/6','2020-04-07 16:01:04','2020-04-07 16:01:04'),(52,6,1,'hoangvu6296@gmail.com','1.53.195.212','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login email success','2020-04-07 16:06:34','2020-04-07 16:06:34'),(53,1,1,'admin@gmail.com','1.53.195.212','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-07 16:11:32','2020-04-07 16:11:32'),(54,1,1,'admin@gmail.com','1.53.195.136','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-08 08:40:49','2020-04-08 08:40:49'),(55,6,1,'hoangvu6296@gmail.com','1.53.195.136','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-08 09:18:57','2020-04-08 09:18:57'),(56,5,1,'anhfighter@gmail.com','72.130.39.144','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1','Users.login.successed','Users','Login success','2020-04-08 09:19:05','2020-04-08 09:19:05'),(57,5,1,'anhfighter@gmail.com','72.130.39.144','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/80.0.3987.95 Mobile/15E148 Safari/604.1','Users.login.successed','Users','Login email success','2020-04-08 09:25:38','2020-04-08 09:25:38'),(58,1,1,'admin@gmail.com','1.53.195.136','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-08 11:10:35','2020-04-08 11:10:35'),(59,6,1,'hoangvu6296@gmail.com','1.53.195.136','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-08 11:11:34','2020-04-08 11:11:34'),(60,1,1,'admin@gmail.com','42.119.238.106','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-09 14:28:31','2020-04-09 14:28:31'),(61,1,1,'admin@gmail.com','72.130.39.144','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-10 16:32:55','2020-04-10 16:32:55'),(62,1,1,'admin@gmail.com','42.119.156.189','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-13 10:19:11','2020-04-13 10:19:11'),(63,1,1,'admin@gmail.com','72.130.39.144','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-13 16:46:45','2020-04-13 16:46:45'),(64,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-14 13:37:09','2020-04-14 13:37:09'),(65,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:01:52','2020-04-14 14:01:52'),(66,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:01:52','2020-04-14 14:01:52'),(67,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:01:52','2020-04-14 14:01:52'),(68,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:01:52','2020-04-14 14:01:52'),(69,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:01:52','2020-04-14 14:01:52'),(70,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:01:52','2020-04-14 14:01:52'),(71,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:02:53','2020-04-14 14:02:53'),(72,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:02:53','2020-04-14 14:02:53'),(73,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:02:53','2020-04-14 14:02:53'),(74,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:02:53','2020-04-14 14:02:53'),(75,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:02:53','2020-04-14 14:02:53'),(76,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:02:53','2020-04-14 14:02:53'),(77,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:03:13','2020-04-14 14:03:13'),(78,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:03:13','2020-04-14 14:03:13'),(79,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:03:13','2020-04-14 14:03:13'),(80,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:03:13','2020-04-14 14:03:13'),(81,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:03:13','2020-04-14 14:03:13'),(82,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:03:13','2020-04-14 14:03:13'),(83,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:05:03','2020-04-14 14:05:03'),(84,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:05:21','2020-04-14 14:05:21'),(85,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:19','2020-04-14 14:07:19'),(86,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:19','2020-04-14 14:07:19'),(87,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:19','2020-04-14 14:07:19'),(88,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:19','2020-04-14 14:07:19'),(89,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:19','2020-04-14 14:07:19'),(90,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:19','2020-04-14 14:07:19'),(91,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:37','2020-04-14 14:07:37'),(92,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:37','2020-04-14 14:07:37'),(93,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:37','2020-04-14 14:07:37'),(94,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:37','2020-04-14 14:07:37'),(95,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:37','2020-04-14 14:07:37'),(96,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:07:37','2020-04-14 14:07:37'),(97,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:08:26','2020-04-14 14:08:26'),(98,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:14:30','2020-04-14 14:14:30'),(99,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:21:54','2020-04-14 14:21:54'),(100,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:22:32','2020-04-14 14:22:32'),(101,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:02','2020-04-14 14:23:02'),(102,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:03','2020-04-14 14:23:03'),(103,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:03','2020-04-14 14:23:03'),(104,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:03','2020-04-14 14:23:03'),(105,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:03','2020-04-14 14:23:03'),(106,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:03','2020-04-14 14:23:03'),(107,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:25','2020-04-14 14:23:25'),(108,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:25','2020-04-14 14:23:25'),(109,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:25','2020-04-14 14:23:25'),(110,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:25','2020-04-14 14:23:25'),(111,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:25','2020-04-14 14:23:25'),(112,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:25','2020-04-14 14:23:25'),(113,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:48','2020-04-14 14:23:48'),(114,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:48','2020-04-14 14:23:48'),(115,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:48','2020-04-14 14:23:48'),(116,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:48','2020-04-14 14:23:48'),(117,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:48','2020-04-14 14:23:48'),(118,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:23:48','2020-04-14 14:23:48'),(119,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:11','2020-04-14 14:24:11'),(120,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:11','2020-04-14 14:24:11'),(121,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:11','2020-04-14 14:24:11'),(122,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:11','2020-04-14 14:24:11'),(123,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:11','2020-04-14 14:24:11'),(124,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:11','2020-04-14 14:24:11'),(125,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:24','2020-04-14 14:24:24'),(126,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:24','2020-04-14 14:24:24'),(127,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:24','2020-04-14 14:24:24'),(128,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:24','2020-04-14 14:24:24'),(129,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:24','2020-04-14 14:24:24'),(130,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:24','2020-04-14 14:24:24'),(131,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:45','2020-04-14 14:24:45'),(132,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:45','2020-04-14 14:24:45'),(133,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:45','2020-04-14 14:24:45'),(134,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:45','2020-04-14 14:24:45'),(135,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:45','2020-04-14 14:24:45'),(136,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:24:45','2020-04-14 14:24:45'),(137,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:25:16','2020-04-14 14:25:16'),(138,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:26:24','2020-04-14 14:26:24'),(139,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:26:24','2020-04-14 14:26:24'),(140,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:26:24','2020-04-14 14:26:24'),(141,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:26:24','2020-04-14 14:26:24'),(142,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:26:24','2020-04-14 14:26:24'),(143,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:26:24','2020-04-14 14:26:24'),(144,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:08','2020-04-14 14:28:08'),(145,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:08','2020-04-14 14:28:08'),(146,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:08','2020-04-14 14:28:08'),(147,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:08','2020-04-14 14:28:08'),(148,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:08','2020-04-14 14:28:08'),(149,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:08','2020-04-14 14:28:08'),(150,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:25','2020-04-14 14:28:25'),(151,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:25','2020-04-14 14:28:25'),(152,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:25','2020-04-14 14:28:25'),(153,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:25','2020-04-14 14:28:25'),(154,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:25','2020-04-14 14:28:25'),(155,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:25','2020-04-14 14:28:25'),(156,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:59','2020-04-14 14:28:59'),(157,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:59','2020-04-14 14:28:59'),(158,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:59','2020-04-14 14:28:59'),(159,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:59','2020-04-14 14:28:59'),(160,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:59','2020-04-14 14:28:59'),(161,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:28:59','2020-04-14 14:28:59'),(162,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:29:19','2020-04-14 14:29:19'),(163,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:29:19','2020-04-14 14:29:19'),(164,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:29:19','2020-04-14 14:29:19'),(165,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:29:19','2020-04-14 14:29:19'),(166,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:29:19','2020-04-14 14:29:19'),(167,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:29:19','2020-04-14 14:29:19'),(168,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:29:47','2020-04-14 14:29:47'),(169,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:30:06','2020-04-14 14:30:06'),(170,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:31:13','2020-04-14 14:31:13'),(171,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:31:29','2020-04-14 14:31:29'),(172,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:31:52','2020-04-14 14:31:52'),(173,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:31:52','2020-04-14 14:31:52'),(174,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:31:52','2020-04-14 14:31:52'),(175,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:31:52','2020-04-14 14:31:52'),(176,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:31:52','2020-04-14 14:31:52'),(177,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:31:52','2020-04-14 14:31:52'),(178,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:23','2020-04-14 14:32:23'),(179,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:23','2020-04-14 14:32:23'),(180,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:23','2020-04-14 14:32:23'),(181,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:23','2020-04-14 14:32:23'),(182,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:23','2020-04-14 14:32:23'),(183,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:23','2020-04-14 14:32:23'),(184,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:54','2020-04-14 14:32:54'),(185,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:54','2020-04-14 14:32:54'),(186,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:54','2020-04-14 14:32:54'),(187,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:54','2020-04-14 14:32:54'),(188,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:54','2020-04-14 14:32:54'),(189,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:32:54','2020-04-14 14:32:54'),(190,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:33:52','2020-04-14 14:33:52'),(191,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:36:13','2020-04-14 14:36:13'),(192,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:37:24','2020-04-14 14:37:24'),(193,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:37:24','2020-04-14 14:37:24'),(194,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:37:24','2020-04-14 14:37:24'),(195,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:37:24','2020-04-14 14:37:24'),(196,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:37:24','2020-04-14 14:37:24'),(197,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:37:24','2020-04-14 14:37:24'),(198,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 14:37:52','2020-04-14 14:37:52'),(199,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/12','2020-04-14 14:41:45','2020-04-14 14:41:45'),(200,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/12','2020-04-14 14:41:57','2020-04-14 14:41:57'),(201,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/13','2020-04-14 14:42:40','2020-04-14 14:42:40'),(202,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/14','2020-04-14 14:43:39','2020-04-14 14:43:39'),(203,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/15','2020-04-14 14:44:15','2020-04-14 14:44:15'),(204,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/16','2020-04-14 14:45:30','2020-04-14 14:45:30'),(205,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/17','2020-04-14 14:46:13','2020-04-14 14:46:13'),(206,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/18','2020-04-14 14:46:58','2020-04-14 14:46:58'),(207,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/19','2020-04-14 14:48:47','2020-04-14 14:48:47'),(208,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/19','2020-04-14 14:48:47','2020-04-14 14:48:47'),(209,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/19','2020-04-14 14:48:47','2020-04-14 14:48:47'),(210,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/19','2020-04-14 14:48:47','2020-04-14 14:48:47'),(211,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/19','2020-04-14 14:48:47','2020-04-14 14:48:47'),(212,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/19','2020-04-14 14:48:47','2020-04-14 14:48:47'),(213,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/19','2020-04-14 14:49:15','2020-04-14 14:49:15'),(214,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/20','2020-04-14 14:52:48','2020-04-14 14:52:48'),(215,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/21','2020-04-14 14:54:22','2020-04-14 14:54:22'),(216,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/22','2020-04-14 14:54:33','2020-04-14 14:54:33'),(217,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/23','2020-04-14 14:58:13','2020-04-14 14:58:13'),(218,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/24','2020-04-14 14:58:35','2020-04-14 14:58:35'),(219,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/25','2020-04-14 14:59:34','2020-04-14 14:59:34'),(220,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/26','2020-04-14 14:59:47','2020-04-14 14:59:47'),(221,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/27','2020-04-14 15:00:37','2020-04-14 15:00:37'),(222,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/28','2020-04-14 15:01:19','2020-04-14 15:01:19'),(223,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.add.successed','Products','/acp/products/edit/29','2020-04-14 15:01:53','2020-04-14 15:01:53'),(224,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/29','2020-04-14 15:02:11','2020-04-14 15:02:11'),(225,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/29','2020-04-14 15:02:47','2020-04-14 15:02:47'),(226,1,1,'admin@gmail.com','42.119.156.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/72','2020-04-14 15:18:16','2020-04-14 15:18:16'),(227,1,1,'admin@gmail.com','42.119.157.0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36','Users.login.successed','Users','Login success','2020-04-15 09:17:35','2020-04-15 09:17:35'),(228,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Users.login.successed','Users','Login success','2020-04-20 07:10:30','2020-04-20 07:10:30'),(229,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/73','2020-04-20 07:11:06','2020-04-20 07:11:06'),(230,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/74','2020-04-20 07:12:25','2020-04-20 07:12:25'),(231,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/75','2020-04-20 07:12:56','2020-04-20 07:12:56'),(232,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/76','2020-04-20 07:13:33','2020-04-20 07:13:33'),(233,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/76','2020-04-20 07:13:33','2020-04-20 07:13:33'),(234,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/76','2020-04-20 07:13:33','2020-04-20 07:13:33'),(235,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/76','2020-04-20 07:13:33','2020-04-20 07:13:33'),(236,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/76','2020-04-20 07:13:33','2020-04-20 07:13:33'),(237,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/76','2020-04-20 07:13:33','2020-04-20 07:13:33'),(238,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/77','2020-04-20 07:13:53','2020-04-20 07:13:53'),(239,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/77','2020-04-20 07:13:53','2020-04-20 07:13:53'),(240,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/77','2020-04-20 07:13:53','2020-04-20 07:13:53'),(241,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/77','2020-04-20 07:13:53','2020-04-20 07:13:53'),(242,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/77','2020-04-20 07:13:53','2020-04-20 07:13:53'),(243,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/77','2020-04-20 07:13:53','2020-04-20 07:13:53'),(244,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/78','2020-04-20 07:14:25','2020-04-20 07:14:25'),(245,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/78','2020-04-20 07:14:25','2020-04-20 07:14:25'),(246,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/78','2020-04-20 07:14:25','2020-04-20 07:14:25'),(247,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/78','2020-04-20 07:14:25','2020-04-20 07:14:25'),(248,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/78','2020-04-20 07:14:25','2020-04-20 07:14:25'),(249,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/78','2020-04-20 07:14:25','2020-04-20 07:14:25'),(250,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/79','2020-04-20 07:16:11','2020-04-20 07:16:11'),(251,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Users.login.successed','Users','Login success','2020-04-21 09:01:57','2020-04-21 09:01:57'),(252,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Users.login.successed','Users','Login success','2020-04-21 13:50:27','2020-04-21 13:50:27'),(253,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/78','2020-04-21 14:00:31','2020-04-21 14:00:31'),(254,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/78','2020-04-21 14:04:42','2020-04-21 14:04:42'),(255,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/78','2020-04-21 14:04:59','2020-04-21 14:04:59'),(256,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/79','2020-04-21 14:41:33','2020-04-21 14:41:33'),(257,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/80','2020-04-21 14:42:02','2020-04-21 14:42:02'),(258,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/81','2020-04-21 14:43:00','2020-04-21 14:43:00'),(259,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/81','2020-04-21 14:43:50','2020-04-21 14:43:50'),(260,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/81','2020-04-21 14:44:26','2020-04-21 14:44:26'),(261,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/81','2020-04-21 14:47:33','2020-04-21 14:47:33'),(262,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/81','2020-04-21 14:48:16','2020-04-21 14:48:16'),(263,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/81','2020-04-21 14:48:57','2020-04-21 14:48:57'),(264,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/81','2020-04-21 15:40:05','2020-04-21 15:40:05'),(265,1,1,'admin@gmail.com','72.130.39.144','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Users.login.successed','Users','Login success','2020-04-22 10:37:55','2020-04-22 10:37:55'),(266,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Users.login.successed','Users','Login success','2020-04-22 13:31:07','2020-04-22 13:31:07'),(267,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/28','2020-04-22 13:31:54','2020-04-22 13:31:54'),(268,1,1,'admin@gmail.com','1.53.2.185','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/28','2020-04-22 13:32:36','2020-04-22 13:32:36'),(269,5,1,'anhfighter@gmail.com','72.130.39.144','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36','Users.login.successed','Users','Login success','2020-04-22 13:40:35','2020-04-22 13:40:35'),(270,5,1,'anhfighter@gmail.com','72.130.39.144','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','Users.login.successed','Users','Login success','2020-06-07 08:43:17','2020-06-07 08:43:17'),(271,5,1,'anhfighter@gmail.com','72.130.39.144','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36','Users.login.successed','Users','Login success','2020-06-11 09:16:39','2020-06-11 09:16:39'),(272,1,1,'admin@gmail.com','14.186.165.37','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36','Users.login.successed','Users','Login success','2020-07-23 10:48:27','2020-07-23 10:48:27'),(273,1,1,'admin@gmail.com','14.186.165.37','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/1','2020-07-23 14:10:01','2020-07-23 14:10:01'),(274,1,1,'admin@gmail.com','14.186.165.37','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/2','2020-07-23 14:10:23','2020-07-23 14:10:23'),(275,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Users.login.successed','Users','Login success','2020-07-30 13:04:14','2020-07-30 13:04:14'),(276,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.add.successed','Products','/acp/products/edit/1','2020-07-30 13:15:24','2020-07-30 13:15:24'),(277,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/2','2020-07-30 13:24:54','2020-07-30 13:24:54'),(278,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/3','2020-07-30 13:25:34','2020-07-30 13:25:34'),(279,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/1','2020-07-30 13:26:47','2020-07-30 13:26:47'),(280,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/4','2020-07-30 13:27:25','2020-07-30 13:27:25'),(281,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/5','2020-07-30 13:32:15','2020-07-30 13:32:15'),(282,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/6','2020-07-30 13:32:20','2020-07-30 13:32:20'),(283,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/7','2020-07-30 13:32:35','2020-07-30 13:32:35'),(284,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/8','2020-07-30 13:32:37','2020-07-30 13:32:37'),(285,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/9','2020-07-30 13:33:12','2020-07-30 13:33:12'),(286,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/10','2020-07-30 13:33:14','2020-07-30 13:33:14'),(287,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/11','2020-07-30 13:34:16','2020-07-30 13:34:16'),(288,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/12','2020-07-30 13:34:23','2020-07-30 13:34:23'),(289,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/13','2020-07-30 13:34:25','2020-07-30 13:34:25'),(290,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/14','2020-07-30 13:34:53','2020-07-30 13:34:53'),(291,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/15','2020-07-30 13:34:55','2020-07-30 13:34:55'),(292,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/16','2020-07-30 13:35:39','2020-07-30 13:35:39'),(293,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/17','2020-07-30 13:35:41','2020-07-30 13:35:41'),(294,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/18','2020-07-30 13:36:33','2020-07-30 13:36:33'),(295,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/19','2020-07-30 13:36:36','2020-07-30 13:36:36'),(296,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/20','2020-07-30 13:37:10','2020-07-30 13:37:10'),(297,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/21','2020-07-30 13:37:10','2020-07-30 13:37:10'),(298,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/22','2020-07-30 13:37:20','2020-07-30 13:37:20'),(299,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/23','2020-07-30 13:37:52','2020-07-30 13:37:52'),(300,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/24','2020-07-30 13:38:26','2020-07-30 13:38:26'),(301,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/25','2020-07-30 13:38:28','2020-07-30 13:38:28'),(302,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/26','2020-07-30 13:38:46','2020-07-30 13:38:46'),(303,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/27','2020-07-30 13:38:55','2020-07-30 13:38:55'),(304,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/28','2020-07-30 13:38:57','2020-07-30 13:38:57'),(305,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/29','2020-07-30 13:39:25','2020-07-30 13:39:25'),(306,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/30','2020-07-30 13:39:26','2020-07-30 13:39:26'),(307,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/31','2020-07-30 13:39:47','2020-07-30 13:39:47'),(308,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/32','2020-07-30 13:39:48','2020-07-30 13:39:48'),(309,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/33','2020-07-30 13:39:54','2020-07-30 13:39:54'),(310,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/34','2020-07-30 13:39:55','2020-07-30 13:39:55'),(311,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/35','2020-07-30 13:40:26','2020-07-30 13:40:26'),(312,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/36','2020-07-30 13:40:32','2020-07-30 13:40:32'),(313,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/37','2020-07-30 13:40:58','2020-07-30 13:40:58'),(314,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/38','2020-07-30 13:41:12','2020-07-30 13:41:12'),(315,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/39','2020-07-30 13:41:12','2020-07-30 13:41:12'),(316,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/40','2020-07-30 13:41:39','2020-07-30 13:41:39'),(317,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/41','2020-07-30 13:41:40','2020-07-30 13:41:40'),(318,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/42','2020-07-30 13:42:53','2020-07-30 13:42:53'),(319,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/43','2020-07-30 13:42:54','2020-07-30 13:42:54'),(320,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/44','2020-07-30 13:43:21','2020-07-30 13:43:21'),(321,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/45','2020-07-30 13:43:24','2020-07-30 13:43:24'),(322,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/46','2020-07-30 13:43:51','2020-07-30 13:43:51'),(323,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/47','2020-07-30 13:44:01','2020-07-30 13:44:01'),(324,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/48','2020-07-30 13:44:29','2020-07-30 13:44:29'),(325,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/49','2020-07-30 13:44:45','2020-07-30 13:44:45'),(326,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/50','2020-07-30 13:44:53','2020-07-30 13:44:53'),(327,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/51','2020-07-30 13:44:54','2020-07-30 13:44:54'),(328,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/52','2020-07-30 13:48:42','2020-07-30 13:48:42'),(329,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/53','2020-07-30 13:48:49','2020-07-30 13:48:49'),(330,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/54','2020-07-30 13:48:58','2020-07-30 13:48:58'),(331,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/55','2020-07-30 13:52:13','2020-07-30 13:52:13'),(332,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/56','2020-07-30 13:53:33','2020-07-30 13:53:33'),(333,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/57','2020-07-30 13:55:11','2020-07-30 13:55:11'),(334,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/1','2020-07-30 13:56:08','2020-07-30 13:56:08'),(335,1,1,'admin@gmail.com','113.172.80.127','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/58','2020-07-30 13:56:15','2020-07-30 13:56:15'),(336,1,1,'admin@gmail.com','113.172.81.45','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Users.login.successed','Users','Login success','2020-08-03 14:39:36','2020-08-03 14:39:36'),(337,1,1,'admin@gmail.com','113.172.8.14','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Users.login.successed','Users','Login success','2020-08-04 10:36:51','2020-08-04 10:36:51'),(338,1,1,'admin@gmail.com','113.172.8.14','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.reorderImage.successed','Products','/acp/products/edit/58','2020-08-04 10:43:36','2020-08-04 10:43:36'),(339,1,1,'admin@gmail.com','113.172.8.14','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.reorderImage.successed','Products','/acp/products/edit/58','2020-08-04 10:43:50','2020-08-04 10:43:50'),(340,1,1,'admin@gmail.com','113.172.8.14','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.reorderImage.successed','Products','/acp/products/edit/58','2020-08-04 10:43:59','2020-08-04 10:43:59'),(341,1,1,'admin@gmail.com','113.172.8.14','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.reorderImage.successed','Products','/acp/products/edit/58','2020-08-04 10:48:10','2020-08-04 10:48:10'),(342,1,1,'admin@gmail.com','113.172.8.14','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.reorderImage.successed','Products','/acp/products/edit/58','2020-08-04 11:19:44','2020-08-04 11:19:44'),(343,1,1,'admin@gmail.com','113.172.8.14','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.reorderImage.successed','Products','/acp/products/edit/58','2020-08-04 11:25:54','2020-08-04 11:25:54'),(344,1,1,'admin@gmail.com','113.172.8.14','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Products.reorderImage.successed','Products','/acp/products/edit/58','2020-08-04 11:25:56','2020-08-04 11:25:56'),(345,6,1,'hoangvu6296@gmail.com','113.172.2.196','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Users.login.successed','Users','Login success','2020-08-10 14:28:15','2020-08-10 14:28:15'),(346,6,1,'hoangvu6296@gmail.com','113.172.2.196','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Articles.add.successed','Articles','/acp/articles/edit/3','2020-08-10 14:43:16','2020-08-10 14:43:16'),(347,6,1,'hoangvu6296@gmail.com','113.172.2.196','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','Articles.edit.successed','Articles','/acp/articles/edit/2','2020-08-10 14:43:37','2020-08-10 14:43:37'),(348,6,1,'hoangvu6296@gmail.com','113.172.66.73','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36','Users.login.successed','Users','Login success','2020-08-21 10:47:21','2020-08-21 10:47:21'),(349,6,1,'hoangvu6296@gmail.com','113.172.66.73','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/56','2020-08-21 10:48:08','2020-08-21 10:48:08'),(350,6,1,'hoangvu6296@gmail.com','113.172.66.73','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/56','2020-08-21 10:48:38','2020-08-21 10:48:38'),(351,5,1,'anhfighter@gmail.com','72.235.46.51','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36','Users.login.successed','Users','Login success','2020-08-24 14:41:52','2020-08-24 14:41:52'),(352,6,1,'hoangvu6296@gmail.com','113.172.1.218','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36','Users.login.successed','Users','Login success','2020-08-24 14:47:47','2020-08-24 14:47:47'),(353,6,1,'hoangvu6296@gmail.com','113.172.1.218','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36','Users.login.successed','Users','Login success','2020-08-24 14:58:45','2020-08-24 14:58:45'),(354,1,1,'admin@gmail.com','14.186.105.29','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36','Users.login.successed','Users','Login success','2020-08-25 10:40:58','2020-08-25 10:40:58'),(355,1,1,'admin@gmail.com','14.186.105.29','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36','Products.copy.successed','Products','/acp/products/edit/59','2020-08-25 11:00:03','2020-08-25 11:00:03'),(356,6,1,'hoangvu6296@gmail.com','113.172.69.136','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36','Users.login.successed','Users','Login success','2020-09-01 10:51:21','2020-09-01 10:51:21'),(357,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36','Users.login.successed','Users','Login success','2020-09-01 10:54:22','2020-09-01 10:54:22'),(358,1,1,'admin@gmail.com','113.172.69.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','Users.login.successed','Users','Login success','2020-09-11 17:20:37','2020-09-11 17:20:37'),(359,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-24 08:54:18','2020-09-24 08:54:18'),(360,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-24 11:41:53','2020-09-24 11:41:53'),(361,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-26 06:36:19','2020-09-26 06:36:19'),(362,1,1,'admin@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-26 11:31:52','2020-09-26 11:31:52'),(363,1,1,'admin@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/59','2020-09-26 11:35:46','2020-09-26 11:35:46'),(364,1,1,'admin@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/59','2020-09-26 11:39:44','2020-09-26 11:39:44'),(365,1,1,'admin@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/59','2020-09-26 11:40:06','2020-09-26 11:40:06'),(366,1,1,'admin@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Products.edit.successed','Products','/acp/products/edit/59','2020-09-26 11:40:40','2020-09-26 11:40:40'),(367,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-26 11:56:36','2020-09-26 11:56:36'),(368,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-26 16:12:52','2020-09-26 16:12:52'),(369,1,1,'admin@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 10:59:18','2020-09-27 10:59:18'),(370,6,1,'hoangvu6296@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 13:26:09','2020-09-27 13:26:09'),(371,6,1,'hoangvu6296@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 13:28:06','2020-09-27 13:28:06'),(372,6,1,'hoangvu6296@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 13:31:14','2020-09-27 13:31:14'),(373,6,1,'hoangvu6296@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 13:44:00','2020-09-27 13:44:00'),(374,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 13:50:35','2020-09-27 13:50:35'),(375,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.logoutByEmail.successed','Users','/acp/users/edit/5','2020-09-27 13:50:53','2020-09-27 13:50:53'),(376,1,1,'admin@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 13:57:00','2020-09-27 13:57:00'),(377,6,1,'hoangvu6296@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 14:00:47','2020-09-27 14:00:47'),(378,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 14:38:50','2020-09-27 14:38:50'),(379,1,1,'admin@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 16:09:57','2020-09-27 16:09:57'),(380,1,1,'admin@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 16:10:14','2020-09-27 16:10:14'),(381,6,1,'hoangvu6296@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 16:11:53','2020-09-27 16:11:53'),(382,1,1,'admin@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 16:12:25','2020-09-27 16:12:25'),(383,1,1,'admin@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 16:12:57','2020-09-27 16:12:57'),(384,6,1,'hoangvu6296@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 16:27:50','2020-09-27 16:27:50'),(385,6,1,'hoangvu6296@gmail.com','14.187.220.229','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-09-27 16:28:33','2020-09-27 16:28:33'),(386,1,1,'admin@gmail.com','113.172.87.156','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-10-01 11:03:45','2020-10-01 11:03:45'),(387,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-10-06 15:24:52','2020-10-06 15:24:52'),(388,1,1,'admin@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-10-07 03:08:32','2020-10-07 03:08:32'),(389,1,1,'admin@gmail.com','108.77.196.28','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36','Users.login.successed','Users','Login success','2020-10-07 03:13:47','2020-10-07 03:13:47'),(390,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.80 Safari/537.36','Users.login.successed','Users','Login success','2020-10-17 15:14:39','2020-10-17 15:14:39'),(391,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Users.login.successed','Users','Login success','2020-11-11 13:17:24','2020-11-11 13:17:24'),(392,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Products.import.successed','Products','/acp/products/edit/60','2020-11-11 13:39:38','2020-11-11 13:39:38'),(393,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Products.import.successed','Products','/acp/products/edit/63','2020-11-11 14:05:59','2020-11-11 14:05:59'),(394,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Products.import.successed','Products','/acp/products/edit/64','2020-11-11 14:09:15','2020-11-11 14:09:15'),(395,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Products.import.successed','Products','/acp/products/edit/65','2020-11-11 14:10:32','2020-11-11 14:10:32'),(396,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Products.import.successed','Products','/acp/products/edit/66','2020-11-11 14:12:21','2020-11-11 14:12:21'),(397,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Products.import.successed','Products','/acp/products/edit/67','2020-11-11 14:14:28','2020-11-11 14:14:28'),(398,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Products.import.successed','Products','/acp/products/edit/68','2020-11-11 14:16:48','2020-11-11 14:16:48'),(399,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Products.import.successed','Products','/acp/products/edit/69','2020-11-11 14:17:21','2020-11-11 14:17:21'),(400,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Products.import.successed','Products','/acp/products/edit/70','2020-11-11 14:18:26','2020-11-11 14:18:26'),(401,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Products.import.successed','Products','/acp/products/edit/71','2020-11-11 14:19:03','2020-11-11 14:19:03'),(402,1,1,'admin@gmail.com','14.187.170.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36','Products.import.successed','Products','/acp/products/edit/72','2020-11-11 14:53:45','2020-11-11 14:53:45'),(403,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Users.login.successed','Users','Login success','2020-11-12 10:29:41','2020-11-12 10:29:41'),(404,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/73','2020-11-12 11:48:48','2020-11-12 11:48:48'),(405,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/74','2020-11-12 11:49:36','2020-11-12 11:49:36'),(406,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/75','2020-11-12 11:53:52','2020-11-12 11:53:52'),(407,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/76','2020-11-12 11:55:09','2020-11-12 11:55:09'),(408,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/77','2020-11-12 11:55:44','2020-11-12 11:55:44'),(409,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/78','2020-11-12 11:56:20','2020-11-12 11:56:20'),(410,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/79','2020-11-12 14:20:56','2020-11-12 14:20:56'),(411,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/80','2020-11-12 14:22:04','2020-11-12 14:22:04'),(412,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/81','2020-11-12 14:24:49','2020-11-12 14:24:49'),(413,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/82','2020-11-12 14:26:02','2020-11-12 14:26:02'),(414,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/83','2020-11-12 14:26:58','2020-11-12 14:26:58'),(415,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/84','2020-11-12 14:28:46','2020-11-12 14:28:46'),(416,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/85','2020-11-12 14:29:24','2020-11-12 14:29:24'),(417,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/86','2020-11-12 14:32:47','2020-11-12 14:32:47'),(418,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/87','2020-11-12 14:32:47','2020-11-12 14:32:47'),(419,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/88','2020-11-12 14:35:17','2020-11-12 14:35:17'),(420,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/89','2020-11-12 14:35:18','2020-11-12 14:35:18'),(421,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/90','2020-11-12 14:36:15','2020-11-12 14:36:15'),(422,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/91','2020-11-12 14:36:16','2020-11-12 14:36:16'),(423,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/92','2020-11-12 14:38:00','2020-11-12 14:38:00'),(424,1,1,'admin@gmail.com','113.172.86.70','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Products.import.successed','Products','/acp/products/edit/93','2020-11-12 14:38:00','2020-11-12 14:38:00'),(425,1,1,'admin@gmail.com','113.172.3.222','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Users.login.successed','Users','Login success','2020-11-23 15:00:33','2020-11-23 15:00:33'),(426,1,1,'admin@gmail.com','113.172.20.13','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Users.login.successed','Users','Login success','2020-11-26 11:40:38','2020-11-26 11:40:38'),(427,1,1,'admin@gmail.com','113.172.20.13','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Users.login.successed','Users','Login success','2020-11-26 11:56:29','2020-11-26 11:56:29'),(428,1,1,'admin@gmail.com','113.172.20.13','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Users.login.successed','Users','Login success','2020-11-26 12:00:52','2020-11-26 12:00:52'),(429,1,1,'admin@gmail.com','113.172.20.13','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','Users.login.successed','Users','Login success','2020-11-26 12:04:21','2020-11-26 12:04:21'),(430,1,1,'admin@gmail.com','113.172.79.193','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.login.successed','Users','Login success','2020-12-11 14:29:33','2020-12-11 14:29:33'),(431,1,1,'admin@gmail.com','113.172.79.193','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.login.successed','Users','Login success','2020-12-11 14:45:44','2020-12-11 14:45:44'),(432,1,1,'admin@gmail.com','113.172.79.193','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.login.successed','Users','Login success','2020-12-11 15:19:27','2020-12-11 15:19:27'),(433,1,1,'admin@gmail.com','14.186.126.25','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.login.successed','Users','Login success','2020-12-24 16:42:57','2020-12-24 16:42:57'),(434,1,1,'admin@gmail.com','14.186.126.25','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.login.successed','Users','Login success','2020-12-24 17:02:44','2020-12-24 17:02:44'),(435,1,1,'admin@gmail.com','14.186.126.25','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.add.successed','Users','/acp/users/edit/9','2020-12-24 17:03:24','2020-12-24 17:03:24'),(436,1,1,'admin@gmail.com','14.186.126.25','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.edit.successed','Users','/acp/users/edit/9','2020-12-24 17:03:40','2020-12-24 17:03:40'),(437,9,1,'demo@demo.com','14.186.126.25','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.login.successed','Users','Login success','2020-12-24 17:04:02','2020-12-24 17:04:02'),(438,9,1,'demo@demo.com','77.2.71.194','Mozilla/5.0 (iPhone; CPU iPhone OS 14_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.2 Mobile/15E148 Safari/604.1','Users.login.successed','Users','Login success','2020-12-25 06:28:50','2020-12-25 06:28:50'),(439,9,1,'demo@demo.com','77.7.104.199','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.2 Safari/605.1.15','Users.login.successed','Users','Login success','2020-12-25 07:41:02','2020-12-25 07:41:02'),(440,1,1,'admin@gmail.com','1.54.252.243','Mozilla/5.0 (Macintosh; Intel Mac OS X 11_1_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.login.successed','Users','Login success','2020-12-30 09:54:02','2020-12-30 09:54:02'),(441,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 11_1_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.login.successed','Users','Login success','2021-01-04 17:36:11','2021-01-04 17:36:11'),(442,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 11_1_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.updateStatus.successed','Users','/acp/users/edit/9','2021-01-04 17:38:03','2021-01-04 17:38:03'),(443,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 11_1_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.updateStatus.successed','Users','/acp/users/edit/9','2021-01-04 17:38:08','2021-01-04 17:38:08'),(444,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 11_1_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.edit.successed','Users','/acp/users/edit/9','2021-01-04 17:38:14','2021-01-04 17:38:14'),(445,5,1,'anhfighter@gmail.com','72.235.47.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 11_1_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36','Users.login.successed','Users','Login success','2021-01-12 07:51:28','2021-01-12 07:51:28'),(446,1,1,'admin@gmail.com','42.113.188.129','Mozilla/5.0 (Linux; Android 10; Active 3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Mobile Safari/537.36','Users.login.successed','Users','Login success','2021-01-12 07:54:01','2021-01-12 07:54:01'),(447,1,1,'admin@gmail.com','42.113.188.129','Mozilla/5.0 (Linux; Android 10; Active 3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Mobile Safari/537.36','Users.login.successed','Users','Login success','2021-01-12 07:55:15','2021-01-12 07:55:15'),(448,1,1,'admin@gmail.com','14.186.107.53','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','Users.login.successed','Users','Login success','2021-01-12 10:31:34','2021-01-12 10:31:34'),(449,1,1,'admin@gmail.com','113.172.59.252','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Users.login.successed','Users','Login success','2021-05-07 14:47:46','2021-05-07 14:47:46'),(450,1,1,'admin@gmail.com','113.172.59.200','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Users.login.successed','Users','Login success','2021-05-10 10:53:01','2021-05-10 10:53:01'),(451,1,1,'admin@gmail.com','113.172.59.200','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.add.successed','Articles','/~labs/acp/articles/edit/1','2021-05-10 17:54:38','2021-05-10 17:54:38'),(452,1,1,'admin@gmail.com','113.172.59.200','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.add.successed','Articles','/~labs/acp/articles/edit/2','2021-05-10 17:54:51','2021-05-10 17:54:51'),(453,1,1,'admin@gmail.com','113.172.59.200','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.add.successed','Articles','/~labs/acp/articles/edit/3','2021-05-10 17:55:05','2021-05-10 17:55:05'),(454,1,1,'admin@gmail.com','113.172.59.200','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/3','2021-05-10 17:55:23','2021-05-10 17:55:23'),(455,1,1,'admin@gmail.com','113.172.59.200','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/2','2021-05-10 17:55:24','2021-05-10 17:55:24'),(456,1,1,'admin@gmail.com','113.172.59.200','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/1','2021-05-10 17:55:24','2021-05-10 17:55:24'),(457,1,1,'admin@gmail.com','113.172.59.200','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Users.login.successed','Users','Login success','2021-05-10 18:15:11','2021-05-10 18:15:11'),(458,1,1,'admin@gmail.com','113.172.59.200','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Users.login.successed','Users','Login success','2021-05-10 18:39:04','2021-05-10 18:39:04'),(459,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36 Edg/90.0.818.56','Users.login.successed','Users','Login success','2021-05-10 20:41:38','2021-05-10 20:41:38'),(460,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36 Edg/90.0.818.56','Articles.add.successed','Articles','/~labs/acp/articles/edit/4','2021-05-10 20:47:40','2021-05-10 20:47:40'),(461,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36 Edg/90.0.818.56','Articles.add.successed','Articles','/~labs/acp/articles/edit/5','2021-05-10 20:48:21','2021-05-10 20:48:21'),(462,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36 Edg/90.0.818.56','Articles.add.successed','Articles','/~labs/acp/articles/edit/6','2021-05-10 20:49:00','2021-05-10 20:49:00'),(463,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36 Edg/90.0.818.56','Articles.add.successed','Articles','/~labs/acp/articles/edit/7','2021-05-10 20:49:21','2021-05-10 20:49:21'),(464,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36 Edg/90.0.818.56','Articles.edit.successed','Articles','/~labs/acp/articles/edit/7','2021-05-10 20:49:35','2021-05-10 20:49:35'),(465,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36 Edg/90.0.818.56','Articles.add.successed','Articles','/~labs/acp/articles/edit/8','2021-05-10 20:50:00','2021-05-10 20:50:00'),(466,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Users.login.successed','Users','Login success','2021-05-11 10:47:39','2021-05-11 10:47:39'),(467,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Users.login.successed','Users','Login success','2021-05-11 11:17:09','2021-05-11 11:17:09'),(468,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.add.successed','Articles','/~labs/acp/articles/edit/9','2021-05-11 12:20:20','2021-05-11 12:20:20'),(469,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/3','2021-05-11 12:20:26','2021-05-11 12:20:26'),(470,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/9','2021-05-11 12:20:28','2021-05-11 12:20:28'),(471,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.add.successed','Articles','/~labs/acp/articles/edit/10','2021-05-11 12:21:48','2021-05-11 12:21:48'),(472,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/3','2021-05-11 14:08:55','2021-05-11 14:08:55'),(473,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.edit.successed','Articles','/~labs/acp/articles/edit/4','2021-05-11 16:43:17','2021-05-11 16:43:17'),(474,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.edit.successed','Articles','/~labs/acp/articles/edit/7','2021-05-11 17:12:00','2021-05-11 17:12:00'),(475,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.edit.successed','Articles','/~labs/acp/articles/edit/7','2021-05-11 17:12:40','2021-05-11 17:12:40'),(476,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.edit.successed','Articles','/~labs/acp/articles/edit/8','2021-05-11 17:13:19','2021-05-11 17:13:19'),(477,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.edit.successed','Articles','/~labs/acp/articles/edit/3','2021-05-11 17:15:31','2021-05-11 17:15:31'),(478,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.edit.successed','Articles','/~labs/acp/articles/edit/3','2021-05-11 17:15:46','2021-05-11 17:15:46'),(479,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.edit.successed','Articles','/~labs/acp/articles/edit/3','2021-05-11 17:19:08','2021-05-11 17:19:08'),(480,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.edit.successed','Articles','/~labs/acp/articles/edit/1','2021-05-11 17:20:08','2021-05-11 17:20:08'),(481,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Articles.edit.successed','Articles','/~labs/acp/articles/edit/2','2021-05-11 17:20:26','2021-05-11 17:20:26'),(482,1,1,'admin@gmail.com','113.172.51.207','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','Users.login.successed','Users','Login success','2021-05-11 18:12:37','2021-05-11 18:12:37'),(483,1,1,'admin@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36','Users.login.successed','Users','Login success','2021-05-11 23:23:22','2021-05-11 23:23:22'),(484,5,1,'anhfighter@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','Users.login.successed','Users','Login success','2021-05-14 09:21:11','2021-05-14 09:21:11'),(485,1,1,'admin@gmail.com','64.203.226.128','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','Users.login.successed','Users','Login success','2021-05-14 09:43:48','2021-05-14 09:43:48'),(486,1,1,'admin@gmail.com','113.172.93.44','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','Users.login.successed','Users','Login success','2021-05-14 10:43:25','2021-05-14 10:43:25'),(487,1,1,'admin@gmail.com','64.203.226.128','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','Users.login.successed','Users','Login success','2021-05-19 04:48:08','2021-05-19 04:48:08'),(488,1,1,'admin@gmail.com','64.203.226.128','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','Users.login.successed','Users','Login success','2021-05-19 06:48:35','2021-05-19 06:48:35'),(489,1,1,'admin@gmail.com','207.5.47.203','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0','Users.login.successed','Users','Login success','2021-05-19 21:20:22','2021-05-19 21:20:22'),(490,1,1,'admin@gmail.com','207.5.47.203','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0','Users.login.successed','Users','Login success','2021-05-20 01:24:49','2021-05-20 01:24:49'),(491,1,1,'admin@gmail.com','207.5.47.203','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0','Users.login.successed','Users','Login success','2021-05-21 03:03:31','2021-05-21 03:03:31'),(492,1,1,'admin@gmail.com','207.5.47.203','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0','Users.login.successed','Users','Login success','2021-05-21 06:16:14','2021-05-21 06:16:14'),(493,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Users.login.successed','Users','Login success','2021-05-24 14:39:08','2021-05-24 14:39:08'),(494,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.add.successed','Articles','/~labs/acp/articles/edit/11','2021-05-24 15:12:06','2021-05-24 15:12:06'),(495,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.add.successed','Articles','/~labs/acp/articles/edit/12','2021-05-24 15:13:12','2021-05-24 15:13:12'),(496,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/3','2021-05-24 15:13:15','2021-05-24 15:13:15'),(497,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/12','2021-05-24 15:13:17','2021-05-24 15:13:17'),(498,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/12','2021-05-24 15:22:19','2021-05-24 15:22:19'),(499,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/3','2021-05-24 15:22:21','2021-05-24 15:22:21'),(500,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/12','2021-05-24 15:22:21','2021-05-24 15:22:21'),(501,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/12','2021-05-24 15:22:29','2021-05-24 15:22:29'),(502,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/3','2021-05-24 15:22:31','2021-05-24 15:22:31'),(503,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/3','2021-05-24 15:22:33','2021-05-24 15:22:33'),(504,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.add.successed','Articles','/~labs/acp/articles/edit/13','2021-05-24 15:30:36','2021-05-24 15:30:36'),(505,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.add.successed','Articles','/~labs/acp/articles/edit/14','2021-05-24 15:32:16','2021-05-24 15:32:16'),(506,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/3','2021-05-24 15:32:22','2021-05-24 15:32:22'),(507,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/14','2021-05-24 15:32:23','2021-05-24 15:32:23'),(508,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/14','2021-05-24 15:32:35','2021-05-24 15:32:35'),(509,1,1,'admin@gmail.com','14.186.67.247','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66','Articles.updateStatus.successed','Articles','/~labs/acp/articles/edit/3','2021-05-24 15:32:37','2021-05-24 15:32:37'),(510,1,1,'admin@gmail.com','73.9.16.179','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0','Users.login.successed','Users','Login success','2021-05-27 20:58:03','2021-05-27 20:58:03'),(511,1,1,'admin@gmail.com','64.203.226.128','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','Users.login.successed','Users','Login success','2021-06-02 03:13:39','2021-06-02 03:13:39'),(512,1,1,'admin@gmail.com','64.203.226.128','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','Users.login.successed','Users','Login success','2021-06-02 03:13:40','2021-06-02 03:13:40'),(513,1,1,'admin@gmail.com','64.203.226.128','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','Articles.edit.successed','Articles','/~labs/acp/articles/edit/8','2021-06-02 03:14:46','2021-06-02 03:14:46'),(514,1,1,'admin@gmail.com','64.203.226.128','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','Articles.edit.successed','Articles','/~labs/acp/articles/edit/8','2021-06-02 03:17:31','2021-06-02 03:17:31'),(515,1,1,'admin@gmail.com','118.71.170.225','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36','Users.login.successed','Users','Login success','2021-09-27 17:31:33','2021-09-27 17:31:33'),(516,6,1,'hoangvu6296@gmail.com','42.118.177.234','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36','Users.login.successed','Users','Login success','2021-10-14 14:33:34','2021-10-14 14:33:34'),(517,1,1,'admin@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36','Users.login.successed','Users','Login success','2021-10-14 14:41:20','2021-10-14 14:41:20'),(518,1,1,'admin@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36','Users.edit.successed','Users','/~cms3/acp/users/edit/2','2021-10-14 14:44:59','2021-10-14 14:44:59'),(519,1,1,'admin@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36','Users.edit.successed','Users','/~cms3/acp/users/edit/8','2021-10-14 14:45:22','2021-10-14 14:45:22'),(520,1,1,'admin@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36','Users.edit.successed','Users','/~cms3/acp/users/edit/7','2021-10-14 14:45:36','2021-10-14 14:45:36'),(521,1,1,'admin@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36','Users.edit.successed','Users','/~cms3/acp/users/edit/1','2021-10-14 14:45:46','2021-10-14 14:45:46'),(522,1,1,'admin@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36','Users.edit.successed','Users','/~cms3/acp/users/edit/2','2021-10-14 14:45:57','2021-10-14 14:45:57'),(523,1,1,'admin@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36','Users.edit.successed','Users','/~cms3/acp/users/edit/3','2021-10-14 14:46:07','2021-10-14 14:46:07'),(524,1,1,'admin@gmail.com','42.118.177.234','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36','Users.login.successed','Users','Login success','2021-10-14 14:46:14','2021-10-14 14:46:14'),(525,1,1,'admin@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36','Users.edit.successed','Users','/~cms3/acp/users/edit/4','2021-10-14 14:46:16','2021-10-14 14:46:16'),(526,1,1,'admin@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36','Users.edit.successed','Users','/~cms3/acp/users/edit/9','2021-10-14 14:46:26','2021-10-14 14:46:26'),(527,5,1,'anhfighter@gmail.com','42.118.177.234','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36','Users.login.successed','Users','Login success','2021-10-14 15:11:54','2021-10-14 15:11:54'),(528,5,1,'anhfighter@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36','Users.login.successed','Users','Login success','2021-10-14 15:12:57','2021-10-14 15:12:57'),(529,5,1,'anhfighter@gmail.com','141.239.246.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36','Users.edit.successed','Users','/~cms3/acp/users/edit/5','2021-10-14 15:13:24','2021-10-14 15:13:24'),(530,1,1,'admin@gmail.com','42.118.177.234','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36','Users.login.successed','Users','Login success','2021-10-14 15:33:37','2021-10-14 15:33:37');
/*!40000 ALTER TABLE `users_logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-14  8:36:02
