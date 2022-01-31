CREATE TABLE `Payment`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `purpose` VARCHAR(255) NOT NULL,
    `reference` VARCHAR(255) NOT NULL,
    `date_payed` DATETIME NOT NULL,
    `amount` BIGINT NOT NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL
);
ALTER TABLE
    `Payment` ADD PRIMARY KEY `payment_id_primary`(`id`);
ALTER TABLE
    `Payment` ADD INDEX `payment_user_id_index`(`user_id`);
CREATE TABLE `password_resets`(
    `email` VARCHAR(255) NOT NULL,
    `token` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NULL
);
ALTER TABLE
    `password_resets` ADD INDEX `password_resets_email_index`(`email`);
CREATE TABLE `permissions`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `display_name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL
);
ALTER TABLE
    `permissions` ADD PRIMARY KEY `permissions_id_primary`(`id`);
ALTER TABLE
    `permissions` ADD UNIQUE `permissions_name_unique`(`name`);
CREATE TABLE `permission_role`(
    `permission_id` BIGINT UNSIGNED NOT NULL,
    `role_id` BIGINT UNSIGNED NOT NULL
);
ALTER TABLE
    `permission_role` ADD PRIMARY KEY `permission_role_permission_id_role_id_primary`(`permission_id`, `role_id`);
ALTER TABLE
    `permission_role` ADD INDEX `permission_role_role_id_index`(`role_id`);
CREATE TABLE `permission_user`(
    `permission_id` BIGINT UNSIGNED NOT NULL,
    `user_id` BIGINT UNSIGNED NOT NULL,
    `user_type` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `permission_user` ADD PRIMARY KEY `permission_user_permission_id_user_id_user_type_primary`(
        `permission_id`,
        `user_id`,
        `user_type`
    );
ALTER TABLE
    `permission_user` ADD INDEX `permission_user_permission_id_index`(`permission_id`);
CREATE TABLE `roles`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `display_name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL
);
ALTER TABLE
    `roles` ADD PRIMARY KEY `roles_id_primary`(`id`);
ALTER TABLE
    `roles` ADD UNIQUE `roles_name_unique`(`name`);
CREATE TABLE `role_user`(
    `role_id` BIGINT UNSIGNED NOT NULL,
    `user_id` BIGINT UNSIGNED NOT NULL,
    `user_type` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `role_user` ADD PRIMARY KEY `role_user_role_id_user_id_user_type_primary`(`role_id`, `user_id`, `user_type`);
ALTER TABLE
    `role_user` ADD INDEX `role_user_role_id_index`(`role_id`);
CREATE TABLE `users`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `reg_no` TINYINT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` BIGINT NOT NULL,
    `level` INT NULL,
    `department` VARCHAR(255) NOT NULL,
    `email_verified_at` TIMESTAMP NULL,
    `password` VARCHAR(255) NOT NULL,
    `remember_token` VARCHAR(255) NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL
);
ALTER TABLE
    `users` ADD PRIMARY KEY `users_id_primary`(`id`);
ALTER TABLE
    `users` ADD UNIQUE `users_reg_no_unique`(`reg_no`);
ALTER TABLE
    `users` ADD UNIQUE `users_email_unique`(`email`);
CREATE TABLE `reversal`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `payment_id` BIGINT NOT NULL,
    `status` ENUM('') NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL
);
ALTER TABLE
    `reversal` ADD PRIMARY KEY `reversal_id_primary`(`id`);
ALTER TABLE
    `reversal` ADD CONSTRAINT `reversal_payment_id_foreign` FOREIGN KEY(`payment_id`) REFERENCES `Payment`(`id`);
ALTER TABLE
    `permission_role` ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY(`permission_id`) REFERENCES `permissions`(`id`);
ALTER TABLE
    `permission_role` ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY(`role_id`) REFERENCES `roles`(`id`);
ALTER TABLE
    `permission_user` ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY(`permission_id`) REFERENCES `permissions`(`id`);
ALTER TABLE
    `role_user` ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY(`role_id`) REFERENCES `roles`(`id`);
ALTER TABLE
    `Payment` ADD CONSTRAINT `payment_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`);