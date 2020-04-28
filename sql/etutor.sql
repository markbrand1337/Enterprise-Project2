-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4406
-- Generation Time: Apr 22, 2020 at 03:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etutor`
--
CREATE DATABASE IF NOT EXISTS `etutor` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `etutor`;

-- --------------------------------------------------------

--
-- Table structure for table `tblclassroom`
--

DROP TABLE IF EXISTS `tblclassroom`;
CREATE TABLE `tblclassroom` (
  `classroom_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tblclassroom`:
--

--
-- Truncate table before insert `tblclassroom`
--

TRUNCATE TABLE `tblclassroom`;
--
-- Dumping data for table `tblclassroom`
--

INSERT INTO `tblclassroom` (`classroom_id`, `name`, `tutor_id`, `note`) VALUES(1, 'Programmer', 5, 'Programming Major');
INSERT INTO `tblclassroom` (`classroom_id`, `name`, `tutor_id`, `note`) VALUES(2, 'Business Adminstration', 5, 'For BA major');
INSERT INTO `tblclassroom` (`classroom_id`, `name`, `tutor_id`, `note`) VALUES(3, 'Graphic Designing', 6, 'For GD Major');
INSERT INTO `tblclassroom` (`classroom_id`, `name`, `tutor_id`, `note`) VALUES(4, 'Gamer Maker', 12, 'Game Maker\'s Tool Kit');

-- --------------------------------------------------------

--
-- Table structure for table `tblclassroomstudent`
--

DROP TABLE IF EXISTS `tblclassroomstudent`;
CREATE TABLE `tblclassroomstudent` (
  `classroom_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tblclassroomstudent`:
--   `user_id`
--       `tbluser` -> `user_id`
--   `classroom_id`
--       `tblclassroom` -> `classroom_id`
--

--
-- Truncate table before insert `tblclassroomstudent`
--

TRUNCATE TABLE `tblclassroomstudent`;
--
-- Dumping data for table `tblclassroomstudent`
--

INSERT INTO `tblclassroomstudent` (`classroom_id`, `user_id`) VALUES(1, 9);
INSERT INTO `tblclassroomstudent` (`classroom_id`, `user_id`) VALUES(1, 10);
INSERT INTO `tblclassroomstudent` (`classroom_id`, `user_id`) VALUES(1, 11);
INSERT INTO `tblclassroomstudent` (`classroom_id`, `user_id`) VALUES(2, 1);
INSERT INTO `tblclassroomstudent` (`classroom_id`, `user_id`) VALUES(2, 7);
INSERT INTO `tblclassroomstudent` (`classroom_id`, `user_id`) VALUES(2, 8);
INSERT INTO `tblclassroomstudent` (`classroom_id`, `user_id`) VALUES(3, 13);
INSERT INTO `tblclassroomstudent` (`classroom_id`, `user_id`) VALUES(3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

DROP TABLE IF EXISTS `tblcomment`;
CREATE TABLE `tblcomment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tblcomment`:
--   `post_id`
--       `tblpost` -> `post_id`
--   `user_id`
--       `tbluser` -> `user_id`
--

--
-- Truncate table before insert `tblcomment`
--

TRUNCATE TABLE `tblcomment`;
--
-- Dumping data for table `tblcomment`
--

INSERT INTO `tblcomment` (`comment_id`, `post_id`, `content`, `user_id`, `created_at`) VALUES(3, 5, 'this is my comment', 2, '2020-04-22 14:27:22');
INSERT INTO `tblcomment` (`comment_id`, `post_id`, `content`, `user_id`, `created_at`) VALUES(4, 5, 'some other comment', 2, '2020-04-22 14:27:26');
INSERT INTO `tblcomment` (`comment_id`, `post_id`, `content`, `user_id`, `created_at`) VALUES(5, 11, 'im a student', 11, '2020-04-22 14:48:07');
INSERT INTO `tblcomment` (`comment_id`, `post_id`, `content`, `user_id`, `created_at`) VALUES(6, 11, 'student comment', 11, '2020-04-22 14:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblconversation`
--

