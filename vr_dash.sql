/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.17-MariaDB : Database - vr_dash
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vr_dash` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `vr_dash`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `messages` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `short_des` varchar(150) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_user` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_user` bigint(20) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `post` */

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `user_id` bigint(20) NOT NULL,
  `mobile_notifications` tinyint(1) DEFAULT 0,
  `posts` tinyint(1) DEFAULT 0,
  `marketing` tinyint(1) DEFAULT 0,
  `products` tinyint(1) DEFAULT 0,
  `user_managemet` tinyint(1) DEFAULT 0,
  `ecommerce` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_type` */

insert  into `user_type`(`user_id`,`mobile_notifications`,`posts`,`marketing`,`products`,`user_managemet`,`ecommerce`) values 
(21,1,1,1,0,0,0),
(1,1,1,1,1,1,1),
(22,1,1,0,0,0,0);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `type` int(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`img`,`status`,`type`) values 
(1,'admin','admin@gmail.com',NULL,'$2y$10$ndz5326zuHcofuxNXyQQReqpU3PP7f103gYe59r272xJr3h5KVgai',NULL,'2021-05-07 14:41:45','2021-05-07 14:41:45',NULL,1,NULL),
(21,'admin@gmail.com','paraminathasha9@gmail.com',NULL,'$2y$10$qc0X1qNl66WOZqbazS277.EYhBvjR3vMg9cLo3OJQqiKChhbLQAgW',NULL,'2021-05-08 12:52:48','2021-05-08 12:52:48',NULL,1,NULL),
(22,'fsdfdsfds','paraminatsdasdhasha9@gmail.com',NULL,'$2y$10$q2a4UvPo1LTZ1Aesrri7EufF9gq4DYS.XQAGUGEQoNFIf/GlmV2de',NULL,'2021-05-08 14:00:03','2021-05-08 14:00:26','userAdminImage/3zGnTNoFjeLShc01DmzPnUcPn4Pi7kzFGlkc7I25.jpg',1,1);

/*Table structure for table `vr_modules` */

DROP TABLE IF EXISTS `vr_modules`;

CREATE TABLE `vr_modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) DEFAULT 0,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `vr_modules` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
