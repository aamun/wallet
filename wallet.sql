SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `incomes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `incomes` (
  `idIncome` INT NOT NULL AUTO_INCREMENT,
  `amount` DECIMAL(10,2) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `tags` TEXT NOT NULL,
  `income_date` DATE NOT NULL,
  `created` DATE NOT NULL,
  `idUser` INT NOT NULL,
  PRIMARY KEY (`idIncome`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `expenses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `expenses` (
  `idExpense` INT NOT NULL AUTO_INCREMENT,
  `amount` DECIMAL(10,2) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `tags` TEXT NOT NULL,
  `expense_date` DATE NOT NULL,
  `created` DATE NOT NULL,
  `idUser` INT NOT NULL,
  PRIMARY KEY (`idExpense`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `username` VARCHAR(16) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`idUser`));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