DROP TABLE IF EXISTS `tblconversation`;
CREATE TABLE `tblconversation` (
  `conversation_id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tblconversation`:
--

--
-- Truncate table before insert `tblconversation`
--

TRUNCATE TABLE `tblconversation`;
--
-- Dumping data for table `tblconversation`
--

INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(1, 2, 14);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(2, 6, 1);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(3, 6, 13);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(4, 6, 11);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(5, 6, 10);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(6, 9, 6);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(7, 8, 6);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(8, 7, 6);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(9, 6, 14);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(10, 5, 1);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(11, 5, 13);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(12, 5, 11);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(13, 5, 10);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(14, 9, 5);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(15, 8, 5);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(16, 7, 5);
INSERT INTO `tblconversation` (`conversation_id`, `user_one`, `user_two`) VALUES(17, 5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbldocument`
--

DROP TABLE IF EXISTS `tbldocument`;
CREATE TABLE `tbldocument` (
  `id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tbldocument`:
--   `classroom_id`
--       `tblclassroom` -> `classroom_id`
--   `user_id`
--       `tbluser` -> `user_id`
--

--
-- Truncate table before insert `tbldocument`
--

TRUNCATE TABLE `tbldocument`;
--
-- Dumping data for table `tbldocument`
--

INSERT INTO `tbldocument` (`id`, `classroom_id`, `user_id`, `file`, `name`, `description`) VALUES(2, 1, 2, '6619-TEST FILE - Copy.txt', 'PHP Syntax Cheat sheet', 'all you need to know about php syntax');
INSERT INTO `tbldocument` (`id`, `classroom_id`, `user_id`, `file`, `name`, `description`) VALUES(3, 1, 2, '3182-TEST FILE - Copy - Copy (3).txt', 'C# SYNTAX', 'C# SYNTAX cheet sheat');
INSERT INTO `tbldocument` (`id`, `classroom_id`, `user_id`, `file`, `name`, `description`) VALUES(4, 1, 5, '5106-TEST FILE - Copy - Copy (2).txt', 'Sample PHP Project', 'a php project i made');
INSERT INTO `tbldocument` (`id`, `classroom_id`, `user_id`, `file`, `name`, `description`) VALUES(5, 1, 11, '4579-TEST FILE - Copy - Copy (2).txt', 'Sample C# Project', 'a simple project i found on the internet');

-- --------------------------------------------------------

--
-- Table structure for table `tblmeeting`
--

DROP TABLE IF EXISTS `tblmeeting`;
CREATE TABLE `tblmeeting` (
  `id` int(11) NOT NULL,
  `meeting_date` date DEFAULT NULL,
  `classroom_id` int(11) NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tblmeeting`:
--   `classroom_id`
--       `tblclassroom` -> `classroom_id`
--

--
-- Truncate table before insert `tblmeeting`
--

TRUNCATE TABLE `tblmeeting`;
--
-- Dumping data for table `tblmeeting`
--

INSERT INTO `tblmeeting` (`id`, `meeting_date`, `classroom_id`, `note`, `start_at`, `end_at`) VALUES(1, '2020-04-06', 1, 'First Lesson  Algorithm', NULL, NULL);
INSERT INTO `tblmeeting` (`id`, `meeting_date`, `classroom_id`, `note`, `start_at`, `end_at`) VALUES(2, '2020-04-22', 1, 'C# Basic', NULL, NULL);
INSERT INTO `tblmeeting` (`id`, `meeting_date`, `classroom_id`, `note`, `start_at`, `end_at`) VALUES(3, '2020-04-22', 1, 'PHP basic', '2020-04-22 19:24:21', NULL);
INSERT INTO `tblmeeting` (`id`, `meeting_date`, `classroom_id`, `note`, `start_at`, `end_at`) VALUES(4, '2020-04-22', 1, '.NET BASIC', '2020-04-22 19:24:21', '2020-04-22 19:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `tblmeetingmessage`
--

DROP TABLE IF EXISTS `tblmeetingmessage`;
CREATE TABLE `tblmeetingmessage` (
  `message_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `send_at` datetime NOT NULL,
  `from_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tblmeetingmessage`:
--   `id`
--       `tblmeeting` -> `id`
--

--
-- Truncate table before insert `tblmeetingmessage`
--

TRUNCATE TABLE `tblmeetingmessage`;
--
-- Dumping data for table `tblmeetingmessage`
--

INSERT INTO `tblmeetingmessage` (`message_id`, `id`, `content`, `send_at`, `from_id`) VALUES(1, 1, 'hh', '2020-04-22 14:22:11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

DROP TABLE IF EXISTS `tblmessage`;
CREATE TABLE `tblmessage` (
  `message_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tblmessage`:
--   `conversation_id`
--       `tblconversation` -> `conversation_id`
--

--
-- Truncate table before insert `tblmessage`
--

TRUNCATE TABLE `tblmessage`;
--
-- Dumping data for table `tblmessage`
--

INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(1, 1, 'hey ', '2020-04-22 13:49:14', 2, 14);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(2, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', '2020-04-22 18:57:17', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(3, 12, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system', '2020-04-22 18:57:17', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(4, 12, 'tremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumst', '2020-04-22 18:57:17', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(5, 12, 'dio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum ', '2020-04-22 18:57:17', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(6, 12, 'sionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes l', '2020-04-22 18:57:17', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(7, 12, 's indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that t', '2020-04-22 18:57:17', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(8, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', '2020-04-22 18:57:38', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(9, 12, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system', '2020-04-22 18:57:38', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(10, 12, 'tremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumst', '2020-04-22 18:57:38', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(11, 12, 'dio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum ', '2020-04-22 18:57:38', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(12, 12, 'sionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes l', '2020-04-22 18:57:38', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(13, 12, 's indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that t', '2020-04-22 18:57:38', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(14, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', '2020-04-22 18:57:48', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(15, 12, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system', '2020-04-22 18:57:48', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(16, 12, 'tremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumst', '2020-04-22 18:57:48', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(17, 12, 'dio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum ', '2020-04-22 18:57:48', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(18, 12, 'sionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes l', '2020-04-22 18:57:48', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(19, 12, 's indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that t', '2020-04-22 18:57:48', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(20, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', '2020-04-22 18:58:03', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(21, 12, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system', '2020-04-22 18:58:03', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(22, 12, 'tremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumst', '2020-04-22 18:58:03', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(23, 12, 'dio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum ', '2020-04-22 18:58:03', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(24, 12, 'sionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes l', '2020-04-22 18:58:03', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(25, 12, 's indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that t', '2020-04-22 18:58:03', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(26, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', '2020-04-22 18:58:12', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(27, 12, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system', '2020-04-22 18:58:12', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(28, 12, 'tremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumst', '2020-04-22 18:58:12', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(29, 12, 'dio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum ', '2020-04-22 18:58:12', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(30, 12, 'sionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes l', '2020-04-22 18:58:12', 5, 11);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(31, 12, 's indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that t', '2020-04-22 18:58:12', 11, 5);
INSERT INTO `tblmessage` (`message_id`, `conversation_id`, `content`, `send_at`, `from_id`, `to_id`) VALUES(32, 4, 'Hey john jingle', '2020-04-22 14:46:06', 11, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

DROP TABLE IF EXISTS `tblpost`;
CREATE TABLE `tblpost` (
  `post_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `in_class` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tblpost`:
--   `user_id`
--       `tbluser` -> `user_id`
--

--
-- Truncate table before insert `tblpost`
--

TRUNCATE TABLE `tblpost`;
--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(1, 'ERdit the content of this post', 2, 1, '2020-04-21 16:21:38');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5, 0, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(3, ' he printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5, 0, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(4, 'ndard dummy text ever since the 1500s, when an unknown printer took a galley of ty=ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5, 0, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(5, 'LoLoype and Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer toobled it to make a type specimen book.', 5, 1, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(6, 'LoLoLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to makemen book.', 5, 1, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(7, 'Lorem Ipsum is e prLorem Ipsd it to make a typeLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown p scrmake a type specimen book. specime', 5, 1, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(8, 'LoreLorem IpLoremaasd a type Lorem Ipsum is simply dummy texas esetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printeasdey of type and scrambled it to make a type specimen book.specimen book', 5, 2, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(9, 'Lorem Ipsum is simply dummy teats itd to make aasdwn printer took a gaLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard das specimen book.e specimen book.', 5, 2, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(10, 'Lorem Ipsum iascrambled it to make aLorem Ipsum is simply daley of type and scrambled ia ake a type specimen book. type specimen book.', 5, 2, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(11, 'Lorem Iaimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer toasdalley of type and scrambled it to make a type specimen book.', 11, 1, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 11, 1, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(13, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 11, 0, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(14, 'Lorem Ips Lorem Ipsum   of type and scrambled it to make a type specimen book.ley of type and scrambled it to make a type specimen book.', 11, 0, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(15, 'Lorem ILorem Ipsum is simply d y of type and scrambled it to make a type specimen book.psum is asda ype and scrambled it to make a type specimen book.', 11, 0, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(16, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 11, 1, '2020-04-22 19:11:56');
INSERT INTO `tblpost` (`post_id`, `content`, `user_id`, `in_class`, `created_at`) VALUES(17, 'Hi people im new to this site.', 11, 0, '2020-04-22 14:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE `tbluser` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tbluser`:
--

--
-- Truncate table before insert `tbluser`
--

TRUNCATE TABLE `tbluser`;
--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(1, 'Marcus', 'Kane', 'markbrand1337@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(2, 'Staff', 'Stafferson', 'staff@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 0);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(5, 'Tutor', 'McTutorson', 'tutor@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 2);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(6, 'John', 'Jingle', 'john.jingle@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 2);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(7, 'Kim', 'Kwon', 'kimkwon@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(8, 'Mosker', 'Hoiz', 'mokser@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(9, 'Hyrus', 'Copphelius', 'hyrus@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(10, 'Napperlion', 'Bonedart', 'napper@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(11, 'Student', 'Studentsworth', 'student@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(12, 'Jake', 'Jacobson', 'jake@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 2);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(13, 'Casser', 'Molassy', 'caser@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(14, 'Ogutu', 'Mbeke', 'ogutu@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(25, 'Kramer', 'Sugarman', 'sugar@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1);
INSERT INTO `tbluser` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES(26, 'Juno', 'DeShawn', 'juno@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserlog`
--

DROP TABLE IF EXISTS `tbluserlog`;
CREATE TABLE `tbluserlog` (
  `last_activity_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tbluserlog`:
--   `user_id`
--       `tbluser` -> `user_id`
--

--
-- Truncate table before insert `tbluserlog`
--

TRUNCATE TABLE `tbluserlog`;
--
-- Dumping data for table `tbluserlog`
--

INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-04-22 18:34:47', 1);
INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-04-22 14:27:26', 2);
INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-04-22 14:44:17', 5);
INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-04-22 18:34:47', 6);
INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-02-22 18:34:47', 7);
INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-04-11 18:34:47', 8);
INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-04-22 18:34:47', 9);
INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-04-22 18:34:47', 10);
INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-04-22 14:49:04', 11);
INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-04-22 18:34:47', 12);
INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-04-22 18:34:47', 13);
INSERT INTO `tbluserlog` (`last_activity_at`, `user_id`) VALUES('2020-04-22 18:34:47', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblclassroom`
--
ALTER TABLE `tblclassroom`
  ADD PRIMARY KEY (`classroom_id`);

--
-- Indexes for table `tblclassroomstudent`
--
ALTER TABLE `tblclassroomstudent`
  ADD PRIMARY KEY (`classroom_id`,`user_id`),
  ADD KEY `fkIdx_115` (`user_id`),
  ADD KEY `fkIdx_42` (`classroom_id`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fkIdx_65` (`post_id`),
  ADD KEY `fkIdx_69` (`user_id`);

--
-- Indexes for table `tblconversation`
--
ALTER TABLE `tblconversation`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `tbldocument`
--
ALTER TABLE `tbldocument`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_85` (`classroom_id`),
  ADD KEY `fkIdx_88` (`user_id`);

--
-- Indexes for table `tblmeeting`
--
ALTER TABLE `tblmeeting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_35` (`classroom_id`);

--
-- Indexes for table `tblmeetingmessage`
--
ALTER TABLE `tblmeetingmessage`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `fkIdx_144` (`id`);

--
-- Indexes for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `fkIdx_104` (`conversation_id`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fkIdx_58` (`user_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbluserlog`
--
ALTER TABLE `tbluserlog`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fkIdx_76` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblclassroom`
--
ALTER TABLE `tblclassroom`
  MODIFY `classroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblconversation`
--
ALTER TABLE `tblconversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbldocument`
--
ALTER TABLE `tbldocument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblmeeting`
--
ALTER TABLE `tblmeeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblmeetingmessage`
--
ALTER TABLE `tblmeetingmessage`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblclassroomstudent`
--
ALTER TABLE `tblclassroomstudent`
  ADD CONSTRAINT `FK_115` FOREIGN KEY (`user_id`) REFERENCES `tbluser` (`user_id`),
  ADD CONSTRAINT `FK_42` FOREIGN KEY (`classroom_id`) REFERENCES `tblclassroom` (`classroom_id`);

--
-- Constraints for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD CONSTRAINT `FK_65` FOREIGN KEY (`post_id`) REFERENCES `tblpost` (`post_id`),
  ADD CONSTRAINT `FK_69` FOREIGN KEY (`user_id`) REFERENCES `tbluser` (`user_id`);

--
-- Constraints for table `tbldocument`
--
ALTER TABLE `tbldocument`
  ADD CONSTRAINT `FK_85` FOREIGN KEY (`classroom_id`) REFERENCES `tblclassroom` (`classroom_id`),
  ADD CONSTRAINT `FK_88` FOREIGN KEY (`user_id`) REFERENCES `tbluser` (`user_id`);

--
-- Constraints for table `tblmeeting`
--
ALTER TABLE `tblmeeting`
  ADD CONSTRAINT `FK_35` FOREIGN KEY (`classroom_id`) REFERENCES `tblclassroom` (`classroom_id`);

--
-- Constraints for table `tblmeetingmessage`
--
ALTER TABLE `tblmeetingmessage`
  ADD CONSTRAINT `FK_144` FOREIGN KEY (`id`) REFERENCES `tblmeeting` (`id`);

--
-- Constraints for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD CONSTRAINT `FK_104` FOREIGN KEY (`conversation_id`) REFERENCES `tblconversation` (`conversation_id`);

--
-- Constraints for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD CONSTRAINT `FK_58` FOREIGN KEY (`user_id`) REFERENCES `tbluser` (`user_id`);

--
-- Constraints for table `tbluserlog`
--
ALTER TABLE `tbluserlog`
  ADD CONSTRAINT `FK_76` FOREIGN KEY (`user_id`) REFERENCES `tbluser` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
