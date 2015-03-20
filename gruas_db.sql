/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.17 : Database - gruas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gruas` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `gruas`;

/*Table structure for table `adicionales` */

DROP TABLE IF EXISTS `adicionales`;

CREATE TABLE `adicionales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `placas` varchar(100) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL,
  `num_economico` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `adicionales` */

insert  into `adicionales`(`id`,`nombre`,`placas`,`status`,`num_economico`,`created_at`,`updated_at`) values (2,'Adicional3','TYU-455333','','E4','2015-03-19 21:56:01','2015-03-20 01:10:36');

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `direccion` text,
  `telefono` varchar(20) DEFAULT NULL,
  `notas` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`nombre`,`apellidos`,`empresa`,`direccion`,`telefono`,`notas`,`created_at`,`updated_at`) values (6,'Test','Test','Test','Calle 50 por 20 y 22','43432432423',NULL,'2015-03-09 02:47:45','2015-03-09 02:47:45'),(7,'Roberto','Pacheco','4th source','Calle 60 por 53 y 55','99494949494',NULL,'2015-03-09 22:42:29','2015-03-09 22:42:29'),(8,'Prueba','Apellido','Prueba','calle 45 x 40 y 42','9393939393',NULL,'2015-03-10 19:34:18','2015-03-10 19:34:18'),(9,'','','','','',NULL,'2015-03-17 00:05:16','2015-03-17 00:05:16'),(10,'','','','','',NULL,'2015-03-19 19:18:49','2015-03-19 19:18:49');

/*Table structure for table `operadores` */

DROP TABLE IF EXISTS `operadores`;

CREATE TABLE `operadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(10) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `operadores` */

insert  into `operadores`(`id`,`referencia`,`nombre`,`apellido`,`created_at`,`updated_at`) values (6,'L','Pedro','Hernandez','2015-03-08 00:39:14','2015-03-19 21:23:49'),(7,'E','Miguel','Suarez','2015-03-08 01:20:39','2015-03-19 21:24:04'),(12,'T','Roberto','Pacheco','2015-03-19 21:23:10','2015-03-19 21:23:10'),(13,'J','Juan','Perez','2015-03-19 21:23:26','2015-03-19 21:23:26');

/*Table structure for table `reportes` */

DROP TABLE IF EXISTS `reportes`;

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `reportes` */

insert  into `reportes`(`id`,`ticket_id`,`fecha`,`horas`,`created_at`,`created_by`,`updated_at`) values (6,51,'2015-03-15',2,'2015-03-15 18:51:04',NULL,'2015-03-15 18:51:04'),(7,51,'2015-03-16',3,'2015-03-15 18:52:50',NULL,'2015-03-15 18:52:50'),(8,51,'2015-03-16',3,'2015-03-15 19:38:56',NULL,'2015-03-15 19:38:56'),(9,55,'2015-03-17',1,'2015-03-17 00:14:26',NULL,'2015-03-17 00:14:26'),(10,57,'2015-03-17',3,'2015-03-17 18:51:23',NULL,'2015-03-17 18:51:23'),(11,60,'2015-03-17',10,'2015-03-17 19:25:01',NULL,'2015-03-17 19:25:01');

/*Table structure for table `servicios` */

DROP TABLE IF EXISTS `servicios`;

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `servicios` */

insert  into `servicios`(`id`,`tipo`,`nombre`,`descripcion`,`status`,`updated_at`,`created_at`) values (5,'Grúa tipo A',NULL,'Grúa tipo A',NULL,'2015-03-08 23:18:26','2015-03-08 23:18:26'),(6,'Grúa tipo B',NULL,'Grúas',NULL,'2015-03-08 23:21:46','2015-03-08 23:21:46'),(8,'Maquinaria Ligera',NULL,'Renta de maquinaria',NULL,'2015-03-08 23:22:22','2015-03-08 23:22:22'),(9,'Utilitarios',NULL,'Vehiculos utilitarios',NULL,'2015-03-08 23:22:42','2015-03-08 23:22:42'),(11,'Lowboy',NULL,'Renta de Lowboy',NULL,'2015-03-08 23:23:06','2015-03-08 23:23:06'),(12,'Grúa tipo C',NULL,'Grúas',NULL,'2015-03-08 23:50:45','2015-03-08 23:50:45');

/*Table structure for table `tickets` */

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(20) NOT NULL,
  `operador_id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `vehiculo_id` int(11) NOT NULL,
  `vehiculo_adicional_id` int(11) DEFAULT NULL,
  `tiempo_servicio` varchar(50) DEFAULT NULL,
  `horas_programadas` int(11) DEFAULT NULL,
  `horas_reales` int(11) DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `fecha_est_entrada` date DEFAULT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `hora_est_entrada` time DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time NOT NULL,
  `precio_hora` int(11) DEFAULT NULL,
  `precio_total` int(11) DEFAULT NULL,
  `precio_especial_hora` int(11) DEFAULT NULL,
  `precio_especial_total` int(11) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `descripcion` text,
  `status_lugar` varchar(100) NOT NULL,
  `status_comentarios` text,
  `created_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `operadores` (`operador_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

