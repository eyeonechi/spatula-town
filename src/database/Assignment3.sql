/* INFO20003 Database Systems
 * Semester2 2016
 * Assignment 3
 * SQL Table Generation and Inserts
 * Ivan Ken Weng Chee
 * 736901
 */

DROP TABLE IF EXISTS `OrderLineItem`;

DROP TABLE IF EXISTS `Spatula`;

CREATE TABLE IF NOT EXISTS `Spatula` (
	`idSpatula` INT NOT NULL AUTO_INCREMENT,
    `ProductName` VARCHAR(50) NOT NULL,
    `Type` ENUM('Drugs', 'Food', 'Paints', 'Plaster') NOT NULL,
	`Size` VARCHAR(50) NOT NULL,
    `Colour` VARCHAR(50) NOT NULL,
    `Price` Decimal(10, 2) NOT NULL,
    `QuantityInStock` INT NOT NULL,
    PRIMARY KEY (`idSpatula`)
) ENGINE = INNODB;

DROP TABLE IF EXISTS `Order`;

CREATE TABLE IF NOT EXISTS `Order` (
	`idOrder` INT NOT NULL AUTO_INCREMENT,
    `RequestedTime` DATETIME NOT NULL,
    `ResponsibleStaffMember` VARCHAR(100) NOT NULL,
    `CustomerDetails` VARCHAR(300) NOT NULL,
    PRIMARY KEY (`idOrder`)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `OrderLineItem` (
	`idSpatula` INT NOT NULL,
    `idOrder` INT NOT NULL,
    `Quantity` INT NOT NULL,
    INDEX `featured_in_idx` (`idSpatula` ASC),
    INDEX `contains_idx` (`idOrder` ASC),
    CONSTRAINT `featured_in`
		FOREIGN KEY (`idSpatula`)
        REFERENCES `Spatula` (`idSpatula`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
	CONSTRAINT `contains`
		FOREIGN KEY (`idOrder`)
        REFERENCES `Order` (`idOrder`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE = INNODB;

INSERT IGNORE INTO Spatula VALUES (
	DEFAULT,
	"Gigantic Shovel",
    'Drugs',
    10,
    "Blue",
    10.00,
    20
);

INSERT IGNORE INTO Spatula VALUES (
	DEFAULT,
	"Fuzzy Duck",
    'Plaster',
    5,
    "Red",
    6.00,
    10
);

INSERT IGNORE INTO Spatula VALUES (
	DEFAULT,
	"Illuminati Stick",
    'Paints',
    8,
    "Purple",
    15.00,
    5
);

INSERT IGNORE INTO Spatula VALUES (
	DEFAULT,
	"Magikarp Flipper",
    'Food',
    3,
    "Orange",
    3.00,
    13
);

INSERT IGNORE INTO Spatula VALUES (
	DEFAULT,
	"Selfie Stick",
    'Plaster',
    6,
    "Black",
    8.00,
    25
);

INSERT INTO Spatula VALUES (
	DEFAULT,
    "Out of Reach",
    'Paints',
    6,
    "Green",
    4.00,
    0
);

INSERT INTO Spatula VALUES (
	DEFAULT,
    "John Cena",
    'Drugs',
    6,
    "Transparent",
    20.00,
    0
);

INSERT INTO Spatula VALUES (
	DEFAULT,
    "What The Spatula",
    'Plaster',
    9,
    "Pink",
    1.00,
    0
);

INSERT INTO Spatula VALUES (
	DEFAULT,
    "Spatularambe",
    'Food',
    13,
    "Black",
    16.00,
    0
);

INSERT INTO Spatula VALUES (
	DEFAULT,
    "Pen Pineapple Apple Pen",
    'Drugs',
    20,
    "Orange",
    13.00,
    0
);

INSERT IGNORE INTO `Order` VALUES (
	DEFAULT,
    "2016-10-10 12:00:00",
    "Ivan",
    "John Cena"
);

INSERT IGNORE INTO `Order` VALUES (
	DEFAULT,
    "2016-10-11 13:00:00",
    "Ivan",
    "Donald Trump"
);

INSERT IGNORE INTO `Order` VALUES (
	DEFAULT,
    "2016-10-12 14:00:00",
    "Ivan",
    "Hilary Clinton"
);

INSERT IGNORE INTO `Order` VALUES (
	DEFAULT,
    "2016-10-13 15:00:00",
    "Ivan",
    "Pewdiepie"
);

INSERT IGNORE INTO `Order` VALUES (
	DEFAULT,
    "2016-10-14 16:00:00",
    "Ivan",
    "Doge"
);

SET @OID = (
	SELECT `Order`.idOrder
    FROM `Order`
    WHERE `Order`.RequestedTime = "2016-10-10 12:00:00"
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Gigantic Shovel"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);

SET @OID = (
	SELECT `Order`.idOrder
    FROM `Order`
    WHERE `Order`.RequestedTime = "2016-10-11 13:00:00"
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Gigantic Shovel"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Fuzzy Duck"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);

SET @OID = (
	SELECT `Order`.idOrder
    FROM `Order`
    WHERE `Order`.RequestedTime = "2016-10-12 14:00:00"
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Gigantic Shovel"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Fuzzy Duck"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Illuminati Stick"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);

SET @OID = (
	SELECT `Order`.idOrder
    FROM `Order`
    WHERE `Order`.RequestedTime = "2016-10-13 15:00:00"
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Gigantic Shovel"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Fuzzy Duck"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Illuminati Stick"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Magikarp Flipper"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);

SET @OID = (
	SELECT `Order`.idOrder
    FROM `Order`
    WHERE `Order`.RequestedTime = "2016-10-14 16:00:00"
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Gigantic Shovel"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Fuzzy Duck"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Illuminati Stick"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Magikarp Flipper"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);
SET @SID = (
	SELECT Spatula.idSpatula
    FROM Spatula
    WHERE Spatula.ProductName = "Selfie Stick"
);
INSERT IGNORE INTO OrderLineItem VALUES (
	@SID,
    @OID,
    1
);
