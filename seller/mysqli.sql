-- FruitSellerSiteEcommerce Database Table below
-- 1.CREATE
CREATE TABLE `fruitsellersiteecommerce`.`seller` (
    `s-id` INT(20) NOT NULL AUTO_INCREMENT,
    `s-name` VARCHAR(50) NOT NULL,
    `s-email` VARCHAR(50) NOT NULL,
    `s-password` VARCHAR(15) NOT NULL,
    `s-profile` VARCHAR(250) NOT NULL,
    PRIMARY KEY (`s-id`)
) ENGINE = InnoDB;

-- SEllER TABLE INSERTION
-- 2.INSERT 
INSERT INTO
    `seller` (
        `s-id`,
        `s-name`,
        `s-email`,
        `s-password`,
        `s-profile`
    )
VALUES
    ('1', 'Roman', 'romansds', '123', '1w1ss');

-- ==========================================================================================
SELECT
    `s-id`,
    `s-name`,
    `s-email`,
    `s-password`,
    `s-profile`
FROM
    `seller`
WHERE
    1 -- yo bhanda yo better
SELECT
    *
FROM
    `seller`
WHERE
    email = ? -- ==========================================================================================
    -- 2.  PRODUCT TABLE BELOW
    CREATE TABLE `fruitsellersiteecommerce`.`products` (
        `p-id` INT(20) NOT NULL AUTO_INCREMENT,
        `p-name` VARCHAR(50) NOT NULL,
        `p-price` INT(25) NOT NULL,
        `p-image` VARCHAR(25) NOT NULL,
        `p-detail` VARCHAR(250) NOT NULL,
        `p-status` VARCHAR(20) NOT NULL,
        PRIMARY KEY (`p-id`)
    ) ENGINE = InnoDB;

--3.. ADDED s-id column as a row..... 
ALTER TABLE
    `products`
ADD
    `s-id` INT(20) NOT NULL
AFTER
    `p-status`;

------ Making s-id on Product as a Foreign Key
ALTER TABLE
    `products`
ADD
    FOREIGN KEY (`s-id`) REFERENCES `seller`(`s-id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- disabled property in input tag in a ADMIN PANEL 
-- Admin table
CREATE TABLE `fruitsellersiteecommerce`.`admin` (
    `id` INT(20) NOT NULL AUTO_INCREMENT,
    `useremail` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- admin DML -Insert
INSERT INTO
    `admin` (`id`, `useremail`, `password`)
VALUES
    ('1', 'fruitadmin097@gmail.com', 'fruit2097');

-- Modify Admin Name into New Name i.e HeadAdmin
ALTER TABLE
    admin RENAME TO Headadmin;


-- Modify products Name  of Seller into New Name i.e sellerproducts

ALTER TABLE products RENAME TO sellerproducts;

