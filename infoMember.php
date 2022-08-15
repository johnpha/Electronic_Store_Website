<?php
include_once 'inc/header.php';
include_once 'classes/product.php';
include_once 'classes/color.php';
include_once 'classes/member.php';

?>

<?php 
 $member = new member();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatemember']) ){
        $id = Session::get('memberID');
        $updateMember = $member->update_member1($_POST,$_FILES,$id);
    }
?>

<!---------- Single product details ---------->
<div id="single-product-detail">
    <div class="small-container single-product">
        <div class="gird">
        <?php 
               
               $id = Session::get('memberID');
               $memberDetail = $member->getmemberbyId1($id)->fetch_assoc();
           ?>
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="col span-1-of-2 col-2">
            <?php if(isset($updateMember)) echo $updateMember;?>
                <img class="img1" src="admin/img_user/<?php echo $memberDetail['img'] ?>" width="70%" id="ProductImg" alt="photo">
                <input name="img" type="file" style="display: block; width: 70%; border: unset;"/> 

            </div>
                      
           <div style="display: flex; width: 40%;">
           <div class="col span-1-of-2 col-2" style="font-weight: bold;">
           
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
            
            <input class="Home" name="name" style="width: unset; height: unset; font-size: 20px; margin-bottom: 0px;" value="<?php echo $memberDetail['memberName'] ?>"></input>
            <input class="Home" name="user" style="width: unset; height: unset; font-size: 20px; margin-bottom: 0px;" value="<?php echo $memberDetail['user'] ?>"></input>
            <input class="Home" name="diachi" style="width: unset; height: unset; font-size: 20px; margin-bottom: 0px;" value="<?php echo $memberDetail['diachi'] ?>"></input>
            <input class="Home" name="email" style="width: unset; height: unset; font-size: 20px; margin-bottom: 0px;" value="<?php echo $memberDetail['email'] ?>"></input>
            <input class="Home" name="phone" style="width: unset; height: unset; font-size: 20px; margin-bottom: 0px;" value="<?php echo $memberDetail['phone'] ?>"></input>
           
        </div>
           </div>
           <input type="submit" class="btn" style="width: 35%;" name="updatemember" value="Cập nhật thông tin tài khoản" >
           </form>
        </div>
    </div>

    <!---------- Title ---------->

    <div class="small-container">
        <div class="row row-2">

        </div>
    </div>
</div>


<?php
include_once 'inc/footer.php';
?>