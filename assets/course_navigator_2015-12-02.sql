# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.9)
# Database: course_navigator
# Generation Time: 2015-12-03 03:50:05 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table additionalmaterial
# ------------------------------------------------------------

DROP TABLE IF EXISTS `additionalmaterial`;

CREATE TABLE `additionalmaterial` (
  `coursenum` int(10) NOT NULL DEFAULT '0',
  `deptcode` int(10) NOT NULL DEFAULT '0',
  `material` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`coursenum`,`deptcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table antireq
# ------------------------------------------------------------

DROP TABLE IF EXISTS `antireq`;

CREATE TABLE `antireq` (
  `precoursenum` int(10) DEFAULT NULL,
  `predeptcode` int(10) DEFAULT NULL,
  `coursenum` int(10) NOT NULL DEFAULT '0',
  `deptcode` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`coursenum`,`deptcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table authors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `name` varchar(120) NOT NULL DEFAULT '',
  `isbn` varchar(120) NOT NULL,
  PRIMARY KEY (`name`,`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;

INSERT INTO `authors` (`name`, `isbn`)
VALUES
	('Elmarsri','978-0136086208'),
	('Gagne','978-1118063330'),
	('Galvin','978-1118063330'),
	('Hetren','978-0132856201'),
	('Kurose','978-0132856201'),
	('Navathe','978-0136086208');

/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table course
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `coursenum` int(10) NOT NULL,
  `deptcode` int(10) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `rating` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`coursenum`,`deptcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table login
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `email` varchar(120) NOT NULL DEFAULT '',
  `password` varchar(120) NOT NULL DEFAULT '',
  `activation_status` set('0','1') DEFAULT '0',
  `usertype` set('Professor','Student','Tutor') DEFAULT NULL,
  `activation_code` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;

INSERT INTO `login` (`email`, `password`, `activation_status`, `usertype`, `activation_code`)
VALUES
	('ctlai95@gmail.com','password','1','Professor','848ae39e7c98375e615806907abd7062');

/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table onlineretailers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `onlineretailers`;

CREATE TABLE `onlineretailers` (
  `url` varchar(240) NOT NULL DEFAULT '',
  `price` decimal(13,2) DEFAULT NULL,
  `isbn` char(14) NOT NULL DEFAULT '',
  PRIMARY KEY (`isbn`,`url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `onlineretailers` WRITE;
/*!40000 ALTER TABLE `onlineretailers` DISABLE KEYS */;

INSERT INTO `onlineretailers` (`url`, `price`, `isbn`)
VALUES
	('http://www.facebook.com',99999999.00,'978-0132856201'),
	('http://www.google.ca',99.00,'978-0132856201'),
	('http://www.textbooks.com/Computer-Networking-6th-Edition/9780132856201/James-F-Kurose.php',160.00,'978-0132856201'),
	('',0.00,'978-1118063330');

/*!40000 ALTER TABLE `onlineretailers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table prereq
# ------------------------------------------------------------

DROP TABLE IF EXISTS `prereq`;

CREATE TABLE `prereq` (
  `anticoursenum` int(10) DEFAULT NULL,
  `antideptcode` int(10) DEFAULT NULL,
  `coursenum` int(10) NOT NULL DEFAULT '0',
  `deptcode` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`coursenum`,`deptcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table professor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `professor`;

CREATE TABLE `professor` (
  `fname` varchar(120) DEFAULT NULL,
  `lname` varchar(120) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `pnumber` varchar(11) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `username` varchar(120) DEFAULT NULL,
  `information` varchar(500) DEFAULT NULL,
  `hours` varchar(120) DEFAULT NULL,
  `picture_location` varchar(100) DEFAULT 'assets/images/profile_default.jpg',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;

INSERT INTO `professor` (`fname`, `lname`, `email`, `pnumber`, `password`, `username`, `information`, `hours`, `picture_location`)
VALUES
	(NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Aubrey','Graham','6god@gmail.com',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Atsuko','Ueda','atsukoueda@gmail.com',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Jon','Pon','caillou@me.ca','4031111111',NULL,NULL,'Don\'t play yourself.','','assets/images/profile_default.jpg'),
	('Chiyembekezo','Petit','chiyembekezopetit@gmail.com',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Tai','Lai','ctlai95@gmail.com','4036159818',NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Tey','Loi','ctlay699@woohoo.co.kr','4034419999',NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Henni','Tranh','hennihenni@uofcool.com','4035555555',NULL,NULL,'Peek a boo!',NULL,'assets/images/profile_default.jpg'),
	('Alvon','Lei','jumpboi23@asus.isis.org','4036493131',NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Charlen','Kow','kchow@kchow.kchow','4034034003',NULL,NULL,NULL,'','assets/images/profile_default.jpg'),
	('Kendrick','Duckworth','kdot@kdot.com',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Mu','Man','muman@gmail.com',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Nelson','Wong','nelson@cpsc.ucalgary.ca','4032108483',NULL,NULL,'I received my PhD in the Computer Science from the University of Saskatchewan in Canada where I worked at the Human-Computer Interaction Lab. My PhD research focused on improving gestural communication in collaborative virtual environments. My other research interests include information visualization and interaction design.','Monday 2-4pm','assets/images/nelsonwong.jpg'),
	('Pauline','Couman','paulinecouman@gmail.com',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Rhino Kick','Denman','rhinokickdenman@gmail.com',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Swagson','Deng','saitamalover@cool.com','4039119111',NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Sam','Jakolin','samjakolin@gmail.com',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Steven','Yoo','stevenyoo@ucalgary.ca',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Vieno','Kruger','vienokruger@gmail.com',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg'),
	('Vina','Magnusson','vinamagnusson@gmail.com',NULL,NULL,NULL,NULL,NULL,'assets/images/profile_default.jpg');

/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table requiredtextbooks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `requiredtextbooks`;

CREATE TABLE `requiredtextbooks` (
  `textbookname` varchar(120) DEFAULT NULL,
  `coursenum` int(10) NOT NULL DEFAULT '0',
  `deptcode` char(4) NOT NULL DEFAULT '0',
  `isbn` char(14) NOT NULL DEFAULT '0',
  PRIMARY KEY (`coursenum`,`deptcode`,`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `requiredtextbooks` WRITE;
/*!40000 ALTER TABLE `requiredtextbooks` DISABLE KEYS */;

INSERT INTO `requiredtextbooks` (`textbookname`, `coursenum`, `deptcode`, `isbn`)
VALUES
	('Computer Networking',101,'AEST','978-0132856201'),
	('Computer Networking',441,'CPSC','978-0132856201'),
	('Computer Networking',696,'HENN','978-0132856201');

/*!40000 ALTER TABLE `requiredtextbooks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table requires
# ------------------------------------------------------------

DROP TABLE IF EXISTS `requires`;

CREATE TABLE `requires` (
  `coursenum` int(10) DEFAULT NULL,
  `deptcode` int(10) DEFAULT NULL,
  `tutoremail` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table student
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `fName` varchar(120) DEFAULT NULL,
  `lName` varchar(120) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) DEFAULT NULL,
  `username` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;

INSERT INTO `student` (`fName`, `lName`, `email`, `password`, `username`)
VALUES
	('Bryson','Ding','bryson1889@gmail.com','lol','bryson189'),
	('Bryson','Ding','bryson189@gmail.com','lol','bryson189'),
	('dasd','dasdasd','dasdasd@gfmacom','fsdfsdfsdf','dasd'),
	('dasd','dasdasd','dasf','dasddas','dasdas');

/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teaches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teaches`;

CREATE TABLE `teaches` (
  `profemail` varchar(120) NOT NULL DEFAULT '',
  `coursenum` int(10) NOT NULL DEFAULT '0',
  `deptcode` char(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`profemail`,`coursenum`,`deptcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `teaches` WRITE;
/*!40000 ALTER TABLE `teaches` DISABLE KEYS */;

INSERT INTO `teaches` (`profemail`, `coursenum`, `deptcode`)
VALUES
	('nelson@cpsc.ucalgary.ca',217,'CPSC'),
	('nelson@cpsc.ucalgary.ca',461,'CPSC'),
	('nelson@cpsc.ucalgary.ca',471,'CPSC');

/*!40000 ALTER TABLE `teaches` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table textbook
# ------------------------------------------------------------

DROP TABLE IF EXISTS `textbook`;

CREATE TABLE `textbook` (
  `name` varchar(120) DEFAULT NULL,
  `isbn` varchar(120) NOT NULL,
  `editionnum` varchar(120) DEFAULT NULL,
  `authors` varchar(120) DEFAULT NULL,
  `picture_location` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `textbook` WRITE;
/*!40000 ALTER TABLE `textbook` DISABLE KEYS */;

INSERT INTO `textbook` (`name`, `isbn`, `editionnum`, `authors`, `picture_location`)
VALUES
	('Computer Networking','978-0132856201','6','',NULL),
	('','978-0136086208','6',NULL,NULL);

/*!40000 ALTER TABLE `textbook` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tutor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tutor`;

CREATE TABLE `tutor` (
  `contactphonenum` varchar(120) DEFAULT NULL,
  `contactemail` varchar(120) NOT NULL,
  `fname` varchar(120) DEFAULT NULL,
  `lname` varchar(120) DEFAULT NULL,
  `rating` varchar(1) DEFAULT NULL,
  `experience` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`contactemail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tutorteaches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tutorteaches`;

CREATE TABLE `tutorteaches` (
  `tutoremail` varchar(120) NOT NULL DEFAULT '',
  `coursenum` int(10) NOT NULL DEFAULT '0',
  `deptcode` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tutoremail`,`coursenum`,`deptcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
