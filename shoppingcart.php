<?php 

	require 'frontendheader.php';
?>


	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Your Shopping Cart </h1>
  		</div>
	</div>
	
	<div class="row mt-5 shoppingcart_div">
			<div class="col-12">
				<a href="index.php" class="btn mainfullbtncolor btn-secondary float-right px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>
	</div>

	<div class="container mt-5">
		<div class="row mt-5 shoppingcart_div">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Product</th>
								<th>Qty</th>
								<th>Price</th>
								<th>SubTotal</th>

							</tr>
						</thead>
						<tbody>
							
						</tbody>
						<tfoot>
							<tr>
								<td>
									<textarea class="form-control"  id="notes" cols="40" rows="5" placeholder="Any Request..."></textarea>
								</td>
								<td>
									<?php 
										if(isset($_SESSION['login_user'])){
									?>
									<a href="javascript:void(0)" class="btn btn-danger checkoutBtn">Checkout</a>


									<?php } else{  ?>
									<a href="login.php" class="btn btn-secondary danger">Checkout</a>

									<?php } ?>
								</td>
							</tr>
						</tfoot>
					</table>


					<!-- <a href="" class="btn btn-secondary danger">Checkout</a> -->
					

				</div>
		</div>

		
		<div class="row mt-5 noneshoppingcart_div text-center">
		</div>
	</div>

<?php 

	require 'frontendfooter.php';
?>