/*
Navicat MySQL Data Transfer

Source Server         : Searito's Localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : gamer_olympus

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-06-08 00:23:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for consoles
-- ----------------------------
DROP TABLE IF EXISTS `consoles`;
CREATE TABLE `consoles` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of consoles
-- ----------------------------
INSERT INTO `consoles` VALUES ('1', 'PlayStation');
INSERT INTO `consoles` VALUES ('2', 'PlayStation 2');
INSERT INTO `consoles` VALUES ('3', 'PlayStation 3');
INSERT INTO `consoles` VALUES ('4', 'PlayStation 4');
INSERT INTO `consoles` VALUES ('5', 'Xbox');
INSERT INTO `consoles` VALUES ('6', 'Xbox 360');
INSERT INTO `consoles` VALUES ('7', 'Xbox One');
INSERT INTO `consoles` VALUES ('8', 'Super Nintendo');
INSERT INTO `consoles` VALUES ('9', 'Nintendo 64');
INSERT INTO `consoles` VALUES ('10', 'Game Cube');
INSERT INTO `consoles` VALUES ('11', 'Wii');
INSERT INTO `consoles` VALUES ('12', 'Wii U');
INSERT INTO `consoles` VALUES ('13', 'Game Boy');
INSERT INTO `consoles` VALUES ('14', 'Game Boy Color');
INSERT INTO `consoles` VALUES ('15', 'Game Boy Advance');
INSERT INTO `consoles` VALUES ('16', 'Game Boy Advance Sp');
INSERT INTO `consoles` VALUES ('17', 'Nintendo DS');
INSERT INTO `consoles` VALUES ('18', 'Nintendo DS XL');
INSERT INTO `consoles` VALUES ('19', 'Nintendo 3 DS');
INSERT INTO `consoles` VALUES ('20', 'Play Station Portable');
INSERT INTO `consoles` VALUES ('21', 'Play Station Vita');

-- ----------------------------
-- Table structure for games
-- ----------------------------
DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `development` varchar(60) NOT NULL,
  `year` int(4) NOT NULL,
  `genre` varchar(60) NOT NULL,
  `esrb` varchar(60) NOT NULL,
  `img` varchar(75) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(3) NOT NULL,
  `id_console` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of games
-- ----------------------------
INSERT INTO `games` VALUES ('9', 'Shadow Of The Colossus', 'Team ICO', '2005', 'AcciÃ³n - Aventura', 'Teen', '../img/Games/ShadowOfTheColossus.jpg', '0.75', '22', '2');
INSERT INTO `games` VALUES ('10', 'God Of War III', 'SCE Studios Santa Monica', '2010', 'AcciÃ³n - Aventura ', 'Mature 17+', '../img/Games/GOW3.jpg', '2.00', '30', '3');
INSERT INTO `games` VALUES ('11', 'Conker: Live &amp; Reloaded', 'Rare', '2005', 'Plataforma', 'Mature 17+', '../img/Games/Konker Live & Reloaded.jpg', '0.50', '20', '5');
INSERT INTO `games` VALUES ('12', 'Bayonetta', 'Platinum Games', '2010', 'AcciÃ³n', 'Mature 17+', '../img/Games/Bayonetta.jpg', '1.00', '29', '6');
INSERT INTO `games` VALUES ('13', 'Mario Kart 8', 'NIntendo EAD', '2014', 'Carreras', 'Everyone', '../img/Games/Mario-Kart-8.jpg', '2.50', '22', '12');
INSERT INTO `games` VALUES ('15', 'Assassins Creed: Rogue', 'Ubisoft Sofia', '2014', 'AcciÃ³n - Aventura', 'Mature 17+', '../img/Games/AssassinsCreedRogue.jpeg', '1.25', '25', '3');
INSERT INTO `games` VALUES ('18', 'GTA: V', 'Rockstar North', '2014', 'AcciÃ³n - Aventura', 'Mature 17+', '../img/Games/GTAV.png', '1.75', '28', '4');
INSERT INTO `games` VALUES ('19', 'Mortal Kombat X', 'NetherRealm Studios', '2015', 'Lucha', 'Mature 17+', '../img/Games/MKX.jpg', '2.50', '25', '7');

-- ----------------------------
-- Table structure for process
-- ----------------------------
DROP TABLE IF EXISTS `process`;
CREATE TABLE `process` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `numeror` int(4) NOT NULL,
  `juego` varchar(60) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cant_dias` int(3) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of process
-- ----------------------------
INSERT INTO `process` VALUES ('1', '1', 'Mario Kart 8', '2.50', '8', '20.00');
INSERT INTO `process` VALUES ('2', '2', 'Mario Kart 8', '2.50', '8', '20.00');
INSERT INTO `process` VALUES ('3', '2', 'God Of War III', '2.00', '8', '16.00');
INSERT INTO `process` VALUES ('4', '3', 'Shadow Of The Colossus', '1.50', '15', '22.50');
INSERT INTO `process` VALUES ('5', '3', 'Conker: Live &amp; Reloaded', '0.50', '8', '4.00');
INSERT INTO `process` VALUES ('6', '4', 'Bayonetta', '1.00', '5', '5.00');
INSERT INTO `process` VALUES ('7', '4', 'Mario Kart 8', '2.50', '8', '20.00');
INSERT INTO `process` VALUES ('8', '4', 'Shadow Of The Colossus', '1.50', '10', '15.00');
INSERT INTO `process` VALUES ('9', '5', 'Shadow Of The Colossus', '1.50', '5', '7.50');
INSERT INTO `process` VALUES ('10', '5', 'Mario Kart 8', '2.50', '8', '20.00');

-- ----------------------------
-- Table structure for rental
-- ----------------------------
DROP TABLE IF EXISTS `rental`;
CREATE TABLE `rental` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `date_out` datetime NOT NULL,
  `date_in` datetime NOT NULL,
  `id_user` int(4) NOT NULL,
  `id_game` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rental
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `user` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` binary(1) NOT NULL,
  `dui` varchar(13) NOT NULL,
  `tel1` varchar(9) NOT NULL,
  `tel2` varchar(9) DEFAULT NULL,
  `address` varchar(60) NOT NULL,
  `depto` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('7', 'Admin', 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 0x30, '04641215-6', '2665-0892', '7509-0021', '6Â° calle pte. #13 BÂ° Yusique', 'San Miguel', 'Chinameca');
INSERT INTO `users` VALUES ('8', 'GonzÃ¡lez, Lariley', 'Lary', '827ccb0eea8a706c4c34a16891f84e7b', 0x31, '87345618-1', '2660-5234', '7743-2115', 'Urb. Jardines de Monte Blanco, Pje 20, #17', 'San Miguel', 'San Miguel');
INSERT INTO `users` VALUES ('9', 'PÃ©rez, Marcos', 'marcos', 'e10adc3949ba59abbe56e057f20f883e', 0x31, '12457693-3', '2660-5612', '7895-5421', 'Col. San Benito #47', 'San Miguel', 'Quelepa');
INSERT INTO `users` VALUES ('11', 'ClÃ­maco, Sear', 'Searito', '878dfff35496036a9bd45a66a7a8985b', 0x30, '08621325-7', '2665-0892', '7509-0021', '6Â° calle pte. #13 BÂ° Yusique', 'San Miguel', 'Chinameca');
INSERT INTO `users` VALUES ('13', 'Himura, Kenshin', 'Battousai', '4d186321c1a7f0f354b297e8914ab240', 0x30, '98765432-1', '2283-2510', '7270-5008', 'Urb. Tokyo Ghoul, #22', 'La UniÃ³n', 'Jocoro');
INSERT INTO `users` VALUES ('14', 'ClÃ­maco, Jasub', 'Jasub', '827ccb0eea8a706c4c34a16891f84e7b', 0x31, '03750305-7', '2665-0892', '7509-0021', '6Â° calle pte. #13 BÂ° Yusique', 'San Miguel', 'Chinameca');
