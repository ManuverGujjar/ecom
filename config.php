<?php

$DB_NAME = 'ecom';
$HOST = "localhost";
$USER = "root";
$PASS = "";




// REQUEST KEY

$UPDATE_KEY = 'Update';
$DELETE_KEY = 'Delete Selected';
$SAVE_KEY = 'Save';




// Utility functions should be in different file but its okay for this project
function go($loc) {
	header("Location: $loc");
	die();
}

?>