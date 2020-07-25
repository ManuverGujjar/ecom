
<?php 
include 'base.php';
?>

<main class="container p-2">

	<ol class="breadcrumb">
		<li class="breadcrumb-item active">Categories</li>
	</ol>

	<?php



		$cat_all = Category::get();

		echo "<div class='list-group'>";

		foreach ($cat_all as $cat) {
			$cat_name = $cat->row['name'];
			$cat_id = $cat->id;
			echo "<a class='list-group-item' href='subcategories.php?category_id=$cat_id'>$cat_name</a>";
		}


		echo "</div>";

	?>

</main>

<?php

include 'footer.php';
?>