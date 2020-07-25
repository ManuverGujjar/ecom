
<?php 
include 'base.php';
?>

<main class="container p-2">

	<?php 
		
		if (isset($_GET['id'])) {
			
			$id = intval($_GET['id']);
			$product = Product::get_by_id($id);
			$product_name = $product->row['name'];
			$sub_category_id = $product->row['sub_category_id'];
			$sub_category = SubCategory::get_by_id(intval($sub_category_id));
			$sub_category_name = $sub_category->row['name'];
			$category_id = $sub_category->row['category_id'];
			$category_name = Category::get_by_id(intval($category_id))->row['name'];



			echo "<ol class='breadcrumb'>";
				echo "<li class='breadcrumb-item'><a href='categories.php'> Categories </a> </li>";
				echo "<li class='breadcrumb-item active'> <a href='subcategories.php?category_id=$category_id'>$category_name</a> </li>";
				echo "<li class='breadcrumb-item active'> <a href='products.php?sub_category_id=$sub_category_id'>$sub_category_name</a> </li>";
				echo "<li class='breadcrumb-item active'> $product_name </li>";
			echo "</ol>";
		} else {
			go("/ecom/");
		}

	 ?>

	 <div class="product-container">
	 	<input type="hidden" id="id" value="<?php echo $id; ?>">
	 	<div class="row">
	 		<div class="col-md-5">
	 			<img style="max-height: 500px;" src="<?php echo $product->row['image_link'] ?>">
	 		</div>
	 		<div class="col-md-7">
	 			<h3>Name : <?php echo $product_name; ?></h3>
	 			<h4>Price : <?php echo $product->row['price']; ?></h4>
	 			<h4>Quantity : <?php echo $product->row['quantity']; ?> </h4>
	 			<p> <?php echo $product->row['description']; ?> <p>

	 		</div>
	 	</div>
	 </div>

	 <button class="btn-block btn btn-outline-primary" id='add-cart-btn'>Add to Cart</button>
	 
	 <script type="text/javascript" src="assets/js/product-display.js"></script>

<?php

include 'footer.php';
?>