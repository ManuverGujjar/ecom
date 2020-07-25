<?php 

/*

    This is Migration file for creating required database tables for this 
    project

*/



include_once ('db/db_connection.php');
include_once ('config.php');

$db = new DBConnection();


try {
    $db->exec("DROP DATABASE $DB_NAME");
    
} catch(Exception $e) {
    // pass
} finally {
    $db->exec("CREATE DATABASE $DB_NAME");
}

$db = new DBConnection($DB_NAME);

$db->exec(
    "CREATE TABLE category(".
    "id INT NOT NULL AUTO_INCREMENT, ". 
    "name VARCHAR(100) NOT NULL, ". 
    "description VARCHAR(500) NOT NULL, ". 
    "PRIMARY KEY ( Id ) ". 
    ");"
);


$db->exec(
    "CREATE TABLE sub_category(".
    "id INT NOT NULL AUTO_INCREMENT, ". 
    "name VARCHAR(100) NOT NULL, ". 
    "description VARCHAR(500) NOT NULL,". 
    "category_id INT NOT NULL, ".
    "PRIMARY KEY ( Id ),".
    "FOREIGN KEY (category_id) REFERENCES category(id)". 
    ");"
);




$db->exec(
    "CREATE TABLE product(".
    "id INT NOT NULL AUTO_INCREMENT, ". 
    "name VARCHAR(100) NOT NULL, ". 
    "description VARCHAR(500) NOT NULL, ". 
    "quantity INT NOT NULL, ". 
    "price INT NOT NULL,". 
    "sub_category_id INT NOT NULL, ".
    "image_link VARCHAR(200) NOT NULL, ".
    "PRIMARY KEY ( Id ), ". 
    "FOREIGN KEY (sub_category_id) REFERENCES sub_category( id )".
    ");"
);
 
?>