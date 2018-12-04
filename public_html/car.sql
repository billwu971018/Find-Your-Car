/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : car

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-28 22:19:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for belongto
-- ----------------------------
DROP TABLE IF EXISTS `belongto`;
CREATE TABLE `belongto` (
  `CarID` int(11) NOT NULL,
  `DealerID` int(11) NOT NULL,
  PRIMARY KEY (`CarID`,`DealerID`),
  UNIQUE KEY `CarID` (`CarID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of belongto
-- ----------------------------
INSERT INTO `belongto` VALUES ('1', '1');
INSERT INTO `belongto` VALUES ('2', '1');
INSERT INTO `belongto` VALUES ('3', '1');
INSERT INTO `belongto` VALUES ('4', '1');
INSERT INTO `belongto` VALUES ('5', '1');
INSERT INTO `belongto` VALUES ('6', '1');
INSERT INTO `belongto` VALUES ('7', '1');
INSERT INTO `belongto` VALUES ('8', '1');
INSERT INTO `belongto` VALUES ('9', '1');
INSERT INTO `belongto` VALUES ('10', '1');
INSERT INTO `belongto` VALUES ('11', '2');
INSERT INTO `belongto` VALUES ('12', '2');
INSERT INTO `belongto` VALUES ('13', '2');
INSERT INTO `belongto` VALUES ('14', '2');
INSERT INTO `belongto` VALUES ('15', '2');
INSERT INTO `belongto` VALUES ('16', '2');
INSERT INTO `belongto` VALUES ('17', '2');
INSERT INTO `belongto` VALUES ('18', '2');
INSERT INTO `belongto` VALUES ('19', '2');
INSERT INTO `belongto` VALUES ('20', '2');
INSERT INTO `belongto` VALUES ('21', '3');
INSERT INTO `belongto` VALUES ('22', '3');
INSERT INTO `belongto` VALUES ('23', '3');
INSERT INTO `belongto` VALUES ('24', '3');
INSERT INTO `belongto` VALUES ('25', '3');
INSERT INTO `belongto` VALUES ('26', '3');
INSERT INTO `belongto` VALUES ('27', '3');
INSERT INTO `belongto` VALUES ('28', '3');
INSERT INTO `belongto` VALUES ('29', '3');
INSERT INTO `belongto` VALUES ('30', '3');
INSERT INTO `belongto` VALUES ('31', '4');
INSERT INTO `belongto` VALUES ('32', '4');
INSERT INTO `belongto` VALUES ('33', '4');
INSERT INTO `belongto` VALUES ('34', '4');
INSERT INTO `belongto` VALUES ('35', '4');
INSERT INTO `belongto` VALUES ('36', '4');
INSERT INTO `belongto` VALUES ('37', '4');
INSERT INTO `belongto` VALUES ('38', '4');
INSERT INTO `belongto` VALUES ('39', '4');
INSERT INTO `belongto` VALUES ('40', '4');

-- ----------------------------
-- Table structure for carinformation
-- ----------------------------
DROP TABLE IF EXISTS `carinformation`;
CREATE TABLE `carinformation` (
  `CarId` int(100) NOT NULL AUTO_INCREMENT,
  `Make` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Price` int(100) NOT NULL,
  `NewOrUsed` varchar(100) NOT NULL,
  `BelongTo` int(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CarId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of carinformation
-- ----------------------------
INSERT INTO `carinformation` VALUES ('1', 'Audi', 'S8 4.0T', 'White', '90000', 'Used', '1', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('2', 'Porsche', 'Macan S', 'Blue', '51800', 'Used', '1', '2018-11-28 15:51:32');
INSERT INTO `carinformation` VALUES ('3', 'Aston Martin', 'V8 vantage', 'Black', '66800', 'Used', '1', '2018-11-28 15:51:34');
INSERT INTO `carinformation` VALUES ('4', 'Chevrolet ', 'Corvette', 'Black', '42480', 'Used', '1', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('5', 'Merceds-Benz', 'AMG  C43', 'Black', '47700', 'Used', '1', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('6', 'Cadillac', 'XT5', 'Silver', '34400', 'Used', '1', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('7', 'BMW', 'X530', 'Black', '44800', 'Used', '1', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('8', 'Maserati', 'Ghibli', 'Blue', '82500', 'New', '1', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('9', 'Aston Martin', 'DB11', 'Black', '221459', 'New', '1', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('10', 'Maserati', 'Quattroporte', 'Yellow', '124620', 'New', '1', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('11', 'Suzuki', 'Forenza', 'Red', '1200', 'Used', '2', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('12', 'Chrysler', 'PT Cruiser', 'Black', '1700', 'Used', '2', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('13', 'Chevrolet ', 'Cruze', 'Black', '8977', 'Used', '2', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('14', 'Nissan', 'Altima', 'Silver', '9500', 'Used', '2', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('15', 'Hyundai', 'SE', 'Black', '9900', 'Used', '2', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('16', 'Mazada', 'I Sport', 'White', '12300', 'Used', '2', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('17', 'Jeep', 'Patriot', 'White', '12800', 'Used', '2', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('18', 'Ford', 'Mustang V6', 'Silver', '14500', 'Used', '2', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('19', 'Volkswagen', 'CC', 'White', '15200', 'Used', '2', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('20', 'Ram', 'Big Horn 1500', 'Red', '39255', 'New', '2', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('21', 'Aston Martin', 'Vantage', 'Black', '39980', 'New', '3', '2018-11-28 21:51:41');
INSERT INTO `carinformation` VALUES ('22', 'Audi', 'Q7', 'Black', '43995', 'Used', '3', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('23', 'Audi', 'RS7', 'Sliver', '27941', 'Used', '3', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('24', 'BMW', 'M3', 'White', '25995', 'Used', '3', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('25', 'BMW', 'X3', 'White', '12995', 'Used', '3', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('26', 'BMW', 'I8', 'Black', '74995', 'Used', '3', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('27', 'Cadillac', 'SRX', 'Black', '22995', 'Used', '3', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('28', 'Chevrolet ', 'Nova', 'White', '26995', 'Used', '3', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('29', 'Dodge', 'Challenger', 'Purple', '36995', 'Used', '3', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('31', 'Nissan', 'Sentra', 'Black', '6900', 'Used', '4', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('32', 'Nissan', 'Altima', 'White', '7900', 'Used', '4', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('33', 'Toyota', 'Yaris LE', 'Blue', '8200', 'Used', '4', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('34', 'Volkswagen', 'Jette', 'Sliver', '12000', 'Used', '4', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('35', 'Chrysler', 'C300', 'Sliver', '12000', 'Used', '4', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('36', 'Jeep', 'Patriot', 'White', '12800', 'Used', '4', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('37', 'Chevrolet ', 'Cruze', 'White', '13000', 'Used', '4', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('38', 'Ford', 'Mustang V6', 'Sliver', '13300', 'Used', '4', '2018-11-28 15:51:28');
INSERT INTO `carinformation` VALUES ('39', 'Nissan', 'Altima', 'Yellow', '13977', 'Used', '4', '2018-11-28 15:51:28');

-- ----------------------------
-- Table structure for carstype
-- ----------------------------
DROP TABLE IF EXISTS `carstype`;
CREATE TABLE `carstype` (
  `Level` int(100) NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `AveragePrice` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of carstype
-- ----------------------------
INSERT INTO `carstype` VALUES ('3', 'Audi', '30000');
INSERT INTO `carstype` VALUES ('4', 'Porsche', '60000');
INSERT INTO `carstype` VALUES ('5', 'Aston Martin', '120000');
INSERT INTO `carstype` VALUES ('2', 'Chevrolet', '25000');
INSERT INTO `carstype` VALUES ('4', 'Merceds-Benz', '50000');
INSERT INTO `carstype` VALUES ('2', 'Cadillac', '22000');
INSERT INTO `carstype` VALUES ('4', 'BMW', '45000');
INSERT INTO `carstype` VALUES ('5', 'Maserati', '85000');
INSERT INTO `carstype` VALUES ('1', 'Suzuki', '15000');
INSERT INTO `carstype` VALUES ('2', 'Chrysler', '20000');
INSERT INTO `carstype` VALUES ('2', 'Nissan', '16000');
INSERT INTO `carstype` VALUES ('1', 'Hyundai', '10000');
INSERT INTO `carstype` VALUES ('1', 'Mazada', '12000');
INSERT INTO `carstype` VALUES ('2', 'Jeep', '16000');
INSERT INTO `carstype` VALUES ('2', 'Ford', '20000');
INSERT INTO `carstype` VALUES ('2', 'Volkswagen', '18000');
INSERT INTO `carstype` VALUES ('1', 'Ram', '6000');
INSERT INTO `carstype` VALUES ('1', 'Dodge', '12000');
INSERT INTO `carstype` VALUES ('5', 'Ferrari', '240000');
INSERT INTO `carstype` VALUES ('1', 'Toyota', '10000');

-- ----------------------------
-- Table structure for customerinformation
-- ----------------------------
DROP TABLE IF EXISTS `customerinformation`;
CREATE TABLE `customerinformation` (
  `CustomerId` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Age` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `PhoneNumber` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`CustomerId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customerinformation
-- ----------------------------
INSERT INTO `customerinformation` VALUES ('1', '', '', '', '', 'Alan', '333');
INSERT INTO `customerinformation` VALUES ('2', '', '', '', '', 'Alan', '111');
INSERT INTO `customerinformation` VALUES ('3', '', '', '', '', 'Bill', '123');
INSERT INTO `customerinformation` VALUES ('4', '', '', '', '', 'Davidchow', '123');
INSERT INTO `customerinformation` VALUES ('5', '', '', '', '', 'Davidchow', '123');
INSERT INTO `customerinformation` VALUES ('6', '', '', '', '', 'a', 'b');
INSERT INTO `customerinformation` VALUES ('7', '', '', '', '', 'm', 'm');
INSERT INTO `customerinformation` VALUES ('8', '', '', '', '', 'Edward', '231');
INSERT INTO `customerinformation` VALUES ('9', '', '', '', '', '1231', '12313');
INSERT INTO `customerinformation` VALUES ('11', '', '', '', '', '13546131364', '123456');
INSERT INTO `customerinformation` VALUES ('13', '', '', '', '', 'ss', 'ss');
INSERT INTO `customerinformation` VALUES ('14', '', '', '', '', '55', '55');
INSERT INTO `customerinformation` VALUES ('15', '', '', '', '', '66', '66');

-- ----------------------------
-- Table structure for dealerinformation
-- ----------------------------
DROP TABLE IF EXISTS `dealerinformation`;
CREATE TABLE `dealerinformation` (
  `DealerID` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `PhoneNumber` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`DealerID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dealerinformation
-- ----------------------------
INSERT INTO `dealerinformation` VALUES ('1', 'Napleton Aston Martin Maserati', '217 E Ogden Ave Downers Grove IL', 'Chicago', '6309845007', '11', '11');
INSERT INTO `dealerinformation` VALUES ('2', 'South-Chicago-Dogde-Chrysler-Jeep', '7340 S Western Ave  Chicago IL', 'Chicago', '7734767800', '22', '22');
INSERT INTO `dealerinformation` VALUES ('3', 'Greater Chicago Motor', '1850 N Elston Ave  Chicago IL', 'Chicago', '3122809262', '33', '33');
INSERT INTO `dealerinformation` VALUES ('4', 'Kindom Chevy', '6603 South Western Avenue  Chicago IL', 'Chicago', '7734323201', '44', '44');
INSERT INTO `dealerinformation` VALUES ('5', '55', '55', '55', '55', '55', '55');

-- ----------------------------
-- Table structure for favorite
-- ----------------------------
DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `UserId` int(5) NOT NULL,
  `CarId` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of favorite
-- ----------------------------
INSERT INTO `favorite` VALUES ('1', '13', '3');
INSERT INTO `favorite` VALUES ('2', '13', '4');
INSERT INTO `favorite` VALUES ('3', '13', '3');
INSERT INTO `favorite` VALUES ('4', '13', '5');
INSERT INTO `favorite` VALUES ('5', '13', '29');
