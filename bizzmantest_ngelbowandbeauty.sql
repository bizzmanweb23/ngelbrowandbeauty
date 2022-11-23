-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 12:26 PM
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
  `billing_address` varchar(255) DEFAULT NULL,
  `billing_postal_code` int(11) DEFAULT NULL,
  `billing_hse_blk_no` varchar(255) DEFAULT NULL,
  `billing_unit_no` varchar(200) DEFAULT NULL,
  `billing_street` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_billing_address`
--

INSERT INTO `nbb_billing_address` (`id`, `user_id`, `created_at`, `billing_firstname`, `billing_lastname`, `billing_contactno`, `billing_country`, `billing_address`, `billing_postal_code`, `billing_hse_blk_no`, `billing_unit_no`, `billing_street`) VALUES
(1, 1, '2022-09-29 15:05:47', 'susmita', 'ojha', 1234, 'Singapore', 'ghf hjg', 123578, 'cb-23', '14', 'xcvx hgh');

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
  `product_cat_image` varchar(255) DEFAULT NULL,
  `category_details` varchar(255) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_child_category`
--

INSERT INTO `nbb_child_category` (`id`, `parent_category_id`, `category_name`, `product_cat_image`, `category_details`, `status`, `created_by`, `created_at`) VALUES
(1, 1, 'Skin Management', 'image6.jpg', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-11-10 05:18:22'),
(7, 1, 'Eye Lash Extension Series', 'EL.jpg', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-11-10 05:30:52'),
(10, 2, 'Lash', 'WhatsApp_Image_2022-10-20_at_2_33_36_PM.jpeg', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetu', 1, NULL, '2022-11-11 05:44:41'),
(11, 3, 'Basic Course', NULL, 'N‘gel Eye-brow-lips Semi permanent Intensive Course', 1, NULL, '2022-09-20 06:26:36'),
(12, 3, 'Advance Course', NULL, 'Elite Disciple Class', 1, NULL, '2022-09-20 06:28:12'),
(14, 1, 'Skin booster', 'image7.jpg', '高压无创水光系列 & Deersi  MTS   Non-Invasive Skinbooster', 0, NULL, '2022-11-10 05:21:04'),
(15, 1, 'Lash Infills Service', 'WhatsApp_Image_2022-10-20_at_2_33_34_PM.jpeg', 'Lash Infills Service 补睫服务', 1, NULL, '2022-11-10 05:18:54'),
(16, 2, 'Skin Care', 'whiteskin.jpg', '', 1, NULL, '2022-10-21 06:34:18'),
(18, 2, 'Eyelash Accessories', 'image60.jpg', '', 1, NULL, '2022-11-10 05:37:06'),
(19, 1, 'Semi-permanent Makeup Services', 'image11.jpg', '', 1, NULL, '2022-11-03 07:38:39'),
(24, 2, 'Pigment', 'beautiful-lips-300x2001.jpg', '', 1, NULL, '2022-11-23 09:18:40');

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
  `course_code` varchar(200) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_image` varchar(255) DEFAULT NULL,
  `main_category_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `class_time` int(11) DEFAULT NULL,
  `durations` varchar(255) DEFAULT NULL,
  `course_fees` float(10,2) DEFAULT NULL,
  `foc_items` varchar(255) DEFAULT NULL,
  `free_lesson` text DEFAULT NULL,
  `type_of_cert` varchar(255) DEFAULT NULL,
  `recomandation_fill` varchar(255) DEFAULT NULL,
  `terms_conditonsDetails` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_course`
--

INSERT INTO `nbb_course` (`id`, `course_code`, `course_name`, `course_image`, `main_category_id`, `category_id`, `trainer_id`, `description`, `class_time`, `durations`, `course_fees`, `foc_items`, `free_lesson`, `type_of_cert`, `recomandation_fill`, `terms_conditonsDetails`) VALUES
(1, 'NBBS0001', 'Elite Disciple Advance Course', 'advanceCourse.png', 3, 12, 0, 'The Origin & Development of Micropigmentation (Theory),Face shape and recognition design and practice of eyebrow shape, Basic Skin Dermatology Theory of tattooing, The decomposition steps and practices of drawing nine different types of eyebrow shapes and eyebrow frames, Understanding and arrangement of Hair Strokes Eyebrow, Four types of Microblading Hairstroke Eyebrows & practice, Ingenuity Misty + Microblading machine operated combination eyebrow, Techniques of machine and manual Misty Eyebrow, Nine types of Misty Eyebrows & practice, Basic theory of Chromatology, The Feng Shui theory of Eyebrow, Lash Enhancement Eyeliner, Classic Eyeliner, Creative Bright eyeliner, Nude-gloss look lip blushing, Handling of SPMU technical problems during the procedure, Semi-permanent Makeup Aftercare. ', NULL, '15 lessons +3 lessons', 3500.00, 'Free revising for one year, Free $800 tool kit.', 'N’gel exclusive customized 9D Feather-Light Brows, 9D Natural-wild Microblading Brows, 3 Days pre-training for ITEC examination, Academy’s Certificate will be awarded upon completion of course, Recommendation for sitting for ITEC qualification examination ', 'demo', 'Recommend for ITEC examination after the full course', ''),
(4, 'NBBS0004', 'N‘gel Eye-brow-lips Semi-permanent Intensive Course', 'BasicCourse.jpg', 3, 11, 0, 'One day Eyebrow (Powder Brows), One day Eyeliner, One day Lips,Online Class – 6 Days (8pm to 9pm),Online submission of homework for Teacher guidance,1 day practical with own model , Complete Task with Teacher guidance,First 6 registered students will be entitled to 3 free pigments.', NULL, 'Classroom Class – 3 Days (10:30am to 5:00pm),Online Class – 6 Days (8pm to 9pm)', 680.00, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_cpf`
--

CREATE TABLE `nbb_cpf` (
  `id` int(10) NOT NULL,
  `start_age` int(11) DEFAULT NULL,
  `end_age` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `salary_from` int(11) DEFAULT NULL,
  `salary_to` int(11) DEFAULT NULL,
  `emp_cpf` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_cpf`
--

INSERT INTO `nbb_cpf` (`id`, `start_age`, `end_age`, `year`, `salary_from`, `salary_to`, `emp_cpf`, `status`) VALUES
(3, 20, 30, 2022, 20, 300, 15, 1),
(4, 30, 50, 2022, 30, 500, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_credit_wallet`
--

CREATE TABLE `nbb_credit_wallet` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `referral_balance` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_credit_wallet`
--

INSERT INTO `nbb_credit_wallet` (`id`, `user_id`, `referral_balance`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 217, 0, '2022-09-23 11:17:57', '2022-09-23 11:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_customer`
--

CREATE TABLE `nbb_customer` (
  `id` int(11) NOT NULL,
  `referreduser_id` varchar(255) DEFAULT NULL,
  `membership_id` int(11) DEFAULT NULL,
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
  `gender` int(11) DEFAULT NULL,
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

INSERT INTO `nbb_customer` (`id`, `referreduser_id`, `membership_id`, `referred_by`, `otp`, `first_name`, `last_name`, `dob`, `age`, `email`, `password`, `contact`, `profile_picture`, `gender`, `address`, `created_at`, `created_by`, `medical_information`, `transactional_records`, `skin_conditions`, `membership`, `reference_name`, `status`) VALUES
(1, 'NBB0h3SJ', NULL, 'NBB545hjg', 'dBjv', 'Susmita', 'ojha', '0000-00-00', 0, 'ciprojectbizz@gmail.com', '9c6dcc6aac9e7ca2452d4ff75142e350', '9903230346', 'start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec5.png', NULL, NULL, '2022-09-29 11:54:46', 1, '', '', 0, 0, 0, 1),
(2, 'NBB545hjg', NULL, '', 'abjv', 'susmita', 'test', '0000-00-00', 0, '200@gmail.com', '202cb962ac59075b964b07152d234b70', '1234567890', 'start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec5.png', 0, NULL, '2022-09-07 11:59:13', 1, '', '', 0, 0, 0, 1);

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
  `user_id` int(11) DEFAULT NULL,
  `customer_number` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time NOT NULL,
  `created_by` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `times_packages` varchar(100) DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_dashboard`
--

INSERT INTO `nbb_dashboard` (`id`, `therapist_id`, `user_id`, `customer_number`, `customer_name`, `services`, `start_date`, `start_time`, `end_date`, `end_time`, `created_by`, `amount`, `times_packages`, `status`) VALUES
(1, 14, 1, '9903230346', 'Susmita ojha', '2', '2022-11-19', '19:00:00', '2022-11-19', '19:30:00', 0, '880', 'Package', 0),
(2, 7, 1, '9903230346', 'Susmita ojha', '27', '2022-11-21', '18:30:00', '2022-11-21', '19:00:00', 0, '50', 'One Time session', 0),
(3, 5, NULL, '857642', 'riya', '3', '2022-11-22', '11:30:00', '2022-11-22', '12:00:00', 1, '128', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_delivery_details`
--

CREATE TABLE `nbb_delivery_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `courier` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `courier_price` varchar(30) DEFAULT NULL,
  `tacking_number` varchar(250) DEFAULT NULL,
  `traking_link` varchar(200) DEFAULT NULL,
  `tacking_details` text DEFAULT NULL,
  `date_booked` date DEFAULT NULL,
  `delivery_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_delivery_details`
--

INSERT INTO `nbb_delivery_details` (`id`, `order_id`, `courier`, `quantity`, `courier_price`, `tacking_number`, `traking_link`, `tacking_details`, `date_booked`, `delivery_status`, `created_at`) VALUES
(1, 1, '19', 1, '', '', '', '', '2022-11-30', 1, '2022-11-23 12:37:36');

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
  `age` int(11) DEFAULT NULL,
  `mob_no` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `husband_name` varchar(255) DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL,
  `marital_status` tinyint(3) DEFAULT NULL,
  `designation` int(11) DEFAULT NULL,
  `therapist_color` varchar(50) DEFAULT NULL,
  `payStructure` tinyint(3) DEFAULT NULL,
  `job_type` int(10) DEFAULT NULL,
  `job_type_id` int(50) DEFAULT NULL,
  `basicSalary` int(11) DEFAULT NULL,
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

INSERT INTO `nbb_employees` (`id`, `order_id`, `date`, `emp_number`, `first_name`, `last_name`, `employee_photo`, `aadhaar_number`, `pan_number`, `date_of_birth`, `age`, `mob_no`, `email`, `password`, `father_name`, `mother_name`, `husband_name`, `gender`, `marital_status`, `designation`, `therapist_color`, `payStructure`, `job_type`, `job_type_id`, `basicSalary`, `date_of_joining`, `willing_to_relocate`, `available_leave`, `yearly_leave`, `create_date`, `status`) VALUES
(1, 218, '2022-11-19', 'NBB0004', 'susmita', 'ojha', 'download.jpg', 123456789, 'gh123', '1992-06-25', 30, '9903230347', 'susmita@gmail.com', 'ee943de332ecdcab9e2702fb8bd0e210eb6d1b299d930e3763b47b6cebc54c4d7cffab614ea91db87d78fecbef8633b3e1cab60093867cc2eea275e245b64f13', 'p ojha', 'a ojha', '', 'Female', NULL, 1, '#000000', 0, 1, 2, 1500, '0000-00-00', 1, 13, 13, '2022-11-19 12:16:14', 1),
(3, 216, '2022-11-21', 'NBBE0006', 'priyanka', 'roy', NULL, 98745621, 'hjg15487', '1990-08-25', 32, '', 'firstemp123@gmail.com', '63eec8b8bc9acaa0493e909c1362967f5e28f60fd0d5d109c1083b15e6dd4fbf2c1b52680a34b93470974e692695fc75977aab5a5470fc44e1efa4d5068053c1', 'cbc', 'vbvcb', '', 'Female', NULL, 7, '#fdf50d', 0, 3, 0, 2000, '0000-00-00', 1, 13, 13, '2022-11-21 18:40:26', 0),
(5, 215, '2022-11-23', 'NBBE0005', 'anne', '', 'start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png', 1225478963, 'gh1232', '1992-11-19', 0, '123456789', 'susmita@gmail.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 'p ojha', 'a ojha', '', 'Female', NULL, 7, '#401aff', 3, 2, 2, 3000, '0000-00-00', 1, 13, 13, '2022-11-23 10:18:11', 1),
(7, 217, '2022-11-23', 'NBBE0010', 'bizzman', 'web', NULL, 0, '', '1992-02-11', 30, '', 'ciprojectbizz@gmail.com', '44ce70fd9bf8c294e9c491c89fb05125eaebd16a5553fe402a040200c0c5d901fe8e93db33eef39148169a285a74be1f68d614366f06ce9d3aa6160ad98981d8', '', '', '', 'Female', NULL, 7, '#12edfd', 0, 1, 0, 5000, '0000-00-00', NULL, 13, 13, '2022-11-23 10:18:11', 1),
(12, 219, '2022-11-23', 'NBB0012', 'asif', 'amin', NULL, 0, '', '2008-01-01', 14, '1234567', 'asif@gmail.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '', '', '', 'Male', NULL, 7, '#f50a0a', 1, NULL, 0, 6000, '0000-00-00', 1, 13, 13, '2022-11-23 10:18:11', 1),
(13, 220, '2022-11-21', 'NBB0013', 'dipak', 'shing', NULL, 0, '', '2004-01-17', 18, '1234567899', 'dipak@gmail.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '', '', '', 'Male', NULL, 8, NULL, 1, NULL, 3, 10000, '2022-09-01', 1, 13, 13, '2022-11-21 13:30:01', 1),
(14, 222, '2022-11-23', 'NBB0014', 'sudipto', 'bhattachariya', NULL, 0, '', '2000-01-27', 22, '123458798', 'sudipto@gmail.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '', '', '', 'Male', NULL, 7, '#f00fd2', 1, NULL, 0, 10000, '0000-00-00', NULL, 13, 13, '2022-11-23 10:18:11', 1),
(15, 214, '2022-11-23', 'NBB0015', 'amrit', 'shing', NULL, 0, '', '2000-02-02', 22, '9874561237', 'amrit@gmail.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '', '', '', 'Male', NULL, 7, '#12f337', 1, NULL, 0, 8000, '0000-00-00', 1, 13, 13, '2022-11-23 10:18:11', 1),
(16, 212, '2022-11-12', 'NBB0016', 'Tomojit', 'bose', NULL, 0, '', '2000-02-11', 22, '3453543', 'tomojit1234@gmail.com', 'f563265e5db31abc8a007cf2078a1874834f3d117952bc369e9fccbaeb381bf980b4e78999908a79d04654a090d5553c1d16c5bcf12ed1de3df2661c0ceb9256', '', '', '', 'Male', NULL, 8, '#000000', 3, NULL, 2, 0, '2022-10-24', 1, 13, 13, '2022-11-12 11:30:27', 1),
(17, 213, '2022-11-14', 'NBB0017', 'Arijit', 'Nag', NULL, 123, '', '1995-01-18', 27, '12345987', 'arijit1234@gmail.com', 'c7a2124c0d58dcc0418824b939168c7457f8c8e10c2773f28916af8a0da1c7ee9848262a78711d7f1f976c6b31626d26dce58fa3521f5856df9866e8d7382dfa', '', '', '', 'Male', NULL, 8, '#000000', 3, NULL, 2, 0, '2022-10-11', 1, 13, 13, '2022-11-14 10:58:46', 1),
(18, 221, '2022-11-22', 'NBB0018', 'jotin', 'patil', NULL, 12547896, '', '1997-07-09', 25, '85236', 'jotinpatil@gmail.com', '9a131f1b867779b8908f56728a8462d13ae905d57a30b9352bbd8641289c727631f11378b34be5532d6740629e1c86b53483be88ffe7c1bf4a4acc793821fea2', '', '', '', 'Male', NULL, 8, '#000000', 2, NULL, 4, 0, '2022-11-29', 1, 13, 13, '2022-11-22 10:20:57', 1),
(19, 223, '2022-11-23', 'NBB0019', 'bizzman', 'webtest', NULL, 0, '', '2000-01-31', 22, '3453543', 'bizzman1234@gmail.com', '91dc75fe856146bcb3dd6160cccb9768f89963f28b3f5d334dfcc3f478aa5a714774c4fd32bb59284c053326c03affafbac86a61375c9670790bc17266d830e5', '', '', '', 'Male', NULL, 11, '#000000', 3, NULL, 1, 0, '2022-11-24', 1, 13, 13, '2022-11-23 14:46:29', 1);

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
(2, 7, '2022-09-22 10:00:00', '2022-09-22 10:00:00', '5.95'),
(5, 7, '2022-09-22 21:16:22', '2022-09-22 21:16:22', '9'),
(6, 1, '2022-09-24 16:44:50', '2022-09-24 21:44:50', '9'),
(7, 1, '2022-09-25 15:44:50', '2022-09-25 21:44:50', '9'),
(8, 7, '2022-09-25 13:14:00', '2022-09-25 18:20:00', '5.1'),
(9, 3, '2022-08-11 09:54:51', '2022-08-11 15:54:51', '9'),
(10, 5, '2022-08-14 09:41:00', '2022-08-14 16:36:00', '6.92'),
(11, 5, '2022-08-21 10:14:00', '2022-08-21 20:41:00', '10.45'),
(12, 1, '2022-09-09 10:11:00', '2022-09-09 19:30:00', '9.32');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_employee_address`
--

CREATE TABLE `nbb_employee_address` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `hse_blk_no` varchar(255) DEFAULT NULL,
  `unit_no` varchar(200) DEFAULT NULL,
  `building_street` varchar(255) DEFAULT NULL,
  `postalcode` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_employee_address`
--

INSERT INTO `nbb_employee_address` (`id`, `emp_id`, `address1`, `country`, `hse_blk_no`, `unit_no`, `building_street`, `postalcode`, `created_at`) VALUES
(4, 4, 'fghfcg hghjj jhkj jQuery DataTable is a powerful and smart HTML ', NULL, NULL, NULL, NULL, NULL, '2022-10-26'),
(5, 5, 'fch jgj ch cfcv', NULL, NULL, NULL, NULL, NULL, '2022-10-26'),
(6, 6, '', NULL, NULL, NULL, NULL, NULL, '2022-10-26'),
(8, 7, 'bnvn trt esdf', 'china', 'nvng 12', '47', 'bnvnm h', 7412, '2022-10-26'),
(9, 11, '', NULL, NULL, NULL, NULL, NULL, '2022-10-26'),
(10, 12, 'india', NULL, NULL, NULL, NULL, NULL, '2022-10-26'),
(11, 13, 'india', NULL, NULL, NULL, NULL, NULL, '2022-10-26'),
(12, 14, 'india', NULL, NULL, NULL, NULL, NULL, '2022-10-26'),
(13, 15, 'india', NULL, NULL, NULL, NULL, NULL, '2022-10-26'),
(14, 16, '', NULL, NULL, NULL, NULL, NULL, '2022-10-26'),
(15, 17, 'bnvn trt esdf', 'singapure', 'gfhg 10', '54', 'hythgf,vn', 123456, '2022-10-26'),
(16, 18, 'bnvn trt esdf', 'singapure', 'gfhg 10', '54', 'hghn', 7412, '2022-11-21'),
(17, 19, 'bnvn trt esdf', 'china', 'gfhg', '54', 'bnvnm h', 7412, '2022-11-23');

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
  `year` varchar(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `dept_id` varchar(200) DEFAULT NULL,
  `job_type` tinyint(3) DEFAULT NULL,
  `basic_pay` float(10,2) DEFAULT NULL,
  `cpf` float(10,2) DEFAULT NULL,
  `sales_Amount` float(10,2) DEFAULT NULL,
  `commission_Pay` float(10,2) DEFAULT NULL,
  `attendance_hours` float(10,2) DEFAULT NULL,
  `perfectAttendance` float(10,2) DEFAULT NULL,
  `service_amount` float(10,2) DEFAULT NULL,
  `service_bonus` float(10,2) DEFAULT NULL,
  `sales_bonus` float(10,2) DEFAULT NULL,
  `total_earnings` float(10,2) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_employee_salary`
--

INSERT INTO `nbb_employee_salary` (`id`, `year`, `emp_id`, `dept_id`, `job_type`, `basic_pay`, `cpf`, `sales_Amount`, `commission_Pay`, `attendance_hours`, `perfectAttendance`, `service_amount`, `service_bonus`, `sales_bonus`, `total_earnings`, `status`) VALUES
(1, '2022-09', 7, 'Therapist', NULL, 5000.00, 850.00, 1195.00, 239.00, 20.05, 0.00, 650.00, 32.00, 0.00, 0.00, 1);

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
(8, 11, '', '', '', ''),
(9, 12, '', '', '', ''),
(10, 13, '', '', '', ''),
(11, 14, '', '', '', ''),
(12, 15, '', '', '', ''),
(13, 16, '', '', '', ''),
(14, 17, '', '', '', ''),
(15, 18, '', '', '', ''),
(16, 19, '', '', '', '');

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
(1, 2022, '2022-11-13', 'Sunday', 'new demo1'),
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
  `payment_type` varchar(200) DEFAULT NULL,
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
  `hse_blk_no` varchar(200) DEFAULT NULL,
  `unit_no` varchar(200) DEFAULT NULL,
  `building_street_name` varchar(200) DEFAULT NULL,
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

INSERT INTO `nbb_lead` (`id`, `first_name`, `last_name`, `dob`, `age`, `email`, `contact`, `profile_picture`, `address`, `hse_blk_no`, `unit_no`, `building_street_name`, `country`, `zip_code`, `created_at`, `created_by`, `medical_information`, `transactional_records`, `skin_conditions`, `membership`, `comment`, `reference_name`, `source`, `source_link`, `status`) VALUES
(4, 'riya', 'ojha', '0000-00-00', 0, 'riyaojha@gmail.com', '1234567', NULL, 'test', NULL, NULL, NULL, 'ghg', 42058, '0000-00-00 00:00:00', 1, NULL, NULL, NULL, 0, 'gfhgfhg', 4, 1, 'www.facebook.com', 1),
(5, 'demo', 'test', '0000-00-00', 0, 'ciprojectbizz@gmail.com', '12345679', '20200913112559-2020-09-13service_category112555.jpg', '', 'jdfhdjf', 'dfds', 'fddf', '', 0, '2022-07-04 14:32:35', 1, NULL, NULL, NULL, 1, '', 1, 6, 'https://in.linkedin.com/', 1);

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
-- Table structure for table `nbb_membership`
--

CREATE TABLE `nbb_membership` (
  `id` int(11) NOT NULL,
  `membership_name` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_membership`
--

INSERT INTO `nbb_membership` (`id`, `membership_name`, `created_at`) VALUES
(1, 'Normal', '2022-09-13 19:05:31'),
(2, 'Gold', '2022-09-13 19:05:31'),
(3, 'Platinum', '2022-09-13 19:05:31'),
(4, 'Silver', '2022-09-13 19:05:31');

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
  `customer_address` varchar(255) DEFAULT NULL,
  `customer_postcode` int(11) DEFAULT NULL,
  `type_flag` varchar(10) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `order_system` varchar(200) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_order_main`
--

INSERT INTO `nbb_order_main` (`id`, `order_number`, `user_id`, `saler_id`, `order_status`, `customer_firstname`, `customer_lastname`, `customer_email`, `customer_phone`, `customer_address`, `customer_postcode`, `type_flag`, `payment_method`, `order_system`, `create_date`, `delivery_date`) VALUES
(1, 'NBB0001', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'O', NULL, 'application', '2022-11-23 12:22:45', NULL);

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
(2, 1, 11, 2, '60', '30', '2022-11-22 19:06:12', 0),
(3, 1, 2, 1, '88', '88', '2022-11-23 12:21:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_order_service`
--

CREATE TABLE `nbb_order_service` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `times_packages` int(11) DEFAULT 1,
  `service_price` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_file` varchar(255) DEFAULT NULL,
  `payment_status` tinyint(3) DEFAULT 0,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_order_service`
--

INSERT INTO `nbb_order_service` (`id`, `user_id`, `service_id`, `times_packages`, `service_price`, `created_at`, `payment_file`, `payment_status`, `status`) VALUES
(2, 1, 2, 10, 880, '2022-11-18 18:12:00', 'Monthly-Employee-Attendance-Sheet-PDF.pdf', 2, 2),
(3, 1, 27, 1, 50, '2022-11-19 11:27:05', 'LOGO-icon.png', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_packages`
--

CREATE TABLE `nbb_packages` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `sub_category` int(11) DEFAULT NULL,
  `package_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_detail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_credits` int(11) DEFAULT NULL,
  `no_ofSession` int(11) DEFAULT NULL,
  `foc_items` varchar(255) DEFAULT NULL,
  `packageFiles` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_packages`
--

INSERT INTO `nbb_packages` (`id`, `category`, `sub_category`, `package_name`, `package_detail`, `package_price`, `package_credits`, `no_ofSession`, `foc_items`, `packageFiles`, `created_at`, `status`) VALUES
(3, NULL, NULL, 'Deep Hydration Skin Care', 'Skin Care', '128', 3, NULL, NULL, NULL, '2022-06-08 10:25:53', 1),
(2, NULL, NULL, 'Hydra Peel Deep Cleansing  ', 'dgdfgbf gfg hfg', '128', 3, NULL, NULL, NULL, '2022-06-08 10:15:26', 1),
(5, 1, 1, 'Acne treatment ', '', '201', 4, 3, 'hgfhnb hjghb', 'y.jpg', '2022-10-17 20:06:17', 1);

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
-- Table structure for table `nbb_partnership`
--

CREATE TABLE `nbb_partnership` (
  `id` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `service_profit` int(11) DEFAULT NULL,
  `product_Profit` int(11) DEFAULT NULL,
  `total_earnings` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_partnership`
--

INSERT INTO `nbb_partnership` (`id`, `year`, `emp_id`, `service_profit`, `product_Profit`, `total_earnings`, `created_at`, `status`) VALUES
(0, 2022, 1, 186, 81, 267, '2022-11-21 12:19:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_part_time`
--

CREATE TABLE `nbb_part_time` (
  `part_time_id` int(10) NOT NULL,
  `from_time` varchar(20) DEFAULT NULL,
  `to_time` varchar(20) DEFAULT NULL,
  `employee_id` varchar(10) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `status` int(5) DEFAULT 1,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nbb_payments`
--

CREATE TABLE `nbb_payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `Service_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nbb_payments`
--

INSERT INTO `nbb_payments` (`id`, `order_id`, `product_id`, `Service_id`, `user_id`, `txn_id`, `payment_gross`, `currency_code`, `payer_name`, `payer_email`, `payment_file`, `status`) VALUES
(1, NULL, 0, 27, 1, '', 50.00, '', '', '', 'WhatsApp Image 2022-10-20 at 2.33.35 PM.jpeg', '1'),
(2, 15, 0, 0, 1, '', 118.00, '', '', '', 'qr-code.pdf', '1'),
(13, NULL, 0, 57, 1, '', 20.00, '', '', '', 'qr-code.pdf', '1'),
(14, NULL, 0, 27, 1, '', 50.00, '', '', '', 'Screenshot (175).png', '1'),
(15, NULL, 0, 56, 1, '', 20.00, '', '', '', 'Screenshot (171).png', '1'),
(16, NULL, 0, 27, 1, '', 50.00, '', '', '', 'Screenshot (19).png', '1'),
(17, NULL, 0, 2, 1, '', 880.00, '', '', '', 'Monthly-Employee-Attendance-Sheet-PDF.pdf', '1'),
(18, NULL, 0, 2, 1, '', 880.00, '', '', '', 'Monthly-Employee-Attendance-Sheet-PDF.pdf', '1'),
(19, NULL, 0, 27, 1, '', 50.00, '', '', '', 'LOGO-icon.png', '1'),
(20, 1, 0, 0, 1, '', 70.00, '', '', '', 'Attendance_sheet_September_2022__(2).pdf', '1'),
(21, 1, 0, 0, 1, '', 148.00, '', '', '', 'GenerateHolidays__2022__(2).pdf', '1');

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
(15, 'Lead Management', '2022-06-30 17:31:09'),
(16, 'POS Management', '2022-09-24 14:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_posservice_order`
--

CREATE TABLE `nbb_posservice_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `customer_number` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `sales_executive` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_posservice_order`
--

INSERT INTO `nbb_posservice_order` (`id`, `order_id`, `customer_number`, `first_name`, `last_name`, `customer_address`, `sales_executive`, `service_id`, `price`, `created_at`, `status`) VALUES
(5, 22, 2147483647, 'Susmita', 'test', 'ghf hjg hghj yghjb', 3, 19, 200, '2022-11-15 11:05:12', 1),
(6, 22, 2147483647, 'Susmita', 'test', 'ghf hjg hghj yghjb', 3, 21, 200, '2022-11-15 11:05:12', 1),
(7, 23, 2147483647, 'riya', 'ojha', 'kolkata,gfhj', 5, 21, 200, '2022-11-15 12:06:35', 1),
(8, 23, 2147483647, 'riya', 'ojha', 'kolkata,gfhj', 5, 21, 100, '2022-11-15 12:06:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_product`
--

CREATE TABLE `nbb_product` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `sub_child_category_id` int(11) DEFAULT NULL,
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
  `available_stock` int(11) DEFAULT 0,
  `weight` varchar(50) DEFAULT NULL,
  `lowest_price` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `mfg_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `types` tinyint(3) DEFAULT NULL,
  `discountPercentage` varchar(50) DEFAULT NULL,
  `discounted_price` int(11) DEFAULT 0,
  `rating` int(11) DEFAULT NULL,
  `light_medical_beauty` tinyint(3) DEFAULT NULL,
  `curlness` varchar(50) DEFAULT NULL,
  `thickness` varchar(50) DEFAULT NULL,
  `status` tinyint(3) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_product`
--

INSERT INTO `nbb_product` (`id`, `categorie_id`, `product_category_id`, `sub_child_category_id`, `sku`, `brand_name`, `name`, `colour`, `product_code`, `supplier_id`, `barcode`, `description`, `short_description`, `date`, `tags`, `stock`, `available_stock`, `weight`, `lowest_price`, `price`, `mfg_date`, `expiry_date`, `types`, `discountPercentage`, `discounted_price`, `rating`, `light_medical_beauty`, `curlness`, `thickness`, `status`) VALUES
(1, 2, 16, NULL, 'VC-22', 'ngel brow', 'Water Light-VC', 'black', NULL, 3, NULL, '', '', '2022-10-21 17:40:14', '', NULL, 100, '100', NULL, 50, '2022-10-25', '2026-02-13', 0, '', 0, 4, NULL, '', '', 1),
(2, 2, 16, NULL, 'wl-22', 'ngel brow', 'Water Light-Human Placenta', 'black', NULL, 3, NULL, '', '', '2022-11-23 12:22:45', '', NULL, 88, '50', NULL, 88, '2022-10-01', '2026-10-20', 0, '', 0, 0, NULL, '', '', 1),
(3, 2, 16, NULL, 'sl-22', 'ngel brow', 'Water Light - Salmon Rejuran', 'black', NULL, 3, NULL, '', '', '2022-10-21 17:26:13', '', NULL, 200, '50', NULL, 168, '2022-10-19', '2025-10-21', 0, '', 0, 0, NULL, '', '', 1),
(4, 2, 16, NULL, 'li-22', 'ngel brow', 'Water Light - Lisita ', 'black', NULL, 3, NULL, '', '', '2022-10-21 17:32:09', '', 100, 100, '34', NULL, 320, '2022-10-16', '2026-01-21', 0, '', 0, 5, NULL, '', '', 1),
(5, 2, 16, NULL, 'fi-22', 'ngel brow', 'Water Light - Filorga', 'black', NULL, 3, NULL, '', '', '2022-10-21 17:33:49', '', 100, 100, '34', NULL, 350, '2022-10-12', '2025-02-21', 0, '', 0, 3, NULL, '', '', 1),
(6, 2, 16, NULL, 'ppe-22', 'ngel brow', 'Water Light - Deersi Pure Plant Essence', 'black', NULL, 3, NULL, '', '', '2022-10-21 17:35:40', '', NULL, 200, '34', NULL, 280, '2022-10-08', '2025-10-21', 0, '', 0, 2, NULL, '', '', 1),
(7, 2, 16, NULL, 'gbo-22', 'ngel brow', 'German black orchid essence', 'black', NULL, 3, NULL, '', 'German black orchid essence\r\nAmpoule (Anti-Wrinkle/Firming)', '2022-10-21 17:37:47', '', 200, 200, '34', NULL, 38, '2022-10-06', '2025-09-21', 0, '', 0, 3, NULL, '', '', 1),
(9, 2, 24, 15, '001', 'Weina', 'Weina Pigment Special Modulation 001', 'Apple Red', NULL, 3, NULL, '', '', '2022-11-23 15:47:44', '', 100, 100, '12', NULL, 30, '2022-10-05', '2025-10-30', 0, '', 0, 3, NULL, '', '', 1),
(10, 2, 24, 15, '003', 'Weina', 'Weina Pigment Special Modulation 003', 'Rose Pink', NULL, 3, NULL, '', '', '2022-11-23 15:47:44', '', NULL, 87, '12', NULL, 30, '2022-09-22', '2024-11-29', 0, '', 0, 4, NULL, '', '', 1),
(11, 2, 24, 15, '004', 'Weina', 'Weina Pigment Special Modulation 004', 'Tropical Orange', NULL, 3, NULL, '', '', '2022-11-23 15:47:44', '', 100, 98, '12', NULL, 30, '2022-10-27', '2024-12-31', 0, '', 0, 4, NULL, '', '', 1),
(15, 2, 18, NULL, 'lp', 'Glue Mate', 'Lash Primer', 'Mate', NULL, 3, NULL, '', 'Lash Primer Glue Mate (Bottle) ', '2022-11-22 18:32:24', '', 200, 197, '15', NULL, 10, '2022-11-01', '2025-10-01', 0, '', 0, 2, NULL, '', '', 1),
(17, 2, 24, 16, 'pc', 'Weina', 'Pumpkin Corrector', 'Pumpkin', NULL, 3, NULL, '', '', '2022-11-23 15:48:12', '', 100, 90, '15', NULL, 68, '2022-11-03', '2025-02-03', 0, '', 0, 5, NULL, '', '', 1),
(18, 2, 24, 16, 'oc', 'Weina', 'Olive Corrector', 'Olive ', NULL, 3, NULL, '', '', '2022-11-23 15:48:12', '', 200, 200, '10', NULL, 68, '2022-11-02', '2025-07-10', 0, '', 0, 4, NULL, '', '', 1),
(19, 2, 24, 17, 'jb', 'Weina', 'Jet Black', 'Jet Black', NULL, 3, NULL, '', '', '2022-11-23 15:48:18', '', 200, 200, '15', NULL, 68, '2022-11-03', '2025-02-03', 0, '', 0, 3, NULL, '', '', 1),
(20, 2, 24, 18, 'lc', 'Weina', 'Light Coffee', 'Light Coffee', NULL, 3, NULL, '', '', '2022-11-23 15:48:25', '', 100, 88, '15', NULL, 68, '2022-11-04', '2024-10-03', 0, '', 0, 3, NULL, '', '', 1),
(21, 2, 24, 18, 'kb', 'Weina', 'Khaki Brown', 'Khaki Brown', NULL, 3, NULL, '', '', '2022-11-23 15:48:25', '', 100, 100, '15', NULL, 68, '2022-11-03', '2024-03-12', 0, '', 0, 3, NULL, '', '', 1),
(22, 2, 24, 18, 'cb', 'Weina', 'Coffee Brown', 'Coffee Brown', NULL, 3, NULL, '', '', '2022-11-23 15:48:25', '', 100, 98, '10', NULL, 68, '2022-11-03', '2024-11-21', 0, '', 0, 3, NULL, '', '', 1),
(23, 2, 24, 18, 'gb', 'Weina', 'Grey Brown', 'Grey Brown', NULL, 3, NULL, '', '', '2022-11-23 15:48:25', '', 200, 200, '15', NULL, 68, '2022-11-03', '2025-10-15', 0, '', 0, 5, NULL, '', '', 1),
(24, 2, 18, NULL, 'cjt', 'Matsuzaki', 'Classic J Tweezer', 'Gold', NULL, 3, NULL, '', '', '2022-11-03 20:28:05', '', 100, 100, '40', NULL, 25, '2022-11-03', '2024-10-22', 0, '', 0, 3, NULL, '', '', 1),
(25, 2, 18, NULL, 'MF2022', 'Matsuzaki', 'Mini Fan', 'white', NULL, 3, NULL, '', '', '2022-11-04 10:38:01', '', 100, 100, '15', NULL, 25, '2022-11-03', '2024-11-20', 0, '', 0, 3, NULL, '', '', 1),
(26, 2, 18, NULL, 'lp22', 'Matsuzaki', 'Lash Tape', 'white', NULL, 3, NULL, '', '', '2022-11-04 10:39:17', '', 100, 100, '15', NULL, 5, '2022-11-03', '2025-01-01', 0, '', 0, 4, NULL, '', '', 1),
(27, 2, 18, NULL, 'ep22', 'Matsuzaki', 'Eye Pads', 'white', NULL, 3, NULL, '', '', '2022-11-04 10:40:27', '', 100, 100, '15', NULL, 20, '2022-11-03', '2024-12-31', 0, '', 0, 3, NULL, '', '', 1),
(28, 2, 18, NULL, 'tm22', 'Matsuzaki', 'Training Mannequin', 'Skin,Brown,Pink', NULL, 3, NULL, '', '', '2022-11-04 10:42:23', '', 200, 200, '15', NULL, 28, '2022-11-03', '2022-12-28', 0, '', 0, 5, NULL, '', '', 1),
(29, 2, 18, NULL, 'eg22', 'Matsuzaki', 'Extension Glue', 'white', NULL, 3, NULL, '', 'Speed：1S、2S、3S、5S', '2022-11-04 11:22:35', '', 200, 200, '5ml,10ml', 38, 58, '2022-11-03', '2025-06-16', 0, '', 0, 4, NULL, '', '', 1),
(30, 2, 18, NULL, 'gc22', 'Matsuzaki', 'Glue Cup', 'Gold', NULL, 3, NULL, '', 'Quantity：100pcs', '2022-11-04 11:24:25', '', 200, 200, '12', 0, 10, '2022-11-03', '2025-09-30', 0, '', 0, 4, NULL, '', '', 1),
(31, 2, 18, NULL, 'ab22', 'Matsuzaki', 'Applicators Brush', 'black', NULL, 3, NULL, '', 'Quantity：50pcs', '2022-11-04 11:26:17', '', 200, 200, '34', 0, 12, '2022-11-03', '2024-02-28', 0, '', 0, 2, NULL, '', '', 1),
(32, 2, 18, NULL, 'tc22', 'Matsuzaki', 'Tweezer Cleaner', 'gold', NULL, 3, NULL, '', '', '2022-11-04 11:28:40', '', 200, 200, '15ml', 0, 12, '2022-11-03', '2025-07-11', 0, '', 0, 5, NULL, '', '', 1),
(33, 2, 18, NULL, 'ce22', 'Matsuzaki', 'Cleansing Eyepad', 'white', NULL, 3, NULL, '', '50: pcs\r\n', '2022-11-04 11:33:52', '', 100, 100, '15', 0, 8, '2022-11-03', '2023-12-27', 0, '', 0, 2, NULL, '', '', 1),
(34, 2, 18, NULL, 'cf22', 'Matsuzaki', 'Cleanser Foam', 'white', NULL, 3, NULL, '', '', '2022-11-04 11:35:22', '', 200, 200, '160ml', 0, 15, '2022-11-02', '2024-11-28', 0, '', 0, 3, NULL, '', '', 1),
(35, 2, 18, NULL, 'pr', 'Matsuzaki', 'Protein Removal', 'white', NULL, 3, NULL, '', '', '2022-11-04 11:39:06', '', 200, 200, '160ml', 0, 12, '2022-11-01', '2024-11-29', 0, '', 0, 2, NULL, '', '', 1),
(36, 0, 0, NULL, 'gs22', 'Matsuzaki', 'Grafting Sponge', 'white', NULL, 3, NULL, '', 'Quantity：30pcs', '2022-11-04 11:50:10', '', 200, 200, '15', 0, 12, '2022-11-03', '2025-10-22', 0, '', 0, 4, NULL, '', '', 1),
(37, 2, 18, NULL, 'eeap22', 'Matsuzaki', 'Eyelash Extension Acrylic Pallet', 'white', NULL, 3, NULL, '', '', '2022-11-04 11:52:33', '', 200, 200, '15', 0, 8, '2022-11-03', '2023-12-31', 0, '', 0, 3, NULL, '', '', 1),
(38, 2, 18, NULL, 'cp22', 'Matsuzaki', 'Cleaning Pad', 'white', NULL, 3, NULL, '', '', '2022-11-04 11:56:21', '', 200, 200, '12', 0, 12, '2022-11-09', '2024-11-13', 0, '', 0, 2, NULL, '', '', 1),
(39, 2, 18, NULL, 'mbt22', 'Matsuzaki', 'Mega Boot Tweezer', 'white', NULL, 3, NULL, '', '', '2022-11-04 12:03:32', '', 200, 200, '10', 0, 35, '2022-11-03', '2023-07-19', 0, '', 0, 3, NULL, '', '', 1),
(40, 2, 18, NULL, 'tc21', 'Matsuzaki', 'Tweezer Combo', 'gold', NULL, 3, NULL, '', 'Types：Sharp Point,Dolphin Straight\r\n', '2022-11-04 12:07:09', '', 200, 200, '12', 0, 25, '2022-11-03', '2024-10-30', 0, '', 0, 4, NULL, '', '', 1),
(41, 2, 18, NULL, 'esb22', 'Matsuzaki', 'Eyelash Styling Booklet', 'white', NULL, 3, NULL, '', 'Style Workbook Pages: 22 pcs', '2022-11-04 12:16:25', '', 200, 200, '10', 0, 25, '2022-11-03', '2023-12-14', 0, '', 0, 3, NULL, '', '', 1),
(42, 2, 18, NULL, 'mb21', 'Matsuzaki', 'Magnetic Board', 'black,blue', NULL, 3, NULL, '', '', '2022-11-04 12:22:14', '', 100, 100, '15', 0, 30, '2022-11-03', '2024-11-28', 0, '', 0, 3, NULL, '', '', 1),
(43, 2, 18, NULL, 'dsb22', 'Matsuzaki', 'Disposable Swab Brush', 'white', NULL, 3, NULL, '', 'Bottle Quantity：100pcs\r\n', '2022-11-04 12:28:55', '', 100, 100, '34', 0, 10, '2022-11-01', '2024-11-28', 0, '', 0, 3, NULL, '', '', 1),
(44, 0, 0, NULL, 'gcw22', 'Matsuzaki', 'Glue Cleaning Wipes', 'white', NULL, 3, NULL, '', '200 pcs.', '2022-11-04 12:36:33', '', 200, 200, '34', 0, 8, '2022-11-03', '2023-12-28', 0, '', 0, 3, NULL, '', '', 1),
(45, 2, 18, NULL, 'tso22', 'Matsuzaki', 'Tweezer Storage Organizer', 'Gold', NULL, 3, NULL, '', 'Quantity：4pcs.', '2022-11-04 12:40:48', '', 200, 200, '15', 0, 15, '2022-11-03', '2024-11-14', 0, '', 0, 3, NULL, '', '', 1),
(46, 2, 18, NULL, 'dsgp22', 'Matsuzaki', 'Duo Side Glue Pad', 'white', NULL, 3, NULL, '', 'Quantity：30pcs', '2022-11-04 12:49:17', '', 200, 200, '15', 0, 10, '2022-11-03', '2024-11-21', 0, '', 0, 5, NULL, '', '', 1),
(47, 2, 18, NULL, 'pssh22', 'Matsuzaki', 'Pallet Stand Silicone Holder', 'white', NULL, 3, NULL, '', 'Quantity：1片pcs', '2022-11-04 13:00:15', '', 200, 200, '10', 0, 2, '2022-11-03', '2024-11-28', 0, '', 0, 3, NULL, '', '', 1),
(48, 2, 18, NULL, 'psss22', 'Matsuzaki', 'Professional Stainless Steel Scissors', 'Gold', NULL, 3, NULL, '', '', '2022-11-04 13:05:57', '', 200, 200, '12', 0, 6, '2022-11-04', '2024-11-28', 0, '', 0, 4, NULL, '', '', 1),
(49, 2, 18, NULL, 'mlh22', 'Matsuzaki', 'Magnetic Lash Holder', 'black', NULL, 3, NULL, '', 'Free Pad：4pcs.\r\n', '2022-11-04 13:07:40', '', 200, 200, '34', 0, 12, '2022-11-03', '2024-11-28', 0, '', 0, 3, NULL, '', '', 1),
(50, 2, 18, NULL, 'lm22', 'Matsuzaki', 'Lash Mirror', 'white', NULL, 3, NULL, '', '', '2022-11-04 13:21:56', '', 200, 200, '34', 0, 5, '2022-11-03', '2023-10-17', 0, '', 0, 3, NULL, '', '', 1),
(51, 2, 18, NULL, 'fffc22', 'Matsuzaki', 'Fast Fanning Flower Cups', 'black', NULL, 3, NULL, '', 'Quantity：100pcs\r\n', '2022-11-04 13:24:28', '', 200, 200, '34', 0, 10, '2022-11-03', '2024-08-30', 0, '', 0, 5, NULL, '', '', 1),
(52, 2, 18, NULL, 'ewb22', 'Matsuzaki', 'Eyelash Wands Brush', 'black', NULL, 3, NULL, '', 'Quantity数量：50只pcs', '2022-11-04 13:28:17', '', 200, 200, '20', 0, 15, '2022-11-02', '2024-10-31', 0, '', 0, 3, NULL, '', '', 1),
(53, 0, 0, NULL, 'fl22', 'Matsuzaki', 'Fake Lashes (Practice)', 'black', NULL, 3, NULL, '', 'Quantity: 3 pcs', '2022-11-04 13:30:42', '', 200, 200, '6、8、10mm', 0, 10, '2022-11-03', '2024-11-21', 0, '', 0, 3, NULL, '', '', 1),
(54, 2, 10, NULL, 'vl22', 'Matsuzaki', 'Velvet Lash', 'Brown, Black', NULL, 3, NULL, '', '', '2022-11-04 13:35:30', '', 200, 200, '8 – 15 MM', 0, 42, '2022-11-03', '2024-11-20', 0, '', 0, 3, NULL, 'J、B、C、D、L、LC、LD', '0.05、0.07', 1),
(55, 0, 0, NULL, 'll22', 'Matsuzaki', 'Lower Lash(Flat Mink）', 'Black, Brown Black', NULL, 3, NULL, '', '', '2022-11-04 14:56:01', '', 200, 200, '5 - 8 MM', 0, 20, '2022-11-03', '2024-11-29', 0, '', 0, 3, NULL, 'J、B', '0.10', 1),
(56, 2, 10, NULL, 'bc22', 'Matsuzaki', 'Baby Curl', 'Black, Brown Black', NULL, 3, NULL, '', '', '2022-11-04 15:02:34', '', 200, 200, '8 – 13 MM', 0, 28, '2022-11-03', '2022-12-30', 0, '', 0, 3, NULL, '', '0.10', 1),
(57, 2, 10, NULL, '4d22', 'Matsuzaki', '4D Clover', 'Black, Caramel', NULL, 3, NULL, '', '', '2022-11-04 15:04:28', '', 200, 200, '8 - 13 MM', 0, 32, '2022-11-03', '2024-11-28', 0, '', 0, 3, NULL, 'C、D、D+', '0.05、0.07', 1),
(58, 2, 10, NULL, 'c22', 'Matsuzaki', 'Clover', 'Black, Caramel', NULL, 3, NULL, '', '', '2022-11-04 15:06:35', '', 100, 100, '8 - 13 MM', 0, 32, '2022-11-03', '2024-11-29', 0, '', 0, 3, NULL, 'C、D、D+', '0.05、0.07', 0),
(59, 2, 10, NULL, 'el22', 'Matsuzaki', 'Eclipse Lash', 'Black, Brown Black', NULL, 3, NULL, '', '', '2022-11-12 12:13:45', '', 100, 100, '8 - 15 MM', 0, 32, '2022-11-11', '2025-11-26', 0, '', 0, 3, NULL, 'J、B、C、CC、D、DD', '0.15、0.20', 1),
(60, 2, 10, NULL, 'yyl', 'Matsuzaki', 'YY Lash', 'Black,Caramel', NULL, 3, NULL, '', '', '2022-11-12 12:16:17', '', 200, 200, '8 - 13 MM', 0, 32, '2022-11-11', '2026-01-28', 0, '', 0, NULL, NULL, 'C、D、D+', '0.05', 1),
(61, 2, 10, NULL, 'ffl', 'Matsuzaki', 'Fast Fanning Lash', 'Black, Brown Black', NULL, 3, NULL, '', '', '2022-11-12 12:20:42', '', 200, 200, '8 – 15 MM', 0, 42, '2022-11-11', '2025-12-31', 0, '', 0, NULL, NULL, 'C、CC、D、DD', '0.03、0.05', 1),
(62, 2, 10, NULL, 'lsl', 'Matsuzaki', 'L Shape Lash', 'Black, Brown Black', NULL, 3, NULL, '', '', '2022-11-12 12:30:40', '', 200, 200, '8 – 15 MM', 0, 32, '2022-11-13', '2025-11-28', 0, '', 0, NULL, NULL, 'L、LC、LD、LU', '0.05、0.07', 1),
(63, 2, 10, NULL, 'fl22', 'Matsuzaki', 'Fairy Lash', 'Black, Caramel', NULL, 3, NULL, '', '', '2022-11-12 12:33:07', '', 200, 200, '8 – 17 MM', 0, 28, '2022-11-11', '2025-12-04', 0, '', 0, NULL, NULL, 'C、D', '0.05、0.07', 1),
(64, 2, 10, NULL, 'ml22', 'Matsuzaki', 'Mink Lash', 'Black, Brown Black', NULL, 3, NULL, '', '', '2022-11-12 12:34:39', '', 200, 200, '8 – 15 MM', 0, 32, '2022-11-11', '2025-12-30', 0, '', 0, NULL, NULL, 'J、B、C、D', '0.10、0.15、0.20', 1),
(65, 2, 10, NULL, 'bs22', 'Matsuzaki', 'Baby Straight', 'Black, Brown Black', NULL, 3, NULL, '', '', '2022-11-12 12:36:24', '', 200, 200, '8 – 15 MM', 0, 28, '2022-11-11', '2025-12-25', 0, '', 0, NULL, NULL, '', '0.10', 1),
(66, 2, 10, NULL, '5dsl', 'Matsuzaki', '5D Strip Lash', 'black', NULL, 3, NULL, '', '', '2022-11-12 12:38:58', '', 200, 200, '8 – 15 MM', 0, 38, '2022-11-11', '2025-11-29', 0, '', 0, NULL, NULL, 'C、CC、D、DD', '0.05、0.07', 1),
(67, 2, 10, NULL, 'cl22', 'Matsuzaki', 'Colour Lash(Round hair)', 'mix', NULL, 3, NULL, '', '', '2022-11-12 12:41:04', '', 100, 100, '8 – 13 MM', 0, 38, '2022-11-11', '2025-07-12', 0, '', 0, NULL, NULL, 'C、D', '0.05', 1),
(68, 2, 10, NULL, 'cl5d', 'Matsuzaki', '5D Clover', 'Black, Caramel', NULL, 3, NULL, '', '', '2022-11-12 12:43:11', '', 200, 200, '8 - 13 MM', 0, 32, '2022-11-11', '2025-11-28', 0, '', 0, NULL, NULL, 'C、D、D+', '0.05、0.07', 1),
(69, 0, 0, NULL, 'bl22', 'Matsuzaki', 'Blossom Lash(3D/4D/5D/6D)', 'Black, Caramel', NULL, 3, NULL, '', '', '2022-11-12 12:46:41', '', 200, 200, '8 - 13 MM', 0, 32, '2022-11-11', '2025-11-27', 0, '', 0, NULL, NULL, 'C、D、D+', '0.05、0.07', 1),
(71, 2, 16, NULL, 'anti-wrinkle/firm', 'Matsuzaki', 'Black Orchid Essence Ampoule', 'white', NULL, 3, NULL, '', '', '2022-11-15 15:05:22', '', 200, 200, '15', 0, 38, '2022-11-14', '2025-11-27', 0, '', 0, NULL, NULL, '', '', 1),
(72, 2, 16, NULL, 'VC Whitening/Blemish', 'Matsuzaki', 'Deersi Essence Deersi Ampoule', 'white', NULL, 3, NULL, '', '', '2022-11-15 15:08:30', '', 200, 200, '10', 0, 38, '2022-11-10', '2025-11-21', 0, '', 0, NULL, NULL, '', '', 1),
(73, 2, 16, NULL, 'caviar anti-aging', 'Matsuzaki', 'Dekrei Essence Dekrei Ampoule ', 'white', NULL, 3, NULL, '', '', '2022-11-15 15:29:52', '', 100, 100, '10', 0, 38, '2022-11-14', '2025-12-30', 0, '', 0, NULL, NULL, '', '', 1),
(74, 2, 16, NULL, 'shrinks pores', 'Matsuzaki', 'Dekrei Essence Dekrei Ampoule ', 'white', NULL, 3, NULL, '', '', '2022-11-15 15:31:28', '', 200, 200, '12', 0, 38, '2022-11-16', '2025-11-28', 0, '', 0, NULL, NULL, '', '', 1),
(75, 2, 16, NULL, 'Kiss masks', 'Matsuzaki', 'Kiss Medical Mask', 'white', NULL, 3, NULL, '', '', '2022-11-15 15:33:00', '', 200, 200, '15', 0, 38, '2022-11-29', '2026-12-04', 0, '', 0, NULL, NULL, '', '', 1);

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
(1, 4, 'image11.jpg', NULL),
(2, 5, 'image10.jpg', NULL),
(3, 6, 'image2.jpg', NULL),
(4, 7, 'image101.jpg', NULL),
(6, 1, 'image7.jpg', NULL),
(7, 2, 'image9.jpg', NULL),
(8, 3, 'image8.jpg', NULL),
(9, 9, 'red.jpeg', NULL),
(10, 10, 'rose_red.jpeg', NULL),
(11, 11, 'orange.jpeg', NULL),
(15, 15, 'image31.jpg', NULL),
(17, 17, 'pigment_pumpkin_correction.jpeg', NULL),
(18, 18, 'pigment_olive_correction.jpeg', NULL),
(19, 19, 'pigment_jet_black.jpeg', NULL),
(20, 20, 'IMG_5862.JPG', NULL),
(21, 21, 'IMG_5863.JPG', NULL),
(22, 22, 'IMG_5864.JPG', NULL),
(23, 23, 'IMG_5865.JPG', NULL),
(24, 24, 'image33.jpg', NULL),
(25, 25, 'image32.jpg', NULL),
(26, 26, 'image35.jpg', NULL),
(27, 27, 'image34.jpg', NULL),
(28, 28, 'image38.jpg', NULL),
(29, 29, 'image37.jpg', NULL),
(30, 30, 'image43.jpg', NULL),
(31, 31, 'image41.jpg', NULL),
(32, 32, 'image48.jpg', NULL),
(33, 33, 'image44.jpg', NULL),
(34, 34, 'image46.jpg', NULL),
(35, 35, 'image49.jpg', NULL),
(36, 36, 'image51.jpg', NULL),
(37, 37, 'image53.jpg', NULL),
(38, 38, 'image22.jpg', NULL),
(39, 39, 'image57.jpg', NULL),
(40, 40, 'image58.jpg', NULL),
(41, 41, 'image59.jpg', NULL),
(42, 42, 'image60.jpg', NULL),
(43, 43, 'image21.jpg', NULL),
(44, 44, 'image221.jpg', NULL),
(45, 45, 'image23.jpg', NULL),
(46, 46, 'image29.jpg', NULL),
(47, 47, 'image25.jpg', NULL),
(48, 48, 'image26.jpg', NULL),
(49, 49, 'image27.jpg', NULL),
(50, 50, 'image28.jpg', NULL),
(51, 51, 'image291.jpg', NULL),
(52, 52, 'image30.jpg', NULL),
(53, 53, 'image12.jpg', NULL),
(54, 54, 'image71.jpg', NULL),
(55, 55, 'image5.jpg', NULL),
(56, 56, 'image42.jpg', NULL),
(57, 57, 'image16.jpg', NULL),
(58, 58, 'image18.jpg', NULL),
(59, 59, 'image17.jpg', NULL),
(60, 60, 'image19.jpg', NULL),
(61, 61, 'image20.jpg', NULL),
(62, 62, 'image1.jpg', NULL),
(63, 63, 'image24.jpg', NULL),
(64, 64, 'image3.jpg', NULL),
(65, 65, 'image45.jpg', NULL),
(66, 66, 'image52.jpg', NULL),
(67, 67, 'image6.jpg', NULL),
(68, 68, 'image72.jpg', NULL),
(69, 69, 'image81.jpg', NULL),
(71, 71, 'image13.jpg', NULL),
(72, 72, 'image47.jpg', NULL),
(73, 73, 'image36.jpg', NULL),
(74, 74, 'image61.jpg', NULL),
(75, 75, 'image54.jpg', NULL);

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
  `id_card` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `hse_blk_no` varchar(200) DEFAULT NULL,
  `unit_no` varchar(200) DEFAULT NULL,
  `building_streetName` varchar(200) DEFAULT NULL,
  `pin_code` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `last_university` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `class_time` int(11) DEFAULT NULL,
  `sources_id` int(11) DEFAULT NULL,
  `terms_conditons` tinyint(3) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_register_student`
--

INSERT INTO `nbb_register_student` (`id`, `student_code`, `photo`, `first_name`, `last_name`, `dob`, `email`, `mobile_number`, `gender`, `id_card`, `address`, `hse_blk_no`, `unit_no`, `building_streetName`, `pin_code`, `country`, `last_university`, `course_id`, `class_time`, `sources_id`, `terms_conditons`, `status`) VALUES
(1, 'NBBS0001', 'image25.jpeg', 'fhgfh', '', '0000-00-00', 'ciprojectbizz@gmail.com', 2147483647, NULL, '', 'wb', '', '', '', 0, '', '', 1, 1, 4, NULL, 1);

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
(19, 1, 15),
(20, 1, 16);

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
(7, 'Therapist'),
(8, 'Trainer'),
(10, 'Beautician'),
(11, 'Delivery Partner ');

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
  `sub_child_category` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `lowest_price` int(11) DEFAULT 0,
  `service_price` int(11) DEFAULT NULL,
  `discount_price` int(11) NOT NULL DEFAULT 0,
  `discount_percent` int(11) NOT NULL DEFAULT 0,
  `package_times_price` int(11) DEFAULT NULL,
  `package_session` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
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

INSERT INTO `nbb_service` (`id`, `service_name`, `service_icon`, `main_category_id`, `service_category`, `sub_child_category`, `description`, `lowest_price`, `service_price`, `discount_price`, `discount_percent`, `package_times_price`, `package_session`, `rating`, `therapist_commission`, `commission_amount`, `duration`, `priority`, `loyalty_points`, `status`, `created_by`, `created_at`) VALUES
(2, 'Hydra Peel Deep Cleansing     ', 'b.jpg', 1, 1, 11, '', 0, 128, 0, 0, 880, 10, 0, '', 0, 30, 0, NULL, 1, 1, '2022-11-22 19:26:36'),
(3, 'Deep Hydration Skin Care', 'c.jpg', 1, 1, 11, '\r\n', 0, 128, 0, 0, 880, 10, 0, '', 0, 30, 0, NULL, 1, 1, '2022-11-22 19:26:46'),
(6, 'Gua Sha (Face , Eyes, Neck )', 'ac.jpg', 1, 1, 14, '\r\n', 0, 128, 0, 0, 880, 10, 0, '', 0, 30, 0, NULL, 1, 1, '2022-11-22 19:26:59'),
(7, 'Sensitive Skin Care        ', 'd.jpg', 1, 1, 11, '\r\n', 0, 128, 0, 0, 880, 10, 0, '', 0, 30, 0, NULL, 1, 1, '2022-11-22 19:27:12'),
(8, 'Acne Care', 'aa.jpg', 1, 1, 11, '\r\n', 0, 128, 0, 0, 880, 10, 3, '', 0, 30, 0, NULL, 1, 1, '2022-11-23 10:28:50'),
(9, 'Tightening Care', 'f.jpg', 1, 1, 11, '\r\n', 0, 128, 0, 0, 880, 10, 3, '', 0, 30, 0, NULL, 1, 1, '2022-11-23 10:29:02'),
(10, 'Skin Whitening    ', 'g.jpg', 1, 1, 11, '', NULL, 128, 0, 0, 880, 10, 2, '', 0, 30, 0, 0, 1, 1, '2022-11-23 10:25:17'),
(11, 'Oxygen Bubbles Facial   ', 'h.jpg', 1, 1, 11, '', NULL, 128, 0, 0, 880, 10, 4, '', 0, 30, 0, 0, 1, 1, '2022-11-23 10:27:17'),
(12, ' Package x 10 times', 'i.jpg', 1, 1, 12, '', 0, 198, 0, 0, 1280, 10, 3, '', 0, 90, 0, NULL, 1, 1, '2022-11-23 10:26:52'),
(13, 'France Minimize Pores Therapy', 'j.jpg', 1, 1, 12, '', NULL, 198, 0, 0, 1280, 10, 2, '', 0, 90, 0, 0, 1, 1, '2022-11-23 10:26:10'),
(14, 'France Bio Blemish Whitening Therapy  ', 'k.jpg', 1, 1, 12, '\r\n', 0, 198, 0, 0, 1280, 10, 4, '', 0, 90, 0, NULL, 1, 1, '2022-11-23 10:29:19'),
(15, 'France EFG Energy Regenerating (Sensitive Replenish)', 'l.jpg', 1, 1, 12, '\r\n', 0, 198, 0, 0, 1280, 10, 5, '', 0, 90, 0, NULL, 1, 1, '2022-11-23 10:29:39'),
(16, 'V-shape face lifting', 'o.jpg', 1, 1, 12, '', 0, 198, 0, 0, 1280, 10, 2, '', 0, 90, 0, NULL, 1, 1, '2022-11-23 10:29:57'),
(17, 'France Deersi Eye + Neckline Refiller', 'p.jpg', 1, 1, 12, '\r\n', 0, 198, 0, 0, 1280, 10, 2, '', 0, 90, 0, NULL, 1, 1, '2022-11-23 10:48:55'),
(18, 'France Deersi Eye + Neckline Refiller', 'q.jpg', 1, 1, 12, '\r\n', 0, 198, 0, 0, 1280, 10, 4, '', 0, 90, 0, NULL, 1, 1, '2022-11-23 10:49:11'),
(19, 'France Detoxification and Mites Removal', 'w.jpg', 1, 1, 12, '\r\n', 0, 238, 0, 0, 1680, 10, 3, '', 0, 90, 0, NULL, 1, 1, '2022-11-23 10:49:27'),
(21, 'Accent Pro ( Face, Neck )', 'ac.jpg', 1, 1, 13, '', 0, 368, 0, 0, 2280, 10, 4, '', 0, 29, 0, NULL, 1, 1, '2022-11-23 10:49:53'),
(22, 'Accent Pro ( Eyes )', 'ad.jpg', 1, 1, 13, ' 10x- $1680\r\n', NULL, 258, 0, 0, 1680, 10, 3, '', 0, 30, 0, 0, 1, 1, '2022-11-18 17:55:50'),
(23, 'Light 1000', 'ab.jpg', 1, 1, 13, '10x- $1800 ', NULL, 258, 0, 0, 1800, 10, 5, '', 0, 27, 0, 0, 1, 1, '2022-11-18 17:55:50'),
(24, 'Eye Care (Free neck care)    ', 'ad.jpg', 1, 1, 14, 'Eye Care (Free neck care)    ', NULL, 128, 0, 0, NULL, 10, 0, '', 0, 28, 0, 0, 1, 1, '2022-11-18 17:55:50'),
(25, 'Carbon Spectra Peel ', 'ae.jpg', 1, 1, 14, ' 10x- $880', NULL, 128, 0, 0, NULL, 10, 0, '', 0, 30, 0, 0, 1, 1, '2022-11-18 17:55:50'),
(26, '光子嫩肤  IPL', 'aa.jpg', 1, 1, 14, '10x- $880\r\n', NULL, 128, 0, 0, NULL, 10, 0, '', 0, 30, 0, 0, 1, 1, '2022-11-18 17:55:50'),
(27, '水光-VC ', 'aj.jpg', 1, 14, NULL, 'Water Light-VC', NULL, 50, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(28, '水光-人胎素', 'ai.jpg', 1, 14, NULL, '\r\nWater Light-Human Placenta\r\n', NULL, 88, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(29, '水光-三文鱼 Rejuran', 'ak.jpg', 1, 14, NULL, 'Water Light - Salmon Rejuran', NULL, 168, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(30, '水光-丽丝塔 Lisita', 'al.jpg', 1, 14, NULL, '\r\nWater Light - Lisita Lisita\r\n', NULL, 320, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(31, '水光-菲洛嘉 Filorga ', 'am.jpg', 1, 14, NULL, 'Water Light - Filorga', NULL, 350, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(32, '水光-Deersi Pure Plant Essence', 'ao.jpg', 1, 14, NULL, 'Water Light - Deersi Pure Plant Essence\r\n', NULL, 280, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(33, 'Deersi 精华Ampoule（VC美白/淡斑）', 'aq.jpg', 1, 14, NULL, '\r\nDeersi Essence Ampoule (VC Whitening/Blemish Lightening)', NULL, 38, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(34, 'Dekrei精华Ampoule（鱼子酱抗衰）', 'ar.jpg', 1, 14, NULL, '\r\nDekrei Essence Ampoule (Caviar Anti-Aging)', NULL, 38, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(35, 'Dekrei 精华Ampoule（收缩毛孔）', 'as.jpg', 1, 14, NULL, '\r\nDekrei Essence Ampoule (Shrink Pore)', NULL, 38, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(36, ' Kiss Medical Mask masks', 'an.jpg', 1, 14, NULL, '\r\nKiss Medical Mask masks', NULL, 38, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(56, 'Caramel Lash 焦糖色美睫', 'EL12.jpg', 1, 15, NULL, 'Caramel Lash Caramel Eyelashes\r\n', NULL, 20, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(57, 'Taiwan Mane Lash 台湾貂绒美睫', 'EL13.jpg', 1, 15, NULL, '\r\nTaiwan Mane Lash Taiwan Mink Velvet Eyelashes', NULL, 20, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(58, 'Camellia Lash 山茶花', 'EL14.jpg', 1, 15, NULL, '\r\nCamellia Lash Camellia', NULL, 20, 0, 0, NULL, NULL, 0, '', 0, 29, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(59, 'Color Design 色彩设计', 'EL17.jpg', 1, 15, NULL, '\r\nColor Design', NULL, 20, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(60, 'Lash Mix 美睫材质混搭 ', 'EL.jpg', 1, 15, NULL, 'Lash Mix\r\n', NULL, 20, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-09-16 07:43:37'),
(61, 'Eyelash Spa', 'WhatsApp_Image_2022-10-20_at_2_33_34_PM.jpeg', 1, 15, NULL, 'Eyelash Spa Eyelash Deep Cleansing Spa 美睫深层清洁', NULL, 10, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-10-25 18:18:32'),
(62, 'Eyelash Removal', 'EL18.jpg', 1, 15, NULL, 'Eyelash Removal  卸非本店美睫', NULL, 20, 0, 0, NULL, NULL, 0, '', 0, 29, 0, 0, 1, 1, '2022-10-25 18:18:06'),
(63, 'Korea Eyelash flying kit', 'WhatsApp_Image_2022-10-20_at_2_33_36_PM.jpeg', 1, 15, NULL, 'Korea Eyelash flying kit Keratin Eyelash Lifting  角蛋白翘睫术 ', NULL, 98, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-10-25 18:17:41'),
(64, 'Eyelash rebirth', 'EL8.jpg', 1, 15, NULL, 'Eyelash rebirth 孕睫术', NULL, 480, 0, 0, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-10-25 18:17:18'),
(65, '(Japan）Eyelash rebirth', 'e4.jpg', 1, 15, NULL, '(Japan) Eyelash rebirth', NULL, 880, 836, 5, NULL, NULL, 0, '', 0, 30, 0, 0, 1, 1, '2022-10-22 13:14:06'),
(66, 'Med 1800', 'image4.jpg', 1, 1, 13, '10x- $2800', NULL, 398, 0, 0, 2800, 10, 4, 'percentage', 0, 30, 1, 0, 1, 1, '2022-11-18 17:55:50'),
(67, 'Baby Straight/ Baby Curl', 'image9.png', 1, 7, 7, '', NULL, 88, 0, 0, 800, 10, 3, 'fixed', 0, 30, 1, 2, 1, 1, '2022-11-02 14:52:02'),
(68, 'Japanese Sunflower', 'image10.jpg', 1, 7, 7, '', NULL, 98, 0, 0, 900, 10, 5, 'fixed', 0, 30, 2, 0, 1, 1, '2022-11-02 14:56:46'),
(69, 'Classic Wet lash', 'image36.jpg', 1, 7, 7, '', NULL, 108, 0, 0, 800, 8, 4, '', 0, 30, 2, 0, 1, 1, '2022-11-02 15:00:20'),
(70, 'YY Lash twin flower', 'image39.jpg', 1, 7, 8, '', NULL, 108, 0, 0, 880, 10, 2, 'fixed', 0, 30, 2, 0, 1, 1, '2022-11-03 06:30:24'),
(71, 'Anime Lash Comics', 'image40.jpg', 1, 7, 8, '', 108, 168, 0, 0, 1600, 10, 3, 'fixed', 0, 30, 2, 0, 1, 1, '2022-11-03 07:31:51'),
(72, 'Kim K Lash flower fairy', 'image42.jpg', 1, 7, 8, '', 108, 168, 0, 0, 1280, 8, 4, 'fixed', 0, 30, 3, NULL, 1, 1, '2022-11-03 07:43:19'),
(73, 'Thai Style Thai eyelashes', 'image45.jpg', 1, 7, 9, '', 128, 188, 0, 0, 1680, 10, 3, 'fixed', 0, 30, 2, NULL, 1, 1, '2022-11-03 07:45:09'),
(74, 'Foxy Lash wide-angle fox wink', 'image47.jpg', 1, 7, 9, '', 128, 188, 0, 0, 1680, 10, 2, 'fixed', 0, 30, 2, NULL, 1, 1, '2022-11-03 07:46:44'),
(75, 'Blossom Lash flower shadow eyelashes', 'image50.jpg', 1, 7, 9, '', 128, 168, 0, 0, 1680, 10, 5, '', 0, 30, 2, NULL, 1, 1, '2022-11-03 07:48:10'),
(76, 'Camelia Lash Camellia/Iris', 'image52.jpg', 1, 7, 9, '', 128, 148, 0, 0, 1280, 10, 4, '', 0, 30, 2, NULL, 1, 1, '2022-11-03 08:00:26'),
(77, 'Russian Mega russian bushy', 'image54.png', 1, 7, 9, '', 168, 188, 0, 0, 1280, 8, 3, 'fixed', 0, 30, 2, NULL, 1, 1, '2022-11-03 08:02:06'),
(78, 'Keratin Lift Keratin Lifting', 'image56.jpg', 1, 7, 10, '', 0, 78, 0, 0, 680, 10, 4, 'fixed', 0, 30, 3, NULL, 1, 1, '2022-11-03 08:03:29'),
(79, '6D Light Oxygen Misty Brows', 'image3.jpg', 1, 19, 1, '', 488, 688, 0, 0, 5500, 10, 3, 'fixed', 0, 30, 2, NULL, 1, 1, '2022-11-03 12:12:28'),
(80, '7D Gradient Powder Brows', 'image2.jpg', 1, 19, 1, '', 688, 888, 0, 0, 7100, 8, 3, 'fixed', 0, 30, 3, NULL, 1, 1, '2022-11-03 12:14:52'),
(81, '9D Celebrity Powder Brows', 'image5.jpg', 1, 19, 1, '', 1288, 1588, 0, 0, 12700, 8, 3, 'fixed', 0, 30, 2, NULL, 1, 1, '2022-11-03 12:17:29'),
(82, '6D Microblading Brows', 'image41.jpg', 1, 19, 1, '', 588, 788, 0, 0, 6300, 8, 2, '', 0, 30, 3, NULL, 1, 1, '2022-11-03 12:26:22'),
(83, '7D Fibre-Silk Brows', 'image7.jpg', 1, 19, 1, '', 888, 1088, 0, 0, 20000, 10, 0, '', 0, 30, 2, NULL, 1, 1, '2022-11-03 12:27:46'),
(84, '9D Natural- Wild Microblading Brows', 'image6.jpg', 1, 19, 1, '', 888, 1288, 0, 0, 12800, 10, 3, '', 0, 30, 2, NULL, 1, 1, '2022-11-03 12:29:34'),
(85, 'Misty-Silk Brows', 'image9.jpg', 1, 19, 1, '', 0, 1688, 0, 0, 13500, 8, 3, '', 0, 30, 2, NULL, 1, 1, '2022-11-03 12:36:22'),
(86, 'Fine Eyeliner', 'image8.jpg', 1, 19, 2, '', 0, 488, 0, 0, 4800, 10, 4, '', 0, 0, 2, NULL, 1, 1, '2022-11-03 12:38:22'),
(87, 'Eyelash Liner', 'image12.jpg', 1, 19, 2, '', 0, 688, 0, 0, 6800, 10, 4, '', 0, 30, 2, NULL, 1, 1, '2022-11-03 12:39:42'),
(88, '3 in 1 Eyeliner', 'image101.jpg', 1, 19, 2, '', 0, 888, 0, 0, 8800, 10, 5, '', 0, 30, 3, NULL, 1, 1, '2022-11-03 12:43:58'),
(89, '3D Lip Blush', 'image11.jpg', 1, 19, 3, '', 0, 588, 0, 0, 5800, 10, 5, 'fixed', 0, 30, 2, NULL, 1, 1, '2022-11-03 12:45:41'),
(90, 'Crystal Lips', 'image13.jpg', 1, 19, 3, '', 0, 888, 0, 0, 8800, 10, 4, '', 0, 30, 2, NULL, 1, 1, '2022-11-03 12:48:17'),
(91, 'Two-Color Gradient Lips', 'image14.jpg', 1, 19, 3, '', 0, 1288, 0, 0, 10300, 10, 3, 'fixed', 0, 30, 2, NULL, 1, 1, '2022-11-03 12:49:53');

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
(3, 3, 6),
(16, 5, 7),
(17, 5, 8),
(18, 5, 10);

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
  `shipping_address` varchar(255) DEFAULT NULL,
  `shipping_country` varchar(200) DEFAULT NULL,
  `shipping_hse_blk_no` varchar(255) DEFAULT NULL,
  `shippingunit_no` varchar(255) DEFAULT NULL,
  `shipping_street` varchar(255) DEFAULT NULL,
  `shipping_postalcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_shipping_address`
--

INSERT INTO `nbb_shipping_address` (`id`, `user_id`, `created_at`, `shipping_firstname`, `shipping_lastname`, `shipping_contactno`, `shipping_address`, `shipping_country`, `shipping_hse_blk_no`, `shippingunit_no`, `shipping_street`, `shipping_postalcode`) VALUES
(1, 1, '2022-09-29', 'susmita', 'ojha', '01234587', 'ghf hjg hghj yghjb', 'Singapore', 'cb-23', 'cb-23', 'xcvx hgh', 123578),
(2, 2, '2022-11-11', 'firstname 234', 'lastname 40', '124502332', 'address2', 'country 40', 'block 50', '50', 'street2', 4000000),
(8, 20, '2022-11-11', 'firstname 234', 'lastname 40', '124502332', 'address2', 'country 40', 'block 50', '50', 'street2', 4000000);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_sub_child_category`
--

CREATE TABLE `nbb_sub_child_category` (
  `id` int(11) NOT NULL,
  `child_category` int(11) DEFAULT NULL,
  `sub_child_category` varchar(255) DEFAULT NULL,
  `subchild_cat_image` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_sub_child_category`
--

INSERT INTO `nbb_sub_child_category` (`id`, `child_category`, `sub_child_category`, `subchild_cat_image`, `details`, `created_at`, `status`) VALUES
(1, 19, 'Semi-Permanent Eyebrows Series', 'image3.jpg', '', '2022-11-07 17:39:05', 1),
(2, 19, 'Semi-Permanent Eyeliner Series', 'image10.jpg', '', '2022-11-07 17:39:16', 1),
(3, 19, 'Semi-Permanent Lips Series', 'L3.jpg', '', '2022-11-11 01:49:26', 1),
(7, 7, 'Natural Series', 'c.jpg', '', '2022-11-11 01:48:19', 1),
(8, 7, 'Customised Series', 'image2.jpg', '', '2022-11-11 01:47:44', 1),
(9, 7, 'Volume Series', 'image40.jpg', '', '2022-11-10 00:57:54', 1),
(10, 7, 'Keratin series', 'image9.jpg', '', '2022-11-11 01:47:57', 1),
(11, 1, 'Basic Treatment Series', 'basic-treatment-series.jpg', '', '2022-11-18 10:42:02', 1),
(12, 1, 'Efficiency Skin Care', 'image9.jpeg', '', '2022-11-18 14:11:30', 1),
(13, 1, 'Light Medical Skin Management', 'image20.jpeg', '', '2022-11-18 14:11:55', 1),
(14, 1, 'Additional Care', 'image25.jpeg', '', '2022-11-18 14:26:44', 1),
(15, 24, 'Lips Pigments', 'beautiful-lips-300x2002.jpg', '', '2022-11-23 14:51:09', 1),
(16, 24, 'Pigment Corrector', 'IMG_58621.JPG', '', '2022-11-23 14:51:51', 1),
(17, 24, 'Eyeliner Pigment', NULL, '', '2022-11-23 15:21:37', 1),
(18, 24, 'Eyebrow Pigment', 'image54.png', '', '2022-11-23 14:53:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_supplier`
--

CREATE TABLE `nbb_supplier` (
  `id` int(11) NOT NULL,
  `supplier_code` varchar(200) DEFAULT NULL,
  `supplier_name` varchar(200) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `supplier_address` text DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_supplier`
--

INSERT INTO `nbb_supplier` (`id`, `supplier_code`, `supplier_name`, `contact_no`, `email`, `supplier_address`, `status`) VALUES
(2, 'thjgjh234', 'sudipto', NULL, 'gfgfbbv@gmail.com', 'gfghf ythghjgjhg', 1),
(3, 'bi1234', 'bizzman', NULL, 'admin1234@gmail.com', 'kolkata', 1);

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
(17, NULL, 'test', NULL, 'test@gmail.com', '5d3ecdd08e15ad61466ea727fc19b9d6c2b8fa44e4e227d57895fc7f74ece26a09679fd4ea8ff422981e0adfbcccdcb68b879c31857e8f1d89a0d764cf1bedf9', 1, 10, '2022-10-13 19:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_wishlist`
--

CREATE TABLE `nbb_wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_wishlist`
--

INSERT INTO `nbb_wishlist` (`id`, `userId`, `product_id`, `create_at`, `status`) VALUES
(5, 1, 53, '2022-10-20 17:45:05', NULL);

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
(7, 11, '', '', '0000-00-00', '0000-00-00'),
(8, 12, '', '', '0000-00-00', '0000-00-00'),
(9, 13, '', '', '0000-00-00', '0000-00-00'),
(10, 14, '', '', '0000-00-00', '0000-00-00'),
(11, 15, '', '', '0000-00-00', '0000-00-00'),
(12, 16, '', '', '0000-00-00', '0000-00-00'),
(13, 17, '', '', '0000-00-00', '0000-00-00'),
(14, 18, '', '', '0000-00-00', '0000-00-00'),
(15, 19, '', '', '0000-00-00', '0000-00-00');

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
-- Indexes for table `nbb_membership`
--
ALTER TABLE `nbb_membership`
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
-- Indexes for table `nbb_order_service`
--
ALTER TABLE `nbb_order_service`
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
-- Indexes for table `nbb_part_time`
--
ALTER TABLE `nbb_part_time`
  ADD PRIMARY KEY (`part_time_id`);

--
-- Indexes for table `nbb_payments`
--
ALTER TABLE `nbb_payments`
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
-- Indexes for table `nbb_posservice_order`
--
ALTER TABLE `nbb_posservice_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_product`
--
ALTER TABLE `nbb_product`
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
-- Indexes for table `nbb_sub_child_category`
--
ALTER TABLE `nbb_sub_child_category`
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
-- Indexes for table `nbb_wishlist`
--
ALTER TABLE `nbb_wishlist`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
-- AUTO_INCREMENT for table `nbb_coupons`
--
ALTER TABLE `nbb_coupons`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_course`
--
ALTER TABLE `nbb_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nbb_cpf`
--
ALTER TABLE `nbb_cpf`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_credit_wallet`
--
ALTER TABLE `nbb_credit_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_customer`
--
ALTER TABLE `nbb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nbb_daily_sales`
--
ALTER TABLE `nbb_daily_sales`
  MODIFY `sales_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_dashboard`
--
ALTER TABLE `nbb_dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_delivery_details`
--
ALTER TABLE `nbb_delivery_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_delivery_status`
--
ALTER TABLE `nbb_delivery_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nbb_employees`
--
ALTER TABLE `nbb_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nbb_employees_attendance`
--
ALTER TABLE `nbb_employees_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nbb_employee_address`
--
ALTER TABLE `nbb_employee_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nbb_employee_leave`
--
ALTER TABLE `nbb_employee_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nbb_employee_salary`
--
ALTER TABLE `nbb_employee_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_emp_education_qualification`
--
ALTER TABLE `nbb_emp_education_qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT for table `nbb_membership`
--
ALTER TABLE `nbb_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_order_main`
--
ALTER TABLE `nbb_order_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_order_product`
--
ALTER TABLE `nbb_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_order_service`
--
ALTER TABLE `nbb_order_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_packages`
--
ALTER TABLE `nbb_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nbb_parentcategory`
--
ALTER TABLE `nbb_parentcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_part_time`
--
ALTER TABLE `nbb_part_time`
  MODIFY `part_time_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nbb_payments`
--
ALTER TABLE `nbb_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nbb_posservice_order`
--
ALTER TABLE `nbb_posservice_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nbb_product`
--
ALTER TABLE `nbb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `nbb_product_image`
--
ALTER TABLE `nbb_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `nbb_register_student`
--
ALTER TABLE `nbb_register_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nbb_rolepermission`
--
ALTER TABLE `nbb_rolepermission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nbb_roles`
--
ALTER TABLE `nbb_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nbb_service`
--
ALTER TABLE `nbb_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `nbb_service_packages`
--
ALTER TABLE `nbb_service_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nbb_shipping_address`
--
ALTER TABLE `nbb_shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nbb_sub_child_category`
--
ALTER TABLE `nbb_sub_child_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nbb_supplier`
--
ALTER TABLE `nbb_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_supplier_order`
--
ALTER TABLE `nbb_supplier_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nbb_wishlist`
--
ALTER TABLE `nbb_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nbb_work_experience`
--
ALTER TABLE `nbb_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
