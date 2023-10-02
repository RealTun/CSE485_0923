-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.1.2-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for btth01_cse485
CREATE DATABASE IF NOT EXISTS `btth01_cse485` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `btth01_cse485`;

-- Dumping structure for table btth01_cse485.baiviet
CREATE TABLE IF NOT EXISTS `baiviet` (
  `ma_bviet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tieude` varchar(200) NOT NULL,
  `ten_bhat` varchar(100) NOT NULL,
  `ma_tloai` int(10) unsigned NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text DEFAULT NULL,
  `ma_tgia` int(10) unsigned NOT NULL,
  `ngayviet` datetime NOT NULL DEFAULT current_timestamp(),
  `hinhanh` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ma_bviet`),
  KEY `ma_tloai` (`ma_tloai`),
  KEY `ma_tgia` (`ma_tgia`),
  CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`ma_tloai`) REFERENCES `theloai` (`ma_tloai`),
  CONSTRAINT `baiviet_ibfk_2` FOREIGN KEY (`ma_tgia`) REFERENCES `tacgia` (`ma_tgia`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table btth01_cse485.baiviet: ~3 rows (approximately)
INSERT INTO `baiviet` (`ma_bviet`, `tieude`, `ten_bhat`, `ma_tloai`, `tomtat`, `noidung`, `ma_tgia`, `ngayviet`, `hinhanh`) VALUES
	(1, 'Hit music', 'Sau táº¥t cáº£', 4, 'SAU Táº¤T Cáº¢" do ERIK (ThÃ nh viÃªn nhÃ³m nháº¡c nam MONSTAR) thá»ƒ hiá»‡n, Ä‘Æ°á»£c sÃ¡ng tÃ¡c vÃ  phá»‘i khÃ­ bá»Ÿi nháº¡c sÄ© tráº» Kháº¯c HÆ°ng ', 'Ca khÃºc cÃ³ giai Ä‘iá»‡u nháº¹ nhÃ ng, sÃ¢u láº¯ng vá»›i ná»™i dung ká»ƒ vá» cÃ¢u chuyá»‡n tÃ¬nh yÃªu nhiá»u sÃ³ng giÃ³ vÃ  rá»“i hai ngÆ°á»i yÃªu nhau láº¡i trá»Ÿ vá» bÃªn nhau. ', 7, '2023-09-22 22:39:03', 'sautatca.jpg'),
	(3, 'Hit music', 'You belong with me', 7, 'The girl with love', 'The girl with love', 11, '2023-09-23 14:20:17', 'youbelong.jpg'),
	(4, 'Hit music', 'ChÃºng ta cá»§a hiá»‡n táº¡i', 4, 'MÃ¹a thu mang giáº¥c mÆ¡ quay vá»\r\nVáº«n nguyÃªn váº¹n nhÆ° hÃ´m nÃ o\r\nLÃ¡ bay theo giÃ³ xÃ´n xao', 'MÃ¹a thu mang giáº¥c mÆ¡ quay vá»\r\nVáº«n nguyÃªn váº¹n nhÆ° hÃ´m nÃ o\r\nLÃ¡ bay theo giÃ³ xÃ´n xao', 10, '2023-09-23 16:02:10', 'cta.jpg');

-- Dumping structure for table btth01_cse485.tacgia
CREATE TABLE IF NOT EXISTS `tacgia` (
  `ma_tgia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_tgia` varchar(100) NOT NULL,
  `hinh_tgia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ma_tgia`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table btth01_cse485.tacgia: ~5 rows (approximately)
INSERT INTO `tacgia` (`ma_tgia`, `ten_tgia`, `hinh_tgia`) VALUES
	(7, 'Kháº¯c HÆ°ng', 'khac-hung-556243.jpg'),
	(8, 'Trá»‹nh CÃ´ng SÆ¡n', 'Trá»‹nh_CÃ´ng_SÆ¡n.jpeg'),
	(10, 'SÆ¡n TÃ¹ng', 'sontung.jpg'),
	(11, 'Taylor Swift', 'taylor.jpg'),
	(13, 'VÄƒn Cao', 'vancao.jpg');

-- Dumping structure for table btth01_cse485.theloai
CREATE TABLE IF NOT EXISTS `theloai` (
  `ma_tloai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_tloai` varchar(50) NOT NULL,
  `SLBaiViet` int(11) DEFAULT 0,
  PRIMARY KEY (`ma_tloai`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table btth01_cse485.theloai: ~5 rows (approximately)
INSERT INTO `theloai` (`ma_tloai`, `ten_tloai`, `SLBaiViet`) VALUES
	(3, 'Nháº¡c sá»‘ng HÃ  TÃ¢y', 3),
	(4, 'Nháº¡c tráº»', 3),
	(5, 'Nháº¡c trá»¯ tÃ¬nh', 2),
	(6, 'Nháº¡c cÃ¡ch máº¡ng', 2),
	(7, 'Nháº¡c pop', 2);

-- Dumping structure for table btth01_cse485.users
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pw` text NOT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `role` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table btth01_cse485.users: ~6 rows (approximately)
INSERT INTO `users` (`uid`, `email`, `username`, `pw`, `verification_code`, `email_verified_at`, `role`) VALUES
	(2, 'sifefa7922@alvisani.com', 'tuan2106', '$2y$10$NEhqLXxWkwU01Kvbai7J4upJTI8EIXaHOQrrhm5JbAIS5l4V6Ih1e', '932673', '2023-09-24 16:43:45', '0'),
	(3, 'cafacon422@armablog.com', 'tuandodk', '$2y$10$P2u8JxxJhtGCk3U1K2k5Z.Nsh78.rXt/J5KCHl52/IjprXfXJePdu', '343890', '2023-09-24 22:08:30', '0'),
	(4, 'sacisex749@apxby.com', 'test1', '$2y$10$Q8RvZroNd7kuCSkCW6iENeaCwdgDoawWWMjvauHMFpTKjEoFcADXi', '307415', '2023-09-25 22:14:29', '0'),
	(5, 'dotuan458@gmail.com', 'realtun', '$2y$10$IDJ4im5gR9BriUzAKEdTRe2Jr.cjZ2jR/70hW3q46fQH3IIt6Pp1q', '183576', '2023-09-25 22:15:32', '1'),
	(7, 'anhquyk797@gmail.com', 'quypham', '$2y$10$pU1AtWVXl51vq7Yskdzh1OGersWfFABJSBOXkuLIfarITAjEnMQ2C', '315583', '2023-09-29 10:31:06', '0'),
	(11, 'dungkt@wru.vn', 'thaydung', '$2y$10$zBpNbHtg40X2kHYPeoNa7ORs.f9xy9zl8dMPoh6vQBiYEJdDo2XrW', '259714', NULL, '0'),
	(12, 'sidohe1244@finghy.com', 'test2', '$2y$10$8ylHDLd.ylXcLiVW3VakCOTDlTZHkm/9etAXMy3RFB8bIs80aKTG6', '291712', '2023-10-02 21:58:19', '0');

-- Dumping structure for view btth01_cse485.vw_music
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_music` (
	`ten_tloai` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ten_tgia` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`ma_bviet` INT(10) UNSIGNED NOT NULL,
	`tieude` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`ten_bhat` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`tomtat` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`noidung` TEXT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for trigger btth01_cse485.tg_CapNhatTheLoai_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tg_CapNhatTheLoai_delete` AFTER DELETE ON `baiviet` FOR EACH ROW BEGIN
	UPDATE theloai SET SLBaiViet = SLBaiViet - 1;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger btth01_cse485.tg_CapNhatTheLoai_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tg_CapNhatTheLoai_insert` AFTER INSERT ON `baiviet` FOR EACH ROW BEGIN
	UPDATE theloai SET SLBaiViet = SLBaiViet + 1;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for view btth01_cse485.vw_music
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_music`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_music` AS select `theloai`.`ten_tloai` AS `ten_tloai`,`tacgia`.`ten_tgia` AS `ten_tgia`,`baiviet`.`ma_bviet` AS `ma_bviet`,`baiviet`.`tieude` AS `tieude`,`baiviet`.`ten_bhat` AS `ten_bhat`,`baiviet`.`tomtat` AS `tomtat`,`baiviet`.`noidung` AS `noidung` from ((`baiviet` join `tacgia`) join `theloai`) where `baiviet`.`ma_tloai` = `theloai`.`ma_tloai` and `baiviet`.`ma_tgia` = `tacgia`.`ma_tgia` ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
