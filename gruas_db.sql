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

/*Table structure for table `cliente_ticket` */

DROP TABLE IF EXISTS `cliente_ticket`;

CREATE TABLE `cliente_ticket` (
  `cliente_id` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cliente_ticket` */

insert  into `cliente_ticket`(`cliente_id`,`ticket_id`) values (7,55),(7,56),(7,57),(7,58),(6,59),(7,60);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`nombre`,`apellidos`,`empresa`,`direccion`,`telefono`,`notas`,`created_at`,`updated_at`) values (6,'Test','Test','Test','Calle 50 por 20 y 22','43432432423',NULL,'2015-03-09 02:47:45','2015-03-09 02:47:45'),(7,'Roberto','Pacheco','4th source','Calle 60 por 53 y 55','99494949494',NULL,'2015-03-09 22:42:29','2015-03-09 22:42:29'),(8,'Prueba','Apellido','Prueba','calle 45 x 40 y 42','9393939393',NULL,'2015-03-10 19:34:18','2015-03-10 19:34:18'),(9,'','','','','',NULL,'2015-03-17 00:05:16','2015-03-17 00:05:16');

/*Table structure for table `operador_ticket` */

DROP TABLE IF EXISTS `operador_ticket`;

CREATE TABLE `operador_ticket` (
  `operador_id` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `operador_ticket` */

insert  into `operador_ticket`(`operador_id`,`ticket_id`) values (8,55),(6,56),(7,57),(8,58),(6,59),(6,60);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `operadores` */

insert  into `operadores`(`id`,`referencia`,`nombre`,`apellido`,`created_at`,`updated_at`) values (6,'L','Operador3','Prueba','2015-03-08 00:39:14','2015-03-17 18:45:01'),(7,'E','Test','Test Operador','2015-03-08 01:20:39','2015-03-08 01:20:39'),(8,'G','Gustavo','Test','2015-03-08 01:20:56','2015-03-08 01:20:56'),(10,'A','PRUEBA 2','OPERADOR','2015-03-10 18:39:20','2015-03-10 18:39:33'),(11,'L','Prueba','PRueba','2015-03-14 15:16:28','2015-03-14 15:16:28');

/*Table structure for table `reportes` */

DROP TABLE IF EXISTS `reportes`;

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `reportes` */

insert  into `reportes`(`id`,`ticket_id`,`fecha`,`horas`,`created_at`,`updated_at`) values (6,51,'2015-03-15',2,'2015-03-15 18:51:04','2015-03-15 18:51:04'),(7,51,'2015-03-16',3,'2015-03-15 18:52:50','2015-03-15 18:52:50'),(8,51,'2015-03-16',3,'2015-03-15 19:38:56','2015-03-15 19:38:56'),(9,55,'2015-03-17',1,'2015-03-17 00:14:26','2015-03-17 00:14:26'),(10,57,'2015-03-17',3,'2015-03-17 18:51:23','2015-03-17 18:51:23'),(11,60,'2015-03-17',10,'2015-03-17 19:25:01','2015-03-17 19:25:01');

/*Table structure for table `servicio_ticket` */

DROP TABLE IF EXISTS `servicio_ticket`;

CREATE TABLE `servicio_ticket` (
  `servicio_id` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  KEY `servicios` (`servicio_id`),
  CONSTRAINT `servicios` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `servicio_ticket` */

insert  into `servicio_ticket`(`servicio_id`,`ticket_id`) values (11,55),(5,56),(5,57),(5,58),(5,59),(5,60);

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

insert  into `servicios`(`id`,`tipo`,`nombre`,`descripcion`,`status`,`updated_at`,`created_at`) values (5,'Grúa tipo A',NULL,'Grúa tipo A',NULL,'2015-03-08 23:18:26','2015-03-08 23:18:26'),(6,'Grúa tipo B',NULL,'Grúas',NULL,'2015-03-08 23:21:46','2015-03-08 23:21:46'),(7,'Maniobra',NULL,'Maniobras',NULL,'2015-03-08 23:22:02','2015-03-08 23:22:02'),(8,'Maquinaria Ligera',NULL,'Renta de maquinaria',NULL,'2015-03-08 23:22:22','2015-03-08 23:22:22'),(9,'Utilitarios',NULL,'Vehiculos utilitarios',NULL,'2015-03-08 23:22:42','2015-03-08 23:22:42'),(11,'Lowboy',NULL,'Renta de Lowboy',NULL,'2015-03-08 23:23:06','2015-03-08 23:23:06'),(12,'Grúa tipo C',NULL,'Grúas',NULL,'2015-03-08 23:50:45','2015-03-08 23:50:45'),(13,'Servicio Prueba',NULL,'Prueba',NULL,'2015-03-10 18:41:28','2015-03-10 18:41:28');

/*Table structure for table `tickets` */

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(20) NOT NULL,
  `operador_id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `vehiculo` varchar(100) NOT NULL,
  `vehiculo_adicional` varchar(100) DEFAULT NULL,
  `tiempo_servicio` varchar(50) DEFAULT NULL,
  `horas_programadas` int(11) DEFAULT NULL,
  `horas_reales` int(11) DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `fecha_est_entrada` date DEFAULT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `hora_est_entrada` time DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time NOT NULL,
  `costo` int(11) DEFAULT NULL,
  `costo_total` int(11) DEFAULT NULL,
  `precio_especial` int(11) DEFAULT NULL,
  `precio_especial_total` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `descripcion` text,
  `status_lugar` varchar(20) NOT NULL,
  `status_comentarios` text,
  `herramientas` text,
  `created_by` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `operadores` (`operador_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `tickets` */

insert  into `tickets`(`id`,`folio`,`operador_id`,`servicio_id`,`vehiculo`,`vehiculo_adicional`,`tiempo_servicio`,`horas_programadas`,`horas_reales`,`fecha_salida`,`fecha_est_entrada`,`fecha_entrada`,`hora_est_entrada`,`hora_entrada`,`hora_salida`,`costo`,`costo_total`,`precio_especial`,`precio_especial_total`,`cliente_id`,`status`,`descripcion`,`status_lugar`,`status_comentarios`,`herramientas`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (55,' 123',8,11,'Lowbow 1','Plancha1','hora',2,2,'2015-03-17','2015-03-17','2015-03-17','10:00:00','18:00:00','08:00:00',300,600,NULL,NULL,7,'Cerrado','Test','dentro',NULL,NULL,'test1','2015-03-17 00:13:13','test1','2015-03-17 18:00:37'),(56,' 456',6,5,'Plancha 1',NULL,'hora',1,1,'2015-03-17','2015-03-17','2015-03-17','21:00:00','09:00:00','20:00:00',300,300,NULL,NULL,7,'Cerrado','test','dentro',NULL,NULL,'test1','2015-03-17 18:18:28','test1','2015-03-17 18:35:42'),(57,' ',7,5,'Grua 15 toneladas',NULL,'hora',3,3,'2015-03-17','2015-03-17','0000-00-00','22:00:00','00:00:00','19:00:00',300,900,NULL,NULL,7,'Cerrado','test','dentro',NULL,NULL,'test1','2015-03-17 18:48:52','test1','2015-03-17 18:51:43'),(58,'',8,5,'Plancha 1',NULL,'hora',1,NULL,'2015-03-24','2015-03-24',NULL,'22:00:00',NULL,'21:00:00',NULL,NULL,NULL,NULL,7,'Activo','','dentro',NULL,NULL,'usuario','2015-03-17 18:57:39','usuario','2015-03-17 18:58:57'),(59,'',6,5,'Plancha 1',NULL,'hora',0,NULL,'0000-00-00','0000-00-00',NULL,'00:00:00',NULL,'00:00:00',NULL,NULL,NULL,NULL,6,'Activo','','dentro',NULL,NULL,'test1','2015-03-17 19:14:53','test1','2015-03-17 19:14:53'),(60,' 123123',6,5,'Grua 15 toneladas',NULL,'hora',24,10,'2015-03-17','2015-03-18','2015-03-17','21:00:00','20:00:00','21:00:00',300,3000,NULL,NULL,7,'Cerrado','','dentro',NULL,NULL,'test1','2015-03-17 19:23:42','test1','2015-03-17 19:25:29');

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
  `tipo` varchar(100) DEFAULT NULL,
  `placas` varchar(14) DEFAULT NULL,
  `num_economico` varchar(200) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `vehiculos` */

insert  into `vehiculos`(`id`,`nombre`,`tipo`,`placas`,`num_economico`,`status`,`created_at`,`updated_at`) values (3,'Lowbow 1','Lowboy','YWZ-34543','L5','','2015-03-09 00:34:00','2015-03-17 18:00:37'),(4,'Plancha 1','Grúa tipo A','YWG-56433','A1','rentado','2015-03-09 00:35:02','2015-03-17 18:57:39'),(6,'Grua 15 toneladas','Grúa tipo A','GTY-33454','A6','','2015-03-10 18:48:14','2015-03-17 19:25:29'),(7,'Lowboy Adicional','Adicional','FTG-45675','F5','rentado','2015-03-16 22:16:44','2015-03-17 00:13:13'),(8,'Adicional3','Adicional','YHD-45634','T6',NULL,'2015-03-16 23:57:10','2015-03-17 00:00:42'),(9,'Plancha1','Adicional','RTG-453432','R4','','2015-03-17 00:00:21','2015-03-17 18:00:37'),(10,'Lowboy2','Lowboy','YHJ-45642','T6',NULL,'2015-03-17 15:29:17','2015-03-17 15:29:17');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
