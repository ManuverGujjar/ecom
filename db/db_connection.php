<?php

include __DIR__ . "/../config.php";


class DBConnection {
    private $conn;
    private $database_name;

    function __construct($database_name=null) {
        global $DB_NAME, $HOST, $USER, $PASS;

        $this->database_name = $database_name;

        if ($database_name == null) {
            $this->conn = new PDO("mysql:host=$HOST;", $USER, $PASS);
        } else {
            $this->conn = new PDO("mysql:host=$HOST;dbname=$database_name;", $USER, $PASS);
        }
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function query($sql_query) {
        global $DB_NAME, $HOST, $USER, $PASS;
        if ($this->database_name == null) {
            $conn = new mysqli($HOST, $USER, $PASS);
        } else {
            $conn = new mysqli($HOST, $USER, $PASS, $this->database_name);
        }
        $res = $conn->query($sql_query);
        return $res;
    }

    function exec($sql_query) {

        $query = $this->conn->prepare($sql_query);
        $query->execute();
        $result = $query->setFetchMode(PDO::FETCH_ASSOC); 

        return $result;
    }

}


// $db_connection = new DBConnection($GLOBALS['DB_NAME']);

?>