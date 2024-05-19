<?php
session_start();
require_once 'dbhandler.classes.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Post extends DBHandler {
    # Insert a new post into the database
    protected function addPost($id, $text_content, $audience) {
        $query = $this->connect()->prepare('INSERT INTO posts (user_id, text_content, audience) VALUES (?, ?, ?);');
    
        # If the statement fails to execute then redirect to the home page with an error message
        if (!$query->execute(array($id, $text_content, $audience))) {
            $query = null;
            header("location: ../index.php?error=dbqueryfailed");
            exit();
        }
    
        $query = null;
    }

    // Return a JSON encoded array containing posts for the user's feed
    public function selectPosts($id) {
        $query = $this->connect()->prepare('SELECT * FROM posts JOIN users ON posts.user_id=users.id ORDER BY created DESC;');

        #If the statement fails to execute then redirect to the home page with an error message
        if (!$query->execute(array())) {
            $query = null;
            header("location: ../index.php?error=postfeedfailed");
            exit();
        }

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        $num_rows = count($rows);

        /* $posts_feed = [];
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc())
                $posts_feed[] = $row;
        } */

        $query = null;

        //return json_encode($posts_feed);
        return json_encode($rows);
    }
}

if (isset($_SESSION['id']) && isset($_GET['action']) && $_GET['action'] == 'getPosts') {
    $posts_feed = new Post();
    echo $posts_feed->selectPosts($_SESSION['id']);
} else {
    echo 'Action parameter not set or incorrect.';
}