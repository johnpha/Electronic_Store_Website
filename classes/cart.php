<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');

?>

<?php
class cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_cart($memberID,$id, $quatity,$color)
    {

        $quatity = mysqli_real_escape_string($this->db->link, $quatity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $color = mysqli_real_escape_string($this->db->link, $color);
        $memberid = mysqli_real_escape_string($this->db->link, $memberID);
        $sID = session_id();
        $query_product = "SELECT * FROM tbl_product WHERE productID ='$id'";
        $result_product = $this->db->select($query_product)->fetch_assoc();
        $nameProduct = $result_product['productName'];
        $price = $result_product['price'];
        $sale = $result_product['interest'];

        $query_select = "SELECT * FROM `tbl_cart` WHERE productID='$id' AND memberID = '$memberid' AND `colorID` = $color";
        $checkCart1 = $this->db->select($query_select);
        if($color=="" || $color==0){
            $alert = "<span class='error'>Vui lòng chọn màu</span>";
                    return $alert;
        }

        if (isset($checkCart1) && $checkCart1) {
            $checkCart = $checkCart1->fetch_assoc();
                
            $sum = (int)$quatity +(int)$checkCart['quatity'];
            $cost = $result_product['cost'];
            $query_Update = "UPDATE `tbl_cart` SET `quatity`='$sum',`price`='$cost' WHERE `productID`='$id' AND `colorID` = $color AND `memberID` = $memberid";
            $result = $this->db->update($query_Update);
            if ($result) {
                $alert = "<span class='succsess'>Thêm vào giỏ hàng thành công</span>";
                return $alert;
            } else {
                header('Location:../error404/index.php');
            }
        
                
        } else {
            $cost = $result_product['cost'];
            $query = "INSERT INTO tbl_cart (`memberID`,`productID`, `productName`, `price`, `quatity`,`colorID`, `sale`, `ssID`) VALUES('$memberid','$id','$nameProduct','$cost','$quatity','$color','$sale','$sID')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='succsess'>Thêm vào giỏ hàng thành công</span>";
                return $alert;
            } else {
                header('Location:../error404/index.php');
            }
        }
    }
    public function inCart(){
        $query_select = "SELECT * FROM `tbl_cart`";
        $check = $this->db->select($query_select);
        $sum = 0;
        if(isset($check)){
            while($result = $check->fetch_assoc()){
                $sum += $result['quatity'];
            }
        }else{
            return 0;
        }
       
        return $sum;
        
    }
    public function getProColor($id,$colorID){
        $query = "SELECT DISTINCT proColorID
        FROM tbl_pro_color_details
        WHERE productID = '$id' AND colorID = '$colorID'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProColorbyID($id){
        $query = "SELECT DISTINCT p.*,c.colorName
        FROM tbl_pro_color_details as pc , tbl_product as p, tbl_product_color as c
        WHERE pc.productID = p.productID AND c.colorID = pc.colorID AND pc.proColorID = $id ";
        $result = $this->db->select($query);
        return $result;
    }
    public function addCartList($id,$cost){
        $id = mysqli_real_escape_string($this->db->link, $id);
        $cost = mysqli_real_escape_string($this->db->link, $cost);

            $query = "INSERT INTO `tbl_cart_list` (`memberID`,`cost`) VALUES('$id','$cost')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Insert Oder Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Oder Not Success</span>";
                return $alert;
            }
     
    }
    public function getcartListID($id){

        $query = "SELECT DISTINCT cartID
        FROM tbl_cart_list
        WHERE memberID = '$id' ORDER BY memberID DESC LIMIT 1" ;
        $result = $this->db->select($query);
        return $result;

    }
    public function add_oder($cartID,$productID,$productName,$price,$quatity,$colorID,$cost)
    {

        $quatity = mysqli_real_escape_string($this->db->link, $quatity);
        $cartID = mysqli_real_escape_string($this->db->link, $cartID);
        $colorID = mysqli_real_escape_string($this->db->link, $colorID);
        $productID = mysqli_real_escape_string($this->db->link, $productID);
        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $price = mysqli_real_escape_string($this->db->link, $price);
        $cost = mysqli_real_escape_string($this->db->link, $cost);

        // $sID = session_id();
       
           
            $query = "INSERT INTO tbl_cart (`cartID`,`productID`, `productName`, `price`, `quatity`,`colorID`, `cost`) VALUES('$cartID','$productID','$productName','$price','$quatity','$colorID','$cost')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='succsess'>Mua hàng thành công ~ Đơn Hàng của bạn đang được xác nhận </span>";
                return $alert;
            } else {
                header('Location:../error404/index.php');
            }
        
    }
    public function show_cartByID($id){
        $query = "SELECT * FROM tbl_cart_list WHERE memberID = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_oderByID($id){
        $query = "SELECT * FROM tbl_cart WHERE cartID = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_oder(){
        $query = "SELECT * FROM tbl_cart";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateStatus1($id){
        $id = mysqli_real_escape_string($this->db->link, $id);

        $query = "UPDATE `tbl_cart` SET `status`='2' WHERE cartDetaiID = '$id'";
        $result = $this->db->update($query);
        return $result;
    }
    public function updateStatus0($id){
        $id = mysqli_real_escape_string($this->db->link, $id);

        $query = "UPDATE `tbl_cart` SET `status`='1' WHERE cartDetaiID = '$id'";
        $result = $this->db->update($query);
        return $result;
    }
    public function deleteOder($id){
        $query = "DELETE FROM tbl_cart WHERE cartDetaiID = '$id'";
        $result = $this->db->delete($query);
        if($result){
            return "<span class='success'>Delete Successfully</span>";
        }else{
             return "<span class='error'>Delete Not Success</span>";
        }
     }
    public function deletecart($id){
        $query = "DELETE FROM tbl_cart_list WHERE cartID = '$id'";
        $result = $this->db->delete($query);
        if($result){
            return "<span class='success'>Delete Successfully</span>";
        }else{
             return "<span class='error'>Delete Not Success</span>";
        }
     }
}

?>