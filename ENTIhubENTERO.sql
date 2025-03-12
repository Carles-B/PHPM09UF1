DROP TABLE IF EXISTS messages_multimedia;
DROP TABLE IF EXISTS responses;
DROP TABLE IF EXISTS multimedia;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
	id_user INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(32) NOT NULL,
	username VARCHAR(16)
	email VARCHAR(32) NOT NULL,
	birthdate DATE NOT NULL,
	password CHAR(32) NOT NULL,
	status INT NOT NULL DEFAULT 1
);
	
CREATE TABLE messages (
	id_message INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	message VARCHAR(240) NOT NULL,
	post_time DATETIME NOT NULL,
	is_response BOOLEAN NOT NULL DEFAULT FALSE,
	status INT NOT NULL DEFAULT 1,
	id_user INT UNSIGNED,
	FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE multimedia (
	id_multimedia INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	media VARCHAR(128) NOT NULL,
	status INT NOT NULL DEFAULT 1
);

CREATE TABLE responses (
	id_response INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id_message INT UNSIGNED NOT NULL,
	id_message_response INT UNSIGNED NOT NULL,
	FOREIGN KEY (id_message) REFERENCES messages(id_message),
	FOREIGN KEY (id_message_response) REFERENCES messages(id_message)
);

CREATE TABLE messages_multimedia (
	id_message_multimedia INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id_message INT UNSIGNED NOT NULL,
	id_multimedia INT UNSIGNED NOT NULL,
	FOREIGN KEY (id_message) REFERENCES messages(id_message),
	FOREIGN KEY (id_multimedia) REFERENCES multimedia(id_multimedia)
);


