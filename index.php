<?php 
	require 'frontendheader.php';
	require 'db_connect.php';

	$sql = "SELECT * FROM categories ORDER BY rand() LIMIT 8";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll();
?>



	<!-- Carousel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
    		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		</ol>
  		
  		<div class="carousel-inner">
    		<div class="carousel-item active">
		      	<img src="frontend/image/banner/ac.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="frontend/image/banner/giordano.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="frontend/image/banner/garnier.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
  		</div>
	</div>


	<!-- Content -->
	<div class="container mt-5 px-5">
		<!-- Category -->
		<div class="row">
			<?php 
				foreach ($categories as $category) {
				$cid = $category['id'];
				$cname = $category['name'];
				$clogo = $category['logo'];

			?>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 ">
				<div class="card categoryCard border-0 shadow-sm p-3 mb-5 rounded text-center">
				  	<img src="<?= $clogo ?>" class="card-img-top" alt="...">
				  	<div class="card-body">
				    	<p class="card-text font-weight-bold text-truncate"> <?= $cname; ?> </p>
				  	</div>
				</div>
			</div>

			<?php } ?>
			
		</div>

		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
		
		<!-- Discount Item -->
		<div class="row mt-5">
			<h1> Discount Item </h1>
		</div>

	    <!-- Disocunt Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	<?php 
		            		$sql = "SELECT * FROM items WHERE discount != '' ORDER BY rand()  LIMIT 8";
		            		// $sql = "SELECT * FROM items WHERE discount > 0 ORDER BY rand()  LIMIT 8";

		            		$stmt = $conn->prepare($sql);
		            		$stmt->execute();

		            		$discountItems = $stmt->fetchAll();

		            		foreach ($discountItems as $discountItem) {
		            		
		            		$di_id = $discountItem['id'];
		            		$di_name = $discountItem['name'];
		            		$di_price = $discountItem['price'];
		            		$di_discount = $discountItem['discount'];
		            		$di_photo = $discountItem['photo'];
		            		
		            	?>

		                <div class="item">
		                    <div class="pad15">
		                    	<a href="item_detail.php?id=<?= $di_id ?>">
		                    		<img src="<?= $di_photo ?>" class="img-fluid detail"></a>
		                        <p class="text-truncate"> <?= $di_name ?> </p>
		                        <p class="item-price">
		                        	<strike> <?= $di_price ?> Ks </strike> 
		                        	<span class="d-block"> <?= $di_discount ?> Ks</span>
		                        </p>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<!-- <a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a> -->
								<button class="btn-outline-danger mybtn" data-id="<?= $di_id ?>" data-name="<?= $di_name ?>" data-price="<?= $di_price ?>" data-photo="<?= $di_photo ?>" data-discount="<?= $di_discount ?>">Add to Cart</button>

		                    </div>
		                </div>

		                <?php } ?>
		                
		                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Flash Sale Item -->
		<div class="row mt-5">
			<h1> Flash Sale </h1>
		</div>

	    <!-- Flash Sale Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	<?php 
		            		$sql = "SELECT * FROM items ORDER BY created_at DESC LIMIT 14";
		            		$stmt = $conn->prepare($sql);
		            		$stmt->execute();

		            		$hotItems = $stmt->fetchAll();

		            		foreach ($hotItems as $hotItem) {
		            		
		            		$hi_id = $hotItem['id'];
		            		$hi_name = $hotItem['name'];
		            		$hi_price = $hotItem['price'];
		            		$hi_discount = $hotItem['discount'];
		            		$hi_photo = $hotItem['photo'];
		            		$hi_codeno = $hotItem['codeno'];

		            	?>

		                <div class="item">
		                    <div class="pad15">
		                    	<a href="item_detail.php?id=<?= $hi_id ?>"><img src="<?= $hi_photo; ?>" class="img-fluid detail"></a>
		                        <p class="text-truncate"> <?= $hi_name; ?> </p>
		                        <p class="item-price">
		                        	<?php if($hi_discount){ ?>
			                        	<strike> <?= $hi_price ?> Ks </strike> 
			                        	<span class="d-block"> <?= $hi_discount ?> Ks</span>
			                        <?php } else{ ?>
										<span class="d-block"> <?= $hi_price ?> Ks</span>
			                        <?php } ?>
		                        </p>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<button class="btn-outline-danger mybtn" data-id="<?= $hi_id ?>" data-name="<?= $hi_name ?>" data-price="<?= $hi_price ?>" data-photo=" <?= $hi_photo ?>" data-discount="<?= $hi_discount ?>">Add to Cart</button>

		                    </div>
		                </div>

		                <?php } ?>
		                
		                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Random Catgory ~ Item -->
		<div class="row mt-5">
			<h1> Fresh Picks </h1>
		</div>

	    <!-- Random Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">

		            	<?php 
		            		$sid = 1;
		            		$sql = "SELECT * FROM items WHERE subcategory_id = :value1 LIMIT 8";
		            		$stmt = $conn->prepare($sql);
		            		$stmt->bindParam(':value1', $sid);
		            		$stmt->execute();

		            		$randomItems = $stmt->fetchAll();

		            		foreach ($randomItems as $randomItem) {
		            		
		            		$ri_id = $randomItem['id'];
		            		$ri_name = $randomItem['name'];
		            		$ri_price = $randomItem['price'];
		            		$ri_discount = $randomItem['discount'];
		            		$ri_photo = $randomItem['photo'];
		            		$ri_codeno = $randomItem['codeno'];

		            	?>

		                <div class="item">
		                    <div class="pad15">
		                    	<a href="item_detail.php?id=<?= $ri_id ?>"><img src="<?= $ri_photo ?>" class="img-fluid detail"></a>
		                        <p class="text-truncate"> <?= $ri_name ?> </p>
		                        <p class="item-price">
		                        	<?php 
		                        		if($ri_discount){
		                        	?>
		                        		<strike> <?= $ri_price ?> Ks </strike> 
		                        		<span class="d-block"> <?= $ri_discount ?> Ks</span>
		                        	<?php } else{ ?>
		                        		<span class="d-block"> <?= $ri_price ?> Ks</span>

		                        	<?php } ?>
		                        </p>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<button class="btn-outline-danger mybtn" data-id="<?= $ri_id ?>" data-name="<?= $ri_name ?>" data-price="<?= $ri_price ?>" data-photo=" <?= $ri_photo ?>" data-discount="<?= $ri_discount ?>">Add to Cart</button>

		                    </div>
		                </div>
		                
		                <?php } ?>
		                
		            </div>
		            <button class="btn btnMain leftLst">></button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		
		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	    <!-- Brand Store -->
	    <div class="row mt-5">
			<h1> Top Brand Stores </h1>
	    </div>

	    <!-- Brand Store Item -->
	   <section class="customer-logos slider mt-5">
	      	<?php 
	      		$i = 1;
                foreach($brands as $brand){
                $name = $brand['name'];
                $photo = $brand['photo'];
            ?>
            <div class="slide">
                <a><img src="<?php echo $photo; ?>"> </a>  
            </div>

            <?php } ?>
	   	</section>

	  <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

		<!-- <div class="mycart">
		
			<img src="cart1.png" width="50px" height="50px" id="imgg" ><span color="red" id="cart">3</span>

			<table border="1" cellpadding="20px" style="margin-top: 30px">
				<thead>
					<th>No</th>
					<th>Name</th>
					<th>photo</th>
					<th>qty</th>
					<th>price</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			<button class="checkout">Check out</button>
		</div> -->


	</div>

<?php 
	require 'frontendfooter.php';
?>
