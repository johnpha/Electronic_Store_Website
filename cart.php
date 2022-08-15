<?php
    include_once 'inc/header.php';
    include_once 'classes/cart.php';
?>
        <!---------- cart items details ---------->
        
        <div class="small-container cart-page">
            <div class="page-cart-header">
                <span class="page-cart-header-title-product">Product</span>
                <span class="page-cart-header-title-quantity">Color</span>
                <span class="page-cart-header-title-quantity">Quantity</span>
                <span class="page-cart-header-title-subtotal">Subtotal</span>
            </div>
            <?php 

            if(isset($_POST['cong'])){
                $qty = $_POST['qtity'];
                $key = $_POST['key'];
                $_SESSION['cart'][$key]['qty']++;
                header("Location: cart.php");

            }
            if(isset($_POST['tru'])){
                $qty = $_POST['qtity'];
                $key = $_POST['key'];
                if($qty>1){
                    $_SESSION['cart'][$key]['qty']--;
                    header("Location: cart.php");
                }
            }
            
            if(isset($_GET['del'])){
                $key1 = $_GET['del'];
                unset($_SESSION['cart'][$key1]);
                header("Location: cart.php");
            }

            $cart = new cart();


            if(isset($_SESSION['cart'])){
                $subtotal = 0;
                foreach ($_SESSION['cart'] as $key => $val) {
                    $result = $cart->getProColorbyID($key)->fetch_assoc(); 
                    ?>
            <div class="page-cart-product">
                <!-- Them vao cart =  javaScript -->
                <div class="product-info-all">
                    <div class="cart-info">
                        <img src="admin/uploads/<?php echo $result['img'] ?>" alt="photo">
                        <div>
                            <p><?php echo $result['productName'] ?></p>
                            <small>Pirce: ₫<?php echo number_format($result['cost'], 0, ',', '.') ?></small>
                            <br>
                            <a href="cart.php?del=<?php echo $key ?>">Remove</a>
                        </div>
                    </div>
                <div class="product-info-all">
                    <?php echo $result['colorName'] ?>
                    </div>
                    <div class="page-cart-product-price">
                        <div style="margin-left: 58px;">
                        <form action="" method="POST">
                        <button name="tru" class="btn-cart remove-quality">-</button>
                            <input type="number" name="qtity" value="<?php echo $_SESSION['cart'][$key]['qty'] ?>" min="1">
                            <input type="number" name="key" value="<?php echo $key ?>" min="1" hidden>
                            <button name="cong" class="btn-cart add-quality">+</button></div>
                            </form>
                        ₫<?php 
                        $subtotal+= $_SESSION['cart'][$key]['qty']*$result['cost'];
                        
                        echo number_format($_SESSION['cart'][$key]['qty']*$result['cost'], 0, ',', '.');
                        ?>
                    </div>

                </div>
            </div>
            <?php
                }}
           ?>
            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>₫<?php  if(isset($subtotal)) echo number_format($subtotal, 0, ',', '.'); else{
                            echo 0;
                        } ?></td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>₫<?php 
                            if(!isset($subtotal) ||  $subtotal==0){
                                echo "0";
                            }else{
                                if(isset($subtotal) && $subtotal !=0)
                                echo "15.000";
                            }
                        ?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>₫<?php
                         if(!isset($subtotal) || $subtotal==0){
                            $t = 0;
                        }else{
                            if(isset($subtotal) && $subtotal !=0)
                            $t = 15000;
                            $s = $t+$subtotal; 
                        }
                        // $t = 15000;
                         
                        if(isset($s)) echo number_format($s, 0, ',', '.'); 
                        else{
                            echo 0;
                        } ?></td>
                    </tr>
                </table>
            </div>
          
            <div class="shopping">
                <div class="shopleft">
                    <a href="index.php?cat=17"> <img src="resources/img/shop.png" alt="photo" /></a>
                </div>
                <div class="shopright">
                    <a href="<?php 
                    if(isset($s) && $s!="0") echo "oderDetail.php?cart=true";
                    else{
                        echo "index.php?cat=17";
                    }
                    ?>"> <img style="width: 275px;" src="resources/img/check.png" alt="photo" /></a>
                </div>
            </div>
        </div>

        <?php
    include_once 'inc/footer.php';
?>