/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.6.5-MariaDB : Database - boletera
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`boletera` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `boletera`;

/*Table structure for table `choferes` */

DROP TABLE IF EXISTS `choferes`;

CREATE TABLE `choferes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` int(11) NOT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `choferes` */

insert  into `choferes`(`id`,`nombre`,`usuario`,`password`,`empresa`,`id_tipo_usuario`,`activo`,`created_at`,`updated_at`) values 
(2,'CHOFER','chofi1d','$2y$10$xKUeNu7tn3zl5VNFMA7iYOrEi5xhdwj5VCb9MizhykAW9k2dlRtZ2',0,5,1,'2021-08-15 19:24:12','2021-08-15 19:26:24');

/*Table structure for table `choferesunidades` */

DROP TABLE IF EXISTS `choferesunidades`;

CREATE TABLE `choferesunidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idchofer` int(11) NOT NULL,
  `idunidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `choferesunidades` */

insert  into `choferesunidades`(`id`,`idchofer`,`idunidad`,`created_at`,`updated_at`) values 
(1,2,1,'2021-08-29 17:10:42','2021-08-29 18:40:43');

/*Table structure for table `crear` */

DROP TABLE IF EXISTS `crear`;

CREATE TABLE `crear` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `crear` */

/*Table structure for table `crearempresa` */

DROP TABLE IF EXISTS `crearempresa`;

CREATE TABLE `crearempresa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `crearempresa` */

/*Table structure for table `editarempresa` */

DROP TABLE IF EXISTS `editarempresa`;

CREATE TABLE `editarempresa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `editarempresa` */

/*Table structure for table `egresos` */

DROP TABLE IF EXISTS `egresos`;

CREATE TABLE `egresos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idruta` int(11) NOT NULL,
  `idegreso` int(11) NOT NULL,
  `valor` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `egresos` */

insert  into `egresos`(`id`,`idusuario`,`idruta`,`idegreso`,`valor`,`created_at`,`updated_at`,`nombre`,`url`) values 
(1,333,0,0,10,'2021-11-27 17:12:11','2021-11-27 17:12:11',NULL,'images/evbqiEaX7xic9pPyLef3HWeEnSzIKSLlbpaH6NRP.jpg'),
(2,333,0,0,10,'2021-11-27 17:14:29','2021-11-27 17:14:29',NULL,'images/4cg4MWgYr1PrTgixQwKw08K8Hbna8xVNwxhPfYcK.jpg'),
(3,333,0,0,10,'2021-11-27 17:40:14','2021-11-27 17:40:14',NULL,'images/pGWigQH6ClWGkkTeepJ2FZkzzLr0hNqUwRg8eOOg.jpg'),
(4,333,0,0,10,'2021-11-27 17:43:29','2021-11-27 17:43:29',NULL,'public/Tz2Zjvb9aT3j9XtZ00gYl9VDOk7Ara2MBIqWZqWf.jpg'),
(5,333,0,0,10,'2021-11-27 17:46:13','2021-11-27 17:46:13',NULL,'public/hbJUddzwfUH3NcFOJO1u8KJJ5Qe0vTXuRPiYkyR8.jpg'),
(6,333,0,0,10,'2021-11-27 17:46:48','2021-11-27 17:46:48',NULL,'images/XPEn8uWKADbGmd2O9KyeM8IeYSwsZeeGfQVweolj.jpg'),
(7,333,0,0,10,'2021-11-27 17:47:28','2021-11-27 17:47:28',NULL,'public/rz31ZMUNHzACPLYGWkWl0cniPmWl4pRmPslNyQxz.jpg'),
(8,333,0,0,10,'2021-12-01 19:53:49','2021-12-01 19:53:49',NULL,'public/IitS1zHl4qfihozxJ0boIc86GtGpQbW8uVQMJPJv.jpg'),
(9,333,0,0,10,'2021-12-01 19:54:29','2021-12-01 19:54:29',NULL,'public/5ljspd2r1N74BqwMCzEGcqEUIonN7J0rJMkMKnjc.jpg'),
(10,333,0,0,10,'2021-12-01 19:59:26','2021-12-01 19:59:26',NULL,'public/8C02Cmd6WuOsuHZEwjRe2aSTDgmPhLnBTaAlz3rz.jpg'),
(11,333,0,0,10,'2021-12-01 20:00:22','2021-12-01 20:00:22',NULL,'public/c5dTAw8uAowBkTQUMzGqD03auYzuLbkduJ6ofNRw.jpg'),
(12,333,0,0,10,'2021-12-01 20:03:51','2021-12-01 20:03:51',NULL,'public/8QGepnEMW5E9xfOz1928bLCFSmBcNcKeY1nnRBM3.jpg'),
(13,333,0,0,10,'2021-12-01 20:04:43','2021-12-01 20:04:43','1638410683.jpg','public/piqEyS4LC3RJs2SiMFLcixvy52F59LEPGKLVMBgD.jpg'),
(14,0,0,0,0,'2021-12-02 21:59:07','2021-12-02 21:59:07',NULL,NULL),
(15,0,0,0,0,'2021-12-02 21:59:07','2021-12-02 21:59:07',NULL,NULL),
(16,0,0,0,0,'2021-12-02 21:59:56','2021-12-02 21:59:56',NULL,NULL),
(17,0,0,0,0,'2021-12-02 21:59:57','2021-12-02 21:59:57',NULL,NULL),
(18,0,0,0,0,'2021-12-02 22:00:08','2021-12-02 22:00:08',NULL,NULL),
(19,0,0,0,0,'2021-12-02 22:00:09','2021-12-02 22:00:09',NULL,NULL),
(20,0,0,0,0,'2021-12-02 22:00:54','2021-12-02 22:00:54',NULL,NULL),
(21,0,0,0,0,'2021-12-02 22:00:54','2021-12-02 22:00:54',NULL,NULL),
(22,0,0,0,0,'2021-12-02 22:01:19','2021-12-02 22:01:19',NULL,NULL),
(23,0,0,0,0,'2021-12-02 22:01:20','2021-12-02 22:01:20',NULL,NULL);

/*Table structure for table `empresas` */

DROP TABLE IF EXISTS `empresas`;

CREATE TABLE `empresas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `empresas` */

