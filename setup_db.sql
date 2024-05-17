CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY not null,
    first_name VARCHAR(64) not null,
    last_name VARCHAR(64) not null,
    username VARCHAR(32) not null,
    email VARCHAR(400) not null,
    dob DATE not null,
    user_group INT not null,
    password_hash LONGTEXT not null
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INTEGER NOT NULL,
    parent_post_id INTEGER NOT NULL,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    text_content MEDIUMTEXT,
    audience INT NOT NULL,
    likes INT NOT NULL DEFAULT 0,
    shares INT NOT NULL DEFAULT 0,
    impressions INT DEFAULT 0 NOT NULL DEFAULT 0,
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(parent_post_id) REFERENCES posts(id)
);

/* Limit text posts to 65535 characters */
DELIMITER //

CREATE TRIGGER before_insert_posts
BEFORE INSERT ON posts
FOR EACH ROW
BEGIN
    IF CHAR_LENGTH(NEW.text_content) > 65535 THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Content exceeeds the limited allowed length of 65,535 characters.';
    END IF;
END//
CREATE TRIGGER before_update_posts
BEFORE UPDATE ON posts
FOR EACH ROW
BEGIN
    IF CHAR_LENGTH(NEW.text_content) > 65535 THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Content exceeeds the limited allowed length of 65,535 characters.';
    END IF;
END//

DELIMITER ;
