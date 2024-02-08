CREATE DATABASE v_parrot;

USE v_parrot;

CREATE TABLE categories(
    categorie_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    categorie_name VARCHAR(255) NOT NULL
);

INSERT INTO categories VALUES('Services_Carrosserie');
INSERT INTO categories VALUES('Services_Mecanique');
INSERT INTO categories VALUES('Services_Entretien');

CREATE TABLE services(
    service_id int(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    service_title VARCHAR(255) NOT NULL,
    service_description VARCHAR(255) NOT NULL,
    service_price VARCHAR(255) NOT NULL,
    service_image VARCHAR(255) NOT NULL,
    service_categorie INT,
    FOREIGN KEY (service_categorie) REFERENCES categories(categorie_id)
);

CREATE TABLE opening_hours(
    day_name VARCHAR(20)NOT NULL,
    open_am VARCHAR(20)NOT NULL,
    closed_am VARCHAR(20)NOT NULL,
    open_pm VARCHAR(20)NOT NULL,
    closed_pm VARCHAR(20)NOT NULL
);