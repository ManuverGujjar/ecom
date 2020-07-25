
<?php 
include __DIR__.'/../base.php';
?>

<?php

	
	$cat_all = Category::get();


?>

<main class="container">

	<form action='update-sub-category.php' method="POST">
		<div class="form-group">
			<input type="text" required placeholder="Category name" name="name" class="form-control">
		</div>
		<div class="form-group">
			<textarea required placeholder="Description" placeholder="Description" name="description" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label>Select category</label>
			<select name="category_id" class="form-control">
				<?php foreach ($cat_all as $cat) {
					$name = $cat->row['name'];
					echo "<option>$name</option>";
				} ?>
			</select>
		</div>

		
		<input type="submit" value="<?php echo $SAVE_KEY ?>" name='action' class="btn btn-primary">
	</form>


</main>

<?php

include __DIR__.'/../footer.php';
?>