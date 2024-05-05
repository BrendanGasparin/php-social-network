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
            // Run all input checkers
            if ($this->isFirstnameEmpty()) {
                header("location: ../signup.php?error=firstnameempty");
                exit();
            }
            if ($this->isFirstnameValidLength() == false) {
                header("location: ../signup.php?error=firstnameinvalidlength");
                exit();
            }
            if ($this->isFirstnameValid() == false) {
                header("location: ../signup.php?error=firstnameinvalid");
                exit();
            }
            if ($this->isLastnameEmpty() == false && $this->isLastnameValidLength() == false) {
                header("location: ../signup.php?error=lastnameinvalidlength");
                exit();
            }
            if ($this->isLastnameEmpty() == false && $this->isLastnameValid() == false) {
                header("location: ../signup.php?error=lastnameinvalid");
                exit();
            }
            if ($this->isUsernameEmpty()) {
                header("location: ../signup.php?error=usernameempty");
                exit();
            }
            if ($this->isUsernameValidLength() == false) {
                header("location: ../signup.php?error=usernameinvalidlength");
                exit();
            }
            if ($this->isUsernameValid() == false) {
                header("location: ../signup.php?error=usernameinvalid");
                exit();
            }
            if ($this->isUsernameTaken()) {
                header("location: ../signup.php?error=usernametaken");
                exit();
            }
            if ($this->isEmailEmpty()) {
                header("location: ../signup.php?error=emailempty");
                exit();
            }
            if ($this->isEmailValidLength() == false) {
                header("location: ../signup.php?error=emailinvalidlength");
                exit();
            }
            if ($this->isEmailValid() == false) {
                header("location: ../signup.php?error=emailinvalid");
                exit();
            }
            if ($this->isEmailTaken()) {
                header("location: ../signup.php?error=emailtaken");
                exit();
            }
            if ($this->isDOBValid())
                $this->setDOB();
            else {
                header("location: ../signup.php?error=dobinvalid");
                exit();
            }
            if ($this->isDOBValidAge() == false) {
                header("location: ../signup.php?error=dobinvalidage");
                exit();
            }
            if ($this->isPasswordsEmpty()) {
                header("location: ../signup.php?error=passwordsempty");
                exit();
            }
            if ($this->isPasswordsMatch() == false) {
                header("location: ../signup.php?error=passwordsdonotmatch");
                exit();
            }

            // Add the user to the database (via signup.classes.php)
            $this->addUser($this->firstname, $this->lastname, $this->username, $this->email, $this->dob, $this->password);
        }

        // Returns true if firstname field is empty, else returns false
        private function isFirstnameEmpty() {
            if (empty($this->firstname))
                return true;
            return false;
        }

        // Returns true if firstname contains only valid characters, otherwise false
        private function isFirstnameValid() {
            if (preg_match("/^[a-zA-Z\'\-]+(?: [a-zA-Z0-9\'\-]+)*$/", $this->firstname))
                return true;
            return false;
        }

        // Returns true if firstname is a valid length (between 1 and 64), else returns false
        private function isFirstnameValidLength() {
            if (strlen($this->firstname) > 0 && strlen($this->firstname) <= 64)
                return true;
            return false;
        }

        // Returns true if lastname field is empty, otherwise false
        private function isLastnameEmpty() {
            if (empty($this->lastname))
                return true;
            return false;
        }

        // Returns true if lastname contains only valid characters, otherwise false
        private function isLastnameValid() {
            if (preg_match("/^[a-zA-Z\'\-]+(?: [a-zA-Z0-9\'\-]+)*$/", $this->lastname))
                return true;
            return false;
        }

        // Returns true if lastname is a valid length (between 1 and 64), else returns false
        private function isLastnameValidLength() {
            if (strlen($this->firstname) > 0 && strlen($this->firstname) <= 64)
                return true;
            return false;
        }

        // Returns true if username field is empty, else returns false
        private function isUsernameEmpty() {
            if (empty($this->username))
                return true;
            return false;
        }

        // Allow usernames consisting of alphanumeric characters, periods, and underscores,
        // but the first character must be alphabetic.
        private function isUsernameValid() {
            if (preg_match("/^[a-zA-Z][a-zA-Z0-9._]*$/", $this->username))
                return true;
            return false;
        }

        // Checks the username is valid (between 4 and 32 characters)
        private function isUsernameValidLength() {
            if (strlen($this->username) > 3 && strlen($this->username) <= 32)
                return true;
            return false;
        }

        // Returns true if the username is taken, else returns false
        private function isUsernameTaken() {
            if ($this->checkUsernameExists($this->username))
                return true;
            return false;
        }

        // Check to see if the user already exists
        private function isUserExists() {
            if ($this->checkUserExists($this->username, $this->email))
                return true;
            return false;
        }

        // Returns true if the the email field is empty, else returns false
        private function isEmailEmpty() {
            if (empty($this->email))
                return true;
            return false;
        }

        // Return true if email is invalid, else return false
        private function isEmailValid() {
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL))
                return true;
            return false;
        }

        // Return true if email is a valid length, else return false
        private function isEmailValidLength() {
            $length = strlen($this->email);
            if ($length >= 5 && $length <= 400)
                return true;
            return false;
        }

        // Return true if email is taken, else return false
        private function isEmailTaken() {
            if ($this->checkEmailExists($this->email))
                return true;
            return false;
        }

        // Return true if the selected day, month, and year are a proper SQL date
        private function isDOBValid() {
            // Return false if any of the DOB inputs are not ints
            if(ctype_digit($this->day) == false || ctype_digit($this->month) == false || ctype_digit($this->year) ==  false)
                return false;

            // Convert all the strings to ints
            $this->day = intval($this->day);
            $this->month = intval($this->month);
            $this->year = intval($this->year);

            // If day, month, or year fall outside their normal bounds, return false
            if ($this->day < 1 || $this->day > 31 || $this->month < 1 || $this->month > 12)
                return false;

            // Check the day is valid for the month (allowing for valid leap year days)
            if ($this->month == 2) {
                if ($this->year % 100 == 0 && $this->year % 400 == 0 && $this->day > 29)
                    return false;
                else if ($this->year % 100 == 0 && $this->day > 28)
                    return false;
                else if ($this->year % 4 == 0 && $this->day > 29)
                    return false;
                else if ($this->day > 28)
                    return false;
            }
            else if (($this->month == 9 || $this->month == 4 || $this->month == 6 || $this->month == 9) && $this->day > 30)
                return false;
            else if ($this->day > 31)
                return false;

            // Check date is a legal SQL date
            if ($this->year < 1000 || $this->year > 9999)
                return false;

            return true;
        }

        // TODO: Check rules in datepicker.js so that everything matches. Should exclude anyone under 13 and over 130(?)
        // Check that the user input a legal age for the website
        private function isDOBValidAge() {
            $birthdate = new DateTime($this->dob);  // user DOB
            $currentDate = new DateTime();          // current date and time

            // Calculate the difference in years between the birthdate and the current date
            $interval = $birthdate->diff($currentDate);
            $age = $interval->y;

            // Check if user is over 13 and under 130
            if ($age < 13 || $age > 130)
                return false;

            return true;
        }

        // Set DOB from valid year, month, and day properties
        private function setDOB() {
            $dayString = $this->day;
            if (strlen($dayString) <= 1)
                $dayString = "0" . $dayString;
            $monthString = $this->month;
            if (strlen($monthString) <= 1)
                $monthString = "0" . $monthString;
            $this->dob = $this->year . "-" . $monthString . "-" . $dayString;
        }

        // Returns true if either password field is empty, else returns false
        private function isPasswordsEmpty() {
            if (empty($this->password) || empty($this->password2))
                return true;
            return false;
        }

        // Returns true if the password fields match, else returns false
        private function isPasswordsMatch() {
            if ($this->password == $this->password2)
                return true;
            else
                return false;
        }

        // Check that all required fields are filled
        private function isInputEmpty() {
            if (empty($this->firstname) || empty($this->lastname) || empty($this->username) || empty($this->email) || empty($this->firstname) || empty($this->password || empty($this->password2)))
                return true;
            return false;
        }
    }