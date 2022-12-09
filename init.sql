CREATE TABLE Utilisateur( 
eMail varchar(100) PRIMARY KEY,
nom varchar(30) NOT NULL,
prenom  varchar(30) NOT NULL,
motDePasse varchar(70) NOT NULL,
estFromager bool NOT NULL
);

CREATE TABLE Fromage(
nom varchar(60),
departementFabrication varchar(30),
urlWikipedia varchar(100),
lait varchar(30) NOT NULL,
image varchar(60) NOT NULL,
typePate varchar(40) NOT NULL,
vin varchar(40) NOT NULL,
PRIMARY KEY (nom, departementFabrication)
);

CREATE TABLE Favori(
nomFromage varchar(50),
idUtilisateur varchar(100),
FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(eMail),
FOREIGN KEY (nomFromage) REFERENCES Fromage(nom),
PRIMARY KEY (nomFromage, idUtilisateur)
);

CREATE TABLE Vendre(
mailVendeur varchar(100),
nomBoutique varchar(50) NOT NULL,
ville varchar(30) NOT NULL,
departement varchar(50),
fromages varchar(150),
FOREIGN KEY (fromages,departement) REFERENCES Fromage(nom,departementFabrication),
FOREIGN KEY (mailVendeur) REFERENCES Utilisateur(eMail),
PRIMARY KEY (mailVendeur)
);

CREATE TABLE Commenter(
nomFromage varchar(50),
user varchar(100),
avis varchar(200),
FOREIGN KEY (nomFromage) REFERENCES Fromage(nom),
FOREIGN KEY (user) REFERENCES Utilisateur(eMail),
PRIMARY KEY (nomFromage, user)
);

CREATE TABLE Noter(
nomFromage varchar(50),
user varchar(100),
note numeric CHECK(note<=5),
FOREIGN KEY (nomFromage) REFERENCES Fromage(nom),
FOREIGN KEY (user) REFERENCES Utilisateur(eMail),
PRIMARY KEY (nomFromage, user)
);


CREATE TABLE DEPARTEMENT(
nom varchar(50),
numero varchar(3),
image varchar(200),
PRIMARY KEY(nom)
);

CREATE TABLE ITINERAIRE(
nom varchar(50),
fromageries varchar(200),
FOREIGN KEY (fromageries) REFERENCES Vend(nomBoutique),
PRIMARY KEY (nom)
);
