-- -----------------------------------------------------
-- Table `ljudi`.`help_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ljudi`.`help_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ljudi`.`help_has_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ljudi`.`help_has_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `help_id` INT NOT NULL,
  `help_types_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_help_has_types_help1_idx` (`help_id` ASC),
  INDEX `fk_help_has_types_help_types1_idx` (`help_types_id` ASC),
  CONSTRAINT `fk_help_has_types_help1`
    FOREIGN KEY (`help_id`)
    REFERENCES `ljudi`.`help` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_help_has_types_help_types1`
    FOREIGN KEY (`help_types_id`)
    REFERENCES `ljudi`.`help_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
