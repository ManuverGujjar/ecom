
<?php 
include __DIR__.'/../base.php';
?>


<main class="container">

	<form action='update-category.php' method="POST">
		<?php

		$categories = Category::get();

		
		if ($categories) {
			echo "<table class='table'>";
			echo "<tr>";

			foreach ($categories[0]->row as $key => $value) {
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
		
		foreach ($categories as $category) {
			echo "<tr>";
			foreach ($category->row as $key => $value) {
				echo "<td>$value</td>";
			}
			echo "<td><input type='checkbox' name='$category->id'></td>";
			echo "</tr>";
		}
		echo "</table>";
		?>

		<input type='submit' class="btn btn-danger" value="<?php echo $DELETE_KEY ?>"  name='action'>
		<input type='submit' class="btn btn-warning" value="<?php echo $UPDATE_KEY ?>"  name='action'>

		<a href="add-category.php" class="btn btn-primary">Add</a>
	</form>


</main>

<?php

include __DIR__.'/../footer.php';
?>