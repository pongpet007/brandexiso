-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table brandexiso.department
DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(255) DEFAULT NULL,
  `cby` varchar(255) DEFAULT NULL,
  `uby` varchar(255) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `udate` datetime DEFAULT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table brandexiso.department: ~5 rows (approximately)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`dep_id`, `dep_name`, `cby`, `uby`, `cdate`, `udate`) VALUES
	(3, 'SAL', 'Pongpetch Meesab', 'Administrator', '2016-09-22 11:05:53', '2016-11-30 10:56:09'),
	(5, 'PER', 'Pongpetch Meesab', NULL, '2016-09-22 11:08:05', NULL),
	(6, 'PUR', 'Pongpetch Meesab', 'Administrator', '2016-09-22 11:08:24', '2016-11-30 10:25:27'),
	(7, 'QMR', 'Pongpetch Meesab', NULL, '2016-09-22 11:26:26', NULL),
	(9, 'PRODUCTION', 'Administrator', 'คุณชลธิสา สมาน', '2016-11-30 10:56:33', '2017-03-06 16:09:43');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping structure for table brandexiso.document
DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `version_id` int(11) NOT NULL DEFAULT 1,
  `doc_code` varchar(50) DEFAULT NULL,
  `rev` varchar(50) DEFAULT NULL,
  `doc_date` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `detail` longtext DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `doc_group_id` int(11) DEFAULT 0,
  `cby` varchar(50) DEFAULT NULL,
  `uby` varchar(50) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `udate` date DEFAULT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- Dumping data for table brandexiso.document: ~31 rows (approximately)
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` (`doc_id`, `version_id`, `doc_code`, `rev`, `doc_date`, `title`, `detail`, `remark`, `doc_group_id`, `cby`, `uby`, `cdate`, `udate`) VALUES
	(6, 2, 'QP-QMR-01', '00', '2021-11-01', 'การประชุมทบทวนระบบคุณภาพโดยฝ่ายบริหาร', 'หมายเอกสารเอกสาร  :   QP-QMR-01\r\nแก้ไขครั้งที่                  :   00\r\nวันที่อนุมัติใช้              :  1-11-2021', NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-07', '2022-01-07'),
	(7, 2, 'QM-01', '01', '2021-12-08', 'คู่มือคุณภาพ', NULL, NULL, 10, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(8, 2, 'QP-QMR-02', '00', '2021-11-01', 'การควบคุมโครงสร้างพื้นฐาน', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(9, 2, 'QP-QMR-03', '00', '2021-11-01', 'การควบคุมเอกสาร', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(10, 1, 'QP-QMR-04', '00', '2021-11-01', 'การปฏิบัติการแก้ไขและปฏิบัติการป้องกัน', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(11, 1, 'QP-QMR-05', '00', '2021-11-01', 'การควบคุมบันทึก', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(12, 1, 'QP-QMR-06', '00', '2021-11-01', 'การตรวจติดตามภายใน', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(13, 1, 'QP-QMR-07', '00', '2021-11-01', 'การสื่อสาร', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(14, 1, 'QP-QMR-08', '00', '2021-11-01', 'การดำเนินการเกี่ยวกับความเสี่ยงและโอกาส', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(15, 1, 'QP-QMR-09', '00', '2021-11-01', 'บริบทองค์กร, การตรวจวัดกระบวนการ, การวิเคราะห์ข้อมูล,  การปรับปรุงอย่างต่อเนื่อง', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(16, 1, 'QP-PRO-01', '01', '2021-12-08', 'การออกแบบ วางแผน Production และตรวจสอบคุณภาพงาน', NULL, NULL, 8, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(17, 1, 'QP-PRO-02', '00', '2021-11-01', 'การควบคุมผลิตภัณฑ์ที่ไม่เป็นไปตามข้อกำหนด', NULL, NULL, 8, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(18, 1, 'QP-STO-01', NULL, '2021-11-01', 'การรับ-จัดเก็บ-จ่าย-ดูแลรักษา-เคลื่อนย้ายวัสดุอุปกรณ์สินค้าสำเร็จรูป', NULL, NULL, 9, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(19, 1, 'QP-PER-01', NULL, '2021-11-01', 'การสรรหาและคัดเลือกบุคลากร', NULL, NULL, 4, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(20, 1, 'QP-PER-02', NULL, '2021-11-01', 'การฝึกอบรม', NULL, NULL, 4, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(25, 1, 'QP-SAL-01', '01', '2021-12-08', 'การทบทวนและรับคำสั่งซื้อ', NULL, NULL, 13, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(26, 1, 'QP-SAL-02', '00', '2021-11-01', 'การรับข้อร้องเรียนลูกค้าและการติดต่อสื่อสารกับลูกค้า', NULL, NULL, 13, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(27, 1, 'QP-SAL-03', '00', '2021-11-01', 'การหาความคาดหวังและจัดระบบความพึงพอใจลูกค้า', NULL, NULL, 13, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(28, 1, 'QP-SAL-04', '00', '2021-11-01', 'การควบคุมทรัพย์สินลูกค้า', NULL, NULL, 13, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(29, 1, 'QP-PUR-01', NULL, '2021-11-01', 'การคัดเลือก / ประเมิน Supplier', NULL, NULL, 5, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(30, 1, 'QP-PUR-02', NULL, '2021-12-01', 'การจัดซื้อ', NULL, NULL, 5, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(32, 1, 'FM-SAL-02-01', '00', '2021-11-01', 'บันทึกข้อร้องเรียนลูกค้า', NULL, NULL, 16, 'ชลธิสา สมาน', NULL, '2022-01-21', '2022-01-21'),
	(33, 1, 'FM-QMR-01/01', '00', '2021-11-01', 'ใบแจ้งวาระการประชุม การทบทวนฝ่ายบริหารระบบคุณภาพ', NULL, NULL, 18, 'ชลธิสา สมาน', NULL, '2022-01-25', '2022-01-25'),
	(34, 1, 'FM-QMR-01/02', '00', '2022-01-25', 'รายงานการประชุม ทบทวน ฝ่ายบริหาร', NULL, NULL, 18, 'ชลธิสา สมาน', NULL, '2022-01-25', '2022-01-25'),
	(35, 1, 'FM-QMR-02/01', '00', '2021-11-01', 'Checklist โครงสร้างพื้นฐาน', NULL, NULL, 20, 'ชลธิสา สมาน', NULL, '2022-01-25', '2022-01-25'),
	(36, 1, 'FM-QMR-03/01', '00', '2021-11-01', 'ใบร้องขอดำเนินการเรื่องเอกสาร', NULL, NULL, 21, 'ชลธิสา สมาน', NULL, '2022-01-25', '2022-01-25'),
	(37, 1, 'QP-STO-01', '00', '2021-11-01', 'การรับ-จัดเก็บ-จ่าย-ดูแลรักษา-เคลื่อนย้ายวัสดุอุปกรณ์ สินค้าสำเร็จรูป', NULL, NULL, 12, 'ชลธิสา สมาน', NULL, '2022-01-28', '2022-01-28'),
	(38, 1, 'QP-PER-01', '00', '2021-11-01', 'การสรรหาและคัดเลือกบุคลากร', NULL, NULL, 14, 'ชลธิสา สมาน', NULL, '2022-01-28', '2022-01-28'),
	(39, 1, 'QP-QMR-02', '00', '2021-11-01', 'การฝึกอบรม', NULL, NULL, 14, 'ชลธิสา สมาน', NULL, '2022-01-28', '2022-01-28'),
	(40, 1, 'QP-PUR-01', '00', '2021-11-01', 'การคัดเลือก / ประเมิน Supplier', NULL, NULL, 15, 'ชลธิสา สมาน', NULL, '2022-01-28', '2022-01-28'),
	(41, 1, 'QP-PUR-02', '00', '2021-11-01', 'การจัดซื้อ', NULL, NULL, 15, 'ชลธิสา สมาน', NULL, '2022-01-28', '2022-01-28');
/*!40000 ALTER TABLE `document` ENABLE KEYS */;

-- Dumping structure for table brandexiso.document_attachment
DROP TABLE IF EXISTS `document_attachment`;
CREATE TABLE IF NOT EXISTS `document_attachment` (
  `attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) NOT NULL DEFAULT 0,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `filestatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`attachment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- Dumping data for table brandexiso.document_attachment: ~53 rows (approximately)
