
<?php 
  require "frontendheader.php";
  require 'db_connect.php';

  /*$brand_id=$_GET['id'];

  $sql="SELECT * FROM brands WHERE id=:value1";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$brand_id);
  $stmt->execute();
  $brands=$stmt->fetchAll();

  $sql="SELECT * FROM items WHERE brand_id=:value2";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value2',$brand_id);
  $stmt->execute();
  $items=$stmt->fetchAll();*/

  $brandid = $_GET['id'];

	$sql = "SELECT * FROM brands WHERE id=:value2 ORDER BY id DESC";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value2',$brandid);
	$stmt->execute();
	$brands = $stmt->fetch(PDO::FETCH_ASSOC);

	$brand_name=$brands['name'];

	//===============================================

	//items 
	$sql = "SELECT items.*,brands.id, brands.name as bname 
			FROM brands  INNER JOIN items 
			ON brands.id = items.brand_id
			WHERE brands.id=:value2";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value2',$brandid);
	$stmt->execute();
	$items = $stmt->fetchAll();
 
?>

	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"><?= $brand_name ?></h1>
  		</div>
	</div>

	<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
		  	<ol class="breadcrumb bg-transparent">
		    	<li class="breadcrumb-item">
		    		<a href="index.php" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="index.php" class="text-decoration-none secondarycolor"><?= $brand_name ?> </a>
		    	</li>
		  	</ol>
		</nav>

		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<ul class="list-group">
					
				</ul>
			</div>


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

				<div class="row">

					<?php 
						foreach ($items as $item) {
		            		
		            		$i_id = $item['id'];
		            		$i_name = $item['name'];
		            		$i_price = $item['price'];
		            		$i_discount = $item['discount'];
		            		$i_photo = $item['photo'];
		            		$i_codeno = $item['codeno'];
					?>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="card pad15 mb-3">
						  	<img src="<?= $i_photo ?>" class="card-img-top" alt="...">
						  	
						  	<div class="card-body text-center">
						    	<h5 class="card-title text-truncate"><?= $i_name ?></h5>
						    	
						    	<p class="item-price">
		                        	<?php if($i_discount){ ?>
			                        	<strike> <?= $i_price ?> Ks </strike> 
			                        	<span class="d-block"> <?= $i_discount ?> Ks</span>
			                        <?php } else{ ?>
										<span class="d-block"> <?= $i_price ?> Ks</span>
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

								<!-- <a href="javascript:void(0)" class="addtocartBtn text-decoration-none addtocartBtn data-id="<?= $i_id ?>" data-name="<?= $i_name ?>" data-price="<?= $i_price ?>" data-photo=" <?= $i_photo ?>" data-discount="<?= $i_discount ?>">Add to Cart</a> -->

								<button class="btn-outline-danger mybtn" data-id="<?= $i_id ?>" data-name="<?= $i_name ?>" data-price="<?= $i_price ?>" data-photo="<?= $i_photo ?>" data-discount="<?= $i_discount ?>">Add to Cart</button>
						  	</div>
						</div>
					</div>

					<?php } ?>
				</div>


				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-end">
					    <li class="page-item disabled">
					      	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="icofont-rounded-left"></i>
					      	</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">1</a>
					    </li>
					    <li class="page-item active">
					    	<a class="page-link" href="#">2</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">3</a>
					    </li>
					    <li class="page-item">
					      	<a class="page-link" href="#">
					      		<i class="icofont-rounded-right"></i>
					      	</a>
					    </li>
					</ul>
				</nav>
			</div>
		</div>

		
	</div>


<?php 
	require 'frontendfooter.php';
?>

