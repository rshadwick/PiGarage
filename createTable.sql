use mydb;
CREATE TABLE GarageTime (
    ID int NOT NULL AUTO_INCREMENT,
    DoorUP datetime,
    DoorDown datetime,
    PRIMARY KEY (ID)
);

CREATE TABLE GarageTemp (
    ID int NOT NULL AUTO_INCREMENT,
    Temp varchar(255),
    Humidity varchar(255),
    RecordDate datetime,
    PRIMARY KEY (ID)
);
