CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(100) NOT NULL,
    `username` VARCHAR(100) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `admin` BOOLEAN DEFAULT FALSE,
    `created` DATETIME,
	`modified` DATETIME,
    CONSTRAINT `pk_users` PRIMARY KEY (`id`)
);

CREATE TABLE cards (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
    `description` TEXT NOT NULL,
    `image` TEXT NOT NULL,
	`version` VARCHAR(500) NOT NULL,
	`type` VARCHAR(50) NOT NULL,
	`rarity` VARCHAR(50) NOT NULL,
    `quantity` INT NOT NULL,
    `price` FLOAT NOT NULL DEFAULT 0,
    `created` DATETIME,
    `modified` DATETIME,
    `user_id` INT,
	CONSTRAINT `pk_cards` PRIMARY KEY (`id`),
    CONSTRAINT `fk_cards_users` FOREIGN KEY (`user_id`) REFERENCES users (id)
);