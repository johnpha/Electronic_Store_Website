<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/member.php'; ?>
<?php
$member = new member();
if (!isset($_GET['memberid']) || $_GET['memberid'] == NULL) {
    echo "<script>window.location = 'memberlist.php'</script>";
} else {
    $id = $_GET['memberid'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updatemember = $member->update_member($_POST, $_FILES, $id);
}
?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Member</h2>

        <div class="block">
            <?php
            if (isset($updatemember)) {
                echo $updatemember;
            }
            $user = $member->getmemberbyId($id);
            if ($user) {
                while ($result = $user->fetch_assoc()) {

            ?>
                    <!-- enctype="multipart/form-data" dung de post hinh anh len khong co thi se bi loi -->
                    <form id="RegForm" action="" method="POST" enctype="multipart/form-data">
                        <table class="form" style="width: 56%;">

                            <tr>
                                <td>
                                    <label>Full Name</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input id="name" type="text" value="<?php echo $result['adminName'] ?>" name="name" placeholder="Enter Full Name..." class="medium" />
                                        <p class="form-message"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>User</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input id="user" type="text" value="<?php echo $result['adminUser'] ?>" name="user" placeholder="Enter User..." class="medium" />
                                        <p class="form-message"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Password</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input id="pass" value="<?php echo $result['adminPass'] ?>" type="password" name="pass" placeholder="Enter Password..." class="medium" />
                                        <p class="form-message"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Password Again</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input id="passAgain" value="<?php echo $result['adminPass'] ?>" type="password" name="passAgain" placeholder="Enter Password Again..." class="medium" />
                                        <p class="form-message"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Email</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input id="email" type="text" value="<?php echo $result['adminEmail'] ?>" name="email" placeholder="Email VD: nguyendz1@gmail.com" class="medium" />
                                        <p class="form-message"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Phone</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input id="phone" type="text" name="phone" value="<?php echo $result['adminPhone'] ?>" placeholder="Enter Phone VD: 0853633360" class="medium" />
                                        <p class="form-message"></p>
                                    </div>
                                </td>
                            </tr>
                            </tr>

                            <tr>
                                <td>
                                    <label>Upload Avt</label>
                                </td>
                                <td>
                                    <?php 
                                    $img = $result['img'];
                                        if(isset($img) && $img !="") echo "<img src='uploads/$img' width='100px' alt='img'> <br>";
                                    ?>
                                    <input name="image" type="file" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Level</label>
                                </td>
                                <td>
                                    <select id="select" name="level">
                                        <option>Select Level</option>
                                        <?php
                                        $levelList = $member->show_Level();
                                        if ($levelList) {
                                            while ($result1 = $levelList->fetch_assoc()) {

                                        ?>
                                                <option <?php 
                                                if($result['level' ] == $result1['levelID']) echo 'selected';                                          
                                                
                                                ?>  value="<?php echo $result1['levelID'] ?>"><?php echo $result1['levelName'] ?>
                                                    
                                         </option>
                                        <?php

                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Uploads" />
                                </td>
                            </tr>
                        </table>
                    </form>
            <?php

                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script src="js/invalid.js" type="text/javascript"></script>
<script>
    invalid({
        form: '#RegForm',
        errorSelector: '.form-message',
        rules: [
            invalid.isRequired('#phone'),
            invalid.isMinLength('#phone', 10),
            invalid.isPhone('#phone', 'Số điện thoại không hợp lệ'),
            invalid.isRequired('#name'),
            invalid.isRequired('#user'),
            invalid.isRequired('#pass'),
            invalid.isMinLength('#pass', 8),
            invalid.isRequired('#passAgain'),
            invalid.isConfrimValue('#passAgain', function() {
                return document.querySelector('#RegForm #pass').value;
            }),

            invalid.isRequired('#address'),
            invalid.isRequired('#email'),
            invalid.isEmail('#email'),
        ]
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>