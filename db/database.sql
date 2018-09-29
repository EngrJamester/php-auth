create database securelogin;

use securelogin;

create table users(
user_id int , 
user_username varchar(20),
user_password varchar(20),
user_status int,
constraint PK_ID primary key(user_id)
);

create table sessions(
sessions_id int,
sessions_userid int(10),
sessions_token varchar(35),
sessions_serial varchar(35),
sessions_date varchar(10),
constraint PK_ID primary key(sessions_id)
);

insert into users 
values('1','admin','admin',1);

select * from users;

ALTER TABLE sessions ADD column sessions_userid int(10) after sessions_id;
