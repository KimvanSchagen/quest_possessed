-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 27, 2024 at 03:00 PM
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
                                                                                                   (13, 'Organize a Picnic', 'Plan and organize a fun picnic outing.', 4, '2024-12-17 00:12:43', 1),
                                                                                                   (14, 'Set Up a Personal Journal', 'Create and set up your own personal journal.', 2, '2024-12-17 00:12:43', 1),
                                                                                                   (15, 'Clean and Declutter the Room', 'Organize and clean up a cluttered room.', 3, '2024-12-17 00:12:43', 1),
                                                                                                   (16, 'Plan a Weekend Trip', 'Research and organize a weekend getaway trip.', 4, '2024-12-17 00:12:43', 1),
                                                                                                   (17, 'Prepare for a Job Interview', 'Get ready for an important job interview.', 5, '2024-12-17 00:12:43', 1),
                                                                                                   (18, 'Host a Dinner Party', 'Plan and host a dinner party for friends or family.', 5, '2024-12-17 00:12:43', 1),
                                                                                                   (19, 'Create a Vision Board', 'Design a vision board to visualize your goals.', 6, '2024-12-27 12:58:46', 1),
                                                                                                   (20, 'Learn a New Recipe', 'Master a new dish by trying out a recipe.', 7, '2024-12-27 12:59:22', 1),
                                                                                                   (21, 'Write a Short Story', 'Write and refine a creative short story.', 8, '2024-12-27 12:59:56', 1),
                                                                                                   (22, 'Start a Garden', 'Begin cultivating your own garden at home.', 5, '2024-12-27 13:00:17', 1),
                                                                                                   (23, 'Complete a Puzzle', 'Challenge yourself to complete a large puzzle.', 4, '2024-12-27 13:00:35', 0),
                                                                                                   (24, 'Learn Basic Photography', 'Get started with the fundamentals of photography.', 3, '2024-12-27 13:00:55', 1),
                                                                                                   (25, 'Volunteer for a Day', 'Participate in a volunteering activity.', 2, '2024-12-27 13:01:11', 1),
                                                                                                   (26, 'Organize a Family Game Night', 'Host a fun-filled game night for your family.', 6, '2024-12-27 13:01:28', 1),
                                                                                                   (27, 'Build a DIY Craft', 'Create a simple craft project from scratch.', 7, '2024-12-27 13:01:48', 1),
                                                                                                   (28, 'Take a Digital Detox', 'Spend a day disconnected from digital devices.', 8, '2024-12-27 13:02:02', 1),
                                                                                                   (29, 'Start a Fitness Challenge', 'Commit to a fitness goal and track your progress.', 5, '2024-12-27 13:02:19', 1),
                                                                                                   (30, 'Learn Calligraphy', 'Develop the skill of beautiful writing.', 4, '2024-12-27 13:02:40', 1),
                                                                                                   (31, 'Plan a Charity Drive', 'Organize a charity event or donation drive.', 3, '2024-12-27 13:03:02', 1),
                                                                                                   (33, 'Explore a Local Museum', 'Visit and learn from a nearby museum.', 6, '2024-12-27 13:03:36', 1);

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
                                                                                               (48, 18, 'Stage 4: Cook and Serve', 'Prepare the meal and serve your guests.', 25),
                                                                                               (49, 19, 'Stage 1: Gather Materials', 'Collect magazines, glue, scissors, and a board.', 10),
                                                                                               (50, 19, 'Stage 2: Define Goals', 'Write down your short- and long-term goals.', 15),
                                                                                               (51, 19, 'Stage 3: Assemble the Vision Board', 'Cut and paste images and words that inspire you.', 20),
                                                                                               (52, 20, 'Stage 1: Select a Recipe', 'Choose a dish you’ve never tried making.', 10),
                                                                                               (53, 20, 'Stage 2: Gather Ingredients', 'Purchase or prepare the necessary ingredients.', 15),
                                                                                               (54, 20, 'Stage 3: Cook the Dish', 'Follow the recipe and complete the dish.', 20),
                                                                                               (55, 21, 'Stage 1: Brainstorm Ideas', 'Come up with potential story ideas.', 10),
                                                                                               (56, 21, 'Stage 2: Write a Draft', 'Draft the story, focusing on creativity.', 15),
                                                                                               (57, 21, 'Stage 3: Edit and Refine', 'Revise the draft to polish the story.', 20),
                                                                                               (58, 22, 'Stage 1: Choose Plants', 'Select plants suited for your gardening space.', 10),
                                                                                               (59, 22, 'Stage 2: Prepare the Soil', 'Ensure the soil is ready for planting.', 15),
                                                                                               (60, 22, 'Stage 3: Plant and Water', 'Plant the seeds or saplings and water them.', 20),
                                                                                               (61, 23, 'Stage 1: Select a Puzzle', 'Choose a puzzle with a suitable difficulty level.', 10),
                                                                                               (62, 23, 'Stage 2: Organize the Pieces', 'Sort and prepare the pieces for assembly.', 15),
                                                                                               (63, 23, 'Stage 3: Complete the Puzzle', 'Work methodically to complete the puzzle.', 20),
                                                                                               (64, 24, 'Stage 1: Learn Camera Basics', 'Understand the main features of your camera.', 10),
                                                                                               (65, 24, 'Stage 2: Practice Shots', 'Take practice photos in different settings.', 15),
                                                                                               (66, 24, 'Stage 3: Edit Photos', 'Use basic software to enhance your photos.', 20),
                                                                                               (67, 25, 'Stage 1: Find an Opportunity', 'Identify a local volunteering activity.', 10),
                                                                                               (68, 25, 'Stage 2: Sign Up', 'Register for the volunteering event.', 15),
                                                                                               (69, 25, 'Stage 3: Participate', 'Attend and actively participate in the event.', 20),
                                                                                               (70, 26, 'Stage 1: Choose Games', 'Select games that everyone can enjoy.', 10),
                                                                                               (71, 26, 'Stage 2: Set Up', 'Prepare the space and equipment for the games.', 15),
                                                                                               (72, 26, 'Stage 3: Host the Game Night', 'Lead the games and ensure everyone has fun.', 20),
                                                                                               (73, 27, 'Stage 1: Select a Craft', 'Choose a simple and fun craft project.', 10),
                                                                                               (74, 27, 'Stage 2: Gather Supplies', 'Collect the materials needed for the craft.', 15),
                                                                                               (75, 27, 'Stage 3: Create the Craft', 'Complete the craft project.', 20),
                                                                                               (76, 28, 'Stage 1: Plan Your Day', 'Schedule activities to do without devices.', 10),
                                                                                               (77, 28, 'Stage 2: Notify Others', 'Let people know you’re taking a digital detox.', 15),
                                                                                               (78, 28, 'Stage 3: Enjoy the Day', 'Spend the day fully disconnected.', 20),
                                                                                               (79, 29, 'Stage 1: Set a Goal', 'Decide on a fitness goal (e.g., 10,000 steps/day).', 10),
                                                                                               (80, 29, 'Stage 2: Track Progress', 'Use a journal or app to monitor your progress.', 15),
                                                                                               (81, 29, 'Stage 3: Reflect and Adjust', 'Evaluate your progress and make changes.', 20),
                                                                                               (82, 30, 'Stage 1: Gather Tools', 'Obtain a calligraphy pen and practice sheets.', 10),
                                                                                               (83, 30, 'Stage 2: Learn Basic Strokes', 'Practice the foundational strokes of calligraphy.', 15),
                                                                                               (84, 30, 'Stage 3: Write a Phrase', 'Create a calligraphy piece with a meaningful phrase.', 20),
                                                                                               (85, 31, 'Stage 1: Plan the Event', 'Decide on the purpose and format of the drive.', 10),
                                                                                               (86, 31, 'Stage 2: Spread the Word', 'Promote the event to gather participants.', 15),
                                                                                               (87, 31, 'Stage 3: Execute the Event', 'Run the event and collect donations.', 20),
                                                                                               (91, 33, 'Stage 1: Research Museums', 'Find local museums that interest you.', 10),
                                                                                               (92, 33, 'Stage 2: Plan Your Visit', 'Choose a date and arrange transportation.', 15),
                                                                                               (93, 33, 'Stage 3: Explore the Museum', 'Learn from the exhibits during your visit.', 20);

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
                                                                                                                                             (2, 'Kim135', 'kimvanschagen135@gmail.com', '$2y$10$ld7rvlgb1oQSUjp7N2nDHudNXK76NZ3AEEiRfL72Sva85EbdXTK.e', 0, '2024-12-16 21:50:32', 3, 45, '/assets/img/profile_picture_11.jpg'),
                                                                                                                                             (3, 'Alice', 'alice@example.com', '$2y$10$G0E7eyGlPoKY3layuUe1huDy/p6qubYPZZz8znfNUrYd5GG7ugNAK', 1, '2024-12-17 00:08:01', 1, 0, '/assets/img/profile_picture_9.jpg'),
                                                                                                                                             (4, 'Bob', 'bob@example.com', '$2y$10$G9VhHNMnV1ONez41lbpgXesdNhD9oaVvTdsZLEoYxp4uR54/RxOE2', 0, '2024-12-17 00:08:38', 1, 0, '/assets/img/profile_picture_1.png'),
                                                                                                                                             (5, 'carol', 'carol@example.com', '$2y$10$xLpndMnqYpIN5iSG/cSvz.SpJlPF9iBGWM12Y63KkfiYohW/EI7Ry', 0, '2024-12-17 00:09:02', 1, 0, '/assets/img/profile_picture_1.png'),
                                                                                                                                             (6, 'Dave', 'dave@example.com', '$2y$10$jXk/q4oKp5s2dKbuJDzIeeur3iW.iHoMMzkngzZYlPPYl1GbaaWxq', 0, '2024-12-17 00:09:38', 1, 0, '/assets/img/profile_picture_1.png'),
                                                                                                                                             (7, 'Eve', 'eve@gmail.com', '$2y$10$r9BxmpSs3iFpAF9NvCCsp.v6dn2l6iYIFqv4wvquN32iM9l9qdVIq', 0, '2024-12-17 00:10:01', 1, 0, '/assets/img/profile_picture_1.png'),
                                                                                                                                             (8, 'Aryan', 'aryan.telang25@gmail.com', '$2y$10$gXx7pbMjCIimMPHRm3d04uEN.oMmxJpBEyJr0tRUQGRLsELH0ep3C', 1, '2024-12-18 16:05:39', 1, 0, '/assets/img/profile_picture_2.jpg');

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

--
-- Dumping data for table `user_quest_completion`
--

INSERT INTO `user_quest_completion` (`completion_id`, `user_id`, `quest_id`, `completed_at`) VALUES
                                                                                                 (1, 2, 17, '2024-12-26 22:48:44'),
                                                                                                 (2, 2, 13, '2024-12-27 12:07:25'),
                                                                                                 (3, 2, 15, '2024-12-27 14:46:11'),
                                                                                                 (4, 2, 20, '2024-12-27 14:47:25');

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
-- Dumping data for table `user_quest_progress`
--

INSERT INTO `user_quest_progress` (`progress_id`, `user_id`, `quest_id`, `current_stage_id`) VALUES
    (3, 2, 33, 91);

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
    MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
    MODIFY `stage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_quest_completion`
--
ALTER TABLE `user_quest_completion`
    MODIFY `completion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_quest_progress`
--
ALTER TABLE `user_quest_progress`
    MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
