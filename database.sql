
# Table users


DROP TABLE IF EXISTS `users`;

 create table users(id int  not null auto_increment unique,email varchar(250) not null unique ,password varchar (200) not null,fname varchar(200) not null,lname varchar(100) not null,
 residency varchar(100)  not null ,city varchar(100)  not null ,
 citizenship varchar(100)  not null ,phonenumber varchar(100) not null ,
 gender varchar(100) not null  ,title varchar(4) not null,maritalstatus varchar(100) not null ,DOB date not null,primary key(id,email));        

 ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;


/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;




