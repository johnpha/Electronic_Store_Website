<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

?>

<?php
class color
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_color($colorName,$des)
    {
        $colorName = $this->fm->validation($colorName);
        $colorName = mysqli_real_escape_string($this->db->link, $colorName);
        $des = mysqli_real_escape_string($this->db->link, $des);

        if (empty($colorName)) {
            $alert = "<span class='error'>Color Name must be not empty</span>";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_product_color(colorName,description) VALUES('$colorName','$des')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success'>Insert Color Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Color Not Success</span>";
                return $alert;
            }
        }
    }
    public function show_color(){
        $query = "SELECT * FROM tbl_product_color order by colorID desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getcolorbyId($id){
        $query = "SELECT DISTINCT c.colorName,c.colorID
        FROM tbl_pro_color_details as pc, tbl_product_color as c
        WHERE pc.productID ='$id' AND pc.colorID=c.colorID";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_color($id,$colorName,$des){
        $colorName = $this->fm->validation($colorName);
        $colorName = mysqli_real_escape_string($this->db->link, $colorName);
        $des = mysqli_real_escape_string($this->db->link, $des);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if (empty($colorName) ) {
            $alert = "<span class='error'>Color must be not empty</span>";
            return $alert;
        } else {
                $query = "UPDATE tbl_product_color SET colorName = '$colorName',`description`='$des' WHERE colorID = '$id'";
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='success'>Updated Color Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Updated Color Not Success</span>";
                return $alert;
            }
        }
    }
    public function delete_color($id){
       $query = "DELETE FROM tbl_product_color WHERE colorID = '$id'";
       $result = $this->db->delete($query);
       if($result){
           return "<span class='success'>Delete Color Successfully</span>";
       }else{
            return "<span class='error'>Delete Color Not Success</span>";
       }
    }
}

?>