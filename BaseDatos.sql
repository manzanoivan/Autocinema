-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema autocinema
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `autocinema` ;

-- -----------------------------------------------------
-- Schema autocinema
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `autocinema` DEFAULT CHARACTER SET utf8 ;
USE `autocinema` ;

-- -----------------------------------------------------
-- Table `autocinema`.`sexo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`sexo` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`sexo` (
  `idSexo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idSexo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`tipoUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`tipoUsuario` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`tipoUsuario` (
  `idTipo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(100) NULL COMMENT '',
  PRIMARY KEY (`idTipo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`usuario` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`usuario` (
  `idUsuario` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(100) NOT NULL COMMENT '',
  `apellidos` VARCHAR(100) NULL COMMENT '',
  `email` VARCHAR(100) NOT NULL COMMENT '',
  `password` VARCHAR(45) NOT NULL COMMENT '',
  `fec_nac` DATE NULL COMMENT '',
  `idSexo` INT NOT NULL COMMENT '',
  `username` VARCHAR(45) NULL COMMENT '',
  `tipo` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idUsuario`, `tipo`)  COMMENT '',
  INDEX `fk_usuario_sexo_idx` (`idSexo` ASC)  COMMENT '',
  INDEX `fk_usuario_tipoUsuario1_idx` (`tipo` ASC)  COMMENT '',
  CONSTRAINT `fk_usuario_sexo`
    FOREIGN KEY (`idSexo`)
    REFERENCES `autocinema`.`sexo` (`idSexo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_tipoUsuario1`
    FOREIGN KEY (`tipo`)
    REFERENCES `autocinema`.`tipoUsuario` (`idTipo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`productoCafeteria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`productoCafeteria` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`productoCafeteria` (
  `idProducto` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(100) NULL COMMENT '',
  `descripcion` VARCHAR(500) NULL COMMENT '',
  `precio` FLOAT NULL COMMENT '',
  `imagen` LONGBLOB NULL COMMENT '',
  PRIMARY KEY (`idProducto`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`clasificacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`clasificacion` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`clasificacion` (
  `idClasificacion` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NULL COMMENT '',
  `descripcion` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idClasificacion`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`pelicula`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`pelicula` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`pelicula` (
  `idPelicula` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(100) NULL COMMENT '',
  `segundoNombre` VARCHAR(100) NULL COMMENT '',
  `sinopsis` VARCHAR(1000) NULL COMMENT '',
  `director` VARCHAR(500) NULL COMMENT '',
  `anio` INT NULL COMMENT '',
  `actores` VARCHAR(500) NULL COMMENT '',
  `duracion` VARCHAR(100) NULL COMMENT '',
  `trailer` VARCHAR(200) NULL COMMENT '',
  `idClasificacion` INT NOT NULL COMMENT '',
  `imagen` LONGBLOB NULL COMMENT '',
  PRIMARY KEY (`idPelicula`)  COMMENT '',
  INDEX `fk_pelicula_clasificacion1_idx` (`idClasificacion` ASC)  COMMENT '',
  CONSTRAINT `fk_pelicula_clasificacion1`
    FOREIGN KEY (`idClasificacion`)
    REFERENCES `autocinema`.`clasificacion` (`idClasificacion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`sede`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`sede` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`sede` (
  `idSede` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(100) NULL COMMENT '',
  `direccion` VARCHAR(1000) NULL COMMENT '',
  PRIMARY KEY (`idSede`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`funcion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`funcion` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`funcion` (
  `idFuncion` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '',
  `fecha` DATETIME NULL COMMENT '',
  `idPelicula` BIGINT(20) NOT NULL COMMENT '',
  `precio` FLOAT NULL COMMENT '',
  `disponibilidad` INT NULL COMMENT '',
  `idSede` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idFuncion`, `idSede`)  COMMENT '',
  INDEX `fk_funcion_pelicula1_idx` (`idPelicula` ASC)  COMMENT '',
  INDEX `fk_funcion_sede1_idx` (`idSede` ASC)  COMMENT '',
  CONSTRAINT `fk_funcion_pelicula1`
    FOREIGN KEY (`idPelicula`)
    REFERENCES `autocinema`.`pelicula` (`idPelicula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_funcion_sede1`
    FOREIGN KEY (`idSede`)
    REFERENCES `autocinema`.`sede` (`idSede`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`tipoPago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`tipoPago` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`tipoPago` (
  `idTipoPago` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idTipoPago`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`pagoBoleto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`pagoBoleto` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`pagoBoleto` (
  `idPago` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idUsuario` BIGINT(20) NOT NULL COMMENT '',
  `idTipoPago` INT NOT NULL COMMENT '',
  `boletosRestantes` INT NULL COMMENT '',
  `fechaPago` DATETIME NULL COMMENT '',
  `nombre` VARCHAR(800) NULL COMMENT '',
  `referencia` VARCHAR(500) NULL COMMENT '',
  PRIMARY KEY (`idPago`)  COMMENT '',
  INDEX `fk_pago_usuario1_idx` (`idUsuario` ASC)  COMMENT '',
  INDEX `fk_pagoBoleto_tipoPago1_idx` (`idTipoPago` ASC)  COMMENT '',
  CONSTRAINT `fk_pago_usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `autocinema`.`usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_pagoBoleto_tipoPago1`
    FOREIGN KEY (`idTipoPago`)
    REFERENCES `autocinema`.`tipoPago` (`idTipoPago`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`boleto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`boleto` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`boleto` (
  `idBoleto` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '',
  `idFuncion` BIGINT(20) NOT NULL COMMENT '',
  `fechaCompra` DATETIME NULL COMMENT '',
  `cantidad` INT NULL COMMENT '',
  `codigo` VARCHAR(45) NULL COMMENT '',
  `idPagoBoleto` INT NOT NULL COMMENT '',
  `horaEntrada` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idBoleto`)  COMMENT '',
  INDEX `fk_usuario_has_funcion_funcion1_idx` (`idFuncion` ASC)  COMMENT '',
  INDEX `fk_boleto_pagoBoleto1_idx` (`idPagoBoleto` ASC)  COMMENT '',
  CONSTRAINT `fk_usuario_has_funcion_funcion1`
    FOREIGN KEY (`idFuncion`)
    REFERENCES `autocinema`.`funcion` (`idFuncion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_boleto_pagoBoleto1`
    FOREIGN KEY (`idPagoBoleto`)
    REFERENCES `autocinema`.`pagoBoleto` (`idPago`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`compraCafeteria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`compraCafeteria` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`compraCafeteria` (
  `idCompra` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '',
  `idUsuario` BIGINT(20) NOT NULL COMMENT '',
  `fechaPago` DATETIME NULL COMMENT '',
  `referencia` VARCHAR(500) NULL COMMENT '',
  `nombre` VARCHAR(200) NULL COMMENT '',
  `fechaEntrega` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idCompra`)  COMMENT '',
  INDEX `fk_compraCafeteria_usuario1_idx` (`idUsuario` ASC)  COMMENT '',
  CONSTRAINT `fk_compraCafeteria_usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `autocinema`.`usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`detalleCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`detalleCompra` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`detalleCompra` (
  `idCompra` BIGINT(20) NOT NULL COMMENT '',
  `idProducto` BIGINT(20) NOT NULL COMMENT '',
  `cantidad` INT NULL COMMENT '',
  `precioUnitario` FLOAT NULL COMMENT '',
  PRIMARY KEY (`idCompra`, `idProducto`)  COMMENT '',
  INDEX `fk_compraCafeteria_has_productosCafeteria_productosCafeteri_idx` (`idProducto` ASC)  COMMENT '',
  INDEX `fk_compraCafeteria_has_productosCafeteria_compraCafeteria1_idx` (`idCompra` ASC)  COMMENT '',
  CONSTRAINT `fk_compraCafeteria_has_productosCafeteria_compraCafeteria1`
    FOREIGN KEY (`idCompra`)
    REFERENCES `autocinema`.`compraCafeteria` (`idCompra`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_compraCafeteria_has_productosCafeteria_productosCafeteria1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `autocinema`.`productoCafeteria` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`propuesta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`propuesta` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`propuesta` (
  `idPropuesta` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '',
  `textoPropuesta` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idPropuesta`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`votacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`votacion` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`votacion` (
  `idVotacion` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '',
  `titulo` VARCHAR(500) NULL COMMENT '',
  PRIMARY KEY (`idVotacion`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`detalleVotacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`detalleVotacion` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`detalleVotacion` (
  `idVotacion` BIGINT(20) NOT NULL COMMENT '',
  `idPelicula` BIGINT(20) NOT NULL COMMENT '',
  PRIMARY KEY (`idVotacion`, `idPelicula`)  COMMENT '',
  INDEX `fk_votacion_has_pelicula_pelicula1_idx` (`idPelicula` ASC)  COMMENT '',
  INDEX `fk_votacion_has_pelicula_votacion1_idx` (`idVotacion` ASC)  COMMENT '',
  CONSTRAINT `fk_votacion_has_pelicula_votacion1`
    FOREIGN KEY (`idVotacion`)
    REFERENCES `autocinema`.`votacion` (`idVotacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_votacion_has_pelicula_pelicula1`
    FOREIGN KEY (`idPelicula`)
    REFERENCES `autocinema`.`pelicula` (`idPelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`usuarioVota`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`usuarioVota` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`usuarioVota` (
  `idUsuario` BIGINT(20) NOT NULL COMMENT '',
  `idVotacion` BIGINT(20) NOT NULL COMMENT '',
  PRIMARY KEY (`idUsuario`, `idVotacion`)  COMMENT '',
  INDEX `fk_usuario_has_votacion_votacion1_idx` (`idVotacion` ASC)  COMMENT '',
  INDEX `fk_usuario_has_votacion_usuario1_idx` (`idUsuario` ASC)  COMMENT '',
  CONSTRAINT `fk_usuario_has_votacion_usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `autocinema`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_votacion_votacion1`
    FOREIGN KEY (`idVotacion`)
    REFERENCES `autocinema`.`votacion` (`idVotacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`disponibilidadProducto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`disponibilidadProducto` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`disponibilidadProducto` (
  `idProducto` BIGINT(20) NOT NULL COMMENT '',
  `idSede` INT NOT NULL COMMENT '',
  `existencia` INT NULL COMMENT '',
  PRIMARY KEY (`idProducto`, `idSede`)  COMMENT '',
  INDEX `fk_productosCafeteria_has_sede_sede1_idx` (`idSede` ASC)  COMMENT '',
  INDEX `fk_productosCafeteria_has_sede_productosCafeteria1_idx` (`idProducto` ASC)  COMMENT '',
  CONSTRAINT `fk_productosCafeteria_has_sede_productosCafeteria1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `autocinema`.`productoCafeteria` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_productosCafeteria_has_sede_sede1`
    FOREIGN KEY (`idSede`)
    REFERENCES `autocinema`.`sede` (`idSede`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autocinema`.`comentario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autocinema`.`comentario` ;

CREATE TABLE IF NOT EXISTS `autocinema`.`comentario` (
  `idComentario` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '',
  `texto` VARCHAR(1000) NULL COMMENT '',
  `nombre` VARCHAR(500) NULL COMMENT '',
  `email` VARCHAR(100) NULL COMMENT '',
  PRIMARY KEY (`idComentario`)  COMMENT '')
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `autocinema`.`sexo`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`sexo` (`idSexo`, `nombre`) VALUES (1, 'Hombre');
INSERT INTO `autocinema`.`sexo` (`idSexo`, `nombre`) VALUES (2, 'Mujer');

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`tipoUsuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`tipoUsuario` (`idTipo`, `nombre`) VALUES (1, 'Administrador');
INSERT INTO `autocinema`.`tipoUsuario` (`idTipo`, `nombre`) VALUES (2, 'Usuario');
INSERT INTO `autocinema`.`tipoUsuario` (`idTipo`, `nombre`) VALUES (3, 'Cafetería');
INSERT INTO `autocinema`.`tipoUsuario` (`idTipo`, `nombre`) VALUES (4, 'Entrada');

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`usuario` (`idUsuario`, `nombre`, `apellidos`, `email`, `password`, `fec_nac`, `idSexo`, `username`, `tipo`) VALUES (1, 'Autocinema', NULL, 'autocinema@yopmail.com', 'administrador', NULL, 1, 'autocinema', 1);
INSERT INTO `autocinema`.`usuario` (`idUsuario`, `nombre`, `apellidos`, `email`, `password`, `fec_nac`, `idSexo`, `username`, `tipo`) VALUES (2, 'César Iván', 'Manzano', 'manzanoivan@yopmail.com', 'usuario', NULL, 1, 'manzanoivan', 2);
INSERT INTO `autocinema`.`usuario` (`idUsuario`, `nombre`, `apellidos`, `email`, `password`, `fec_nac`, `idSexo`, `username`, `tipo`) VALUES (3, 'Sergio', 'Juárez', 'serj@yopmail.com', 'usuario', NULL, 1, 'serj', 2);
INSERT INTO `autocinema`.`usuario` (`idUsuario`, `nombre`, `apellidos`, `email`, `password`, `fec_nac`, `idSexo`, `username`, `tipo`) VALUES (4, 'Encargado', 'Entrada', 'entradaAutocinema@yopmail.com', 'encargado', NULL, 1, 'entrada', 4);
INSERT INTO `autocinema`.`usuario` (`idUsuario`, `nombre`, `apellidos`, `email`, `password`, `fec_nac`, `idSexo`, `username`, `tipo`) VALUES (5, 'Encargado', 'Cafetería', 'cafeteriaAutocinema@yopmail.com', 'encargado', NULL, 1, 'cafeteria', 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`productoCafeteria`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`productoCafeteria` (`idProducto`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES (1, 'Palomitas Medianas', 'Palomitas Medianas', 35.00, NULL);
INSERT INTO `autocinema`.`productoCafeteria` (`idProducto`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES (2, 'Té Helado', 'Té', 30.00, NULL);
INSERT INTO `autocinema`.`productoCafeteria` (`idProducto`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES (3, 'Hot Dog', 'Hot dog', 45.00, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`clasificacion`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`clasificacion` (`idClasificacion`, `nombre`, `descripcion`) VALUES (1, 'AA', 'Para todo público');
INSERT INTO `autocinema`.`clasificacion` (`idClasificacion`, `nombre`, `descripcion`) VALUES (2, 'A', 'Para todo público');
INSERT INTO `autocinema`.`clasificacion` (`idClasificacion`, `nombre`, `descripcion`) VALUES (3, 'B', 'Para mayores de 12 años');
INSERT INTO `autocinema`.`clasificacion` (`idClasificacion`, `nombre`, `descripcion`) VALUES (4, 'B-15', 'Para mayores de 15');
INSERT INTO `autocinema`.`clasificacion` (`idClasificacion`, `nombre`, `descripcion`) VALUES (5, 'C', 'Para mayores de 18 años');

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`pelicula`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`pelicula` (`idPelicula`, `nombre`, `segundoNombre`, `sinopsis`, `director`, `anio`, `actores`, `duracion`, `trailer`, `idClasificacion`, `imagen`) VALUES (1, 'The Godfather', 'El Padrino 1', 'THE GODFATHER: Años 40. Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, siguiendo los consejos de Tom Hagen (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.', 'Francis Ford Coppola', 1972, 'Marlon Brando, Al Pacino, James Caan', '175', 'https://www.youtube.com/watch?v=5DO-nDW43Ik', 5, NULL);
INSERT INTO `autocinema`.`pelicula` (`idPelicula`, `nombre`, `segundoNombre`, `sinopsis`, `director`, `anio`, `actores`, `duracion`, `trailer`, `idClasificacion`, `imagen`) VALUES (2, 'Whiplash', 'Whiplash: Música y Obsesión', 'El objetivo de Andrew Neiman (Miles Teller), un joven y ambicioso baterista de jazz, es triunfar en el elitista Conservatorio de Música de la Costa Este en el que estudia. Marcado por el fracaso de la carrera literaria de su padre, Andrew alberga sueños de grandeza. Terence Fletcher (J.K. Simmons), un profesor conocido tanto por su talento como por sus rigurosos métodos de enseñanza, dirige el mejor conjunto de jazz del Conservatorio. Cuando Fletcher elige a Andrew para formar parte del conjunto musical que dirige, cambia para siempre la vida del joven.', 'Damien Chazelle', 2014, 'Miles Teller, J.K. Simmons, Melissa Benoist', '107', 'https://www.youtube.com/watch?v=KWKv9Nc0HBI', 3, NULL);
INSERT INTO `autocinema`.`pelicula` (`idPelicula`, `nombre`, `segundoNombre`, `sinopsis`, `director`, `anio`, `actores`, `duracion`, `trailer`, `idClasificacion`, `imagen`) VALUES (3, 'Perks Of Being a Wallflower', 'Las Ventajas de Ser Invisible', 'Charlie (Logan Lerman), un joven tímido y marginado, escribe una serie de cartas a una persona sin identificar en las que aborda asuntos como la amistad, los conflictos familiares, las primeras citas, el sexo o las drogas. El protagonista tendrá que afrontar dificultades, al tiempo que lucha por encontrar un grupo de personas con las que pueda encajar y sentirse a gusto.', 'Stephen Chbosky', 2012, 'Logan Lerman, Emma Watson, Ezra Miller', '102', 'https://www.youtube.com/watch?v=zfrCmynUT8g', 3, NULL);
INSERT INTO `autocinema`.`pelicula` (`idPelicula`, `nombre`, `segundoNombre`, `sinopsis`, `director`, `anio`, `actores`, `duracion`, `trailer`, `idClasificacion`, `imagen`) VALUES (4, 'Back To The Future Trilogy', 'Trilogía de Volver al Futuro', 'BACK TO THE FUTURE I: El adolescente Marty McFly es amigo de Doc, un científico al que todos toman por loco. Cuando Doc crea una máquina para viajar en el tiempo, un error fortuito hace que Marty llegue a 1955, año en el que sus futuros padres aún no se habían conocido. Después de impedir su primer encuentro, deberá conseguir que se conozcan y se casen; de lo contrario, su existencia no sería posible. BACK TO THE FUTURE II: Después de visitar a 2015 , Marty McFly debe repetir su visita a 1955 para evitar cambios desastrosos para 1985 ... sin interferir en su primer viaje . BACK TO THE FUTURE III: Doc tiene el coche-máquina del tiempo averiado, y está prisionero en la época del salvaje oeste. Por su parte, Marty McFly está en 1955 y acaba de encontrar una carta escrita por Doc en 1885. En ella, Doc le pide que arregle el coche, pero que no vaya a rescatarlo pues se encuentra muy bien en el pasado. Sin embargo el muchacho irá en su búsqueda cuando descubre una vieja tumba en la que lee que su amigo murió en 1885.', 'Robert Zemeckis', 1985, 'Michael J. Fox, Christopher Lloyd, Lea Thompson', '342', 'https://www.youtube.com/watch?v=Ktx1uv-F8EU', 2, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`sede`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`sede` (`idSede`, `nombre`, `direccion`) VALUES (1, 'Polanco', 'Miguel de Cervantes Saavedra #161, Col. Granada, Polanco, México D. F.');
INSERT INTO `autocinema`.`sede` (`idSede`, `nombre`, `direccion`) VALUES (2, 'Insurgentes Sur', 'Av. de los Insurgentes Sur #1729, Ciudad de México, D.F.');

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`funcion`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`funcion` (`idFuncion`, `fecha`, `idPelicula`, `precio`, `disponibilidad`, `idSede`) VALUES (1, '2016-1-1 19:00:00', 1, 250, 50, 1);
INSERT INTO `autocinema`.`funcion` (`idFuncion`, `fecha`, `idPelicula`, `precio`, `disponibilidad`, `idSede`) VALUES (2, '2016-1-2 20:00:00', 2, 250, 50, 2);
INSERT INTO `autocinema`.`funcion` (`idFuncion`, `fecha`, `idPelicula`, `precio`, `disponibilidad`, `idSede`) VALUES (3, '2016-1-3 20:00:00', 3, 250, 50, 1);
INSERT INTO `autocinema`.`funcion` (`idFuncion`, `fecha`, `idPelicula`, `precio`, `disponibilidad`, `idSede`) VALUES (4, '2016-1-4 18:00:00', 4, 400, 50, 2);
INSERT INTO `autocinema`.`funcion` (`idFuncion`, `fecha`, `idPelicula`, `precio`, `disponibilidad`, `idSede`) VALUES (5, '2015-1-1 19:00:00', 1, 300, 0, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`tipoPago`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`tipoPago` (`idTipoPago`, `nombre`) VALUES (1, 'Tarjeta de Crédito');
INSERT INTO `autocinema`.`tipoPago` (`idTipoPago`, `nombre`) VALUES (2, 'Membresía');

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`pagoBoleto`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`pagoBoleto` (`idPago`, `idUsuario`, `idTipoPago`, `boletosRestantes`, `fechaPago`, `nombre`, `referencia`) VALUES (1, 2, 1, 0, '2015-12-3 8:00:00', 'Iván Manzano', '123456');
INSERT INTO `autocinema`.`pagoBoleto` (`idPago`, `idUsuario`, `idTipoPago`, `boletosRestantes`, `fechaPago`, `nombre`, `referencia`) VALUES (2, 3, 2, 3, '2015-12-3 7:00:00', 'Sergio Juárez', 'abcdefg');
INSERT INTO `autocinema`.`pagoBoleto` (`idPago`, `idUsuario`, `idTipoPago`, `boletosRestantes`, `fechaPago`, `nombre`, `referencia`) VALUES (3, 3, 1, 0, '2015-12-4 9:00:00', 'Tarjeta de otra persona', 'a1b2c3d4');

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`boleto`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`boleto` (`idBoleto`, `idFuncion`, `fechaCompra`, `cantidad`, `codigo`, `idPagoBoleto`, `horaEntrada`) VALUES (1, 1, '2015-12-3 8:00:00', 1, 'abcdefg', 1, NULL);
INSERT INTO `autocinema`.`boleto` (`idBoleto`, `idFuncion`, `fechaCompra`, `cantidad`, `codigo`, `idPagoBoleto`, `horaEntrada`) VALUES (2, 3, '2015-12-3 8:00:00', 1, 'hijklmno', 2, NULL);
INSERT INTO `autocinema`.`boleto` (`idBoleto`, `idFuncion`, `fechaCompra`, `cantidad`, `codigo`, `idPagoBoleto`, `horaEntrada`) VALUES (3, 4, '2015-12-3 8:01:00', 1, 'pqrstuvw', 2, NULL);
INSERT INTO `autocinema`.`boleto` (`idBoleto`, `idFuncion`, `fechaCompra`, `cantidad`, `codigo`, `idPagoBoleto`, `horaEntrada`) VALUES (4, 2, '2015-12-4 19:00:00', 1, 'abcd', 3, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`compraCafeteria`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`compraCafeteria` (`idCompra`, `idUsuario`, `fechaPago`, `referencia`, `nombre`, `fechaEntrega`) VALUES (1, 2, '2016-1-1 8:10:00', 'textoreferencia', 'Iván Manzano', NULL);
INSERT INTO `autocinema`.`compraCafeteria` (`idCompra`, `idUsuario`, `fechaPago`, `referencia`, `nombre`, `fechaEntrega`) VALUES (2, 3, '2016-2-1 9:00:00', 'referenciadePago', 'Sergio Juárez', '2016-2-1 10:00:00');

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`detalleCompra`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`detalleCompra` (`idCompra`, `idProducto`, `cantidad`, `precioUnitario`) VALUES (1, 1, 2, 6);
INSERT INTO `autocinema`.`detalleCompra` (`idCompra`, `idProducto`, `cantidad`, `precioUnitario`) VALUES (1, 3, 2, 30);
INSERT INTO `autocinema`.`detalleCompra` (`idCompra`, `idProducto`, `cantidad`, `precioUnitario`) VALUES (2, 1, 3, 40);

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`propuesta`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`propuesta` (`idPropuesta`, `textoPropuesta`) VALUES (1, 'Avengers');
INSERT INTO `autocinema`.`propuesta` (`idPropuesta`, `textoPropuesta`) VALUES (2, 'Juno');
INSERT INTO `autocinema`.`propuesta` (`idPropuesta`, `textoPropuesta`) VALUES (3, 'Love Actually');
INSERT INTO `autocinema`.`propuesta` (`idPropuesta`, `textoPropuesta`) VALUES (4, 'Eterno resplandor de una mente sin recuerdos');

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`disponibilidadProducto`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`disponibilidadProducto` (`idProducto`, `idSede`, `existencia`) VALUES (1, 1, 40);
INSERT INTO `autocinema`.`disponibilidadProducto` (`idProducto`, `idSede`, `existencia`) VALUES (1, 2, 50);
INSERT INTO `autocinema`.`disponibilidadProducto` (`idProducto`, `idSede`, `existencia`) VALUES (2, 1, 30);
INSERT INTO `autocinema`.`disponibilidadProducto` (`idProducto`, `idSede`, `existencia`) VALUES (2, 2, 20);
INSERT INTO `autocinema`.`disponibilidadProducto` (`idProducto`, `idSede`, `existencia`) VALUES (3, 1, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `autocinema`.`comentario`
-- -----------------------------------------------------
START TRANSACTION;
USE `autocinema`;
INSERT INTO `autocinema`.`comentario` (`idComentario`, `texto`, `nombre`, `email`) VALUES (1, 'Comentario de prueba 1', 'Iván Manzano', 'manzanoivan@yopmail.com');
INSERT INTO `autocinema`.`comentario` (`idComentario`, `texto`, `nombre`, `email`) VALUES (2, 'Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo Comentario de prueba largo', 'Sergio Juárez', 'serj@yopmail.com');

COMMIT;

