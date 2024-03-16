-- Adminer 4.8.1 MySQL 8.0.32-0ubuntu0.22.04.2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `game` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bet` double(255,2) NOT NULL,
  `chance` double(255,2) NOT NULL,
  `win` double(255,2) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fake` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jackpot_bets`;
CREATE TABLE `jackpot_bets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `game_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(32,2) NOT NULL,
  `ticket_from` bigint NOT NULL,
  `ticket_to` bigint NOT NULL,
  `chance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jackpots`;
CREATE TABLE `jackpots` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `winner_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `winner_ticket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `random` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `text` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `mines`;
CREATE TABLE `mines` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount` float NOT NULL,
  `bombs` int NOT NULL,
  `step` int NOT NULL DEFAULT '0',
  `grid` json DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `fake` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `sum` double(255,2) NOT NULL,
  `bonus` double(16,2) NOT NULL DEFAULT '0.00',
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `profit`;
CREATE TABLE `profit` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bank_dice` double(16,2) NOT NULL DEFAULT '0.00',
  `bank_mines` double(16,2) NOT NULL DEFAULT '0.00',
  `bank_bubbles` double(16,2) NOT NULL DEFAULT '0.00',
  `earn_bubbles` double(16,2) NOT NULL DEFAULT '0.00',
  `comission` int NOT NULL DEFAULT '0',
  `earn_dice` double(16,2) NOT NULL DEFAULT '0.00',
  `earn_mines` double(16,2) NOT NULL DEFAULT '0.00',
  `earn_wheel` double(16,2) DEFAULT '0.00',
  `bank_wheel` double(16,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `profit` (`id`, `bank_dice`, `bank_mines`, `bank_bubbles`, `earn_bubbles`, `comission`, `earn_dice`, `earn_mines`, `earn_wheel`, `bank_wheel`, `created_at`, `updated_at`) VALUES
(1,	1000.00,	1000.00,	1000.00,	0.00,	0,	0.00,	0.00,	0.00,	0.00,	NULL,	'2022-10-16 01:14:51');

DROP TABLE IF EXISTS `promocode_activations`;
CREATE TABLE `promocode_activations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `promo_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `promocodes`;
CREATE TABLE `promocodes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sum` double(255,2) NOT NULL,
  `activation` int NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `referral_payments`;
CREATE TABLE `referral_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `referral_id` bigint unsigned NOT NULL,
  `sum` double(255,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `referral_profits`;
CREATE TABLE `referral_profits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `ref_id` int NOT NULL,
  `amount` double(16,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kassa_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kassa_secret1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kassa_secret2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kassa_key` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet_secret` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet_desc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xmpay_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xmpay_public` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xmpay_secret` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_payment_sum` double(8,2) DEFAULT NULL,
  `min_bonus_sum` double(8,2) DEFAULT NULL,
  `min_withdraw_sum` double(8,2) DEFAULT NULL,
  `min_dep_withdraw` int DEFAULT NULL,
  `withdraw_request_limit` int DEFAULT NULL,
  `vk_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tg_channel` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tg_bot` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vk_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vk_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_perc` int DEFAULT NULL,
  `ref_price` float NOT NULL DEFAULT '0',
  `bot_timer` double(8,2) DEFAULT NULL,
  `file_version` int NOT NULL DEFAULT '1',
  `connect_bonus` int NOT NULL DEFAULT '0',
  `antiminus` int NOT NULL DEFAULT '0',
  `recapctha_site` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recapctha_secret` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vk_support_url` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `title`, `description`, `keywords`, `kassa_id`, `kassa_secret1`, `kassa_secret2`, `kassa_key`, `wallet_id`, `wallet_secret`, `wallet_desc`, `xmpay_id`, `xmpay_public`, `xmpay_secret`, `min_payment_sum`, `min_bonus_sum`, `min_withdraw_sum`, `min_dep_withdraw`, `withdraw_request_limit`, `vk_url`, `tg_channel`, `tg_bot`, `vk_id`, `vk_token`, `ref_perc`, `ref_price`, `bot_timer`, `file_version`, `connect_bonus`, `antiminus`, `recapctha_site`, `recapctha_secret`, `vk_support_url`, `created_at`, `updated_at`) VALUES
(1,	'madscripts.su',	'madscripts.su',	'madscripts.su',	'111',	'111',	'111',	'111',	'111',	'111',	'111',	'111',	'11',	'111',	10.00,	1.00,	1.00,	1,	1,	'https://vk.com/vhteam',	'https://t.me/vh_scripts',	'https://t.me/vh_scripts',	'https://t.me/vh_scripts',	'https://t.me/vh_scripts',	1,	1,	0.00,	0,	5,	1,	'',	'',	'https://vk.com/vhteam',	'2023-03-17 19:15:51',	'2023-03-17 19:15:51');

DROP TABLE IF EXISTS `slots`;
CREATE TABLE `slots` (
  `id` int NOT NULL AUTO_INCREMENT,
  `game_id` varchar(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `provider` varchar(150) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `show` int NOT NULL DEFAULT '1',
  `priority` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_200` varchar(1500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://vk.com/images/camera_200.png',
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double(255,2) NOT NULL DEFAULT '0.00',
  `wager` double(16,2) NOT NULL DEFAULT '0.00',
  `wager_status` int NOT NULL DEFAULT '1',
  `is_vk` tinyint(1) NOT NULL,
  `vk_id` bigint DEFAULT NULL,
  `tg_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `vk_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dice` double(16,2) NOT NULL DEFAULT '0.00',
  `mines` double(16,2) NOT NULL DEFAULT '0.00',
  `slots` double(16,2) NOT NULL DEFAULT '0.00',
  `bubbles` double(16,2) NOT NULL DEFAULT '0.00',
  `hid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mines_game` json DEFAULT NULL,
  `referral_use` json DEFAULT NULL,
  `referral_percent` double(16,2) NOT NULL DEFAULT '0.00',
  `referral_send` int NOT NULL DEFAULT '0',
  `mines_is_active` tinyint(1) NOT NULL DEFAULT '0',
  `referral_use_promo` timestamp NULL DEFAULT NULL,
  `is_bot` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` int NOT NULL DEFAULT '0',
  `is_moderator` int NOT NULL DEFAULT '0',
  `is_promocoder` int NOT NULL DEFAULT '0',
  `is_youtuber` int NOT NULL DEFAULT '0',
  `is_worker` int NOT NULL DEFAULT '0',
  `privacy_hide` int NOT NULL DEFAULT '0',
  `privacy_hide_transfer` int NOT NULL DEFAULT '0',
  `ban` int NOT NULL DEFAULT '0',
  `bonus_use` int NOT NULL DEFAULT '0',
  `vk_bonus_use` int NOT NULL DEFAULT '0',
  `tg_bonus_use` int NOT NULL DEFAULT '0',
  `created_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chat_ban` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chat_ban_reason` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `game_token` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `game_token_date` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `withdraws`;
CREATE TABLE `withdraws` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `sum` double(255,2) NOT NULL,
  `sumWithCom` double(16,2) NOT NULL DEFAULT '0.00',
  `wallet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `system` int NOT NULL,
  `system_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `fake` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2023-03-17 19:16:00
