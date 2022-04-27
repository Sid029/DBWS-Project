
/* Query 1 All the games that have expected release dates starting from the 1st of January 2022 that are available on the ‘PC’ platform and belong to the ‘Action’ genre. Helps to manage upcoming games*/

select game.game_id,expected_release_date,name,description,genre_type
from upcoming_game,game
where (upcoming_game.game_id = game.game_id) && (expected_release_date>'2022-01-01') && game.genre_type IN (select genre_type
														from genre
														where platform = 'PC' && genre_type = 'Action')
														order by game.game_id;

/* Query 2 In this query, we search for and return every game that is a 'shooting' game or is in the 'shooting' games genre */


select name,game_id,description,company_name
from game
join publisher on publisher.company_name = game.publisher
where genre_type = 'Shooting'
order by game_id;

/* Query 3 In this query we return name of games that have the highest ratings */
SELECT game.name
FROM game
INNER JOIN gets on game.game_id = gets.game_id
INNER JOIN review on gets.review_id=review.review_id
WHERE review.score = (SELECT MAX(review.score) from review);


/* Query 4 In this query, we search for games that are only available on the 'PC' platform and also belong to the 'action' genre and order them by game id
Or returning PC games in the Action genre*/
select game.game_id, name, platform
from game
where (platform= 'PC' && genre_type = 'Action')
order by game.game_id;


/* Query 5 In this query we search for games that have not been published yet with no media so that we can notify the publishers to promote
Games with no media content, ordered by their name*/
select distinct game.game_id, name
From upcoming_game,game
where (media=0 && upcoming_game.expected_release_date>='2016-01-01')
order by game.name;


/* Query 6 In this query we search for all the games published by a single publisher specifically 'Compcap' */
select distinct name,game.game_id,description,publisher
from game
where publisher = 'Compcap'
order by game_id;


/*Query 7 In thsi query we search for emails of all the players that left a review */
SELECT DISTINCT user.email
FROM user
INNER JOIN leaves on leaves.user_id = user.user_id
INNER JOIN review on review.review_id = leaves.review_id
WHERE user.user_id;


/* Query 8 In this query we search for people who are more than 18 years old and are citziens of the United States of America. (Due to differing regulations on age restrictions
for games among different countries*/

select first_name, last_name,country_of_residence,date_of_birth,player_id
from player
where date_of_birth < '2003-01-01' && country_of_residence = 'USA'
order by player_id;

/* Query 9 In this query we search forplayers who are from a certain country here 'Germany' that have installed huge games or games that have a large size on the 'PC' platform
classifed based on their 'genre_type' using 'group by'. Useful for statistics and research*/

select distinct player_id,country_of_residence,first_name,last_name
from player,genre
join installation on size_of_game > 40
where country_of_residence = 'Germany' && (genre.genre_type IN (select game.genre_type from game where platform = 'PC' group by genre_type));


/* Query 10 In this query we search for the games that are on the PC platform grouped based on genre type using 'group by'. Helps to have more customized results for 
various purposes*/

select genre_type,name,description
from game
where platform = 'PC' 
group by genre_type;


/* Query 11 In this query we return all the names and the corresponding platforms of all games that have been downloaded by players*/
SELECT game.platform AS plat, game.name
FROM game
INNER JOIN downloads ON downloads.game_id = game.game_id
INNER JOIN player ON player.player_id = downloads.player_id
HAVING plat = 'PC';


/* Query 12 In this query we search for the average value of the scores or ratings of all the games in the database*/
select avg(score) AS average
from review,game
where (game.genre_type IN (select genre_type
				from genre));

