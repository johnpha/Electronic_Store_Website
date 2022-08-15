<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php' ?>
<?php include '../classes/brand.php' ?>
<?php include '../classes/product.php' ?>
<?php
$cat = new category();
$brand = new brand();
$product = new product();
if(isset($_GET['delidProduct'])){
    $id = $_GET['delidProduct'];
    $result = $product->delete_product($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Products List</h2>
        <?php
            if(isset($result)){
                echo $result;
            }
        ?>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Interest</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$listProduct = $product->show_product();
					if ($listProduct) {
						$i=0;
						while ($result = $listProduct->fetch_assoc()) {
							$i++;
					?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['productName'] ?></td>
                        <td><?php echo $result['price'] ?></td>
                        <td><img src="uploads/<?php echo $result['img'] ?>" alt="avt" width="100px"></td>
                        <td><?php echo $result['catName'] ?></td>
                        <td><?php echo $result['brandName'] ?></td>
                        <td><?php echo $result['description'] ?></td>
                        
                        <td><?php echo $result['interest'] ?></td>
                        <!-- <td><a href="productedit.php?productid=<?php echo $result['productID'] ?>">Edit</a> || <a href="productUpdate.php?productid=<?php echo $result['productID'] ?>">upd</a> || <a onclick="return confirm('You want to delete ?')" href="?delid=<?php echo $result['productID'] ?>">Del</a></td> -->
                        <td><?php 
							$productID = $result['productID'];
							if(checkprivilege("productedit.php?productid=")){
								echo "<a href='productedit.php?productid=$productID'>Edit</a>";
							}
							?>
								
                            <a onclick="return confirm('Are you want to delete ?')" href='?delidProduct=<?php echo $productID ?>'>
                            
                            <?php 
							if(!checkprivilege("productedit.php?productid=") && checkprivilege("productUpdate.php?productid=")){
								echo "<a href='productUpdate.php?productid=$productID'>Udp</a>";
							}else{
                                echo "<a href='productUpdate.php?productid=$productID'>|| Udp</a>";
                            }
							?>
								
                            <a onclick="return confirm('Are you want to delete ?')" href='?delidProduct=<?php echo $productID ?>'>
                            <?php
						
							if(!checkprivilege("productedit.php?productid=") && checkprivilege("?delidProduct=")){
								echo "Delete";
							}else{
								if(checkprivilege("?delidProduct=")){
									echo "|| Delete";
								} 	
							}
							?></a></td>
                    </tr>
                    <?php

						}
					}
					?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.php'; ?>