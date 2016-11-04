-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: exercise
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `battle_record`
--

DROP TABLE IF EXISTS `battle_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `battle_record` (
  `battle_record_numb` int(11) NOT NULL AUTO_INCREMENT COMMENT '인덱스',
  `user_numb` int(11) NOT NULL COMMENT '회원 번호',
  `fuser_numb` int(11) NOT NULL COMMENT '친구 회원 번호',
  `start_date` date NOT NULL COMMENT '시작 날짜',
  `end_date` date NOT NULL COMMENT '종료 날짜',
  `result` tinyint(4) NOT NULL COMMENT '결과',
  PRIMARY KEY (`battle_record_numb`,`user_numb`,`fuser_numb`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `battle_record`
--

LOCK TABLES `battle_record` WRITE;
/*!40000 ALTER TABLE `battle_record` DISABLE KEYS */;
INSERT INTO `battle_record` VALUES (11,4,3,'2016-04-21','2016-04-24',3),(12,3,4,'2016-04-21','2016-04-24',3),(13,2,1,'2016-04-23','2016-04-25',1),(14,1,2,'2016-04-23','2016-04-25',2);
/*!40000 ALTER TABLE `battle_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board` (
  `article_numb` int(11) NOT NULL AUTO_INCREMENT COMMENT '인덱스',
  `user_numb` int(11) DEFAULT NULL,
  `board_category` int(11) NOT NULL COMMENT '카테고리',
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '글 제목',
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT '글 내용',
  PRIMARY KEY (`article_numb`),
  KEY `user_numb` (`user_numb`),
  CONSTRAINT `board_ibfk_1` FOREIGN KEY (`user_numb`) REFERENCES `user` (`user_numb`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (17,1,1,'ㅎㅎㅎㅎ 다이어트 성공!!!!',''),(18,2,2,'어깨를 키우고 싶은데 어떤 운동을 해야하나요?',''),(19,3,1,'덤벨 시 주의사항',''),(20,4,2,'ㅠㅠㅠ 도와주세요','');
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `challenge_complete_list`
--

DROP TABLE IF EXISTS `challenge_complete_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `challenge_complete_list` (
  `challenge_numb` int(11) NOT NULL COMMENT '도전 과제 번호',
  `user_numb` int(11) NOT NULL COMMENT '회원 번호',
  `clear_date` date NOT NULL COMMENT '완료 날짜',
  PRIMARY KEY (`challenge_numb`,`user_numb`),
  KEY `user_numb` (`user_numb`),
  CONSTRAINT `challenge_complete_list_ibfk_1` FOREIGN KEY (`challenge_numb`) REFERENCES `challenge_list` (`challenge_numb`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `challenge_complete_list_ibfk_2` FOREIGN KEY (`user_numb`) REFERENCES `user` (`user_numb`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `challenge_complete_list`
--

LOCK TABLES `challenge_complete_list` WRITE;
/*!40000 ALTER TABLE `challenge_complete_list` DISABLE KEYS */;
INSERT INTO `challenge_complete_list` VALUES (1,2,'2016-04-20'),(2,1,'2016-04-23'),(2,2,'2016-05-24'),(3,2,'2016-05-26'),(3,3,'2016-04-21'),(4,4,'2016-04-22');
/*!40000 ALTER TABLE `challenge_complete_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `challenge_list`
--

DROP TABLE IF EXISTS `challenge_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `challenge_list` (
  `challenge_numb` int(11) NOT NULL COMMENT '도전 과제 번호',
  `challenge_title` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '도전 과제 제목',
  `challenge_condition` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT '도전 과제 조건',
  PRIMARY KEY (`challenge_numb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `challenge_list`
--

LOCK TABLES `challenge_list` WRITE;
/*!40000 ALTER TABLE `challenge_list` DISABLE KEYS */;
INSERT INTO `challenge_list` VALUES (1,'',''),(2,'',''),(3,'',''),(4,'','');
/*!40000 ALTER TABLE `challenge_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `check_point`
--

DROP TABLE IF EXISTS `check_point`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `check_point` (
  `check_point_index` int(11) NOT NULL AUTO_INCREMENT,
  `point_numb` int(11) DEFAULT NULL,
  `exercise_numb` int(11) DEFAULT NULL,
  `position_check` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`check_point_index`),
  KEY `check_point___fk` (`exercise_numb`),
  KEY `check_point_J___fk` (`exercise_numb`),
  CONSTRAINT `check_point___fk` FOREIGN KEY (`exercise_numb`) REFERENCES `exercise_info` (`exercise_numb`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_point`
--

LOCK TABLES `check_point` WRITE;
/*!40000 ALTER TABLE `check_point` DISABLE KEYS */;
INSERT INTO `check_point` VALUES (1,0,2,'왼쪽 팔이 앞으로 나왔습니다.'),(2,1,2,'오른쪽 팔이 앞으로 나왔습니다.'),(3,2,4,'오른쪽 손목이 앞으로 나왔습니다.'),(4,3,4,'오른쪽 손목이 앞으로 나왔습니다.'),(5,0,3,'왼쪽 팔이 앞으로 나왔습니다.'),(6,1,3,'오른쪽 팔이 앞으로 나왔습니다.'),(7,2,4,'왼쪽 손목이 앞으로 나왔습니다.'),(8,3,4,'오른쪽 손목이 앞으로 나왔습니다.'),(9,4,1,'무릎이 너무 앞으로 나왔습니다.'),(10,6,1,'다리를 너무 벌렸습니다.'),(11,5,1,'상체를 너무 숙였습니다.'),(12,0,4,'왼쪽 팔을 실수 했습니다.'),(13,1,4,'오른쪽 팔을 실수 했습니다.'),(14,0,4,'왼쪽 팔을 실수 했습니다.'),(15,1,4,'오른쪽 팔을 실수 했습니다.');
/*!40000 ALTER TABLE `check_point` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `check_point_j`
--

DROP TABLE IF EXISTS `check_point_j`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `check_point_j` (
  `check_point_index` int(11) NOT NULL AUTO_INCREMENT,
  `point_numb` int(11) DEFAULT NULL,
  `exercise_numb` int(11) DEFAULT NULL,
  `position_check` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`check_point_index`),
  KEY `exercise_numb` (`exercise_numb`),
  CONSTRAINT `check_point_j_ibfk_1` FOREIGN KEY (`exercise_numb`) REFERENCES `exercise_info` (`exercise_numb`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_point_j`
--

LOCK TABLES `check_point_j` WRITE;
/*!40000 ALTER TABLE `check_point_j` DISABLE KEYS */;
INSERT INTO `check_point_j` VALUES (1,0,2,'左腕が前に出ました'),(2,1,2,'右腕が前に出ました'),(3,2,4,'右腕が前に出ました'),(4,3,4,'右腕が前に出ました'),(5,0,3,'左腕が前に出ました'),(6,1,3,'右腕が前に出ました'),(7,2,4,'左腕が前に出ました'),(8,3,4,'右腕が前に出ました\n'),(9,4,1,NULL),(10,6,1,NULL),(11,5,1,NULL),(12,0,4,NULL),(13,1,4,NULL),(14,0,4,NULL),(15,1,4,NULL);
/*!40000 ALTER TABLE `check_point_j` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_info`
--

DROP TABLE IF EXISTS `exercise_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_info` (
  `exercise_numb` int(11) NOT NULL AUTO_INCREMENT COMMENT '운동 번호',
  `exercise_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '운동 이름',
  `exercise_info` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `exercise_point_numb` int(11) NOT NULL COMMENT '운동 부위 번호',
  `kinematic_coefficient` float DEFAULT NULL,
  PRIMARY KEY (`exercise_numb`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_info`
--

LOCK TABLES `exercise_info` WRITE;
/*!40000 ALTER TABLE `exercise_info` DISABLE KEYS */;
INSERT INTO `exercise_info` VALUES (1,'스쿼트','스쿼트는 하체운동 중에서도 가장 에너지를 많이 소비하는 운동이라 체지방 감소에도 효과가 큰 운동입니다.\n잘 발달된 대퇴부 근육과 둔근은 순간적인 운동능력을 뿜어내는 데에 핵심적 요소로 작용합니다. \n스쿼트 훈련을 통해 하체 근력 발달은 물론이고, 대퇴근육이 발달하면서 왕성한 테스토스테론 분비 효과도 얻을 수 있습니다.\n허리나 코어 근육은 물론 승모근 발달에도 도움이 되며 심지어 흉곽에도 자극도 주므로 전신 운동이라고 생각하셔도 무방합니다.',2,1.84),(2,'덤벨 숄더 프레스','덤벨 숄더 프레스는 덤벨로 실시하는 오버헤드 프레스 운동으로 바벨보다 넓은 가동 범위가 형성되고\n주변의 다양한 근육들의 조화로운 협응 능력과 균형 조절 능력을 발달시킬 수 있는 운동 입니다.\n가동 범위가 넓고, 운동 효과가 확실한 만큼 자세의 엄격함이 보다 중요해지게 되므로 자세가 흐트러질 정도로 무거운 중량을 사용하지 말고, 적정 중량을 이용하셔야 합니다.',1,2.1),(3,'사이드 레터럴 레이즈','사이드 레터럴 레이즈는 삼각근의 선명도를 높일 수 있는 \n단관절 운동 중 측면 삼각근을 발달시키기 위한 운동입니다.\n프레스 동작과 달리 자극시키는 근육의 범위를 제한할 수 있고, \n목표 부위 수축에 집중할 수 있다는 장점이 있습니다.\n낮은 저항에 반응하는 근섬유들을 자극하기 위해 저중량, 고반복으로 \n실시해주는게 좋습니다.',1,2.2),(4,'런지','런지는 대둔근 킬러라고 불리는 운동이며, 강력한 힙 조인트를 만드는데 있어 유용합니다.\n런지는 단순히 근육을 발달시키는 효과 뿐만 아니라 다양한 근육의 협응 능력, 균형 조절 능력,\n운동신경계의 발달에도 효과전인 운동입니다. 그리고 런지는 다리의 매끄러운 맵시를 살릴수 있고,\n라인을 살릴 수 있게 만들 수 있는 운동 방법입니다.',2,1.83);
/*!40000 ALTER TABLE `exercise_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_info_j`
--

DROP TABLE IF EXISTS `exercise_info_j`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_info_j` (
  `exercise_numb` int(11) NOT NULL AUTO_INCREMENT,
  `exercise_name` varchar(45) NOT NULL,
  `exercise_info` varchar(400) NOT NULL,
  `exercise_point_numb` int(11) NOT NULL,
  `kinematic_coefficient` double DEFAULT NULL,
  PRIMARY KEY (`exercise_numb`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_info_j`
--

LOCK TABLES `exercise_info_j` WRITE;
/*!40000 ALTER TABLE `exercise_info_j` DISABLE KEYS */;
INSERT INTO `exercise_info_j` VALUES (1,'スクワット','スクワットは、下半身運動の中でも最もエネルギーを多く消費するので、体脂肪減少にも効果が高いです。\nよく発達した太ももとお尻の筋肉は、瞬間的な運動能力を発揮するのに核心的な要素として作用します。 \nスクワット訓練を通じて下半身の筋力の発達はもちろん、太ももの筋肉が発達し、 テストステロンの旺盛な分泌効果も得られます。\n腰やコアの筋肉はもちろん、背中の筋肉の発達にも役にたつし、胸郭にも刺激を与えるので、全身運動だと思ってもいいです。',2,1.84),(2,'ダンベル・ショルダープレス','ダンベル・ショルダープレスはダンベルで行うオーバーヘッド・プレス運動で、バーベルより動きに制限がないので関節などの可動範囲が広くなり、肩回りの筋肉の連動能力やバランス調節能力を発達させることができます。\n可動範囲が広く、運動効果が確実なだけに、正しい姿勢がより重要になるのでそのために無理に重いものを使わず、姿勢に適切な重さのものをお使いください。',1,2.1),(3,'サイドラテラル・レイズ','サイドラテラル・レイズは三角筋の鮮明度を高めることのできる \n短関節運動の中で、側面三角筋を鍛えられる運動です。\nプレス動作とは違って、刺激する筋肉の範囲を制限することができるし、、 \n目標部位の収縮に集中できるという長所があります。\n低い抵抗に反応する筋繊維を刺激するために、低重量、高反復で \n行ってください。',1,2.2),(4,'ランジ','ランジは大臀根・キラーと呼ばれる運動であり、強力なヒップジョイントを作る上で有用です。\nランジは、単に筋肉を発達させる効果だけでなく、様々な筋肉の能力、バランス調整能力、運動神経系の発達にも効果的な運動です。 そしてランジは滑らかなレッグラインを作ることができます。',2,1.83);
/*!40000 ALTER TABLE `exercise_info_j` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_movie_info`
--

DROP TABLE IF EXISTS `exercise_movie_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_movie_info` (
  `exercise_numb` int(11) NOT NULL COMMENT '운동 번호',
  `movie_order` int(11) NOT NULL COMMENT '동영상 순서',
  `movie_path` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT '동영상 경로',
  PRIMARY KEY (`exercise_numb`,`movie_order`),
  CONSTRAINT `exercise_movie_info_ibfk_1` FOREIGN KEY (`exercise_numb`) REFERENCES `exercise_info` (`exercise_numb`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_movie_info`
--

LOCK TABLES `exercise_movie_info` WRITE;
/*!40000 ALTER TABLE `exercise_movie_info` DISABLE KEYS */;
INSERT INTO `exercise_movie_info` VALUES (1,1,'/public/video/exercise/squt.mp4'),(2,2,'/public/video/exercise/dumbel.mp4'),(3,3,'/public/video/exercise/side.mp4'),(4,4,'/public/video/exercise/lunge.mp4');
/*!40000 ALTER TABLE `exercise_movie_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_order`
--

DROP TABLE IF EXISTS `exercise_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_order` (
  `routine_list_index` int(11) NOT NULL,
  `numb_set_index` int(11) NOT NULL,
  `exercise_order` int(11) NOT NULL,
  PRIMARY KEY (`routine_list_index`,`numb_set_index`),
  CONSTRAINT `exercise_order_ibfk_1` FOREIGN KEY (`routine_list_index`) REFERENCES `routine_list` (`routine_list_index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_order`
--

LOCK TABLES `exercise_order` WRITE;
/*!40000 ALTER TABLE `exercise_order` DISABLE KEYS */;
INSERT INTO `exercise_order` VALUES (1,2,2),(1,3,1),(2,1,2),(2,2,1),(2,3,3),(3,2,2),(3,4,1),(4,2,1),(4,3,2),(5,2,1),(5,3,2),(5,4,3),(6,1,1),(6,3,2),(6,5,3),(7,1,2),(7,5,1),(8,6,1),(8,7,2),(9,8,1),(9,9,2),(10,10,1);
/*!40000 ALTER TABLE `exercise_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_point`
--

DROP TABLE IF EXISTS `exercise_point`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_point` (
  `exercise_point_numb` int(11) NOT NULL AUTO_INCREMENT COMMENT '운동 부위 번호',
  `exercise_point_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '운동 부위 이름',
  PRIMARY KEY (`exercise_point_numb`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_point`
--

LOCK TABLES `exercise_point` WRITE;
/*!40000 ALTER TABLE `exercise_point` DISABLE KEYS */;
INSERT INTO `exercise_point` VALUES (0,'허벅지'),(1,'어깨');
/*!40000 ALTER TABLE `exercise_point` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_point_j`
--

DROP TABLE IF EXISTS `exercise_point_j`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_point_j` (
  `exercise_point_numb` int(11) NOT NULL AUTO_INCREMENT,
  `exercise_point_name` varchar(45) NOT NULL,
  PRIMARY KEY (`exercise_point_numb`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_point_j`
--

LOCK TABLES `exercise_point_j` WRITE;
/*!40000 ALTER TABLE `exercise_point_j` DISABLE KEYS */;
INSERT INTO `exercise_point_j` VALUES (0,'太もも'),(1,'肩');
/*!40000 ALTER TABLE `exercise_point_j` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_record`
--

DROP TABLE IF EXISTS `exercise_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_record` (
  `ex_record_numb` int(11) NOT NULL AUTO_INCREMENT,
  `user_numb` int(11) NOT NULL COMMENT '회원번호',
  `exercise_numb` int(11) NOT NULL COMMENT '운동번호',
  `target_count` int(11) NOT NULL COMMENT '목표 운동 횟수',
  `clear_count` int(11) NOT NULL COMMENT '수행 운동 횟수',
  `exercise_date` date NOT NULL COMMENT '운동 날짜',
  PRIMARY KEY (`ex_record_numb`,`user_numb`,`exercise_numb`),
  KEY `exercise_numb` (`exercise_numb`),
  KEY `user_numb` (`user_numb`),
  CONSTRAINT `exercise_record_ibfk_1` FOREIGN KEY (`user_numb`) REFERENCES `user` (`user_numb`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `exercise_record_ibfk_2` FOREIGN KEY (`exercise_numb`) REFERENCES `exercise_info` (`exercise_numb`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=720 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_record`
--

LOCK TABLES `exercise_record` WRITE;
/*!40000 ALTER TABLE `exercise_record` DISABLE KEYS */;
INSERT INTO `exercise_record` VALUES (48,2,3,30,30,'2016-05-29'),(49,2,2,30,30,'2016-05-29'),(50,2,2,30,25,'2016-05-31'),(51,2,3,30,25,'2016-05-31'),(58,2,2,30,28,'2016-05-30'),(59,2,1,20,20,'2016-05-30'),(60,2,3,30,30,'2016-05-30'),(308,2,2,10,8,'2016-07-11'),(309,2,2,30,30,'2016-07-13'),(310,2,3,6,6,'2016-07-11'),(311,2,3,30,30,'2016-07-13'),(313,2,2,30,30,'2016-07-08'),(315,2,3,30,20,'2016-07-08'),(317,2,4,40,40,'2016-07-08'),(318,2,2,30,30,'2016-07-29'),(320,2,3,30,10,'2016-07-29'),(322,2,2,30,10,'2016-07-01'),(324,2,3,30,30,'2016-07-01'),(326,2,2,30,30,'2016-07-04'),(327,2,2,30,30,'2016-07-14'),(328,2,2,30,30,'0000-00-00'),(329,2,3,30,30,'2016-07-04'),(330,2,3,30,30,'2016-07-14'),(331,2,3,30,30,'0000-00-00'),(332,2,4,40,35,'2016-07-04'),(333,2,4,40,38,'2016-07-14'),(334,2,4,40,36,'0000-00-00'),(335,2,2,30,30,'2016-08-11'),(336,2,2,30,30,'2016-08-10'),(337,2,2,30,30,'2016-08-12'),(338,2,3,30,28,'0000-00-00'),(339,2,3,30,28,'2016-08-10'),(340,2,3,30,30,'2016-08-12'),(345,2,3,30,30,'2016-08-15'),(346,3,2,30,26,'2016-08-17'),(347,3,3,30,27,'2016-08-19'),(348,2,2,30,25,'2016-08-15'),(349,3,2,30,30,'2016-08-17'),(350,3,2,30,30,'2016-08-19'),(351,3,2,30,25,'2016-08-22'),(352,3,2,30,30,'2016-08-24'),(353,3,2,30,20,'2016-05-26'),(354,3,3,30,30,'2016-08-22'),(355,3,3,30,30,'2016-08-24'),(356,3,3,30,20,'2016-05-26'),(459,2,2,10,20,'2016-06-20'),(460,2,3,6,12,'2016-06-20'),(461,2,2,30,0,'2016-06-13'),(462,2,2,30,0,'2016-06-06'),(463,2,3,30,0,'2016-06-13'),(464,2,3,30,0,'2016-06-06'),(465,2,4,40,0,'2016-06-13'),(466,2,4,40,0,'2016-06-06'),(467,2,4,40,0,'2016-06-10'),(468,2,4,40,0,'2016-06-17'),(469,2,2,30,0,'2016-06-10'),(470,2,2,30,0,'2016-06-17'),(471,2,2,30,0,'2016-06-15'),(472,2,3,30,0,'2016-06-15'),(473,2,2,10,10,'2016-06-21'),(474,2,3,6,6,'2016-06-21'),(475,2,2,10,34,'2016-06-22'),(476,2,3,6,18,'2016-06-22'),(477,2,2,10,32,'2016-06-23'),(478,2,3,6,18,'2016-06-23'),(479,2,2,10,10,'2016-06-16'),(480,2,3,6,6,'2016-06-16'),(481,2,2,10,10,'2016-06-29'),(482,2,3,6,0,'2016-06-29'),(487,2,2,10,10,'2016-07-07'),(488,2,3,6,7,'2016-07-07'),(489,2,2,10,11,'2016-07-09'),(490,2,3,6,4,'2016-07-09'),(491,2,2,10,10,'2016-07-10'),(492,2,3,6,4,'2016-07-10'),(493,2,2,10,10,'2016-07-12'),(494,2,3,6,6,'2016-07-12'),(499,2,2,10,0,'2016-07-16'),(500,2,3,6,6,'2016-07-16'),(501,2,2,10,10,'2016-07-18'),(502,2,3,6,6,'2016-07-18'),(505,2,2,9,9,'2016-07-20'),(506,2,3,15,15,'2016-07-20'),(507,2,2,10,10,'2016-07-21'),(508,2,3,6,6,'2016-07-21'),(509,2,2,10,10,'2016-07-23'),(510,2,3,6,6,'2016-07-23'),(511,2,2,10,10,'2016-07-22'),(512,2,3,6,6,'2016-07-22'),(537,2,2,10,10,'2016-07-28'),(538,2,3,6,6,'2016-07-28'),(566,2,2,6,6,'2016-07-05'),(567,2,3,2,2,'2016-07-05'),(576,2,2,10,10,'2016-07-27'),(577,2,3,15,15,'2016-07-27'),(578,2,2,6,6,'2016-07-25'),(579,2,3,16,16,'2016-07-25'),(580,2,2,6,6,'2016-07-24'),(581,2,3,6,6,'2016-07-24'),(583,2,2,10,0,'2016-07-26'),(584,2,3,6,6,'2016-07-26'),(585,2,2,10,10,'2016-07-30'),(586,2,3,6,6,'2016-07-30'),(587,2,2,10,10,'2016-08-01'),(588,2,3,6,6,'2016-08-01'),(589,2,2,10,10,'2016-08-16'),(590,2,3,6,6,'2016-08-16'),(591,2,2,10,10,'2016-08-02'),(592,2,3,6,6,'2016-08-02'),(593,2,2,10,10,'2016-08-03'),(594,2,3,6,6,'2016-08-03'),(595,2,2,10,10,'2016-08-04'),(596,2,3,6,6,'2016-08-04'),(597,2,2,10,10,'2016-08-05'),(598,2,3,6,4,'2016-08-05'),(599,2,2,10,5,'2016-08-08'),(600,2,3,6,0,'2016-08-08'),(601,2,2,10,10,'2016-08-09'),(602,2,3,6,6,'2016-08-09'),(603,2,2,10,10,'2016-08-14'),(604,2,3,6,6,'2016-08-14'),(605,2,2,10,2,'2016-08-17'),(606,2,3,6,0,'2016-08-17'),(607,2,2,10,10,'2016-08-20'),(608,2,3,6,6,'2016-08-20'),(609,2,2,10,8,'2016-08-25'),(610,2,2,10,10,'2016-08-26'),(611,2,3,6,6,'2016-08-25'),(612,2,3,6,6,'2016-08-26'),(613,2,2,10,10,'2016-08-21'),(614,2,2,10,10,'2016-08-19'),(615,2,3,6,6,'2016-08-21'),(616,2,3,6,4,'2016-08-19'),(617,2,2,10,3,'2016-08-28'),(618,2,3,6,6,'2016-08-28'),(619,2,2,10,0,'2016-08-29'),(620,2,2,10,10,'2016-08-30'),(621,2,3,6,6,'2016-08-29'),(622,2,3,6,6,'2016-08-30'),(633,2,2,10,10,'2016-09-19'),(634,2,3,6,6,'2016-09-19'),(637,2,2,10,10,'2016-09-21'),(638,2,3,6,6,'2016-09-21'),(645,2,2,30,30,'2016-09-30'),(650,2,3,30,30,'2016-09-30'),(655,2,4,40,0,'2016-09-30'),(663,2,2,30,30,'2016-09-26'),(665,2,3,30,30,'2016-09-26'),(666,2,2,10,10,'2016-09-23'),(667,2,3,6,6,'2016-09-23'),(668,2,2,10,10,'2016-09-28'),(669,2,3,6,6,'2016-09-28'),(670,2,2,10,0,'2016-10-03'),(671,2,3,6,0,'2016-10-03'),(674,2,2,5,5,'2016-10-10'),(675,2,3,5,5,'2016-10-10'),(684,2,2,5,0,'2016-10-20'),(685,2,3,5,0,'2016-10-20'),(686,2,2,5,0,'2016-10-22'),(687,2,3,5,0,'2016-10-22'),(688,2,2,5,0,'2016-10-14'),(689,2,3,5,0,'2016-10-14'),(698,2,2,5,5,'2016-10-12'),(699,2,3,5,5,'2016-10-12'),(702,2,2,5,5,'2016-10-18'),(703,2,3,5,5,'2016-10-18'),(708,2,2,5,5,'2016-10-19'),(709,2,3,5,5,'2016-10-19'),(714,2,2,5,5,'2016-10-24'),(715,2,3,5,5,'2016-10-24'),(716,2,2,5,5,'2016-11-01'),(717,2,3,5,5,'2016-11-01'),(718,2,2,5,5,'2016-11-02'),(719,2,3,5,5,'2016-11-02');
/*!40000 ALTER TABLE `exercise_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_repeat_numb`
--

DROP TABLE IF EXISTS `exercise_repeat_numb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_repeat_numb` (
  `numb_set_index` int(11) NOT NULL AUTO_INCREMENT COMMENT '횟수 설정 인덱스',
  `exercise_numb` int(11) NOT NULL COMMENT '운동 번호',
  `number_of_set` int(11) NOT NULL COMMENT '세트 수',
  `number_of_count` int(11) NOT NULL COMMENT '1세트 당 횟수',
  PRIMARY KEY (`numb_set_index`,`exercise_numb`),
  KEY `exercise_numb` (`exercise_numb`),
  CONSTRAINT `exercise_repeat_numb_ibfk_1` FOREIGN KEY (`exercise_numb`) REFERENCES `exercise_info` (`exercise_numb`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_repeat_numb`
--

LOCK TABLES `exercise_repeat_numb` WRITE;
/*!40000 ALTER TABLE `exercise_repeat_numb` DISABLE KEYS */;
INSERT INTO `exercise_repeat_numb` VALUES (1,1,2,10),(2,2,3,10),(3,3,3,10),(4,4,2,20),(5,4,3,15),(6,2,1,5),(7,3,1,5),(8,2,1,5),(9,3,1,5),(10,2,5,16),(11,3,0,0);
/*!40000 ALTER TABLE `exercise_repeat_numb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `f_index` int(11) NOT NULL AUTO_INCREMENT COMMENT '인덱스',
  `user_numb` int(11) NOT NULL COMMENT '회원 번호',
  `fuser_numb` int(11) NOT NULL COMMENT '친구 회원 번호',
  PRIMARY KEY (`f_index`,`user_numb`),
  KEY `user_numb` (`user_numb`),
  CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_numb`) REFERENCES `user` (`user_numb`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (13,1,2),(14,2,1),(15,3,4),(16,4,3);
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kcal`
--

DROP TABLE IF EXISTS `kcal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kcal` (
  `user_numb` int(11) NOT NULL,
  `kcal` int(11) NOT NULL,
  `kcal_date` date NOT NULL,
  PRIMARY KEY (`user_numb`,`kcal_date`),
  CONSTRAINT `kcal_ibfk_1` FOREIGN KEY (`user_numb`) REFERENCES `user` (`user_numb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kcal`
--

LOCK TABLES `kcal` WRITE;
/*!40000 ALTER TABLE `kcal` DISABLE KEYS */;
INSERT INTO `kcal` VALUES (2,200,'2016-07-11'),(2,100,'2016-07-13'),(2,6,'2016-07-20'),(2,13,'2016-07-21'),(2,9,'2016-07-22'),(2,5,'2016-07-24'),(2,16,'2016-08-17'),(2,17,'2016-08-20'),(2,30,'2016-09-07'),(2,16,'2016-09-11'),(2,29,'2016-09-18'),(2,15,'2016-09-19'),(2,15,'2016-09-20'),(2,14,'2016-09-21'),(2,22,'2016-09-22'),(2,15,'2016-09-23'),(2,5,'2016-09-28'),(2,40,'2016-09-30'),(2,14,'2016-10-10'),(2,13,'2016-10-11'),(2,14,'2016-10-12'),(2,10,'2016-10-18'),(2,13,'2016-10-19'),(2,13,'2016-10-24'),(2,10,'2016-11-01'),(2,13,'2016-11-02');
/*!40000 ALTER TABLE `kcal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pic`
--

DROP TABLE IF EXISTS `pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pic` (
  `pic_numb` int(11) NOT NULL AUTO_INCREMENT COMMENT '인덱스',
  `user_numb` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '회원 번호',
  `pic_path` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '사진 경로',
  `shoot_date` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '촬영 날짜',
  PRIMARY KEY (`pic_numb`,`user_numb`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pic`
--

LOCK TABLES `pic` WRITE;
/*!40000 ALTER TABLE `pic` DISABLE KEYS */;
INSERT INTO `pic` VALUES (11,'1','pic_path 1','2016-04-24'),(12,'2','pic_path 2','2016-04-25'),(13,'3','pic_path 3','2016-04-23'),(14,'4','pic_path 4','2016-04-22');
/*!40000 ALTER TABLE `pic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rank`
--

DROP TABLE IF EXISTS `rank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rank` (
  `exercise_numb` int(11) NOT NULL COMMENT '운동 번호',
  `user_numb` int(11) NOT NULL COMMENT '회원번호',
  `rank` int(11) NOT NULL COMMENT '랭킹',
  PRIMARY KEY (`exercise_numb`,`user_numb`),
  KEY `user_numb` (`user_numb`),
  CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`exercise_numb`) REFERENCES `exercise_info` (`exercise_numb`),
  CONSTRAINT `rank_ibfk_2` FOREIGN KEY (`user_numb`) REFERENCES `user` (`user_numb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rank`
--

LOCK TABLES `rank` WRITE;
/*!40000 ALTER TABLE `rank` DISABLE KEYS */;
INSERT INTO `rank` VALUES (1,1,20),(2,2,17),(3,3,5);
/*!40000 ALTER TABLE `rank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routine_info`
--

DROP TABLE IF EXISTS `routine_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `routine_info` (
  `routine_list_index` int(11) NOT NULL AUTO_INCREMENT COMMENT '루틴 리스트 인덱스',
  `diffculty` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '난이도',
  `routine_category` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '카테고리',
  PRIMARY KEY (`routine_list_index`),
  CONSTRAINT `routine_info_ibfk_1` FOREIGN KEY (`routine_list_index`) REFERENCES `routine_list` (`routine_list_index`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routine_info`
--

LOCK TABLES `routine_info` WRITE;
/*!40000 ALTER TABLE `routine_info` DISABLE KEYS */;
INSERT INTO `routine_info` VALUES (1,'상','어깨'),(2,'하','허벅지'),(3,'하','어깨'),(4,'중','어깨'),(5,'중','허벅지'),(6,'상','허벅지'),(7,'상','어깨'),(8,'하','어깨');
/*!40000 ALTER TABLE `routine_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routine_info_j`
--

DROP TABLE IF EXISTS `routine_info_j`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `routine_info_j` (
  `routine_list_index` int(11) NOT NULL AUTO_INCREMENT,
  `diffculty` varchar(45) NOT NULL,
  `routine_category` varchar(45) NOT NULL,
  PRIMARY KEY (`routine_list_index`),
  CONSTRAINT `routine_info_j_ibfk_1` FOREIGN KEY (`routine_list_index`) REFERENCES `routine_list_j` (`routine_list_index`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routine_info_j`
--

LOCK TABLES `routine_info_j` WRITE;
/*!40000 ALTER TABLE `routine_info_j` DISABLE KEYS */;
INSERT INTO `routine_info_j` VALUES (1,'上','肩'),(2,'下','太もも'),(3,'下','肩'),(4,'中','肩'),(5,'中','太もも'),(6,'上','太もも'),(7,'上','かた'),(8,'下','肩');
/*!40000 ALTER TABLE `routine_info_j` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routine_list`
--

DROP TABLE IF EXISTS `routine_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `routine_list` (
  `routine_list_index` int(11) NOT NULL AUTO_INCREMENT COMMENT '루틴 리스트 인덱스',
  `routine_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '루틴 이름',
  PRIMARY KEY (`routine_list_index`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routine_list`
--

LOCK TABLES `routine_list` WRITE;
/*!40000 ALTER TABLE `routine_list` DISABLE KEYS */;
INSERT INTO `routine_list` VALUES (1,'어깨(상급자)'),(2,'허벅지(초심자)'),(3,'어깨(초심자)'),(4,'어깨(중급자)'),(5,'허벅지(중급자)'),(6,'허벅지(고급자)'),(7,'어깨(상급자2)'),(8,'어깨(테스트)'),(9,'테스트1'),(10,'테스트2'),(11,'테스트3');
/*!40000 ALTER TABLE `routine_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routine_list_j`
--

DROP TABLE IF EXISTS `routine_list_j`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `routine_list_j` (
  `routine_list_index` int(11) NOT NULL AUTO_INCREMENT,
  `routine_name` varchar(45) NOT NULL,
  PRIMARY KEY (`routine_list_index`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routine_list_j`
--

LOCK TABLES `routine_list_j` WRITE;
/*!40000 ALTER TABLE `routine_list_j` DISABLE KEYS */;
INSERT INTO `routine_list_j` VALUES (1,'肩（上級者）'),(2,'太もも（下級者）'),(3,'肩（下級者）'),(4,'肩（中級者）'),(5,'太もも（中級者）'),(6,'太もも（上級者）'),(7,'肩（上級者）'),(8,'肩（初心者）'),(9,'テスト1'),(10,'テスト2'),(11,'テスト3');
/*!40000 ALTER TABLE `routine_list_j` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_numb` int(11) NOT NULL AUTO_INCREMENT COMMENT '회원 번호',
  `id` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '아이디',
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '비밀번호',
  `mail` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '이메일',
  `nick` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '닉네임',
  `height` int(11) DEFAULT NULL COMMENT '키',
  `level` int(11) NOT NULL DEFAULT '1' COMMENT '레벨',
  `pic` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_numb`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'gustjd15','1234','gustjd15@naver.com','YGgood',180,99,NULL),(2,'kim','1234','kim11@gmail.com','HONGgyu',168,2,'2.jpg'),(3,'bae','1234','pae41@hanmail.com','PAEPAE',170,3,'3.jpg'),(4,'bak','1234','back23@naver.com','bakadayo',158,1,NULL),(5,'test','test','test@test.com','tester',180,2,NULL),(6,'kimtaeyoon','qmffn112','hongkyunkim@naver.com','김태윤짱멋짐',163,1,NULL),(7,'kingtaeyoon','qmffn112','hongkyunkim@naver.com','TaeYoonBaby',176,1,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_position_record`
--

DROP TABLE IF EXISTS `user_position_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_position_record` (
  `user_numb` int(11) NOT NULL COMMENT '회원 번호',
  `position_count` int(11) NOT NULL COMMENT '카운트',
  `position_check_date` date NOT NULL COMMENT '기록 날짜',
  `check_point_index` int(11) DEFAULT NULL,
  `position_record_index` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`position_record_index`),
  KEY `user_numb` (`user_numb`),
  KEY `user_position_record___fk` (`check_point_index`),
  CONSTRAINT `user_position_record___fk` FOREIGN KEY (`check_point_index`) REFERENCES `check_point` (`check_point_index`),
  CONSTRAINT `user_position_record_ibfk_1` FOREIGN KEY (`user_numb`) REFERENCES `user` (`user_numb`)
) ENGINE=InnoDB AUTO_INCREMENT=862 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_position_record`
--

LOCK TABLES `user_position_record` WRITE;
/*!40000 ALTER TABLE `user_position_record` DISABLE KEYS */;
INSERT INTO `user_position_record` VALUES (2,6,'2016-05-29',1,1),(2,6,'2016-05-29',2,2),(2,3,'2016-05-30',9,3),(2,3,'2016-05-30',11,4),(2,6,'2016-05-30',3,5),(2,6,'2016-05-31',3,6),(2,6,'2016-05-31',4,7),(2,3,'2016-05-29',5,8),(2,6,'2016-05-30',4,9),(3,1,'2016-05-26',1,168),(3,0,'2016-05-26',2,169),(3,1,'2016-05-26',3,170),(3,1,'2016-05-26',4,171),(3,1,'2016-05-26',5,172),(3,0,'2016-05-26',6,173),(3,0,'2016-05-26',7,174),(3,0,'2016-05-26',8,175),(2,1,'2016-06-15',1,176),(2,0,'2016-06-15',2,177),(2,0,'2016-06-15',3,178),(2,0,'2016-06-15',4,179),(2,1,'2016-06-15',5,180),(2,0,'2016-06-15',6,181),(2,0,'2016-06-15',7,182),(2,0,'2016-06-15',8,183),(2,1,'2016-06-16',1,184),(2,0,'2016-06-16',2,185),(2,1,'2016-06-16',3,186),(2,0,'2016-06-16',4,187),(2,1,'2016-06-16',5,188),(2,3,'2016-06-16',12,189),(2,2,'2016-06-16',13,190),(2,0,'0000-00-00',4,191),(2,1,'0000-00-00',1,204),(2,0,'0000-00-00',2,205),(2,0,'0000-00-00',3,206),(2,0,'0000-00-00',4,207),(2,1,'0000-00-00',1,208),(2,0,'0000-00-00',2,209),(2,1,'0000-00-00',3,210),(2,0,'0000-00-00',4,211),(2,1,'2016-06-14',1,212),(2,1,'2016-06-14',2,213),(2,0,'2016-06-14',3,214),(2,0,'2016-06-14',4,215),(2,0,'2016-06-14',5,216),(2,0,'2016-06-14',6,217),(2,0,'2016-06-14',7,218),(2,0,'2016-06-14',8,219),(2,0,'0000-00-00',5,220),(2,0,'2016-06-16',6,221),(2,0,'2016-06-16',7,222),(2,0,'2016-06-16',8,223),(2,0,'0000-00-00',5,224),(2,0,'0000-00-00',6,225),(2,0,'0000-00-00',7,226),(2,0,'0000-00-00',8,227),(2,0,'0000-00-00',5,228),(2,0,'0000-00-00',6,229),(2,0,'0000-00-00',7,230),(2,0,'0000-00-00',8,231),(2,0,'0000-00-00',5,232),(2,0,'0000-00-00',6,233),(2,0,'0000-00-00',7,234),(2,0,'0000-00-00',8,235),(2,0,'0000-00-00',1,236),(2,0,'0000-00-00',2,237),(2,0,'0000-00-00',3,238),(2,0,'0000-00-00',4,239),(2,0,'0000-00-00',1,240),(2,0,'0000-00-00',2,241),(2,0,'0000-00-00',3,242),(2,0,'0000-00-00',4,243),(2,0,'0000-00-00',1,244),(2,0,'0000-00-00',2,245),(2,0,'0000-00-00',3,246),(2,0,'0000-00-00',4,247),(2,0,'0000-00-00',1,248),(2,1,'0000-00-00',2,249),(2,0,'0000-00-00',3,250),(2,1,'0000-00-00',4,251),(2,0,'0000-00-00',1,252),(2,0,'0000-00-00',2,253),(2,0,'0000-00-00',3,254),(2,0,'0000-00-00',4,255),(2,0,'0000-00-00',1,256),(2,0,'0000-00-00',2,257),(2,0,'0000-00-00',3,258),(2,0,'0000-00-00',4,259),(2,0,'0000-00-00',1,260),(2,0,'0000-00-00',2,261),(2,0,'0000-00-00',3,262),(2,0,'0000-00-00',4,263),(2,0,'0000-00-00',1,264),(2,1,'0000-00-00',2,265),(2,0,'0000-00-00',3,266),(2,1,'0000-00-00',4,267),(2,1,'0000-00-00',1,268),(2,1,'0000-00-00',2,269),(2,1,'0000-00-00',3,270),(2,1,'0000-00-00',4,271),(2,0,'0000-00-00',1,272),(2,1,'0000-00-00',2,273),(2,0,'0000-00-00',3,274),(2,0,'0000-00-00',4,275),(2,0,'0000-00-00',1,276),(2,1,'0000-00-00',2,277),(2,0,'0000-00-00',3,278),(2,0,'0000-00-00',4,279),(2,0,'0000-00-00',1,280),(2,1,'0000-00-00',2,281),(2,0,'0000-00-00',3,282),(2,0,'0000-00-00',4,283),(2,0,'0000-00-00',1,284),(2,1,'0000-00-00',2,285),(2,0,'0000-00-00',3,286),(2,0,'0000-00-00',4,287),(2,0,'0000-00-00',5,288),(2,0,'0000-00-00',6,289),(2,0,'0000-00-00',7,290),(2,0,'0000-00-00',8,291),(2,0,'0000-00-00',5,292),(2,0,'0000-00-00',6,293),(2,0,'0000-00-00',7,294),(2,0,'0000-00-00',8,295),(2,0,'0000-00-00',5,296),(2,0,'0000-00-00',6,297),(2,0,'0000-00-00',7,298),(2,0,'0000-00-00',8,299),(2,0,'0000-00-00',5,300),(2,0,'0000-00-00',6,301),(2,0,'0000-00-00',7,302),(2,0,'0000-00-00',8,303),(2,0,'0000-00-00',5,304),(2,0,'0000-00-00',6,305),(2,0,'0000-00-00',7,306),(2,0,'0000-00-00',8,307),(2,1,'2016-06-02',1,308),(2,0,'2016-06-02',2,309),(2,0,'2016-06-02',3,310),(2,0,'2016-06-02',4,311),(3,1,'2016-06-12',1,312),(3,1,'2016-06-12',2,313),(3,2,'2016-06-12',3,314),(3,0,'2016-06-12',4,315),(3,2,'2016-06-12',5,316),(3,0,'2016-06-12',6,317),(3,1,'2016-06-12',7,318),(3,0,'2016-06-12',8,319),(3,1,'2016-06-13',1,320),(3,2,'2016-06-13',2,321),(3,3,'2016-06-13',3,322),(3,4,'2016-06-13',4,323),(3,5,'2016-06-13',5,324),(3,0,'2016-06-13',6,325),(3,2,'2016-06-13',7,326),(2,0,'0000-00-00',1,375),(2,0,'0000-00-00',2,376),(2,0,'0000-00-00',3,377),(2,0,'0000-00-00',4,378),(2,0,'0000-00-00',12,379),(2,0,'0000-00-00',13,380),(2,0,'0000-00-00',1,381),(2,0,'0000-00-00',2,382),(2,0,'0000-00-00',3,383),(2,0,'0000-00-00',4,384),(2,0,'0000-00-00',12,385),(2,0,'0000-00-00',13,386),(2,0,'0000-00-00',1,387),(2,0,'0000-00-00',2,388),(2,0,'0000-00-00',3,389),(2,0,'0000-00-00',4,390),(2,0,'0000-00-00',12,391),(2,0,'0000-00-00',13,392),(2,0,'0000-00-00',1,393),(2,0,'0000-00-00',2,394),(2,0,'0000-00-00',3,395),(2,0,'0000-00-00',4,396),(2,0,'0000-00-00',12,397),(2,0,'0000-00-00',13,398),(2,1,'0000-00-00',1,399),(2,0,'0000-00-00',2,400),(2,1,'0000-00-00',3,401),(2,0,'0000-00-00',4,402),(2,0,'0000-00-00',12,403),(2,0,'0000-00-00',13,404),(2,1,'0000-00-00',1,405),(2,0,'0000-00-00',2,406),(2,0,'0000-00-00',3,407),(2,0,'0000-00-00',4,408),(2,0,'0000-00-00',12,409),(2,0,'0000-00-00',13,410),(2,1,'0000-00-00',1,411),(2,0,'0000-00-00',2,412),(2,0,'0000-00-00',3,413),(2,0,'0000-00-00',4,414),(2,0,'0000-00-00',12,415),(2,0,'0000-00-00',13,416),(2,0,'0000-00-00',1,417),(2,0,'0000-00-00',2,418),(2,0,'0000-00-00',3,419),(2,1,'0000-00-00',4,420),(2,0,'0000-00-00',12,421),(2,0,'0000-00-00',13,422),(2,1,'0000-00-00',1,423),(2,0,'0000-00-00',2,424),(2,1,'0000-00-00',3,425),(2,0,'0000-00-00',4,426),(2,0,'0000-00-00',12,427),(2,0,'0000-00-00',13,428),(2,0,'0000-00-00',1,429),(2,0,'0000-00-00',2,430),(2,0,'0000-00-00',3,431),(2,0,'0000-00-00',4,432),(2,0,'0000-00-00',12,433),(2,0,'0000-00-00',13,434),(2,0,'0000-00-00',5,435),(2,0,'0000-00-00',6,436),(2,0,'0000-00-00',7,437),(2,0,'0000-00-00',8,438),(2,0,'0000-00-00',14,439),(2,0,'0000-00-00',15,440),(2,1,'0000-00-00',5,441),(2,1,'0000-00-00',6,442),(2,1,'0000-00-00',7,443),(2,1,'0000-00-00',8,444),(2,0,'0000-00-00',14,445),(2,0,'0000-00-00',15,446),(2,0,'0000-00-00',5,447),(2,0,'0000-00-00',6,448),(2,0,'0000-00-00',7,449),(2,1,'0000-00-00',8,450),(2,0,'0000-00-00',14,451),(2,0,'0000-00-00',15,452),(2,0,'0000-00-00',5,453),(2,1,'0000-00-00',6,454),(2,0,'0000-00-00',7,455),(2,1,'0000-00-00',8,456),(2,0,'0000-00-00',14,457),(2,0,'0000-00-00',15,458),(2,1,'0000-00-00',5,459),(2,1,'0000-00-00',6,460),(2,1,'0000-00-00',7,461),(2,1,'0000-00-00',8,462),(2,0,'0000-00-00',14,463),(2,0,'0000-00-00',15,464),(2,0,'0000-00-00',5,465),(2,0,'0000-00-00',6,466),(2,0,'0000-00-00',7,467),(2,0,'0000-00-00',8,468),(2,0,'0000-00-00',14,469),(2,0,'0000-00-00',15,470),(2,0,'0000-00-00',1,471),(2,0,'0000-00-00',2,472),(2,0,'0000-00-00',3,473),(2,0,'0000-00-00',4,474),(2,0,'0000-00-00',12,475),(2,0,'0000-00-00',13,476),(2,4,'2016-06-17',1,477),(2,8,'2016-06-17',2,478),(2,6,'2016-06-17',3,479),(2,5,'2016-06-17',4,480),(2,1,'2016-06-17',12,481),(2,1,'2016-06-17',13,482),(2,7,'2016-06-17',5,483),(2,8,'2016-06-17',6,484),(2,8,'2016-06-17',7,485),(2,8,'2016-06-17',8,486),(2,6,'2016-06-17',14,487),(2,4,'2016-06-17',15,488),(2,8,'2016-06-19',1,489),(2,6,'2016-06-19',2,490),(2,7,'2016-06-19',3,491),(2,5,'2016-06-19',4,492),(2,7,'2016-06-19',12,493),(2,7,'2016-06-19',13,494),(2,2,'2016-06-19',5,495),(2,2,'2016-06-19',6,496),(2,2,'2016-06-19',7,497),(2,2,'2016-06-19',8,498),(2,3,'2016-06-19',14,499),(2,4,'2016-06-19',15,500),(2,8,'2016-06-20',1,510),(2,10,'2016-06-20',2,511),(2,7,'2016-06-20',3,512),(2,7,'2016-06-20',4,513),(2,9,'2016-06-20',12,514),(2,8,'2016-06-20',13,515),(2,0,'2016-06-20',5,516),(2,0,'2016-06-20',6,517),(2,0,'2016-06-20',7,518),(2,0,'2016-06-20',8,519),(2,0,'2016-06-20',14,520),(2,0,'2016-06-20',15,521),(2,3,'2016-06-21',1,522),(2,3,'2016-06-21',2,523),(2,3,'2016-06-21',3,524),(2,3,'2016-06-21',4,525),(2,0,'2016-06-21',12,526),(2,0,'2016-06-21',13,527),(2,0,'2016-06-21',5,528),(2,0,'2016-06-21',6,529),(2,0,'2016-06-21',7,530),(2,0,'2016-06-21',8,531),(2,0,'2016-06-21',14,532),(2,0,'2016-06-21',15,533),(2,19,'2016-06-22',1,534),(2,11,'2016-06-22',2,535),(2,9,'2016-06-22',3,536),(2,9,'2016-06-22',4,537),(2,3,'2016-06-22',12,538),(2,1,'2016-06-22',13,539),(2,2,'2016-06-22',5,540),(2,2,'2016-06-22',6,541),(2,9,'2016-06-22',7,542),(2,2,'2016-06-22',8,543),(2,0,'2016-06-22',14,544),(2,0,'2016-06-22',15,545),(2,7,'2016-06-23',1,546),(2,7,'2016-06-23',2,547),(2,7,'2016-06-23',3,548),(2,7,'2016-06-23',4,549),(2,2,'2016-06-23',12,550),(2,0,'2016-06-23',13,551),(2,0,'2016-06-23',5,552),(2,0,'2016-06-23',6,553),(2,0,'2016-06-23',7,554),(2,0,'2016-06-23',8,555),(2,0,'2016-06-23',14,556),(2,0,'2016-06-23',15,557),(2,22,'2016-07-06',1,558),(2,10,'2016-07-06',2,559),(2,7,'2016-07-06',3,560),(2,5,'2016-07-06',4,561),(2,2,'2016-07-06',12,562),(2,23,'2016-07-06',13,563),(2,0,'2016-07-06',5,564),(2,0,'2016-07-06',6,565),(2,0,'2016-07-06',7,566),(2,0,'2016-07-06',8,567),(2,0,'2016-07-06',14,568),(2,0,'2016-07-06',15,569),(2,119,'2016-07-07',1,570),(2,14,'2016-07-07',2,571),(2,16,'2016-07-07',3,572),(2,7,'2016-07-07',4,573),(2,19,'2016-07-07',12,574),(2,36,'2016-07-07',13,575),(2,3,'2016-07-07',5,576),(2,3,'2016-07-07',6,577),(2,4,'2016-07-07',7,578),(2,4,'2016-07-07',8,579),(2,0,'2016-07-07',14,580),(2,0,'2016-07-07',15,581),(2,6,'2016-07-08',1,582),(2,0,'2016-07-08',2,583),(2,0,'2016-07-08',3,584),(2,0,'2016-07-08',4,585),(2,3,'2016-07-08',12,586),(2,13,'2016-07-08',13,587),(2,1,'2016-07-09',1,588),(2,1,'2016-07-09',2,589),(2,1,'2016-07-09',3,590),(2,1,'2016-07-09',4,591),(2,0,'2016-07-09',12,592),(2,0,'2016-07-09',13,593),(2,1,'2016-07-09',5,594),(2,1,'2016-07-09',6,595),(2,0,'2016-07-09',7,596),(2,0,'2016-07-09',8,597),(2,0,'2016-07-09',14,598),(2,0,'2016-07-09',15,599),(2,1,'2016-07-10',1,600),(2,0,'2016-07-10',2,601),(2,6,'2016-07-10',3,602),(2,1,'2016-07-10',4,603),(2,0,'2016-07-10',12,604),(2,0,'2016-07-10',13,605),(2,2,'2016-07-10',5,606),(2,2,'2016-07-10',6,607),(2,2,'2016-07-10',7,608),(2,1,'2016-07-10',8,609),(2,0,'2016-07-10',14,610),(2,0,'2016-07-10',15,611),(2,2,'2016-07-11',1,612),(2,0,'2016-07-11',2,613),(2,1,'2016-07-18',1,636),(2,1,'2016-07-18',2,637),(2,0,'2016-07-18',5,638),(2,1,'2016-07-18',6,639),(2,2,'2016-07-20',1,660),(2,2,'2016-07-20',2,661),(2,3,'2016-07-20',5,662),(2,7,'2016-07-20',6,663),(2,2,'2016-07-21',1,690),(2,1,'2016-07-21',2,691),(2,1,'2016-07-21',5,692),(2,1,'2016-07-21',6,693),(2,0,'2016-07-22',5,696),(2,1,'2016-07-22',6,697),(2,2,'2016-07-24',1,706),(2,0,'2016-07-24',2,707),(2,1,'2016-07-24',5,708),(2,4,'2016-07-24',6,709),(2,3,'2016-08-08',1,712),(2,0,'2016-08-08',2,713),(2,1,'2016-08-17',1,726),(2,0,'2016-08-17',2,727),(2,3,'2016-08-20',1,732),(2,3,'2016-08-20',2,733),(2,3,'2016-08-20',5,734),(2,2,'2016-08-20',6,735),(2,3,'2016-08-28',1,744),(2,3,'2016-08-28',2,745),(2,3,'2016-08-30',1,746),(2,3,'2016-08-30',2,747),(2,2,'2016-09-07',1,748),(2,3,'2016-09-07',2,749),(2,3,'2016-09-07',5,750),(2,3,'2016-09-07',6,751),(2,4,'2016-09-11',1,768),(2,3,'2016-09-11',2,769),(2,8,'2016-09-11',5,770),(2,8,'2016-09-11',6,771),(2,1,'2016-09-18',1,776),(2,0,'2016-09-18',2,777),(2,1,'2016-09-18',5,778),(2,0,'2016-09-18',6,779),(2,1,'2016-09-19',1,780),(2,2,'2016-09-19',2,781),(2,3,'2016-09-19',5,782),(2,3,'2016-09-19',6,783),(2,3,'2016-09-20',1,794),(2,2,'2016-09-20',2,795),(2,0,'2016-09-20',5,796),(2,1,'2016-09-20',6,797),(2,2,'2016-09-21',1,798),(2,2,'2016-09-21',2,799),(2,3,'2016-09-21',5,800),(2,5,'2016-09-21',6,801),(2,4,'2016-09-22',1,804),(2,4,'2016-09-22',2,805),(2,3,'2016-09-22',5,806),(2,3,'2016-09-22',6,807),(2,3,'2016-09-23',1,812),(2,2,'2016-09-23',2,813),(2,3,'2016-09-23',5,814),(2,3,'2016-09-23',6,815),(2,3,'2016-09-28',1,820),(2,4,'2016-09-28',2,821),(2,3,'2016-09-28',5,822),(2,3,'2016-09-28',6,823),(2,7,'2016-09-30',1,824),(2,4,'2016-09-30',2,825),(2,4,'2016-09-30',5,826),(2,1,'2016-09-30',6,827),(2,1,'2016-10-10',1,828),(2,2,'2016-10-10',2,829),(2,3,'2016-10-10',5,830),(2,3,'2016-10-10',6,831),(2,1,'2016-10-12',1,832),(2,2,'2016-10-12',2,833),(2,3,'2016-10-12',5,834),(2,3,'2016-10-12',6,835),(2,1,'2016-10-18',1,836),(2,2,'2016-10-18',2,837),(2,3,'2016-10-18',5,838),(2,3,'2016-10-18',6,839),(2,1,'2016-10-19',1,842),(2,2,'2016-10-19',2,843),(2,3,'2016-10-19',5,844),(2,3,'2016-10-19',6,845),(2,1,'2016-10-24',1,850),(2,2,'2016-10-24',2,851),(2,3,'2016-10-24',5,852),(2,3,'2016-10-24',6,853),(2,2,'2016-11-01',1,854),(2,2,'2016-11-01',2,855),(2,4,'2016-11-01',5,856),(2,4,'2016-11-01',6,857),(2,3,'2016-11-02',1,858),(2,2,'2016-11-02',2,859),(2,3,'2016-11-02',5,860),(2,3,'2016-11-02',6,861);
/*!40000 ALTER TABLE `user_position_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_routine_info`
--

DROP TABLE IF EXISTS `user_routine_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_routine_info` (
  `routine_list_numb` int(11) NOT NULL AUTO_INCREMENT,
  `user_numb` int(11) DEFAULT NULL,
  `routine_list_index` int(11) DEFAULT NULL,
  `routine_date` date DEFAULT NULL,
  PRIMARY KEY (`routine_list_numb`),
  KEY `user_routine_info___fk` (`user_numb`),
  CONSTRAINT `user_routine_info___fk` FOREIGN KEY (`user_numb`) REFERENCES `user` (`user_numb`)
) ENGINE=InnoDB AUTO_INCREMENT=277 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_routine_info`
--

LOCK TABLES `user_routine_info` WRITE;
/*!40000 ALTER TABLE `user_routine_info` DISABLE KEYS */;
INSERT INTO `user_routine_info` VALUES (1,2,1,'2016-05-29'),(2,2,2,'2016-05-30'),(66,2,4,'2016-05-31'),(111,2,9,'2016-07-20'),(115,2,9,'2016-07-28'),(116,2,8,'2016-07-11'),(117,2,4,'2016-07-13'),(119,2,5,'2016-07-08'),(120,2,4,'2016-07-29'),(121,2,9,'2016-07-27'),(122,2,4,'2016-07-01'),(128,2,5,'2016-07-04'),(129,2,5,'2016-07-14'),(130,2,5,'0000-00-00'),(131,2,8,'2016-08-11'),(132,2,4,'2016-08-10'),(133,2,4,'2016-08-12'),(134,2,9,'2016-07-21'),(136,2,1,'2016-08-15'),(137,3,1,'2016-08-17'),(138,3,1,'2016-08-19'),(139,3,4,'2016-08-22'),(140,3,4,'2016-08-24'),(141,3,4,'2016-05-26'),(192,2,8,'2016-06-20'),(193,2,5,'2016-06-13'),(194,2,5,'2016-06-06'),(195,2,3,'2016-06-10'),(196,2,3,'2016-06-17'),(197,2,4,'2016-06-15'),(198,2,8,'2016-06-21'),(199,2,8,'2016-06-22'),(200,2,8,'2016-06-23'),(201,2,8,'2016-06-16'),(202,2,8,'2016-06-29'),(204,2,9,'2016-07-05'),(205,2,8,'2016-07-07'),(206,2,8,'2016-07-09'),(207,2,8,'2016-07-10'),(208,2,8,'2016-07-12'),(209,2,8,'2016-07-16'),(210,2,8,'2016-07-18'),(211,2,8,'2016-07-23'),(212,2,8,'2016-07-22'),(213,2,9,'2016-07-24'),(214,2,9,'2016-07-25'),(215,2,8,'2016-07-26'),(216,2,8,'2016-07-30'),(217,2,8,'2016-08-01'),(218,2,8,'2016-08-16'),(219,2,8,'2016-08-02'),(220,2,8,'2016-08-03'),(221,2,8,'2016-08-04'),(222,2,8,'2016-08-05'),(223,2,8,'2016-08-08'),(224,2,8,'2016-08-09'),(225,2,8,'2016-08-14'),(226,2,8,'2016-08-17'),(227,2,8,'2016-08-20'),(228,2,8,'2016-08-25'),(229,2,8,'2016-08-26'),(230,2,8,'2016-08-21'),(231,2,8,'2016-08-19'),(232,2,8,'2016-08-28'),(233,2,8,'2016-08-29'),(234,2,8,'2016-08-30'),(238,2,8,'2016-09-19'),(240,2,8,'2016-09-21'),(246,2,5,'2016-09-30'),(251,2,4,'2016-09-26'),(252,2,8,'2016-09-23'),(253,2,8,'2016-09-28'),(254,2,8,'2016-10-03'),(255,2,9,'2016-10-10'),(259,2,8,'2016-10-20'),(260,2,8,'2016-10-22'),(261,2,8,'2016-10-14'),(266,2,8,'2016-10-12'),(268,2,8,'2016-10-18'),(271,2,8,'2016-10-19'),(274,2,8,'2016-10-24'),(275,2,8,'2016-11-01'),(276,2,8,'2016-11-02');
/*!40000 ALTER TABLE `user_routine_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weight`
--

DROP TABLE IF EXISTS `weight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weight` (
  `user_numb` int(11) NOT NULL COMMENT '회원번호',
  `date` date NOT NULL COMMENT '기록 날짜',
  `weight` int(11) NOT NULL COMMENT '몸무게',
  PRIMARY KEY (`user_numb`,`date`),
  CONSTRAINT `weight_ibfk_1` FOREIGN KEY (`user_numb`) REFERENCES `user` (`user_numb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weight`
--

LOCK TABLES `weight` WRITE;
/*!40000 ALTER TABLE `weight` DISABLE KEYS */;
INSERT INTO `weight` VALUES (2,'2016-04-19',68),(2,'2016-05-20',70),(2,'2016-05-26',69),(2,'2016-05-27',69),(2,'2016-05-30',68),(2,'2016-05-31',68),(2,'2016-06-06',68),(2,'2016-07-11',69),(2,'2016-07-21',67),(2,'2016-07-23',66),(2,'2016-07-25',65),(3,'2016-04-04',60),(3,'2016-04-15',63),(3,'2016-04-23',62);
/*!40000 ALTER TABLE `weight` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-04 16:38:28
