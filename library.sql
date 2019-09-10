-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departments_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-book-department` (`departments_id`),
  CONSTRAINT `fk-book-department` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `books` (`id`, `title`, `author`, `subject`, `departments_id`, `created_at`, `updated_at`) VALUES
(2,	'Introduction to biology',	'Henry downning',	'Biology',	3,	'2019-08-23 20:13:04',	'2019-08-23 20:13:04'),
(3,	'Physics simplified',	'Abbot McMoth',	'Physics',	1,	'2019-08-23 20:13:41',	'2019-08-23 20:13:41'),
(4,	'North American Geography',	'Nells Amanya',	'Geography',	7,	'2019-08-23 20:14:50',	'2019-08-23 20:14:50'),
(5,	'Norwegian Gods',	'Thor',	'History',	14,	'2019-08-23 20:29:51',	'2019-08-23 20:29:51'),
(6,	'Geography of Dubai',	'Melik Ashank',	'Geography',	7,	'2019-08-24 00:34:59',	'2019-08-24 00:34:59'),
(7,	'Geography simplified',	'Kamwesi',	'Geography',	7,	'2019-08-24 07:57:37',	'2019-08-24 07:57:37');

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'N/A',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(2,	'Senior 1',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(3,	'Senior 2',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(4,	'Senior 3',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(5,	'Senior 4',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(6,	'Senior 5',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(7,	'Senior 6',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36');

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Physics Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(2,	'Chemistry Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(3,	'Biology Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(4,	'Literature Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(5,	'Agriculture Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(6,	'Mathematics Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(7,	'Geography Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(8,	'History Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(9,	'Business Studies Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(10,	'Home Economics Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(11,	'Languages Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(12,	'Technical Drawing Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(13,	'Computing Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(14,	'Religious Studies Department',	'2019-08-13 17:16:36',	'2019-08-13 17:16:36'),
(15,	'Librarian',	NULL,	NULL),
(16,	'Student',	NULL,	NULL),
(17,	'Teaching staff-Physics Department',	NULL,	NULL),
(18,	'Teaching staff-Chemistry Department',	NULL,	NULL),
(19,	'Teaching staff-Biology Department',	NULL,	NULL),
(20,	'Teaching staff-Literature Department',	NULL,	NULL),
(21,	'Teaching staff-Agriculture Department',	NULL,	NULL),
(22,	'Teaching staff-Mathematics Department',	NULL,	NULL),
(23,	'Teaching staff-Geography Department',	NULL,	NULL),
(24,	'Teaching staff-History Department',	NULL,	NULL),
(25,	'Teaching staff-Business Studies Department',	NULL,	NULL),
(26,	'Teaching staff-Home Economics Department',	NULL,	NULL),
(27,	'Teaching staff-Languages Department',	NULL,	NULL),
(28,	'Teaching staff-Technical Drawing Department',	NULL,	NULL),
(29,	'Teaching staff-Computing Department',	NULL,	NULL),
(30,	'Teaching staff-Religious Studies Department',	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_07_24_181519_create_dp_table',	1),
(4,	'2019_08_09_061340_create_roles_table',	1),
(5,	'2019_08_09_061735_create_books_table',	1),
(6,	'2019_08_09_062051_create_classes_table',	1),
(7,	'2019_08_09_062223_create_departments_table',	1),
(8,	'2019_08_09_062225_create_user_departments_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `profilepicture`;
CREATE TABLE `profilepicture` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `profilepicture` (`id`, `user_id`, `url`, `active`, `created_at`, `updated_at`) VALUES
(3,	12,	'public/img/dps/12.jpg',	1,	NULL,	NULL);

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'librarian',	'2019-08-13 17:16:35',	'2019-08-13 17:16:35'),
(2,	'teacher',	'2019-08-13 17:16:35',	'2019-08-13 17:16:35'),
(3,	'student',	'2019-08-13 17:16:35',	'2019-08-13 17:16:35');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classes_id` bigint(20) unsigned NOT NULL,
  `roles_id` bigint(20) unsigned NOT NULL,
  `user_departments_id` bigint(20) unsigned NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_roles_id_foreign` (`roles_id`),
  KEY `users_classes_id_foreign` (`classes_id`),
  CONSTRAINT `users_classes_id_foreign` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`id`),
  CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `username`, `fName`, `lName`, `gender`, `classes_id`, `roles_id`, `user_departments_id`, `password`, `created_at`, `updated_at`) VALUES
(11,	'mukronny',	'Mukasa',	'Ronald',	'male',	1,	2,	1,	'$2y$10$DRHNdv0aAyHmfYB.ULFX9OwdG12a9uMvYmHy52dlouhJnI0ZK9U6i',	'2019-08-23 17:10:11',	'2019-08-23 17:39:47'),
(12,	'podolski',	'Lukas',	'Podolski',	'male',	1,	1,	15,	'$2y$10$ymDdPjloYErPaGSRCa6NkeNts9aU1JKCwwSeFvT.eP7pzFQ3r/1Lu',	'2019-08-23 18:12:17',	'2019-08-23 18:12:17'),
(14,	'llyagoba',	'Lambert',	'Lyagoba',	'male',	1,	2,	28,	'$2y$10$5LVvL0mDs6zvhTRkY747PeF/3TYA5P2e4RcMDvjKTKAG7R1lBG41y',	'2019-08-24 00:39:43',	'2019-08-24 00:39:43'),
(15,	'lPatricia',	'Lunkuse',	'Patricia',	'female',	1,	2,	30,	'$2y$10$TicZjfIkuHVqaZZbxprRsOcsnDOUNd5qY0dwZhi7BBVv4rlaHFSey',	'2019-08-24 00:40:09',	'2019-08-24 00:40:09'),
(16,	'kLutaaya',	'Kakande',	'Lutaaya',	'male',	1,	2,	28,	'$2y$10$xj6E4Zd7SRn97O93HWiwIOy9nnfvI5heF.ZUFB1ujG3emlfpVO6O2',	'2019-08-24 00:40:43',	'2019-08-24 00:40:43'),
(17,	'rnakajimu',	'Rebecca',	'Nakajimu',	'female',	1,	2,	23,	'$2y$10$UkKavGu6R8d2am.tkIXZ/OE.s0cTdfPvNOC5dhthuQwNZNCEQzQ9m',	'2019-08-24 00:42:35',	'2019-08-24 00:42:35'),
(18,	'rinnocent',	'Rwothomio',	'Innocent',	'male',	1,	2,	27,	'$2y$10$YG2sqF1mXo3qOz6YidzrnuUPgqGti16BNcAQDlUIX13OREpgXG2IG',	'2019-08-24 00:43:12',	'2019-08-24 00:43:12'),
(19,	'mdidi',	'Munyakazi',	'Didier',	'male',	1,	2,	24,	'$2y$10$pUSC6wxXAjk8K557yeFi0.sFbvJDfC8GJbhMWUoJhs.mvnmpsq6Di',	'2019-08-24 00:43:47',	'2019-08-24 00:43:47'),
(20,	'rokello',	'Rebecca',	'Okello',	'female',	6,	3,	16,	'$2y$10$f9uKq8W9IGxebrpP45.i1evK9FkIN969vTc6Nhem1S0I7iF9jVTi6',	'2019-08-24 00:45:29',	'2019-08-26 21:54:18'),
(22,	'ajoshua',	'Joshua',	'Absa',	'male',	6,	3,	16,	'$2y$10$gJSiytLetSJvm3F1l5KZZOEFINWnh6g2kNNOEiQWPHosy1bblpIE.',	'2019-08-24 07:54:53',	'2019-08-24 07:54:53'),
(23,	'mpaul',	'Mukalazi',	'Paul',	'male',	1,	2,	26,	'$2y$10$.oDFjrrYKDKEzaOzp4J0BORATC7LmuFPNPuGgt8QfIBNDL/tav4OG',	'2019-08-24 07:56:40',	'2019-08-24 07:56:40'),
(24,	'lNamagembe',	'Lauryn',	'Namagembe',	'female',	2,	3,	16,	'$2y$10$vRJxCt6spirMmU3LooMz0ewnh0/uFdDdCjKCicSw1fbBY96yyRd8W',	'2019-08-25 13:08:28',	'2019-08-25 13:08:28'),
(25,	'bNakazibwe',	'Barbra',	'Nakazibwe',	'female',	7,	3,	16,	'$2y$10$Ic.QdnMoxzF6Xp5O/BDbxuh1cec6t5CadwrP/nhQupuh4LevMsPqu',	'2019-08-25 13:15:17',	'2019-08-25 13:15:17'),
(26,	'graceMary',	'Nambooze',	'Grace Mary',	'female',	4,	3,	16,	'$2y$10$L75zOxAd.DaZUTbeOuPNiu.BJ0i9UxyqTqEcWK4gGr.4IOiMaRRJ.',	'2019-08-25 13:17:38',	'2019-08-25 13:17:38'),
(27,	'primNansubuga',	'Prim Rose',	'Nansubuga',	'female',	6,	3,	16,	'$2y$10$bIURN0LMmPo/hg5SEo4MKup1/aK354FokXrKkdw7Ist2ntUqccYUW',	'2019-08-25 13:27:08',	'2019-08-25 13:27:08'),
(28,	'mjackson',	'Jackson',	'Majwega',	'male',	6,	3,	16,	'$2y$10$AFK64EDzOICBfOi/QBC8pue7u9428HhT7T2OnTTe08hCBLfOBWY/u',	'2019-08-25 15:22:44',	'2019-08-25 15:22:44'),
(29,	'rmelissa',	'Rebecca Melisa',	'Nakitandwe',	'female',	1,	2,	20,	'$2y$10$/MyelLzDWASv5NGFB0EfgeR9285ydjulje8plFnBtwODgYEnaND6y',	'2019-08-25 16:45:56',	'2019-08-25 16:45:56');

DROP TABLE IF EXISTS `user_departments`;
CREATE TABLE `user_departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2019-09-10 21:00:52
