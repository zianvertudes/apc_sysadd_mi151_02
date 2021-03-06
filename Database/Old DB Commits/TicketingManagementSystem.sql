-- MySQL Script generated by MySQL Workbench
-- Mon Jul 31 10:14:23 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema TicketingManagementSystem
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema TicketingManagementSystem
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `TicketingManagementSystem` DEFAULT CHARACTER SET utf8 ;
USE `TicketingManagementSystem` ;

-- -----------------------------------------------------
-- Table `TicketingManagementSystem`.`guest`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TicketingManagementSystem`.`guest` (
  `guest_id` INT NOT NULL,
  `guest_name` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`guest_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TicketingManagementSystem`.`room`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TicketingManagementSystem`.`room` (
  `room_id` INT NOT NULL,
  `room_type` VARCHAR(45) NOT NULL,
  `room_loc` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`room_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TicketingManagementSystem`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TicketingManagementSystem`.`department` (
  `dept_id` INT NOT NULL,
  PRIMARY KEY (`dept_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TicketingManagementSystem`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TicketingManagementSystem`.`employee` (
  `emp_id` INT NOT NULL,
  `department_dept_id` INT NOT NULL,
  `position` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`emp_id`, `department_dept_id`),
  INDEX `fk_employee_department1_idx` (`department_dept_id` ASC),
  CONSTRAINT `fk_employee_department1`
    FOREIGN KEY (`department_dept_id`)
    REFERENCES `TicketingManagementSystem`.`department` (`dept_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TicketingManagementSystem`.`ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TicketingManagementSystem`.`ticket` (
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
    REFERENCES `TicketingManagementSystem`.`guest` (`guest_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_room1`
    FOREIGN KEY (`room_id`)
    REFERENCES `TicketingManagementSystem`.`room` (`room_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_employee1`
    FOREIGN KEY (`emp_create_id`)
    REFERENCES `TicketingManagementSystem`.`employee` (`emp_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TicketingManagementSystem`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TicketingManagementSystem`.`category` (
  `category_id` INT NOT NULL,
  `category_name` VARCHAR(45) NOT NULL,
  `category_desc` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TicketingManagementSystem`.`ticket_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TicketingManagementSystem`.`ticket_details` (
  `ticket_det_id` INT NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `time_start` VARCHAR(45) NOT NULL,
  `time_end` VARCHAR(45) NOT NULL,
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
    REFERENCES `TicketingManagementSystem`.`employee` (`emp_id` , `department_dept_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_details_category1`
    FOREIGN KEY (`category_category_id`)
    REFERENCES `TicketingManagementSystem`.`category` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_details_ticket1`
    FOREIGN KEY (`ticket_ticket_id` , `ticket_guest_id`)
    REFERENCES `TicketingManagementSystem`.`ticket` (`ticket_id` , `guest_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
