CREATE DATABASE v_parrot;

USE v_parrot;

CREATE TABLE profils(
    profil_id INT(11)NOT NULL PRIMARY KEY,
    profil_name VARCHAR(255) NOT NULL
);

INSERT INTO profils VALUES(1, 'Administrateur');
INSERT INTO profils VALUES(2, 'Employé');

CREATE TABLE users(
    user_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    password_system TINYINT NOT NULL,
    profil_categorie INT,
    FOREIGN KEY (profil_categorie)REFERENCES profils(profil_id)
);

CREATE TABLE opening_hours(
    day_name VARCHAR(20)NOT NULL,
    open_am VARCHAR(20)NOT NULL,
    closed_am VARCHAR(20)NOT NULL,
    open_pm VARCHAR(20)NOT NULL,
    closed_pm VARCHAR(20)NOT NULL
);

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

CREATE TABLE options(
    option_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    option_name VARCHAR (255) NOT NULL
);

CREATE TABLE cars(
    car_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    marque VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    kilometers VARCHAR(50) NOT NULL,
    years VARCHAR(50) NOT NULL,
    price VARCHAR(50) NOT NULL,
    color VARCHAR(50) NOT NULL,
    energie VARCHAR(50) NOT NULL,
    image VARCHAR(50) NOT NULL,
);

CREATE TABLE options_cars(
    option_id INT(11)NOT NULL,
    car_id INT(11)NOT NULL,
    FOREIGN KEY (option_id) REFERENCES options (option_id),
    FOREIGN KEY (car_id) REFERENCES cars (car_id),
    PRIMARY KEY (option_id, car_id)
);

CREATE TABLE send_avis(
    send_avis_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    avis VARCHAR (255) NOT NULL,
    note VARCHAR (255) NOT NULL,
    name VARCHAR (255) NOT NULL,
    comment VARCHAR (255) NOT NULL
);

CREATE TABLE save_avis(
    save_avis_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    avis_save VARCHAR (255) NOT NULL,
    note_save VARCHAR (255) NOT NULL,
    name_save VARCHAR (255) NOT NULL,
    comment_save VARCHAR (255) NOT NULL
);

CREATE TABLE rdv(
    rdv_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR (255) NOT NULL,
    lastname VARCHAR (255) NOT NULL,
    categorie VARCHAR (255) NOT NULL,
    comment VARCHAR (255) NOT NULL,
    phone VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    deal TINYINT NOT NULL,
    dealby VARCHAR (255) NOT NULL
);