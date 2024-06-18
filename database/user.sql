CREATE TABLE `b2024sio`.`users` (
                                    `id` INT NOT NULL AUTO_INCREMENT,
                                    `firstname` VARCHAR(255) NOT NULL,
                                    `lastname` VARCHAR(255) NOT NULL,
                                    `email` VARCHAR(255) NOT NULL ,
                                    `password` VARCHAR(255) NOT NULL,
                                    `role` ENUM('USER', 'ADMIN') NOT NULL DEFAULT 'USER',
                                    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                    PRIMARY KEY (`id`),
                                    UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE);


ALTER TABLE `b2024sio`.`posts`
    ADD COLUMN `thumbnail` VARCHAR(255) NOT NULL AFTER `user_id`;
