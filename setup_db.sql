CREATE TABLE users {
    id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    firstname TINYTEXT not null,
    lastname TINYTEXT not null,
    username TINYTEXT not null,
    email TINYTEXT not null,
    dob DATE not null,
    group INT not null,
    passwordhash LONGTEXT not null
};