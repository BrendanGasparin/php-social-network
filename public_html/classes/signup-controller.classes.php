<?php

    class SignupController {
        private $firstname;
        private $lastname;
        private $username;
        private $email;
        private $dob;
        private $password;
        private $password2;

        public function __construct($firstname, $lastname, $username, $email, $dob, $password, $password2) {
            $this->$firstname = $firstname;
            $this->$lastname = $lastname;
            $this->$username = $username;
            $this->$email = $email;
            $this->$dob = $dob;
            $this->$password = $password;
            $this->$password2 = $password2;
        }
    }