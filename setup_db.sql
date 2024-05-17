CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY not null,
    first_name VARCHAR(64) not null,
    last_name VARCHAR(64) not null,
    username VARCHAR(32) not null,
    email VARCHAR(400) not null,
    dob DATE not null,
    user_group INT not null,
    password_hash LONGTEXT not null
);