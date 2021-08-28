/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.5.8-MariaDB-log : Database - boletera
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `funciones` */

insert  into `funciones`(`id`,`id_modulo`,`funcion`,`ruta_funcion`,`alta`,`baja`,`consulta`,`modificacion`,`created_at`,`updated_at`) values 
(1,1,'CONFIG APP','super-admin',1,1,1,1,NULL,NULL),
(2,2,'GESTION DE USUARIOS','gestion-usuarios',1,1,1,1,NULL,NULL),
(3,3,'GEOCERCAS','geocercas',1,1,1,1,NULL,NULL),
(4,3,'CREAR-GEOCERCAS','crear-geocercas',1,1,1,1,NULL,NULL),
(5,4,'EMPRESAS','empresas',1,1,1,1,NULL,NULL),
(7,4,'CREAR EMPRESA','crearempresa',1,1,1,1,NULL,NULL),
(8,5,'USUARIOS','usuarios',1,1,1,1,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `geocercas` */

insert  into `geocercas`(`id`,`nombre`,`datos`,`empresa`,`created_at`,`updated_at`) values 
(12,'soledad','[\"19.72866,-101.18761\",\"19.72576,-101.188\",\"19.72681,-101.18418\",\"19.72862,-101.18281\"]',1,'2021-07-03 23:18:43','2021-07-03 23:18:43'),
(14,'atencion animal','[\"19.72754,-101.17335\",\"19.72625,-101.17306\",\"19.72656,-101.17035\",\"19.72793,-101.17057\"]',1,'2021-07-03 23:20:53','2021-07-03 23:20:53'),
(15,'Tienda naturista','[\"19.706,-101.18486\",\"19.70581,-101.18483\",\"19.70585,-101.1846\",\"19.70603,-101.18461\"]',2,'2021-07-10 01:02:48','2021-07-10 01:02:48');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(17,'2021_07_17_175037_create_crearempresa_table',4);

/*Table structure for table `modulos` */

DROP TABLE IF EXISTS `modulos`;

CREATE TABLE `modulos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `modulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `modulos` */

insert  into `modulos`(`id`,`modulo`,`icono`,`created_at`,`updated_at`) values 
(1,'SA','fas fa-user-cog',NULL,NULL),
(2,'ADMIN','fas fa-user-shield',NULL,NULL),
(3,'GEOCERCAS','fas fa-map',NULL,NULL),
(4,'EMPRESAS','far fa-building',NULL,NULL),
(5,'USUARIOS','fas fa-users',NULL,NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

/*Table structure for table `oauth_personal_access_clients` */

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

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

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipos_usuario` */

insert  into `tipos_usuario`(`id`,`tipo`,`descripcion`,`modulos_base`,`created_at`,`updated_at`) values 
(1,'SU','SUPER USUARIO','[1,2,3,4,5,6,7,8]',NULL,NULL),
(2,'ADM','ADMINISTRADOR','[1,2,3,4,5,6,7,8]',NULL,NULL),
(3,'EMP','Empresa','[1,2,3,4,5,6,7]',NULL,NULL),
(4,'TRA','Trabajador','[1,2,3,4,5,6,7]',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`nombre`,`apellido_paterno`,`apellido_materno`,`curp`,`rfc`,`fecha_nacimiento`,`genero`,`nacionalidad`,`ciudad_nacimiento`,`domicilio`,`codigo_postal`,`telefono`,`activo`,`modulos_usuario`,`id_sangre`,`id_tipo_usuario`,`id_estado_civil`,`numero_seguridad_social`,`afiliacion_seguridad_social`,`id_estado`,`ine`,`id_religion`,`empresa`) values 
(1,'Administrator','admin@admin.admin',NULL,'$2y$10$KA7G11X3xKGK0aVjBZPOU.8YmPeBCsH2/kuEjXwN3Zdg2Tc9jMf8u',NULL,NULL,NULL,'ADMINISTRATOR','ADMIN',NULL,NULL,NULL,'2021-06-07','M','MEXICANO','MORELIA','AV. TEC.','58000','4433000000',1,'{\"modulos\":[{\"funcion\":2,\"permisos\":[1,1,1,1]},{\"funcion\":3,\"permisos\":[1,1,1,1]},{\"funcion\":4,\"permisos\":[1,1,1,1]},{\"funcion\":5,\"permisos\":[1,1,1,1]},{\"funcion\":7,\"permisos\":[0,1,1,1]},{\"funcion\":8,\"permisos\":[1,1,1,1]}]}',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,'TESTER','a@b.com',NULL,'$2y$10$y7KzYMAZ6EE7ZeT9pZ379.IgfVDDXNyENwsXoP6di2/rxWoflNxdi',NULL,'2021-07-18 17:02:58','2021-07-18 17:02:58','TESTER','','',NULL,NULL,'2021-07-18','','','PENDIENTE','','','',1,'{\"modulos\":[{\"funcion\":3,\"permisos\":[1,1,1,1]},{\"funcion\":4,\"permisos\":[1,1,1,1]},{\"funcion\":5,\"permisos\":[1,1,1,1]},{\"funcion\":7,\"permisos\":[0,1,1,1]},{\"funcion\":8,\"permisos\":[1,1,1,1]}]}',NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,1),
(3,'SUBUSUARIO','user@a.com',NULL,'$2y$10$lzFFSZh7ll2lQBmgOePF6OsfBpxHC1rKiG.xb3cFt3cU7kIwdS8ie',NULL,'2021-07-18 17:28:20','2021-07-18 17:28:20','SUBUSUARIO','','',NULL,NULL,'2021-07-18','','','PENDIENTE','','','',1,'{\"modulos\":[{\"funcion\":3,\"permisos\":[1,1,1,1]},{\"funcion\":4,\"permisos\":[1,1,1,1]},{\"funcion\":5,\"permisos\":[1,1,1,1]},{\"funcion\":7,\"permisos\":[0,1,1,1]},{\"funcion\":8,\"permisos\":[1,1,1,1]}]}',NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
