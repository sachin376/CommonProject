-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sachin_ags_1
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `sachin_ags_1` ;

-- -----------------------------------------------------
-- Schema sachin_ags_1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sachin_ags_1` DEFAULT CHARACTER SET utf8 ;
USE `sachin_ags_1` ;

-- -----------------------------------------------------
-- Table `sachin_ags_1`.`games`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sachin_ags_1`.`games` ;

CREATE TABLE IF NOT EXISTS `sachin_ags_1`.`games` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `description` VARCHAR(255) NULL,
  `genre` VARCHAR(45) NULL,
  `artist` VARCHAR(255) NULL,
  `cost` INT NULL,
  `release_date` DATETIME NULL,
  `rating` INT NULL,
  `created_date` DATETIME NULL,
  `updated_date` DATETIME NULL,
  -- `created_by` INT NULL,
  -- `updated_by` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sachin_ags_1`.`players`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sachin_ags_1`.`players` ;

CREATE TABLE IF NOT EXISTS `sachin_ags_1`.`players` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `screen_name` VARCHAR(128) NULL,
  `first_name` VARCHAR(64) NULL,
  `last_name` VARCHAR(64) NULL,
  `password` VARCHAR(64) NULL,
  `encrypted_password` VARCHAR(256) NULL,
  `plaintext_password` VARCHAR(64) NULL,
  `email` VARCHAR(128) NULL,
  `favorite_game` VARCHAR(128) NULL,
  `phone` VARCHAR(64) NULL,
  `phone_type` ENUM("Android", "IOS") NULL,
  `dob` DATETIME NULL,
  `date_joined` DATETIME NULL,
  `last_login` DATETIME NULL,
  `role` ENUM("guest", "member", "gameDev", "admin", "superAdmin") NULL,
  `created_date` DATETIME NULL,
  `updated_date` DATETIME NULL,
  -- `created_by` INT NULL,
  -- `updated_by` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sachin_ags_1`.`gameplayer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sachin_ags_1`.`gameplayer` ;

CREATE TABLE IF NOT EXISTS `sachin_ags_1`.`gameplayer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `gameid` INT NULL,
  `playerid` INT NOT NULL,
  `game_state` LONGTEXT NULL,
  `purchased` bool NULL,
  `played` bool NULL,
  `reviewed` bool NULL,
  `game_high_score` INT NULL,
  `review_text` TINYTEXT NULL,
  `review_rating` INT NULL,
  `review_date` DATETIME NULL,
  `created_date` DATETIME NULL,
  `updated_date` DATETIME NULL,
  -- `created_by` INT NULL,
  -- `updated_by` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_gameplayer_players`
    FOREIGN KEY (`playerid`)
    REFERENCES `sachin_ags_1`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_gameplayer_games`
    FOREIGN KEY (`gameid`)
    REFERENCES `sachin_ags_1`.`games` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
