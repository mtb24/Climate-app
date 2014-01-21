

DROP TABLE IF EXISTS `climate`.`readings`;


CREATE TABLE `climate`.`readings` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`YearMonthDay` date DEFAULT NULL,
	`Tmax` int(2) DEFAULT NULL,
	`Tmin` int(2) DEFAULT NULL,
	`Tavg` int(2) DEFAULT NULL,
	`created` datetime DEFAULT NULL,
	`updated` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

