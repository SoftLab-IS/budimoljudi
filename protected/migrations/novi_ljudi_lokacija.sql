SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ljudi` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `ljudi` ;

-- -----------------------------------------------------
-- Table `ljudi`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ljudi`.`user` ;

CREATE TABLE IF NOT EXISTS `ljudi`.`user` (
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
-- Table `ljudi`.`state`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ljudi`.`state` ;

CREATE TABLE IF NOT EXISTS `ljudi`.`state` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ljudi`.`region`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ljudi`.`region` ;

CREATE TABLE IF NOT EXISTS `ljudi`.`region` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `state_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_region_state1_idx` (`state_id` ASC),
  CONSTRAINT `fk_region_state1`
    FOREIGN KEY (`state_id`)
    REFERENCES `ljudi`.`state` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ljudi`.`city`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ljudi`.`city` ;

CREATE TABLE IF NOT EXISTS `ljudi`.`city` (
  `ptt` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NULL,
  `region_id` INT NOT NULL,
  PRIMARY KEY (`ptt`),
  INDEX `fk_city_region1_idx` (`region_id` ASC),
  CONSTRAINT `fk_city_region1`
    FOREIGN KEY (`region_id`)
    REFERENCES `ljudi`.`region` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ljudi`.`Location`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ljudi`.`Location` ;

CREATE TABLE IF NOT EXISTS `ljudi`.`Location` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `state_id` INT NULL,
  `region_id` INT NULL,
  `city_ptt` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Location_state1_idx` (`state_id` ASC),
  INDEX `fk_Location_region1_idx` (`region_id` ASC),
  INDEX `fk_Location_city1_idx` (`city_ptt` ASC),
  CONSTRAINT `fk_Location_state1`
    FOREIGN KEY (`state_id`)
    REFERENCES `ljudi`.`state` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Location_region1`
    FOREIGN KEY (`region_id`)
    REFERENCES `ljudi`.`region` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Location_city1`
    FOREIGN KEY (`city_ptt`)
    REFERENCES `ljudi`.`city` (`ptt`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ljudi`.`action`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ljudi`.`action` ;

CREATE TABLE IF NOT EXISTS `ljudi`.`action` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `time_start` TIMESTAMP NULL,
  `description` TEXT NULL,
  `user_id` INT NOT NULL,
  `time_end` TIMESTAMP NULL,
  `number_of_participants` INT NULL,
  `Location_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_action_user_idx` (`user_id` ASC),
  INDEX `fk_action_Location1_idx` (`Location_id` ASC),
  CONSTRAINT `fk_action_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `ljudi`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_action_Location1`
    FOREIGN KEY (`Location_id`)
    REFERENCES `ljudi`.`Location` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ljudi`.`help`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ljudi`.`help` ;

CREATE TABLE IF NOT EXISTS `ljudi`.`help` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `time` VARCHAR(45) NULL,
  `types` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `user_id` INT NOT NULL,
  `Location_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_help_user1_idx` (`user_id` ASC),
  INDEX `fk_help_Location1_idx` (`Location_id` ASC),
  CONSTRAINT `fk_help_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ljudi`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_help_Location1`
    FOREIGN KEY (`Location_id`)
    REFERENCES `ljudi`.`Location` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ljudi`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ljudi`.`post` ;

CREATE TABLE IF NOT EXISTS `ljudi`.`post` (
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
    REFERENCES `ljudi`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ljudi`.`action_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ljudi`.`action_users` ;

CREATE TABLE IF NOT EXISTS `ljudi`.`action_users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `action_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_action_users_user1_idx` (`user_id` ASC),
  INDEX `fk_action_users_action1_idx` (`action_id` ASC),
  CONSTRAINT `fk_action_users_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ljudi`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_action_users_action1`
    FOREIGN KEY (`action_id`)
    REFERENCES `ljudi`.`action` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
