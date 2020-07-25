
<?php 
include __DIR__.'/../base.php';
?>

<?php

	function search($data, $search_val) {
		foreach ($data as $key => $value) {
			if ($value == $search_val) return $key;
		}
	}

	if (isset($_POST['action']) && $_POST['action'] == $SAVE_KEY) {
		
		$cat = new Category($_POST);
		$cat->save();
		go('category.php');
	} 

	
	if (isset($_POST['action']) && $_POST['action'] == $UPDATE_KEY) {
		$id = intval(search($_POST, "on"));
		$cat = Category::get_by_id($id);
	} 
	
	if (isset($_POST['action']) && $_POST['action'] == $DELETE_KEY) {
		foreach ($_POST as $key => $value) {
			if ($value == 'on') {
				Category::get_by_id(intval($key))->delete();
			}
		}
		go("category.php");
	} 

?>

<main class="container">

	<form action='' method="POST">
		<div class="form-group">
			<input type="hidden" value="<?php echo $cat->id; ?>" name='id'>
			<input type="text" required placeholder="Category name" value="<?php echo $cat->row['name']; ?>" name="name" class="form-control">
		</div>
		<div class="form-group">
			<textarea required placeholder="Description" placeholder="Description" name="description" class="form-control"><?php echo $cat->row['description'] ?>
			</textarea>
		</div>
		
		<input type="submit" value="<?php echo $SAVE_KEY ?>" name='action' class="btn btn-primary">
	</form>


</main>

<?php

include __DIR__.'/../footer.php';
?>