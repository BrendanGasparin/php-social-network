<?php
    /*
        signup.inc.php
        Author: Brendan Gasparin
        Date: 29 April 2024
        Handles sign up form input.
    */

    if (isset($_POST["submit"])) {
        // Get the data
        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        $email = $_POST["email"];

        $day = $_POST["day-picker"];
        $month = $_POST["month-picker"];
        $year = $_POST["year-picker"];

        // Instantiate the SignupController class
        include "../classes/signup.classes.php";
        include "../classes/signup-controller.classes.php";
        $signupController = new SignupController($firstName, $lastName, $username, $email, $dob, $password, $password2);

        // TODO: Run error handlers and user signup
        // TODO: Go back to the home page
    }