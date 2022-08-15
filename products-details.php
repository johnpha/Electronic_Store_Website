<?php
include_once 'inc/header.php';
include_once 'classes/product.php';
include_once 'classes/color.php';
include_once 'classes/cart.php';

?>

<?php 

    $product = new product();   
    $cart = new cart();

    if(isset($_GET['product']) && isset($_GET['theloai'])){
        $productID = $_GET['product'];
        $catID = $_GET['theloai'];
    }

    
    if(isset($_POST['addcart'])){
        $quatity = $_POST['quatity'];
        $color = $_POST['color'];
        // $id = Session::get('memberID');
        $id = $productID;
        // $addcart = $cart->add_cart($id,$productID,$quatity,$color);
        $result1 = $cart->getProColor($id,$color)->fetch_assoc();
        $result = $result1['proColorID'];
        // var_dump($result);exit;
        if(isset($_SESSION['cart'][$result])){
            $_SESSION['cart'][$result]['qty'] +=$quatity;
        }else{
            $productDet = $product->getproductbyId($id);
            if($productDet->num_rows !=0){
                $row = $productDet->fetch_assoc();
                $_SESSION['cart'][$result]['qty'] = $quatity;
            }else{
                return "san pham khong ton tai";
            }
        }

        // if(isset($_SESSION['cart'])){
        //     foreach($_SESSION['cart'] as $key => $val){
        //         echo $key ."<br>". $val['qty'] . "<br>";
        //     }
        // }

        // unset($_SESSION['cart']);
        header("Location: products-details.php?product=$productID&theloai=$catID");
    }

    


    $catName = $product->getNameCategory($catID)->fetch_assoc();
    $productDetail = $product->getproductbyId($productID);
    $productIMG = $product->getproductIMG($productID);
    // var_dump($productIMG->fetch_assoc());exit;
    if(isset($productDetail)){
        while($result = $productDetail->fetch_assoc()){

?>

<!---------- Single product details ---------->
<div id="single-product-detail">
    <div class="small-container single-product">
        <div class="gird">
            <div class="col span-1-of-2 col-2">
                <img class="img1" src="admin/uploads/<?php echo $result['img']?>" width="100%" id="ProductImg" alt="photo">
                <div class="small-img-row">
                    <?php 
                        if(isset($productIMG) && $productIMG!= false){
                            while($result2 = $productIMG->fetch_assoc()){
                                
                                $img = $result2['img'];
                                
                                echo "<div class='small-img-col'>
                                <img width='100%' src='admin/uploads/$img' class='small-img' alt='photo'>
                                </div>";
                            }
                        }
                    ?>
                    
                    
                </div>
            </div>
            <div class="col span-1-of-2 col-2">
                <p class="Home">Home / <?php echo $catName['catName']?> / <?php echo $result['productName'] ?></p>
                <h1><?php echo $result['productName'] ?></h1>
                <h4>₫<?php echo number_format($result['cost'] , 0, ',', '.')  ?></h4>
                <form action="" method="POST">
                <select name="color">
                    <!-- <option value="0">Select Color</option> -->
                    <?php 
                        include_once 'classes/color.php';
                        $color = new color();
                        $list = $color->getcolorbyId($result['productID']);
                        while($result1 = $list->fetch_assoc()){
                            $colorName = $result1['colorName'];
                            $colorID = $result1['colorID'];
                            echo"<option value='$colorID' >$colorName</option>";
                        }
                    ?>
                    
                    <!-- <option>Màu Đen</option>
                    <option>Màu Vàng</option>
                    <option>Màu Đỏ</option> -->
                </select>
                
                <input type="number" name="quatity" style="width: 75px;" value="1" min="1">
                
                
                <?php 
                    if(Session::get("memberlogin")){
                        
                        echo '<input type="submit" class="btn" style="width: 35%;" name="addcart" value="Thêm Vào Giỏ Hàng" >';
                    }else{
                        echo '<a onclick="return confirm(';
                        echo "'Vui lòng Đăng nhập để mua hàng')";
                        echo '"';
                        echo "href='login.php'";
                        echo 'class="add-cart btn btn-primary btn-add" style="width: 50%;">Add To Cart</a>';
                    }
                ?>
                </form>
                <?php 
                    if(isset($addcart)){
                        echo $addcart;
                    }
                ?>
                <h3>Product Detais <i class="detail-icon fa fa-indent"></i></h3>
                <br>
                <p>
                    <?php echo $result['description'] ?>
                </p>

            </div>
        </div>
    </div>

    <!---------- Title ---------->

    <div class="small-container">
        <div class="row row-2">

        </div>
    </div>
</div>
<?php 
        }
    }

