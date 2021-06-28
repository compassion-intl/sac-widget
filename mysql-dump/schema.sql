CREATE SCHEMA `forms` ;

CREATE TABLE `forms`.`sac_widget_interactions` ( 
	`id` INT NOT NULL AUTO_INCREMENT, 
	`consignment` VARCHAR(12) NULL, 
	`ip` VARCHAR(20) NULL, 
	`number` INT NULL, 
	`referer` INT(12) NULL, 
	`type` VARCHAR(45) NOT NULL, 
	`url` LONGTEXT NULL, 
	PRIMARY KEY (`id`)
);