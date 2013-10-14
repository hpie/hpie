Std
code  50, values 100, desc 500, remarks 1000,  

CREATE TABLE IF NOT EXISTS `m_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_code` varchar (50) NOT NULL,
  `role_desc` varchar (500) NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- INSERT--
INSERT INTO  `m_role` 
(`id` ,`role_code` ,`role_desc` ,`status_cd` ,`created_dt` ,`created_by` ,`updated_dt` ,`updated_by`)
VALUES 
(NULL ,  'sysadmin',  'sysadmin',  'I', CURRENT_TIMESTAMP , NULL ,  '0000-00-00 00:00:00', NULL),
(NULL ,  'director',  'Director',  'A', CURRENT_TIMESTAMP , NULL ,  '0000-00-00 00:00:00', NULL),
(NULL ,  'manager',  'Divisional Manager',  'A', CURRENT_TIMESTAMP , NULL ,  '0000-00-00 00:00:00', NULL),
(NULL ,  'admin',  'Can create masters',  'A', CURRENT_TIMESTAMP , NULL ,  '0000-00-00 00:00:00', NULL),
(NULL ,  'user',  'User makes entries to the system',  'A', CURRENT_TIMESTAMP , NULL ,  '0000-00-00 00:00:00', NULL),
(NULL ,  'client',  'Client only views reports',  'A', CURRENT_TIMESTAMP , NULL ,  '0000-00-00 00:00:00', NULL),
(NULL ,  'guest',  'View Only',  'A', CURRENT_TIMESTAMP , NULL ,  '0000-00-00 00:00:00', NULL);



CREATE TABLE IF NOT EXISTS `m_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_fname` varchar (100) NOT NULL,
  `user_lname` varchar (100) NOT NULL,
  `user_id` varchar (100) NOT NULL,
  `user_pass` varchar (100) NOT NULL,
  `user_email` varchar (100) NOT NULL,
  `role_code` varchar (50) NOT NULL,
  `division_code` varchar (50) NOT NULL,
  `user_desc` varchar (500) NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- INSERT--
