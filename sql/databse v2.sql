-- ****************** SqlDBM: MySQL ******************;
-- ***************************************************;


-- ************************************** `tblUser`

CREATE TABLE `tblUser`
(
 `user_id`    int NOT NULL AUTO_INCREMENT,
 `first_name` varchar(45) NOT NULL ,
 `last_name`  varchar(45) NOT NULL ,
 `email`      varchar(45) NOT NULL ,
 `password`   varchar(45) NOT NULL ,
 `role`       int NOT NULL ,

PRIMARY KEY (`user_id`)
);




-- ************************************** `tblConversation`

CREATE TABLE `tblConversation`
(
 `conversation_id` int NOT NULL AUTO_INCREMENT,
 `user_one`        int NOT NULL ,
 `user_two`        int NOT NULL ,

PRIMARY KEY (`conversation_id`)
);






-- ************************************** `tblUserLog`

CREATE TABLE `tblUserLog`
(
 `last_activity_at` datetime ,
 `user_id`          int NOT NULL ,

PRIMARY KEY (`user_id`),
KEY `fkIdx_76` (`user_id`),
CONSTRAINT `FK_76` FOREIGN KEY `fkIdx_76` (`user_id`) REFERENCES `tblUser` (`user_id`)
);






-- ************************************** `tblPost`

CREATE TABLE `tblPost`
(
 `post_id`    int NOT NULL AUTO_INCREMENT ,
 `content`    varchar(255) NOT NULL ,
 `user_id`    int NOT NULL ,
`in_class`    int  ,
 `created_at` datetime  ,

PRIMARY KEY (`post_id`),
KEY `fkIdx_58` (`user_id`),
CONSTRAINT `FK_58` FOREIGN KEY `fkIdx_58` (`user_id`) REFERENCES `tblUser` (`user_id`)
);






-- ************************************** `tblMessage`

CREATE TABLE `tblMessage`
(
 `message_id`      int NOT NULL AUTO_INCREMENT,
 `conversation_id` int NOT NULL ,
 `content`         varchar(255) NOT NULL ,
 `send_at`         datetime ,
 `from_id`            int NOT NULL ,
 `to_id`              int NOT NULL ,

PRIMARY KEY (`message_id`),
KEY `fkIdx_104` (`conversation_id`),
CONSTRAINT `FK_104` FOREIGN KEY `fkIdx_104` (`conversation_id`) REFERENCES `tblConversation` (`conversation_id`)
);






-- ************************************** `tblClassroom`

CREATE TABLE `tblClassroom`
(
 `classroom_id` int NOT NULL AUTO_INCREMENT,
 `name`         varchar(45) ,
 `tutor_id`      int  ,
 `status`       varchar(45),

PRIMARY KEY (`classroom_id`)
);






-- ************************************** `tblMeeting`

CREATE TABLE `tblMeeting`
(
 `id`           int NOT NULL AUTO_INCREMENT,
 `meeting_date`         date ,
 `classroom_id` int NOT NULL ,
 `status`       varchar(45) ,
 `start_at`     datetime ,
 `end_at`       datetime ,

PRIMARY KEY (`id`),
KEY `fkIdx_35` (`classroom_id`),
CONSTRAINT `FK_35` FOREIGN KEY `fkIdx_35` (`classroom_id`) REFERENCES `tblClassroom` (`classroom_id`)
);






-- ************************************** `tblDocument`

CREATE TABLE `tblDocument`
(
 `id`           int NOT NULL AUTO_INCREMENT,
 `classroom_id` int NOT NULL ,
 `user_id`      int NOT NULL ,
 `file`         varchar(45) ,
  `name`         varchar(45) ,
    `description`         varchar(100) ,

PRIMARY KEY (`id`),
KEY `fkIdx_85` (`classroom_id`),
CONSTRAINT `FK_85` FOREIGN KEY `fkIdx_85` (`classroom_id`) REFERENCES `tblClassroom` (`classroom_id`),
KEY `fkIdx_88` (`user_id`),
CONSTRAINT `FK_88` FOREIGN KEY `fkIdx_88` (`user_id`) REFERENCES `tblUser` (`user_id`)
);






-- ************************************** `tblComment`

CREATE TABLE `tblComment`
(
 `comment_id` int NOT NULL AUTO_INCREMENT,
 `post_id`    int NOT NULL ,
 `content`    varchar(150) NOT NULL ,
 `user_id`    int NOT NULL ,
 `created_at` datetime ,

PRIMARY KEY (`comment_id`),
KEY `fkIdx_65` (`post_id`),
CONSTRAINT `FK_65` FOREIGN KEY `fkIdx_65` (`post_id`) REFERENCES `tblPost` (`post_id`),
KEY `fkIdx_69` (`user_id`),
CONSTRAINT `FK_69` FOREIGN KEY `fkIdx_69` (`user_id`) REFERENCES `tblUser` (`user_id`)
);






-- ************************************** `tblClassroomStudent`

CREATE TABLE `tblClassroomStudent`
(
 `classroom_id` int NOT NULL ,
 `user_id`      int NOT NULL ,

PRIMARY KEY (`classroom_id`, `user_id`),
KEY `fkIdx_115` (`user_id`),
CONSTRAINT `FK_115` FOREIGN KEY `fkIdx_115` (`user_id`) REFERENCES `tblUser` (`user_id`),
KEY `fkIdx_42` (`classroom_id`),
CONSTRAINT `FK_42` FOREIGN KEY `fkIdx_42` (`classroom_id`) REFERENCES `tblClassroom` (`classroom_id`)
);


-- ************************************** `tblMeetingMessage`

CREATE TABLE `tblMeetingMessage`
(
 `message_id` int NOT NULL  AUTO_INCREMENT,
 `id`         int NOT NULL ,
 `content`    varchar(255) NOT NULL ,
 `send_at`    datetime NOT NULL ,
 `from_id`    int NOT NULL ,

PRIMARY KEY (`message_id`),
KEY `fkIdx_144` (`id`),
CONSTRAINT `FK_144` FOREIGN KEY `fkIdx_144` (`id`) REFERENCES `tblMeeting` (`id`)
);










