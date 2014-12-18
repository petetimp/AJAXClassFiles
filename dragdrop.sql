DROP DATABASE IF EXISTS DragDrop;

CREATE DATABASE DragDrop;

CREATE TABLE DragDrop.Users
(UserID INT NOT NULL AUTO_INCREMENT, 
Username VARCHAR(50) NOT NULL, 
Password VARCHAR(50) NOT NULL, 
PRIMARY KEY(UserID));

CREATE TABLE DragDrop.DragOrders
(DragOrderID INT NOT NULL AUTO_INCREMENT, 
DragOrder VARCHAR(100) NOT NULL, 
UserID INT NOT NULL, 
PRIMARY KEY(DragOrderID),
FOREIGN KEY (UserID) REFERENCES Users(UserID));

USE DragDrop;

INSERT INTO Users (Username, Password)  VALUES('User1', 'Password');
INSERT INTO Users (Username, Password)  VALUES('User2', 'Password');
INSERT INTO Users (Username, Password)  VALUES('User3', 'Password');


INSERT INTO DragOrders (DragOrder, UserID)  VALUES('["Menu2","Menu1","Menu5","Menu4","Menu3"]', 1);
INSERT INTO DragOrders (DragOrder, UserID)  VALUES('["Menu2","Menu3","Menu4","Menu5","Menu1"]', 2);
INSERT INTO DragOrders (DragOrder, UserID)  VALUES('["Menu5","Menu4","Menu3","Menu2","Menu1"]', 3);


SELECT * FROM Users;
SELECT * FROM DragOrders;