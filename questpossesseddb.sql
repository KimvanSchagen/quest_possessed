-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 18, 2024 at 03:56 PM
-- Server version: 11.1.2-MariaDB-1:11.1.2+maria~ubu2204
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questpossesseddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `quests`
--

CREATE TABLE `quests` (
                          `quest_id` int(11) NOT NULL,
                          `name` varchar(255) NOT NULL,
                          `description` text DEFAULT NULL,
                          `creator_id` int(11) DEFAULT NULL,
                          `created_at` timestamp NULL DEFAULT current_timestamp(),
                          `public` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quests`
--

INSERT INTO `quests` (`quest_id`, `name`, `description`, `creator_id`, `created_at`, `public`) VALUES
                                                                                                   (13, 'Organize a Picnic', 'Plan and organize a fun picnic outing.', 4, '2024-12-17 00:12:43', 0),
                                                                                                   (14, 'Set Up a Personal Journal', 'Create and set up your own personal journal.', 2, '2024-12-17 00:12:43', 0),
                                                                                                   (15, 'Clean and Declutter the Room', 'Organize and clean up a cluttered room.', 3, '2024-12-17 00:12:43', 0),
                                                                                                   (16, 'Plan a Weekend Trip', 'Research and organize a weekend getaway trip.', 4, '2024-12-17 00:12:43', 0),
                                                                                                   (17, 'Prepare for a Job Interview', 'Get ready for an important job interview.', 5, '2024-12-17 00:12:43', 0),
                                                                                                   (18, 'Host a Dinner Party', 'Plan and host a dinner party for friends or family.', 5, '2024-12-17 00:12:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
                          `stage_id` int(11) NOT NULL,
                          `quest_id` int(11) DEFAULT NULL,
                          `name` varchar(255) NOT NULL,
                          `description` text DEFAULT NULL,
                          `achievement_points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`stage_id`, `quest_id`, `name`, `description`, `achievement_points`) VALUES
                                                                                               (25, 13, 'Stage 1: Choose a Location', 'Decide where to have the picnic.', 10),
                                                                                               (26, 13, 'Stage 2: Pack Picnic Essentials', 'Prepare the food, drinks, and picnic supplies.', 20),
                                                                                               (27, 13, 'Stage 3: Invite Friends', 'Send invitations to friends for the picnic.', 15),
                                                                                               (28, 13, 'Stage 4: Set Up the Picnic Area', 'Arrive at the location and set up the picnic.', 25),
                                                                                               (29, 14, 'Stage 1: Choose a Journal Type', 'Decide whether to use a digital or physical journal.', 5),
                                                                                               (30, 14, 'Stage 2: Design Your Journal', 'Create sections or categories for your journal.', 10),
                                                                                               (31, 14, 'Stage 3: Gather Supplies', 'Get the materials needed for your journal.', 15),
                                                                                               (32, 14, 'Stage 4: Start Journaling', 'Write your first entry in the journal.', 20),
                                                                                               (33, 15, 'Stage 1: Declutter the Space', 'Clear out unnecessary items from the room.', 15),
                                                                                               (34, 15, 'Stage 2: Organize by Category', 'Sort items into categories for easier organization.', 20),
                                                                                               (35, 15, 'Stage 3: Clean the Room', 'Sweep, mop, and clean surfaces in the room.', 25),
                                                                                               (36, 15, 'Stage 4: Decorate the Room', 'Add some decorative elements to the room.', 30),
                                                                                               (37, 16, 'Stage 1: Research Destinations', 'Find some interesting places to visit.', 10),
                                                                                               (38, 16, 'Stage 2: Choose Accommodations', 'Book a place to stay for the trip.', 20),
                                                                                               (39, 16, 'Stage 3: Pack for the Trip', 'Prepare your bags with everything you need for the weekend.', 15),
                                                                                               (40, 16, 'Stage 4: Set Travel Plans', 'Finalized your transportation and trip itinerary.', 25),
                                                                                               (41, 17, 'Stage 1: Research the Company', 'Look up the company and its values.', 15),
                                                                                               (42, 17, 'Stage 2: Prepare Your Resume', 'Ensure your resume is updated and tailored to the job.', 25),
                                                                                               (43, 17, 'Stage 3: Practice Interview Questions', 'Rehearse common interview questions and answers.', 30),
                                                                                               (44, 17, 'Stage 4: Dress for Success', 'Choose an appropriate outfit for the interview.', 20),
                                                                                               (45, 18, 'Stage 1: Choose a Menu', 'Decide on the dishes to serve at the dinner party.', 10),
                                                                                               (46, 18, 'Stage 2: Shop for Ingredients', 'Buy the necessary ingredients for the dinner.', 15),
                                                                                               (47, 18, 'Stage 3: Set the Table', 'Arrange the table and set it for guests.', 20),
                                                                                               (48, 18, 'Stage 4: Cook and Serve', 'Prepare the meal and serve your guests.', 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `username` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `permissions` tinyint(1) NOT NULL DEFAULT 0,
                         `date_created` datetime NOT NULL DEFAULT current_timestamp(),
                         `level` int(11) NOT NULL DEFAULT 1,
                         `current_points` int(11) NOT NULL DEFAULT 0,
                         `profile_picture` varchar(255) NOT NULL DEFAULT '/assets/img/profile_picture_1.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `permissions`, `date_created`, `level`, `current_points`, `profile_picture`) VALUES
                                                                                                                                             (2, 'kim', 'kimvanschagen135@gmail.com', '$2y$10$ld7rvlgb1oQSUjp7N2nDHudNXK76NZ3AEEiRfL72Sva85EbdXTK.e', 0, '2024-12-16 21:50:32', 1, 0, '/assets/img/profile_picture_1.png'),
                                                                                                                                             (3, 'Alice', 'alice@example.com', '$2y$10$G0E7eyGlPoKY3layuUe1huDy/p6qubYPZZz8znfNUrYd5GG7ugNAK', 1, '2024-12-17 00:08:01', 1, 0, '/assets/img/profile_picture_1.png'),
                                                                                                                                             (4, 'Bob', 'bob@example.com', '$2y$10$G9VhHNMnV1ONez41lbpgXesdNhD9oaVvTdsZLEoYxp4uR54/RxOE2', 0, '2024-12-17 00:08:38', 1, 0, '/assets/img/profile_picture_1.png'),
                                                                                                                                             (5, 'carol', 'carol@example.com', '$2y$10$xLpndMnqYpIN5iSG/cSvz.SpJlPF9iBGWM12Y63KkfiYohW/EI7Ry', 0, '2024-12-17 00:09:02', 1, 0, '/assets/img/profile_picture_1.png'),
                                                                                                                                             (6, 'Dave', 'dave@example.com', '$2y$10$jXk/q4oKp5s2dKbuJDzIeeur3iW.iHoMMzkngzZYlPPYl1GbaaWxq', 0, '2024-12-17 00:09:38', 1, 0, '/assets/img/profile_picture_1.png'),
                                                                                                                                             (7, 'Eve', 'eve@example.com', '$2y$10$dH3haQfUG5IfI7M2mfSJo.wWZfJDzbeEYIv2zDOhaWPMAYe81XYda', 0, '2024-12-17 00:10:01', 1, 0, '/assets/img/profile_picture_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_quest_completion`
--

CREATE TABLE `user_quest_completion` (
                                         `completion_id` int(11) NOT NULL,
                                         `user_id` int(11) DEFAULT NULL,
                                         `quest_id` int(11) DEFAULT NULL,
                                         `completed_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_quest_progress`
--

CREATE TABLE `user_quest_progress` (
                                       `progress_id` int(11) NOT NULL,
                                       `user_id` int(11) DEFAULT NULL,
                                       `quest_id` int(11) DEFAULT NULL,
                                       `current_stage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quests`
--
ALTER TABLE `quests`
    ADD PRIMARY KEY (`quest_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
    ADD PRIMARY KEY (`stage_id`),
  ADD KEY `quest_id` (`quest_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_quest_completion`
--
ALTER TABLE `user_quest_completion`
    ADD PRIMARY KEY (`completion_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `quest_id` (`quest_id`);

--
-- Indexes for table `user_quest_progress`
--
ALTER TABLE `user_quest_progress`
    ADD PRIMARY KEY (`progress_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `quest_id` (`quest_id`),
  ADD KEY `current_stage_id` (`current_stage_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quests`
--
ALTER TABLE `quests`
    MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
    MODIFY `stage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_quest_completion`
--
ALTER TABLE `user_quest_completion`
    MODIFY `completion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_quest_progress`
--
ALTER TABLE `user_quest_progress`
    MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quests`
--
ALTER TABLE `quests`
    ADD CONSTRAINT `quests_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `stages`
--
ALTER TABLE `stages`
    ADD CONSTRAINT `stages_ibfk_1` FOREIGN KEY (`quest_id`) REFERENCES `quests` (`quest_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_quest_completion`
--
ALTER TABLE `user_quest_completion`
    ADD CONSTRAINT `user_quest_completion_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_quest_completion_ibfk_2` FOREIGN KEY (`quest_id`) REFERENCES `quests` (`quest_id`);

--
-- Constraints for table `user_quest_progress`
--
ALTER TABLE `user_quest_progress`
    ADD CONSTRAINT `user_quest_progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_quest_progress_ibfk_2` FOREIGN KEY (`quest_id`) REFERENCES `quests` (`quest_id`),
  ADD CONSTRAINT `user_quest_progress_ibfk_3` FOREIGN KEY (`current_stage_id`) REFERENCES `stages` (`stage_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
