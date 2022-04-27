insert into age_restricted_games_catalog(age_restricted_games_catalog_id, age_info, catalog_id)
values
(1,18,1),
(2,13,2),
(3,16,3),
(4,18,4),
(5,7,5);
insert into games_available_for_everyone(games_available_for_everyone_id, catalog_id)
values
(1,6),
(2,7),
(3,8),
(4,9),
(5,10);
insert into belongs_to (catalog_id,game_id)
values
(1,1),
(2,2),
(3,3),
(4,4),
(5,5);
insert into does(user_id,install_id)
values
(1,1),
(2,2),
(3,3),
(4,4),
(5,5);
insert into downloads(player_id,game_id)
values
(1,1),
(2,2),
(3,3),
(4,4),
(5,5);
insert into owns(player_id,library_id)
values
(1,1),
(2,2),
(3,3),
(4,4),
(5,5);
insert into uploads(publisher_id,game_id)
values
(1,1),
(2,2),
(3,3),
(4,4),
(5,5),
(6,6);

insert into multi_player(multi_player_id,genre_id)
values
(1,6),
(2,7),
(3,8),
(4,9),
(5,10);
insert into single_player(single_player_id,genre_id)
values
(1,1),
(2,2),
(3,3),
(4,4),
(5,5);

insert into user(user_id,email,password)
values
(1,'Sid@gmail.com','boneless123'),
(2,'george04@yahoo.com','hackerman27'),
(3,'Jill72@jacobs-university.de','perfection23'),
(4,'mcd@gmail.com','cookiemonster78'),
(5,'nickjo@outlook.com','cowboy01'),
(6,'hannamelon@gmail.com','gamergirl'),
(7,'thegiftedgamer@outlook.com','giftedgamer'),
(8,'verdansklover@yahoo.com','verdanskislife'),
(9,'melgibbs@abcgames.de','abcgames_02'),
(10,'haroldcrawford@gmail.com','hcrafword'),
(11,'gibbs002@outlook.com','schnitzel'),
(12,'bentwelve@hotmail.com','ben_12'),
(13'`willmason@gmail.com','wilmason33'),
(14,'lillystuart@outlook.com','lilaclover'),
(15,'billyraylovato@gmail.com','billyray65');

insert into player(email,password,user_id,player_id,first_name,last_name,date_of_birth,country_of_residence)
values
('Sid@gmail.com','boneless123',1,1,'Sid','Chhabra','2001-09-02','Germany'),
('george04@yahoo.com','hackerman27',2,2,'George','Kelly','1997-03-05','USA'),
('nickjo@outlook.com','cowboy01',5,3,'Nick','Joe','1999-01-05','France'),
('hannamelon@gmail.com','gamergirl',6,4,'Hanna','Melon','2003-07-10','Ukraine'),
('thegiftedgamer@outlook.com','giftedgamer',7,5,'John','Bates','1980-05-24','UK'),
('verdansklover@yahoo.com','verdanskislife',8,6,'Kerem','Topbas','2001-08-08','Turkey');

insert into publisher(email,password,user_id,publisher_id,company_tax_id,company_name)
values
('Jill72@jacobs-university.de','perfection23',3,1,'VWASXFT20','Compcam'),
('mcd@gmail.com','cookiemonster78',4,2,'BYTXERT67','Superstar'),
('melgibbs@abcgames.de','abcgames_02',9,3,'ILY33FGMK','ABC'),
('haroldcrawford@gmail.com','hcrafword',10,4,'FVB23MSDL','Venus'),
('frenchtoast@gmail.com', 'ouiouibaguette', 1,5, 'SERERK', 'ASCII');

insert into installation(install_id,size_of_game)
values
(1,93),
(2,25),
(3,10),
(4,20),
(5,122),
(6,34),
(7,22),
(8,42),
(9,68),
(10,25);


