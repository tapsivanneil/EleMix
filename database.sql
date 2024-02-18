CREATE DATABASE elemix;

USE elemix;

CREATE TABLE elements (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    element_1 VARCHAR(250),
    element_2 VARCHAR(250),
    combination VARCHAR(250)
) 