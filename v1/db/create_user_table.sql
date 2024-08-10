/*
create database rest_api_demo;
*/
use rest_api_demo;

DROP TABLE users;
CREATE TABLE `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES (NULL, 'Jeff', 'jeff@gmail.com', '0');
INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES (NULL, 'Mary', 'mary@gmail.com', '1');
INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES (NULL, 'Jan', 'jan@gmail.com', '0');
INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES (NULL, 'Bob', 'bob@gmail.com', '1');
INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES (NULL, 'Carl', 'carl@gmail.com', '0');
INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES (NULL, 'Jeffrey', 'jeffrey@gmail.com', '1');
INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES (NULL, 'Jake', 'jake@gmail.com', '0');
INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES (NULL, 'Jack', 'jack@gmail.com', '1');
INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES (NULL, 'Jorge', 'jorge@gmail.com', '0');


