# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.26)
# Database: COURSENAVIGATOR
# Generation Time: 2015-11-28 01:30:03 +0000
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
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL DEFAULT '',
  `usertype` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;

INSERT INTO `login` (`username`, `password`, `usertype`)
VALUES
	('','',''),
	('abc','sex',''),
	('alvinman','liboy','s'),
	('dasdasd','dasdad',''),
	('dasdsa','dasdsad',''),
	('hehe','haha',''),
	('sexyhenry','handsomepotman',''),
	('swagman','pooopboy','');

/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table onlineretailers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `onlineretailers`;

CREATE TABLE `onlineretailers` (
  `url` varchar(240) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  `isbn` int(50) NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;

INSERT INTO `professor` (`fname`, `lname`, `email`, `pnumber`, `password`, `username`)
VALUES
	('tey','loi','ctlay699@woohoo.co.kr','4034419999',NULL,NULL),
	('henni','tranh','hennihenni@uofcool.com','4035555555',NULL,NULL),
	('alvon','lei','jumpboi23@asus.isis.org','4036493131',NULL,NULL),
	('swagson','deng','saitamalover@cool.com','4039119111',NULL,NULL);

/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table requiredtextbooks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `requiredtextbooks`;

CREATE TABLE `requiredtextbooks` (
  `textbookname` varchar(120) DEFAULT NULL,
  `coursenum` int(10) NOT NULL DEFAULT '0',
  `deptcode` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`coursenum`,`deptcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
  `deptcode` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`profemail`,`coursenum`,`deptcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table textbook
# ------------------------------------------------------------

DROP TABLE IF EXISTS `textbook`;

CREATE TABLE `textbook` (
  `name` varchar(120) DEFAULT NULL,
  `isbn` varchar(120) NOT NULL,
  `editionnum` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
