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

        private function emptyInput() {
            if (empty($this->$firstname) || empty($this->$lastname) || empty($this->$username) || empty($this->$email) || empty($this->$firstname) || empty($this->$password || empty($this->$password2)))
                return true;
            else
                return false;
        }

        /*
            Allow usernames consisting of alphanumeric characters, periods, and underscores,
            but the first character must be alphabetic.
        */
        private function invalidUsername() {
            if (!pregmatch("/^[a-zA-Z][a-zA-Z0-9._]*$/", $this->username))
                return true;
            else
                return false;
        }

        private function invalidEmail() {
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
                return false;
            else
                return true;
        }

        private function passwords_match() {
            if ($this->password == $this->password2)
                return true;
            else
                return false;
        }
    }