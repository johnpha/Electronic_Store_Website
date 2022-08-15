<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php
class discount
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_discount($data,$file)
    {
        $discountName = mysqli_real_escape_string($this->db->link, $data['discountName']);
        $catID = mysqli_real_escape_string($this->db->link, $data['category']);
        $content = mysqli_real_escape_string($this->db->link, $data['content']);
        $interest = mysqli_real_escape_string($this->db->link, $data['interest']);
      

        // xu li them anh 
        // kiem tra hinh anh va dua vao thu muc uploads     
        
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $uploaded_image = "uploads/".$file_name;



        if ($discountName == "" || $catID == "" || $content == "" || $file_name == "" ||  $interest == "" ) {
            $alert = "<span class='error'>Field can not empty</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_discount(`discountName`, `catID`, `content`,`img` , `percent`) VALUES('$discountName','$catID','$content','$file_name','$interest')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success'>Insert discount Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert discount Not Success</span>";
                return $alert;
            }
        }


    }

    public function show_discount(){
        $query = "SELECT DISTINCT p.*,c.catName
        FROM tbl_discount as p, tbl_category as c
        WHERE p.catID = c.catID
        order by p.discountID desc";
        $result = $this->db->select($query);
        return $result;
    }
   

    public function show_discount_by_category($catID){
        $query = "SELECT * FROM tbl_discount WHERE catID = $catID";
        $result = $this->db->select($query);
        return $result;
    }
      
    public function getdiscountbyId($id){
        $query = "SELECT * FROM tbl_discount WHERE discountID ='$id'";
        $result = $this->db->select($query);
        return $result;
    
    }
    public function getdiscountbyCat($id){
        $query = "SELECT percent FROM tbl_discount WHERE catID ='$id'";
        $result = $this->db->select($query);
        return $result;
    
    }
   
    
    public function update_discount($data,$file,$id){
        $discountName = mysqli_real_escape_string($this->db->link, $data['discountName']);
        $catID = mysqli_real_escape_string($this->db->link, $data['category']);
        $content = mysqli_real_escape_string($this->db->link, $data['content']);
        $interest = mysqli_real_escape_string($this->db->link, $data['interest']);

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

       

        if ($discountName == "" ||  $catID == "" || $content == ""|| $interest == "") {
            $alert = "<span class='error'>Field can not empty</span>";
            return $alert;
        } else {
            if(!empty($file_name)){
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "UPDATE `tbl_discount` SET `discountName`='$discountName',`catID`='$catID',`content`='$content',`img`='$file_name',`percent`='$interest' WHERE discountID = '$id'";

    
            }else{
                // neu nguoi dung khong chon anh
                $query = "UPDATE `tbl_discount` SET `discountName`='$discountName',`catID`='$catID',`content`='$content',`percent`='$interest' WHERE discountID = '$id'";
            }     
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='success'>Updated discount Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Updated discount Not Success</span>";
                return $alert;
            }
        }
    }
    public function delete_discount($id){
       $query = "DELETE FROM tbl_discount WHERE discountID = '$id'";
       $result = $this->db->delete($query);
       if($result){
           return "<span class='success'>Delete discount Successfully</span>";
       }else{
            return "<span class='error'>Delete discount Not Success</span>";
       }
    }

}

?>