/*Data for the table `tickets` */

insert  into `tickets`(`id`,`folio`,`operador_id`,`servicio_id`,`vehiculo_id`,`vehiculo_adicional_id`,`tiempo_servicio`,`horas_programadas`,`horas_reales`,`fecha_salida`,`fecha_est_entrada`,`fecha_entrada`,`hora_est_entrada`,`hora_entrada`,`hora_salida`,`precio_hora`,`precio_total`,`precio_especial_hora`,`precio_especial_total`,`cliente_id`,`status`,`descripcion`,`status_lugar`,`status_comentarios`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (68,'00007',6,11,10,2,'hora',1,1,'2015-03-20','2015-03-20','2015-03-20','12:30:00','10:00:00','12:00:00',200,200,100,100,7,'Cerrado','test','dentro',NULL,'test1','2015-03-20 00:39:42','test1','2015-03-20 01:14:36'),(69,'00007',6,11,10,2,'hora',2,2,'2015-03-20','2015-03-20','2015-03-20','12:00:00','12:00:00','22:10:00',200,400,NULL,NULL,7,'Cerrado','test','dentro',NULL,'test1','2015-03-20 01:01:41','test1','2015-03-20 01:10:36'),(70,'',7,5,6,NULL,'hora',2,NULL,'2015-03-20','2015-03-20',NULL,'12:00:00',NULL,'22:00:00',NULL,NULL,NULL,NULL,8,'Activo','test','dentro',NULL,'test1','2015-03-20 01:11:11','test1','2015-03-20 01:11:11'),(71,'',7,5,13,NULL,'hora',2,NULL,'2015-03-20','2015-03-20',NULL,'12:00:00',NULL,'22:00:00',NULL,NULL,NULL,NULL,8,'Activo','test','dentro',NULL,'test1','2015-03-20 01:13:45','test1','2015-03-20 01:14:05');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `password_temp` varchar(300) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(180) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `code` varchar(180) DEFAULT NULL,
  `remember_token` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`,`password_temp`,`first_name`,`last_name`,`role`,`active`,`code`,`remember_token`,`created_at`,`updated_at`) values (19,'test1',NULL,'$2y$10$IE8nx8r7qRISK0Go/7dvsOCi4UkWxqpXOmX1GqeR4IZSNgWK.ZBrq',NULL,'Roberto','Pacheco','Admin',1,NULL,'bOWYT3Llv54CuRAR5KD0P02foENW2t3eciLp9eXciY2sQz4SnKiWFCbI04rs','2015-03-08 01:15:24','2015-03-17 19:20:57'),(20,'tickets',NULL,'$2y$10$F83vVG7dkSDy5q2r/bwUgOHOu4LvjDIXXgwtJK8DfWpJu.UwX7T3.',NULL,'Test','Test','Tickets',1,NULL,NULL,'2015-03-08 01:18:54','2015-03-08 01:18:54'),(21,'Almacen',NULL,'$2y$10$545pZ5DYCzgysxQQLjiufuK3aW3JYHuUOc93CgC8un2uCEdizLQ0G',NULL,'Almacen','Almacen','Almacen',1,NULL,NULL,'2015-03-08 01:19:18','2015-03-08 01:19:18'),(22,'usuario',NULL,'$2y$10$Gw7XFF/wDM3g6gEfI5lMB.fSU0kITVaAOJRAUwtZgoyFaIzTAz2vq',NULL,'usuario','usuario','Tickets',1,NULL,'M1hciL0m1CjPpvCTLtrjBdKBiHuwtBF7lfXLVnpRr9vTuo23rEfQCtjbAHw9','2015-03-17 18:43:49','2015-03-17 19:06:44');

/*Table structure for table `vehiculos` */

DROP TABLE IF EXISTS `vehiculos`;

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `servicio_id` int(11) DEFAULT NULL,
  `placas` varchar(14) DEFAULT NULL,
  `num_economico` varchar(200) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `vehiculos` */

insert  into `vehiculos`(`id`,`nombre`,`servicio_id`,`placas`,`num_economico`,`status`,`created_at`,`updated_at`) values (6,'Grua 10 toneladas',5,'GTY-33454','A6','rentado','2015-03-10 18:48:14','2015-03-20 01:11:11'),(10,'Lowboy2',11,'YHJ-45642','T6','','2015-03-17 15:29:17','2015-03-20 01:10:36'),(11,'Bobcat',9,'HYU-434324','B7','','2015-03-19 22:42:11','2015-03-19 22:42:11'),(12,'Maquinaria1',8,'RTY-43243','Y6','','2015-03-19 22:45:10','2015-03-19 22:45:10'),(13,'Grua 15 toneladas',5,'RYU-34532','T5','rentado','2015-03-20 00:32:37','2015-03-20 01:14:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
