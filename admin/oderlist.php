<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php' ?>
<?php include '../classes/brand.php' ?>
<?php include '../classes/cart.php' ?>
<?php include '../classes/product.php' ?>
<style>
.cartCenter{
    text-align: center;
}

</style>
<?php
// $cat = new category();
$cart = new cart();
$product=new product();
// $cart = new cart();
if(isset($_GET['confirmID']) && $_GET['confirmID'] != null){
    $idConfirm = $_GET['confirmID'];
    $cart->updateStatus0($idConfirm);
    echo "<script> document.location='oderlist.php' </script>";
}
if(isset($_GET['delidOder'])){
    $idConfirm = $_GET['delidOder'];
    $cart->deleteOder($idConfirm);

    // header("Location: oderlist.php?delidOder=$idConfirm");
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Oder List</h2>
        <form  action="" method="get" onsubmit="return checkDate();">
            <div class="formSelect">
                
                <div>
                    <label for="dateFrom">Từ</label>
                    <input type="date" name="dateFrom" id="dateFrom" class="form-control-date">
                </div>
                <div>
                    <label for="dateTo">Đến</label>
                    <input type="date" name="dateTo" id="dateTo" class="form-control-date">
                </div>
                <button style="padding-left: 10px" type="submit">Xác nhận</button>
                <?php if(isset($_GET['dateFrom'])&&isset($_GET['dateTo'])){ ?>
                    <button style="margin-left: 10px" type="button" onclick="location.href='oderlist.php'">Quay lại</button>
                <?php }?>
            </div>
        </form>
        <?php
            if(isset($result)){
                echo $result;
            }
        ?>
        <?php 
        
        if(isset($_GET['dateFrom'])&&$_GET['dateFrom']!=""&&isset($_GET['dateTo'])&&$_GET['dateTo']!=""){
            $dateFrom=$_GET['dateFrom'];
            $dateTo=$_GET['dateTo'];
            /*
            $sql="SELECT * FROM tbl_cart 
            WHERE cartID IN
            (SELECT cartID FROM tbl_cart_list WHERE cast(date as DATE) BETWEEN '$dateFrom' AND '$dateTo')";
            echo $sql;
            $listcart=$product->select($sql);
            */
        
        
        ?>
        <div class="block">
            
            <table class="data display datatable" id="cartlist">
            <thead>
                <th>Cart ID</th>
                <th>Tên Khách Hàng</th>
                <th>Ngày</th>
                <th>Tổng Tiền</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM tbl_cart_list WHERE cast(date as DATE) BETWEEN '$dateFrom' AND '$dateTo'";
                    if($result=$product->select($sql)){
                        while($row=$result->fetch_array()){
                        
                ?>
                <tr class="odd gradeX">

                <td><?php echo $row['cartID'] ?></td>
                <?php 
                    $sql="SELECT memberName FROM tbl_member WHERE memberID=$row[memberID]";
                    if($result1=$product->Select($sql)){
                    $row1=$result1->fetch_array();
                
                ?>
                <td><?php echo $row1['memberName'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo $row['cost'] ?></td>
                <td><button id="<?php echo $row['cartID'] ?>" class="show">Xem</button></td>
                
                </tr>

                <?php }}} ?>

            </tbody>
            </table>
        </div>
        


        <?php
        }
        
        else{
        
        ?>
        
        <div class="block" id="content">
            
            <table class="data display datatable" id="cart">
                <thead>
                    
                    <tr>
                        <th>Cart ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Màu Sắc</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                        <th>Trạng Thái</th>
                    
                        <th>Action</th>

                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                    if(isset($_GET['id'])&&$_GET['id']!=""){
                        $sql="SELECT * FROM tbl_cart WHERE cartID=$_GET[id]";

                        //echo $sql;
                        $temp=-1;

                        $listcart=$product->select($sql);
                    }

                    else
					    $listcart = $cart->show_oder();
					if ($listcart) {
						$i=0;
						while ($result = $listcart->fetch_assoc()) {
							$i++;
					?>
                    <tr class="odd gradeX" id="<?php if(isset($temp)) echo $temp?>">
                        <td><?php echo $result['cartID'] ?></td>
                        <td><?php echo $result['productName'] ?></td>
                        <td><?php echo $result['colorID'] ?></td>
                        <td><?php echo $result['price'] ?></td>
                        <td><?php echo $result['quatity'] ?></td>
                        <td><?php echo $result['price']*$result['quatity'] ?></td>
                        <td><?php  switch($result['status']){
                        case 0:
                            echo "Đang Xử Lí";
                        break;
                        case 1:
                            echo "Đang Vận Chuyển";
                        break;
                            case 2:
                                echo "Đã Nhận";
                            break;
                        } ?></td>
                        
                        <td><?php 
                        $idCart = $result['cartDetaiID'];
							 switch($result['status']){
                                case 0:
                                    
                            echo "<a href='?confirmID=$idCart' style='text-decoration: none;
                            color: red;
                            font-weight: 500;'>Confirm</a>";
                                break;
                                case 1:
                                    echo "Đang Vận Chuyển";
                                break;
                                    case 2:
                                        echo "<a href='?delidOder=$idCart' style='text-decoration: none;
                                        color: blue;
                                        font-weight: 500;'>Xóa</a>";
                                    break;
                                }
							?></a></td>
                    </tr>
                    <?php

						}
					}
					?>
                </tbody>
            </table>
            
        </div>

        <?php } ?>
        <div class="block" id="content" style="padding-top: 10px">
    
        
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    
    setupLeftMenu();
    setSidebarHeight();
    
    var cartlist=document.getElementById(-1);
    
    if(cartlist==null){
        
        $('.datatable').dataTable();
        
    }
    
    

    $("button.show").click(function(e){
        e.preventDefault();
        
        var id=$(this).attr("id");
        
        //alert(id);
        
        $.ajax({
        url: "oderlist.php",
        type: "GET",
        data: {
            id:id

        },
        cache: false,
        success: function(dataResult){
           
            var result = $('<div />').append(dataResult).find("#content").html();
            $("#content").html(result);
            $("#cart").addClass("cartCenter");
            
            
        }
        });
        
    })
});
function checkDate(){
    var from=document.getElementById("dateFrom");
    var to=document.getElementById("dateTo");
    
    if(to.value<from.value){
        alert("Bạn nhập khoảng thời gian không hợp lệ")
        return false;
    }
    return true;
    
}
</script>

<?php include 'inc/footer.php'; ?>