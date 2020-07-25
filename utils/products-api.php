<?php 
include_once ('../db/models.php');

$limit = 5;

if (isset($_GET['sub_category_id'])) {
	$sub_id = $_GET['sub_category_id'];
	$offset = 0;
	if (isset($_GET['offset'])) $offset = intval($_GET['offset']);
	
	$products = Product::get_by_foregion_key($sub_id, $offset, $limit);

	if ($products) {
		echo "[";
		foreach ($products as $product) {

			echo "{";
			echo "'id' : '$product->id',";
			foreach ($product->row as $key => $value) {
				echo "'$key': '$value',";
			}
			echo "},";
		}
		echo "]";
	}
}




?>