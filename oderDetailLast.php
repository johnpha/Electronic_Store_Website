<?php
    include_once 'inc/header.php';
    include_once 'classes/cart.php';
?>
        <!---------- cart items details ---------->
        
        <div class="small-container cart-page">
            <div class="page-cart-header">
                <span class="page-cart-header-title-product">STT</span>
                <span class="page-cart-header-title-product">Tên Sản Phẩm</span>
                <!-- <span class="page-cart-header-title-product">Hình Ảnh</span> -->
                <span class="page-cart-header-title-product">Màu Sắc</span>
                <span class="page-cart-header-title-product">Số Lượng</span>
                <span class="page-cart-header-title-product">Cost</span>
                <span class="page-cart-header-title-product">Status</span>
                <span class="page-cart-header-title-product">Action</span>
            </div>
            <?php 


            $cart = new cart();

            if(isset($_GET['cartID']) && $_GET['cartID'] != null){
                $id = $_GET['cartID'];
            }
            if(isset($_GET['confirmID']) && $_GET['confirmID'] != null){
                $idConfirm = $_GET['confirmID'];
                $cart->updateStatus1($idConfirm);
            }

          
            
            if($cart->show_oderByID($id)){
                $cartlis = $cart->show_oderByID($id);
                $i=0;
                while($result = $cartlis->fetch_assoc()){
                    $i++;
            
                    ?>
            <div class="page-cart-product">
                <!-- Them vao cart =  javaScript -->
                <div class="page-cart-header" style="background-color: unset; color: unset;">
                <span class="page-cart-header-title-product"><?php echo $i; ?></span>
                <span class="page-cart-header-title-product"><?php echo $result['productName'] ?></span>
                <span class="page-cart-header-title-product"><?php echo $result['colorID'] ?></span>
                <span class="page-cart-header-title-product"><?php echo $result['quatity'] ?></span>
                <span class="page-cart-header-title-product"><?php echo number_format($result['quatity']*$result['price'], 0, ',', '.') ?>₫</span>
                <span class="page-cart-header-title-product">
                <?php 
                    
                    switch($result['status']){
                        case 0:
                            echo "Đang Xử Lí";
                        break;
                        case 1:
                            echo "Đang Vận Chuyển";
                        break;
                            case 2:
                            echo "Đã Nhận";
                            break;
                        }
                
                ?></span>
                
                <span class="page-cart-header-title-product"><?php  switch($result['status']){
                        case 0:
                            echo "N/A";
                        break;
                        case 1:
                            $idCart = $result['cartDetaiID'];
                            echo "<a href='?confirmID=$idCart&cartID=$id' style='text-decoration: none;
                            color: red;
                            font-weight: 500;'>Confirmed</a>";
                        break;
                            case 2:
                            echo "Hoàn Thành";
                            break;
                        } ?></span>
            </div>
            </div>
            <?php
                }}else{
                    $cart->deletecart($id);
                }
           ?>
        
        </div>

        <?php
    include_once 'inc/footer.php';
?>