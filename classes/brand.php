<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

?>

<?php
class brand
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($brandName,$catID)
    {
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $catID = mysqli_real_escape_string($this->db->link, $catID);

        if (empty($brandName) || empty($catID)) {
            $alert = "<span class='error'>Brand Name or Category must be not empty</span>";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_brand(catID,brandName) VALUES('$catID','$brandName')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success'>Insert Brand Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Brand Not Success</span>";
                return $alert;
            }
        }
    }
    public function show_brand(){
        $query = "SELECT b.*,c.catName 
        FROM tbl_brand as b,tbl_category as c
        WHERE b.catID = c.catID
        order by b.brandID desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getbrandbyId($id){
        $query = "SELECT * FROM tbl_brand WHERE brandID ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_brand($brandName,$id,$catID){
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $catID = mysqli_real_escape_string($this->db->link, $catID);

        if (empty($brandName) || empty($catID)) {
            $alert = "<span class='error'>Brand or Category  must be not empty</span>";
            return $alert;
        } else {
            $query = "UPDATE tbl_brand SET brandName = '$brandName',catID = '$catID' WHERE brandID = '$id'";
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='success'>Updated Brand Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Updated Brand Not Success</span>";
                return $alert;
            }
        }
    }
    public function delete_brand($id){
       $query = "DELETE FROM tbl_brand WHERE brandID = '$id'";
       $result = $this->db->delete($query);
       if($result){
           return "<span class='success'>Delete Brand Successfully</span>";
       }else{
            return "<span class='error'>Delete Brand Not Success</span>";
       }
    }
}

?>