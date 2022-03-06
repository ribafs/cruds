CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`) VALUES
(1,	'Ribamar Ferreira de Sousa',	'ribafs@gmail.com',	'983838383'),
(2,	'Elias EF',	'elias@elias.ef',	'23423423'),
(3,	'Fátima EF',	'fatima@fatima.org',	'23423423');

