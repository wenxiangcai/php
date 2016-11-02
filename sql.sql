-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `name` varchar(15) DEFAULT NULL,
  `passhash` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('Doggy','94ead625929e6b13e3d3e367932b5f8f'),('1','2');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artifact`
--

DROP TABLE IF EXISTS `artifact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artifact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET gbk DEFAULT NULL,
  `intro` varchar(100) CHARACTER SET gbk DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `type` varchar(100) CHARACTER SET gbk NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artifact`
--

LOCK TABLES `artifact` WRITE;
/*!40000 ALTER TABLE `artifact` DISABLE KEYS */;
INSERT INTO `artifact` VALUES (4,'procdump','获得hash，利用mimikatz可得到明文密码','http://k1p4ss.sinaapp.com/?p=145','hash'),(5,'ms16-014','提权可用','https://www.t00ls.net/thread-35179-8-1.html','提权'),(6,'weblogic解密','进行weblogic的解密操作','https://www.t00ls.net/thread-34434-1-1.html','hash'),(7,'IntruderPaylaods','一些爆破字典(密码,用户名,目录)','https://github.com/1N3/IntruderPayloads/','字典'),(9,'代理总结','各种代理工具的用法与介绍','https://www.t00ls.net/thread-35614-1-1.html','内网'),(10,'php安全','周到的php安全见解,值得多看几次','https://www.leavesongs.com/PENETRATION/php-secure.html','web'),(11,'linux转发','linux内网转发的各种姿势','https://www.t00ls.net/viewthread.php?tid=31461','内网'),(12,'xss宝典','对于xss的各种payload以及绕过介绍的比较详细','https://github.com/l3m0n/XSS-Filter-Evasion-Cheat-Sheet-CN','web'),(13,'子域名获取','子域名获取的常用技巧以及工具','https://www.t00ls.net/thread-36346-1-1.html','web'),(14,'脏牛0day','可以绕过权限对可读文件进行写入操作,影响范围巨大','http://www.freebuf.com/vuls/117331.html','提权'),(15,'弱口令字典收集','各个大佬收集的弱口令字典','https://www.t00ls.net/viewthread.php?tid=32232&extra=&highlight=%E5%AD%97%E5%85%B8&page=1','字典'),(16,'writeup','i春秋论坛各类ctf的writeup','http://bbs.ichunqiu.com/search.php?mod=forum&searchid=314&orderby=lastpost&ascdesc=desc&searchsubmit','ctf'),(17,'xss绕过','针对waf过滤常见的绕过方法','https://www.t00ls.net/thread-36438-1-1.html','web'),(18,'Linux提权','Linux提权方法总结','http://www.91ri.org/16398.html','提权'),(35,'hashhat','Linux hash暴力破解','http://xiao106347.blog.163.com/blog/static/215992078201451082547241/','hash'),(36,'c段中间件扫描器','根据特征网页访问c段80,8080端口，获得banner并生成html报告','https://www.t00ls.net/thread-36558-1-1.html','web');
/*!40000 ALTER TABLE `artifact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,'Doggy');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test2`
--

DROP TABLE IF EXISTS `test2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test2` (
  `name` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test2`
--

LOCK TABLES `test2` WRITE;
/*!40000 ALTER TABLE `test2` DISABLE KEYS */;
INSERT INTO `test2` VALUES ('zhang',0),('zhan',0);
/*!40000 ALTER TABLE `test2` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-02 14:42:52
