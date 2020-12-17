<?php 
  require 'backendheader.php';
  require 'db_connect.php';

    date_default_timezone_set("Asia/Rangoon");
    $todaydate=date('Y-m-d');
   
    $sql="SELECT orders.*,users.* FROM orders INNER JOIN users ON orders.user_id=users.id";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':value1',$orderid);
    $stmt->execute();
    $orders=$stmt->fetchAll();
?>

  <div class="app-title">
    <div>
      <h1> <i class="icofont-list"></i> Invoice </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <a href="order_list.php" class="btn btn-outline-primary">
          <i class="icofont-double-left"></i>
        </a>
    </ul>
  </div>

 <div class="row">
   <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> Shopules</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: <?= $todaydate ?></h5>
                </div>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Customer Name</th>
                  <th>Address</th>
                  <th>Order Date</th>
                  <th>Voucherno</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
       
                  <?php 

                    $i=1;
                    foreach ($orders as $order) {
                      $id = $order['id'];
                      $name = $order['name'];
                      $address= $order['address'];
                      $orderdate = $order['orderdate'];
                      $voucherno = $order['voucherno'];
                      $total = $order['total'];                          
                  ?> 
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $name ?></td>
                    <td><?= $address ?></td>
                    <td><?= $orderdate; ?></td>
                    <td><?= $voucherno; ?></td>
                    <td><?= $total; ?></td>
                  </tr>                          ?>
                    <?php } ?>
              </tbody>
              </table>
          </div>
        </div>
         <div class="row d-print-none mt-2">
            <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
          </div>
      </div>
    </div>
  </div>

<?php 
  require 'backendfooter.php';
?>


