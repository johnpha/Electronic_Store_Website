<?php
include_once 'inc/header.php';
include_once 'classes/memberKH.php';
include_once 'classes/memberLogin.php';
include_once 'classes/product.php';
include_once 'classes/color.php';
include_once 'classes/member.php';
include_once 'classes/cart.php';
ob_start();

?>
<?php
$member = new memberKH();
$member1 = new member();


?>

<section class="account-page">
    <div class="row" style="display: flex; flex-direction: row">
        <div class="col span-1-of-2" style="border-right: 2px solid #ff523b; width: 60%;">
                
        <div class="small-container cart-page" style="margin-top: 36px; margin-bottom: 10px;">
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
                $_SESSION['cart'][$key]['qty']=$qty+1;
            }
            if(isset($_POST['tru'])){
                $qty = $_POST['qtity'];
                $key = $_POST['key'];
                if($qty>1){
                    $_SESSION['cart'][$key]['qty']=$qty-1;
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
                            <small>Pirce: ₫<?php echo $result['cost'] ?></small>
                            <br>
                            <a href="cart.php?del=<?php echo $key ?>">Remove</a>
                        </div>
                    </div>
                <div class="product-info-all">
                    <?php echo $result['colorName'] ?>
                    </div>
                    <div class="page-cart-product-price" style="width: 41%;">
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
          
            
        </div>
        </div>
        <div class="col span-1-of-2">
        <?php 
               
               $id = Session::get('memberID');
               $cart = new cart();
               
               $ssID = session_id();
                if (isset($_GET['cart']) && $_GET['cart']=="true") {
                    $addcart = $cart->addCartList($id,$s);
                }
               $memberDetail = $member1->getmemberbyId1($id)->fetch_assoc();
               
           ?>
            <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
           
           
                      
           <div style="display: flex; font-size: 18px;">
           <div class="col span-1-of-2 col-2" style="font-weight: bold; width: 30%;">
           
            <p class="Home">Họ Tên         </p>
            <p class="Home">User           </p>
            <p class="Home">Địa Chỉ        </p>
            <p class="Home">Email          </p>
            <p class="Home">Số Điện Thoại  </p>
            </div>
            
            <div class="col span-1-of-2 col-2" style="font-weight: bold; width: 10%;">
            <p class="Home">:</p>
            <p class="Home">:</p>
            <p class="Home">:</p>
            <p class="Home">:</p>
            <p class="Home">:</p>
            </div>
            
            <div class="col span-1-of-2 col-2" style="font-weight: bold;">
            
            <p class="Home"><?php echo $memberDetail['memberName'] ?></p>
            <p class="Home"><?php echo $memberDetail['user'] ?></p>
            <p class="Home"><?php echo $memberDetail['diachi'] ?></p>
            <p class="Home"><?php echo $memberDetail['email'] ?></p>
            <p class="Home"><?php echo $memberDetail['phone'] ?></p>
           
        </div>
           </div> 
           <!-- </form> -->
        

    </div>

    </div>
    <div style="text-align: center; margin-top: 20px;">
    <?php  
     
    // if($cart->getcartListID($id,$ssID)!= false){
        $cartadd = $cart->getcartListID($id,$ssID)->fetch_assoc();
        $cartadd = $cartadd['cartID'];
    
    ?>
    <a href="confirmOder.php?sub=<?php echo $subtotal; ?>&cartID=<?php echo $cartadd;?>" class="btn btn-primary" style="width: 5%;">Thanh Toán</a>

    </div>
    


</section>

<script>
var LoginForm = document.getElementById("LoginForm");
var RegForm = document.getElementById("RegForm1");
var Indicator = document.getElementById("Indicator");

function register() {
    RegForm.style.transform = "translateX(0px)";
    LoginForm.style.transform = "translateX(0px)";
    Indicator.style.transform = "translateX(100px)";
    formcontainer.style.height = "230px";
    formcontainer.style.margin = "100px auto auto auto";

}

function login() {
    RegForm.style.transform = "translateX(400px)";
    LoginForm.style.transform = "translateX(400px)";
    formcontainer.style.height = "300px";
    formcontainer.style.margin = "100px auto auto auto";
    Indicator.style.transform = "translateX(0px)";
}
</script>
<?php
include_once 'inc/footer.php';
?>