/*!40000 ALTER TABLE `document_attachment` DISABLE KEYS */;
INSERT INTO `document_attachment` (`attachment_id`, `doc_id`, `filename`, `filepath`, `filestatus`) VALUES
	(4, 6, 'BD QMR-01 การประชุมทบทวนระบบคุณภาพโดยฝ่ายบริหาร update Sep 29, 2021.docx', '1641864508BD QMR-01 การประชุมทบทวนระบบคุณภาพโดยฝ่ายบริหาร update Sep 29, 2021.docx', 2),
	(5, 7, 'BD QM-01_คู่มือคุณภาพ update DEC, 2021.xlsx', '1641864874BD QM-01_คู่มือคุณภาพ update DEC, 2021.xlsx', NULL),
	(6, 8, 'BD QMR-02 โครงสร้างพื้นฐาน update Sep 29, 2021.docx', '1641864990BD QMR-02 โครงสร้างพื้นฐาน update Sep 29, 2021.docx', NULL),
	(7, 9, 'BD QMR-03 การควบคุมเอกสาร Sep 29, 2021.docx', '1641865057BD QMR-03 การควบคุมเอกสาร Sep 29, 2021.docx', NULL),
	(8, 10, 'BD QMR-04 CAR PAR update Sep 29, 2021.docx', '1641867928BD QMR-04 CAR PAR update Sep 29, 2021.docx', NULL),
	(9, 11, 'BD QMR-05 การควบคุมบันทึก update Sep 29, 2021.docx', '1641867978BD QMR-05 การควบคุมบันทึก update Sep 29, 2021.docx', NULL),
	(10, 12, 'BD QMR-06 Internal Audit update Sep 29, 2021.docx', '1641868000BD QMR-06 Internal Audit update Sep 29, 2021.docx', NULL),
	(11, 13, 'BD QMR-07 การสื่อสาร update Sep 29, 2021.docx', '1641894258BD QMR-07 การสื่อสาร update Sep 29, 2021.docx', NULL),
	(12, 14, 'BD QMR-08 การปฏิบัติการเพื่อจัดการกับความเสี่ยงและโอกาส New update Sep 29, 2021.docx', '1641895047BD QMR-08 การปฏิบัติการเพื่อจัดการกับความเสี่ยงและโอกาส New update Sep 29, 2021.docx', NULL),
	(13, 15, 'BD QMR-09 บริบทองค์กร การวิเคราะห์ การปรับปรุงอย่างต่อเนื่อง Sep 29, 2021.docx', '1641895075BD QMR-09 บริบทองค์กร การวิเคราะห์ การปรับปรุงอย่างต่อเนื่อง Sep 29, 2021.docx', NULL),
	(14, 25, 'BD SAL-01 การรับคำสั่งซื้อ 8 Dec, 2021.docx', '1641895119BD SAL-01 การรับคำสั่งซื้อ 8 Dec, 2021.docx', NULL),
	(15, 26, 'BD SAL-02 การรับข้อร้องเรียนและการติดต่อสื่อสารกับลูกค้า Oct 1, 2021.docx', '1641895141BD SAL-02 การรับข้อร้องเรียนและการติดต่อสื่อสารกับลูกค้า Oct 1, 2021.docx', NULL),
	(16, 27, 'BD SAL-03 การสำรวจความพึงพอใจลูกค้า Oct 1, 2021.docx', '1641895861BD SAL-03 การสำรวจความพึงพอใจลูกค้า Oct 1, 2021.docx', NULL),
	(17, 28, 'BD SAL-04 การควบคุมทรัพย์สินลูกค้า Oct 1, 2021.docx', '1641895874BD SAL-04 การควบคุมทรัพย์สินลูกค้า Oct 1, 2021.docx', NULL),
	(18, 16, 'BD PRO-01 การออกแบบ วางแผน Production งานและตรวจสอบคุณภาพ 8 Dec 2021.docx', '1641896489BD PRO-01 การออกแบบ วางแผน Production งานและตรวจสอบคุณภาพ 8 Dec 2021.docx', 2),
	(19, 17, 'BD PRO-02 การควบคุมผลิตภัณฑ์ที่ไม่เป็นไปตามข้อกำหนด Oct 7, 2021.docx', '1641896799BD PRO-02 การควบคุมผลิตภัณฑ์ที่ไม่เป็นไปตามข้อกำหนด Oct 7, 2021.docx', NULL),
	(20, 19, 'BD PER-01 การสรรหาและคัดเลือกบุคลากร Sep 29, 2021.docx', '1641896892BD PER-01 การสรรหาและคัดเลือกบุคลากร Sep 29, 2021.docx', NULL),
	(21, 19, 'BD PER-02 การฝึกอบรม Sep 29, 2021.docx', '1641896899BD PER-02 การฝึกอบรม Sep 29, 2021.docx', NULL),
	(22, 29, 'BD PUR-01 การคัดเลือกประเมินSupplier Oct 1, 2021.docx', '1641896931BD PUR-01 การคัดเลือกประเมินSupplier Oct 1, 2021.docx', NULL),
	(23, 30, 'BD PUR-02 การจัดซื้อ Oct 1, 2021.docx', '1641896946BD PUR-02 การจัดซื้อ Oct 1, 2021.docx', NULL),
	(24, 18, 'BD STO-01 การรับ จัดเก็บ จ่าย ดูแลรักษา เคลื่อนย้ายวัสดุอุปกรณ์ สินค้า Oct 7, 2021.docx', '1641897011BD STO-01 การรับ จัดเก็บ จ่าย ดูแลรักษา เคลื่อนย้ายวัสดุอุปกรณ์ สินค้า Oct 7, 2021.docx', NULL),
	(31, 32, 'SAL-02-01 บันทึกข้อร้องเรียนลูกค้า Oct 1, 2021.pdf', '1642737038SAL-02-01 บันทึกข้อร้องเรียนลูกค้า Oct 1, 2021.pdf', 2),
	(32, 32, 'SAL-02-01 บันทึกข้อร้องเรียนลูกค้า Oct 1, 2021.xlsx', '1642737153SAL-02-01 บันทึกข้อร้องเรียนลูกค้า Oct 1, 2021.xlsx', 2),
	(33, 7, 'QM-01.pdf', '1642989269QM-01.pdf', 2),
	(34, 6, 'QP-QMR-01.pdf', '1642990662QP-QMR-01.pdf', 2),
	(35, 9, 'QP-QMR-03.pdf', '1642990712QP-QMR-03.pdf', 2),
	(36, 10, 'QP-QMR-04.pdf', '1642990730QP-QMR-04.pdf', 2),
	(37, 12, 'QP-QMR-06.pdf', '1642990749QP-QMR-06.pdf', 2),
	(38, 13, 'QP-QMR-07.pdf', '1642990773QP-QMR-07.pdf', 2),
	(39, 14, 'QP-QMR-08.pdf', '1642990791QP-QMR-08.pdf', 2),
	(40, 15, 'QP-QMR-09.pdf', '1642990919QP-QMR-09.pdf', 2),
	(42, 8, 'QP-QMR-02.pdf', '1643078997QP-QMR-02.pdf', 2),
	(43, 11, 'QP-QMP-05.pdf', '1643079016QP-QMP-05.pdf', 2),
	(44, 33, 'FM-QMR-01-01.pdf', '1643079902FM-QMR-01-01.pdf', 2),
	(45, 34, 'FM-QMR-01-02.pdf', '1643080040FM-QMR-01-02.pdf', 2),
	(46, 35, 'FM-QMR-02-01.pdf', '1643080336FM-QMR-02-01.pdf', 2),
	(47, 36, 'FM-QMR-03-01.pdf', '1643080495FM-QMR-03-01.pdf', 2),
	(48, 37, 'QP-STO-01.pdf', '1643359338QP-STO-01.pdf', 1),
	(49, 37, 'BD STO-01 การรับ จัดเก็บ จ่าย ดูแลรักษา เคลื่อนย้ายวัสดุอุปกรณ์ สินค้า Oct 7, 2021.docx', '1643359365BD STO-01 การรับ จัดเก็บ จ่าย ดูแลรักษา เคลื่อนย้ายวัสดุอุปกรณ์ สินค้า Oct 7, 2021.docx', 2),
	(50, 28, 'QP-SAL-04.pdf', '1643359590QP-SAL-04.pdf', 1),
	(51, 38, 'BD PER-01 การสรรหาและคัดเลือกบุคลากร Sep 29, 2021.docx', '1643359679BD PER-01 การสรรหาและคัดเลือกบุคลากร Sep 29, 2021.docx', 2),
	(52, 38, 'QP-PER-01.pdf', '1643359801QP-PER-01.pdf', 1),
	(53, 39, 'BD PER-02 การฝึกอบรม Sep 29, 2021.docx', '1643359872BD PER-02 การฝึกอบรม Sep 29, 2021.docx', 2),
	(54, 39, 'QP-PER-02.pdf', '1643359886QP-PER-02.pdf', 1),
	(55, 16, 'QP-PRO-01.pdf', '1643359940QP-PRO-01.pdf', 1),
	(56, 17, 'QP-PRO-02.pdf', '1643359965QP-PRO-02.pdf', 1),
	(57, 40, 'BD PUR-01 การคัดเลือกประเมินSupplier Oct 1, 2021.docx', '1643360111BD PUR-01 การคัดเลือกประเมินSupplier Oct 1, 2021.docx', 2),
	(58, 40, 'QP-PUR-01.pdf', '1643360150QP-PUR-01.pdf', 1),
	(59, 41, 'BD PUR-02 การจัดซื้อ Oct 1, 2021.docx', '1643360331BD PUR-02 การจัดซื้อ Oct 1, 2021.docx', 2),
	(60, 41, 'QP-PUR-02.pdf', '1643360352QP-PUR-02.pdf', 1),
	(61, 25, 'QP-SAL-01.pdf', '1643360425QP-SAL-01.pdf', 1),
	(62, 26, 'QP-SAL-02.pdf', '1643360448QP-SAL-02.pdf', 1),
	(63, 27, 'QP-SAL-03.pdf', '1643360470QP-SAL-03.pdf', 1);
