<?php
	require 'db_connect.php';
	require "frontendheader.php";

	$userid = $_SESSION['login_user']['id'];

	$sql="SELECT * FROM orders WHERE user_id=:value1 ORDER BY id DESC";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$userid);
	$stmt->execute();

	$orders = $stmt->fetchAll();

?>

	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Your Order History</h1>
  		</div>
	</div>


	<div class="container">
		<div class="row">
			<?php 
				foreach ($orders as $order) {
					$id=$order['id'];
					$orderdate=$order['orderdate'];
					$voucherno=$order['voucherno'];
					$total=$order['total'];
					$note=$order['note'];
					$status=$order['status'];
				
			?>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="card">
					<div class="card-body text-center">
						 <h5 class="card-title text-truncate"><?= $voucherno ?></h5>
						 <h5 class="card-subtitle mb-2 text-muted"><?= $orderdate ?></h5>

						 <p class="text-white card-text float-right">
						 	<?php if($status=='Order') {?>
						 		<span class="badge rounded-pill bg-warning"><?= $status ?></span>
						 	<?php }elseif($status=='Delete') {?>
						 		<span class="badge rounded-pill bg-danger"><?= $status ?></span>
						 	<?php }else{?>
						 		<span class="badge rounded-pill bg-success"><?= $status ?></span>
						 	<?php } ?>
						 </p>

						 <!-- <a href="order_detail.php" class="card-link detail">Detail</a> -->
						 <button class="border-0 detailbtn" data-id="<?= $id ?>" data-name="<?= $orderdate ?>" data-price="<?= $voucherno ?>" data-photo=" <?= $total ?>">Detail</button>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

	

<?php
	require 'frontendfooter.php';
?>
<?php 

	require 'backendfooter.php';
?>
