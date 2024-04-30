CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY not null,
    firstname TINYTEXT not null,
    lastname TINYTEXT not null,
    username TINYTEXT not null,
    email TINYTEXT not null,
    dob DATE not null,
    user_group INT not null,
    password_hash LONGTEXT not null
);