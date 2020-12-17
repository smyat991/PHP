<?php
	require "db_connect.php";
	require "frontendheader.php";

	$id =$_GET['id'];
	
   	$sql = "SELECT items.*, brands.name as bname
   			FROM items INNER JOIN brands
   			ON items.brand_id=brands.id
   			WHERE items.id=:value2";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value2',$id);
    $stmt->execute();
    $items = $stmt->fetch(PDO::FETCH_ASSOC);

    //=============================================
    //subcategory
    $sql = "SELECT items.*, subcategories.name as sname
 			FROM items INNER JOIN subcategories
 			ON items.subcategory_id=subcategories.id
 			WHERE items.id=:value1";
 	$stmt = $conn->prepare($sql);
    $stmt->bindParam(':value1',$id);
    $stmt->execute();
    $subcategories = $stmt->fetch(PDO::FETCH_ASSOC);

    $subcategory_name = $subcategories['sname'];
    //===============================================

    //categories
    $sql= "SELECT items.*,categories.name as cname
			FROM items INNER JOIN subcategories
			ON items.subcategory_id=subcategories.id
			INNER JOIN categories ON categories.id= subcategories.category_id
			WHERE items.id=:value3";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value3',$id);
    $stmt->execute();
    $categories = $stmt->fetch(PDO::FETCH_ASSOC);

    $category_name = $categories['cname'];
    //echo $category_name;die();

	
?>	
	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> <?= $items['codeno'] ?> </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
		  	<ol class="breadcrumb bg-transparent">
		    	<li class="breadcrumb-item">
		    		<a href="index.php" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> <?= $category_name; ?> </a>
		    	</li>
		    	<li class="breadcrumb-item active" aria-current="page">
					<?= $subcategory_name; ?>
		    	</li>
		  	</ol>
		</nav>

		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<img src="<?= $items['photo'] ?>" class="img-fluid">
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
				
				<h4> <?= $items['name']; ?></h4>

				<div class="star-rating">
					<ul class="list-inline">
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
					</ul>
				</div>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>

				<p> 
					<span class="text-uppercase "> Current Price : </span>
					<span class="maincolor ml-3 font-weight-bolder"> <?= $items['price']; ?> Ks </span> 
					
				</p>

				<p> 
					<span class="text-uppercase "> Brand : </span>
					<span class="ml-3"> <a href="" class="text-decoration-none text-muted"> 
						<?= $items['bname']; ?> </a> </span>
				</p>


				<!-- <a href="shoppingcart.php" class="mybtn text-decoration-none">
					<i class="icofont-shopping-cart mr-2"></i> Add to Cart
				</a> -->
				<button class="btn-outline-danger mybtn" data-id="<?= $items['id'] ?>" data-name="<?= $items['name'] ?>" data-price="<?= $items['price'] ?>" data-photo="<?= $items['photo'] ?>" data-discount="<?= $items['discount'] ?>">Add to Cart</button>

				
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-12">
				<h3> Related Item </h3>
				<hr>
			</div>
			
			<?php
		        $sid=$items['subcategory_id']; //only one subcategory
		        //echo $sid;die();
				$sql = "SELECT * FROM items WHERE subcategory_id=:value1 LIMIT 4";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':value1',$sid);
				$stmt->execute();
				$randomItems = $stmt->fetchAll();

				foreach ($randomItems as $randomItem) {
		        $ri_id = $randomItem['id'];
		        $ri_photo = $randomItem['photo'];
			?>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<a href="">
					<img src="<?= $ri_photo = $randomItem['photo']; ?>" class="img-fluid">
				</a>
			</div>
		<?php } ?>
		</div>

		
	</div>
	
<?php
	require 'frontendfooter.php';
?>
