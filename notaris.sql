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
  PRIMARY KEY (`id_bank`),
  KEY `tb_bank_fk0` (`id_user`),
  CONSTRAINT `tb_bank_fk0` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tb_bank` */

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
  PRIMARY KEY (`id_bpkb`),
  KEY `tb_bpkb_fk0` (`id_user`),
  CONSTRAINT `tb_bpkb_fk0` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tb_bpkb` */

/*Table structure for table `tb_desa` */

DROP TABLE IF EXISTS `tb_desa`;

CREATE TABLE `tb_desa` (
  `id_desa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_desa` varchar(200) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  PRIMARY KEY (`id_desa`),
  KEY `tb_desa_fk0` (`id_kecamatan`),
  CONSTRAINT `tb_desa_fk0` FOREIGN KEY (`id_kecamatan`) REFERENCES `tb_kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_desa` */

/*Table structure for table `tb_detil_fidusia` */

DROP TABLE IF EXISTS `tb_detil_fidusia`;

CREATE TABLE `tb_detil_fidusia` (
  `id_detil_fidusia` int(11) NOT NULL AUTO_INCREMENT,
  `nobpkb` varchar(20) NOT NULL,
  `noaktajamfud` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `jnsakta` varchar(20) NOT NULL,
  `tglakta` date NOT NULL,
  `hutangdebitur` int(20) NOT NULL,
  `biayanot` int(20) NOT NULL,
  PRIMARY KEY (`id_detil_fidusia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_detil_fidusia` */

/*Table structure for table `tb_detil_haktanggungan` */

DROP TABLE IF EXISTS `tb_detil_haktanggungan`;

CREATE TABLE `tb_detil_haktanggungan` (
  `id_detil_hak` int(11) NOT NULL AUTO_INCREMENT,
  `noshm` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jnsakta` varchar(30) NOT NULL,
  `tglakta` date NOT NULL,
  `hutangdebitur` int(11) NOT NULL,
  `biayanot` int(11) NOT NULL,
  PRIMARY KEY (`id_detil_hak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_detil_haktanggungan` */

/*Table structure for table `tb_fidusia` */

DROP TABLE IF EXISTS `tb_fidusia`;

CREATE TABLE `tb_fidusia` (
  `id_fidusia` int(11) NOT NULL AUTO_INCREMENT,
  `Noaktajamfud` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nosK` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jnsakta` varchar(20) NOT NULL,
  `tglakta` varchar(20) NOT NULL,
  `hutangdebitur` int(20) NOT NULL,
  `biayanot` int(20) NOT NULL,
  PRIMARY KEY (`id_fidusia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tb_fidusia` */

/*Table structure for table `tb_haktanggungan` */

DROP TABLE IF EXISTS `tb_haktanggungan`;

CREATE TABLE `tb_haktanggungan` (
  `id_hak` int(11) NOT NULL AUTO_INCREMENT,
  `noaktahaktang` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jnsakta` varchar(20) NOT NULL,
  `tglakta` varchar(20) NOT NULL,
  `nosk` varchar(20) NOT NULL,
  `hutangdebitur` int(11) NOT NULL,
  `biayanot` int(11) NOT NULL,
  PRIMARY KEY (`id_hak`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_haktanggungan` */

/*Table structure for table `tb_kabupaten` */

DROP TABLE IF EXISTS `tb_kabupaten`;

CREATE TABLE `tb_kabupaten` (
  `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kabupaten` varchar(200) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  PRIMARY KEY (`id_kabupaten`),
  KEY `tb_kabupaten_fk0` (`id_provinsi`),
  CONSTRAINT `tb_kabupaten_fk0` FOREIGN KEY (`id_provinsi`) REFERENCES `tb_propinsi` (`id_propinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_kabupaten` */

/*Table structure for table `tb_kasmasuk` */

DROP TABLE IF EXISTS `tb_kasmasuk`;

CREATE TABLE `tb_kasmasuk` (
  `id_kas` int(11) NOT NULL AUTO_INCREMENT,
  `noaktajamfud` varchar(20) NOT NULL,
  `noaktahaktang` varchar(20) NOT NULL,
  `biaya` int(20) NOT NULL,
  `totalbiaya` int(20) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_kasmasuk` */

/*Table structure for table `tb_kecamatan` */

DROP TABLE IF EXISTS `tb_kecamatan`;

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(200) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  PRIMARY KEY (`id_kecamatan`),
  KEY `tb_kecamatan_fk0` (`id_kabupaten`),
  CONSTRAINT `tb_kecamatan_fk0` FOREIGN KEY (`id_kabupaten`) REFERENCES `tb_kabupaten` (`id_kabupaten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_kecamatan` */

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
  PRIMARY KEY (`id_klien`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tb_klien` */

insert  into `tb_klien`(`id_klien`,`nama`,`tempat_lahir`,`tgl_lahir`,`alamat`,`no_telp`,`nik`,`id_user`,`desa`,`kecamatan`,`kabupaten`,`propinsi`) values (5,'Budi','Denpasar','20-10-1978','Dauh Puri','081999','1520',1,'Dauh Puri','Denpasar','Denpasar','Bali');

/*Table structure for table `tb_propinsi` */

DROP TABLE IF EXISTS `tb_propinsi`;

CREATE TABLE `tb_propinsi` (
  `id_propinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_propinsi` varchar(200) NOT NULL,
  PRIMARY KEY (`id_propinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_propinsi` */

/*Table structure for table `tb_sertifikat` */

DROP TABLE IF EXISTS `tb_sertifikat`;

CREATE TABLE `tb_sertifikat` (
  `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT,
  `noshm` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `luas` varchar(10) NOT NULL,
  `namapemilik` varchar(200) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `propinsi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sertifikat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_sertifikat` */

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `no_user` varchar(3) DEFAULT NULL,
  `nama_user` varchar(100) NOT NULL,
  `hak_akses` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `kata_sandi` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`no_user`,`nama_user`,`hak_akses`,`no_telp`,`alamat`,`nama_pengguna`,`kata_sandi`,`email`) values (1,'001','admin','Admin','00','000','Agus','21232f297a57a5a743894a0e4a801fc3','admin@admin.com'),(4,'002','Budi','Operator','087','Dps','agussanjaya','25d55ad283aa400af464c76d713c07ad','agus@gmail.com'),(5,'003','Sariani','user','000','Denpasar','sariani','eec3137d9c646240ea67274ee524735e','sariani@gail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
