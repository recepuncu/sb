CREATE TABLE IF NOT EXISTS `kisi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `adi_soyadi` varchar(255) NOT NULL,
  `sifre` varchar(40) NOT NULL,
  `sozlesme` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `olusturulma_zamani` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB;
