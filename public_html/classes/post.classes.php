<?php

# Insert a new post into the database
class Post extends DBHandler {
    # Returns true if the the username or email exists in the database, else returns false.
    protected function addPost($user_id, $text_content, $audience) {
        $query = $this->connect()->prepare('INSERT INTO posts (user_id, text_content, audience) VALUES (?, ?, ?);');
    
        # If the statement fails to execute then redirect to the home page with an error message
        if (!$query->execute(array($user_id, $text_content, $audience))) {
            $query = null;
            header("location: ../index.php?error=dbqueryfailed");
            exit();
        }
    
        $query = null;
    }
}