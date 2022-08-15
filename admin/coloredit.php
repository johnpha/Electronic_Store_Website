<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
      include '../classes/color.php'
?>
<?php
$color = new color();
if(!isset($_GET['colorid']) || $_GET['colorid']== NULL){
    echo"<script>window.locolorion = 'colorList.php'</script>";
}else{ 
    $id = $_GET['colorid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$colorName = $_POST['colorName'];
        $des = $_POST['des'];

	$updatecolor = $color->update_color($id,$colorName,$des);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Color</h2>
               <div class="block copyblock"> 
               <?php
                    if(isset($updatecolor)){
                        echo $updatecolor;
                    }
                ?>
                <?php
                    $get_colore_name = $color->getcolorbyId($id);
                    if($get_colore_name){
                        while($result = $get_colore_name->fetch_assoc()){

                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['colorName'] ?>" name="colorName" placeholder="Edit Color Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['description'] ?>" name="des" placeholder="Edit description Color..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?> 