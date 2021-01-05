/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.10-MariaDB : Database - db_blog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_blog`;

/*Table structure for table `tbl_categorey` */

DROP TABLE IF EXISTS `tbl_categorey`;

CREATE TABLE `tbl_categorey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_categorey` */

insert  into `tbl_categorey`(`id`,`name`) values (24,'php'),(25,'java'),(26,'sports');

/*Table structure for table `tbl_post` */

DROP TABLE IF EXISTS `tbl_post`;

CREATE TABLE `tbl_post` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cat` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_post` */

insert  into `tbl_post`(`id`,`cat`,`title`,`body`,`image`,`author`,`tags`,`date`) values (8,'24','php is title here','php is object oriente programming language..',' upload/59a5b064c9.jpg','sonet','php','2020-08-13 13:40:30.304425'),(9,'25','java will be title here','<p>java is object oriented programming language.</p>',' upload/f9133d5806.png','sonet','java','2020-08-13 13:42:28.324543'),(13,'24','C in Depth','<p>uyfuytfuytfuyufyufuytfuytfuyffuyfy</p>',' upload/da6046b962.jpg','sonet','php','2020-08-24 22:39:23.454678');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`username`,`password`) values (1,'sonet','81dc9bdb52d04dc20036dbd8313ed055');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
