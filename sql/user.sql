create table `user` (
    `idx` int(12) NOT NULL,
    `user_id` varchar(255) NOT NULL,
    `user_password` varchar(255) NOT NULL,
    `user_name` varchar(255) NOT NULL,
    `user_address` varchar(255) NOT NULL,
    `ip_address` varchar(30) default null,
    `user_init_time` datetime NOT NULL,
    `user_time` datetime NOT NULL,
    `deny` tinyInt default null,
    `etc` text default NULL,
    `des` text default NULL,
    `user_log` text default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;