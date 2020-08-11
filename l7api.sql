-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2020 at 05:29 AM
-- Server version: 5.7.19
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l7api`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(65, '2014_10_12_000000_create_users_table', 1),
(66, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(67, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(68, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(69, '2016_06_01_000004_create_oauth_clients_table', 1),
(70, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(71, '2019_08_19_000000_create_failed_jobs_table', 1),
(72, '2020_07_23_115416_create_roles_table', 1),
(73, '2020_07_23_115852_add_user_role_id_in_users_table', 1),
(74, '2020_07_23_120039_create_user_directory_details_table', 1),
(75, '2020_07_23_120145_create_user_file_details_table', 1),
(76, '2020_07_23_120246_create_user_notifications_table', 1),
(77, '2020_07_24_121948_modify_username_field_in_users_table', 2),
(78, '2020_07_27_180718_create_settings_table', 3),
(79, '2020_07_28_061741_add_soft_delete_user_directory_details', 4),
(80, '2020_07_28_062731_add_soft_delete_user_file_details', 5),
(81, '2020_08_03_110733_modify_user_notifications_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('00a99e1de9327b12e03e4f43038b444405c2a77697d4927e55a8208ff47f355317ae73be2034a5a9', 3, 3, 'authToken', '[]', 0, '2020-07-24 08:15:21', '2020-07-24 08:15:21', '2021-07-24 13:15:21'),
('1a5554defc28eb39e5ae770456ef0cd536f8bf0360ef7df88ff51065ee6d748042b649ad661ec56a', 3, 3, 'authToken', '[]', 0, '2020-07-24 08:29:37', '2020-07-24 08:29:37', '2021-07-24 13:29:37'),
('31868038a5b5375855491850b22f8ad8063677cdb3e8d629570239d43f4d01609da298b9bc94f3e5', 3, 3, 'authToken', '[]', 0, '2020-08-04 05:37:51', '2020-08-04 05:37:51', '2021-08-04 10:37:51'),
('686d03ab89c63e46551ff34c4d6af3dc5e7b2e83097355ee8fc104a281bc86241d176ce30cc61089', 3, 3, 'authToken', '[]', 0, '2020-07-24 02:16:38', '2020-07-24 02:16:38', '2021-07-24 07:16:38'),
('75351ef9dc651dce812b34f5f3b1a74b09fd71eca231a662d55d4f324650e1b98b3367574a6b9e5e', 3, 3, 'authToken', '[]', 0, '2020-07-25 05:32:18', '2020-07-25 05:32:18', '2021-07-25 10:32:18'),
('868b30a67358cefedec907d9f333d49c896e7b46c70b502417ff056bfde382fa22fa65d8dabd550c', 3, 3, 'authToken', '[]', 0, '2020-08-04 05:38:03', '2020-08-04 05:38:03', '2021-08-04 10:38:03'),
('c53d25d22071c5697386aec795cc102f615606a0ee91da53ffe3fda3b5fa0bb6491de13dd2fefe0b', 3, 3, 'authToken', '[]', 0, '2020-07-24 12:32:17', '2020-07-24 12:32:17', '2021-07-24 17:32:17'),
('c70a3b7dbb25f1cc6e1ffc08a2d2f44c696de6d1a86aeb6d911354325a09e23a3422106f4c8bee36', 3, 3, 'authToken', '[]', 0, '2020-07-24 08:40:29', '2020-07-24 08:40:29', '2021-07-24 13:40:29'),
('e315a184828d02b8bca8f82fddff179eff37a4d54f33972878b1ae4576bbd4d2894966bacd1b9d7f', 3, 3, 'authToken', '[]', 0, '2020-07-27 01:40:49', '2020-07-27 01:40:49', '2021-07-27 06:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '2kD1FuMJCWAmOwAVeLOBT2NJpxxnmrUWpdJj9wiF', NULL, 'http://localhost', 1, 0, 0, '2020-07-24 02:16:10', '2020-07-24 02:16:10'),
(2, NULL, 'Laravel Password Grant Client', 'rf5kDBb9mK9A128uUtcoZTqVJugwnldxcypKu2gA', 'users', 'http://localhost', 0, 1, 0, '2020-07-24 02:16:10', '2020-07-24 02:16:10'),
(3, NULL, 'Laravel Personal Access Client', 'upV9uTAUC8UBqop7xiDArrxGyspW739bZvk4k5Zb', NULL, 'http://localhost', 1, 0, 0, '2020-07-24 02:16:16', '2020-07-24 02:16:16'),
(4, NULL, 'Laravel Password Grant Client', 'ItBGfKulti0TlqDA6e6DYcLKi4le1nvujHmYiuu5', 'users', 'http://localhost', 0, 1, 0, '2020-07-24 02:16:16', '2020-07-24 02:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-24 02:16:10', '2020-07-24 02:16:10'),
(2, 3, '2020-07-24 02:16:16', '2020-07-24 02:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_creation_allowed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `file_deletion_allowed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `file_view_allowed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `file_download_allowed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `folder_creation_allowed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `folder_deletion_allowed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `folder_view_allowed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `folder_download_allowed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `file_creation_allowed`, `file_deletion_allowed`, `file_view_allowed`, `file_download_allowed`, `folder_creation_allowed`, `folder_deletion_allowed`, `folder_view_allowed`, `folder_download_allowed`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL),
(2, 'Subscriber', '1', '0', '1', '0', '1', '0', '1', '0', NULL, NULL),
(3, 'Client', '0', '1', '0', '1', '0', '1', '0', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'recentfilefrequency', '100', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_first_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_website` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `user_first_name`, `user_last_name`, `user_company`, `user_email`, `user_website`, `username`, `password`, `is_active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 3, 'Shaid', 'Ali', 'Rezaid', 'shahidshah@gmail.com', 'rezaid.co.uk', 'shahidali', '$2y$10$z7dp9dQB3G42BShk8mJjWeSkHaCQXW6DBC8nzgi1gohuy7b/ZkWhi', '0', NULL, NULL, NULL, NULL),
(2, 2, 'Waqas', 'Ikram', 'Rezaid', 'waqasikram@gmail.com', 'rezaid.co.uk', 'waqasikram', '$2y$10$3jGNJbYXxpmZKh70HHXVzekTqYklsfwP.yIOaAjZFIzfY0/cqTgIy', '1', NULL, NULL, NULL, NULL),
(3, 1, 'Muhammad', 'Faisal', 'Rezaid', 'muhfaisal88@hotmail.com', 'rezaid.co.uk', 'muhfaisal', '$2y$10$ecMhCyu/iCwrUZAQ72VgW.XzVOiY/lLWVhny5BHPcM38dtPz3jRMC', '1', NULL, NULL, NULL, NULL),
(4, 3, 'John', 'Wick', 'Chakor', 'jogn@gmail.com', NULL, 'johnwick', '$2y$10$q67dQCbr0UmvNvUPHaaXue8FMYB3JP4xCWfklQUoJ9PddJAMXK6Zi', '0', NULL, NULL, '2020-07-24 02:19:05', '2020-07-24 02:19:05'),
(11, 3, 'Faisal', 'Hameed', 'Rezaid', 'faisal.hameed@rezaid.co.uk', NULL, 'faisalhameed', '$2y$10$ZeXeTj75zZMKqnj/7v.y4uDcA/JVsKiNOPq3O5DxM37On7TucXABK', '0', NULL, NULL, '2020-07-24 08:55:17', '2020-07-24 08:55:17'),
(12, 2, 'Hamza', 'CH', 'Rezaid', 'hamza@rezaid.co.uk', NULL, 'hamza', '$2y$10$47EM/nnBGKnf7OCuvvQHLuQrIxIEIHojS1L/O2Z7rO/5iI3ti5g/y', '0', NULL, NULL, '2020-07-24 09:57:56', '2020-07-24 09:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_directory_details`
--

CREATE TABLE `user_directory_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `directory_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directory_path` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_files` int(11) NOT NULL,
  `directory_size` int(11) NOT NULL,
  `parent_directory_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_directory_details`
--

INSERT INTO `user_directory_details` (`id`, `user_id`, `directory_name`, `directory_path`, `number_of_files`, `directory_size`, `parent_directory_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Content', 'wp-content/theme/rezaid/content', 5, 2, 0, NULL, NULL, NULL),
(2, 1, 'Designs', 'wp-content/theme/rezaid/content/designs', 10, 4, 1, NULL, NULL, NULL),
(3, 1, 'Images', 'wp-content/theme/rezaid/content/images', 50, 12, 1, NULL, NULL, NULL),
(4, 2, 'Content', 'wp-content/theme/rezaid/content/', 2, 2, 0, NULL, NULL, NULL),
(5, 2, 'Content Designs flow', 'wp-content/theme/rezaid/content/designs', 6, 4, 4, NULL, NULL, NULL),
(6, 2, 'WordFiles', 'wp-content/theme/rezaid/content/wordfiles', 4, 2, 4, NULL, NULL, NULL),
(7, 2, 'OldWordFiles', 'wp-content/theme/rezaid/content/wordfiles/oldwordfiles', 12, 5, 6, NULL, NULL, NULL),
(8, 2, 'NewWordFiles', 'wp-content/theme/rezaid/content/wordfiles/newwordfiles', 7, 2, 6, NULL, NULL, NULL),
(9, 2, 'Milestones', 'wp-content/theme/rezaid/milestones', 2, 2, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_file_details`
--

CREATE TABLE `user_file_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_directory_detail_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` int(11) NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `file_last_open` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_file_details`
--

INSERT INTO `user_file_details` (`id`, `user_id`, `user_directory_detail_id`, `file_name`, `file_path`, `file_type`, `file_size`, `is_active`, `file_last_open`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'test.jpg', 'wp-content/theme/rezaid/content/test.jpg', 'jpg', 2, '1', '2020-07-24 11:54:54', '2020-07-21 19:00:00', '2020-07-21 19:00:00', NULL),
(2, 1, 2, 'homepage.jpg', 'wp-content/theme/rezaid/content/designs/homepage.jpg', 'jpg', 2, '1', '2020-07-24 12:03:05', '2020-07-22 19:00:00', '2020-07-30 06:17:57', NULL),
(3, 2, 6, 'flow.docx', 'wp-content/theme/rezaid/content/wordfiles/flow.docx', 'flow.docx', 2, '0', '2020-07-24 12:05:17', '2020-07-23 19:00:00', '2020-08-04 04:03:55', NULL),
(4, 2, 6, 'about.docx', 'wp-content/theme/rezaid/content/wordfiles/about.docx', 'about.docx', 2, '0', '2020-07-24 12:06:11', '2020-07-23 19:00:00', '2020-07-23 19:00:00', NULL),
(5, 2, 9, 'milestonelist.text', 'wp-content/theme/rezaid/milestonlist.text', '.text', 2, '1', '2020-07-25 17:47:10', '2020-07-24 19:00:00', '2020-08-04 04:01:17', NULL),
(6, 2, 9, 'proposal-content.text', 'wp-content/theme/rezaid/proposal.text', '.text', 1, '1', '2020-07-25 19:06:10', '2020-07-24 19:00:00', '2020-07-26 19:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_file_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_directory_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notification_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_message` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `user_id`, `user_file_detail_id`, `user_directory_detail_id`, `notification_type`, `notification_message`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 6, 'upload', 'New file has been uploaded', NULL, NULL),
(2, NULL, NULL, NULL, 'general', 'There will be a maintenance happening on following date from 2:00 to 3:00', NULL, NULL),
(3, 1, 2, 2, 'update', 'File has been uploaded', NULL, NULL),
(4, 2, 5, 9, 'update', 'File has been updated', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`),
  ADD UNIQUE KEY `50` (`username`);

--
-- Indexes for table `user_directory_details`
--
ALTER TABLE `user_directory_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_file_details`
--
ALTER TABLE `user_file_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_directory_details`
--
ALTER TABLE `user_directory_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_file_details`
--
ALTER TABLE `user_file_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
