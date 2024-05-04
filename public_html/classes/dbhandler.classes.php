<?php
class DBHandler {
    protected function connect() {
        // Optional PHP error reporting
        /* error_reporting(E_ALL);
        ini_set('display_errors', 1); */

        include '../credentials/credentials.php';

        try {
            $dbhandler = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $username, $password);
            return $dbhandler;
        }
        catch (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br />";
            die();
        }
    }
}