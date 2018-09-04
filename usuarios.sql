CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `nombres` varchar(255) NOT NULL COMMENT 'Nombres del usuario',
  `apellidos` varchar(255) NOT NULL COMMENT 'Apellidos del usuario',
  `email` varchar(255) NOT NULL COMMENT 'Correo electrónico del usuario',
  `password` varchar(255) NOT NULL COMMENT 'contraseña del usuario',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabla de usuarios' AUTO_INCREMENT=1 ;