

CREATE TABLE Cars (
    cid VARCHAR (20) NOT NULL PRIMARY KEY,
    uid INT NOT NULL,
    cname VARCHAR(50) NOT NULL DEFAULT 'unknow',
    age int NOT NULL DEFAULT 0,
    types VARCHAR(50) NOT NULL,
    foreign key (uid) references Users(uid) on delete cascade
) ENGINE = INNODB DEFAULT charset = utf8;

CREATE TABLE Users (
    uid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    uname VARCHAR (20) NOT NULL UNIQUE,
    passwd  VARCHAR(20) NOT NULL,
    sex VARCHAR(10) NOT NULL DEFAULT '男',
    position VARCHAR (50) NOT NULL,
    phone VARCHAR (20) NOT NULL,
    email VARCHAR (100) NOT NULL,
    moneys decimal(10,2) NOT NULL DEFAULT '0.00'
)ENGINE = INNODB DEFAULT charset = utf8;




CREATE TABLE Discounts (
    did INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    discount decimal (3,2) NOT NULL DEFAULT '0.00',
    title VARCHAR (50) NOT NULL,
    intr VARCHAR (200) NOT NULL,
    info VARCHAR (1000) NOT NULL,
    btime DATE NOT NULL,
    etime DATE NOT NULL
)ENGINE = INNODB DEFAULT charset = utf8;

CREATE TABLE Sends (
    sid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    addition decimal (10,2) NOT NULL DEFAULT '0.00',
    title VARCHAR (50) NOT NULL,
    intr VARCHAR (200) NOT NULL,
    info VARCHAR (1000) NOT NULL,
    btime DATE NOT NULL,
    etime DATE NOT NULL
)ENGINE = INNODB DEFAULT charset = utf8;

CREATE TABLE Notices (
    nid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    uid INT NOT NULL,
    title VARCHAR (50) NOT NULL,
    info VARCHAR (1000) NOT NULL,
    ntime DATE NOT NULL,
    foreign key (uid) references Users(uid) on delete cascade
)ENGINE = INNODB DEFAULT charset = utf8;

CREATE TABLE Refuel (
    rid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cid VARCHAR (20) NOT NULL,
    uid INT NOT NULL,
    types VARCHAR (20) NOT NULL,
    price decimal (10,2) NOT NULL,
    count decimal (10,2) NOT NULL,
    allprice decimal (10,2) NOT NULL,
    dates DATE NOT NULL,
    position VARCHAR (100) NOT NULL,
    foreign key (cid) references Cars(cid) on delete cascade,
    foreign key (uid) references Users(uid) on delete cascade
)ENGINE = INNODB DEFAULT charset = utf8;