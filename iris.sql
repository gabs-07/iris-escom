-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         9.0.1 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para irisfepi
CREATE DATABASE IF NOT EXISTS `irisfepi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `irisfepi`;

-- Volcando estructura para tabla irisfepi.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.cache: ~28 rows (aproximadamente)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-0716d9708d321ffb6a00818614779e779925365c', 'i:1;', 1780849039),
	('laravel-cache-0716d9708d321ffb6a00818614779e779925365c:timer', 'i:1780849039;', 1780849039),
	('laravel-cache-0ade7c2cf97f75d009975f4d720d1fa6c19f4897', 'i:2;', 1780633751),
	('laravel-cache-0ade7c2cf97f75d009975f4d720d1fa6c19f4897:timer', 'i:1780633751;', 1780633751),
	('laravel-cache-1574bddb75c78a6fd2251d61e2993b5146201319', 'i:1;', 1780814591),
	('laravel-cache-1574bddb75c78a6fd2251d61e2993b5146201319:timer', 'i:1780814591;', 1780814591),
	('laravel-cache-17ba0791499db908433b80f37c5fbc89b870084b', 'i:1;', 1780759269),
	('laravel-cache-17ba0791499db908433b80f37c5fbc89b870084b:timer', 'i:1780759269;', 1780759269),
	('laravel-cache-1b6453892473a467d07372d45eb05abc2031647a', 'i:1;', 1780582206),
	('laravel-cache-1b6453892473a467d07372d45eb05abc2031647a:timer', 'i:1780582206;', 1780582206),
	('laravel-cache-7b52009b64fd0a2a49e6d8a939753077792b0554', 'i:1;', 1780637684),
	('laravel-cache-7b52009b64fd0a2a49e6d8a939753077792b0554:timer', 'i:1780637684;', 1780637684),
	('laravel-cache-902ba3cda1883801594b6e1b452790cc53948fda', 'i:1;', 1780627137),
	('laravel-cache-902ba3cda1883801594b6e1b452790cc53948fda:timer', 'i:1780627136;', 1780627136),
	('laravel-cache-ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', 'i:2;', 1780625595),
	('laravel-cache-ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4:timer', 'i:1780625595;', 1780625595),
	('laravel-cache-b1d5781111d84f7b3fe45a0852e59758cd7a87e5', 'i:3;', 1780637428),
	('laravel-cache-b1d5781111d84f7b3fe45a0852e59758cd7a87e5:timer', 'i:1780637428;', 1780637428),
	('laravel-cache-bd307a3ec329e10a2cff8fb87480823da114f8f4', 'i:1;', 1780775278),
	('laravel-cache-bd307a3ec329e10a2cff8fb87480823da114f8f4:timer', 'i:1780775278;', 1780775278),
	('laravel-cache-c1dfd96eea8cc2b62785275bca38ac261256e278', 'i:2;', 1780626786),
	('laravel-cache-c1dfd96eea8cc2b62785275bca38ac261256e278:timer', 'i:1780626786;', 1780626786),
	('laravel-cache-checo_stark@hotmail.com|127.0.0.1', 'i:1;', 1780625666),
	('laravel-cache-checo_stark@hotmail.com|127.0.0.1:timer', 'i:1780625666;', 1780625666),
	('laravel-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1780580904),
	('laravel-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1780580903;', 1780580904),
	('laravel-cache-es0801@gmail.com|127.0.0.1', 'i:2;', 1780844713),
	('laravel-cache-es0801@gmail.com|127.0.0.1:timer', 'i:1780844713;', 1780844713),
	('laravel-cache-estr801@gmail.com|127.0.0.1', 'i:2;', 1780844694),
	('laravel-cache-estr801@gmail.com|127.0.0.1:timer', 'i:1780844694;', 1780844694),
	('laravel-cache-estrel20801@gmail.com|127.0.0.1', 'i:1;', 1780844678),
	('laravel-cache-estrel20801@gmail.com|127.0.0.1:timer', 'i:1780844678;', 1780844678),
	('laravel-cache-estrella120801@gmail.comk|127.0.0.1', 'i:1;', 1780845219),
	('laravel-cache-estrella120801@gmail.comk|127.0.0.1:timer', 'i:1780845219;', 1780845219),
	('laravel-cache-estrella12pp0801@gmail.com|127.0.0.1', 'i:1;', 1780845271),
	('laravel-cache-estrella12pp0801@gmail.com|127.0.0.1:timer', 'i:1780845271;', 1780845271),
	('laravel-cache-estrella1oo20801@gmail.com|127.0.0.1', 'i:1;', 1780845256),
	('laravel-cache-estrella1oo20801@gmail.com|127.0.0.1:timer', 'i:1780845256;', 1780845256),
	('laravel-cache-f1abd670358e036c31296e66b3b66c382ac00812', 'i:1;', 1780814575),
	('laravel-cache-f1abd670358e036c31296e66b3b66c382ac00812:timer', 'i:1780814575;', 1780814575),
	('laravel-cache-fa35e192121eabf3dabf9f5ea6abdbcbc107ac3b', 'i:1;', 1780793088),
	('laravel-cache-fa35e192121eabf3dabf9f5ea6abdbcbc107ac3b:timer', 'i:1780793088;', 1780793088),
	('laravel-cache-fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f', 'i:1;', 1780633438),
	('laravel-cache-fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f:timer', 'i:1780633438;', 1780633438);

-- Volcando estructura para tabla irisfepi.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.cache_locks: ~0 rows (aproximadamente)

-- Volcando estructura para tabla irisfepi.chats
CREATE TABLE IF NOT EXISTS `chats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` bigint unsigned NOT NULL,
  `recipient_id` bigint unsigned NOT NULL,
  `requested_by_id` bigint unsigned NOT NULL,
  `status` enum('pending','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `accepted_by_id` bigint unsigned DEFAULT NULL,
  `rejected_by_id` bigint unsigned DEFAULT NULL,
  `accepted_at` timestamp NULL DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chats_recipient_id_foreign` (`recipient_id`),
  KEY `chats_requested_by_id_foreign` (`requested_by_id`),
  KEY `chats_accepted_by_id_foreign` (`accepted_by_id`),
  KEY `chats_rejected_by_id_foreign` (`rejected_by_id`),
  KEY `chats_sender_id_recipient_id_index` (`sender_id`,`recipient_id`),
  CONSTRAINT `chats_accepted_by_id_foreign` FOREIGN KEY (`accepted_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `chats_recipient_id_foreign` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chats_rejected_by_id_foreign` FOREIGN KEY (`rejected_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `chats_requested_by_id_foreign` FOREIGN KEY (`requested_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chats_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.chats: ~3 rows (aproximadamente)
INSERT INTO `chats` (`id`, `sender_id`, `recipient_id`, `requested_by_id`, `status`, `accepted_by_id`, `rejected_by_id`, `accepted_at`, `rejected_at`, `created_at`, `updated_at`) VALUES
	(10, 10, 11, 10, 'accepted', 11, NULL, '2026-06-05 11:46:44', NULL, '2026-06-05 11:45:42', '2026-06-05 11:46:44'),
	(11, 10, 12, 10, 'accepted', 12, NULL, '2026-06-07 06:51:58', NULL, '2026-06-05 11:46:09', '2026-06-07 06:51:58'),
	(12, 12, 11, 12, 'accepted', 11, NULL, '2026-06-07 06:54:06', NULL, '2026-06-07 06:53:03', '2026-06-07 06:54:06');

-- Volcando estructura para tabla irisfepi.chat_messages
CREATE TABLE IF NOT EXISTS `chat_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `chat_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_messages_user_id_foreign` (`user_id`),
  KEY `chat_messages_chat_id_created_at_index` (`chat_id`,`created_at`),
  CONSTRAINT `chat_messages_chat_id_foreign` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chat_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.chat_messages: ~6 rows (aproximadamente)
INSERT INTO `chat_messages` (`id`, `chat_id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
	(16, 10, 10, 'hola cid', '2026-06-05 11:45:42', '2026-06-05 11:45:42'),
	(17, 11, 10, 'hola estrella', '2026-06-05 11:46:09', '2026-06-05 11:46:09'),
	(18, 11, 10, 'holas', '2026-06-05 11:46:19', '2026-06-05 11:46:19'),
	(19, 10, 11, 'hola ruiz', '2026-06-05 11:47:05', '2026-06-05 11:47:05'),
	(20, 12, 12, 'hola', '2026-06-07 06:53:03', '2026-06-07 06:53:03'),
	(21, 12, 11, 'Hola padre', '2026-06-07 06:54:18', '2026-06-07 06:54:18');

-- Volcando estructura para tabla irisfepi.comentario_publicaciones
CREATE TABLE IF NOT EXISTS `comentario_publicaciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `publicacion_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comentario_publicaciones_publicacion_id_foreign` (`publicacion_id`),
  KEY `comentario_publicaciones_user_id_foreign` (`user_id`),
  CONSTRAINT `comentario_publicaciones_publicacion_id_foreign` FOREIGN KEY (`publicacion_id`) REFERENCES `publicaciones` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comentario_publicaciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.comentario_publicaciones: ~8 rows (aproximadamente)
INSERT INTO `comentario_publicaciones` (`id`, `publicacion_id`, `user_id`, `contenido`, `created_at`, `updated_at`) VALUES
	(2, 2, 11, 'no seas grosero', '2026-06-06 21:20:49', '2026-06-06 21:20:49'),
	(4, 5, 10, 'bien y tu carnalito ??', '2026-06-06 21:39:24', '2026-06-06 21:39:24'),
	(5, 5, 12, 'Yo tambein ando  bien banda', '2026-06-06 21:42:30', '2026-06-06 21:42:30'),
	(6, 6, 11, 'cundo quieras bro', '2026-06-06 21:43:46', '2026-06-06 21:43:46'),
	(7, 7, 12, 'Hola, como estas ???', '2026-06-06 21:49:31', '2026-06-06 21:49:31'),
	(8, 8, 11, 'Hola amigo, como estas ??', '2026-06-06 21:51:41', '2026-06-06 21:51:41'),
	(9, 8, 12, 'Hola Gabriel.', '2026-06-06 22:03:56', '2026-06-06 22:03:56'),
	(10, 7, 13, 'hola, yo puedo ofecer mis servicios', '2026-06-07 05:25:58', '2026-06-07 05:25:58'),
	(11, 5, 13, 'Hola Gabril Cid', '2026-06-07 05:27:02', '2026-06-07 05:27:02');

-- Volcando estructura para tabla irisfepi.diarios
CREATE TABLE IF NOT EXISTS `diarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `fecha` date NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `emoji` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 0xF09F9890,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `diarios_user_id_fecha_unique` (`user_id`,`fecha`),
  CONSTRAINT `diarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.diarios: ~3 rows (aproximadamente)
INSERT INTO `diarios` (`id`, `user_id`, `fecha`, `contenido`, `emoji`, `created_at`, `updated_at`) VALUES
	(3, 12, '2026-06-05', 'me siento mal', '😐', '2026-06-05 11:34:07', '2026-06-05 11:34:07'),
	(4, 10, '2026-06-05', 'test de diario', '😐', '2026-06-05 18:38:13', '2026-06-05 18:38:13'),
	(5, 10, '2026-06-06', 'hoy creo que amaneci bien el dia de hoy', '😐', '2026-06-06 21:09:54', '2026-06-06 21:09:54'),
	(6, 12, '2026-06-07', 'Ya quiero llenar mi diario', '😐', '2026-06-07 06:51:44', '2026-06-07 06:51:44'),
	(7, 17, '2026-06-06', 'Me siento bie', '😄', '2026-06-08 00:15:22', '2026-06-08 00:15:22'),
	(8, 17, '2026-06-07', 'Me siento bien, conmigo mismo', '😄', '2026-06-08 00:19:16', '2026-06-08 00:19:16');

-- Volcando estructura para tabla irisfepi.doctor_patient
CREATE TABLE IF NOT EXISTS `doctor_patient` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` bigint unsigned NOT NULL,
  `doctor_id` bigint unsigned NOT NULL,
  `status` enum('pending','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `requested_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `responded_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `doctor_patient_patient_id_doctor_id_unique` (`patient_id`,`doctor_id`),
  KEY `doctor_patient_doctor_id_foreign` (`doctor_id`),
  CONSTRAINT `doctor_patient_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `doctor_patient_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.doctor_patient: ~0 rows (aproximadamente)
INSERT INTO `doctor_patient` (`id`, `patient_id`, `doctor_id`, `status`, `requested_at`, `responded_at`, `created_at`, `updated_at`) VALUES
	(1, 11, 15, 'accepted', '2026-06-07 07:46:38', '2026-06-07 13:46:55', '2026-06-07 13:46:38', '2026-06-07 13:46:55');

-- Volcando estructura para tabla irisfepi.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla irisfepi.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.jobs: ~2 rows (aproximadamente)
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
	(1, 'default', '{"uuid":"518bae23-1974-4f78-812e-962a7b188e09","displayName":"App\\\\Notifications\\\\NuevoComentarioEnPublicacion","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"deleteWhenMissingModels":false,"data":{"commandName":"Illuminate\\\\Notifications\\\\SendQueuedNotifications","command":"O:48:\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\":3:{s:11:\\"notifiables\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":5:{s:5:\\"class\\";s:15:\\"App\\\\Models\\\\User\\";s:2:\\"id\\";a:1:{i:0;i:11;}s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";s:15:\\"collectionClass\\";N;}s:12:\\"notification\\";O:46:\\"App\\\\Notifications\\\\NuevoComentarioEnPublicacion\\":2:{s:58:\\"\\u0000App\\\\Notifications\\\\NuevoComentarioEnPublicacion\\u0000comentario\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":5:{s:5:\\"class\\";s:32:\\"App\\\\Models\\\\ComentarioPublicacion\\";s:2:\\"id\\";i:4;s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";s:15:\\"collectionClass\\";N;}s:2:\\"id\\";s:36:\\"2a56dcf4-b0d2-42bc-b175-b4bf424491f8\\";}s:8:\\"channels\\";a:1:{i:0;s:4:\\"mail\\";}}","batchId":null},"createdAt":1780760365,"delay":null}', 0, NULL, 1780760365, 1780760365),
	(2, 'default', '{"uuid":"8aab2772-091d-49df-9b2a-2cc8792c0369","displayName":"App\\\\Notifications\\\\NuevoComentarioEnPublicacion","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"deleteWhenMissingModels":false,"data":{"commandName":"Illuminate\\\\Notifications\\\\SendQueuedNotifications","command":"O:48:\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\":3:{s:11:\\"notifiables\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":5:{s:5:\\"class\\";s:15:\\"App\\\\Models\\\\User\\";s:2:\\"id\\";a:1:{i:0;i:11;}s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";s:15:\\"collectionClass\\";N;}s:12:\\"notification\\";O:46:\\"App\\\\Notifications\\\\NuevoComentarioEnPublicacion\\":2:{s:58:\\"\\u0000App\\\\Notifications\\\\NuevoComentarioEnPublicacion\\u0000comentario\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":5:{s:5:\\"class\\";s:32:\\"App\\\\Models\\\\ComentarioPublicacion\\";s:2:\\"id\\";i:5;s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";s:15:\\"collectionClass\\";N;}s:2:\\"id\\";s:36:\\"e1220d64-eaa5-4b3a-a2a0-2d45447fe85b\\";}s:8:\\"channels\\";a:1:{i:0;s:4:\\"mail\\";}}","batchId":null},"createdAt":1780760550,"delay":null}', 0, NULL, 1780760550, 1780760550),
	(3, 'default', '{"uuid":"785a16f5-fc6f-446c-bec7-1329b43e50cb","displayName":"App\\\\Notifications\\\\NuevoComentarioEnPublicacion","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"deleteWhenMissingModels":false,"data":{"commandName":"Illuminate\\\\Notifications\\\\SendQueuedNotifications","command":"O:48:\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\":3:{s:11:\\"notifiables\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":5:{s:5:\\"class\\";s:15:\\"App\\\\Models\\\\User\\";s:2:\\"id\\";a:1:{i:0;i:10;}s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";s:15:\\"collectionClass\\";N;}s:12:\\"notification\\";O:46:\\"App\\\\Notifications\\\\NuevoComentarioEnPublicacion\\":2:{s:58:\\"\\u0000App\\\\Notifications\\\\NuevoComentarioEnPublicacion\\u0000comentario\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":5:{s:5:\\"class\\";s:32:\\"App\\\\Models\\\\ComentarioPublicacion\\";s:2:\\"id\\";i:6;s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";s:15:\\"collectionClass\\";N;}s:2:\\"id\\";s:36:\\"ea2355b7-5e3d-4395-bd79-1cfd9e0d7bad\\";}s:8:\\"channels\\";a:1:{i:0;s:4:\\"mail\\";}}","batchId":null},"createdAt":1780760626,"delay":null}', 0, NULL, 1780760626, 1780760626);

-- Volcando estructura para tabla irisfepi.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.job_batches: ~0 rows (aproximadamente)

-- Volcando estructura para tabla irisfepi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.migrations: ~12 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_06_05_020440_add_rol_to_users_table', 2),
	(5, '2026_06_05_030000_create_diarios_table', 3),
	(6, '2026_06_05_040000_create_chats_table', 4),
	(7, '2026_06_05_040100_create_chat_messages_table', 4),
	(8, '2026_06_05_050000_create_publicaciones_table', 5),
	(9, '2026_06_05_050100_create_comentario_publicaciones_table', 5),
	(10, '2026_06_05_050200_create_publicacion_likes_table', 6),
	(11, '2026_06_07_002314_create_professional_credentials_table', 7),
	(12, '2026_06_07_002439_add_verification_fields_to_users_table', 7),
	(13, '2026_06_07_071803_create_doctor_patient_table', 8),
	(14, '2026_06_07_120000_add_profile_fields_to_users_table', 9),
	(15, '2026_06_07_150000_add_emoji_to_diarios_table', 10);

-- Volcando estructura para tabla irisfepi.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.password_reset_tokens: ~0 rows (aproximadamente)
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('estrella120801@gmail.com', '$2y$12$5iDFSmtuWviIyw/.hCWuf.kVvTPrCZjdLEkL0swAt/vM0.Jjr/Z2O', '2026-06-07 22:11:43');

-- Volcando estructura para tabla irisfepi.professional_credentials
CREATE TABLE IF NOT EXISTS `professional_credentials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `professional_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postgraduate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `years_of_experience` int NOT NULL,
  `professional_associations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `credential_file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `admin_notes` text COLLATE utf8mb4_unicode_ci,
  `reviewed_by` bigint unsigned DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `professional_credentials_user_id_unique` (`user_id`),
  KEY `professional_credentials_reviewed_by_foreign` (`reviewed_by`),
  CONSTRAINT `professional_credentials_reviewed_by_foreign` FOREIGN KEY (`reviewed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `professional_credentials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.professional_credentials: ~0 rows (aproximadamente)
INSERT INTO `professional_credentials` (`id`, `user_id`, `professional_id`, `specialty_id`, `university`, `postgraduate`, `years_of_experience`, `professional_associations`, `credential_file_path`, `status`, `admin_notes`, `reviewed_by`, `reviewed_at`, `created_at`, `updated_at`) VALUES
	(1, 15, '1655654', '16516165156165', 'UAM', 'Posgrado', 5, 'Tester', 'credentials/MxHESxupK7nplbmZXlugagH9UPBal9wq5co0EYLS.pdf', 'approved', NULL, 10, '2026-06-07 12:37:24', '2026-06-07 12:05:45', '2026-06-07 12:37:24'),
	(2, 16, '65987412', 'ESP-14785236', 'Universidad Autónoma Metropolitana (UAM)', 'Especialidad en Psiquiatría', 8, 'Asociación Psiquiátrica Mexicana', 'credentials/3xnPncWA3EaUEmOwwCrETxa4AktIXQtiNjLGvqYs.pdf', 'approved', 'todo bien, bienvenido', 10, '2026-06-07 12:53:29', '2026-06-07 12:52:25', '2026-06-07 12:53:29');

-- Volcando estructura para tabla irisfepi.publicaciones
CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `publicaciones_user_id_foreign` (`user_id`),
  CONSTRAINT `publicaciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.publicaciones: ~8 rows (aproximadamente)
INSERT INTO `publicaciones` (`id`, `user_id`, `contenido`, `created_at`, `updated_at`) VALUES
	(1, 10, 'Hola', '2026-06-05 18:50:05', '2026-06-05 18:50:05'),
	(2, 10, 'hijos de perra', '2026-06-06 21:19:11', '2026-06-06 21:19:11'),
	(3, 10, 'pinches putos', '2026-06-06 21:27:14', '2026-06-06 21:27:14'),
	(5, 11, 'Hola, como estan banda ???', '2026-06-06 21:39:07', '2026-06-06 21:39:07'),
	(6, 10, 'Hola amigos, los veo cuando ??', '2026-06-06 21:43:24', '2026-06-06 21:43:24'),
	(7, 10, 'Hola', '2026-06-06 21:49:12', '2026-06-06 21:49:12'),
	(8, 10, 'Hola, de nuevo', '2026-06-06 21:51:23', '2026-06-06 21:51:23'),
	(9, 13, 'Hola, yo soy docotr, pueden piderme todos los consejos que quieran padrinos', '2026-06-07 01:47:37', '2026-06-07 01:47:37');

-- Volcando estructura para tabla irisfepi.publicacion_likes
CREATE TABLE IF NOT EXISTS `publicacion_likes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `publicacion_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `publicacion_likes_publicacion_id_user_id_unique` (`publicacion_id`,`user_id`),
  KEY `publicacion_likes_user_id_foreign` (`user_id`),
  CONSTRAINT `publicacion_likes_publicacion_id_foreign` FOREIGN KEY (`publicacion_id`) REFERENCES `publicaciones` (`id`) ON DELETE CASCADE,
  CONSTRAINT `publicacion_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.publicacion_likes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla irisfepi.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.sessions: ~6 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('jGGHThdXZUnA5EuxbC3Z1H7w1QpudkjUWrqRhIYg', 17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJHOEpzbmdrSHdhZUNJWUxHSGNBVlVMTWlIZFdHOVBkWFYxVTJnamVEIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kaWFyaW9zIiwicm91dGUiOiJkaWFyaW9zLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjE3fQ==', 1780866203),
	('rTmlga7obaSMyAv0ZkUIxIcqyCpMX5LMGNjPEYkX', 17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI3M0FuWlVYR3l4V0ZCNlJIOGRLcmxnc1dXUlhJT1J2NkZTaVl4TWZpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kaWFyaW9zIiwicm91dGUiOiJkaWFyaW9zLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjE3fQ==', 1780866326);

-- Volcando estructura para tabla irisfepi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` enum('femenino','masculino','no-binario','prefiero-no-decir','otro') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergencia_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergencia_relacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergencia_telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` int NOT NULL,
  `is_verified_professional` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla irisfepi.users: ~5 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `apellidos`, `fecha_nacimiento`, `genero`, `telefono`, `emergencia_nombre`, `emergencia_relacion`, `emergencia_telefono`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `rol`, `is_verified_professional`) VALUES
	(10, 'Gabriel Ruiz Estrella', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'estrella120801@gmail.com', '2026-06-05 11:30:02', '$2y$12$Stlxye5vv7GAYtJPpeU1UeeeUOe6h9L15NRQ/hh6mtHUcjXl5.06.', NULL, '2026-06-05 11:27:41', '2026-06-05 11:30:02', 4, 0),
	(11, 'Gabriel Cid Estrella', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ruiz@grupoindi.com', '2026-06-05 11:30:21', '$2y$12$R2sJjQf4hPNlDy8wGWlOgulmoP1zIf66./9LW4Z3dywQUsaJHlArG', NULL, '2026-06-05 11:28:39', '2026-06-05 11:30:21', 1, 0),
	(12, 'Miriam Estrella Ruiz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'miradaestrella@hotmail.com', '2026-06-05 11:33:44', '$2y$12$3LPt2P4rmpqMN00Z5GXsxu05EEOuDhezHjD7ebh0Kgnz0/A5y7rG.', NULL, '2026-06-05 11:29:20', '2026-06-05 11:33:44', 1, 0),
	(13, 'Sergio Ruiz Estrella', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'g@hotmail.com', '2026-06-07 01:46:58', '$2y$12$aA3YeJ.mP.0ZnxbkCXM6L.fdNFxvt.mRzoRxTYWZtnOzbqfE3/wq6', NULL, '2026-06-07 01:44:52', '2026-06-07 01:46:58', 2, 0),
	(15, 'Sergio Ruiz Estrella', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gabserstark@hotmail.com', '2026-06-07 12:05:30', '$2y$12$p1kFsHA8/guzMrDqikI2CuZ6jBqvACzbnLh75C8TgrJ5iex46Gwwq', NULL, '2026-06-07 11:55:55', '2026-06-07 12:37:24', 2, 1),
	(16, 'Israel Marquez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'reportes-ti@grupoindi.com', '2026-06-07 12:42:11', '$2y$12$ItCdSOSIDJmTnU2/73N90OZzf7UWczDUeHyqcXHwZgjKCKWGSWmkK', NULL, '2026-06-07 12:40:29', '2026-06-07 12:53:29', 3, 1),
	(17, 'Felix', 'Ibarra Ramirez', '2026-01-30', 'masculino', '5526783845', 'Sergio Ruiz Hernández', 'padre-madre', '5526783845', 'gabriel.ruiz@grupoindi.com', '2026-06-07 22:16:19', '$2y$12$XgzrQNdORWxfGifqUVXyce1YIrFtUv7c2jNTgoA6zkFSFqGesqhdy', NULL, '2026-06-07 21:29:48', '2026-06-07 22:16:19', 1, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
