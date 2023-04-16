-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 16, 2023 at 11:34 AM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forever_workers`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_job_models`
--

DROP TABLE IF EXISTS `assign_job_models`;
CREATE TABLE IF NOT EXISTS `assign_job_models` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `location_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payrun_id` int(11) NOT NULL,
  `expected_hour` double(8,2) NOT NULL,
  `check_in_time` time NOT NULL COMMENT 'when user start the work',
  `check_out_time` time NOT NULL COMMENT 'user wnd work',
  `status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 for reject,1 for assign,2for accept,3for completed,',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_job_models`
--

INSERT INTO `assign_job_models` (`id`, `date`, `location_id`, `company_id`, `employee_id`, `job_title`, `job_description`, `job_start_date`, `job_end_date`, `payrun_id`, `expected_hour`, `check_in_time`, `check_out_time`, `status`, `created_at`, `updated_at`) VALUES
(11, '2023-04-05', 2, 7, 10, 'Adena', 'Similique duis lauda', '2023-04-23', '2007-08-17', 0, 50.00, '12:30:00', '14:00:00', '3', '2023-04-15 07:23:31', '2023-04-15 07:23:31'),
(13, '2023-12-08', 2, 8, 12, 'Sybil', 'Vitae aut fuga Ulla', '2023-05-25', '2017-06-09', 0, 66.00, '04:00:00', '16:00:00', '3', '2023-04-15 07:23:58', '2023-04-15 11:20:29'),
(15, '2008-04-19', 2, 7, 10, 'Grant', 'Cum ipsa magna dign', '1997-02-15', '1972-07-29', 0, 56.00, '00:00:00', '00:00:00', '2', '2023-04-15 08:28:23', '2023-04-15 08:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

DROP TABLE IF EXISTS `categorys`;
CREATE TABLE IF NOT EXISTS `categorys` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `add_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `add_category`, `created_at`, `updated_at`) VALUES
(2, 'Part-time', '2023-03-31 05:22:05', '2023-04-12 11:36:54'),
(3, 'full time', '2023-04-08 06:27:26', '2023-04-12 11:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `companysregs`
--

DROP TABLE IF EXISTS `companysregs`;
CREATE TABLE IF NOT EXISTS `companysregs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transit_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companysregs`
--

INSERT INTO `companysregs` (`id`, `company_name`, `transit_number`, `institution_number`, `account_number`, `address`, `zip`, `contact_person`, `email`, `contact_number`, `created_at`, `updated_at`) VALUES
(8, 'Hayes', 'Janna', 'Daria', 'Bo', 'Kieran', 'Elton', 'Dai', 'Ishmael', 'Diana', '2023-04-15 00:21:54', '2023-04-15 00:21:54'),
(7, 'Levi', 'Richard', 'Ann', 'Wing', 'Kevin', 'Macey', 'Felix', 'Isaiah', 'Finn', '2023-04-13 12:13:10', '2023-04-13 12:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `companysregsappend`
--

DROP TABLE IF EXISTS `companysregsappend`;
CREATE TABLE IF NOT EXISTS `companysregsappend` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `select_categories` int(11) NOT NULL,
  `straight_pay_hours` float NOT NULL,
  `overtime_hours1` float NOT NULL,
  `overtime_hours2` float NOT NULL,
  `night_hours_pay` float NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companysregsappend`
--

INSERT INTO `companysregsappend` (`id`, `select_categories`, `straight_pay_hours`, `overtime_hours1`, `overtime_hours2`, `night_hours_pay`, `company_id`, `created_at`, `updated_at`) VALUES
(15, 3, 8, 5, 5, 6, 7, '2023-04-13 12:13:10', '2023-04-13 12:13:10'),
(16, 2, 7, 3, 4, 10, 8, '2023-04-15 00:21:54', '2023-04-15 00:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `select_location` int(11) DEFAULT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `sin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bcdl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Job_Acceptreject` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '0 for user always accept,1 for user can accept or reject the job',
  `Show_Hide` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT 'show 1 hide 0 total pay',
  `Only_Straight_hours` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '0 for not applicable 1 for applicable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `select_location`, `employee_id`, `employee_name`, `address`, `contact_number`, `Email`, `ID_proof`, `address_proof`, `DOB`, `sin`, `bcdl`, `bank_name`, `account_number`, `bank_details`, `Job_Acceptreject`, `Show_Hide`, `Only_Straight_hours`, `created_at`, `updated_at`) VALUES
(10, 3, 'Wesley', 'Knox', 'Constance', 'Kaseem', 'hinimuxuz@mailinator.com', 'installation_tab.png', 'sytem_tab_cyprus.png', '2014-04-28', 'Nichole', 'Tatiana', 'Ainsley', 'Sonia', 'Incidunt qui anim e', '0', '1', '1', '2023-04-12 13:00:16', '2023-04-12 13:00:16'),
(11, 3, 'Curran', 'Anika', 'Richard', 'Chase', 'hycyfozyda@mailinator.com', 'C:\\wamp64\\www\\webmedia-project\\forewerworkers\\public\\uploads/employee/Address1681324782.png', 'C:\\wamp64\\www\\webmedia-project\\forewerworkers\\public\\uploads/employee/Address1681324782.png', '2015-06-02', 'Holly', 'Inez', 'Madonna', 'Jackson', 'Sed non expedita in', '1', '0', '0', '2023-04-12 13:09:42', '2023-04-12 13:09:42'),
(12, 3, 'Edward', 'Amaya', 'Charles', 'Otto', 'setyduhac@mailinator.com', 'uploads/employee/ID1681325049.png', 'uploads/employee/Address1681325049.png', '2002-07-22', 'Scarlet', 'Petra', 'Garth', 'Indigo', 'Laborum Aut eos nih', '1', '0', '0', '2023-04-12 13:14:09', '2023-04-12 13:14:09'),
(13, 2, 'Robin', 'Taylor', 'Tiger', 'Armando', 'nyzypom@mailinator.com', 'uploads/employee/ID1681494882.png', 'uploads/employee/Address1681494882.png', '1990-09-27', 'Desiree', 'Colin', 'Lacy', 'Buffy', 'Reiciendis laboriosa', '1', '0', '1', '2023-04-14 12:24:42', '2023-04-14 12:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `employeesappend`
--

DROP TABLE IF EXISTS `employeesappend`;
CREATE TABLE IF NOT EXISTS `employeesappend` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `select_categories` int(11) NOT NULL,
  `straight_pay_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime_hours1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime_hours2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `night_hours_pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employeesappend`
--

INSERT INTO `employeesappend` (`id`, `select_categories`, `straight_pay_hours`, `overtime_hours1`, `overtime_hours2`, `night_hours_pay`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 3, '100', '150', '200', '300', 10, '2023-04-12 13:00:16', '2023-04-12 13:00:16'),
(2, 2, '42', '98', '85', '98', 11, '2023-04-12 13:09:42', '2023-04-12 13:09:42'),
(3, 3, '200', '300', '400', '300', 12, '2023-04-12 13:14:09', '2023-04-12 13:14:09'),
(4, 2, '27', '72', '8', '55', 13, '2023-04-14 12:24:42', '2023-04-14 12:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING HASH
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fedralrebate`
--

DROP TABLE IF EXISTS `fedralrebate`;
CREATE TABLE IF NOT EXISTS `fedralrebate` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fedralrebate`
--

INSERT INTO `fedralrebate` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, '1.7', '2023-04-01 04:31:20', '2023-04-13 11:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `fedralslabs`
--

DROP TABLE IF EXISTS `fedralslabs`;
CREATE TABLE IF NOT EXISTS `fedralslabs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `min_value` double NOT NULL,
  `max_value` double NOT NULL,
  `percentage_of_tax` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fedralslabs`
--

INSERT INTO `fedralslabs` (`id`, `min_value`, `max_value`, `percentage_of_tax`, `created_at`, `updated_at`) VALUES
(5, 4, 23, 32, '2023-04-13 11:23:11', '2023-04-13 11:41:07'),
(6, 2312, 12312, 312, '2023-04-13 11:25:28', '2023-04-13 11:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `created_at`, `updated_at`) VALUES
(2, 'Pune', '2023-03-31 05:22:18', '2023-04-12 11:38:52'),
(3, 'mumbai', '2023-04-08 05:47:22', '2023-04-08 05:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_03_31_101608_create_locations_table', 1),
(2, '2023_03_31_104017_create_categorys_table', 2),
(3, '2023_04_01_052743_create_payrun_table', 3),
(4, '2023_04_01_053216_create_payouts_table', 4),
(5, '2023_04_01_065513_create_fedralslabs_table', 5),
(6, '2023_04_01_080504_create_protaxslabs_table', 6),
(7, '2023_04_01_095150_create_fedralrebate_table', 7),
(8, '2023_04_01_102938_create_othertaxs_table', 8),
(9, '2023_04_01_141825_create_companysregs_table', 9),
(10, '2023_04_01_141852_create_companysregsappend_table', 10),
(11, '2023_04_01_161450_create_employees_table', 11),
(12, '2023_04_01_161508_create_employeesappend_table', 12),
(13, '2014_10_12_000000_create_users_table', 13),
(14, '2014_10_12_100000_create_password_resets_table', 13),
(15, '2019_08_19_000000_create_failed_jobs_table', 13),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 14),
(17, '2023_04_13_180357_create_assign_job_models_table', 15),
(18, '2023_04_14_160028_create_jobs_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `othertaxs`
--

DROP TABLE IF EXISTS `othertaxs`;
CREATE TABLE IF NOT EXISTS `othertaxs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vacation_pay` double NOT NULL,
  `CPP_Employee_Contribution` double NOT NULL,
  `max_value_cpp` double NOT NULL,
  `cpp_employers_contribution` double NOT NULL,
  `Max_Values_con` double NOT NULL,
  `EI_Employee_Contribution` double NOT NULL,
  `Max_Value_Ei` double NOT NULL,
  `ei_employers_contribution` double NOT NULL,
  `max_value_emprs` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `othertaxs`
--

INSERT INTO `othertaxs` (`id`, `vacation_pay`, `CPP_Employee_Contribution`, `max_value_cpp`, `cpp_employers_contribution`, `Max_Values_con`, `EI_Employee_Contribution`, `Max_Value_Ei`, `ei_employers_contribution`, `max_value_emprs`, `created_at`, `updated_at`) VALUES
(1, 300.22, 50, 20, 10, 300, 5000, 100, 20, 50, NULL, '2023-04-15 02:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

DROP TABLE IF EXISTS `payouts`;
CREATE TABLE IF NOT EXISTS `payouts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `add_payout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payouts`
--

INSERT INTO `payouts` (`id`, `add_payout`, `created_at`, `updated_at`) VALUES
(2, 'CASH', '2023-04-01 00:51:35', '2023-04-12 13:16:34'),
(4, 'asd', '2023-04-08 07:12:01', '2023-04-08 07:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `payrun`
--

DROP TABLE IF EXISTS `payrun`;
CREATE TABLE IF NOT EXISTS `payrun` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `add_payrun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrun`
--

INSERT INTO `payrun` (`id`, `add_payrun`, `no_of_days`, `created_at`, `updated_at`) VALUES
(3, 'Daily (240 pay periods a year)', 240, '2023-04-01 00:53:13', '2023-04-15 02:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `protaxslabs`
--

DROP TABLE IF EXISTS `protaxslabs`;
CREATE TABLE IF NOT EXISTS `protaxslabs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `min_values` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_values` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage_of_taxs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `protaxslabs`
--

INSERT INTO `protaxslabs` (`id`, `min_values`, `max_values`, `percentage_of_taxs`, `created_at`, `updated_at`) VALUES
(4, '34', '234', '423', '2023-04-13 11:41:24', '2023-04-13 11:41:24'),
(5, '99', '86', '63', '2023-04-13 11:42:42', '2023-04-13 11:42:42'),
(6, '23', '73', '63', '2023-04-13 11:43:17', '2023-04-13 11:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 for admin, 2 for company, 3 for employee',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
