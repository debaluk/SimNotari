/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.17-log : Database - notaris
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`notaris` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `notaris`;

/*Table structure for table `tb_bank` */

DROP TABLE IF EXISTS `tb_bank`;

CREATE TABLE `tb_bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nosk` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namabank` varchar(100) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `propinsi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_bank` */

insert  into `tb_bank`(`id_bank`,`nosk`,`id_user`,`namabank`,`notelp`,`alamat`,`desa`,`kecamatan`,`kabupaten`,`propinsi`) values (2,'dsds',1,'ds','dsdsd','dsds','sdsd','ds','dsd','ds');

/*Table structure for table `tb_bpkb` */

DROP TABLE IF EXISTS `tb_bpkb`;

CREATE TABLE `tb_bpkb` (
  `id_bpkb` int(11) NOT NULL AUTO_INCREMENT,
  `nobpkb` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kat_object` varchar(200) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `norangka` varchar(20) NOT NULL,
  `nomesin` varchar(20) NOT NULL,
  `namapemilik` varchar(200) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_bpkb`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_bpkb` */

insert  into `tb_bpkb`(`id_bpkb`,`nobpkb`,`id_user`,`kat_object`,`merek`,`tipe`,`norangka`,`nomesin`,`namapemilik`,`photo`) values (1,'12560',1,'Roda Dua','Yamaha','ew','ewe','wew','ew','fulsall ciracas.jpg'),(2,'pp',1,'Roda Empat','pp','ppp','ppp','pp','pp','kyowa on stage with samson.jpg');

/*Table structure for table `tb_fidusia` */

DROP TABLE IF EXISTS `tb_fidusia`;

