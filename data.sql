/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.6.25 : Database - login
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `items` */

insert  into `items`(`id`,`title`,`description`,`created_at`,`updated_at`) values (98,'123','13',NULL,NULL),(99,'dsf','dsf',NULL,NULL);

/*Table structure for table `sails` */

DROP TABLE IF EXISTS `sails`;

CREATE TABLE `sails` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date_1` date DEFAULT NULL,
  `book_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `channel` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `precentage_commission` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `commission_amount` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `running_total` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=224 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `sails` */

insert  into `sails`(`id`,`date_1`,`book_name`,`channel`,`precentage_commission`,`commission_amount`,`running_total`,`user_id`) values (198,'0000-00-00','book1','amazon','20','123','',24),(199,'0000-00-00','book2','channel2','123','56','',29),(200,'0000-00-00','book3','channel3','123','123.6','',24),(202,'0000-00-00','book name2','Amazon print book','25','1.21','',29),(223,'0000-00-00','erw','werwer','123','300','',29),(222,'0000-00-00','book2','channel10','34','23','',29),(221,'0000-00-00','bbb','eeww','112','322','',28),(218,'0000-00-00','bbb','ssssa','322','221','',29),(217,'0000-00-00','qqqq','bbbb','322','112','',27),(216,'0000-00-00','bbbb','aaa','21','221','',24);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forgot_pass_identity` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `role` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`first_name`,`last_name`,`email`,`password`,`confirm_password`,`forgot_pass_identity`,`created`,`modified`,`status`,`role`) values (24,'anatoliy_bab','anatoliy','babkov','anatoliy1112@outlok.com','47d0c968b7f361a669fb366b462faad7','','','2017-08-25 19:12:13','2017-08-25 19:12:13','1','admin'),(25,'w','q','1','jane@smith.com','7694f4a66316e53c8cdd9d9954bd611d','','','2017-08-25 19:53:02','2017-08-25 19:53:02','1','user'),(26,'user','nikita','mac','nikita23@email.com','202cb962ac59075b964b07152d234b70','','','2017-08-25 19:54:31','2017-08-25 19:54:31','1','user'),(27,'sdsa','sd','sd','sd@outlook.com','c4ca4238a0b923820dcc509a6f75849b','','','2017-08-28 09:52:40','2017-08-28 09:52:40','1','user'),(28,'d','d','d','d@gmail.com','47d0c968b7f361a669fb366b462faad7','','','2017-08-28 15:32:46','2017-08-28 15:32:46','1','user'),(29,'Borys_Mac','Borys','Mac','talentbz115@gmail.com','47d0c968b7f361a669fb366b462faad7','','','2017-08-30 10:25:08','2017-08-30 10:25:08','1','user'),(30,'fred','fred','fred','info@greenchameleon.co.uk','cf12736d327a9f46546f8737c85d1176','','','2017-09-01 04:21:45','2017-09-01 04:21:45','1','user'),(31,'kkk','kl','la','kla@gmail.com','47d0c968b7f361a669fb366b462faad7','','','2017-09-11 12:53:25','2017-09-11 12:53:25','1','user'),(32,'ArnoTanne','ano','tane','anotanne20@gmail.com','47d0c968b7f361a669fb366b462faad7','','','2017-09-11 18:37:05','2017-09-11 18:37:05','1','user'),(33,'Tanne','ano','tane','anotanne30@gmail.com','47d0c968b7f361a669fb366b462faad7','','','2017-09-11 18:38:10','2017-09-11 18:38:10','1','user'),(34,'anne','ano','tane','anotanne40@gmail.com','47d0c968b7f361a669fb366b462faad7','','','2017-09-11 18:47:25','2017-09-11 18:47:25','1','user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
