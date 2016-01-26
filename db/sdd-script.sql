-- MySQL Workbench Synchronization
-- Generated: 2016-01-26 18:49
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: MartaVargas

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

ALTER TABLE `sdd-ufg`.`users` 
DROP FOREIGN KEY `fk_users_teachers1`;

ALTER TABLE `sdd-ufg`.`teachers` 
ADD COLUMN `users_id` INT(11) NULL DEFAULT NULL AFTER `situation`,
ADD INDEX `fk_teachers_users1_idx` (`users_id` ASC);

ALTER TABLE `sdd-ufg`.`users` 
DROP COLUMN `teacher_id`,
DROP INDEX `fk_users_teachers1_idx` ;

ALTER TABLE `sdd-ufg`.`teachers` 
ADD CONSTRAINT `fk_teachers_users1`
  FOREIGN KEY (`users_id`)
  REFERENCES `sdd-ufg`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