/*!40000 ALTER TABLE `document_attachment` ENABLE KEYS */;

-- Dumping structure for table brandexiso.document_group
DROP TABLE IF EXISTS `document_group`;
CREATE TABLE IF NOT EXISTS `document_group` (
  `doc_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  `cby` varchar(255) DEFAULT NULL,
  `uby` varchar(255) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `udate` datetime DEFAULT NULL,
  PRIMARY KEY (`doc_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table brandexiso.document_group: ~22 rows (approximately)
/*!40000 ALTER TABLE `document_group` DISABLE KEYS */;
INSERT INTO `document_group` (`doc_group_id`, `group_name`, `parent_id`, `cby`, `uby`, `cdate`, `udate`) VALUES
	(1, '1. QMR', 0, NULL, NULL, NULL, NULL),
	(2, '2. SAL', 0, NULL, NULL, NULL, NULL),
	(3, '3. PRO', 0, NULL, NULL, NULL, NULL),
	(4, '4. PER', 0, NULL, NULL, NULL, NULL),
	(5, '5. PUR', 0, NULL, NULL, NULL, NULL),
	(8, 'QP-PRO', 3, NULL, NULL, NULL, NULL),
	(9, '6. STO', 0, NULL, NULL, NULL, NULL),
	(10, 'QM', 1, NULL, NULL, NULL, NULL),
	(11, 'QP-QMR', 1, NULL, NULL, NULL, NULL),
	(12, 'QP-STO', 9, NULL, NULL, NULL, NULL),
	(13, 'QP-SAL', 2, NULL, NULL, NULL, NULL),
	(14, 'QP-PER', 4, NULL, NULL, NULL, NULL),
	(15, 'QP-PUR', 5, NULL, NULL, NULL, NULL),
	(16, 'FM-SAL', 2, NULL, NULL, NULL, NULL),
	(17, 'SD-QMR', 1, NULL, NULL, NULL, NULL),
	(18, 'FM-QMR', 1, NULL, NULL, NULL, NULL),
	(19, 'FM-QMR-01', 18, NULL, NULL, NULL, NULL),
	(20, 'FM-QMR-02', 18, NULL, NULL, NULL, NULL),
	(21, 'FM-QMR-03', 18, NULL, NULL, NULL, NULL),
	(22, 'FM-QMR-04', 18, NULL, NULL, NULL, NULL),
	(23, 'FM-QMR-05', 18, NULL, NULL, NULL, NULL),
	(24, 'FM-QMR-06', 18, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `document_group` ENABLE KEYS */;

-- Dumping structure for table brandexiso.document_link
DROP TABLE IF EXISTS `document_link`;
CREATE TABLE IF NOT EXISTS `document_link` (
  `doc_link_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `doc_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`doc_link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table brandexiso.document_link: ~0 rows (approximately)
/*!40000 ALTER TABLE `document_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_link` ENABLE KEYS */;

-- Dumping structure for table brandexiso.document_list_user
DROP TABLE IF EXISTS `document_list_user`;
CREATE TABLE IF NOT EXISTS `document_list_user` (
  `document_list_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  PRIMARY KEY (`document_list_user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table brandexiso.document_list_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `document_list_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_list_user` ENABLE KEYS */;

-- Dumping structure for table brandexiso.document_version
DROP TABLE IF EXISTS `document_version`;
CREATE TABLE IF NOT EXISTS `document_version` (
  `version_id` int(11) NOT NULL AUTO_INCREMENT,
  `version_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`version_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table brandexiso.document_version: ~2 rows (approximately)
/*!40000 ALTER TABLE `document_version` DISABLE KEYS */;
INSERT INTO `document_version` (`version_id`, `version_name`) VALUES
	(1, 'New version'),
	(2, 'Archive version');
/*!40000 ALTER TABLE `document_version` ENABLE KEYS */;

-- Dumping structure for table brandexiso.document_year
DROP TABLE IF EXISTS `document_year`;
CREATE TABLE IF NOT EXISTS `document_year` (
  `document_year_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`document_year_id`),
  UNIQUE KEY `doc_id_year` (`doc_id`,`year`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Dumping data for table brandexiso.document_year: ~3 rows (approximately)
/*!40000 ALTER TABLE `document_year` DISABLE KEYS */;
INSERT INTO `document_year` (`document_year_id`, `doc_id`, `year`) VALUES
	(24, 6, '2021'),
	(23, 6, '2022'),
	(22, 6, '2023'),
	(25, 7, '2022'),
	(21, 8, '2021'),
	(20, 9, '2023');
/*!40000 ALTER TABLE `document_year` ENABLE KEYS */;

-- Dumping structure for table brandexiso.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table brandexiso.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table brandexiso.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table brandexiso.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2021_10_29_013824_create_sessions_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table brandexiso.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table brandexiso.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table brandexiso.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table brandexiso.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table brandexiso.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table brandexiso.sessions: ~1 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('ChEaLgA7oTaMzSRGt5WQEte76nOGKXkDOO8ZAPjG', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiOXl3TktKTWlZbjh4QkN0a3lVYjU5eGp1YndsV2NQM2lmSG81cHJzYyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZG9jdW1lbnRsaXN0LzExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEwzbXJjL2htV0FScEcwanNlbzVmZS42R2hSWHZDbi9VWENrbS5XcVNvUGRxYTZxeFQ1UlQuIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRMM21yYy9obVdBUnBHMGpzZW81ZmUuNkdoUlh2Q24vVVhDa20uV3FTb1BkcWE2cXhUNVJULiI7fQ==', 1645089050);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table brandexiso.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `level` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `is_manager` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `is_active` int(10) unsigned NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table brandexiso.users: ~21 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `dep_id`, `level`, `is_manager`, `is_active`, `name`, `nickname`, `position`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(3, 'pongpet', 7, 5, 2, 1, 'พงศ์เพชร มีทรัพย์', 'อ้วน', 'Programmer', 'pongpet007@gmail.com', NULL, '$2y$10$L3mrc/hmWARpG0jseo5fe.6GhRXvCn/UXCkm.WqSoPdqa6qxT5RT.', NULL, NULL, 'YBya3IVgZ9tyJs84tbPmKD1sTRtlrpvS1ya6VxzVfZfAzfovqtVwhXmEWUA0', NULL, NULL, NULL, NULL, '2022-01-20 08:32:18', 'พงศ์เพชร มีทรัพย์'),
	(4, 'korn', 3, 1, 1, 1, 'สัชฌุกร หอมพินิจ', 'กร', 'Programmer', NULL, NULL, '$2y$10$mnvHy5KDvTR8AgV9LQhygOzsidewRNOpVCqv92M1OK8UYVKQQ.IEm', NULL, NULL, 'rB5exQfTo8KDZMJBqNNLMGV2moG6qyD041H7ahMTGT7xHHAYBt9MnvwuFH0h', NULL, NULL, NULL, NULL, '2022-01-20 08:32:26', 'พงศ์เพชร มีทรัพย์'),
	(5, 'choltisa', 7, 5, 1, 1, 'ชลธิสา สมาน', 'นะ', 'QRM', NULL, NULL, '$2y$10$cIYXe7AcmOyfu5DFx167ieSvIDtv/4rhO4P0hR8Lvnu1R6dt5Mqhu', NULL, NULL, 'udAxQBy8wzNqLn5EJUDwEG7SI1n2TQilW8FxZgo2BOFDkA1kzFBtdR5uyExD', NULL, NULL, NULL, NULL, '2022-01-20 08:32:35', 'พงศ์เพชร มีทรัพย์'),
	(6, 'kodchakorn', 9, 1, 2, 1, 'คุณกชกร เอื้อเฟื้อ', 'ฟลุ๊ค', 'เจ้าหน้าที่ดูแลสื่อโซเชี่ยลมีเดีย', NULL, NULL, '$2y$10$XU7jvULpWa0Q7q4jCiuHyeULxlQcqxTn5kzEiNq9ntz0okiPkoAHK', NULL, NULL, NULL, NULL, NULL, '2022-01-11 08:49:01', 'ชลธิสา สามาน', '2022-01-11 08:49:01', NULL),
	(7, 'chada', 7, 5, 1, 1, 'ชาฏา โกจารย์ศรี', 'ปริม', 'CEO', NULL, NULL, '$2y$10$ld/VOo.yLKY07WNCDv1MC.6b1aQ.dsnTS9rr43uMrNgi.hAgsUPPa', NULL, NULL, 'w0VXPlKGXRqNla1yWIH6n3UxkStT3opWsdTaenI3rcsxmILXvVksQlhEbSmb', NULL, NULL, '2022-01-11 11:43:35', 'พงศ์เพชร มีทรัพย์', '2022-02-17 09:39:48', 'ชลธิสา สมาน'),
	(8, 'jasusiri', 3, 1, 2, 1, 'คุณจารุสิริ ผิวเกลี้ยง', 'บิ๊ก', 'ผู้จัดการฝ่ายขาย', NULL, NULL, '$2y$10$wfJS1viO7L8ex8yA.E4WrOzEWcR9v66h35UmRb0Lcv7uDlVOwPVr.', NULL, NULL, NULL, NULL, NULL, '2022-01-11 16:42:18', 'ชลธิสา สมาน', '2022-01-20 08:32:52', 'พงศ์เพชร มีทรัพย์'),
	(9, 'Niracha', 7, 5, 2, 1, 'ณิรชา ชวบูรณพิทักษ์', 'มุก', 'DCO', NULL, NULL, '$2y$10$9ZZhseLio2I/xCCPpVz0ceunnDec1vWysFIKdUsmCtz3Hx0QlMPPy', NULL, NULL, 'fDi7i6yNMcEP0yS2rpeMlcLmOAiPIOdNNH8RoAhGpGTjOPM9lfIGI37kd09V', NULL, NULL, '2022-01-11 17:17:32', 'ชลธิสา สมาน', '2022-02-17 09:44:21', 'ชาฏา โกจารย์ศรี'),
	(10, 'Bow', 3, 1, 2, 1, 'คุณกนกวรรณ มโนธรรม', 'โบว์', 'เว็บไซต์ออนไลน์', NULL, NULL, '$2y$10$vbiNZuIfyoLjYbBXMHdnOe/VUCXa0vY5/6Wtua1nWxvmOXAqZ2dYu', NULL, NULL, NULL, NULL, NULL, '2022-01-21 09:09:16', 'ชลธิสา สมาน', '2022-01-21 09:09:16', NULL),
	(11, 'Chanchira', 3, 1, 2, 1, 'คุณจันทร์จิรา ยาวะโนภาส', 'บลู', 'ผู้เชี่ยวชาญด้านเสิร์ชเอ็นจิ้น', NULL, NULL, '$2y$10$/Vr170WU7Qp/iS2k46MyOO5b4daL6AzRAMQx.iJVgTPJi2S1Jpbte', NULL, NULL, NULL, NULL, NULL, '2022-01-21 09:09:54', 'ชลธิสา สมาน', '2022-01-21 09:09:54', NULL),
	(12, 'Jam', 3, 1, 2, 1, 'คุณกัญญารัตน กอละพันธุ์', 'แจม', 'ออนไลน์เว็บไซต์', NULL, NULL, '$2y$10$rp4J8op37udFbQqQjcHD1uZ4t3WNnEijNU9s8BD7P3SICJIwHB4yS', NULL, NULL, NULL, NULL, NULL, '2022-01-21 09:10:40', 'ชลธิสา สมาน', '2022-01-21 09:10:40', NULL),
	(13, 'not', 3, 1, 2, 1, 'คุณศรีรัตน์ ไชยเสนา', 'น๊อต', 'ออนไลน์เว็บไซต์', NULL, NULL, '$2y$10$OFKcuuQsl7trwWAAfjD.6.COhsWLjME2QaZek0eG/bW3TlcGmycJK', NULL, NULL, NULL, NULL, NULL, '2022-01-21 09:11:57', 'ชลธิสา สมาน', '2022-01-21 09:11:57', NULL),
	(14, 'peck', 3, 1, 2, 1, 'คุณอิทธิพล ชนช้าง', 'เพค', 'กราฟิกดีไซน์', NULL, NULL, '$2y$10$GhxxLDI.0iAhHAKwn9ckUORZqsibSe8eqWcx6672B9oGIyHR7jJ0e', NULL, NULL, NULL, NULL, NULL, '2022-01-21 09:13:37', 'ชลธิสา สมาน', '2022-01-21 09:13:37', NULL),
	(15, 'pop', 3, 1, 2, 1, 'คุณหนึ่งฤทัย ชมภูง้าว', 'ป๊อป', 'กราฟิกดีไซน์', NULL, NULL, '$2y$10$3Kq7LpUwiHmWhFOJx4bG3.HkXkfhBsCIJj7EnV2u93QmE7An3WMQS', NULL, NULL, NULL, NULL, NULL, '2022-01-21 09:14:36', 'ชลธิสา สมาน', '2022-01-21 09:14:36', NULL),
	(16, 'sunisa', 3, 1, 2, 1, 'คุณสุนิสา มั่นประพันธ์', 'น้อยหน่า', 'โซเชี่ยลมีเดีย', NULL, NULL, '$2y$10$yLBYr.wbDEBLCVfQo8nzr.X8ioty1tQ0zonvWmWM2Xls8wVS15AKG', NULL, NULL, NULL, NULL, NULL, '2022-01-21 09:15:05', 'ชลธิสา สมาน', '2022-01-21 09:15:05', NULL),
	(17, 'tistaya', 3, 1, 2, 1, 'คุณธิษตยา กันทะวงศ์', 'แหม่ม', 'ผู้จัดการฝ่ายขาย', NULL, NULL, '$2y$10$ITgvwDWLxkOkrppFjJOBWuV7usnhX.J4u7uzaIo9uDlho3IwZJP3u', NULL, NULL, NULL, NULL, NULL, '2022-01-28 16:04:43', 'ชลธิสา สมาน', '2022-01-28 16:05:31', 'ชลธิสา สมาน'),
	(18, 'Threenet', 3, 1, 2, 1, 'คุณตรีเนตร วุฒิปราณี', 'เอี๊ก', 'พนักงานขาย', NULL, NULL, '$2y$10$QjWakyFzeWZKQtVKzyq5a.loDw9Ph/tR82PzB6L4n/Z.XWdn564ye', NULL, NULL, NULL, NULL, NULL, '2022-01-28 16:06:24', 'ชลธิสา สมาน', '2022-01-28 16:06:24', NULL),
	(19, 'thanida', 3, 1, 2, 1, 'คุณฐานิดา พวงบุบผา', 'หน่อย', 'พนักงานขาย', NULL, NULL, '$2y$10$4Vl3BnvaqDj0WYm1tdr34uYEDPJbJsEjewQZHXrQJng6Y1b6EpFWu', NULL, NULL, NULL, NULL, NULL, '2022-01-28 16:06:59', 'ชลธิสา สมาน', '2022-01-28 16:06:59', NULL),
	(20, 'Nattayajan', 3, 1, 2, 1, 'คุณณัฏฐญา เจนวิทยาการกุล', 'หลิง', 'พนักงานฝ่ายขาย', NULL, NULL, '$2y$10$/auSZUvz1DpQyH5LfRDDAOYxrgau6Yz9VL7qXT9Eb2JRAUCEA7Via', NULL, NULL, NULL, NULL, NULL, '2022-01-28 16:08:56', 'ชลธิสา สมาน', '2022-01-28 16:08:56', NULL),
	(21, 'patchareeya', 3, 1, 2, 1, 'คุณพัชรีญา เตชอมรเลิศ', 'น้ำ', 'พนักงานขาย', NULL, NULL, '$2y$10$7UtZRygJX8zlNyzdV.LZd.d0KPLnsd/Zkv8qna3AkkQVOys/WlR1q', NULL, NULL, NULL, NULL, NULL, '2022-01-28 16:09:30', 'ชลธิสา สมาน', '2022-01-28 16:09:30', NULL),
	(22, 'sirinada', 3, 1, 2, 1, 'คุณสิรินดา วีระวัฒนะ', 'แก้ม', 'เจ้าหน้าที่วิเคราะห์คีย์เวิร์ด', NULL, NULL, '$2y$10$e3pe5aFiKyF8Id4URbruLeRQKK/JqhU.VLMOFT2qN.yCd3wf6zCm6', NULL, NULL, NULL, NULL, NULL, '2022-01-28 16:15:36', 'ชลธิสา สมาน', '2022-01-28 16:15:36', NULL),
	(23, 'Atitra2', 3, 1, 2, 1, 'คุณบัวคลี่ ทรงเอกพัชร', 'แนน', 'บัญชีการเงิน', NULL, NULL, '$2y$10$8iiV1Nu7aUR1mRMacLpms.pGXY9bcAEdEinuuvQCYYQ1kZLeBQ5/O', NULL, NULL, NULL, NULL, NULL, '2022-01-31 13:24:55', 'ชลธิสา สมาน', '2022-01-31 13:24:55', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table brandexiso.users_control
DROP TABLE IF EXISTS `users_control`;
CREATE TABLE IF NOT EXISTS `users_control` (
  `user_control_id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_id` int(11) DEFAULT NULL,
  `under_id` int(11) DEFAULT NULL,
  `cby` varchar(50) DEFAULT NULL,
  `uby` varchar(50) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `udate` datetime DEFAULT NULL,
  PRIMARY KEY (`user_control_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table brandexiso.users_control: ~0 rows (approximately)
/*!40000 ALTER TABLE `users_control` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_control` ENABLE KEYS */;

-- Dumping structure for table brandexiso.user_document_group
DROP TABLE IF EXISTS `user_document_group`;
CREATE TABLE IF NOT EXISTS `user_document_group` (
  `udg_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `doc_group_id` int(11) NOT NULL DEFAULT 0,
  `cby` varchar(50) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  PRIMARY KEY (`udg_id`),
  UNIQUE KEY `user_id_doc_group_id` (`user_id`,`doc_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

-- Dumping data for table brandexiso.user_document_group: ~41 rows (approximately)
/*!40000 ALTER TABLE `user_document_group` DISABLE KEYS */;
INSERT INTO `user_document_group` (`udg_id`, `user_id`, `doc_group_id`, `cby`, `cdate`) VALUES
	(93, 3, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(94, 4, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(95, 5, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(96, 6, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(97, 7, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(98, 9, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(99, 10, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(100, 11, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(101, 12, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(102, 13, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(103, 14, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(104, 15, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(105, 16, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(106, 22, 3, 'ชลธิสา สมาน', '2022-01-31 13:22:32'),
	(131, 3, 1, 'ชลธิสา สมาน', '2022-01-31 13:55:10'),
	(132, 5, 1, 'ชลธิสา สมาน', '2022-01-31 13:55:10'),
	(133, 7, 1, 'ชลธิสา สมาน', '2022-01-31 13:55:11'),
	(134, 9, 1, 'ชลธิสา สมาน', '2022-01-31 13:55:11'),
	(135, 3, 2, 'ชลธิสา สมาน', '2022-01-31 13:55:15'),
	(136, 5, 2, 'ชลธิสา สมาน', '2022-01-31 13:55:15'),
	(137, 7, 2, 'ชลธิสา สมาน', '2022-01-31 13:55:15'),
	(138, 17, 2, 'ชลธิสา สมาน', '2022-01-31 13:55:15'),
	(139, 18, 2, 'ชลธิสา สมาน', '2022-01-31 13:55:15'),
	(140, 19, 2, 'ชลธิสา สมาน', '2022-01-31 13:55:15'),
	(141, 20, 2, 'ชลธิสา สมาน', '2022-01-31 13:55:15'),
	(142, 21, 2, 'ชลธิสา สมาน', '2022-01-31 13:55:15'),
	(143, 3, 4, 'ชลธิสา สมาน', '2022-01-31 13:55:22'),
	(144, 5, 4, 'ชลธิสา สมาน', '2022-01-31 13:55:22'),
	(145, 7, 4, 'ชลธิสา สมาน', '2022-01-31 13:55:22'),
	(146, 9, 4, 'ชลธิสา สมาน', '2022-01-31 13:55:22'),
	(147, 23, 4, 'ชลธิสา สมาน', '2022-01-31 13:55:22'),
	(148, 3, 5, 'ชลธิสา สมาน', '2022-01-31 13:55:27'),
	(149, 5, 5, 'ชลธิสา สมาน', '2022-01-31 13:55:27'),
	(150, 7, 5, 'ชลธิสา สมาน', '2022-01-31 13:55:27'),
	(151, 9, 5, 'ชลธิสา สมาน', '2022-01-31 13:55:27'),
	(152, 23, 5, 'ชลธิสา สมาน', '2022-01-31 13:55:27'),
	(153, 3, 9, 'ชลธิสา สมาน', '2022-01-31 13:55:34'),
	(154, 5, 9, 'ชลธิสา สมาน', '2022-01-31 13:55:34'),
	(155, 7, 9, 'ชลธิสา สมาน', '2022-01-31 13:55:34'),
	(156, 9, 9, 'ชลธิสา สมาน', '2022-01-31 13:55:34'),
	(157, 23, 9, 'ชลธิสา สมาน', '2022-01-31 13:55:34');
/*!40000 ALTER TABLE `user_document_group` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
