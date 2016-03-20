CREATE TABLE `exercise_user` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(40) NOT NULL,
    `password` varchar(40) NOT NULL,
    `join_date` datetime DEFAULT NULL,
    `first_name` varchar(32) DEFAULT NULL,
    `last_name` varchar(32) DEFAULT NULL,
    `gender` varchar(1) DEFAULT NULL,
    `birthdate` date DEFAULT NULL,
    `weight` int(6) DEFAULT NULL,
    `picture` varchar(32) DEFAULT NULL,
    PRIMARY KEY (`user_id`)
);

CREATE TABLE `exercise_log` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `exercise_date` datetime DEFAULT NULL,
    `exercise_type` varchar(32) DEFAULT NULL,
    `time_in_minutes` varchar(32) DEFAULT NULL,
    `heartrate` int(3) DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES exercise_user(`user_id`)
);