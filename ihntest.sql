/*
SQLyog Ultimate v12.3.2 (64 bit)
MySQL - 8.0.21 : Database - ihntest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ihntest` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `ihntest`;

/*Table structure for table `companylist` */

DROP TABLE IF EXISTS `companylist`;

CREATE TABLE `companylist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `companyname` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` bigint NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `companylist` */

insert  into `companylist`(`id`,`companyname`,`email`,`phone`,`address`,`city`) values 
(4,'gf','dfgdgd@hgfh.com',1234567890,'fghgfhf','fgdfh'),
(5,'hfghfh','fghf@dsas.com',1234567890,'hty','hg'),
(6,'dfdg','fdf@hdsf.com',1234567890,'gdfh','fgfg'),
(7,'vxv','vcxvx@fdfg.com',1234567890,'fgbf','gfn');

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `companyid` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int NOT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `contacts` */

insert  into `contacts`(`id`,`companyid`,`name`,`email`,`phone`,`designation`) values 
(3,5,'gfh','gdf@sdda.com',1234567890,'gdfhd'),
(4,5,'fgdghfh','dgsdfhgd@dfgd.com',1234567890,'hfg'),
(5,4,'vvc','vxc@dfsf.com',1234567890,'cxv');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
