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

if (isset($_GET['sub']) && $_GET['sub']!=null) {
    $sub = $_GET['sub'];
    // var_dump($sub);
}
if (isset($_GET['cartID']) && $_GET['cartID']!=null) {
    $cartID = $_GET['cartID'];
    // var_dump($sub);
}
if (isset($_GET['oder']) && $_GET['oder']=="t") {
    $cart = new cart();


            if(isset($_SESSION['cart'])){
                $subtotal = 0;
                foreach ($_SESSION['cart'] as $key => $val) {
                    $result = $cart->getProColorbyID($key)->fetch_assoc();
                    $proID = $result['productID'];
                    $name = $result['productName'];
                    $price = $result['cost'];
                    $quatity = $_SESSION['cart'][$key]['qty'];
                    $colorID = $result['colorName'];
                    $cost = $price*$quatity;
                    $add = $cart->add_oder($cartID,$proID,$name,$price,$quatity,$colorID,$cost);
                    
                }
            }
}

?>

<section class="account-page">
    <div class="row">
    <p style="text-align: center; font-size: 18px;" ><?php
     global $check;
     $check = true;
    if(isset($add)){
       
        $check = false;
        echo $add;
    }?></p>
        <div style="margin: 0 auto; text-align: center; width: 50%;">
        <?php 
               
               $id = Session::get('memberID');
               $memberDetail = $member1->getmemberbyId1($id)->fetch_assoc();
           ?>
            <!-- <form action="" method="POST" enctype="multipart/form-data"> -->

           
                      
           <div style="display: flex; font-size: 18px;">
           <div class="col span-1-of-2 col-2" style="font-weight: bold; width: 30%;">
           
            <p class="Home">Họ Tên         </p>
            <!-- <p class="Home">User           </p> -->
            <p class="Home">Địa Chỉ        </p>
            <p class="Home">Email          </p>
            <p class="Home">Số Điện Thoại  </p>
            <p class="Home">Tổng Tiền  </p>
            <p class="Home">Phí Vận Chuyển  </p>
            <p class="Home">Tiền Phải Trả  </p>
            </div>
            
            <div class="col span-1-of-2 col-2" style="font-weight: bold; width: 10%;">
            <p class="Home">:</p>
            <p class="Home">:</p>
            <p class="Home">:</p>
            <p class="Home">:</p>
            <p class="Home">:</p>
            <p class="Home">:</p>
            <p class="Home">:</p>
            </div>
            
            <div class="col span-1-of-2 col-2" style="font-weight: bold;">
            
            <p class="Home"><?php echo $memberDetail['memberName'] ?></p>
            <!-- <p class="Home"><?php echo $memberDetail['user'] ?></p> -->
            <p class="Home"><?php echo $memberDetail['diachi'] ?></p>
            <p class="Home"><?php echo $memberDetail['email'] ?></p>
            <p class="Home"><?php echo $memberDetail['phone'] ?></p>
            <p class="Home"><?php echo number_format($sub, 0, ',', '.') ?>₫</p>
            <p class="Home"><?php echo "15.000" ?>₫</p>
            <p class="Home" style="color: blue;"><?php 
            $tax = 15000;
            $s = $tax+$sub;
            echo number_format($s, 0, ',', '.') ?>₫</p>
           
        </div>
           </div> 
           <!-- </form> -->
        

    </div>

    </div>
    <div style="text-align: center; margin-top: 20px;">
    <?php if($check == true)
        echo "<a href='?sub=$sub&oder=t&cartID=$cartID' class='btn btn-primary' style='width: 20%;'>Xác Nhận Thanh Toán</a>";
        else{
            unset($_SESSION['cart']);
        echo "<a href='index.php' class='btn btn-primary' style='width: 20%;'>Mua Sắm Tiếp Tục</a>";
        }
    ?>

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