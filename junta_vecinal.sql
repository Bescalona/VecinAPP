SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `anuncio` (
  `id_anuncio` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `anuncio` (`id_anuncio`, `titulo`, `descripcion`, `fecha`) VALUES
(3, 'Chao', 'ssssssssssssssssss', '2018-11-13 15:44:20');

CREATE TABLE `arriendo` (
  `id_arriendo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `valor` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `arriendo` (`id_arriendo`, `fecha`, `valor`, `descripcion`) VALUES
(10, '2018-11-14', 45345, 'holaaaa'),
(12, '2018-11-22', 5678, 'asdasd'),
(13, '2018-12-05', 5678, 'awssd'),
(14, '2018-02-08', 20000, 'asdasd');

CREATE TABLE `cuota` (
  `id_cuota` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cuota` (`id_cuota`, `titulo`, `descripcion`, `valor`) VALUES
(1, 'Asado', 'para el jueves', 3500);

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `servicio` (`id_servicio`, `nombre_servicio`, `descripcion`, `fecha`, `hora_inicio`, `hora_fin`) VALUES
(2, 'Abogado', 'asdas', '2018-11-15', '17:58:00', '22:01:00'),
(4, 'asd', 'asd', '2018-11-14', '03:27:00', '04:00:00');

CREATE TABLE `taller` (
  `id_taller` int(11) NOT NULL,
  `nombre_profesor` varchar(50) NOT NULL,
  `nombre_taller` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `cupos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `taller` (`id_taller`, `nombre_profesor`, `nombre_taller`, `descripcion`, `cupos`) VALUES
(2, 'Marcelo Caceres', 'Gimnasia', 'Lunes a Miercoles 16:30-18:00 \r\nGimnasio Municipal', 10),
(3, 'Gilberto', 'Ajedrez', 'Lunes a Viernes 15:00-17:00\r\nPara todas las edades', 0),
(4, 'Pedro', 'Futbol', 'Sabados 11:00 \r\nCancha Los Encinos', 10);

CREATE TABLE `taller_inscribir` (
  `id` int(11) NOT NULL,
  `id_taller` int(11) NOT NULL,
  `id_vecino` int(11) NOT NULL,
  `alumno` varchar(100) NOT NULL,
  `num_casa` int(11) NOT NULL,
  `rut` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `taller_inscribir` (`id`, `id_taller`, `id_vecino`, `alumno`, `num_casa`, `rut`, `telefono`) VALUES
(1, 2, 0, 'bastian', 0, '', 21312),
(2, 3, 5, 'pepe', 1345, '198323', 23534534),
(3, 3, 5, 'geraado', 1345, '3345435', 23534534),
(4, 3, 5, 'camila', 1345, '3242342', 23534534),
(5, 3, 5, 'asd', 1345, '123', 23534534),
(6, 3, 5, 'asdesd', 1345, '1231', 23534534);

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `num_casa` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `telefono`, `num_casa`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `rol`) VALUES
(2, 'Bastian', 0, 0, 'bescaubb@gmail.com', NULL, '$2y$10$zgd8epvHffLa7pHOIthQXuDS7F0qBacMclEZazXk2GM9XGOxgc54i', '09aY5xvjFtxhLig2uHOaI0qp56nR3l731UGVDAg1oycwSIpbyBommnLA6KVQ', '2018-12-05 00:26:13', '2018-12-05 00:26:13', 1),
(3, 'admin', 0, 0, 'admin@gmail.com', NULL, '$2y$10$FcfcTXPRpfwYFi64hz3rIuoQyLLyE1lhEAJgCvbGzRiNcPDsJCmX.', 'sE4YKhifgXoqf7yXCVQfshvVa2PzOIuTS3akikTcweEzhPcvaJguGVom0ZfY', '2018-12-05 00:47:17', '2018-12-05 00:47:17', 2),
(5, 'fran', 23534534, 1345, 'fran@gmail.com', NULL, '$2y$10$Ptxg6GhOQ9Zv7ZUV4IFN1OR2B.oKgrH8XocZu06vCAs2RNzY3Rh3.', 'nxglykml4OfHYL4PrArs6ygjLf14Epi1ompCwLg099HPIL7Gu9dYA16iGu3G', '2018-12-05 06:31:26', '2018-12-05 06:31:26', 1);

CREATE TABLE `vecino` (
  `id_vecino` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `num_casa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `vecino` (`id_vecino`, `nombres`, `apellidos`, `telefono`, `num_casa`) VALUES
(1, 'nombre prueba', 'apellido prueba', 0, 1335),
(4, 'Fran', 'fernandez', 2345, 124),
(21, 'Bastian', 'asd', 77777, 1335);

CREATE TABLE `vecino_cuota` (
  `id_vecino` int(11) NOT NULL,
  `id_cuota` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `vecino_taller` (
  `id_vecino` int(11) NOT NULL,
  `id_taller` int(11) NOT NULL,
  `fecha_inscripcion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id_anuncio`);

ALTER TABLE `arriendo`
  ADD PRIMARY KEY (`id_arriendo`);

ALTER TABLE `cuota`
  ADD PRIMARY KEY (`id_cuota`);

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

ALTER TABLE `taller`
  ADD PRIMARY KEY (`id_taller`);

ALTER TABLE `taller_inscribir`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `vecino`
  ADD PRIMARY KEY (`id_vecino`);

ALTER TABLE `vecino_cuota`
  ADD KEY `id_vecino` (`id_vecino`,`id_cuota`),
  ADD KEY `id_cuota` (`id_cuota`);

ALTER TABLE `vecino_taller`
  ADD KEY `id_vecino` (`id_vecino`,`id_taller`),
  ADD KEY `id_taller` (`id_taller`);


ALTER TABLE `anuncio`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `arriendo`
  MODIFY `id_arriendo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `cuota`
  MODIFY `id_cuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `taller`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `taller_inscribir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `vecino`
  MODIFY `id_vecino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;


ALTER TABLE `vecino_cuota`
  ADD CONSTRAINT `vecino_cuota_ibfk_1` FOREIGN KEY (`id_vecino`) REFERENCES `vecino` (`id_vecino`),
  ADD CONSTRAINT `vecino_cuota_ibfk_2` FOREIGN KEY (`id_cuota`) REFERENCES `cuota` (`id_cuota`);

ALTER TABLE `vecino_taller`
  ADD CONSTRAINT `vecino_taller_ibfk_1` FOREIGN KEY (`id_vecino`) REFERENCES `vecino` (`id_vecino`),
  ADD CONSTRAINT `vecino_taller_ibfk_2` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
