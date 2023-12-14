USE GameReview;


/* Insert test data for the User table */ 
INSERT INTO User (email, username, password) VALUES("test@example.com", "Test User", "password");
INSERT INTO User (email, username, password) VALUES("foo@example.com", "Foo User", "password");

/* Insert test data for the Genre table */ 
INSERT INTO Genre (name, image) VALUES("FPS", "fps_image.jpeg");
INSERT INTO Genre (name, image) VALUES("Open-World", "open_world_image.jpeg");
INSERT INTO Genre (name, image) VALUES("Simulation", "simulation_image.jpeg");
INSERT INTO Genre (name, image) VALUES("Horror", "horror_image.jpeg");
INSERT INTO Genre (name, image) VALUES("Indie", "indie_image.jpeg");

/* Insert test data for the Game table */
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("Counter Strike 2", "A description", 1, "cs2_image.jpeg", 730);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("Rainbow Six Siege", "Another description", 1, "r6_image.jpeg", 359550);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("COD Modern Warfare 2", "One of the COD games", 1, "cod_mw2_image.jpeg", 10180);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("GTA V", "A description for open", 2, "gta5_image.jpeg", 271590);

/* Insert test data for the Review table */ 
INSERT INTO Review (content, raiting) VALUES("Very Good!", 5);
INSERT INTO Review (content, raiting) VALUES("Very fun but difficult", 4);
INSERT INTO Review (content, raiting) VALUES("Pretty good game. Lots of bugs", 3);

INSERT INTO Review_Game_Join (review_id, game_id) VALUES(1, 1);
INSERT INTO Review_Game_Join (review_id, game_id) VALUES(2, 1);
INSERT INTO Review_Game_Join (review_id, game_id) VALUES(3, 1);

INSERT INTO Review_User_Join (review_id, user_id) VALUES(1, 1);
INSERT INTO Review_User_Join (review_id, user_id) VALUES(2, 1);
INSERT INTO Review_User_Join (review_id, user_id) VALUES(3, 2);