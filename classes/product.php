<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php
class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data,$file)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catID = mysqli_real_escape_string($this->db->link, $data['category']);
        $brandID = mysqli_real_escape_string($this->db->link, $data['brand']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $supplier = mysqli_real_escape_string($this->db->link, $data['supplier']);
        $interest = mysqli_real_escape_string($this->db->link, $data['interest']);
        $cost = mysqli_real_escape_string($this->db->link, $data['cost']);
        // $color = mysqli_real_escape_string($this->db->link, $data['color']);

        // echo "$cost";

        // xu li them anh 
        // kiem tra hinh anh va dua vao thu muc uploads     
        
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $uploaded_image = "uploads/".$file_name;



        if ($productName == "" || $brandID == "" || $catID == "" || $description == ""|| $supplier == "" || $file_name == "" || $price == ""|| $interest == "" ) {
            $alert = "<span class='error'>Field can not empty</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_product(`productName`, `catID`, `brandID`, `description`, `price`, `img` ,`cost`, `supplier`, `interest`) VALUES('$productName','$catID','$brandID','$description','$price','$file_name','$cost','$supplier','$interest')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success'>Insert Product Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Product Not Success</span>";
                return $alert;
            }
        }


    }

    public function insert_color($data,$id){

        $id = mysqli_real_escape_string($this->db->link, $id);

        $query2 = "DELETE FROM `tbl_pro_color_details` WHERE productID = $id";
        $result2 = $this->db->delete($query2);

        foreach ($data as $data1) {

            // var_dump($data1);

            $query = "INSERT INTO tbl_pro_color_details(productID,colorID) VALUES('$id','$data1')";
            $result = $this->db->insert($query);
            
            if (isset($result)) {
                $check = false;
            }
        }

    }

    public function insert_img($id,$file_name){
        $id = mysqli_real_escape_string($this->db->link, $id);
        $file_name = mysqli_real_escape_string($this->db->link, $file_name);

        if($id =="" || $file_name == ""){
            $alert = "<span class='error'>Field can not empty</span>";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_product_img( `productID`, `img`) VALUES('$id','$file_name')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success'>Insert Successfully</span>";
                return $alert;
            } 
        }

    }
    public function show_product(){
        $query = "SELECT DISTINCT P.*,c.catName,b.brandName 
        FROM tbl_product as p, tbl_category as c, tbl_brand as b 
        WHERE p.catID = c.catID AND p.brandID = b.brandID
        order by p.productID desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_img($id){
        $query = "SELECT * FROM tbl_product_img 
        WHERE productID = $id
        order by imgID desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_product_by_category($catID){
        $query = "SELECT * FROM tbl_product WHERE catID = $catID";
        $result = $this->db->select($query);
        return $result;
    }
        public function show_product_All($start,$quatity){
            $query = "SELECT * FROM tbl_product order by productId desc LIMIT $start,$quatity";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_product_All_by_category($start,$quatity,$cat){
            $query = "SELECT * FROM tbl_product WHERE catID = $cat
            order by productId desc LIMIT $start,$quatity";
            $result = $this->db->select($query);
            return $result;
        }
    public function getproductbyId($id){
        $query = "SELECT * FROM tbl_product WHERE productID ='$id'";
        $result = $this->db->select($query);
        return $result;
    
    }
    public function getproductIMG($id){
        $query = "SELECT * FROM tbl_product_img WHERE productID ='$id'";
        $result = $this->db->select($query);
        return $result;    
    }

    public function getNameCategory($id){
        $query = "SELECT catName FROM tbl_category WHERE catID ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function countPRoduct(){
        $query = "SELECT COUNT(productID) FROM tbl_product ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductDetailbyId($id){
        $query = "SELECT P.*,c.catName,b.brandName,d.colorName 
        FROM tbl_product as p, tbl_category as c, tbl_brand as b , tbl_product_color as d
        WHERE p.catID = c.catID AND p.brandID = b.brandID AND productId = '$id'AND p.color = d.colorID";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function update_product($data,$file,$id){
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catID = mysqli_real_escape_string($this->db->link, $data['category']);
        $brandID = mysqli_real_escape_string($this->db->link, $data['brand']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $supplier = mysqli_real_escape_string($this->db->link, $data['supplier']);
        $interest = mysqli_real_escape_string($this->db->link, $data['interest']);
        $cost = mysqli_real_escape_string($this->db->link, $data['cost']);
        // $color = mysqli_real_escape_string($this->db->link, $data['color']);

        $id = mysqli_real_escape_string($this->db->link, $id);

        
        // xu li them anh 
        // kiem tra hinh anh va dua vao thu muc uploads     
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        // $div = explode('.',$file_name);
        // $file_ext = strtolower(end($div));
        // $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$file_name;

       

        if ($productName == "" || $brandID == "" || $catID == "" || $description == ""|| $supplier == "" || $price == ""|| $interest == "" ) {
            $alert = "<span class='error'>Field can not empty</span>";
            return $alert;
        } else {
            if(!empty($file_name)){
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "UPDATE `tbl_product` SET `productName`='$productName',`catID`='$catID',`brandID`='$brandID',`description`='$description',`price`='$price',`img`='$file_name',`interest`='$interest',`cost`='$cost',`supplier`='$supplier' WHERE productID = '$id'";

    
            }else{
                // neu nguoi dung khong chon anh
                $query = "UPDATE `tbl_product` SET `productName`='$productName',`catID`='$catID',`brandID`='$brandID',`description`='$description',`price`='$price',`interest`='$interest',`cost`='$cost',`supplier`='$supplier' WHERE productID = '$id'";
            }     
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='success'>Updated Product Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Updated Product Not Success</span>";
                return $alert;
            }
        }
    }
    public function delete_product($id){
       $query = "DELETE FROM tbl_product WHERE productID = '$id'";
       $result = $this->db->delete($query);
       if($result){
           return "<span class='success'>Delete Product Successfully</span>";
       }else{
            return "<span class='error'>Delete Product Not Success</span>";
       }
    }
    public function delete_product_img($id){
       $query = "DELETE FROM tbl_product_img WHERE imgID = '$id'";
       $result = $this->db->delete($query);
       if($result){
           return "<span class='success'>Delete Image Successfully</span>";
       }else{
            return "<span class='error'>Delete Image Not Success</span>";
       }
    }

    public function Select($sql){
        return $result=$this->db->select($sql);
    }
}

?>