<?php

    class DBHandler {
        private function connect() {
            try {
                $username = "root";
                $password = "";
                $dbhandler = new PDO('mysql:host=localhost;dbname=phpsocialnetwork', $username, $password);
                return $dbhandler;
            }
            catch (PDEOException $e) {
                print "Error: " . $e->getMessage() . "<br />";
                die();
            }
        }
    }