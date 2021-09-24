CREATE DATABASE IF NOT EXISTS ECommercePrueba;
USE ECommercePrueba;

CREATE TABLE IF NOT EXISTS Users(
Id              int(255) auto_increment not null,
UserName        varchar(100) not null,
UserLastName    varchar(255),
Email           varchar(255) not null,
Password        varchar(255) not null,
Rol             varchar(20),
Image           varchar(255),
CONSTRAINT pk_Users PRIMARY KEY(Id),
CONSTRAINT uq_Email UNIQUE(Email)
)ENGINE=InnoDb;

INSERT INTO Users VALUES(null, 'admin', 'admin', 'admin@admin.com', 'contraseña', 'admin', null);


CREATE TABLE IF NOT EXISTS Categories(
Id              int(255) auto_increment not null,
CategoryName    varchar(100) not null,
CONSTRAINT pk_Categories PRIMARY KEY(Id)
)ENGINE=InnoDb;

INSERT INTO Categories VALUES(null, 'dados');
INSERT INTO Categories VALUES(null, 'manuales');
INSERT INTO Categories VALUES(null, 'miniaturas');

CREATE TABLE IF NOT EXISTS Products(
Id              int(255) auto_increment not null,
CategoryId      int(255) not null,
ProductName     varchar(100) not null,
Description     text,
Price           float(100,2) not null,
Stock           int(255) not null,
Offer           varchar(200),
ProductDate     date not null,
Img             varchar(255),
CONSTRAINT pk_Products PRIMARY KEY(Id),
CONSTRAINT fk_Products_Categories FOREIGN KEY(CategoryId) REFERENCES Categories(Id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS Orders(
Id              int(255) auto_increment not null,
UserId          int(255) not null,
Province        varchar(100) not null,
Location        varchar(100) not null,
Direction       varchar(255) not null,
Cost            float(200,2) not null,
OrderState      varchar(20) not null,
OrderDate       date,
OrderTime       time,
CONSTRAINT pk_Orders PRIMARY KEY(Id),
CONSTRAINT fk_Orders_Users FOREIGN KEY(UserId) REFERENCES Users(Id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS Orders2Products(
Id              int(255) auto_increment not null,
OrderId         int(255) not null,
ProductId       int(255) not null,
Quantity        int(255) not null,
CONSTRAINT pk_Orders2Products PRIMARY KEY(Id),
CONSTRAINT fk_Orders2Products_Orders FOREIGN KEY(OrderId) REFERENCES Orders(Id),
CONSTRAINT fk_Orders2Products_Products FOREIGN KEY(ProductId) REFERENCES Products(Id)
)ENGINE=InnoDb;