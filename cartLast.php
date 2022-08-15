<?php
    include_once 'inc/header.php';
    include_once 'classes/cart.php';
?>
        <!---------- cart items details ---------->
        
        <div class="small-container cart-page">
            <div class="page-cart-header">
                <span class="page-cart-header-title-product">STT</span>
                <span class="page-cart-header-title-product">CartID</span>
                <span class="page-cart-header-title-quantity" style="text-align: unset;">Date</span>
                <span class="page-cart-header-title-quantity">Cost</span>
            </div>
            <?php 


            $cart = new cart();
            $id = Session::get('memberID');
            if($cart->show_cartByID($id)){

            $cartlis = $cart->show_cartByID($id);
            if(isset($cartlis)){
                $i=0;
                while($result = $cartlis->fetch_assoc()){
                    $i++;
            
                    ?>
            <div class="page-cart-product">
                <!-- Them vao cart =  javaScript -->
                <div class="page-cart-header" style="background-color: unset; color: unset;">
                <span class="page-cart-header-title-product"><?php echo $i; ?></span>
                <a href="oderDetailLast.php?cartID=<?php echo $result['cartID']; ?>" style="text-decoration: none;" class="page-cart-header-title-product"><?php echo $result['cartID'] ?></a>
                <a href="oderDetailLast.php?cartID=<?php echo $result['cartID']; ?>" class="page-cart-header-title-quantity" style="text-align: unset; text-decoration: none;"><?php echo $result['date'] ?></a>
                <span class="page-cart-header-title-quantity"><?php echo number_format($result['cost'], 0, ',', '.') ?>₫</span>
            </div>
            </div>
            <?php
            }
        }}else{
                    echo"<p style='color: blue; font-size: 20px; margin-top: 20px;text-align: center;'>Bạn chưa có hóa đơn nào cả!!!</p>";
                }
           ?>
        
        </div>

        <?php
    include_once 'inc/footer.php';
?>