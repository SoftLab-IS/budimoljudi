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