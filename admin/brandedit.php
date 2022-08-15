<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php';
include_once '../classes/brand.php';
include_once '../classes/category.php';
?>
<?php
$brand = new brand();
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
    echo "<script>window.location = 'brandlist.php'</script>";
} else {
    $id = $_GET['brandid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brandName'];
    $catID = $_POST['category'];

    $updateBrand = $brand->update_brand($brandName, $id,$catID);
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Brand</h2>
        <div class="block copyblock">
            <?php
            if (isset($updateBrand)) {
                echo $updateBrand;
            }
            ?>
            <?php
            $get_brand_name = $brand->getbrandbyId($id);
            if ($get_brand_name) {
                while ($result = $get_brand_name->fetch_assoc()) {

            ?>
                    <form action="" method="POST">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['brandName'] ?>" name="brandName" placeholder="Edit Brand Name..." class="medium" />
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
                                            while ($resultcat = $castlist->fetch_assoc()) {
                                        ?>
                                                <option <?php
                                                        if ($result['catID'] == $resultcat['catID']) {
                                                            echo 'selected';
                                                        }
                                                        ?> value="<?php echo $resultcat['catID'] ?>"><?php echo $resultcat['catName'] ?></option>
                                        <?php

                                            }
                                        }
                                        ?>
                                    </select>
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
<?php include 'inc/footer.php'; ?>