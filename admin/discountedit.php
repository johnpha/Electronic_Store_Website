<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/discount.php'; ?>
<?php include '../classes/color.php'; ?>

<?php
$discount = new discount();
if (!isset($_GET['discountid']) || $_GET['discountid'] == NULL) {
    echo "<script>window.location = 'discountlist.php'</script>";
} else {
    $id = $_GET['discountid'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updatediscount = $discount->update_discount($_POST, $_FILES, $id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update New Discount</h2>

        <div class="block">
            <?php
            if (isset($updatediscount)) {
                echo $updatediscount;
            }
            ?>
            <?php
            $proDetail = $discount->getdiscountbyId($id);

            if ($proDetail) {
                while ($discountDetail = $proDetail->fetch_assoc()) {
            ?>
                    <!-- enctype="multipart/form-data" dung de post hinh anh len khong co thi se bi loi -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">
                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" name="discountName" value="<?php echo $discountDetail['discountName'] ?>" class="medium" />
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
                                                        if ($result['catID'] == $discountDetail['catID']) {
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
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Content</label>
                                </td>
                                <td>
                                    <textarea name="content" class="tinymce"><?php echo $discountDetail['content'] ?></textarea>
                                </td>
                            </tr>
                           

                    
                    <tr>
                        <td>
                            <label>Interest (%)</label>
                        </td>
                        <td>
                            <input id="interest" value="<?php echo $discountDetail['percent'] ?>" name="interest"  type="text" placeholder="Enter Interest..." class="medium" />
                        </td>
                    </tr>

                 

                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <img src="uploads/<?php echo $discountDetail['img'] ?>" width="100px" alt="img"> <br>
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