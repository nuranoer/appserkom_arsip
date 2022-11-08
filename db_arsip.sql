/*
SQLyog Community
MySQL - 10.4.24-MariaDB : Database - db_arsip
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_arsip` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_arsip`;

/*Table structure for table `arsip` */

DROP TABLE IF EXISTS `arsip`;

CREATE TABLE `arsip` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(50) NOT NULL,
  `id_kategori` varchar(10) DEFAULT NULL,
  `judul_surat` varchar(225) DEFAULT NULL,
  `waktu_arsip` datetime DEFAULT current_timestamp(),
  `file_surat` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_surat`),
  KEY `f1` (`id_kategori`),
  CONSTRAINT `f1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `arsip` */

LOCK TABLES `arsip` WRITE;

insert  into `arsip`(`id_surat`,`nomor_surat`,`id_kategori`,`judul_surat`,`waktu_arsip`,`file_surat`) values 
(1,'2020/PD3/TU/001','K2','Nota Dinas WFH','2021-06-21 17:23:00','1.pdf'),
(6,'1448/PL2.PSDKU-Adm/X/2021','K1','Undangan Pengarahan Kegiatan Kemahasiswaan','2022-11-08 20:27:20','Undangan Pengarahan Kegiatan Kemahasiswaan.pdf');

UNLOCK TABLES;

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

LOCK TABLES `kategori` WRITE;

insert  into `kategori`(`id_kategori`,`nama_kategori`) values 
('K1','Undangan'),
('K2','Pengumuman'),
('K3','Nota Dinas'),
('K4','Pemberitahuan');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
