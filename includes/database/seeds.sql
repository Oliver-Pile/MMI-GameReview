USE GameReview;


/* Insert test data for the Genre table */ 
INSERT INTO Genre (name, image) VALUES("FPS", "fps_image.jpeg");
INSERT INTO Genre (name, image) VALUES("Open-World", "open_world_image.jpeg");
INSERT INTO Genre (name, image) VALUES("Simulation", "simulation_image.jpeg");
INSERT INTO Genre (name, image) VALUES("Horror", "horror_image.jpeg");
INSERT INTO Genre (name, image) VALUES("Indie", "indie_image.jpeg");

/* Insert test data for the Game table */
INSERT INTO Game (title, description, genre_id) VALUES("Counter Strike 2", "A description", 1);
INSERT INTO Game (title, description, genre_id) VALUES("Rainbow Six Siege", "Another description", 1);
INSERT INTO Game (title, description, genre_id) VALUES("Call of Duty", "One of the COD games", 1);
INSERT INTO Game (title, description, genre_id) VALUES("GTA V", "A description for open", 2);