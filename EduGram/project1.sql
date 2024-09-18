-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 08:46 AM
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
  `video` mediumtext NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_pic` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `like_count` int(11) NOT NULL,
  `dislike_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `q_id`, `ans`, `video`, `author_name`, `author_pic`, `date`, `like_count`, `dislike_count`) VALUES
(33, 19, 'Database normalization or database normalisation is the process of structuring a relational database in accordance with a series of so-called normal forms in order to reduce data redundancy and improve data integrity. It was first proposed by British computer scientist Edgar F. Codd as part of his relational model.', '', 'Naeem2023', 'profile.png', '2023-11-08 20:22:22', 1, 0),
(34, 19, 'Normalization is a database design technique, which is used to design a relational database table up to higher normal form', '', 'Asif', 'profile.png', '2023-11-08 20:42:23', 1, 0),
(35, 19, '', 'GR 10 sec ad (360p).mp4', 'Asif', 'profile.png', '2023-11-08 21:37:02', 1, 0),
(36, 19, 'Normalization is the process of organizing the data in the database. Normalization is used to minimize the redundancy from a relation or set of relations. It is also used to eliminate undesirable characteristics like Insertion, Update, and Deletion Anomalies. Normalization divides the larger table into smaller and links them using relationships. The normal form is used to reduce redundancy from the database table.', '', 'meher', 'images/654c00857014b_386647768_834282351407701_8953020196760960479_n.jpg', '2023-11-08 21:47:37', 1, 0);

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
(23, 'meher', 'meher.cse7.bu@gmail.com', 'images/654c00857014b_386647768_834282351407701_8953020196760960479_n.jpg', 'hi friends', '2023-11-09 13:29:12', '');

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
(19, 'What is database normalization?', 'Naeem2023', 'profile.png', '2023-11-08 20:04:14', 'Database Management');

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
(33, 'Asif', '$2y$10$N8rP9EeiYLhgsn.JzGRZ7u3YT1qgmabZykq7MEj7tC4w7OdbQ3kRG', 'Md Asif', 'saif17.bu@gmail.com', 'user', '2023-11-08 20:39:01', 'images/654bffbd3d06a_cse.png'),
(9, 'ayusht2396', '$2y$10$sN9WIHwcj5urboVA.fHZouLQM7/neAf1QOHJaYi4Mqysps3kdYgBq', 'Ayush Tripathi', 'ayusht2396@gmail.com', 'user', '2017-03-30 16:34:59', 'profile.png'),
(24, 'keto', '$2y$10$oOKEfz0LMQDEX/G9gRa4ZuOz77FmYs1r.tyQvhQGa2aT9c/55/DvG', 'Md Asif', 'd@gmail.com', 'user', '2023-11-03 19:47:19', 'profile.png'),
(34, 'meher', '$2y$10$QjtsScFrB9yn8KG9dAsXUeR0gNKQeQDhNmPuvl0BP7Q9iKlk9Kk2q', 'Meher', 'meher.cse7.bu@gmail.com', 'user', '2023-11-08 21:39:49', 'images/654c00857014b_386647768_834282351407701_8953020196760960479_n.jpg'),
(28, 'Naeem', '$2y$10$IoOaKFl.L2aQnlZdOKD0leHTv9FUb2FWdH5MukrmAAoYoyyvCs3uq', 'Naeem', 'naee6m.cse7.bu@gmail.com', 'user', '2023-11-06 13:26:00', 'images/6548f9da64d24_20200208_135553-02.png'),
(26, 'Naeem123', '$2y$10$6LFXGGzE9NEF/XCwyFTT/OlXlr6ZS6vGGM4uIRYRug6q.RwRokk7i', 'Shariful Islam', 'naee6m.cse7.bu@gmail.com', 'admin', '2023-11-06 03:46:35', 'images/6548da776cc1f_profile.png'),
(32, 'Naeem2023', '$2y$10$K6y7Rwn4vzIc3S5K7NpMfODZ.2W5.2bJNOwkws9GKXQMf1pLDN6jK', 'Naeem', 'naeem.cse7.bu@gmail.com', 'user', '2023-11-08 16:29:53', 'profile.png'),
(13, 'pjain', '$2y$10$iMvJcCrkuDaeaquwzjZZjehRFCdGrojkchTCLnJtihG6GNtviohjq', 'Prakhar Jain', 'pjain@gmail.com', 'user', '2017-03-30 17:09:07', 'profile.png'),
(29, 'Rifat', '$2y$10$qahjoAPIAQKW5Qg4K3XzEOH.yQtCEgbRbsCrKcD/.KzKNlKMouxVq', 'Rifat', 'abcd.20001417@gmail.com', 'user', '2023-11-06 13:34:39', 'images/6548f28dd31c6_SAM_5767.JPG'),
(30, 'Rifat123', '$2y$10$QTMg6xuRJ/Qi63hp9OmHGekULAKd28mUR2oSAt6rycD2fZP7Uo5V2', 'dfdf', 'abcd.20001417@gmail.com', 'user', '2023-11-07 16:11:18', 'profile.png'),
(8, 'Shivam010', '$2y$10$QWwY6YAqgf2Vx1IOIzflHeMcmwKf7h/W1a.FfRYrLxpcLkRg13Ypm', 'Shivam Rathore', 'interrogateincorporate@gmail.com', 'user', '2017-03-30 13:26:51', 'profile.png'),
(11, 'shub011', '$2y$10$eu7S5jsNaBHoI2twfrpPxOxcnUuvL0h7oGHzWH9sPPL96eNvR2QMC', 'Shubham Bairagi', 'sbv351997@gmail.com', 'user', '2017-03-30 16:43:21', 'profile.png'),
(14, 'Ujwal_1997', '$2y$10$c4TeDn9ZuFeGOLkUfrbx6u5GtKhN5EKtVrAgBztCiLaeX33.pDt76', 'Ujwal Shah', 'ujwalsaurav@gmail.com', 'user', '2017-04-02 11:31:17', 'profile.png');

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
(43, 33, 33, NULL),
(44, 34, 34, NULL),
(45, 34, 35, NULL),
(46, 34, 36, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_answer`
--

CREATE TABLE `video_answer` (
  `id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `video` mediumtext NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_pic` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `like_count` int(11) NOT NULL,
  `dislike_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_answer`
--

INSERT INTO `video_answer` (`id`, `q_id`, `video`, `author_name`, `author_pic`, `date`, `like_count`, `dislike_count`) VALUES
(4, 0, 'GR 10 sec ad (360p).mp4', '', '', '2023-11-06 05:00:59', 0, 0),
(5, 0, 'GR 10 sec ad (360p).mp4', '', '', '2023-11-06 05:01:01', 0, 0);

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
-- Indexes for table `video_answer`
--
ALTER TABLE `video_answer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `quans`
--
ALTER TABLE `quans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_interaction`
--
ALTER TABLE `user_interaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `video_answer`
--
ALTER TABLE `video_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
