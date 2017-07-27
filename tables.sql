CREATE TABLE `MinUrl`.`visitors` (
 `id` INT NOT NULL AUTO_INCREMENT ,
 `id_url` INT NOT NULL ,
 `Country` VARCHAR(255) NOT NULL ,
 `City` VARCHAR(255) NOT NULL ,
 `ip_address`  INT unsigned,
 `created_at` TIMESTAMP DEFAULT '0000-00-00 00:00:00',
 PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `MinUrl`.`links` (
 `id` INT NOT NULL AUTO_INCREMENT ,
  `full_url` VARCHAR(255) NOT NULL ,
   `short_url` VARCHAR(255) NOT NULL ,
    `life_minutes` INT NOT NULL ,
     `created_at` TIMESTAMP DEFAULT '0000-00-00 00:00:00',
      `updated_at` TIMESTAMP DEFAULT now() ON UPDATE now(),
       PRIMARY KEY (`id`)) ENGINE = InnoDB;

