use heroku_28353d2db29bb65;

CREATE TABLE photography(
    timeAndDay date NOT NULL PRIMARY KEY,
    aperature INTEGER,
    shutter INTEGER,
    ISO INTEGER,
    place VARCHAR(64),
    photoSubject VARCHAR(64) 
);
CREATE TABLE writing(
    name VARCHAR(64) PRIMARY KEY,
    description VARCHAR(255)
);
CREATE TABLE gameDesign(
    nameOfGame VARCHAR(64) PRIMARY KEY,
    engine VARCHAR(64)
);
CREATE TABLE art(
    nameOfPiece VARCHAR(64) PRIMARY KEY
);
CREATE TABLE user (
    email VARCHAR(255) NOT NULL PRIMARY KEY,
    password VARCHAR(64) NOT NULL,
    access INTEGER(1)
);