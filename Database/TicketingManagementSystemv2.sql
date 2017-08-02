-- MySQL Script generated by MySQL Workbench
-- 08/02/17 21:13:20
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`guest`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`guest` (
  `guest_id` INT NOT NULL,
  `guest_name` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`guest_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`room`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`room` (
  `room_id` INT NOT NULL,
  `room_type` VARCHAR(45) NOT NULL,
  `room_loc` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`room_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`department` (
  `dept_id` INT NOT NULL,
  `dept_name` VARCHAR(45) NOT NULL,
  `dept_description` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`dept_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`employee` (
  `emp_id` INT NOT NULL,
  `dept_id` INT NOT NULL,
  `position` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`emp_id`, `dept_id`),
  INDEX `fk_employee_department1_idx` (`dept_id` ASC),
  CONSTRAINT `fk_employee_department1`
    FOREIGN KEY (`dept_id`)
    REFERENCES `mydb`.`department` (`dept_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ticket` (
  `ticket_id` INT NOT NULL,
  `guest_id` INT NOT NULL,
  `room_id` INT NOT NULL,
  `emp_create_id` INT NOT NULL,
  PRIMARY KEY (`ticket_id`, `guest_id`, `room_id`, `emp_create_id`),
  INDEX `fk_ticket_guest_idx` (`guest_id` ASC),
  INDEX `fk_ticket_room1_idx` (`room_id` ASC),
  INDEX `fk_ticket_employee1_idx` (`emp_create_id` ASC),
  CONSTRAINT `fk_ticket_guest`
    FOREIGN KEY (`guest_id`)
    REFERENCES `mydb`.`guest` (`guest_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_room1`
    FOREIGN KEY (`room_id`)
    REFERENCES `mydb`.`room` (`room_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_employee1`
    FOREIGN KEY (`emp_create_id`)
    REFERENCES `mydb`.`employee` (`emp_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`category` (
  `category_id` INT NOT NULL,
  `category_name` VARCHAR(45) NOT NULL,
  `category_desc` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ticket_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ticket_details` (
  `ticket_det_id` INT NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `time_start` TIMESTAMP NOT NULL,
  `time_end` TIMESTAMP NOT NULL,
  `emp_resp_id` INT NOT NULL,
  `dept_resp_id` INT NOT NULL,
  `category_category_id` INT NOT NULL,
  `ticket_ticket_id` INT NOT NULL,
  `ticket_guest_id` INT NOT NULL,
  PRIMARY KEY (`ticket_det_id`, `emp_resp_id`, `dept_resp_id`, `category_category_id`, `ticket_ticket_id`, `ticket_guest_id`),
  INDEX `fk_ticket_details_employee1_idx` (`emp_resp_id` ASC, `dept_resp_id` ASC),
  INDEX `fk_ticket_details_category1_idx` (`category_category_id` ASC),
  INDEX `fk_ticket_details_ticket1_idx` (`ticket_ticket_id` ASC, `ticket_guest_id` ASC),
  CONSTRAINT `fk_ticket_details_employee1`
    FOREIGN KEY (`emp_resp_id` , `dept_resp_id`)
    REFERENCES `mydb`.`employee` (`emp_id` , `dept_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_details_category1`
    FOREIGN KEY (`category_category_id`)
    REFERENCES `mydb`.`category` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_details_ticket1`
    FOREIGN KEY (`ticket_ticket_id` , `ticket_guest_id`)
    REFERENCES `mydb`.`ticket` (`ticket_id` , `guest_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