insert  into `empresas`(`id`,`nombre`,`created_at`,`updated_at`) values 
(1,'Empresa','2021-07-17 17:33:01','2021-07-17 18:18:52'),
(5,'Nueva Empresa','2021-07-17 18:25:15','2021-07-17 18:25:33');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `funciones` */

DROP TABLE IF EXISTS `funciones`;

CREATE TABLE `funciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_modulo` bigint(20) unsigned NOT NULL,
  `funcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_funcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alta` tinyint(1) NOT NULL DEFAULT 1,
  `baja` tinyint(1) NOT NULL DEFAULT 1,
  `consulta` tinyint(1) NOT NULL DEFAULT 1,
  `modificacion` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `funciones` */

insert  into `funciones`(`id`,`id_modulo`,`funcion`,`ruta_funcion`,`alta`,`baja`,`consulta`,`modificacion`,`created_at`,`updated_at`) values 
(1,1,'CONFIG APP','super-admin',1,1,1,1,NULL,NULL),
(2,2,'GESTION DE USUARIOS','gestion-usuarios',1,1,1,1,NULL,NULL),
(3,3,'GEOCERCAS','geocercas',1,1,1,1,NULL,NULL),
(4,3,'CREAR-GEOCERCAS','crear-geocercas',1,1,1,1,NULL,NULL),
(5,4,'EMPRESAS','empresas',1,1,1,1,NULL,NULL),
(7,4,'CREAR EMPRESA','crearempresa',1,1,1,1,NULL,NULL),
(8,5,'USUARIOS','usuarios',1,1,1,1,NULL,NULL),
(9,6,'CHOFERES','choferes',1,1,1,1,NULL,NULL),
(10,7,'UNIDADES','unidades',1,1,1,1,NULL,NULL),
(11,8,'CHOFERES-UNIDADES','choferes-unidades',1,1,1,1,NULL,NULL),
(12,9,'RUTAS','rutas',1,1,1,1,NULL,NULL),
(15,9,'NUEVA RUTA','nueva-ruta',1,1,1,1,NULL,NULL),
(16,13,'REPORTES DE EGRESOS','reportes-egresos',1,1,1,1,NULL,NULL),
(17,13,'REPORTES DE PASAJEROS','reportes-pasajeros',1,1,1,1,NULL,NULL);

/*Table structure for table `geocercas` */

DROP TABLE IF EXISTS `geocercas`;

CREATE TABLE `geocercas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `geocercas` */

insert  into `geocercas`(`id`,`nombre`,`datos`,`empresa`,`created_at`,`updated_at`) values 
(12,'soledad','[\"19.72866,-101.18761\",\"19.72576,-101.188\",\"19.72681,-101.18418\",\"19.72862,-101.18281\"]',1,'2021-07-03 23:18:43','2021-07-03 23:18:43'),
(14,'atencion animal','[\"19.72754,-101.17335\",\"19.72625,-101.17306\",\"19.72656,-101.17035\",\"19.72793,-101.17057\"]',1,'2021-07-03 23:20:53','2021-07-03 23:20:53'),
(15,'Tienda naturista','[\"19.706,-101.18486\",\"19.70581,-101.18483\",\"19.70585,-101.1846\",\"19.70603,-101.18461\"]',2,'2021-07-10 01:02:48','2021-07-10 01:02:48'),
(16,'tarascas','[\"19.71431,-101.2079\",\"19.70025,-101.17803\",\"19.69378,-101.19949\",\"19.69669,-101.21047\"]',0,'2021-08-29 15:23:17','2021-08-29 15:23:17'),
(17,'sindurio','[\"19.70477,-101.25391\",\"19.68683,-101.25734\",\"19.6941,-101.23193\",\"19.70784,-101.23262\"]',0,'2021-08-29 15:23:26','2021-08-29 15:23:26'),
(18,'geo1','[\"19.70299,-101.19114\",\"19.70301,-101.19186\",\"19.70262,-101.1918\",\"19.70268,-101.19103\"]',0,'2021-09-25 18:45:01','2021-09-25 18:45:01'),
(19,'geo2','[\"19.70296,-101.19233\",\"19.70299,-101.19303\",\"19.70275,-101.19303\",\"19.70273,-101.1923\"]',0,'2021-09-25 18:45:45','2021-09-25 18:45:45'),
(20,'geo3','[\"19.70307,-101.196\",\"19.70285,-101.19604\",\"19.70284,-101.19488\",\"19.70311,-101.19483\"]',0,'2021-09-25 18:46:00','2021-09-25 18:46:00'),
(21,'geo4','[\"19.70307,-101.19414\",\"19.70275,-101.19419\",\"19.70274,-101.19364\",\"19.70307,-101.19367\"]',0,'2021-09-25 18:46:13','2021-09-25 18:46:13');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),
(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),
(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),
(6,'2016_06_01_000004_create_oauth_clients_table',1),
(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),
(8,'2019_08_19_000000_create_failed_jobs_table',1),
(9,'2021_06_14_014603_update_users_table',1),
(10,'2021_06_14_174104_create_modulos',1),
(11,'2021_06_14_184450_create_tipos_usuario',1),
(12,'2021_06_17_153616_create_funciones_table',1),
(13,'2021_07_11_192511_create_geocercas_table',2),
(14,'2021_07_11_200040_create_crear-geocercas_table',3),
(15,'2021_07_17_171116_create_empresas_table',3),
(16,'2021_07_17_173340_create_editarempresa_table',4),
(17,'2021_07_17_175037_create_crearempresa_table',4),
(18,'2021_07_18_170745_create_usuarios_table',5),
(19,'2021_08_15_163651_create_choferes_table',5),
(20,'2021_08_15_195001_create_unidades_table',6),
(21,'2021_08_04_215617_create_listar_table',7),
(22,'2021_08_22_150812_create_choferes-unidades_table',8),
(23,'2021_05_20_214758_create_routes_table',9),
(24,'2021_07_04_233007_create_table_points_routes',9),
(25,'2021_07_05_004226_create_table_cost_table',9),
(26,'2021_08_29_134011_create_crear_table',10),
(27,'2021_08_29_143135_create_rutas_table',11),
(28,'2021_08_29_151617_create_nueva-ruta_table',11),
(29,'2021_10_16_184148_create_reportes-egresos_table',11);

/*Table structure for table `modulos` */

DROP TABLE IF EXISTS `modulos`;

CREATE TABLE `modulos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `modulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `modulos` */

insert  into `modulos`(`id`,`modulo`,`icono`,`created_at`,`updated_at`) values 
(1,'SA','fas fa-user-cog',NULL,NULL),
(2,'ADMIN','fas fa-user-shield',NULL,NULL),
(3,'GEOCERCAS','fas fa-map',NULL,NULL),
(4,'EMPRESAS','far fa-building',NULL,NULL),
(5,'USUARIOS','fas fa-users',NULL,NULL),
(6,'CHOFERES','fas fa-street-view',NULL,NULL),
(7,'UNIDADES','fas fa-bus',NULL,NULL),
(8,'VINCULAR','fas fa-bus',NULL,NULL),
(9,'RUTAS','fas fa-bus',NULL,NULL),
(10,'RUTAS','fas fa-bus',NULL,NULL),
(11,'RUTAS','fas fa-bus',NULL,NULL),
(12,'RUTAS','fas fa-bus',NULL,NULL),
(13,'REPORTES','fas fa-bus',NULL,NULL),
(14,'REPORTES','fas fa-bus',NULL,NULL);

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_access_tokens` */

insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values 
('0755ce1c50ad9acadb848b1615fb04338f49c6755f3a9a0731517cdf15b5093a3520058d350d8679',1,1,'Personal Access Token','[]',0,'2021-10-24 18:16:07','2021-10-24 18:16:07','2022-10-24 18:16:07'),
('0e89a1b67dfb57e1b609bcba4ac5fe85ed508104eb8ba3dbd8a4b199cca769f73db9377b11bfca1d',1,1,'Personal Access Token','[]',0,'2021-09-26 15:30:22','2021-09-26 15:30:22','2022-09-26 15:30:22'),
('0f6801ae1c3839a9cdf5da1d57c9e5c2fb93f16c117bc0d124ba699bcbc0d1e248e7bf7966e00cea',333,1,'Personal Access Token','[]',0,'2021-12-01 20:00:54','2021-12-01 20:00:54','2022-12-01 20:00:54'),
('11b6d4969271fb00d7d7d694594a19ab0b1acbfde00efa4f30e28f4a07cc5422f911a56aa8bea477',1,1,'Personal Access Token','[]',0,'2021-10-24 15:11:25','2021-10-24 15:11:25','2022-10-24 15:11:25'),
('15b594ea0e8b79c84dbdcd95b25eb8c768c1305ea97da3577a0e756be0e04e92b5eadfc570943362',333,1,'Personal Access Token','[]',0,'2021-12-01 19:45:35','2021-12-01 19:45:35','2022-12-01 19:45:35'),
('1ab9e63b00e9fe93cdc163b36a215169d50e24794b55c2c4004f1bcd466a9cb89088c8e89b04c177',333,1,'Personal Access Token','[]',0,'2021-12-01 19:52:42','2021-12-01 19:52:42','2022-12-01 19:52:42'),
('1ae09f6aebb0b7625cbcd352783b7b1d1d8a727f509974bec5202e0d7635b6b7ccd79bb649b0b1fd',333,1,'Personal Access Token','[]',0,'2021-11-29 20:56:39','2021-11-29 20:56:39','2022-11-29 20:56:39'),
('2145ba29d5f4265ca1a5a98dae56251927425fdb818cf15ce36d0e8ca427f65d962d1c4c42d124ed',1,1,'Personal Access Token','[]',0,'2021-10-17 18:39:14','2021-10-17 18:39:14','2022-10-17 18:39:14'),
('2527785d1cd9c9f3d5592420976d88e1238e042b7e073bc6bcd8a1e8cb16d6397799efb00091a285',333,1,'Personal Access Token','[]',0,'2021-12-01 22:16:48','2021-12-01 22:16:48','2022-12-01 22:16:48'),
('2c1782c4d1d87dfeaf754007791b763440208f0c272ec6f601ddaa6f99ccce4cf6d1b3d42e02d3ba',333,1,'Personal Access Token','[]',0,'2021-12-02 21:34:01','2021-12-02 21:34:01','2022-12-02 21:34:01'),
('2f81d817663f19f8b356788b0bae1d035ae8076290f38a736b1e468c04d4768886c43b020a983c63',1,1,'Personal Access Token','[]',0,'2021-09-05 18:48:29','2021-09-05 18:48:29','2022-09-05 18:48:29'),
('385bde6d2cc4a3c19237ee88814328d2b0962d33a5329df50ef693436e926adb46c3e80d200c1394',333,1,'Personal Access Token','[]',0,'2021-12-01 22:16:43','2021-12-01 22:16:43','2022-12-01 22:16:43'),
('3aa52faa703f2c83ef494e56dfbbe286c6a28ca60c30d5d514929e00a0c0df85f74884127bb8b4dd',1,1,'Personal Access Token','[]',0,'2021-09-05 19:20:15','2021-09-05 19:20:15','2022-09-05 19:20:15'),
('4126f575fa33a7337b73dcd7ab796a36b1183eb3e1f81a24c09b43a53869a1cbd35ef77da7e88264',1,1,'Personal Access Token','[]',0,'2021-10-24 15:02:57','2021-10-24 15:02:57','2022-10-24 15:02:57'),
('438e5191ca20ad328c94482db18a6d860f9d1df47e3fba0b3441f2d10799efd16777ba5287c5a6c0',333,1,'Personal Access Token','[]',0,'2021-11-29 19:58:22','2021-11-29 19:58:22','2022-11-29 19:58:22'),
('477ee57ba1405da21c236ac8a98c36b4a0483037d182abcd5fe4412e5c3aa57aee3b111ead0e4ba5',1,1,'Personal Access Token','[]',0,'2021-10-17 17:19:25','2021-10-17 17:19:25','2022-10-17 17:19:25'),
('49a64eb0829074f4ccbdd9ccb75403d1a5352c7290bf09ce2733e2b4b363e53d80baa3d7bd466ed0',1,1,'Personal Access Token','[]',0,'2021-10-24 19:08:16','2021-10-24 19:08:16','2022-10-24 19:08:16'),
('53fa68717bb0dd43c13ad4c533a88654beb80e3d85cbd8d65a3af58f66a70dd87f5603f8bda23bdb',333,1,'Personal Access Token','[]',0,'2021-12-01 19:39:03','2021-12-01 19:39:03','2022-12-01 19:39:03'),
('56acc2bf590c463b2be2e9f46b06b7be59fc1db79f996dc6ef40ebabeb3eb60e88c5b187f01b01b6',333,1,'Personal Access Token','[]',0,'2021-11-29 19:49:57','2021-11-29 19:49:57','2022-11-29 19:49:57'),
('5eb71aab65cc04bc5ac98afbb4c058ee633b7a95f2b13f36dcbd1e22b5170e497e270bff7d9ae511',333,1,'Personal Access Token','[]',0,'2021-12-01 22:14:57','2021-12-01 22:14:57','2022-12-01 22:14:57'),
('617d0f9a72cf6bd2a868f0ac0b01030ff19a8d6e0598f2883b9262c54d9815496facc61a94d36407',1,1,'Personal Access Token','[]',0,'2021-10-17 19:34:42','2021-10-17 19:34:42','2022-10-17 19:34:42'),
('622bf6428494ff5ff2a8e5d648adb1e375b3bb0363539b46939601c70c07b9b4ebf4c510c535eaad',333,1,'Personal Access Token','[]',0,'2021-12-02 21:35:58','2021-12-02 21:35:58','2022-12-02 21:35:58'),
('668414e7b08d5716ec5ef35d6422c8cc5db9781e290307ff34812a5f292c68b6d3fc46d21971924f',1,1,'Personal Access Token','[]',0,'2021-09-19 16:38:36','2021-09-19 16:38:36','2022-09-19 16:38:36'),
('67d6aec438be6a17e489afdb55dfdcca6c14f53d111bf8205e8a492594ebed478499f3966f0de754',1,1,'Personal Access Token','[]',0,'2021-09-19 16:55:14','2021-09-19 16:55:14','2022-09-19 16:55:14'),
('685608074661b1da8bcb87d35c28f655169d6d72a6f9160315bc6ae69b467c136d0ae348ece7e884',333,1,'Personal Access Token','[]',0,'2021-12-01 21:36:42','2021-12-01 21:36:42','2022-12-01 21:36:42'),
('719604f08c36cd82d17ee7b4f8175a9c7180be3ba055d79526e0d4c5084eccb61a16332ee221446b',1,1,'Personal Access Token','[]',0,'2021-10-03 15:46:27','2021-10-03 15:46:27','2022-10-03 15:46:27'),
('771536ea3da5aeaf15577c450c80b9f32aa04c25d3d92ce8003cc0e17d06d9b12dae6dbe35c2729c',1,1,'Personal Access Token','[]',0,'2021-10-17 18:43:00','2021-10-17 18:43:00','2022-10-17 18:43:00'),
('7d7b8cae2891e3441d6bb80f24a5374d25441d9410473eccafbdfcbe46f7d9fe998e7136c7b3a2bb',333,1,'Personal Access Token','[]',0,'2021-11-29 20:56:21','2021-11-29 20:56:21','2022-11-29 20:56:21'),
('80b82b7ca487071f9060ce2736be7d8f3376729b0aa53388cd8337fb0a0bfc10965bae0dea001f4c',1,1,'Personal Access Token','[]',0,'2021-09-26 17:51:41','2021-09-26 17:51:41','2022-09-26 17:51:41'),
('82613f47d512e198d861985e06f8f3fc2a43ba3c9d3f40987ef385dac25ce84ddc71ed6eb5640f0c',333,1,'Personal Access Token','[]',0,'2021-12-02 21:33:08','2021-12-02 21:33:08','2022-12-02 21:33:08'),
('833b833af89c3bf72d66f8dac101a362405245aced3075d4b86f0bb14dbfad33ef04abe1e6301822',333,1,'Personal Access Token','[]',0,'2021-12-02 19:40:58','2021-12-02 19:40:58','2022-12-02 19:40:58'),
('86335e77e090ee8e3f4d369841f11330a8d27b4e1696e58628cb1ed7cfbac36615a65053507d53ea',333,1,'Personal Access Token','[]',0,'2021-12-02 21:35:16','2021-12-02 21:35:16','2022-12-02 21:35:16'),
('8b04a865f7fda85d2c64af4b66a9387a6f1cfa580f1d27fa2919d0388940be9666c163dc1fd105a3',333,1,'Personal Access Token','[]',0,'2021-12-01 22:01:04','2021-12-01 22:01:04','2022-12-01 22:01:04'),
('8cbdd8be79f5bc40916ddb3b55932bd03e85ca003c273a9d58d240d55e88f752e2d1eaed37532637',333,1,'Personal Access Token','[]',0,'2021-12-01 19:58:19','2021-12-01 19:58:19','2022-12-01 19:58:19'),
('9068919442cb8c6c5c68b6d65a8d6a9ccbd92fb57b4b4c9818168a437cd5bd939471e4db2e91fc1b',1,1,'Personal Access Token','[]',0,'2021-10-24 18:21:13','2021-10-24 18:21:13','2022-10-24 18:21:13'),
('91d7cd7153d7ff7af2ffa75925899b013db449dfd71b18230af086ebdfec23beddd48cc274bf120b',1,1,'Personal Access Token','[]',0,'2021-10-24 15:16:29','2021-10-24 15:16:29','2022-10-24 15:16:29'),
('9ce9b1795b13a7e9f65007a5f261a96c2231ee485c63e192555428063749ebdd6dfbef920e378041',1,1,'Personal Access Token','[]',0,'2021-10-17 18:16:55','2021-10-17 18:16:55','2022-10-17 18:16:55'),
('a2056ce3d70aff0531c57cb537f797bb8adc1f24f0671b4dadc541ca9405ef19441a1b43daa49429',333,1,'Personal Access Token','[]',0,'2021-10-30 18:16:44','2021-10-30 18:16:44','2022-10-30 18:16:44'),
('a24d606e2a960c1d8c114a9e176a03942b2d37aaa0eba9f49ada59710eae4b18cc48d06c246b682b',333,1,'Personal Access Token','[]',0,'2021-12-01 22:15:03','2021-12-01 22:15:03','2022-12-01 22:15:03'),
('a6a637010e1f2cc9e1a07746c22cce552f21b2b7e3d54666fe0e71261dc66dd43457390d6969e278',333,1,'Personal Access Token','[]',0,'2021-10-24 19:28:02','2021-10-24 19:28:02','2022-10-24 19:28:02'),
('a6eaf92e98ea8d7e0d5b8a71f3f54e09a827acf65b961a337fa5bc1eb45161a07d329753fb6047c3',333,1,'Personal Access Token','[]',0,'2021-12-01 19:59:15','2021-12-01 19:59:15','2022-12-01 19:59:15'),
('a7e6117541f31d6085f0202d5655d10530a5985721aacd738eef4f982d8d59b84d1de294fc6f82bc',1,1,'Personal Access Token','[]',0,'2021-10-17 15:30:45','2021-10-17 15:30:45','2022-10-17 15:30:45'),
('ad9c8feb76f1c412f9266aa748a6cc560308d3d45d729c02ebee8eeac87405523c0914318e69ba8f',1,1,'Personal Access Token','[]',0,'2021-09-05 15:27:53','2021-09-05 15:27:53','2022-09-05 15:27:53'),
('ae3768e1691bba1967bd73daf17474c34d848ef276d85b418f890dfe55f724b00687f7e14264712e',1,1,'Personal Access Token','[]',0,'2021-10-24 13:09:46','2021-10-24 13:09:46','2022-10-24 13:09:46'),
('ae9a1db7db1eab2bb0c558f07865fe3ad32330d7c31cf09d776ba10c38c3a6879c6edd7e4a154701',333,1,'Personal Access Token','[]',0,'2021-12-02 21:31:43','2021-12-02 21:31:43','2022-12-02 21:31:43'),
('b179deab4615e6d9d898a3be1be3b877e8dd376a33bc41735108befbf781bd4ab80e8590f1546ac1',1,1,'Personal Access Token','[]',0,'2021-10-09 17:18:09','2021-10-09 17:18:09','2022-10-09 17:18:09'),
('b35bc501c16c4e1db4123fbcb5b1e058614ccc22f92bdabdcc766886140bcd30c91005a340f08968',1,1,'Personal Access Token','[]',0,'2021-09-26 18:23:36','2021-09-26 18:23:36','2022-09-26 18:23:36'),
('b70549323f13a4ed2f125959e5fade90e805b07c709d7ca04b1a85bc3751c3404fe2c7f3cc0a47e3',1,1,'Personal Access Token','[]',0,'2021-09-05 19:26:58','2021-09-05 19:26:58','2022-09-05 19:26:58'),
('b7278e17b42eee606eb365cdd3e1a2619a2c6d16d87dfe5a5e8d68e264e41bd068cffe4cdfc41948',1,1,'Personal Access Token','[]',0,'2021-10-24 18:31:45','2021-10-24 18:31:45','2022-10-24 18:31:45'),
('baff159c8e3f1d8c965b1bfd5e64dec33a41bfd7e0602c0201a6b27cba81e077fc3576b55c777e72',1,1,'Personal Access Token','[]',0,'2021-10-24 19:03:53','2021-10-24 19:03:53','2022-10-24 19:03:53'),
('bf1bf7348b6737c6555b42f5f1ea24b4b62c81478bcee795c3ff78321721a9b63cfaee9948bf2edc',1,1,'Personal Access Token','[]',0,'2021-09-19 16:36:00','2021-09-19 16:36:00','2022-09-19 16:36:00'),
('bf7c28d0b6a0eff527dbeee129c563b6565e0a49ffdaa105d9b1f86181b1f00078c51bd0f0db44c6',1,1,'Personal Access Token','[]',0,'2021-09-05 19:25:30','2021-09-05 19:25:30','2022-09-05 19:25:30'),
('c11c02548dd4a5936120a39d418e93e1a59005010db613de91afa12ae328e15deb11d200ac609ccc',333,1,'Personal Access Token','[]',0,'2021-12-01 22:06:30','2021-12-01 22:06:30','2022-12-01 22:06:30'),
('c428721860c313aecce239f3f0340520104dfdc11e2878be9f4baff03998995d1492aa4a49b8e19b',1,1,'Personal Access Token','[]',0,'2021-10-09 17:31:31','2021-10-09 17:31:31','2022-10-09 17:31:31'),
('c63669e1fecdbb3fcfb94c47841177012d4929fd734127a4a2f214bd2fb29128e07824de08dac352',1,1,'Personal Access Token','[]',0,'2021-09-05 15:34:20','2021-09-05 15:34:20','2022-09-05 15:34:20'),
('c684512cb8823ff8953c8f02b1c17736b31f3b1657becea4a1f7162c92586b001b118b1fe2bb5b1c',333,1,'Personal Access Token','[]',0,'2021-11-21 16:24:09','2021-11-21 16:24:09','2022-11-21 16:24:09'),
('c6f8f74171d119c6755cd927454fbdf9bb4a5108a335b2ff27c0a2d8e5cf1220d52917d37c99bea9',333,1,'Personal Access Token','[]',0,'2021-10-24 19:26:59','2021-10-24 19:26:59','2022-10-24 19:26:59'),
('c7c1dde1599b8ba8b1dbed7de2f1bf78799d4ab1fb4c332acd07ba6cfdde9ecde46ccfa630304068',1,1,'Personal Access Token','[]',0,'2021-10-24 19:14:44','2021-10-24 19:14:44','2022-10-24 19:14:44'),
('c94374e6f9eb125f35715848ba20a95a210fc802a0be6706794138f39535b0fb5856be2e06208d0b',1,1,'Personal Access Token','[]',0,'2021-10-17 19:40:01','2021-10-17 19:40:01','2022-10-17 19:40:01'),
('cbb043a939cb74bdeb1d1b01ca219ab707b52afc17d5aa04b3c3c9481b32c43af129fe0d97ea05fe',1,1,'Personal Access Token','[]',0,'2021-10-17 18:43:40','2021-10-17 18:43:40','2022-10-17 18:43:40'),
('cd53748353ffdd5cb0e44eb8c213ca79815296f676700fad81a2faba1ed876ec6b4048d7f562fea9',1,1,'Personal Access Token','[]',0,'2021-09-26 17:50:32','2021-09-26 17:50:32','2022-09-26 17:50:32'),
('d389a03c216e76b439dc288e0f164912244290567d293234ed973f1d6532b1929633a895b659542c',333,1,'Personal Access Token','[]',0,'2021-10-31 14:17:08','2021-10-31 14:17:08','2022-10-31 14:17:08'),
('d7a0aa5c88640a9f77c7c0ff9bee21678e3a1d6b31e3b79e2e501846022f99a531f724ed9d4319f6',1,1,'Personal Access Token','[]',0,'2021-09-05 19:14:26','2021-09-05 19:14:26','2022-09-05 19:14:26'),
('dcb165a27aec65ea4ba5033a679fabb3a5bfde464af93941b98524eaa85e7a891add750fd94ebe92',1,1,'Personal Access Token','[]',0,'2021-09-05 19:56:14','2021-09-05 19:56:14','2022-09-05 19:56:14'),
('e1f8a1b084f6720a2c9be28a51b5a3b349f09cffa9cae5f775899355e31cf978cdf2121a4e37fc9e',333,1,'Personal Access Token','[]',0,'2021-11-29 19:40:49','2021-11-29 19:40:49','2022-11-29 19:40:49'),
('e5f03d1ef50b8c4852546822e071f6b24f0d7ed0b65be656e14d34e604db9dcdaef660cf9b8f22e3',1,1,'Personal Access Token','[]',0,'2021-09-05 18:49:10','2021-09-05 18:49:10','2022-09-05 18:49:10'),
('e6d90aa5d7bd7b9e4c82f9c9f75379f2cc27866803325e09101127cfb9509a4b52f0773ccfc42e09',1,1,'Personal Access Token','[]',0,'2021-09-05 18:47:16','2021-09-05 18:47:16','2022-09-05 18:47:16'),
('ec9b5897e1b3e77dfbaabf391c0aa616d1d1813d1b66b7628fe1c7e1000bea5bf0212b69117d21ea',1,1,'Personal Access Token','[]',0,'2021-10-24 15:15:39','2021-10-24 15:15:39','2022-10-24 15:15:39'),
('eeec61fcdae1c99e9039dbb90f1d37bde8100eaaca1524aa69bd00d18eb59998366bd00138cfe7e8',1,1,'Personal Access Token','[]',0,'2021-10-03 16:14:40','2021-10-03 16:14:40','2022-10-03 16:14:40'),
('f0fd79526dfab8bfca6f2b1a083effb1e683594dadd57ade7c18b2f618d81239eb7bea109ce5a2fe',1,1,'Personal Access Token','[]',0,'2021-10-24 15:02:18','2021-10-24 15:02:18','2022-10-24 15:02:18'),
('f5b03dd27c67285b69be8863d386e99375cf50963f46ea160f604f9d758ea306feb3a6cdb07b505e',1,1,'Personal Access Token','[]',0,'2021-09-05 19:15:28','2021-09-05 19:15:28','2022-09-05 19:15:28'),
('fdfbb4cbc7e2de316321c48dea25c2d50bf4294f2c2214c26f780ffa16d9f637f00c087598d42c83',333,1,'Personal Access Token','[]',0,'2021-11-27 17:11:58','2021-11-27 17:11:58','2022-11-27 17:11:58'),
('ff40ff7998a9241e8edfbcd74755a730437b309284f3f879e3a9954e6f3621d191f02f16286109bb',1,1,'Personal Access Token','[]',0,'2021-10-17 16:46:52','2021-10-17 16:46:52','2022-10-17 16:46:52');

