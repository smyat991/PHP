<?php 
    require 'db_connect.php';
    require ('backendheader.php');

   $sql = "SELECT items.*, brands.id as bid, brands.name as bname, subcategories.id as sid, subcategories. name as sname 
            FROM items
            LEFT JOIN brands
            ON items.brand_id = brands.id 
            LEFT JOIN subcategories
            ON items.subcategory_id = subcategories.id
            ORDER BY id DESC";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $items = $stmt->fetchAll();



?>

<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Items </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="item_new.php" class="btn btn-outline-primary">
            <i class="icofont-plus"></i>
        </a>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Codeno</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Discount</th>
                              <th>Brand</th>
                              <th>Subcategory</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                           
                            <?php 
                                $i = 1;
                                foreach($items as $item){

                                $id = $item['id'];
                                $codeno = $item['codeno'];
                                $name = $item['name'];
                                $price = $item['price'];
                                $discount = $item['discount'];
                                $bid = $item['brand_id'];
                                $bname = $item['bname'];
                                $sid = $item['subcategory_id'];
                                $sname = $item['sname'];
                                



                            ?>
                            <tr>
                                <td> <?= $i++; ?></td>
                                <td> <?= $codeno; ?> </td>
                                <td> <?= $name; ?> </td>
                                <td> <?= $price; ?> </td>
                                <td> <?= $discount; ?> </td>
                                <td> <?= $bname; ?> </td>
                                <td> <?= $sname; ?> </td>
                            
                                <td>
                                    <a href="item_edit.php?id=<?= $id ?>" class="btn btn-warning">
                                        <i class="icofont-ui-settings"></i>
                                    </a>

                                    <form action="item_delete.php" onsubmit="return confirm('Are you sure want to delete?')" method="POST" class="d-inline-block">
                                            <input type="hidden" name="id" value="<?= $id ?>">

                                            <button class="btn btn-outline-danger">
                                                <i class="icofont-close"></i>
                                            </button>

                                    </form>
                                </td>
                            </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

    require ('backendfooter.php');
?>

