-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 03:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_driving_erpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_time` time NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `attendance_date`, `attendance_time`, `entry_by`, `entry_at`) VALUES
(0, 1, '2023-11-11', '04:57:59', 1, '2023-11-11 16:58:00'),
(0, 3, '2023-11-11', '05:01:40', 3, '2023-11-11 17:01:40'),
(0, 1, '2023-11-22', '10:59:34', 1, '2023-11-22 22:59:34'),
(0, 1, '2024-02-21', '12:24:27', 1, '2024-02-21 00:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `opening_amt` varchar(255) NOT NULL,
  `paid_amt` varchar(255) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `payment_date`, `opening_amt`, `paid_amt`, `entry_by`, `entry_at`) VALUES
(1, 3, '2023-11-11', '6000', '500', 1, '2023-11-11 17:00:45'),
(2, 3, '2024-02-21', '0', '5000', 1, '2024-02-21 00:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `personnel_basic_info`
--

CREATE TABLE `personnel_basic_info` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `edu_qual` varchar(255) NOT NULL,
  `institute_name` varchar(255) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `national_id` bigint(20) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `admission_date` date NOT NULL,
  `designation` varchar(255) NOT NULL,
  `pr_house_no` varchar(255) NOT NULL,
  `pr_flat_no` varchar(20) NOT NULL,
  `pr_block` varchar(20) NOT NULL,
  `pr_police_station` varchar(50) NOT NULL,
  `pr_district` varchar(50) NOT NULL,
  `village` varchar(100) NOT NULL,
  `post_office` varchar(100) NOT NULL,
  `police_station` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `road` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `expaired_date` date NOT NULL,
  `course_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personnel_basic_info`
--

INSERT INTO `personnel_basic_info` (`id`, `unique_id`, `s_name`, `f_name`, `m_name`, `gender`, `marital_status`, `religion`, `edu_qual`, `institute_name`, `phone_no`, `email`, `dob`, `blood_group`, `national_id`, `image_name`, `admission_date`, `designation`, `pr_house_no`, `pr_flat_no`, `pr_block`, `pr_police_station`, `pr_district`, `village`, `post_office`, `police_station`, `district`, `road`, `status`, `expaired_date`, `course_name`) VALUES
(1, 1, 'Monir', 'father', 'Mother', 'Male', '', '', '', '', 0, '', '0000-00-00', '', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', ''),
(2, 0, 'Al Amin Ali Dawan', 'Father', '', '', '', 'Muslim', 'Honours', '', 0, '', '0000-00-00', 'B+', 0, 'user879.', '2023-11-11', 'Trainer', '', '', '', '', '', '', '', '', '', '', 'Active', '2024-03-30', 'Motor Cycle Driving'),
(3, 3, 'Chandan Das', 'Father', '', '', '', 'Hindu', 'Honours', '', 0, '', '0000-00-00', 'B+', 0, 'user694.', '2023-11-11', 'Trainer', '', '', '', '', '', '', '', '', '', '', 'Active', '2024-03-30', 'Motor Cycle Driving'),
(4, 4, 'Sarwar', '', '', 'Male', '', 'Muslim', '', '', 0, '', '0000-00-00', 'O(-)', 0, 'user744.', '0000-00-00', 'Trainee', '', '', '', '', '', '', '', '', '', '', 'Active', '0000-00-00', 'Car Driving'),
(5, 5, 'Nayeem Khan', '', '', '', '', '', '', '', 0, '', '0000-00-00', '', 0, 'user551.', '0000-00-00', 'Trainer', '', '', '', '', '', '', '', '', '', '', 'Active', '0000-00-00', 'Car Driving'),
(6, 6, 'Mehedi Hasan', '', '', '', '', '', '', '', 0, '', '0000-00-00', '', 0, 'user69.', '0000-00-00', 'Trainee', '', '', '', '', '', '', '', '', '', '', 'Active', '0000-00-00', 'Car Driving');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_time` time NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `schedule_date`, `trainer_id`, `user_id`, `schedule_time`, `entry_by`, `entry_at`) VALUES
(0, '2023-11-17', 2, 3, '13:33:00', 1, '2023-11-17 11:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity_management`
--

CREATE TABLE `user_activity_management` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_activity_management`
--

INSERT INTO `user_activity_management` (`user_id`, `user_name`, `fname`, `password`, `unique_id`, `status`, `designation`, `image_name`, `entry_by`, `entry_at`) VALUES
(1, 'Admin', 'Monir', '123', 1, 'Active', 'Administrator', '', 0, '2023-11-11 11:54:13'),
(2, 'Alamin', 'Al Amin Ali Dawan', '123', 2, 'Active', 'Trainer', 'user543.', 1, '2023-11-11 16:58:53'),
(3, 'sarwar', 'Sarwar Jahan', '123', 4, 'Active', 'Trainee', 'user886.', 1, '2023-11-11 17:00:25'),
(4, 'chandan', 'Chandan Das', '123', 3, 'Active', 'Trainee', 'user579.', 1, '2023-11-11 17:05:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnel_basic_info`
--
ALTER TABLE `personnel_basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activity_management`
--
ALTER TABLE `user_activity_management`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personnel_basic_info`
--
ALTER TABLE `personnel_basic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_activity_management`
--
ALTER TABLE `user_activity_management`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
