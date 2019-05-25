/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - db_uas_mic
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_uas_mic` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_uas_mic`;

/*Table structure for table `tbl_driver` */

DROP TABLE IF EXISTS `tbl_driver`;

CREATE TABLE `tbl_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_driver` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_driver` */

insert  into `tbl_driver`(`id`,`nm_driver`) values 
(1,'Driver 1'),
(2,'Driver 2');

/*Table structure for table `tbl_request` */

DROP TABLE IF EXISTS `tbl_request`;

CREATE TABLE `tbl_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_date` date DEFAULT NULL,
  `request_user` int(11) DEFAULT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `id_vehicle` int(11) DEFAULT NULL,
  `check_manager` varchar(1) DEFAULT 'N' COMMENT 'Answer : N,Y',
  `request_status` varchar(2) DEFAULT 'IN' COMMENT 'Answer : IN,OUT',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_request` */

insert  into `tbl_request`(`id`,`request_date`,`request_user`,`id_driver`,`id_vehicle`,`check_manager`,`request_status`) values 
(1,'2019-01-01',2,1,1,'N','IN');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `pass` varchar(36) DEFAULT NULL,
  `type_user` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`username`,`fullname`,`pass`,`type_user`) values 
(1,'jayadi','Jayadi','jayadi','Admin Security'),
(2,'sri','Sri Aja','sri','Employee');

/*Table structure for table `tbl_vehicle` */

DROP TABLE IF EXISTS `tbl_vehicle`;

CREATE TABLE `tbl_vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `police_number` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_vehicle` */

insert  into `tbl_vehicle`(`id`,`police_number`) values 
(1,'B 1000 X'),
(2,'B 1111 X');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