/*Table structure for table `oauth_auth_codes` */

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_auth_codes` */

/*Table structure for table `oauth_clients` */

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`provider`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values 
(1,NULL,'Laravel Personal Access Client','AYA5F7mXPkpDPjJ6aPMNe2feuAWsjfJeL3PoU5bh',NULL,'http://localhost',1,0,0,'2021-09-05 15:27:33','2021-09-05 15:27:33');

/*Table structure for table `oauth_personal_access_clients` */

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

insert  into `oauth_personal_access_clients`(`id`,`client_id`,`created_at`,`updated_at`) values 
(1,1,'2021-09-05 15:27:33','2021-09-05 15:27:33');

/*Table structure for table `oauth_refresh_tokens` */

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

/*Table structure for table `pasajeros` */

DROP TABLE IF EXISTS `pasajeros`;

CREATE TABLE `pasajeros` (
  `idusuario` int(11) DEFAULT NULL,
  `idruta` int(11) DEFAULT NULL,
  `boletos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pasajeros` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `points_routes` */

DROP TABLE IF EXISTS `points_routes`;

CREATE TABLE `points_routes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_consecutivo` int(11) NOT NULL,
  `id_routes` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_geofence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_create` int(11) DEFAULT NULL,
  `user_update` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `points_routes` */

