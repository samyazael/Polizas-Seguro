/*
Navicat MySQL Data Transfer

Source Server         : sitios
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : agentes

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2022-08-22 18:08:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `agentes`
-- ----------------------------
DROP TABLE IF EXISTS `agentes`;
CREATE TABLE `agentes` (
  `id_agente` varchar(20) NOT NULL,
  `nombre` char(30) DEFAULT NULL,
  `apellido_p` char(30) DEFAULT NULL,
  `apellido_m` char(30) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `contrasenia` varchar(20) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_agente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of agentes
-- ----------------------------
INSERT INTO `agentes` VALUES ('001', 'Samuel', 'Lopez', 'Acosta', 'admin@gmail.com', '12345', '1');
INSERT INTO `agentes` VALUES ('002', 'Azael', 'Concha', 'Torres', 'concha@gmail.com', '12345', '1');

-- ----------------------------
-- Table structure for `aseguradora`
-- ----------------------------
DROP TABLE IF EXISTS `aseguradora`;
CREATE TABLE `aseguradora` (
  `id_tipo_aseguradora` varchar(30) NOT NULL,
  `nombre_aseguradora` char(20) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_aseguradora`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aseguradora
-- ----------------------------
INSERT INTO `aseguradora` VALUES ('ASEG-001', 'AXA');
INSERT INTO `aseguradora` VALUES ('ASEG-002', 'Zurich');
INSERT INTO `aseguradora` VALUES ('ASEG-004', 'ABA');
INSERT INTO `aseguradora` VALUES ('ASEG-005', 'Mapfre');
INSERT INTO `aseguradora` VALUES ('ASEG-006', 'GNP');
INSERT INTO `aseguradora` VALUES ('ASEG-007', 'Qualitas');
INSERT INTO `aseguradora` VALUES ('ASEG-008', 'Seguros Banorte');
INSERT INTO `aseguradora` VALUES ('ASEG-009', 'Sura');
INSERT INTO `aseguradora` VALUES ('ASEG-010', 'Inbursa');

-- ----------------------------
-- Table structure for `asegurados`
-- ----------------------------
DROP TABLE IF EXISTS `asegurados`;
CREATE TABLE `asegurados` (
  `id_asegurado` varchar(30) NOT NULL,
  `nombre` char(30) DEFAULT NULL,
  `apellido_p` char(30) DEFAULT NULL,
  `apellido_m` char(30) DEFAULT NULL,
  `edad` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_asegurado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asegurados
-- ----------------------------
INSERT INTO `asegurados` VALUES ('ASE-22082184135', 'SAMY AZAEL', 'TORRES', 'POLANCO', '22');
INSERT INTO `asegurados` VALUES ('ASE-22082184253', 'CLAUDIA RUBI', 'TUKUCH', 'AVILA', '25');
INSERT INTO `asegurados` VALUES ('003', 'SAMUL', 'BALAM', 'BALAM', '23');
INSERT INTO `asegurados` VALUES ('ASE-22082154356', 'CARLOS GERARDO', 'PERERA', 'CONCHA', '23');
INSERT INTO `asegurados` VALUES ('ASE-22082154500', 'ESMERALDA', 'LOPEZ', 'ACOSTA', '25');
INSERT INTO `asegurados` VALUES ('ASE-220821104520', 'CARLOS', 'SALINA', 'ROCA', '40');
INSERT INTO `asegurados` VALUES ('ASE-220821105715', 'ANTONIO', 'BANDERAS', 'PINTO', '50');

-- ----------------------------
-- Table structure for `clientes`
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id_cliente` varchar(20) NOT NULL,
  `nombre` char(20) DEFAULT NULL,
  `apellido_p` char(20) DEFAULT NULL,
  `apellido_m` char(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `id_agente` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('001', 'Carlos Antonio', 'Lopez', 'Acosta', 'tsuazael@gmail.com', 'AGE-001');
INSERT INTO `clientes` VALUES ('002', 'Gil', 'BALAM', 'BALAM', 'gilbal', '005');
INSERT INTO `clientes` VALUES ('003', 'Gil', 'BALAM', 'BALAM', 'gilbal', '002');
INSERT INTO `clientes` VALUES ('CLIE-22082073828', 'CARLOS GERARDO', 'PERERA', 'PACHECHO', 'carlos@gmail.com', '002');
INSERT INTO `clientes` VALUES ('CLIE-22082095341', 'WILLIAM ALBERTO', 'ACOSTA', 'EK', 'willian@gmail.com', '001');
INSERT INTO `clientes` VALUES ('CLIE-22082080751', 'ANA CRISTIAN', 'TORRES', 'POLANCO', 'ana@gmail.com', '001');
INSERT INTO `clientes` VALUES ('CLIE-22082081824', 'SAMY AZAEL', 'LOPEZ', 'CANTO', 'samy@hotmail.com', '001');
INSERT INTO `clientes` VALUES ('CLIE-22082093456', 'GRACIELA ROCIO', 'ACOSTA', 'EK', 'graciela@gmail.com', '002');
INSERT INTO `clientes` VALUES ('CLIE-22082151741', 'CARLOS GERARDO', 'POLANCO', 'LOPEZ', 'carlos@gmail.com', '001');
INSERT INTO `clientes` VALUES ('CLIE-22082153130', 'ATOCHA', 'BODINES', 'SANTOS', 'atocha@gmail.com', '001');

-- ----------------------------
-- Table structure for `polizas_asegurados`
-- ----------------------------
DROP TABLE IF EXISTS `polizas_asegurados`;
CREATE TABLE `polizas_asegurados` (
  `id_detalle_asegurados` varchar(30) NOT NULL,
  `numero_poliza` int(11) DEFAULT NULL,
  `id_asegurado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_asegurados`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of polizas_asegurados
-- ----------------------------

-- ----------------------------
-- Table structure for `poliza_seguro`
-- ----------------------------
DROP TABLE IF EXISTS `poliza_seguro`;
CREATE TABLE `poliza_seguro` (
  `numero_poliza` varchar(30) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_vigencia` date DEFAULT NULL,
  `precio` varchar(20) DEFAULT NULL,
  `estado_poliza` varchar(20) DEFAULT NULL,
  `id_agente` varchar(20) DEFAULT NULL,
  `id_tipo_poliza` varchar(30) DEFAULT NULL,
  `id_tipo_aseguradora` varchar(30) DEFAULT NULL,
  `id_asegurado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`numero_poliza`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of poliza_seguro
-- ----------------------------
INSERT INTO `poliza_seguro` VALUES ('POLI-22082252105', '2022-08-01', '2023-08-05', '10', 'vigente', '001', 'POLI-003', 'ASEG-001', 'ASE-22082184253');

-- ----------------------------
-- Table structure for `tipos_polizas`
-- ----------------------------
DROP TABLE IF EXISTS `tipos_polizas`;
CREATE TABLE `tipos_polizas` (
  `id_tipo_poliza` varchar(30) NOT NULL,
  `nombre_poliza` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_poliza`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipos_polizas
-- ----------------------------
INSERT INTO `tipos_polizas` VALUES ('POLI-001', 'Gastos Medicos');
INSERT INTO `tipos_polizas` VALUES ('POLI-002', 'Auto');
INSERT INTO `tipos_polizas` VALUES ('POLI-003', 'Seguro de Vida');
