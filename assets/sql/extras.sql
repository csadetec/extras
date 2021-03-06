-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: extras
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `colaboradores`
--

DROP TABLE IF EXISTS `colaboradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaboradores` (
  `id_colaborador` int(11) NOT NULL AUTO_INCREMENT,
  `chapa` varchar(10) NOT NULL,
  `nome_colaborador` varchar(150) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `descricao_secao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_colaborador`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaboradores`
--

LOCK TABLES `colaboradores` WRITE;
/*!40000 ALTER TABLE `colaboradores` DISABLE KEYS */;
INSERT INTO `colaboradores` VALUES (1,'0022782','CARLOS EDUARDO DE ALMEIDA','ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR','ANALISTAS DE ÁREA DO CONHECIMENTO'),(2,'0022784','DANUBIA DINIZ NANTES','ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR','ANALISTAS DE ÁREA DO CONHECIMENTO'),(3,'0022854','FLAVIO COSTA BERUTTI','ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR','ANALISTAS DE ÁREA DO CONHECIMENTO'),(4,'0022894','IVAN CANUTO PONTELO CANCADO','ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR','GESTÃO PEDAGÓGICA'),(5,'0022761','JACQUELINE ALVES DE SOUZA CARVALHO','ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR','ANALISTAS DE ÁREA DO CONHECIMENTO'),(6,'0022825','JEAN SANTOS OTONI','ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR','ANALISTAS DE ÁREA DO CONHECIMENTO'),(7,'0022938','JOSE ANSELMO DA SILVA JUNIOR','ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR','GESTÃO PEDAGÓGICA'),(8,'0022892','MARCUS GUILHERME PINTO DE FARIA VALADARES','ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR','GESTÃO PEDAGÓGICA'),(9,'0022939','MARIA DO CARMO FERNANDES NUNES ROLLA','ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR','GESTÃO PEDAGÓGICA'),(10,'0022786','MATHEUS DE CASTRO LEAL','ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR','ANALISTAS DE ÁREA DO CONHECIMENTO'),(11,'0022792','RAQUEL MALTA PINTO','ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR','ANALISTAS DE ÁREA DO CONHECIMENTO'),(17,'0020143','ADRIANA MIRIAM FERREIRA CAVALCANTE GONCALVES','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(18,'0022847','ADRIANA SISSI COSTA GONCALVES','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(19,'0022908','ALEXANDRA DE FATIMA GONCALVES','PROFESSOR','ENSINO FUNDAMENTAL I (2º ANO)'),(20,'0022926','ALEXANIA RIBEIRO DE MORAIS','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(21,'0022849','ALINE CRISTINA CALDEIRA BRANT DE FREITAS','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(22,'0020150','ANDERSON CALDEIRA VILANOVA','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(23,'0022577','ANDREIA CONSOLACAO DE CARVALHO','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(24,'0022695','ANGELA NUNES LOPES','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(25,'0022301','ANSELMO LUIZ PEREIRA CAMPOS','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(26,'0022725','ARAMINTA DE ABREU RESENDE ALVES','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(27,'0022688','CAMILA JULIA ALVES CARVALHO MONTE ALTO','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(28,'0022689','CARLOS EDUARDO DE ALMEIDA','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(29,'0022885','CAROLINA BARBOSA PASSIG MARTINS','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(30,'0020350','CATE REGINA PRA','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(31,'0022674','CINARA RIBEIRO MOTA','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(32,'0022916','CINTIA GONCALVES FONSECA COSTA','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(33,'0022884','CLAUDIA MARCIA NEVES PEREIRA DE PAULA','PROFESSOR','ENSINO FUNDAMENTAL I (5º ANO)'),(34,'0022202','CLAUDIA REGINA SILVA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(35,'0022286','CLAUDIMAR LOPES DE SOUZA','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(36,'0022943','DANIEL VALADARES MACEDO','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(37,'0022475','DANUBIA DINIZ NANTES','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(38,'0022905','DEBORA NAVES SANTOS','PROFESSOR','ENSINO MÉDIO - (2ª SÉRIE)'),(39,'0022775','DECIUS MOREIRA CALDEIRA','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(40,'0022839','DENIS PEREIRA DE ANDRADE','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(41,'0022239','EDUARDO BREGUNCI NOGUEIRA','PROFESSOR','EDUCAÇÃO FÍSICA'),(42,'0022694','ELEN DE CASSIA ASSIS RABELO RIBEIRO','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(43,'0022279','ELETEIA MIRANDA DE SOUZA SILVA','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(44,'0022400','FABIANA HILARIO DE QUEIROZ','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(45,'0022845','FLAVIA CRISTINA DE OLIVEIRA FRANCO','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(46,'0022841','FLAVIANE LUZ FERNANDES','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(47,'0022830','FLAVIO COSTA BERUTTI','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(48,'0022883','GIOVANA DE ABREU AVILA ROMUALDO','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(49,'0022874','ILAN ALVES MIRANDA','PROFESSOR','ENSINO FUNDAMENTAL II - (8º ANO)'),(50,'0020105','INEZ GRIGOLO SILVA','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(51,'0022919','ISABELLE JUNIA RODRIGUES DA SILVA','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(52,'0022846','IVAN CANUTO PONTELO CANCADO','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(53,'0022460','JACQUELINE ALVES DE SOUZA CARVALHO','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(54,'0022686','JANAINA RAFAELA MAIA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(55,'0022752','JANE EYRE DA SILVA ANDRADE SANTOS','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(56,'0022734','JEAN SANTOS OTONI','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(57,'0022904','JOSE ANSELMO DA SILVA JUNIOR','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(58,'0022588','JULIANA ALVARES DE ALMEIDA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(59,'0022898','JULIANE DE LARA ALVIM GOMES','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(60,'0022777','KARINA CARMO ROCHA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(61,'0020402','KATIA ADRIANA GONCALVES','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(62,'0022583','KELE DA SILVA REZENDE BATISTA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(63,'0022705','KELEN FAUSTA DAS NEVES FROES','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(64,'0022842','KELY CRISTINA MADUREIRA DA SILVA TEIXEIRA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(65,'0022838','KRISNA CRISTINA DA COSTA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(66,'0022735','LARYSSA CRISTINA CASTRO GOMES','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(67,'0022598','LEONARDO NUNES DE LIMA CAMPOS','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(68,'0022920','LUCAS SOARES RODRIGUES','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(69,'0022757','LUCIANA MELGACO RACILAN VIEIRA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(70,'0022927','MAIRA DE FARIA COELHO','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(71,'0020113','MARCIO LUIZ DA ROCHA','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(72,'0022918','MARCUS AUGUSTO HUSBERT JUNIOR','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(73,'0022834','MARCUS GUILHERME PINTO DE FARIA VALADARES','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(74,'0022923','MARIA DO CARMO FERNANDES NUNES ROLLA','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(75,'0022934','MARIA EPONINA DE ABREU E TORRES','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(76,'0022816','MARIANA BOTARRO BAMBIRRA','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(77,'0022691','MATHEUS DE CASTRO LEAL','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(78,'0022690','MERCIA MARIA DA COSTA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(79,'0022778','MERCIA MARIA DE OLIVEIRA GONCALVES','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(80,'0022899','MIRELLA APARECIDA BEJA DA SILVA BRITO','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(81,'0022249','MOACIR ALVES MOREIRA','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(82,'0022848','PATRICIA COSTA RIBEIRO','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(83,'0022915','PATRICIA KELLY LISBOA MEIRELES TOBIAS','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(84,'0022639','PATRICIA MACEDO MOSTAFA DE MORAES','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(85,'0022812','PATRICK DE OLIVEIRA BONNEREAU','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(86,'0022575','PAULA CANDIDA DE OLIVEIRA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(87,'0022879','PENELOPE OLIVEIRA GONCALVES RODRIGUES','PROFESSOR','ENSINO FUNDAMENTAL I (2º ANO)'),(88,'0022480','PETRONIO ALVES FERREIRA','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(89,'0022886','POLLIANE DE JESUS DORNELES OLIVEIRA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(90,'0022736','RAFAEL CARVALHO ROCHA SILVA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(91,'0022623','RANEZ DE LIZANDRA BRITES','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(92,'0022390','RAQUEL MALTA PINTO','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(93,'0022237','RENATO FRADE','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(94,'0022425','ROBERTA ANGELINA VICENTI','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(95,'0022771','ROBERTA DE OLIVEIRA FERREIRA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(96,'0022618','ROBINSON VINICIUS DE OLIVEIRA ALVES','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(97,'0022888','RODRIGO MORENO RIBEIRO SILVA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(98,'0022881','ROSA MARIA RIBEIRO','PROFESSOR','EDUCAÇÃO INFANTIL - 1º PERÍODO'),(99,'0022781','SOLANGE GUEDES DE OLIVEIRA CARNEIRO','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(100,'0022434','TALITA CRISTINA GONCALVES DE OLIVEIRA','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(101,'0022740','THAIS AZEVEDO BUENO ESPESCHIT','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(102,'0022880','THIENE CRISTINA LIMA HABISTZREUTER','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(103,'0022634','VINICIUS GOMES CAMBRAIA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(104,'0022882','WALERIA SANTOS TAYLOR','PROFESSOR','ENSINO MÉDIO - (1ª SÉRIE)'),(105,'0022635','WANIA MARIA PARREIRAS GONCALVES','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)'),(107,'0022831','ZILDO ANDRE VIEIRA FLORES','PROFESSOR','ENSINO FUNDAMENTAL II - (6º ANO)'),(108,'0022715','ZINIA LETICIA PEIXOTO COSTA','PROFESSOR','ENSINO FUNDAMENTAL I (1º ANO)');
/*!40000 ALTER TABLE `colaboradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motivos`
--

DROP TABLE IF EXISTS `motivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motivos` (
  `id_motivo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_motivo` varchar(30) NOT NULL,
  `segmento` varchar(5) NOT NULL,
  PRIMARY KEY (`id_motivo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motivos`
--

LOCK TABLES `motivos` WRITE;
/*!40000 ALTER TABLE `motivos` DISABLE KEYS */;
INSERT INTO `motivos` VALUES (1,'APLICAÇÃO DE PROVA EF I ','EF I'),(2,'APLICAÇÃO DE PROVA EF II ','EF II'),(3,'APLICAÇÃO DE PROVA EM','EM'),(4,'ATIVIDADE EXTRA EF I','EF I'),(5,'ATIVIDADE EXTRA EF II','EF II'),(6,'ATIVIDADE EXTRA EM','EM'),(7,'ATIVIDADES EXTRA','F'),(8,'AULA EXTRA EF I','EF I'),(9,'AULA EXTRA EF II','EF II'),(10,'AULA EXTRA EM','EM'),(11,'SUBSTITUIÇÃO INF/EF I','EF I'),(12,'SUBSTITUIÇÃO EF II','EF II'),(13,'SUBSTITUIÇÃO EM','EM'),(14,'REUNIÕES INF/EF I','EF I'),(15,'REUNIÕES EF II','EF II'),(16,'REUNIÕES EM','EM'),(17,'FALTAS','F');
/*!40000 ALTER TABLE `motivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfis`
--

DROP TABLE IF EXISTS `perfis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfis` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfis`
--

LOCK TABLES `perfis` WRITE;
/*!40000 ALTER TABLE `perfis` DISABLE KEYS */;
INSERT INTO `perfis` VALUES (1,'ADMINISTRADOR'),(2,'ASSISTENTE - FUNDAMENTAL'),(3,'ASSISTENTE - MÉDIO'),(4,'RH'),(5,'GESTÃO PEDAGÓGICA');
/*!40000 ALTER TABLE `perfis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos`
--

DROP TABLE IF EXISTS `servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `id_motivo` int(11) NOT NULL,
  `data` varchar(12) NOT NULL,
  `horas_inicio` varchar(6) NOT NULL,
  `horas_fim` varchar(6) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `obs` text,
  PRIMARY KEY (`id_servico`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos`
--

LOCK TABLES `servicos` WRITE;
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
INSERT INTO `servicos` VALUES (1,1,'2019-10-21','10:00','12:00',0,0,NULL),(2,2,'2019-10-21','14:00','15:00',0,0,NULL),(3,2,'2019-10-10','14:00','15:00',0,0,NULL),(4,3,'2019-10-22','14:00','17:00',0,0,NULL),(5,1,'2019-10-21','07:00','08:00',0,0,NULL),(6,1,'','07:00','08:00',0,0,NULL),(7,5,'2019-11-04','06:00','08:00',1,1,'teste');
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos_colaboradores`
--

DROP TABLE IF EXISTS `servicos_colaboradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos_colaboradores` (
  `id_sc` int(11) NOT NULL AUTO_INCREMENT,
  `id_servico` int(11) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `id_motivo_rh` int(11) NOT NULL,
  `chapa` varchar(10) NOT NULL,
  `horas_inicio` varchar(6) NOT NULL,
  `horas_fim` varchar(6) NOT NULL,
  `diferenca` int(11) NOT NULL,
  `data` varchar(12) NOT NULL,
  `status` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_sc`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos_colaboradores`
--

LOCK TABLES `servicos_colaboradores` WRITE;
/*!40000 ALTER TABLE `servicos_colaboradores` DISABLE KEYS */;
INSERT INTO `servicos_colaboradores` VALUES (1,1,1,0,'0022920','10:00','12:00',120,'2019-10-21',0,0),(2,1,1,0,'0022831','10:00','11:00',60,'2019-10-21',0,0),(3,2,2,0,'0022831','14:00','15:00',60,'2019-10-21',0,0),(4,3,2,0,'0022831','14:00','15:00',60,'2019-10-10',0,0),(5,4,3,0,'0022920','14:00','17:00',180,'2019-10-22',0,0),(6,4,3,0,'0022831','14:00','17:00',180,'2019-10-22',0,0),(7,4,3,0,'0022778','14:00','17:00',180,'2019-10-22',0,0),(8,7,5,5,'0022920','06:00','08:00',120,'2019-11-04',1,0),(9,7,5,5,'0022934','06:00','08:00',120,'2019-11-04',1,0);
/*!40000 ALTER TABLE `servicos_colaboradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Lucas de Sousa Assunção','lucas.assuncao','97a1884a632e6827e5b95271f8cee262',NULL,1),(2,'Usuário teste','teste','698dc19d489c4e4db73e28a713eab07b',NULL,1),(3,'ASSISTENTE MÉDIO','medio','71954c968ae9c3a50488ef0c9eae6f52',NULL,3),(4,'ASSISTENTE FUNDAMENTAL','fundamental','97a1884a632e6827e5b95271f8cee262',NULL,2),(5,'USUÁRIO DETEC','detec','3e6ccfb77e5b68db59884ccc38a46752',NULL,1),(6,'TESTE','teste2','698dc19d489c4e4db73e28a713eab07b',NULL,1),(7,'BRUNO JULIO MOREIRA DUARTE','bruno.duarte','35607bc4097b930211761990928a68d7',NULL,1),(8,'TESTE','testecantina','698dc19d489c4e4db73e28a713eab07b',NULL,4),(9,'teste','teste3','7348cba539160cf399993a4b23832856',NULL,5),(10,'sdf','asdf','912ec803b2ce49e4a541068d495ab570',NULL,2),(11,'sdf','sdfsda','fe6d1fed11fa60277fb6a2f73efb8be2',NULL,1),(12,'teste','testeteste','77df6c21f12bfdee969ca05a542fe137',NULL,2),(13,'sdf','xvxcASDF','48ac1b60506a763987115161659f8305',NULL,1),(14,'teste','asdfas','97a1884a632e6827e5b95271f8cee262',NULL,2),(15,'vas','vas','233692e0aad5a445107564ca1bb68d51',NULL,2),(16,'sadfasd','testesdfsdf','1f5741a01f51daaf29e2b96678100ba8',NULL,4);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-04 15:20:26