insert  into `points_routes`(`id`,`id_consecutivo`,`id_routes`,`id_empresa`,`id_geofence`,`created_at`,`updated_at`,`user_create`,`user_update`) values 
(1,1,1,1,16,'2021-08-29 15:30:35','2021-08-29 15:30:35',NULL,NULL),
(2,2,1,1,17,'2021-08-29 15:30:35','2021-08-29 15:30:35',NULL,NULL),
(3,1,2,1,20,'2021-09-25 18:47:44','2021-09-25 18:47:44',NULL,NULL),
(4,2,2,1,21,'2021-09-25 18:47:44','2021-09-25 18:47:44',NULL,NULL),
(5,3,2,1,19,'2021-09-25 18:47:45','2021-09-25 18:47:45',NULL,NULL),
(6,4,2,1,18,'2021-09-25 18:47:45','2021-09-25 18:47:45',NULL,NULL),
(7,1,3,1,20,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(8,2,3,1,21,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(9,3,3,1,19,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(10,4,3,1,18,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL);

/*Table structure for table `routes` */

DROP TABLE IF EXISTS `routes`;

CREATE TABLE `routes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name_route` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `routes` */

insert  into `routes`(`id`,`Name_route`,`description`) values 
(3,'Ruta de prueba','prueba');

/*Table structure for table `rutas` */

DROP TABLE IF EXISTS `rutas`;

CREATE TABLE `rutas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rutas` */

/*Table structure for table `table_cost` */

DROP TABLE IF EXISTS `table_cost`;

CREATE TABLE `table_cost` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_routes` int(11) NOT NULL COMMENT 'id de la ruta',
  `id_origin` int(11) NOT NULL COMMENT 'id del origen',
  `id_destination` int(11) NOT NULL COMMENT 'id del destino',
  `amount` decimal(8,2) NOT NULL COMMENT 'costo total',
  `created_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'fecha de creacion',
  `modification_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'fecha de creacion',
  `user_create` int(11) DEFAULT NULL COMMENT 'usuario que la creo',
  `user_update` int(11) DEFAULT NULL COMMENT 'usuario que la edito',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `table_cost` */

insert  into `table_cost`(`id`,`id_routes`,`id_origin`,`id_destination`,`amount`,`created_at`,`modification_date`,`user_create`,`user_update`) values 
(1,3,20,20,10.00,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(2,3,20,21,15.00,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(3,3,20,19,20.00,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(4,3,20,18,25.00,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(5,3,21,21,10.00,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(6,3,21,19,15.00,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(7,3,21,18,20.00,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(8,3,19,19,10.00,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(9,3,19,18,15.00,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL),
(10,3,18,18,10.00,'2021-09-25 19:10:17','2021-09-25 19:10:17',NULL,NULL);

/*Table structure for table `tipos_egresos` */

DROP TABLE IF EXISTS `tipos_egresos`;

CREATE TABLE `tipos_egresos` (
  `id` int(11) DEFAULT NULL,
  `egreso` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipos_egresos` */

insert  into `tipos_egresos`(`id`,`egreso`) values 
(1,'Caseta');

/*Table structure for table `tipos_usuario` */

DROP TABLE IF EXISTS `tipos_usuario`;

CREATE TABLE `tipos_usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modulos_base` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipos_usuario_tipo_unique` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipos_usuario` */

insert  into `tipos_usuario`(`id`,`tipo`,`descripcion`,`modulos_base`,`created_at`,`updated_at`) values 
(1,'SU','SUPER USUARIO','[1,2,3,4,5,6,7,8,9,10,11,12,13,14,14,16,17]',NULL,NULL),
(2,'ADM','ADMINISTRADOR','[1,2,3,4,5,6,7,8,9,10,11,12,13,14,14,16,17]',NULL,NULL),
(3,'EMP','Empresa','[1,2,3,4,5,6,7]',NULL,NULL),
(4,'TRA','Trabajador','[1,2,3,4,5,6,7]',NULL,NULL),
(5,'CHF','Chofer',NULL,NULL,NULL);

/*Table structure for table `unidades` */

DROP TABLE IF EXISTS `unidades`;

CREATE TABLE `unidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `unidades` */

insert  into `unidades`(`id`,`nombre`,`empresa`,`activo`,`created_at`,`updated_at`) values 
(1,'UNIDAD ROJA 1',0,1,'2021-08-22 13:33:18','2021-08-22 13:33:18');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad_nacimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `modulos_usuario` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_sangre` int(11) DEFAULT NULL,
  `id_tipo_usuario` bigint(20) unsigned DEFAULT NULL,
  `id_estado_civil` int(11) DEFAULT NULL,
  `numero_seguridad_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `afiliacion_seguridad_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `ine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_religion` int(11) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=335 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`api_token`,`created_at`,`updated_at`,`nombre`,`apellido_paterno`,`apellido_materno`,`curp`,`rfc`,`fecha_nacimiento`,`genero`,`nacionalidad`,`ciudad_nacimiento`,`domicilio`,`codigo_postal`,`telefono`,`activo`,`modulos_usuario`,`id_sangre`,`id_tipo_usuario`,`id_estado_civil`,`numero_seguridad_social`,`afiliacion_seguridad_social`,`id_estado`,`ine`,`id_religion`,`empresa`) values 
(2,'TESTER','a@b.com',NULL,'$2y$10$y7KzYMAZ6EE7ZeT9pZ379.IgfVDDXNyENwsXoP6di2/rxWoflNxdi',NULL,'2021-07-18 17:02:58','2021-07-18 17:02:58','TESTER','','',NULL,NULL,'2021-07-18','','','PENDIENTE','','','',1,'{\"modulos\":[{\"funcion\":3,\"permisos\":[1,1,1,1]},{\"funcion\":4,\"permisos\":[1,1,1,1]},{\"funcion\":5,\"permisos\":[1,1,1,1]},{\"funcion\":7,\"permisos\":[0,1,1,1]},{\"funcion\":8,\"permisos\":[1,1,1,1]}]}',NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,1),
(3,'SUBUSUARIO','user@a.com',NULL,'$2y$10$lzFFSZh7ll2lQBmgOePF6OsfBpxHC1rKiG.xb3cFt3cU7kIwdS8ie',NULL,'2021-07-18 17:28:20','2021-07-18 17:28:20','SUBUSUARIO','','',NULL,NULL,'2021-07-18','','','PENDIENTE','','','',1,'{\"modulos\":[{\"funcion\":3,\"permisos\":[1,1,1,1]},{\"funcion\":4,\"permisos\":[1,1,1,1]},{\"funcion\":5,\"permisos\":[1,1,1,1]},{\"funcion\":7,\"permisos\":[0,1,1,1]},{\"funcion\":8,\"permisos\":[1,1,1,1]}]}',NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,1),
(333,'Administrator','admin',NULL,'$2y$10$KA7G11X3xKGK0aVjBZPOU.8YmPeBCsH2/kuEjXwN3Zdg2Tc9jMf8u','eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNjIyYmY2NDI4NDk0ZmY1ZmYyYThlNWQ2NDhhZGIxZTM3NWIzYmIwMzYzNTM5YjQ2OTM5NjAxYzcwYzA3YjliNGViZjRjNTEwYzUzNWVhYWQiLCJpYXQiOjE2Mzg1MDI1NTguMDcyMTYxLCJuYmYiOjE2Mzg1MDI1NTguMDcyMTYzLCJleHAiOjE2NzAwMzg1NTguMDY5NjIsInN1YiI6IjMzMyIsInNjb3BlcyI6W119.Ch9B2LZP46jP255y2edsm5bT86wcqkFLxbt7P7jPpilaUrpmFL9aMlMNPOLuGmTq9Dxi4A5-x_2GRVTb8oBFAM_ncNuY9ZLhBduNOZ9X6arORVxt7_XEGBbfsE8h6_8q40FyAJnDIAs4ZtaWJss-buUxtpGSFnONKspUASDaqLZf2YUj2z7Sxh-3C6mLHEUYiTZp6cHcMLZXKL45vnqv1TnXRhEv_vbzj1gQ7TfRvLY0ymyVEiQvKg4a2bmDGaXOBQsIIRJE14GKNk3xBYmh0I6zbbieaQi99tzzmHDkWQafrM6yVYqNcrq-4I2Rc6xihnrByMD-Zpfad1F66N5-0rKSoBtJUq-0cSdhU3YFLyxUhrjIFl9ZCe7S4QoAlImxSO9UzRaO6xheTZ0qgEys4Af1fFDAcBq_o7rJsjkc3gVug-428pZem4_vKSCsTlU4d7ZBz8w1qS4yfo6OJdUnU9QIKL_ipS0ro0RRByPn5zdrxE6Bqz6vaE0CfU5lAibCzSOJTux2uluBbz8v_2Yx9mJ76JOqCRchLBGN4LQYRUB53ZwlBDqbNbyl0REIKUmAePGpbYaEg9U_weI2-VO9pilKSb2b_WH9l8-Rj4iN7tIrXQZQ9GDl27PEE5v21TH9dfPECIZeNup_JDJM_KRh7hc0pSlCXOa_dZCv5RVL1Ew',NULL,'2021-12-02 21:35:58','ADMINISTRATOR','ADMIN',NULL,NULL,NULL,'2021-06-07','M','MEXICANO','MORELIA','AV. TEC.','58000','4433000000',1,'{\"modulos\":[{\"funcion\":2,\"permisos\":[1,1,1,1]},{\"funcion\":3,\"permisos\":[1,1,1,1]},{\"funcion\":4,\"permisos\":[1,1,1,1]},{\"funcion\":5,\"permisos\":[1,1,1,1]},{\"funcion\":7,\"permisos\":[0,1,1,1]},{\"funcion\":8,\"permisos\":[1,1,1,1]},{\"funcion\":9,\"permisos\":[1,1,1,1]},{\"funcion\":10,\"permisos\":[1,1,1,1]},{\"funcion\":11,\"permisos\":[1,1,1,1]},{\"funcion\":12,\"permisos\":[1,1,1,1]},{\"funcion\":15,\"permisos\":[1,1,1,1]},{\"funcion\":16,\"permisos\":[1,1,1,1]},{\"funcion\":17,\"permisos\":[1,1,1,1]}]}',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,0);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
