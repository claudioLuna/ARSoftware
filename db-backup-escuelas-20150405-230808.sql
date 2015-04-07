CREATE DATABASE IF NOT EXISTS escuelas;

USE escuelas;

DROP TABLE IF EXISTS administrador;

CREATE TABLE `administrador` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `Rol` tinyint(2) unsigned NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombreUsuario` (`nombreUsuario`(7))
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO administrador VALUES("2","adminar","","1","adminar","123","75345e5f032f6228a0e4f49c0564cf45","2010-08-31 19:03:18");
INSERT INTO administrador VALUES("7","pepe","pepe","1","pepe","pepe","5d208877a04acd5bb0125805a05e845c","2015-04-05 19:13:10");



DROP TABLE IF EXISTS alumno;

CREATE TABLE `alumno` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `cuil` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `escuela` varchar(255) NOT NULL,
  `curso` int(20) NOT NULL,
  `cursoNombre` varchar(255) NOT NULL,
  `turno` varchar(255) NOT NULL,
  `nombrePadre` varchar(255) NOT NULL,
  `apellidoPadre` varchar(255) NOT NULL,
  `cuilPadre` varchar(255) NOT NULL,
  `MarcaNetbook` int(11) NOT NULL,
  `nombreMarcaNetbook` varchar(255) NOT NULL,
  `numSerie` varchar(15) NOT NULL,
  `prestado` int(11) NOT NULL,
  `cargador` varchar(255) NOT NULL,
  `bateria` varchar(255) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `estadoNetbook` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

INSERT INTO alumno VALUES("91","Michael","Jordan","27-22345678-8","Bardas Blancas","4-206","35","Uso Escolar","Sin Turno","Sin Valor","Sin Valor","Sin Valor","18","","111","0","222","111","pepe","1","Ok");
INSERT INTO alumno VALUES("90","Paula","Mendez","23-40722381-4","Castelli 1234","4-070","39","","1","Gerardo","Mendez","20-24055618-9","33","","0151361673","0","5566","6655","adminar","0","Ok");
INSERT INTO alumno VALUES("89","Rodrigo Emanuelr","Lopez","20-40770043-1","Rivadavia 245","4-070","38","","1","Hernan","Lopez","20-20895546-0","34","","AA8033604711","0","","","adminar","0","Ok");
INSERT INTO alumno VALUES("87","Lio","Messi","20-30965060-2","Las Loicas 34","4-206","35","","1","Daniel","Messi","27-34565434-4","0","","0","0","","","pepe","1","No Tiene");
INSERT INTO alumno VALUES("88","Carlos","Rodriguez","20-41030970-9","Granaderos 468","4-070","38","","1","Alejandro","Rodriguez","20-24055618-9","34","","01151365920","0","1234","9876","adminar","0","S Tecnico");
INSERT INTO alumno VALUES("86","Daniel","Osvaldo","20-30965061-2","Las Aucas 456","4-206","35","","2","Gerardo","Osvaldo","27-34565434-4","18","","222","0","333","444","pepe","0","S Tecnico");



DROP TABLE IF EXISTS correo;

CREATE TABLE `correo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asunto` varchar(255) NOT NULL,
  `nombreOrigen` varchar(255) NOT NULL,
  `nombreDestino` varchar(255) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS curso;

CREATE TABLE `curso` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(2555) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

INSERT INTO curso VALUES("39","5Â°2","adminar");
INSERT INTO curso VALUES("38","5Â°1Â°","adminar");
INSERT INTO curso VALUES("37","1Â°2Â°","adminar");
INSERT INTO curso VALUES("36","1Â°1Â°","adminar");
INSERT INTO curso VALUES("35","Primero cuarta","pepe");



DROP TABLE IF EXISTS datosescuela;

CREATE TABLE `datosescuela` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `nombreDirector` varchar(255) NOT NULL,
  `apellidoDirector` varchar(255) NOT NULL,
  `dniDirector` varchar(255) NOT NULL,
  `cuilDirector` varchar(255) NOT NULL,
  `numeroEscuela` varchar(255) NOT NULL,
  `nombreEscuela` varchar(255) NOT NULL,
  `cueEscuela` varchar(255) NOT NULL,
  `seccionEscuela` varchar(255) NOT NULL,
  `domicilioEscuela` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO datosescuela VALUES("5","Cecilia","Urriche","20917305","27-20917305-6","4-070","Abelardo Arias Ballofet","5000661-00","12","Ceferino Namuncura prog. Puyrredon","San Rafael","Mendoza","adminar");
INSERT INTO datosescuela VALUES("6","Michael","Jordan 23","22345678","22345678","4-206","Mapu Mahuida","San Rafael","12","Bardas Blancas","San Rafael","Mendoza","pepe");



DROP TABLE IF EXISTS estadostecnico;

CREATE TABLE `estadostecnico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO estadostecnico VALUES("1","S.Tecnico-Escuela");
INSERT INTO estadostecnico VALUES("2","S.Tecnico-Enviado");
INSERT INTO estadostecnico VALUES("3","S.Tecnico-Reparado");



DROP TABLE IF EXISTS marca;

CREATE TABLE `marca` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

INSERT INTO marca VALUES("34","Positivo BGH","adminar");
INSERT INTO marca VALUES("33","Noblex","adminar");
INSERT INTO marca VALUES("32","Samsung","adminar");
INSERT INTO marca VALUES("18","Noblex","pepe");
INSERT INTO marca VALUES("31","Lenovo","adminar");



DROP TABLE IF EXISTS netbook;

CREATE TABLE `netbook` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numSerie` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `MarcaNetbook` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS prestamo;

CREATE TABLE `prestamo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numSerie` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date NOT NULL,
  `estado` int(11) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO prestamo VALUES("8","111","87","35","2015-04-05","2015-04-10","0","pepe");



DROP TABLE IF EXISTS profesor;

CREATE TABLE `profesor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `materia` int(11) NOT NULL,
  `horas` int(11) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `revista` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `dni` int(11) NOT NULL,
  `cuil` varchar(255) NOT NULL,
  `ingreso` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS rol;

CREATE TABLE `rol` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO rol VALUES("1","AdministradorAr");
INSERT INTO rol VALUES("2","AdministradorSecretaria");
INSERT INTO rol VALUES("3","AdministradorBiblioteca\n");
INSERT INTO rol VALUES("4","AdministradorPreceptoria");
INSERT INTO rol VALUES("5","Alumno");



DROP TABLE IF EXISTS tecnico;

CREATE TABLE `tecnico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombreAlumno` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `cuil` varchar(255) NOT NULL,
  `numeroSerie` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `problema` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `idreclamo` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `estadoFin` int(11) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO tecnico VALUES("14","Carlos Rodriguez","5Ã‚Â°1Ã‚Â°","20-41030970-9","1151365920","Positivo BGH","Pantalla Rota","2015-04-05 22:05:58","1132455","2","0","adminar");



DROP TABLE IF EXISTS turno;

CREATE TABLE `turno` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO turno VALUES("1","MaÃ±ana");
INSERT INTO turno VALUES("2","Tarde");
INSERT INTO turno VALUES("3","Vespertino");



