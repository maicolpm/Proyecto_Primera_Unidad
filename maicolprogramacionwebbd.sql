

CREATE DATABASE maicolprogramacionwebbd;
use maicolprogramacionwebbd;

CREATE TABLE `tareas` (
  `id` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `fechainicio` datetime NOT NULL,
  `fechavencimiento` datetime NOT NULL,
  `contenido` varchar(500) NOT NULL,
  `archivado` varchar(2) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `usuarios` (
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tareas`
  ADD UNIQUE KEY `id` (`id`);


ALTER TABLE `usuarios`
  ADD UNIQUE KEY `username` (`username`);
COMMIT;
