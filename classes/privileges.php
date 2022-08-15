<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
class privileges
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function showprivilegeAll($level)
    {
        $query = "SELECT p.*,pg.* FROM tbl_privilege as p, tbl_privilege_group as pg 
        WHERE pg.priGrID = p.prigrID AND pg.levelID = $level";
        $result = $this->db->select($query);
        return $result;
    }
    public function showprivilegeAllRight($level)
    {
        $query = "SELECT p.*,pg.*
        FROM tbl_privilege as p, tbl_user_privilege as pg 
        WHERE p.priID = pg.priID AND p.view = 0";
        $result = $this->db->select($query);
        return $result;
    }
    public function showprivilegeAllPri($level)
    {
        $query = "SELECT DISTINCT p.url_match
        FROM tbl_privilege as p, tbl_user_privilege as pg 
        WHERE p.priID = pg.priID AND pg.levelID = $level AND p.view = 0";
        $result = $this->db->select($query);
        return $result;
    }
    public function showprivilege()
    {
        $query = "SELECT * FROM tbl_privilege";
        $result = $this->db->select($query);
        return $result;
    }
    public function showprivilegeGr()
    {
        $query = "SELECT * FROM tbl_privilege_group";
        $result = $this->db->select($query);
        return $result;
    }

    public function showprivilegeUser()
    {
        $query = "SELECT * FROM tbl_user_privilege";
        $result = $this->db->select($query);
        return $result;
    }

    public function showprivilegeGrbyLevel($level)
    {
        $query = "SELECT * FROM tbl_privilege_group WHERE levelID = $level";
        $result = $this->db->select($query);
        return $result;
    }
    public function showprivilegeGrbyName($name)
    {
        $query = "SELECT * FROM `tbl_privilege_group` WHERE priGrName = '$name'";
        $result = $this->db->select($query);
        return $result;
    }

    public function deletePrivilege($id){
        $query = "DELETE FROM `tbl_user_privilege` WHERE userID = $id";
        $result = $this->db->delete($query);
    }

    public function addPriviegeUser($data,$level)
    {

        // $id1 = mysqli_real_escape_string($this->db->link, $id);
        $level = mysqli_real_escape_string($this->db->link, $level);
        $check = true;
        $query1 = "SELECT * FROM tbl_user_privilege";
        $listPri = $this->db->select($query1);

        $query2 = "DELETE FROM `tbl_user_privilege` WHERE levelID = $level";
        $result2 = $this->db->delete($query2);

        foreach ($data as $data1) {

            // var_dump($data1);

            $query = "INSERT INTO tbl_user_privilege(priID,levelID) VALUES('$data1','$level')";
            $result = $this->db->insert($query);
            
            if (isset($result)) {
                $check = false;
            }
        }
        // exit;

        // $query = "INSERT INTO tbl_user_privilege(userID,priID) VALUES('','$id')";
        // $result = $this->db->insert($query);

        if (isset($check)) {
            $alert = "<span class='success'>Save Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Save Not Success</span>";
            return $alert;
        }
    }
    public function viewPriGr($level){
        
        $level = mysqli_real_escape_string($this->db->link,$level);

        $query = "SELECT DISTINCT p.priGrID,p.priName,p.url_match,p.view,g.priGrName
        FROM tbl_user_privilege as u , tbl_privilege as p, tbl_privilege_group as g 
        WHERE u.priID = p.priID AND p.priGrID = g.priGrID AND u.levelID = $level";

        $result = $this->db->select($query);
        return $result;

    }
    public function showPri($level){
        
        $level = mysqli_real_escape_string($this->db->link,$level);

        $query = "SELECT DISTINCT u.priID,p.*
        FROM tbl_user_privilege as u , tbl_privilege as p 
        WHERE u.priID = p.priID AND u.levelID = $level";

        $result = $this->db->select($query);
        return $result;

    }
    public function showPriDetai($level,$priGr){
        
        $level = mysqli_real_escape_string($this->db->link,$level);
        $priGr = mysqli_real_escape_string($this->db->link,$priGr);

        $query = "SELECT DISTINCT p.priID
        FROM tbl_user_privilege as u , tbl_privilege as p 
        WHERE u.priID = p.priID AND p.priGrID = $priGr AND u.levelID = $level";

        $result = $this->db->select($query);
        return $result;

    }
   
}

?>