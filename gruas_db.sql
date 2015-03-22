/*
Navicat MySQL Data Transfer

Source Server         : Gruas
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : gruas

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-03-22 17:00:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adicionales
-- ----------------------------
DROP TABLE IF EXISTS `adicionales`;
CREATE TABLE `adicionales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `placas` varchar(100) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL,
  `num_economico` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of adicionales
-- ----------------------------
INSERT INTO `adicionales` VALUES ('2', 'Adicional3', 'TYU-455333', 'rentado', 'E4', '2015-03-19 21:56:01', '2015-03-21 18:01:42', null);

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('6', 'Test', 'Test', 'Test', 'Calle 50 por 20 y 22', '43432432423', null, '2015-03-09 02:47:45', '2015-03-09 02:47:45');
INSERT INTO `clientes` VALUES ('7', 'Roberto', 'Pacheco', '4th source', 'Calle 60 por 53 y 55', '99494949494', null, '2015-03-09 22:42:29', '2015-03-09 22:42:29');
INSERT INTO `clientes` VALUES ('8', 'Prueba', 'Apellido', 'Prueba', 'calle 45 x 40 y 42', '9393939393', null, '2015-03-10 19:34:18', '2015-03-10 19:34:18');
INSERT INTO `clientes` VALUES ('11', 'John', 'Doe', 'Lenovo', 'calle 45 x 40 y 42', '403939303', null, '2015-03-21 17:07:31', '2015-03-21 17:07:31');

-- ----------------------------
-- Table structure for operadores
-- ----------------------------
DROP TABLE IF EXISTS `operadores`;
CREATE TABLE `operadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(10) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of operadores
-- ----------------------------
INSERT INTO `operadores` VALUES ('6', 'L', 'Pedro', 'Hernandez', '2015-03-08 00:39:14', '2015-03-19 21:23:49', null);
INSERT INTO `operadores` VALUES ('7', 'E', 'Miguel', 'Suarez', '2015-03-08 01:20:39', '2015-03-19 21:24:04', null);
INSERT INTO `operadores` VALUES ('13', 'J', 'Juan', 'Perez', '2015-03-19 21:23:26', '2015-03-19 21:23:26', null);
INSERT INTO `operadores` VALUES ('14', 'T', 'Prueb', 'prueba', '2015-03-22 16:37:54', '2015-03-22 16:44:13', '2015-03-22');

-- ----------------------------
-- Table structure for reportes
-- ----------------------------
DROP TABLE IF EXISTS `reportes`;
CREATE TABLE `reportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reportes
-- ----------------------------
INSERT INTO `reportes` VALUES ('13', '70', '2015-03-22', '8', '2015-03-21 16:26:44', '19', '2015-03-21 16:26:44');
INSERT INTO `reportes` VALUES ('15', '71', '2015-03-21', '2', '2015-03-21 16:43:52', '19', '2015-03-21 16:43:52');
INSERT INTO `reportes` VALUES ('17', '74', '2015-03-21', '1', '2015-03-21 18:02:36', '19', '2015-03-21 18:02:36');
INSERT INTO `reportes` VALUES ('18', '70', '2015-03-22', '4', '2015-03-22 16:57:47', '19', '2015-03-22 16:57:47');

-- ----------------------------
-- Table structure for servicios
-- ----------------------------
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of servicios
-- ----------------------------
INSERT INTO `servicios` VALUES ('5', 'Grúa tipo A', null, 'Grúa tipo A', null, '2015-03-08 23:18:26', '2015-03-08 23:18:26', null);
INSERT INTO `servicios` VALUES ('6', 'Grúa tipo B', null, 'Grúas', null, '2015-03-08 23:21:46', '2015-03-08 23:21:46', null);
INSERT INTO `servicios` VALUES ('8', 'Maquinaria Ligera', null, 'Renta de maquinaria', null, '2015-03-08 23:22:22', '2015-03-08 23:22:22', null);
INSERT INTO `servicios` VALUES ('9', 'Utilitarios', null, 'Vehiculos utilitarios', null, '2015-03-22 16:46:59', '2015-03-08 23:22:42', '0000-00-00');
INSERT INTO `servicios` VALUES ('11', 'Lowboy', null, 'Renta de Lowboy', null, '2015-03-08 23:23:06', '2015-03-08 23:23:06', null);
INSERT INTO `servicios` VALUES ('12', 'Grúa tipo C', null, 'Grúas', null, '2015-03-08 23:50:45', '2015-03-08 23:50:45', null);

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
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
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operadores` (`operador_id`),
  KEY `fk_servicios` (`servicio_id`),
  CONSTRAINT `fk_servicios` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES ('68', '00007', '6', '11', '10', '2', 'hora', '1', '1', '2015-03-20', '2015-03-20', '2015-03-20', '12:30:00', '10:00:00', '12:00:00', '200', '200', '100', '100', '7', 'Cerrado', 'test', 'dentro', null, '19', '2015-03-20 00:39:42', '19', '2015-03-20 01:14:36', null);
INSERT INTO `tickets` VALUES ('69', '00007', '6', '11', '10', '2', 'hora', '2', '2', '2015-03-20', '2015-03-20', '2015-03-20', '12:00:00', '12:00:00', '22:10:00', '200', '400', null, null, '7', 'Cerrado', 'test', 'dentro', null, '19', '2015-03-20 01:01:41', '19', '2015-03-20 01:10:36', null);
INSERT INTO `tickets` VALUES ('70', '', '7', '5', '6', null, 'hora', '20', '12', '2015-03-20', '2015-03-20', null, '12:00:00', null, '13:00:00', null, null, null, null, '8', 'Activo', 'test', 'dentro', null, '19', '2015-03-20 01:11:11', '19', '2015-03-22 16:57:47', null);
INSERT INTO `tickets` VALUES ('71', '00008', '7', '5', '13', null, 'hora', '2', '2', '2015-03-20', '2015-03-20', '2015-03-22', '12:00:00', '22:00:00', '22:00:00', '300', '600', null, null, '8', 'Cerrado', 'test', 'dentro', null, '19', '2015-03-20 01:13:45', '20', '2015-03-22 11:06:01', null);
INSERT INTO `tickets` VALUES ('72', '', '6', '5', '6', null, 'hora', '1', null, '2015-03-21', '2015-03-21', null, '10:00:00', null, '09:00:00', null, null, null, null, '6', 'Activo', 'test', 'dentro', null, '19', '2015-03-21 17:06:25', '19', '2015-03-21 17:06:25', null);
INSERT INTO `tickets` VALUES ('73', '', '13', '5', '13', null, 'hora', '4', null, '2015-03-22', '2015-03-22', null, '16:00:00', null, '12:00:00', null, null, null, null, '11', 'Activo', 'test', 'dentro', null, '19', '2015-03-21 17:07:31', '19', '2015-03-21 17:07:31', null);
INSERT INTO `tickets` VALUES ('74', '', '6', '11', '10', '2', 'hora', '1', '1', '2015-03-21', '2015-03-21', null, '15:00:00', null, '14:00:00', null, null, null, null, '6', 'Activo', '', 'dentro', null, '19', '2015-03-21 18:01:42', '19', '2015-03-21 18:02:36', null);
INSERT INTO `tickets` VALUES ('75', '', '6', '8', '12', null, 'hora', '1', null, '2015-03-22', '2015-03-22', null, '10:00:00', null, '21:00:00', null, null, null, null, '7', 'Activo', '', 'dentro', null, '19', '2015-03-22 00:44:58', '19', '2015-03-22 00:44:58', null);
INSERT INTO `tickets` VALUES ('76', '', '6', '6', '14', null, 'hora', '2', null, '2015-03-22', '2015-03-22', null, '17:40:00', null, '15:40:00', null, null, null, null, '7', 'Activo', '', 'dentro', null, '19', '2015-03-22 00:45:52', '19', '2015-03-22 00:45:52', null);
INSERT INTO `tickets` VALUES ('77', '', '13', '11', '10', '2', 'hora', '35', null, '2015-03-22', '2015-03-22', null, '06:00:00', null, '16:00:00', null, null, null, null, '7', 'Activo', '', 'dentro', null, '19', '2015-03-22 00:46:39', '19', '2015-03-22 00:46:39', null);
INSERT INTO `tickets` VALUES ('78', '', '7', '12', '15', null, 'quincena', '3', null, '2015-03-22', '2015-03-22', null, '14:00:00', null, '15:00:00', null, null, null, null, '11', 'Activo', 'test', 'dentro', null, '19', '2015-03-22 00:47:42', '19', '2015-03-22 00:47:42', null);
INSERT INTO `tickets` VALUES ('79', '00008', '13', '9', '11', null, 'hora', '2', '2', '2015-03-22', '2015-03-22', '2015-03-22', '12:00:00', '22:00:00', '10:00:00', '200', '400', null, null, '6', 'Cerrado', 'test', 'dentro', null, '19', '2015-03-22 10:27:43', '19', '2015-03-22 16:14:23', null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
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

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('19', 'test1', null, '$2y$10$IE8nx8r7qRISK0Go/7dvsOCi4UkWxqpXOmX1GqeR4IZSNgWK.ZBrq', null, 'Roberto', 'Pacheco', 'Admin', '1', null, 'E0D6u05YIo9aeSm3liWjXZESW9K9Sm6kfhkE0tPSpjK6yR1tVz8qShUsL8uX', '2015-03-08 01:15:24', '2015-03-22 10:57:52');
INSERT INTO `users` VALUES ('20', 'tickets', null, '$2y$10$F83vVG7dkSDy5q2r/bwUgOHOu4LvjDIXXgwtJK8DfWpJu.UwX7T3.', null, 'Test', 'Test', 'Tickets', '1', null, 'bTonzcjcfjUEi2n34rDjucU5LktOBh3ie9bHFc6VLLDvXVS4s5axccwe2rdp', '2015-03-08 01:18:54', '2015-03-22 16:13:40');
INSERT INTO `users` VALUES ('21', 'almacen', null, '$2y$10$545pZ5DYCzgysxQQLjiufuK3aW3JYHuUOc93CgC8un2uCEdizLQ0G', null, 'Almacen', 'Almacen', 'Almacen', '1', null, 'dJFFqrkMjTyMBcuCZiDZTt1SiIdHlELBjVvOFb7GjpYj08E9HA6qERmhiee6', '2015-03-08 01:19:18', '2015-03-22 11:01:40');
INSERT INTO `users` VALUES ('22', 'usuario', null, '$2y$10$Gw7XFF/wDM3g6gEfI5lMB.fSU0kITVaAOJRAUwtZgoyFaIzTAz2vq', null, 'usuario', 'usuario', 'Tickets', '1', null, 'M1hciL0m1CjPpvCTLtrjBdKBiHuwtBF7lfXLVnpRr9vTuo23rEfQCtjbAHw9', '2015-03-17 18:43:49', '2015-03-17 19:06:44');

-- ----------------------------
-- Table structure for vehiculos
-- ----------------------------
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
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculos
-- ----------------------------
INSERT INTO `vehiculos` VALUES ('6', 'Grua 10 toneladas', '5', 'GTY-33454', 'A6', 'rentado', '2015-03-10 18:48:14', '2015-03-21 16:39:59', null);
INSERT INTO `vehiculos` VALUES ('10', 'Lowboy2', '11', 'YHJ-45642', 'T6', 'rentado', '2015-03-17 15:29:17', '2015-03-21 18:01:42', null);
INSERT INTO `vehiculos` VALUES ('11', 'Bobcat', '9', 'HYU-434324', 'B7', '', '2015-03-19 22:42:11', '2015-03-22 16:24:03', '0000-00-00');
INSERT INTO `vehiculos` VALUES ('12', 'Maquinaria1', '8', 'RTY-43243', 'Y6', 'rentado', '2015-03-19 22:45:10', '2015-03-22 00:44:58', null);
INSERT INTO `vehiculos` VALUES ('13', 'Grua 15 toneladas', '5', 'RYU-34532', 'T5', 'rentado', '2015-03-20 00:32:37', '2015-03-20 01:14:05', null);
INSERT INTO `vehiculos` VALUES ('14', 'Grúa 5 toneladas', '6', 'TYH-49493', 'E3', 'rentado', '2015-03-21 18:08:27', '2015-03-22 00:45:52', null);
INSERT INTO `vehiculos` VALUES ('15', 'Grua 50 tons', '12', 'KEL-3243', 'H6', 'rentado', '2015-03-22 00:47:16', '2015-03-22 00:47:42', null);
