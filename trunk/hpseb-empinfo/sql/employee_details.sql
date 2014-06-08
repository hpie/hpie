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
//  `division_code` varchar (50) NOT NULL,
  `user_desc` varchar (500) NOT NULL,
  `status_cd` varchar(5) DEFAULT 'A',
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- INSERT--
INSERT INTO `m_user` (`id`, `user_fname`, `user_lname`, `user_id`, `user_pass`, `user_email`, `role_code`, `user_desc`, `status_cd`) 
VALUES
(1, 'Admin', 'Shimla', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'forest@forest.com', 'sysadmin',  '', 'A'),
(2, 'User', 'Chamba', 'chamba', '5f4dcc3b5aa765d61d8327deb882cf99', 'forest@forest.com', 'client',  '', 'A'),
(3, 'Admin', 'Shimla', 'adminshimla', '5f4dcc3b5aa765d61d8327deb882cf99', 'forest@forest.com', 'admin', '', 'A'),
(4, 'DM Shimla', 'Shimla', 'dmshimla', '5f4dcc3b5aa765d61d8327deb882cf99', 'tomailsanjay@gmail.com', 'manager', '', 'A'),
(5, 'Director', 'Shimla', 'director', '5f4dcc3b5aa765d61d8327deb882cf99', 'sharma49859@gmail.com', 'director',  '', 'A');

---------------------------------------------------------------------------------------------------


----------------------------------------------------------------------------------------------------------


----------------------------------------------------------------------------------------------------------


----------------------------------------------------------------------------------------------------------
