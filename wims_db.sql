-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 10:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_student`
--

CREATE TABLE `academic_student` (
  `as_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `academic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `field_student`
--

CREATE TABLE `field_student` (
  `fs_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `internship_grading`
--

CREATE TABLE `internship_grading` (
  `grade_id` int(11) NOT NULL,
  `student_mark` decimal(4,1) NOT NULL,
  `field_mark` decimal(4,1) NOT NULL,
  `academic_mark` decimal(4,1) NOT NULL,
  `date_graded` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `intern_assess`
--

CREATE TABLE `intern_assess` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intern_assess`
--

INSERT INTO `intern_assess` (`id`, `question`, `created_by`, `type`) VALUES
(2, 'super', 4, 1),
(3, 'field', 5, 1),
(8, 'time management', 5, 1),
(10, 'late', 3, 1),
(12, 'skills\r\n', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `intern_grade`
--

CREATE TABLE `intern_grade` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `intern_assess` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `by_` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intern_grade`
--

INSERT INTO `intern_grade` (`id`, `student_id`, `intern_assess`, `marks`, `by_`, `user_id`) VALUES
(1, 18, 2, 9, 4, 20),
(2, 18, 3, 9, 5, 19),
(3, 18, 8, 8, 5, 19),
(4, 18, 10, 9, 3, 3),
(5, 18, 12, 9, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notify_id` int(11) NOT NULL,
  `notify_from` varchar(100) NOT NULL,
  `notify_to` varchar(100) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification_type`
--

CREATE TABLE `notification_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `profile_pic` text DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `residence` varchar(100) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `nationality` varchar(55) DEFAULT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_supervisor`
--

CREATE TABLE `tbl_academic_supervisor` (
  `academic_id` int(11) NOT NULL,
  `acode` varchar(25) NOT NULL,
  `academic_fname` varchar(150) NOT NULL,
  `academic_lname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `department` varchar(150) NOT NULL,
  `faculty` varchar(150) NOT NULL,
  `college` varchar(150) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_academic_supervisor`
--

INSERT INTO `tbl_academic_supervisor` (`academic_id`, `acode`, `academic_fname`, `academic_lname`, `email`, `phone`, `department`, `faculty`, `college`, `password`, `date_added`, `update_date`, `student_id`) VALUES
(20, 'VU-AS/0020', 'sss', 'academic student', 'acad@gmail.com', '+256756281862', 'technology', 'try', 'MIT', '827ccb0eea8a706c4c34a16891f84e7b', '2022-06-14 08:58:14', '2022-06-19 12:40:54', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_year`
--

CREATE TABLE `tbl_academic_year` (
  `year_id` int(11) NOT NULL,
  `year_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_academic_year`
--

INSERT INTO `tbl_academic_year` (`year_id`, `year_name`, `created_at`) VALUES
(14, 'Second Year', '2022-05-04 02:57:48'),
(15, 'Third Year', '2022-05-04 02:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignments`
--

CREATE TABLE `tbl_assignments` (
  `assign_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `chat_id` int(11) NOT NULL,
  `chat_from` int(11) NOT NULL,
  `chat_to` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `chat_time` int(11) NOT NULL,
  `chat_status` int(11) NOT NULL,
  `chat_attachment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(11) NOT NULL,
  `company_code` varchar(25) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `direction_detail` varchar(200) DEFAULT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `fromTime` varchar(10) DEFAULT NULL,
  `toTime` varchar(10) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_code`, `company_name`, `address`, `phone`, `email`, `direction_detail`, `date_added`, `update_date`, `fromTime`, `toTime`, `student_id`) VALUES
(1, 'VU-CO/0001', 'Balex', 'Kampala', '+256704923822', 'balex@gmail.com', 'Sir Apollo Kagwa Road', '2022-05-08 17:51:17', '2022-05-08 19:52:44', '08:00', '10:00', 18),
(2, 'VU-CO/0002', 'xorx', 'xorx', '+256756281862', 'ddd@gmail.com', 'ndeeba', '2022-06-06 11:40:41', '2022-06-07 18:30:15', '11:40', '23:40', 19),
(24, 'VU-CO/0024', 'TNWG Limited', 'TNWG Limited', '+10702990449', 'kazibwefred@gmail.com', 'ndeegb', '2022-06-12 18:11:00', NULL, '06:10', '18:10', 2),
(26, 'VU-CO/0026', 'qqqqq', 'qqqqq', '+256756281862', 'qqq@gg.gn', 'qwerty', '2022-06-12 19:53:13', NULL, '07:52', '19:52', 3),
(27, 'VU-CO/0027', 'microfinace', 'xorx', '+256756281862', 'muyanjajovanquinn@gmail.com', 'dddd', '2022-06-13 20:44:53', NULL, '08:44', '20:44', 4),
(29, 'VU-CO/0029', 'student company', 'sss', '+256756281862', 'c@gmail.com', 'cccxcs', '2022-06-14 06:01:57', NULL, '06:01', '18:01', 6),
(30, 'VU-CO/0030', 'xorxmmmmm', 'xorx', '+256756281862', 'xxcx@gmail.com', 'hhhh', '2022-06-14 07:34:56', NULL, '07:34', '19:34', 1),
(31, 'VU-CO/0031', 'Balextechnologies Uganda LTD', 'Sir Apollo Kagwa road', '0772098106', 'info@balextechug.com', 'Along Sir Apollo Kagwa Road Few Meters from Full Gospel Church', '2022-06-19 12:34:16', NULL, '08:00', '07:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `course_year` year(4) NOT NULL DEFAULT 2019,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_year`, `staff_id`) VALUES
(5, 'BITE', 2019, 1),
(6, 'BIS', 2019, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dept`
--

CREATE TABLE `tbl_dept` (
  `dept_id` int(11) NOT NULL,
  `dept_code` varchar(25) NOT NULL,
  `dept_name` varchar(200) NOT NULL,
  `dept_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dept`
--

INSERT INTO `tbl_dept` (`dept_id`, `dept_code`, `dept_name`, `dept_description`) VALUES
(1, 'D.BCS', 'Department of Computer Science', 'Computer Science'),
(2, 'D.BIS', 'Department of Information Science', 'Information Science'),
(3, 'D.BIST', 'Department of Information Science & Technology', 'Information & Technology'),
(4, 'D.BITE', 'Department of Information Technology', 'Information Technology'),
(5, 'D.BSW', 'Department of Software Engineering', 'Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_field_activities`
--

CREATE TABLE `tbl_field_activities` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(150) NOT NULL,
  `brief_details` varchar(300) NOT NULL,
  `activity_date` date DEFAULT current_timestamp(),
  `session_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fasses_status` enum('0','1') DEFAULT NULL,
  `univ_assess_status` enum('0','1') NOT NULL,
  `f_assess_comment` varchar(300) NOT NULL,
  `a_assess_comment` varchar(300) NOT NULL,
  `date_fassessed` timestamp NULL DEFAULT current_timestamp(),
  `date_a_assessed` timestamp NOT NULL DEFAULT current_timestamp(),
  `field_id` int(11) DEFAULT NULL,
  `academic_id` int(11) NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_field_activities`
--

INSERT INTO `tbl_field_activities` (`activity_id`, `activity_name`, `brief_details`, `activity_date`, `session_id`, `student_id`, `fasses_status`, `univ_assess_status`, `f_assess_comment`, `a_assess_comment`, `date_fassessed`, `date_a_assessed`, `field_id`, `academic_id`, `update_date`) VALUES
(2, 'Read Emails', 'ffff', '2022-06-16', 13, 1, '1', '1', 'nice', 'seen', '2022-06-14 04:43:05', '2022-06-14 04:43:05', NULL, 0, '2022-06-14 06:02:42'),
(3, 'cooking', 'ddd', '2022-06-14', 14, 1, '1', '1', 'googley', 'jl', '2022-06-14 05:32:11', '2022-06-14 05:32:11', NULL, 0, '2022-06-18 05:50:22'),
(4, 'dress', 'sss', '2022-06-14', 13, 1, '1', '1', 'bye', 'just great', '2022-06-14 05:32:49', '2022-06-14 05:32:49', NULL, 0, '2022-06-18 18:19:10'),
(5, 'Network', 'Cable Termination', '2022-06-18', 14, 1, '1', '1', 'Good work', 'good', '2022-06-18 18:09:31', '2022-06-18 18:09:31', NULL, 0, '2022-06-18 18:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_field_supervisor`
--

CREATE TABLE `tbl_field_supervisor` (
  `field_id` int(11) NOT NULL,
  `fSup_code` varchar(25) NOT NULL,
  `supervisor_name` varchar(150) NOT NULL,
  `supervisor_email` varchar(150) NOT NULL,
  `supervisor_phone` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `date_update` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `dept` varchar(150) NOT NULL,
  `company_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_field_supervisor`
--

INSERT INTO `tbl_field_supervisor` (`field_id`, `fSup_code`, `supervisor_name`, `supervisor_email`, `supervisor_phone`, `password`, `date_added`, `date_update`, `dept`, `company_id`, `student_id`) VALUES
(1, 'VU-C.FS/0001', 'field', 'field@gmail.com', '+256756281862', '827ccb0eea8a706c4c34a16891f84e7b', '2022-06-14 07:36:59', NULL, 'technology', 30, 1),
(2, 'VU-C.FS/0002', 'Kyeyune Mike', 'bazigua@yahoo.com', '07054023822', '827ccb0eea8a706c4c34a16891f84e7b', '2022-06-19 12:37:21', NULL, 'ICT', 31, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_field_supervisorxxx`
--

CREATE TABLE `tbl_field_supervisorxxx` (
  `field_id` int(11) NOT NULL,
  `fSup_code` varchar(25) NOT NULL,
  `supervisor_name` varchar(150) NOT NULL,
  `supervisor_email` varchar(150) NOT NULL,
  `supervisor_phone` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `date_update` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `dept` varchar(150) NOT NULL,
  `company_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_field_supervisorxxx`
--

INSERT INTO `tbl_field_supervisorxxx` (`field_id`, `fSup_code`, `supervisor_name`, `supervisor_email`, `supervisor_phone`, `password`, `date_added`, `date_update`, `dept`, `company_id`, `student_id`) VALUES
(12, 'VU-C.FS/0012', 'muyanja quinn', 'quinndime@gmail.com', '+256756281862', '827ccb0eea8a706c4c34a16891f84e7b', '2022-06-07 17:57:58', NULL, 'technology', 2, 20),
(13, 'VU-C.FS/0012', 'bbbbb', 'bbb@gmail.com', '+256756281862', '827ccb0eea8a706c4c34a16891f84e7b', '2022-06-07 17:57:58', '2022-06-07 18:03:41', 'bbbb', 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mail`
--

CREATE TABLE `tbl_mail` (
  `mail_id` int(11) NOT NULL,
  `mail_address` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mail`
--

INSERT INTO `tbl_mail` (`mail_id`, `mail_address`) VALUES
(9, 'newfield@gmail.com'),
(10, 'fieldqd200@gmail.com'),
(11, 'academic@gmail.com'),
(12, 'field.student@gmail.com'),
(13, 'acad@gmail.com'),
(14, 'field@gmail.com'),
(15, 'sssss@gmail.com'),
(16, 'bazigua@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panel`
--

CREATE TABLE `tbl_panel` (
  `panel_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `supervised_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `year_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Submitted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projectmarks`
--

CREATE TABLE `tbl_projectmarks` (
  `mark_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `panelist_id` int(11) NOT NULL,
  `project_grade` int(3) NOT NULL,
  `project_comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE `tbl_session` (
  `session_id` int(11) NOT NULL,
  `session_code` varchar(25) NOT NULL,
  `session_name` text NOT NULL,
  `time_in` varchar(100) NOT NULL,
  `time_out` varchar(100) NOT NULL,
  `date_recorded` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_session`
--

INSERT INTO `tbl_session` (`session_id`, `session_code`, `session_name`, `time_in`, `time_out`, `date_recorded`, `update_date`, `student_id`) VALUES
(9, 'VU-SES/0009', 'morning', '09:06', '13:06', '2022-06-12 20:06:33', NULL, 3),
(10, 'VU-SES/0010', 'eveneing', '08:45', '20:45', '2022-06-13 20:45:34', NULL, 4),
(12, 'VU-SES/0012', 'last session', '06:02', '18:02', '2022-06-14 06:02:29', NULL, 6),
(13, 'VU-SES/0013', 'new st sess', '19:42', '07:42', '2022-06-14 07:42:43', NULL, 1),
(14, 'VU-SES/0014', 'another', '20:31', '08:31', '2022-06-14 08:31:42', NULL, 1),
(15, 'VU-SES/0015', 'Morning Session', '09:00', '12:00', '2022-06-19 12:35:40', NULL, 5),
(16, 'VU-SES/0016', 'Afternoon Session', '01:00', '04:00', '2022-06-19 12:36:12', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `userType` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `lecturer_id` varchar(255) NOT NULL,
  `staff_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `user_id`, `userType`, `dept_id`, `lecturer_id`, `staff_description`) VALUES
(10, 3, 3, 1, ' CORD/S-VU/0001', 'IT Guy'),
(11, 5, 1, 2, ' UNIV/S-VU/0001', 'IS Senior Lecturer'),
(15, 5, 2, 3, ' FIELD/S-VU/0001', 'IS Senior Lecturer'),
(21, 5, 3, 4, ' CORD/S-VU/0002', 'IS Senior Lecturer'),
(22, 5, 2, 5, ' FIELD/S-VU/0002', 'IS Senior Lecturer'),
(23, 3, 3, 1, ' CORD/S-VU/0003', 'IS Senior Lecturer'),
(24, 3, 1, 1, ' UNIV/S-VU/0002', 'MIS Lecturer'),
(25, 6, 3, 1, ' CORD/S-VU/0004', 'College Coordinator'),
(26, 1, 3, 1, '` CORD/S-VU/0005', ''),
(27, 1, 3, 1, '` CORD/S-VU/0006', 'Here Mudassar Ahmed'),
(28, 1, 3, 1, '` CORD/S-VU/0007', 'Here Mudassar Ahmed ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `academic_id` int(11) NOT NULL,
  `field_sup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `user_id`, `student_number`, `course_id`, `year_id`, `academic_id`, `field_sup`) VALUES
(1, 18, 'VU-BIT-1909-0023', 5, 15, 20, 19),
(4, 22, 'VU-BIT-1909-0021', 5, 15, 0, 0),
(5, 31, 'VU-BIT-1909-0027', 5, 14, 20, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` varchar(255) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `task_status` varchar(100) NOT NULL DEFAULT 'Not Submitted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `year_id` int(11) NOT NULL,
  `task_upload` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(1000) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `activation_token` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_type` int(11) NOT NULL,
  `user_status` enum('Offline','Online') NOT NULL DEFAULT 'Offline'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `email`, `telephone`, `email_verified_at`, `password`, `avatar`, `status`, `activation_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `user_type`, `user_status`) VALUES
(3, 'COordinator Mike', 'sssss@gmail.com', '', '2022-06-25 17:36:14', '202cb962ac59075b964b07152d234b70', '', 'Y', '31d39f9bf72f8a5820176e470380e4ea', '', '2022-06-12 15:33:25', '2022-06-12 15:33:25', '2022-06-12 15:33:25', 3, 'Online'),
(18, 'quinn', 'student@gmail.com', '+256756281862', '2022-06-14 04:34:10', '6c1c121be9f262cbf9d564e7b8d523a1', 'uploads/3.png', 'Y', 'f8498680a8714c42142f16d1099fa386', '', '2022-06-14 04:32:54', '2022-06-14 04:32:54', '2022-06-14 04:32:54', 2, 'Online'),
(19, 'field', 'field@gmail.com', '', '2022-06-14 06:02:16', '202cb962ac59075b964b07152d234b70', '', 'Y', '486547d2a5036a900757c2d1544c8aed', '', '2022-06-14 04:37:00', '2022-06-14 04:37:00', '2022-06-14 04:37:00', 5, 'Online'),
(20, 'sss academic student', 'acad@gmail.com', '', '2022-06-14 05:59:49', '202cb962ac59075b964b07152d234b70', '', 'Y', '05c18b621bd2165943bbf6fba2415eb8', '', '2022-06-14 05:58:15', '2022-06-14 05:58:15', '2022-06-14 05:58:15', 4, 'Online'),
(22, 'new', 'new@gmail.com', '+256756281862', '2022-06-14 06:22:17', '6c1c121be9f262cbf9d564e7b8d523a1', 'uploads/website_promo.png', 'Y', 'c9c4fb7b8baff632703626d50bdc597f', '', '2022-06-14 06:20:42', '2022-06-14 06:20:42', '2022-06-14 06:20:42', 2, 'Online'),
(31, 'Bazigu Alex', 'bazigu.alex@gmail.com', '0778056780', '2022-06-19 09:27:37', '6c1c121be9f262cbf9d564e7b8d523a1', 'uploads/1.jpg', 'Y', 'fe297ead10d8d859e3bcf6ea5f009cee', '', '2022-06-19 08:10:25', '2022-06-19 08:10:25', '2022-06-19 08:10:25', 2, 'Online'),
(32, 'Kyeyune Mike', 'bazigua@yahoo.com', '', '2022-06-19 09:45:17', '202cb962ac59075b964b07152d234b70', '', 'Y', 'b4f37e5fffe3fadb539e94772e935a60', '', '2022-06-19 09:37:24', '2022-06-19 09:37:24', '2022-06-19 09:37:24', 5, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useripaddress`
--

CREATE TABLE `tbl_useripaddress` (
  `ip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `frequency` int(11) NOT NULL DEFAULT 0,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlocation`
--

CREATE TABLE `tbl_userlocation` (
  `loc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlogin`
--

CREATE TABLE `tbl_userlogin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlogout`
--

CREATE TABLE `tbl_userlogout` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `logout_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userpage_visit`
--

CREATE TABLE `tbl_userpage_visit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `visit_count` int(11) DEFAULT 0,
  `date_visited` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `ut_id` int(5) NOT NULL,
  `ut_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`ut_id`, `ut_name`, `created_at`) VALUES
(2, 'Student', '2022-06-07 12:33:43'),
(3, 'Coordinator', '2022-06-07 12:33:32'),
(4, 'University Supervisor', '2022-06-07 12:33:40'),
(5, 'Field Supervisor', '2022-06-07 12:33:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_student`
--
ALTER TABLE `academic_student`
  ADD PRIMARY KEY (`as_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `academic_id` (`academic_id`);

--
-- Indexes for table `field_student`
--
ALTER TABLE `field_student`
  ADD PRIMARY KEY (`fs_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `field_id` (`field_id`);

--
-- Indexes for table `internship_grading`
--
ALTER TABLE `internship_grading`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `intern_assess`
--
ALTER TABLE `intern_assess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern_grade`
--
ALTER TABLE `intern_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notify_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `notification_type`
--
ALTER TABLE `notification_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_academic_supervisor`
--
ALTER TABLE `tbl_academic_supervisor`
  ADD PRIMARY KEY (`academic_id`);

--
-- Indexes for table `tbl_academic_year`
--
ALTER TABLE `tbl_academic_year`
  ADD PRIMARY KEY (`year_id`);

--
-- Indexes for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `dept_Code` (`dept_code`);

--
-- Indexes for table `tbl_field_activities`
--
ALTER TABLE `tbl_field_activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `tbl_field_supervisor`
--
ALTER TABLE `tbl_field_supervisor`
  ADD PRIMARY KEY (`field_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_field_supervisorxxx`
--
ALTER TABLE `tbl_field_supervisorxxx`
  ADD PRIMARY KEY (`field_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_mail`
--
ALTER TABLE `tbl_mail`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `tbl_panel`
--
ALTER TABLE `tbl_panel`
  ADD PRIMARY KEY (`panel_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tbl_projectmarks`
--
ALTER TABLE `tbl_projectmarks`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `lecturer_id` (`lecturer_id`),
  ADD KEY `userType` (`userType`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_number` (`student_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD PRIMARY KEY (`ut_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_student`
--
ALTER TABLE `academic_student`
  MODIFY `as_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `field_student`
--
ALTER TABLE `field_student`
  MODIFY `fs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internship_grading`
--
ALTER TABLE `internship_grading`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intern_assess`
--
ALTER TABLE `intern_assess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `intern_grade`
--
ALTER TABLE `intern_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_type`
--
ALTER TABLE `notification_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_academic_supervisor`
--
ALTER TABLE `tbl_academic_supervisor`
  MODIFY `academic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_academic_year`
--
ALTER TABLE `tbl_academic_year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_field_activities`
--
ALTER TABLE `tbl_field_activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_field_supervisor`
--
ALTER TABLE `tbl_field_supervisor`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_field_supervisorxxx`
--
ALTER TABLE `tbl_field_supervisorxxx`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_mail`
--
ALTER TABLE `tbl_mail`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_panel`
--
ALTER TABLE `tbl_panel`
  MODIFY `panel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_projectmarks`
--
ALTER TABLE `tbl_projectmarks`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_session`
--
ALTER TABLE `tbl_session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `ut_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_student`
--
ALTER TABLE `academic_student`
  ADD CONSTRAINT `academic_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `academic_student_ibfk_2` FOREIGN KEY (`academic_id`) REFERENCES `tbl_academic_supervisor` (`academic_id`);

--
-- Constraints for table `field_student`
--
ALTER TABLE `field_student`
  ADD CONSTRAINT `field_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `field_student_ibfk_2` FOREIGN KEY (`field_id`) REFERENCES `tbl_field_supervisorxxx` (`field_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `notification_type` (`type_id`);

--
-- Constraints for table `tbl_field_supervisorxxx`
--
ALTER TABLE `tbl_field_supervisorxxx`
  ADD CONSTRAINT `tbl_field_supervisorxxx_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `tbl_company` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
