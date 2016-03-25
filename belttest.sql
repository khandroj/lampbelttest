SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema belttest
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema belttest
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `belttest` DEFAULT CHARACTER SET utf8 ;
USE `belttest` ;

-- -----------------------------------------------------
-- Table `belttest`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `belttest`.`users` (
  `id` INT NOT NULL,
  `Name` VARCHAR(45) NULL,
  `Alias` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  `DOB` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `belttest`.`friends`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `belttest`.`friends` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `belttest`.`notfriend`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `belttest`.`notfriend` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `belttest`.`users_has_notfriend`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `belttest`.`users_has_notfriend` (
  `users_id` INT NOT NULL,
  `notfriend_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `notfriend_id`),
  INDEX `fk_users_has_notfriend_notfriend1_idx` (`notfriend_id` ASC),
  INDEX `fk_users_has_notfriend_users_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_notfriend_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `belttest`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_notfriend_notfriend1`
    FOREIGN KEY (`notfriend_id`)
    REFERENCES `belttest`.`notfriend` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `belttest`.`users_has_friends`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `belttest`.`users_has_friends` (
  `users_id` INT NOT NULL,
  `friends_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `friends_id`),
  INDEX `fk_users_has_friends_friends1_idx` (`friends_id` ASC),
  INDEX `fk_users_has_friends_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_friends_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `belttest`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_friends_friends1`
    FOREIGN KEY (`friends_id`)
    REFERENCES `belttest`.`friends` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
