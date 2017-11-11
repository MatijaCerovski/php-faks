DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `phones`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `is_active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `is_active`)
VALUES
	(1,'dlozic@tvz.hr','$2y$10$BIy0/3IZ9plfZ4KaidKNGOkDqfFJnuDzMUCiUxTpgVIoCxwNuGQcu','Davor','Lozić',1),
	(2,'alen@tvz.hr','$2y$10$BIy0/3IZ9plfZ4KaidKNGOkDqfFJnuDzMUCiUxTpgVIoCxwNuGQcu','Alen','Šimec',1);


  CREATE TABLE `phones` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `brand` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `price` decimal(6,2) NOT NULL,
    `stock` int(11) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

  --
  -- Dumping data for table `phones`
  --

  INSERT INTO `phones` (`id`, `brand`, `name`, `price`, `stock`) VALUES
  (1, 'Samsung', 'Galaxy S8', '4000.00', 4),
  (2, 'Lg', 'G3', '1000.00', 12),
  (3, 'Iphone', '7', '9001.00', 0),
  (4, 'Alkatel', 'A1', '455.00', 8);
