-- --------------------------------------------------------
-- Host:                         103.74.253.238
-- Server version:               10.4.21-MariaDB - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table admin_brandexiso.department
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

-- Dumping data for table admin_brandexiso.department: ~5 rows (approximately)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`dep_id`, `dep_name`, `cby`, `uby`, `cdate`, `udate`) VALUES
	(3, 'SAL', 'Pongpetch Meesab', 'Administrator', '2016-09-22 11:05:53', '2016-11-30 10:56:09'),
	(5, 'PER', 'Pongpetch Meesab', NULL, '2016-09-22 11:08:05', NULL),
	(6, 'PUR', 'Pongpetch Meesab', 'Administrator', '2016-09-22 11:08:24', '2016-11-30 10:25:27'),
	(7, 'QMR', 'Pongpetch Meesab', NULL, '2016-09-22 11:26:26', NULL),
	(9, 'PRODUCTION', 'Administrator', 'คุณชลธิสา สมาน', '2016-11-30 10:56:33', '2017-03-06 16:09:43');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.document
DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Dumping data for table admin_brandexiso.document: ~22 rows (approximately)
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` (`doc_id`, `doc_code`, `rev`, `doc_date`, `title`, `detail`, `remark`, `doc_group_id`, `cby`, `uby`, `cdate`, `udate`) VALUES
	(6, 'QP-QMR-01', 'REV1', '2021-11-01', 'การประชุมทบทวนระบบคุณภาพโดยฝ่ายบริหาร', 'หมายเอกสารเอกสาร  :   QP-QMR-01\r\nแก้ไขครั้งที่                  :   01\r\nวันที่อนุมัติใช้              :  1-11-2021', NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-07', '2022-01-07'),
	(7, 'QM-01', 'REV1', '2021-12-08', 'คู่มือคุณภาพ', NULL, NULL, 10, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(8, 'QP-QMR-02', 'REV1', '2021-11-01', 'การควบคุมโครงสร้างพื้นฐาน', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(9, 'QP-QMR-03', 'REV1', '2021-11-01', 'การควบคุมเอกสาร', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(10, 'QP-QMR-04', 'REV1', '2021-11-01', 'การปฏิบัติการแก้ไขและปฏิบัติการป้องกัน', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(11, 'QP-QMR-05', 'REV1', '2021-11-01', 'การควบคุมบันทึก', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(12, 'QP-QMR-06', 'REV1', '2021-11-01', 'การตรวจติดตามภายใน', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(13, 'QP-QMR-07', 'REV1', '2021-11-01', 'การสื่อสาร', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(14, 'QP-QMR-08', 'REV1', '2021-11-01', 'การดำเนินการเกี่ยวกับความเสี่ยงและโอกาส', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(15, 'QP-QMR-09', 'REV1', '2021-11-01', 'บริบทองค์กร, การตรวจวัดกระบวนการ, การวิเคราะห์ข้อมูล,  การปรับปรุงอย่างต่อเนื่อง', NULL, NULL, 11, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(16, 'QP-PRO-01', NULL, '2021-12-08', 'การออกแบบ วางแผน Production และตรวจสอบคุณภาพงาน', NULL, NULL, 3, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(17, 'QP-PRO-02', NULL, '2021-11-01', 'การควบคุมผลิตภัณฑ์ที่ไม่เป็นไปตามข้อกำหนด', NULL, NULL, 3, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(18, 'QP-STO-01', NULL, '2021-11-01', 'การรับ-จัดเก็บ-จ่าย-ดูแลรักษา-เคลื่อนย้ายวัสดุอุปกรณ์สินค้าสำเร็จรูป', NULL, NULL, 9, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(19, 'QP-PER-01', NULL, '2021-11-01', 'การสรรหาและคัดเลือกบุคลากร', NULL, NULL, 4, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(20, 'QP-PER-02', NULL, '2021-11-01', 'การฝึกอบรม', NULL, NULL, 4, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(25, 'QP-SAL-01', NULL, '2021-12-08', 'การทบทวนและรับคำสั่งซื้อ', NULL, NULL, 2, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(26, 'QP-SAL-02', NULL, '2021-11-01', 'การรับข้อร้องเรียนลูกค้าและการติดต่อสื่อสารกับลูกค้า', NULL, NULL, 2, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(27, 'QP-SAL-03', NULL, '2021-11-01', 'การหาความคาดหวังและจัดระบบความพึงพอใจลูกค้า', NULL, NULL, 2, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(28, 'QP-SAL-04', NULL, '2021-11-01', 'การควบคุมทรัพย์สินลูกค้า', NULL, NULL, 2, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(29, 'QP-PUR-01', NULL, '2021-11-01', 'การคัดเลือก / ประเมิน Supplier', NULL, NULL, 5, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11'),
	(30, 'QP-PUR-02', NULL, '2021-12-01', 'การจัดซื้อ', NULL, NULL, 5, 'ชลธิสา สามาน', NULL, '2022-01-11', '2022-01-11');
/*!40000 ALTER TABLE `document` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.document_attachment
DROP TABLE IF EXISTS `document_attachment`;
CREATE TABLE IF NOT EXISTS `document_attachment` (
  `attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) NOT NULL DEFAULT 0,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `filestatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`attachment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Dumping data for table admin_brandexiso.document_attachment: ~21 rows (approximately)
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
	(24, 18, 'BD STO-01 การรับ จัดเก็บ จ่าย ดูแลรักษา เคลื่อนย้ายวัสดุอุปกรณ์ สินค้า Oct 7, 2021.docx', '1641897011BD STO-01 การรับ จัดเก็บ จ่าย ดูแลรักษา เคลื่อนย้ายวัสดุอุปกรณ์ สินค้า Oct 7, 2021.docx', NULL);
