
<?php 
include 'base.php';
?>

<main class="container p-2">

	<?php 
		
		if (isset($_GET['category_id'])) {
			
			$category_id = intval($_GET['category_id']);
			$category_name = Category::get_by_id($category_id)->row['name'];

			echo "<ol class='breadcrumb'>";
				echo "<li class='breadcrumb-item'><a href='categories.php'> Categories </a> </li>";
				echo "<li class='breadcrumb-item active'> $category_name </li>";
			echo "</ol>";

			$cat_all = SubCategory::get_by_foregion_key($category_id);
			echo "<div class='list-group'>";

			foreach ($cat_all as $cat) {
				$cat_name = $cat->row['name'];
				$cat_id = $cat->id;
				echo "<a class='list-group-item' href='products.php?sub_category_id=$cat_id'>$cat_name</a>";
			}


			echo "</div>";
		} else {
			go("/ecom/");
		}

	 ?>


</main>

<?php

include 'footer.php';
?>