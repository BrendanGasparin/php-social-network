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

        private function signupUser() {
            if ($this->emptyInput()) {
                header("location: ../index.php?error=emptyinputfield");
                exit();
            }
            if ($this->invalidUsername()) {
                header("location: ../index.php?error=invalidusername");
                exit();
            }
            if ($this->invalidEmail()) {
                header("location: ../index.php?error=invalidemail");
                exit();
            }
            if ($this->passwordMatch() == false) {
                header("location: ../index.php?error=passwordsdonotmatch");
                exit();
            }
            if ($this->userExists()) {
                header("location: ../index.php?error=usernameoremailtaken");
                exit();
            }
        }

        // Check that all required fields are filled
        private function emptyInput() {
            if (empty($this->$firstname) || empty($this->$lastname) || empty($this->$username) || empty($this->$email) || empty($this->$firstname) || empty($this->$password || empty($this->$password2)))
                return true;
            return false;
        }

        // Allow usernames consisting of alphanumeric characters, periods, and underscores,
        // but the first character must be alphabetic.
        private function invalidUsername() {
            if (!pregmatch("/^[a-zA-Z][a-zA-Z0-9._]*$/", $this->$username))
                return true;
            return false;
        }

        // Check email is valid
        private function invalidEmail() {
            if (!filter_var($this->$email, FILTER_VALIDATE_EMAIL))
                return false;
            return true;
        }

        // Check that the two password fields match
        private function passwordsMatch() {
            if ($this->$password == $this->$password2)
                return true;
            else
                return false;
        }

        // Check to see if the user already exists
        private function userExists() {
            if ($this->checkUserExists($this->$username, $this->$email))
                return true;
            else
                return false;
        }
    }