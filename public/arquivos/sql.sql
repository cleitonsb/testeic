
CREATE SCHEMA IF NOT EXISTS `quake` DEFAULT CHARACTER SET utf8 ;
USE `quake` ;

-- -----------------------------------------------------
-- Table `quake`.`games`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quake`.`games` (
  `idgame` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`idgame`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quake`.`players`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quake`.`players` (
  `idplayer` INT NOT NULL AUTO_INCREMENT,
  `idgame` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `kills` INT NULL,
  PRIMARY KEY (`idplayer`),
  INDEX `fk_players_games_idx` (`idgame` ASC),
  CONSTRAINT `fk_players_games`
    FOREIGN KEY (`idgame`)
    REFERENCES `quake`.`games` (`idgame`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


