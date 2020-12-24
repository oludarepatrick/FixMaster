-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2020 at 05:05 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fixmaster_central_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE IF NOT EXISTS `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Payment','Request','Others','Login','Logout','Profile','Errors','Unauthorized') COLLATE utf8mb4_unicode_ci NOT NULL,
  `severity` enum('Informational','Warning','Error') COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller_action_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `ip_address`, `type`, `severity`, `action_url`, `controller_action_path`, `message`, `created_at`) VALUES
(1, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-06 16:15:40'),
(2, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminUserController@update', 'http://localhost:8000/admin/users/admin/update/7', 'NinthBinary Developer updated Emmanuel Godfrey\'s profile', '2020-12-06 16:21:49'),
(3, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServicesController@update', 'http://localhost:8000/admin/services/update', 'NinthBinary Developer renamed Developer Testing 2 service to Developer Testing 2', '2020-12-06 16:22:57'),
(4, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServicesController@store', 'http://localhost:8000/admin/services/store', 'NinthBinary Developer created Developer Service Test 2 Service', '2020-12-06 16:24:01'),
(5, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServicesController@delete', 'http://localhost:8000/admin/services/delete/8', 'NinthBinary Developer deleted Developer Service Test 2 service', '2020-12-06 16:24:13'),
(6, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:23:52(hrs:min:ss).', '2020-12-06 16:39:32'),
(7, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-06 17:21:36'),
(8, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Computers & Laptops Service Category', '2020-12-06 20:17:45'),
(9, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Computer Service Category', '2020-12-06 20:20:08'),
(10, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Sdfsd Service Category', '2020-12-06 20:21:11'),
(11, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Computer Service Category', '2020-12-06 20:29:51'),
(12, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Ewfsdfsd Service Category', '2020-12-06 20:37:44'),
(13, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Computer Service Category', '2020-12-06 20:39:53'),
(14, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Sdfnksdfkln Service Category', '2020-12-06 20:48:26'),
(15, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Wechat Service Category', '2020-12-06 21:10:01'),
(16, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServicesController@store', 'http://localhost:8000/admin/services/store', 'NinthBinary Developer created Test Test Service', '2020-12-06 21:42:17'),
(17, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Sakjbfkjsbaf Service Category', '2020-12-06 21:44:32'),
(18, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Pidsfbisdb Service Category', '2020-12-06 21:46:09'),
(19, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@delete', 'http://localhost:8000/admin/category/delete/10', 'NinthBinary Developer deleted Sakjbfkjsbaf category', '2020-12-06 21:48:23'),
(20, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@reinstate', 'http://localhost:8000/admin/category/reinstate/11', 'NinthBinary Developer reinstated Pidsfbisdb category', '2020-12-06 22:03:19'),
(21, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@deactivate', 'http://localhost:8000/admin/category/deactivate/11', 'NinthBinary Developer deactivated Pidsfbisdb category', '2020-12-06 22:03:29'),
(22, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@update', 'http://localhost:8000/admin/category/update/5', 'NinthBinary Developer updated Computer Service Category', '2020-12-06 23:30:37'),
(23, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@update', 'http://localhost:8000/admin/category/update/5', 'NinthBinary Developer updated Computer Service Category', '2020-12-06 23:31:23'),
(24, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@update', 'http://localhost:8000/admin/category/update/5', 'NinthBinary Developer updated Computer Service Category', '2020-12-06 23:33:12'),
(25, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 06:21:52(hrs:min:ss).', '2020-12-06 23:43:28'),
(26, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-08 18:22:29'),
(27, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServicesController@deactivate', 'http://localhost:8000/admin/services/deactivate/7', 'NinthBinary Developer deactivated Developer Testing service', '2020-12-08 18:29:57'),
(28, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServicesController@delete', 'http://localhost:8000/admin/services/delete/7', 'NinthBinary Developer deleted Developer Testing service', '2020-12-08 18:54:46'),
(29, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServicesController@delete', 'http://localhost:8000/admin/services/delete/10', 'NinthBinary Developer deleted Test Test service', '2020-12-08 18:55:10'),
(30, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServicesController@store', 'http://localhost:8000/admin/services/store', 'NinthBinary Developer created Developer Test Service', '2020-12-08 18:55:27'),
(31, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 02:40:37(hrs:min:ss).', '2020-12-08 21:03:06'),
(32, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-09 19:22:53'),
(33, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminClientController@reinstate', 'http://localhost:8000/admin/users/client/reinstate/9', 'NinthBinary Developer reinstated Debola Williams\'s profile', '2020-12-09 20:14:11'),
(34, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminClientController@delete', 'http://localhost:8000/admin/users/client/delete/9', 'NinthBinary Developer deleted Debola Williams\'s profile', '2020-12-09 20:14:34'),
(35, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminClientController@deactivate', 'http://localhost:8000/admin/users/client/deactivate/9', 'NinthBinary Developer deactivated Debola Williams\'s profile', '2020-12-09 20:16:18'),
(36, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminClientController@reinstate', 'http://localhost:8000/admin/users/client/reinstate/9', 'NinthBinary Developer reinstated Debola Williams\'s profile', '2020-12-09 20:16:25'),
(45, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://localhost:8000/register', 'Adekola Adefarasin(anthonyjoboy2016@gmail.com) account was registered successfully.', '2020-12-11 13:43:08'),
(46, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adefarasin successsfully verified anthonyjoboy2016@gmail.com with 642d9e56a634a1093fbf51353c149dea92e1289e E-Mail verification token', '2020-12-11 13:45:23'),
(47, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-11 13:46:13'),
(48, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:54:45(hrs:min:ss).', '2020-12-11 14:40:57'),
(49, 11, '127.0.0.1', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adefarasin was trying to re-verify anthonyjoboy2016@gmail.com with an expired E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-11 14:41:10'),
(50, 11, '127.0.0.1', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adefarasin attempted to login with a deactivated account E-Mail(adekola.adefarasin@gmail.com).', '2020-12-11 23:32:16'),
(51, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adefarasin logged in.', '2020-12-11 23:42:42'),
(52, 11, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminProfileController@updatePassword', 'http://localhost:8000/client/settings/update-passsword', 'Adekola Adefarasin changed profile password', '2020-12-12 01:33:52'),
(53, 11, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@update', 'http://localhost:8000/client/settings/update-profile', 'Adekola Adeleke updated Adekola Adeleke\'s profile', '2020-12-12 02:20:51'),
(54, 11, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@update', 'http://localhost:8000/client/settings/update-profile', 'Adekola Adeleke updated his profile', '2020-12-12 02:28:33'),
(55, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-12 15:58:59'),
(56, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@update', 'http://localhost:8000/admin/category/update/1', 'NinthBinary Developer updated Computer Service Category', '2020-12-12 16:04:17'),
(57, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Bath-Tubs, Pipes, Kitchen Sink Service Category', '2020-12-12 16:39:36'),
(58, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Dish & Washing Machine Service Category', '2020-12-12 16:45:16'),
(59, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\CategoryController@store', 'http://localhost:8000/admin/category/store', 'NinthBinary Developer created Drainage, Shower, Soak-Away Service Category', '2020-12-12 18:00:47'),
(60, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 02:57:30(hrs:min:ss).', '2020-12-12 18:56:29'),
(61, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-12 18:56:40'),
(62, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-13 02:21:47'),
(63, 11, '127.0.0.1', 'Errors', 'Error', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'http://localhost:8000/client/settings/update-avatar', 'An error occurred while Adekola Adeleke was trying to update his profile avatar.', '2020-12-13 02:26:01'),
(64, 11, '127.0.0.1', 'Errors', 'Error', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'http://localhost:8000/client/settings/update-avatar', 'An error occurred while Adekola Adeleke was trying to update his profile avatar.', '2020-12-13 02:26:19'),
(65, 11, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'http://localhost:8000/client/settings/update-avatar', 'Adekola Adeleke updated his profile avatar', '2020-12-13 02:35:18'),
(66, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:38:08(hrs:min:ss).', '2020-12-13 02:59:55'),
(67, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-13 03:00:46'),
(68, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-13 05:01:22'),
(69, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:41:29(hrs:min:ss).', '2020-12-13 05:42:51'),
(70, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-13 23:13:15'),
(71, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 02:39:20(hrs:min:ss).', '2020-12-14 01:52:35'),
(72, 11, '127.0.0.1', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke attempted to login with an unverified E-Mail (adekola.adeleke@gmail.com).', '2020-12-14 01:53:51'),
(73, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adeleke successsfully verified adekola.adeleke@gmail.com with E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-14 01:54:48'),
(74, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-14 02:28:52'),
(75, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-14 08:56:34'),
(76, 11, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'http://localhost:8000/client/settings/update-profile', 'Adekola Adeleke updated his profile', '2020-12-14 11:10:40'),
(77, 11, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'http://localhost:8000/client/settings/update-profile', 'Adekola Adeleke updated his profile', '2020-12-14 11:13:42'),
(78, 11, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'http://localhost:8000/client/settings/update-profile', 'Adekola Adeleke updated his profile', '2020-12-14 11:16:14'),
(79, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 02:41:26(hrs:min:ss).', '2020-12-14 11:38:00'),
(80, 11, '127.0.0.1', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke attempted to login with an unverified E-Mail (anthonyjoboy2016@gmail.com).', '2020-12-14 11:39:26'),
(81, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adeleke successsfully verified anthonyjoboy2016@gmail.com with E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-14 11:39:54'),
(82, 11, '127.0.0.1', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke attempted to login with an unverified E-Mail (anthonyjoboy2016@gmail.com).', '2020-12-14 11:45:10'),
(83, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adeleke successsfully verified anthonyjoboy2016@gmail.com with E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-14 11:45:39'),
(84, 11, '127.0.0.1', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adeleke was trying to re-verify anthonyjoboy2016@gmail.com with an expired E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-14 11:48:54'),
(85, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adeleke successsfully verified anthonyjoboy2016@gmail.com with E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-14 12:05:44'),
(86, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adeleke successsfully verified anthonyjoboy2016@gmail.com with E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-14 12:09:40'),
(87, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adeleke successsfully verified anthonyjoboy2016@gmail.com with E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-14 12:38:19'),
(88, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adeleke successsfully verified anthonyjoboy2016@gmail.com with E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-14 12:43:44'),
(89, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adeleke successsfully verified anthonyjoboy2016@gmail.com with E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-14 12:49:10'),
(90, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adeleke successsfully verified anthonyjoboy2016@gmail.com with E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-14 12:54:30'),
(91, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@verifyClientEmail', 'http://localhost:8000/client-email-verify?token=642d9e56a634a1093fbf51353c149dea92e1289e', 'Adekola Adeleke successsfully verified anthonyjoboy2016@gmail.com with E-Mail verification token(642d9e56a634a1093fbf51353c149dea92e1289e)', '2020-12-14 13:06:25'),
(92, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-14 13:10:56'),
(93, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ServiceRequestController@store', 'http://localhost:8000/client/services/quote/store', 'Adekola Adeleke requested Computer & Laptops service', '2020-12-14 13:16:45'),
(94, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ServiceRequestController@store', 'http://localhost:8000/client/services/quote/store', 'Adekola Adeleke requested Computer & Laptops service', '2020-12-14 13:40:14'),
(95, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ServiceRequestController@store', 'http://localhost:8000/client/services/quote/store', 'Adekola Adeleke requested Bath-Tubs, Pipes, Kitchen Sink service', '2020-12-14 13:48:35'),
(96, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 01:18:05(hrs:min:ss).', '2020-12-14 14:29:01'),
(97, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-14 14:29:12'),
(98, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:47:32(hrs:min:ss).', '2020-12-14 15:16:44'),
(99, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-14 15:17:07'),
(100, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ServiceRequestController@store', 'http://localhost:8000/client/services/quote/store', 'Adekola Adeleke requested Dish & Washing Machine service', '2020-12-14 16:23:19'),
(101, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ServiceRequestController@store', 'http://localhost:8000/client/services/quote/store', 'Adekola Adeleke requested Dish & Washing Machine service', '2020-12-14 16:37:05'),
(102, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 04:38:16(hrs:min:ss).', '2020-12-14 19:55:23'),
(103, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-14 19:55:38'),
(104, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:55:08(hrs:min:ss).', '2020-12-14 20:50:46'),
(105, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-14 20:51:18'),
(106, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:17:43(hrs:min:ss).', '2020-12-14 21:09:01'),
(107, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-15 10:18:57'),
(108, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:01:50(hrs:min:ss).', '2020-12-15 10:20:46'),
(109, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-15 10:20:58'),
(110, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:10:59(hrs:min:ss).', '2020-12-15 10:31:57'),
(111, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-15 10:32:10'),
(112, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ServiceRequestController@store', 'http://localhost:8000/client/services/quote/store', 'Adekola Adeleke requested Drainage, Shower, Soak-Away service', '2020-12-15 10:33:18'),
(113, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:16:58(hrs:min:ss).', '2020-12-15 10:49:08'),
(114, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-15 10:49:53'),
(115, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ServiceRequestController@store', 'http://localhost:8000/client/services/quote/store', 'Adekola Adeleke requested Computer & Laptops service', '2020-12-15 10:51:42'),
(116, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-15 19:43:19'),
(117, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:14:44(hrs:min:ss).', '2020-12-15 19:58:03'),
(118, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-15 19:58:16'),
(119, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:34:53(hrs:min:ss).', '2020-12-15 20:33:09'),
(120, 12, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Godfrey Diwa logged in.', '2020-12-16 11:09:23'),
(121, 12, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Godfrey Diwa logged in.', '2020-12-16 11:09:45'),
(122, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-16 11:10:24'),
(123, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:18:38(hrs:min:ss).', '2020-12-16 11:29:02'),
(124, 12, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Godfrey Diwa logged in.', '2020-12-16 11:29:17'),
(125, 12, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Godfrey Diwa logged out with a session duration of 01:19:41(hrs:min:ss).', '2020-12-16 12:48:58'),
(126, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-16 12:49:11'),
(127, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:00:40(hrs:min:ss).', '2020-12-16 12:49:51'),
(128, 12, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Godfrey Diwa logged in.', '2020-12-16 13:24:38'),
(129, 12, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Godfrey Diwa logged out with a session duration of 01:22:57(hrs:min:ss).', '2020-12-16 14:47:35'),
(130, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-17 08:40:55'),
(131, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 01:15:00(hrs:min:ss).', '2020-12-17 09:55:54'),
(132, 12, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Godfrey Diwa logged in.', '2020-12-17 09:56:15'),
(133, 12, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Godfrey Diwa logged out with a session duration of 00:20:16(hrs:min:ss).', '2020-12-17 10:16:31'),
(134, 14, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Andrew Nwankwo logged in.', '2020-12-17 10:17:14'),
(135, 14, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Andrew Nwankwo logged out with a session duration of 00:01:23(hrs:min:ss).', '2020-12-17 10:18:37'),
(136, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-17 10:18:51'),
(137, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:13:20(hrs:min:ss).', '2020-12-17 10:32:11'),
(138, 2, '127.0.0.1', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'An Unknown Intruder attempted to login with (chris@ninthbinary.com and adminn12345).', '2020-12-17 10:33:36'),
(139, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-17 10:33:54'),
(140, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-18 07:37:56'),
(141, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminUserController@deactivate', 'http://localhost:8000/admin/users/admin/deactivate/7', 'NinthBinary Developer deactivated Isaac John\'s profile', '2020-12-18 08:12:54'),
(142, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminUserController@reinstate', 'http://localhost:8000/admin/users/admin/reinstate/7', 'NinthBinary Developer reinstated Isaac John\'s profile', '2020-12-18 08:13:28'),
(143, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 05:41:56(hrs:min:ss).', '2020-12-18 13:19:52'),
(144, 12, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Godfrey Diwa logged in.', '2020-12-18 13:20:04'),
(145, 12, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Godfrey Diwa logged out with a session duration of 00:10:01(hrs:min:ss).', '2020-12-18 13:30:05'),
(146, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-18 13:30:15'),
(147, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@store', 'http://localhost:8000/admin/users/cse/store', 'NinthBinary Developer created Favour Nnamdi\'s profile', '2020-12-18 14:03:17'),
(148, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@delete', 'http://localhost:8000/admin/users/cse/delete/13', 'NinthBinary Developer deleted Benedict Olaoye\'s profile', '2020-12-18 15:17:19'),
(149, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@deactivate', 'http://localhost:8000/admin/users/cse/deactivate/12', 'NinthBinary Developer deactivated Godfrey Diwa\'s profile', '2020-12-18 15:17:30'),
(150, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@reinstate', 'http://localhost:8000/admin/users/cse/reinstate/12', 'NinthBinary Developer reinstated Godfrey Diwa\'s profile', '2020-12-18 15:17:36'),
(151, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@update', 'http://localhost:8000/admin/users/cse/update/19', 'NinthBinary Developer updated Favour Nnamdi\'s profile', '2020-12-18 18:44:08'),
(152, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@update', 'http://localhost:8000/admin/users/cse/update/19', 'NinthBinary Developer updated Favour Nnamdi\'s profile', '2020-12-18 18:44:43'),
(153, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@update', 'http://localhost:8000/admin/users/cse/update/19', 'NinthBinary Developer updated Favour Nnamdi\'s profile', '2020-12-18 18:46:23'),
(154, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@update', 'http://localhost:8000/admin/users/cse/update/19', 'NinthBinary Developer updated Favour Nnamdi\'s profile', '2020-12-18 18:53:54'),
(155, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@update', 'http://localhost:8000/admin/users/cse/update/19', 'NinthBinary Developer updated Favour Nnamdi\'s profile', '2020-12-18 19:20:26'),
(156, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@update', 'http://localhost:8000/admin/users/cse/update/19', 'NinthBinary Developer updated Favour Nnamdi\'s profile', '2020-12-18 19:22:56'),
(157, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@update', 'http://localhost:8000/admin/users/cse/update/12', 'NinthBinary Developer updated Godrey Diwa\'s profile', '2020-12-18 19:25:52'),
(158, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@update', 'http://localhost:8000/admin/users/cse/update/13', 'NinthBinary Developer updated Benedict Olaoye\'s profile', '2020-12-18 19:26:52'),
(159, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminCSEController@update', 'http://localhost:8000/admin/users/cse/update/19', 'NinthBinary Developer updated Favour Nnamdi\'s profile', '2020-12-18 20:38:12'),
(160, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-19 04:52:22'),
(161, 12, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Godrey Diwa logged in.', '2020-12-19 11:13:40'),
(162, 12, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Godrey Diwa logged out with a session duration of 00:03:54(hrs:min:ss).', '2020-12-19 11:17:34'),
(163, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-19 11:17:47'),
(164, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-19 20:20:52'),
(165, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminTechnicianController@store', 'http://localhost:8000/admin/users/technician/store', 'NinthBinary Developer created John Desmond\'s profile', '2020-12-19 22:26:29'),
(166, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminTechnicianController@delete', 'http://localhost:8000/admin/users/technician/delete/23', 'NinthBinary Developer deleted John Desmond\'s profile', '2020-12-19 22:59:29'),
(167, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminTechnicianController@reinstate', 'http://localhost:8000/admin/users/technician/reinstate/23', 'NinthBinary Developer reinstated John Desmond\'s profile', '2020-12-19 23:00:10'),
(168, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminTechnicianController@update', 'http://localhost:8000/admin/users/technician/update/23', 'NinthBinary Developer updated John Desmond\'s profile', '2020-12-19 23:24:11'),
(169, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminTechnicianController@update', 'http://localhost:8000/admin/users/technician/update/23', 'NinthBinary Developer updated John Desmond\'s profile', '2020-12-19 23:25:30'),
(170, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminTechnicianController@update', 'http://localhost:8000/admin/users/technician/update/23', 'NinthBinary Developer updated John Desmond\'s profile', '2020-12-19 23:26:25'),
(171, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminTechnicianController@update', 'http://localhost:8000/admin/users/technician/update/23', 'NinthBinary Developer updated John Desmond\'s profile', '2020-12-19 23:30:02'),
(172, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-20 11:55:59'),
(173, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminTechnicianController@deactivate', 'http://localhost:8000/admin/users/technician/deactivate/15', 'NinthBinary Developer deactivated Taofeek Adedokun\'s profile', '2020-12-20 11:57:03'),
(174, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminTechnicianController@reinstate', 'http://localhost:8000/admin/users/technician/reinstate/15', 'NinthBinary Developer reinstated Taofeek Adedokun\'s profile', '2020-12-20 11:58:00'),
(175, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminTechnicianController@update', 'http://localhost:8000/admin/users/technician/update/15', 'NinthBinary Developer updated Taofeek Adedokun\'s profile', '2020-12-20 11:58:49'),
(176, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:41:03(hrs:min:ss).', '2020-12-20 12:37:02'),
(177, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-20 22:03:36'),
(178, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:34:05(hrs:min:ss).', '2020-12-20 22:37:41'),
(179, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-20 22:37:54'),
(180, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:16:59(hrs:min:ss).', '2020-12-20 22:54:53'),
(181, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-20 22:55:47'),
(182, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminClientController@delete', 'http://localhost:8000/admin/users/client/delete/1', 'NinthBinary Developer deleted Wisdom Amana\'s profile', '2020-12-21 00:23:52'),
(183, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminClientController@deactivate', 'http://localhost:8000/admin/users/client/deactivate/2', 'NinthBinary Developer deactivated Debola Williams\'s profile', '2020-12-21 00:25:52'),
(184, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminClientController@deactivate', 'http://localhost:8000/admin/users/client/deactivate/1', 'NinthBinary Developer deactivated Wisdom Amana\'s profile', '2020-12-21 00:28:08'),
(185, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\AdminClientController@reinstate', 'http://localhost:8000/admin/users/client/reinstate/1', 'NinthBinary Developer reinstated Wisdom Amana\'s profile', '2020-12-21 00:29:13'),
(186, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 01:39:37(hrs:min:ss).', '2020-12-21 00:35:24'),
(187, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-21 07:35:17'),
(188, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-21 12:45:02'),
(189, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:02:17(hrs:min:ss).', '2020-12-21 12:47:19'),
(190, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-21 12:55:45'),
(191, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ToolsInventoryController@store', 'http://localhost:8000/admin/tools-inventory/store', 'NinthBinary Developer created Star Screw Driver Tool Inventory', '2020-12-21 13:44:41'),
(192, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ToolsInventoryController@update', 'http://localhost:8000/admin/tools-inventory/update/3', 'NinthBinary Developer updated Star Screw Driver Tool', '2020-12-21 15:28:48'),
(193, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ToolsInventoryController@update', 'http://localhost:8000/admin/tools-inventory/update/3', 'NinthBinary Developer updated Star Screw Driver Tool', '2020-12-21 15:33:13'),
(194, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ToolsInventoryController@delete', 'http://localhost:8000/admin/tools-inventory/delete/2', 'NinthBinary Developer deleted Water Hose service', '2020-12-21 15:38:48'),
(195, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServiceRequestStatusController@store', 'http://localhost:8000/admin/utilities/service-request-status/store', 'NinthBinary Developer created \"Enroute to Client\'s house\" Service Request Status', '2020-12-21 17:00:14'),
(196, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 04:07:44(hrs:min:ss).', '2020-12-21 17:03:29'),
(197, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-21 21:46:09'),
(198, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServiceRequestStatusController@store', 'http://localhost:8000/admin/utilities/service-request-status/store', 'NinthBinary Developer created \"Iuguigoiug\" Service Request Status', '2020-12-21 22:42:45'),
(199, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServiceRequestStatusController@delete', 'http://localhost:8000/admin/utilities/service-request-status/delete/5', 'NinthBinary Developer deleted Iuguigoiug service request status.', '2020-12-21 22:47:53'),
(200, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServiceRequestStatusController@update', 'http://localhost:8000/admin/utilities/service-request-status/update/4', 'NinthBinary Developer renamed Enroute to Client\'s house service request status to Enroute to Client\'s house', '2020-12-21 22:58:16'),
(201, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 01:28:11(hrs:min:ss).', '2020-12-21 23:14:20'),
(202, 12, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Godrey Diwa logged in.', '2020-12-22 09:47:24'),
(203, 12, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Godrey Diwa logged out with a session duration of 00:05:20(hrs:min:ss).', '2020-12-22 09:52:44'),
(204, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-22 09:53:01'),
(205, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:13:45(hrs:min:ss).', '2020-12-22 10:06:46'),
(206, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 23:13:02(hrs:min:ss).', '2020-12-22 11:58:04'),
(207, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-22 11:58:22'),
(208, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:15:40(hrs:min:ss).', '2020-12-22 12:14:02'),
(209, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2020-12-22 12:14:16'),
(210, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:30:57(hrs:min:ss).', '2020-12-22 12:45:13'),
(211, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-22 12:45:26'),
(212, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 01:58:35(hrs:min:ss).', '2020-12-22 14:44:00'),
(213, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-22 20:22:36');
INSERT INTO `activity_logs` (`id`, `user_id`, `ip_address`, `type`, `severity`, `action_url`, `controller_action_path`, `message`, `created_at`) VALUES
(214, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 01:11:37(hrs:min:ss).', '2020-12-22 21:34:13'),
(215, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-23 18:13:34'),
(216, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 02:04:27(hrs:min:ss).', '2020-12-23 20:18:01'),
(217, 5, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'David Akinsola logged in.', '2020-12-23 20:18:53'),
(218, 5, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\AdminRequestController@assignCSETechnician', 'http://localhost:8000/admin/requests/assign-cse-technician/7', 'David Akinsola assigned Godrey Diwa(CSE) and Taofeek Adedokun  to REF-131D985E job', '2020-12-23 20:21:30'),
(219, 5, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'David Akinsola logged out with a session duration of 01:27:16(hrs:min:ss).', '2020-12-23 21:46:09'),
(220, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-24 05:41:00'),
(221, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:22:54(hrs:min:ss).', '2020-12-24 06:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` enum('SUPER_ADMIN_ROLE','ADMIN_ROLE') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_phone_number_unique` (`phone_number`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `created_by`, `first_name`, `middle_name`, `last_name`, `phone_number`, `designation`) VALUES
(1, 5, 1, 'David', NULL, 'Akinsola', '08034516890', 'ADMIN_ROLE'),
(2, 6, 1, 'Obuchi', NULL, 'Omotosho', '09032394639', 'ADMIN_ROLE'),
(3, 7, 2, 'Isaac', 'Israel', 'John', '08032459283', 'ADMIN_ROLE'),
(6, 8, 1, 'Emmanuel', 'Gbenga', 'Godfrey', '09066982545', 'ADMIN_ROLE');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE IF NOT EXISTS `admin_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `administrators` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `clients` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `cses` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `location_request` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payments` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ratings` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `requests` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rfqs` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `service_categories` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `technicians` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tools` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `utilities` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_user_id_unique` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `user_id`, `administrators`, `clients`, `cses`, `location_request`, `payments`, `ratings`, `requests`, `rfqs`, `service_categories`, `technicians`, `tools`, `utilities`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL),
(2, 3, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL),
(3, 5, '0', '1', '1', '1', '0', '1', '1', '1', '1', '1', '1', '0', NULL, NULL),
(4, 6, '0', '0', '1', '1', '0', '1', '1', '1', '0', '1', '1', '0', '2020-11-30 22:35:09', NULL),
(5, 7, '0', '0', '0', '1', '0', '1', '1', '1', '0', '0', '1', '0', '2020-12-03 19:35:45', NULL),
(8, 8, '0', '0', '0', '1', '0', '1', '1', '1', '0', '1', '1', '0', '2020-12-04 06:03:06', NULL),
(9, 4, '0', '0', '0', '1', '0', '1', '1', '1', '0', '1', '1', '0', '2020-12-04 06:03:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `code`) VALUES
(1, 'Access Bank', '044'),
(2, 'Citibank', '023'),
(3, 'Diamond Bank', '063'),
(4, 'Dynamic Standard Bank', ' '),
(5, 'Ecobank Nigeria', '050'),
(6, 'Fidelity Bank Nigeria', '070'),
(7, 'First Bank of Nigeria', '011'),
(8, 'First City Monument Bank', '214'),
(9, 'Guaranty Trust Bank', '058'),
(10, 'Heritage Bank Plc', '030'),
(11, 'Jaiz Bank', '301'),
(12, 'Keystone Bank Limited', '082'),
(13, 'Providus Bank Plc', '101'),
(14, 'Polaris Bank', '076'),
(15, 'Stanbic IBTC Bank Nigeria Limited', '221'),
(16, 'Standard Chartered Bank', '068'),
(17, 'Sterling Bank', '232'),
(18, 'Suntrust Bank Nigeria Limited', '100'),
(19, 'Union Bank of Nigeria', '032'),
(20, 'United Bank for Africa', '033'),
(21, 'Unity Bank Plc', '215'),
(22, 'Wema Bank', '035'),
(23, 'Zenith Bank', '057');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standard_fee` int(20) UNSIGNED NOT NULL,
  `urgent_fee` int(20) UNSIGNED NOT NULL,
  `ooh_fee` int(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_votes` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `rating` float UNSIGNED NOT NULL DEFAULT 0,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `url` (`url`),
  KEY `service_id` (`service_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `service_id`, `name`, `standard_fee`, `urgent_fee`, `ooh_fee`, `description`, `url`, `image`, `total_votes`, `rating`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 'Computer & Laptops', 2500, 3500, 4700, 'With FixMaster you don\'t have to run to the repair shop every time your PC ends up with a fault, we have a host of tech support we provide. Maybe you need to upgrade your operating system, or install new software, protect against viruses. We do all that!', '181900dad960beccb34f53c4e0ff4647', '181900dad960beccb34f53c4e0ff4647.jpg', 0, 0, '1', NULL, '2020-12-06 19:39:53', '2020-12-12 15:04:17'),
