<?php
    session_start();

    if (isset($_POST["submit"])) {
        // Get the data
        $user_id = $_SESSION["id"];
        $text_content = $_POST["text_content"];
        $audience = 0;

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if(strlen($text_content) > 65535)
            die("Content is too large to be stored in the database.");

        // Instantiate the PostController class
        include "../classes/dbhandler.classes.php";
        include "../classes/post.classes.php";
        include "../classes/post-controller.classes.php";
        $postController = new PostController($user_id, $text_content, $audience);

        // Add the post
        $postController->setPost($user_id, $text_content, $audience);

        // Go back to the home page
        header("location: ../index.php");
    }