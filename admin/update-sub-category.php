
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
		$data = $_POST;
		$data['category_id'] = Category::get_by_name($_POST['category_id'])->id;
		$scat = new SubCategory($data);
		$scat->save();
		go('sub-category.php');
	} 

	
	if (isset($_POST['action']) && $_POST['action'] == $UPDATE_KEY) {
		$id = intval(search($_POST, "on"));
		$cat = SubCategory::get_by_id($id);
		$cat_all = Category::get();
		$selected_cat = $cat->row['category_id'];
	} 
	
	if (isset($_POST['action']) && $_POST['action'] == $DELETE_KEY) {
		foreach ($_POST as $key => $value) {
			if ($value == 'on') {
				SubCategory::get_by_id(intval($key))->delete();
			}
		}
		go("sub-category.php");
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
		<div class="form-group">
			<label>Select category</label>
			<select name="category_id" class="form-control">
				<?php foreach ($cat_all as $cat) {
					$selected = "";
					if ($cat->id == $selected_cat) {
						$selected = 'selected';
					}
					$name = $cat->row['name'];
					echo "<option $selected>$name</option>";
				} ?>
			</select>
		</div>
		
		<input type="submit" value="<?php echo $SAVE_KEY ?>" name='action' class="btn btn-primary">
	</form>


</main>

<?php

include __DIR__.'/../footer.php';
?>