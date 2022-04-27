create table user
(
    user_id int primary key not null auto_increment,
    email varchar(50),
    password varchar(50)
);

create table player
(
    email varchar(50),
    password varchar(50),
    user_id int not null,
    player_id int primary key not null unique auto_increment,
    first_name varchar(50),
    last_name varchar(50),
    date_of_birth date,
    country_of_residence varchar(50),
    foreign key(user_id) references user(user_id)
);

create table publisher
(
    email varchar(50),
    password varchar(50),
    user_id int not null,
    publisher_id int primary key not null auto_increment,
    company_tax_id varchar(30),
    company_name varchar(50),
    foreign key(user_id) references user(user_id)
);

create table installation
(
    install_id int primary key not null unique auto_increment,
    size_of_game int not null
);

create table library
(
    library_id int primary key not null unique auto_increment,
    is_downloaded bit not null,
    game_update bit not null
);

create table review
(
    review_id int primary key not null auto_increment,
    score int,
    comments varchar(150)     
);

create table does /* relationship between player and installation */
(
    user_id int not null,
    install_id int not null,
    primary key(user_id,install_id),
    foreign key(user_id) references player(player_id),
    foreign key(install_id) references installation(install_id)
);

create table owns /* relationship between player and library*/
(
    player_id int not null,
    library_id int not null,
    primary key(player_id,library_id),
    foreign key(player_id) references player(player_id),
    foreign key(library_id) references library(library_id)
);

create table leaves /* relationship between player and review*/
(
    user_id int not null,
    review_id int not null,
    primary key(user_id,review_id),
    foreign key(user_id) references player(player_id),
    foreign key(review_id) references review(review_id)
);

create table game (
    game_id int primary key auto_increment unique not null,
    media VARBINARY (1000),
    publisher CHAR(50),
    genre_type varchar(30),
    name CHAR(50),
    platform CHAR(50),
    description LONGTEXT
);

create table uploads
(
    publisher_id int not null,
    game_id int not null,
    primary key(publisher_id,game_id),
    foreign key(publisher_id) references publisher(publisher_id),
    foreign key(game_id) references game(game_id)
);

create table gets
(
    review_id int not null,
    game_id int not null,
    primary key(review_id,game_id),
    foreign key(review_id) references review(review_id),
    foreign key(game_id) references game(game_id)
);

create table catalog (
    catalog_id INT primary key auto_increment not null,
    genre_type CHAR(20)
);

create table belongs_to 
(
    catalog_id int not null,
    game_id int not null,
    primary key(catalog_id,game_id),
    foreign key(catalog_id) references catalog(catalog_id),
    foreign key(game_id) references game(game_id)
);

create table genre (
    genre_id INT auto_increment not null,
    genre_type CHAR(20),
    primary key (genre_id)
);

create table is_in 
(
    genre_id int not null,
    game_id int not null,
    primary key(genre_id,game_id),
    foreign key(genre_id) references genre(genre_id),
    foreign key(game_id) references game(game_id)
);

create table downloads
(
    player_id int not null,
    game_id int not null,
    primary key(player_id,game_id),
    foreign key(player_id) references player(player_id),
    foreign key(game_id) references game(game_id)
);

create table published_game (
    published_games_id int primary key auto_increment not null,
    game_downloads int,
    game_id int not null,
    publish_date date,
    foreign key(game_ID) references game(game_id)
);

create table upcoming_game (
    upcoming_games_id int primary key auto_increment not null,
    expected_release_date date,
    game_id int not null,
    foreign key(game_id) references game(game_id)
);

create table single_player (
    single_player_id INT primary key auto_increment not null,
    genre_id int not null,
    foreign key(genre_id) references genre(genre_id)
);

create table multi_player (
    multi_player_id int primary key auto_increment not null,
    genre_id int not null,
    foreign key(genre_id) references genre(genre_id)
);

create table age_restricted_games_catalog (
    age_restricted_games_catalog_id int primary key auto_increment not null,
    age_info int,
    catalog_id int not null,
    foreign key(catalog_id) references catalog(catalog_id)
);

create table games_available_for_everyone (
    games_available_for_everyone_id int primary key auto_increment not null,
    catalog_id int not null,
    foreign key(catalog_id) references catalog(catalog_id)
);
