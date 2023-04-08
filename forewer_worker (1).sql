-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2023 at 09:35 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forewer_worker`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

DROP TABLE IF EXISTS `categorys`;
CREATE TABLE IF NOT EXISTS `categorys` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `add_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `add_category`, `created_at`, `updated_at`) VALUES
(2, 'Part-time', '2023-03-31 05:22:05', '2023-04-01 12:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `companysregs`
--

DROP TABLE IF EXISTS `companysregs`;
CREATE TABLE IF NOT EXISTS `companysregs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companysregs`
--

INSERT INTO `companysregs` (`id`, `company_name`, `transit_number`, `institution_number`, `account_number`, `address`, `zip`, `contact_person`, `email`, `contact_number`, `created_at`, `updated_at`) VALUES
(4, 's', '656', '65', '54', 's', '55', 'ds', 'sds@gmail.comdd', '56', '2023-04-01 10:33:43', '2023-04-01 10:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `companysregsappend`
--

DROP TABLE IF EXISTS `companysregsappend`;
CREATE TABLE IF NOT EXISTS `companysregsappend` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `select_categories` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `straight_pay_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime_hours1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime_hours2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `night_hours_pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_register_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companysregsappend`
--

INSERT INTO `companysregsappend` (`id`, `select_categories`, `straight_pay_hours`, `overtime_hours1`, `overtime_hours2`, `night_hours_pay`, `company_register_id`, `created_at`, `updated_at`) VALUES
(3, 'Part-time', '55', '55', '6', '6', '4', '2023-04-01 10:33:43', '2023-04-01 10:33:43'),
(4, 'Part-time', '55', '5', '5', '5', '4', '2023-04-01 10:33:43', '2023-04-01 10:33:43'),
(5, 'Part-time', 'xfbh', 'd', 'g', '65', '1', '2023-04-01 11:50:34', '2023-04-01 11:50:34'),
(6, 'Part-time', 'f', 'f', 'f', 'd', '2', '2023-04-01 11:52:06', '2023-04-01 11:52:06'),
(7, 'Part-time', '5', '6', '6', '5', '3', '2023-04-05 05:42:10', '2023-04-05 05:42:10'),
(8, 'Part-time', '6', '85', '9', '9', '3', '2023-04-05 05:42:10', '2023-04-05 05:42:10'),
(9, 'Part-time', '6', '8', '2', '7', '4', '2023-04-05 05:46:33', '2023-04-05 05:46:33'),
(10, 'Part-time', '2', '5', '5', '5', '5', '2023-04-05 05:50:29', '2023-04-05 05:50:29'),
(11, 'Part-time', '2', '5', '5', '5', '6', '2023-04-05 06:06:41', '2023-04-05 06:06:41'),
(12, 'Part-time', 'fd', 'gj', 'kh', 'hk', '7', '2023-04-05 06:09:45', '2023-04-05 06:09:45'),
(13, 'Part-time', 'fd', 'gj', 'kh', 'hk', '8', '2023-04-05 06:10:13', '2023-04-05 06:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `select_location` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `Job_Acceptreject` enum('Reject','Accept') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Show_Hide` enum('Show','Hide') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Only_Straight_hours` enum('not_applicable','Applicable') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `select_location`, `employee_id`, `employee_name`, `address`, `contact_number`, `Email`, `ID_proof`, `address_proof`, `DOB`, `sin`, `bcdl`, `bank_name`, `account_number`, `bank_details`, `Job_Acceptreject`, `Show_Hide`, `Only_Straight_hours`, `created_at`, `updated_at`) VALUES
(8, NULL, '5', 'jh', 'jj', '4885', 'hh', '1678870843.png', '1678870843.png', '2023-04-17', 'jj', 'jj', 'f', '5', 'fd', 'Accept', 'Show', 'Applicable', '2023-04-05 06:10:13', '2023-04-05 06:10:13'),
(7, NULL, '5', 'jh', 'jj', '4885', 'hh', '1678870843.png', '1678870843.png', '2023-04-17', 'jj', 'jj', 'f', '5', 'fd', 'Accept', 'Show', 'Applicable', '2023-04-05 06:09:45', '2023-04-05 06:09:45'),
(6, NULL, '5', 'khh', 'jh', '8596', 'hh', '1678441981.png', '1678870843 (1).png', '2023-04-06', '2', 'daf', 'fd', '585', 'd', NULL, NULL, 'Applicable', '2023-04-05 06:06:41', '2023-04-05 06:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `employeesappend`
--

DROP TABLE IF EXISTS `employeesappend`;
CREATE TABLE IF NOT EXISTS `employeesappend` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `select_categories` int NOT NULL,
  `straight_pay_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime_hours1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime_hours2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `night_hours_pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_register_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fedralrebate`
--

DROP TABLE IF EXISTS `fedralrebate`;
CREATE TABLE IF NOT EXISTS `fedralrebate` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fedralrebate`
--

INSERT INTO `fedralrebate` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, '1.20', '2023-04-01 04:31:20', '2023-04-01 04:31:20'),
(2, '$12.3', '2023-04-01 04:33:19', '2023-04-01 04:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `fedralslabs`
--

DROP TABLE IF EXISTS `fedralslabs`;
CREATE TABLE IF NOT EXISTS `fedralslabs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `min_value` double NOT NULL,
  `max_value` double NOT NULL,
  `percentage_of_tax` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fedralslabs`
--

INSERT INTO `fedralslabs` (`id`, `min_value`, `max_value`, `percentage_of_tax`, `created_at`, `updated_at`) VALUES
(3, 53359, 106717, 20.5, '2023-04-01 06:10:39', '2023-04-01 06:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `created_at`, `updated_at`) VALUES
(2, 'Pune', '2023-03-31 05:22:18', '2023-04-01 11:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(12, '2023_04_01_161508_create_employeesappend_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `othertaxs`
--

DROP TABLE IF EXISTS `othertaxs`;
CREATE TABLE IF NOT EXISTS `othertaxs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
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
(24, 200, 0, 20, 10, 300, 5000, 100, 20, 50, NULL, '2023-04-01 07:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

DROP TABLE IF EXISTS `payouts`;
CREATE TABLE IF NOT EXISTS `payouts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `add_payout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payouts`
--

INSERT INTO `payouts` (`id`, `add_payout`, `created_at`, `updated_at`) VALUES
(2, 'CASH', '2023-04-01 00:51:35', '2023-04-01 12:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `payrun`
--

DROP TABLE IF EXISTS `payrun`;
CREATE TABLE IF NOT EXISTS `payrun` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `add_payrun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_days` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrun`
--

INSERT INTO `payrun` (`id`, `add_payrun`, `no_of_days`, `created_at`, `updated_at`) VALUES
(3, 'Daily (240 pay periods a year)', 1, '2023-04-01 00:53:13', '2023-04-01 00:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `protaxslabs`
--

DROP TABLE IF EXISTS `protaxslabs`;
CREATE TABLE IF NOT EXISTS `protaxslabs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `min_values` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_values` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage_of_taxs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `protaxslabs`
--

INSERT INTO `protaxslabs` (`id`, `min_values`, `max_values`, `percentage_of_taxs`, `created_at`, `updated_at`) VALUES
(1, '$0', '$45,654', '5.06%', '2023-04-01 03:36:21', '2023-04-01 03:36:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