?>
<div class="container">
    <div class="gird">
        <div class="gird__row app-content">
            <div class="home-product-detail">
                <div> <span>CÁC SẢN PHẨM KHÁC CỦA SHOP</span></div>
                <div><a href="#" class="show-all">Xem tất cả ></a></div>
            </div>
            <div class="home-product">
                <div class="gird__row">
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="products-details.php" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8c2f8d5b2554618fc2166ee68da53e7e_tn)">
                            </div>
                            <h4 class="home-product-item-name">Điện thoại thông minh Samsung Galaxy Note 20
                                Ultra/ Note 20 Ultra 5G FULLBOX NGUYÊN SEAL Hàng chính hãng.</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫29.990.000</span>
                                <span class="home-product-item-price-current">₫23.650.000</span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 121</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">10%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>

                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="products-details.php" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/590fbab9a79a9be6e4d992db3d5fe9e8)">
                            </div>
                            <h4 class="home-product-item-name">ANDROID Đồng Hồ Thông Minh Ky11 1.3 Inch Theo
                                Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫609.895</span>
                                <span class="home-product-item-price-current">₫360.000
                                </span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
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
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">41%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/19280789f95562f92e6045ded80dfd0a_tn)">
                            </div>
                            <h4 class="home-product-item-name">Điện Thoại Apple iPhone 11 Pro Max 256GB ( LL
                                1 sim) - Hàng mới 100%</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫31.500.000</span>
                                <span class="home-product-item-price-current">₫28.450.000</span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 101</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">29%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8731249a4ff438c2df713c47d5e7aa0a)">
                            </div>
                            <h4 class="home-product-item-name">Điện thoại OPPO Reno3 Pro 8GB RAM/ 256GB ROM
                                chính hãng, tặng kèm tai nghe Bluetooth Tekin và ốp lưng thời trang</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫11.490.000
                                </span>
                                <span class="home-product-item-price-current">₫9.990.000
                                </span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 111</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">13%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/e162b7aa7915986f037e522b9812f42f)">
                            </div>
                            <h4 class="home-product-item-name">Đồng Hồ Đeo Tay Thông Minh Fly-dtno.i G12 Bt
                                4.2 Chống Nước Ip67 Theo Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫1.643.000</span>
                                <span class="home-product-item-price-current">₫1.065.500</span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 12</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">35%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8731249a4ff438c2df713c47d5e7aa0a)">
                            </div>
                            <h4 class="home-product-item-name">Điện thoại OPPO Reno3 Pro 8GB RAM/ 256GB ROM
                                chính hãng, tặng kèm tai nghe Bluetooth Tekin và ốp lưng thời trang</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫11.490.000
                                </span>
                                <span class="home-product-item-price-current">₫9.990.000
                                </span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 111</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">13%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="gird__row">
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8c2f8d5b2554618fc2166ee68da53e7e_tn)">
                            </div>
                            <h4 class="home-product-item-name">Điện thoại thông minh Samsung Galaxy Note 20
                                Ultra/ Note 20 Ultra 5G FULLBOX NGUYÊN SEAL Hàng chính hãng.</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫29.990.000</span>
                                <span class="home-product-item-price-current">₫23.650.000</span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 121</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">10%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8731249a4ff438c2df713c47d5e7aa0a)">
                            </div>
                            <h4 class="home-product-item-name">Điện thoại OPPO Reno3 Pro 8GB RAM/ 256GB ROM
                                chính hãng, tặng kèm tai nghe Bluetooth Tekin và ốp lưng thời trang</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫11.490.000
                                </span>
                                <span class="home-product-item-price-current">₫9.990.000
                                </span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 111</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">13%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/19280789f95562f92e6045ded80dfd0a_tn)">
                            </div>
                            <h4 class="home-product-item-name">Điện Thoại Apple iPhone 11 Pro Max 256GB ( LL
                                1 sim) - Hàng mới 100%</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫31.500.000</span>
                                <span class="home-product-item-price-current">₫28.450.000</span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 101</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">29%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/590fbab9a79a9be6e4d992db3d5fe9e8)">
                            </div>
                            <h4 class="home-product-item-name">ANDROID Đồng Hồ Thông Minh Ky11 1.3 Inch Theo
                                Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫609.895</span>
                                <span class="home-product-item-price-current">₫360.000
                                </span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
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
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">41%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8731249a4ff438c2df713c47d5e7aa0a)">
                            </div>
                            <h4 class="home-product-item-name">Điện thoại OPPO Reno3 Pro 8GB RAM/ 256GB ROM
                                chính hãng, tặng kèm tai nghe Bluetooth Tekin và ốp lưng thời trang</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫11.490.000
                                </span>
                                <span class="home-product-item-price-current">₫9.990.000
                                </span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 111</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">13%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/e162b7aa7915986f037e522b9812f42f)">
                            </div>
                            <h4 class="home-product-item-name">Đồng Hồ Đeo Tay Thông Minh Fly-dtno.i G12 Bt
                                4.2 Chống Nước Ip67 Theo Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫1.643.000</span>
                                <span class="home-product-item-price-current">₫1.065.500</span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 12</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">35%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="gird__row">
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8c2f8d5b2554618fc2166ee68da53e7e_tn)">
                            </div>
                            <h4 class="home-product-item-name">Điện thoại thông minh Samsung Galaxy Note 20
                                Ultra/ Note 20 Ultra 5G FULLBOX NGUYÊN SEAL Hàng chính hãng.</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫29.990.000</span>
                                <span class="home-product-item-price-current">₫23.650.000</span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 121</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">10%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/19280789f95562f92e6045ded80dfd0a_tn)">
                            </div>
                            <h4 class="home-product-item-name">Điện Thoại Apple iPhone 11 Pro Max 256GB ( LL
                                1 sim) - Hàng mới 100%</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫31.500.000</span>
                                <span class="home-product-item-price-current">₫28.450.000</span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 101</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">29%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/590fbab9a79a9be6e4d992db3d5fe9e8)">
                            </div>
                            <h4 class="home-product-item-name">ANDROID Đồng Hồ Thông Minh Ky11 1.3 Inch Theo
                                Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫609.895</span>
                                <span class="home-product-item-price-current">₫360.000
                                </span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
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
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">41%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8731249a4ff438c2df713c47d5e7aa0a)">
                            </div>
                            <h4 class="home-product-item-name">Điện thoại OPPO Reno3 Pro 8GB RAM/ 256GB ROM
                                chính hãng, tặng kèm tai nghe Bluetooth Tekin và ốp lưng thời trang</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫11.490.000
                                </span>
                                <span class="home-product-item-price-current">₫9.990.000
                                </span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 111</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">13%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8731249a4ff438c2df713c47d5e7aa0a)">
                            </div>
                            <h4 class="home-product-item-name">Điện thoại OPPO Reno3 Pro 8GB RAM/ 256GB ROM
                                chính hãng, tặng kèm tai nghe Bluetooth Tekin và ốp lưng thời trang</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫11.490.000
                                </span>
                                <span class="home-product-item-price-current">₫9.990.000
                                </span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 111</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">13%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <div class="col span-2-of-12">
                        <!-- Product item -->
                        <a href="#" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/e162b7aa7915986f037e522b9812f42f)">
                            </div>
                            <h4 class="home-product-item-name">Đồng Hồ Đeo Tay Thông Minh Fly-dtno.i G12 Bt
                                4.2 Chống Nước Ip67 Theo Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item-price-old">₫1.643.000</span>
                                <span class="home-product-item-price-current">₫1.065.500</span>
                            </div>
                            <div class="home-product-item-action">
                                <span class="home-product-item-like home-product-item-like-liked">
                                    <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                </span>
                                <div class="home-product-item-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="home-product-item-sold">Đã bán 12</span>
                            </div>
                            <div class="home-product-item-origin">
                                <span class="home-product-item-origin-name">
                                    TP. Hồ Chí Minh
                                </span>
                            </div>
                            <div class="home-product-item-favourite">
                                <i class="fas fa-check"></i>
                                Yêu thích
                            </div>
                            <div class="home-product-item-sale-off">
                                <span class="home-product-item-sale-off-percent">35%</span>
                                <span class="home-product-item-sale-off-lable">GIẢM</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <ul class="pagination product-detail-pagination">
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">
                        <i class="pagination-item-icon fas fa-chevron-left"></i>
                    </a>
                </li>
                <li class="pagination-item pagination-item-active">
                    <a href="" class="pagination-item-link">
                        1
                    </a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">
                        2
                    </a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">
                        3
                    </a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">
                        4
                    </a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">
                        ...
                    </a>
                </li>
                <li class="pagination-item">
                    <i class="far fa-chevron-left"></i>
                    <a href="" class="pagination-item-link">
                        <i class="pagination-item-icon fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
<?php
include_once 'inc/footer.php';
?>