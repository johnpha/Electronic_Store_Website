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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateProduct = $product->update_product($_POST, $_FILES, $id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>

        <div class="block">
            <?php
            if (isset($updateProduct)) {
                echo $updateProduct;
            }
            ?>
            <?php
            $proDetail = $product->getproductbyId($id);

            if ($proDetail) {
                while ($productDetail = $proDetail->fetch_assoc()) {
            ?>
                    <!-- enctype="multipart/form-data" dung de post hinh anh len khong co thi se bi loi -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">
                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" name="productName" value="<?php echo $productDetail['productName'] ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Category</label>
                                </td>
                                <td>
                                    <select id="select" name="category">
                                        <option>Select Category</option>
                                        <?php
                                        $cat = new category();
                                        $castlist = $cat->show_category();
                                        if ($castlist) {
                                            while ($result = $castlist->fetch_assoc()) {

                                        ?>
                                                <option <?php
                                                        if ($result['catID'] == $productDetail['catID']) {
                                                            echo 'selected';
                                                        }
                                                        ?> value="<?php echo $result['catID'] ?>">
                                                    <?php echo $result['catName'] ?>
                                                </option>
                                        <?php

                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Brand</label>
                                </td>
                                <td>
                                    <select id="select" name="brand">
                                        <option>Select Brand</option>
                                        <?php
                                        $brand = new brand();
                                        $brandlist = $brand->show_brand();
                                        if ($brandlist) {
                                            while ($result = $brandlist->fetch_assoc()) {

                                        ?>
                                                <option <?php
                                                        if ($result['brandID'] == $productDetail['brandID']) {
                                                            echo 'selected';
                                                        }
                                                        ?> value="<?php echo $result['brandID'] ?>">
                                                    <?php echo $result['brandName'] ?>
                                                </option>
                                        <?php

                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Description</label>
                                </td>
                                <td>
                                    <textarea name="description" class="tinymce"><?php echo $productDetail['description'] ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Supplier Address</label>
                                </td>
                                <td>
                                    <input name="supplier" type="text" value="<?php echo $productDetail['supplier'] ?>" placeholder="Enter Address Supplier..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input id="price" value="<?php echo $productDetail['price'] ?>" name="price" type="text" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Interest (%)</label>
                        </td>
                        <td>
                            <input id="interest" value="<?php echo $productDetail['interest'] ?>" name="interest" onblur="cost1()" type="text" placeholder="Enter Interest..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Cost</label>
                        </td>
                        <td>
                            <input id="cost" value="<?php echo $productDetail['cost'] ?>" name="cost" type="text" placeholder="Enter Cost..." class="medium"/>
                        </td>
                    </tr>

                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <img src="uploads/<?php echo $productDetail['img'] ?>" width="100px" alt="img"> <br>
                                    <input name="image" type="file" />
                                </td>
                            </tr>
                            
                        
                            <tr>
                                <td></td>
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
<script>
    function cost1(){
        var price = document.getElementById('price');
        var interest = document.getElementById('interest');
        // console.log(price.value);
        // console.log(interest.value);
        document.querySelector('#cost').value = parseFloat(price.value) + (parseFloat(price.value)*parseFloat(interest.value))/100; 
    }
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>