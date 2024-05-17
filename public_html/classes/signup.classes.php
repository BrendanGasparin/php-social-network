<?php

# Methods for querying the database
class Signup extends DBHandler {
    # Returns true if the the username or email exists in the database, else returns false.
    protected function addUser($firstname, $lastname, $username, $email, $dob, $password) {
        $query = $this->connect()->prepare('INSERT INTO users (first_name, last_name, username, email, dob, user_group, password_hash) VALUES (?, ?, ?, ?, ?, ?, ?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        # If the statement fails to execute then redirect to the home page with an error message
        if (!$query->execute(array($firstname, $lastname, $username, $email, $dob, 0, $hashedPassword))) {
            $query = null;
            header("location: ../index.php?error=dbqueryfailed");
            exit();
        }
    
        $query = null;
    }

    // Returns true if the email exists in the database, else returns false.
    protected function checkEmailExists($email) {
        $query = $this->connect()->prepare('SELECT email FROM users WHERE email = ?;');

        # If the query fails to execute then redirect to the home page with an error message
        if (!$query->execute(array($email))) {
            $query = null;
            header("location: ../index.php?error=dbqueryfailed");
            exit();
        }

        if ($query->rowCount() > 0)
            return true;
        return false;
    }

    # Returns true if the the username or email exists in the database, else returns false.
    protected function checkUserExists($username, $email) {
        $query = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        # If the query fails to execute then redirect to the home page with an error message
        if (!$query->execute(array($username, $email))) {
            $query = null;
            header("location: ../index.php?error=dbqueryfailed");
            exit();
        }

        if ($query->rowCount() > 0)
            return true;
        return false;
    }

    # Returns true if the username exists in the database, else returns false
    protected function checkUsernameExists($username) {
        $query = $this->connect()->prepare('SELECT username FROM users WHERE username = ?;');

        # If the query fails to execute then redirect to the home page with an error message
        if (!$query->execute(array($username))) {
            $query = null;
            header("location: ../index.php?error=dbqueryfailed");
            exit();
        }

        if ($query->rowCount() > 0)
            return true;
        return false;
    }
}