-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2022 at 09:49 AM
-- Server version: 10.3.34-MariaDB-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hillqpgq_church_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant_tbl`
--

CREATE TABLE `accountant_tbl` (
  `acc_id` int(11) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `acc_img` text NOT NULL,
  `acc_role` varchar(200) NOT NULL,
  `acc_phone` varchar(255) NOT NULL,
  `acc_email` varchar(255) NOT NULL,
  `acc_address` varchar(255) NOT NULL,
  `acc_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `admin_img` text NOT NULL,
  `role` varchar(200) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `fullname`, `admin_img`, `role`, `phone_number`, `email`, `address`, `admin_username`, `admin_password`) VALUES
(1, 'Hillemunah', 'hillmunah.png', 'Secretary', '0548923457', 'admin@gmail.com', 'Sunyani', 'unlimited1', 'unlimited1');

-- --------------------------------------------------------

--
-- Table structure for table `church_info_tbl`
--

CREATE TABLE `church_info_tbl` (
  `church_id` int(11) NOT NULL,
  `church_name` varchar(255) NOT NULL,
  `church_number` varchar(255) NOT NULL,
  `church_email` varchar(255) NOT NULL,
  `church_img` text NOT NULL,
  `church_location` varchar(255) NOT NULL,
  `church_region` varchar(100) NOT NULL,
  `church_founder` varchar(255) NOT NULL,
  `church_date` date NOT NULL,
  `church_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donation_tbl`
--

CREATE TABLE `donation_tbl` (
  `donation_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_donated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donation_types`
--

CREATE TABLE `donation_types` (
  `type_id` int(11) NOT NULL,
  `type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation_types`
--

INSERT INTO `donation_types` (`type_id`, `type_name`) VALUES
(5, 'Stage Backdrop'),
(6, 'Harvest 2021');

-- --------------------------------------------------------

--
-- Table structure for table `events_tbl`
--

CREATE TABLE `events_tbl` (
  `event_id` int(11) NOT NULL,
  `organized_by` varchar(300) NOT NULL,
  `event_name` varchar(500) NOT NULL,
  `event_banner` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_desc` text NOT NULL,
  `approval_status` varchar(100) NOT NULL,
  `event_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expense_cat`
--

CREATE TABLE `expense_cat` (
  `expense_cat_id` int(11) NOT NULL,
  `expense_cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_dues`
--

CREATE TABLE `group_dues` (
  `gdues_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `dues_month` varchar(50) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_tbl`
--

CREATE TABLE `group_tbl` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_photo` varchar(255) NOT NULL,
  `group_email` varchar(100) NOT NULL,
  `group_number` varchar(100) NOT NULL,
  `group_date` date NOT NULL,
  `dept_prez` varchar(200) NOT NULL,
  `dept_veep` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_tbl`
--

INSERT INTO `group_tbl` (`group_id`, `group_name`, `group_photo`, `group_email`, `group_number`, `group_date`, `dept_prez`, `dept_veep`, `username`, `password`) VALUES
(4, 'Tabernacle Hill Worshipers', 'IMG_3147.jpg', '', '0554392324', '2018-02-18', '', '', 'Tabernacle Hill Worshipers', 'Barracks'),
(5, 'Gussoni Sarpong Celino', 'IMG-20211106-WA0002.jpg', 'usheringdepartment79@gmail.com', '+233248492598', '2018-02-18', 'Evans Takyi ', 'Gussoni Celino Sarpong ', 'Ushering Department', 'com12345@'),
(6, 'Media Department', 'IMG_1102.jpg', '', '0554392324', '2018-02-18', '', '', 'Media Department', 'Barracks');

-- --------------------------------------------------------

--
-- Table structure for table `income_cat`
--

CREATE TABLE `income_cat` (
  `income_cat_id` int(11) NOT NULL,
  `income_cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `income_tbl`
--

CREATE TABLE `income_tbl` (
  `income_id` int(11) NOT NULL,
  `income_cat_id` int(11) NOT NULL,
  `income_amt` decimal(10,2) NOT NULL,
  `income_tax` decimal(10,2) NOT NULL,
  `income_type` varchar(255) NOT NULL,
  `income_account` varchar(255) NOT NULL,
  `income_desc` text NOT NULL,
  `income_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `main_offertory`
--

CREATE TABLE `main_offertory` (
  `offertory_id` int(11) NOT NULL,
  `offertory_amt` decimal(12,2) NOT NULL,
  `offertory_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members_tbl`
--

CREATE TABLE `members_tbl` (
  `member_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `ministry_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_photo` varchar(200) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_phone` varchar(255) NOT NULL,
  `location` varchar(200) NOT NULL,
  `member_gender` varchar(255) NOT NULL,
  `marital_status` varchar(300) NOT NULL,
  `volunteer` varchar(300) NOT NULL,
  `dob` date NOT NULL,
  `date_added` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members_tbl`
--

INSERT INTO `members_tbl` (`member_id`, `group_id`, `ministry_id`, `member_name`, `member_photo`, `member_email`, `member_phone`, `location`, `member_gender`, `marital_status`, `volunteer`, `dob`, `date_added`, `username`, `password`) VALUES
(14, 5, 0, 'Bro Evans', 'IMG_0335.jpg', '', '0248492598', 'Odumasi', 'Male', 'Female', 'No', '1997-05-25', '2021-11-28', 'admin', 'Barracks'),
(15, 7, 5, 'Name', 'B387B070-791C-4E18-A7AD-B564E56B0AD9.png', 'testing@gmail.com', '0548383&4', 'Testing', 'Male', 'Female', 'Yes', '2021-11-28', '2021-11-28', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `ministries_dues`
--

CREATE TABLE `ministries_dues` (
  `dues_id` int(11) NOT NULL,
  `ministry_name` varchar(255) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `dues_month` varchar(50) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ministry_tbl`
--

CREATE TABLE `ministry_tbl` (
  `ministry_id` int(11) NOT NULL,
  `ministry_name` varchar(300) NOT NULL,
  `ministry_photo` varchar(200) NOT NULL,
  `ministry_email` varchar(255) NOT NULL,
  `ministry_number` varchar(100) NOT NULL,
  `ministry_date` date NOT NULL,
  `ministry_prez` varchar(120) NOT NULL,
  `ministry_veep` varchar(120) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ministry_tbl`
--

INSERT INTO `ministry_tbl` (`ministry_id`, `ministry_name`, `ministry_photo`, `ministry_email`, `ministry_number`, `ministry_date`, `ministry_prez`, `ministry_veep`, `username`, `password`) VALUES
(5, 'Min One', '5987E381-2752-4657-AF59-4A6B7EDD4F17.jpeg', 'Min@gmail.com', '0540237485', '2021-11-28', '', '', 'min', 'min');

-- --------------------------------------------------------

--
-- Table structure for table `pastors_tbl`
--

CREATE TABLE `pastors_tbl` (
  `pastor_id` int(11) NOT NULL,
  `pastor_name` varchar(255) NOT NULL,
  `pastor_address` varchar(255) NOT NULL,
  `pastor_location` varchar(255) NOT NULL,
  `session_date` date NOT NULL,
  `session_time` time NOT NULL,
  `session_hrs` varchar(255) NOT NULL,
  `pastor_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pledges_tbl`
--

CREATE TABLE `pledges_tbl` (
  `pledge_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `pledge_amt` decimal(10,2) NOT NULL,
  `pledge_status` varchar(200) NOT NULL,
  `pledge_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pledges_tbl`
--

INSERT INTO `pledges_tbl` (`pledge_id`, `member_name`, `phone_number`, `address`, `start_date`, `end_date`, `pledge_amt`, `pledge_status`, `pledge_desc`) VALUES
(7, 'Asante Peter ', '+233 56 009 1638', 'Odomase ', '2021-11-26', '2021-11-28', 100.00, 'Fulfilled', 'Pledge of backdrop '),
(8, 'Abigail Gyau', '+233 54 608 6648', 'Odomase ', '2021-11-26', '2021-11-28', 200.00, 'Fulfilled', 'Pledge of Backdrop ');

-- --------------------------------------------------------

--
-- Table structure for table `room_request`
--

CREATE TABLE `room_request` (
  `room_req_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `request_purpose` text NOT NULL,
  `date_needed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_tbl`
--

CREATE TABLE `room_tbl` (
  `room_id` int(11) NOT NULL,
  `room_title` varchar(255) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `room_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sermon_tbl`
--

CREATE TABLE `sermon_tbl` (
  `sermon_id` int(11) NOT NULL,
  `sermon_name` varchar(255) NOT NULL,
  `sermon_by` varchar(200) NOT NULL,
  `sermon_file` text NOT NULL,
  `sermon_type` varchar(255) NOT NULL,
  `sermon_desc` text NOT NULL,
  `sermon_status` varchar(255) NOT NULL,
  `sermon_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_tbl`
--

CREATE TABLE `service_tbl` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_by` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `service_day` varchar(200) NOT NULL,
  `service_date` date NOT NULL,
  `service_time` time NOT NULL,
  `approval_status` varchar(100) NOT NULL,
  `service_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `spiritual_gift_tbl`
--

CREATE TABLE `spiritual_gift_tbl` (
  `gift_id` int(11) NOT NULL,
  `gift_name` varchar(255) NOT NULL,
  `gift_price` decimal(10,2) NOT NULL,
  `gift_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spiritual_gift_tbl`
--

INSERT INTO `spiritual_gift_tbl` (`gift_id`, `gift_name`, `gift_price`, `gift_desc`) VALUES
(4, 'Microphone ', 100.00, 'Daddy added an amount of money to the 100 to purchase microphone to a certain church');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_mail`
--

CREATE TABLE `tbl_admin_mail` (
  `admin_mail_id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `receiver_name` varchar(150) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `mail_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_draft`
--

CREATE TABLE `tbl_draft` (
  `draft_id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `receiver_name` varchar(200) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `mail_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `expense_id` int(11) NOT NULL,
  `expense_cat_id` int(11) NOT NULL,
  `expense_amount` decimal(10,2) NOT NULL,
  `expense_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `message_id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `receiver_name` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `mail_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailbox`
--

CREATE TABLE `tbl_mailbox` (
  `mailbox_id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `receiver_name` varchar(150) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `mail_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members_draft`
--

CREATE TABLE `tbl_members_draft` (
  `member_draft_id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `draft_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members_sentbox`
--

CREATE TABLE `tbl_members_sentbox` (
  `mem_sent_id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `receiver_name` varchar(150) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `mail_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_out_blessing`
--

CREATE TABLE `tbl_out_blessing` (
  `out_blessing_id` int(11) NOT NULL,
  `blessing_name` varchar(255) NOT NULL,
  `blessing_type` varchar(200) NOT NULL,
  `presents` varchar(500) NOT NULL,
  `blessing_to` varchar(200) NOT NULL,
  `blessing_location` varchar(200) NOT NULL,
  `blessing_date` date NOT NULL,
  `blessing_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `request_id` int(11) NOT NULL,
  `request_name` varchar(100) NOT NULL,
  `request_from` varchar(100) NOT NULL,
  `request_purpose` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `venue_request`
--

CREATE TABLE `venue_request` (
  `v_req_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `venue_name` varchar(11) NOT NULL,
  `venue_cap` varchar(100) NOT NULL,
  `venue_loc` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `purpose` text NOT NULL,
  `date_needed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `venue_tbl`
--

CREATE TABLE `venue_tbl` (
  `venue_id` int(11) NOT NULL,
  `venue_name` varchar(255) NOT NULL,
  `venue_capacity` int(20) NOT NULL,
  `venue_location` varchar(255) NOT NULL,
  `venue_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant_tbl`
--
ALTER TABLE `accountant_tbl`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `church_info_tbl`
--
ALTER TABLE `church_info_tbl`
  ADD PRIMARY KEY (`church_id`);

--
-- Indexes for table `donation_tbl`
--
ALTER TABLE `donation_tbl`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `donation_types`
--
ALTER TABLE `donation_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `events_tbl`
--
ALTER TABLE `events_tbl`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `expense_cat`
--
ALTER TABLE `expense_cat`
  ADD PRIMARY KEY (`expense_cat_id`);

--
-- Indexes for table `group_dues`
--
ALTER TABLE `group_dues`
  ADD PRIMARY KEY (`gdues_id`);

--
-- Indexes for table `group_tbl`
--
ALTER TABLE `group_tbl`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `income_cat`
--
ALTER TABLE `income_cat`
  ADD PRIMARY KEY (`income_cat_id`);

--
-- Indexes for table `income_tbl`
--
ALTER TABLE `income_tbl`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `main_offertory`
--
ALTER TABLE `main_offertory`
  ADD PRIMARY KEY (`offertory_id`);

--
-- Indexes for table `members_tbl`
--
ALTER TABLE `members_tbl`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `ministries_dues`
--
ALTER TABLE `ministries_dues`
  ADD PRIMARY KEY (`dues_id`),
  ADD UNIQUE KEY `ministry_name` (`ministry_name`);

--
-- Indexes for table `ministry_tbl`
--
ALTER TABLE `ministry_tbl`
  ADD PRIMARY KEY (`ministry_id`);

--
-- Indexes for table `pastors_tbl`
--
ALTER TABLE `pastors_tbl`
  ADD PRIMARY KEY (`pastor_id`);

--
-- Indexes for table `pledges_tbl`
--
ALTER TABLE `pledges_tbl`
  ADD PRIMARY KEY (`pledge_id`);

--
-- Indexes for table `room_request`
--
ALTER TABLE `room_request`
  ADD PRIMARY KEY (`room_req_id`);

--
-- Indexes for table `room_tbl`
--
ALTER TABLE `room_tbl`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `sermon_tbl`
--
ALTER TABLE `sermon_tbl`
  ADD PRIMARY KEY (`sermon_id`);

--
-- Indexes for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `spiritual_gift_tbl`
--
ALTER TABLE `spiritual_gift_tbl`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `tbl_admin_mail`
--
ALTER TABLE `tbl_admin_mail`
  ADD PRIMARY KEY (`admin_mail_id`),
  ADD UNIQUE KEY `sender_name` (`sender_name`);

--
-- Indexes for table `tbl_draft`
--
ALTER TABLE `tbl_draft`
  ADD PRIMARY KEY (`draft_id`),
  ADD UNIQUE KEY `sender_name` (`sender_name`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`message_id`),
  ADD UNIQUE KEY `sender_name` (`sender_name`);

--
-- Indexes for table `tbl_mailbox`
--
ALTER TABLE `tbl_mailbox`
  ADD PRIMARY KEY (`mailbox_id`),
  ADD UNIQUE KEY `sender_name` (`sender_name`);

--
-- Indexes for table `tbl_members_draft`
--
ALTER TABLE `tbl_members_draft`
  ADD PRIMARY KEY (`member_draft_id`),
  ADD UNIQUE KEY `member_draft_id` (`member_draft_id`),
  ADD UNIQUE KEY `sender_name` (`sender_name`);

--
-- Indexes for table `tbl_members_sentbox`
--
ALTER TABLE `tbl_members_sentbox`
  ADD PRIMARY KEY (`mem_sent_id`);

--
-- Indexes for table `tbl_out_blessing`
--
ALTER TABLE `tbl_out_blessing`
  ADD PRIMARY KEY (`out_blessing_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `venue_request`
--
ALTER TABLE `venue_request`
  ADD PRIMARY KEY (`v_req_id`);

--
-- Indexes for table `venue_tbl`
--
ALTER TABLE `venue_tbl`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant_tbl`
--
ALTER TABLE `accountant_tbl`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `church_info_tbl`
--
ALTER TABLE `church_info_tbl`
  MODIFY `church_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donation_tbl`
--
ALTER TABLE `donation_tbl`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donation_types`
--
ALTER TABLE `donation_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events_tbl`
--
ALTER TABLE `events_tbl`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expense_cat`
--
ALTER TABLE `expense_cat`
  MODIFY `expense_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_dues`
--
ALTER TABLE `group_dues`
  MODIFY `gdues_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_tbl`
--
ALTER TABLE `group_tbl`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `income_cat`
--
ALTER TABLE `income_cat`
  MODIFY `income_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `income_tbl`
--
ALTER TABLE `income_tbl`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `main_offertory`
--
ALTER TABLE `main_offertory`
  MODIFY `offertory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members_tbl`
--
ALTER TABLE `members_tbl`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ministries_dues`
--
ALTER TABLE `ministries_dues`
  MODIFY `dues_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ministry_tbl`
--
ALTER TABLE `ministry_tbl`
  MODIFY `ministry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pastors_tbl`
--
ALTER TABLE `pastors_tbl`
  MODIFY `pastor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pledges_tbl`
--
ALTER TABLE `pledges_tbl`
  MODIFY `pledge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room_request`
--
ALTER TABLE `room_request`
  MODIFY `room_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_tbl`
--
ALTER TABLE `room_tbl`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sermon_tbl`
--
ALTER TABLE `sermon_tbl`
  MODIFY `sermon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_tbl`
--
ALTER TABLE `service_tbl`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spiritual_gift_tbl`
--
ALTER TABLE `spiritual_gift_tbl`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin_mail`
--
ALTER TABLE `tbl_admin_mail`
  MODIFY `admin_mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_draft`
--
ALTER TABLE `tbl_draft`
  MODIFY `draft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_mailbox`
--
ALTER TABLE `tbl_mailbox`
  MODIFY `mailbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_members_sentbox`
--
ALTER TABLE `tbl_members_sentbox`
  MODIFY `mem_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_out_blessing`
--
ALTER TABLE `tbl_out_blessing`
  MODIFY `out_blessing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venue_request`
--
ALTER TABLE `venue_request`
  MODIFY `v_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venue_tbl`
--
ALTER TABLE `venue_tbl`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
