CREATE DATABASE IF NOT EXISTS mystore;

USE mystore;

CREATE TABLE IF NOT EXISTS customer (
    Customer_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Customer_Name VARCHAR(50) NOT NULL,
    Customer_LastName VARCHAR(100) NOT NULL,
    Gender VARCHAR(5) NOT NULL,
    Age INT(11) NOT NULL,
    Birthdata VARCHAR(10) NOT NULL,
    Address VARCHAR(150) NOT NULL,
    Province VARCHAR(50) NOT NULL,
    Zipcode VARCHAR(5) NOT NULL,
    PhoneNumber VARCHAR(15) NOT NULL,
    Customer_Description TEXT,
    Username VARCHAR(50) NOT NULL,
    password VARCHAR(250) NOT NULL,
    RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
