<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php' ?>
<?php include '../classes/brand.php' ?>
<?php include '../classes/product.php' ?>

<?php
include_once('../classes/discount.php');
$cat = new category();
$brand = new brand();
$product = new product();

?>

<div class="grid_10">

    <div class="box round first grid">
        <h2>THỐNG KÊ</h2>
        
        <form  action="" method="get" onsubmit="return checkDate();">
            <div class="formSelect">
                
                <div>Loại</div>
                <select name="theloai" style="margin-right: 10px" class="form-control-date">
                <?php 
                    $sql="SELECT * FROM tbl_category";
                    if($result=$product->select($sql)){
                        while($row=$result->fetch_array()){
                ?>
                
                <option value="<?php echo $row[0] ?>"<?php if($row[0]==17) echo "selected" ?>><?php echo $row[1] ?></option>
                
                <?php }} ?>
                </select>
                
                <div>
                    <label for="dateFrom">Từ</label>
                    <input type="date" name="dateFrom" id="dateFrom" class="form-control-date">
                </div>
                <div>
                    <label for="dateTo">Đến</label>
                    <input type="date" name="dateTo" id="dateTo" class="form-control-date">
                </div>
                <button style="padding-left: 10px" type="submit">Confirm</button>
            </div>
        </form>
        <?php 
            if(isset($_GET['theloai'])&&isset($_GET['dateFrom'])&&isset($_GET['dateTo'])){
                $theloai=$_GET['theloai'];
                $dateFrom=$_GET['dateFrom'];
                $dateTo=$_GET['dateTo'];
                $dateFormatFrom=date("d-m-Y", strtotime($dateFrom));  
                $dateFormatTo=date("d-m-Y", strtotime($dateTo));  

                //echo $theloai."<br>".$dateFrom."<br>".$dateTo;

                $sql="SELECT catName FROM tbl_category WHERE catID=$theloai";
                $result=$product->Select($sql);
                $row=$result->fetch_array();
                $nameTL=$row[0];
                
        ?>
        
        <div class="block">

            <div class="titleStat"> 
                    <p><?php echo "Thống kê doanh thu và số lượng sản phẩm thuộc ".$nameTL?></p>
                    <p><?php echo "Từ ".$dateFormatFrom." đến ".$dateFormatTo ?></p>
            </div>
            <table class="data display datatable" id="mytable">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số Lượng</th>
                        <th>Doanh Thu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        $productArr=array();


                        if($theloai!=17)
                            $sql="SELECT * FROM tbl_product WHERE catID=$theloai" ;
                        else
                            $sql="SELECT * FROM tbl_product";

                        if(!$result=$product->Select($sql))
                            die("error sql product");

                        $totalCost=0;
                        $totalQty=0;

                        while($row=$result->fetch_array()){
                            

                            $tempArr=array();
                            $tempArr['productName']=$row['productName'];

					?>

                    <tr class="odd gradeX">
                        
                        <td><?php echo $row['productName'] ?></td>
                        
                        <td><?php echo number_format($row['cost'], 0, ',', '.') ?></td>
                        <?php 
                            
                            if($theloai!=17){
                                

                                $sql="SELECT SUM(tbl_cart.quatity),SUM(tbl_cart.cost) FROM tbl_cart 
                                INNER JOIN tbl_product ON tbl_product.productID=tbl_cart.productID
                                WHERE cartID IN(SELECT cartID FROM tbl_cart_list WHERE cast(date as DATE) BETWEEN '$dateFrom' AND '$dateTo')
                                AND tbl_product.catID=$theloai
                                GROUP BY tbl_cart.productID HAVING tbl_cart.productID=$row[productID]";

                            }
                            else if($theloai==17){

                                $sql="SELECT SUM(quatity),SUM(cost) FROM tbl_cart
                                WHERE cartID IN(SELECT cartID FROM tbl_cart_list WHERE cast(date as DATE) BETWEEN '$dateFrom' AND '$dateTo')
                                GROUP BY productID HAVING productID=$row[productID]";

                            }
                            
                            

                            //echo $sql;
                            
                            if($result1=$product->Select($sql)){
                                
                                $row1=$result1->fetch_array();
                                $tempArr['productQty']=$row1[0];
                                $totalQty+=$row1[0];
                                $totalCost+=$row1[1];
                            
                        ?>

                        <td><?php echo $row1[0] ?></td>
                        <td><?php echo number_format($row1[1], 0, ',', '.') ?></td>
                               
                        <?php 
                            }
                            else{
                                echo "<td> 0  </td>";
                                echo "<td> 0  </td>";
                                $tempArr['productQty']=0;
                            }
                            array_push($productArr,$tempArr);
                        
                        ?>
                        
                        
                        
                    </tr>
                    <?php
						}
					?>
                    
                </tbody>
            </table>
            
        </div>
        
        <div class="block" style="margin-top: 60px; display: flex; flex-direction: row;  justify-content: flex-end;">
            <div class="stat_total">
                <div class="titleTotal">Tổng Số Lượng:</div>
                <div class="titleTotal">Tổng Doanh Thu:</div>
                
            </div>
            <div class="stat_total">
            <div><?php if(isset($totalQty)) echo $totalQty ?></div>
                <div><?php if(isset($totalCost))echo number_format($totalCost, 0, ',', '.' )." ₫"?></div>
            </div>

        </div>

        <?php } 
        

        if(isset($productArr)){
        ?>
        
        
            
        
        <div class="block" id="content" style="margin-top: 40px">


            <div class="titleStat"> 
                    <p><?php echo "Top sản phẩm bán chạy thuộc ".$nameTL?></p>
                    <p><?php echo "Từ ".$dateFormatFrom." đến ".$dateFormatTo ?></p>
                    
            </div>
            <?php 
                
                array_multisort(array_column($productArr, 'productQty'), SORT_DESC,$productArr);
                
                //print_r($productArr)
            ?>
            
            <table class="data display datatable"  id="toptable">
                <thead>
                    <tr>

                        <th>Top</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                <?php
                    $i=1;
                    foreach($productArr as $row){
                        
                        
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['productName']?></td>
                        <td><?php echo $row['productQty']?></td>

                        
                    </tr>
                <?php 
                $i++;
                    }
                ?>
                </tbody>
            </table>
            
        </div>
            
        <?php
        }
        ?>
        </div>

    </div>


<script>

$(document).ready(function() {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
});

function checkDate(){
    var from=document.getElementById("dateFrom");
    var to=document.getElementById("dateTo");
    
    if(from.value==""&&to.value==""){
        alert("Xin hãy nhập chọn khoảng thời gian");
        
        return false;
    }
    if(to.value<from.value){
        alert("Bạn nhập khoảng thời gian không hợp lệ")
        return false;
    }
    return true;
    
}

</script>

<?php include 'inc/footer.php'; ?>

