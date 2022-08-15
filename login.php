<?php
include_once 'inc/header.php';
include_once 'classes/memberKH.php';
include_once 'classes/memberLogin.php';
ob_start();

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
//echo $_POST['user'];
$member = new memberKH();
if (isset($_GET['tt']) && $_GET['tt'] == 'T') {
    $insertMember = $member->insert_member($_POST);
}

if (isset($_POST['user'])&&isset($_POST['pass'])) {
    $memberLogin = new memberLogin();

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $loginMember = $memberLogin->login_admin($user, $pass);
    // var_dump($loginMember);
}

?>

<section class="account-page">
    <div class="row" id="content">
        <div class="col span-1-of-2">
            <!-- <?php
                    if (isset($insertMember)) {
                        echo $insertMember;
                    }
                    

                    ?> -->


            
            <img src="resources/img/image1.png" alt="phot" width="100%">

        </div>
        <div class="col span-1-of-2">

            <div id="formcontainer" class="form-container" style="height: 300px; margin:100px auto auto auto ;">
                <div class="form-btn">
                    <span style="font-size: 20px;" onclick="login()">Login</span>
                    <span style="font-size: 20px;" onclick="register()">Register</span>
                    <hr id="Indicator" style="transform: translateX(0px);">

                </div>

                <form method="POST" id="LoginForm" style="width: 150%; transform: translateX(400px);">
                    <div class="form-group">
                        <input type="text" name="user" id="user" placeholder="Username" style="font-size: 17px;">
                        <p class="form-message"></p>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" id="pass" placeholder="Password" style="font-size: 17px;">
                        <p class="form-message"></p>
                    </div>

                    <div id="loginMember" style="margin-top: 10px;"><p class="form-message" style="text-align: center;" 
                    id="form-message-login"> <?php if(isset($loginMember)) echo $loginMember ?></p></div>

                    <input type="submit" name="login"style="margin-top: 17px; font-size: 18px;" value="Login"
                        class="btn"></input>
                    <a href="register.php">Forgot Password</a>
                </form>


                <form method="GET" action="formRegister.php" id="RegForm1"
                    style="width: 150%; transform: translateX(400px);">
                    <div class="form-group">
                        <input style="height: 47px;" id="phone" name="phone" type="text"
                            placeholder="Enter the Phone Number">
                        <p class="form-message"></p>
                    </div>
                    <button type="submit" style="margin-top: 17px;" class="btn">Register</button>
                </form>
            </div>
        </div>

    </div>
    
</section>
<div id="main"></div>
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

$(document).ready(function() {
    $("#LoginForm").on("submit",function(e){
        e.preventDefault();


        $.ajax({
            
            url: "login.php",
            type: "post",
            data: $('#LoginForm').serialize(),
            success: function(dataResult){
                var result=$('<div />').append(dataResult).find("#loginMember").html();
                var re=$(result).html();

                //alert(result);
                //alert(re);

                if(re==1){
                    window.location = "index.php";
                }
                else{
                    msg="User or Pass not match";
                }
                $("#form-message-login").html(msg);
                

                
            }

        })
    })


})

</script>
<?php
include_once 'inc/footer.php';
?>