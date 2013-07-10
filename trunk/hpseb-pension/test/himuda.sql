-- MySQL dump 10.13  Distrib 5.5.17, for Win32 (x86)
--
-- Host: localhost    Database: himuda
-- ------------------------------------------------------
-- Server version	5.5.17

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
-- Table structure for table `tbl_himuda_client_address`
--

DROP TABLE IF EXISTS `tbl_himuda_client_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_client_address` (
  `HCA_ID` int(11) NOT NULL,
  `HCA_HOUSE_NO` int(11) NOT NULL,
  `HCA_STREET` varchar(25) DEFAULT NULL,
  `HCA_SECTOR` varchar(5) DEFAULT NULL,
  `HCA_VILLAGE` varchar(30) DEFAULT NULL,
  `HCA_CITY` varchar(30) DEFAULT NULL,
  `HCA_PINCODE` int(11) NOT NULL,
  `HCA_DISTRICT` varchar(50) DEFAULT NULL,
  `HCA_STATE` varchar(50) DEFAULT NULL,
  `HCA_COUNTRY` varchar(50) DEFAULT NULL,
  `HCA_MOBILE_NO` varchar(15) DEFAULT NULL,
  `HCA_LANDLINE_NO` varchar(15) DEFAULT NULL,
  `HCA_ADDRESS_ONE` varchar(100) DEFAULT NULL,
  `HCA_ADDRESS_TWO` varchar(100) DEFAULT NULL,
  `HCD_GUID` varchar(64) DEFAULT NULL,
  `HCA_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HCA_STATUS_CD` varchar(5) DEFAULT NULL,
  `HCA_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HCA_CREATED_BY` varchar(50) DEFAULT NULL,
  `HCA_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HCA_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  KEY `FK_TBL_HIMUDA_CLIENT_ADDRESS_HCA_ID` (`HCA_ID`),
  CONSTRAINT `FK_TBL_HIMUDA_CLIENT_ADDRESS_HCA_ID` FOREIGN KEY (`HCA_ID`) REFERENCES `tbl_himuda_plot_client` (`HPC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_client_address`
--

LOCK TABLES `tbl_himuda_client_address` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_client_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_client_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_client_documents`
--

DROP TABLE IF EXISTS `tbl_himuda_client_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_client_documents` (
  `HCD_HPC_ID` int(11) NOT NULL,
  `HCD_DOCUMENT_TYPE` varchar(50) DEFAULT NULL,
  `HCD_FILE_LOCATION` varchar(100) DEFAULT NULL,
  `HCD_DOCUMENT_IMAGE` longblob,
  `HCD_COMMENT` varchar(100) DEFAULT NULL,
  `HCD_GUID` varchar(64) DEFAULT NULL,
  `HCD_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HCD_STATUS_CD` varchar(5) DEFAULT NULL,
  `HCD_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HCD_CREATED_BY` varchar(50) DEFAULT NULL,
  `HCD_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HCD_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HCD_HPC_ID`),
  KEY `FK_TBL_HIMUDA_CLIENT_DOCUMENTS_HCD_HPC_ID` (`HCD_HPC_ID`),
  CONSTRAINT `FK_TBL_HIMUDA_CLIENT_DOCUMENTS_HCD_HPC_ID` FOREIGN KEY (`HCD_HPC_ID`) REFERENCES `tbl_himuda_plot_client` (`HPC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_client_documents`
--

LOCK TABLES `tbl_himuda_client_documents` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_client_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_client_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_department`
--

DROP TABLE IF EXISTS `tbl_himuda_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_department` (
  `HD_DEP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HD_DEP_NAME` varchar(50) NOT NULL,
  `HD_DEP_HOD_ID` int(11) DEFAULT NULL,
  `HD_GUID` varchar(64) DEFAULT NULL,
  `HD_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HD_STATUS_CD` varchar(5) DEFAULT NULL,
  `HD_CREATED_DT` datetime DEFAULT NULL,
  `HD_CREATED_BY` varchar(50) DEFAULT NULL,
  `HD_LAST_UPDATED_DT` datetime DEFAULT NULL,
  `HD_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HD_DEP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_department`
--

LOCK TABLES `tbl_himuda_department` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_department` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_emi_schedule_details`
--

DROP TABLE IF EXISTS `tbl_himuda_emi_schedule_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_emi_schedule_details` (
  `HESD_EMI_ID` varchar(25) NOT NULL,
  `HESD_PLOT_CD` varchar(100) NOT NULL,
  `HESD_EMI_TYPE` varchar(25) NOT NULL,
  `HESD_EMI_COUNT` int(11) NOT NULL,
  `HESD_EMI_AMT` double NOT NULL,
  `HESD_EMI_SCHEDULE_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HESD_EMI_RECIEVED_AMT` double DEFAULT NULL,
  `HESD_EMI_RECIEVED_DT` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `HESD_EMI_STATUS` varchar(5) NOT NULL,
  `HESD_EMI_INTEREST_RATE` float DEFAULT NULL,
  `HESD_EMI_INTEREST_AMT` double DEFAULT NULL,
  `HESD_EMI_AMT_DUE` double DEFAULT NULL,
  `HESD_AMT_PAID_TILL_DT` double DEFAULT NULL,
  `HESD_AMT_BAL` double DEFAULT NULL,
  `HESD_GUID` varchar(64) DEFAULT NULL,
  `HESD_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HESD_STATUS_CD` varchar(5) DEFAULT NULL,
  `HESD_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HESD_CREATED_BY` varchar(50) DEFAULT NULL,
  `HESD_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HESD_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HESD_EMI_ID`),
  KEY `FK_tbl_himuda_emi_schedule_details_HESD_PLOT_CD` (`HESD_PLOT_CD`),
  CONSTRAINT `FK_tbl_himuda_emi_schedule_details_HESD_PLOT_CD` FOREIGN KEY (`HESD_PLOT_CD`) REFERENCES `tbl_himuda_plots` (`HP_PLOT_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_emi_schedule_details`
--

LOCK TABLES `tbl_himuda_emi_schedule_details` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_emi_schedule_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_emi_schedule_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_employee`
--

DROP TABLE IF EXISTS `tbl_himuda_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_employee` (
  `HE_USER_ID` varchar(25) NOT NULL,
  `HE_USER_PASSWORD` varchar(25) NOT NULL,
  `HE_FIRST_NAME` varchar(50) NOT NULL,
  `HE_MIDDLE_NAME` varchar(50) DEFAULT NULL,
  `HE_LAST_NAME` varchar(50) DEFAULT NULL,
  `HE_GENDER` varchar(5) DEFAULT NULL,
  `HE_DOB` date DEFAULT NULL,
  `HE_DEP_ID` int(11) NOT NULL,
  `HE_PHONE_ID` varchar(15) DEFAULT NULL,
  `HE_DESK_ID` int(11) DEFAULT NULL,
  `HE_DOJ_DT` date DEFAULT '0000-00-00',
  `HE_LAST_LOGIN_DT` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `HE_GUID` varchar(64) DEFAULT NULL,
  `HE_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HE_STATUS_CD` varchar(5) DEFAULT NULL,
  `HE_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HE_CREATED_BY` varchar(50) DEFAULT NULL,
  `HE_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HE_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HE_USER_ID`),
  KEY `FK_TBL_HIMUDA_EMPLOYEE_HE_DEP_ID` (`HE_DEP_ID`),
  CONSTRAINT `FK_TBL_HIMUDA_EMPLOYEE_HE_DEP_ID` FOREIGN KEY (`HE_DEP_ID`) REFERENCES `tbl_himuda_department` (`HD_DEP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_employee`
--

LOCK TABLES `tbl_himuda_employee` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_plot_address`
--

DROP TABLE IF EXISTS `tbl_himuda_plot_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_plot_address` (
  `HPA_PLOT_CD` varchar(100) NOT NULL,
  `HPA_PLOT_NO` int(11) NOT NULL,
  `HPA_PLOT_STREET` varchar(25) DEFAULT NULL,
  `HPA_PLOT_SECTOR` varchar(5) DEFAULT NULL,
  `HPA_PLOT_CITY` varchar(30) DEFAULT NULL,
  `HPA_HPTDL_TYPE_CD` varchar(5) DEFAULT NULL,
  `HPA_TOWER` varchar(30) DEFAULT NULL,
  `HPA_BLOCK` varchar(30) DEFAULT NULL,
  `HPA_FLOOR_NO` varchar(5) DEFAULT NULL,
  `HPA_ADDRESS_COMMENT` varchar(100) DEFAULT NULL,
  `HPA_GUID` varchar(64) DEFAULT NULL,
  `HPA_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HPA_STATUS_CD` varchar(5) DEFAULT NULL,
  `HPA_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPA_CREATED_BY` varchar(50) DEFAULT NULL,
  `HPA_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPA_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HPA_PLOT_CD`),
  KEY `FK_TBL_HIMUDA_PLOT_ADDRESS_HPA_HPTDL_TYPE_CD` (`HPA_HPTDL_TYPE_CD`),
  KEY `K_TBL_HIMUDA_PLOT_ADDRESS_HPA_PLOT_CD` (`HPA_PLOT_CD`),
  CONSTRAINT `FK_TBL_HIMUDA_PLOT_ADDRESS_HPA_PLOT_CD` FOREIGN KEY (`HPA_PLOT_CD`) REFERENCES `tbl_himuda_plots` (`HP_PLOT_CD`),
  CONSTRAINT `FK_TBL_HIMUDA_PLOT_ADDRESS_HPA_HPTDL_TYPE_CD` FOREIGN KEY (`HPA_HPTDL_TYPE_CD`) REFERENCES `tbl_himuda_plot_type_details_lkp` (`HPTDL_TYPE_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_plot_address`
--

LOCK TABLES `tbl_himuda_plot_address` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_plot_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_plot_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_plot_allotment_details`
--

DROP TABLE IF EXISTS `tbl_himuda_plot_allotment_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_plot_allotment_details` (
  `HPAD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HPAD_PLOT_CD` varchar(100) NOT NULL,
  `HPAD_FIRST_ALLOTMENT_PERC` float DEFAULT NULL,
  `HPAD_FIRST_ALLOTMENT_AMT` double DEFAULT NULL,
  `HPAD_EARNEST_AMT` double DEFAULT NULL,
  `HPAD_AMT_PAID_TILL_DT` double DEFAULT NULL,
  `HPAD_ALLOTMENT_AMT_BAL` double DEFAULT NULL,
  `HPAD_AMT_BAL_DUE_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPAD_SECOND_ALLOTMENT_PERC` float DEFAULT NULL,
  `HPAD_SECOND_ALLOTMENT_AMT` double DEFAULT NULL,
  `HPAD_TOTAL_SECOND_EMI` int(11) DEFAULT NULL,
  `HPAD_FINAL_EMI_AMT` double DEFAULT NULL,
  `HPAD_EMI_START_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPAD_EMI_END_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPAD_GUID` varchar(64) DEFAULT NULL,
  `HPAD_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HPAD_STATUS_CD` varchar(5) DEFAULT NULL,
  `HPAD_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPAD_CREATED_BY` varchar(50) DEFAULT NULL,
  `HPAD_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPAD_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HPAD_ID`),
  KEY `FK_tbl_himuda_plot_allotment_details_HPAD_PLOT_CD` (`HPAD_PLOT_CD`),
  CONSTRAINT `FK_tbl_himuda_plot_allotment_details_HPAD_PLOT_CD` FOREIGN KEY (`HPAD_PLOT_CD`) REFERENCES `tbl_himuda_plots` (`HP_PLOT_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_plot_allotment_details`
--

LOCK TABLES `tbl_himuda_plot_allotment_details` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_plot_allotment_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_plot_allotment_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_plot_client`
--

DROP TABLE IF EXISTS `tbl_himuda_plot_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_plot_client` (
  `HPC_ID` int(11) NOT NULL,
  `HPC_PLOT_CD` varchar(100) NOT NULL,
  `HPC_CLIENT_ID` varchar(25) NOT NULL,
  `HPC_CLIENT_PSW` varchar(25) DEFAULT NULL,
  `HPC_FIRST_NAME` varchar(50) NOT NULL,
  `HPC_MIDDLE_NAME` varchar(50) DEFAULT NULL,
  `HPC_LAST_NAME` varchar(50) DEFAULT NULL,
  `HPC_GENDER` varchar(5) DEFAULT NULL,
  `HPC_DOB` date DEFAULT NULL,
  `HPC_SALUTATION` varchar(5) DEFAULT NULL,
  `HPC_FATHER_NAME` varchar(50) DEFAULT NULL,
  `HPC_MOTHER_NAME` varchar(50) DEFAULT NULL,
  `HPC_HUSBAND_NAME` varchar(50) DEFAULT NULL,
  `HPC_COMMENT` varchar(100) DEFAULT NULL,
  `HPC_GUID` varchar(64) DEFAULT NULL,
  `HPC_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HPC_STATUS_CD` varchar(5) DEFAULT NULL,
  `HPC_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPC_CREATED_BY` varchar(50) DEFAULT NULL,
  `HPC_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPC_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HPC_PLOT_CD`,`HPC_CLIENT_ID`),
  KEY `FK_TBL_HIMUDA_PLOT_CLIENT_HPC_ID` (`HPC_ID`),
  CONSTRAINT `FK_tbl_himuda_plot_client_HPC_PLOT_CD` FOREIGN KEY (`HPC_PLOT_CD`) REFERENCES `tbl_himuda_plots` (`HP_PLOT_CD`),
  CONSTRAINT `FK_TBL_HIMUDA_PLOT_CLIENT_HPC_ID` FOREIGN KEY (`HPC_ID`) REFERENCES `tbl_himuda_plot_client_mapping` (`HPCM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_plot_client`
--

LOCK TABLES `tbl_himuda_plot_client` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_plot_client` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_plot_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_plot_client_mapping`
--

DROP TABLE IF EXISTS `tbl_himuda_plot_client_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_plot_client_mapping` (
  `HPCM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HPCM_CLIENT_ID` varchar(25) NOT NULL,
  `HPCM_PLOT_CD` varchar(100) NOT NULL,
  `HPCM_TENTATIVE_COST` double DEFAULT NULL,
  `HPCM_TENTATIVE_DT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `HPCM_FINAL_COST` double DEFAULT NULL,
  `HPCM_FINAL_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPCM_COMMENT` varchar(100) DEFAULT NULL,
  `HPCM_GUID` varchar(64) DEFAULT NULL,
  `HPCM_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HPCM_STATUS_CD` varchar(5) DEFAULT NULL,
  `HPCM_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPCM_CREATED_BY` varchar(50) DEFAULT NULL,
  `HPCM_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPCM_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HPCM_ID`,`HPCM_CLIENT_ID`,`HPCM_PLOT_CD`),
  KEY `FK_tbl_himuda_plot_client_mapping_HPCM_PLOT_CD` (`HPCM_PLOT_CD`),
  CONSTRAINT `FK_tbl_himuda_plot_client_mapping_HPCM_PLOT_CD` FOREIGN KEY (`HPCM_PLOT_CD`) REFERENCES `tbl_himuda_plots` (`HP_PLOT_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_plot_client_mapping`
--

LOCK TABLES `tbl_himuda_plot_client_mapping` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_plot_client_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_plot_client_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_plot_emi_records`
--

DROP TABLE IF EXISTS `tbl_himuda_plot_emi_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_plot_emi_records` (
  `HPER_ID` int(11) NOT NULL,
  `HPER_EMI_ID` varchar(25) NOT NULL,
  `HPER_PLOT_CD` varchar(100) NOT NULL,
  `HPER_EMI_TYPE` varchar(25) NOT NULL,
  `HPER_EMI_RECIEVED_AMT` double DEFAULT NULL,
  `HPER_EMI_STATUS` varchar(5) NOT NULL,
  `HPER_Guid` varchar(64) DEFAULT NULL,
  `HPER_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HPER_STATUS_CD` varchar(5) DEFAULT NULL,
  `HPER_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPER_CREATED_BY` varchar(50) DEFAULT NULL,
  `HPER_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPER_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  KEY `FK_tbl_himuda_plot_emi_recordsHPER_PLOT_CD` (`HPER_PLOT_CD`),
  KEY `FK_tbl_himuda_plot_emi_records_HPER_EMI_ID` (`HPER_EMI_ID`),
  CONSTRAINT `FK_tbl_himuda_plot_emi_recordsHPER_PLOT_CD` FOREIGN KEY (`HPER_PLOT_CD`) REFERENCES `tbl_himuda_plots` (`HP_PLOT_CD`),
  CONSTRAINT `FK_tbl_himuda_plot_emi_records_HPER_EMI_ID` FOREIGN KEY (`HPER_EMI_ID`) REFERENCES `tbl_himuda_emi_schedule_details` (`HESD_EMI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_plot_emi_records`
--

LOCK TABLES `tbl_himuda_plot_emi_records` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_plot_emi_records` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_plot_emi_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_plot_possession_details`
--

DROP TABLE IF EXISTS `tbl_himuda_plot_possession_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_plot_possession_details` (
  `HPPD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HPPD_PLOT_CD` varchar(100) NOT NULL,
  `HPPD_FINAL_AMT` double NOT NULL,
  `HPPD_FINAL_REBATE_AMT` double DEFAULT NULL,
  `HPPD_FINAL_COST` double NOT NULL,
  `HPPD_FINAL_PERC` float DEFAULT NULL,
  `HPPD_FINAL_AMT_TO_PAY` double DEFAULT NULL,
  `HPPD_AMT_PAID_TILL_DT` double DEFAULT NULL,
  `HPPD_FINAL_AMT_BAL` double DEFAULT NULL,
  `HPPD_AMT_BAL_DUE_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPPD_FINAL_INTEREST_RATE` float DEFAULT NULL,
  `HPPD_TOTAL_FINAL_EMI` int(11) DEFAULT NULL,
  `HPPD_FINAL_EMI_AMT` double DEFAULT NULL,
  `HPPD_EMI_START_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPPD_EMI_END_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPPD_GUID` varchar(64) DEFAULT NULL,
  `HPPD_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HPPD_STATUS_CD` varchar(5) DEFAULT NULL,
  `HPPD_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPPD_CREATED_BY` varchar(50) DEFAULT NULL,
  `HPPD_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPPD_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HPPD_ID`),
  KEY `FK_tbl_himuda_plot_possession_details_HPPD_PLOT_CD` (`HPPD_PLOT_CD`),
  CONSTRAINT `FK_tbl_himuda_plot_possession_details_HPPD_PLOT_CD` FOREIGN KEY (`HPPD_PLOT_CD`) REFERENCES `tbl_himuda_plots` (`HP_PLOT_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_plot_possession_details`
--

LOCK TABLES `tbl_himuda_plot_possession_details` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_plot_possession_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_plot_possession_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_plot_type_details_lkp`
--

DROP TABLE IF EXISTS `tbl_himuda_plot_type_details_lkp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_plot_type_details_lkp` (
  `HPTDL_TYPE_CD` varchar(10) NOT NULL,
  `HPTL_TYPE_DESCRIPTION` varchar(50) NOT NULL,
  `HPTDL_HPTL_TYPE_CD` varchar(5) NOT NULL,
  `HPTDL_GUID` varchar(64) DEFAULT NULL,
  `HPTDL_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HPTDL_STATUS_CD` varchar(5) DEFAULT NULL,
  `HPTDL_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPTDL_CREATED_BY` varchar(50) DEFAULT NULL,
  `HPTDL_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPTDL_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HPTDL_TYPE_CD`),
  KEY `FK_tbl_himuda_plot_type_details_lkp_HPTDL_HPTL_TYPE_CD` (`HPTDL_HPTL_TYPE_CD`),
  CONSTRAINT `FK_tbl_himuda_plot_type_details_lkp_HPTDL_HPTL_TYPE_CD` FOREIGN KEY (`HPTDL_HPTL_TYPE_CD`) REFERENCES `tbl_himuda_plot_type_lkp` (`HPTL_TYPE_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_plot_type_details_lkp`
--

LOCK TABLES `tbl_himuda_plot_type_details_lkp` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_plot_type_details_lkp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_plot_type_details_lkp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_plot_type_lkp`
--

DROP TABLE IF EXISTS `tbl_himuda_plot_type_lkp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_plot_type_lkp` (
  `HPTL_TYPE_CD` varchar(5) NOT NULL,
  `HPTL_TYPE_DESCRIPTION` varchar(50) NOT NULL,
  `HPTL_GUID` varchar(64) DEFAULT NULL,
  `HPTL_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HPTL_STATUS_CD` varchar(5) DEFAULT NULL,
  `HPTL_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPTL_CREATED_BY` varchar(50) DEFAULT NULL,
  `HPTL_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HPTL_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HPTL_TYPE_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_plot_type_lkp`
--

LOCK TABLES `tbl_himuda_plot_type_lkp` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_plot_type_lkp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_plot_type_lkp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_plots`
--

DROP TABLE IF EXISTS `tbl_himuda_plots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_plots` (
  `HP_PLOT_CD` varchar(100) NOT NULL,
  `HP_PLOT_TYPE` varchar(5) NOT NULL,
  `HP_PLOT_AREA` bigint(20) NOT NULL,
  `HP_PLOT_UNIT_CD` varchar(20) DEFAULT NULL,
  `HP_PLOT_CITY` varchar(50) DEFAULT NULL,
  `HP_PLOT_PINCODE` int(11) DEFAULT NULL,
  `HP_PLOT_DISTRICT` varchar(50) DEFAULT NULL,
  `HP_PLOT_STATE` varchar(50) DEFAULT NULL,
  `HP_GUID` varchar(64) DEFAULT NULL,
  `HP_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HP_STATUS_CD` varchar(5) DEFAULT NULL,
  `HP_CREATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HP_CREATED_BY` varchar(50) DEFAULT NULL,
  `HP_LAST_UPDATED_DT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `HP_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HP_PLOT_CD`),
  KEY `Foriegn Key` (`HP_PLOT_TYPE`),
  CONSTRAINT `FK_TBL_HIMUDA_PLOTS_HP_PLOT_TYPE` FOREIGN KEY (`HP_PLOT_TYPE`) REFERENCES `tbl_himuda_plot_type_lkp` (`HPTL_TYPE_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_plots`
--

LOCK TABLES `tbl_himuda_plots` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_plots` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_plots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_himuda_status_lkp`
--

DROP TABLE IF EXISTS `tbl_himuda_status_lkp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_himuda_status_lkp` (
  `HSL_CD` varchar(5) NOT NULL DEFAULT '',
  `HSL_DESCRIPTION` varchar(50) DEFAULT NULL,
  `HSL_GUID` varchar(64) DEFAULT NULL,
  `HSL_SYSTEM_ROW_CD` bit(1) DEFAULT NULL,
  `HSL_STATUS_CD` varchar(5) DEFAULT NULL,
  `HSL_CREATED_DT` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `HSL_CREATED_BY` varchar(50) DEFAULT NULL,
  `HSL_LAST_UPDATED_DT` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `HSL_LAST_UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HSL_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_himuda_status_lkp`
--

LOCK TABLES `tbl_himuda_status_lkp` WRITE;
/*!40000 ALTER TABLE `tbl_himuda_status_lkp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_himuda_status_lkp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-02 13:02:55
