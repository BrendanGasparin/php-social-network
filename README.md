# php-social-network
Free and open source social network software built in PHP, HTML, CSS, and JavaScript, with a MySQL database.

## Installation
Clone the repository to your server of choice. Note that the root of the website should be the /public_html/ directory and not the root directory of the repository.

    git clone git@github.com:BrendanGasparin/php-social-network.git

### Installing and configuring MySQL
To check if you already have MySQL installed on Debian Linux you can type:

    mysql --version

If you do not have mysql installed, you can install it with the following commands:

    sudo apt update
    sudo apt install mysql-client-core-8.0
    sudo apt install mysql-server

Log into the new MySQL installation with the root account and no password.

    sudo mysql -u root

Update the password for the root user (the default installation has no password).

    ALTER USER 'root'@'localhost' IDENTIFIED BY '<new password>';

Be sure to note the new password as you will need to configure PHP Social Network to use it.

Create the social network database:

    CREATE DATABASE social_network;
    exit;

Locate the setup_db.sql file in the root directory of the cloned git repository. Run it as follows:

    sudo mysql -u root -p social_network < path/to/setup_db.sql

This will import the database structure into the social_network database.

### Configuring PHP Social Network to use MySQL
From the root directory of the cloned repository, copy the credentials-template.php file to a new file called credentials.php:

    sudo cp ./public_html/credentials/credentials-template.php ./public_html/credentials/credentials.php

This new file is where PHP Social Network will look for database login information. Edit credentials.php, e.g. with Nano:

    sudo nano ./public_html/credentials/credentials.php

Insert the password you selected for the root MySQL user into this file at the appropriate place. You may also modify the MySQL username, host, and database name here.

To save and exit the credentials file in Nano, hit Control-X and then type Y and Enter at the prompt.

PHP Social Network is now configured and ready for new users!