insert into library(library_id,is_downloaded,game_update)
values
(1,0,1),
(2,1,1),
(3,1,0),
(4,0,0),
(5,1,0),
(6,0,0),
(7,1,0),
(8,1,1),
(9,0,1),
(10,0,0);

insert into game(game_id,media,publisher,genre_type,name,platform,description)
values
(1,1,'Compcap','Action','The Younger Scrolls','PC','Open World RPG with free-roam'),
(2,1,'Superstar','Shooting','Grand Theft Cars','PC','Open World shooting with free-roam'),
(3,1,'Fightzilla','Strategy','God of Peace','PC','A long journey in another world'),
(4,1,'Compcap','Shooting','Road Fighters','PS','player vs player battles with tons of weapons'),
(5,1,'Bentendo','Action','Super Smash Arena','Console','Crossover of your favorite characters in 1 game'),
(6,1,'Snowflake','Sports','FIF4','PC','A football video game with a lot of players from real life'),
(7,1,'Fightzilla','Racing','AlleyRacing','Mobile','A racing game with lots of drifting'),
(8,2,'Venus','Action','Brooklyn','PC','Help keeping the neighborhood safe'),
(9,1,'BearBear','Simulation','Zooland','Mobile','Manage a Zoo with cute residents like Penguin Alvin'),
(10,0,'Diamond','Fashion','Style Me','PC','Become the stylist of famous hollywood actress Nina Gabriel');

insert into catalog(catalog_id,genre_type)
values
(1,'Adventure'),
(2,'Sports'),
(3,'Strategy'),
(4,'Action'),
(5,'Shooting'),
(6,'Simulation'),
(7,'Arcade'),
(8,'Mystery'),
(9,'RPG'),
(10,'Puzzle'); 

insert into genre(genre_id,genre_type)
values
(1,'Fantasy'),
(2,'Action'),
(3,'Strategy'),
(4,'Fighting'),
(5,'Shooting'),
(6,'Sports'),
(7,'Racing'),
(8,'Adventure'),
(9,'Fashion'),
(10,'Simulation');



insert into review(review_id,score,comments)
values
(1,10,'Amazing gameplay with stunning features!'),
(2,8,'Fun time playing this game with amazing fight sequence!'),
(3,5,'Not a fun game! Game glitches frequently! BAD >:('),
(4,8,'Fun casual game with amazing graphics'),
(5,10,'Best game to play with Friends/Family. A+'),
(6,4,'Boring after an hour, not worth the time'),
(7,9,'One of the best games I played recently'),
(8,1,'Is this a joke????'),
(9,6,'Pretty mediocre but good soundtrack'),
(10,8,'Would definitely recommend');

insert into published_game(published_games_id,game_downloads,game_id,publish_date)
values
(1,102.000,1,'2013-02-12'),
(2,23.000,2,'2018-12-03'),
(3,5.000,3,'2020-10-05'),
(4,32.000,4,'2017-06-12'),
(5,246.000,5,'2015-07-10'),
(6,14.000,6,'2018-09-22');

insert into upcoming_game (upcoming_games_id,expected_release_date,game_id)
values
(1,'2021-12-24',7),
(2,'2022-01-04',8),
(3,'2021-11-13',9),
(4,'2023-03-07',10);

insert into gets(review_id, game_id)
Values
(1,10),
(2,9),
(3,8),
(4,7),
(5,6),
(6,5),
(7,4),
(8,3),
(9,2),
(10,1);

insert into is_in(genre_id, game_id)
Values
(2,1),
(5,2),
(3,3),
(5,4),
(2,5),
(6,6),
(7,7),
(2,8),
(10,9),
(9,10);




INSERT INTO leaves (user_id, review_id)
Values 
(6,1), 
(6,2), 
(6,3), 
(6,4),
(6,5),
(6,6),
(2,7),
(2,8),
(2,9),
(3,10);

INSERT INTO downloads(player_id, game_id)
values 
(6,10), 
(6,9), 
(6,8), 
(5,10),
(5,1),
(5,3), 
(2,1),
(2,2);
