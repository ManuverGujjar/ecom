
<?php 
include 'base.php';
?>

<main class="container p-2">

	<?php 
		
		if (isset($_GET['sub_category_id'])) {
			
			$sub_category_id = intval($_GET['sub_category_id']);
			$sub_category = SubCategory::get_by_id($sub_category_id);
			$sub_category_name = $sub_category->row['name'];
			$category_id = $sub_category->row['category_id'];
			$category_name = Category::get_by_id(intval($category_id))->row['name'];



			echo "<ol class='breadcrumb'>";
				echo "<li class='breadcrumb-item'><a href='categories.php'> Categories </a> </li>";
				echo "<li class='breadcrumb-item active'> <a href='subcategories.php?category_id=$category_id'>$category_name</a> </li>";
				echo "<li class='breadcrumb-item active'> $sub_category_name </li>";
			echo "</ol>";
		} else {
			go("/ecom/");
		}

	 ?>


<div id='products-container' class='list-group'>











</div>
<button class="btn btn-primary" id='load-btn'>Load More</button>
<button class="btn btn-warning" id='export-btn'>Export Selected</button>


</main>
<script type="text/javascript">
	var id = <?php echo "$sub_category_id"; ?>;
</script>
<script type="text/javascript" src="assets/js/products.js"></script>

<?php

include 'footer.php';
?>