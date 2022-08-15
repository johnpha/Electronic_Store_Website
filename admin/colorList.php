<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/color.php' ?>
<?php
	$color = new color();
	if(isset($_GET['delidColor'])){
		$id = $_GET['delidColor'];
		$delcolor = $color->delete_color($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Color List</h2>
                <div class="block">      
					<?php
						if(isset($delcolor)){
							echo $delcolor;
						}
					?>  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>color Name</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_color = $color->show_color();
							if($show_color){
								$i = 0;
								while($result = $show_color->fetch_assoc()){
									$i++;
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['colorName'] ?></td>
							<td><?php echo $result['description'] ?></td>
    						<td><?php 
							$colorID = $result['colorID'];
							if(checkprivilege("coloredit.php?colorid=")){
								echo "<a href='coloredit.php?colorid=$colorID'>Edit</a>";
							}
							?>
								
							<a onclick="return confirm('Are you want to delete ?')" href='?delidColor=<?php echo $colorID ?>'><?php
						
							if(!checkprivilege("coloredit.php?colorid=") && checkprivilege("?delidColor=")){
								echo "Delete";
							}else{
								if(checkprivilege("?delidColor=")){
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

