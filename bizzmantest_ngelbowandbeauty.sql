-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 04:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bizzmantest_ngelbowandbeauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `nbb_add_ons`
--

CREATE TABLE `nbb_add_ons` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_mandarin` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `commission_type` enum('fixed','percentage') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_amount` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_add_ons`
--

INSERT INTO `nbb_add_ons` (`id`, `name`, `name_mandarin`, `image`, `price`, `duration`, `priority`, `status`, `commission_type`, `commission_amount`) VALUES
(1, 'EAR CANDLING', '耳烛式', '20200913135858-2020-09-13add_ons135855.jpg', '10', '30', 1, 0, '', 0),
(2, 'EAR CLEANING', '采耳', '20200913140122-2020-09-13add_ons140119.jpg', '10', '30', 2, 0, '', 0),
(3, 'BA GUAN THERAPY', '拔罐疗法', '20200913141335-2020-09-13add_ons141322.jpg', '10', '30', 3, 0, '', 0),
(4, 'GUA SHA THERAPY', '刮痧疗法', '20200913141421-2020-09-13add_ons141413.jpg', '10', '30', 4, 0, '', 0),
(5, 'BODY/ FOOT SCRUB', '身体/脚部磨砂膏', '20200913141457-2020-09-13add_ons141449.jpg', '10', '30', 5, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_appointment`
--

CREATE TABLE `nbb_appointment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_number` varchar(50) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `therapists` int(10) DEFAULT NULL,
  `services` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mandarin_services` text DEFAULT NULL,
  `total_amount` varchar(30) NOT NULL,
  `time_slot` varchar(50) NOT NULL,
  `start_slot` varchar(20) DEFAULT NULL,
  `end_slot` varchar(20) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `source` varchar(100) NOT NULL,
  `services_ids` varchar(100) NOT NULL,
  `instructions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt` text NOT NULL,
  `therapist_earning` float DEFAULT NULL,
  `service_earning` float DEFAULT NULL,
  `add_ons_earning` float DEFAULT NULL,
  `health_medical` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `payment_time` timestamp NULL DEFAULT NULL,
  `coupon` varchar(20) DEFAULT NULL,
  `discount` varchar(5) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `display_status` int(50) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_appointment`
--

