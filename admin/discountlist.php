<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php' ?>
<?php include '../classes/brand.php' ?>
<?php include '../classes/discount.php' ?>
<?php
$cat = new category();
$brand = new brand();
$discount = new discount();
if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $result = $discount->delete_discount($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>discounts List</h2>
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
                        <th>Discount Name</th>
                        <th>Discount Image</th>
                        <th>Category</th>
                        <th>Content</th>
                        <th>Interest</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$listdiscount = $discount->show_discount();
					if ($listdiscount) {
						$i=0;
						while ($result = $listdiscount->fetch_assoc()) {
							$i++;
					?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['discountName'] ?></td>
                        <td><img src="uploads/<?php echo $result['img'] ?>" alt="avt" width="100px"></td>
                        <td><?php echo $result['catName'] ?></td>
                        <td><?php echo $result['content'] ?></td>                       
                        <td><?php echo $result['percent'] ?></td>
                        <!-- <td><a href="discountedit.php?discountid=<?php echo $result['discountID'] ?>">Edit</a> || <a href="discountUpdate.php?discountid=<?php echo $result['discountID'] ?>">upd</a> || <a onclick="return confirm('You want to delete ?')" href="?delid=<?php echo $result['discountID'] ?>">Del</a></td> -->
                        <td><?php 
							$discountID = $result['discountID'];
							if(checkprivilege("discountedit.php?discountid=")){
								echo "<a href='discountedit.php?discountid=$discountID'>Edit</a>";
							}
							?>
								
                            <a onclick="return confirm('Are you want to delete ?')" href='?delidDiscount=<?php echo $discountID ?>'>
                        
								
                            <a onclick="return confirm('Are you want to delete ?')" href='?delidDiscount=<?php echo $discountID ?>'>
                            <?php
						
							if(!checkprivilege("discountedit.php?discountid=") && checkprivilege("?delidDiscount=")){
								echo "Delete";
							}else{
								if(checkprivilege("?delidDiscount=")){
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