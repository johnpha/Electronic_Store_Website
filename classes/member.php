<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php
class member
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_member($data,$file)
    {
        $memberName = mysqli_real_escape_string($this->db->link, $data['name']);
        $user = mysqli_real_escape_string($this->db->link, $data['user']);
        $pass = mysqli_real_escape_string($this->db->link, $data['pass']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $level = mysqli_real_escape_string($this->db->link, $data['level']);
        $pass1 = md5($pass);

         // xu li them anh 
        // kiem tra hinh anh va dua vao thu muc uploads     
        
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];

        $uploaded_image = "uploads/".$file_name;


        if ($memberName == "" || $user == "" || $pass == "" || $email == ""|| $phone == "" || $level == "") {
            $alert = "<span class='error'>Field can not empty</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_user(`adminName`,`adminEmail`, `adminPhone`, `adminUser`, `adminPass`, `level`,`img`) VALUES('$memberName','$email','$phone','$user','$pass1','$level','$file_name')";
            
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success'>Insert Member Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Member Not Success</span>";
                return $alert;
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
            $query = "INSERT INTO tbl_member_img( `memberID`, `img`) VALUES('$id','$file_name')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success'>Insert Images Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Images Not Success</span>";
                return $alert;
            }
        }

    }
    public function show_member(){
        $query = "SELECT u.*,l.levelName
        FROM tbl_user as u, tbl_level as l
        WHERE u.level = l.levelID";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_Level(){
        $query = "SELECT * FROM tbl_level";
        $result = $this->db->select($query);
        return $result;
    }


    public function getLevelbyId($id){
        $query = "SELECT * FROM tbl_level WHERE levelID ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getmemberbyId($id){
        $query = "SELECT * FROM tbl_user WHERE adminID ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getmemberbyId1($id){
        $query = "SELECT * FROM tbl_member WHERE memberID ='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    
    public function update_member($data,$file,$id){
        $memberName = mysqli_real_escape_string($this->db->link, $data['name']);
        $user = mysqli_real_escape_string($this->db->link, $data['user']);
        $pass = mysqli_real_escape_string($this->db->link, $data['pass']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $level = mysqli_real_escape_string($this->db->link, $data['level']);
        $pass1 = md5($pass);

        // xu li them anh 
        // kiem tra hinh anh va dua vao thu muc uploads     
        
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];

        $uploaded_image = "uploads/".$file_name;



        $id = mysqli_real_escape_string($this->db->link, $id);

        if ($memberName == "" || $user == "" || $pass == "" || $email == ""|| $phone == "" || $level == "") {
            $alert = "<span class='error'>Field can not empty</span>";
            return $alert;
        } else {
            if(!empty($file_name)){
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "UPDATE `tbl_user` SET `adminName`='$memberName',`adminEmail`='$email',`adminPhone`='$phone',`adminUser`='$user',`adminPass`='$pass1',`img`='$file_name',`level`='$level' WHERE adminID = '$id'";

    
            }else{
                // neu nguoi dung khong chon anh
                $query = "UPDATE `tbl_user` SET `adminName`='$memberName',`adminEmail`='$email',`adminPhone`='$phone',`adminUser`='$user',`adminPass`='$pass1',`level`='$level' WHERE adminID = '$id'";
            }     
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='success'>Updated Member Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Updated Member Not Success</span>";
                return $alert;
            }
        }
    }
    public function update_member1($data,$file,$id){
        $memberName = mysqli_real_escape_string($this->db->link, $data['name']);
        $user = mysqli_real_escape_string($this->db->link, $data['user']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);

         // xu li them anh 
        // kiem tra hinh anh va dua vao thu muc uploads     
        
      
        $file_name = $_FILES['img']['name'];
        $file_temp = $_FILES['img']['tmp_name'];

        $uploaded_image = "admin/img_user/".$file_name;
       



        $id = mysqli_real_escape_string($this->db->link, $id);

        if ($memberName == "" || $user == "" || $email == ""|| $phone == "" || $diachi == "") {
            $alert = "<span class='error'>Field can not empty</span>";
            return $alert;
        } else {
            if(!empty($file_name)){
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "UPDATE `tbl_member` SET `memberName`='$memberName',`email`='$email',`phone`='$phone',`user`='$user',`img`='$file_name',`diachi`='$diachi' WHERE `memberID` = '$id'";

    
            }else{
                // neu nguoi dung khong chon anh
                $query = "UPDATE `tbl_member` SET `memberName`='$memberName',`email`='$email',`phone`='$phone',`user`='$user',`diachi`='$diachi' WHERE `memberID` = '$id'";
            }     
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='succsess'>Updated Member Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Updated Member Not Success</span>";
                return $alert;
            }
        }
    }
    public function delete_member($id){
       $query = "DELETE FROM tbl_user WHERE adminID = '$id'";
       $result = $this->db->delete($query);
       if($result){
           return "<span class='success'>Delete Member Successfully</span>";
       }else{
            return "<span class='error'>Delete Member Not Success</span>";
       }
    }
    public function delete_member_img($id){
       $query = "DELETE FROM tbl_member_img WHERE imgID = '$id'";
       $result = $this->db->delete($query);
       if($result){
           return "<span class='success'>Delete Image Successfully</span>";
       }else{
            return "<span class='error'>Delete Image Not Success</span>";
       }
    }
}

?>