INSERT INTO `nbb_appointment` (`id`, `customer_id`, `customer_number`, `customer_name`, `email`, `therapists`, `services`, `mandarin_services`, `total_amount`, `time_slot`, `start_slot`, `end_slot`, `duration`, `appointment_date`, `source`, `services_ids`, `instructions`, `feedback`, `receipt`, `therapist_earning`, `service_earning`, `add_ons_earning`, `health_medical`, `payment_mode`, `payment_time`, `coupon`, `discount`, `status`, `display_status`, `created_by`, `created_at`, `updated_at`, `branch_id`) VALUES
(1, 1, '08840910427', 'Twinkal Jaiswal', 'twinkaljaiswal1496@gmail.com', 1, '1', NULL, '500', '09:00-10:30', NULL, '', '', '2022-01-26', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-01-24 09:27:17', NULL, 1),
(2, 2, '08017692049', 'riya ojha', 'riyaojha2013@gmail.com', 1, '2', NULL, '1000', '09:00-09:30', NULL, '', '', '2022-02-25', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-02-19 04:10:37', NULL, 0),
(3, 2, '08017692049', 'riya ojha', 'riyaojha2013@gmail.com', 1, '2', NULL, '1000', '09:00-09:30', NULL, '', '', '2022-02-26', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-02-19 04:46:45', NULL, 0),
(4, 1, '09903230346', 'susmita ojha', 'fddgdf@gmail.com', 5, '3', NULL, '12', '09:00-09:20', NULL, '', '', '2022-02-24', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-02-23 05:42:34', NULL, 0),
(5, 2, '8017692049', 'test demo', 'riyaojha2013@gmail.com', 6, '3,5', NULL, '12', '09:00-09:20', NULL, '', '', '2022-02-26', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-02-25 02:16:57', NULL, 0),
(6, 1, '9903230346', 'susmita ojha', 'fddgdf@gmail.com', 5, '3,5', NULL, '15', '09:00-09:15', NULL, '', '', '2022-02-26', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-02-25 02:36:45', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_billing_address`
--

CREATE TABLE `nbb_billing_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `billing_firstname` varchar(200) DEFAULT NULL,
  `billing_lastname` varchar(200) DEFAULT NULL,
  `billing_contactno` int(11) DEFAULT NULL,
  `billing_country` varchar(200) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `billing_postal_code` int(11) DEFAULT NULL,
  `billing_city` text DEFAULT NULL,
  `billing_state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_billing_address`
--

INSERT INTO `nbb_billing_address` (`id`, `user_id`, `created_at`, `billing_firstname`, `billing_lastname`, `billing_contactno`, `billing_country`, `billing_address`, `billing_postal_code`, `billing_city`, `billing_state`) VALUES
(1, 1, '2022-09-07 12:29:47', 'susmita', 'ojha', 1234567892, '', 'fgf ghjh hg h,ghv', 700102, 'kolkata', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_check_therapist`
--

CREATE TABLE `nbb_check_therapist` (
  `id` int(11) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `therapist_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `move_to_last` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_check_therapist`
--

INSERT INTO `nbb_check_therapist` (`id`, `duration`, `start_date`, `end_date`, `therapist_id`, `date`, `move_to_last`) VALUES
(1, NULL, '2022-05-02', '2022-05-03', '5', '2022-05-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_child_category`
--

CREATE TABLE `nbb_child_category` (
  `id` int(11) NOT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  `category_name` varchar(220) DEFAULT NULL,
  `category_details` varchar(255) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_child_category`
--

INSERT INTO `nbb_child_category` (`id`, `parent_category_id`, `category_name`, `category_details`, `status`, `created_by`, `created_at`) VALUES
(1, 1, 'Skin Management', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:37:55'),
(2, 1, 'Light Medical Skin Management', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:39:10'),
(3, 1, 'Additional Care', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:39:10'),
(4, 1, 'Semi Permanent Lips Series', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:39:10'),
(5, 1, 'Semi Permanent Eyeliner Series', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:39:10'),
(6, 1, 'Semi Permanent Eyebrows Series ', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:39:10'),
(7, 1, 'Eye Lash Extension Series', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:39:10'),
(8, 2, 'Tools', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:39:10'),
(9, 2, 'Lips Colour', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:39:10'),
(10, 2, 'Eye Lash', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:39:10'),
(11, 3, 'Basic Course', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:39:10'),
(12, 3, 'Advance Course', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-08-18 07:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_commission`
--

CREATE TABLE `nbb_commission` (
  `commission_id` int(50) NOT NULL,
  `emp_id` int(50) DEFAULT NULL,
  `comission_from` varchar(200) DEFAULT NULL,
  `comission_to` varchar(200) DEFAULT NULL,
  `rate` varchar(200) DEFAULT NULL,
  `job_type` int(50) DEFAULT NULL,
  `status` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_commission`
--

INSERT INTO `nbb_commission` (`commission_id`, `emp_id`, `comission_from`, `comission_to`, `rate`, `job_type`, `status`) VALUES
(1, 1, '5000', '6999', '5', NULL, NULL),
(2, 3, '8000', '11999', '8', NULL, NULL),
(3, 5, '12000', '15999', '10', NULL, NULL),
(4, 7, '16000', '19999', '12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_commission_c_partnership`
--

CREATE TABLE `nbb_commission_c_partnership` (
  `id` int(11) NOT NULL,
  `type_of_fee` varchar(200) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_commission_c_partnership`
--

INSERT INTO `nbb_commission_c_partnership` (`id`, `type_of_fee`, `amount`, `status`) VALUES
(1, 'Sales', 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_commission_structure_a`
--

CREATE TABLE `nbb_commission_structure_a` (
  `id` int(11) NOT NULL,
  `from_range` int(11) DEFAULT NULL,
  `to_range` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_commission_structure_a`
--

INSERT INTO `nbb_commission_structure_a` (`id`, `from_range`, `to_range`, `amount`) VALUES
(2, 200, 299, 6),
(3, 300, 399, 8),
(4, 1000, NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_commission_structure_b`
--

CREATE TABLE `nbb_commission_structure_b` (
  `id` int(11) NOT NULL,
  `fee_Type` varchar(200) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_commission_structure_b`
--

INSERT INTO `nbb_commission_structure_b` (`id`, `fee_Type`, `amount`, `status`) VALUES
(1, 'Sale above $10000', 200, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_commission_structure_c`
--

CREATE TABLE `nbb_commission_structure_c` (
  `id` int(11) NOT NULL,
  `type_of_fee` varchar(200) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_commission_structure_c`
--

INSERT INTO `nbb_commission_structure_c` (`id`, `type_of_fee`, `amount`, `status`) VALUES
(2, 'Sales Figure $12000 - $15999', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_contact`
--

CREATE TABLE `nbb_contact` (
  `id` int(20) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `customer_email` varchar(30) DEFAULT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `customer_message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_contact`
--

INSERT INTO `nbb_contact` (`id`, `customer_name`, `customer_email`, `customer_phone`, `customer_message`) VALUES
(1, 'Tan Li Sen', 'lisen@sgml.com.sg', 'lisen@sgml.com.sg', '\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"'),
(2, 'Tan Li Sen', 'lisen@sgml.com.sg', 'lisen@sgml.com.sg', 'qsasasas'),
(3, 'Tan Li Sen', 'lisen@sgml.com.sg', 'lisen@sgml.com.sg', 'asasasas'),
(4, 'Tan Li Sen', 'lisen@sgml.com.sg', 'lisen@sgml.com.sg', 'wewewewe'),
(5, 'Tan Li Sen', 'lisen@sgml.com.sg', 'lisen@sgml.com.sg', 'wewewewe'),
(6, 'Tan Li Sen', 'lisen@sgml.com.sg', 'lisen@sgml.com.sg', 'wwdsdsds'),
(7, 'Tan Li Sen', 'lisen@sgml.com.sg', 'lisen@sgml.com.sg', 'wwdsdsds'),
(8, 'Ong Jian Sheng, Jeffery', 'jedd@sgml.com.sg', 'jedd@sgml.com.sg', 'dfdfdfdf'),
(9, 'Ong Jian Sheng, Jeffery', 'jedd@sgml.com.sg', 'jedd@sgml.com.sg', 'dfdfdfdf'),
(10, 'Tan Li Sen', 'lisen@sgml.com.sg', 'lisen@sgml.com.sg', 'xxcxcxcx');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_contact_email`
--

CREATE TABLE `nbb_contact_email` (
  `id` int(20) NOT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_contact_email`
--

INSERT INTO `nbb_contact_email` (`id`, `contact_email`, `date`) VALUES
(1, '1232@mail.com', '2022-08-20'),
(2, '2@mail.com', '2022-08-20'),
(3, '2@mail.com', '2022-08-23'),
(4, '1232@mail.com', '2022-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_coupons`
--

CREATE TABLE `nbb_coupons` (
  `id` int(191) NOT NULL,
  `coupon_code` varchar(15) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `banner_icon` text DEFAULT NULL,
  `discount` int(5) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(3) NOT NULL DEFAULT 1,
  `coupon_loyalty_points` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_coupons`
--

INSERT INTO `nbb_coupons` (`id`, `coupon_code`, `description`, `banner_icon`, `discount`, `start_date`, `expiry_date`, `created_at`, `status`, `coupon_loyalty_points`) VALUES
(3, 'freeGift', 'fdgrt hytyt iui uerer', NULL, 20, '2022-06-14', '2022-06-21', '2022-06-11 05:21:09', 1, '3');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_course`
--

CREATE TABLE `nbb_course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `durations` varchar(255) DEFAULT NULL,
  `course_fees` float(10,2) DEFAULT NULL,
  `foc_items` varchar(255) DEFAULT NULL,
  `type_of_cert` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_course`
--

INSERT INTO `nbb_course` (`id`, `course_name`, `course_image`, `category_id`, `trainer_id`, `description`, `durations`, `course_fees`, `foc_items`, `type_of_cert`) VALUES
(1, 'Professional Make-Up', NULL, 3, NULL, 'The beautician course helps students to learn about how to work as a makeup artist and deal with using corrective applications in terms of cosmetics for the skin, eyes, cheeks, and lips. ', '1 year', 100.00, 'test', 'demo'),
(4, 'Recognition and practice of face shape and eyebrow shape design', 'kal-visuals-square.jpg', 3, 11, 'fhfcb', '6 month', 100.00, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_cpf`
--

CREATE TABLE `nbb_cpf` (
  `id` int(10) NOT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `salary_from` varchar(30) DEFAULT NULL,
  `salary_to` int(30) DEFAULT NULL,
  `emp_cpf` int(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_cpf`
--

INSERT INTO `nbb_cpf` (`id`, `emp_id`, `age`, `year`, `salary_from`, `salary_to`, `emp_cpf`, `status`) VALUES
(1, 1, 50, 2022, '50', 500, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_credit_wallet`
--

CREATE TABLE `nbb_credit_wallet` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `points` decimal(20,5) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nbb_customer`
--

CREATE TABLE `nbb_customer` (
  `id` int(11) NOT NULL,
  `referreduser_id` varchar(255) DEFAULT NULL,
  `referred_by` varchar(255) DEFAULT NULL,
  `otp` varchar(200) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(12) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `medical_information` text DEFAULT NULL,
  `transactional_records` text DEFAULT NULL,
  `skin_conditions` int(11) DEFAULT NULL,
  `membership` int(11) DEFAULT NULL,
  `reference_name` int(11) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_customer`
--

INSERT INTO `nbb_customer` (`id`, `referreduser_id`, `referred_by`, `otp`, `first_name`, `last_name`, `dob`, `age`, `email`, `password`, `contact`, `profile_picture`, `address`, `created_at`, `created_by`, `medical_information`, `transactional_records`, `skin_conditions`, `membership`, `reference_name`, `status`) VALUES
(1, 'NBB0h3SJ', NULL, 'dBjv', 'Susmita', 'test', '0000-00-00', 0, 'ciprojectbizz@gmail.com', '9c6dcc6aac9e7ca2452d4ff75142e350', '9903230346', 'start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec5.png', NULL, '2022-09-07 11:59:13', 1, '', '', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_daily_sales`
--

CREATE TABLE `nbb_daily_sales` (
  `sales_id` int(20) NOT NULL,
  `emp_id` varchar(20) DEFAULT NULL,
  `sales_amount` varchar(50) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_daily_sales`
--

INSERT INTO `nbb_daily_sales` (`sales_id`, `emp_id`, `sales_amount`, `date`, `status`) VALUES
(1, '1', '10000', '2022-08-30', 1),
(2, '3', '20000', '2022-08-30', 1),
(3, '5', '19000', '2022-08-30', NULL),
(4, '7', '42310', '2022-08-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_dashboard`
--

CREATE TABLE `nbb_dashboard` (
  `id` int(11) NOT NULL,
  `therapist_id` int(11) NOT NULL,
  `customer_number` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `created_by` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_dashboard`
--

INSERT INTO `nbb_dashboard` (`id`, `therapist_id`, `customer_number`, `customer_name`, `services`, `start_date`, `start_time`, `end_date`, `end_time`, `created_by`, `amount`, `status`) VALUES
(1, 7, '12345', 'test', '3', '2022-09-17', '10:30:00', '2022-08-17', '11:30:00', 1, '30', 0),
(2, 5, '12345678', 'susmita', '3', '2022-09-03', '10:00:00', '2022-08-03', '11:00:00', 1, '30', 0),
(3, 6, '521', 'naboneeta', '4,5', '2022-09-17', '11:30:00', '2022-08-17', '13:30:00', 7, '60', 0),
(4, 7, '12354567', 'will Smith', '6', '2022-09-30', '09:00:00', '2022-08-27', '09:30:00', 1, '500', 2),
(5, 7, '100000', 'naboneeta', '5', '2022-09-15', '11:00:00', '2022-08-15', '12:30:00', 1, '30', 1),
(6, 6, '2000', 'sumi', '4', '2022-09-17', '10:30:00', '2022-08-17', '11:00:00', 1, '30', 1),
(8, 6, '123456789', 'boni', '3', '2022-09-29', '09:00:00', '2022-08-29', '10:00:00', 1, '30', 0),
(9, 6, '123456789', 'gfnb', '3', '2022-09-30', '09:00:00', '2022-08-30', '10:00:00', 1, '30', 3),
(10, 6, '8546', 'susmita', '4', '2022-09-05', '11:30:00', '2022-08-05', '12:00:00', 1, '30', 0),
(11, 7, '100000', 'test', '3,4', '2022-09-07', '11:00:00', '2022-08-07', '12:30:00', 1, '60', 0),
(12, 7, '100000', 'susmita', '4', '2022-09-28', '11:30:00', '2022-08-28', '12:00:00', 1, '30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_delivery_details`
--

CREATE TABLE `nbb_delivery_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `courier` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `courier_price` varchar(30) DEFAULT NULL,
  `tacking_number` varchar(250) DEFAULT NULL,
  `traking_link` varchar(200) DEFAULT NULL,
  `tacking_details` text DEFAULT NULL,
  `date_booked` date DEFAULT NULL,
  `delivery_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_delivery_details`
--

INSERT INTO `nbb_delivery_details` (`id`, `order_id`, `courier`, `quantity`, `courier_price`, `tacking_number`, `traking_link`, `tacking_details`, `date_booked`, `delivery_status`) VALUES
(2, 3, 5, 1, '40', '', '', '', '2022-03-19', 11),
(3, 1, 5, 1, '40', '', '', '', '2022-03-19', 12),
(4, 2, 5, 1, '40', '', '', '', '2022-03-19', 13),
(5, 4, 5, 1, '40', '', '', '', '2022-03-19', 14);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_delivery_status`
--

CREATE TABLE `nbb_delivery_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_delivery_status`
--

INSERT INTO `nbb_delivery_status` (`id`, `status_name`) VALUES
(1, 'Confirm'),
(2, 'Processing'),
(3, 'Assign to delivery'),
(4, 'Delivered ');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_employees`
--

CREATE TABLE `nbb_employees` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `emp_number` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `employee_photo` varchar(255) DEFAULT NULL,
  `aadhaar_number` bigint(20) DEFAULT NULL,
  `pan_number` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `mob_no` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `husband_name` varchar(255) DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL,
  `marital_status` tinyint(3) DEFAULT NULL,
  `designation` int(11) DEFAULT NULL,
  `payStructure` tinyint(3) DEFAULT NULL,
  `sales_amount` varchar(50) DEFAULT NULL,
  `service_amount` int(11) DEFAULT NULL,
  `job_type` int(10) DEFAULT NULL,
  `job_type_id` int(50) DEFAULT NULL,
  `basicSalary` int(11) DEFAULT NULL,
  `commission` varchar(25) DEFAULT NULL,
  `date_of_joining` date NOT NULL,
  `willing_to_relocate` tinyint(3) DEFAULT NULL,
  `available_leave` int(11) DEFAULT 13,
  `yearly_leave` int(11) DEFAULT 13,
  `create_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_employees`
--

INSERT INTO `nbb_employees` (`id`, `order_id`, `date`, `emp_number`, `first_name`, `last_name`, `employee_photo`, `aadhaar_number`, `pan_number`, `date_of_birth`, `mob_no`, `email`, `password`, `father_name`, `mother_name`, `husband_name`, `gender`, `marital_status`, `designation`, `payStructure`, `sales_amount`, `service_amount`, `job_type`, `job_type_id`, `basicSalary`, `commission`, `date_of_joining`, `willing_to_relocate`, `available_leave`, `yearly_leave`, `create_date`, `status`) VALUES
(1, 144, '2022-09-07', 'NBB0004', 'susmita', 'ojha', 'download.jpg', 123456789, 'gh123', '1992-08-25', '9903230347', 'susmita@gmail.com', NULL, 'p ojha', 'a ojha', '', 'Female', NULL, 1, NULL, '50000', 100, 1, 1, 1500, '6000', '0000-00-00', 1, 13, 13, '2022-09-07 13:36:33', 1),
(3, 142, '2022-09-06', 'NBBE0006', 'firstname', 'lastname', NULL, 98745621, 'hjg15487', '2011-02-28', '', 'firstemp123@gmail.com', '63eec8b8bc9acaa0493e909c1362967f5e28f60fd0d5d109c1083b15e6dd4fbf2c1b52680a34b93470974e692695fc75977aab5a5470fc44e1efa4d5068053c1', 'cbc', 'vbvcb', '', 'Female', NULL, 3, 0, '17000', 300, 3, 3, 2000, '7000', '0000-00-00', 1, 13, 13, '2022-09-07 12:58:10', 1),
(5, 141, '2022-09-07', 'NBBE0005', 'test', 'demo', 'start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png', 1225478963, 'gh1232', '1992-11-19', '123456789', 'susmita@gmail.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 'p ojha', 'a ojha', '', 'Female', NULL, 7, 3, '20000', 500, 2, 2, 3000, '10000', '0000-00-00', 1, 13, 13, '2022-09-07 13:36:33', 1),
(7, 143, '2022-09-07', 'NBBE0010', 'test bizz', '', NULL, 0, '', '0000-00-00', '', 'ciprojectbizz@gmail.com', '44ce70fd9bf8c294e9c491c89fb05125eaebd16a5553fe402a040200c0c5d901fe8e93db33eef39148169a285a74be1f68d614366f06ce9d3aa6160ad98981d8', '', '', '', NULL, NULL, 5, 0, '50000', 700, 1, 4, 1000, '11000', '0000-00-00', NULL, 13, 13, '2022-09-07 12:58:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_employees_attendance`
--

CREATE TABLE `nbb_employees_attendance` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `login` datetime DEFAULT NULL,
  `logout` datetime DEFAULT NULL,
  `work_hours` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_employees_attendance`
--

INSERT INTO `nbb_employees_attendance` (`id`, `emp_id`, `login`, `logout`, `work_hours`) VALUES
(2, 7, '2022-07-21 10:00:00', '2022-07-21 10:00:00', '5.95'),
(5, 7, '2022-07-22 21:16:22', '2022-07-22 21:16:22', ''),
(6, 1, '2022-07-24 16:44:50', '2022-07-24 21:44:50', ''),
(7, 1, '2022-07-25 15:44:50', '2022-07-25 21:44:50', ''),
(8, 7, '2022-07-25 13:14:00', '2022-07-25 18:20:00', '5.1'),
(9, 3, '2022-07-11 09:54:51', '2022-07-11 15:54:51', ''),
(10, 5, '2022-07-14 09:41:00', '2022-07-14 16:36:00', '6.92'),
(11, 5, '2022-07-21 10:14:00', '2022-07-21 20:41:00', '10.45');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_employee_address`
--

CREATE TABLE `nbb_employee_address` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `full_address` text DEFAULT NULL,
  `land_mark` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_employee_address`
--

INSERT INTO `nbb_employee_address` (`id`, `emp_id`, `full_address`, `land_mark`, `city`, `state`, `pincode`) VALUES
(4, 4, 'fghfcg hghjj jhkj jQuery DataTable is a powerful and smart HTML ', 'xcgfcxvg', 'kolkata', 'WB', 700102),
(5, 5, 'fch jgj ch cfcv', 'xcgfcxvg hmb', 'kolkata', 'WB', 700102),
(6, 6, '', 'xcgfcxvg', 'kolkata', 'xyz', 155687),
(8, 7, '', 'xcgfcxvg', 'kolkata', 'wb', 155687),
(9, 11, '', '', 'kolkata', 'West Bengal', 700102);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_employee_leave`
--

CREATE TABLE `nbb_employee_leave` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL,
  `total_leave_days` varchar(50) DEFAULT NULL,
  `available_leave` int(11) DEFAULT NULL,
  `reason_for_leave` text DEFAULT NULL,
  `MC_files` varchar(255) DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_employee_leave`
--

INSERT INTO `nbb_employee_leave` (`id`, `emp_id`, `leave_from`, `leave_to`, `total_leave_days`, `available_leave`, `reason_for_leave`, `MC_files`, `status`) VALUES
(1, 5, '2022-03-28', '2022-03-31', '4', NULL, 'fgfg fh cnvbvb', NULL, 1),
(3, 6, '2022-03-26', '2022-03-30', '5', NULL, 'bhvcbv ', NULL, 2),
(6, 7, '2022-05-14', '2022-05-15', '2', 9, 'test hgfhg jhmnb', 'WhatsApp_Image_2022-06-14_at_10_36_39_AM_(1).jpeg', 0),
(7, 7, '2022-05-24', '2022-05-25', '2', 7, 'hgnb hgmnb', NULL, 0),
(8, 7, '2022-06-30', '2022-07-01', '2', 5, 'hghnbnm', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_employee_salary`
--

CREATE TABLE `nbb_employee_salary` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `job_type` tinyint(3) DEFAULT NULL,
  `basic_pay` float(10,2) DEFAULT NULL,
  `perfectAttendance` int(11) DEFAULT NULL,
  `performancebonus` int(11) DEFAULT NULL,
  `commissionPay` int(11) DEFAULT NULL,
  `dearness_allowance` float(10,2) DEFAULT NULL,
  `Provident_fund` float(10,2) DEFAULT NULL,
  `employees_state_insurance` float(10,2) DEFAULT NULL,
  `house_rent_allowance` float(10,2) DEFAULT NULL,
  `medical_allowance` float(10,2) DEFAULT NULL,
  `medical_leave_entitlement` float(10,2) DEFAULT NULL,
  `total_earning` float(10,2) DEFAULT NULL,
  `total_deduction` float(10,2) DEFAULT NULL,
  `net_pay` float(10,2) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_employee_salary`
--

INSERT INTO `nbb_employee_salary` (`id`, `emp_id`, `dept_id`, `job_type`, `basic_pay`, `perfectAttendance`, `performancebonus`, `commissionPay`, `dearness_allowance`, `Provident_fund`, `employees_state_insurance`, `house_rent_allowance`, `medical_allowance`, `medical_leave_entitlement`, `total_earning`, `total_deduction`, `net_pay`, `status`) VALUES
(1, 1, 7, 1, 5000.00, NULL, NULL, 12, NULL, 1100.00, 550.00, NULL, 250.00, 250.00, 7000.00, 1000.00, 6160.00, 1),
(2, 3, 4, 3, 7000.00, 100, 100, 0, NULL, 0.00, 0.00, NULL, 0.00, 0.00, 5200.00, 0.00, 0.00, 1),
(3, 7, 6, 3, 500.00, 200, 120, 0, NULL, 0.00, 0.00, NULL, 0.00, 0.00, 820.00, NULL, 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_emp_designation`
--

CREATE TABLE `nbb_emp_designation` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_emp_designation`
--

INSERT INTO `nbb_emp_designation` (`id`, `designation_name`) VALUES
(1, 'Therapists'),
(2, 'Accounter'),
(3, 'Delivery boy');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_emp_education_qualification`
--

CREATE TABLE `nbb_emp_education_qualification` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `institute_university` varchar(255) DEFAULT NULL,
  `year_of_passing` varchar(50) DEFAULT NULL,
  `marks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_emp_education_qualification`
--

INSERT INTO `nbb_emp_education_qualification` (`id`, `emp_id`, `qualification`, `institute_university`, `year_of_passing`, `marks`) VALUES
(1, 4, 'se', 'niit', '2019', '70%'),
(2, 4, 'hs', 'wb', '2015', '70%'),
(3, 5, 'BA', 'gjg', '2019', '70%'),
(4, 6, 'BA', 'gjg', '2019', '70%'),
(6, 0, 'BA', 'niit', '2019', '70%'),
(7, 7, 'BA', 'niit', '2019', '70%'),
(8, 11, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_emp_holidays`
--

CREATE TABLE `nbb_emp_holidays` (
  `id` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `holidays` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_emp_holidays`
--

INSERT INTO `nbb_emp_holidays` (`id`, `year`, `date`, `day`, `holidays`) VALUES
(1, 2022, '2022-05-13', 'Friday', 'demo1'),
(2, 2022, '2022-05-24', 'Tuesday', 'test'),
(4, 2021, '2022-05-19', 'Thursday', 'dfhfhfhh'),
(5, 2021, '2022-05-30', 'Monday', 'retry');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_expense_wallet`
--

CREATE TABLE `nbb_expense_wallet` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `balance` decimal(20,5) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nbb_feedback`
--

CREATE TABLE `nbb_feedback` (
  `id` int(191) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_feedback`
--

INSERT INTO `nbb_feedback` (`id`, `branch_id`, `user_id`, `rate`, `comment`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 2, '', 1, '2021-12-30 03:59:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_here_about_us`
--

CREATE TABLE `nbb_here_about_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_here_about_us`
--

INSERT INTO `nbb_here_about_us` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Google'),
(3, 'Facebook ads'),
(4, 'Instagram'),
(5, 'Email'),
(6, 'LinkedIn'),
(7, 'Gumtree'),
(8, 'Google ads');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_invoice_file`
--

CREATE TABLE `nbb_invoice_file` (
  `id` int(11) NOT NULL,
  `invoice_file` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nbb_job_type`
--

CREATE TABLE `nbb_job_type` (
  `id` int(50) NOT NULL,
  `type_name` varchar(100) DEFAULT NULL,
  `rate` bigint(20) DEFAULT NULL,
  `status` int(50) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_job_type`
--

INSERT INTO `nbb_job_type` (`id`, `type_name`, `rate`, `status`) VALUES
(1, 'Commission Staff', NULL, 1),
(2, 'Partnership Staff', NULL, 1),
(3, 'Full Time Staff', NULL, 1),
(4, 'Workmanship', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_lead`
--

CREATE TABLE `nbb_lead` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `medical_information` text DEFAULT NULL,
  `transactional_records` text DEFAULT NULL,
  `skin_conditions` int(11) DEFAULT NULL,
  `membership` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `reference_name` int(11) DEFAULT NULL,
  `source` int(11) DEFAULT NULL,
  `source_link` varchar(255) DEFAULT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_lead`
--

INSERT INTO `nbb_lead` (`id`, `first_name`, `last_name`, `dob`, `age`, `email`, `contact`, `profile_picture`, `address`, `city`, `state`, `country`, `zip_code`, `created_at`, `created_by`, `medical_information`, `transactional_records`, `skin_conditions`, `membership`, `comment`, `reference_name`, `source`, `source_link`, `status`) VALUES
(4, 'riya', 'ojha', '0000-00-00', 0, 'riyaojha@gmail.com', '1234567', NULL, 'test', 'dfdsf', 'erer', 'ghg', 42058, '0000-00-00 00:00:00', 1, NULL, NULL, NULL, 0, 'gfhgfhg', 4, 1, 'www.facebook.com', 1),
(5, 'demo', 'test', '0000-00-00', 0, 'ciprojectbizz@gmail.com', '12345679', '20200913112559-2020-09-13service_category112555.jpg', '', '', '', '', 0, '2022-07-04 14:32:35', 1, NULL, NULL, NULL, 1, '', 1, 6, 'https://in.linkedin.com/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_manual_fee`
--

CREATE TABLE `nbb_manual_fee` (
  `id` int(11) NOT NULL,
  `type_of_fee` varchar(200) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_manual_fee`
--

INSERT INTO `nbb_manual_fee` (`id`, `type_of_fee`, `amount`, `status`) VALUES
(2, 'Facial', 5, NULL),
(3, 'Fist trial', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_order_main`
--

CREATE TABLE `nbb_order_main` (
  `id` int(11) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `saler_id` int(11) DEFAULT NULL,
  `order_status` tinyint(3) DEFAULT NULL,
  `customer_firstname` varchar(200) DEFAULT NULL,
  `customer_lastname` varchar(200) DEFAULT NULL,
  `customer_email` varchar(200) DEFAULT NULL,
  `customer_phone` int(11) DEFAULT NULL,
  `customer_postcode` int(11) DEFAULT NULL,
  `type_flag` varchar(10) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_order_main`
--

INSERT INTO `nbb_order_main` (`id`, `order_number`, `user_id`, `saler_id`, `order_status`, `customer_firstname`, `customer_lastname`, `customer_email`, `customer_phone`, `customer_postcode`, `type_flag`, `payment_method`, `create_date`, `delivery_date`) VALUES
(1, 'NBB0001', 7, 4, 1, NULL, NULL, NULL, NULL, NULL, 'O', NULL, '2022-08-13 14:22:57', '2022-08-24'),
(2, 'NBB0002', 2, 4, 1, NULL, NULL, NULL, NULL, NULL, 'O', NULL, '2022-08-13 14:23:02', '2022-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_order_product`
--

CREATE TABLE `nbb_order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` bigint(255) NOT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `product_price` decimal(10,0) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_order_product`
--

INSERT INTO `nbb_order_product` (`id`, `order_id`, `product_id`, `total_quantity`, `total_price`, `product_price`, `create_date`, `order_status`) VALUES
(1, 1, 1, 2, '36', '18', '2022-08-13 14:18:43', 0),
(2, 1, 2, 5, '50', '10', '2022-08-13 14:18:43', 0),
(3, 2, 1, 4, '72', '18', '2022-08-13 14:19:13', 0),
(4, 2, 2, 5, '50', '10', '2022-08-13 14:19:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_packages`
--

CREATE TABLE `nbb_packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_detail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_credits` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_packages`
--

INSERT INTO `nbb_packages` (`id`, `package_name`, `package_detail`, `package_price`, `package_credits`, `created_at`, `status`) VALUES
(3, 'Deep Hydration Skin Care', 'Skin Care', '128', 3, '2022-06-08 10:25:53', 1),
(2, 'Hydra Peel Deep Cleansing  ', 'dgdfgbf gfg hfg', '128', 3, '2022-06-08 10:15:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_parentcategory`
--

CREATE TABLE `nbb_parentcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_parentcategory`
--

INSERT INTO `nbb_parentcategory` (`id`, `name`, `details`, `created_at`) VALUES
(1, 'Service ', 'rt jgnb jgmn hgjh gfgcvb', '2022-06-20 19:19:16'),
(2, 'Product ', 'demo', '2022-06-20 19:19:07'),
(3, 'Course', 'ghygn', '2022-06-20 19:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_payment_type`
--

CREATE TABLE `nbb_payment_type` (
  `id` int(11) NOT NULL,
  `payment_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_payment_type`
--

INSERT INTO `nbb_payment_type` (`id`, `payment_name`) VALUES
(1, 'Paypal'),
(2, 'Bank Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_pay_structure`
--

CREATE TABLE `nbb_pay_structure` (
  `id` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `dearness_Allowance` float(10,2) DEFAULT NULL,
  `provident_Fund` float(10,2) DEFAULT NULL,
  `ESI` float(10,2) DEFAULT NULL,
  `medical_Allowance` float(10,2) DEFAULT NULL,
  `medical_leave_entitlement` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_pay_structure`
--

INSERT INTO `nbb_pay_structure` (`id`, `year`, `dearness_Allowance`, `provident_Fund`, `ESI`, `medical_Allowance`, `medical_leave_entitlement`) VALUES
(3, 2022, 0.10, 0.20, 0.10, 0.05, 0.05);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_permission`
--

CREATE TABLE `nbb_permission` (
  `id` int(11) NOT NULL,
  `menuname` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_permission`
--

INSERT INTO `nbb_permission` (`id`, `menuname`, `created_at`) VALUES
(1, 'Product Management', '2022-06-01 10:51:29'),
(4, 'Procurement Module', '2022-06-01 10:51:29'),
(5, 'Service & Appointment', '2022-06-17 12:53:28'),
(6, 'Order Management', '2022-06-01 10:53:21'),
(7, 'Delivery Management', '2022-06-01 10:53:39'),
(8, 'Offer & Packages', '2022-06-01 10:53:58'),
(9, 'Human Resource', '2022-06-01 10:54:20'),
(10, 'Admin User', '2022-06-01 10:54:44'),
(11, 'Customer Management', '2022-06-09 11:23:39'),
(13, 'Course Management', '2022-06-09 11:23:04'),
(14, 'Category Management', '2022-06-17 12:53:56'),
(15, 'Lead Management', '2022-06-30 17:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_product`
--

CREATE TABLE `nbb_product` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `brand_name` varchar(200) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `colour` varchar(200) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tags` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `available_stock` int(11) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `mfg_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `types` tinyint(3) DEFAULT NULL,
  `light_medical_beauty` tinyint(3) DEFAULT NULL,
  `curlness` varchar(50) DEFAULT NULL,
  `thickness` varchar(50) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_product`
--

INSERT INTO `nbb_product` (`id`, `categorie_id`, `product_category_id`, `sku`, `brand_name`, `name`, `colour`, `product_code`, `supplier_id`, `barcode`, `description`, `short_description`, `date`, `tags`, `stock`, `available_stock`, `weight`, `price`, `mfg_date`, `expiry_date`, `types`, `light_medical_beauty`, `curlness`, `thickness`, `status`) VALUES
(1, 2, 8, 'ng-n-014', NULL, 'Needles', NULL, NULL, 2, 'ng-n-014_2022-08-16.png', '', '', '2022-08-16 18:42:33', '', NULL, 14, '50', 18, '2022-07-20', '2024-02-25', NULL, NULL, NULL, NULL, 1),
(2, 2, 8, 'ng-cb-22', NULL, 'Cotton Buds', NULL, NULL, 2, 'ng-cb-22_2022-08-16.png', '', '', '2022-08-16 18:41:38', '', NULL, 10, '10', 10, '2022-07-06', '2024-06-26', NULL, NULL, NULL, NULL, 1),
(3, 2, 8, 'pencil-10', 'test', 'Pencil', 'black', NULL, 3, NULL, '', '', '2022-09-05 12:51:45', '', 15, 15, '1mm', 50, '2022-08-03', '2024-11-13', 2, NULL, '12', '1.2', 1),
(4, 2, 9, 'red147', 'demo', 'Red', 'red', NULL, 3, NULL, '', '', '2022-09-05 12:58:23', '', 20, 20, '10', 50, '2022-09-01', '2024-11-20', 2, NULL, '', '', 1),
(5, 2, 9, 'redrose22', 'test', 'Rose Red', 'Rose Red', NULL, 3, NULL, '', '', '2022-09-05 13:25:55', '', 20, 20, '10', 11, '2022-09-01', '2024-11-13', 2, NULL, '', '', 1),
(6, 2, 9, 'Orange-33', 'test', 'Orange ', 'Orange', NULL, 3, NULL, '', '', '2022-09-05 13:27:43', '', 30, 30, '10', 50, '2022-08-31', '2024-10-05', 2, 1, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_product_category`
--

CREATE TABLE `nbb_product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_product_category`
--

INSERT INTO `nbb_product_category` (`id`, `name`, `status`) VALUES
(1, 'demo test', 1),
(4, 'test', 1),
(5, 'demo 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_product_image`
--

CREATE TABLE `nbb_product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_product_image`
--

INSERT INTO `nbb_product_image` (`id`, `product_id`, `image`, `status`) VALUES
(1, 1, 'NEEDLE__01.png', NULL),
(2, 2, '22f6c476-4675-4fb0-863a-2d51c5f74251-cotton.jpg', NULL),
(3, 2, 'bamboo-cotton-earbuds-pack-of-80-500x500.jpg', NULL),
(4, 2, '22f6c476-4675-4fb0-863a-2d51c5f74251-cotton.jpg', NULL),
(5, 2, 'bamboo-cotton-earbuds-pack-of-80-500x500.jpg', NULL),
(6, 3, 'Rimmel_Eyebrow_Pencil.jpg', NULL),
(7, 4, 'images1.jpg', NULL),
(8, 5, '3b1f703c0934e3d03bb6f96f4300f0382.jpg', NULL),
(9, 6, 'f4857ce4e0a422c785cb859f8b3d67691.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_register_student`
--

CREATE TABLE `nbb_register_student` (
  `id` int(11) NOT NULL,
  `student_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `pin_code` int(11) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `last_university` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `terms_conditons` tinyint(3) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_register_student`
--

INSERT INTO `nbb_register_student` (`id`, `student_code`, `photo`, `first_name`, `last_name`, `dob`, `email`, `mobile_number`, `gender`, `address`, `city`, `pin_code`, `state`, `country`, `last_university`, `course_id`, `terms_conditons`, `status`) VALUES
(1, 'NBBS0001', 'bruce-mars.jpg', 'Susmita', 'ojha', '2022-06-29', 'admin1234@gmail.com', 2147483647, 'Female', 'kestopur,kolkata', 'kolkata', 700102, 'wb', 'India', 'niit', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_rolepermission`
--

CREATE TABLE `nbb_rolepermission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_rolepermission`
--

INSERT INTO `nbb_rolepermission` (`id`, `role_id`, `permission_id`) VALUES
(1, 4, 1),
(2, 4, 4),
(8, 1, 10),
(9, 1, 9),
(10, 1, 8),
(11, 1, 7),
(12, 1, 6),
(13, 1, 5),
(14, 1, 4),
(15, 1, 1),
(16, 1, 13),
(17, 1, 11),
(18, 1, 14),
(19, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_roles`
--

CREATE TABLE `nbb_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_roles`
--

INSERT INTO `nbb_roles` (`id`, `role_name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(4, 'Supplier '),
(6, 'beautician'),
(7, 'Therapist'),
(8, 'Trainer');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_service`
--

CREATE TABLE `nbb_service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(200) DEFAULT NULL,
  `service_icon` varchar(255) DEFAULT NULL,
  `main_category_id` int(11) DEFAULT NULL,
  `service_category` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `service_price` int(11) DEFAULT NULL,
  `therapist_commission` varchar(50) DEFAULT NULL,
  `commission_amount` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `loyalty_points` int(11) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_service`
--

INSERT INTO `nbb_service` (`id`, `service_name`, `service_icon`, `main_category_id`, `service_category`, `description`, `service_price`, `therapist_commission`, `commission_amount`, `duration`, `priority`, `loyalty_points`, `status`, `created_by`, `created_at`) VALUES
(1, 'Basic Treatment Series', '20200913112431-2020-09-13service_category112424.jpg', 1, 1, '', 50, 'fixed', 0, 30, 2, 3, 1, 1, '2022-07-29 08:33:47'),
(2, 'Hydra Peel Deep Cleansing ', '640px-Cosmetologist_applying_skincare_treatment1.jpg', 1, 1, '', 20, '', 0, 30, 0, 0, 1, 1, '2022-07-29 08:45:13'),
(3, 'Deep Hydration Skin Care', '20200913114530-2020-09-13service_category11452521.jpg', 1, 1, '', 40, '', 0, 30, 0, 0, 1, 1, '2022-07-29 08:46:11'),
(5, 'Accent Pro (Face , Neck ) ', '20200913112641-2020-09-13service_category1126331.jpg', 1, 2, '', 60, '', 0, 30, 0, 0, 1, 1, '2022-07-29 08:49:45'),
(6, 'Gua Sha (Face , Eyes, Neck )', '615L4NeZkwS__SL1001_.jpg', 1, 3, '', 50, '', 0, 30, 0, 0, 1, 1, '2022-07-29 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_service_packages`
--

CREATE TABLE `nbb_service_packages` (
  `id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_service_packages`
--

INSERT INTO `nbb_service_packages` (`id`, `package_id`, `service_id`) VALUES
(1, 2, 3),
(2, 2, 4),
(3, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_shipping_address`
--

CREATE TABLE `nbb_shipping_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `shipping_firstname` varchar(200) DEFAULT NULL,
  `shipping_lastname` varchar(200) DEFAULT NULL,
  `shipping_contactno` varchar(200) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `shipping_country` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(200) DEFAULT NULL,
  `shipping_state` int(11) DEFAULT NULL,
  `shipping_postalcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_shipping_address`
--

INSERT INTO `nbb_shipping_address` (`id`, `user_id`, `created_at`, `shipping_firstname`, `shipping_lastname`, `shipping_contactno`, `shipping_address`, `shipping_country`, `shipping_city`, `shipping_state`, `shipping_postalcode`) VALUES
(1, 1, '2022-09-07', 'susmita', 'ojha', '12345678', 'bvnvn iuo jjghj n b', NULL, 'kolkata', 1, 700102);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_state`
--

CREATE TABLE `nbb_state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_state`
--

INSERT INTO `nbb_state` (`id`, `name`) VALUES
(1, 'test'),
(2, 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_supplier`
--

CREATE TABLE `nbb_supplier` (
  `id` int(11) NOT NULL,
  `supplier_code` varchar(200) DEFAULT NULL,
  `supplier_name` varchar(200) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `supplier_address` text DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_supplier`
--

INSERT INTO `nbb_supplier` (`id`, `supplier_code`, `supplier_name`, `email`, `supplier_address`, `status`) VALUES
(2, 'thjgjh234', 'sudipto', 'gfgfbbv@gmail.com', 'gfghf ythghjgjhg', 1),
(3, 'bi1234', 'bizzman', 'admin1234@gmail.com', 'kolkata', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_supplier_order`
--

CREATE TABLE `nbb_supplier_order` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `order_code` varchar(200) DEFAULT NULL,
  `order_details` text DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `payment_status` tinyint(3) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_supplier_order`
--

INSERT INTO `nbb_supplier_order` (`id`, `supplier_id`, `created_at`, `created_by`, `order_code`, `order_details`, `payment_type`, `payment_status`, `status`) VALUES
(1, 2, '2022-07-26 13:26:28', 1, 'NBBO0001', 'We are interested in your product as we intend to market these types of products to our customers. ', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_supplier_order_product`
--

CREATE TABLE `nbb_supplier_order_product` (
  `id` int(11) NOT NULL,
  `supplier_order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_supplier_order_product`
--

INSERT INTO `nbb_supplier_order_product` (`id`, `supplier_order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 12),
(2, 1, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_therapists`
--

CREATE TABLE `nbb_therapists` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `checkin` varchar(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `therapist_earning` float DEFAULT 0,
  `service_earning` float DEFAULT 0,
  `add_ons_earning` float DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_therapists`
--

INSERT INTO `nbb_therapists` (`id`, `name`, `age`, `gender`, `service_id`, `checkin`, `mobile`, `image`, `therapist_earning`, `service_earning`, `add_ons_earning`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Twinkal', 25, 'female', 2, 'yes', '8840910427', '20210514112908-2021-05-14therapists1129071.jpeg', 0, 0, 0, 1, '2021-12-30 04:07:06', '2021-12-30 09:37:06'),
(3, 'admin', 24, 'male', 2, 'yes', '', '20201104190323-2020-11-04service190315111.png', 0, 0, 0, 1, '2022-01-18 08:41:42', '2022-01-18 14:11:42'),
(5, 'demo test', 23, 'male', 3, 'yes', '', 'LOGO-text.png', 0, 0, 0, 1, '2022-02-23 05:41:58', '2022-02-23 11:11:58'),
(6, 'susmita', 23, 'female', 3, 'yes', '12458645', 'beautiful-aurora-universe-milky-way-260nw-17870564785.jpg', 0, 0, 0, 1, '2022-02-24 03:46:45', '2022-02-24 09:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_type`
--

CREATE TABLE `nbb_type` (
  `id` int(10) NOT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `rate` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_type`
--

INSERT INTO `nbb_type` (`id`, `emp_id`, `type`, `rate`) VALUES
(1, 1, 'workmanship', 5),
(2, 3, 'workmanship', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_users`
--

CREATE TABLE `nbb_users` (
  `id` int(11) NOT NULL,
  `code` varchar(200) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_users`
--

INSERT INTO `nbb_users` (`id`, `code`, `first_name`, `last_name`, `email`, `password`, `status`, `role_id`, `created_at`) VALUES
(1, NULL, 'admin', NULL, 'admin1234@gmail.com', '44ce70fd9bf8c294e9c491c89fb05125eaebd16a5553fe402a040200c0c5d901fe8e93db33eef39148169a285a74be1f68d614366f06ce9d3aa6160ad98981d8', 1, 1, '2022-05-31 15:26:31'),
(2, NULL, 'susmita ojha', NULL, 'supplier1234@gmail.com', 'f100506a937cd227692f1c0b19df1035f4886f5c75a7d513dd816dad1b744232030f0f6f0d371f6e82becbaf4f819b2688488bd98f1bda26757328a4025a87cf', 1, 4, '2022-05-31 13:38:56'),
(3, NULL, 'susmita ojha', NULL, 'susmita@gmail.com', '3b320c3c48b60d32f44e46981dd51afe8a4b132b804a8081ac56495b03c186e69d6ae3680d01836b394c3b90505d56535b078136e8b4d165a09d5fc57e3b7dc3', 1, 2, '2022-06-03 11:48:52'),
(4, NULL, 'test', NULL, 'test@gmail.com', '5d3ecdd08e15ad61466ea727fc19b9d6c2b8fa44e4e227d57895fc7f74ece26a09679fd4ea8ff422981e0adfbcccdcb68b879c31857e8f1d89a0d764cf1bedf9', 1, 6, '2022-06-03 11:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_work_experience`
--

CREATE TABLE `nbb_work_experience` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `company_name` varchar(220) DEFAULT NULL,
  `work_role` varchar(255) NOT NULL,
  `form_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_work_experience`
--

INSERT INTO `nbb_work_experience` (`id`, `emp_id`, `company_name`, `work_role`, `form_date`, `to_date`) VALUES
(1, 4, 'infotech', 'web', '2020-02-16', '2022-02-02'),
(2, 5, 'infotech', 'web', '2019-02-09', '2022-03-03'),
(3, 6, 'infotech', 'web', '2020-01-03', '2022-03-03'),
(5, 0, 'infotech', 'web', '2021-01-02', '2022-03-03'),
(6, 7, 'infotech', 'web', '2021-01-05', '2022-03-04'),
(7, 11, '', '', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nbb_add_ons`
--
ALTER TABLE `nbb_add_ons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_appointment`
--
ALTER TABLE `nbb_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_billing_address`
--
ALTER TABLE `nbb_billing_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_check_therapist`
--
ALTER TABLE `nbb_check_therapist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_child_category`
--
ALTER TABLE `nbb_child_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_commission`
--
ALTER TABLE `nbb_commission`
  ADD PRIMARY KEY (`commission_id`);

--
-- Indexes for table `nbb_commission_c_partnership`
--
ALTER TABLE `nbb_commission_c_partnership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_commission_structure_a`
--
ALTER TABLE `nbb_commission_structure_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_commission_structure_b`
--
ALTER TABLE `nbb_commission_structure_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_commission_structure_c`
--
ALTER TABLE `nbb_commission_structure_c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_contact`
--
ALTER TABLE `nbb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_contact_email`
--
ALTER TABLE `nbb_contact_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_coupons`
--
ALTER TABLE `nbb_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_course`
--
ALTER TABLE `nbb_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_cpf`
--
ALTER TABLE `nbb_cpf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_credit_wallet`
--
ALTER TABLE `nbb_credit_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_customer`
--
ALTER TABLE `nbb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_daily_sales`
--
ALTER TABLE `nbb_daily_sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `nbb_dashboard`
--
ALTER TABLE `nbb_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_delivery_details`
--
ALTER TABLE `nbb_delivery_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_delivery_status`
--
ALTER TABLE `nbb_delivery_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_employees`
--
ALTER TABLE `nbb_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_employees_attendance`
--
ALTER TABLE `nbb_employees_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_employee_address`
--
ALTER TABLE `nbb_employee_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_employee_leave`
--
ALTER TABLE `nbb_employee_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_employee_salary`
--
ALTER TABLE `nbb_employee_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_emp_designation`
--
ALTER TABLE `nbb_emp_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_emp_education_qualification`
--
ALTER TABLE `nbb_emp_education_qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_emp_holidays`
--
ALTER TABLE `nbb_emp_holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_expense_wallet`
--
ALTER TABLE `nbb_expense_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_feedback`
--
ALTER TABLE `nbb_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_here_about_us`
--
ALTER TABLE `nbb_here_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_invoice_file`
--
ALTER TABLE `nbb_invoice_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_job_type`
--
ALTER TABLE `nbb_job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_lead`
--
ALTER TABLE `nbb_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_manual_fee`
--
ALTER TABLE `nbb_manual_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_order_main`
--
ALTER TABLE `nbb_order_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_order_product`
--
ALTER TABLE `nbb_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_packages`
--
ALTER TABLE `nbb_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_parentcategory`
--
ALTER TABLE `nbb_parentcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_payment_type`
--
ALTER TABLE `nbb_payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_pay_structure`
--
ALTER TABLE `nbb_pay_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_permission`
--
ALTER TABLE `nbb_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_product`
--
ALTER TABLE `nbb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_product_category`
--
ALTER TABLE `nbb_product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_product_image`
--
ALTER TABLE `nbb_product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_register_student`
--
ALTER TABLE `nbb_register_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_rolepermission`
--
ALTER TABLE `nbb_rolepermission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_roles`
--
ALTER TABLE `nbb_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_service`
--
ALTER TABLE `nbb_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_service_packages`
--
ALTER TABLE `nbb_service_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_shipping_address`
--
ALTER TABLE `nbb_shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_state`
--
ALTER TABLE `nbb_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_supplier`
--
ALTER TABLE `nbb_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_supplier_order`
--
ALTER TABLE `nbb_supplier_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_supplier_order_product`
--
ALTER TABLE `nbb_supplier_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_therapists`
--
ALTER TABLE `nbb_therapists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_type`
--
ALTER TABLE `nbb_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_users`
--
ALTER TABLE `nbb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_work_experience`
--
ALTER TABLE `nbb_work_experience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nbb_add_ons`
--
ALTER TABLE `nbb_add_ons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nbb_appointment`
--
ALTER TABLE `nbb_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nbb_billing_address`
--
ALTER TABLE `nbb_billing_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_check_therapist`
--
ALTER TABLE `nbb_check_therapist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_child_category`
--
ALTER TABLE `nbb_child_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nbb_commission`
--
ALTER TABLE `nbb_commission`
  MODIFY `commission_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_commission_c_partnership`
--
ALTER TABLE `nbb_commission_c_partnership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_commission_structure_a`
--
ALTER TABLE `nbb_commission_structure_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_commission_structure_b`
--
ALTER TABLE `nbb_commission_structure_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_commission_structure_c`
--
ALTER TABLE `nbb_commission_structure_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nbb_contact`
--
ALTER TABLE `nbb_contact`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nbb_contact_email`
--
ALTER TABLE `nbb_contact_email`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_coupons`
--
ALTER TABLE `nbb_coupons`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_course`
--
ALTER TABLE `nbb_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_cpf`
--
ALTER TABLE `nbb_cpf`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_credit_wallet`
--
ALTER TABLE `nbb_credit_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nbb_customer`
--
ALTER TABLE `nbb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_daily_sales`
--
ALTER TABLE `nbb_daily_sales`
  MODIFY `sales_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_dashboard`
--
ALTER TABLE `nbb_dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nbb_delivery_details`
--
ALTER TABLE `nbb_delivery_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nbb_delivery_status`
--
ALTER TABLE `nbb_delivery_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nbb_employees`
--
ALTER TABLE `nbb_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nbb_employees_attendance`
--
ALTER TABLE `nbb_employees_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nbb_employee_address`
--
ALTER TABLE `nbb_employee_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nbb_employee_leave`
--
ALTER TABLE `nbb_employee_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nbb_employee_salary`
--
ALTER TABLE `nbb_employee_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_emp_designation`
--
ALTER TABLE `nbb_emp_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_emp_education_qualification`
--
ALTER TABLE `nbb_emp_education_qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nbb_emp_holidays`
--
ALTER TABLE `nbb_emp_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nbb_expense_wallet`
--
ALTER TABLE `nbb_expense_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nbb_feedback`
--
ALTER TABLE `nbb_feedback`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_here_about_us`
--
ALTER TABLE `nbb_here_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nbb_invoice_file`
--
ALTER TABLE `nbb_invoice_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nbb_job_type`
--
ALTER TABLE `nbb_job_type`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_lead`
--
ALTER TABLE `nbb_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nbb_manual_fee`
--
ALTER TABLE `nbb_manual_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_order_main`
--
ALTER TABLE `nbb_order_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nbb_order_product`
--
ALTER TABLE `nbb_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_packages`
--
ALTER TABLE `nbb_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_parentcategory`
--
ALTER TABLE `nbb_parentcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_payment_type`
--
ALTER TABLE `nbb_payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nbb_pay_structure`
--
ALTER TABLE `nbb_pay_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_permission`
--
ALTER TABLE `nbb_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nbb_product`
--
ALTER TABLE `nbb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nbb_product_category`
--
ALTER TABLE `nbb_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nbb_product_image`
--
ALTER TABLE `nbb_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nbb_register_student`
--
ALTER TABLE `nbb_register_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_rolepermission`
--
ALTER TABLE `nbb_rolepermission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nbb_roles`
--
ALTER TABLE `nbb_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nbb_service`
--
ALTER TABLE `nbb_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nbb_service_packages`
--
ALTER TABLE `nbb_service_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_shipping_address`
--
ALTER TABLE `nbb_shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_state`
--
ALTER TABLE `nbb_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nbb_supplier`
--
ALTER TABLE `nbb_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_supplier_order`
--
ALTER TABLE `nbb_supplier_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_supplier_order_product`
--
ALTER TABLE `nbb_supplier_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nbb_therapists`
--
ALTER TABLE `nbb_therapists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nbb_type`
--
ALTER TABLE `nbb_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nbb_users`
--
ALTER TABLE `nbb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nbb_work_experience`
--
ALTER TABLE `nbb_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