/*!40000 ALTER TABLE `document_attachment` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.document_group
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table admin_brandexiso.document_group: ~11 rows (approximately)
/*!40000 ALTER TABLE `document_group` DISABLE KEYS */;
INSERT INTO `document_group` (`doc_group_id`, `group_name`, `parent_id`, `cby`, `uby`, `cdate`, `udate`) VALUES
	(1, '1. QMR', 0, NULL, NULL, NULL, NULL),
	(2, '2. SAL', 0, NULL, NULL, NULL, NULL),
	(3, '3. PRO', 0, NULL, NULL, NULL, NULL),
	(4, '4. PER', 0, NULL, NULL, NULL, NULL),
	(5, '5. PUR', 0, NULL, NULL, NULL, NULL),
	(6, 'PRO-IT', 3, NULL, NULL, NULL, NULL),
	(7, 'PRO-DI', 3, NULL, NULL, NULL, NULL),
	(8, 'PRO-GR', 3, NULL, NULL, NULL, NULL),
	(9, '6. STO', 0, NULL, NULL, NULL, NULL),
	(10, 'QM', 1, NULL, NULL, NULL, NULL),
	(11, 'QP', 1, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `document_group` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.document_link
DROP TABLE IF EXISTS `document_link`;
CREATE TABLE IF NOT EXISTS `document_link` (
  `doc_link_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `doc_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`doc_link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table admin_brandexiso.document_link: ~0 rows (approximately)
/*!40000 ALTER TABLE `document_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_link` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.document_list_user
DROP TABLE IF EXISTS `document_list_user`;
CREATE TABLE IF NOT EXISTS `document_list_user` (
  `document_list_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  PRIMARY KEY (`document_list_user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table admin_brandexiso.document_list_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `document_list_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_list_user` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.failed_jobs
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

-- Dumping data for table admin_brandexiso.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table admin_brandexiso.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2021_10_29_013824_create_sessions_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table admin_brandexiso.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.personal_access_tokens
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

-- Dumping data for table admin_brandexiso.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.sessions
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

-- Dumping data for table admin_brandexiso.sessions: ~13 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('2LEbwqIkTCE3JLNt6svg8hujDGgp1dnGe2Jz6xcO', NULL, '42.83.147.34', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)Chrome/74.0.3729.169 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidHhkZ3lWbVREV0ZUaGRFSmlZbTZLcTNIdHVWVElzNW12VVJwblFXbSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cHM6Ly9icmFuZGV4aXNvLmNvbSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwczovL2JyYW5kZXhpc28uY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1642520419),
	('3seULbOoye274KMW3pzrYl475En866cEF5OcKd2C', NULL, '165.231.54.162', 'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.6) Gecko/2009011913 Firefox/3.0.6', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRXh4cVhJMU9SSzhhb3FnaG1IaVUwdTZVSm16aVVxZlp0cE1JUHVRMSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cHM6Ly9icmFuZGV4aXNvLmNvbSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwczovL2JyYW5kZXhpc28uY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1642571469),
	('5dAgcN8spWhYX99H5BEE2511iV7lcFBg4b7PF3Vf', NULL, '34.77.162.11', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYnZTeEhKbFk0ZkppQVRzMzZ0MlBMdmNIZERId0RLOVQzb3FVc0NQcyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly93d3cuYnJhbmRleGlzby5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly93d3cuYnJhbmRleGlzby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1642511613),
	('6J0Kk2vdOM1tr2SeMiCUVDLfTnIJ0XezwkoxC6CJ', NULL, '45.129.18.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiUmkwTEpDbGJrY0FZWmYxVzdya1FxMk81VXcxT1hBbjNxNXJRUmc4TyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1642517550),
	('AV9L19AcnVSqlXs9sa2tuh4IKmi81KVxuSlKa50k', NULL, '35.164.133.172', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekdiUjBNcW82WFhTSlhIMldBalFldzIxdjdEVVpKOG1HNUpDSkRXeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vYnJhbmRleGlzby5jb20vZm9yZ290LXBhc3N3b3JkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1642550759),
	('aXxD6jxlbTb8s6MJDunzSA7ojsTl2nVaIjUeZVwD', NULL, '195.154.179.86', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidWVuTTVxSGRLTUZEZjZaOFM0M2FMMnkxN2pzM1ZqZHJ2OVp0QlFyQyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cHM6Ly9icmFuZGV4aXNvLmNvbSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwczovL2JyYW5kZXhpc28uY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1642493016),
	('cnkjKsiV9SU9wsB103zGT1rT3mgtZ2JmzloBgOt2', 3, '180.183.102.193', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVnFyRDRsVld0NDJ5Z2JaaEZuN2dKeDNuQnVlU2FzZWUzTUdIdHpaTCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQxOiJodHRwczovL3d3dy5icmFuZGV4aXNvLmNvbS9kb2N1bWVudGxpc3QvOSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRMM21yYy9obVdBUnBHMGpzZW81ZmUuNkdoUlh2Q24vVVhDa20uV3FTb1BkcWE2cXhUNVJULiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkTDNtcmMvaG1XQVJwRzBqc2VvNWZlLjZHaFJYdkNuL1VYQ2ttLldxU29QZHFhNnF4VDVSVC4iO30=', 1642496891),
	('kPjVkW8Y97CoBvfneMfEsN8DX1QfEEqOz8Jih7yY', NULL, '18.116.112.168', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZjN1UEswUkxoTlNwQUZJOENsQ0d0d2R5VW1EUjE3SVR5M1JYVXAxaCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cHM6Ly9icmFuZGV4aXNvLmNvbSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwczovL2JyYW5kZXhpc28uY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1642493315),
	('MvEofCyAk1bYy12UzMfdhC4lyeXMcyx7atmAftiF', NULL, '123.60.83.110', 'Mozilla/5.0 (Windows NT 8.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.2341.88 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWlM1REVGODI4SWhQb2xpNUtBOUVGMzZQVUZxRW8zbExTWHlCWUwwUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vd3d3LmJyYW5kZXhpc28uY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1642526782),
	('tKWRw1oreqEGlhTEnYzgQc73mfH3y7wwIb4e9RmD', NULL, '34.77.162.11', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUHNsU1hlVmoyMEJDc0VaTXZHdG5GanFPaVF4MmUxYkFVV1FscGxpYiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly93d3cuYnJhbmRleGlzby5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly93d3cuYnJhbmRleGlzby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1642496449),
	('Vy7sPH9GNHHUncreeIeaVsx382pO9AaUDGmdDsoA', NULL, '45.129.18.206', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHRCdmFJeVVBRWdLWHZQbmxWMTh2ZEFFRFlvSUZvMlhnSkwwdHNlRSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cHM6Ly9icmFuZGV4aXNvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1642517549),
	('ws0HqdqVkNKns6L84VC2PxO07zut0g8ZpDP48Kn9', 3, '180.183.102.193', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVlo0ellpT1gxR0J6UnhFSDJYaGg1dHpOYXZRVFBBSmljRkVzTEJHOSI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRMM21yYy9obVdBUnBHMGpzZW81ZmUuNkdoUlh2Q24vVVhDa20uV3FTb1BkcWE2cXhUNVJULiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkTDNtcmMvaG1XQVJwRzBqc2VvNWZlLjZHaFJYdkNuL1VYQ2ttLldxU29QZHFhNnF4VDVSVC4iO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwczovL3d3dy5icmFuZGV4aXNvLmNvbS9Vc2VyIjt9fQ==', 1642555041),
	('y23pDPpTPKt8rzKRum8D54TxS94DcGZJhEhuJkRc', NULL, '123.60.83.110', 'Mozilla/5.0 (Windows NT 8.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.2341.88 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVjc0aEdDUU9ieVBNRzlBa1RUWXY1QUdPSUR0aFJMMjRTUUpzSWI3ayI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly93d3cuYnJhbmRleGlzby5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly93d3cuYnJhbmRleGlzby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1642526781),
	('ZDVEgC637gmFGqlRcajdS7X2syoKJL145FGfnlrx', NULL, '34.221.176.90', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10.11; rv:46.0) Gecko/20100101 Firefox/46.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNkVGc00wYnREbnNkQzVwTXBPM2dreHFVY1F4d1RvTzZhMnJDc3UwaSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMjoiaHR0cHM6Ly9icmFuZGV4aXNvLmNvbSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwczovL2JyYW5kZXhpc28uY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1642550752);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.users
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table admin_brandexiso.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `dep_id`, `level`, `is_manager`, `is_active`, `name`, `nickname`, `position`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(3, 'pongpet', 7, 5, 2, 1, 'พงศ์เพชร มีทรัพย์', 'พี่อ้วน', 'Programmer', 'pongpet007@gmail.com', NULL, '$2y$10$L3mrc/hmWARpG0jseo5fe.6GhRXvCn/UXCkm.WqSoPdqa6qxT5RT.', NULL, NULL, 'fWL0Ah9AnkL4tv04PoNBAAYylVlWKwh6NhPVbpcDKrbyqYcU2PyWnbVCVbrQ', NULL, NULL, NULL, NULL, '2022-01-17 14:14:43', 'พงศ์เพชร มีทรัพย์'),
	(4, 'korn', 1, 1, 1, 1, 'Korn', 'น้องกร', 'Programmer', NULL, NULL, '$2y$10$mnvHy5KDvTR8AgV9LQhygOzsidewRNOpVCqv92M1OK8UYVKQQ.IEm', NULL, NULL, 'n0kgmNE7zX2eS3plt7jdjevkGdRpWD5wdUwZ3naNI6Ummj4zLspxj6SogwN5', NULL, NULL, NULL, NULL, '2022-01-12 09:40:14', 'พงศ์เพชร มีทรัพย์'),
	(5, 'choltisa', 7, 5, 1, 1, 'ชลธิสา สมาน', 'พี่นะ', 'QRM', NULL, NULL, '$2y$10$cIYXe7AcmOyfu5DFx167ieSvIDtv/4rhO4P0hR8Lvnu1R6dt5Mqhu', NULL, NULL, 'Fr7ajoIAa9hPNS0VrvVUf7aNFS7nNpCYgUzNRkF5y6TCOnC1CjtnatVV3ttn', NULL, NULL, NULL, NULL, '2022-01-11 16:25:15', 'ชลธิสา สามาน'),
	(6, 'kodchakorn', 9, 1, 2, 1, 'คุณกชกร เอื้อเฟื้อ', 'ฟลุ๊ค', 'เจ้าหน้าที่ดูแลสื่อโซเชี่ยลมีเดีย', NULL, NULL, '$2y$10$XU7jvULpWa0Q7q4jCiuHyeULxlQcqxTn5kzEiNq9ntz0okiPkoAHK', NULL, NULL, NULL, NULL, NULL, '2022-01-11 08:49:01', 'ชลธิสา สามาน', '2022-01-11 08:49:01', NULL),
	(7, 'chada', 7, 1, 1, 1, 'Chada Kochansri', 'Prim', 'CEO', NULL, NULL, '$2y$10$589fcg6kven773tQbPcAv./yzip1LYgS9tarbQdYsp9ey61FvAssy', NULL, NULL, 'DHrDevOGpZJeCWHv8DXsevcLRArZJuyHt7OkOaMFCRaK5grdSTZvK2NsBJdi', NULL, NULL, '2022-01-11 11:43:35', 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:39:51', 'พงศ์เพชร มีทรัพย์'),
	(8, 'jasusiri', 3, 1, 2, 1, 'คุณจารุสิริ ผิวเกลี้ยง', 'คุณบิ๊ก', 'ผู้จัดการฝ่ายขาย', NULL, NULL, '$2y$10$wfJS1viO7L8ex8yA.E4WrOzEWcR9v66h35UmRb0Lcv7uDlVOwPVr.', NULL, NULL, NULL, NULL, NULL, '2022-01-11 16:42:18', 'ชลธิสา สมาน', '2022-01-11 16:42:18', NULL),
	(9, 'Niracha', 7, 5, 2, 1, 'Niracha', 'มุก', 'DCO', NULL, NULL, '$2y$10$XaKvsHgRSAeDjqgrcAE8CeCShWg/o1bFIqWlnMhApza9lGlW17HvC', NULL, NULL, 'fDi7i6yNMcEP0yS2rpeMlcLmOAiPIOdNNH8RoAhGpGTjOPM9lfIGI37kd09V', NULL, NULL, '2022-01-11 17:17:32', 'ชลธิสา สมาน', '2022-01-11 17:19:23', 'ชลธิสา สมาน');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.users_control
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

-- Dumping data for table admin_brandexiso.users_control: ~0 rows (approximately)
/*!40000 ALTER TABLE `users_control` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_control` ENABLE KEYS */;

-- Dumping structure for table admin_brandexiso.user_document_group
DROP TABLE IF EXISTS `user_document_group`;
CREATE TABLE IF NOT EXISTS `user_document_group` (
  `udg_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `doc_group_id` int(11) NOT NULL DEFAULT 0,
  `cby` varchar(50) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  PRIMARY KEY (`udg_id`),
  UNIQUE KEY `user_id_doc_group_id` (`user_id`,`doc_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- Dumping data for table admin_brandexiso.user_document_group: ~18 rows (approximately)
/*!40000 ALTER TABLE `user_document_group` DISABLE KEYS */;
INSERT INTO `user_document_group` (`udg_id`, `user_id`, `doc_group_id`, `cby`, `cdate`) VALUES
	(21, 3, 1, 'พงศ์เพชร มีทรัพย์', '2022-01-18 11:26:28'),
	(22, 5, 1, 'พงศ์เพชร มีทรัพย์', '2022-01-18 11:26:28'),
	(23, 7, 1, 'พงศ์เพชร มีทรัพย์', '2022-01-18 11:26:28'),
	(37, 3, 2, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:21:53'),
	(38, 5, 2, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:21:53'),
	(39, 7, 2, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:21:53'),
	(40, 3, 3, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:21:57'),
	(41, 5, 3, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:21:57'),
	(42, 7, 3, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:21:57'),
	(43, 3, 4, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:22:01'),
	(44, 5, 4, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:22:01'),
	(45, 7, 4, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:22:01'),
	(46, 3, 5, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:22:05'),
	(47, 5, 5, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:22:05'),
	(48, 7, 5, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:22:05'),
	(49, 3, 9, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:22:09'),
	(50, 5, 9, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:22:09'),
	(51, 7, 9, 'พงศ์เพชร มีทรัพย์', '2022-01-18 15:22:09');
/*!40000 ALTER TABLE `user_document_group` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
