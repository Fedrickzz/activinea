CREATE TABLE `Usuaris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `cognom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `ciutat` varchar(50) DEFAULT NULL,
  `telf` varchar(15) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `confirmacio` tinyint(1) DEFAULT NULL,
  `token` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 10 DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

CREATE TABLE `Llibres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `cognom` varchar(40) DEFAULT NULL,
  `ciutat` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `imatge` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tags` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `social` text,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 19 DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

CREATE TABLE `Punts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuari` int NULL,
  `nom` varchar(50) DEFAULT NULL,
  `cognom` varchar(50) DEFAULT NULL,
  `dia` varchar(50) DEFAULT NULL,
  `temps` varchar(50) DEFAULT NULL,
  `punts` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 19 DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;
