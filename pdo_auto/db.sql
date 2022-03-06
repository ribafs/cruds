CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `created`, `modified`) VALUES
(1,	'Ribamar FS',	'ribafs@gmail.com',	'343434343',	'2021-03-31 19:46:58',	'2021-03-31 19:46:58'),
(2,	'Elias SF',	'elias@elias.ef',	'343434343',	'2021-03-31 19:47:17',	'2021-03-31 19:47:17');

