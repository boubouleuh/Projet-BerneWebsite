CREATE DATABASE newsletter;
USE newsletter;

CREATE TABLE register_newsletter(

    ID INT PRIMARY KEY AUTO_INCREMENT,
    Mail VARCHAR(255) NOT NULL unique,
    Date DATE DEFAULT CURRENT_DATE NOT NULL
);