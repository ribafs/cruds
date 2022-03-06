CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `email_id`, `contact_no`) VALUES
(23, 'pradeep', 'khodke', 'pradeep@gmail.com', 9876543210),
(24, 'sohan', 'mahamune', 'sohan@gmail.com', 9874563210),
(25, 'john', 'doe', 'john@someone.com', 9778456123),
(26, 'test', 'test', 'test@test.com', 8745691230);

