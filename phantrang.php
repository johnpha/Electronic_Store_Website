<?php
include_once('classes/product.php');
include_once('classes/discount.php');

$product = new product();
$discount = new discount();
$sodong = 2;
$sospanphamtrenDong = 5;
$soSphamTrenTrang  = $sospanphamtrenDong * $sodong;
if (isset($_GET['trang'])) {
    $trang = $_GET['trang'];
    settype($trang, "int");
}
if (isset($_GET['tl'])) {
    $theloai = $_GET['tl'];
    // settype($trang, "int");
}else{
    $theloai = 17;
}


$from = ($trang - 1) * $soSphamTrenTrang;



if(isset($theloai) && $theloai!= 17){
    $list = $product->show_product_All_by_category($from, $soSphamTrenTrang,$theloai);
}
else if(isset($_GET['min'])&&$_GET['min']!=-1&&isset($_GET['max'])&&$_GET['max']!=-1&&isset($_GET['brand'])&&isset($_GET['nameAdvanced'])){

    if($_GET['min']!=""&&$_GET['max']!=""){
        $min=$_GET['min'];
        $max=$_GET['max'];
        if($_GET['brand']!=""&&$_GET['nameAdvanced']!=""){
            $nameAdvanced=$_GET['nameAdvanced'];
            $nameAdvancedclear=preg_replace('/,+/', ' ', $nameAdvanced);
            $brands=$_GET['brand'];
            
            $sql="SELECT * FROM tbl_product WHERE brandID IN ($brands) AND productName LIKE '%$nameAdvancedclear%' AND cost BETWEEN $min AND $max LIMIT $from, $soSphamTrenTrang";
        }
        else if($_GET['brand']!=""){
            $brands=$_GET['brand'];
            $sql="SELECT * FROM tbl_product WHERE brandID IN ($brands) AND cost BETWEEN $min AND $max LIMIT $from, $soSphamTrenTrang";
        }
        else if($_GET['nameAdvanced']!=""){
            $nameAdvanced=$_GET['nameAdvanced'];
            $nameAdvancedclear=preg_replace('/,+/', ' ', $nameAdvanced);
            $sql="SELECT * FROM tbl_product WHERE productName LIKE '%$nameAdvancedclear%' AND cost BETWEEN $min AND $max LIMIT $from, $soSphamTrenTrang";
        }
        else
            $sql="SELECT * FROM tbl_product WHERE cost BETWEEN $min AND $max LIMIT $from, $soSphamTrenTrang";
    }
    
    else if($_GET['brand']!=""){
        $brands=$_GET['brand'];

        if($_GET['nameAdvanced']!=""){
            $nameAdvanced=$_GET['nameAdvanced'];
            $nameAdvancedclear=preg_replace('/,+/', ' ', $nameAdvanced);
            $brands=$_GET['brand'];
            $sql="SELECT * FROM tbl_product WHERE brandID IN ($brands) AND productName LIKE '%$nameAdvancedclear%' LIMIT $from, $soSphamTrenTrang";
    
        }
        else
            $sql="SELECT * FROM tbl_product WHERE brandID IN ($brands) LIMIT $from, $soSphamTrenTrang";

    }
   
    else if($_GET['nameAdvanced']!=""){
        $nameAdvanced=$_GET['nameAdvanced'];
        $nameAdvancedclear=preg_replace('/,+/', ' ', $nameAdvanced);
        $sql="SELECT * FROM tbl_product WHERE productName LIKE '%$nameAdvancedclear%' LIMIT $from, $soSphamTrenTrang";
    }
    else
        $sql="SELECT * FROM tbl_product LIMIT $from, $soSphamTrenTrang";
    
        // echo $sql;

    $list=$product->Select($sql);
    
    
}
else if(isset($_GET['name'])&&$_GET['name']!=""){
    
    $name=$_GET['name'];
    
    
    $nameclear=preg_replace('/,+/', ' ', $name);

    $sql="SELECT * FROM tbl_product WHERE productName LIKE '%$nameclear%' LIMIT $from, $soSphamTrenTrang";
    
    $list=$product->Select($sql);

}

else
    $list = $product->show_product_All($from, $soSphamTrenTrang);

if(!$list){
    echo "<p style='font-size: 20px; text-align: center; padding-top: 20px'> Xin lỗi, không có sản phẩm nào phù hợp yêu cầu </p>";
}

if ($list) {
    $i=1;
    while ($i<=$sodong) {
        $i++;
        $j=1;
        echo"<div class='gird__row'>";
        while ($result = $list->fetch_assoc()) {
            // $j++;
            // if($j==$sospanphamtrenDong) break;
            ?>

            <div class="col span-2-of-10">
                <!-- Product item -->
                <a href="products-details.php?product=<?php echo $result['productID'] ?>&theloai=<?php echo $theloai ?>" class="home-product-item">
                    <div class="home-product-item-img" style="background-image: url(admin/uploads/<?php echo $result['img'] ?>)">
                    </div>
                    <h4 class="home-product-item-name" style="font-size: 1.6rem;"><?php echo $result['productName'] ?></h4>
                    <div class="home-product-item-price">
                        <?php $cost = $result['cost'];

                        if($discount->getdiscountbyCat($result['catID'])){
                            $numberDiscount = $discount->getdiscountbyCat($result['catID'])->fetch_assoc();   
                            //$cost = ($cost * ($numberDiscount['percent'] / 100)) + $cost;
                            $cost=round($cost/(1-($numberDiscount['percent'] / 100)),-3);
                            
                            
                        ?>

                        <span class="home-product-item-price-old">
                            <?php echo number_format($cost, 0, ',', '.') . '₫' ; ?>
                        </span>

                        <?php } ?>

                        <span class="home-product-item-price-current"><?php echo number_format($result['cost'] , 0, ',', '.') . '₫' ?>
                        </span>

                    </div>
                    <div class="home-product-item-action">
                        <input type="checkbox" hidden id="like-id2" class="like-animation2">
                        <span class="home-product-item-like home-product-item-like-liked">
                            <label for="like-id2"><i class="home-product-item-like-icon-empty far fa-heart"></i></label>
                            <label for="like-id2"><i class="home-product-item-like-icon-liked fas fa-heart"></i></label>
                        </span>
                        <div class="home-product-item-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="home-product-item-sold">Đã bán 15</span>
                    </div>
                    <div class="home-product-item-origin">
                        <span class="home-product-item-origin-name">
                            <?php echo $result['supplier'] ?>
                        </span>
                    </div>
                    <div class="home-product-item-favourite">
                        <i class="fas fa-check"></i>
                        Yêu thích
                    </div>
                    <?php 
                    if($discount->getdiscountbyCat($result['catID'])){
                    ?>
                    <div class="home-product-item-sale-off">
                        <span class="home-product-item-sale-off-percent">
                        <?php echo $numberDiscount['percent']; ?> %</span>
                        <span class="home-product-item-sale-off-lable">GIẢM</span>
                    </div>
                    <?php } ?>
                </a>
            </div>
        
<?php
        if($j==$sospanphamtrenDong) break;
        $j++;
    }
        echo"</div>";
    }
}

?>