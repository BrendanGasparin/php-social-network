<?php
class DBHandler {
    protected function connect() {
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