INSERT INTO `m_user` (`id`, `user_fname`, `user_lname`, `user_id`, `user_pass`, `user_email`, `role_code`, `division_code`, `user_desc`, `status_cd`) 
VALUES
(1, 'Admin', 'Shimla', 'admin', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Shimla', '', 'A'),
(2, 'User', 'Chamba', 'chamba', '2be70f6897e5e8bb554828cfdd09917f', 'forest@forest.com', 'client', 'Chamba', '', 'A'),
(3, 'User', 'Chopal', 'chopal', 'c4f49cce9573ccee3bb8b0477e256055', 'forest@forest.com', 'client', 'Chopal', '', 'A'),
(4, 'User', 'Dharamsala', 'dharamsala', '471e3a446997b62eb780e641a8593d32', 'forest@forest.com', 'client', 'Dharamsala', '', 'A'),
(5, 'User', 'Fatehpur', 'fatehpur', '7b45d5cf2eb40eee83f5181e9878b8da', 'forest@forest.com', 'client', 'Fatehpur', '', 'A'),
(6, 'User', 'Hamirpur', 'hamirpur', '5699dd828b0471208fd7915fe405a7ab', 'forest@forest.com', 'client', 'Hamirpur', '', 'A'),
(7, 'User', 'Kullu', 'kullu', '600d40f0e5eeb8d47299b7661284decb', 'forest@forest.com', 'client', 'Kullu', '', 'A'),
(8, 'User', 'Mandi', 'mandi', 'b45203151a9f2a7368ea53ab8c51d3a7', 'forest@forest.com', 'client', 'Mandi', '', 'A'),
(9, 'User', 'Nahan', 'nahan', '65368e319c522edcb2981b90189e115d', 'forest@forest.com', 'client', 'Nahan', '', 'A'),
(10, 'User', 'Rampur', 'rampur', 'e4353b8889087deaf0c684a60065c9cd', 'forest@forest.com', 'client', 'Rampur', '', 'A'),
(11, 'User', 'Sawra', 'sawra', '0e1cc7c95ff39b0b79fccf310103be86', 'forest@forest.com', 'client', 'Sawra', '', 'A'),
(12, 'User', 'Shimla', 'shimla', '340b2cdaf0720e1cabe4f9270474ef39', 'forest@forest.com', 'client', 'Shimla', '', 'A'),
(13, 'User', 'Solan', 'solan', '794bde2ceefa657be4b59ee162b48eb4', 'forest@forest.com', 'client', 'Solan', '', 'A'),
(14, 'User', 'SunderNagar', 'sundernagar', '30190339abe8cd55aa8ed242ea14415a', 'forest@forest.com', 'client', 'SunderNagar', '', 'A'),
(15, 'User', 'Una', 'una', '3fff14fd3bef9016d6d7a83beabf6aac', 'forest@forest.com', 'client', 'Una', '', 'A'),
(16, 'Admin', 'Shimla', 'adminshimla', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Shimla', '', 'A'),
(17, 'Admin', 'Chamba', 'adminchamba', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Chamba', '', 'A'),
(18, 'Admin', 'Chopal', 'adminchopal', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Chopal', '', 'A'),
(19, 'Admin', 'Dharamsala', 'admindharamsala', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Dharamsala', '', 'A'),
(20, 'Admin', 'Fatehpur', 'adminfatehpur', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Fatehpur', '', 'A'),
(21, 'Admin', 'Hamirpur', 'adminhamirpur', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Hamirpur', '', 'A'),
(22, 'Admin', 'Kullu', 'adminkullu', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Kullu', '', 'A'),
(23, 'Admin', 'Mandi', 'adminmandi', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Mandi', '', 'A'),
(24, 'Admin', 'Nahan', 'adminnahan', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Nahan', '', 'A'),
(25, 'Admin', 'Rampur', 'adminrampur', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Rampur', '', 'A'),
(26, 'Admin', 'Sawra', 'adminsawra', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Sawra', '', 'A'),
(27, 'Admin', 'Solan', 'adminsolan', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Solan', '', 'A'),
(28, 'Admin', 'SunderNagar', 'adminsundernagar', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'SunderNagar', '', 'A'),
(29, 'Admin', 'Una', 'adminuna', 'eff7d5dba32b4da32d9a67a519434d3f', 'forest@forest.com', 'admin', 'Una', '', 'A');

---------------------------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `m_division` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `division_code` varchar (50) NOT NULL,
  `division_name` varchar (100) NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT

INSERT INTO `m_division` 
(`id`, `division_code`, `division_name`, `status_cd`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) 
VALUES 
(NULL, 'Chamba', 'Chamba', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'Chopal', 'Chopal', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Dharamsala', 'Dharamsala', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Fatehpur', 'Fatehpur', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Hamirpur', 'Hamirpur', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Kullu', 'Kullu', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Mandi', 'Mandi', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Nahan', 'Nahan', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Rampur', 'Rampur', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Sawra', 'Sawra', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Shimla', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Solan', 'Solan', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Sundernagar', 'Sundernagar', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Una', 'Una' , 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL);

----------------------------------------------------------------------------------------------------------


CREATE TABLE IF NOT EXISTS `m_unit` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit_code` varchar (50) NOT NULL,
  `unit_name` varchar (100) NOT NULL,
  `division_code` varchar (50) NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--

INSERT INTO `m_unit` 
(`id`, `unit_code`, `unit_name`, `division_code`, `status_cd`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) 
VALUES 
(NULL, 'Shimla_unit', 'Shimla Unit', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'Theog_unit', 'Shimla Unit', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Kotgarh_unit', 'Shimla Unit', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL);


----------------------------------------------------------------------------------------------------------


CREATE TABLE IF NOT EXISTS `m_dfo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dfo_code` varchar (50) NOT NULL,
  `dfo_name` varchar (100) NOT NULL,
  `division_code` varchar (50) NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--

INSERT INTO `m_dfo` 
(`id`, `dfo_code`, `dfo_name`, `division_code`, `status_cd`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) 
VALUES 
(NULL, 'Shimla_Dfo', 'DFO Shimla', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'Theog_Dfo', 'DFo Theog', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Ani_Dfo', 'DFO Ani', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL);


----------------------------------------------------------------------------------------------------------


CREATE TABLE IF NOT EXISTS `m_range` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `range_code` varchar (50) NOT NULL,
  `range_name` varchar (100) NOT NULL,
  `dfo_code` varchar (50) NOT NULL,
  `division_code` varchar (50) NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--

INSERT INTO `m_range` 
(`id`, `range_code`, `range_name`, `dfo_code`, `division_code`, `status_cd`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) 
VALUES 
(NULL, 'Shimla_Rng', 'Shimla Range', 'Shimla_Dfo', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'Theog_Rng', 'Shimla Range', 'Shimla_Dfo', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Kotgarh_Rng', 'Shimla Range', 'Ani_Dfo', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL);

----------------------------------------------------------------------------------------------------------


CREATE TABLE IF NOT EXISTS `m_forest` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `forest_code` varchar (50) NOT NULL,
  `forest_name` varchar (100) NOT NULL,
  `range_code` varchar (50) NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--

INSERT INTO `m_forest` 
(`id`, `forest_code`, `forest_name`, `range_code`, `forest_zone`, `status_cd`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) 
VALUES 
(NULL, 'Shimla_Frst', 'Shimla Forest', 'Shimla_Rng', 'Cold', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Shoghi_Frst', 'Shoghi Forest', 'Shimla_Rng', 'Moderately Hot', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'Theog_Frst', 'Theog Forest', 'Theog_Rng', 'Hot', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Kotgarh_Frst', 'Kotgarh Forest', 'Cold', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL);



CREATE TABLE IF NOT EXISTS `m_forest_rsd` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `forest_rsd_code` varchar (50) NOT NULL,
  `forest_code` varchar (50) NOT NULL,
  `forest_rsd_name` varchar (100) NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--

INSERT INTO `m_forest_rsd` 
(`id`, `forest_rsd_code`, `forest_code`, `forest_rsd_name`, `status_cd`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) 
VALUES 
(NULL, 'Shimla_RSD', 'Shimla_Frst', 'Shimla_RSD', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'Sanjauli_RSD', 'Shimla_Frst', 'Sanjauli_RSD', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'Kumarsain_RSD', 'Kotgarh_Frst', 'Kumarsain_RSD', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL);


-- lot number are once created for a forest and  reused
CREATE TABLE IF NOT EXISTS `m_lot` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lot_no` varchar (100) NOT NULL,
  `lot_desc` varchar (500) NOT NULL,
  `forest_code` varchar (50) NOT NULL,
  `division_code` varchar (50) NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--

INSERT INTO `m_lot` 
(`id`, `lot_no`, `lot_desc`, `forest_code`,  `division_code`, `status_cd`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) 
VALUES 
(NULL, '1-Shimla', 'First Lot for Shimla', 'Shimla_Frst', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, '1-Shimla',' First Lot for Shimla', 'Shoghi_Frst', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, '2-Shimla', 'Second Lot for Shimla', 'Theog_Frst', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, '3-Shimla',' Third Lot for Shimla', 'Shoghi_Frst', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, '3-Shimla',' Third Lot for Shimla', 'Shimla_Frst', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, '4-Shimla', 'Fourth Lot for Shimla', 'Theog_Frst', 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL);




-- Schedule rates master 
CREATE TABLE IF NOT EXISTS `m_schedule_rate` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `srate_code` varchar (50) NOT NULL,
  `srate_name` varchar (100) NOT NULL,
  `srate_desc` varchar (500) NOT NULL,
  `srate` float (10,2) NOT NULL,
  `season_year` date NOT NULL,
  `division_code` varchar (50) NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--
INSERT INTO `m_schedule_rate` 
(`id`, `srate_code`, `srate_name`, `srate_desc`, `srate`,  `season_year`, `division_code`, `status_cd`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) 
VALUES 
(NULL, 'yps-h-20', 'Yield per Section 20Q Hot', 'Yield per Section 20Q Hot', '503', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mh-20', 'Yield per Section 20Q Moderately Hot', 'Yield per Section 20Q Moderately Hot', '577', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'yps-c-20', 'Yield per Section 20Q Cold', 'Yield per Section 20Q Cold', '687', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mhs-20', 'Yield per Section 20Q Moderately Hot Sun', 'Yield per Section 20Q Moderately Hot for Sundernagar', '577', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-h-25', 'Yield per Section 25Q Hot', 'Yield per Section 25Q Hot', '565', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mh-25', 'Yield per Section 25Q Moderately Hot', 'Yield per Section 25Q Moderately Hot', '651', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'yps-c-25', 'Yield per Section 25Q Cold', 'Yield per Section 25Q Cold', '786', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mhs-25', 'Yield per Section 25Q Moderately Hot Sun', 'Yield per Section 25Q Moderately Hot for Sundernagar', '651', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-h-30', 'Yield per Section 30Q Hot', 'Yield per Section 30Q Hot', '687', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mh-30', 'Yield per Section 30Q Moderately Hot', 'Yield per Section 30Q Moderately Hot', '773', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'yps-c-30', 'Yield per Section 30Q Cold', 'Yield per Section 30Q Cold', '993', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mhs-30', 'Yield per Section 30Q Moderately Hot Sun', 'Yield per Section 30Q Moderately Hot for Sundernagar', '773', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-h-35', 'Yield per Section 35Q Hot', 'Yield per Section 35Q Hot', '749', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mh-35', 'Yield per Section 35Q Moderately Hot', 'Yield per Section 35Q Moderately Hot', '835', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'yps-c-35', 'Yield per Section 35Q Cold', 'Yield per Section 35Q Cold', '1031', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mhs-35', 'Yield per Section 35Q Moderately Hot Sun', 'Yield per Section 35Q Moderately Hot for Sundernagar', '835', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-h-40', 'Yield per Section 40Q Hot', 'Yield per Section 40Q Hot', '810', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mh-40', 'Yield per Section 40Q Moderately Hot', 'Yield per Section 40Q Moderately Hot', '908', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'yps-c-40', 'Yield per Section 40Q Cold', 'Yield per Section 40Q Cold', '1129', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mhs-40', 'Yield per Section 40Q Moderately Hot Sun', 'Yield per Section 40Q Moderately Hot for Sundernagar', '908', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-h-45', 'Yield per Section 45Q Hot', 'Yield per Section 45Q Hot', '908', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mh-45', 'Yield per Section 45Q Moderately Hot', 'Yield per Section 45Q Moderately Hot', '1018', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'yps-c-45', 'Yield per Section 45Q Cold', 'Yield per Section 45Q Cold', '1228', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mhs-45', 'Yield per Section 40Q Moderately Hot Sun', 'Yield per Section 40Q Moderately Hot for Sundernagar', '1043', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-h-50', 'Yield per Section 50Q Hot', 'Yield per Section 50Q Hot', '1051', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mh-50', 'Yield per Section 50Q Moderately Hot', 'Yield per Section 50Q Moderately Hot', '1068', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL), 
(NULL, 'yps-c-50', 'Yield per Section 50Q Cold', 'Yield per Section 50Q Cold', '1301', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mhs-50', 'Yield per Section 50Q Moderately Hot Sun', 'Yield per Section 50Q Moderately Hot for Sundernagar', '1068', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'yps-mhs-42', 'Yield per Section 42Q Moderately Hot Sun', 'Yield per Section 42Q Moderately Hot for Sundernagar', '1019', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'csps-1000', 'Crop Setting per Section of 1000', 'Crop Setting per Section of 1000', '1873', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'mc-1000', 'Mate Comission per Quintal', 'Mate Comission per Quintal', '20', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'rc-rsd-l-1000', 'Resin carriage to RSD Manual per Qtl', 'Carriage of Reain to RSD per quintal per KM by Labor', '42', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'rc-rsd-m-1000', 'Resin carriage to RSD Mule per Qtl', 'Carriage of Reain to RSD per quintal per KM by Mule', '34', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'tc-e-m-100', 'Tin carriage(empty) per 100 per KM', 'Carriage of empty tins per 100 per KM by Labor', '32.25', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'let-100-50', 'Loading empty tins per 100 per 50 mts', 'Loadin of empty tins per 100 per 50 mtrs by Labor', '27.85', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'let-100-100', 'Loading empty tins per 100 per 100 mts', 'Loadin of empty tins per 100 per 100 mtrs by Labor', '30.85', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'led-100-50', 'Loading empty drums per 100 per 50 mts', 'Loadin of empty drums per 100 per 50 mtrs by Labor', '36.60', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'led-100-100', 'Loading empty drums per 100 per 100 mts', 'Loadin of empty drums per 100 per 100 mtrs by Labor', '36.60', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'lft-100-50', 'Loading resin filled tins per 100 per 50 mts', 'Loadin of resin filled tins per 100 per 50 mtrs by Labor', '96.90', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'lft-100-100', 'Loading resin filled tins per 100 per 100 mts', 'Loadin of resin filled tins per 100 per 100 mtrs by Labor', '113.05', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'lfd-100-50', 'Loading resin filled drums per 100 per 50 mts', 'Loadin of resin filled drums per 100 per 50 mtrs by Labor', '133.40', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'lfd-100-100', 'Loading resin filled drums per 100 per 100 mts', 'Loadin of resin filled drums per 100 per 100 mtrs by Labor', '140.40', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'uet-100-50', 'Unloading empty tins per 100 per 50 mts', 'Unloading of empty tins per 100 per 50 mtrs by Labor', '27.85', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'uet-100-100', 'unloading empty tins per 100 per 100 mts', 'Unloading of empty tins per 100 per 100 mtrs by Labor', '30.85', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'ued-100-50', 'Unloading empty drums per 100 per 50 mts', 'Loading of empty drums per 100 per 50 mtrs by Labor', '36.60', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'ued-100-100', 'Unloading empty drums per 100 per 100 mts', 'Loading of empty drums per 100 per 100 mtrs by Labor', '36.60', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'uft-100-50', 'Unloading resin filled tins per 100 per 50 mts', 'Loading of resin filled tins per 100 per 50 mtrs by Labor', '96.90', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'uft-100-100', 'Unloading resin filled tins per 100 per 100 mts', 'Loading of resin filled tins per 100 per 100 mtrs by Labor', '113.05', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'ufd-100-50', 'Unloading resin filled drums per 100 per 50 mts', 'Loading of resin filled drums per 100 per 50 mtrs by Labor', '133.40', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'ufd-100-100', 'Unloading resin filled drums per 100 per 100 mts', 'Loading of resin filled drums per 100 per 100 mtrs by Labor', '140.40', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'col-100', 'Conversion of lips per 100', 'Conversion of lips (per 100 lips)', '29.55', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'cop-1', 'Conversion of pots', 'Conversion of tin pots (per pot)', '1.05', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'mcd-1000', 'Material carriage per quintal', 'Carriage of depot material per qtl', '14.78', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'sft-1', 'Soldering of resin filled tins', 'Soldering of resin filled tins (per tin)', '2.10', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'tpt-25', 'Transportation of resin ', 'Transportation of resin upto 25 km', '28.80', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL),
(NULL, 'tpt-r-1', 'Transportation of resin per km ', 'Transportation of resin per km beyond 25 km', '0.40', now(), 'Shimla', 'A', CURRENT_TIMESTAMP, 'system', '0000-00-00 00:00:00', NULL);


----------------------------------------------------------------------------------------------------------

---there can be miltiple forest in one lot for which blazes are reveived
CREATE TABLE IF NOT EXISTS `t_blazes_for_tapping` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `division_code` varchar (50) NOT NULL,
  `unit_code` varchar (50) NOT NULL,
  `dfo_code` varchar (50) NOT NULL,
  `range_code` varchar (50) NOT NULL,
  `forest_code` varchar (50) NOT NULL,
  `lot_no` varchar (100) NOT NULL,
  `blazes_received` int  NOT NULL DEFAULT '0',
  `taken_over_dt` date NOT NULL,
  `season_year` date NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--
INSERT INTO  `forest_resin`.`t_blazes_for_tapping` (
`id` ,
`division_code` ,
`unit_code` ,
`dfo_code` ,
`range_code` ,
`forest_code` ,
`lot_no` ,
`blazes_received` ,
`taken_over_dt` ,
`season_year` ,
`status_cd` ,
`created_dt` ,
`created_by` ,
`updated_dt` ,
`updated_by`
)
VALUES 
(
NULL ,  'Shimla',  'Shimla_unit',  'Shimla_Dfo',  'Shimla_Rng',  'Shoghi_Frst',  '1-Shimla',  '100',  '2010-02-15',  '2010-02-15',  'A', 
CURRENT_TIMESTAMP ,  'system',  '0000-00-00 00:00:00', NULL
),
(
NULL ,  'Shimla',  'Shimla_unit',  'Shimla_Dfo',  'Shimla_Rng',  'Shimla_Frst',  '1-Shimla',  '100',  '2010-02-15',  '2010-02-15',  'A', 
CURRENT_TIMESTAMP ,  'system',  '0000-00-00 00:00:00', NULL
),
(NULL ,  'Shimla',  'Shimla_unit',  'Shimla_Dfo',  'Theog_Rng',  'Theog_Frst',  '2-Shimla',  '200',  '2010-02-15',  '2010-02-15',  'A', 
CURRENT_TIMESTAMP ,  'system',  '0000-00-00 00:00:00', NULL
),
(
NULL ,  'Shimla',  'Theog_unit',  'Theog_Dfo',  'Theog_Rng',  'Theog_Frst',  '4-Shimla',  '400',  '2010-02-15',  '2010-02-15',  'A', 
CURRENT_TIMESTAMP ,  'system',  '0000-00-00 00:00:00', NULL
),
(NULL ,  'Shimla',  'Shimla_unit',  'Shimla_Dfo',  'Shimla_Rng',  'Shoghi_Frst',  '3-Shimla',  '300',  '2010-02-15',  '2010-02-15',  'A', 
CURRENT_TIMESTAMP ,  'system',  '0000-00-00 00:00:00', NULL
),
(
NULL ,  'Shimla',  'Shimla_unit',  'Shimla_Dfo',  'Shimla_Rng',  'Shimla_Frst',  '3-Shimla',  '300',  '2010-02-15',  '2010-02-15',  'A', 
CURRENT_TIMESTAMP ,  'system',  '0000-00-00 00:00:00', NULL
);

-- blazes reveived for each forest and its proposed yield
-- approval_status  A approved P pending S sent R rejected 
CREATE TABLE IF NOT EXISTS `t_proposed_yield_form_blazes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `division_code` varchar (50) NOT NULL,
  `unit_code` varchar (50) NOT NULL,
  `dfo_code` varchar (50) NOT NULL,
  `forest_code` varchar (50) NOT NULL,
  `lot_no` varchar (100) NOT NULL,
  `blazes_received` int  NOT NULL DEFAULT '0',
  `proposed_yield` float (10,3) NOT NULL DEFAULT '0',
  `approved_yield` float (10,3) NOT NULL DEFAULT '0',
  `approval_yield_status` varchar(5) DEFAULT 'P',
  `proposed_rate` float (10,2) NOT NULL DEFAULT '0',
  `approved_rate` float (10,2)  NOT NULL DEFAULT '0',
  `approval_rate_status` varchar(5) DEFAULT 'P',
  `season_year` date NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--


CREATE TABLE IF NOT EXISTS `t_rate_calculation_for_lot` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `division_code` varchar (50) NOT NULL,
  `lot_no` varchar (100) NOT NULL,
  `total_blazes` int  NOT NULL DEFAULT '0',
  `proposed_yield` float (10,3) NOT NULL DEFAULT '0',
  `total_turnout` float (10,3) NOT NULL DEFAULT '0',
  `number_of_mazdoor` int NOT NULL DEFAULT '0',
  `eow_code` varchar (50) NOT NULL,
  `com_code` varchar (50) NOT NULL,
  `total_eow` float (10,2) NOT NULL DEFAULT '0',
  `total_com` float (10,2) NOT NULL DEFAULT '0',
  `total_expenditure` float (10,2) NOT NULL DEFAULT '0',
  `rate_calculated` float (10,2) NOT NULL DEFAULT '0',
  `season_year` date NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--

CREATE TABLE IF NOT EXISTS `t_expenditure_on_work` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `division_code` varchar (50) NOT NULL,
  `lot_no` varchar (100) NOT NULL,
  `eow_code` varchar (50) NOT NULL,
  `total_blazes` int  NOT NULL DEFAULT '0',
  `cost_crop_setting` int  NOT NULL DEFAULT '0' COMMENT  'Crop setting rate per thousand balzes.',
  `exp_crop_setting` int  NOT NULL DEFAULT '0' COMMENT  'Expenditure calcualted for crop setting (totalblz*cost_cs/1000).', 
  `total_blazes_hot_zone` int  NOT NULL DEFAULT '0',
  `total_blazes_cold_zone` int  NOT NULL DEFAULT '0',
  `total_blazes_mhot_zone` int  NOT NULL DEFAULT '0',
  `total_blazes_shot_zone` int  NOT NULL DEFAULT '0',
  `cost_extr_hot_zone` int  NOT NULL DEFAULT '0',
  `cost_extr_cold_zone` int  NOT NULL DEFAULT '0',
  `cost_extr_mhot_zone` int  NOT NULL DEFAULT '0',
  `cost_extr_shot_zone` int  NOT NULL DEFAULT '0',
  `proposed_yield` float (10,3) NOT NULL DEFAULT '0',
  `proposed_yield_ps_hot_zone` int  NOT NULL DEFAULT '0',
  `proposed_yield_ps_cold_zone` int  NOT NULL DEFAULT '0',
  `proposed_yield_ps_mhot_zone` int  NOT NULL DEFAULT '0',
  `proposed_yield_ps_shot_zone` int  NOT NULL DEFAULT '0',
  `total_turnout` float (10,3) NOT NULL DEFAULT '0' COMMENT  'Calcualted as (total_blazes*proposed_yield/1000).',
  `total_turnout_hot_zone` int  NOT NULL DEFAULT '0',
  `total_turnout_cold_zone` int  NOT NULL DEFAULT '0',
  `total_turnout_mhot_zone` int  NOT NULL DEFAULT '0',
  `total_turnout_shot_zone` int  NOT NULL DEFAULT '0',
  `exp_extr_turnout` float (10,3)  NOT NULL DEFAULT '0' COMMENT  'Expenditure calcualted for extraction (totalturnout*cost_extr).',
  `total_tins` int  NOT NULL DEFAULT '0' COMMENT  'Total Tins Needed ((totalturnout/weightofTin)*100).',
  `distance_to_rsd` float (10,1)  NOT NULL DEFAULT '0' COMMENT  'average distance from fores to RSD',
  `cost_tpt_tins_to_forest` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Cost to transportation/carrying of empty tins to forest ',
  `exp_tpt_tins_to_forest` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Expentiture transportation/carrying of empty tins to forest  (cost_tpt_tins_to_forest*distance_to_rsd*total_tins)/10  ',
  `cost_tpt_tins_to_rsd` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Cost to transportation/carrying of filled tins to rsd ',
  `exp_tpt_tins_to_forest` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Expentiture transportation/carrying of filled tins to rds  (cost_tpt_tins_to_rsd*distance_to_rsd*total_tins)/10  ',
  `cost_tpt_drums_to_forest` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Cost to transportation/carrying of empty drums to forest ',
  `exp_tpt_tins_to_forest` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Expentiture transportation/carrying of empty drums to forest  (cost_tpt_drums_to_forest*distance_to_rsd*total_tins)/10  ',
  `cost_tpt_drums_to_rsd` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Cost to transportation/carrying of filled drums to rsd ',
  `exp_tpt_tins_to_rsd` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Expentiture transportation/carrying of filled drums to rsd  (cost_tpt_drums_to_rsd*distance_to_rsd*total_tins)/10  ',
  `cost_carriage_mule_rsd` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Cost for mule carriage per quintal',
  `exp_carriage_mule_rsd` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Expentiture on mule carriage total_turnout*distance_to_rsd*cost_carriage_mule_rsd',
  `cost_carriage_manual_rsd` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Cost for manual carriage per quintal',
  `exp_carriage_mule_rsd` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Expentiture on manual carriage total_turnout*distance_to_rsd*cost_carriage_manual_rsd',
  `cost_mate_commission` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Cost for mate comission per quintal',
  `exp_mate_commission` float (10,2)  NOT NULL DEFAULT '0' COMMENT  'Expentiture on mate comission  total_turnout*cost_mate_commission',
  `number_of_mazdoor` int NOT NULL DEFAULT '0',
  `season_year` date NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--


CREATE TABLE IF NOT EXISTS `t_cost_of_material` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `division_code` varchar (50) NOT NULL,
  `lot_no` varchar (100) NOT NULL,
  `com_code` varchar (50) NOT NULL,
  `total_blazes` int  NOT NULL DEFAULT '0',
  `number_of_mazdoor` int NOT NULL DEFAULT '0',
  `cost_blaze_frame` float (10,2) NOT NULL DEFAULT '0',
  `exp_blaze_frame` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   number_of_mazdoor*cost_blaze_frame',
  `cost_bark_shaver` float (10,2) NOT NULL DEFAULT '0',
  `exp_bark_shaver` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   number_of_mazdoor*cost_blaze_frame',
  `cost_groove_cutter` float (10,2) NOT NULL DEFAULT '0',
  `exp_groove_cutter` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   number_of_mazdoor*cost_blaze_frame',
  `cost_freshning_knfe ` float (10,2) NOT NULL DEFAULT '0',
  `exp_freshning_knife` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   number_of_mazdoor*cost_blaze_frame',
  `cost_spray_bottle` float (10,2) NOT NULL DEFAULT '0',
  `exp__spray_bottle` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   number_of_mazdoor*cost_blaze_frame',
  `cost_hammer_nailpuller` float (10,2) NOT NULL DEFAULT '0',
  `exp_hammer_nailpuller` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   number_of_mazdoor*cost_blaze_frame',
  `cost_pot_scrapper` float (10,2) NOT NULL DEFAULT '0',
  `exp_pot_scrapper` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   number_of_mazdoor*cost_blaze_frame',
  `cost_pots ` float (10,2) NOT NULL DEFAULT '0',
  `exp_pots` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   total_blazes/2*cost_pots',
  `cost_lips` float (10,2) NOT NULL DEFAULT '0',
  `exp_lips` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   total_blazes*cost_lips',
  `cost_wire_nails_5cm` float (10,2) NOT NULL DEFAULT '0',
  `qty_wire_nails_5cm` float (10,3) NOT NULL DEFAULT '0',
  `exp_wire_nails_5cm` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   cost_wire_nails_5cm*qty_wire_nails_5cm',
  `cost_wire_nails_2cm` float (10,2) NOT NULL DEFAULT '0',
  `qty_wire_nails_2cm` float (10,3) NOT NULL DEFAULT '0',
  `exp_wire_nails_2cm` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   cost_wire_nails_2cm*qty_wire_nails_2cm',
  `cost_solder` float (10,2) NOT NULL DEFAULT '0',
  `qty_solder` float (10,3) NOT NULL DEFAULT '0',
  `exp_solder` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   cost_solder*qty_solder',
  `cost_naushader` float (10,2) NOT NULL DEFAULT '0',
  `qty_naushader` float (10,3) NOT NULL DEFAULT '0',
  `exp_naushader` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   cost_naushader*qty_naushader',
  `cost_charcoal` float (10,2) NOT NULL DEFAULT '0',
  `qty_charcoal` float (10,3) NOT NULL DEFAULT '0',
  `exp_charcoal` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   cost_charcoal*qty_charcoal',
  `cost_tool_sharpen` float (10,2) NOT NULL DEFAULT '0',
  `exp_tool_sharpen` float (10,2) NOT NULL DEFAULT '0' COMMENT 'Expenditure   number_of_mazdoor*cost_tool_sharpen',
  `number_of_mazdoor` int NOT NULL DEFAULT '0',
  `season_year` date NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- INSERT--