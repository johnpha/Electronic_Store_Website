<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
      include '../classes/color.php'
?>
<?php
$color = new color();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$colorName = $_POST['colorName'];
    $des = $_POST['des'];
	$insertColor = $color->insert_color($colorName,$des);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Color</h2>
               <div class="block copyblock"> 
               <?php
                    if(isset($insertColor)){
                        echo $insertColor;
                    }
                ?>
                 <form action="colorAdd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="colorName" placeholder="Enter Color Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="des" placeholder="Enter Description Color..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>