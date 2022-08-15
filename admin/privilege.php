<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php';
include_once '../classes/color.php';
include_once '../classes/member.php';
include_once '../classes/privileges.php';
?>
<?php
if (isset($_GET['level']) && isset($_GET['memberid'])) {
    $levelID = $_GET['level'];
    $id_user = $_GET['memberid'];
}
$privilege = new privileges();
$member = new member();
$level = $member->getLevelbyId($levelID)->fetch_assoc();

if (isset($_POST['submit']) && isset($_POST['privilege'])) {

    $data = $_POST['privilege'];
    // var_dump($data);exit;  
    $insertPrivilege = $privilege->addPriviegeUser($data, $levelID);
}



?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Privilege <?php echo $level['levelName'] ?></h2>
        <div class="block copyblock" style="width: auto;">
            <?php
            if (isset($insertPrivilege)) {
                echo $insertPrivilege;
            }
            // $priUser = $privilege->showPri($levelID);
            // while ($result2 = $priUser->fetch_assoc()) {
            //     var_dump($result2['priName']);
            //     // if ($priID == $result2['priID']) {
            //     //     echo " checked";
            //     //     // //     var_dump($priID);
            //     //     break;
            //     // }
            // }
            // exit;
            ?>
            <form action="" method="POST">
                <?php
                $privilegeGrList = $privilege->showPrivilegeGr();
                if ($privilegeGrList) {
                    while ($result = $privilegeGrList->fetch_assoc()) {


                ?>
                        <div class="privilege_group">
                            <h5><?php echo $result['priGrName'] ?></h5>
                            <ul class="privilege_list">
                                <?php
                                $level = Session::get('level');
                                $privilegeList = $privilege->showprivilege();
                                // var_dump($priUser);
                                if ($privilegeList) {
                                    while ($result1 = $privilegeList->fetch_array()) {
                                        if ($result['priGrID'] == $result1['priGrID']) {
                                            // $iDpriGr = $result1['priGrID'];
                                            $priID = $result1['priID'];
                                            $priName = $result1['priName'];
                                            // var_dump($priID);
                                            echo " <li style='width: 15%;'>
                                            <input type='checkbox'";
                                            if($privilege->showPriDetai($levelID,$result1['priGrID'])){
                                                $priUser = $privilege->showPriDetai($levelID,$result1['priGrID']);

                                                while ($result2 = $priUser->fetch_assoc()) {
                                                    // var_dump($result2['priID']);
                                                    if ($priID === $result2['priID']) {
                                                        echo " checked";
                                                            // var_dump($priID);
                                                        break;
                                                    }
                                                }
                                            }
                                            // exit;                                            
                                            echo " name='privilege[]' id='privilege_$priID' value='$priID'>
                                            <label for='privilege_$priID'>$priName</label>
                                        </li>";
                                            // exit;
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- <div class="privilege_group">
                    <h5>Brands</h5>
                    <ul class="privilege_list">
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_5" value="5">
                            <label for="privilege_5">List Brand</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_6" value="6">
                            <label for="privilege_6">Add Brand</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_7" value="7">
                            <label for="privilege_7">Edit Brand</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_8" value="8">
                            <label for="privilege_8">Delete Brand</label>
                        </li>
                    </ul>
                </div>
                <div class="privilege_group">
                    <h5>Products</h5>
                    <ul class="privilege_list">
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_9" value="9">
                            <label for="privilege_9">List Product</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_10" value="10">
                            <label for="privilege_10">Add Product</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_11" value="11">
                            <label for="privilege_11">Edit Product</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_12" value="12">
                            <label for="privilege_12">Delete Product</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_13" value="13">
                            <label for="privilege_13">Update Product</label>
                        </li>
                    </ul>
                </div>
                <div class="privilege_group">
                    <h5>Member</h5>
                    <ul class="privilege_list">
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_14" value="14">
                            <label for="privilege_14">List Member</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_15" value="15">
                            <label for="privilege_15">Add Member</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_16" value="16">
                            <label for="privilege_16">Edit Member</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_17" value="17">
                            <label for="privilege_17">Delete Member</label>
                        </li>
                    </ul>
                </div>
                <div class="privilege_group">
                    <h5>Color Product</h5>
                    <ul class="privilege_list">
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_18" value="18">
                            <label for="privilege_18">List Color</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_19" value="19">
                            <label for="privilege_19">Add Color</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_20" value="20">
                            <label for="privilege_20">Edit Color</label>
                        </li>
                        <li style="width: 15%;">
                            <input type="checkbox" name="privilege[]" id="privilege_21" value="21">
                            <label for="privilege_21">Delete Color</label>
                        </li>
                    </ul>
                </div> -->
                <?php
                    }
                }
                ?>
                <input type="submit" class="btn" name="submit" Value="Save" />
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>