<?php
class DBHandler {
    private function connect() {
        require_once '../credentials/credentials.php';
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