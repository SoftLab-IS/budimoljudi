SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `budimoljudi` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `budimoljudi` ;

-- -----------------------------------------------------
-- Table `budimoljudi`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `budimoljudi`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `type` VARCHAR(45) NULL,
  `email` VARCHAR(120) NULL,
  `phone` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `budimoljudi`.`state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `budimoljudi`.`state` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `budimoljudi`.`region`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `budimoljudi`.`region` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `state_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_region_state1_idx` (`state_id` ASC),
  CONSTRAINT `fk_region_state1`
    FOREIGN KEY (`state_id`)
    REFERENCES `budimoljudi`.`state` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `budimoljudi`.`city`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `budimoljudi`.`city` (
  `ptt` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NULL,
  `region_id` INT NOT NULL,
  PRIMARY KEY (`ptt`),
  INDEX `fk_city_region1_idx` (`region_id` ASC),
  CONSTRAINT `fk_city_region1`
    FOREIGN KEY (`region_id`)
    REFERENCES `budimoljudi`.`region` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `budimoljudi`.`action`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `budimoljudi`.`action` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `time_start` TIMESTAMP NULL,
  `description` TEXT NULL,
  `user_id` INT NOT NULL,
  `time_end` TIMESTAMP NULL,
  `city_ptt` INT NOT NULL,
  `number_of_participants` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_action_user_idx` (`user_id` ASC),
  INDEX `fk_action_city1_idx` (`city_ptt` ASC),
  CONSTRAINT `fk_action_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `budimoljudi`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_action_city1`
    FOREIGN KEY (`city_ptt`)
    REFERENCES `budimoljudi`.`city` (`ptt`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `budimoljudi`.`help`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `budimoljudi`.`help` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `time` VARCHAR(45) NULL,
  `types` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `user_id` INT NOT NULL,
  `city_ptt` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_help_user1_idx` (`user_id` ASC),
  INDEX `fk_help_city1_idx` (`city_ptt` ASC),
  CONSTRAINT `fk_help_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `budimoljudi`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_help_city1`
    FOREIGN KEY (`city_ptt`)
    REFERENCES `budimoljudi`.`city` (`ptt`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `budimoljudi`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `budimoljudi`.`post` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `content` TEXT NULL,
  `image` VARCHAR(255) NULL,
  `user_id` INT NOT NULL,
  `date` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_post_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_post_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `budimoljudi`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
