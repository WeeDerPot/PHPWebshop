-- Borvidék tábla
CREATE TABLE `borvidekek` (
    `videk_id` int NOT null AUTO_INCREMENT,
    `videk` varchar(255) NOT null,
    PRIMARY KEY (`videk_id`)
);

-- Bortípus tábla
CREATE TABLE `bortipusok` (
    `tipus_id` int NOT null AUTO_INCREMENT,
    `tipus` varchar(255) NOT null,
    PRIMARY KEY (`tipus_id`)
);

-- Borjelleg tábla
CREATE TABLE `borjellegek` (
    `jelleg_id` int NOT null AUTO_INCREMENT,
    `jelleg` varchar(255) NOT null,
    PRIMARY KEY (`jelleg_id`)
);

-- Felhasználók tábla
CREATE TABLE `users` (
    `user_id` int NOT null AUTO_INCREMENT,
    `user_nev` varchar(255) NOT null,
    `user_tel` varchar(255) NOT null,
    PRIMARY KEY (`user_id`)
);

-- Termékek tábla
CREATE TABLE `termekek` (
    `termek_id` int NOT null AUTO_INCREMENT,
    `termek_nev` varchar(255) NOT null,
    `termek_ar` int not null,
    `termek_kep` varchar(255),
    `termek_videk` int,
    `termek_tipus` int,
    `termek_jelleg` int,
    `termek_mennyiseg` int,
    FOREIGN KEY (`termek_videk`) REFERENCES `borvidekek`(`videk_id`),
    FOREIGN KEY (`termek_tipus`) REFERENCES `bortipusok`(`tipus_id`),
    FOREIGN KEY (`termek_jelleg`) REFERENCES `borjellegek`(`jelleg_id`),
    PRIMARY KEY (`termek_id`)
);

-- Kosár tábla
CREATE TABLE `kosar` (
    `kosar_id` int NOT null AUTO_INCREMENT,
    `user_id` int ,
    `termek_id` int ,
    PRIMARY KEY (`kosar_id`)
);

-- Borvidékek tábla tartalma
INSERT INTO `borvidekek` (`videk`) VALUES
('Sopron'),
('Nagy-Somló'),
('Zala'),
('Balaton felvidék'),
('Badacsony'),
('Balatonfüred'),
('Balatonboglár'),
('Pannonhalma'),
('Mór'),
('Tolna'),
('Szekszárd'),
('Pécs'),
('Kunság'),
('Mátra'),
('Eger'),
('Bükk'),
('Tokaj');

-- Bortipus tábla tartalma
INSERT INTO `bortipusok` (`tipus`) VALUES
('fehér'),
('vörös'),
('rosé'),
('gyöngyöző'),
('siller'),
('jégbor'),
('bio'),
('eszencia'),
('pezsgő');

-- Borjelleg tábla tartalma
INSERT INTO `borjellegek` (`jelleg`) VALUES
('száraz'),
('félszáraz'),
('édes'),
('félédes');

-- Termékek tábla feltöltése
INSERT INTO `termekek` (`termek_nev`, `termek_ar`, `termek_kep`, `termek_videk`, `termek_tipus`, `termek_jelleg`, `termek_mennyiseg`) VALUES
('Afúz ali', 4500, './assets/wine1.jpg', 1, 1, 1, 50),
('Bakator', 3000, './assets/wine2.jpg', 2, 2, 2, 40),
('Balafánt', 3500, './assets/wine3.jpg', 3, 3, 3, 45),
('Tokaji szamorodni', 3750, './assets/wine4.jpg', 4, 4, 4, 50),
('Badacsonyi kéknyelű', 5000, './assets/wine5.jpg', 5, 5, 1, 60),
('Cabernet Franc', 3000, './assets/wine1.jpg', 6, 6, 2, 30),
('Cabernet sauvignon', 3500, './assets/wine2.jpg', 7, 7, 3, 35),
('Chardonnay', 4000, './assets/wine3.jpg', 8, 8, 4, 45),
('Cserszegi fűszeres', 5500, './assets/wine4.jpg', 9, 9, 1, 50),
('Ezerfürtű', 3000, './assets/wine5.jpg', 10, 1, 2, 10),
('Egri bikavér', 2750, './assets/wine1.jpg', 11, 2, 3, 15),
('Furmint', 5000, './assets/wine2.jpg', 12, 3, 4, 45),
('Hárslevelű', 4500, './assets/wine3.jpg', 13, 4, 1, 60),
('Kékfrankos', 5500, './assets/wine4.jpg', 14, 5, 2, 30),
('Muskotály', 3500, './assets/wine5.jpg', 15, 6, 3, 25),
('Merlot', 4000, './assets/wine1.jpg', 16, 7, 4, 30),
('Aszúesszencia', 4500, './assets/wine2.jpg', 17, 8, 1, 25),
('Rizling', 3000, './assets/wine3.jpg', 5, 9, 2, 15),
('Öt Bor', 7000, './assets/wine4.jpg', 17, 8, 3, 5),
('Sauvignon Blanc', 5500, './assets/wine5.jpg', 7, 9, 4, 20);


-- Termék tábla lekérdezése
SELECT `termek_id`, `termek_nev`, `termek_ar`, `termek_kep`, `borvidekek`.`videk`, `bortipusok`.`tipus`, `borjellegek`.`jelleg`, `termek_mennyiseg` 
FROM `termekek`
INNER JOIN `borvidekek` ON `termekek`.`termek_videk` = `borvidekek`.`videk_id`
INNER JOIN `bortipusok` ON  `termekek`.`termek_tipus` = `bortipusok`.`tipus_id`
INNER JOIN `borjellegek` ON `termekek`.`termek_jelleg` = `borjellegek`.`jelleg_id`;