CREATE TABLE Reply(
	ISBN varchar(255),
    FID int,
    SID int,
    FOREIGN KEY (ISBN) REFERENCES Books(ISBN),
    FOREIGN KEY (FID) REFERENCES Comments(id),
    FOREIGN KEY (SID) REFERENCES Comments(id),
    PRIMARY KEY(ISBN , FID , SID)
)ENGINE = MYISAM;

