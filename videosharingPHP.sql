create database videosharingphp;
use videosharingphp;

create table admin 
(
adminname varchar(30) primary key,
password varchar(10)
);

insert into admin values('admin','admin');

create table user 
(
username varchar(30),
password varchar(10),
emailid varchar(40) primary key,
contact varchar(10) unique key
);

create table video 
(
id int(5) primary key auto_increment,
title varchar(40),
category varchar(40),
videofile varchar(200),
thumbnail varchar(100),
emailid varchar(40),
uploadingdate varchar(30),
description varchar(200),
status varchar(10)
);



