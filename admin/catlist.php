<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
	$cat = new category();
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$delcat = $cat->delete_category($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">      
					<?php
						if(isset($delcat)){
							echo $delcat;
						}
					?>  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_Cate = $cat->show_category();
							if($show_Cate){
								$i = 0;
								while($result = $show_Cate->fetch_assoc()){
									$i++;
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['catName'] ?></td>
							<td><?php 
							$catID = $result['catID'];
							if(checkprivilege("catedit.php?catid=")){
								echo "<a href='catedit.php?catid=$catID'>Edit</a>";
							}
							?>
								
							<a onclick="return confirm('Are you want to delete ?')" href='?delid=<?php echo $catID ?>'><?php
						
							if(!checkprivilege("catedit.php?catid=") && checkprivilege("?delidCat=")){
								echo "Delete";
							}else{
								if(checkprivilege("?delidCat=")){
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

