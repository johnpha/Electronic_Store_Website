<?php
    include_once '../lib/session.php';
    include_once '../classes/privileges.php';
    // include_once '../classes/member.php';
    // // dam bao nguoi dung dang nhap vao roi moi dc vao trang admin
    Session::checkSession();
    // $member = new member();
?>

<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>

    <style>
        .form-message {
            font-size: 12px;
            color: red;
          
        }       
        .privilege_list{
            display: flex;
            font-size: 17px;
            flex-wrap: wrap;
        }
        .privilege_list li{
            list-style: none;
        }

        
        .formSelect{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            
        }
        .formSelect div{
            padding-right: 10px;
        }

        .formSelect label{
            padding-left: 10px;
        }
        .formSelect button{
            background-color: rgba(3, 6, 86, 1);
            color: white;
            border: 1px solid white;
            border-radius: 5%;
            padding: .1rem .75rem;
            line-height: 1.5;
        }
        .formSelect button:hover{
            background-color: rgba(64,179,245);
        }
        .form-control-date {
            font-size: .9rem;
            font-weight: 400;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }
        .titleStat{
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: rgba(3, 6, 86, 1);
            font-weight: bold;
        }
        .stat_total{
        
            display: flex;
            flex-direction: column;
            justify-content: flex-end;

        }
        .stat_total div{
            margin-right: 20px;
            font-weight: bold;
        }
        .stat_total .titleTotal{
            color: red;
            font-size: 15px;
        }

    </style>
</head>

<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img style="border-radius: 50%" src="img/avt.jpg" alt="Logo"/>
                </div>
                <div class="floatleft middle">
                    <h1>Website Management</h1>
                    <p>Nguyên Vương - SGU</p>
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <?php 
                            $img = Session::get('adminImg');
                            if(isset($img) && $img !=""){
                                echo "<img src='uploads/$img' alt='Profile Pic' style='width: 20px;' />";
                            }else{
                                echo "<img src='img/img-profile.jpg' alt='Profile Pic' />";
                            }
                        ?>
                        <img src=""  alt="">
                        </div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello <?php echo Session::get('adminName') ?></li>
                            <?php
                                if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                                    Session::destroy();
                                }
                            ?>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
                <li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
                <li class="ic-grid-tables"><a href="inbox.php"><span>Inbox</span></a></li>
                <li class="ic-charts"><a href=""><span>Visit Website</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>