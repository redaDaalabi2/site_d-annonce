CREATE DATABASE IF NOT EXISTS annonce;

use annonce;

CREATE TABLE IF NOT EXISTS utilisateur 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    nom varchar(50),
    prenom varchar(50),
    email varchar(250),
    mo_de_passe varchar(250)
);

CREATE TABLE IF NOT EXISTS offre 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    photo varchar(50),
    titre varchar(150),
    description varchar(500),
    prix float,
    utilisateur_Id INT NOT NULL,
    FOREIGN KEY (utilisateur_Id) REFERENCES utilisateur(id)
);

CREATE TABLE IF NOT EXISTS demande 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    photo_doffre varchar(50),
    titre_doffre varchar(150),
    description_doffre varchar(500),
    prix_doffre float,
    utilisateur_Id INT NOT NULL,
    FOREIGN KEY (utilisateur_Id) REFERENCES utilisateur(id)
);
