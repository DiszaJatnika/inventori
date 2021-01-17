-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for inventori
CREATE DATABASE IF NOT EXISTS `inventori` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `inventori`;

-- Dumping structure for function inventori.generate_barang_no
DELIMITER //
CREATE FUNCTION `generate_barang_no`() RETURNS varchar(6) CHARSET utf8
BEGIN
	DECLARE generate Varchar(6);
	Select LPAD(count(1)+1, 6,'0') into generate from tbl_barang WHERE `pk_barang_id`!='0000000';
RETURN (generate);
END//
DELIMITER ;

-- Dumping structure for view inventori.keluar
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `keluar` (
	`id_barang` INT(11) NULL,
	`stok` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view inventori.stok
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `stok` (
	`id_barang` INT(11) NULL,
	`stok` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for table inventori.tbl_barang
CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `pk_barang_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(20) DEFAULT NULL,
  `fk_jenisbarang_id` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `fk_satuan_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_barang_id`),
  KEY `FK_tbl_barang_tbl_jenisbarang` (`fk_jenisbarang_id`),
  KEY `FK_tbl_barang_tbl_satuan` (`fk_satuan_id`),
  CONSTRAINT `FK_tbl_barang_tbl_jenisbarang` FOREIGN KEY (`fk_jenisbarang_id`) REFERENCES `tbl_jenisbarang` (`pk_jenisbarang_id`),
  CONSTRAINT `FK_tbl_barang_tbl_satuan` FOREIGN KEY (`fk_satuan_id`) REFERENCES `tbl_satuan` (`pk_satuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table inventori.tbl_barang: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_barang` DISABLE KEYS */;
INSERT INTO `tbl_barang` (`pk_barang_id`, `id_barang`, `nama_barang`, `fk_jenisbarang_id`, `stok`, `fk_satuan_id`, `created_by`, `created_date`) VALUES
	(6, 'B00001', 'Jagung', 4, NULL, 5, NULL, NULL),
	(7, 'B00002', 'Urea', 1, NULL, 5, NULL, NULL),
	(8, 'B00003', 'Kain Banner', 5, NULL, 6, NULL, NULL);
/*!40000 ALTER TABLE `tbl_barang` ENABLE KEYS */;

-- Dumping structure for table inventori.tbl_jenisbarang
CREATE TABLE IF NOT EXISTS `tbl_jenisbarang` (
  `pk_jenisbarang_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_barang` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_jenisbarang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table inventori.tbl_jenisbarang: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_jenisbarang` DISABLE KEYS */;
INSERT INTO `tbl_jenisbarang` (`pk_jenisbarang_id`, `jenis_barang`, `created_by`, `created_date`) VALUES
	(1, 'Pupuk', NULL, NULL),
	(4, 'Umbi', NULL, NULL),
	(5, 'Stater pack Banner', NULL, NULL);
/*!40000 ALTER TABLE `tbl_jenisbarang` ENABLE KEYS */;

-- Dumping structure for table inventori.tbl_satuan
CREATE TABLE IF NOT EXISTS `tbl_satuan` (
  `pk_satuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_barang` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_satuan_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table inventori.tbl_satuan: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_satuan` DISABLE KEYS */;
INSERT INTO `tbl_satuan` (`pk_satuan_id`, `satuan_barang`, `created_by`, `created_date`) VALUES
	(2, 'Botol', NULL, NULL),
	(5, 'Kilogram', NULL, NULL),
	(6, 'Meter', NULL, NULL);
/*!40000 ALTER TABLE `tbl_satuan` ENABLE KEYS */;

-- Dumping structure for table inventori.tbl_transaksi_keluar
CREATE TABLE IF NOT EXISTS `tbl_transaksi_keluar` (
  `pk_transaksi_keluar_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah_keluar` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_transaksi_keluar_id`) USING BTREE,
  KEY `FK_tbl_transaksi_masuk_tbl_barang` (`id_barang`) USING BTREE,
  CONSTRAINT `tbl_transaksi_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`pk_barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table inventori.tbl_transaksi_keluar: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_transaksi_keluar` DISABLE KEYS */;
INSERT INTO `tbl_transaksi_keluar` (`pk_transaksi_keluar_id`, `tanggal`, `id_barang`, `jumlah_keluar`, `status`) VALUES
	(1, '2021-01-07', 7, 10, 1),
	(2, '2021-01-07', 7, 2, 2),
	(3, '2021-01-07', 7, 2, 2),
	(4, '2021-01-07', 6, 8, 1),
	(5, '2021-03-11', 7, 5, 1),
	(6, '2021-03-11', 7, 1, 1),
	(7, '2021-03-11', 8, 1, 1),
	(8, '0000-00-00', 6, 2, 1),
	(9, '2021-01-16', 6, 10, NULL);
/*!40000 ALTER TABLE `tbl_transaksi_keluar` ENABLE KEYS */;

-- Dumping structure for table inventori.tbl_transaksi_masuk
CREATE TABLE IF NOT EXISTS `tbl_transaksi_masuk` (
  `pk_transaksi_masuk_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah_masuk` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_transaksi_masuk_id`),
  KEY `FK_tbl_transaksi_masuk_tbl_barang` (`id_barang`),
  CONSTRAINT `FK_tbl_transaksi_masuk_tbl_barang` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`pk_barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table inventori.tbl_transaksi_masuk: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_transaksi_masuk` DISABLE KEYS */;
INSERT INTO `tbl_transaksi_masuk` (`pk_transaksi_masuk_id`, `tanggal`, `id_barang`, `jumlah_masuk`) VALUES
	(5, '2021-01-07', 6, 20),
	(6, '2021-01-06', 6, 8),
	(7, '2021-01-07', 7, 2),
	(8, '2021-01-07', 7, 1),
	(9, '2021-01-07', 7, 12),
	(10, '2021-02-17', 6, 10),
	(11, '2021-02-24', 6, 19),
	(12, '2021-01-08', 8, 20),
	(13, '2021-01-08', 7, 12);
/*!40000 ALTER TABLE `tbl_transaksi_masuk` ENABLE KEYS */;

-- Dumping structure for table inventori.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table inventori.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `level`, `blokir`) VALUES
	(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'N'),
	(26, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 'user', '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view inventori.vbarang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vbarang` (
	`pk_barang_id` INT(11) NOT NULL,
	`id_barang` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`nama_barang` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`fk_jenisbarang_id` INT(11) NULL,
	`stok` INT(11) NULL,
	`fk_satuan_id` INT(11) NULL,
	`created_by` INT(11) NULL,
	`created_date` DATETIME NULL,
	`jenis_barang` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`satuan_barang` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`kocak` VARCHAR(73) NULL COLLATE 'utf8mb4_general_ci',
	`stokbarang` DECIMAL(32,0) NULL,
	`keluar` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view inventori.keluar
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `keluar`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `keluar` AS SELECT  kl.id_barang, SUM(kl.jumlah_keluar) AS stok FROM tbl_transaksi_keluar AS kl WHERE kl.`status`=1 GROUP BY id_barang ;

-- Dumping structure for view inventori.stok
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `stok`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `stok` AS SELECT  tm.id_barang, SUM(tm.jumlah_masuk) AS stok FROM tbl_transaksi_masuk AS tm GROUP BY id_barang ;

-- Dumping structure for view inventori.vbarang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vbarang`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vbarang` AS SELECT tb.*,tj.jenis_barang, ts.satuan_barang, CONCAT(nama_barang," (", satuan_barang,")") as kocak, 
st.stok AS stokbarang, kl.stok AS keluar FROM tbl_barang tb
LEFT JOIN tbl_jenisbarang tj
ON tb.fk_jenisbarang_id = tj.pk_jenisbarang_id
LEFT JOIN tbl_satuan ts
ON tb.fk_satuan_id = ts.pk_satuan_id 
LEFT JOIN stok st
ON tb.pk_barang_id = st.id_barang 
LEFT JOIN keluar kl
ON kl.id_barang = tb.pk_barang_id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
