<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>
<?php include '../classes/color.php'; ?>

<?php
$product = new product();
if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script>window.location = 'productlist.php'</script>";
} else {
    $id = $_GET['productid'];
}

if (isset($_GET['delid'])) {
    $idDel = $_GET['delid'];
    $resultDel = $product->delete_product_img($idDel);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['color'])  && isset($_POST['submit'])) {
    // $insertProduct = $product->insert_product($_POST, $_FILES);
    // <!-- code xu li up nhieu file ảnh  -->\

    $data = $_POST['color'];

    $insert = $product->insert_color($data,$id);


    if (isset($_FILES['file']['name'])) {
        $insertProduct = "<span class='error'>Insert Images Not Success</span>";
        if(!isset($insert)){
            $insertProduct = "<span class='success'>Insert Successfully</span>";
        }
    }

    
    
    $img_array = array();
    foreach ($_FILES['file']['name'] as $key => $value) {
        $img_name = $_FILES['file']['name'][$key];
        $tmp_name = $_FILES['file']['tmp_name'][$key];

        $target_dir = "uploads/";
        $target_file = $target_dir . $img_name;
        if (move_uploaded_file($tmp_name, $target_file)) {
            $img_uploads[] = $target_file;

            $insertProduct = $product->insert_img($id, $img_name);
        }
    }


}
?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>

        <div class="block">
            <?php
            if (isset($insertProduct)) {
                echo $insertProduct;
            }
            if (isset($resultDel)) {
                echo $resultDel;
            }
            ?>


            <table class="data display datatable" id="example">
                <thead>
                    <tr style="font-size: 18px;">
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $productDetail = $product->getproductbyId($id)->fetch_assoc();
                    $imgList = $product->show_img($id);
                    if ($productDetail && $imgList) {
                        $i = 0;
                        while ($result = $imgList->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr class="odd gradeX">
                        <th><?php echo $i ?></th>
                        <th><?php echo $productDetail['productName'] ?></th>

                        <th><img src="uploads/<?php echo $result['img'] ?>" alt="avt" width="100px"></th>

                        <th><a onclick="return confirm('You want to delete ?')"
                                href="productUpdate.php?productid=<?php echo $id ?>&delid=<?php echo $result['imgID'] ?>">Delete</a>
                        </th>
                    </tr>
                    <?php

                        }
                    }
                    ?>
                </tbody>
            </table>



        </div>
        <!-- enctype="multipart/form-data" dung de post hinh anh len khong co thi se bi loi -->
        <form action="productUpdate.php?productid=<?php echo $id ?>" method="post" enctype="multipart/form-data">
            <table class="form">

                <tr>
                    <td>
                        <label>Upload Image Description</label>
                    </td>
                    <td>
                        <input type="file" name="file[]" multiple />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Product Color</label>
                    </td>
                    <td>
                        <ul class="privilege_list">
                            <?php
                            $color = new color();
                            $colorlist = $color->show_color();
                            

                            if (isset($colorlist)) {
                                while ($result2 = $colorlist->fetch_assoc()) {
                                    $colorID = $result2['colorID'];
                                    $colorName = $result2['colorName'];
                                    echo "<li style='width: 15%;'>
                                    <input type='checkbox'";
                                   
                                    if($color->getcolorbyId($id)){
                                        
                                        $colorlistPro = $color->getcolorbyId($id);

                                        while ($result3 = $colorlistPro->fetch_assoc()) {
                                            
                                            if ($result3['colorID'] == $colorID) {
                                                echo" checked";
                                                break;
                                            }
                                        }
                                    }
                                   

                                    echo " name='color[]' id='color_$colorID' value='$colorID'>
                                            <label for='color_$colorID'>$colorName</label>
                                        </li>";



                            ?>
                            <?php

                                }
                            }
                            ?>

                        </ul>

                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    setupTinyMCE();
    setDatePicker('date-picker');
    $('input[type="checkbox"]').fancybutton();
    $('input[type="radio"]').fancybutton();
});
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>