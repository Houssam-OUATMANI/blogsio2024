CREATE TABLE `b2024sio`.`posts` (
                                    `id` INT NOT NULL AUTO_INCREMENT,
                                    `title` VARCHAR(255) NOT NULL,
                                    `content` TEXT NOT NULL,
                                    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                    `user_id` INT NOT NULL,
                                    PRIMARY KEY (`id`),
                                    INDEX `fk_user_idx` (`user_id` ASC) VISIBLE,
                                    CONSTRAINT `fk_user`
                                        FOREIGN KEY (`user_id`)
                                            REFERENCES `b2024sio`.`users` (`id`)
                                            ON DELETE CASCADE
                                            ON UPDATE CASCADE);