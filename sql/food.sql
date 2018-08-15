# Host: localhost  (Version 5.5.5-10.2.12-MariaDB)
# Date: 2018-08-08 20:04:52
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "items"
#

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `menu_type` varchar(255) NOT NULL DEFAULT '',
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  `location` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

#
# Data for table "items"
#

INSERT INTO `items` VALUES (16,'Idli With Wada',30,'Indian Veg',0,'uploads/idly.jpg'),(17,'Masala Dosa',40,'Indian Veg',0,'uploads/dosa.jpg'),(18,'Roti',60,'Indian Veg',0,'uploads/roti.jpg'),(19,'Puri',50,'Indian Veg',0,'uploads/poori.jpg'),(20,'Upma',30,'Indian Veg',0,'uploads/upma.jpg');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(15) NOT NULL DEFAULT 'Customer',
  `name` varchar(15) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `contact` bigint(11) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'Administrator','Admin 1','root','toor','','Address 1',9898000000,1,0),(2,'Customer','Customer 1','user1','pass1','mail2@example.com','Address 2',9898000001,1,0),(3,'Customer','Customer 2','user2','pass2','mail3@example.com','Address 3',9898000002,1,0),(4,'Customer','Customer 3','user3','pass3','','',9898000003,0,0),(5,'Customer','Customer 4','user4','pass4','','',9898000004,0,1),(6,'Customer','Raisa','raisakause','raisa@123',NULL,NULL,6568863565,0,0),(7,'Customer','Raisa','Raisa','raisa@123','raisak@gmail.com','abcdefghijkl',9738944664,1,0),(8,'Owner','Owner 1','cook','cook123',NULL,'Address 2',9898000005,1,0),(9,'Customer','maheen','Maheen','maheen123',NULL,NULL,9535523298,0,0),(11,'Customer','Rice','rice','raisa','rice@gmail.com','Bangalore',9988776655,1,0);

#
# Structure for table "orders"
#

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_type` varchar(16) NOT NULL DEFAULT 'Wallet',
  `total` int(11) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Yet to be delivered',
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "orders"
#

INSERT INTO `orders` VALUES (9,2,'Address 2','','2018-08-08 19:31:22','Cash',30,'Yet to be delivered',0),(10,2,'Address 2','','2018-08-08 19:44:19','Wallet',30,'Yet to be delivered',0),(11,11,'Bangalore','','2018-08-08 20:00:59','Cash',30,'Yet to be delivered',0),(12,11,'Bangalore','','2018-08-08 20:01:36','Wallet',40,'Yet to be delivered',0);

#
# Structure for table "order_details"
#

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `item_id` (`item_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "order_details"
#

INSERT INTO `order_details` VALUES (1,9,16,1,30),(2,10,16,1,30),(3,11,16,1,30),(4,12,17,1,40);

#
# Structure for table "wallet"
#

DROP TABLE IF EXISTS `wallet`;
CREATE TABLE `wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_id` (`customer_id`),
  UNIQUE KEY `id` (`id`),
  CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "wallet"
#

INSERT INTO `wallet` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,9),(10,11);

#
# Structure for table "wallet_details"
#

DROP TABLE IF EXISTS `wallet_details`;
CREATE TABLE `wallet_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wallet_id` int(11) NOT NULL,
  `number` varchar(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 2000,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wallet_id` (`wallet_id`),
  UNIQUE KEY `id` (`id`),
  CONSTRAINT `wallet_details_ibfk_1` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "wallet_details"
#

INSERT INTO `wallet_details` VALUES (1,1,'6155247490533921',983,3430),(2,2,'1887587142382050',772,1970),(3,3,'4595809639046830',532,1585),(4,4,'5475856443351234',521,2000),(5,5,'9076633115663264',229,2000),(6,6,'3309605494454625',690,2000),(7,7,'8681890876153628',587,2000),(8,8,'547072542466124',862,2000),(10,10,'6142953339112964',570,1960);
