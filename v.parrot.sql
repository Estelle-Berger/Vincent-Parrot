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
    profil_category INT,
    FOREIGN KEY (profil_category)REFERENCES profils(profil_id)
);

INSERT INTO users VALUES('Vincent', 'Parrot', 'vincent.parrot@garagiste.com', 
'$2y$10$Wlo/xHt5SYZYBNXM8qdbSelWo3GXhpioRCMSn3kmxaeUs1qKcmMXS', 1, '1');

CREATE TABLE opening_hours(
    day_name VARCHAR(20)NOT NULL,
    open_am VARCHAR(20)NOT NULL,
    closed_am VARCHAR(20)NOT NULL,
    open_pm VARCHAR(20)NOT NULL,
    closed_pm VARCHAR(20)NOT NULL
);

CREATE TABLE categories(
    category_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(255) NOT NULL
);

INSERT INTO categories VALUES('Services_Carrosserie');
INSERT INTO categories VALUES('Services_Mecanique');
INSERT INTO categories VALUES('Services_Entretien');

CREATE TABLE services(
    service_id int(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    service_title VARCHAR(255) NOT NULL,
    service_description VARCHAR(255) NOT NULL,
    service_price VARCHAR(255) NOT NULL,
    service_picture VARCHAR(255) NOT NULL,
    service_category INT,
    FOREIGN KEY (service_category) REFERENCES categories(category_id)
);

CREATE TABLE options(
    option_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    option_name VARCHAR (255) NOT NULL
);

INSERT INTO options VALUES('3 portes');
INSERT INTO options VALUES('5 portes');
INSERT INTO options VALUES('Climatisations');
INSERT INTO options VALUES('Airbags latéraux');
INSERT INTO options VALUES('Airbags frontaux');
INSERT INTO options VALUES('GPS');
INSERT INTO options VALUES('Fermeture entralisée');
INSERT INTO options VALUES('Direction assistée');
INSERT INTO options VALUES('Caméra de recul');
INSERT INTO options VALUES('Alarme antivol');

CREATE TABLE cars(
    car_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    brand VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    kilometers VARCHAR(50) NOT NULL,
    years VARCHAR(50) NOT NULL,
    price VARCHAR(50) NOT NULL,
    color VARCHAR(50) NOT NULL,
    fuel VARCHAR(50) NOT NULL,
    picture VARCHAR(50) NOT NULL
);

CREATE TABLE options_cars(
    option_id INT(11)NOT NULL,
    car_id INT(11)NOT NULL,
    FOREIGN KEY (option_id) REFERENCES options (option_id),
    FOREIGN KEY (car_id) REFERENCES cars (car_id),
    PRIMARY KEY (option_id, car_id)
);

CREATE TABLE avis(
    avis_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    avis VARCHAR (255) NOT NULL,
    note VARCHAR (255) NOT NULL,
    name VARCHAR (255) NOT NULL,
    comment VARCHAR (255) NOT NULL,
    is_valid TINYINT NOT NULL
);

CREATE TABLE rdv(
    rdv_id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR (255) NOT NULL,
    lastname VARCHAR (255) NOT NULL,
    category VARCHAR (255) NOT NULL,
    comment VARCHAR (255) NOT NULL,
    phone VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    deal TINYINT NOT NULL,
    dealby VARCHAR (255) NOT NULL
);