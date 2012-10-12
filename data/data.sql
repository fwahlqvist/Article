CREATE TABLE article (
  id int(11) NOT NULL auto_increment,
  artist varchar(100) NOT NULL,
  title varchar(100) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO article (artist, title)
    VALUES  ('The  Military  Wives',  'In  My  Dreams');
INSERT INTO article (artist, title)
    VALUES  ('Adele',  '21');
INSERT INTO article (artist, title)
    VALUES  ('Bruce  Springsteen',  'Wrecking Ball (Deluxe)');
INSERT INTO article (artist, title)
    VALUES  ('Lana  Del  Rey',  'Born  To  Die');
INSERT INTO article (artist, title)
    VALUES  ('Gotye',  'Making  Mirrors');