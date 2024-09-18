-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 08:19 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `ans` mediumtext NOT NULL,
  `media` mediumtext NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_pic` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `like_count` int(11) NOT NULL,
  `dislike_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `q_id`, `ans`, `media`, `author_name`, `author_pic`, `date`, `like_count`, `dislike_count`) VALUES
(50, 30, 'Java is a multi-platform, object-oriented, and network-centric language that can be used as a platform in itself. It is a fast, secure, reliable programming language for coding everything from mobile apps and enterprise software to big data applications and server-side technologies.', '', 'rony', 'images/6553aa0a2ce74_rony.png', '2023-11-14 17:39:49', 0, 0),
(51, 36, 'C is a structural or procedural programming language that was used for system applications and low-level programming applications. Whereas C++ is an object-oriented programming language having some additional features like Encapsulation, Data Hiding, Data Abstraction, Inheritance, Polymorphism, etc.', 'Screenshot 2023-11-14 234339.png', 'rony', 'images/6553aa0a2ce74_rony.png', '2023-11-14 17:44:12', 3, 0),
(52, 35, 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by the PHP Group.', '', 'rony', 'images/6553aa0a2ce74_rony.png', '2023-11-14 17:46:04', 1, 1),
(53, 35, 'For Learn better visit this website:  \r\nhttps://www.w3schools.com/php/php_intro.asp\r\n', 'Screenshot 2023-11-14 234633.png', 'rony', 'images/6553aa0a2ce74_rony.png', '2023-11-14 17:47:56', 0, 0),
(54, 34, 'The Firebase Realtime Database is a cloud-hosted NoSQL database that lets you store and sync data between your users in realtime.', 'Screenshot 2023-11-14 235101.png', 'rony', 'images/6553aa0a2ce74_rony.png', '2023-11-14 17:51:34', 1, 0),
(55, 33, 'The database is a collection of inter-related data which is used to retrieve, insert and delete the data efficiently. It is also used to organize the data in the form of a table, schema, views, and reports, etc.\r\n\r\nFor example: The college Database organizes the data about the admin, staff, students and faculty etc.\r\n\r\nUsing the database, you can easily retrieve, insert, and delete the information.', '', 'rony', 'images/6553aa0a2ce74_rony.png', '2023-11-14 17:54:04', 1, 0),
(56, 32, 'Merge Sort is a recursive algorithm and time complexity can be expressed as following recurrence relation. T(n) = 2T(n/2) + O(n) The solution of the above recurrence is O(nLogn).', '', 'rony', 'images/6553aa0a2ce74_rony.png', '2023-11-14 17:54:53', 0, 0),
(58, 36, 'What is the main difference between C and C++?\r\nThe main difference between C and C++ is that C is function-driven procedural language with no support for objects and classes, whereas C++ is a combination of procedural and object-oriented programming languages.', '', 'meher', 'images/6553aa37dd4b7_meher.png', '2023-11-14 18:15:09', 1, 0),
(59, 36, '', '20150302.pdf', 'meher', 'images/6553aa37dd4b7_meher.png', '2023-11-14 18:56:08', 0, 0),
(60, 35, '', '', 'naeem', 'images/6555bd5ebbdf5_Screenshot 2023-11-16 125638.png', '2023-11-16 17:31:59', 0, 0),
(61, 36, '', 'MPO-Forms-(school).pdf', 'naeem', 'images/6555bd5ebbdf5_Screenshot 2023-11-16 125638.png', '2023-11-16 17:39:13', 0, 0),
(62, 35, '', '10 second intro music.mp4', 'naeem', 'images/6555bd5ebbdf5_Screenshot 2023-11-16 125638.png', '2023-11-16 17:39:52', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Algorithms', 'An algorithm is a self-contained sequence of actions to be performed. Algorithms can perform calculation, data processing and automated reasoning tasks.An algorithm is an effective method that can be expressed within a finite amount of space and time and in a well-defined formal language for calculating a function.<br>There are various algorithm design paradigm like Brute-Force approach, Divide and conquer approach, Linear programming, Dynamic programming, The greedy method and so on...'),
(2, 'Architecture', 'In computer engineering, computer architecture is a set of rules and methods that describe the functionality, organization, and implementation of computer systems. Some definitions of architecture define it as describing the capabilities and programming model of a computer but not a particular implementation. In other definitions computer architecture involves instruction set architecture design, microarchitecture design, logic design, and implementation.<br>The purpose of computer architecture is to design a computer that maximizes performance while keeping power consumption in check, costs low relative to the amount of expected performance, and is also very reliable. For this, many aspects are to be considered which includes Instruction Set Design, Functional Organization, Logic Design, and Implementation.'),
(3, 'Theory Of Computation', 'In theoretical computer science and mathematics, the theory of computation is the branch that deals with how efficiently problems can be solved on a model of computation, using an algorithm. The field is divided into three major branches: automata theory and language, computability theory, and computational complexity theory, which are linked by the question: \"What are the fundamental capabilities and limitations of computers?\".<br>In order to perform a rigorous study of computation, computer scientists work with a mathematical abstraction of computers called a model of computation. There are several models in use, but the most commonly examined is the Turing machine.'),
(4, 'Database Management', 'A Database Management System (DBMS) is a computer program (or more typically, a suite of them) designed to manage a database, a large set of structured data, and run operations on the data requested by numerous users. Typical examples of DBMS use include accounting, human resources and customer support systems.<br>Originally found only in large companies with the computer hardware needed to support large data sets, DBMSs have more recently emerged as a fairly standard part of any company back office.'),
(5, 'Probability &amp; Queuing', 'Probability is the measure of the likelihood that an event will occur. Probability is quantified as a number between 0 and 1 (where 0 indicates impossibility and 1 indicates certainty). The higher the probability of an event, the more certain that the event will occur.<br>Queueing theory is the mathematical study of waiting lines, or queues. In queueing theory, a model is constructed so that queue lengths and waiting time can be predicted. Queueing theory is generally considered a branch of operations research because the results are often used when making business decisions about the resources needed to provide a service.'),
(6, 'Software Engineering', 'Software engineering (SWE) is the application of engineering to the development of software in a systematic method. Typically, Software engineering is Research, design, develop, and test operating systems-level software, compilers, and network distribution software for medical, industrial, military, communications, aerospace, business, scientific, and general computing applications, and is an an engineering discipline that is concerned with all aspects of software production.<br>Software engineering is a direct sub-field of engineering and has an overlap with computer science and management science. It is also considered a part of overall systems engineering.'),
(7, 'Other', 'Any Other Category...');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `image` varchar(245) NOT NULL,
  `message` varchar(300) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `cat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `image`, `message`, `time`, `cat`) VALUES
(40, 'mehedi', 'mehdi.cse7.bu@gmail.com', 'images/6553aa7f5f493_mehedi.png', 'hi friends', '2023-11-16 12:52:14', 'programming'),
(41, 'nayem', 'nayem.cse7.bu@gmail.com', 'images/6553aaff8b708_nayem.png', 'hello!  how are u?', '2023-11-16 12:53:10', 'programming'),
(42, 'naeem', 'naeem.cse7.bu@gmail.com', 'images/6555bd5ebbdf5_Screenshot 2023-11-16 125638.png', 'Fine friends', '2023-11-16 23:30:49', 'programming');

-- --------------------------------------------------------

--
-- Table structure for table `quacat`
--

CREATE TABLE `quacat` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quans`
--

CREATE TABLE `quans` (
  `id` int(11) UNSIGNED NOT NULL,
  `question` mediumtext NOT NULL,
  `answer` longtext DEFAULT NULL,
  `askedby` varchar(255) NOT NULL,
  `answeredby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `qus` varchar(10000) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_pic` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `cat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `qus`, `author_name`, `author_pic`, `time`, `cat`) VALUES
(30, 'What is java?', 'abhi', 'images/6553a9c6e301e_abhi.png', '2023-11-14 17:17:52', 'programming'),
(31, 'What is TLB?', 'abhi', 'images/6553a9c6e301e_abhi.png', '2023-11-14 17:18:46', 'Architecture'),
(32, 'What is time complexity of marge sort?', 'abhi', 'images/6553a9c6e301e_abhi.png', '2023-11-14 17:19:15', 'programming'),
(33, 'What is DBMS?', 'abhi', 'images/6553a9c6e301e_abhi.png', '2023-11-14 17:19:56', 'Devlopment'),
(34, 'What is firebase database?', 'abhi', 'images/6553a9c6e301e_abhi.png', '2023-11-14 17:20:18', 'Devlopment'),
(35, 'What is PHP?', 'mehedi', 'images/6553aa7f5f493_mehedi.png', '2023-11-14 17:21:07', 'Devlopment'),
(36, 'what is different between C and C++?', 'mehedi', 'images/6553aa7f5f493_mehedi.png', '2023-11-14 17:22:11', 'programming'),
(37, 'What are the main components of a computer system?', 'abhi', 'images/6553a9c6e301e_abhi.png', '2023-11-18 16:02:25', 'Architecture'),
(39, 'What is the full form of SDLC? Why is it used?', 'abhi', 'images/6553a9c6e301e_abhi.png', '2023-11-18 16:48:22', 'Software-Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `join_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(100) NOT NULL DEFAULT 'profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `role`, `join_date`, `image_path`) VALUES
(39, 'abhi', '$2y$10$t7GE5kgVpuAypnn.hz4paeVc8uR18/i8NeTXkwRyrt.G22WPRUQey', 'MD. Saifuzzaman Abhi', 'abhi.cse7.bu@gmail.com', 'user', '2023-11-14 17:08:15', 'images/6553a9c6e301e_abhi.png'),
(50, 'admin', '$2y$10$qolhKQxSOHdOVcr0t4iIB.NY.dCV5tCu74O0qyjmX1KxiOrC/IeeC', 'admin', 'admin@gmail.com', 'admin', '2023-11-19 07:00:08', 'profile.png'),
(51, 'Hafsa', '$2y$10$IPyD4ALiXGVMw3.JXP7TJuNpEKY/q3GJ6GPW579P4Qm8b1Ok7elzC', 'Hafsa Rashid', 'hafsa.cse7.bu@gmail.com', 'user', '2023-11-19 07:16:52', 'profile.png'),
(42, 'mehedi', '$2y$10$qxkg13d2YPjtdh0pgUPSC.nt20MHu0Pl89pkNd8xJISmNsdKN8hs.', 'Md mehedi', 'mehdi.cse7.bu@gmail.com', 'user', '2023-11-14 17:12:10', 'images/6553aa7f5f493_mehedi.png'),
(41, 'meher', '$2y$10$tIRSSfwIOWUWOu6zfH61Qu.mvtLn1M0v9MVplRcfDHu83ZdLKSYYO', 'Md meher', 'meher.cse7.bu@gmail.com', 'user', '2023-11-14 17:10:59', 'images/6553aa37dd4b7_meher.png'),
(45, 'naeem', '$2y$10$q8.KW87DC4Pg0qJ/6VKUmO/MVvIzyldZfemxi6n8TrGb7Yu.f925a', 'Arefin Naeem', 'naeem.cse7.bu@gmail.com', 'user', '2023-11-14 17:16:42', 'images/6555bd5ebbdf5_Screenshot 2023-11-16 125638.png'),
(44, 'nayem', '$2y$10$CuQ1kmptsNkmlDtL9ZMa5.A4EG91dO7AMkj1zfAOBz.ml6i9RHI86', 'Md nayem', 'nayem.cse7.bu@gmail.com', 'user', '2023-11-14 17:14:04', 'images/6553aaff8b708_nayem.png'),
(40, 'rony', '$2y$10$UTEYLclML1v2zZuKItTbtutd3DAPBAgw0iGISo7hra2ZNVQoa/AWC', 'Md Rony', 'rony.cse7.bu@gmail.com', 'user', '2023-11-14 17:10:15', 'images/6553aa0a2ce74_rony.png'),
(43, 'shakil', '$2y$10$hcOga2ppDfLZ8nitxfgTY.QR/Q6QZzRyvnLeU1qTgmvVdBx9JIvDq', 'Md shakil', 'shakil.cse7.bu@gmail.com', 'user', '2023-11-14 17:12:59', 'images/6553aaad27d33_shakil.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_interaction`
--

CREATE TABLE `user_interaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `interaction_type` enum('like','dislike') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_interaction`
--

INSERT INTO `user_interaction` (`id`, `user_id`, `answer_id`, `interaction_type`) VALUES
(52, 41, 51, NULL),
(53, 41, 58, NULL),
(55, 41, 54, NULL),
(56, 41, 55, NULL),
(57, 45, 51, NULL),
(58, 45, 52, NULL),
(59, 39, 52, NULL),
(60, 51, 51, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`,`name`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quacat`
--
ALTER TABLE `quacat`
  ADD PRIMARY KEY (`category`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `quans`
--
ALTER TABLE `quans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `askedby` (`askedby`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_interaction`
--
ALTER TABLE `user_interaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_answer_unique` (`user_id`,`answer_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `quans`
--
ALTER TABLE `quans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_interaction`
--
ALTER TABLE `user_interaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quacat`
--
ALTER TABLE `quacat`
  ADD CONSTRAINT `quacat_ibfk_1` FOREIGN KEY (`id`) REFERENCES `quans` (`id`),
  ADD CONSTRAINT `quacat_ibfk_3` FOREIGN KEY (`category`) REFERENCES `category` (`name`);

--
-- Constraints for table `quans`
--
ALTER TABLE `quans`
  ADD CONSTRAINT `quans_ibfk_1` FOREIGN KEY (`askedby`) REFERENCES `users` (`username`);

--
-- Constraints for table `user_interaction`
--
ALTER TABLE `user_interaction`
  ADD CONSTRAINT `user_interaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_interaction_ibfk_2` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
