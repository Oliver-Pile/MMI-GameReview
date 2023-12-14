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
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("Counter Strike 2", "For over two decades, Counter-Strike has offered an elite competitive experience, one shaped by millions of players from across the globe. And now the next chapter in the CS story is about to begin. This is Counter-Strike 2.", 1, "cs2_image.jpeg", 730);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("Rainbow Six Siege", "Tom Clancy's Rainbow Six® Siege is an elite, realistic, tactical team-based shooter where superior planning and execution triumph. It features 5v5 attack vs. defense gameplay and intense close-quarters combat in destructible environments.", 1, "r6_image.jpeg", 359550);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("COD Modern Warfare 2", "The most-anticipated game of the year and the sequel to the best-selling first-person action game of all time, Modern Warfare 2 continues the gripping and heart-racing action as players face off against a new threat dedicated to bringing the world to the brink of collapse.", 1, "cod_mw2_image.jpeg", 10180);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("GTA V", "When a young street hustler, a retired bank robber and a terrifying psychopath find themselves entangled with some of the most frightening and deranged elements of the criminal underworld, the U.S. government and the entertainment industry, they must pull off a series of dangerous heists to survive in a ruthless city in which they can trust nobody, least of all each other.", 2, "gta5_image.jpeg", 271590);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("Red Dead Redemption 2", "Winner of over 175 Game of the Year Awards and recipient of over 250 perfect scores, RDR2 is the epic tale of outlaw Arthur Morgan and the infamous Van der Linde gang, on the run across America at the dawn of the modern age. Also includes access to the shared living world of Red Dead Online.", 2, "rdr2_image.jpeg", 1174180);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("Cities: Skylines", "Cities: Skylines is a modern take on the classic city simulation. The game introduces new game play elements to realize the thrill and hardships of creating and maintaining a real city whilst expanding on some well-established tropes of the city building experience.", 3, "cities_skylines_image.jpeg", 255710);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("Microsoft Flight Simulator", "From gliders and helicopters to wide-body jets, fly highly detailed and accurate aircraft in the Microsoft Flight Simulator 40th Anniversary Edition. The world is at your fingertips.", 3, "mfs_image.jpeg", 1250410);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("Lethal Company", "You are a contracted worker for the Company. Your job is to collect scrap from abandoned, industrialized moons to meet the Company's profit quota. You can use the cash you earn to travel to new moons with higher risks and rewards--or you can buy fancy suits and decorations for your ship. Experience nature, scanning any creature you find to add them to your bestiary. Explore the wondrous outdoors and rummage through their derelict, steel and concrete underbellies. Just never miss the quota.", 4, "lethal_company_image.jpeg", 1966720);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("Escape the Backrooms", "Escape the Backrooms is a 1-4 player co-op horror exploration game. Traverse through eerie backrooms levels while avoiding entities and other danger to try and escape. Free content updates with new levels and game modes keep the community rewarded.", 4, "backrooms_image.jpeg", 1943950);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("Terraria", "Dig, Fight, Explore, Build: The very world is at your fingertips as you fight for survival, fortune, and glory. Will you delve deep into cavernous expanses in search of treasure and raw materials with which to craft ever-evolving gear, machinery, and aesthetics? Perhaps you will choose instead to seek out ever-greater foes to test your mettle in combat? Maybe you will decide to construct your own city to house the host of mysterious allies you may encounter along your travels?", 5, "terraria_image.jpeg", 105600);
INSERT INTO Game (title, description, genre_id, image, steam_app_id) VALUES("Star Dew Valley", "You've inherited your grandfather's old farm plot in Stardew Valley. Armed with hand-me-down tools and a few coins, you set out to begin your new life. Can you learn to live off the land and turn these overgrown fields into a thriving home?", 5, "stardew_image.jpeg", 413150);


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