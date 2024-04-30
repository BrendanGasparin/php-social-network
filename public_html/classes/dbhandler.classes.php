<?php
    require_once '../credentials/credentials.php';

    class DBHandler {
        private function connect() {
            try {
                $dbhandler = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $username, $password);
                return $dbhandler;
            }
            catch (PDEOException $e) {
                print "Error: " . $e->getMessage() . "<br />";
                die();
            }
        }
    }