-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rsvp_planner
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS rsvp_planner;

-- -----------------------------------------------------
-- Schema rsvp_planner
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS rsvp_planner DEFAULT CHARACTER SET utf8 ;
USE rsvp_planner ;

-- -----------------------------------------------------
-- Table rsvp_planner.administrador
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rsvp_planner.administrador (
  nombre VARCHAR(45) NOT NULL,
  apaterno VARCHAR(45) NOT NULL,
  amaterno VARCHAR(45) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(50) NOT NULL,
  PRIMARY KEY (email));


-- -----------------------------------------------------
-- Table rsvp_planner.anfitrion
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rsvp_planner.anfitrion (
  folio INT(10) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(45) NOT NULL,
  apaterno VARCHAR(45) NOT NULL,
  amaterno VARCHAR(45) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(50) NOT NULL,
  PRIMARY KEY (folio));

CREATE TABLE IF NOT EXISTS rsvp_planner.invitado (
  folio INT(10) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(45) NOT NULL,
  apaterno VARCHAR(45) NOT NULL,
  amaterno VARCHAR(45) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(50) NOT NULL,
  PRIMARY KEY (folio));
  
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO rsvp_planner.administrador VALUES ('Ana', 'Medina', 'Angeles', 'ana.medina.angeles@gmail.com', 'ana12');