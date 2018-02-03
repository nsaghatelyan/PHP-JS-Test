-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.30-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table mini_cms.article
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_article`),
  KEY `FK_article_users` (`id_user`),
  CONSTRAINT `FK_article_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table mini_cms.article: ~0 rows (approximately)
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`id_article`, `id_user`, `title`, `content`, `create_date`) VALUES
	(1, 1, 'first article', 'article content', '2018-02-03 13:41:15'),
	(2, 2, 'second article', 'article content', '2018-02-03 13:43:19'),
	(3, 1, 'article 3', 'articl 3 content\r\n    ', '2018-02-03 14:21:12'),
	(4, 1, 'article 4', 'article 4 content', '2018-02-03 14:28:14'),
	(7, 2, 'djfhjsdfhjh', 'hfjhddjshj', '2018-02-03 16:41:44');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- Dumping structure for table mini_cms.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table mini_cms.ci_sessions: ~0 rows (approximately)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

-- Dumping structure for table mini_cms.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table mini_cms.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`) VALUES
	(1, 'nsaghatelyan', 'n.saghatelyan@gmail.com', '$2y$10$3z5AHXD2op/wEUOpgOXykOUXfKpchQyXHyAeTuvJ9FQEIl75MVQvi', 'default.jpg', '2018-02-01 23:26:31', NULL, 0, 1, 0),
	(2, 'user', 'user@user.com', '$2y$10$VtMCHPEOUwdgo6Az5KKnMO5UA4jcnt1ujzTzPABTLWVMn2fyfoe0O', 'default.jpg', '2018-02-03 00:35:07', NULL, 0, 0, 0),
	(3, 'testuser', 'test1@test.com', '$2y$10$EkcC9YNG3Kmm1V9IlJz2Q.pozLgAFTgW.BH.tm6xYhIHCfM34WRRy', 'default.jpg', '2018-02-03 14:06:28', NULL, 0, 0, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
