<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php' ?>
<?php
	$brand = new brand();
	if(isset($_GET['delidBrand'])){
		$id = $_GET['delidBrand'];
		$delBrand = $brand->delete_brand($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">      
					<?php
						if(isset($delBrand)){
							echo $delBrand;
						}
					?>  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_Brand = $brand->show_brand();
							if($show_Brand){
								$i = 0;
								while($result = $show_Brand->fetch_assoc()){
									$i++;
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brandName'] ?></td>
							<td><?php echo $result['catName'] ?></td>
							
							<td><?php 
							$brandID = $result['brandID'];
							if(checkprivilege("brandedit.php?brandid=")){
								echo "<a href='brandedit.php?brandid=$brandID'>Edit</a>";
							}
							?>
								
							<a onclick="return confirm('Are you want to delete ?')" href='?delidBrand=<?php echo $brandID ?>'><?php
						
							if(!checkprivilege("brandedit.php?brandid=") && checkprivilege("?delidBrand=")){
								echo "Delete";
							}else{
								if(checkprivilege("?delidBrand=")){
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
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