(2, 1, 3, 'Bath-Tubs, Pipes, Kitchen Sink', 2800, 3300, 4500, 'We can fix all plumbing job types. Fix it right with an expert plumber. You Can Count On! All works are carried out promptly.', '12dcc349ebab89a201331db44c68e17e', '12dcc349ebab89a201331db44c68e17e.jpg', 0, 0, '1', NULL, '2020-12-12 15:39:36', NULL),
(3, 1, 5, 'Dish & Washing Machine', 1500, 2500, 3500, 'If you\'ve got a leaky fridge, a rattling dryer, a barely cooling HVAC, a stove that no longer sizzles or a clogged dishwasher, we\'ve got you covered.', 'ef9712cb50851495c67ab9c3ab40a6ce', 'ef9712cb50851495c67ab9c3ab40a6ce.jpg', 0, 0, '1', NULL, '2020-12-12 15:45:16', NULL),
(4, 1, 3, 'Drainage, Shower, Soak-Away', 3000, 3500, 4000, 'We can fix all plumbing job types. Fix it right with an expert plumber. You Can Count On! All works are carried out promptly.', '5c01c0c3800c3fb2cc7076528d4535d3', '5c01c0c3800c3fb2cc7076528d4535d3.jpg', 0, 0, '1', NULL, '2020-12-12 17:00:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` tinyint(4) UNSIGNED DEFAULT NULL,
  `lga_id` int(11) UNSIGNED DEFAULT NULL,
  `profession_id` int(11) UNSIGNED DEFAULT NULL,
  `town` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discounted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_phone_number_unique` (`phone_number`),
  KEY `user_id` (`user_id`,`state_id`,`lga_id`,`town`),
  KEY `state_id` (`state_id`),
  KEY `lga_id` (`lga_id`),
  KEY `profession_id` (`profession_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `state_id`, `lga_id`, `profession_id`, `town`, `first_name`, `middle_name`, `last_name`, `phone_number`, `gender`, `avatar`, `full_address`, `discounted`) VALUES
