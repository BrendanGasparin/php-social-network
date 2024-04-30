<?php

    class SignupController extends Signup {
        private $firstname;
        private $lastname;
        private $username;
        private $email;
        private $day;
        private $month;
        private $year;
        private $dob;
        private $password;
        private $password2;

        public function __construct($firstname, $lastname, $username, $email, $day, $month, $year, $password, $password2) {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->username = $username;
            $this->email = $email;
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
            $this->password = $password;
            $this->password2 = $password2;
        }

        public function signupUser() {
            if ($this->emptyInput()) {
                header("location: ../signup.php?error=emptyinputfield");
                exit();
            }
            if ($this->invalidUsername()) {
                header("location: ../signupx.php?error=invalidusername");
                exit();
            }
            if ($this->invalidEmail()) {
                header("location: ../signup.php?error=invalidemail");
                exit();
            }
            if ($this->passwordsMatch() == false) {
                header("location: ../signup.php?error=passwordsdonotmatch");
                exit();
            }
            if ($this->userExists()) {
                header("location: ../signup.php?error=usernameoremailtaken");
                exit();
            }

            // Set DOB from year, month, and day
            $dayString = $this->day;
            if (strlen($dayString) <= 1)
                $dayString = "0" . $dayString;
            $monthString = $this->month;
            if (strlen($monthString) <= 1)
                $monthString = "0" . $monthString;
            $this->dob = $this->year . "-" . $monthString . "-" . $dayString;

            $this->addUser($this->firstname, $this->lastname, $this->username, $this->email, $this->dob, $this->password);
        }

        // Check that all required fields are filled
        private function emptyInput() {
            if (empty($this->firstname) || empty($this->lastname) || empty($this->username) || empty($this->email) || empty($this->firstname) || empty($this->password || empty($this->password2)))
                return true;
            return false;
        }

        // Allow usernames consisting of alphanumeric characters, periods, and underscores,
        // but the first character must be alphabetic.
        private function invalidUsername() {
            if (!preg_match("/^[a-zA-Z][a-zA-Z0-9._]*$/", $this->username))
                return true;
            return false;
        }

        // Check email is valid
        private function invalidEmail() {
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL))
                return false;
            return true;
        }

        // Check that the two password fields match
        private function passwordsMatch() {
            if ($this->password == $this->password2)
                return true;
            else
                return false;
        }

        // Check to see if the user already exists
        private function userExists() {
            if ($this->checkUserExists($this->username, $this->email))
                return true;
            else
                return false;
        }
    }