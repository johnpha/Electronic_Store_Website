<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';
      include_once '../classes/brand.php';
      include_once '../classes/category.php';
?>
<?php
$brand = new brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$brandName = $_POST['brandName'];
	$catID = $_POST['category'];

	$insertBrand = $brand->insert_brand($brandName,$catID);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
               <?php
                    if(isset($insertBrand)){
                        echo $insertBrand;
                    }
                ?>
                 <form action="brandadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Enter Brand Name..." class="medium" />
                            </td>
                            
                        </tr>
                        <tr>
                        <td>
                            <select id="select" name="category">
                                <option>Select Category</option>
                                <?php
                                $cat = new category();
                                $castlist = $cat->show_category();
                                if ($castlist) {
                                    while ($result = $castlist->fetch_assoc()) {

                                ?>
                                        <option value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>
                                <?php

                                    }
                                }
                                ?>
                            </select>
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