<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/member.php' ?>
<?php
	$member = new member();
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$delmember = $member->delete_member($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Member List</h2>
                <div class="block">      
					<?php
						if(isset($delmember)){
							echo $delmember;
						}
					?>  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>User</th>
							<th>Member Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Level</th>
							<th>Phân Quyền</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_member = $member->show_member();
							if($show_member){
								$i = 0;
								while($result = $show_member->fetch_assoc()){
									$i++;
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['adminUser'] ?></td>
							<td><?php echo $result['adminName'] ?></td>
							<td><?php echo $result['adminPhone'] ?></td>
							<td><?php echo $result['adminEmail'] ?></td>
							<td><?php echo $result['levelName'] ?></td>
							<td><a href="privilege.php?level=<?php echo $result['level'] ?>&memberid=<?php echo $result['adminID'] ?>">Phân Quyền</a></td>
							<td><?php 
							$memberID = $result['adminID'];
							if(checkprivilege("memberedit.php?memberid=")){
								echo "<a href='memberedit.php?memberid==$memberID'>Edit</a>";
							}
							?>
								
							<a onclick="return confirm('Are you want to delete ?')" href='?delidMember=<?php echo $memberID ?>'><?php
						
							if(!checkprivilege("memberedit.php?memberid=") && checkprivilege("?delidMember=")){
								echo "Delete";
							}else{
								if(checkprivilege("?delidMember=")){
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

