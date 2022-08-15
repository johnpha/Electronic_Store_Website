<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
// Session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

?>

<?php
class memberLogin
{
    private $db;
    private $fm;


    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
        // $ss = new Session();
        // $ss->init();
    }
    public function login_admin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        if (empty($adminUser) || empty($adminPass)) {
            $alert = "User and Pass must be not Empty";
            return $alert;
        } else {
            $query = "SELECT * FROM tbl_member WHERE user = '$adminUser' AND pass ='$adminPass' LIMIT 1 ";
            $result = $this->db->select($query);

            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set('memberlogin', true);
                Session::set('memberID', $value['memberID']);
                Session::set('memberImg', $value['img']);
                Session::set('memberName', $value['memberName']);
                //header('Location:index.php');
                return 1;
            } else {
                $alert = "User or Pass not match";
                return $alert;
            }
        }
    }
    
}

?>