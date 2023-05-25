-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2019 at 02:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignments`
--

CREATE TABLE `tbl_assignments` (
  `assign_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
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
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `course_year` year(4) NOT NULL DEFAULT '2019',
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_year`, `staff_id`) VALUES
(4, 'DIT', 2019, 1),
(5, 'BITE', 2019, 1),
(6, 'BIS', 2019, 1),
(7, 'BSCS', 2019, 1);

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
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`group_id`, `group_name`, `course_id`, `created_at`) VALUES
(1, 'Group A', 4, '2019-04-24 07:00:00'),
(2, 'Group B', 7, '2019-04-24 07:00:00'),
(3, 'Group C', 5, '2019-04-24 07:00:00'),
(4, 'Group A', 6, '2019-04-24 07:00:00'),
(5, 'Group B', 6, '2019-04-24 07:00:00'),
(6, 'Group C', 6, '2019-04-24 07:00:00'),
(7, 'Group A', 7, '2019-04-24 07:00:00'),
(8, 'Group C', 7, '2019-04-24 07:00:00'),
(9, 'Group G', 5, '2019-04-11 07:00:00'),
(10, 'Group F', 5, '2019-04-27 07:00:00'),
(11, 'Sweet', 4, '2019-05-04 07:00:00'),
(12, 'sweet betty', 4, '2019-05-30 07:00:00'),
(13, 'jhj', 4, '2019-05-31 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panel`
--

CREATE TABLE `tbl_panel` (
  `panel_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `group_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Submitted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`project_id`, `project_name`, `project_description`, `start_date`, `end_date`, `supervised_by`, `created_at`, `updated_at`, `group_id`, `status`) VALUES
(1, 'Dancing', 'Dancing Ogwo...', '2019-05-01', '2019-06-01', 36, '2019-05-01 00:47:00', '2019-05-01 00:47:00', 8, 'Submitted'),
(2, 'Mr. Google Sir joseph', 'yuy', '2019-05-17', '2019-05-31', 28, '2019-05-03 22:17:33', '2019-05-03 22:17:33', 11, 'Submitted');

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

--
-- Dumping data for table `tbl_projectmarks`
--

INSERT INTO `tbl_projectmarks` (`mark_id`, `project_id`, `panelist_id`, `project_grade`, `project_comment`) VALUES
(7, 1, 40, 79, '123');

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
(1, 13, 1, 1, '123', 'HOD'),
(3, 30, 1, 5, '200', 'Assistant Lecturer For Website Designing'),
(5, 33, 1, 5, '320', 'Software Lecture'),
(6, 35, 4, 1, '412', 'Comp Scientist'),
(7, 40, 3, 4, '768', 'Panel Panel'),
(8, 28, 2, 4, '777', '999 our line for daly attack'),
(9, 36, 2, 4, '900', 'code with us');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `user_id`, `student_number`, `registration_number`, `course_id`, `group_id`) VALUES
(14, 29, '213001209', '13/u/203', 7, 8),
(15, 37, '909090989', '19/u/23', 4, 11),
(16, 38, '909090978', '19/u/24', 4, 11),
(17, 39, '909090945', '19/u/278', 4, 11);

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `group_id` int(11) NOT NULL,
  `task_upload` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`task_id`, `task_name`, `task_description`, `staff_id`, `start_date`, `end_date`, `task_status`, `created_at`, `updated_at`, `group_id`, `task_upload`) VALUES
