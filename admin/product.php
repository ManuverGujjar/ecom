
<?php 
include __DIR__.'/../base.php';
?>

<?php
	


?>

<main class="container">

	<form action='update-product.php' method="POST">
		<?php

		$products = Product::get();


		if ($products) {
			echo "<table class='table'>";
			echo "<tr>";
			foreach ($products[0]->row as $key => $value) {
				echo "<th>$key</th>";
			}
			echo "<th>Select</th>";
			echo "</tr>";

		} else {
			echo "<div class='alert alert-secondary alert-dismissible fade show'>Seems like 
				there is nothing here yet<button type='button' class='close' 
				data-dismiss='alert' aria-label='Close'>
    			<span aria-hidden='true'>&times;</span>
  				</button></div>";
		}


		foreach ($products as $product) {
			echo "<tr>";
			foreach ($product->row as $key => $value) {
				echo "<td>$value</td>";
			}
			echo "<td><input type='checkbox' name='$product->id'></td>";
			echo "</tr>";
		}
		echo "</table>";
		?>

		<input type='submit' class="btn btn-danger" value="<?php echo $DELETE_KEY ?>"  name='action'>
		<input type='submit' class="btn btn-warning" value="<?php echo $UPDATE_KEY ?>"  name='action'>

		<a href="add-product.php" class="btn btn-primary">Add</a>
	</form>


</main>

<?php

include __DIR__.'/../footer.php';
?>