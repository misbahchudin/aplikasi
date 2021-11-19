/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : test8

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-11-19 15:35:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `nik` varchar(5) NOT NULL,
  `nm_dos` varchar(30) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `kota` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `kota` (`kota`),
  CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`kota`) REFERENCES `kota` (`kd_kota`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dosen
-- ----------------------------
INSERT INTO `dosen` VALUES ('20201', 'Joko Sutrisno', 'L', 'Papahan Tasikmadu', 'B');
INSERT INTO `dosen` VALUES ('20202', 'Dewi Purnomo', 'P', 'Mojolaban Sukoharjo', 'A');
INSERT INTO `dosen` VALUES ('20203', 'Endang Purwasih', 'P', 'Banyuanyar Surakarta', 'C');
INSERT INTO `dosen` VALUES ('20204', 'Purnama Surya', 'L', 'Gedongan Tingkir', 'D');
INSERT INTO `dosen` VALUES ('20205', 'Bolo Jampur', 'L', 'Tembalang Semarang', 'E');

-- ----------------------------
-- Table structure for kota
-- ----------------------------
DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota` (
  `kd_kota` varchar(2) NOT NULL,
  `nm_kota` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kota
-- ----------------------------
INSERT INTO `kota` VALUES ('A', 'Sukoharjo');
INSERT INTO `kota` VALUES ('B', 'Karanganyar');
INSERT INTO `kota` VALUES ('C', 'Surakarta');
INSERT INTO `kota` VALUES ('D', 'Salatiga');
INSERT INTO `kota` VALUES ('E', 'Semarang');

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nm_mhs` varchar(30) NOT NULL,
  `prodi` varchar(1) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `dosen_wali` varchar(5) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `kota` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`nim`),
  KEY `dosen_wali` (`dosen_wali`),
  KEY `prodi` (`prodi`),
  KEY `kota` (`kota`),
  CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`dosen_wali`) REFERENCES `dosen` (`nik`) ON UPDATE CASCADE,
  CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`kd_prodi`) ON UPDATE CASCADE,
  CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`kota`) REFERENCES `kota` (`kd_kota`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES ('190M040', 'Yusuf', '2', 'L', '1990-09-16', '20205', 'Watu Kelir Indah', 'E');
INSERT INTO `mahasiswa` VALUES ('190M041', 'Emi', '3', 'P', '1991-11-25', '20203', 'Sanggrahan Big City', 'C');
INSERT INTO `mahasiswa` VALUES ('190M042', 'Syaiful', '2', 'L', '1992-08-16', '20201', 'Harapan Jaya True Palace', 'A');
INSERT INTO `mahasiswa` VALUES ('190M043', 'Adel', '4', 'P', '1991-03-01', '20204', 'Jl. Raya Pahlawan 17081945', 'D');
INSERT INTO `mahasiswa` VALUES ('190M044', 'Hafid', '1', 'L', '1992-04-29', '20202', 'Green Lake City', 'A');
INSERT INTO `mahasiswa` VALUES ('190M045', 'Navida', '1', 'P', '1990-01-01', '20202', 'Tasikmadu Indah Garden', 'B');
INSERT INTO `mahasiswa` VALUES ('190M046', 'Ridho', '3', 'L', '1991-09-20', '20201', 'The Lost City', 'C');
INSERT INTO `mahasiswa` VALUES ('190M047', 'Alifta', '4', 'P', '1991-02-10', '20205', 'Andhika Green Palace', 'E');
INSERT INTO `mahasiswa` VALUES ('190M048', 'Udi', '3', 'L', '1991-01-01', '20203', 'Palace Mawar Melati', 'B');
INSERT INTO `mahasiswa` VALUES ('190M049', 'Syifa', '4', 'P', '1991-01-16', '20204', 'Solo Palace City', 'D');

-- ----------------------------
-- Table structure for prodi
-- ----------------------------
DROP TABLE IF EXISTS `prodi`;
CREATE TABLE `prodi` (
  `kd_prodi` varchar(1) NOT NULL,
  `nm_prodi` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prodi
-- ----------------------------
INSERT INTO `prodi` VALUES ('1', 'D4 MIK');
INSERT INTO `prodi` VALUES ('2', 'D4 K3');
INSERT INTO `prodi` VALUES ('3', 'S1 KEPERAWATAN');
INSERT INTO `prodi` VALUES ('4', 'D3 RMIK');
