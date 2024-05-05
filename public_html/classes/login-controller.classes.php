<?php

    class LoginController extends Login {
        private $username;
        private $password;

        public function __construct($username, $password) {
            $this->username = $username;
            $this->password = $password;
        }

        // Attempt to log user into the website
        public function loginUser() {
            if ($this->emptyInput()) {
                header("location: ../index.php?error=emptyinputfield");
                exit();
            }

            $this->getUser($this->username, $this->password);
        }

        // Check that all required fields are filled
        private function emptyInput() {
            if (empty($this->username))
                return true;
            return false;
        }
    }