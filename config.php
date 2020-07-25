<?php

$DB_NAME = 'ecom'; //must be already created
$HOST = "localhost";
$USER = "manuver";
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