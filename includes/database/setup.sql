DROP DATABASE IF EXISTS GameReview;
CREATE DATABASE GameReview;
USE GameReview;

CREATE TABLE IF NOT EXISTS User(
	id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Genre(
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
	image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Game(
	id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
	image VARCHAR(255),
    steam_app_id INT NOT NULL,
	genre_id INT NOT NULL,
    FOREIGN KEY (genre_id) REFERENCES Genre(id)
);

CREATE TABLE IF NOT EXISTS Review(
	id INT AUTO_INCREMENT PRIMARY KEY,
    content VARCHAR(255) NOT NULL,
	raiting INT
);

CREATE TABLE IF NOT EXISTS Review_Game_Join(
	review_id INT,
    game_id INT,
    PRIMARY KEY (review_id, game_id),
    FOREIGN KEY (review_id) REFERENCES Review(id),
    FOREIGN KEY (game_id) REFERENCES Game(id)
);

CREATE TABLE IF NOT EXISTS Review_User_Join(
	review_id INT,
    user_id INT,
    PRIMARY KEY (review_id, user_id),
    FOREIGN KEY (review_id) REFERENCES Review(id),
    FOREIGN KEY (user_id) REFERENCES User(id)
);

CREATE TABLE IF NOT EXISTS User_Game_Bookmark(
	game_id INT,
    user_id INT,
    PRIMARY KEY (game_id, user_id),
    FOREIGN KEY (game_id) REFERENCES Game(id),
    FOREIGN KEY (user_id) REFERENCES User(id)
);