(1, 9, 25, 369, 1, 'Okota', 'Wisdom', NULL, 'Amana', '09082354902', 'Male', NULL, 'Sango Ota, Lagos.', '0'),
(2, 10, 25, 365, 18, 'Ibeju-Lekki', 'Debola', NULL, 'Williams', '08167836902', 'Male', NULL, 'Funsho williams street, Ibeju Lekki, Lagos.', '0'),
(31, 11, 25, 359, 1, 'Falomo', 'Adekola', NULL, 'Adeleke', '08034516844', 'Male', '0c9ac4cada39ba68e97fc6c0a0807458d1385048.jpg', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cses`
--

DROP TABLE IF EXISTS `cses`;
CREATE TABLE IF NOT EXISTS `cses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` tinyint(4) UNSIGNED DEFAULT NULL,
  `lga_id` int(11) UNSIGNED DEFAULT NULL,
  `bank_id` int(11) UNSIGNED DEFAULT NULL,
  `tag_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_phone_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(1,1) NOT NULL DEFAULT 0.0,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cses_phone_number_unique` (`phone_number`),
  UNIQUE KEY `tag_id` (`tag_id`),
  UNIQUE KEY `cses_other_phone_number_unique` (`other_phone_number`),
  UNIQUE KEY `cses_account_number_unique` (`account_number`),
  KEY `lga_id` (`lga_id`),
  KEY `state_id` (`state_id`),
  KEY `bank_id` (`bank_id`),
  KEY `user_id` (`user_id`,`franchise_id`,`state_id`,`lga_id`,`bank_id`) USING BTREE,
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cses`
--

INSERT INTO `cses` (`id`, `user_id`, `created_by`, `franchise_id`, `state_id`, `lga_id`, `bank_id`, `tag_id`, `first_name`, `middle_name`, `last_name`, `gender`, `phone_number`, `other_phone_number`, `account_number`, `rating`, `avatar`, `town`, `full_address`, `created_at`, `updated_at`) VALUES
(1, 12, 1, NULL, 25, 359, 23, 'CSE-23804223', 'Godrey', 'Jamal', 'Diwa', 'Male', '07066812090', NULL, '0903728292', '0.0', '64qqxSx45jgWYwBAQ3yIgVS920FJm5cj.jpg', 'Victoria Island', '2 Chevron Drive, Lekki Penninsula II 12825, Lekki', NULL, '2020-12-18 18:25:52'),
(2, 13, 1, NULL, 25, 371, 1, 'CSE-09320093', 'Benedict', 'Mayowa', 'Olaoye', 'Male', '08126378290', NULL, '0167982579', '0.0', 'a37d90fd60bf6d2487f072d57bea4a063a73018d.jpg', 'Lawanson', '18C, Orelope Street, Lawanson-Surulere, Lagos State.', NULL, '2020-12-18 18:26:52'),
(4, 19, 1, NULL, 25, 354, 1, 'CSE-9DEEFB56', 'Favour', 'Ngozi', 'Nnamdi', 'Female', '09069826348', NULL, '0037497234', '0.0', '1e38d05f8090b1b189b50244074151e1d02c3591.jpg', 'Egbeda', 'Egbeda Bus stop off, tipper road. Egbeda - Alimosho,  Lagos.', '2020-12-18 13:03:16', '2020-12-18 19:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `cse_category`
--

DROP TABLE IF EXISTS `cse_category`;
CREATE TABLE IF NOT EXISTS `cse_category` (
  `cse_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  KEY `category_id` (`category_id`),
  KEY `cse_id` (`cse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cse_category`
--

INSERT INTO `cse_category` (`cse_id`, `category_id`) VALUES
(1, 1),
(2, 3),
(4, 2),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

DROP TABLE IF EXISTS `lgas`;
CREATE TABLE IF NOT EXISTS `lgas` (
  `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state_id` tinyint(4) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=775 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lgas`
--

INSERT INTO `lgas` (`id`, `state_id`, `name`) VALUES
(2, 1, 'Aba North'),
(3, 1, 'Aba South'),
(4, 1, 'Arochukwu'),
(5, 1, 'Bende'),
(6, 1, 'Ikwuano'),
(7, 1, 'Isiala-Ngwa North'),
(8, 1, 'Isiala-Ngwa South'),
(9, 1, 'Isuikwato'),
(10, 1, 'Ngwa'),
(11, 1, 'Obi Nwa'),
(12, 1, 'Ohafia'),
(13, 1, 'Osisioma'),
(14, 1, 'Ugwunagbo'),
(15, 1, 'Ukwa East'),
(16, 1, 'Ukwa West '),
(17, 1, 'Umu-Neochi'),
(18, 1, 'Umuahia North'),
(19, 1, 'Umuahia South'),
(20, 10, 'Aniocha'),
(21, 10, 'Aniocha South'),
(22, 10, 'Bomadi'),
(23, 10, 'Burutu'),
(24, 10, 'Ethiope East'),
(25, 10, 'Ethiope West'),
(26, 10, 'Ika North-East'),
(27, 10, 'Ika South'),
(28, 10, 'Isoko North'),
(29, 10, 'Isoko south'),
(30, 10, 'Ndokwa East'),
(31, 10, 'Ndokwa West'),
(32, 10, 'Okpe'),
(33, 10, 'Oshimili'),
(34, 10, 'Oshimili North'),
(35, 10, 'Patani'),
(36, 10, 'Sapele'),
(37, 10, 'Udu'),
(38, 10, 'Ughelli North'),
(39, 10, 'Ughelli South'),
(40, 10, 'Ukwani '),
(41, 10, 'Uvwie'),
(42, 10, 'Warri Central '),
(43, 10, 'Warri North'),
(44, 10, 'Warri South'),
(45, 11, 'Abakaliki'),
(46, 11, 'Afikpo North'),
(47, 11, 'Afikpo South'),
(48, 11, 'Ebonyi'),
(49, 11, 'Ezza'),
(50, 11, 'Ezza South'),
(51, 11, 'Ishielu'),
(52, 11, 'Ivo'),
(53, 11, 'lkwo'),
(54, 11, 'Ohaozara'),
(55, 11, 'Ohaukwu'),
(56, 11, 'Onicha'),
(57, 12, 'Akoko Edo'),
(58, 12, 'Egor'),
(59, 12, 'Esan Central'),
(60, 12, 'Esan North-East'),
(61, 12, 'Esan South-East'),
(62, 12, 'Esan West'),
(63, 12, 'Etsako Central'),
(64, 12, 'Etsako East'),
(65, 12, 'Etsako West'),
(66, 12, 'Igueben'),
(67, 12, 'Ikpoba Okha'),
(68, 12, 'Oredo'),
(69, 12, 'Orhiomwon'),
(70, 12, 'Ovia North East'),
(71, 12, 'Ovia SouthWest'),
(72, 12, 'Owan East'),
(73, 12, 'Owan West'),
(74, 12, 'Uhunmwonde'),
(75, 12, 'Ukpoba'),
(76, 13, ' Ilejemeje'),
(77, 13, 'Ado'),
(78, 13, 'Efon'),
(79, 13, 'Ekiti South-West'),
(80, 13, 'Ekiti-East'),
(81, 13, 'Ekiti-West'),
(82, 13, 'Emure/Ise/Orun'),
(83, 13, 'Gbonyin'),
(84, 13, 'Ido/Osi'),
(85, 13, 'Ijero'),
(86, 13, 'Ikare'),
(87, 13, 'Ikole'),
(88, 13, 'Irepodun'),
(89, 13, 'Ise/Orun'),
(90, 13, 'Moba'),
(91, 13, 'Oye'),
(92, 14, 'Agwu'),
(93, 14, 'Aninri'),
(94, 14, 'Enugu Eas'),
(95, 14, 'Enugu North'),
(96, 14, 'Enugu South'),
(97, 14, 'Ezeagu'),
(98, 14, 'Igbo-Ekiti'),
(99, 14, 'Igbo-Eze South'),
(100, 14, 'IgboEze North'),
(101, 14, 'Isi-Uzo'),
(102, 14, 'Nkanu'),
(103, 14, 'Nkanu East'),
(104, 14, 'Nsukka'),
(105, 14, 'Oji-River'),
(106, 14, 'Udenu'),
(107, 14, 'Udi'),
(108, 14, 'Uzo-Uwani'),
(109, 16, 'Akko'),
(110, 16, 'Balanga'),
(111, 16, 'Billiri'),
(112, 16, 'Dukku'),
(113, 16, 'Funakaye'),
(114, 16, 'Gombe'),
(115, 16, 'Kaltungo'),
(116, 16, 'Kwami'),
(117, 16, 'Nafada/Bajoga'),
(118, 16, 'Shomgom'),
(119, 16, 'Yamaltu/Delta'),
(120, 17, 'Aboh-Mbaise'),
(121, 17, 'Ahiazu-Mbaise'),
(122, 17, 'Ehime-Mbano'),
(123, 17, 'Ezinihitte'),
(124, 17, 'Ideato North'),
(125, 17, 'Ideato South'),
(126, 17, 'Ihitte/Uboma'),
(127, 17, 'Ikeduru'),
(128, 17, 'Isiala Mbano'),
(129, 17, 'Isu'),
(130, 17, 'Mbaitoli'),
(131, 17, 'Ngor-Okpala'),
(132, 17, 'Njaba'),
(133, 17, 'Nkwerre'),
(134, 17, 'Nwangele'),
(135, 17, 'Obowo'),
(136, 17, 'Oguta'),
(137, 17, 'Ohaji/Egbema'),
(138, 17, 'Okigwe'),
(139, 17, 'Orlu'),
(140, 17, 'Orsu'),
(141, 17, 'Oru East'),
(142, 17, 'Oru West'),
(143, 17, 'Owerri North'),
(144, 17, 'Owerri West'),
(145, 17, 'Owerri-Municipal'),
(146, 18, 'Auyo'),
(147, 18, 'Babura'),
(148, 18, 'Biriniwa'),
(149, 18, 'Birni Kudu'),
(150, 18, 'Buji'),
(151, 18, 'Dutse'),
(152, 18, 'Gagarawa'),
(153, 18, 'Garki'),
(154, 18, 'Gumel'),
(155, 18, 'Guri'),
(156, 18, 'Gwaram'),
(157, 18, 'Gwiwa'),
(158, 18, 'Hadejia'),
(159, 18, 'Jahun'),
(160, 18, 'Kafin Hausa'),
(161, 18, 'Kaugama Kazaure'),
(162, 18, 'Kiri Kasamma'),
(163, 18, 'Kiyawa'),
(164, 18, 'Maigatari'),
(165, 18, 'Malam Madori'),
(166, 18, 'Miga'),
(167, 18, 'Ringim'),
(168, 18, 'Roni'),
(169, 18, 'Sule-Tankarkar'),
(170, 18, 'Taura'),
(171, 18, 'Yankwashi'),
(172, 19, 'Birni-Gwari'),
(173, 19, 'Chikun'),
(174, 19, 'Giwa'),
(175, 19, 'Igabi'),
(176, 19, 'Ikara'),
(177, 19, 'jaba'),
(178, 19, 'Jemaa'),
(179, 19, 'Kachia'),
(180, 19, 'Kaduna North'),
(181, 19, 'Kaduna South'),
(182, 19, 'Kagarko'),
(183, 19, 'Kajuru'),
(184, 19, 'Kaura'),
(185, 19, 'Kauru'),
(186, 19, 'Kubau'),
(187, 19, 'Kudan'),
(188, 19, 'Lere'),
(189, 19, 'Makarfi'),
(190, 19, 'Sabon-Gari'),
(191, 19, 'Sanga'),
(192, 19, 'Soba'),
(193, 19, 'Zango-Kataf '),
(194, 19, 'Zaria'),
(195, 20, 'Ajingi'),
(196, 20, 'Albasu'),
(197, 20, 'Bagwai'),
(198, 20, 'Bebeji'),
(199, 20, 'Bichi'),
(200, 20, 'Bunkure'),
(201, 20, 'Dala'),
(202, 20, 'Dambatta'),
(203, 20, 'Dawakin Kudu'),
(204, 20, 'Dawakin Tofa'),
(205, 20, 'Doguwa'),
(206, 20, 'Fagge'),
(207, 20, 'Gabasawa'),
(208, 20, 'Garko'),
(209, 20, 'Garum'),
(210, 20, 'Gaya'),
(211, 20, 'Gezawa'),
(212, 20, 'Gwale'),
(213, 20, 'Gwarzo'),
(214, 20, 'Kabo'),
(215, 20, 'Kano Municipal'),
(216, 20, 'Karaye'),
(217, 20, 'Kibiya'),
(218, 20, 'Kiru'),
(219, 20, 'kumbotso'),
(220, 20, 'Kunchi'),
(221, 20, 'Kura'),
(222, 20, 'Madobi'),
(223, 20, 'Makoda'),
(224, 20, 'Mallam'),
(225, 20, 'Minjibir'),
(226, 20, 'Nasarawa'),
(227, 20, 'Rano'),
(228, 20, 'Rimin Gado'),
(229, 20, 'Rogo'),
(230, 20, 'Shanono'),
(231, 20, 'Sumaila'),
(232, 20, 'Takali'),
(233, 20, 'Tarauni'),
(234, 20, 'Tofa'),
(235, 20, 'Tsanyawa'),
(236, 20, 'Tudun Wada'),
(237, 20, 'Ungogo'),
(238, 20, 'Warawa'),
(239, 20, 'Wudil'),
(240, 2, 'Demsa'),
(241, 2, 'Fufore'),
(242, 2, 'Ganaye'),
(243, 2, 'Gireri'),
(244, 2, 'Gombi'),
(245, 2, 'Guyuk'),
(246, 2, 'Hong'),
(247, 2, 'Jada'),
(248, 2, 'Lamurde'),
(249, 2, 'Madagali'),
(250, 2, 'Maiha'),
(251, 2, 'Mayo-Belwa'),
(252, 2, 'Michika'),
(253, 2, 'Mubi North'),
(254, 2, 'Mubi South'),
(255, 2, 'Numan'),
(256, 2, 'Shelleng'),
(257, 2, 'Song'),
(258, 2, 'Toungo'),
(259, 2, 'Yola North'),
(260, 2, 'Yola South'),
(261, 21, 'Bakori'),
(262, 21, 'Batagarawa'),
(263, 21, 'Batsari'),
(264, 21, 'Baure'),
(265, 21, 'Bindawa'),
(266, 21, 'Charanchi'),
(267, 21, 'Dan Musa'),
(268, 21, 'Dandume'),
(269, 21, 'Danja'),
(270, 21, 'Daura'),
(271, 21, 'Dutsi'),
(272, 21, 'Dutsin-Ma'),
(273, 21, 'Faskari'),
(274, 21, 'Funtua'),
(275, 21, 'Ingawa'),
(276, 21, 'Jibia'),
(277, 21, 'Kafur'),
(278, 21, 'Kaita'),
(279, 21, 'Kankara'),
(280, 21, 'Kankia'),
(281, 21, 'Katsina'),
(282, 21, 'Kurfi'),
(283, 21, 'Kusada'),
(284, 21, 'MaiAdua'),
(285, 21, 'Malumfashi'),
(286, 21, 'Mani'),
(287, 21, 'Mashi'),
(288, 21, 'Matazuu'),
(289, 21, 'Musawa'),
(290, 21, 'Rimi'),
(291, 21, 'Sabuwa'),
(292, 21, 'Safana'),
(293, 21, 'Sandamu'),
(294, 21, 'Zango'),
(295, 22, 'Aleiro'),
(296, 22, 'Arewa-Dandi'),
(297, 22, 'Argungu'),
(298, 22, 'Augie'),
(299, 22, 'Bagudo'),
(300, 22, 'Birnin Kebbi'),
(301, 22, 'Bunza'),
(302, 22, 'Dandi'),
(303, 22, 'Fakai'),
(304, 22, 'Gwandu'),
(305, 22, 'Jega'),
(306, 22, 'Kalgo'),
(307, 22, 'Koko/Besse'),
(308, 22, 'Maiyama'),
(309, 22, 'Ngaski'),
(310, 22, 'Sakaba'),
(311, 22, 'Shanga'),
(312, 22, 'Suru'),
(313, 22, 'Wasagu/Danko'),
(314, 22, 'Yauri'),
(315, 22, 'Zuru'),
(316, 23, 'Adavi'),
(317, 23, 'Ajaokuta'),
(318, 23, 'Ankpa'),
(319, 23, 'Bassa'),
(320, 23, 'Dekina'),
(321, 23, 'Ibaji'),
(322, 23, 'Idah'),
(323, 23, 'Igalamela-Odolu'),
(324, 23, 'Ijumu'),
(325, 23, 'Kabba/Bunu'),
(326, 23, 'Kogi'),
(327, 23, 'Lokoja'),
(328, 23, 'Mopa-Muro'),
(329, 23, 'Ofu'),
(330, 23, 'Ogori/Mangongo'),
(331, 23, 'Okehi'),
(332, 23, 'Okene'),
(333, 23, 'Olamabolo'),
(334, 23, 'Omala'),
(335, 23, 'Yagba East'),
(336, 23, 'Yagba West'),
(337, 24, 'Asa'),
(338, 24, 'Baruten'),
(339, 24, 'Edu'),
(340, 24, 'Ekiti'),
(341, 24, 'Ifelodun'),
(342, 24, 'Ilorin East'),
(343, 24, 'Ilorin West'),
(344, 24, 'Irepodun'),
(345, 24, 'Isin'),
(346, 24, 'Kaiama'),
(347, 24, 'Moro'),
(348, 24, 'Offa'),
(349, 24, 'Oke-Ero'),
(350, 24, 'Oyun'),
(351, 24, 'Pategi'),
(352, 25, 'Agege'),
(353, 25, 'Ajeromi-Ifelodun'),
(354, 25, 'Alimosho'),
(355, 25, 'Amuwo-Odofin'),
(356, 25, 'Apapa'),
(357, 25, 'Badagry'),
(358, 25, 'Epe'),
(359, 25, 'Eti-Osa'),
(360, 25, 'Ibeju/Lekki'),
(361, 25, 'Ifako-Ijaye'),
(362, 25, 'Ikeja'),
(363, 25, 'Ikorodu'),
(364, 25, 'Kosofe'),
(365, 25, 'Lagos Island'),
(366, 25, 'Lagos Mainland'),
(367, 25, 'Mushin'),
(368, 25, 'Ojo'),
(369, 25, 'Oshodi-Isolo'),
(370, 25, 'Shomolu'),
(371, 25, 'Surulere'),
(372, 26, ' Lafia'),
(373, 26, 'Akwanga'),
(374, 26, 'Awe'),
(375, 26, 'Doma'),
(376, 26, 'Karu'),
(377, 26, 'Keana'),
(378, 26, 'Keffi'),
(379, 26, 'Kokona'),
(380, 26, 'Nasarawa'),
(381, 26, 'Nasarawa-Eggon'),
(382, 26, 'Obi'),
(383, 26, 'Toto'),
(384, 26, 'Wamba'),
(385, 27, 'Agaie'),
(386, 27, 'Agwara'),
(387, 27, 'Bida'),
(388, 27, 'Borgu'),
(389, 27, 'Bosso'),
(390, 27, 'Chanchaga'),
(391, 27, 'Edati'),
(392, 27, 'Gbako'),
(393, 27, 'Gurara'),
(394, 27, 'Katcha'),
(395, 27, 'Kontagora'),
(396, 27, 'Lapai'),
(397, 27, 'Lavun'),
(398, 27, 'Magama'),
(399, 27, 'Mariga'),
(400, 27, 'Mashegu'),
(401, 27, 'Mokwa'),
(402, 27, 'Muya'),
(403, 27, 'Pailoro'),
(404, 27, 'Rafi'),
(405, 27, 'Rijau'),
(406, 27, 'Shiroro'),
(407, 27, 'Suleja'),
(408, 27, 'Tafa'),
(409, 27, 'Wushishi'),
(410, 28, 'Abeokuta North'),
(411, 28, 'Abeokuta South'),
(412, 28, 'Ado-Odo/Ota'),
(413, 28, 'Ewekoro'),
(414, 28, 'Ifo'),
(415, 28, 'Ijebu East'),
(416, 28, 'Ijebu North'),
(417, 28, 'Ijebu North East'),
(418, 28, 'Ijebu Ode'),
(419, 28, 'Ikenne'),
(420, 28, 'Imeko-Afon'),
(421, 28, 'Ipokia'),
(422, 28, 'Obafemi-Owode'),
(423, 28, 'Odeda'),
(424, 28, 'Odogbolu'),
(425, 28, 'Ogun Waterside'),
(426, 28, 'Remo North'),
(427, 28, 'Shagamu'),
(428, 28, 'Yewa North'),
(429, 28, 'Yewa South'),
(430, 29, 'Akoko North East'),
(431, 29, 'Akoko North West'),
(432, 29, 'Akoko South Akure East'),
(433, 29, 'Akoko South West'),
(434, 29, 'Akure North'),
(435, 29, 'Akure South'),
(436, 29, 'Ese-Odo'),
(437, 29, 'Idanre'),
(438, 29, 'Ifedore'),
(439, 29, 'Ilaje'),
(440, 29, 'Ile-Oluji'),
(441, 29, 'Irele'),
(442, 29, 'Odigbo'),
(443, 29, 'Okeigbo'),
(444, 29, 'Okitipupa'),
(445, 29, 'Ondo East'),
(446, 29, 'Ondo West'),
(447, 29, 'Ose'),
(448, 29, 'Owo'),
(449, 30, ' Aiyedire'),
(450, 30, 'Aiyedade'),
(451, 30, 'Atakumosa East'),
(452, 30, 'Atakumosa West'),
(453, 30, 'Boluwaduro'),
(454, 30, 'Boripe'),
(455, 30, 'Ede North'),
(456, 30, 'Ede South'),
(457, 30, 'Egbedore'),
(458, 30, 'Ejigbo'),
(459, 30, 'Ife Central'),
(460, 30, 'Ife East'),
(461, 30, 'Ife North'),
(462, 30, 'Ife South'),
(463, 30, 'Ifedayo'),
(464, 30, 'Ifelodun'),
(465, 30, 'Ila'),
(466, 30, 'Ilesha East'),
(467, 30, 'Ilesha West'),
(468, 30, 'Irepodun'),
(469, 30, 'Irewole'),
(470, 30, 'Isokan'),
(471, 30, 'Iwo'),
(472, 30, 'Obokun'),
(473, 30, 'Odo-Otin'),
(474, 30, 'Ola-Oluwa'),
(475, 30, 'Olorunda'),
(476, 30, 'Oriade'),
(477, 30, 'Orolu'),
(478, 30, 'Osogbo'),
(479, 3, 'Abak'),
(480, 3, 'Eastern Obolo'),
(481, 3, 'Eket'),
(482, 3, 'Esit Eket'),
(483, 3, 'Essien Udim'),
(484, 3, 'Etim Ekpo'),
(485, 3, 'Etinan'),
(486, 3, 'Ibeno'),
(487, 3, 'Ibesikpo Asutan'),
(488, 3, 'Ibiono Ibom'),
(489, 3, 'Ika'),
(490, 3, 'Ikono'),
(491, 3, 'Ikot Abasi'),
(492, 3, 'Ikot Ekpene'),
(493, 3, 'Ini'),
(494, 3, 'Itu'),
(495, 3, 'Mbo'),
(496, 3, 'Mkpat Enin'),
(497, 3, 'Nsit Atai'),
(498, 3, 'Nsit Ibom'),
(499, 3, 'Nsit Ubium'),
(500, 3, 'Obot Akara'),
(501, 3, 'Okobo'),
(502, 3, 'Onna'),
(503, 3, 'Oron'),
(504, 3, 'Oruk Anam'),
(505, 3, 'Udung Uko'),
(506, 3, 'Ukanafun'),
(507, 3, 'Uruan'),
(508, 3, 'Urue-Offong/Oruko'),
(509, 3, 'Uyo'),
(510, 31, ' Irepo'),
(511, 31, 'Afijio'),
(512, 31, 'Akinyele'),
(513, 31, 'Atiba'),
(514, 31, 'Atigbo'),
(515, 31, 'Egbeda'),
(516, 31, 'Ibadan North'),
(517, 31, 'Ibadan North West'),
(518, 31, 'Ibadan South East'),
(519, 31, 'Ibadan South West'),
(520, 31, 'IbadanCentral'),
(521, 31, 'Ibarapa Central'),
(522, 31, 'Ibarapa East'),
(523, 31, 'Ibarapa North'),
(524, 31, 'Ido'),
(525, 31, 'Iseyin'),
(526, 31, 'Itesiwaju'),
(527, 31, 'Iwajowa'),
(528, 31, 'Kajola'),
(529, 31, 'Lagelu Ogbomosho North'),
(530, 31, 'Ogbmosho South'),
(531, 31, 'Ogo Oluwa'),
(532, 31, 'Olorunsogo'),
(533, 31, 'Oluyole'),
(534, 31, 'Ona-Ara'),
(535, 31, 'Orelope'),
(536, 31, 'Ori Ire'),
(537, 31, 'Oyo East'),
(538, 31, 'Oyo West'),
(539, 31, 'Saki East'),
(540, 31, 'Saki West'),
(541, 31, 'Surulere'),
(542, 32, 'Barikin Ladi'),
(543, 32, 'Bassa'),
(544, 32, 'Bokkos'),
(545, 32, 'Jos East'),
(546, 32, 'Jos North'),
(547, 32, 'Jos South'),
(548, 32, 'Kanam'),
(549, 32, 'Kanke'),
(550, 32, 'Langtang North'),
(551, 32, 'Langtang South'),
(552, 32, 'Mangu'),
(553, 32, 'Mikang'),
(554, 32, 'Pankshin'),
(555, 32, 'Qua an Pan'),
(556, 32, 'Riyom'),
(557, 32, 'Shendam'),
(558, 32, 'Wase'),
(559, 33, ' Oyigbo'),
(560, 33, 'Abua/Odual'),
(561, 33, 'Ahoada East'),
(562, 33, 'Ahoada West'),
(563, 33, 'Akuku Toru'),
(564, 33, 'Andoni'),
(565, 33, 'Asari-Toru'),
(566, 33, 'Bonny'),
(567, 33, 'Degema'),
(568, 33, 'Eleme'),
(569, 33, 'Emohua'),
(570, 33, 'Etche'),
(571, 33, 'Gokana'),
(572, 33, 'Ikwerre'),
(573, 33, 'Khana'),
(574, 33, 'Obia/Akpor'),
(575, 33, 'Ogba/Egbema/Ndoni'),
(576, 33, 'Ogu/Bolo'),
(577, 33, 'Okrika'),
(578, 33, 'Omumma'),
(579, 33, 'Opobo/Nkoro'),
(580, 33, 'Port-Harcourt'),
(581, 33, 'Tai'),
(582, 34, 'Binji'),
(583, 34, 'Bodinga'),
(584, 34, 'Dange-shnsi'),
(585, 34, 'Gada'),
(586, 34, 'Gawabawa'),
(587, 34, 'Goronyo'),
(588, 34, 'Gudu'),
(589, 34, 'Illela'),
(590, 34, 'Isa'),
(591, 34, 'kebbe'),
(592, 34, 'Kware'),
(593, 34, 'Rabah'),
(594, 34, 'Sabon birni'),
(595, 34, 'Shagari'),
(596, 34, 'Silame'),
(597, 34, 'Sokoto North'),
(598, 34, 'Sokoto South'),
(599, 34, 'Tambuwal'),
(600, 34, 'Tqngaza'),
(601, 34, 'Tureta'),
(602, 34, 'Wamako'),
(603, 34, 'Wurno'),
(604, 34, 'Yabo'),
(605, 35, 'Ardo-kola'),
(606, 35, 'Bali'),
(607, 35, 'Cassol'),
(608, 35, 'Donga'),
(609, 35, 'Gashaka'),
(610, 35, 'Ibi'),
(611, 35, 'Jalingo'),
(612, 35, 'Karin-Lamido'),
(613, 35, 'Kurmi'),
(614, 35, 'Lau'),
(615, 35, 'Sardauna'),
(616, 35, 'Takum'),
(617, 35, 'Ussa'),
(618, 35, 'Wukari'),
(619, 35, 'Yorro'),
(620, 35, 'Zing'),
(621, 36, 'Bade'),
(622, 36, 'Bursari'),
(623, 36, 'Damaturu'),
(624, 36, 'Fika'),
(625, 36, 'Fune'),
(626, 36, 'Geidam'),
(627, 36, 'Gujba'),
(628, 36, 'Gulani'),
(629, 36, 'Jakusko'),
(630, 36, 'Karasuwa'),
(631, 36, 'Karawa'),
(632, 36, 'Machina'),
(633, 36, 'Nangere'),
(634, 36, 'Nguru Potiskum'),
(635, 36, 'Tarmua'),
(636, 36, 'Yunusari'),
(637, 36, 'Yusufari'),
(638, 37, 'Anka'),
(639, 37, 'Bakura'),
(640, 37, 'Birnin Magaji'),
(641, 37, 'Bukkuyum '),
(642, 37, 'Bungudu'),
(643, 37, 'Gummi'),
(644, 37, 'Gusau'),
(645, 37, 'Kaura'),
(646, 37, 'Maradun'),
(647, 37, 'Maru'),
(648, 37, 'Namoda'),
(649, 37, 'Shinkafi'),
(650, 37, 'Talata Mafara'),
(651, 37, 'Tsafe'),
(652, 37, 'Zurmi'),
(653, 15, 'Abaji'),
(654, 15, 'Abuja Municipal'),
(655, 15, 'Bwari'),
(656, 15, 'Gwagwalada'),
(657, 15, 'Kuje'),
(658, 15, 'Kwali'),
(659, 4, 'Aguata'),
(660, 4, 'Anambra East'),
(661, 4, 'Anambra West'),
(662, 4, 'Anaocha'),
(663, 4, 'Awka North'),
(664, 4, 'Awka South'),
(665, 4, 'Ayamelum'),
(666, 4, 'Dunukofia'),
(667, 4, 'Ekwusigo'),
(668, 4, 'Idemili North'),
(669, 4, 'Idemili south'),
(670, 4, 'Ihiala'),
(671, 4, 'Njikoka'),
(672, 4, 'Nnewi North'),
(673, 4, 'Nnewi South'),
(674, 4, 'Ogbaru'),
(675, 4, 'Onitsha North'),
(676, 4, 'Onitsha South'),
(677, 4, 'Orumba North'),
(678, 4, 'Orumba South'),
(679, 4, 'Oyi'),
(680, 5, 'Alkaleri'),
(681, 5, 'Bauchi'),
(682, 5, 'Bogoro'),
(683, 5, 'Damban'),
(684, 5, 'Darazo'),
(685, 5, 'Dass'),
(686, 5, 'Ganjuwa'),
(687, 5, 'Giade'),
(688, 5, 'Itas/Gadau'),
(689, 5, 'Jama\'are'),
(690, 5, 'Katagum'),
(691, 5, 'Kirfi'),
(692, 5, 'Misau'),
(693, 5, 'Ningi'),
(694, 5, 'Shira'),
(695, 5, 'Tafawa-Balewa'),
(696, 5, 'Toro'),
(697, 5, 'Warji'),
(698, 5, 'Zaki'),
(699, 6, 'Brass'),
(700, 6, 'Ekeremor'),
(701, 6, 'Kolokuma/Opokuma'),
(702, 6, 'Nembe'),
(703, 6, 'Ogbia'),
(704, 6, 'Sagbama'),
(705, 6, 'Southern Jaw'),
(706, 6, 'Yenegoa'),
(707, 7, 'Ado'),
(708, 7, 'Agatu'),
(709, 7, 'Apa'),
(710, 7, 'Buruku'),
(711, 7, 'Gboko'),
(712, 7, 'Guma'),
(713, 7, 'Gwer East'),
(714, 7, 'Gwer West'),
(715, 7, 'Katsina-Ala'),
(716, 7, 'Konshisha'),
(717, 7, 'Kwande'),
(718, 7, 'Logo'),
(719, 7, 'Makurdi'),
(720, 7, 'Obi'),
(721, 7, 'Ogbadibo'),
(722, 7, 'Ohimini'),
(723, 7, 'Oju'),
(724, 7, 'Okpokwu'),
(725, 7, 'Oturkpo'),
(726, 7, 'Tarka'),
(727, 7, 'Ukum'),
(728, 7, 'Ushongo'),
(729, 7, 'Vandeikya'),
(730, 8, 'Abadam'),
(731, 8, 'Askira/Uba'),
(732, 8, 'Bama'),
(733, 8, 'Bayo'),
(734, 8, 'Biu'),
(735, 8, 'Chibok'),
(736, 8, 'Damboa'),
(737, 8, 'Dikwa'),
(738, 8, 'Gubio'),
(739, 8, 'Guzamala'),
(740, 8, 'Gwoza'),
(741, 8, 'Hawul'),
(742, 8, 'Jere'),
(743, 8, 'Kaga'),
(744, 8, 'Kala/Balge'),
(745, 8, 'Konduga'),
(746, 8, 'Kukawa'),
(747, 8, 'Kwaya Kusar'),
(748, 8, 'Mafa'),
(749, 8, 'Magumeri'),
(750, 8, 'Maiduguri'),
(751, 8, 'Marte'),
(752, 8, 'Mobbar'),
(753, 8, 'Monguno'),
(754, 8, 'Ngala'),
(755, 8, 'Nganzai'),
(756, 8, 'Shani'),
(757, 9, 'Abi'),
(758, 9, 'Akamkpa'),
(759, 9, 'Akpabuyo'),
(760, 9, 'Bakassi'),
(761, 9, 'Bekwara'),
(762, 9, 'Biase'),
(763, 9, 'Boki'),
(764, 9, 'Calabar Municipality'),
(765, 9, 'Calabar South'),
(766, 9, 'Etung'),
(767, 9, 'Ikom'),
(768, 9, 'Obanliku'),
(769, 9, 'Obubra'),
(770, 9, 'Obudu'),
(771, 9, 'Odukpani'),
(772, 9, 'Ogoja'),
(773, 9, 'Yala'),
(774, 9, 'Yarkur');

-- --------------------------------------------------------

--
-- Table structure for table `location_and_browser_infos`
--

DROP TABLE IF EXISTS `location_and_browser_infos`;
CREATE TABLE IF NOT EXISTS `location_and_browser_infos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `country_name` varchar(191) DEFAULT NULL,
  `country_code` char(5) DEFAULT NULL,
  `region_code` char(5) DEFAULT NULL,
  `region_name` varchar(191) DEFAULT NULL,
  `city_name` varchar(191) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `iso_code` varchar(20) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `metro_code` varchar(20) DEFAULT NULL,
  `area_code` char(5) DEFAULT NULL,
  `browser_name` varchar(50) DEFAULT NULL,
  `browser_version` varchar(50) DEFAULT NULL,
  `device_operating_system` varchar(50) DEFAULT NULL,
  `device_operating_system_version` varchar(50) DEFAULT NULL,
  `languages` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_and_browser_infos`
--

INSERT INTO `location_and_browser_infos` (`id`, `user_id`, `ip`, `country_name`, `country_code`, `region_code`, `region_name`, `city_name`, `zip_code`, `iso_code`, `postal_code`, `latitude`, `longitude`, `metro_code`, `area_code`, `browser_name`, `browser_version`, `device_operating_system`, `device_operating_system_version`, `languages`) VALUES
(29, 11, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_messages_ibfk_1` (`sender_id`),
  KEY `client_messages_ibfk_2` (`recipient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `recipient_id`, `subject`, `body`, `is_read`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 11, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Adekola Adefarasin,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=“/faq” target=“_blank”> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2020-12-11 12:43:02', '2020-12-11 12:43:02'),
(2, 4, 11, 'Congratulations! You have earned a discount', '<h1>Congratulations! You have just earned a 5% discount on your first job booking</h1><p>We are very excited you joined the most compelling community of FixMaster satisfied customers! As you already know, excellent quality service, rewards, and savings have always been a vital part of FixMaster\'s success.</p><p> Having said so, we constantly cater to our customers\' best interests in terms of choice, quality, affordability, and unmatchable service!</p><p>For registering with FixMaster, you have been rewarded with a discount on your first job booking which entitles you to a 5% discount off your booking fee.</p><p><strong>PLEASE NOTE THAT THIS DISCOUNT IS ONLY APPLICABLE FOR YOUR FIRST JOB BOOKING</strong></p><p>Should you require further assistance, please do not hesitate to contact us immediately on <strong>08132863878</strong>. We are here to serve you; 24-hours, 7 days a week.</p><p>&nbsp;</p><p>Yours Faithfully,</p><p>FixMaster management</p>', '0', NULL, '2020-12-14 12:06:25', '2020-12-14 12:06:25'),
(4, 4, 11, 'Service Request(JOB-66EB5A26)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>JOB-66EB5A26</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,325(Urgent)</p><p><strong>Date & Time:</strong> December 15th 2020, 5:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2020-12-14 12:39:55', '2020-12-14 12:39:55'),
(5, 4, 11, 'Service Request(JOB-330CB862)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>JOB-330CB862</p><p><strong>Service: </strong>Plumbing(Bath-Tubs, Pipes, Kitchen Sink)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,300(Urgent)</p><p><strong>Date & Time:</strong> December 14th 2020, 4:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2020-12-14 12:48:20', '2020-12-14 12:48:20'),
(6, 4, 11, 'Service Request(REF-27D2F0BE)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-27D2F0BE</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Urgent)</p><p><strong>Date & Time:</strong> December 15th 2020, 11:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2020-12-14 15:36:58', '2020-12-14 15:36:58'),
(7, 4, 11, 'Service Request(REF-1FC50FCC)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-1FC50FCC</p><p><strong>Service: </strong>Plumbing(Drainage, Shower, Soak-Away)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Urgent)</p><p><strong>Date & Time:</strong> December 16th 2020, 4:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2020-12-15 09:33:01', '2020-12-15 09:33:01'),
(8, 4, 11, 'Service Request(REF-131D985E)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-131D985E</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦4,700(Out of Hours)</p><p><strong>Date & Time:</strong> December 16th 2020, 8:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2020-12-15 09:51:29', '2020-12-15 09:51:29'),
(9, 4, 19, 'Welcome to FixMaster!', '<h1>Welcome to FixMaster, Favour Nnamdi!</h1><p>We are very excited you joined the most compelling community of FixMaster to satisfy customer\'s need.</p><p>As a <strong>Client Service Executive</strong>(CSE) you are expected to deliver excellent quality service which has always been a vital part of FixMaster\'s success.</p><p>Having said so, we constantly cater to our customer\'s best interests in terms of choice, quality, affordability, and unmatchable service!</p><p>Remember to change your password to a more convenient one asides the one given to you by FixMaster Admin.</p><p><span style=\"text-decoration: underline;\"><strong>Login Credentials</strong></span></p><p><strong>E-Mail</strong>: nnamdi.favour@yahoo.com</p><p><strong>Password:</strong> admin12345</p><p>&nbsp;</p><p>Yours Faithfully,</p><p>FixMaster management</p>', '0', NULL, '2020-12-18 13:03:17', '2020-12-18 13:03:17'),
(10, 4, 23, 'Welcome to FixMaster!', '<h1>Welcome to FixMaster, John Desmond!</h1><p>We are very excited you joined the most compelling community of FixMaster to satisfy customer\'s need.</p><p>As a <strong>Technician</strong> you will be assigned to jobs and you are expected to deliver excellent quality service which has always been a vital part of FixMaster\'s success.</p><p>Having said so, we constantly cater to our customer\'s best interests in terms of choice, quality, affordability, and unmatchable service!</p><p>Remember to change your password to a more convenient one asides the one given to you by FixMaster Admin.</p><p><span style=\"text-decoration: underline;\"><strong>Login Credentials</strong></span></p><p><strong>E-Mail</strong>: desmond.john@outlook.co.uk</p><p><strong>Password:</strong> admin12345</p><p>&nbsp;</p><p>Yours Faithfully,</p><p>FixMaster management</p>', '0', NULL, '2020-12-19 21:26:29', '2020-12-19 21:26:29'),
(11, 4, 15, 'New Job(REF-131D985E) Assignment', '<p><strong>Taofeek Adedokun</strong>, you have been assigned to <strong>REF-131D985E</strong> job. Kindly proceed to reviewing the client\'s request and await further instructions from the <strong>Godrey Diwa</strong>(CSE) assigned to you.</p><br /><p>Thanks,<br />FixMaster Management</p>', '0', NULL, '2020-12-23 19:21:30', '2020-12-23 19:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_25_124652_create_clients_table', 1),
(5, '2020_11_25_131416_create_cses_table', 1),
(6, '2020_11_25_132758_create_technicians_table', 1),
(7, '2020_11_25_203732_create_admins_table', 2),
(8, '2020_11_25_204933_create_super_admins_table', 3),
(9, '2020_11_26_213434_create_activity_logs_table', 4),
(10, '2020_11_26_214659_create_activity_logs_table', 5),
(11, '2020_11_26_220025_create_names_table', 6),
(12, '2020_11_27_011458_create_admin_permissions_table', 7),
(13, '2020_12_05_054058_create_services_table', 8),
(14, '2020_12_05_060826_create_categories_table', 9),
(15, '2020_12_05_115934_create_requests_table', 10),
(16, '2020_12_11_072328_create_client_messages_table', 11),
(17, '2020_12_12_002425_create_wallets_table', 12),
(18, '2020_12_13_043103_create_service_request_details_table', 13),
(19, '2020_12_21_103226_create_tools_table', 14),
(20, '2020_12_21_104814_create_tool_requests_table', 14),
(21, '2020_12_21_121424_create_tool_request_batches_table', 14),
(22, '2020_12_21_154156_project_statuses_table', 15),
(23, '2020_12_24_054610_create_service_request_progress_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

DROP TABLE IF EXISTS `names`;
CREATE TABLE IF NOT EXISTS `names` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `names`
--

INSERT INTO `names` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'NinthBinary Developer', NULL, NULL),
(2, 3, 'Charles Famoriyo', NULL, NULL),
(3, 5, 'David Akinsola', '2020-11-30 06:26:42', NULL),
(4, 6, 'Obuchi Omotosho', '2020-11-30 22:35:09', NULL),
(5, 7, 'Isaac John', '2020-12-03 19:35:45', NULL),
(6, 2, 'Unknown Intruder', NULL, NULL),
(7, 8, 'Emmanuel Godfrey', '2020-12-04 06:03:06', NULL),
(8, 9, 'Wisdom Amana', NULL, NULL),
(9, 10, 'Debola Williams', NULL, NULL),
(10, 4, 'FixMaster', NULL, NULL),
(11, 11, 'Adekola Adeleke', '2020-12-11 12:43:02', NULL),
(12, 12, 'Godrey Diwa', '2020-12-11 12:43:02', '2020-12-18 18:25:52'),
(13, 13, 'Benedict Olaoye', NULL, '2020-12-18 18:26:52'),
(14, 14, 'Andrew Nwankwo', NULL, NULL),
(15, 15, 'Taofeek Adedokun', NULL, '2020-12-20 10:58:48'),
(17, 19, 'Favour Nnamdi', '2020-12-18 13:03:16', '2020-12-18 19:38:12'),
(20, 23, 'John Desmond', '2020-12-19 21:26:29', '2020-12-19 22:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

DROP TABLE IF EXISTS `professions`;
CREATE TABLE IF NOT EXISTS `professions` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Accountant ', 'A person that works with the money and accounts of a company.', '2020-12-09 17:38:04', NULL),
(2, 'Actor/Actress', 'A person that acts in a play or a movie', '2020-12-09 17:38:04', NULL),
(3, 'Architect', 'A person that designs building and houses.', '2020-12-09 17:42:55', NULL),
(4, 'Astronomer', 'A person who studies the stars and the universe', '2020-12-09 17:42:55', NULL),
(5, 'Author', 'They write books or novels.', '2020-12-09 17:42:55', NULL),
(6, 'Baker', 'They make bread and cakes and normally work in a bakery.', '2020-12-09 17:42:55', NULL),
(7, 'Bricklayer', 'A person that helps to build houses using bricks.', '2020-12-09 17:42:55', NULL),
(8, 'Bus Driver', 'A person that drives buses', '2020-12-09 17:42:55', NULL),
(9, 'Butcher', 'A person that works with meat. They cut the meat and sell it in their shop.', '2020-12-09 17:42:55', NULL),
(10, 'Carpenter', 'A person that makes things from wood including houses and furniture.', '2020-12-09 17:42:55', NULL),
(11, 'Chef/Cook', 'A person that prepared food for others, often in a restaurant or café.', '2020-12-09 17:42:55', NULL),
(12, 'Cleaner', 'A person that cleans/tidies an area or place (such as in an office)', '2020-12-09 17:42:55', NULL),
(13, 'Dentist', 'A person that can fix problems you have with your teeth.', '2020-12-09 17:47:53', NULL),
(14, 'Designer', 'A person who has the job of designing things.', '2020-12-09 17:47:53', NULL),
(15, 'Doctor', 'A person you go to see when you are ill or have some type of health problem.', '2020-12-09 17:47:53', NULL),
(16, 'Dustman/Refuse Collector', 'A person that collects trash/rubbish from bins in the street.', '2020-12-09 17:47:53', NULL),
(17, 'Electrician', 'A person that works with electric circuits.', '2020-12-09 17:47:53', NULL),
(18, 'Engineer', 'A person who develops solutions to technical problems. They sometimes design, build, or maintain engines, machines, structures or public works.', '2020-12-09 17:47:53', NULL),
(19, 'Factory Worker', 'A person that works in a factory.', '2020-12-09 17:47:53', NULL),
(20, 'Farmer', 'A person that works on a farm, usually with animals.', '2020-12-09 17:47:53', NULL),
(21, 'Fireman/Fire Fighter', 'A person that puts out fires.', '2020-12-09 17:47:53', NULL),
(22, 'Fisherman', 'A person that catches fish', '2020-12-09 17:47:53', NULL),
(23, 'Florist', 'A person that works with flowers.', '2020-12-09 17:51:40', NULL),
(24, 'Gardener', 'A person that keeps gardens clean and tidy. They take care of the plants in the garden.', '2020-12-09 17:51:40', NULL),
(25, 'Hairdresser', 'Tthey cut your hair or give it a new style.', '2020-12-09 17:51:40', NULL),
(26, 'Journalist', 'A person that makes new reports in writing or through television.', '2020-12-09 17:51:40', NULL),
(27, 'Judge', 'A qualified person that decides cases in a law court.', '2020-12-09 17:51:40', NULL),
(28, 'Lawyer', 'A person that defends people in court and gives legal advice.', '2020-12-09 17:51:40', NULL),
(29, 'Lecturer', 'A person that gives lectures, usually in a university.', '2020-12-09 17:51:40', NULL),
(30, 'Librarian', 'A person that works in a library.', '2020-12-09 17:51:40', NULL),
(31, 'Lifeguard', 'A person that saves lives where people swim (at a beach or swimming pool).', '2020-12-09 17:51:40', NULL),
(32, 'Mechanic', 'A person that repairs machines, especially car motors.', '2020-12-09 17:51:40', NULL),
(33, 'Model', 'A (usually attractive) person that works in fashion, modeling clothes and accessories.', '2020-12-09 17:59:24', NULL),
(34, 'Newsreader', 'A person that reads the news, normally on television.', '2020-12-09 17:59:24', NULL),
(35, 'Nurse', 'A person trained to help a doctor look after the sick or injured.', '2020-12-09 17:59:24', NULL),
(36, 'Optician', 'A person that checks your eyes and try and correct any problems with your sight.', '2020-12-09 17:59:24', NULL),
(37, 'Painter', 'A person that paints pictures or the interior and exterior of buildings.', '2020-12-09 17:59:24', NULL),
(38, 'Pharmacist', 'A qualified person that works with and dispenses medicine.', '2020-12-09 17:59:24', NULL),
(39, 'Photographer ', 'A person that takes photos.', '2020-12-09 17:59:24', NULL),
(40, 'Pilot', 'A person who flies a plane.', '2020-12-09 17:59:24', NULL),
(41, 'Plumber', 'A person that repairs your water systems or pipes.', '2020-12-09 17:59:24', NULL),
(42, 'Politician', 'A person who works in politics.', '2020-12-09 17:59:24', NULL),
(43, 'Policeman/Policewoman ', 'A member of the police force. They (try and) prevent crime.', '2020-12-09 18:03:11', NULL),
(44, 'Postman', 'A person that delivers mail to your house.', '2020-12-09 18:03:11', NULL),
(45, 'Real Estate Agent', 'A person that makes money from selling land for development.', '2020-12-09 18:03:11', NULL),
(46, 'Receptionist', 'A person that is at the reception (entrance) of a company.', '2020-12-09 18:03:11', NULL),
(47, 'Scientist', 'A person that works in the science industry. They do many experiments.', '2020-12-09 18:03:11', NULL),
(48, 'Secretary', 'A person employed in an office who types letters, keeps records etc.', '2020-12-09 18:03:11', NULL),
(49, 'Shop Assistant ', 'A person that works in a shop or store selling products.', '2020-12-09 18:03:11', NULL),
(50, 'Soldier', 'A person who works for the army.', '2020-12-09 18:03:11', NULL),
(51, 'Tailor', 'A person that makes clothes for others, many times producing exclusive items of clothing.', '2020-12-09 18:03:11', NULL),
(52, 'Taxi Driver ', 'A person who drives a taxi.', '2020-12-09 18:03:11', NULL),
(53, 'Teacher', 'A person that passes knowledge to students, usually at school.', '2020-12-09 18:06:02', NULL),
(54, 'Translator', 'A person that translates from one language to another.', '2020-12-09 18:06:02', NULL),
(55, 'Traffic Warden', 'A person that patrols areas to check that people do not park in the wrong place.', '2020-12-09 18:06:02', NULL),
(56, 'Travel Agent ', 'A person that organises and sells holidays and flights for others.', '2020-12-09 18:06:02', NULL),
(57, 'Veterinary Doctor (Vet)', 'A qualified person that looks after sick animals.', '2020-12-09 18:06:02', NULL),
(58, 'Waiter/Waitress', 'A person that works in a food outlet, looking after customers and serving food.', '2020-12-09 18:06:02', NULL),
(59, 'Window Cleaner', 'A person that cleans windows, normally the windows of big buildings.', '2020-12-09 18:06:02', NULL),
(60, 'Others', 'Other professions not listed.', '2020-12-10 09:48:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_name_unique` (`name`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `name`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Uncategorized', '0', NULL, '2019-12-31 23:00:00', '2020-12-08 18:38:47'),
(2, 1, 'Electricals', '1', NULL, '2020-12-05 09:15:38', '2020-12-08 20:12:15'),
(3, 1, 'Plumbing', '1', NULL, '2020-12-05 09:16:30', NULL),
(4, 1, 'Refrigeration', '1', NULL, '2020-12-05 09:18:11', '2020-12-05 10:32:26'),
(5, 1, 'Household Appliances', '1', NULL, '2020-12-05 09:19:11', NULL),
(6, 1, 'Locks & Security', '1', NULL, '2020-12-05 09:20:35', NULL),
(11, 1, 'Electronics', '1', NULL, '2020-12-05 09:07:03', '2020-12-08 18:37:20'),
(12, 1, 'Gadgets', '1', NULL, '2020-12-08 17:55:27', '2020-12-12 18:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

DROP TABLE IF EXISTS `service_requests`;
CREATE TABLE IF NOT EXISTS `service_requests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `technician_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `job_reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_request_status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `total_amount` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `security_code` (`security_code`),
  UNIQUE KEY `job_reference` (`job_reference`),
  KEY `user_id` (`user_id`,`admin_id`,`cse_id`,`technician_id`,`service_id`,`category_id`),
  KEY `category_id` (`category_id`),
  KEY `service_id` (`service_id`),
  KEY `admin_id` (`admin_id`),
  KEY `technician_id` (`technician_id`),
  KEY `cse_id` (`cse_id`),
  KEY `service_request_status_id` (`service_request_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `user_id`, `admin_id`, `cse_id`, `technician_id`, `service_id`, `category_id`, `job_reference`, `security_code`, `service_request_status_id`, `total_amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, NULL, NULL, NULL, 11, 1, 'REF-66EB5A26', 'SEC-27AEC73E', 1, 3325, NULL, '2020-12-14 12:39:55', NULL),
(2, 10, NULL, NULL, NULL, 3, 2, 'REF-330CB862', 'SEC-88AC1B19', 1, 3300, NULL, '2020-12-14 12:48:20', NULL),
(5, 11, NULL, NULL, NULL, 5, 3, 'REF-27D2F0BE', 'SEC-35FA9E28', 1, 2500, NULL, '2020-12-14 15:36:58', NULL),
(6, 9, NULL, NULL, NULL, 3, 4, 'REF-1FC50FCC', 'SEC-EBC1D654', 1, 3500, NULL, '2020-12-15 09:33:01', NULL),
(7, 11, NULL, NULL, NULL, 11, 1, 'REF-131D985E', 'SEC-A62C515E', 1, 4700, NULL, '2020-12-15 09:51:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_request_details`
--

DROP TABLE IF EXISTS `service_request_details`;
CREATE TABLE IF NOT EXISTS `service_request_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` tinyint(4) UNSIGNED NOT NULL,
  `lga_id` int(11) UNSIGNED NOT NULL,
  `town` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_service_fee` int(20) UNSIGNED NOT NULL,
  `discount_service_fee` int(20) UNSIGNED DEFAULT NULL,
  `service_fee_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `service_request_id` (`service_request_id`),
  KEY `state_id` (`state_id`),
  KEY `lga_id` (`lga_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_request_details`
--

INSERT INTO `service_request_details` (`id`, `service_request_id`, `state_id`, `lga_id`, `town`, `initial_service_fee`, `discount_service_fee`, `service_fee_name`, `phone_number`, `address`, `description`, `timestamp`, `media_file`, `payment_method`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 25, 359, 'Falomo', 3500, 3325, 'Urgent', '08034516844', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'My pc no longer comes on even when plugged into a power source.', 'December 14th 2020, 12:00:00pm', '66eb5a26f7f961fca75c73ba0a65e4110a5dc9af.jpg', 'Online', NULL, '2020-12-14 12:39:55', '2020-12-14 12:39:55'),
(2, 2, 25, 359, 'Falomo', 3300, NULL, 'Urgent', '08167836902', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'Hello FixMaster, my kitchen pipe broke and water is spilling everywhere, kindly send someone over...it\'s of utmost urgency. Thanks', 'December 15th 2020, 10:00:00am', NULL, 'Online', NULL, '2020-12-14 12:48:20', '2020-12-14 12:48:20'),
(3, 5, 25, 359, 'Falomo', 2500, NULL, 'Standard', '08034516844', '127B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'My dishwasher broke, and its spilling water everywhere. Please send someone, ASAP!', 'December 15th 2020, 11:00:00am', NULL, 'Online', NULL, '2020-12-14 15:36:58', '2020-12-14 15:36:58'),
(4, 6, 25, 359, 'Falomo', 3500, NULL, 'Urgent', '08034516844', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'Testing 222', 'December 16th 2020, 4:00:00pm', NULL, 'Online', NULL, '2020-12-15 09:33:01', '2020-12-15 09:33:01'),
(5, 7, 25, 359, 'Falomo', 4700, NULL, 'Out of Hours', '08034516844', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'Please I urgently need a repair for my computer, It goes off saying overheating. I think the fan is faulty.', 'December 16th 2020, 8:00:00pm', NULL, 'Online', NULL, '2020-12-15 09:51:29', '2020-12-15 09:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `service_request_progress`
--

DROP TABLE IF EXISTS `service_request_progress`;
CREATE TABLE IF NOT EXISTS `service_request_progress` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `service_request_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_request_progress_user_id_index` (`user_id`),
  KEY `service_request_progress_service_request_id_index` (`service_request_id`),
  KEY `service_request_progress_service_request_status_id_index` (`service_request_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_request_statuses`
--

DROP TABLE IF EXISTS `service_request_statuses`;
CREATE TABLE IF NOT EXISTS `service_request_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `can_delete` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_statuses_name_unique` (`name`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_request_statuses`
--

INSERT INTO `service_request_statuses` (`id`, `user_id`, `name`, `can_delete`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pending', '0', NULL, NULL, NULL),
(2, 1, 'Cancelled', '0', NULL, NULL, NULL),
(3, 1, 'Completed', '0', NULL, NULL, NULL),
(4, 1, 'Ongoing', '0', NULL, NULL, NULL),
(5, 1, 'Enroute to Client\'s location', '1', NULL, '2020-12-21 16:00:14', NULL),
(7, 1, 'Performing diagnosis', '1', NULL, '2020-12-23 23:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT'),
(16, 'Gombe '),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi '),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nassarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `super_admins`
--

DROP TABLE IF EXISTS `super_admins`;
CREATE TABLE IF NOT EXISTS `super_admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `super_admins_phone_number_unique` (`phone_number`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_admins`
--

INSERT INTO `super_admins` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `phone_number`) VALUES
(1, 1, 'NinthBinary', NULL, 'Developer', '07036722889'),
(2, 3, 'Charles', NULL, 'Famoriyo', '08069386641');

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

DROP TABLE IF EXISTS `technicians`;
CREATE TABLE IF NOT EXISTS `technicians` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` tinyint(4) UNSIGNED DEFAULT NULL,
  `lga_id` int(11) UNSIGNED DEFAULT NULL,
  `bank_id` int(11) UNSIGNED DEFAULT NULL,
  `tag_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_phone_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(1,1) NOT NULL DEFAULT 0.0,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `technicians_phone_number_unique` (`phone_number`),
  UNIQUE KEY `tag_id` (`tag_id`),
  UNIQUE KEY `technicians_other_phone_number_unique` (`other_phone_number`),
  UNIQUE KEY `technicians_account_number_unique` (`account_number`),
  KEY `lga_id` (`lga_id`),
  KEY `state_id` (`state_id`),
  KEY `bank_id` (`bank_id`),
  KEY `created_by` (`created_by`),
  KEY `user_id` (`user_id`,`franchise_id`,`state_id`,`lga_id`,`bank_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`id`, `user_id`, `created_by`, `franchise_id`, `state_id`, `lga_id`, `bank_id`, `tag_id`, `first_name`, `middle_name`, `last_name`, `gender`, `phone_number`, `other_phone_number`, `account_number`, `rating`, `avatar`, `town`, `full_address`, `created_at`, `updated_at`) VALUES
(1, 14, 1, NULL, 25, 362, 5, 'TECH-23973', 'Andrew', 'Stephen', 'Nwankwo', 'Male', '09037827367', NULL, '0723872901', '0.0', NULL, 'Alausa', 'Badejo Close, off Shoprite, Alausa-Ikeja, Lagos. Nigeria.', NULL, NULL),
(2, 15, 1, NULL, 25, 360, 16, 'TECH-08435', 'Taofeek', 'Kazeem', 'Adedokun', 'Male', '08124763892', NULL, '0123653289', '0.0', NULL, 'Ibeju-Lekki', 'Camsican Drive, Ibeju Lekki, Lagos State.', NULL, '2020-12-20 10:58:48'),
(5, 23, 1, NULL, 25, 365, NULL, 'TECH-C8D94326', 'John', NULL, 'Desmond', 'Male', '08124326723', NULL, NULL, '0.0', 'd149263a8101b55710e20b7c2336d153fff66445.jpg', 'Okin-Arin', '23, Hawley street, off Igbosere, Lagos Island.', '2020-12-19 21:26:29', '2020-12-19 22:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `technician_category`
--

DROP TABLE IF EXISTS `technician_category`;
CREATE TABLE IF NOT EXISTS `technician_category` (
  `technician_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technician_category`
--

INSERT INTO `technician_category` (`technician_id`, `category_id`) VALUES
(5, 3),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tool_inventories`
--

DROP TABLE IF EXISTS `tool_inventories`;
CREATE TABLE IF NOT EXISTS `tool_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `available` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_inventories`
--

INSERT INTO `tool_inventories` (`id`, `user_id`, `name`, `quantity`, `available`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ladder', 4, 4, NULL, '2020-12-20 23:00:00', NULL),
(2, 3, 'Water Hose', 2, 2, NULL, '2020-12-20 23:00:00', '2020-12-21 14:38:48'),
(3, 1, 'Star Screw Driver', 7, 7, NULL, '2020-12-21 12:44:41', '2020-12-21 14:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `tool_requests`
--

DROP TABLE IF EXISTS `tool_requests`;
CREATE TABLE IF NOT EXISTS `tool_requests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `requested_by` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `tool_requests_batch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Approved','Declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requested_by` (`requested_by`,`approved_by`,`service_request_id`,`tool_requests_batch_id`),
  KEY `tool_requests_batch_id` (`tool_requests_batch_id`),
  KEY `service_request_id` (`service_request_id`),
  KEY `tool_requests_ibfk_4` (`approved_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tool_request_batches`
--

DROP TABLE IF EXISTS `tool_request_batches`;
CREATE TABLE IF NOT EXISTS `tool_request_batches` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tool_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tool_id` (`tool_id`),
  KEY `batch_id` (`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verification_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_email_verified` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` enum('[SUPER_ADMIN_ROLE]','[ADMIN_ROLE]','[CSE_ROLE]','[TECHNICIAN_ROLE]','[SUPPLIER_ROLE]','[TRAINEE_ROLE]','[CLIENT_ROLE]','[INTRUDER_ROLE]') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `login_count` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `current_sign_in` timestamp NULL DEFAULT NULL,
  `last_sign_in` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `email_verification_token`, `is_email_verified`, `password`, `remember_token`, `designation`, `is_active`, `is_admin`, `login_count`, `current_sign_in`, `last_sign_in`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'developer@ninthbinary.com', '2020-11-11 23:00:00', '4a7ad6cc6b5042a04ca5b49d8891addf1b86542b', '1', '$2y$10$TyaYqcpSh9fWWiW63q6mVenWe8myqbqSVQk37XP2alC1Nph0lriqa', NULL, '[SUPER_ADMIN_ROLE]', '1', '1', 76, '2020-12-24 04:41:00', '2020-12-23 17:13:34', NULL, '2019-12-31 23:29:26', '2020-12-24 04:41:00'),
(2, '', NULL, NULL, '0', '', NULL, '[INTRUDER_ROLE]', '0', '0', 0, NULL, NULL, NULL, NULL, NULL),
(3, 'charles.famoriyo@gmail.com', '2020-11-30 06:26:42', 'e611c2f59fb21fcdf4b2ac7c8754c9e54ec66569', '1', '$2y$10$oi6eKa68yOPcZeNFIDfOv.H4F4Yy6AtTwA3rP6tlhvSLfU2ix6mkC', NULL, '[SUPER_ADMIN_ROLE]', '1', '1', 3, '2020-12-03 19:34:43', '2020-11-30 21:34:14', NULL, '2020-11-30 06:26:42', NULL),
(4, 'info@fixmaster.com.ng', '2020-11-30 06:26:42', 'e611c2f59fb21fcdf4b2ac7c8754c9e54ec66569', '1', '$2y$10$oi6eKa68yOPcZeNFIDfOv.H4F4Yy6AtTwA3rP6tlhvSLfU2ix6mkC', NULL, '[SUPER_ADMIN_ROLE]', '1', '1', 0, NULL, NULL, NULL, NULL, NULL),
(5, 'david.akinsola@gmail.com', '2020-11-30 06:26:42', 'e611c2f59fb21fcdf4b2ac7c8754c9e54ec66569', '1', '$2y$10$oi6eKa68yOPcZeNFIDfOv.H4F4Yy6AtTwA3rP6tlhvSLfU2ix6mkC', NULL, '[ADMIN_ROLE]', '1', '1', 4, '2020-12-23 19:18:53', '2020-12-04 05:21:38', NULL, '2020-11-30 06:26:42', '2020-12-23 19:18:53'),
(6, 'obuchi.omotosho@gmail.com', '2020-11-30 22:35:09', '565a2eab0940daa4c00ea83bc9cf1ce582dd2a7c', '1', '$2y$10$03LiG5ipILzRThbbNX1A8O4cxFlnZIgLLHqhwuUPKbaRbwnhvTp6K', NULL, '[ADMIN_ROLE]', '1', '1', 1, '2020-12-04 05:22:16', '2020-12-04 03:05:04', NULL, '2020-11-30 22:35:09', NULL),
(7, 'isaac.john@yahoo.com', '2020-12-03 19:35:45', '4fdda0314bf174ad785199f195a77adf8b10b7cd', '1', '$2y$10$pdUsx4/hazrwHDGbuMoUBuA5V/d88BSoE7UgTbfwe0tHlajWZgMem', NULL, '[ADMIN_ROLE]', '1', '1', 0, NULL, NULL, NULL, '2020-12-03 19:35:45', NULL),
(8, 'godfrey.emmanuel@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[ADMIN_ROLE]', '1', '1', 0, NULL, NULL, NULL, '2020-12-04 06:03:06', NULL),
(9, 'wisdom.amana@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2020-12-04 06:03:06', NULL),
(10, 'debo.williams@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2020-12-04 06:03:06', NULL),
(11, 'chris@ninthbinary.com', '2020-12-14 12:06:25', '642d9e56a634a1093fbf51353c149dea92e1289e', '1', '$2y$10$fqPNeMW6XtaFInJm.mHc1eJGbvYFuKkTB2/TxRIVWzHmci6RAWz8O', NULL, '[CLIENT_ROLE]', '1', '0', 22, '2020-12-22 11:14:16', '2020-12-21 11:45:02', NULL, '2020-12-11 12:43:02', '2020-12-22 11:14:16'),
(12, 'jamal.diwa@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[CSE_ROLE]', '1', '0', 8, '2020-12-22 08:47:24', '2020-12-19 10:13:40', NULL, '2020-12-04 06:03:06', '2020-12-22 08:47:24'),
(13, 'mayowabenedict@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[CSE_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2020-12-04 06:03:06', NULL),
(14, 'andrew.nwankwo@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[TECHNICIAN_ROLE]', '1', '0', 1, '2020-12-17 09:17:14', '2020-12-17 09:17:14', NULL, '2020-12-04 06:03:06', NULL),
(15, 'taofeek.adedokun@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[TECHNICIAN_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2020-12-04 06:03:06', NULL),
(19, 'nnamdi.favour@yahoo.com', '2020-12-18 13:03:16', '3d08886310a72ef0fc0c208cd284fa79c9a82c50', '1', '$2y$10$Vo7etNylNWzJ3DMafi7kTuCfWe7qEkvPkJPGBYy6q4jJ26lnMKLG.', NULL, '[CSE_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2020-12-18 13:03:16', NULL),
(23, 'desmond.john@outlook.co.uk', '2020-12-19 21:26:29', 'b6b463cdd2a85be2742d37f500dc10f4d67e8368', '1', '$2y$10$Rxe6TJzIiztAaOewBTr.pehGQrl/qoRbwia/OXQ8gOUVMV8yqAoP2', NULL, '[TECHNICIAN_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2020-12-19 21:26:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
CREATE TABLE IF NOT EXISTS `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wallets_user_id_unique` (`user_id`),
  UNIQUE KEY `wallets_wallet_id_unique` (`wallet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `wallet_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, 11, 'WAL-23782382', 0, NULL, NULL),
(2, 9, 'WAL-21780953', 45000, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `names` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD CONSTRAINT `admin_permissions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_ibfk_3` FOREIGN KEY (`lga_id`) REFERENCES `lgas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_ibfk_4` FOREIGN KEY (`profession_id`) REFERENCES `professions` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `cses`
--
ALTER TABLE `cses`
  ADD CONSTRAINT `cses_ibfk_2` FOREIGN KEY (`lga_id`) REFERENCES `lgas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cses_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cses_ibfk_4` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cses_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cses_ibfk_6` FOREIGN KEY (`created_by`) REFERENCES `names` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `cse_category`
--
ALTER TABLE `cse_category`
  ADD CONSTRAINT `cse_category_ibfk_1` FOREIGN KEY (`cse_id`) REFERENCES `cses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cse_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lgas`
--
ALTER TABLE `lgas`
  ADD CONSTRAINT `lgas_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `location_and_browser_infos`
--
ALTER TABLE `location_and_browser_infos`
  ADD CONSTRAINT `location_and_browser_infos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `names`
--
ALTER TABLE `names`
  ADD CONSTRAINT `names_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD CONSTRAINT `service_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_requests_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_requests_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_requests_ibfk_4` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_requests_ibfk_5` FOREIGN KEY (`technician_id`) REFERENCES `technicians` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_requests_ibfk_6` FOREIGN KEY (`cse_id`) REFERENCES `cses` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_requests_ibfk_7` FOREIGN KEY (`service_request_status_id`) REFERENCES `service_request_statuses` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `service_request_details`
--
ALTER TABLE `service_request_details`
  ADD CONSTRAINT `service_request_details_ibfk_1` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_details_ibfk_2` FOREIGN KEY (`lga_id`) REFERENCES `lgas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_details_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `service_request_progress`
--
ALTER TABLE `service_request_progress`
  ADD CONSTRAINT `service_request_progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_progress_ibfk_2` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_progress_ibfk_3` FOREIGN KEY (`service_request_status_id`) REFERENCES `service_request_statuses` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD CONSTRAINT `super_admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `technicians`
--
ALTER TABLE `technicians`
  ADD CONSTRAINT `technicians_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `technicians_ibfk_2` FOREIGN KEY (`lga_id`) REFERENCES `lgas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `technicians_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `technicians_ibfk_4` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `technicians_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `names` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tool_inventories`
--
ALTER TABLE `tool_inventories`
  ADD CONSTRAINT `tool_inventories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tool_requests`
--
ALTER TABLE `tool_requests`
  ADD CONSTRAINT `tool_requests_ibfk_1` FOREIGN KEY (`tool_requests_batch_id`) REFERENCES `tool_request_batches` (`batch_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tool_requests_ibfk_2` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tool_requests_ibfk_3` FOREIGN KEY (`requested_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tool_requests_ibfk_4` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
