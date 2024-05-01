<?php

    /*
        login.inc.php
        Author: Brendan Gasparin
        Date: 1 May 2024
        Handles login form input.
    */

    if (isset($_POST["submit"])) {
        // Get the data
        $username = $_POST["username"];
        $password = $_POST["password"];

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Instantiate the SignupController class
        include "../classes/dbhandler.classes.php";
        include "../classes/login.classes.php";
        include "../classes/login-controller.classes.php";
        $loginController = new LoginController($username, $password);

        // Run error handlers and user signup
        $loginController->loginUser();

        // Go back to the home page
        header("location: ../index.php");
    }