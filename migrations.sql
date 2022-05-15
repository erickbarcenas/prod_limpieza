DROP DATABASE IF EXISTS promedik;
CREATE DATABASE promedik;



CREATE TABLE `promedik`.`customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),

  CONSTRAINT `uc_customer_name` UNIQUE (
        `name`
   ),
  CONSTRAINT `uc_customer_email` UNIQUE (
        `email`
  )

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `promedik`.`order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `promedik`.`status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(100) NOT NULL,
  PRIMARY KEY (`id`),

  CONSTRAINT `uc_status_name` UNIQUE (
        `Name`
    )

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `promedik`.`order_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






CREATE TABLE `promedik`.`product` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`),

  CONSTRAINT `uc_product_name` UNIQUE (
        `Name`
  )

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `promedik`.`order` ADD CONSTRAINT `fk_order_customer_id` FOREIGN KEY(`customer_id`)
REFERENCES `promedik`.`customer` (`id`);


ALTER TABLE `promedik`.`order` ADD CONSTRAINT `fk_order_status_id` FOREIGN KEY(`status_id`)
REFERENCES `promedik`.`status` (`id`);


ALTER TABLE `promedik`.`order_line` ADD CONSTRAINT `fk_order_line_with_order_id` FOREIGN KEY(`order_id`)
REFERENCES `promedik`.`order` (`id`);



ALTER TABLE `order_line` ADD CONSTRAINT `fk_order_line_with_product_id` FOREIGN KEY(`product_id`)
REFERENCES `product` (`id`);


CREATE INDEX `idx_customer_name`
ON `promedik`.`customer` (`name`);

CREATE INDEX `idx_customer_email`
ON `promedik`.`customer` (`email`);





INSERT INTO `customer` (`name`,`email`,`password`)
VALUES
  ("Ray","2426@outlook.couk","NOW30LKQ4JY"),
  ("Diana","@icloud.edu","TXO17ELF8ST"),
  ("Genevieve","6436@google.net","EHT77SQK5OF"),
  ("Sybill","2249@icloud.couk","BOR43GOO5HY"),
  ("Salvador","4395@google.net","CIJ25GAG4PT");