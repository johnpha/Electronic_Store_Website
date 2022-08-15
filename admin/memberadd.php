<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/member.php'; ?>
<?php
$member = new member();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertmember = $member->insert_member($_POST, $_FILES);

}
?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Member</h2>

        <div class="block">
            <?php
            if (isset($insertmember)) {
                echo $insertmember;
            }
            //    if(isset($img_array)){
            //     for($i=0; $i < count($img_uploads) ; $i++){

            //     
            //     <img style="margin: 20px;" src="<?php echo $img_uploads[$i]; " alt="photo">
            //          
            //    }
            // }
            ?>
            <!-- enctype="multipart/form-data" dung de post hinh anh len khong co thi se bi loi -->
            <form id="RegForm" action="memberadd.php" method="POST" enctype="multipart/form-data">
                <table class="form" style="width: 56%;">

                    <tr>
                        <td>
                            <label>Full Name</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input id="name" type="text" name="name" placeholder="Enter Full Name..." class="medium" />
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
                                <input id="user" type="text" name="user" placeholder="Enter User..." class="medium" />
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
                                <input id="pass" type="password" name="pass" placeholder="Enter Password..." class="medium" />
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
                                <input id="passAgain" type="password" name="passAgain" placeholder="Enter Password Again..." class="medium" />
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
                                <input id="email" type="text" name="email" placeholder="Email VD: nguyendz1@gmail.com" class="medium" />
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
                                <input id="phone" type="text" name="phone" placeholder="Enter Phone VD: 0853633360" class="medium" />
                                <p class="form-message"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Avt</label>
                        </td>
                        <td>
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
                                    while ($result = $levelList->fetch_assoc()) {

                                ?>
                                <option value="<?php echo $result['levelID'] ?>"><?php echo $result['levelName'] ?>
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
                            <input type="submit" name="submit" Value="Đăng Kí" />
                        </td>
                    </tr>
                </table>
            </form>
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