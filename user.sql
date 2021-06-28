CREATE TABLE IF NOT EXISTS `demo1` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT KEY, 
  `username` varchar(30) NOT NULL COMMENT '用户名', 
  `password` varchar(32) NOT NULL COMMENT '密码', 
  `email` varchar(30) NOT NULL COMMENT '邮箱', 
  `regtime` int(10) NOT NULL COMMENT '注册时间'
) ENGINE=INNODB  DEFAULT CHARSET=utf8; 

CREATE TABLE IF NOT EXISTS `demo1` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT KEY, 
  `username` varchar(30) NOT NULL COMMENT '用户名', 
  `password` varchar(32) NOT NULL COMMENT '密码', 
  `balance` int(10) NOT NULL COMMENT '积分', 
  `regtime` int(10) NOT NULL COMMENT '注册时间'
) ENGINE=INNODB  DEFAULT CHARSET=utf8; 