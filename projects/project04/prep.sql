CREATE TABLE Projects (
    projectId int(11) NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    description varchar(5000) NOT NULL,
    statusId int(11) DEFAULT 1,
    PRIMARY KEY(projectId)
);

CREATE TABLE Statuses (
    statusId int(11) NOT NULL AUTO_INCREMENT,
    statusName varchar(25) NOT NULL,
    PRIMARY KEY(statusId)
);

ALTER TABLE Projects
ADD FOREIGN KEY(statusId) REFERENCES Statuses(statusId);

INSERT INTO Statuses(statusName) VALUES('New');
INSERT INTO Statuses(statusName) VALUES('Rejected');
INSERT INTO Statuses(statusName) VALUES('Backlog');
INSERT INTO Statuses(statusName) VALUES('On Hold');
INSERT INTO Statuses(statusName) VALUES('In Progress');
INSERT INTO Statuses(statusName) VALUES('In Testing');
INSERT INTO Statuses(statusName) VALUES('In Deployment');
INSERT INTO Statuses(statusName) VALUES('Done');