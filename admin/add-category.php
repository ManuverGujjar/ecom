
<?php 
include __DIR__.'/../base.php';
?>

<?php
	
	foreach ($_POST as $key => $value) {
		echo "$key : $value<br>";
	}

?>

<main class="container">

	<form action='update-category.php' method="POST">
		<div class="form-group">
			<input type="text" required placeholder="Category name" name="name" class="form-control">
		</div>
		<div class="form-group">
			<textarea required placeholder="Description" placeholder="Description" name="description" class="form-control"></textarea>
		</div>
		
		<input type="submit" value="<?php echo $SAVE_KEY ?>" name='action' class="btn btn-primary">
	</form>


</main>

<?php

include __DIR__.'/../footer.php';
?>