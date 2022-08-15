<?php
include_once 'inc/header.php';
include_once 'classes/memberKH.php';
include_once 'classes/memberLogin.php';
ob_start();

?>
<?php
$member = new memberKH();
if (isset($_GET['tt']) && $_GET['tt'] == 'T') {
    $insertMember = $member->insert_member($_POST);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $memberLogin = new memberLogin();

    $user = $_POST['user'];
    $pass = ($_POST['pass']);
    $loginMember = $memberLogin->login_admin($user, $pass);
    // var_dump($loginMember);
}

?>

<section class="account-page">
    <div class="row">
        <div class="col span-1-of-2">
            <img src="resources/img/image1.png" alt="phot" width="100%">
        </div>
        <div class="col span-1-of-2">
            <div id="formcontainer" class="form-container" style="height: 230px; margin:100px auto auto auto ;">
                <div class="form-btn">
                    <span style="font-size: 20px;" onclick="login()">Login</span>
                    <span style="font-size: 20px;" onclick="register()">Register</span>
                    <hr id="Indicator" style="transform: translateX(100px);">
                </div>
                <form id="LoginForm" style="width: 150%; transform: translateX(0px);" method="POST">
                <div class="form-group">
                        <input type="text" name="user" id="user" placeholder="Username" style="font-size: 17px;">
                        <p class="form-message"></p>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" id="pass" placeholder="Password" style="font-size: 17px;">
                        <p class="form-message"></p>
                    </div>
                    <input type="submit" name="login" style="margin-top: 17px; font-size: 18px;" value="Login"
                        class="btn"></input>
                    <a href="register.php">Forogt Password</a>
                </form>
                <form action="formRegister.php" method="GET" id="RegForm1" style="width: 150%; transform: translateX(0px);">
                                    
                    <div class="form-group">
                        <input style="height: 47px;" id="phone" name="phone" type="text" placeholder="Enter the Phone Number">
                        <p class="form-message"></p>
                    </div>
                    <button type="submit" style="margin-top: 17px;" class="btn">Register</button>

                </form>
            </div>
        </div>

    </div>

</section>
<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm1");
    var Indicator = document.getElementById("Indicator");

    function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
        formcontainer.style.height = "230px";
        formcontainer.style.margin = "100px auto auto auto";
    }

    function login() {
        RegForm.style.transform = "translateX(400px)";
        LoginForm.style.transform = "translateX(400px)";
        formcontainer.style.height = "300px";
        formcontainer.style.margin = "100px auto auto auto";
        Indicator.style.transform = "translateX(0px)";
    }
</script>
<?php
include_once 'inc/footer.php';
?>