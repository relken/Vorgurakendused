CREATE TABLE rain_loomaaed
( id INT NOT NULL AUTO_INCREMENT,
  nimi VARCHAR(50),
  vanus INT,
  liik VARCHAR(50),
  CONSTRAINT id PRIMARY KEY (id)
);

ALTER TABLE rain_loomaaed
  ADD puur INT AFTER liik;
  
INSERT INTO rain_loomaaed (nimi, vanus, liik, puur)
VALUES ('Kitty',16,'kass',1),
	   ('Berta',2,'koer',2),
       ('Emira',1,'koer',2),
	   ('Krooks',4,'konn',3),
       ('Kroko',6,'krokodill',3),
       ('Kõre',3,'konn',1),
       ('Titi',10,'kass',2),
       ('Niutsu',5,'kass',1),
       ('Nässu',17,'koer',2);

SELECT nimi, puur FROM  `rain_loomaaed` 
WHERE puur =1

SELECT MIN( vanus ) AS Noorim, MAX( vanus ) AS Vanim
FROM  `rain_loomaaed`

SELECT puur, COUNT( id ) AS puuris_loomi FROM  `rain_loomaaed` 
GROUP BY puur

UPDATE `rain_loomaaed`
SET vanus = vanus + 1;