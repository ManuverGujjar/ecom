
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
		$data['sub_category_id'] = SubCategory::get_by_name($_POST['sub_category_id'])->id;
		$scat = new Product($data);
		$scat->save();
		go('product.php');
	} 

	
	if (isset($_POST['action']) && $_POST['action'] == $UPDATE_KEY) {
		$id = intval(search($_POST, "on"));
		$product = Product::get_by_id($id);
		$cat_all = SubCategory::get();
		$selected_cat = $product->row['sub_category_id'];
	} 
	
	if (isset($_POST['action']) && $_POST['action'] == $DELETE_KEY) {
		foreach ($_POST as $key => $value) {
			if ($value == 'on') {
				Product::get_by_id(intval($key))->delete();
			}
		}
		go("product.php");
	} 

?>

<main class="container">

	<form action='' method="POST">
		<div class="form-group">
			<input type="hidden" value="<?php echo $product->id; ?>" name='id'>
			<input type="text" required placeholder="Product name" value="<?php echo $product->row['name']; ?>" name="name" class="form-control">
		</div>
		<div class="form-group">
			<textarea required placeholder="Description" placeholder="Description" name="description" class="form-control"><?php echo $product->row['description'] ?>
			</textarea>
		</div>
		<div class="form-group">
			<input type="number" required placeholder="Quantity" name="quantity" value="<?php echo $product->row['quantity']; ?>"  class="form-control">
		</div>
		<div class="form-group">
			<input type="number" required placeholder="Price" name="price" value="<?php echo $product->row['price']; ?>"  class="form-control">
		</div>
		<div class="form-group">
			<input type="text" required placeholder="image url" name="image_link" value="<?php echo $product->row['image_link']; ?>"  class="form-control">
		</div>
		<div class="form-group">
			<label>Select category</label>
			<select name="sub_category_id" class="form-control">
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