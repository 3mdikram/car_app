/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 8.0.25 : Database - cardapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cardapp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `cardapp`;

/*Table structure for table `utables` */

DROP TABLE IF EXISTS `utables`;

CREATE TABLE `utables` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `umane` varchar(100) DEFAULT NULL,
  `ueamil` varchar(100) DEFAULT NULL,
  `udesign` varchar(100) DEFAULT NULL,
  `usalary` varchar(100) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `utables` */

insert  into `utables`(`id`,`umane`,`ueamil`,`udesign`,`usalary`,`dates`) values 
(34,'Hello','hello@hello.com','Php Developer','34000','2021-11-14'),
(35,'Example','hello@example.com','Demo','2345333','2021-11-14'),
(36,'Demo','demo@demo.com','Demo','12322','2021-11-14'),
(37,'Hii','hii@gmail.com','hiii','343344','2021-11-14'),
(38,'Ram','ram9771@gmail.com','demo1','2222','2021-11-14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
