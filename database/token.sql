CREATE TABLE `b2024sio`.`tokens` (
                                     `id` INT NOT NULL,
                                     `token` VARCHAR(255) NOT NULL,
                                     `email` VARCHAR(255) NOT NULL,
                                     `expires_at` DATETIME NOT NULL,
                                     `is_used` TINYINT NOT NULL DEFAULT 0,
                                     PRIMARY KEY (`id`));
