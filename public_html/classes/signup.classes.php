<?php

# Methods for querying the database
class Signup extends DBHandler {

    # Returns true if the the username or email exists in the database, else returns false.
    protected function checkUserExists($username, $email) {
        $statement = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        # If the statement fails to execute then redirect to the home page with an error message
        if (!$statement->execute(array($username, $email))) {
            $statement = null;
            header("location: ../index.php?error=dbqueryfailed");
            exit();
        }

        if ($statement->rowCount() > 0)
            return true;
        return false;
    }
}