CREATE TABLE `tb_fidusia` (
  `id_fidusia` int(11) NOT NULL AUTO_INCREMENT,
  `noaktajamfud` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nosk` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jnsakta` varchar(20) NOT NULL,
  `tglakta` varchar(20) NOT NULL,
  `hutangdebitur` int(20) NOT NULL,
  `biayanot` int(20) NOT NULL,
  PRIMARY KEY (`id_fidusia`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tb_fidusia` */

insert  into `tb_fidusia`(`id_fidusia`,`noaktajamfud`,`id_user`,`nosk`,`nik`,`jnsakta`,`tglakta`,`hutangdebitur`,`biayanot`) values (4,'0001',1,'dsds','1520','Jaminan Fidusia','2018-10-31',100000,5000),(5,'0002',1,'dsds','1520','Jaminan Fidusia','2018-10-31',60000,20000);

/*Table structure for table `tb_fidusia_detil` */

DROP TABLE IF EXISTS `tb_fidusia_detil`;

CREATE TABLE `tb_fidusia_detil` (
  `id_detil` int(11) NOT NULL AUTO_INCREMENT,
  `id_fidusia` int(5) DEFAULT NULL,
  `id_bpkb` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detil`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `tb_fidusia_detil` */

insert  into `tb_fidusia_detil`(`id_detil`,`id_fidusia`,`id_bpkb`) values (19,5,1),(20,5,2),(21,4,2);

/*Table structure for table `tb_haktanggungan` */

DROP TABLE IF EXISTS `tb_haktanggungan`;

CREATE TABLE `tb_haktanggungan` (
  `id_hak` int(11) NOT NULL AUTO_INCREMENT,
  `noaktahaktang` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jnsakta` varchar(20) NOT NULL,
  `tglakta` varchar(20) NOT NULL,
  `nosk` varchar(20) NOT NULL,
  `hutangdebitur` int(11) NOT NULL,
  `biayanot` int(11) NOT NULL,
  `noshm` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_hak`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tb_haktanggungan` */

insert  into `tb_haktanggungan`(`id_hak`,`noaktahaktang`,`id_user`,`jnsakta`,`tglakta`,`nosk`,`hutangdebitur`,`biayanot`,`noshm`) values (6,'0003',1,'Hak Tanggungan','2018-11-01','dsds',20000000,1500000,'01452');

/*Table structure for table `tb_haktanggungan_detil` */

DROP TABLE IF EXISTS `tb_haktanggungan_detil`;

CREATE TABLE `tb_haktanggungan_detil` (
  `id_detil` int(11) NOT NULL AUTO_INCREMENT,
  `id_hak` int(11) DEFAULT NULL,
  `id_klien` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tb_haktanggungan_detil` */

insert  into `tb_haktanggungan_detil`(`id_detil`,`id_hak`,`id_klien`) values (4,6,5);

/*Table structure for table `tb_klien` */

DROP TABLE IF EXISTS `tb_klien`;

CREATE TABLE `tb_klien` (
  `id_klien` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) DEFAULT NULL,
  `tempat_lahir` varchar(60) DEFAULT NULL,
  `tgl_lahir` varchar(12) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `propinsi` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_klien`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tb_klien` */

insert  into `tb_klien`(`id_klien`,`nama`,`tempat_lahir`,`tgl_lahir`,`alamat`,`no_telp`,`nik`,`id_user`,`desa`,`kecamatan`,`kabupaten`,`propinsi`,`photo`) values (5,'Budi','Denpasar','1978-08-25','Dauh Puriw','081999','1520',1,'Dauh Puri','Denpasar','Denpasar','Bali','my kyowa.jpg');

/*Table structure for table `tb_laporan` */

DROP TABLE IF EXISTS `tb_laporan`;

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `id_akta` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `noakta` varchar(20) DEFAULT NULL,
  `nosk` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `jnsakta` varchar(20) DEFAULT NULL,
  `tglakta` varchar(20) DEFAULT NULL,
  `hutangdebitur` int(20) DEFAULT NULL,
  `biayanot` int(20) DEFAULT NULL,
  `nobpkb` varchar(100) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `noshm` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

/*Data for the table `tb_laporan` */

insert  into `tb_laporan`(`id_laporan`,`id_akta`,`id_user`,`noakta`,`nosk`,`nik`,`jnsakta`,`tglakta`,`hutangdebitur`,`biayanot`,`nobpkb`,`merk`,`noshm`) values (101,4,1,'0001','dsds','1520','Jaminan Fidusia','2018-10-31',100000,5000,'','','-'),(102,5,1,'0002','dsds','1520','Jaminan Fidusia','2018-10-31',60000,20000,'','','-'),(103,6,1,'0003','dsds','','Hak Tanggungan','2018-11-01',20000000,1500000,'-','-','01452');

/*Table structure for table `tb_sertifikat` */

DROP TABLE IF EXISTS `tb_sertifikat`;

CREATE TABLE `tb_sertifikat` (
  `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT,
  `noshm` varchar(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `luas` varchar(10) DEFAULT NULL,
  `namapemilik` varchar(200) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `propinsi` varchar(100) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_sertifikat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tb_sertifikat` */

insert  into `tb_sertifikat`(`id_sertifikat`,`noshm`,`id_user`,`desa`,`luas`,`namapemilik`,`kecamatan`,`kabupaten`,`propinsi`,`photo`) values (3,'01452',1,'ppp','50','pp','ppp','ppp','ppp',NULL),(4,'145',1,'pp','p','p','p','p','p','my kyowa.jpg');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `no_user` varchar(3) DEFAULT NULL,
  `nama_user` varchar(100) NOT NULL,
  `hak_akses` enum('Admin','Notaris') NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `kata_sandi` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`no_user`,`nama_user`,`hak_akses`,`no_telp`,`alamat`,`nama_pengguna`,`kata_sandi`,`email`) values (1,'001','admin','Admin','00','000','Agus','21232f297a57a5a743894a0e4a801fc3','admin@admin.com'),(4,'002','Budi','Admin','087','Dps','Budi','00dfc53ee86af02e742515cdcf075ed3','agus@gmail.com'),(5,'003','Sariani','Notaris','000','Denpasar','Sariani','21ad0bd836b90d08f4cf640b4c298e7c','sariani@gail.com'),(6,'004','hha','Admin','hh','hh','hh','a3aca2964e72000eea4c56cb341002a4','hh@g.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
