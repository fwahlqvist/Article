CREATE TABLE article (
  id int(11) NOT NULL auto_increment,
  content text(65000) NOT NULL,
  title varchar(100) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO article (content, title)
    VALUES  ('The  Military  Wives',  'In  My  Dreams');
INSERT INTO article (content, title)
    VALUES  ('Adele',  '21');
INSERT INTO article (content, title)
    VALUES  ('Bruce  Springsteen',  'Wrecking Ball (Deluxe)');
INSERT INTO article (content, title)
    VALUES  ('Lana  Del  Rey',  'Born  To  Die');
INSERT INTO article (content, title)
    VALUES  ('Gotye',  'Making  Mirrors');