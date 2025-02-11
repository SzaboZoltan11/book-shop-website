CREATE DATABASE konyvwebaruhaz;

USE konyvwebaruhaz;

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `cover` longblob COMPRESSED NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
