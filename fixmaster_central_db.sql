-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2021 at 04:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Payment','Request','Others','Login','Logout','Profile','Errors','Unauthorized') COLLATE utf8mb4_unicode_ci NOT NULL,
  `severity` enum('Informational','Warning','Error') COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller_action_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(221, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:22:54(hrs:min:ss).', '2020-12-24 06:03:54'),
(222, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-25 22:12:07'),
(223, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 02:10:38(hrs:min:ss).', '2020-12-26 00:22:45'),
(224, 6, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Obuchi Omotosho logged in.', '2020-12-26 00:22:58'),
(225, 6, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\AdminRequestController@assignCSETechnician', 'http://localhost:8000/admin/requests/assign-cse-technician/1', 'Obuchi Omotosho assigned Godrey Diwa(CSE) and Taofeek Adedokun  to REF-66EB5A26 job', '2020-12-27 17:34:15'),
(226, 6, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Obuchi Omotosho logged out with a session duration of 02:41:34(hrs:min:ss).', '2020-12-26 03:04:32'),
(228, 5, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'David Akinsola logged out with a session duration of 21:16:07(hrs:min:ss).', '2020-12-27 17:35:00'),
(229, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-27 22:08:09'),
(230, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 02:56:04(hrs:min:ss).', '2020-12-28 01:04:13'),
(231, 5, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'David Akinsola logged in.', '2020-12-28 04:15:45'),
(232, 5, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\AdminRequestController@updateOngoingProgress', 'http://localhost:8000/admin/requests/ongoing/update', 'David Akinsola updated REF-66EB5A26 job.', '2020-12-28 16:58:54'),
(233, 5, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'David Akinsola logged out with a session duration of 13:21:33(hrs:min:ss).', '2020-12-28 17:37:18'),
(234, 6, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Obuchi Omotosho logged in.', '2020-12-28 18:59:44'),
(235, 6, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Obuchi Omotosho logged out with a session duration of 04:22:29(hrs:min:ss).', '2020-12-28 23:22:13'),
(236, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-29 10:48:00'),
(237, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ToolsInventoryController@store', 'http://localhost:8000/admin/tools-inventory/store', 'NinthBinary Developer added Demo Tool to Tools Inventory', '2020-12-29 12:48:36'),
(238, 1, '127.0.0.1', 'Errors', 'Error', 'App\\Http\\Controllers\\ToolsRequestController@approveRequest', 'http://localhost:8000/admin/tools-request/approve/1', 'An error occurred when NinthBinary Developer was trying to approve Tools request with Bacth number: TRF-C85BEA04.', '2020-12-29 15:01:11'),
(239, 1, '127.0.0.1', 'Errors', 'Error', 'App\\Http\\Controllers\\ToolsRequestController@approveRequest', 'http://localhost:8000/admin/tools-request/approve/1', 'An error occurred when NinthBinary Developer was trying to approve Tools request with Bacth number: TRF-C85BEA04.', '2020-12-29 15:02:30'),
(240, 1, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ToolsRequestController@approveRequest', 'http://localhost:8000/admin/tools-request/approve/1', 'NinthBinary Developer approved Tools request with Bacth number: TRF-C85BEA04.', '2020-12-29 15:06:08'),
(241, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServiceRequestStatusController@store', 'http://localhost:8000/admin/utilities/service-request-status/store', 'NinthBinary Developer created \"Demo23\" Service Request Status', '2020-12-29 15:14:19'),
(242, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServiceRequestStatusController@update', 'http://localhost:8000/admin/utilities/service-request-status/update/7', 'NinthBinary Developer renamed Demo23 service request status to Demo23', '2020-12-29 15:14:28'),
(243, 1, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ServiceRequestStatusController@delete', 'http://localhost:8000/admin/utilities/service-request-status/delete/7', 'NinthBinary Developer deleted Demo23fddf service request status.', '2020-12-29 15:14:34'),
(244, 1, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ToolsRequestController@returnToolsRequested', 'http://localhost:8000/admin/tools-request/return/1', 'NinthBinary Developer marked Tools request with Bacth number: TRF-C85BEA04 as returned.', '2020-12-29 15:21:47'),
(245, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-29 17:18:59'),
(246, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-29 19:55:46'),
(247, 1, '127.0.0.1', 'Profile', 'Informational', 'App\\Http\\Controllers\\UtilityController@resetPassword', 'http://localhost:8000/admin/users/utilities/reset-password', 'NinthBinary Developer changed mayowabenedict@gmail.com password.', '2020-12-29 20:11:23'),
(248, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 02:07:31(hrs:min:ss).', '2020-12-29 22:03:17'),
(249, 5, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'David Akinsola logged in.', '2020-12-29 22:03:29'),
(250, 5, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'David Akinsola logged out with a session duration of 02:21:26(hrs:min:ss).', '2020-12-30 00:24:55'),
(251, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2020-12-30 08:17:30'),
(252, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 02:07:43(hrs:min:ss).', '2020-12-30 10:25:12'),
(253, 6, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Obuchi Omotosho logged in.', '2020-12-30 10:25:26'),
(254, 6, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\AdminRequestController@assignCSETechnician', 'http://localhost:8000/admin/requests/assign-cse-technician/5', 'Obuchi Omotosho assigned Favour Nnamdi(CSE) and Taofeek Adedokun  to REF-27D2F0BE job', '2020-12-30 10:30:19'),
(255, 6, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Obuchi Omotosho logged out with a session duration of 01:58:08(hrs:min:ss).', '2020-12-30 12:23:34'),
(256, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-01 06:02:31'),
(257, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:06:22(hrs:min:ss).', '2021-01-01 06:08:53'),
(258, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-01 06:09:04'),
(259, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:06:49(hrs:min:ss).', '2021-01-01 06:15:53'),
(260, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-01 06:16:04'),
(261, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'http://localhost:8000/client/requests/update/7', 'Adekola Adeleke updated REF-131D985E service request.', '2021-01-01 08:38:18'),
(262, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'http://localhost:8000/client/requests/update/7', 'Adekola Adeleke updated REF-131D985E service request.', '2021-01-01 08:42:03'),
(263, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-01 11:52:29'),
(264, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 04:02:13(hrs:min:ss).', '2021-01-01 15:54:42'),
(265, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-01 15:54:57'),
(266, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:05:24(hrs:min:ss).', '2021-01-01 16:00:21'),
(267, 2, '127.0.0.1', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'An Unknown Intruder attempted to login with (chris@ninthbinary.com and admin12334).', '2021-01-01 16:06:59'),
(268, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-01 16:11:17'),
(269, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:06:55(hrs:min:ss).', '2021-01-01 16:18:12'),
(270, 2, '127.0.0.1', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'An Unknown Intruder attempted to login with (chris@ninthbinary.com and admin1234).', '2021-01-01 16:18:32'),
(271, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-01 16:18:42'),
(272, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:00:25(hrs:min:ss).', '2021-01-01 16:19:07'),
(273, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-01 16:19:36'),
(274, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 01:13:20(hrs:min:ss).', '2021-01-01 17:32:56'),
(275, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-01 17:33:06'),
(276, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:43:32(hrs:min:ss).', '2021-01-01 18:16:38'),
(277, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-01 22:20:45'),
(278, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:00:12(hrs:min:ss).', '2021-01-01 22:20:57'),
(279, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-01 22:23:38'),
(280, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:00:36(hrs:min:ss).', '2021-01-01 22:24:14'),
(281, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-01 22:25:41'),
(282, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:00:59(hrs:min:ss).', '2021-01-01 22:26:40'),
(283, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-01 22:26:57'),
(284, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 04:22:41(hrs:min:ss).', '2021-01-02 02:49:38'),
(285, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-02 02:49:48'),
(286, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-02 06:11:56'),
(287, 11, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ClientMessagingController@sendMessage', 'http://localhost:8000/client/messages', 'Adekola Adeleke sent a message to Favour Nnamdi', '2021-01-02 06:43:37'),
(288, 11, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ClientMessagingController@sendMessage', 'http://localhost:8000/client/messages', 'Adekola Adeleke sent a message to Favour Nnamdi', '2021-01-02 06:45:32'),
(289, 11, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ClientMessagingController@sendMessage', 'http://localhost:8000/client/messages', 'Adekola Adeleke sent a message to Favour Nnamdi', '2021-01-02 06:56:55'),
(290, 11, '127.0.0.1', 'Others', 'Informational', 'App\\Http\\Controllers\\ClientMessagingController@sendMessage', 'http://localhost:8000/client/messages', 'Adekola Adeleke sent a message to FixMaster', '2021-01-02 07:03:06'),
(291, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@markRequestAsCompleted', 'http://localhost:8000/client/requests/completed/1', 'Adekola Adeleke marked REF-66EB5A26 as completed', '2021-01-02 11:22:26'),
(292, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 05:16:12(hrs:min:ss).', '2021-01-02 11:28:08'),
(293, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-02 11:28:16'),
(294, 1, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\AdminRequestController@markRequestAsCompleted', 'http://localhost:8000/admin/requests/ongoing/completed/5', 'NinthBinary Developer marked REF-27D2F0BE as completed', '2021-01-02 11:54:18'),
(295, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 01:13:28(hrs:min:ss).', '2021-01-02 12:41:44'),
(296, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-02 12:41:55'),
(297, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'http://localhost:8000/client/requests/cancel/7', 'Adekola Adeleke cancelled REF-131D985E service request.', '2021-01-02 13:01:24'),
(298, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:24:16(hrs:min:ss).', '2021-01-02 13:06:11'),
(299, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-02 13:26:56'),
(300, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:03:46(hrs:min:ss).', '2021-01-02 13:30:42'),
(301, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-02 13:30:54'),
(302, 1, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\AdminRequestController@updateOngoingProgress', 'http://localhost:8000/admin/requests/ongoing/update', 'NinthBinary Developer updated REF-66EB5A26 job.', '2021-01-02 14:55:16'),
(303, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 01:25:10(hrs:min:ss).', '2021-01-02 14:56:04'),
(304, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-02 14:56:16'),
(305, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 00:16:52(hrs:min:ss).', '2021-01-02 15:13:08'),
(306, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-02 15:13:18'),
(307, 1, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\AdminRequestController@updateOngoingProgress', 'http://localhost:8000/admin/requests/ongoing/update', 'NinthBinary Developer updated REF-66EB5A26 job.', '2021-01-02 15:38:30'),
(308, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:50:20(hrs:min:ss).', '2021-01-02 16:03:38'),
(309, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-02 16:03:49'),
(310, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:00:08(hrs:min:ss).', '2021-01-02 16:03:57'),
(311, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-02 16:04:05'),
(312, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'http://localhost:8000/client/services/quote/store', 'Adekola Adeleke requested Computer & Laptops service', '2021-01-02 18:51:26'),
(313, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 02:48:20(hrs:min:ss).', '2021-01-02 18:52:25'),
(314, 11, '197.210.8.206', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-02 19:47:04'),
(315, 11, '197.210.8.206', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://temp.homefix.ng/logout', 'Adekola Adeleke logged out with a session duration of 00:00:47(hrs:min:ss).', '2021-01-02 19:47:51'),
(316, 1, '197.210.8.206', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-02 19:48:29'),
(317, 1, '197.210.8.206', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://temp.homefix.ng/logout', 'NinthBinary Developer logged out with a session duration of 00:01:19(hrs:min:ss).', '2021-01-02 19:49:48'),
(318, 24, '197.210.52.136', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Funmilayo Ogunsulire(1prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 02:42:28'),
(319, 24, '197.210.53.207', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'Funmilayo Ogunsulire attempted to login with a deactivated account E-Mail(1prospect1Fab1test@gmail.com).', '2021-01-04 03:52:30'),
(320, 24, '197.210.76.55', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'Funmilayo Ogunsulire attempted to login with a deactivated account E-Mail(1prospect1Fab1test@gmail.com).', '2021-01-04 03:53:58'),
(321, 24, '197.210.53.207', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'Funmilayo Ogunsulire attempted to login with a deactivated account E-Mail(1prospect1Fab1test@gmail.com).', '2021-01-04 03:56:25'),
(322, 25, '141.143.213.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Boluwatife Ogunwale(17prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 04:57:46'),
(323, 26, '141.143.213.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Sola Ogunwale(18prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 05:30:18'),
(324, 27, '141.143.213.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Abike Ogunwale(19prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 06:07:30'),
(325, 28, '197.210.77.93', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Oyinlola Adewale(3prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 06:15:54'),
(326, 29, '197.210.52.110', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Titilayo Owoyele(4prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 06:20:40'),
(327, 30, '197.210.52.110', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'salewa Sowore(5prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 06:38:00'),
(328, 31, '197.210.53.207', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Funke Ogunwusi(6prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 07:02:59'),
(329, 32, '197.210.77.93', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Folake Adegbenro(7prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 07:05:59'),
(330, 33, '197.210.77.93', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Foluke Omoworare(8prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 07:09:19'),
(331, 34, '197.210.53.209', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Olafadeke Ranmilowo(9prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 07:35:57'),
(332, 35, '197.210.53.209', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Olabisi Ogunsakin(10prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 07:38:36'),
(333, 36, '197.210.53.207', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Folorunsho Alakija(11prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 07:41:34'),
(334, 37, '197.210.76.216', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Folusho Alalubosa(12prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 07:45:54'),
(335, 38, '197.210.53.209', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Omotara Elegushi(13prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 07:52:30'),
(336, 39, '197.210.77.93', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Yinka Fakayode(14prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 07:55:40'),
(337, 40, '197.210.77.86', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Yemisi Ibrahim(15prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 07:58:20'),
(338, 41, '197.210.52.110', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Oluwaseun Akintade(16prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 08:00:47'),
(339, 42, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akinfe Abiodun(33prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 09:48:09'),
(340, 43, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Jide Omoworare(34prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 10:02:44'),
(341, 44, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akinruntan Akinsalejo(46prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 10:20:09'),
(342, 43, '105.112.43.246', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Jide Omoworare attempted to login with a deactivated account E-Mail(34prospect1Fab1test@gmail.com).', '2021-01-04 10:26:14'),
(343, 2, '105.112.43.246', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'An Unknown Intruder attempted to login with (33prospect1Fab1test@gmail.com and 1prospect1Fab1test102).', '2021-01-04 10:26:57'),
(344, 44, '197.210.65.74', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Akinruntan Akinsalejo attempted to login with a deactivated account E-Mail(46prospect1Fab1test@gmail.com).', '2021-01-04 10:28:36'),
(345, 44, '197.210.65.74', 'Login', 'Warning', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Akinruntan Akinsalejo attempted to login with a deactivated account E-Mail(46prospect1Fab1test@gmail.com).', '2021-01-04 10:29:10'),
(346, 45, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Sule Gumel(35prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 11:36:13'),
(347, 46, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Gani Okorodudu(36prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 12:00:07'),
(348, 47, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Ilemobayo Banire(37prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 12:03:27'),
(349, 48, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Lookman Agagu(38prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 12:11:01'),
(350, 49, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Gbenga Agagu(39prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 12:35:27'),
(351, 50, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Tayo Agagu(40prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 12:43:14'),
(352, 51, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Ayobami Agagu(41prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 12:47:24'),
(353, 52, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akinfela Akinsalejo(47prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 12:50:39'),
(354, 53, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akinwolemiwa Akinsalejo(42prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 12:51:19'),
(355, 54, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akingbemiga Akinsalejo(43prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 12:56:41'),
(356, 55, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Oluwasegun Amusan(48prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 12:58:22'),
(357, 56, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Albert Ibhareboi(49prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:00:10'),
(358, 57, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Uyi Esuare(50prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:22:20'),
(359, 58, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Adesina Kalejaiye(51prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:24:15'),
(360, 59, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Gbolahan Ogedengbe(52prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:27:08'),
(361, 60, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Olakunle Ogunmodede(53prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:28:55'),
(362, 61, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Sofola Ogunmodede(54prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:31:41'),
(363, 62, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Ajinde Ajanaku(55prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:33:24'),
(364, 63, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Alawiye Ajanaku(56prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:35:11'),
(365, 64, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Ikodede Ajanaku(57prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:36:39'),
(366, 65, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akindemi Okolo(58prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:39:19'),
(367, 66, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Aina Melaye(59prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:40:46'),
(368, 67, '197.210.65.74', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Buchy Olufemi(60prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:43:00'),
(369, 68, '105.112.43.246', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akinfemitan Akinsalejo(45prospect1Fab1test@gmail.com) account was registered successfully.', '2021-01-04 13:45:46'),
(370, 69, '102.89.1.68', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Folajimi Adesanya(krissmn1+@gmail.com) account was registered successfully.', '2021-01-04 15:06:18'),
(371, 2, '102.89.1.68', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'An Unknown Intruder attempted to login with (krissmn1@gmail.com and kriston1234).', '2021-01-04 15:06:34'),
(372, 2, '102.89.0.226', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'An Unknown Intruder attempted to login with (krissmn1@gmail.com and kriston1234).', '2021-01-04 15:07:59'),
(373, 1, '102.89.3.121', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-04 15:10:57'),
(374, 70, '102.89.0.200', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'http://temp.homefix.ng/register', 'Folajimi Adesanya(info@ninthbinary.com) account was registered successfully.', '2021-01-04 15:12:12'),
(375, 70, '102.89.1.68', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'Folajimi Adesanya logged in.', '2021-01-04 15:12:30'),
(376, 70, '102.89.1.60', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://temp.homefix.ng/logout', 'Folajimi Adesanya logged out with a session duration of 00:03:00(hrs:min:ss).', '2021-01-04 15:15:30'),
(377, 69, '102.89.1.60', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'Folajimi Adesanya logged in.', '2021-01-04 15:15:50'),
(378, 1, '102.89.3.153', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://temp.homefix.ng/logout', 'NinthBinary Developer logged out with a session duration of 00:07:14(hrs:min:ss).', '2021-01-04 15:18:11'),
(379, 11, '154.113.72.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://test.homefix.ng/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-05 08:21:29'),
(380, 11, '154.113.72.58', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://test.homefix.ng/logout', 'Adekola Adeleke logged out with a session duration of 00:06:09(hrs:min:ss).', '2021-01-05 08:27:38'),
(381, 11, '154.113.72.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://test.homefix.ng/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-05 08:30:45'),
(382, 11, '154.113.72.58', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://test.homefix.ng/logout', 'Adekola Adeleke logged out with a session duration of 00:00:13(hrs:min:ss).', '2021-01-05 08:30:58'),
(383, 11, '154.113.72.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://test.homefix.ng/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-05 08:31:39'),
(384, 11, '154.113.72.58', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://test.homefix.ng/logout', 'Adekola Adeleke logged out with a session duration of 00:01:18(hrs:min:ss).', '2021-01-05 08:32:57'),
(385, 11, '154.113.72.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://test.homefix.ng/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-05 08:33:35'),
(386, 11, '154.113.72.58', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://test.homefix.ng/logout', 'Adekola Adeleke logged out with a session duration of 01:17:43(hrs:min:ss).', '2021-01-05 09:51:18'),
(387, 1, '154.113.72.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://test.homefix.ng/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-05 09:51:36'),
(388, 1, '154.113.72.58', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://test.homefix.ng/logout', 'NinthBinary Developer logged out with a session duration of 00:00:01(hrs:min:ss).', '2021-01-05 09:51:37'),
(389, 71, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Ireti Dauda(Davidfap1testClient1@fixmaster.com.ng) account was registered successfully.', '2021-01-05 09:51:51'),
(390, 1, '154.113.72.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://test.homefix.ng/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-05 09:52:03'),
(391, 72, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Salami Bello(Davidfap1testClient2@fixmaster.com.ng) account was registered successfully.', '2021-01-05 09:58:11'),
(392, 1, '154.113.72.58', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://test.homefix.ng/logout', 'NinthBinary Developer logged out with a session duration of 00:06:37(hrs:min:ss).', '2021-01-05 09:58:40'),
(393, 73, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Olusola Akinruntan(Davidfap1testClient3@fixmaster.com.ng) account was registered successfully.', '2021-01-05 10:10:17'),
(394, 74, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Emmanuela Eze - Ego(Davidfap1testClient4@fixmaster.com.ng) account was registered successfully.', '2021-01-05 10:18:12'),
(395, 75, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Chriatiana Nnwayawun(Davidfap1testClient5@fixmaster.com.ng) account was registered successfully.', '2021-01-05 10:19:57'),
(396, 2, '105.112.47.146', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'An Unknown Intruder attempted to login with (Buchyefap1testClient1@fixmaster.com.ng and testtest).', '2021-01-05 10:31:13'),
(397, 2, '105.112.47.146', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'An Unknown Intruder attempted to login with (Buchyefap1testClient1@fixmaster.com.ng and testtest).', '2021-01-05 10:31:46'),
(399, 77, '105.112.47.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Ademola Makinde(Buchyefap1testClient1@fixmaster.com.ng) account was registered successfully.', '2021-01-05 10:35:33'),
(400, 77, '105.112.47.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Ademola Makinde logged in.', '2021-01-05 10:35:48'),
(401, 77, '105.112.47.146', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Ademola Makinde logged out with a session duration of 00:00:36(hrs:min:ss).', '2021-01-05 10:36:24'),
(402, 78, '105.112.47.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Francis Coker(Buchyefap1testClient2@fixmaster.com.ng) account was registered successfully.', '2021-01-05 10:38:45'),
(403, 79, '105.112.47.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Mercy Johnson(Buchyefap1testClient3@fixmaster.com.ng) account was registered successfully.', '2021-01-05 10:40:54'),
(404, 80, '105.112.47.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Ademola Ebute(Buchyefap1testClient4@fixmaster.com.ng) account was registered successfully.', '2021-01-05 10:43:15'),
(405, 81, '105.112.47.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Etinosa Aigbe(Buchyefap1testClient5@fixmaster.com.ng) account was registered successfully.', '2021-01-05 10:45:28'),
(407, 2, '105.112.47.146', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'An Unknown Intruder attempted to login with (Buchyefap1testClient1@fixmaster.com.ng and 1prospect1Fab1test129).', '2021-01-05 10:51:33'),
(408, 77, '105.112.47.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Ademola Makinde logged in.', '2021-01-05 10:52:25'),
(409, 77, '105.112.47.146', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Ademola Makinde updated his profile avatar', '2021-01-05 10:54:48'),
(410, 77, '105.112.47.146', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Ademola Makinde updated his profile', '2021-01-05 10:55:43'),
(411, 77, '105.112.47.146', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Ademola Makinde logged out with a session duration of 00:03:36(hrs:min:ss).', '2021-01-05 10:56:01'),
(412, 78, '105.112.47.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Francis Coker logged in.', '2021-01-05 10:57:08'),
(413, 78, '105.112.47.146', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Francis Coker updated his profile avatar', '2021-01-05 10:59:54'),
(414, 78, '105.112.47.146', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Francis Coker updated his profile', '2021-01-05 11:00:30'),
(415, 78, '105.112.47.146', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Francis Coker logged out with a session duration of 00:03:39(hrs:min:ss).', '2021-01-05 11:00:47'),
(416, 79, '105.112.47.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Mercy Johnson logged in.', '2021-01-05 11:01:23'),
(417, 79, '105.112.47.146', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Mercy Johnson updated her profile avatar', '2021-01-05 11:02:12');
INSERT INTO `activity_logs` (`id`, `user_id`, `ip_address`, `type`, `severity`, `action_url`, `controller_action_path`, `message`, `created_at`) VALUES
(418, 79, '105.112.47.146', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Mercy Johnson updated her profile', '2021-01-05 11:02:40'),
(419, 79, '105.112.47.146', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Mercy Johnson logged out with a session duration of 00:01:36(hrs:min:ss).', '2021-01-05 11:02:59'),
(420, 80, '105.112.47.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Ademola Ebute logged in.', '2021-01-05 11:03:21'),
(421, 80, '105.112.47.146', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Ademola Ebute updated his profile avatar', '2021-01-05 11:03:54'),
(422, 80, '105.112.47.146', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Ademola Ebute updated his profile', '2021-01-05 11:04:44'),
(423, 80, '105.112.47.146', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Ademola Ebute logged out with a session duration of 00:01:36(hrs:min:ss).', '2021-01-05 11:04:57'),
(424, 81, '105.112.47.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Etinosa Aigbe logged in.', '2021-01-05 11:05:34'),
(425, 81, '105.112.47.146', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Etinosa Aigbe updated her profile', '2021-01-05 11:06:52'),
(426, 81, '105.112.47.146', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Etinosa Aigbe updated her profile avatar', '2021-01-05 11:07:20'),
(427, 81, '105.112.47.146', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Etinosa Aigbe logged out with a session duration of 00:01:59(hrs:min:ss).', '2021-01-05 11:07:33'),
(429, 71, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Ireti Dauda logged in.', '2021-01-05 11:46:56'),
(430, 71, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Ireti Dauda updated his profile', '2021-01-05 11:53:07'),
(431, 71, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Ireti Dauda updated his profile avatar', '2021-01-05 11:58:41'),
(432, 71, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Ireti Dauda updated his profile avatar', '2021-01-05 12:01:24'),
(433, 71, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Ireti Dauda updated his profile avatar', '2021-01-05 12:02:11'),
(435, 71, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Ireti Dauda updated his profile', '2021-01-05 12:45:44'),
(436, 71, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Ireti Dauda updated his profile', '2021-01-05 12:49:00'),
(437, 71, '197.210.65.184', 'Others', 'Informational', 'App\\Http\\Controllers\\ClientMessagingController@sendMessage', 'https://temp.homefix.ng/client/messages', 'Ireti Dauda sent a message to FixMaster Management', '2021-01-05 13:02:38'),
(438, 77, '105.112.153.170', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Ademola Makinde logged in.', '2021-01-05 13:33:13'),
(439, 77, '105.112.153.118', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Demola Mhakinde updated his profile', '2021-01-05 13:42:47'),
(440, 77, '105.112.153.118', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Demola Mhakinde updated his profile avatar', '2021-01-05 13:45:26'),
(441, 77, '105.112.153.118', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Demola Mhakinde requested Dish & Washing Machine service', '2021-01-05 14:04:48'),
(443, 77, '105.112.153.118', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Demola Mhakinde requested Dish & Washing Machine service', '2021-01-05 14:11:54'),
(444, 71, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Ireti Dauda requested Computer & Laptops service', '2021-01-05 14:19:11'),
(445, 77, '105.112.153.118', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Demola Mhakinde requested Dish & Washing Machine service', '2021-01-05 14:21:55'),
(446, 77, '105.112.153.118', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Demola Mhakinde logged out with a session duration of 00:59:05(hrs:min:ss).', '2021-01-05 14:32:18'),
(447, 77, '105.112.153.118', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Demola Mhakinde logged in.', '2021-01-05 14:32:40'),
(448, 77, '105.112.153.118', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Demola Mhakinde requested Dish & Washing Machine service', '2021-01-05 14:34:47'),
(449, 77, '105.112.153.118', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Demola Mhakinde requested Computer & Laptops service', '2021-01-05 15:07:46'),
(450, 77, '105.112.153.118', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/14', 'Demola Mhakinde cancelled REF-52AF6E61 service request.', '2021-01-05 15:10:07'),
(451, 77, '105.112.153.118', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/11', 'Demola Mhakinde cancelled REF-473E6826 service request.', '2021-01-05 15:11:45'),
(452, 77, '105.112.153.118', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Demola Mhakinde logged out with a session duration of 00:40:05(hrs:min:ss).', '2021-01-05 15:12:45'),
(453, 78, '105.112.153.118', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Francis Coker logged in.', '2021-01-05 15:13:59'),
(454, 71, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Ireti Dauda requested Dish & Washing Machine service', '2021-01-05 15:14:27'),
(455, 78, '105.112.153.118', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Frank Brown-Coker updated his profile', '2021-01-05 15:15:02'),
(456, 78, '105.112.153.118', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Frank Brown-Coker updated his profile avatar', '2021-01-05 15:15:37'),
(457, 78, '105.112.153.118', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Frank Brown-Coker logged out with a session duration of 00:01:52(hrs:min:ss).', '2021-01-05 15:15:51'),
(458, 79, '105.112.153.118', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Mercy Johnson logged in.', '2021-01-05 15:16:15'),
(459, 71, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Ireti Dauda requested Dish & Washing Machine service', '2021-01-05 15:17:16'),
(460, 79, '105.112.153.118', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Candy Mercy updated her profile', '2021-01-05 15:17:30'),
(461, 79, '105.112.153.118', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Candy Mercy updated her profile avatar', '2021-01-05 15:21:09'),
(462, 79, '105.112.153.118', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Candy Mercy logged out with a session duration of 00:05:07(hrs:min:ss).', '2021-01-05 15:21:22'),
(463, 80, '105.112.153.118', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Ademola Ebute logged in.', '2021-01-05 15:21:50'),
(464, 80, '105.112.153.118', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Craig Ebute updated his profile', '2021-01-05 15:23:59'),
(465, 80, '105.112.153.118', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Craig Ebute logged out with a session duration of 00:03:06(hrs:min:ss).', '2021-01-05 15:24:56'),
(466, 81, '105.112.153.118', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Etinosa Aigbe logged in.', '2021-01-05 15:25:17'),
(467, 81, '105.112.153.118', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Etinosa Aigbe updated her profile avatar', '2021-01-05 15:25:54'),
(468, 81, '105.112.153.118', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Etinosa Makinwa updated her profile', '2021-01-05 15:27:18'),
(469, 71, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Ireti Dauda requested Drainage, Shower, Soak-Away service', '2021-01-05 15:49:42'),
(470, 71, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Ireti Dauda requested Bath-Tubs, Pipes, Kitchen Sink service', '2021-01-05 15:59:51'),
(471, 71, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Ireti Dauda requested Computer & Laptops service', '2021-01-05 16:04:21'),
(472, 71, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Ireti Dauda requested Computer & Laptops service', '2021-01-05 16:05:43'),
(473, 71, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/24', 'Ireti Dauda cancelled REF-5B02030C service request.', '2021-01-05 16:40:00'),
(474, 71, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/16', 'Ireti Dauda cancelled REF-4CBA5AB0 service request.', '2021-01-05 16:46:37'),
(475, 71, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/23', 'Ireti Dauda updated REF-48FCCAF7 service request.', '2021-01-05 16:59:29'),
(476, 71, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/20', 'Ireti Dauda updated REF-CBE87860 service request.', '2021-01-05 17:06:45'),
(477, 71, '197.210.65.184', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Ireti Dauda logged out with a session duration of 05:20:27(hrs:min:ss).', '2021-01-05 17:07:23'),
(478, 72, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Salami Bello logged in.', '2021-01-05 17:11:43'),
(479, 72, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Salami Bello updated his profile avatar', '2021-01-05 17:12:17'),
(480, 72, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Salami Bello updated his profile', '2021-01-05 17:13:22'),
(481, 72, '197.210.65.184', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Salami Bello logged out with a session duration of 00:02:03(hrs:min:ss).', '2021-01-05 17:13:46'),
(482, 73, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Olusola Akinruntan logged in.', '2021-01-05 17:14:13'),
(483, 73, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Olusola Akinruntan updated his profile avatar', '2021-01-05 17:14:43'),
(484, 73, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Olusola Akinruntan updated his profile', '2021-01-05 17:15:21'),
(485, 73, '197.210.65.184', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Olusola Akinruntan logged out with a session duration of 00:01:21(hrs:min:ss).', '2021-01-05 17:15:34'),
(486, 74, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Emmanuela Eze - Ego logged in.', '2021-01-05 17:15:57'),
(487, 74, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Emmanuela Eze - Ego updated her profile', '2021-01-05 17:16:21'),
(488, 74, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Emmanuela Eze - Ego updated her profile avatar', '2021-01-05 17:16:44'),
(489, 74, '197.210.65.184', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Emmanuela Eze - Ego logged out with a session duration of 00:00:55(hrs:min:ss).', '2021-01-05 17:16:52'),
(490, 75, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Chriatiana Nnwayawun logged in.', '2021-01-05 17:17:15'),
(491, 75, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateAvatar', 'https://temp.homefix.ng/client/settings/update-avatar', 'Chriatiana Nnwayawun updated her profile avatar', '2021-01-05 17:18:08'),
(492, 75, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Chriatiana Nnwayawun updated her profile', '2021-01-05 17:18:40'),
(493, 75, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Chriatiana Nnwayawun updated her profile', '2021-01-05 17:21:43'),
(494, 75, '197.210.65.184', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Chriatiana Nnwayawun logged out with a session duration of 00:08:16(hrs:min:ss).', '2021-01-05 17:25:31'),
(495, 72, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Salami Bello logged in.', '2021-01-05 17:30:44'),
(496, 72, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Salami Bello updated his profile', '2021-01-05 17:44:57'),
(497, 81, '105.112.153.196', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Etinosa Makinwa logged in.', '2021-01-05 17:48:27'),
(498, 81, '105.112.153.196', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Etinosa Makinwa requested Computer & Laptops service', '2021-01-05 17:51:29'),
(499, 81, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Etinosa Makinwa requested Computer & Laptops service', '2021-01-05 17:52:52'),
(500, 81, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Etinosa Makinwa requested Computer & Laptops service', '2021-01-05 17:53:37'),
(501, 81, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/29', 'Etinosa Makinwa cancelled REF-781E7707 service request.', '2021-01-05 17:54:18'),
(502, 81, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/27', 'Etinosa Makinwa cancelled REF-946C9191 service request.', '2021-01-05 17:54:39'),
(503, 81, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/26', 'Etinosa Makinwa cancelled REF-E4674993 service request.', '2021-01-05 17:54:58'),
(504, 81, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Etinosa Makinwa requested Dish & Washing Machine service', '2021-01-05 17:58:46'),
(505, 81, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Etinosa Makinwa requested Bath-Tubs, Pipes, Kitchen Sink service', '2021-01-05 18:00:46'),
(506, 81, '105.112.42.30', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Etinosa Makinwa logged out with a session duration of 00:12:47(hrs:min:ss).', '2021-01-05 18:01:14'),
(507, 80, '105.112.42.30', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Craig Ebute logged in.', '2021-01-05 18:01:43'),
(508, 80, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Craig Ebute requested Bath-Tubs, Pipes, Kitchen Sink service', '2021-01-05 18:21:05'),
(509, 80, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Craig Ebute requested Drainage, Shower, Soak-Away service', '2021-01-05 18:24:07'),
(510, 80, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Craig Ebute requested Bath-Tubs, Pipes, Kitchen Sink service', '2021-01-05 18:27:26'),
(511, 80, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Craig Ebute requested Computer & Laptops service', '2021-01-05 18:29:01'),
(512, 80, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Craig Ebute requested Dish & Washing Machine service', '2021-01-05 18:31:31'),
(513, 80, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/34', 'Craig Ebute cancelled REF-E602F90D service request.', '2021-01-05 18:32:02'),
(514, 80, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/32', 'Craig Ebute cancelled REF-D5521B5F service request.', '2021-01-05 18:32:50'),
(515, 80, '105.112.42.30', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Craig Ebute logged out with a session duration of 00:31:36(hrs:min:ss).', '2021-01-05 18:33:19'),
(516, 79, '105.112.42.30', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Candy Mercy logged in.', '2021-01-05 18:33:46'),
(517, 79, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Candy Mercy requested Bath-Tubs, Pipes, Kitchen Sink service', '2021-01-05 18:35:39'),
(518, 79, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Candy Mercy requested Drainage, Shower, Soak-Away service', '2021-01-05 18:39:05'),
(519, 79, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Candy Mercy requested Computer & Laptops service', '2021-01-05 18:41:02'),
(520, 79, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Candy Mercy requested Drainage, Shower, Soak-Away service', '2021-01-05 18:44:46'),
(521, 79, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Candy Mercy requested Dish & Washing Machine service', '2021-01-05 18:46:30'),
(522, 79, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/39', 'Candy Mercy cancelled REF-8323A890 service request.', '2021-01-05 18:47:52'),
(523, 79, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/38', 'Candy Mercy cancelled REF-023E2780 service request.', '2021-01-05 18:48:27'),
(524, 79, '105.112.42.30', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Candy Mercy logged out with a session duration of 00:16:33(hrs:min:ss).', '2021-01-05 18:50:19'),
(525, 78, '105.112.42.30', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Frank Brown-Coker logged in.', '2021-01-05 18:50:59'),
(526, 78, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Frank Brown-Coker requested Computer & Laptops service', '2021-01-05 18:52:46'),
(527, 78, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Frank Brown-Coker requested Dish & Washing Machine service', '2021-01-05 18:54:25'),
(528, 78, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Frank Brown-Coker requested Bath-Tubs, Pipes, Kitchen Sink service', '2021-01-05 18:57:09'),
(529, 78, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Frank Brown-Coker requested Dish & Washing Machine service', '2021-01-05 18:59:48'),
(530, 78, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Frank Brown-Coker requested Drainage, Shower, Soak-Away service', '2021-01-05 19:03:31'),
(531, 78, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/46', 'Frank Brown-Coker cancelled REF-05C9D56E service request.', '2021-01-05 19:04:03'),
(532, 78, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/43', 'Frank Brown-Coker cancelled REF-282CB9FB service request.', '2021-01-05 19:04:32'),
(533, 78, '105.112.42.30', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Frank Brown-Coker logged out with a session duration of 00:14:26(hrs:min:ss).', '2021-01-05 19:05:25'),
(534, 77, '105.112.42.30', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Demola Mhakinde logged in.', '2021-01-05 19:05:54'),
(535, 77, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/13', 'Demola Mhakinde updated REF-CFDA9CE8 service request.', '2021-01-05 19:09:00'),
(536, 77, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/15', 'Demola Mhakinde updated REF-42D42C61 service request.', '2021-01-05 19:09:41'),
(537, 77, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/10', 'Demola Mhakinde updated REF-7BEC1F70 service request.', '2021-01-05 19:12:08'),
(538, 77, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/10', 'Demola Mhakinde updated REF-7BEC1F70 service request.', '2021-01-05 19:12:41'),
(539, 77, '105.112.42.30', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Demola Mhakinde logged out with a session duration of 00:07:02(hrs:min:ss).', '2021-01-05 19:12:56'),
(540, 78, '105.112.42.30', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Frank Brown-Coker logged in.', '2021-01-05 19:13:24'),
(541, 78, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/45', 'Frank Brown-Coker updated REF-E7420AB6 service request.', '2021-01-05 19:14:20'),
(542, 78, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/44', 'Frank Brown-Coker updated REF-062960E8 service request.', '2021-01-05 19:14:59'),
(543, 78, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/42', 'Frank Brown-Coker updated REF-BF3FC109 service request.', '2021-01-05 19:16:08'),
(544, 78, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/42', 'Frank Brown-Coker updated REF-BF3FC109 service request.', '2021-01-05 19:19:15'),
(545, 78, '105.112.42.30', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Frank Brown-Coker logged out with a session duration of 00:05:53(hrs:min:ss).', '2021-01-05 19:19:17'),
(546, 79, '105.112.42.30', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Candy Mercy logged in.', '2021-01-05 19:19:37'),
(547, 79, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/41', 'Candy Mercy updated REF-8B6BFB56 service request.', '2021-01-05 19:20:14'),
(548, 79, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/40', 'Candy Mercy updated REF-10B62418 service request.', '2021-01-05 19:20:45'),
(549, 79, '105.112.42.30', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/37', 'Candy Mercy updated REF-A2A3245E service request.', '2021-01-05 19:21:45'),
(550, 79, '105.112.42.30', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Candy Mercy logged out with a session duration of 00:02:23(hrs:min:ss).', '2021-01-05 19:22:00'),
(551, 80, '105.112.42.30', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Craig Ebute logged in.', '2021-01-05 19:22:42'),
(552, 72, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Salami Bello requested Bath-Tubs, Pipes, Kitchen Sink service', '2021-01-05 19:24:59'),
(553, 80, '105.112.53.187', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/36', 'Craig Ebute updated REF-678E7789 service request.', '2021-01-05 19:37:32'),
(554, 80, '105.112.53.187', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/35', 'Craig Ebute updated REF-201D4CDA service request.', '2021-01-05 19:40:45'),
(555, 80, '105.112.53.187', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/33', 'Craig Ebute updated REF-538B2830 service request.', '2021-01-05 19:41:08'),
(556, 80, '105.112.53.187', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Craig Ebute updated his profile', '2021-01-05 19:41:58'),
(557, 80, '105.112.53.187', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Craig Ebute logged out with a session duration of 00:19:26(hrs:min:ss).', '2021-01-05 19:42:08'),
(558, 2, '105.112.53.187', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'An Unknown Intruder attempted to login with (Buchyefap1testClient4@fixmaster.com.ng and 1prospect1Fab1test128).', '2021-01-05 19:42:14'),
(559, 81, '105.112.53.187', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Etinosa Makinwa logged in.', '2021-01-05 19:44:13'),
(560, 81, '105.112.53.187', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/31', 'Etinosa Makinwa updated REF-A3EDB578 service request.', '2021-01-05 19:48:40'),
(561, 81, '105.112.53.187', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/30', 'Etinosa Makinwa updated REF-93080B0A service request.', '2021-01-05 19:49:40'),
(562, 81, '105.112.53.187', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@update', 'https://temp.homefix.ng/client/requests/update/25', 'Etinosa Makinwa updated REF-F024810F service request.', '2021-01-05 19:51:03'),
(563, 81, '105.112.53.187', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Etinosa Makinwa logged out with a session duration of 00:07:06(hrs:min:ss).', '2021-01-05 19:51:19'),
(564, 72, '197.210.65.184', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Salami Bello logged out with a session duration of 03:13:15(hrs:min:ss).', '2021-01-05 20:43:59'),
(565, 2, '197.210.65.184', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'An Unknown Intruder attempted to login with (Davidfap1testClient2@fixmaster.com.ng and testtest).', '2021-01-06 07:26:02'),
(566, 72, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Salami Bello logged in.', '2021-01-06 07:26:34'),
(567, 72, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Salami Bello requested Computer & Laptops service', '2021-01-06 07:29:05'),
(568, 72, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Salami Bello requested Dish & Washing Machine service', '2021-01-06 07:43:37'),
(569, 72, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/51', 'Salami Bello cancelled REF-641E3BAF service request.', '2021-01-06 07:46:10'),
(570, 72, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/48', 'Salami Bello cancelled REF-8FF9184A service request.', '2021-01-06 08:16:08'),
(571, 72, '197.210.65.184', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Salami Bello logged out with a session duration of 00:50:45(hrs:min:ss).', '2021-01-06 08:17:19'),
(572, 73, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Olusola Akinruntan logged in.', '2021-01-06 08:24:50'),
(573, 73, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Olusola Akinruntan updated his profile', '2021-01-06 08:26:01'),
(574, 73, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Olusola Akinruntan requested Computer & Laptops service', '2021-01-06 08:33:28'),
(575, 73, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Olusola Akinruntan requested Bath-Tubs, Pipes, Kitchen Sink service', '2021-01-06 08:36:00'),
(576, 73, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Olusola Akinruntan requested Drainage, Shower, Soak-Away service', '2021-01-06 09:03:43'),
(577, 73, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/55', 'Olusola Akinruntan cancelled REF-3A0EFE3C service request.', '2021-01-06 09:05:04'),
(578, 73, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/54', 'Olusola Akinruntan cancelled REF-FFDDEC32 service request.', '2021-01-06 09:05:46'),
(579, 73, '197.210.65.184', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Olusola Akinruntan logged out with a session duration of 00:41:08(hrs:min:ss).', '2021-01-06 09:05:58'),
(580, 74, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Emmanuela Eze - Ego logged in.', '2021-01-06 09:06:27'),
(581, 74, '197.210.65.184', 'Profile', 'Informational', 'App\\Http\\Controllers\\ClientDashboardController@updateProfile', 'https://temp.homefix.ng/client/settings/update-profile', 'Emmanuela Eze - Ego updated her profile', '2021-01-06 09:06:54'),
(582, 74, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Emmanuela Eze - Ego requested Drainage, Shower, Soak-Away service', '2021-01-06 09:09:48'),
(583, 74, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/58', 'Emmanuela Eze - Ego cancelled REF-0C8E1C14 service request.', '2021-01-06 09:11:20'),
(584, 74, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Emmanuela Eze - Ego requested Computer & Laptops service', '2021-01-06 09:16:59'),
(585, 74, '197.210.65.184', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Emmanuela Eze - Ego logged out with a session duration of 00:10:51(hrs:min:ss).', '2021-01-06 09:17:18'),
(586, 74, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Emmanuela Eze - Ego logged in.', '2021-01-06 09:17:38'),
(587, 74, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/59', 'Emmanuela Eze - Ego cancelled REF-3FD95205 service request.', '2021-01-06 09:18:25'),
(588, 74, '197.210.65.184', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Emmanuela Eze - Ego logged out with a session duration of 00:29:10(hrs:min:ss).', '2021-01-06 09:46:48'),
(589, 75, '197.210.65.184', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'https://temp.homefix.ng/verify-credentials', 'Chriatiana Nnwayawun logged in.', '2021-01-06 10:00:42'),
(590, 75, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Chriatiana Nnwayawun requested Computer & Laptops service', '2021-01-06 10:04:02'),
(591, 75, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Chriatiana Nnwayawun requested Dish & Washing Machine service', '2021-01-06 10:07:02'),
(592, 75, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/63', 'Chriatiana Nnwayawun cancelled REF-7C7F09DA service request.', '2021-01-06 10:07:42'),
(593, 75, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Chriatiana Nnwayawun requested Drainage, Shower, Soak-Away service', '2021-01-06 10:12:51'),
(594, 75, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'https://temp.homefix.ng/client/services/quote/store', 'Chriatiana Nnwayawun requested Computer & Laptops service', '2021-01-06 10:14:06'),
(595, 75, '197.210.65.184', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'https://temp.homefix.ng/client/requests/cancel/67', 'Chriatiana Nnwayawun cancelled REF-5CB26E66 service request.', '2021-01-06 10:15:09'),
(596, 75, '197.210.65.184', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'https://temp.homefix.ng/logout', 'Chriatiana Nnwayawun logged out with a session duration of 00:46:44(hrs:min:ss).', '2021-01-06 10:47:26'),
(597, 1, '154.113.72.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://test.homefix.ng/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-06 11:00:03'),
(598, 1, '154.113.72.58', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://test.homefix.ng/logout', 'NinthBinary Developer logged out with a session duration of 00:15:11(hrs:min:ss).', '2021-01-06 11:15:14'),
(599, 4, '154.113.72.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://test.homefix.ng/verify-credentials', 'FixMaster Management logged in.', '2021-01-06 11:15:28'),
(600, 4, '154.113.72.58', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://test.homefix.ng/logout', 'FixMaster Management logged out with a session duration of 00:00:01(hrs:min:ss).', '2021-01-06 11:15:29'),
(601, 4, '154.113.72.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://test.homefix.ng/verify-credentials', 'FixMaster Management logged in.', '2021-01-06 11:15:43'),
(602, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 00:35:40(hrs:min:ss).', '2021-01-06 11:24:22'),
(603, 4, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'FixMaster Management logged in.', '2021-01-06 11:24:35'),
(604, 4, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'FixMaster Management logged out with a session duration of 00:37:37(hrs:min:ss).', '2021-01-06 12:02:12'),
(605, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-06 12:02:31'),
(606, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-06 17:16:24'),
(607, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@cancelRequest', 'http://localhost:8000/client/requests/cancel/9', 'Adekola Adeleke cancelled REF-E1C71A87 service request.', '2021-01-06 17:42:49'),
(608, 11, '197.210.64.150', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-06 18:11:08'),
(609, 11, '197.210.64.150', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://temp.homefix.ng/logout', 'Adekola Adeleke logged out with a session duration of 00:06:17(hrs:min:ss).', '2021-01-06 18:17:25'),
(610, 1, '197.210.64.150', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-06 18:17:41'),
(611, 1, '197.210.64.150', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://temp.homefix.ng/logout', 'NinthBinary Developer logged out with a session duration of 00:01:14(hrs:min:ss).', '2021-01-06 18:18:55'),
(612, 1, '154.113.72.58', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-07 08:59:36'),
(613, 1, '154.113.72.58', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://temp.homefix.ng/logout', 'NinthBinary Developer logged out with a session duration of 00:09:42(hrs:min:ss).', '2021-01-07 09:09:18'),
(614, 85, '197.210.84.205', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Funmilewa Ogunsulayan(FabTestGenericUser1@fixmaster.com.ng) account was registered successfully.', '2021-01-07 18:16:52'),
(615, 86, '197.210.84.205', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Funmide Adekoyanu(FabTestGenericUser2@fixmaster.com.ng) account was registered successfully.', '2021-01-07 18:19:58'),
(616, 87, '102.89.3.240', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Oyinlolu Adewalemi(FabTestGenericUser3@fixmaster.com.ng) account was registered successfully.', '2021-01-07 18:34:29'),
(617, 88, '102.89.3.64', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Titilayomi Owoyelesan(FabTestGenericUser4@fixmaster.com.ng) account was registered successfully.', '2021-01-07 18:37:48'),
(618, 89, '102.89.3.221', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Salewami Soworele(FabTestGenericUser5@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:18:58'),
(619, 90, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Sobolanle Abideen(FabTestGenericUser31@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:20:42'),
(620, 91, '102.89.3.18', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Funmike Ogunwusinmi(FabTestGenericUser6@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:22:48'),
(621, 92, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Yemidesola Abidogunn(FabTestGenericUser32@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:22:51'),
(622, 93, '102.89.3.18', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Folakemi Adegbemirole(FabTestGenericUser7@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:25:08'),
(623, 94, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akinfemiwa Abiodunlosan(FabTestGenericUser33@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:25:10'),
(624, 95, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Jideolu Omoworareju(FabTestGenericUser34@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:26:50');
INSERT INTO `activity_logs` (`id`, `user_id`, `ip_address`, `type`, `severity`, `action_url`, `controller_action_path`, `message`, `created_at`) VALUES
(625, 96, '102.89.3.240', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Folukewale Omoworaredele(FabTestGenericUser8@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:27:26'),
(626, 97, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Suleiman Gumeliddin(FabTestGenericUser35@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:28:43'),
(627, 98, '102.89.3.240', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Olafadeketan	wosan Ranmilo(FabTestGenericUser9@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:30:09'),
(628, 99, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Ganiyudeen Okorodudugan(FabTestGenericUser36@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:30:52'),
(629, 100, '102.89.3.240', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Olabisimi Ogunsakinnu(FabTestGenericUser10@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:32:18'),
(630, 101, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Ilemobayowa Banirepo(FabTestGenericUser37@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:32:26'),
(631, 102, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Lookmanulai Agagu(FabTestGenericUser38@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:34:39'),
(632, 103, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Gbengasoke Agagu(FabTestGenericUser39@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:36:14'),
(633, 104, '102.89.3.240', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Folorunsomi Alakijagba(FabTestGenericUser11@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:41:25'),
(634, 105, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Tayonye Agagu(FabTestGenericUser40@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:54:39'),
(635, 106, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Ayobamipo Agagu(FabTestGenericUser41@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:56:00'),
(636, 107, '102.89.3.240', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Folusholo Alalubosagbajo(FabTestGenericUser12@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:57:23'),
(637, 108, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akinwolemiwa Akinsalejo(FabTestGenericUser42@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:57:43'),
(638, 109, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akingbemiga Akinsalejo(FabTestGenericUser43@fixmaster.com.ng) account was registered successfully.', '2021-01-07 19:59:05'),
(639, 110, '102.89.3.221', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Omotarawaye Elegushitele(FabTestGenericUser13@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:01:11'),
(640, 111, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akindemi Akinsalejo(FabTestGenericUser44@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:01:24'),
(641, 112, '102.89.3.221', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Olayinka Fakayode(FabTestGenericUser14@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:03:56'),
(642, 113, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akinfemitan Akinsalejo(FabTestGenericUser45@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:04:29'),
(643, 114, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akinruntan Akinsalejo(FabTestGenericUser46@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:05:53'),
(644, 115, '102.89.3.18', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Yemisiola Ibrahim-Nupe(FabTestGenericUser15@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:06:12'),
(645, 116, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akinfela Akinsalejo(FabTestGenericUser47@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:07:33'),
(646, 117, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Oluwasegun Amusan(FabTestGenericUser48@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:08:58'),
(647, 118, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Albert Ibhareboi(FabTestGenericUser49@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:10:26'),
(648, 119, '102.89.3.18', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Oluwaseun Akintadenu(FabTestGenericUser16@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:11:48'),
(649, 120, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Uyi Esuare(FabTestGenericUser50@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:12:18'),
(650, 121, '102.89.3.240', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Boluwatife Ogunwalesan(FabTestGenericUser17@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:13:46'),
(651, 122, '102.89.3.240', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Solape Ogunwalaja(FabTestGenericUser18@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:15:46'),
(652, 123, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Olugbenga Adedugbegaja(FabTestGenericUser26@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:17:48'),
(653, 124, '102.89.3.240', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Abikelomo Ogunwalemisi(FabTestGenericUser19@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:19:13'),
(654, 125, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Oyinwale Adedugbejunu(FabTestGenericUser27@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:19:16'),
(655, 126, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Olowoyele Adedugbelo(FabTestGenericUser28@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:20:36'),
(656, 127, '102.89.3.18', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Abiodun Ogunwalesehin(FabTestGenericUser20@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:21:15'),
(657, 128, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'AdeFemi Adedugbagbe(FabTestGenericUser29@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:21:54'),
(658, 129, '197.210.8.152', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'OmoLaja Abiodun-Ogunbi(FabTestGenericUser30@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:23:19'),
(659, 130, '102.89.3.18', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Gbemisola Saraki-Mamade(FabTestGenericUser21@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:23:39'),
(660, 131, '102.89.3.18', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Olusola Saraki-Oloye(FabTestGenericUser22@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:31:12'),
(661, 132, '102.89.3.221', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Akintunde Fajabila(FabTestGenericUser23@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:34:21'),
(662, 133, '102.89.3.240', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'AdeWole Famakinwalo(FabTestGenericUser24@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:37:00'),
(663, 134, '102.89.3.221', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\RegisterController@registerClient', 'https://temp.homefix.ng/register', 'Oluwole Famakinwatajobo(FabTestGenericUser25@fixmaster.com.ng) account was registered successfully.', '2021-01-07 20:39:11'),
(664, 1, '102.36.160.146', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-08 05:40:22'),
(665, 1, '102.89.3.21', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://temp.homefix.ng/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-09 00:36:51'),
(666, 1, '102.89.3.145', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://temp.homefix.ng/logout', 'NinthBinary Developer logged out with a session duration of 00:10:58(hrs:min:ss).', '2021-01-09 00:47:49'),
(667, 12, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Godrey Diwa logged in.', '2021-01-10 22:52:27'),
(668, 12, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Godrey Diwa logged out with a session duration of 01:04:10(hrs:min:ss).', '2021-01-10 23:56:37'),
(669, 15, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Taofeek Adedokun logged in.', '2021-01-10 23:56:46'),
(670, 15, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Taofeek Adedokun logged out with a session duration of 00:00:55(hrs:min:ss).', '2021-01-10 23:57:41'),
(671, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-11 00:00:51'),
(672, 1, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'NinthBinary Developer logged out with a session duration of 01:15:43(hrs:min:ss).', '2021-01-11 01:16:34'),
(673, 2, '127.0.0.1', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'An Unknown Intruder attempted to login with (anthonyjoboy2016@gmail.com and admin12345).', '2021-01-11 01:16:45'),
(674, 2, '127.0.0.1', 'Unauthorized', 'Error', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'An Unknown Intruder attempted to login with (anthonyjoboy2016@gmail.com and admin12345).', '2021-01-11 01:16:55'),
(675, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-11 01:17:04'),
(676, 11, '127.0.0.1', 'Request', 'Informational', 'App\\Http\\Controllers\\ClientRequestController@store', 'http://localhost:8000/client/services/quote/store', 'Adekola Adeleke requested Dish & Washing Machine service', '2021-01-11 01:40:44'),
(677, 11, '127.0.0.1', 'Logout', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@logout', 'http://localhost:8000/logout', 'Adekola Adeleke logged out with a session duration of 02:00:27(hrs:min:ss).', '2021-01-11 03:17:31'),
(678, 11, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'Adekola Adeleke logged in.', '2021-01-11 09:46:55'),
(679, 1, '127.0.0.1', 'Login', 'Informational', 'App\\Http\\Controllers\\Auth\\LoginController@verifyCredentials', 'http://localhost:8000/verify-credentials', 'NinthBinary Developer logged in.', '2021-01-11 10:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` enum('SUPER_ADMIN_ROLE','ADMIN_ROLE') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `created_by`, `first_name`, `middle_name`, `last_name`, `phone_number`, `designation`) VALUES
(1, 5, 1, 'David', NULL, 'Akinsola', '08034516890', 'ADMIN_ROLE'),
(2, 6, 1, 'Obuchi', NULL, 'Omotosho', '09032394639', 'ADMIN_ROLE'),
(3, 7, 1, 'Isaac', 'Israel', 'John', '08032459283', 'ADMIN_ROLE'),
(6, 8, 1, 'Emmanuel', 'Gbenga', 'Godfrey', '09066982545', 'ADMIN_ROLE'),
(7, 4, 1, 'FixMaster', '', 'Management', '08132863878', 'SUPER_ADMIN_ROLE');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, 4, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2020-12-04 06:03:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `service_id`, `name`, `standard_fee`, `urgent_fee`, `ooh_fee`, `description`, `url`, `image`, `total_votes`, `rating`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'Computer & Laptops', 2500, 3500, 4700, 'With FixMaster you don\'t have to run to the repair shop every time your PC ends up with a fault, we have a host of tech support we provide. Maybe you need to upgrade your operating system, or install new software, protect against viruses. We do all that!', '181900dad960beccb34f53c4e0ff4647', '181900dad960beccb34f53c4e0ff4647.jpg', 0, 0, '1', NULL, '2020-12-06 19:39:53', '2020-12-12 15:04:17'),
(2, 1, 3, 'Bath-Tubs, Pipes, Kitchen Sink', 2800, 3300, 4500, 'We can fix all plumbing job types. Fix it right with an expert plumber. You Can Count On! All works are carried out promptly.', '12dcc349ebab89a201331db44c68e17e', '12dcc349ebab89a201331db44c68e17e.jpg', 0, 0, '1', NULL, '2020-12-12 15:39:36', NULL),
(3, 1, 5, 'Dish & Washing Machine', 1500, 2500, 3500, 'If you\'ve got a leaky fridge, a rattling dryer, a barely cooling HVAC, a stove that no longer sizzles or a clogged dishwasher, we\'ve got you covered.', 'ef9712cb50851495c67ab9c3ab40a6ce', 'ef9712cb50851495c67ab9c3ab40a6ce.jpg', 0, 0, '1', NULL, '2020-12-12 15:45:16', NULL),
(4, 1, 3, 'Drainage, Shower, Soak-Away', 3000, 3500, 4000, 'We can fix all plumbing job types. Fix it right with an expert plumber. You Can Count On! All works are carried out promptly.', '5c01c0c3800c3fb2cc7076528d4535d3', '5c01c0c3800c3fb2cc7076528d4535d3.jpg', 0, 0, '1', NULL, '2020-12-12 17:00:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `discounted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `state_id`, `lga_id`, `profession_id`, `town`, `first_name`, `middle_name`, `last_name`, `phone_number`, `gender`, `avatar`, `full_address`, `discounted`) VALUES
(1, 9, 25, 369, 1, 'Okota', 'Wisdom', NULL, 'Amana', '09082354902', 'Male', NULL, 'Sango Ota, Lagos.', '0'),
(2, 10, 25, 365, 18, 'Ibeju-Lekki', 'Debola', NULL, 'Williams', '08167836902', 'Male', NULL, 'Funsho williams street, Ibeju Lekki, Lagos.', '0'),
(31, 11, 25, 359, 1, 'Falomo', 'Adekola', NULL, 'Adeleke', '07036722889', 'Male', '0c9ac4cada39ba68e97fc6c0a0807458d1385048.jpg', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', '1'),
(32, 24, 25, 359, NULL, 'Lekki', 'Funmilayo', 'Rebecca', 'Ogunsulire', '08069386641', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(33, 25, 25, 359, NULL, 'Ikoyi', 'Boluwatife', 'Favour', 'Ogunwale', '23480693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(34, 26, 25, 359, NULL, 'Ikoyi', 'Sola', 'Mercy', 'Ogunwale', '08069386642', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(35, 27, 25, 359, NULL, 'Ikoyi', 'Abike', 'Whitney', 'Ogunwale', '08069386643', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(36, 28, 25, 359, NULL, 'Lekki Phase 1', 'Oyinlola', 'Racheal', 'Adewale', '08069486641', 'Female', NULL, '28 Oba Adebimpe Palaceway Road,\r\nIkate Elegushi', '0'),
(37, 29, 25, 359, NULL, 'Lekki Phase 1', 'Titilayo', 'Rhianna', 'Owoyele', '07069836642', 'Female', NULL, '15B Abayomi Shonuga Crescent Road, Lekki', '0'),
(38, 30, 25, 359, NULL, 'Lekki Phase 1', 'salewa', 'Rociline', 'Sowore', '08069487741', 'Female', NULL, '38, Abayomi Shonuga Street, Lekki Phase 1', '0'),
(39, 31, 25, 359, NULL, 'Lekki Phase 1', 'Funke', 'Agnes', 'Ogunwusi', '08069996641', 'Female', NULL, '18, Admiralty way, Lekki Phase 1', '0'),
(40, 32, 25, 359, NULL, 'Lekki Phase 1', 'Folake', 'Flossy', 'Adegbenro', '07069836611', 'Female', NULL, '28, Adebayo Doherty Street, Lekki Phase 1', '0'),
(41, 33, 25, 359, NULL, 'Lekki Phase 1', 'Foluke', 'Flavour', 'Omoworare', '08069386627', 'Female', NULL, '145, Durosinmi Etti Street, Lekki Phase 1', '0'),
(42, 34, 25, 359, NULL, 'Lekki Phase 1', 'Olafadeke', 'Regina', 'Ranmilowo', '08329386641', 'Female', NULL, '136, Ogunabnire Mohammed Da-Silva Street, Lekki Phase 1', '0'),
(43, 35, 25, 359, NULL, 'Lekki Phase 1', 'Olabisi', 'Glorie', 'Ogunsakin', '07069838741', 'Female', NULL, '289, Fola Osibo Street, Lekki Phase 1', '0'),
(44, 36, 25, 359, NULL, 'Lekki Phase 1', 'Folorunsho', 'Angelina', 'Alakija', '08069846641', 'Female', NULL, '126, Rock Drive Street, Lekki Phase 1', '0'),
(45, 37, 25, 359, NULL, 'Lekki Phase 1', 'Folusho', 'Maryjane', 'Alalubosa', '07069836662', 'Female', NULL, '267 Kudirat Ninalowo Street, Lekki Phase 1', '0'),
(46, 38, 25, 359, NULL, 'Lekki Phase 1', 'Omotara', 'Taraline', 'Elegushi', '07089836641', 'Female', NULL, '129, Kafayat Abdulrazaaq Street, Lekki Phase 1', '0'),
(47, 39, 25, 359, NULL, 'Lekki Phase 1', 'Yinka', 'Faith', 'Fakayode', '08069485541', 'Female', NULL, '3 Cowrie Street, Cable Point Estate, Lekki Phase 1', '0'),
(48, 40, 25, 359, NULL, 'Lekki Phase 1', 'Yemisi', 'Parmelia', 'Ibrahim', '07079836642', 'Female', NULL, '875 Busari Street, Opposite Ebeano Supermarket, Lekki Phase 1', '0'),
(49, 41, 25, 359, NULL, 'Lekki Phase 1', 'Oluwaseun', 'Blessing', 'Akintade', '08069697741', 'Female', NULL, '348, Hunponu Humphrey Street, Lekki Phase 1', '0'),
(50, 42, 25, 359, NULL, 'Ikoyi', 'Akinfe', 'Mike', 'Abiodun', '080693866', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(51, 43, 25, 359, NULL, 'Ikoyi', 'Jide', 'Jude', 'Omoworare', '08135242726', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(52, 44, 25, 359, NULL, 'Victoria Island', 'Akinruntan', 'Wyoming', 'Akinsalejo', '08094784116', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(53, 45, 25, 359, NULL, 'Ikoyi', 'Sule', 'Mohammed', 'Gumel', '07019450437', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(54, 46, 25, 359, NULL, 'Victoria Island', 'Gani', 'Yinusa', 'Okorodudu', '08107051824', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(55, 47, 25, 359, NULL, 'Victoria Island', 'Ilemobayo', 'Rasheed', 'Banire', '09024334089', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(56, 48, 25, 359, NULL, 'Victoria Island', 'Lookman', 'Abdul', 'Agagu', '08118022204', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(57, 49, 25, 359, NULL, 'Victoria Island', 'Gbenga', 'Sumail', 'Agagu', '08068095298', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(58, 50, 25, 359, NULL, 'Victoria Island', 'Tayo', 'Lateef', 'Agagu', '08035724540', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(59, 51, 25, 359, NULL, 'Victoria Island', 'Ayobami', 'Yunus', 'Agagu', '09093574410', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(60, 52, 25, 359, NULL, 'Victoria Island', 'Akinfela', 'Wonderbaar', 'Akinsalejo', '08030509492', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(61, 53, 25, 359, NULL, 'Victoria Island', 'Akinwolemiwa', 'Blaise', 'Akinsalejo', '08139207183', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(62, 54, 25, 359, NULL, 'Victoria Island', 'Akingbemiga', 'Winston', 'Akinsalejo', '09071502349', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(63, 55, 25, 359, NULL, 'Victoria Island', 'Oluwasegun', 'Plantation', 'Amusan', '08088981849', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(64, 56, 25, 359, NULL, 'Victoria Island', 'Albert', 'Ewuare', 'Ibhareboi', '08033395130', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(65, 57, 25, 359, NULL, 'Victoria Island', 'Uyi', 'Owomika', 'Esuare', '08034853966', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(66, 58, 25, 359, NULL, 'Victoria Island', 'Adesina', 'Lourdes', 'Kalejaiye', '08059959905', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(67, 59, 25, 359, NULL, 'Victoria Island', 'Gbolahan', 'Trump', 'Ogedengbe', '09064448030', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(68, 60, 25, 359, NULL, 'Victoria Island', 'Olakunle', 'David', 'Ogunmodede', '09090008947', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(69, 61, 25, 359, NULL, 'Victoria Island', 'Sofola', 'Unity', 'Ogunmodede', '08079935959', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(70, 62, 25, 359, NULL, 'Victoria Island', 'Ajinde', 'Flavour', 'Ajanaku', '08022504083', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(71, 63, 25, 359, NULL, 'Victoria Island', 'Alawiye', 'Sweeney', 'Ajanaku', '09069247220', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(72, 64, 25, 359, NULL, 'Victoria Island', 'Ikodede', 'Francis', 'Ajanaku', '08038352274', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(73, 65, 25, 359, NULL, 'Victoria Island', 'Akindemi', 'Paul', 'Okolo', '08160562642', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(74, 66, 25, 359, NULL, 'Victoria Island', 'Aina', 'Salem', 'Melaye', '08058306248', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(75, 67, 25, 359, NULL, 'Victoria Island', 'Buchy', 'Mercy', 'Olufemi', '08022233556', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(76, 68, 25, 359, NULL, 'Victoria Island', 'Akinfemitan', 'Winston', 'Akinsalejo', '08182109908', 'Male', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(77, 69, 25, 354, NULL, 'Lagos Island', 'Folajimi', 'Sammy', 'Adesanya', '09049760210', 'Male', NULL, 'Odogunya, ikorodu, Lagos State, Nigeria', '0'),
(78, 70, 25, 356, NULL, 'Ikorodu', 'Folajimi', 'Sammy', 'Adesanya', '08151902534', 'Male', NULL, 'Odogunya, ikorodu, Lagos State, Nigeria', '0'),
(79, 71, 23, 359, 3, 'Ibadan', 'Ireti', 'Adebayo', 'Dauda', '08022233557', 'Male', '289c4e7a4326b03c825fa12e3e6236c98b634f11.png', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', '1'),
(80, 72, 25, 359, 14, 'Victoria Island', 'Salami', 'David', 'Bello', '08022233558', 'Male', '6213989e357d039b421f5c703ef24294bcdd72e6.png', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', '1'),
(81, 73, 25, 359, 1, 'Victoria Island', 'Olusola', 'Pantami', 'Akinruntan', '08022233559', 'Male', 'ff50f7ebdc1074c56a5723810f5005f9bdd0fbea.png', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', '1'),
(82, 74, 25, 359, 2, 'Victoria Island', 'Emmanuela', 'Love', 'Eze - Ego', '08022233560', 'Female', '48dcc6c9cbbe45c30cf36ecbd25926ffc358ae7f.png', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', '1'),
(83, 75, 25, 359, 45, 'Victoria Island', 'Chriatiana', 'Wonderfulness', 'Nnwayawun', '08022233561', 'Female', '013479106d18aa649a645976c410704b94296fcb.png', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', '1'),
(85, 77, 25, 359, 19, 'Ikoyi', 'Demola', 'Ireti', 'Mhakinde', '07069385490', 'Male', 'c5f796194684170f0cd1df6675beb1ca13a99e99.jpg', '31, Ademola Adetokunmbo Street, Road 24, Ikoyi Lagos.', '1'),
(86, 78, 22, 359, 38, 'Victoria Island', 'Frank', 'komoplafe', 'Brown-Coker', '08059386655', 'Male', '18f9f78affea64ba50b6bf340cbda01714259c85.jpg', '361, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', '1'),
(87, 79, 25, 359, 18, 'Lekki', 'Candy', 'Johnson', 'Mercy', '0909386641', 'Female', '6881400dd5f71cdb20408a935a976371a2504c2c.jpg', '31, Eke Dipo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', '1'),
(88, 80, 25, 359, 4, 'Victoria Island', 'Craig', 'pinnock', 'Ebute', '08069386541', 'Male', '28ed2debd1fe220de490b7293e8c5c0f343cb580.jpg', '31, Adetoun Adeola, Victoria Island, Lagos.', '1'),
(89, 81, 25, 359, 60, 'Victoria Island', 'Etinosa', 'Lovelyn', 'Makinwa', '08099384297', 'Female', '6028ae2ea8c51f2b27d01251dc04ba65626dbdca.jpg', '2004, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', '1'),
(95, 85, 25, 359, NULL, 'Victoria Island', 'Funmilewa', 'Rebecca', 'Ogunsulayan', '08044693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(96, 86, 25, 359, NULL, 'Victoria Island', 'Funmide', 'Regina', 'Adekoyanu', '08055693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(97, 87, 25, 359, NULL, 'Victoria Island', 'Oyinlolu', 'Racheal', 'Adewalemi', '08064493866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(98, 88, 25, 359, NULL, 'Victoria Island', 'Titilayomi', 'Rhianna', 'Owoyelesan', '08023693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(99, 89, 25, 359, NULL, 'Victoria Island', 'Salewami', 'Rociline', 'Soworele', '08058693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(100, 90, 25, 359, NULL, 'Victoria Island', 'Sobolanle', 'Jayjay', 'Abideen', '08069386671', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(101, 91, 25, 359, NULL, 'Victoria Island', 'Funmike', 'Agnes', 'Ogunwusinmi', '08067993866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(102, 92, 25, 359, NULL, 'Victoria Island', 'Yemidesola', 'Gabriel', 'Abidogunn', '08069386672', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(103, 93, 25, 359, NULL, 'Victoria Island', 'Folakemi', 'Flossy', 'Adegbemirole', '08022693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(104, 94, 25, 359, NULL, 'Victoria Island', 'Akinfemiwa', 'Mike', 'Abiodunlosan', '08069386673', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(105, 95, 25, 359, NULL, 'Victoria Island', 'Jideolu', 'Jude', 'Omoworareju', '08069386674', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(106, 96, 25, 359, NULL, 'Victoria Island', 'Folukewale', 'Flavour', 'Omoworaredele', '09033693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(107, 97, 25, 359, NULL, 'Victoria Island', 'Suleiman', 'Mohammed', 'Gumeliddin', '08069386675', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(108, 98, 25, 359, NULL, 'Victoria Island', 'Olafadeketan	wosan', 'Regina', 'Ranmilo', '09077693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(109, 99, 25, 359, NULL, 'Victoria Island', 'Ganiyudeen', 'Yinusa', 'Okorodudugan', '08069386676', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(110, 100, 25, 359, NULL, 'Victoria Island', 'Olabisimi', 'Glorie', 'Ogunsakinnu', '09058693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(111, 101, 25, 359, NULL, 'Victoria Island', 'Ilemobayowa', 'Rasheed', 'Banirepo', '08069386677', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(112, 102, 25, 359, NULL, 'Victoria Island', 'Lookmanulai', 'Abdul', 'Agagu', '08069386678', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(113, 103, 25, 359, NULL, 'Victoria Island', 'Gbengasoke', 'Sumail', 'Agagu', '08069386679', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(114, 104, 25, 359, NULL, 'Victoria Island', 'Folorunsomi', 'Angelina', 'Alakijagba', '09066693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(115, 105, 25, 359, NULL, 'Victoria Island', 'Tayonye', 'Lateef', 'Agagu', '08069386680', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(116, 106, 25, 359, NULL, 'Victoria Island', 'Ayobamipo', 'Yunus', 'Agagu', '08069386681', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(117, 107, 25, 359, NULL, 'Victoria Island', 'Folusholo', 'Maryjane', 'Alalubosagbajo', '09064293866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(118, 108, 25, 359, NULL, 'Victoria Island', 'Akinwolemiwa', 'Blaise', 'Akinsalejo', '08069386682', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(119, 109, 25, 359, NULL, 'Victoria Island', 'Akingbemiga', 'Winston', 'Akinsalejo', '08069386683', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(120, 110, 25, 359, NULL, 'Victoria Island', 'Omotarawaye', 'Taraline', 'Elegushitele', '08069093866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(121, 111, 25, 359, NULL, 'Victoria Island', 'Akindemi', 'William', 'Akinsalejo', '08069386684', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(122, 112, 25, 359, NULL, 'Victoria Island', 'Olayinka', 'Faith', 'Fakayode', '08069113866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(123, 113, 25, 359, NULL, 'Victoria Island', 'Akinfemitan', 'Winston', 'Akinsalejo', '08069386685', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(124, 114, 25, 359, NULL, 'Victoria Island', 'Akinruntan', 'Wyoming', 'Akinsalejo', '08069386686', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(125, 115, 25, 359, NULL, 'Victoria Island', 'Yemisiola', 'Parmelia', 'Ibrahim-Nupe', '08070693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(126, 116, 25, 359, NULL, 'Victoria Island', 'Akinfela', 'Wonderbaar', 'Akinsalejo', '08069386687', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(127, 117, 25, 359, NULL, 'Victoria Island', 'Oluwasegun', 'Plantation', 'Amusan', '08069386688', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(128, 118, 25, 359, NULL, 'Victoria Island', 'Albert', 'Ewuare', 'Ibhareboi', '08069386689', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(129, 119, 25, 359, NULL, 'Victoria Island', 'Oluwaseun', 'Blessing', 'Akintadenu', '09057693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(130, 120, 25, 359, NULL, 'Victoria Island', 'Uyi', 'Owomika', 'Esuare', '08069386690', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(131, 121, 25, 359, NULL, 'Victoria Island', 'Boluwatife', 'Favour', 'Ogunwalesan', '07062293866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(132, 122, 25, 359, NULL, 'Victoria Island', 'Solape', 'Mercy', 'Ogunwalaja', '08069433866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(133, 123, 25, 359, NULL, 'Victoria Island', 'Olugbenga', 'Charles', 'Adedugbegaja', '08069386666', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(134, 124, 25, 359, NULL, 'Victoria Island', 'Abikelomo', 'Whitney', 'Ogunwalemisi', '09069883866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(135, 125, 25, 359, NULL, 'Victoria Island', 'Oyinwale', 'Christopher', 'Adedugbejunu', '08069386667', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(136, 126, 25, 359, NULL, 'Victoria Island', 'Olowoyele', 'Kingston', 'Adedugbelo', '08069386668', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(137, 127, 25, 359, NULL, 'Victoria Island', 'Abiodun', 'Morrisette', 'Ogunwalesehin', '07069348866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(138, 128, 25, 359, NULL, 'Victoria Island', 'AdeFemi', 'Joshua', 'Adedugbagbe', '08069386669', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(139, 129, 25, 359, NULL, 'Victoria Island', 'OmoLaja', 'Johnson', 'Abiodun-Ogunbi', '08069386670', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(140, 130, 25, 359, NULL, 'Victoria Island', 'Gbemisola', 'Mercy', 'Saraki-Mamade', '09069348866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(141, 131, 25, 359, NULL, 'Victoria Island', 'Olusola', 'Bobo', 'Saraki-Oloye', '09069337866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(142, 132, 25, 359, NULL, 'Victoria Island', 'Akintunde', 'Bernhard', 'Fajabila', '08061193866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(143, 133, 25, 359, NULL, 'Victoria Island', 'AdeWole', 'Fighter', 'Famakinwalo', '08069380066', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0'),
(144, 134, 25, 359, NULL, 'Victoria Island', 'Oluwole', 'George', 'Famakinwatajobo', '08011693866', 'Female', NULL, '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cses`
--

CREATE TABLE `cses` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `cse_category` (
  `cse_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
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
-- Table structure for table `disbursed_payments`
--

CREATE TABLE `disbursed_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `payment_mode` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disbursed_payments`
--

INSERT INTO `disbursed_payments` (`id`, `user_id`, `recipient_id`, `service_request_id`, `payment_mode`, `payment_reference`, `amount`, `payment_date`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 19, 5, '2', '239482347372', 1500, '2020-12-31', 'No comment', '2021-01-06 19:53:37', '2021-01-06 19:53:37'),
(2, 1, 19, 5, '3', '898582347097', 1500, '2020-12-31', 'Payment for additional supervison', '2021-01-06 19:53:37', '2021-01-06 19:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE `lgas` (
  `id` int(4) UNSIGNED NOT NULL,
  `state_id` tinyint(4) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `location_and_browser_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `languages` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_and_browser_infos`
--

INSERT INTO `location_and_browser_infos` (`id`, `user_id`, `ip`, `country_name`, `country_code`, `region_code`, `region_name`, `city_name`, `zip_code`, `iso_code`, `postal_code`, `latitude`, `longitude`, `metro_code`, `area_code`, `browser_name`, `browser_version`, `device_operating_system`, `device_operating_system_version`, `languages`) VALUES
(29, 11, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(30, 24, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(31, 25, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'OS X', '10_14_6', 'en-gb, en-us, en'),
(32, 26, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'OS X', '10_14_6', 'en-gb, en-us, en'),
(33, 27, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'OS X', '10_14_6', 'en-gb, en-us, en'),
(34, 28, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(35, 29, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(36, 30, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(37, 31, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(38, 32, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(39, 33, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(40, 34, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(41, 35, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(42, 36, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(43, 37, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(44, 38, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(45, 39, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(46, 40, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(47, 41, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-gb, en-us, en'),
(48, 42, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(49, 43, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(50, 44, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(51, 45, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(52, 46, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(53, 47, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(54, 48, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(55, 49, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(56, 50, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(57, 51, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(58, 52, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(59, 53, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(60, 54, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(61, 55, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(62, 56, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(63, 57, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(64, 58, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(65, 59, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(66, 60, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(67, 61, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(68, 62, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(69, 63, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(70, 64, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(71, 65, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(72, 66, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(73, 67, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(74, 68, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(75, 69, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '85.0.4183.127', 'AndroidOS', '10', 'en-us, en'),
(76, 70, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '85.0.4183.127', 'AndroidOS', '10', 'en-us, en'),
(77, 71, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(78, 72, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(79, 73, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(80, 74, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(81, 75, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(83, 77, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(84, 78, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(85, 79, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(86, 80, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(87, 81, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(93, 85, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(94, 86, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(95, 87, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(96, 88, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(97, 89, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(98, 90, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(99, 91, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(100, 92, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(101, 93, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(102, 94, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(103, 95, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(104, 96, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(105, 97, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(106, 98, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(107, 99, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(108, 100, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(109, 101, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(110, 102, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(111, 103, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(112, 104, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(113, 105, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(114, 106, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(115, 107, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(116, 108, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(117, 109, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(118, 110, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(119, 111, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(120, 112, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(121, 113, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(122, 114, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(123, 115, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(124, 116, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(125, 117, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(126, 118, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(127, 119, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(128, 120, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(129, 121, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(130, 122, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(131, 123, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(132, 124, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(133, 125, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(134, 126, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(135, 127, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(136, 128, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(137, 129, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(138, 130, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(139, 131, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(140, 132, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(141, 133, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en'),
(142, 134, '197.210.8.101', 'Nigeria', 'NG', 'LA', 'Lagos', 'Lagos', '', NULL, NULL, '6.4474', '3.3903', NULL, 'LA', 'Chrome', '87.0.4280.88', 'Windows', '10.0', 'en-us, en');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `recipient_id`, `subject`, `body`, `is_read`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 11, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Adekola Adefarasin,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2020-12-11 12:43:02', '2021-01-02 07:16:37'),
(2, 4, 11, 'Congratulations! You have earned a discount', '<h1>Congratulations! You have just earned a 5% discount on your first job booking</h1><p>We are very excited you joined the most compelling community of FixMaster satisfied customers! As you already know, excellent quality service, rewards, and savings have always been a vital part of FixMaster\'s success.</p><p> Having said so, we constantly cater to our customers\' best interests in terms of choice, quality, affordability, and unmatchable service!</p><p>For registering with FixMaster, you have been rewarded with a discount on your first job booking which entitles you to a 5% discount off your booking fee.</p><p><strong>PLEASE NOTE THAT THIS DISCOUNT IS ONLY APPLICABLE FOR YOUR FIRST JOB BOOKING</strong></p><p>Should you require further assistance, please do not hesitate to contact us immediately on <strong>08132863878</strong>. We are here to serve you; 24-hours, 7 days a week.</p><p>&nbsp;</p><p>Yours Faithfully,</p><p>FixMaster management</p>', '0', NULL, '2020-12-14 12:06:25', '2021-01-02 07:17:05'),
(4, 4, 11, 'Service Request(JOB-66EB5A26)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>JOB-66EB5A26</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,325(Urgent)</p><p><strong>Date & Time:</strong> December 15th 2020, 5:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2020-12-14 12:39:55', '2020-12-14 12:39:55'),
(5, 4, 11, 'Service Request(JOB-330CB862)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>JOB-330CB862</p><p><strong>Service: </strong>Plumbing(Bath-Tubs, Pipes, Kitchen Sink)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,300(Urgent)</p><p><strong>Date & Time:</strong> December 14th 2020, 4:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2020-12-14 12:48:20', '2021-01-02 07:00:12'),
(6, 4, 11, 'Service Request(REF-27D2F0BE)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-27D2F0BE</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Urgent)</p><p><strong>Date & Time:</strong> December 15th 2020, 11:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2020-12-14 15:36:58', '2020-12-14 15:36:58'),
(7, 4, 11, 'Service Request(REF-1FC50FCC)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-1FC50FCC</p><p><strong>Service: </strong>Plumbing(Drainage, Shower, Soak-Away)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Urgent)</p><p><strong>Date & Time:</strong> December 16th 2020, 4:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2020-12-15 09:33:01', '2021-01-02 07:17:17'),
(8, 4, 11, 'Service Request(REF-131D985E)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-131D985E</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦4,700(Out of Hours)</p><p><strong>Date & Time:</strong> December 16th 2020, 8:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2020-12-15 09:51:29', '2021-01-02 06:57:11'),
(9, 4, 19, 'Welcome to FixMaster!', '<h1>Welcome to FixMaster, Favour Nnamdi!</h1><p>We are very excited you joined the most compelling community of FixMaster to satisfy customer\'s need.</p><p>As a <strong>Client Service Executive</strong>(CSE) you are expected to deliver excellent quality service which has always been a vital part of FixMaster\'s success.</p><p>Having said so, we constantly cater to our customer\'s best interests in terms of choice, quality, affordability, and unmatchable service!</p><p>Remember to change your password to a more convenient one asides the one given to you by FixMaster Admin.</p><p><span style=\"text-decoration: underline;\"><strong>Login Credentials</strong></span></p><p><strong>E-Mail</strong>: nnamdi.favour@yahoo.com</p><p><strong>Password:</strong> admin12345</p><p>&nbsp;</p><p>Yours Faithfully,</p><p>FixMaster management</p>', '0', NULL, '2020-12-18 13:03:17', '2020-12-18 13:03:17'),
(10, 4, 23, 'Welcome to FixMaster!', '<h1>Welcome to FixMaster, John Desmond!</h1><p>We are very excited you joined the most compelling community of FixMaster to satisfy customer\'s need.</p><p>As a <strong>Technician</strong> you will be assigned to jobs and you are expected to deliver excellent quality service which has always been a vital part of FixMaster\'s success.</p><p>Having said so, we constantly cater to our customer\'s best interests in terms of choice, quality, affordability, and unmatchable service!</p><p>Remember to change your password to a more convenient one asides the one given to you by FixMaster Admin.</p><p><span style=\"text-decoration: underline;\"><strong>Login Credentials</strong></span></p><p><strong>E-Mail</strong>: desmond.john@outlook.co.uk</p><p><strong>Password:</strong> admin12345</p><p>&nbsp;</p><p>Yours Faithfully,</p><p>FixMaster management</p>', '0', NULL, '2020-12-19 21:26:29', '2020-12-19 21:26:29'),
(11, 5, 19, 'New Job(REF-66EB5A26) Assignment', '<p><strong>Hello Favour Nnamdi</strong>, you have been assigned to <strong>REF-66EB5A26</strong> job. Kindly proceed to critically reviewing the client\'s request.</p><br /><p>Thanks,<br />FixMaster Management</p>', '0', NULL, '2020-12-25 23:23:19', '2020-12-29 23:17:28'),
(12, 4, 15, 'New Job(REF-66EB5A26) Assignment', '<p><strong>Taofeek Adedokun</strong>, you have been assigned to <strong>REF-66EB5A26</strong> job. Kindly proceed to reviewing the client\'s request and await further instructions from the <strong>Favour Nnamdi</strong>(CSE) assigned to you.</p><br /><p>Thanks,<br />FixMaster Management</p>', '0', NULL, '2020-12-25 23:23:19', '2020-12-25 23:23:19'),
(13, 4, 12, 'New Job(REF-66EB5A26) Assignment', '<p><strong>Hello Godrey Diwa</strong>, you have been assigned to <strong>REF-66EB5A26</strong> job. Kindly proceed to critically reviewing the client\'s request.</p><br /><p>Thanks,<br />FixMaster Management</p>', '1', NULL, '2020-12-27 16:20:17', '2021-01-10 21:52:38'),
(14, 5, 15, 'New Job(REF-66EB5A26) Assignment', '<p><strong>Taofeek Adedokun</strong>, you have been assigned to <strong>REF-66EB5A26</strong> job. Kindly proceed to reviewing the client\'s request and await further instructions from the <strong>Godrey Diwa</strong>(CSE) assigned to you.</p><br /><p>Thanks,<br />FixMaster Management</p>', '0', NULL, '2020-12-27 16:20:17', '2020-12-29 23:17:42'),
(15, 9, 5, 'Tool Request Approval for Job(REF-66EB5A26)', '<p>Hello <strong>David Akinsola</strong>, your Tool request(<strong>TRF-C85BEA04</strong>) for Job(<strong>REF-66EB5A26</strong>) has been approved.&nbsp;</p><p>&nbsp;</p><div><div>Thanks,</div><div>FixMaster Management</div></div>', '0', NULL, '2020-12-29 14:03:21', '2020-12-29 23:05:01'),
(16, 19, 5, 'Tool Request Approval for Job(REF-66EB5A26)', '<p>Hello <strong>David Akinsola</strong>, your Tool request(<strong>TRF-C85BEA04</strong>) for Job(<strong>REF-66EB5A26</strong>) has been approved.&nbsp;</p><p>&nbsp;</p><div><div>Thanks,</div><div>FixMaster Management</div></div>', '0', NULL, '2020-12-29 14:06:08', '2020-12-30 09:09:01'),
(17, 4, 19, 'New Job(REF-27D2F0BE) Assignment', '<p><strong>Hello Favour Nnamdi</strong>, you have been assigned to <strong>REF-27D2F0BE</strong> job. Kindly proceed to critically reviewing the client\'s request.</p><br /><p>Thanks,<br />FixMaster Management</p>', '0', NULL, '2020-12-30 09:30:19', '2020-12-30 10:02:03'),
(18, 4, 15, 'New Job(REF-27D2F0BE) Assignment', '<p><strong>Taofeek Adedokun</strong>, you have been assigned to <strong>REF-27D2F0BE</strong> job. Kindly proceed to reviewing the client\'s request and await further instructions from the <strong>Favour Nnamdi</strong>(CSE) assigned to you.</p><br /><p>Thanks,<br />FixMaster Management</p>', '0', NULL, '2020-12-30 09:30:19', '2020-12-30 09:31:10'),
(19, 4, 11, 'CSE & Technician has been assigned to REF-27D2F0BE service request', '<p>Hello <strong>Adekola Adeleke</strong>, we are glad to inform you that our best Client Service Executive and a Technician has been assigned to your Service Request (<strong>REF-27D2F0BE</strong>). Once again, here is your Security Code to verify their identities.</p><p><strong>Security Code</strong>: SEC-35FA9E28</p><div><div>Thanks,</div><div>FixMaster Management</div></div>', '1', NULL, '2020-12-30 09:30:19', '2021-01-02 07:31:59'),
(21, 11, 19, 'CSE Message Test', '<p><strong>FixMaster</strong> is your best trusted one-call solution for a wide range of home maintenance, servicing and repair needs. Our well-trained &amp; certified uniformed technicians are fully insured professionals with robust experience to provide home services to fully meet your needs with singular objective to make you totally relax while your repair requests are professionally handled.</p>\r\n<p>&nbsp;</p>', '0', NULL, '2021-01-02 05:56:55', '2021-01-02 07:09:24'),
(22, 11, 4, 'FixMaster Message Test', '<p>This Message is sent directly to FixMaster default Administrator.</p>\r\n<div>Thanks,</div>\r\n<div>Adeleke Adekola</div>', '0', NULL, '2021-01-02 06:03:06', '2021-01-02 07:07:14'),
(23, 4, 11, 'Service Request(REF-E1C71A87)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-E1C71A87</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Standard)</p><p><strong>Date & Time:</strong> January 5th 2021, 10:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-02 17:51:26', '2021-01-02 17:51:26'),
(24, 4, 24, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Funmilayo Ogunsulire,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 02:42:28', '2021-01-04 02:42:28'),
(25, 4, 25, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Boluwatife Ogunwale,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 04:57:46', '2021-01-04 04:57:46'),
(26, 4, 26, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Sola Ogunwale,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 05:30:18', '2021-01-04 05:30:18'),
(27, 4, 27, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Abike Ogunwale,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 06:07:30', '2021-01-04 06:07:30'),
(28, 4, 28, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Oyinlola Adewale,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 06:15:54', '2021-01-04 06:15:54'),
(29, 4, 29, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Titilayo Owoyele,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 06:20:40', '2021-01-04 06:20:40'),
(30, 4, 30, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello salewa Sowore,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 06:38:00', '2021-01-04 06:38:00'),
(31, 4, 31, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Funke Ogunwusi,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 07:02:59', '2021-01-04 07:02:59'),
(32, 4, 32, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Folake Adegbenro,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 07:05:59', '2021-01-04 07:05:59'),
(33, 4, 33, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Foluke Omoworare,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 07:09:19', '2021-01-04 07:09:19'),
(34, 4, 34, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Olafadeke Ranmilowo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 07:35:57', '2021-01-04 07:35:57'),
(35, 4, 35, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Olabisi Ogunsakin,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 07:38:36', '2021-01-04 07:38:36'),
(36, 4, 36, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Folorunsho Alakija,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 07:41:34', '2021-01-04 07:41:34'),
(37, 4, 37, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Folusho Alalubosa,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 07:45:54', '2021-01-04 07:45:54'),
(38, 4, 38, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Omotara Elegushi,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 07:52:30', '2021-01-04 07:52:30'),
(39, 4, 39, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Yinka Fakayode,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 07:55:40', '2021-01-04 07:55:40'),
(40, 4, 40, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Yemisi Ibrahim,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 07:58:20', '2021-01-04 07:58:20'),
(41, 4, 41, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Oluwaseun Akintade,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 08:00:47', '2021-01-04 08:00:47'),
(42, 4, 42, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akinfe Abiodun,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 09:48:09', '2021-01-04 09:48:09'),
(43, 4, 43, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Jide Omoworare,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 10:02:44', '2021-01-04 10:02:44'),
(44, 4, 44, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akinruntan Akinsalejo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 10:20:09', '2021-01-04 10:20:09'),
(45, 4, 45, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Sule Gumel,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 11:36:13', '2021-01-04 11:36:13'),
(46, 4, 46, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Gani Okorodudu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 12:00:07', '2021-01-04 12:00:07'),
(47, 4, 47, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Ilemobayo Banire,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 12:03:27', '2021-01-04 12:03:27'),
(48, 4, 48, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Lookman Agagu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 12:11:01', '2021-01-04 12:11:01'),
(49, 4, 49, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Gbenga Agagu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 12:35:27', '2021-01-04 12:35:27'),
(50, 4, 50, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Tayo Agagu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 12:43:14', '2021-01-04 12:43:14'),
(51, 4, 51, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Ayobami Agagu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 12:47:24', '2021-01-04 12:47:24'),
(52, 4, 52, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akinfela Akinsalejo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 12:50:39', '2021-01-04 12:50:39'),
(53, 4, 53, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akinwolemiwa Akinsalejo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 12:51:19', '2021-01-04 12:51:19'),
(54, 4, 54, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akingbemiga Akinsalejo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 12:56:41', '2021-01-04 12:56:41'),
(55, 4, 55, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Oluwasegun Amusan,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 12:58:22', '2021-01-04 12:58:22'),
(56, 4, 56, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Albert Ibhareboi,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:00:10', '2021-01-04 13:00:10'),
(57, 4, 57, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Uyi Esuare,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:22:20', '2021-01-04 13:22:20'),
(58, 4, 58, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Adesina Kalejaiye,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:24:15', '2021-01-04 13:24:15'),
(59, 4, 59, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Gbolahan Ogedengbe,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:27:08', '2021-01-04 13:27:08'),
(60, 4, 60, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Olakunle Ogunmodede,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:28:55', '2021-01-04 13:28:55'),
(61, 4, 61, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Sofola Ogunmodede,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:31:41', '2021-01-04 13:31:41'),
(62, 4, 62, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Ajinde Ajanaku,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:33:24', '2021-01-04 13:33:24'),
(63, 4, 63, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Alawiye Ajanaku,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:35:11', '2021-01-04 13:35:11'),
(64, 4, 64, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Ikodede Ajanaku,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:36:39', '2021-01-04 13:36:39'),
(65, 4, 65, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akindemi Okolo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:39:19', '2021-01-04 13:39:19'),
(66, 4, 66, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Aina Melaye,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:40:46', '2021-01-04 13:40:46'),
(67, 4, 67, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Buchy Olufemi,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:43:00', '2021-01-04 13:43:00');
INSERT INTO `messages` (`id`, `sender_id`, `recipient_id`, `subject`, `body`, `is_read`, `deleted_at`, `created_at`, `updated_at`) VALUES
(68, 4, 68, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akinfemitan Akinsalejo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 13:45:46', '2021-01-04 13:45:46'),
(69, 4, 69, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Folajimi Adesanya,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 15:06:18', '2021-01-04 15:06:18'),
(70, 4, 70, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Folajimi Adesanya,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-04 15:12:12', '2021-01-04 15:12:12'),
(71, 4, 71, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Ireti Dauda,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '1', NULL, '2021-01-05 09:51:51', '2021-01-05 13:06:49'),
(72, 4, 72, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Salami Bello,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-05 09:58:11', '2021-01-05 09:58:11'),
(73, 4, 73, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Olusola Akinruntan,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '1', NULL, '2021-01-05 10:10:17', '2021-01-06 08:26:25'),
(74, 4, 74, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Emmanuela Eze - Ego,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-05 10:18:12', '2021-01-05 10:18:12'),
(75, 4, 75, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Chriatiana Nnwayawun,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-05 10:19:57', '2021-01-05 10:19:57'),
(77, 4, 77, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Ademola Makinde,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-05 10:35:33', '2021-01-05 10:35:33'),
(78, 4, 78, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Francis Coker,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-05 10:38:45', '2021-01-05 10:38:45'),
(79, 4, 79, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Mercy Johnson,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-05 10:40:54', '2021-01-05 10:40:54'),
(80, 4, 80, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Ademola Ebute,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-05 10:43:15', '2021-01-05 10:43:15'),
(81, 4, 81, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Etinosa Aigbe,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-05 10:45:28', '2021-01-05 10:45:28'),
(85, 71, 4, 'Urgent Attention Required', '<p>Hello Customer Care,</p>\r\n<p>Please attend to my request.</p>\r\n<p>&nbsp;</p>\r\n<p>Thank you</p>', '0', NULL, '2021-01-05 13:02:38', '2021-01-05 13:02:38'),
(86, 4, 77, 'Service Request(REF-7BEC1F70)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-7BEC1F70</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦1,425(Standard)</p><p><strong>Date & Time:</strong> January 6th 2021, 12:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 14:04:48', '2021-01-05 14:04:48'),
(88, 4, 77, 'Service Request(REF-473E6826)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-473E6826</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Urgent)</p><p><strong>Date & Time:</strong> January 5th 2021, 2:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 14:11:54', '2021-01-05 14:11:54'),
(89, 4, 71, 'Service Request(REF-103203B9)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-103203B9</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,375(Standard)</p><p><strong>Date & Time:</strong> January 5th 2021, 5:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '1', NULL, '2021-01-05 14:19:11', '2021-01-05 14:28:38'),
(90, 4, 77, 'Service Request(REF-CFDA9CE8)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-CFDA9CE8</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Out of Hours)</p><p><strong>Date & Time:</strong> January 7th 2021, 8:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 14:21:55', '2021-01-05 14:21:55'),
(91, 4, 77, 'Service Request(REF-52AF6E61)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-52AF6E61</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦1,500(Standard)</p><p><strong>Date & Time:</strong> January 8th 2021, 4:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 14:34:47', '2021-01-05 14:34:47'),
(92, 4, 77, 'Service Request(REF-42D42C61)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-42D42C61</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Urgent)</p><p><strong>Date & Time:</strong> January 7th 2021, 4:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 15:07:46', '2021-01-05 15:07:46'),
(93, 4, 71, 'Service Request(REF-4CBA5AB0)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-4CBA5AB0</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Urgent)</p><p><strong>Date & Time:</strong> January 12th 2021, 5:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 15:14:27', '2021-01-05 15:14:27'),
(94, 4, 71, 'Service Request(REF-EEE7FD14)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-EEE7FD14</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Urgent)</p><p><strong>Date & Time:</strong> January 12th 2021, 5:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '1', NULL, '2021-01-05 15:17:16', '2021-01-05 15:22:48'),
(95, 4, 71, 'Service Request(REF-79A722D6)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-79A722D6</p><p><strong>Service: </strong>Plumbing(Drainage, Shower, Soak-Away)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦4,000(Out of Hours)</p><p><strong>Date & Time:</strong> January 5th 2021, 5:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 15:49:42', '2021-01-05 15:49:42'),
(96, 4, 71, 'Service Request(REF-CBE87860)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-CBE87860</p><p><strong>Service: </strong>Plumbing(Bath-Tubs, Pipes, Kitchen Sink)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,800(Standard)</p><p><strong>Date & Time:</strong> January 6th 2021, 6:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 15:59:51', '2021-01-05 15:59:51'),
(97, 4, 71, 'Service Request(REF-FB0B7B30)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-FB0B7B30</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Urgent)</p><p><strong>Date & Time:</strong> January 6th 2021, 9:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 16:04:21', '2021-01-05 16:04:21'),
(98, 4, 71, 'Service Request(REF-5B02030C)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-5B02030C</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Urgent)</p><p><strong>Date & Time:</strong> January 6th 2021, 9:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 16:05:43', '2021-01-05 16:05:43'),
(99, 4, 81, 'Service Request(REF-F024810F)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-F024810F</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,375(Standard)</p><p><strong>Date & Time:</strong> January 6th 2021, 11:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 17:51:29', '2021-01-05 17:51:29'),
(100, 4, 81, 'Service Request(REF-946C9191)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-946C9191</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Standard)</p><p><strong>Date & Time:</strong> January 6th 2021, 11:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 17:52:52', '2021-01-05 17:52:52'),
(101, 4, 81, 'Service Request(REF-781E7707)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-781E7707</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Standard)</p><p><strong>Date & Time:</strong> January 6th 2021, 11:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 17:53:37', '2021-01-05 17:53:37'),
(102, 4, 81, 'Service Request(REF-93080B0A)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-93080B0A</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Urgent)</p><p><strong>Date & Time:</strong> January 5th 2021, 6:57:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 17:58:46', '2021-01-05 17:58:46'),
(103, 4, 81, 'Service Request(REF-A3EDB578)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-A3EDB578</p><p><strong>Service: </strong>Plumbing(Bath-Tubs, Pipes, Kitchen Sink)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦4,500(Out of Hours)</p><p><strong>Date & Time:</strong> January 7th 2021, 9:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:00:46', '2021-01-05 18:00:46'),
(104, 4, 80, 'Service Request(REF-D5521B5F)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-D5521B5F</p><p><strong>Service: </strong>Plumbing(Bath-Tubs, Pipes, Kitchen Sink)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,135(Urgent)</p><p><strong>Date & Time:</strong> January 6th 2021, 8:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:21:05', '2021-01-05 18:21:05'),
(105, 4, 80, 'Service Request(REF-538B2830)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-538B2830</p><p><strong>Service: </strong>Plumbing(Drainage, Shower, Soak-Away)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,000(Standard)</p><p><strong>Date & Time:</strong> January 9th 2021, 8:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:24:07', '2021-01-05 18:24:07'),
(106, 4, 80, 'Service Request(REF-E602F90D)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-E602F90D</p><p><strong>Service: </strong>Plumbing(Bath-Tubs, Pipes, Kitchen Sink)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦4,500(Out of Hours)</p><p><strong>Date & Time:</strong> January 5th 2021, 6:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:27:26', '2021-01-05 18:27:26'),
(107, 4, 80, 'Service Request(REF-201D4CDA)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-201D4CDA</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Standard)</p><p><strong>Date & Time:</strong> January 9th 2021, 1:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:29:01', '2021-01-05 18:29:01'),
(108, 4, 80, 'Service Request(REF-678E7789)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-678E7789</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Out of Hours)</p><p><strong>Date & Time:</strong> January 10th 2021, 7:29:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:31:31', '2021-01-05 18:31:31'),
(109, 4, 79, 'Service Request(REF-A2A3245E)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-A2A3245E</p><p><strong>Service: </strong>Plumbing(Bath-Tubs, Pipes, Kitchen Sink)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,660(Standard)</p><p><strong>Date & Time:</strong> January 10th 2021, 8:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:35:39', '2021-01-05 18:35:39'),
(110, 4, 79, 'Service Request(REF-023E2780)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-023E2780</p><p><strong>Service: </strong>Plumbing(Drainage, Shower, Soak-Away)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,000(Standard)</p><p><strong>Date & Time:</strong> January 9th 2021, 4:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:39:05', '2021-01-05 18:39:05'),
(111, 4, 79, 'Service Request(REF-8323A890)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-8323A890</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦4,700(Out of Hours)</p><p><strong>Date & Time:</strong> January 7th 2021, 7:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:41:02', '2021-01-05 18:41:02'),
(112, 4, 79, 'Service Request(REF-10B62418)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-10B62418</p><p><strong>Service: </strong>Plumbing(Drainage, Shower, Soak-Away)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Urgent)</p><p><strong>Date & Time:</strong> January 7th 2021, 7:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:44:46', '2021-01-05 18:44:46'),
(113, 4, 79, 'Service Request(REF-8B6BFB56)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-8B6BFB56</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Out of Hours)</p><p><strong>Date & Time:</strong> January 7th 2021, 9:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:46:30', '2021-01-05 18:46:30'),
(114, 4, 78, 'Service Request(REF-BF3FC109)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-BF3FC109</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦4,465(Out of Hours)</p><p><strong>Date & Time:</strong> January 6th 2021, 7:52:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:52:46', '2021-01-05 18:52:46'),
(115, 4, 78, 'Service Request(REF-282CB9FB)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-282CB9FB</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Out of Hours)</p><p><strong>Date & Time:</strong> January 6th 2021, 11:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:54:25', '2021-01-05 18:54:25'),
(116, 4, 78, 'Service Request(REF-062960E8)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-062960E8</p><p><strong>Service: </strong>Plumbing(Bath-Tubs, Pipes, Kitchen Sink)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,300(Urgent)</p><p><strong>Date & Time:</strong> January 5th 2021, 9:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:57:09', '2021-01-05 18:57:09'),
(117, 4, 78, 'Service Request(REF-E7420AB6)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-E7420AB6</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦1,500(Standard)</p><p><strong>Date & Time:</strong> January 13th 2021, 2:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 18:59:48', '2021-01-05 18:59:48'),
(118, 4, 78, 'Service Request(REF-05C9D56E)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-05C9D56E</p><p><strong>Service: </strong>Plumbing(Drainage, Shower, Soak-Away)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,000(Standard)</p><p><strong>Date & Time:</strong> January 6th 2021, 4:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 19:03:31', '2021-01-05 19:03:31'),
(119, 4, 72, 'Service Request(REF-333C7AE6)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-333C7AE6</p><p><strong>Service: </strong>Plumbing(Bath-Tubs, Pipes, Kitchen Sink)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,660(Standard)</p><p><strong>Date & Time:</strong> January 7th 2021, 1:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-05 19:24:59', '2021-01-05 19:24:59'),
(120, 4, 72, 'Service Request(REF-58471A21)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-58471A21</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Standard)</p><p><strong>Date & Time:</strong> January 9th 2021, 10:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-06 07:29:05', '2021-01-06 07:29:05'),
(121, 4, 72, 'Service Request(REF-1F5B3509)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-1F5B3509</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦1,500(Standard)</p><p><strong>Date & Time:</strong> January 8th 2021, 11:00:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-06 07:43:37', '2021-01-06 07:43:37'),
(122, 4, 73, 'Service Request(REF-CE71FFEE)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-CE71FFEE</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦4,465(Out of Hours)</p><p><strong>Date & Time:</strong> January 6th 2021, 8:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-06 08:33:28', '2021-01-06 08:33:28'),
(123, 4, 73, 'Service Request(REF-E512CA0E)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-E512CA0E</p><p><strong>Service: </strong>Plumbing(Bath-Tubs, Pipes, Kitchen Sink)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,800(Standard)</p><p><strong>Date & Time:</strong> January 6th 2021, 12:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '1', NULL, '2021-01-06 08:36:00', '2021-01-06 08:36:24'),
(124, 4, 73, 'Service Request(REF-F50C4CC2)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-F50C4CC2</p><p><strong>Service: </strong>Plumbing(Drainage, Shower, Soak-Away)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Urgent)</p><p><strong>Date & Time:</strong> January 9th 2021, 1:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-06 09:03:43', '2021-01-06 09:03:43'),
(125, 4, 74, 'Service Request(REF-9AF58AE0)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-9AF58AE0</p><p><strong>Service: </strong>Plumbing(Drainage, Shower, Soak-Away)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,850(Standard)</p><p><strong>Date & Time:</strong> January 7th 2021, 12:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-06 09:09:48', '2021-01-06 09:09:48'),
(126, 4, 74, 'Service Request(REF-3FD95205)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-3FD95205</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Urgent)</p><p><strong>Date & Time:</strong> January 9th 2021, 1:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-06 09:16:59', '2021-01-06 09:16:59'),
(127, 4, 75, 'Service Request(REF-3975C909)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-3975C909</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,375(Standard)</p><p><strong>Date & Time:</strong> January 9th 2021, 1:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-06 10:04:02', '2021-01-06 10:04:02'),
(128, 4, 75, 'Service Request(REF-7C7F09DA)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-7C7F09DA</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Out of Hours)</p><p><strong>Date & Time:</strong> January 6th 2021, 8:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-06 10:07:02', '2021-01-06 10:07:02'),
(129, 4, 75, 'Service Request(REF-DBCBEA24)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-DBCBEA24</p><p><strong>Service: </strong>Plumbing(Drainage, Shower, Soak-Away)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦3,500(Urgent)</p><p><strong>Date & Time:</strong> January 6th 2021, 11:09:00am</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-06 10:12:51', '2021-01-06 10:12:51'),
(130, 4, 75, 'Service Request(REF-EA418652)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-EA418652</p><p><strong>Service: </strong>Electronics(Computer & Laptops)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦2,500(Standard)</p><p><strong>Date & Time:</strong> January 16th 2021, 2:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '0', NULL, '2021-01-06 10:14:06', '2021-01-06 10:14:06'),
(131, 4, 85, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Funmilewa Ogunsulayan,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 18:16:52', '2021-01-07 18:16:52'),
(132, 4, 86, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Funmide Adekoyanu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 18:19:58', '2021-01-07 18:19:58'),
(133, 4, 87, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Oyinlolu Adewalemi,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 18:34:29', '2021-01-07 18:34:29'),
(134, 4, 88, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Titilayomi Owoyelesan,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 18:37:48', '2021-01-07 18:37:48'),
(135, 4, 89, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Salewami Soworele,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:18:58', '2021-01-07 19:18:58'),
(136, 4, 90, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Sobolanle Abideen,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:20:42', '2021-01-07 19:20:42'),
(137, 4, 91, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Funmike Ogunwusinmi,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:22:48', '2021-01-07 19:22:48'),
(138, 4, 92, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Yemidesola Abidogunn,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:22:51', '2021-01-07 19:22:51'),
(139, 4, 93, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Folakemi Adegbemirole,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:25:08', '2021-01-07 19:25:08'),
(140, 4, 94, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akinfemiwa Abiodunlosan,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:25:10', '2021-01-07 19:25:10');
INSERT INTO `messages` (`id`, `sender_id`, `recipient_id`, `subject`, `body`, `is_read`, `deleted_at`, `created_at`, `updated_at`) VALUES
(141, 4, 95, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Jideolu Omoworareju,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:26:50', '2021-01-07 19:26:50'),
(142, 4, 96, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Folukewale Omoworaredele,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:27:26', '2021-01-07 19:27:26'),
(143, 4, 97, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Suleiman Gumeliddin,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:28:43', '2021-01-07 19:28:43'),
(144, 4, 98, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Olafadeketan	wosan Ranmilo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:30:09', '2021-01-07 19:30:09'),
(145, 4, 99, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Ganiyudeen Okorodudugan,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:30:52', '2021-01-07 19:30:52'),
(146, 4, 100, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Olabisimi Ogunsakinnu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:32:18', '2021-01-07 19:32:18'),
(147, 4, 101, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Ilemobayowa Banirepo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:32:26', '2021-01-07 19:32:26'),
(148, 4, 102, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Lookmanulai Agagu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:34:39', '2021-01-07 19:34:39'),
(149, 4, 103, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Gbengasoke Agagu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:36:14', '2021-01-07 19:36:14'),
(150, 4, 104, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Folorunsomi Alakijagba,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:41:25', '2021-01-07 19:41:25'),
(151, 4, 105, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Tayonye Agagu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:54:39', '2021-01-07 19:54:39'),
(152, 4, 106, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Ayobamipo Agagu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:56:00', '2021-01-07 19:56:00'),
(153, 4, 107, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Folusholo Alalubosagbajo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:57:23', '2021-01-07 19:57:23'),
(154, 4, 108, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akinwolemiwa Akinsalejo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:57:43', '2021-01-07 19:57:43'),
(155, 4, 109, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akingbemiga Akinsalejo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 19:59:05', '2021-01-07 19:59:05'),
(156, 4, 110, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Omotarawaye Elegushitele,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:01:11', '2021-01-07 20:01:11'),
(157, 4, 111, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akindemi Akinsalejo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:01:24', '2021-01-07 20:01:24'),
(158, 4, 112, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Olayinka Fakayode,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:03:56', '2021-01-07 20:03:56'),
(159, 4, 113, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akinfemitan Akinsalejo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:04:29', '2021-01-07 20:04:29'),
(160, 4, 114, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akinruntan Akinsalejo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:05:53', '2021-01-07 20:05:53'),
(161, 4, 115, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Yemisiola Ibrahim-Nupe,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:06:12', '2021-01-07 20:06:12'),
(162, 4, 116, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akinfela Akinsalejo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:07:33', '2021-01-07 20:07:33'),
(163, 4, 117, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Oluwasegun Amusan,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:08:58', '2021-01-07 20:08:58'),
(164, 4, 118, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Albert Ibhareboi,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:10:26', '2021-01-07 20:10:26'),
(165, 4, 119, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Oluwaseun Akintadenu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:11:48', '2021-01-07 20:11:48'),
(166, 4, 120, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Uyi Esuare,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:12:18', '2021-01-07 20:12:18'),
(167, 4, 121, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Boluwatife Ogunwalesan,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:13:46', '2021-01-07 20:13:46'),
(168, 4, 122, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Solape Ogunwalaja,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:15:46', '2021-01-07 20:15:46'),
(169, 4, 123, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Olugbenga Adedugbegaja,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:17:48', '2021-01-07 20:17:48'),
(170, 4, 124, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Abikelomo Ogunwalemisi,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:19:13', '2021-01-07 20:19:13'),
(171, 4, 125, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Oyinwale Adedugbejunu,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:19:16', '2021-01-07 20:19:16'),
(172, 4, 126, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Olowoyele Adedugbelo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:20:36', '2021-01-07 20:20:36'),
(173, 4, 127, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Abiodun Ogunwalesehin,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:21:15', '2021-01-07 20:21:15'),
(174, 4, 128, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello AdeFemi Adedugbagbe,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:21:54', '2021-01-07 20:21:54'),
(175, 4, 129, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello OmoLaja Abiodun-Ogunbi,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:23:19', '2021-01-07 20:23:19'),
(176, 4, 130, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Gbemisola Saraki-Mamade,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:23:39', '2021-01-07 20:23:39'),
(177, 4, 131, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Olusola Saraki-Oloye,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:31:12', '2021-01-07 20:31:12'),
(178, 4, 132, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Akintunde Fajabila,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:34:21', '2021-01-07 20:34:21'),
(179, 4, 133, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello AdeWole Famakinwalo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:37:00', '2021-01-07 20:37:00'),
(180, 4, 134, 'Welcome to FixMaster!', '<p class=\"p1\"><strong>Hello Oluwole Famakinwatajobo,</strong></p><p class=\"p1\"><strong>Welcome to Fix<span style=\"color: #E97D1F;\">Master</span>! </strong>We&rsquo;re thrilled to see you <span class=\"s1\">here</span>!</p><p class=\"p1\">We&rsquo;re confident that our services will help you achieve your home fixes with <strong>the best professionals we will provide you.</strong></p><p class=\"p1\">Our system is designed in a simple, yet elegant manner to ensure you get the very best out of our service.</p><p class=\"p1\">You can also find more of our guides in the <a href=\"/faq\" target=\"_blank\"> Frequently Asked Questions</a> section.</p><p class=\"p2\">&nbsp;</p><p class=\"p1\">Thanks,</p><p class=\"p1\"><strong>FixMaster Management.</strong></p>', '0', NULL, '2021-01-07 20:39:11', '2021-01-07 20:39:11'),
(181, 4, 11, 'Service Request(REF-364C34DF)', '<p>Thank you for booking your job on FixMaster.</p><p>A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.</p><p><strong>Job Reference: </strong>REF-364C34DF</p><p><strong>Service: </strong>Household Appliances(Dish & Washing Machine)</p><p><strong>CSE Security Code: </strong>SEC-478923</p><p><strong>Amount:</strong> ₦1,500(Standard)</p><p><strong>Date & Time:</strong> January 13th 2021, 7:00:00pm</p><p>We thank you for your patronage and look forward to pleasing you with our service quality.</p><p>&nbsp;</p>', '1', NULL, '2021-01-11 00:39:56', '2021-01-11 00:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(23, '2020_12_24_054610_create_service_request_progress_table', 16),
(24, '2020_12_26_022812_create_rfqs_table', 17),
(25, '2020_12_26_024041_create_rfq_batches_table', 17),
(26, '2020_12_26_024633_create_rfq_suppliers_table', 17),
(27, '2021_01_01_173645_create_received__payments_table', 18),
(28, '2021_01_02_120756_create_service_request_cancellation_reasons_table', 19),
(29, '2021_01_06_124234_create_wallet_transactions_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

CREATE TABLE `names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, 4, 'FixMaster Management', NULL, NULL),
(11, 11, 'Adekola Adeleke', '2020-12-11 12:43:02', NULL),
(12, 12, 'Godrey Diwa', '2020-12-11 12:43:02', '2020-12-18 18:25:52'),
(13, 13, 'Benedict Olaoye', NULL, '2020-12-18 18:26:52'),
(14, 14, 'Andrew Nwankwo', NULL, NULL),
(15, 15, 'Taofeek Adedokun', NULL, '2020-12-20 10:58:48'),
(16, 19, 'Favour Nnamdi', '2020-12-18 13:03:16', '2020-12-18 19:38:12'),
(17, 23, 'John Desmond', '2020-12-19 21:26:29', '2020-12-19 22:30:02'),
(18, 24, 'Funmilayo Ogunsulire', '2021-01-04 02:42:28', '2021-01-04 02:42:28'),
(19, 25, 'Boluwatife Ogunwale', '2021-01-04 04:57:46', '2021-01-04 04:57:46'),
(20, 26, 'Sola Ogunwale', '2021-01-04 05:30:18', '2021-01-04 05:30:18'),
(21, 27, 'Abike Ogunwale', '2021-01-04 06:07:30', '2021-01-04 06:07:30'),
(22, 28, 'Oyinlola Adewale', '2021-01-04 06:15:54', '2021-01-04 06:15:54'),
(23, 29, 'Titilayo Owoyele', '2021-01-04 06:20:40', '2021-01-04 06:20:40'),
(24, 30, 'Salewa Sowore', '2021-01-04 06:38:00', '2021-01-04 06:38:00'),
(25, 31, 'Funke Ogunwusi', '2021-01-04 07:02:59', '2021-01-04 07:02:59'),
(26, 32, 'Folake Adegbenro', '2021-01-04 07:05:59', '2021-01-04 07:05:59'),
(27, 33, 'Foluke Omoworare', '2021-01-04 07:09:19', '2021-01-04 07:09:19'),
(28, 34, 'Olafadeke Ranmilowo', '2021-01-04 07:35:57', '2021-01-04 07:35:57'),
(29, 35, 'Olabisi Ogunsakin', '2021-01-04 07:38:36', '2021-01-04 07:38:36'),
(30, 36, 'Folorunsho Alakija', '2021-01-04 07:41:34', '2021-01-04 07:41:34'),
(31, 37, 'Folusho Alalubosa', '2021-01-04 07:45:54', '2021-01-04 07:45:54'),
(32, 38, 'Omotara Elegushi', '2021-01-04 07:52:30', '2021-01-04 07:52:30'),
(33, 39, 'Yinka Fakayode', '2021-01-04 07:55:40', '2021-01-04 07:55:40'),
(34, 40, 'Yemisi Ibrahim', '2021-01-04 07:58:20', '2021-01-04 07:58:20'),
(35, 41, 'Oluwaseun Akintade', '2021-01-04 08:00:47', '2021-01-04 08:00:47'),
(36, 42, 'Akinfe Abiodun', '2021-01-04 09:48:09', '2021-01-04 09:48:09'),
(37, 43, 'Jide Omoworare', '2021-01-04 10:02:44', '2021-01-04 10:02:44'),
(38, 44, 'Akinruntan Akinsalejo', '2021-01-04 10:20:09', '2021-01-04 10:20:09'),
(39, 45, 'Sule Gumel', '2021-01-04 11:36:13', '2021-01-04 11:36:13'),
(40, 46, 'Gani Okorodudu', '2021-01-04 12:00:07', '2021-01-04 12:00:07'),
(41, 47, 'Ilemobayo Banire', '2021-01-04 12:03:27', '2021-01-04 12:03:27'),
(42, 48, 'Lookman Agagu', '2021-01-04 12:11:01', '2021-01-04 12:11:01'),
(43, 49, 'Gbenga Agagu', '2021-01-04 12:35:27', '2021-01-04 12:35:27'),
(44, 50, 'Tayo Agagu', '2021-01-04 12:43:14', '2021-01-04 12:43:14'),
(45, 51, 'Ayobami Agagu', '2021-01-04 12:47:24', '2021-01-04 12:47:24'),
(46, 52, 'Akinfela Akinsalejo', '2021-01-04 12:50:39', '2021-01-04 12:50:39'),
(47, 53, 'Akinwolemiwa Akinsalejo', '2021-01-04 12:51:19', '2021-01-04 12:51:19'),
(48, 54, 'Akingbemiga Akinsalejo', '2021-01-04 12:56:41', '2021-01-04 12:56:41'),
(49, 55, 'Oluwasegun Amusan', '2021-01-04 12:58:22', '2021-01-04 12:58:22'),
(50, 56, 'Albert Ibhareboi', '2021-01-04 13:00:10', '2021-01-04 13:00:10'),
(51, 57, 'Uyi Esuare', '2021-01-04 13:22:20', '2021-01-04 13:22:20'),
(52, 58, 'Adesina Kalejaiye', '2021-01-04 13:24:15', '2021-01-04 13:24:15'),
(53, 59, 'Gbolahan Ogedengbe', '2021-01-04 13:27:08', '2021-01-04 13:27:08'),
(54, 60, 'Olakunle Ogunmodede', '2021-01-04 13:28:55', '2021-01-04 13:28:55'),
(55, 61, 'Sofola Ogunmodede', '2021-01-04 13:31:41', '2021-01-04 13:31:41'),
(56, 62, 'Ajinde Ajanaku', '2021-01-04 13:33:24', '2021-01-04 13:33:24'),
(57, 63, 'Alawiye Ajanaku', '2021-01-04 13:35:11', '2021-01-04 13:35:11'),
(58, 64, 'Ikodede Ajanaku', '2021-01-04 13:36:39', '2021-01-04 13:36:39'),
(59, 65, 'Akindemi Okolo', '2021-01-04 13:39:19', '2021-01-04 13:39:19'),
(60, 66, 'Aina Melaye', '2021-01-04 13:40:46', '2021-01-04 13:40:46'),
(61, 67, 'Buchy Olufemi', '2021-01-04 13:43:00', '2021-01-04 13:43:00'),
(62, 68, 'Akinfemitan Akinsalejo', '2021-01-04 13:45:46', '2021-01-04 13:45:46'),
(63, 69, 'Folajimi Adesanya', '2021-01-04 15:06:18', '2021-01-04 15:06:18'),
(64, 70, 'Folajimi Adesanya', '2021-01-04 15:12:12', '2021-01-04 15:12:12'),
(65, 71, 'Ireti Dauda', '2021-01-05 09:51:51', '2021-01-05 12:49:00'),
(66, 72, 'Salami Bello', '2021-01-05 09:58:11', '2021-01-05 17:44:57'),
(67, 73, 'Olusola Akinruntan', '2021-01-05 10:10:17', '2021-01-06 08:26:01'),
(68, 74, 'Emmanuela Eze - Ego', '2021-01-05 10:18:12', '2021-01-06 09:06:54'),
(69, 75, 'Chriatiana Nnwayawun', '2021-01-05 10:19:57', '2021-01-05 17:21:43'),
(71, 77, 'Demola Mhakinde', '2021-01-05 10:35:33', '2021-01-05 13:42:47'),
(72, 78, 'Frank Brown-Coker', '2021-01-05 10:38:45', '2021-01-05 15:15:02'),
(73, 79, 'Candy Mercy', '2021-01-05 10:40:54', '2021-01-05 15:17:30'),
(74, 80, 'Craig Ebute', '2021-01-05 10:43:15', '2021-01-05 19:41:58'),
(75, 81, 'Etinosa Makinwa', '2021-01-05 10:45:28', '2021-01-05 15:27:18'),
(80, 85, 'Funmilewa Ogunsulayan', '2021-01-07 18:16:52', '2021-01-07 18:16:52'),
(81, 86, 'Funmide Adekoyanu', '2021-01-07 18:19:58', '2021-01-07 18:19:58'),
(82, 87, 'Oyinlolu Adewalemi', '2021-01-07 18:34:29', '2021-01-07 18:34:29'),
(83, 88, 'Titilayomi Owoyelesan', '2021-01-07 18:37:48', '2021-01-07 18:37:48'),
(84, 89, 'Salewami Soworele', '2021-01-07 19:18:58', '2021-01-07 19:18:58'),
(85, 90, 'Sobolanle Abideen', '2021-01-07 19:20:42', '2021-01-07 19:20:42'),
(86, 91, 'Funmike Ogunwusinmi', '2021-01-07 19:22:48', '2021-01-07 19:22:48'),
(87, 92, 'Yemidesola Abidogunn', '2021-01-07 19:22:51', '2021-01-07 19:22:51'),
(88, 93, 'Folakemi Adegbemirole', '2021-01-07 19:25:08', '2021-01-07 19:25:08'),
(89, 94, 'Akinfemiwa Abiodunlosan', '2021-01-07 19:25:10', '2021-01-07 19:25:10'),
(90, 95, 'Jideolu Omoworareju', '2021-01-07 19:26:50', '2021-01-07 19:26:50'),
(91, 96, 'Folukewale Omoworaredele', '2021-01-07 19:27:26', '2021-01-07 19:27:26'),
(92, 97, 'Suleiman Gumeliddin', '2021-01-07 19:28:43', '2021-01-07 19:28:43'),
(93, 98, 'Olafadeketan	wosan Ranmilo', '2021-01-07 19:30:09', '2021-01-07 19:30:09'),
(94, 99, 'Ganiyudeen Okorodudugan', '2021-01-07 19:30:52', '2021-01-07 19:30:52'),
(95, 100, 'Olabisimi Ogunsakinnu', '2021-01-07 19:32:18', '2021-01-07 19:32:18'),
(96, 101, 'Ilemobayowa Banirepo', '2021-01-07 19:32:26', '2021-01-07 19:32:26'),
(97, 102, 'Lookmanulai Agagu', '2021-01-07 19:34:39', '2021-01-07 19:34:39'),
(98, 103, 'Gbengasoke Agagu', '2021-01-07 19:36:14', '2021-01-07 19:36:14'),
(99, 104, 'Folorunsomi Alakijagba', '2021-01-07 19:41:25', '2021-01-07 19:41:25'),
(100, 105, 'Tayonye Agagu', '2021-01-07 19:54:39', '2021-01-07 19:54:39'),
(101, 106, 'Ayobamipo Agagu', '2021-01-07 19:56:00', '2021-01-07 19:56:00'),
(102, 107, 'Folusholo Alalubosagbajo', '2021-01-07 19:57:23', '2021-01-07 19:57:23'),
(103, 108, 'Akinwolemiwa Akinsalejo', '2021-01-07 19:57:43', '2021-01-07 19:57:43'),
(104, 109, 'Akingbemiga Akinsalejo', '2021-01-07 19:59:05', '2021-01-07 19:59:05'),
(105, 110, 'Omotarawaye Elegushitele', '2021-01-07 20:01:11', '2021-01-07 20:01:11'),
(106, 111, 'Akindemi Akinsalejo', '2021-01-07 20:01:24', '2021-01-07 20:01:24'),
(107, 112, 'Olayinka Fakayode', '2021-01-07 20:03:56', '2021-01-07 20:03:56'),
(108, 113, 'Akinfemitan Akinsalejo', '2021-01-07 20:04:29', '2021-01-07 20:04:29'),
(109, 114, 'Akinruntan Akinsalejo', '2021-01-07 20:05:53', '2021-01-07 20:05:53'),
(110, 115, 'Yemisiola Ibrahim-Nupe', '2021-01-07 20:06:12', '2021-01-07 20:06:12'),
(111, 116, 'Akinfela Akinsalejo', '2021-01-07 20:07:33', '2021-01-07 20:07:33'),
(112, 117, 'Oluwasegun Amusan', '2021-01-07 20:08:58', '2021-01-07 20:08:58'),
(113, 118, 'Albert Ibhareboi', '2021-01-07 20:10:26', '2021-01-07 20:10:26'),
(114, 119, 'Oluwaseun Akintadenu', '2021-01-07 20:11:48', '2021-01-07 20:11:48'),
(115, 120, 'Uyi Esuare', '2021-01-07 20:12:18', '2021-01-07 20:12:18'),
(116, 121, 'Boluwatife Ogunwalesan', '2021-01-07 20:13:46', '2021-01-07 20:13:46'),
(117, 122, 'Solape Ogunwalaja', '2021-01-07 20:15:46', '2021-01-07 20:15:46'),
(118, 123, 'Olugbenga Adedugbegaja', '2021-01-07 20:17:48', '2021-01-07 20:17:48'),
(119, 124, 'Abikelomo Ogunwalemisi', '2021-01-07 20:19:13', '2021-01-07 20:19:13'),
(120, 125, 'Oyinwale Adedugbejunu', '2021-01-07 20:19:16', '2021-01-07 20:19:16'),
(121, 126, 'Olowoyele Adedugbelo', '2021-01-07 20:20:36', '2021-01-07 20:20:36'),
(122, 127, 'Abiodun Ogunwalesehin', '2021-01-07 20:21:15', '2021-01-07 20:21:15'),
(123, 128, 'AdeFemi Adedugbagbe', '2021-01-07 20:21:54', '2021-01-07 20:21:54'),
(124, 129, 'OmoLaja Abiodun-Ogunbi', '2021-01-07 20:23:19', '2021-01-07 20:23:19'),
(125, 130, 'Gbemisola Saraki-Mamade', '2021-01-07 20:23:39', '2021-01-07 20:23:39'),
(126, 131, 'Olusola Saraki-Oloye', '2021-01-07 20:31:12', '2021-01-07 20:31:12'),
(127, 132, 'Akintunde Fajabila', '2021-01-07 20:34:21', '2021-01-07 20:34:21'),
(128, 133, 'AdeWole Famakinwalo', '2021-01-07 20:37:00', '2021-01-07 20:37:00'),
(129, 134, 'Oluwole Famakinwatajobo', '2021-01-07 20:39:11', '2021-01-07 20:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `name`, `information`, `keyword`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Paystack', '{\"private_key\":\"sk_test_b612f25bd992c4d84760e312175c7515336b77fc\",\"public_key\":\"pk_test_41ada297a2a2953f9d42e125713644baccd0658c\",\"text\":\"Pay via Paystack\"}', 'paystack', '2021-01-01 17:16:57', '2021-01-02 12:25:01', 1),
(2, 'Flutter', '{\"private_key\":\"AVYKFEw63FtDt9aeYOe9biyifNI56s2Hc2F1Us11hWoY5GMuegipJRQBfWLiIKNbwQ5tmqKSrQTU3zB3\",\"public_key\":\"EJY0qOKliVg7wKsR3ubtSUwAaQoXQFgq-RLlk_sQuOKliVg7wKsR3ubtSUwAaQoXQFgq-RLlk_sQu\",\"text\":\"Pay via Flutter\"}', 'flutter', '2021-01-01 16:16:57', '2021-01-02 12:18:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `received_payments`
--

CREATE TABLE `received_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `payment_reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` enum('Online','Offline','Wallet') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `received_payments`
--

INSERT INTO `received_payments` (`id`, `user_id`, `service_request_id`, `payment_reference`, `payment_method`, `amount`, `created_at`, `updated_at`) VALUES
(1, 11, 9, '782422874', 'Online', 2500, '2021-01-02 17:51:26', '2021-01-02 17:51:26'),
(2, 77, 10, '150340551', 'Online', 1425, '2021-01-05 14:04:48', '2021-01-05 14:04:48'),
(3, 77, 11, '565158876', 'Online', 2500, '2021-01-05 14:11:54', '2021-01-05 14:11:54'),
(4, 71, 12, '527790925', 'Online', 2375, '2021-01-05 14:19:11', '2021-01-05 14:19:11'),
(5, 77, 13, '125622566', 'Online', 3500, '2021-01-05 14:21:55', '2021-01-05 14:21:55'),
(6, 77, 14, '367382258', 'Online', 1500, '2021-01-05 14:34:47', '2021-01-05 14:34:47'),
(7, 77, 15, '102412572', 'Online', 3500, '2021-01-05 15:07:46', '2021-01-05 15:07:46'),
(8, 71, 16, '727069896', 'Online', 2500, '2021-01-05 15:14:27', '2021-01-05 15:14:27'),
(10, 71, 18, '498483104', 'Online', 2500, '2021-01-05 15:17:16', '2021-01-05 15:17:16'),
(11, 71, 19, '583553003', 'Online', 4000, '2021-01-05 15:49:42', '2021-01-05 15:49:42'),
(12, 71, 20, '877878315', 'Online', 2800, '2021-01-05 15:59:51', '2021-01-05 15:59:51'),
(13, 71, 21, '165058490', 'Online', 3500, '2021-01-05 16:04:21', '2021-01-05 16:04:21'),
(16, 71, 24, '414379280', 'Online', 3500, '2021-01-05 16:05:43', '2021-01-05 16:05:43'),
(17, 81, 25, '215676596', 'Online', 2375, '2021-01-05 17:51:29', '2021-01-05 17:51:29'),
(19, 81, 27, '18896806', 'Online', 2500, '2021-01-05 17:52:52', '2021-01-05 17:52:52'),
(20, 81, 29, '791212433', 'Online', 2500, '2021-01-05 17:53:37', '2021-01-05 17:53:37'),
(21, 81, 30, '269085763', 'Online', 2500, '2021-01-05 17:58:46', '2021-01-05 17:58:46'),
(22, 81, 31, '165594599', 'Online', 4500, '2021-01-05 18:00:46', '2021-01-05 18:00:46'),
(23, 80, 32, '555373018', 'Online', 3135, '2021-01-05 18:21:05', '2021-01-05 18:21:05'),
(24, 80, 33, '257155850', 'Online', 3000, '2021-01-05 18:24:07', '2021-01-05 18:24:07'),
(25, 80, 34, '838688552', 'Online', 4500, '2021-01-05 18:27:26', '2021-01-05 18:27:26'),
(26, 80, 35, '648644767', 'Online', 2500, '2021-01-05 18:29:01', '2021-01-05 18:29:01'),
(27, 80, 36, '92427202', 'Online', 3500, '2021-01-05 18:31:31', '2021-01-05 18:31:31'),
(28, 79, 37, '532252195', 'Online', 2660, '2021-01-05 18:35:39', '2021-01-05 18:35:39'),
(29, 79, 38, '707882257', 'Online', 3000, '2021-01-05 18:39:05', '2021-01-05 18:39:05'),
(30, 79, 39, '318189798', 'Online', 4700, '2021-01-05 18:41:02', '2021-01-05 18:41:02'),
(31, 79, 40, '758255627', 'Online', 3500, '2021-01-05 18:44:46', '2021-01-05 18:44:46'),
(32, 79, 41, '84623047', 'Online', 3500, '2021-01-05 18:46:30', '2021-01-05 18:46:30'),
(33, 78, 42, '129310917', 'Online', 4465, '2021-01-05 18:52:46', '2021-01-05 18:52:46'),
(34, 78, 43, '377118283', 'Online', 3500, '2021-01-05 18:54:25', '2021-01-05 18:54:25'),
(35, 78, 44, '364578149', 'Online', 3300, '2021-01-05 18:57:09', '2021-01-05 18:57:09'),
(36, 78, 45, '380128491', 'Online', 1500, '2021-01-05 18:59:48', '2021-01-05 18:59:48'),
(37, 78, 46, '18230116', 'Online', 3000, '2021-01-05 19:03:31', '2021-01-05 19:03:31'),
(38, 72, 47, '609821578', 'Online', 2660, '2021-01-05 19:24:59', '2021-01-05 19:24:59'),
(40, 72, 49, '319851047', 'Online', 2500, '2021-01-06 07:29:05', '2021-01-06 07:29:05'),
(41, 72, 50, '993458039', 'Online', 1500, '2021-01-06 07:43:37', '2021-01-06 07:43:37'),
(43, 73, 52, '875909959', 'Online', 4465, '2021-01-06 08:33:28', '2021-01-06 08:33:28'),
(44, 73, 53, '769002988', 'Online', 2800, '2021-01-06 08:36:00', '2021-01-06 08:36:00'),
(47, 73, 56, '523449129', 'Online', 3500, '2021-01-06 09:03:43', '2021-01-06 09:03:43'),
(48, 74, 57, '412115262', 'Online', 2850, '2021-01-06 09:09:48', '2021-01-06 09:09:48'),
(50, 74, 59, '936841463', 'Online', 3500, '2021-01-06 09:16:59', '2021-01-06 09:16:59'),
(53, 75, 62, '62706597', 'Online', 2375, '2021-01-06 10:04:02', '2021-01-06 10:04:02'),
(54, 75, 63, '536155395', 'Online', 3500, '2021-01-06 10:07:02', '2021-01-06 10:07:02'),
(56, 75, 65, '991279553', 'Online', 3500, '2021-01-06 10:12:51', '2021-01-06 10:12:51'),
(57, 75, 66, '821550214', 'Online', 2500, '2021-01-06 10:14:06', '2021-01-06 10:14:06'),
(59, 11, 68, 'E-WAL-773B33', 'Wallet', 1500, '2021-01-11 00:39:56', '2021-01-11 00:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `rfqs`
--

CREATE TABLE `rfqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issued_by` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `batch_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `accepted` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rfqs`
--

INSERT INTO `rfqs` (`id`, `issued_by`, `client_id`, `service_request_id`, `batch_number`, `invoice_number`, `status`, `accepted`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 5, 11, 1, 'RFQ-C85BEA04', 'INV-E6572521', '1', 'Yes', 5800, '2020-12-28 15:58:54', '2021-01-02 14:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `rfq_batches`
--

CREATE TABLE `rfq_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfq_id` bigint(20) UNSIGNED NOT NULL,
  `component_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rfq_batches`
--

INSERT INTO `rfq_batches` (`id`, `rfq_id`, `component_name`, `model_number`, `quantity`, `amount`) VALUES
(1, 1, 'Power cable', 'PC-234234', 1, 2500),
(2, 1, '8GB RAM', 'RM-3242', 2, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `rfq_suppliers`
--

CREATE TABLE `rfq_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfq_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `devlivery_fee` int(10) UNSIGNED NOT NULL,
  `delivery_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rfq_suppliers`
--

INSERT INTO `rfq_suppliers` (`id`, `rfq_id`, `name`, `devlivery_fee`, `delivery_time`) VALUES
(1, 1, 'Emah Portfolio', 1450, 'January 2nd 2021, 7:00:00pm');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `name`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Uncategorized', '0', NULL, '2019-12-31 23:00:00', NULL),
(2, 1, 'Electricals', '1', NULL, '2020-12-05 09:15:38', NULL),
(3, 1, 'Plumbing', '1', NULL, '2020-12-05 09:16:30', NULL),
(4, 1, 'Refrigeration', '1', NULL, '2020-12-05 09:18:11', NULL),
(5, 1, 'Household Appliances', '1', NULL, '2020-12-05 09:19:11', NULL),
(6, 1, 'Locks & Security', '1', NULL, '2020-12-05 09:20:35', NULL),
(7, 1, 'Electronics', '1', NULL, '2020-12-05 09:07:03', '2021-01-01 06:05:18'),
(8, 1, 'Gadgets', '1', NULL, '2020-12-08 17:55:27', '2021-01-01 06:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `user_id`, `admin_id`, `cse_id`, `technician_id`, `service_id`, `category_id`, `job_reference`, `security_code`, `service_request_status_id`, `total_amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 6, 12, 15, 7, 1, 'REF-66EB5A26', 'SEC-27AEC73E', 6, 3325, NULL, '2020-12-14 12:39:55', '2021-01-02 14:38:30'),
(2, 10, NULL, NULL, NULL, 3, 2, 'REF-330CB862', 'SEC-88AC1B19', 1, 3300, NULL, '2020-12-14 12:48:20', NULL),
(5, 11, 6, 19, 15, 5, 3, 'REF-27D2F0BE', 'SEC-35FA9E28', 4, 2500, NULL, '2020-12-14 15:36:58', '2021-01-02 10:54:18'),
(6, 9, NULL, NULL, NULL, 3, 4, 'REF-1FC50FCC', 'SEC-EBC1D654', 1, 3500, NULL, '2020-12-15 09:33:01', NULL),
(7, 11, NULL, NULL, NULL, 7, 1, 'REF-131D985E', 'SEC-A62C515E', 1, 4700, NULL, '2020-12-15 09:51:29', '2021-01-02 12:01:24'),
(9, 11, NULL, NULL, NULL, 7, 1, 'REF-E1C71A87', 'SEC-6B5B72A2', 2, 2500, NULL, '2021-01-02 17:51:26', '2021-01-06 16:42:49'),
(10, 77, NULL, NULL, NULL, 5, 3, 'REF-7BEC1F70', 'SEC-DB2A0659', 1, 1425, NULL, '2021-01-05 14:04:48', '2021-01-05 14:04:48'),
(11, 77, NULL, NULL, NULL, 5, 3, 'REF-473E6826', 'SEC-18D80EE7', 2, 2500, NULL, '2021-01-05 14:11:54', '2021-01-05 15:11:45'),
(12, 71, NULL, NULL, NULL, 7, 1, 'REF-103203B9', 'SEC-BA62A4E5', 1, 2375, NULL, '2021-01-05 14:19:11', '2021-01-05 14:19:11'),
(13, 77, NULL, NULL, NULL, 5, 3, 'REF-CFDA9CE8', 'SEC-D296CAF1', 1, 3500, NULL, '2021-01-05 14:21:55', '2021-01-05 14:21:55'),
(14, 77, NULL, NULL, NULL, 5, 3, 'REF-52AF6E61', 'SEC-1CAC63AD', 2, 1500, NULL, '2021-01-05 14:34:47', '2021-01-05 15:10:07'),
(15, 77, NULL, NULL, NULL, 7, 1, 'REF-42D42C61', 'SEC-C8861654', 1, 3500, NULL, '2021-01-05 15:07:46', '2021-01-05 15:07:46'),
(16, 71, NULL, NULL, NULL, 5, 3, 'REF-4CBA5AB0', 'SEC-10A26400', 2, 2500, NULL, '2021-01-05 15:14:27', '2021-01-05 16:46:37'),
(17, 71, NULL, NULL, NULL, 5, 3, 'REF-525747FE', 'SEC-C8B3D428', 1, 2500, NULL, '2021-01-05 15:14:29', '2021-01-05 15:14:29'),
(18, 71, NULL, NULL, NULL, 5, 3, 'REF-EEE7FD14', 'SEC-92F0978A', 1, 2500, NULL, '2021-01-05 15:17:16', '2021-01-05 15:17:16'),
(19, 71, NULL, NULL, NULL, 3, 4, 'REF-79A722D6', 'SEC-02E65DEF', 1, 4000, NULL, '2021-01-05 15:49:42', '2021-01-05 15:49:42'),
(20, 71, NULL, NULL, NULL, 3, 2, 'REF-CBE87860', 'SEC-F3D8AEB0', 1, 2800, NULL, '2021-01-05 15:59:51', '2021-01-05 15:59:51'),
(21, 71, NULL, NULL, NULL, 7, 1, 'REF-FB0B7B30', 'SEC-8A044E7D', 1, 3500, NULL, '2021-01-05 16:04:21', '2021-01-05 16:04:21'),
(22, 71, NULL, NULL, NULL, 7, 1, 'REF-17D33982', 'SEC-930CE8A5', 1, 3500, NULL, '2021-01-05 16:04:23', '2021-01-05 16:04:23'),
(23, 71, NULL, NULL, NULL, 7, 1, 'REF-48FCCAF7', 'SEC-EFF284F2', 1, 3500, NULL, '2021-01-05 16:04:33', '2021-01-05 16:04:33'),
(24, 71, NULL, NULL, NULL, 7, 1, 'REF-5B02030C', 'SEC-4A9C03A0', 2, 3500, NULL, '2021-01-05 16:05:43', '2021-01-05 16:40:00'),
(25, 81, NULL, NULL, NULL, 7, 1, 'REF-F024810F', 'SEC-994F80B2', 1, 2375, NULL, '2021-01-05 17:51:29', '2021-01-05 17:51:29'),
(26, 81, NULL, NULL, NULL, 7, 1, 'REF-E4674993', 'SEC-B523B6E0', 2, 2500, NULL, '2021-01-05 17:51:35', '2021-01-05 17:54:58'),
(27, 81, NULL, NULL, NULL, 7, 1, 'REF-946C9191', 'SEC-859C427D', 2, 2500, NULL, '2021-01-05 17:52:52', '2021-01-05 17:54:39'),
(29, 81, NULL, NULL, NULL, 7, 1, 'REF-781E7707', 'SEC-C9D867EC', 2, 2500, NULL, '2021-01-05 17:53:37', '2021-01-05 17:54:18'),
(30, 81, NULL, NULL, NULL, 5, 3, 'REF-93080B0A', 'SEC-3E8B51D9', 1, 2500, NULL, '2021-01-05 17:58:46', '2021-01-05 17:58:46'),
(31, 81, NULL, NULL, NULL, 3, 2, 'REF-A3EDB578', 'SEC-28521A20', 1, 4500, NULL, '2021-01-05 18:00:46', '2021-01-05 18:00:46'),
(32, 80, NULL, NULL, NULL, 3, 2, 'REF-D5521B5F', 'SEC-DFF6BAD1', 2, 3135, NULL, '2021-01-05 18:21:05', '2021-01-05 18:32:50'),
(33, 80, NULL, NULL, NULL, 3, 4, 'REF-538B2830', 'SEC-F654C049', 1, 3000, NULL, '2021-01-05 18:24:07', '2021-01-05 18:24:07'),
(34, 80, NULL, NULL, NULL, 3, 2, 'REF-E602F90D', 'SEC-A4A597D5', 2, 4500, NULL, '2021-01-05 18:27:26', '2021-01-05 18:32:02'),
(35, 80, NULL, NULL, NULL, 7, 1, 'REF-201D4CDA', 'SEC-7A6EA728', 1, 2500, NULL, '2021-01-05 18:29:01', '2021-01-05 18:29:01'),
(36, 80, NULL, NULL, NULL, 5, 3, 'REF-678E7789', 'SEC-B7073B7F', 1, 3500, NULL, '2021-01-05 18:31:31', '2021-01-05 18:31:31'),
(37, 79, NULL, NULL, NULL, 3, 2, 'REF-A2A3245E', 'SEC-CA9A3A42', 1, 2660, NULL, '2021-01-05 18:35:39', '2021-01-05 18:35:39'),
(38, 79, NULL, NULL, NULL, 3, 4, 'REF-023E2780', 'SEC-D2B5823C', 2, 3000, NULL, '2021-01-05 18:39:05', '2021-01-05 18:48:27'),
(39, 79, NULL, NULL, NULL, 7, 1, 'REF-8323A890', 'SEC-5932D532', 2, 4700, NULL, '2021-01-05 18:41:02', '2021-01-05 18:47:52'),
(40, 79, NULL, NULL, NULL, 3, 4, 'REF-10B62418', 'SEC-69C237FD', 1, 3500, NULL, '2021-01-05 18:44:46', '2021-01-05 18:44:46'),
(41, 79, NULL, NULL, NULL, 5, 3, 'REF-8B6BFB56', 'SEC-693165FD', 1, 3500, NULL, '2021-01-05 18:46:30', '2021-01-05 18:46:30'),
(42, 78, NULL, NULL, NULL, 7, 1, 'REF-BF3FC109', 'SEC-22F07584', 1, 4465, NULL, '2021-01-05 18:52:46', '2021-01-05 18:52:46'),
(43, 78, NULL, NULL, NULL, 5, 3, 'REF-282CB9FB', 'SEC-EB6A67AA', 2, 3500, NULL, '2021-01-05 18:54:25', '2021-01-05 19:04:32'),
(44, 78, NULL, NULL, NULL, 3, 2, 'REF-062960E8', 'SEC-C420C4B0', 1, 3300, NULL, '2021-01-05 18:57:09', '2021-01-05 18:57:09'),
(45, 78, NULL, NULL, NULL, 5, 3, 'REF-E7420AB6', 'SEC-AF66D6E6', 1, 1500, NULL, '2021-01-05 18:59:48', '2021-01-05 18:59:48'),
(46, 78, NULL, NULL, NULL, 3, 4, 'REF-05C9D56E', 'SEC-42FCDBC1', 2, 3000, NULL, '2021-01-05 19:03:31', '2021-01-05 19:04:03'),
(47, 72, NULL, NULL, NULL, 3, 2, 'REF-333C7AE6', 'SEC-E5339D31', 1, 2660, NULL, '2021-01-05 19:24:59', '2021-01-05 19:24:59'),
(48, 72, NULL, NULL, NULL, 3, 2, 'REF-8FF9184A', 'SEC-94ED8247', 2, 2800, NULL, '2021-01-05 19:25:00', '2021-01-06 08:16:08'),
(49, 72, NULL, NULL, NULL, 7, 1, 'REF-58471A21', 'SEC-DC6CDF0E', 1, 2500, NULL, '2021-01-06 07:29:05', '2021-01-06 07:29:05'),
(50, 72, NULL, NULL, NULL, 5, 3, 'REF-1F5B3509', 'SEC-C7DE50E2', 1, 1500, NULL, '2021-01-06 07:43:37', '2021-01-06 07:43:37'),
(51, 72, NULL, NULL, NULL, 5, 3, 'REF-641E3BAF', 'SEC-322AF127', 2, 1500, NULL, '2021-01-06 07:43:39', '2021-01-06 07:46:10'),
(52, 73, NULL, NULL, NULL, 7, 1, 'REF-CE71FFEE', 'SEC-FE0872DB', 1, 4465, NULL, '2021-01-06 08:33:28', '2021-01-06 08:33:28'),
(53, 73, NULL, NULL, NULL, 3, 2, 'REF-E512CA0E', 'SEC-744373A5', 1, 2800, NULL, '2021-01-06 08:36:00', '2021-01-06 08:36:00'),
(54, 73, NULL, NULL, NULL, 3, 2, 'REF-FFDDEC32', 'SEC-44C3BBE6', 2, 2800, NULL, '2021-01-06 08:36:01', '2021-01-06 09:05:46'),
(55, 73, NULL, NULL, NULL, 3, 2, 'REF-3A0EFE3C', 'SEC-72A48287', 2, 2800, NULL, '2021-01-06 08:36:08', '2021-01-06 09:05:04'),
(56, 73, NULL, NULL, NULL, 3, 4, 'REF-F50C4CC2', 'SEC-92B32D85', 1, 3500, NULL, '2021-01-06 09:03:43', '2021-01-06 09:03:43'),
(57, 74, NULL, NULL, NULL, 3, 4, 'REF-9AF58AE0', 'SEC-6CBFC290', 1, 2850, NULL, '2021-01-06 09:09:48', '2021-01-06 09:09:48'),
(58, 74, NULL, NULL, NULL, 3, 4, 'REF-0C8E1C14', 'SEC-8CC1DD83', 2, 3000, NULL, '2021-01-06 09:09:49', '2021-01-06 09:11:20'),
(59, 74, NULL, NULL, NULL, 7, 1, 'REF-3FD95205', 'SEC-3819326C', 2, 3500, NULL, '2021-01-06 09:16:59', '2021-01-06 09:18:25'),
(60, 74, NULL, NULL, NULL, 7, 1, 'REF-6B01DE7E', 'SEC-A5D53CBA', 1, 3500, NULL, '2021-01-06 09:17:00', '2021-01-06 09:17:00'),
(61, 74, NULL, NULL, NULL, 7, 1, 'REF-C4CE8EBC', 'SEC-133661E1', 1, 3500, NULL, '2021-01-06 09:17:08', '2021-01-06 09:17:08'),
(62, 75, NULL, NULL, NULL, 7, 1, 'REF-3975C909', 'SEC-2C9D2447', 1, 2375, NULL, '2021-01-06 10:04:02', '2021-01-06 10:04:02'),
(63, 75, NULL, NULL, NULL, 5, 3, 'REF-7C7F09DA', 'SEC-297A2F9E', 2, 3500, NULL, '2021-01-06 10:07:02', '2021-01-06 10:07:42'),
(64, 75, NULL, NULL, NULL, 5, 3, 'REF-B7A427B8', 'SEC-79ED8300', 1, 3500, NULL, '2021-01-06 10:07:03', '2021-01-06 10:07:03'),
(65, 75, NULL, NULL, NULL, 3, 4, 'REF-DBCBEA24', 'SEC-7A157DBA', 1, 3500, NULL, '2021-01-06 10:12:51', '2021-01-06 10:12:51'),
(66, 75, NULL, NULL, NULL, 7, 1, 'REF-EA418652', 'SEC-8E47F33D', 1, 2500, NULL, '2021-01-06 10:14:06', '2021-01-06 10:14:06'),
(67, 75, NULL, NULL, NULL, 7, 1, 'REF-5CB26E66', 'SEC-B2C27ABC', 2, 2500, NULL, '2021-01-06 10:14:07', '2021-01-06 10:15:09'),
(68, 11, NULL, NULL, NULL, 5, 3, 'REF-364C34DF', 'SEC-773B334E', 1, 1500, NULL, '2021-01-11 00:39:56', '2021-01-11 00:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `service_request_cancellation_reasons`
--

CREATE TABLE `service_request_cancellation_reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_request_cancellation_reasons`
--

INSERT INTO `service_request_cancellation_reasons` (`id`, `user_id`, `service_request_id`, `reason`, `created_at`, `updated_at`) VALUES
(2, 77, 14, 'The fault has been rectified', '2021-01-05 15:10:07', '2021-01-05 15:10:07'),
(3, 77, 11, 'Late response from CSE', '2021-01-05 15:11:45', '2021-01-05 15:11:45'),
(4, 71, 24, 'Performed a hard restart and computer works fine now.', '2021-01-05 16:40:00', '2021-01-05 16:40:00'),
(5, 71, 16, 'Plug pulled out of the electric supply mains. I plugged it back in properly and machine works just fine.', '2021-01-05 16:46:37', '2021-01-05 16:46:37'),
(6, 81, 29, 'wrong request', '2021-01-05 17:54:18', '2021-01-05 17:54:18'),
(7, 81, 27, 'wrong request...', '2021-01-05 17:54:39', '2021-01-05 17:54:39'),
(8, 81, 26, 'repeated request', '2021-01-05 17:54:58', '2021-01-05 17:54:58'),
(9, 80, 34, 'not available for repairs', '2021-01-05 18:32:02', '2021-01-05 18:32:02'),
(10, 80, 32, 'not available for repairs', '2021-01-05 18:32:50', '2021-01-05 18:32:50'),
(11, 79, 39, 'alternative has been gotten, thanks', '2021-01-05 18:47:52', '2021-01-05 18:47:52'),
(12, 79, 38, 'found an alternative', '2021-01-05 18:48:27', '2021-01-05 18:48:27'),
(13, 78, 46, 'i just want to cancel', '2021-01-05 19:04:03', '2021-01-05 19:04:03'),
(14, 78, 43, 'False alarm from my housekeepers', '2021-01-05 19:04:32', '2021-01-05 19:04:32'),
(15, 72, 51, 'Pressed reset button. Now working', '2021-01-06 07:46:10', '2021-01-06 07:46:10'),
(16, 72, 48, 'Fixed already', '2021-01-06 08:16:08', '2021-01-06 08:16:08'),
(17, 73, 55, 'Fixed', '2021-01-06 09:05:04', '2021-01-06 09:05:04'),
(18, 73, 54, 'fixed', '2021-01-06 09:05:46', '2021-01-06 09:05:46'),
(19, 74, 58, 'Fixed', '2021-01-06 09:11:20', '2021-01-06 09:11:20'),
(20, 74, 59, 'Fixed', '2021-01-06 09:18:25', '2021-01-06 09:18:25'),
(21, 75, 63, 'double booking', '2021-01-06 10:07:42', '2021-01-06 10:07:42'),
(22, 75, 67, 'Double book', '2021-01-06 10:15:09', '2021-01-06 10:15:09'),
(23, 11, 9, 'Testing cancellation update', '2021-01-06 16:38:55', '2021-01-06 16:38:55'),
(24, 11, 9, 'Testing cancellation update', '2021-01-06 16:42:49', '2021-01-06 16:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `service_request_details`
--

CREATE TABLE `service_request_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_request_details`
--

INSERT INTO `service_request_details` (`id`, `service_request_id`, `state_id`, `lga_id`, `town`, `initial_service_fee`, `discount_service_fee`, `service_fee_name`, `phone_number`, `address`, `description`, `timestamp`, `media_file`, `payment_method`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 25, 359, 'Falomo', 3500, 3325, 'Urgent', '08034516844', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'My pc no longer comes on even when plugged into a power source.', 'December 14th 2020, 12:00:00pm', '66eb5a26f7f961fca75c73ba0a65e4110a5dc9af.jpg', 'Online', NULL, '2020-12-14 12:39:55', '2020-12-14 12:39:55'),
(2, 2, 25, 359, 'Falomo', 3300, NULL, 'Urgent', '08167836902', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'Hello FixMaster, my kitchen pipe broke and water is spilling everywhere, kindly send someone over...it\'s of utmost urgency. Thanks', 'December 15th 2020, 10:00:00am', NULL, 'Online', NULL, '2020-12-14 12:48:20', '2020-12-14 12:48:20'),
(3, 5, 25, 359, 'Falomo', 2500, NULL, 'Standard', '08034516844', '127B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'My dishwasher broke, and its spilling water everywhere. Please send someone, ASAP!', 'December 15th 2020, 11:00:00am', NULL, 'Online', NULL, '2020-12-14 15:36:58', '2020-12-14 15:36:58'),
(4, 6, 25, 359, 'Falomo', 3500, NULL, 'Urgent', '08034516844', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'Testing 222', 'December 27th 2020, 4:00:00pm', NULL, 'Online', NULL, '2020-12-15 09:33:01', '2020-12-15 09:33:01'),
(5, 7, 25, 359, 'Falomo', 4700, NULL, 'Out of Hours', '08034516844', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'Please I urgently need a repair for my computer, It goes off saying overheating. I think the fan is faulty. You know it\'s New Year, so I\'ll need as swift response, thanks.', 'January 1st 2021, 11:00:00am', NULL, 'Online', NULL, '2020-12-15 09:51:29', '2021-01-01 07:42:03'),
(7, 9, 25, 359, 'Falomo', 2500, NULL, 'Standard', '09035547107', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'Testing Paystack payment gateway', 'January 5th 2021, 10:00:00am', NULL, 'Online', NULL, '2021-01-02 17:51:26', '2021-01-02 17:51:26'),
(8, 10, 25, 359, 'Ikoyi', 1500, 1425, 'Standard', '07069385490', '31, Ademola Adetokunmbo Street, Road 24, Ikoyi Lagos.', 'the dish washer keeps cracking the porcelain dishes. Its a  Hiace product, Model 34675HZXT1 2013 version 2A brand\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while your own battery won’t charge, tethering you to your desk? Has a travel website that advertises itself as convenient and integrated caused serious problems with your travel plans? Mention any such contrasts if they apply.\r\nHoverbike’s reputation and marketing emphasize your bicycles’ durability, reliability, and safety. Before this mechanical failure, I was very pleased with my Hoverbike, and in a few years I will need to upgrade to a larger one as I grow, but now I hesitate to choose one. My brother and sister also own Hoverbikes that are functioning perfectly, and they aren’t so sure that that they will stick with the brand after watching my experiences with the mechanical failure of my Hoverbike.\r\nIf your marketing campaigns are any indication, I am your target customer, a young girl who is allowed to explore her town on her own and use her bicycle for travel and recreational rides. More importantly, I am eight years old and look forward to a future of eco-conscious commuting. I hope to have many decades of cycling ahead of me, and I want to continue riding Hoverbikes in the future. Please restore my faith in your brand, stand behind your product, and cover the cost of this repair.\r\nThank you for taking the time to read this letter.\r\nSincerely,\r\nLisa Simpson\r\n610-555-3223\r\nlsimpson@springfield.k12.us\r\nThat’s it! It can also help in some cases to give the company a reasonable deadline to respond to you, and to outline any other acceptable resolutions. Telling the company what you want is an important starting point, even if what you want is only an apology.\r\nRELATED:\r\nGet Past Executive Customer Service Gatekeepers With Letter-Writing 101\r\n8 Ways To Make Sure Your Complaint Letter Will Be Ignored\r\n5 Sample Letters That Get Debt Collectors Out Of Your Face\r\n\r\nEditor\'s Note: This article originally appeared on Consumerist.\r\n\r\n\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while your own battery won’t charge, tethering you to your desk? Has a travel website that advertises itself as convenient and integrated caused serious problems with your travel plans? Mention any such contrasts if they apply.\r\nHoverbike’s reputation and marketing emphasize your bicycles’ durability, reliability, and safety. Before this mechanical failure, I was very pleased with my Hoverbike, and in a few years I will need to upgrade to a larger one as I grow, but now I hesitate to choose one. My brother and sister also own Hoverbikes that are functioning perfectly, and they aren’t so sure that that they will stick with the brand after watching my experiences with the mechanical failure of my Hoverbike.\r\nIf your marketing campaigns are any indication, I am your target customer, a young girl who is allowed to explore her town on her own and use her bicycle for travel and recreational rides. More importantly, I am eight years old and look forward to a future of eco-conscious commuting. I hope to have many decades of cycling ahead of me, and I want to continue riding Hoverbikes in the future. Please restore my faith in your brand, stand behind your product, and cover the cost of this repair.\r\nThank you for taking the time to read this letter.\r\nSincerely,\r\nLisa Simpson\r\n610-555-3223\r\nlsimpson@springfield.k12.us\r\nThat’s it! It can also help in some cases to give the company a reasonable deadline to respond to you, and to outline any other acceptable resolutions. Telling the company what you want is an important starting point, even if what you want is only an apology.\r\nRELATED:\r\nGet Past Executive Customer Service Gatekeepers With Letter-Writing 101\r\n8 Ways To Make Sure Your Complaint Letter Will Be Ignored\r\n5 Sample Letters That Get Debt Collectors Out Of Your Face\r\n\r\nEditor\'s Note: This article originally appeared on Consumerist.', 'January 6th 2021, 12:00:00pm', NULL, 'Online', NULL, '2021-01-05 14:04:48', '2021-01-05 19:12:41'),
(9, 11, 25, 359, 'Ikoyi', 2500, NULL, 'Urgent', '08135242726', '31, Ademola Adetokunmbo Street, Road 24, Ikoyi Lagos.', 'the wash hand basin pipe is burst and flooding the bathroom badly. water keeps gushing, the bedroom  is flooding.', 'January 5th 2021, 2:00:00pm', NULL, 'Online', NULL, '2021-01-05 14:11:54', '2021-01-05 14:11:54'),
(10, 12, 23, 359, 'Ibadan', 2500, 2375, 'Standard', '08022233557', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Broken Laptop screen', 'January 5th 2021, 5:00:00pm', '103203b9b084f239a70b27a4ad83ac5a77c75d5e.jfif', 'Online', NULL, '2021-01-05 14:19:11', '2021-01-05 14:19:11'),
(11, 13, 25, 359, 'Ikoyi', 3500, NULL, 'Out of Hours', '07069385490', '284, ajose adeogun street, lagos', 'Washing machine plug is sparking. the cable appears melted.. Thermocool washing machine.\r\nIt’s hard to know where to start when writing a complaint letter. If our inbox is any indication, this difficulty manifests itself in free-form rants and confusion about what to say. It doesn’t have to be that way: simply stating the facts and explaining why the company should help you is enough. If you aren’t much of a wordsmith, Consumerist is here to help.\r\nHere’s an example letter, based on a recent successful complaint to a car manufacturer that crossed our desk recently. We’ve obscured the details, but the overall format of the letter remains the same.', 'January 7th 2021, 8:00:00pm', 'cfda9ce8a83b225f9d460ef73c146ade4f1ae7c6.jfif', 'Online', NULL, '2021-01-05 14:21:55', '2021-01-05 19:09:00'),
(12, 14, 25, 359, 'Ikoyi', 1500, NULL, 'Standard', '07069385490', '31, Ademola Adetokunmbo Street, Road 24, Ikoyi Lagos.', 'washing machine plug is sparking', 'January 8th 2021, 4:00:00pm', NULL, 'Online', NULL, '2021-01-05 14:34:47', '2021-01-05 14:34:47'),
(13, 15, 25, 359, 'Ikoyi', 3500, NULL, 'Urgent', '07069385490', '31, Ademola Adetokunmbo Street, Road 24, Ikoyi Lagos.', 'my laptop screen is orange colour. the laptop is a silver HP I core i3 10th gen\r\nThe summary. If you can’t sum your problem up in two or three sentences, have someone else read your e-mail and do it for you. As Consumerist’s tipline reader, I cannot emphasize enough the importance of getting your point across before the letter-reader’s eyes glaze over.\r\nIn the first paragraph, put your problem and suggested resolution. Then get on with the details.\r\n742 Evergreen Terrace\r\nSpringfield, USA 23456\r\nJuly 19, 2014\r\nHoverbike Corporation of America\r\nAttn: Customer Service\r\nP.O. Box 1578\r\nKabletown, WV 25414\r\nDear Hoverbike Corporation:\r\nI am writing to your company about a problem with my Hoverbike, a 2012 Skylark model. I began to have trouble staying aloft a few months ago, and this week the height control module completely failed. While the bicycle is a few months out of warranty, I believe that this occurred because of a design flaw in the Skylark, and I am asking that your company cover or share with me the cost of the required repair.\r\nNext are the details: who, what, where, when? Include addresses, store numbers, and serial numbers if applicable to your situation. Here you can add more details about your incident or problem and elaborate on what you recounted in the opening sentences if you need to.\r\nMy parents purchased my Hoverbike (serial number 118532C423) for me on April 21, 2012 from our local authorized Hoverbike dealer, Krebs Cycles of Springfield. I have enjoyed riding my bicycle, but also taken good care of it, performing all recommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.', 'January 7th 2021, 4:00:00pm', '42d42c617824a1d710c5817537a9be9cb3d40c2e.jpg', 'Online', NULL, '2021-01-05 15:07:46', '2021-01-05 19:09:41'),
(14, 16, 23, 359, 'Ibadan', 2500, NULL, 'Urgent', '08023412345', '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', 'Dish washer stopped suddenly', 'January 12th 2021, 5:00:00pm', NULL, 'Online', NULL, '2021-01-05 15:14:27', '2021-01-05 15:14:27'),
(15, 17, 23, 359, 'Ibadan', 2500, NULL, 'Urgent', '08023412345', '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', 'Dish washer stopped suddenly', 'January 12th 2021, 5:00:00pm', NULL, 'Online', NULL, '2021-01-05 15:14:29', '2021-01-05 15:14:29'),
(16, 18, 23, 359, 'Ibadan', 2500, NULL, 'Urgent', '08021233456', '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos.', 'Dishwasher suddenly stopped working', 'January 12th 2021, 5:00:00pm', NULL, 'Online', NULL, '2021-01-05 15:17:16', '2021-01-05 15:17:16'),
(17, 19, 23, 359, 'Ibadan', 4000, NULL, 'Out of Hours', '08022233557', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Blocked drainage. Waste water is returning into premises', 'January 5th 2021, 5:00:00pm', NULL, 'Online', NULL, '2021-01-05 15:49:42', '2021-01-05 15:49:42'),
(18, 20, 23, 359, 'Ibadan', 2800, NULL, 'Standard', '08012345678', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Leaking bath tub\r\nTap not running\r\nHeater not working\r\nShower is broken\r\nWaste water returning into bath tub\r\nSmelling drainage', 'January 6th 2021, 6:00:00pm', 'cbe87860537864943f1cd45fb8693dc750160485.docx', 'Online', NULL, '2021-01-05 15:59:51', '2021-01-05 17:06:45'),
(19, 21, 23, 359, 'Ibadan', 3500, NULL, 'Urgent', '08022233557', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'System crash error message displayed on screen', 'January 6th 2021, 9:00:00am', 'fb0b7b305ef30ba3c2cc6f393f0d896152590217.jfif', 'Online', NULL, '2021-01-05 16:04:21', '2021-01-05 16:04:21'),
(20, 22, 23, 359, 'Ibadan', 3500, NULL, 'Urgent', '08022233557', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'System crash error message displayed on screen', 'January 6th 2021, 9:00:00am', '17d3398264884ab2ca2b1805820333bc7afdaa6c.jfif', 'Online', NULL, '2021-01-05 16:04:23', '2021-01-05 16:04:23'),
(21, 23, 23, 359, 'Ibadan', 3500, NULL, 'Urgent', '08022233557', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'System crash error message displayed on screen\r\nBlinking Low battery light\r\nAudio button not responding\r\nUpdates not running\r\nAntivirus outdated\r\nSystem running slow', 'January 6th 2021, 9:00:00am', '48fccaf73acb8e30fd4e165dc3ca57502962c06d.jfif', 'Online', NULL, '2021-01-05 16:04:33', '2021-01-05 16:59:29'),
(22, 24, 23, 359, 'Ibadan', 3500, NULL, 'Urgent', '08022233557', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'System crash error message displayed on screen', 'January 6th 2021, 9:00:00am', NULL, 'Online', NULL, '2021-01-05 16:05:43', '2021-01-05 16:05:43'),
(23, 25, 25, 359, 'Victoria Island', 2500, 2375, 'Standard', '08099384297', '276 Adeola odeku, victoria island, Lagos', 'there is no light in the house. all sockets and switched tripped off\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while \r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability whilerecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while', 'January 6th 2021, 11:00:00am', NULL, 'Online', NULL, '2021-01-05 17:51:29', '2021-01-05 19:51:03'),
(24, 26, 25, 359, 'Victoria Island', 2500, NULL, 'Standard', '08099384297', '276 Adeola odeku, victoria island, Lagos', 'there is no light in the house. all sockets and switched tripped off', 'January 6th 2021, 11:00:00am', NULL, 'Online', NULL, '2021-01-05 17:51:35', '2021-01-05 17:51:35'),
(25, 27, 25, 359, 'Victoria Island', 2500, NULL, 'Standard', '08099384297', '2004, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'there is no light in the house. all sockets and switched tripped off', 'January 6th 2021, 11:00:00am', NULL, 'Online', NULL, '2021-01-05 17:52:52', '2021-01-05 17:52:52'),
(26, 29, 25, 359, 'Victoria Island', 2500, NULL, 'Standard', '08099384297', '276 Adeola odeku, victoria island, Lagos', 'there is no light in the house. all sockets and switched tripped off', 'January 6th 2021, 11:00:00am', NULL, 'Online', NULL, '2021-01-05 17:53:37', '2021-01-05 17:53:37'),
(27, 30, 25, 359, 'Victoria Island', 2500, NULL, 'Urgent', '08099384297', '2004, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'the washing machine is emitting shock waves\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\n\\recommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\nrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while', 'January 5th 2021, 6:57:00pm', NULL, 'Online', NULL, '2021-01-05 17:58:46', '2021-01-05 19:49:40'),
(28, 31, 25, 359, 'Victoria Island', 4500, NULL, 'Out of Hours', '08099384297', '2004, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'the bathtub is rusty and needs to be changed\r\nRELATED:\r\nGet Past Executive Customer Service Gatekeepers With Letter-Writing 101\r\n8 Ways To Make Sure Your Complaint Letter Will Be Ignoredrecommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while\r\n5 Sample Letters That Get Debt Collectors Out Of Your Face\r\n\r\nEditor\'s Note: This article originally appeared on Consumerist.\r\n\r\nStart Getting Membership Benefits Today!\r\n\r\nUseful tools, trusted advice, important safety news.\r\nJoin\r\n    \r\nConsumer Reports\r\nMember Support\r\nContact Us\r\nAccount Settings\r\nWhat is Membership?\r\nMake a Donation\r\nNewsletters\r\nGive a Gift\r\nAbout\r\nAbout Us\r\nCareer Opportunities\r\nMedia Room\r\nAdvocacy\r\nData Intelligence\r\nDigital Lab', 'January 7th 2021, 9:00:00pm', NULL, 'Online', NULL, '2021-01-05 18:00:46', '2021-01-05 19:48:40'),
(29, 32, 25, 359, 'Victoria Island', 3300, 3135, 'Urgent', '0815557446', '31, Adetoun Adeola, Victoria Island, Lagos.', 'arson water heater is not dispensing hot water', 'January 6th 2021, 8:00:00am', NULL, 'Online', NULL, '2021-01-05 18:21:05', '2021-01-05 18:21:05'),
(30, 33, 25, 359, 'Victoria Island', 3000, NULL, 'Standard', '08069386541', '31, Adetoun Adeola, Victoria Island, Lagos.', 'broken cover of septic tank\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while your own battery won’t charge, tethering you to your desk? Has a travel website that advertises itself as convenient and integrated caused serious problems with your travel plans? Mention any such contrasts if they apply.\r\nHoverbike’s reputation and marketing emphasize your bicycles’ durability, reliability, and safety. Before this mechanical failure, I was very pleased with my Hoverbike, and in a few years I will need to upgrade to a larger one as I grow, but now I hesitate to choose one. My brother and sister also own Hoverbikes that are functioning perfectly, and they aren’t so sure that that they will stick with the brand after watching my experiences with the mechanical failure of my Hoverbike.\r\nIf your marketing campaigns are any indication, I am your target customer, a young girl who is allowed to explore her town on her own and use her bicycle for travel and recreational rides. More importantly, I am eight years old and look forward to a future of eco-conscious commuting. I hope to have many decades of cycling ahead of me, and I want to continue riding Hoverbikes in the future. Please restore my faith in your brand, stand behind your product, and cover the cost of this repair.\r\nThank you for taking the time to read this letter.\r\nSincerely,\r\nLisa Simpson\r\n610-555-3223', 'January 9th 2021, 8:00:00pm', NULL, 'Online', NULL, '2021-01-05 18:24:07', '2021-01-05 19:41:08'),
(31, 34, 25, 359, 'Victoria Island', 4500, NULL, 'Out of Hours', '08069386541', '31, Adetoun Adeola, Victoria Island, Lagos.', 'Water is leaking from the kitchen wall tiles', 'January 5th 2021, 6:00:00am', 'e602f90dafa968d4e39ab2ed6f7dfdd6b384f6da.jpg', 'Online', NULL, '2021-01-05 18:27:26', '2021-01-05 18:27:26'),
(32, 35, 25, 359, 'Victoria Island', 2500, NULL, 'Standard', '08069386541', '31, Adetoun Adeola, Victoria Island, Lagos.', 'tv screen is blurred...Panasonic 2013 grade A model\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while your own battery won’t charge, tethering you to your desk? Has a travel website that advertises itself as convenient and integrated caused serious problems with your travel plans? Mention any such contrasts if they apply.\r\nHoverbike’s reputation and marketing emphasize your bicycles’ durability, reliability, and safety. Before this mechanical failure, I was very pleased with my Hoverbike, and in a few years I will need to upgrade to a larger one as I grow, but now I hesitate to choose one. My brother and sister also own Hoverbikes that are functioning perfectly, and they aren’t so sure that that they will stick with the brand after watching my experiences with the mechanical failure of my Hoverbike.\r\nIf your marketing campaigns are any indication, I am your target customer, a young girl who is allowed to explore her town on her own and use her bicycle for travel and recreational rides. More importantly, I am eight years old and look forward to a future of eco-conscious commuting. I hope to have many decades of cycling ahead of me, and I want to continue riding Hoverbikes in the future. Please restore my faith in your brand, stand behind your product, and cover the cost of this repair.\r\nThank you for taking the time to read this letter.\r\nSincerely,\r\nLisa Simpson\r\n610-555-3223', 'January 9th 2021, 1:00:00pm', NULL, 'Online', NULL, '2021-01-05 18:29:01', '2021-01-05 19:40:45'),
(33, 36, 25, 359, 'Victoria Island', 3500, NULL, 'Out of Hours', '08069386541', '31, Adetoun Adeola, Victoria Island, Lagos.\r\n\r\nBuchi Omotosho is inviting you to a scheduled Zoom meeting.\r\n\r\nTopic: FixMaster Test Review Zoom Meeting\r\nTime: Jan 5, 2021 09:00 PM Paris\r\n\r\nJoin Zoom Meeting\r\nhttps://us04web.zoom.us/j/78053152877?pwd=dFRDV2tRcmtVK0ZQOHVyNEhya3pWUT09\r\n\r\nMeeting ID: 780 5315 2877\r\nPasscode: 4YL56D', 'water dispenser is faulty and needs replacement\r\nBuchi Omotosho is inviting you to a scheduled Zoom meeting.\r\n\r\nTopic: FixMaster Test Review Zoom Meeting\r\nTime: Jan 5, 2021 09:00 PM Paris\r\n\r\nJoin Zoom Meeting\r\nhttps://us04web.zoom.us/j/78053152877?pwd=dFRDV2tRcmtVK0ZQOHVyNEhya3pWUT09\r\n\r\nMeeting ID: 780 5315 2877\r\nPasscode: 4YL56D\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while your own battery won’t charge, tethering you to your desk? Has a travel website that advertises itself as convenient and integrated caused serious problems with your travel plans? Mention any such contrasts if they apply.\r\nHoverbike’s reputation and marketing emphasize your bicycles’ durability, reliability, and safety. Before this mechanical failure, I was very pleased with my Hoverbike, and in a few years I will need to upgrade to a larger one as I grow, but now I hesitate to choose one. My brother and sister also own Hoverbikes that are functioning perfectly, and they aren’t so sure that that they will stick with the brand after watching my experiences with the mechanical failure of my Hoverbike.\r\nIf your marketing campaigns are any indication, I am your target customer, a young girl who is allowed to explore her town on her own and use her bicycle for travel and recreational rides. More importantly, I am eight years old and look forward to a future of eco-conscious commuting. I hope to have many decades of cycling ahead of me, and I want to continue riding Hoverbikes in the future. Please restore my faith in your brand, stand behind your product, and cover the cost of this repair.\r\nThank you for taking the time to read this letter.\r\nSincerely,\r\nLisa Simpson\r\n610-555-3223', 'January 10th 2021, 7:29:00pm', '678e7789bb62f0d447ee7e7d5cf196e07174bd63.jpg', 'Online', NULL, '2021-01-05 18:31:31', '2021-01-05 19:37:32'),
(34, 37, 25, 359, 'Lekki', 2800, 2660, 'Standard', '0909386641', '45, Lekki phase 1 road, Victoria Island', 'the pressure from the pipes in the bathtub and kitchen are very low\r\n\r\nYet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while your own battery won’t charge, tethering you to your desk? Has a travel website that advertises itself as convenient and integrated caused serious problems with your travel plans? Mention any such contrasts if they apply.', 'January 10th 2021, 8:00:00pm', NULL, 'Online', NULL, '2021-01-05 18:35:39', '2021-01-05 19:21:45'),
(35, 38, 25, 359, 'Lekki', 3000, NULL, 'Standard', '0909386641', '31, Eke Dipo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'the head of the shower in all the 5 bedrooms require replacement.', 'January 9th 2021, 4:00:00pm', '023e2780ae1d9710a398209013d6f92a320125e6.jpg', 'Online', NULL, '2021-01-05 18:39:05', '2021-01-05 18:39:05'),
(36, 39, 25, 359, 'Lekki', 4700, NULL, 'Out of Hours', '0909386641', '31, Eke Dipo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'the distribution board keeps sparking. it is a Schneider product', 'January 7th 2021, 7:00:00am', '8323a890b91cac29a52e297e5b772ded09a94819.jpg', 'Online', NULL, '2021-01-05 18:41:02', '2021-01-05 18:41:02'),
(37, 40, 25, 359, 'Lekki', 3500, NULL, 'Urgent', '0909386641', '31, Eke Dipo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'guest bathroom toilet is not flushing. when i try to flush it overflows\r\n\r\nThat’s it! It can also help in some cases to give the company a reasonable deadline to respond to you, and to outline any other acceptable resolutions. Telling the company what you want is an important starting point, even if what you want is only an apology.\r\nRELATED:\r\nGet Past Executive Customer Service Gatekeepers With Letter-Writing 101\r\n8 Ways To Make Sure Your Complaint Letter Will Be Ignored\r\n5 Sample Letters That Get Debt Collectors Out Of Your Face\r\n\r\nEditor\'s Note: This article originally appeared on Consumerist.\r\nYet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while your own battery won’t charge, tethering you to your desk? Has a travel website that advertises itself as convenient and integrated caused serious problems with your travel plans? Mention any such contrasts if they apply.', 'January 7th 2021, 7:00:00pm', NULL, 'Online', NULL, '2021-01-05 18:44:46', '2021-01-05 19:20:45'),
(38, 41, 25, 359, 'Lekki', 3500, NULL, 'Out of Hours', '0909386641', '31, Eke Dipo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'i just need a technician, when you get here you will understand\r\nBuchyefap1testClient3@fixmaster.com.ng\r\nThat’s it! It can also help in some cases to give the company a reasonable deadline to respond to you, and to outline any other acceptable resolutions. Telling the company what you want is an important starting point, even if what you want is only an apology.\r\nRELATED:\r\nGet Past Executive Customer Service Gatekeepers With Letter-Writing 101\r\n8 Ways To Make Sure Your Complaint Letter Will Be Ignored\r\n5 Sample Letters That Get Debt Collectors Out Of Your Face\r\n\r\nEditor\'s Note: This article originally appeared on Consumerist.', 'January 7th 2021, 9:00:00pm', NULL, 'Online', NULL, '2021-01-05 18:46:30', '2021-01-05 19:20:14');
INSERT INTO `service_request_details` (`id`, `service_request_id`, `state_id`, `lga_id`, `town`, `initial_service_fee`, `discount_service_fee`, `service_fee_name`, `phone_number`, `address`, `description`, `timestamp`, `media_file`, `payment_method`, `deleted_at`, `created_at`, `updated_at`) VALUES
(39, 42, 22, 359, 'Victoria Island', 4700, 4465, 'Out of Hours', '0705556777', '284b, Ajose Adeogun, VI', 'The standing fans are sparking. 5 OX industrial duty fans\r\nlogo\r\nProduct Reviews\r\nNewsIssues That MatterAbout Us\r\nsearch\r\nSign In\r\nBecome a Member\r\nDonate\r\nConsumer ReportsHere\'s A Sample Complaint Letter For When You Don\'t Know What To Say\r\nSign In\r\nBecome a Member\r\nDonate\r\nlogo\r\nHere\'s A Sample Complaint Letter For When You Don\'t Know What To Say\r\nHere\'s A Sample Complaint Letter For When You Don\'t Know What To Say\r\n\r\nby Laura Northrup\r\nLast updated: July 21, 2014\r\n    \r\nIt’s hard to know where to start when writing a complaint letter. If our inbox is any indication, this difficulty manifests itself in free-form rants and confusion about what to say. It doesn’t have to be that way: simply stating the facts and explaining why the company should help you is enough. If you aren’t much of a wordsmith, Consumerist is here to help.\r\nHere’s an example letter, based on a recent successful complaint to a car manufacturer that crossed our desk recently. We’ve obscured the details, but the overall format of the letter remains the same.\r\nThe summary. If you can’t sum your problem up in two or three sentences, have someone else read your e-mail and do it for you. As Consumerist’s tipline reader, I cannot emphasize enough the importance of getting your point across before the letter-reader’s eyes glaze over.\r\nIn the first paragraph, put your problem and suggested resolution. Then get on with the details.\r\n742 Evergreen Terrace\r\nSpringfield, USA 23456\r\nJuly 19, 2014\r\nHoverbike Corporation of America\r\nAttn: Customer Service\r\nP.O. Box 1578\r\nKabletown, WV 25414\r\nDear Hoverbike Corporation:\r\nI am writing to your company about a problem with my Hoverbike, a 2012 Skylark model. I began to have trouble staying aloft a few months ago, and this week the height control module completely failed. While the bicycle is a few months out of warranty, I believe that this occurred because of a design flaw in the Skylark, and I am asking that your company cover or share with me the cost of the required repair.\r\nNext are the details: who, what, where, when? Include addresses, store numbers, and serial numbers if applicable to your situation. Here you can add more details about your incident or problem and elaborate on what you recounted in the opening sentences if you need to.\r\nMy parents purchased my Hoverbike (serial number 118532C423) for me on April 21, 2012 from our local authorized Hoverbike dealer, Krebs Cycles of Springfield. I have enjoyed riding my bicycle, but also taken good care of it, performing all recommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while your own battery won’t charge, tethering you to your desk? Has a travel website that advertises itself as convenient and integrated caused serious problems with your travel plans? Mention any such contrasts if they apply.\r\nHoverbike’s reputation and marketing emphasize your bicycles’ durability, reliability, and safety. Before this mechanical failure, I was very pleased with my Hoverbike, and in a few years I will need to upgrade to a larger one as I grow, but now I hesitate to choose one. My brother and sister also own Hoverbikes that are functioning perfectly, and they aren’t so sure that that they will stick with the brand after watching my experiences with the mechanical failure of my Hoverbike.\r\nIf your marketing campaigns are any indication, I am your target customer, a young girl who is allowed to explore her town on her own and use her bicycle for travel and recreational rides. More importantly, I am eight years old and look forward to a future of eco-conscious commuting. I hope to have many decades of cycling ahead of me, and I want to continue riding Hoverbikes in the future. Please restore my faith in your brand, stand behind your product, and cover the cost of this repair.\r\nThank you for taking the time to read this letter.\r\nSincerely,\r\nLisa Simpson\r\n610-555-3223\r\nlsimpson@springfield.k12.us\r\nThat’s it! It can also help in some cases to give the company a reasonable deadline to respond to you, and to outline any other acceptable resolutions. Telling the company what you want is an important starting point, even if what you want is only an apology.\r\nRELATED:\r\nGet Past Executive Customer Service Gatekeepers With Letter-Writing 101\r\n8 Ways To Make Sure Your Complaint Letter Will Be Ignored\r\n5 Sample Letters That Get Debt Collectors Out Of Your Face\r\n\r\nEditor\'s Note: This article originally appeared on Consumerist.\r\n\r\nStart Getting Membership Benefits Today!\r\n\r\nUseful tools, trusted advice, important safety news.\r\nJoin\r\n    \r\nConsumer Reports\r\nMember Support\r\nContact Us\r\nAccount Settings\r\nWhat is Membership?\r\nMake a Donation\r\nNewsletters\r\nGive a Gift\r\nAbout\r\nports, Inc.', 'January 6th 2021, 7:52:00pm', NULL, 'Online', NULL, '2021-01-05 18:52:46', '2021-01-05 19:19:15'),
(40, 43, 22, 359, 'Victoria Island', 3500, NULL, 'Out of Hours', '08059386655', '361, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'industrial washing machine AXCGT6648 Ascon phyno washing machine', 'January 6th 2021, 11:00:00pm', '282cb9fbf60ba9099e8bbff1d6ec63832926a996.jpg', 'Online', NULL, '2021-01-05 18:54:25', '2021-01-05 18:54:25'),
(41, 44, 22, 359, 'Victoria Island', 3300, NULL, 'Urgent', '08059386655', '361, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'distribution board in my house is sparking\r\nlogo\r\nProduct Reviews\r\nNewsIssues That MatterAbout Us\r\nsearch\r\nSign In\r\nBecome a Member\r\nDonate\r\nConsumer ReportsHere\'s A Sample Complaint Letter For When You Don\'t Know What To Say\r\nSign In\r\nBecome a Member\r\nDonate\r\nlogo\r\nHere\'s A Sample Complaint Letter For When You Don\'t Know What To Say\r\nHere\'s A Sample Complaint Letter For When You Don\'t Know What To Say\r\n\r\nby Laura Northrup\r\nLast updated: July 21, 2014\r\n    \r\nIt’s hard to know where to start when writing a complaint letter. If our inbox is any indication, this difficulty manifests itself in free-form rants and confusion about what to say. It doesn’t have to be that way: simply stating the facts and explaining why the company should help you is enough. If you aren’t much of a wordsmith, Consumerist is here to help.\r\nHere’s an example letter, based on a recent successful complaint to a car manufacturer that crossed our desk recently. We’ve obscured the details, but the overall format of the letter remains the same.\r\nThe summary. If you can’t sum your problem up in two or three sentences, have someone else read your e-mail and do it for you. As Consumerist’s tipline reader, I cannot emphasize enough the importance of getting your point across before the letter-reader’s eyes glaze over.\r\nIn the first paragraph, put your problem and suggested resolution. Then get on with the details.\r\n742 Evergreen Terrace\r\nSpringfield, USA 23456\r\nJuly 19, 2014\r\nHoverbike Corporation of America\r\nAttn: Customer Service\r\nP.O. Box 1578\r\nKabletown, WV 25414\r\nDear Hoverbike Corporation:\r\nI am writing to your company about a problem with my Hoverbike, a 2012 Skylark model. I began to have trouble staying aloft a few months ago, and this week the height control module completely failed. While the bicycle is a few months out of warranty, I believe that this occurred because of a design flaw in the Skylark, and I am asking that your company cover or share with me the cost of the required repair.\r\nNext are the details: who, what, where, when? Include addresses, store numbers, and serial numbers if applicable to your situation. Here you can add more details about your incident or problem and elaborate on what you recounted in the opening sentences if you need to.\r\nMy parents purchased my Hoverbike (serial number 118532C423) for me on April 21, 2012 from our local authorized Hoverbike dealer, Krebs Cycles of Springfield. I have enjoyed riding my bicycle, but also taken good care of it, performing all recommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while your own battery won’t charge, tethering you to your desk? Has a travel website that advertises itself as convenient and integrated caused serious problems with your travel plans? Mention any such contrasts if they apply.\r\nHoverbike’s reputation and marketing emphasize your bicycles’ durability, reliability, and safety. Before this mechanical failure, I was very pleased with my Hoverbike, and in a few years I will need to upgrade to a larger one as I grow, but now I hesitate to choose one. My brother and sister also own Hoverbikes that are functioning perfectly, and they aren’t so sure that that they will stick with the brand after watching my experiences with the mechanical failure of my Hoverbike.\r\nIf your marketing campaigns are any indication, I am your target customer, a young girl who is allowed to explore her town on her own and use her bicycle for travel and recreational rides. More importantly, I am eight years old and look forward to a future of eco-conscious commuting. I hope to have many decades of cycling ahead of me, and I want to continue riding Hoverbikes in the future. Please restore my faith in your brand, stand behind your product, and cover the cost of this repair.\r\nThank you for taking the time to read this letter.\r\nSincerely,\r\nLisa Simpson\r\n610-555-3223\r\nlsimpson@springfield.k12.us\r\nThat’s it! It can also help in some cases to give the company a reasonable deadline to respond to you, and to outline any other acceptable resolutions. Telling the company what you want is an important starting point, even if what you want is only an apology.\r\nRELATED:\r\nGet Past Executive Customer Service Gatekeepers With Letter-Writing 101\r\n8 Ways To Make Sure Your Complaint Letter Will Be Ignored\r\n5 Sample Letters That Get Debt Collectors Out Of Your Face\r\n\r\nEditor\'s Note: This article originally appeared on Consumerist.\r\n\r\nStart Getting Membership Benefits Today!\r\n\r\nUseful tools, trusted advice, important safety news.\r\nJoin\r\n    \r\nConsumer Reports\r\nMember Support\r\nContact Us\r\nAccount Settings\r\nWhat is Membership?\r\nMake a Donation\r\nNewsletters\r\nGive a Gift\r\nAbout\r\nAbout Us\r\nCareer Opportunities\r\nMedia Room\r\nAdvocacy\r\nData Intelligence\r\nDigital Lab', 'January 5th 2021, 10:00:00pm', NULL, 'Online', NULL, '2021-01-05 18:57:09', '2021-01-05 19:14:59'),
(42, 45, 22, 359, 'Victoria Island', 1500, NULL, 'Standard', '08035724540', '361, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'i need to replace my deep fryer\r\nBuchyefap1testClient2@fixmaster.com.ng\r\nlogo\r\nProduct Reviews\r\nNewsIssues That MatterAbout Us\r\nsearch\r\nSign In\r\nBecome a Member\r\nDonate\r\nConsumer ReportsHere\'s A Sample Complaint Letter For When You Don\'t Know What To Say\r\nSign In\r\nBecome a Member\r\nDonate\r\nlogo\r\nHere\'s A Sample Complaint Letter For When You Don\'t Know What To Say\r\nHere\'s A Sample Complaint Letter For When You Don\'t Know What To Say\r\n\r\nby Laura Northrup\r\nLast updated: July 21, 2014\r\n    \r\nIt’s hard to know where to start when writing a complaint letter. If our inbox is any indication, this difficulty manifests itself in free-form rants and confusion about what to say. It doesn’t have to be that way: simply stating the facts and explaining why the company should help you is enough. If you aren’t much of a wordsmith, Consumerist is here to help.\r\nHere’s an example letter, based on a recent successful complaint to a car manufacturer that crossed our desk recently. We’ve obscured the details, but the overall format of the letter remains the same.\r\nThe summary. If you can’t sum your problem up in two or three sentences, have someone else read your e-mail and do it for you. As Consumerist’s tipline reader, I cannot emphasize enough the importance of getting your point across before the letter-reader’s eyes glaze over.\r\nIn the first paragraph, put your problem and suggested resolution. Then get on with the details.\r\n742 Evergreen Terrace\r\nSpringfield, USA 23456\r\nJuly 19, 2014\r\nHoverbike Corporation of America\r\nAttn: Customer Service\r\nP.O. Box 1578\r\nKabletown, WV 25414\r\nDear Hoverbike Corporation:\r\nI am writing to your company about a problem with my Hoverbike, a 2012 Skylark model. I began to have trouble staying aloft a few months ago, and this week the height control module completely failed. While the bicycle is a few months out of warranty, I believe that this occurred because of a design flaw in the Skylark, and I am asking that your company cover or share with me the cost of the required repair.\r\nNext are the details: who, what, where, when? Include addresses, store numbers, and serial numbers if applicable to your situation. Here you can add more details about your incident or problem and elaborate on what you recounted in the opening sentences if you need to.\r\nMy parents purchased my Hoverbike (serial number 118532C423) for me on April 21, 2012 from our local authorized Hoverbike dealer, Krebs Cycles of Springfield. I have enjoyed riding my bicycle, but also taken good care of it, performing all recommended maintenance, keeping it meticulously clean, not hovering over bodies of water, and not riding recklessly.\r\nAfter researching this specific problem and talking to other Hoverbike owners, I have learned that this is a common issue with Hoverbikes manufactured before 2013. I believe that the failure of this module was not due to neglect or error on my part. I am asking that the Hoverbike Corporation cover in full or share with me the cost of this repair.\r\nI have enclosed a work order from my mechanic that details the repairs needed on my bicycle.\r\nThis next section is optional, but often helpful: discuss how your problem goes against the product’s branding and marketing, and also your relationship with the brand.\r\nOf course, don’t feel the need to explain your relationship to the brand if you don’t really have a history of using their products or friends or family who do. Yet consider the product’s branding and marketing and how it relates to your situation: does the company tout its notebook computers’ portability while your own battery won’t charge, tethering you to your desk? Has a travel website that advertises itself as convenient and integrated caused serious problems with your travel plans? Mention any such contrasts if they apply.\r\nHoverbike’s reputation and marketing emphasize your bicycles’ durability, reliability, and safety. Before this mechanical failure, I was very pleased with my Hoverbike, and in a few years I will need to upgrade to a larger one as I grow, but now I hesitate to choose one. My brother and sister also own Hoverbikes that are functioning perfectly, and they aren’t so sure that that they will stick with the brand after watching my experiences with the mechanical failure of my Hoverbike.\r\nIf your marketing campaigns are any indication, I am your target customer, a young girl who is allowed to explore her town on her own and use her bicycle for travel and recreational rides. More importantly, I am eight years old and look forward to a future of eco-conscious commuting. I hope to have many decades of cycling ahead of me, and I want to continue riding Hoverbikes in the future. Please restore my faith in your brand, stand behind your product, and cover the cost of this repair.\r\nThank you for taking the time to read this letter.\r\nSincerely,\r\nLisa Simpson\r\n610-555-3223\r\nlsimpson@springfield.k12.us\r\nThat’s it! It can also help in some cases to give the company a reasonable deadline to respond to you, and to outline any other acceptable resolutions. Telling the company what you want is an important starting point, even if what you want is only an apology.\r\nRELATED:\r\nGet Past Executive Customer Service Gatekeepers With Letter-Writing 101\r\n8 Ways To Make Sure Your Complaint Letter Will Be Ignored\r\n5 Sample Letters That Get Debt Collectors Out Of Your Face\r\n\r\nEditor\'s Note: This article originally appeared on Consumerist.\r\n\r\nStart Getting Membership Benefits Today!\r\n\r\nUseful tools, trusted advice, important safety news.\r\nJoin\r\n    \r\nConsumer Reports\r\nMember Support\r\nContact Us\r\nAccount Settings\r\nWhat is Membership?\r\nMake a Donation\r\nNewsletters\r\nGive a Gift\r\nAbout\r\nAbout Us\r\nCareer Opportunities\r\nMedia Room\r\nAdvocacy\r\nData Intelligence\r\nDigital Lab\r\nProduct Reviews\r\nAppliances\r\nBabies & Kids\r\nCars\r\nElectronics\r\nHealth\r\nHome & Garden\r\nMoney\r\nA-Z Index\r\nMagazine & Books\r\nCurrent Issue\r\nMagazine Archive\r\n5 Year Index\r\nBookstore\r\nMore\r\nVideo\r\nen Español\r\nCanada Extra\r\nReport a Safety Problem\r\nGive a Confidential News Tip\r\nBuy a New Car\r\nBuy a Used Car\r\nJoin\r\nFacebook Twitter YouTube  Pinterest\r\nPrivacy Policy User Agreement Ad Choices© 2019 Consumer Reports, Inc.', 'January 13th 2021, 2:00:00pm', 'e7420ab6bc941f5e14ae65df1f95819bfab40732.jpg', 'Online', NULL, '2021-01-05 18:59:48', '2021-01-05 19:14:20'),
(43, 46, 22, 359, 'Victoria Island', 3000, NULL, 'Standard', '08059386655', '84a, Idowu Martins Crescent, Ikoyi', 'the water tank is flooding into the sewage tank', 'January 6th 2021, 4:00:00pm', '05c9d56eaa3d0f475a54354fdf3f2fc9aea07976.jpg', 'Online', NULL, '2021-01-05 19:03:31', '2021-01-05 19:03:31'),
(44, 47, 25, 359, 'Victoria Island', 2800, 2660, 'Standard', '08022233558', '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos', 'Leaking kitchen sink', 'January 7th 2021, 1:00:00pm', '333c7ae64a8b8932a4923a316bf6e0e5a15323b7.png', 'Online', NULL, '2021-01-05 19:24:59', '2021-01-05 19:24:59'),
(45, 48, 25, 359, 'Victoria Island', 2800, NULL, 'Standard', '08022233558', '24, Abiodun Johnson Street, Road 14, Lekki Phase 1. Lagos', 'Leaking kitchen sink', 'January 7th 2021, 1:00:00pm', '8ff9184a4084222a87a05b22161d6cd1050f5b42.png', 'Online', NULL, '2021-01-05 19:25:00', '2021-01-05 19:25:00'),
(46, 49, 25, 359, 'Victoria Island', 2500, NULL, 'Standard', '08022233558', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Computer screen broken', 'January 9th 2021, 10:00:00pm', NULL, 'Online', NULL, '2021-01-06 07:29:05', '2021-01-06 07:29:05'),
(47, 50, 25, 359, 'Victoria Island', 1500, NULL, 'Standard', '01011123456', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Micro wave oven not working', 'January 8th 2021, 11:00:00am', '1f5b35093851f2a84bdd7d4cc38c5e515f8c4f8d.png', 'Online', NULL, '2021-01-06 07:43:37', '2021-01-06 07:43:37'),
(48, 51, 25, 359, 'Victoria Island', 1500, NULL, 'Standard', '01011123456', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Micro wave oven not working', 'January 8th 2021, 11:00:00am', '641e3bafed82fbc38e7039d59cf0d2576bab5f74.png', 'Online', NULL, '2021-01-06 07:43:39', '2021-01-06 07:43:39'),
(49, 52, 25, 359, 'Victoria Island', 4700, 4465, 'Out of Hours', '08022233559', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Battery not charging', 'January 6th 2021, 8:00:00pm', NULL, 'Online', NULL, '2021-01-06 08:33:28', '2021-01-06 08:33:28'),
(50, 53, 25, 359, 'Victoria Island', 2800, NULL, 'Standard', '08022233559', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Leaking water pipe', 'January 6th 2021, 12:00:00pm', NULL, 'Online', NULL, '2021-01-06 08:36:00', '2021-01-06 08:36:00'),
(51, 54, 25, 359, 'Victoria Island', 2800, NULL, 'Standard', '08022233559', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Leaking water pipe', 'January 6th 2021, 12:00:00pm', NULL, 'Online', NULL, '2021-01-06 08:36:01', '2021-01-06 08:36:01'),
(52, 55, 25, 359, 'Victoria Island', 2800, NULL, 'Standard', '08022233559', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Leaking water pipe', 'January 6th 2021, 12:00:00pm', NULL, 'Online', NULL, '2021-01-06 08:36:08', '2021-01-06 08:36:08'),
(53, 56, 25, 359, 'Victoria Island', 3500, NULL, 'Urgent', '08022233559', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Blocked drainage', 'January 9th 2021, 1:00:00pm', NULL, 'Online', NULL, '2021-01-06 09:03:43', '2021-01-06 09:03:43'),
(54, 57, 25, 359, 'Victoria Island', 3000, 2850, 'Standard', '08022233560', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Broken shower', 'January 7th 2021, 12:00:00pm', '9af58ae0729d735c4e1587ce9324dd3f9f681aea.jfif', 'Online', NULL, '2021-01-06 09:09:48', '2021-01-06 09:09:48'),
(55, 58, 25, 359, 'Victoria Island', 3000, NULL, 'Standard', '08022233560', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Broken shower', 'January 7th 2021, 12:00:00pm', '0c8e1c143cad65e43b4955d00786dcec1114761f.jfif', 'Online', NULL, '2021-01-06 09:09:49', '2021-01-06 09:09:49'),
(56, 59, 25, 359, 'Victoria Island', 3500, NULL, 'Urgent', '08022233560', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Broken wire', 'January 9th 2021, 1:00:00pm', '3fd952058933187c5ff1f70ca052b03310e958c2.jfif', 'Online', NULL, '2021-01-06 09:16:59', '2021-01-06 09:16:59'),
(57, 60, 25, 359, 'Victoria Island', 3500, NULL, 'Urgent', '08022233560', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Broken wire', 'January 9th 2021, 1:00:00pm', '6b01de7ed8142003f996aa3d22785047d5b5ac8f.jfif', 'Online', NULL, '2021-01-06 09:17:00', '2021-01-06 09:17:00'),
(58, 61, 25, 359, 'Victoria Island', 3500, NULL, 'Urgent', '08022233560', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Broken wire', 'January 9th 2021, 1:00:00pm', 'c4ce8ebcc381c98247bb692ace584bf6f0950111.jfif', 'Online', NULL, '2021-01-06 09:17:08', '2021-01-06 09:17:08'),
(59, 62, 25, 359, 'Victoria Island', 2500, 2375, 'Standard', '08022233561', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Broken speaker', 'January 9th 2021, 1:00:00pm', '3975c909d3c1724206c4bd043ed1fc656e849627.jfif', 'Online', NULL, '2021-01-06 10:04:02', '2021-01-06 10:04:02'),
(60, 63, 25, 359, 'Victoria Island', 3500, NULL, 'Out of Hours', '08022233561', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Broken Dishwasher', 'January 6th 2021, 8:00:00pm', '7c7f09dac21a144ff66dc44a921e2bbbce241cb1.jfif', 'Online', NULL, '2021-01-06 10:07:02', '2021-01-06 10:07:02'),
(61, 64, 25, 359, 'Victoria Island', 3500, NULL, 'Out of Hours', '08022233561', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Broken Dishwasher', 'January 6th 2021, 8:00:00pm', 'b7a427b83afa362a54398833a3ba1761cc626803.jfif', 'Online', NULL, '2021-01-06 10:07:03', '2021-01-06 10:07:03'),
(62, 65, 25, 359, 'Victoria Island', 3500, NULL, 'Urgent', '08022233561', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Leaking Gas Pipe', 'January 6th 2021, 11:09:00am', 'dbcbea24a8b3c5831c467cd1ef03d5592af7ad99.jfif', 'Online', NULL, '2021-01-06 10:12:51', '2021-01-06 10:12:51'),
(63, 66, 25, 359, 'Victoria Island', 2500, NULL, 'Standard', '08022233561', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Faulty charging port', 'January 16th 2021, 2:00:00pm', NULL, 'Online', NULL, '2021-01-06 10:14:06', '2021-01-06 10:14:06'),
(64, 67, 25, 359, 'Victoria Island', 2500, NULL, 'Standard', '08022233561', '30, Sobo Arobieke Street, Road 24, Lekki Phase 1. Lagos.', 'Faulty charging port', 'January 16th 2021, 2:00:00pm', NULL, 'Online', NULL, '2021-01-06 10:14:07', '2021-01-06 10:14:07'),
(65, 68, 25, 359, 'Falomo', 1500, NULL, 'Standard', '07036722889', '27B, Bourdillon Road off Falomo, Ikoyi-Lagos.', 'Localhost email, e-wallet transaction test', 'January 13th 2021, 7:00:00pm', NULL, 'Wallet', NULL, '2021-01-11 00:39:56', '2021-01-11 00:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `service_request_progresses`
--

CREATE TABLE `service_request_progresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `service_request_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_request_progresses`
--

INSERT INTO `service_request_progresses` (`id`, `user_id`, `service_request_id`, `service_request_status_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 4, '2020-12-27 16:20:17', '2020-12-27 16:20:17'),
(2, 5, 1, 5, '2020-12-28 15:58:54', '2020-12-28 15:58:54'),
(4, 6, 5, 4, '2020-12-30 09:30:18', '2020-12-30 09:30:18'),
(8, 1, 1, 6, '2021-01-02 13:55:16', '2021-01-02 13:55:16'),
(9, 1, 1, 6, '2021-01-02 14:38:30', '2021-01-02 14:38:30'),
(10, 77, 14, 2, '2021-01-05 15:10:07', '2021-01-05 15:10:07'),
(11, 77, 11, 2, '2021-01-05 15:11:45', '2021-01-05 15:11:45'),
(12, 71, 24, 2, '2021-01-05 16:40:00', '2021-01-05 16:40:00'),
(13, 71, 16, 2, '2021-01-05 16:46:37', '2021-01-05 16:46:37'),
(14, 81, 29, 2, '2021-01-05 17:54:18', '2021-01-05 17:54:18'),
(15, 81, 27, 2, '2021-01-05 17:54:39', '2021-01-05 17:54:39'),
(16, 81, 26, 2, '2021-01-05 17:54:58', '2021-01-05 17:54:58'),
(17, 80, 34, 2, '2021-01-05 18:32:02', '2021-01-05 18:32:02'),
(18, 80, 32, 2, '2021-01-05 18:32:50', '2021-01-05 18:32:50'),
(19, 79, 39, 2, '2021-01-05 18:47:52', '2021-01-05 18:47:52'),
(20, 79, 38, 2, '2021-01-05 18:48:27', '2021-01-05 18:48:27'),
(21, 78, 46, 2, '2021-01-05 19:04:03', '2021-01-05 19:04:03'),
(22, 78, 43, 2, '2021-01-05 19:04:32', '2021-01-05 19:04:32'),
(23, 72, 51, 2, '2021-01-06 07:46:10', '2021-01-06 07:46:10'),
(24, 72, 48, 2, '2021-01-06 08:16:08', '2021-01-06 08:16:08'),
(25, 73, 55, 2, '2021-01-06 09:05:04', '2021-01-06 09:05:04'),
(26, 73, 54, 2, '2021-01-06 09:05:46', '2021-01-06 09:05:46'),
(27, 74, 58, 2, '2021-01-06 09:11:20', '2021-01-06 09:11:20'),
(28, 74, 59, 2, '2021-01-06 09:18:25', '2021-01-06 09:18:25'),
(29, 75, 63, 2, '2021-01-06 10:07:42', '2021-01-06 10:07:42'),
(30, 75, 67, 2, '2021-01-06 10:15:09', '2021-01-06 10:15:09'),
(31, 11, 9, 2, '2021-01-06 16:38:55', '2021-01-06 16:38:55'),
(32, 11, 9, 2, '2021-01-06 16:42:49', '2021-01-06 16:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `service_request_statuses`
--

CREATE TABLE `service_request_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `can_delete` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_request_statuses`
--

INSERT INTO `service_request_statuses` (`id`, `user_id`, `name`, `can_delete`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pending', '0', NULL, NULL, NULL),
(2, 1, 'Cancelled', '0', NULL, NULL, NULL),
(3, 1, 'Completed', '0', NULL, NULL, NULL),
(4, 1, 'Ongoing', '0', NULL, NULL, NULL),
(5, 1, 'Enroute to Client\'s location', '1', NULL, '2020-12-21 16:00:14', NULL),
(6, 1, 'Performing diagnosis', '1', NULL, '2020-12-23 23:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` tinyint(4) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `super_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `technicians` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `technician_category` (
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

CREATE TABLE `tool_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `available` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_inventories`
--

INSERT INTO `tool_inventories` (`id`, `user_id`, `name`, `quantity`, `available`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ladder', 4, 4, NULL, '2020-12-20 23:00:00', '2020-12-29 14:21:47'),
(2, 3, 'Water Hose', 2, 2, NULL, '2020-12-20 23:00:00', NULL),
(3, 1, 'Star Screw Driver', 7, 7, NULL, '2020-12-21 12:44:41', '2020-12-29 14:21:47'),
(4, 1, 'Demo Tool', 3, 3, NULL, '2020-12-29 11:48:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tool_requests`
--

CREATE TABLE `tool_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requested_by` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `batch_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Approved','Declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `is_returned` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_requests`
--

INSERT INTO `tool_requests` (`id`, `requested_by`, `approved_by`, `service_request_id`, `batch_number`, `status`, `is_returned`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 'TRF-C85BEA04', 'Approved', '1', '2020-12-28 15:58:54', '2020-12-29 14:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `tool_request_batches`
--

CREATE TABLE `tool_request_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tool_request_id` bigint(20) UNSIGNED NOT NULL,
  `tool_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_request_batches`
--

INSERT INTO `tool_request_batches` (`id`, `tool_request_id`, `tool_id`, `quantity`) VALUES
(1, 1, 3, 2),
(2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `email_verification_token`, `is_email_verified`, `password`, `remember_token`, `designation`, `is_active`, `is_admin`, `login_count`, `current_sign_in`, `last_sign_in`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'developer@ninthbinary.com', '2020-11-11 23:00:00', '4a7ad6cc6b5042a04ca5b49d8891addf1b86542b', '1', '$2y$10$TyaYqcpSh9fWWiW63q6mVenWe8myqbqSVQk37XP2alC1Nph0lriqa', NULL, '[SUPER_ADMIN_ROLE]', '1', '1', 100, '2021-01-11 09:55:42', '2021-01-10 23:00:51', NULL, '2019-12-31 23:29:26', '2021-01-11 09:55:42'),
(2, '', NULL, NULL, '0', '', NULL, '[INTRUDER_ROLE]', '0', '0', 0, NULL, NULL, NULL, NULL, NULL),
(3, 'charles.famoriyo@gmail.com', '2020-11-30 06:26:42', 'e611c2f59fb21fcdf4b2ac7c8754c9e54ec66569', '1', '$2y$10$oi6eKa68yOPcZeNFIDfOv.H4F4Yy6AtTwA3rP6tlhvSLfU2ix6mkC', NULL, '[SUPER_ADMIN_ROLE]', '1', '1', 3, '2020-12-03 19:34:43', '2020-11-30 21:34:14', NULL, '2020-11-30 06:26:42', NULL),
(4, 'info@fixmaster.com.ng', '2020-11-30 06:26:42', 'e611c2f59fb21fcdf4b2ac7c8754c9e54ec66569', '1', '$2y$10$oi6eKa68yOPcZeNFIDfOv.H4F4Yy6AtTwA3rP6tlhvSLfU2ix6mkC', NULL, '[ADMIN_ROLE]', '1', '1', 3, '2021-01-06 10:24:35', '2021-01-06 11:15:43', NULL, '2020-11-30 06:26:42', '2021-01-06 10:24:35'),
(5, 'david.akinsola@gmail.com', '2020-11-30 06:26:42', 'e611c2f59fb21fcdf4b2ac7c8754c9e54ec66569', '1', '$2y$10$oi6eKa68yOPcZeNFIDfOv.H4F4Yy6AtTwA3rP6tlhvSLfU2ix6mkC', NULL, '[ADMIN_ROLE]', '1', '1', 6, '2020-12-29 21:03:29', '2020-12-28 03:15:45', NULL, '2020-11-30 06:26:42', '2020-12-29 21:03:29'),
(6, 'obuchi.omotosho@gmail.com', '2020-11-30 22:35:09', '565a2eab0940daa4c00ea83bc9cf1ce582dd2a7c', '1', '$2y$10$03LiG5ipILzRThbbNX1A8O4cxFlnZIgLLHqhwuUPKbaRbwnhvTp6K', NULL, '[ADMIN_ROLE]', '1', '1', 4, '2020-12-30 09:25:26', '2020-12-28 17:59:44', NULL, '2020-11-30 22:35:09', '2020-12-30 09:25:26'),
(7, 'isaac.john@yahoo.com', '2020-12-03 19:35:45', '4fdda0314bf174ad785199f195a77adf8b10b7cd', '1', '$2y$10$pdUsx4/hazrwHDGbuMoUBuA5V/d88BSoE7UgTbfwe0tHlajWZgMem', NULL, '[ADMIN_ROLE]', '1', '1', 0, NULL, NULL, NULL, '2020-12-03 19:35:45', NULL),
(8, 'godfrey.emmanuel@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[ADMIN_ROLE]', '1', '1', 0, NULL, NULL, NULL, '2020-12-04 06:03:06', NULL),
(9, 'wisdom.amana@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2020-12-04 06:03:06', NULL),
(10, 'debo.williams@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2020-12-04 06:03:06', NULL),
(11, 'chris@ninthbinary.com', '2020-12-14 12:06:25', '642d9e56a634a1093fbf51353c149dea92e1289e', '1', '$2y$10$fqPNeMW6XtaFInJm.mHc1eJGbvYFuKkTB2/TxRIVWzHmci6RAWz8O', NULL, '[CLIENT_ROLE]', '1', '0', 48, '2021-01-11 08:46:55', '2021-01-11 00:17:04', NULL, '2020-12-11 12:43:02', '2021-01-11 08:46:55'),
(12, 'jamal.diwa@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[CSE_ROLE]', '1', '0', 9, '2021-01-10 21:52:27', '2020-12-22 08:47:24', NULL, '2020-12-04 06:03:06', '2021-01-10 21:52:27'),
(13, 'mayowabenedict@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$vicB3ZBUEj6YMfdk9P2ELO82xVE4X50.A6X.MqeTktkTTJMDh6PkS', NULL, '[CSE_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2020-12-04 06:03:06', '2020-12-29 19:11:23'),
(14, 'andrew.nwankwo@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[TECHNICIAN_ROLE]', '1', '0', 1, '2020-12-17 09:17:14', '2020-12-17 09:17:14', NULL, '2020-12-04 06:03:06', NULL),
(15, 'taofeek.adedokun@gmail.com', '2020-12-04 06:03:06', '6196ce294e3a2ddb70c9faa0cda18b3049404d79', '1', '$2y$10$ii4UEMBJA00/5y.59.bjp.fm4kU5.sHtoL6Cd/gaK0TdrMo5ZmBrm', NULL, '[TECHNICIAN_ROLE]', '1', '0', 1, '2021-01-10 22:56:46', '2021-01-10 22:56:46', NULL, '2020-12-04 06:03:06', '2021-01-10 22:56:46'),
(19, 'nnamdi.favour@yahoo.com', '2020-12-18 13:03:16', '3d08886310a72ef0fc0c208cd284fa79c9a82c50', '1', '$2y$10$Vo7etNylNWzJ3DMafi7kTuCfWe7qEkvPkJPGBYy6q4jJ26lnMKLG.', NULL, '[CSE_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2020-12-18 13:03:16', NULL),
(23, 'desmond.john@outlook.co.uk', '2020-12-19 21:26:29', 'b6b463cdd2a85be2742d37f500dc10f4d67e8368', '1', '$2y$10$Rxe6TJzIiztAaOewBTr.pehGQrl/qoRbwia/OXQ8gOUVMV8yqAoP2', NULL, '[TECHNICIAN_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2020-12-19 21:26:29', NULL),
(24, '1prospect1Fab1test@gmail.com', '2021-01-04 15:36:59', '1d18ae5f22d5ab9999a1e1c4da365f91c7d8274c', '1', '$2y$10$WjMh57456HoHaOIp4Njmo.MettVALtDO1dMDPXkd9ZitFKWRlyFsO', NULL, '[CLIENT_ROLE]', '1', '0', 0, '2021-01-04 03:56:25', '2021-01-04 03:53:58', NULL, '2021-01-04 02:42:27', '2021-01-04 03:56:25'),
(25, '17prospect1Fab1test@gmail.com', '2021-01-04 15:37:09', 'bfe41f230a2e8657a8b31b238bcfdd3a7dd0d3b1', '1', '$2y$10$98hVSdG/rBZg5JHJ8OmMy.AzrHak9Ec.PBl.yY4j9NW2uqs/GCu3y', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 04:57:46', '2021-01-04 04:57:46'),
(26, '18prospect1Fab1test@gmail.com', '2021-01-04 15:37:05', 'db9dbc86b713026783aca2a20ca3f37b007e1f1a', '1', '$2y$10$.ef1J70dL.fEbcJwQNDM8u85kaQZ1utOKZco1f5kPuye.vyy9w1rC', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 05:30:18', '2021-01-04 05:30:18'),
(27, '19prospect1Fab1test@gmail.com', '2021-01-04 15:37:32', '75c9bcd0706f30312a3d920d065cd409a795dcd2', '1', '$2y$10$z5MaVtmcFQuXWQQLyiI1v.S8HGDVZDYlKHesbQlBKuSV4ZBxiRLq2', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 06:07:30', '2021-01-04 06:07:30'),
(28, '3prospect1Fab1test@gmail.com', '2021-01-04 15:37:15', '00ff9711edf883f7d8cfaf34dd9520a08c37b864', '1', '$2y$10$Rly/RHaIgys8dIt9/KgVQOQk3i1AaU9rdWtdKJieuG/Q1Oiih0gh.', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 06:15:54', '2021-01-04 06:15:54'),
(29, '4prospect1Fab1test@gmail.com', '2021-01-04 15:37:19', '92bad2a89da90d6853b6fea75f79b0780522aefc', '1', '$2y$10$JOZkt/pDC2LesUF9GzfLMOtgOQdQ4lpxeVhdOfVLDrgr3OPQ7oRmG', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 06:20:40', '2021-01-04 06:20:40'),
(30, '5prospect1Fab1test@gmail.com', '2021-01-04 15:37:28', '2618b93963f9ba21e58c6ace37567aa5e9c4f9aa', '1', '$2y$10$yBEkpv7NsKme8hy066kQk.onfYw3IAgh6H/iOu7UzIDdNq4Ux1qEy', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 06:38:00', '2021-01-04 06:38:00'),
(31, '6prospect1Fab1test@gmail.com', '2021-01-04 15:37:23', '84e2f1315164d001eb163687ffb8a02f88cbd8bd', '1', '$2y$10$v1hXHWqj9gEFMnxzYt6weOjk1S7U2VyrWC85jVjw8wPbkUX8iIUvq', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 07:02:59', '2021-01-04 07:02:59'),
(32, '7prospect1Fab1test@gmail.com', '2021-01-04 15:50:55', '920ccd941df13642abd6ccd3bb83dce55ba17f17', '1', '$2y$10$SHjB2F/Bg01qPqB9a.bD4eZkpRCoXv6Gp1zUiQB9cRs/lqTdOjNqa', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 07:05:59', '2021-01-04 07:05:59'),
(33, '8prospect1Fab1test@gmail.com', '2021-01-04 15:51:00', '2957d5ea4c6745e7320d45daaf23874c0ec3fed5', '1', '$2y$10$xwL2EdbfP1mvGESqc0TfouZ817ZjykYFexIxB8UAnTyQ8j9JVJ.Le', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 07:09:19', '2021-01-04 07:09:19'),
(34, '9prospect1Fab1test@gmail.com', '2021-01-04 15:50:48', 'a9b4198298e06cb0a60a598d8d1c5423bd89ce2d', '1', '$2y$10$B3V9/xDif4E7U0y8fLjOsOBX63EPP68WfpfFrITx7boWkGWgrD47u', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 07:35:57', '2021-01-04 07:35:57'),
(35, '10prospect1Fab1test@gmail.com', '2021-01-04 15:50:52', 'a842aa6b504b1de70e3d37a3389fcefb28350261', '1', '$2y$10$7cqIYNA/MmGjk4uIENxgyOjwNTPHhxZIKlfzf2VFwpU90QOHYmSKm', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 07:38:36', '2021-01-04 07:38:36'),
(36, '11prospect1Fab1test@gmail.com', '2021-01-04 15:51:37', 'e2e4b0e4949834f548aac82a31b4d387beef82b7', '1', '$2y$10$56I/2BoKW3GM2VSUPl9HzuOqNgHEvUsHKIwjRddZb1U1iQw58U2tK', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 07:41:34', '2021-01-04 07:41:34'),
(37, '12prospect1Fab1test@gmail.com', '2021-01-04 15:51:04', 'f1a4e0d215a459808efbd078f7603c91668c0928', '1', '$2y$10$.ZyyqppaTOTrma/IzBw5CuG6RnX.lDRamA.5.6aiPZYn0iz62.yka', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 07:45:54', '2021-01-04 07:45:54'),
(38, '13prospect1Fab1test@gmail.com', '2021-01-04 15:51:14', '141606561b100fcbf83b13e299ec3c43afedc373', '1', '$2y$10$us4ZpT3XOJKAA/aDefCH6.ArPnPErcnkqP3olE71.vQco1qoJwFF6', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 07:52:30', '2021-01-04 07:52:30'),
(39, '14prospect1Fab1test@gmail.com', '2021-01-04 15:51:18', '21c27fe69d7851f598874edd0a9752837c5f55bb', '1', '$2y$10$EplZrFjwDPDBBdBGw9LRBeWn7Qav9FkVqwVYAPWOTxKW0t8NunefS', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 07:55:40', '2021-01-04 07:55:40'),
(40, '15prospect1Fab1test@gmail.com', '2021-01-04 15:51:11', '1cbdd2951a6f2d66ff628ae749c9a6e5b498927d', '1', '$2y$10$cwNBoCtCh5a5pFjqLkqpJekcaCmtpbSt8uL4b.1UMDhDUJwfhGR5.', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 07:58:20', '2021-01-04 07:58:20'),
(41, '16prospect1Fab1test@gmail.com', '2021-01-04 15:51:26', '1cf9dc26e12e5552feeb63b292188b49333dbf0c', '1', '$2y$10$JcwTSftZADNgY6N5FGATpOKKJzrI0q6vZB6vSuUCn20CHZVpeuaue', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 08:00:47', '2021-01-04 08:00:47'),
(42, '33prospect1Fab1test@gmail.com', '2021-01-04 15:51:22', '5a530b56b7acbb308bcc036f8c9ccad8e5362dd1', '1', '$2y$10$o1onpH0gOO1ej3464Z4omeDAbVcvBEFHsJ1uFJt.ErtTBvb8BEaiq', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 09:48:09', '2021-01-04 09:48:09'),
(43, '34prospect1Fab1test@gmail.com', '2021-01-04 15:51:07', '58c4d0e82e4b2e98068de2c103b114889be168f9', '1', '$2y$10$ArZEgHLyXGHIxUR3Jyc7quFMDcv3XVvIfWYiVwb7zHJIr512xBxS.', NULL, '[CLIENT_ROLE]', '1', '0', 0, '2021-01-04 10:26:14', '2021-01-04 10:26:14', NULL, '2021-01-04 10:02:44', '2021-01-04 10:26:14'),
(44, '46prospect1Fab1test@gmail.com', '2021-01-04 15:51:32', '6938274917063ef5a4df73fdf9cad50780ba2bc8', '1', '$2y$10$RaDOsYA.KkZTn34DJBgHY.8dxYedyPbaKGKY/R83ZTuDMpSBlHHoy', NULL, '[CLIENT_ROLE]', '1', '0', 0, '2021-01-04 10:29:10', '2021-01-04 10:28:36', NULL, '2021-01-04 10:20:09', '2021-01-04 10:29:10'),
(45, '35prospect1Fab1test@gmail.com', '2021-01-04 15:48:27', 'e370818136cc49f08781700c1e942cbd22b3105a', '1', '$2y$10$ZK./IUE6x601mr.MHafZiOWAp1jmSgD4J.ypGrqZWgnrsWhBf/AOS', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 11:36:13', '2021-01-04 11:36:13'),
(46, '36prospect1Fab1test@gmail.com', '2021-01-04 15:48:37', '90157f96413fb0a2410d06e73bc03a8176f158aa', '1', '$2y$10$UtRCZXXNnMtdNXvzgjaiIOP9Nn9GiYCfPfTJi1xhc2kFlwyguSb72', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 12:00:07', '2021-01-04 12:00:07'),
(47, '37prospect1Fab1test@gmail.com', '2021-01-04 15:48:34', 'fe5bf037ae99ddec610395cbc9c2c545c3296016', '1', '$2y$10$GralCElrlOEPI99p4nwd1e2so5HOAPRiMIvKG7hXxrV9wPgp5gPyu', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 12:03:27', '2021-01-04 12:03:27'),
(48, '38prospect1Fab1test@gmail.com', '2021-01-04 15:48:31', 'fe5690e730c90542012e306259fea34d8ab5864a', '1', '$2y$10$l/r9mUXWRp2KGTIfTP2ZhOp65u7N/nX5yGfN/el4lE6nWZutlYDgO', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 12:11:01', '2021-01-04 12:11:01'),
(49, '39prospect1Fab1test@gmail.com', '2021-01-04 15:48:45', '4efbf7675c6c49578edff26407421363d8c4f5a2', '1', '$2y$10$7E6TqZ2xTWTrAhYo8bX9YO0sh0CxasI3MRtiH8n4DdGMlJY3jn1Qa', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 12:35:27', '2021-01-04 12:35:27'),
(50, '40prospect1Fab1test@gmail.com', '2021-01-04 15:48:41', '08229063af7daca1c523054d7e3db53758b2ae03', '1', '$2y$10$MmUg3SwzXo0w8Kq3CPcpyuKOfUNqC29MzbiWgigflGuiJsBlg9XBa', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 12:43:14', '2021-01-04 12:43:14'),
(51, '41prospect1Fab1test@gmail.com', '2021-01-04 15:48:50', '56f32f8e49db6e4047cd1a757b9b3ca7d4a4b285', '1', '$2y$10$H0bDJaIOsKty8tfXXTNAQ.ZMBlJd8JyXTozJHgMrdYOiH5iaadfw2', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 12:47:23', '2021-01-04 12:47:23'),
(52, '47prospect1Fab1test@gmail.com', '2021-01-04 15:48:12', '28a84f0b524d7a68479ac1d953acdcfe10a3311f', '1', '$2y$10$K9CX412.Td7m4kOGCN7KNO1dOaRqKwD8iv/Ahl3hGNwa742pcSJs.', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 12:50:39', '2021-01-04 12:50:39'),
(53, '42prospect1Fab1test@gmail.com', '2021-01-04 15:48:16', '7c742b90e2e3499d6b4d95d67174d62cb5c9d3fa', '1', '$2y$10$oGEP4a7DfIWbIeef0TGa8O05m878NqwFR3TxGy2QURDwhAMD7zQnq', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 12:51:19', '2021-01-04 12:51:19'),
(54, '43prospect1Fab1test@gmail.com', '2021-01-04 15:48:03', '992fa23e61c0b0076052ec7b0c6b8b5fe96c5256', '1', '$2y$10$5OUpOxNugXQpSNU9ScFnEubTcRHHArLzSJh/dSyizLQjVPSoYSqJ6', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 12:56:41', '2021-01-04 12:56:41'),
(55, '48prospect1Fab1test@gmail.com', '2021-01-04 15:48:08', 'ee84740416b10c748ef262dec05649ce74ef7889', '1', '$2y$10$xeroo8LfB.vadD4GP4kWt.99uEJlJxVsAZej5OC/dhpdI8NW2g2hu', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 12:58:22', '2021-01-04 12:58:22'),
(56, '49prospect1Fab1test@gmail.com', '2021-01-04 15:47:03', '8691fee26d5144dde936adc477c0ae318749cd53', '1', '$2y$10$i1w08/YalorRjmADP/pYou70BAvzh56FV51erq9o0ORJR40nPPf0u', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:00:10', '2021-01-04 13:00:10'),
(57, '50prospect1Fab1test@gmail.com', '2021-01-04 15:47:07', '3bbe7af8d0d3933bc50d6f77493b4eccc32414d9', '1', '$2y$10$jJUWxSlSg./QuDMPCua/quBFd1ea8Tm2vpUN2W08MurZIvi9uGZr6', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:22:20', '2021-01-04 13:22:20'),
(58, '51prospect1Fab1test@gmail.com', '2021-01-04 15:47:12', 'b67e5072a0fb5d08e7e6e103b93747b6c98a732e', '1', '$2y$10$llGlsfduqXp9cF1B1HaTkuREnqDG5/XhskfdZKWBEQDEfneKS/kU2', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:24:15', '2021-01-04 13:24:15'),
(59, '52prospect1Fab1test@gmail.com', '2021-01-04 15:47:19', '3c98c8b493adc0bde6bc3669af51b75d85acde9b', '1', '$2y$10$ozOC/BjihOFkq.NWxKKbbep58qcoJQsByp9Jaii.Iz6PrxNBPjgZi', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:27:07', '2021-01-04 13:27:07'),
(60, '53prospect1Fab1test@gmail.com', '2021-01-04 15:47:23', 'fdcab94c36fa6636b622c3af2ccd184d9469793a', '1', '$2y$10$rQb8JZKuwOk6aAmiRwUaZuBmOVRiqh.Zi7eb7Is4wwuPZR23P6Ge2', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:28:55', '2021-01-04 13:28:55'),
(61, '54prospect1Fab1test@gmail.com', '2021-01-04 15:46:49', 'd253ca2866016a46aed9e4dc2dc32b9871117d00', '1', '$2y$10$TF2Wq4OBssLhJF7m.u73huSDawSSzPE1b3OSRvb3A1EsXocFFImvm', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:31:41', '2021-01-04 13:31:41'),
(62, '55prospect1Fab1test@gmail.com', '2021-01-04 15:46:45', '8d323ea0488b29a364a052f19c3805eb66829ab5', '1', '$2y$10$1l2rb2XAZVK/n69/tRhquuDbzw/lRSBY2ax3Ui8ijVsDZljkkHrka', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:33:24', '2021-01-04 13:33:24'),
(63, '56prospect1Fab1test@gmail.com', '2021-01-04 15:46:32', '510c4f4892b09d95632c258c4afa8ae2bf576e07', '1', '$2y$10$sLef1Q.7mbdJHJa8H2kTBu50m0q2DiQZtakDosjrrfycjncP9ye1G', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:35:11', '2021-01-04 13:35:11'),
(64, '57prospect1Fab1test@gmail.com', '2021-01-04 15:46:28', '272afce5f0de4b5d275f25aed85c145943a516f7', '1', '$2y$10$7/tuk3UeGCpZDa4Sr2IKS.Lg0UTLc/yNzYz8hckyfN4ZNPM/zcq7G', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:36:39', '2021-01-04 13:36:39'),
(65, '58prospect1Fab1test@gmail.com', '2021-01-04 15:46:15', 'f678d914ea9c3e39193ce63ae9786fd75869cf75', '1', '$2y$10$ZioVXtmARQavPU.TA6tGNub6ht8J0Rqv93L0ZpGv2BJ5xvM9lwXXi', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:39:19', '2021-01-04 13:39:19'),
(66, '59prospect1Fab1test@gmail.com', '2021-01-04 15:46:11', '28d119b0e0aeaab8dd635269c7e48ed6af1f5c00', '1', '$2y$10$zFAgX3fO4k0wH8/4083wIeEfYZzsu40Mfw3PHgwTn6cb2iab25jna', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:40:46', '2021-01-04 13:40:46'),
(67, '60prospect1Fab1test@gmail.com', '2021-01-04 15:45:58', '9f26c6742d2c2b1dbb10870fcf6626f60328d2a8', '1', '$2y$10$DuQGDc3zB7uWMNaY4LZMBeBpFaUhFZZsz4hLXGt7E.IkgdJEU1jr6', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:43:00', '2021-01-04 13:43:00'),
(68, '45prospect1Fab1test@gmail.com', '2021-01-04 15:45:43', '46038a279bed3f00fcad0c99273459eac4b52737', '1', '$2y$10$1DaLKMq.e3HUHq7HriTpFu1jeo12xEo5C/OKYfB2yoLPeTyf63RFG', NULL, '[CLIENT_ROLE]', '1', '0', 0, NULL, NULL, NULL, '2021-01-04 13:45:46', '2021-01-04 13:45:46'),
(69, 'krissmn1+@gmail.com', '2021-01-04 15:06:18', '675a3758187e79bebdef2d7695f7bd69af27dcea', '1', '$2y$10$VzZftX0OKXi.4ogAY77KoedlrtwJPW6Wsx/KPW/MJybaywsLbtV7q', '54IjlvEZK4JVVJYsYQrnDPGQVTzCeTHu6bNsDUWrjUDTYxr2buSRtLI15pGK', '[CLIENT_ROLE]', '1', '0', 1, '2021-01-04 15:15:50', '2021-01-04 15:15:50', NULL, '2021-01-04 15:06:18', '2021-01-04 15:15:50'),
(70, 'info@ninthbinary.com', '2021-01-04 15:12:12', '65abc289edb5d9c8142720476b66cf7821fd601b', '1', '$2y$10$YzXJAo5RFEXo9dovrKIeMepq9U6Wnz01mE.DMd3pbeSx0lEyA14Dq', NULL, '[CLIENT_ROLE]', '1', '0', 1, '2021-01-04 15:12:30', '2021-01-04 15:12:30', NULL, '2021-01-04 15:12:12', '2021-01-04 15:12:30'),
(71, 'Davidfap1testClient1@fixmaster.com.ng', '2021-01-05 09:51:51', '3cc91ea5cfdfb9094b538e2acb2d7affa54e8ec2', '1', '$2y$10$.lv2xFlz3ft5XX9e1oS5P.rnKULWtkwy.mhfoPTEkzQW646mKoRPW', NULL, '[CLIENT_ROLE]', '1', '0', 1, '2021-01-05 11:46:56', '2021-01-05 11:46:56', NULL, '2021-01-05 09:51:51', '2021-01-05 12:49:00'),
(72, 'Davidfap1testClient2@fixmaster.com.ng', '2021-01-05 09:58:11', '8a3731daf4e66cf65137ef9475d99cd71f0946f5', '1', '$2y$10$xQAmXCQpFAwjodTPCD6uT.wMjeP4dU1zDG9aWkBy9o1OdhEEjuXKO', NULL, '[CLIENT_ROLE]', '1', '0', 3, '2021-01-06 07:26:34', '2021-01-05 17:30:44', NULL, '2021-01-05 09:58:11', '2021-01-06 07:26:34'),
(73, 'Davidfap1testClient3@fixmaster.com.ng', '2021-01-05 10:10:17', '680b5b5a05377d37e2abfbac1ca9d284f3a5c7e7', '1', '$2y$10$dpBWDXfmDRE/6UQ97PtVNOrxTkG1FC2e/PXvWwRRUrJICC5Zf7CnO', NULL, '[CLIENT_ROLE]', '1', '0', 2, '2021-01-06 08:24:50', '2021-01-05 17:14:13', NULL, '2021-01-05 10:10:17', '2021-01-06 08:26:01'),
(74, 'Davidfap1testClient4@fixmaster.com.ng', '2021-01-05 10:18:12', '6246410762dacb5b8437d4906f4dede78dddcf35', '1', '$2y$10$3tky01yvRC7XJ8HxHqsgauKxpR189mdhsCMV1bWxYYq8ase8LdX4S', NULL, '[CLIENT_ROLE]', '1', '0', 3, '2021-01-06 09:17:38', '2021-01-06 09:06:27', NULL, '2021-01-05 10:18:12', '2021-01-06 09:17:38'),
(75, 'Davidfap1testClient5@fixmaster.com.ng', '2021-01-05 10:19:57', '04786593344c3c17b271fab0a84e0dfde5f8861f', '1', '$2y$10$.TXYm7u0FyXgqTA4ZTGP.O749S5g/ojXgwHzaDe63DZj.zxibSfT6', NULL, '[CLIENT_ROLE]', '1', '0', 2, '2021-01-06 10:00:42', '2021-01-05 17:17:15', NULL, '2021-01-05 10:19:57', '2021-01-06 10:00:42'),
(77, 'Buchyefap1testClient1@fixmaster.com.ng', '2021-01-05 10:35:33', 'b58effa7cf8d16439ff5a97840c8145681796c1c', '1', '$2y$10$Pn2EL4mFo91Qni3iY3XoZOx7Xz3v8UA0TM1d7tGZX5UR.VVsfKPhe', NULL, '[CLIENT_ROLE]', '1', '0', 5, '2021-01-05 19:05:54', '2021-01-05 14:32:40', NULL, '2021-01-05 10:35:33', '2021-01-05 19:05:54'),
(78, 'Buchyefap1testClient2@fixmaster.com.ng', '2021-01-05 10:38:45', 'f02b6fd80d0a43499b3bbf21baaf33f40aac5caf', '1', '$2y$10$.uR8BDSVCp.Jkai4LjBopu1kIFyz0E6AzNHcrwgf6Tifl9kAPnM2C', NULL, '[CLIENT_ROLE]', '1', '0', 4, '2021-01-05 19:13:24', '2021-01-05 18:50:59', NULL, '2021-01-05 10:38:45', '2021-01-05 19:13:24'),
(79, 'Buchyefap1testClient3@fixmaster.com.ng', '2021-01-05 10:40:54', 'cdb0118a779082a82f2e9bb487818f308b86ed7b', '1', '$2y$10$Y9FarzqAbm0FEny49tMUXO9onh9bFu5U6v6tHva9ALQDKSx/Unck.', NULL, '[CLIENT_ROLE]', '1', '0', 4, '2021-01-05 19:19:37', '2021-01-05 18:33:46', NULL, '2021-01-05 10:40:54', '2021-01-05 19:19:37'),
(80, 'duruobuchi@gmail.com', '2021-01-05 10:43:15', '8ceecc1e65209984548f863d8a47bde727731f89', '1', '$2y$10$USZOjhpmXOlVPTj42TKqo.uUnuvL/ndFShaBnmQknLVX.ZngfTcm2', NULL, '[CLIENT_ROLE]', '1', '0', 4, '2021-01-05 19:22:42', '2021-01-05 18:01:43', NULL, '2021-01-05 10:43:15', '2021-01-05 19:41:58'),
(81, 'Buchyefap1testClient5@fixmaster.com.ng', '2021-01-05 10:45:28', 'fcf126b56e7ee11a0b9ebafaa14f161106595d6d', '1', '$2y$10$mHRZHHNim68FHZHtEQ1.3.ILIEU0JXLwXyRqYRaJT2bOuMTytYLVu', NULL, '[CLIENT_ROLE]', '1', '0', 4, '2021-01-05 19:44:13', '2021-01-05 17:48:27', NULL, '2021-01-05 10:45:28', '2021-01-05 19:44:13'),
(85, 'FabTestGenericUser1@fixmaster.com.ng', NULL, '8515f6bcaf1b35f72af88cc1c5a78d8456e9b1e9', '0', '$2y$10$u/PzSDasZ2yxLdUiastHUeVSwFF1LNFQFm8oM88hjzHz2TH5vNnaG', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 18:16:51', '2021-01-07 18:16:51'),
(86, 'FabTestGenericUser2@fixmaster.com.ng', NULL, '075ddafe5ba031a99963656ed65c893faa99f2d2', '0', '$2y$10$q5V.iWlDno5cmhpnfaR8/.KKx0eBc5nqUDYDBvh5d5KedzfuPz0ji', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 18:19:58', '2021-01-07 18:19:58'),
(87, 'FabTestGenericUser3@fixmaster.com.ng', NULL, '3bdaea4b87964eeb2cc1ac45b7db9f411dd3aa40', '0', '$2y$10$tDYvgdkFLHpUgT/qAYTq.OI7nRUg/SPOP4kyYWaDhSmn0YzbWg3S.', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 18:34:28', '2021-01-07 18:34:28'),
(88, 'FabTestGenericUser4@fixmaster.com.ng', NULL, '475865a7098a4598c648cd18e7fbfc5479aba2e3', '0', '$2y$10$4rjrrB71QFiTAjb/XNE/BuE.s/scZ9.7GEN9o8GtMtnpaqOeoKwdG', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 18:37:48', '2021-01-07 18:37:48'),
(89, 'FabTestGenericUser5@fixmaster.com.ng', NULL, 'daf975a91ce461bdfb6bf0a3c5228e8fd8945f92', '0', '$2y$10$nhs8TCSHAlXfRV6h7h81C.up1AjgHegNSHOrsBFlqDIwudARAi65y', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:18:58', '2021-01-07 19:18:58'),
(90, 'FabTestGenericUser31@fixmaster.com.ng', NULL, '071f68c5b2cd926fe393f0d2eaf04b424ab56884', '0', '$2y$10$GDINZBlMrkgkrBjFxCbAQ.9LUzz0uN9zgGkRJz/Hc8sBh6KqG.MYC', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:20:42', '2021-01-07 19:20:42'),
(91, 'FabTestGenericUser6@fixmaster.com.ng', NULL, '75c73ce9fb4825d13080b541af6a99687643d289', '0', '$2y$10$lrMYuMfKBImxUZ/qbXYDReQFsSNveIEh1iUG2hsT.0IarQaTe4o2q', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:22:48', '2021-01-07 19:22:48'),
(92, 'FabTestGenericUser32@fixmaster.com.ng', NULL, '1645ab682b901d6aaa9a1653cd77c113f0f1890e', '0', '$2y$10$D9ovXnkJWssskllEU2wk.uKmBBhv5rlBkQCzCoz3xgWFnoaaX0mUG', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:22:51', '2021-01-07 19:22:51'),
(93, 'FabTestGenericUser7@fixmaster.com.ng', NULL, 'c1d849b2864a565c656bb96920898a4030ddedbe', '0', '$2y$10$dfw4QUUYKGjDCEcH45oTeejLsGP18G.fVoh9M7cnhBvowmqsrAQE.', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:25:08', '2021-01-07 19:25:08'),
(94, 'FabTestGenericUser33@fixmaster.com.ng', NULL, '93d90f9fb03f9a736d39d2c19851b826b1d3b34a', '0', '$2y$10$Gg2Qp.43BCqDNbGOvA6T9OMK5biCC0AyXUH5l.FVnMicDNTkaQPXK', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:25:09', '2021-01-07 19:25:09'),
(95, 'FabTestGenericUser34@fixmaster.com.ng', NULL, '1c527a60bcd67822f3523082cb615236d4531880', '0', '$2y$10$XHiG2iRQJ3gPpwhAAA1rjen7H9gjmnvzazmqppJLLTRnHAkUuEAsu', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:26:50', '2021-01-07 19:26:50'),
(96, 'FabTestGenericUser8@fixmaster.com.ng', NULL, '3362f935749aa4a54a40a7577d2864637e7d9fa1', '0', '$2y$10$NiiRtmkukUbCGmIrw84MEevi5YR03Zi5guzwLMyVtPN2Ryvdl.Ylq', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:27:26', '2021-01-07 19:27:26'),
(97, 'FabTestGenericUser35@fixmaster.com.ng', NULL, '858871b3be15e0dad9971fb0c60f305a1011057e', '0', '$2y$10$JnYqOF3C5lwafC/FKbW2we3YN/.jMHS00rW1rTuXA3JizpP0XTVH.', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:28:43', '2021-01-07 19:28:43'),
(98, 'FabTestGenericUser9@fixmaster.com.ng', NULL, 'df7db151e7e57fd8fb640d2421a3e406e059ddc9', '0', '$2y$10$dDiuZMvnbv5zZfRvXRfKte8MfcVfM7N4r8vBXO6zYyf.nsgcUcALO', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:30:09', '2021-01-07 19:30:09'),
(99, 'FabTestGenericUser36@fixmaster.com.ng', NULL, '2e4da600b605a3f9e95be4e72baf2444b38ff043', '0', '$2y$10$rFLPbd.1F0o1B52IZ/EkJ.kT3UUvTpd85G7ChrNKRbd4mhXej0NTm', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:30:52', '2021-01-07 19:30:52'),
(100, 'FabTestGenericUser10@fixmaster.com.ng', NULL, 'ede32e891c371a5ed2978c33755a04cd7d057272', '0', '$2y$10$J9Rjue19e1ts5ofit0LjLeHaX9vwBE8j6HeGakfbDiOstAm15L6Zi', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:32:17', '2021-01-07 19:32:17'),
(101, 'FabTestGenericUser37@fixmaster.com.ng', NULL, '208e871e1bfb9834e4fc79c42ed23a49f424a757', '0', '$2y$10$qAa6XwgQ8RBDG/1o7DfObO5FAzWnqPpqrFafeIK/J0BBOD1jqavmG', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:32:26', '2021-01-07 19:32:26'),
(102, 'FabTestGenericUser38@fixmaster.com.ng', NULL, '254dccf8671ffc9ec4e08aab638e00fac8f7d607', '0', '$2y$10$nqKARZaftNxXaf4m4NQaZ.fgzC3RYUjVjpPkYMGbCnM1PnIqyZ/pC', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:34:39', '2021-01-07 19:34:39'),
(103, 'FabTestGenericUser39@fixmaster.com.ng', NULL, 'bcfb39d3ac2b6ef250ae49d1486facda6ccc9fb6', '0', '$2y$10$MJNX39y64jjW15Tkqfy2eewNDw7znwBAS9LE6GqRSfFbQXCE8oPFW', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:36:14', '2021-01-07 19:36:14'),
(104, 'FabTestGenericUser11@fixmaster.com.ng', NULL, '49575576d43ffe7270252b6d992d3eb8f6a5b4d7', '0', '$2y$10$MK6XZqC6JZNJeqZ4zlS2QOx/Cp8Ks/fqnbqlzd8EivJzHaAAQhL5y', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:41:25', '2021-01-07 19:41:25'),
(105, 'FabTestGenericUser40@fixmaster.com.ng', NULL, '2c0ff5b04e868c3b880deadd5f813fac4aa2ca0e', '0', '$2y$10$bwkmZ.7olmMvfnKDny6un.rxEOB.h.6KoOCZBBUkMMSDhs4yZjnii', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:54:39', '2021-01-07 19:54:39'),
(106, 'FabTestGenericUser41@fixmaster.com.ng', NULL, '97e53a254230ac367615f51f20bfba3d248e05b6', '0', '$2y$10$2bOmqmpqEIZxdeiK4HE97.EHGtKWF2ZnlqE7TRlQALOYH37lhIAZi', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:56:00', '2021-01-07 19:56:00'),
(107, 'FabTestGenericUser12@fixmaster.com.ng', NULL, 'de354457dfa137cd9172e09e2608696274978b4c', '0', '$2y$10$o6LEZxEZE6F5qVsta2/rVu9zuaEYoFanpwD4h5oGpL5uNg0pkox0S', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:57:22', '2021-01-07 19:57:22'),
(108, 'FabTestGenericUser42@fixmaster.com.ng', NULL, 'cc9d46ba7f811f7e8342d3a11eb00a6c55f38a0d', '0', '$2y$10$8aaffE3WuKW0Iocyu5X6puZBiSjJY7Esxzt42qXq.UfJmGyV7AeTy', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:57:43', '2021-01-07 19:57:43'),
(109, 'FabTestGenericUser43@fixmaster.com.ng', NULL, '17c3ea119276ae4a83df5a922d7dc91c181bc1fb', '0', '$2y$10$uN3ZGJ13pl6fHgwUXFTwAeHsAgUIs8G7SW6427mo6mSxgsRLL3MWG', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 19:59:05', '2021-01-07 19:59:05'),
(110, 'FabTestGenericUser13@fixmaster.com.ng', NULL, 'f54dc1ba0e15a126e695c2b6cdcf1ecc4efcda7c', '0', '$2y$10$90nUp.xslklHd5kYWFXtoOoI/zlR2aFWLK8wQyVUFBeAFO9.jViA6', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:01:11', '2021-01-07 20:01:11'),
(111, 'FabTestGenericUser44@fixmaster.com.ng', NULL, '8ae1cfa2c889c1168cd7bb59461227e964b4ca7d', '0', '$2y$10$/mDPpkGBAP/ohxC0TntbFOEIABs8kLkTdRvRaAgobD.JGIN6jW6S.', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:01:23', '2021-01-07 20:01:23'),
(112, 'FabTestGenericUser14@fixmaster.com.ng', NULL, 'd5496a71830588488ea6e058b15ae26046c7f524', '0', '$2y$10$g/06nqy2bBJRBLwwnmQeZuEWIGx1HyOyXQBc6A9DKXojYy.NG0AXC', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:03:56', '2021-01-07 20:03:56'),
(113, 'FabTestGenericUser45@fixmaster.com.ng', NULL, '36eaf0f8734d41dadd2a00358dbe43a12576ff66', '0', '$2y$10$1AikLW4faetUhSCNkwZPke9wCJ21TDk.RlnF6QDDvI2O9c3mPBE1q', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:04:29', '2021-01-07 20:04:29'),
(114, 'FabTestGenericUser46@fixmaster.com.ng', NULL, '0e0a8c7e8361d4a30df423a45f5be5efc2e5ebf4', '0', '$2y$10$EM1zfSZ.js9J2FEIulXzuewFxOqKEVJ/TEUtpwdrFf09SE11S8hDK', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:05:53', '2021-01-07 20:05:53'),
(115, 'FabTestGenericUser15@fixmaster.com.ng', NULL, '6f160bb3fce7ae752ef1fa7f718347678db2ddb8', '0', '$2y$10$8f/y.HQfmsZU0.WM65490OQ88m1GLCyRXgyVJhhmmYBpJ5FqeEnae', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:06:12', '2021-01-07 20:06:12'),
(116, 'FabTestGenericUser47@fixmaster.com.ng', NULL, '68925e23b8b3e86a041a5a4a8b03c3aa897018aa', '0', '$2y$10$QeFXDBosJP6NKuwCtD4EcO.yjjtI3xxBookpjXLNnZr9smZcbgDJe', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:07:33', '2021-01-07 20:07:33'),
(117, 'FabTestGenericUser48@fixmaster.com.ng', NULL, '08199fb063ffa1058b7963edcf7ab1f84a4ec7c0', '0', '$2y$10$MlOZ6dWEQxla8juzPVhJEu7zi3gsU1R2usrOXOp9biXfAYLHPGFnm', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:08:58', '2021-01-07 20:08:58'),
(118, 'FabTestGenericUser49@fixmaster.com.ng', NULL, '2e0efca94e13bf899c46e7d7f04cc183cc4b8429', '0', '$2y$10$.gg.mey2gpCfS4BJgnuRSeYiqBXfB16GS.XhdJfQM2DVezAmNme1e', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:10:26', '2021-01-07 20:10:26'),
(119, 'FabTestGenericUser16@fixmaster.com.ng', NULL, 'afb62c04a89cb44cc4bca720d76cec9e1fdd249d', '0', '$2y$10$NTZJrgrC8b/qnJMVJjxXGe2KGeXBtLqeqImq1oNcrS8P4p2ocOvLO', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:11:48', '2021-01-07 20:11:48'),
(120, 'FabTestGenericUser50@fixmaster.com.ng', NULL, 'ce7363f184c5c5937e1e8c380a686489f6400663', '0', '$2y$10$hvAdoPabZ4dkWSeWgeRwDeCgLglLlNSCT4eB5KcRYsQG6ng2AU1AO', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:12:18', '2021-01-07 20:12:18'),
(121, 'FabTestGenericUser17@fixmaster.com.ng', NULL, 'da2f4b4e05464da27cd74b63c4e2b3fe8df4fd46', '0', '$2y$10$bSt7ksf4SpxTFiZ2./UC7ucJp/ZBLunbknNiGtg.JqQAYlUF7IzcC', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:13:46', '2021-01-07 20:13:46'),
(122, 'FabTestGenericUser18@fixmaster.com.ng', NULL, '0598ca0db1ce52609410a0e323b794cbe20f100a', '0', '$2y$10$iXVO15ioeyGpHu.6xJfO/eYHPQ6FFw/YtI/8Fb7lL3A.DPzsyKXGW', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:15:45', '2021-01-07 20:15:45'),
(123, 'FabTestGenericUser26@fixmaster.com.ng', NULL, '8538023b49b25c74832b81f20311c92ac0d803d3', '0', '$2y$10$MgDSkrp0chx4NH.BMQdyq.sfXYA1FNKj7dkR4Al1uKdjsAo/pCCrW', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:17:48', '2021-01-07 20:17:48'),
(124, 'FabTestGenericUser19@fixmaster.com.ng', NULL, '474952942b7d5912bf789ad0a432301356cf205c', '0', '$2y$10$cGyqTpadTkzQimKrc7DXUeP.68yUADl3CahkItZ/wfZuBHlXLiBn6', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:19:13', '2021-01-07 20:19:13'),
(125, 'FabTestGenericUser27@fixmaster.com.ng', NULL, 'd5712367fd15a86a02d6440e3989b73e65e02338', '0', '$2y$10$3yzCkjnkP.UAZmp4Wecgbu3yAmNSSE0OJqjkXCR6KU5p2rVheVEsW', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:19:16', '2021-01-07 20:19:16'),
(126, 'FabTestGenericUser28@fixmaster.com.ng', NULL, '7539264905684080ffc7604ff9af12724ea7932d', '0', '$2y$10$SGs2lIVdyxAZ3pHM9uBJJODb51pIf167hbwmWg3p5WDxIXTr7WkjO', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:20:36', '2021-01-07 20:20:36'),
(127, 'FabTestGenericUser20@fixmaster.com.ng', NULL, '6b7bff2e427fdf45980eb8c2713b0b1abd482038', '0', '$2y$10$on90RO3On314zCGcOxMdeu3Jx/P8fDg9FHw11gj/mBvMNiz08x.6a', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:21:14', '2021-01-07 20:21:14'),
(128, 'FabTestGenericUser29@fixmaster.com.ng', NULL, 'ec0aaa93b1347603b2a6f448c592b1eecaeb10a2', '0', '$2y$10$uvYINS86ifiWIEL9m7mOn..CisZ5VZ8c5IW8puKUR79NytRB7ZoTu', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:21:53', '2021-01-07 20:21:53'),
(129, 'FabTestGenericUser30@fixmaster.com.ng', NULL, 'ef1fc83cdad01ea798b79b49730c1632c30f30ea', '0', '$2y$10$4bHLlgdU1hcTElYGHRxSF.JYQTZ5wJAQS8g/FFBuGCunjoZmq2pAu', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:23:19', '2021-01-07 20:23:19'),
(130, 'FabTestGenericUser21@fixmaster.com.ng', NULL, '3c35e2dfa3f7e7557304f47865bd524e6725b09b', '0', '$2y$10$9OjxiZJ9cctTpPtoL0wAFeYBZGzUoWy9u.G20YpyZGwiJPcuSstN.', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:23:39', '2021-01-07 20:23:39'),
(131, 'FabTestGenericUser22@fixmaster.com.ng', NULL, '2ad7396ada963a42ddb865ccade18b19df537dfd', '0', '$2y$10$ZIwidLCU2M17JYjCx8qTreEaP416.hggUJQv5e2XqHEaa0pc8a4Em', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:31:11', '2021-01-07 20:31:11'),
(132, 'FabTestGenericUser23@fixmaster.com.ng', NULL, 'b48862f39fa19ead6e8294caf51ed9ea8716e0fe', '0', '$2y$10$6ZK6SCOVNXRgOb9KHEThE.Ryd83H2SpKFax/1Kur9F.l/BnTyWiEK', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:34:21', '2021-01-07 20:34:21'),
(133, 'FabTestGenericUser24@fixmaster.com.ng', NULL, 'a5b4b21fc3627c2705d5cb035cef50c24d523e42', '0', '$2y$10$q/3ovHKdgtI2sFoyvws4o.b2zAGLKJem2XthSDskEvrhJWSAj93du', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:37:00', '2021-01-07 20:37:00'),
(134, 'FabTestGenericUser25@fixmaster.com.ng', NULL, 'a4f393dcc7c1347b378885ade313758814c1d8f0', '0', '$2y$10$PGTtKDfnb6QS1xGTwT3mmetUIqHYV7S9zjQy9oxnIZFo44ciePYIa', NULL, '[CLIENT_ROLE]', '0', '0', 0, NULL, NULL, NULL, '2021-01-07 20:39:11', '2021-01-07 20:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `wallet_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, 11, 'WAL-23782382', 2500, NULL, '2021-01-11 00:39:56'),
(2, 9, 'WAL-21780953', 0, NULL, NULL),
(3, 24, 'WAL-50B6D80A', 0, '2021-01-04 02:42:28', '2021-01-04 02:42:28'),
(4, 25, 'WAL-BFE41F23', 0, '2021-01-04 04:57:46', '2021-01-04 04:57:46'),
(5, 26, 'WAL-DB9DBC86', 0, '2021-01-04 05:30:18', '2021-01-04 05:30:18'),
(6, 27, 'WAL-75C9BCD0', 0, '2021-01-04 06:07:30', '2021-01-04 06:07:30'),
(7, 28, 'WAL-00FF9711', 0, '2021-01-04 06:15:54', '2021-01-04 06:15:54'),
(8, 29, 'WAL-92BAD2A8', 0, '2021-01-04 06:20:40', '2021-01-04 06:20:40'),
(9, 30, 'WAL-2618B939', 0, '2021-01-04 06:38:00', '2021-01-04 06:38:00'),
(10, 31, 'WAL-84E2F131', 0, '2021-01-04 07:02:59', '2021-01-04 07:02:59'),
(11, 32, 'WAL-920CCD94', 0, '2021-01-04 07:05:59', '2021-01-04 07:05:59'),
(12, 33, 'WAL-2957D5EA', 0, '2021-01-04 07:09:19', '2021-01-04 07:09:19'),
(13, 34, 'WAL-A9B41982', 0, '2021-01-04 07:35:57', '2021-01-04 07:35:57'),
(14, 35, 'WAL-A842AA6B', 0, '2021-01-04 07:38:36', '2021-01-04 07:38:36'),
(15, 36, 'WAL-E2E4B0E4', 0, '2021-01-04 07:41:34', '2021-01-04 07:41:34'),
(16, 37, 'WAL-F1A4E0D2', 0, '2021-01-04 07:45:54', '2021-01-04 07:45:54'),
(17, 38, 'WAL-14160656', 0, '2021-01-04 07:52:30', '2021-01-04 07:52:30'),
(18, 39, 'WAL-F85084D1', 0, '2021-01-04 07:55:40', '2021-01-04 07:55:40'),
(19, 40, 'WAL-1CBDD295', 0, '2021-01-04 07:58:20', '2021-01-04 07:58:20'),
(20, 41, 'WAL-1CF9DC26', 0, '2021-01-04 08:00:47', '2021-01-04 08:00:47'),
(21, 42, 'WAL-5A530B56', 0, '2021-01-04 09:48:09', '2021-01-04 09:48:09'),
(22, 43, 'WAL-58C4D0E8', 0, '2021-01-04 10:02:44', '2021-01-04 10:02:44'),
(23, 44, 'WAL-69382749', 0, '2021-01-04 10:20:09', '2021-01-04 10:20:09'),
(24, 45, 'WAL-E3708181', 0, '2021-01-04 11:36:13', '2021-01-04 11:36:13'),
(25, 46, 'WAL-90157F96', 0, '2021-01-04 12:00:07', '2021-01-04 12:00:07'),
(26, 47, 'WAL-6D238640', 0, '2021-01-04 12:03:27', '2021-01-04 12:03:27'),
(27, 48, 'WAL-FE5690E7', 0, '2021-01-04 12:11:01', '2021-01-04 12:11:01'),
(28, 49, 'WAL-4EFBF767', 0, '2021-01-04 12:35:27', '2021-01-04 12:35:27'),
(29, 50, 'WAL-08229063', 0, '2021-01-04 12:43:14', '2021-01-04 12:43:14'),
(30, 51, 'WAL-33BE8BF2', 0, '2021-01-04 12:47:24', '2021-01-04 12:47:24'),
(31, 52, 'WAL-28A84F0B', 0, '2021-01-04 12:50:39', '2021-01-04 12:50:39'),
(32, 53, 'WAL-7C742B90', 0, '2021-01-04 12:51:19', '2021-01-04 12:51:19'),
(33, 54, 'WAL-22D85B97', 0, '2021-01-04 12:56:41', '2021-01-04 12:56:41'),
(34, 55, 'WAL-81E12F28', 0, '2021-01-04 12:58:22', '2021-01-04 12:58:22'),
(35, 56, 'WAL-8691FEE2', 0, '2021-01-04 13:00:10', '2021-01-04 13:00:10'),
(36, 57, 'WAL-3BBE7AF8', 0, '2021-01-04 13:22:20', '2021-01-04 13:22:20'),
(37, 58, 'WAL-B67E5072', 0, '2021-01-04 13:24:15', '2021-01-04 13:24:15'),
(38, 59, 'WAL-6F590518', 0, '2021-01-04 13:27:08', '2021-01-04 13:27:08'),
(39, 60, 'WAL-FDCAB94C', 0, '2021-01-04 13:28:55', '2021-01-04 13:28:55'),
(40, 61, 'WAL-D253CA28', 0, '2021-01-04 13:31:41', '2021-01-04 13:31:41'),
(41, 62, 'WAL-8D323EA0', 0, '2021-01-04 13:33:24', '2021-01-04 13:33:24'),
(42, 63, 'WAL-510C4F48', 0, '2021-01-04 13:35:11', '2021-01-04 13:35:11'),
(43, 64, 'WAL-272AFCE5', 0, '2021-01-04 13:36:39', '2021-01-04 13:36:39'),
(44, 65, 'WAL-F678D914', 0, '2021-01-04 13:39:19', '2021-01-04 13:39:19'),
(45, 66, 'WAL-28D119B0', 0, '2021-01-04 13:40:46', '2021-01-04 13:40:46'),
(46, 67, 'WAL-9F26C674', 0, '2021-01-04 13:43:00', '2021-01-04 13:43:00'),
(47, 68, 'WAL-46038A27', 0, '2021-01-04 13:45:46', '2021-01-04 13:45:46'),
(48, 69, 'WAL-675A3758', 0, '2021-01-04 15:06:18', '2021-01-04 15:06:18'),
(49, 70, 'WAL-65ABC289', 0, '2021-01-04 15:12:12', '2021-01-04 15:12:12'),
(50, 71, 'WAL-43CE80C5', 0, '2021-01-05 09:51:51', '2021-01-05 09:51:51'),
(51, 72, 'WAL-E21F49C9', 0, '2021-01-05 09:58:11', '2021-01-05 09:58:11'),
(52, 73, 'WAL-680B5B5A', 0, '2021-01-05 10:10:17', '2021-01-05 10:10:17'),
(53, 74, 'WAL-62464107', 0, '2021-01-05 10:18:12', '2021-01-05 10:18:12'),
(54, 75, 'WAL-04786593', 0, '2021-01-05 10:19:57', '2021-01-05 10:19:57'),
(56, 77, 'WAL-B58EFFA7', 0, '2021-01-05 10:35:33', '2021-01-05 10:35:33'),
(57, 78, 'WAL-F02B6FD8', 0, '2021-01-05 10:38:45', '2021-01-05 10:38:45'),
(58, 79, 'WAL-E3160AB5', 0, '2021-01-05 10:40:54', '2021-01-05 10:40:54'),
(59, 80, 'WAL-8CEECC1E', 0, '2021-01-05 10:43:15', '2021-01-05 10:43:15'),
(60, 81, 'WAL-FCF126B5', 0, '2021-01-05 10:45:28', '2021-01-05 10:45:28'),
(65, 85, 'WAL-EFF94E91', 0, '2021-01-07 18:16:52', '2021-01-07 18:16:52'),
(66, 86, 'WAL-0F78ACC3', 0, '2021-01-07 18:19:58', '2021-01-07 18:19:58'),
(67, 87, 'WAL-37A09906', 0, '2021-01-07 18:34:29', '2021-01-07 18:34:29'),
(68, 88, 'WAL-475865A7', 0, '2021-01-07 18:37:48', '2021-01-07 18:37:48'),
(69, 89, 'WAL-05F5C32D', 0, '2021-01-07 19:18:58', '2021-01-07 19:18:58'),
(70, 90, 'WAL-071F68C5', 0, '2021-01-07 19:20:42', '2021-01-07 19:20:42'),
(71, 91, 'WAL-75C73CE9', 0, '2021-01-07 19:22:48', '2021-01-07 19:22:48'),
(72, 92, 'WAL-1645AB68', 0, '2021-01-07 19:22:51', '2021-01-07 19:22:51'),
(73, 93, 'WAL-D1EEAF1A', 0, '2021-01-07 19:25:08', '2021-01-07 19:25:08'),
(74, 94, 'WAL-B11B3923', 0, '2021-01-07 19:25:10', '2021-01-07 19:25:10'),
(75, 95, 'WAL-1C527A60', 0, '2021-01-07 19:26:50', '2021-01-07 19:26:50'),
(76, 96, 'WAL-3362F935', 0, '2021-01-07 19:27:26', '2021-01-07 19:27:26'),
(77, 97, 'WAL-858871B3', 0, '2021-01-07 19:28:43', '2021-01-07 19:28:43'),
(78, 98, 'WAL-DF7DB151', 0, '2021-01-07 19:30:09', '2021-01-07 19:30:09'),
(79, 99, 'WAL-2E4DA600', 0, '2021-01-07 19:30:52', '2021-01-07 19:30:52'),
(80, 100, 'WAL-0622974B', 0, '2021-01-07 19:32:18', '2021-01-07 19:32:18'),
(81, 101, 'WAL-208E871E', 0, '2021-01-07 19:32:26', '2021-01-07 19:32:26'),
(82, 102, 'WAL-254DCCF8', 0, '2021-01-07 19:34:39', '2021-01-07 19:34:39'),
(83, 103, 'WAL-BCFB39D3', 0, '2021-01-07 19:36:14', '2021-01-07 19:36:14'),
(84, 104, 'WAL-49575576', 0, '2021-01-07 19:41:25', '2021-01-07 19:41:25'),
(85, 105, 'WAL-FA26160B', 0, '2021-01-07 19:54:39', '2021-01-07 19:54:39'),
(86, 106, 'WAL-1A87D49F', 0, '2021-01-07 19:56:00', '2021-01-07 19:56:00'),
(87, 107, 'WAL-442597A2', 0, '2021-01-07 19:57:23', '2021-01-07 19:57:23'),
(88, 108, 'WAL-CC9D46BA', 0, '2021-01-07 19:57:43', '2021-01-07 19:57:43'),
(89, 109, 'WAL-17C3EA11', 0, '2021-01-07 19:59:05', '2021-01-07 19:59:05'),
(90, 110, 'WAL-F54DC1BA', 0, '2021-01-07 20:01:11', '2021-01-07 20:01:11'),
(91, 111, 'WAL-00933B7C', 0, '2021-01-07 20:01:24', '2021-01-07 20:01:24'),
(92, 112, 'WAL-7C036A61', 0, '2021-01-07 20:03:56', '2021-01-07 20:03:56'),
(93, 113, 'WAL-36EAF0F8', 0, '2021-01-07 20:04:29', '2021-01-07 20:04:29'),
(94, 114, 'WAL-0E0A8C7E', 0, '2021-01-07 20:05:53', '2021-01-07 20:05:53'),
(95, 115, 'WAL-6F160BB3', 0, '2021-01-07 20:06:12', '2021-01-07 20:06:12'),
(96, 116, 'WAL-68925E23', 0, '2021-01-07 20:07:33', '2021-01-07 20:07:33'),
(97, 117, 'WAL-D40125A8', 0, '2021-01-07 20:08:58', '2021-01-07 20:08:58'),
(98, 118, 'WAL-5265193F', 0, '2021-01-07 20:10:26', '2021-01-07 20:10:26'),
(99, 119, 'WAL-AFB62C04', 0, '2021-01-07 20:11:48', '2021-01-07 20:11:48'),
(100, 120, 'WAL-CE7363F1', 0, '2021-01-07 20:12:18', '2021-01-07 20:12:18'),
(101, 121, 'WAL-DA2F4B4E', 0, '2021-01-07 20:13:46', '2021-01-07 20:13:46'),
(102, 122, 'WAL-DDB43D9A', 0, '2021-01-07 20:15:46', '2021-01-07 20:15:46'),
(103, 123, 'WAL-8538023B', 0, '2021-01-07 20:17:48', '2021-01-07 20:17:48'),
(104, 124, 'WAL-47495294', 0, '2021-01-07 20:19:13', '2021-01-07 20:19:13'),
(105, 125, 'WAL-D5712367', 0, '2021-01-07 20:19:16', '2021-01-07 20:19:16'),
(106, 126, 'WAL-75392649', 0, '2021-01-07 20:20:36', '2021-01-07 20:20:36'),
(107, 127, 'WAL-F0E7BC08', 0, '2021-01-07 20:21:15', '2021-01-07 20:21:15'),
(108, 128, 'WAL-4FDD8ADF', 0, '2021-01-07 20:21:54', '2021-01-07 20:21:54'),
(109, 129, 'WAL-D44971A0', 0, '2021-01-07 20:23:19', '2021-01-07 20:23:19'),
(110, 130, 'WAL-3C35E2DF', 0, '2021-01-07 20:23:39', '2021-01-07 20:23:39'),
(111, 131, 'WAL-8CC9622E', 0, '2021-01-07 20:31:12', '2021-01-07 20:31:12'),
(112, 132, 'WAL-B48862F3', 0, '2021-01-07 20:34:21', '2021-01-07 20:34:21'),
(113, 133, 'WAL-A5B4B21F', 0, '2021-01-07 20:37:00', '2021-01-07 20:37:00'),
(114, 134, 'WAL-A4F393DC', 0, '2021-01-07 20:39:11', '2021-01-07 20:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` bigint(20) UNSIGNED NOT NULL,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` enum('Payment','Refund','Wallet') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_transactions`
--

INSERT INTO `wallet_transactions` (`id`, `user_id`, `wallet_id`, `service_request_id`, `payment_type`, `amount`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 9, 'Refund', 2500, '2021-01-06 16:42:49', '2021-01-06 16:42:49'),
(2, 11, 1, 68, 'Payment', 1500, '2021-01-11 00:39:56', '2021-01-11 00:39:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_user_id_unique` (`user_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_phone_number_unique` (`phone_number`),
  ADD KEY `user_id` (`user_id`,`state_id`,`lga_id`,`town`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `lga_id` (`lga_id`),
  ADD KEY `profession_id` (`profession_id`);

--
-- Indexes for table `cses`
--
ALTER TABLE `cses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cses_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `tag_id` (`tag_id`),
  ADD UNIQUE KEY `cses_other_phone_number_unique` (`other_phone_number`),
  ADD UNIQUE KEY `cses_account_number_unique` (`account_number`),
  ADD KEY `lga_id` (`lga_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `bank_id` (`bank_id`),
  ADD KEY `user_id` (`user_id`,`franchise_id`,`state_id`,`lga_id`,`bank_id`) USING BTREE,
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `cse_category`
--
ALTER TABLE `cse_category`
  ADD KEY `category_id` (`category_id`),
  ADD KEY `cse_id` (`cse_id`);

--
-- Indexes for table `disbursed_payments`
--
ALTER TABLE `disbursed_payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_reference` (`payment_reference`),
  ADD KEY `disbursed_payments_user_id_index` (`user_id`),
  ADD KEY `disbursed_payments_recipient_id_index` (`recipient_id`),
  ADD KEY `disbursed_payments_service_request_id_index` (`service_request_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lgas`
--
ALTER TABLE `lgas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `location_and_browser_infos`
--
ALTER TABLE `location_and_browser_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_messages_ibfk_1` (`sender_id`),
  ADD KEY `client_messages_ibfk_2` (`recipient_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `names`
--
ALTER TABLE `names`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `received_payments`
--
ALTER TABLE `received_payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `received__payments_payment_reference_unique` (`payment_reference`),
  ADD KEY `received__payments_user_id_index` (`user_id`),
  ADD KEY `received__payments_service_request_id_index` (`service_request_id`);

--
-- Indexes for table `rfqs`
--
ALTER TABLE `rfqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rfqs_batch_number_unique` (`batch_number`),
  ADD UNIQUE KEY `rfqs_invoice_number_unique` (`invoice_number`),
  ADD KEY `rfqs_issued_by_index` (`issued_by`),
  ADD KEY `rfqs_client_id_index` (`client_id`),
  ADD KEY `rfqs_service_request_id_index` (`service_request_id`);

--
-- Indexes for table `rfq_batches`
--
ALTER TABLE `rfq_batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rfq_batches_rfq_id_index` (`rfq_id`);

--
-- Indexes for table `rfq_suppliers`
--
ALTER TABLE `rfq_suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rfq_id` (`rfq_id`),
  ADD KEY `rfq_suppliers_rfq_id_index` (`rfq_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_name_unique` (`name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `security_code` (`security_code`),
  ADD UNIQUE KEY `job_reference` (`job_reference`),
  ADD KEY `user_id` (`user_id`,`admin_id`,`cse_id`,`technician_id`,`service_id`,`category_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `technician_id` (`technician_id`),
  ADD KEY `cse_id` (`cse_id`),
  ADD KEY `service_request_status_id` (`service_request_status_id`);

--
-- Indexes for table `service_request_cancellation_reasons`
--
ALTER TABLE `service_request_cancellation_reasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_request_cancellation_reasons_user_id_index` (`user_id`),
  ADD KEY `service_request_cancellation_reasons_service_request_id_index` (`service_request_id`);

--
-- Indexes for table `service_request_details`
--
ALTER TABLE `service_request_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_request_id` (`service_request_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `lga_id` (`lga_id`);

--
-- Indexes for table `service_request_progresses`
--
ALTER TABLE `service_request_progresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_request_progress_user_id_index` (`user_id`),
  ADD KEY `service_request_progress_service_request_id_index` (`service_request_id`),
  ADD KEY `service_request_progress_service_request_status_id_index` (`service_request_status_id`);

--
-- Indexes for table `service_request_statuses`
--
ALTER TABLE `service_request_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_statuses_name_unique` (`name`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `super_admins_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `technicians_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `tag_id` (`tag_id`),
  ADD UNIQUE KEY `technicians_other_phone_number_unique` (`other_phone_number`),
  ADD UNIQUE KEY `technicians_account_number_unique` (`account_number`),
  ADD KEY `lga_id` (`lga_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `bank_id` (`bank_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `user_id` (`user_id`,`franchise_id`,`state_id`,`lga_id`,`bank_id`) USING BTREE;

--
-- Indexes for table `tool_inventories`
--
ALTER TABLE `tool_inventories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tool_requests`
--
ALTER TABLE `tool_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requested_by` (`requested_by`,`approved_by`,`service_request_id`,`batch_number`),
  ADD KEY `tool_requests_batch_id` (`batch_number`),
  ADD KEY `service_request_id` (`service_request_id`),
  ADD KEY `tool_requests_ibfk_4` (`approved_by`);

--
-- Indexes for table `tool_request_batches`
--
ALTER TABLE `tool_request_batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tool_id` (`tool_id`),
  ADD KEY `batch_id` (`tool_request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallets_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `wallets_wallet_id_unique` (`wallet_id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`wallet_id`,`service_request_id`),
  ADD KEY `wallet_id` (`wallet_id`),
  ADD KEY `wallet_transactions_ibfk_3` (`service_request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=680;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `cses`
--
ALTER TABLE `cses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `disbursed_payments`
--
ALTER TABLE `disbursed_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lgas`
--
ALTER TABLE `lgas`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT for table `location_and_browser_infos`
--
ALTER TABLE `location_and_browser_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `names`
--
ALTER TABLE `names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `received_payments`
--
ALTER TABLE `received_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `rfqs`
--
ALTER TABLE `rfqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rfq_batches`
--
ALTER TABLE `rfq_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rfq_suppliers`
--
ALTER TABLE `rfq_suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `service_request_cancellation_reasons`
--
ALTER TABLE `service_request_cancellation_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `service_request_details`
--
ALTER TABLE `service_request_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `service_request_progresses`
--
ALTER TABLE `service_request_progresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `service_request_statuses`
--
ALTER TABLE `service_request_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `technicians`
--
ALTER TABLE `technicians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tool_inventories`
--
ALTER TABLE `tool_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tool_requests`
--
ALTER TABLE `tool_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tool_request_batches`
--
ALTER TABLE `tool_request_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `disbursed_payments`
--
ALTER TABLE `disbursed_payments`
  ADD CONSTRAINT `disbursed_payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `disbursed_payments_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `disbursed_payments_ibfk_3` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
-- Constraints for table `received_payments`
--
ALTER TABLE `received_payments`
  ADD CONSTRAINT `received_payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `received_payments_ibfk_2` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `rfqs`
--
ALTER TABLE `rfqs`
  ADD CONSTRAINT `rfqs_ibfk_1` FOREIGN KEY (`issued_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rfqs_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rfqs_ibfk_3` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `rfq_batches`
--
ALTER TABLE `rfq_batches`
  ADD CONSTRAINT `rfq_batches_ibfk_1` FOREIGN KEY (`rfq_id`) REFERENCES `rfqs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rfq_suppliers`
--
ALTER TABLE `rfq_suppliers`
  ADD CONSTRAINT `rfq_suppliers_ibfk_1` FOREIGN KEY (`rfq_id`) REFERENCES `rfqs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `service_request_cancellation_reasons`
--
ALTER TABLE `service_request_cancellation_reasons`
  ADD CONSTRAINT `service_request_cancellation_reasons_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_cancellation_reasons_ibfk_2` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `service_request_details`
--
ALTER TABLE `service_request_details`
  ADD CONSTRAINT `service_request_details_ibfk_1` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_details_ibfk_2` FOREIGN KEY (`lga_id`) REFERENCES `lgas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_details_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `service_request_progresses`
--
ALTER TABLE `service_request_progresses`
  ADD CONSTRAINT `service_request_progresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_progresses_ibfk_2` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_progresses_ibfk_3` FOREIGN KEY (`service_request_status_id`) REFERENCES `service_request_statuses` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tool_requests_ibfk_2` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tool_requests_ibfk_3` FOREIGN KEY (`requested_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tool_requests_ibfk_4` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tool_request_batches`
--
ALTER TABLE `tool_request_batches`
  ADD CONSTRAINT `tool_request_batches_ibfk_1` FOREIGN KEY (`tool_id`) REFERENCES `tool_inventories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tool_request_batches_ibfk_2` FOREIGN KEY (`tool_request_id`) REFERENCES `tool_requests` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD CONSTRAINT `wallet_transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_transactions_ibfk_2` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_transactions_ibfk_3` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
