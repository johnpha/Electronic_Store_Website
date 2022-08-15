<?php
include_once 'inc/header.php';
include_once 'classes/memberKH.php';
?>
<?php 
    if(isset($_GET['phone'])){
        $phone = $_GET['phone'];
    }

?>
<section class="account-page">
    <div class="row">
        <div class="col span-1-of-2">
            <img src="resources/img/image1.png" alt="phot" width="100%">
        </div>
        <div class="col span-1-of-2">
            <div id="formcontainer" class="form-container">
                <div class="form-btn">
                    <!-- <span style="font-size: 20px;" onclick="login()">Login</span> -->
                    <!-- <span style="font-size: 20px;" onclick="register()">Register</span> -->
                    <span style="font-size: 24px; width: 100%;">Register Form</span>
                    <!-- <hr id="Indicator"> -->
                </div>
                <!-- <?php 
                    if(isset($insertMember)){
                        echo $insertMember;
                    }
                ?> -->
                <form id="LoginForm" style="width: 150%;" method="POST">
                    <div class="form-group">
                        <input type="text" placeholder="Username" style="font-size: 17px;">
                        <p class="form-message"></p>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" style="font-size: 17px;">
                        <p class="form-message"></p>
                    </div>
                    <a href="index.php?cat=17" class="btn">Login</a>
                    <a href="#">Forogt Password</a>
                </form>
                <form action="login.php?tt=T" id="RegForm" style="width: 150%;" method="POST">
                    <div class="form-group">
                        <input id="phone" name="phone" value="<?php echo "$phone" ?>" type="text" placeholder="Phone" readonly>
                        <p class="form-message"></p>
                    </div>
                    <div class="form-group">
                        <input id="name" name="name" type="text" placeholder="Full Name">
                        <p class="form-message"></p>
                    </div>

                    <div class="form-group">
                        <input id="user" name="user" type="text" placeholder="Username">
                        <p class="form-message"></p>
                    </div>
                    <div class="form-group">
                        <input id="pass" name="pass" type="password" placeholder="Password">
                        <p class="form-message"></p>
                    </div>
                    <div class="form-group">
                        <input id="passAgain" name="passAgain" type="password" placeholder="Password Again">
                        <p class="form-message"></p>
                    </div>
                    <div class="form-group">
                        <input id="address" name="address" type="text" placeholder="Address">
                        <p class="form-message"></p>
                    </div>

                    <div class="form-group">
                        <input id="email" name="email" type="email" placeholder="Email">
                        <p class="form-message"></p>
                    </div>
                    <button type="submit" class="btn">Register</button>
                </form>
            </div>
        </div>

    </div>

</section>
<?php
include_once 'inc/footer.php';
?>