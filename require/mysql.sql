-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql-amarworld.alwaysdata.net
-- Generation Time: Jul 04, 2025 at 12:29 PM
-- Server version: 10.11.13-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amarworld_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `Admin_ID` int(11) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `COMMENT_ID` int(11) NOT NULL,
  `POST_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `COMMENT` text NOT NULL,
  `DATE` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments_events`
--

CREATE TABLE `comments_events` (
  `COMMENT_ID` int(11) NOT NULL,
  `Event_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `COMMENT` text NOT NULL,
  `DATE` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments_vid`
--

CREATE TABLE `comments_vid` (
  `COMMENT_ID` int(11) NOT NULL,
  `VIDEO_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `COMMENT` text NOT NULL,
  `DATE` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Likes` int(11) NOT NULL,
  `Event_Poster` text NOT NULL,
  `Caption` varchar(250) NOT NULL,
  `Event_Time` time NOT NULL,
  `Event_Date` datetime NOT NULL,
  `Invite_Link` text NOT NULL,
  `HashTags` varchar(250) NOT NULL,
  `Date_Upload` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fallowing`
--

CREATE TABLE `fallowing` (
  `ID` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Other_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `Like_ID` int(11) NOT NULL,
  `Post_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes_events`
--

CREATE TABLE `likes_events` (
  `Like_ID` int(11) NOT NULL,
  `Event_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes_vid`
--

CREATE TABLE `likes_vid` (
  `Like_ID` int(11) NOT NULL,
  `Video_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE `Posts` (
  `Post_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Likes` int(11) NOT NULL,
  `Img_Path` text NOT NULL,
  `Caption` varchar(700) NOT NULL,
  `HashTags` varchar(250) NOT NULL,
  `Date_Upload` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_events`
--

CREATE TABLE `special_events` (
  `Event_ID` int(11) NOT NULL,
  `Caption` varchar(250) NOT NULL,
  `Event_Time` time NOT NULL,
  `Event_Date` datetime NOT NULL,
  `Invite_Link` text NOT NULL,
  `Date_Upload` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `User_ID` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `FULL_NAME` varchar(100) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_TYPE` varchar(2) NOT NULL,
  `PASSWORD_S` varchar(50) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `IMAGE` varchar(200) DEFAULT 'assets/images/profile_pics/default.png',
  `FACEBOOK` varchar(200) DEFAULT 'www.facebook.com',
  `WHATSAPP` varchar(200) DEFAULT 'www.webwhatsapp.com',
  `BIO` varchar(500) DEFAULT 'bio here',
  `FALLOWERS` int(11) DEFAULT 0,
  `FALLOWING` int(11) DEFAULT 0,
  `POSTS` int(11) DEFAULT 0,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `Video_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Likes` int(11) NOT NULL,
  `Video_Path` text NOT NULL,
  `Caption` varchar(250) NOT NULL,
  `HashTags` varchar(250) NOT NULL,
  `Date_Upload` datetime NOT NULL DEFAULT current_timestamp(),
  `Thumbnail_Path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`COMMENT_ID`),
  ADD KEY `POST_ID` (`POST_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `comments_events`
--
ALTER TABLE `comments_events`
  ADD PRIMARY KEY (`COMMENT_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `comments_vid`
--
ALTER TABLE `comments_vid`
  ADD PRIMARY KEY (`COMMENT_ID`),
  ADD KEY `VIDEO_ID` (`VIDEO_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `fallowing`
--
ALTER TABLE `fallowing`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`Like_ID`),
  ADD KEY `Post_ID` (`Post_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `likes_events`
--
ALTER TABLE `likes_events`
  ADD PRIMARY KEY (`Like_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `likes_vid`
--
ALTER TABLE `likes_vid`
  ADD PRIMARY KEY (`Like_ID`),
  ADD KEY `Video_ID` (`Video_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`Post_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `special_events`
--
ALTER TABLE `special_events`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`Video_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments_events`
--
ALTER TABLE `comments_events`
  MODIFY `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments_vid`
--
ALTER TABLE `comments_vid`
  MODIFY `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fallowing`
--
ALTER TABLE `fallowing`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `Like_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes_events`
--
ALTER TABLE `likes_events`
  MODIFY `Like_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes_vid`
--
ALTER TABLE `likes_vid`
  MODIFY `Like_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `Post_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special_events`
--
ALTER TABLE `special_events`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `Video_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`POST_ID`) REFERENCES `Posts` (`Post_ID`),
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `Users` (`User_ID`);

--
-- Constraints for table `comments_events`
--
ALTER TABLE `comments_events`
  ADD CONSTRAINT `comments_events_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `events` (`Event_ID`),
  ADD CONSTRAINT `comments_events_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `Users` (`User_ID`);

--
-- Constraints for table `comments_vid`
--
ALTER TABLE `comments_vid`
  ADD CONSTRAINT `comments_vid_ibfk_1` FOREIGN KEY (`VIDEO_ID`) REFERENCES `videos` (`Video_ID`),
  ADD CONSTRAINT `comments_vid_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `Users` (`User_ID`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`User_ID`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`Post_ID`) REFERENCES `Posts` (`Post_ID`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`User_ID`);

--
-- Constraints for table `likes_events`
--
ALTER TABLE `likes_events`
  ADD CONSTRAINT `likes_events_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `events` (`Event_ID`),
  ADD CONSTRAINT `likes_events_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`User_ID`);

--
-- Constraints for table `likes_vid`
--
ALTER TABLE `likes_vid`
  ADD CONSTRAINT `likes_vid_ibfk_1` FOREIGN KEY (`Video_ID`) REFERENCES `videos` (`Video_ID`),
  ADD CONSTRAINT `likes_vid_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`User_ID`);

--
-- Constraints for table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`User_ID`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