(7, 'Syntax', 'Write the syntax for a while loop', 28, '2019-04-26', '2019-04-30', 'Not Submitted', '2019-05-01 00:51:01', '0000-00-00 00:00:00', 9, ''),
(8, 'Syntax', 'Write a project on how to dance ogwo.', 36, '2019-04-30', '2019-05-04', 'Submitted', '2019-05-01 01:30:41', '2019-04-30 17:48:52', 8, 'uploads/pts21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(1000) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `activation_token` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_type` int(11) NOT NULL,
  `user_status` enum('Offline','Online') NOT NULL DEFAULT 'Offline'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `email`, `telephone`, `email_verified_at`, `password`, `avatar`, `status`, `activation_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `user_type`, `user_status`) VALUES
(13, 'Balexis', 'allan@gmail.com', '+256704923822', '2019-05-02 00:17:13', '202cb962ac59075b964b07152d234b70', '', 'Y', '55354', '', '2019-04-24 06:15:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'Online'),
(28, 'B Jose', 'jose.alex@gmail.com', '0778056780', '2019-05-02 01:06:35', 'd93591bdf7860e1e4ee2fca799911215', '', 'Y', 'b0907d56ee2fe145b6591d30c4ca3119', '', '2019-04-26 19:59:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 'Online'),
(29, 'Bazigu Alex', 'bazigu.balex@gmail.com', '0777778909', '2019-05-02 21:15:05', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Y', 'a12811b933792eb7d4ac9423d9e44931', '', '2019-05-02 00:46:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'Online'),
(30, 'Kebirungi Genny', 'balexis.bazigu@gmail.com', '0789000001', '2019-05-02 03:07:27', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Y', '17feff95554df42c7ce819a1f46c5e70', '', '2019-05-02 00:56:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'Online'),
(31, 'Kalungi Moses', 'bazigu.alex,ann@gmail.com', '0781234567', '2019-05-02 03:25:10', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Y', '9969985905806c252060d684646e0da0', '', '2019-05-02 02:59:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 'Offline'),
(33, 'Lutaaya Brian', 'alexis.bazigu@gmail.com', '0750987654', '2019-05-02 03:11:29', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Y', '73eae693d6ae422f3b23188fba82b6db', '', '2019-05-02 03:09:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'Online'),
(35, 'Simon Ainebyona', 'bazigu.alex@gmail.com', '0777984567', '2019-05-02 20:54:12', '827ccb0eea8a706c4c34a16891f84e7b', 'uploads/alexis.jpg', 'Y', 'b712c2c9f3060adb4f204b007997b274', '', '2019-05-02 03:19:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 'Online'),
(36, 'wewe', 'josemusiitwawewe@gmail.com', '+256788229210', '2019-05-01 00:47:57', '2a7d544ccb742bd155e55c796de8e511', 'uploads/password_-_copy.jpeg', 'Y', '7ec27571225682036d463ea4dda842a8', '', '2019-05-01 00:35:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 'Online'),
(37, 'sweet betty', 'sweetbetty@gmail.com', '+256788229210', '2019-05-03 23:09:35', 'e549a200372db9f3fcfac9f384e4ac2d', 'uploads/fac.png', 'Y', '2023c2c26b93e7c2090ecdd44c4c844c', '', '2019-05-03 21:27:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'Offline'),
(38, 'collins', 'collins@gmail.com', '0788229210', '2019-05-03 23:15:17', '7ce38bf6811a96afd3411188577b08ee', 'uploads/fac1.png', 'Y', '6001a5f443d3ec114d103683ed2a8d5f', '', '2019-05-03 23:10:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'Offline'),
(39, 'andrew', 'andrew@gmail.com', '0788229210', '2019-05-03 23:19:50', 'd914e3ecf6cc481114a3f534a5faf90b', 'uploads/fac13.png', 'Y', '2e2d917acf7ec4793249b27be46f6412', '', '2019-05-03 23:15:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'Offline'),
(40, 'aron', 'aron@gmail.com', '0788229210', '2019-05-03 23:22:19', '9835260c7cabe24ce31b19d327596951', 'uploads/pms_logo_-_copy.png', 'Y', '389eb0c20dfd86fb9f826567299ec588', '', '2019-05-03 23:20:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `ut_id` int(5) NOT NULL,
  `ut_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`ut_id`, `ut_name`, `created_at`) VALUES
(1, 'coordinator', '2019-04-14 19:53:56'),
(2, 'supervisor', '2019-04-14 19:53:56'),
(3, 'panelist', '2019-04-14 19:55:17'),
(4, 'Lecturer', '2019-04-14 19:55:17');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`group_id`);

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
  ADD UNIQUE KEY `registration_number` (`registration_number`),
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
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_panel`
--
ALTER TABLE `tbl_panel`
  MODIFY `panel_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_projectmarks`
--
ALTER TABLE `tbl_projectmarks`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `ut_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `tbl_course_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `tbl_staff` (`staff_id`);

--
-- Constraints for table `tbl_panel`
--
ALTER TABLE `tbl_panel`
  ADD CONSTRAINT `tbl_panel_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`project_id`);

--
-- Constraints for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD CONSTRAINT `tbl_staff_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `tbl_usertype` (`ut_id`),
  ADD CONSTRAINT `tbl_staff_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Constraints for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD CONSTRAINT `tbl_task_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `tbl_user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
