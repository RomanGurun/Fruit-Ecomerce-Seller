-- FruitSellerSiteEcommerce Database Table below
-- 1.CREATE
CREATE TABLE `fruitsellersiteecommerce`.`seller` (`s-id` INT(20) NOT NULL AUTO_INCREMENT , `s-name` VARCHAR(50) NOT NULL , `s-email` VARCHAR(50) NOT NULL , `s-password` VARCHAR(15) NOT NULL , `s-profile` VARCHAR(250) NOT NULL , PRIMARY KEY (`s-id`)) ENGINE = InnoDB;

-- SEllER TABLE INSERTION
-- 2.INSERT 
INSERT INTO `seller` (`s-id`, `s-name`, `s-email`, `s-password`, `s-profile`) VALUES ('1', 'Roman', 'romansds', '123', '1w1ss');
-- ==========================================================================================
SELECT `s-id`, `s-name`, `s-email`, `s-password`, `s-profile` FROM `seller` WHERE 1
-- yo bhanda yo better
SELECT * FROM `seller` WHERE email =?
-- ==========================================================================================


-- 2.  PRODUCT TABLE BELOW
CREATE TABLE `fruitsellersiteecommerce`.`products` (`p-id` INT(20) NOT NULL AUTO_INCREMENT , `p-name` VARCHAR(50) NOT NULL , `p-price` INT(25) NOT NULL , `p-image` VARCHAR(25) NOT NULL , `p-detail` VARCHAR(250) NOT NULL , `p-status` VARCHAR(20) NOT NULL , PRIMARY KEY (`p-id`)) ENGINE = InnoDB;


