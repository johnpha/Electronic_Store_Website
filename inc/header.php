<?php
ob_start();
session_start();
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
include_once('classes/memberKH.php');
include_once('classes/cart.php');
include_once('classes/member.php');

// Session::checkLogin();    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Shoppe</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="vendors/css/wipeSlider.css">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/main.css">
    <link rel="stylesheet" href="vendors/css/grid.css">



    <style>
    .form-message {
        font-size: 12px;
        color: red;
        float: left;
        line-height: 1px;
    }

    .form-group {
        margin-bottom: 5px;
    }
    
    .form-group input {
        font-size: 17px;
    }

    .form-group.invalid input {
        border-color: red;
        background-color: #fff6f7;
    }

    .form-container form {
        top: 75px;
    }

    .form-container {
        height: 528px;
    }

    .price-range-input {
        width: 8rem;
        font-size: 12px;
        height: 3rem;
        background-color: #fff;
        outline: none;
        border: 1px solid rgba(0, 0, 0, .26);
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding-left: .3125rem;
        text-transform: uppercase;
        border-radius: .125rem;
        box-shadow: inset 0 1px 0 0 rgb(0 0 0 / 5%);
    }

    .price-range-line {
        flex: 1;
        height: 1px;
        background: #bdbdbd;
        margin: 15px 8px;

    }

    .succsess {
        font-size: 18px;
        color: green;
    }

    .error {
        font-size: 18px;
        color: red;
    }
    

    .header_search{
        height: auto;
        width: 800px;
    }
    .search{
        font-size: 16px; 
        font-weight: bold;
        padding-top: 20px; 
        padding-bottom: 5px;
        text-align: center;
    }
    div.nameCat{
        
        color: #d63302;;
        font-weight: bold;
        font-size: 12px;
    }
    .category{
        font-size: 14px; 
        padding-left: 5px;
        
    }
    .nameClass{
        width: 100%;
    }
    .nameClass input{
        width: 100%;
        font-size: 14px;
        font-weight: 400;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        height: auto;
    }
    .page-cart-header-title-product{
        width: 25%;
    }

    </style>

</head>

<body>

    <!-- Block Element Modifier -->
    <div class="app">
        <header class="header">
            <div class="gird">
                <nav class="header_navbar hide-on-mobile-tablet">
                    <ul class="header_navbar-list">
                        <li class="header_navbar-item header_navbar-item-has-QR header_navbar-item-separate">
                            Vào Cửa Hàng Trên Ứng Dụng Shoppe
                            <div class="header_qr">
                                <img src="resources/img/QR_code.png" alt="QR_Logo" class="header_qr-img">
                                <div class="header_qr-apps">
                                    <a href="#" class="header_qr-link">
                                        <img src="resources/img/Google_code.png" alt="Google_Play"
                                            class="header_qr-download-img">
                                    </a>
                                    <a href="#" class="header_qr-link">
                                        <img src="resources/img/AppStore_code.png" alt="App_Store"
                                            class="header_qr-download-img">
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="header_navbar-item">
                            <span class="header_navbar-title-no-pointer">Kết Nối</span>
                            <a href="" class="header_navbar-icon-link">
                                <i class="header_navbar-icon fab fa-facebook"></i>
                            </a>
                            <a href="" class="header_navbar-icon-link">
                                <i class="header_navbar-icon fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                    <nav class="header_navbar">
                        <ul class="header_navbar-list">
                            <li class="header_navbar-item header_navbar-item-has-notify">
                                <div>
                                    <a href="#" class="header_navbar-item-link">
                                        <i class="header_navbar-icon fas fa-bell"></i>
                                        Thông Báo</a>
                                </div>
                                <div class="header_notify">
                                    <header class="header_notify-header">
                                        <h3>Thông báo mới nhận</h3>
                                    </header>
                                    <?php if (Session::get('memberlogin')) {
                                        echo "<div style='text-align: center;'><ul class='header_notify-list'>
                                        <li class='header_notify-item header_notify-item-viewed'>
                                            <a href='#' class='header_notify-link'>
                                                <img src='https://cf.shopee.vn/file/ac1041bd915be88fdc060a6a6c14e077_tn' alt='maGiamGia' class='header_notify-img'>
                                                <div class='header_notify-info'>
                                                    <span class='header_notify-name'>Chỉ với 1đ Chỉ với 1đ Chỉ với 1đ
                                                        Chỉ với 1đ</span>
                                                    <span class='header_notify-descriotion'>🛬 Trúng liền Vé Máy Bay nội
                                                        địa Bamboo Airway
                                                        💯 Thêm 100 điểm thưởng Bamboo Club.
                                                        🌟 Khám phá vận may ngay</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul></div>";
                                    } else {

                                        echo "<div style='text-align: center;'><img src='resources/img/thongbaoshoppe.png' alt='Logo_chua_co_san_pham' class='no-cart' style='display: unset;'>
                                        <span class='header_cart-list-no-cart-msg' style='margin-bottom: 20px; display: block;'>
                                            Đăng nhập để xem thông báo
                                        </span></div>";
                                    } ?>


                                    <footer class="header_notify-footer">
                                        <?php
                                        if (Session::get('memberlogin')) {
                                            echo "<a href='#' class='header_notify-footer-btn'>Xem tất cả</a>";
                                        } else {
                                            echo "<a href='login.php' class='header_notify-footer-btn'>Đăng nhập</a>";
                                            echo "<a href='register.php' class='header_notify-footer-btn'>Đăng ký</a>";
                                        }
                                        ?>
                                    </footer>

                                </div>
                            </li>
                            <li class="header_navbar-item ">
                                <a href="#" class="header_navbar-item-link">
                                    <!-- <i class="fas fa-user-shield"></i> icon admin-->
                                    <!-- <i class="far fa-question-circle"></i> icon help -->
                                    <i class="header_navbar-icon far fa-question-circle"></i>
                                    Trợ Giúp</a>
                            </li>
                            <!-- khi chua co login  -->
                            <?php
                            if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                                Session::destroy();
                            }
                            ?>
                            <?php

                            if (!Session::get('memberlogin')) {
                                echo '<li class="header_navbar-item">
                                    <a href="register.php" class="header_navbar-item header_navbar-item-strong header_navbar-item-separate1">Đăng
                                        Kí</a>
                                </li>
                                <li class="header_navbar-item">
                                    <a href="login.php" class="header_navbar-item header_navbar-item-strong">Đăng Nhập</a>
                                </li>';
                            } else {

                                $nameMember = Session::get('memberName');
                                $id = Session::get('memberID');
                                $member = new member();
                                $memberinfo = $member->getmemberbyId1($id)->fetch_assoc();
                                $imgMember = $memberinfo['img'];
                                if ($imgMember == '') {
                                    $imgMember = "admin/img_user/avt_None.png";
                                } else {
                                    $imgMember = "admin/img_user/".$imgMember;
                                }
                                echo "<li class='header_navbar-item header_navbar-user'>
                                    <img src='$imgMember'
                                        alt='avt' class='header_navbar-user-img'>
                                    <span class='header_navbar-user-name'>
                                        $nameMember
                                    </span>
    
                                    <ul class='header_navbar-user-menu'>
                                        <li class='header_navbar-user-menu-item'>
                                            <a href='infoMember.php'>Tài khoản của tôi</a>
                                        </li>
                                        <li class='header_navbar-user-menu-item'>
                                            <a href='cartLast.php'>Đơn mua</a>
                                        </li>
                                        <li class='header_navbar-user-menu-item'>
                                            <a href='?action=logout'>Đăng xuất</a>
                                        </li>
                                    </ul>
                                </li>";
                            }
                            ?>


                            <!-- Sau khi login -->


                        </ul>
                    </nav>
                </nav>
                <div class="header-with-search">


                    <div class="header__mobile-search-iconAll">
                        <input type="checkbox" hidden class="nav__mobile-checkbox" id="nav__mobile-input">
                        <label for="nav__mobile-input" class="header__mobile-search">
                            <div class="header__mobile-search-icon2">
                                <i class="header__mobile-search-icon fas fa-bars"></i>
                            </div>
                        </label>


                        <div class="nav__mobile">
                            <div class="nav__overlay"></div>
                            <nav class="nav__mobile-container">
                                <div class="nav__mobile-user">
                                    <label for="nav__mobile-input">
                                        <i class="nav__mobile-icon fas fa-times"></i>
                                    </label>
                                    <div class="nav__mobile-user-info">
<?php 

if (!Session::get('memberlogin')) {
                                echo ' <img src="admin/img_user/avt_None.png" alt="avt" class="nav__mobile-user-img">
                                <span class="nav__mobile-user-name">
                                    Chưa Đăng Nhập
                                </span>';
                            } else{
                            
                                echo "<img src='$imgMember' alt='avt' class='nav__mobile-user-img'>
                                <span class='nav__mobile-user-name'>
                                    $nameMember
                                </span>";
                            
                            }?>
                                        
                                    </div>

                                </div>

                                <ul class="nav__mobile-list">
                                    <?php if (Session::get('memberlogin')) {
                                        echo "<li class='nav__mobile-item'>
                                        <a href='infoMember.php' class='nav__mobile-link'>Tài khoản của tôi</a>
                                    </li>";
                                    echo " <li class='nav__mobile-item'>
                                    <a href='cartLast.php' class='nav__mobile-link'>Đơn mua</a>
                                </li>";
                                echo "
                                <li class='nav__mobile-item'>
                                        <a href='?action=logout' class='nav__mobile-link'>Đăng xuất</a>
                                    </li>";
                                    }else{
                                        echo "<li class='nav__mobile-item'>
                                        <a href='login.php' class='nav__mobile-link'>Đăng nhập</a>
                                    </li>";
                                        echo "<li class='nav__mobile-item'>
                                        <a href='register.php' class='nav__mobile-link'>Đăng Kí</a>
                                    </li>";
                                    } ?>
<!--                                     
                                   
                                    
                                    <li class="nav__mobile-item">
                                        <a href="#" class="nav__mobile-link">Thông báo</a>
                                    </li> -->
                                    
                                </ul>
                            </nav>
                        </div>




                        <label for="mobile-search-checkbox" class="header__mobile-search">
                            <div class="header__mobile-search-icon1">
                                <i class="header__mobile-search-icon fas fa-search"></i>
                            </div>
                        </label>
                    </div>

                    <div class="header_logo">
                        <a href="index.php?cat=17">
                        <svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   height="60"
   width="191"
   version="1.1"
   id="svg22"
   sodipodi:docname="SVG.svg"
   inkscape:version="1.0.2-2 (e86c870879, 2021-01-15)">
  <metadata
     id="metadata28">
    <rdf:RDF>
      <cc:Work
         rdf:about="">
        <dc:format>image/svg+xml</dc:format>
        <dc:type
           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
        <dc:title />
      </cc:Work>
    </rdf:RDF>
  </metadata>
  <defs
     id="defs26" />
  <sodipodi:namedview
     pagecolor="#ffffff"
     bordercolor="#666666"
     borderopacity="1"
     objecttolerance="10"
     gridtolerance="10"
     guidetolerance="10"
     inkscape:pageopacity="0"
     inkscape:pageshadow="2"
     inkscape:window-width="1920"
     inkscape:window-height="1013"
     id="namedview24"
     showgrid="false"
     inkscape:zoom="6.4502618"
     inkscape:cx="65.65625"
     inkscape:cy="30"
     inkscape:window-x="-9"
     inkscape:window-y="-9"
     inkscape:window-maximized="1"
     inkscape:current-layer="svg22"
     inkscape:document-rotation="0" />
  <path
     style="fill:#ffffff;stroke-width:0.155032"
     d="M 5.9414995,58.969748 C 4.6703198,58.519318 3.602587,57.300221 3.0111934,55.624033 2.8548809,55.180995 2.5630485,49.853163 1.9289126,35.865388 L 1.0606548,16.713348 1.4100303,16.341455 1.7594058,15.969562 h 6.0653907 6.0653905 l 0.184082,-1.457468 C 15.299422,4.8119558 24.469317,-0.69600347 31.993657,3.7486943 35.593853,5.8753638 38.32537,10.390268 38.707269,14.845576 l 0.09635,1.123986 h 6.101035 c 5.894323,0 6.111538,0.01051 6.411098,0.310065 0.223727,0.223727 0.309576,0.515116 0.30831,1.046469 -9.3e-4,0.405022 -0.41639,9.073275 -0.923166,19.262784 -0.728901,14.655647 -0.972489,18.67214 -1.16588,19.224026 -0.521044,1.486918 -1.934188,2.868986 -3.329984,3.256754 -0.346274,0.0962 -7.737925,0.148044 -20.082056,0.140857 C 9.294085,59.200717 6.4992265,59.167373 5.9414995,58.969748 Z M 30.165971,51.414004 c 3.691959,-1.190313 5.845907,-4.209166 5.600012,-7.848663 -0.04321,-0.639509 -0.223833,-1.546449 -0.401392,-2.015422 -0.909067,-2.401056 -3.713166,-4.373944 -8.699007,-6.120383 -2.508208,-0.878575 -3.654133,-1.462083 -4.676515,-2.381292 -1.80959,-1.626979 -1.972343,-3.750629 -0.422388,-5.511473 2.088216,-2.372338 6.144756,-2.530489 10.196371,-0.397523 l 1.490436,0.784639 0.284573,-0.351432 c 0.541605,-0.668855 1.039601,-1.641329 0.954317,-1.863572 -0.13507,-0.351988 -1.676972,-1.216766 -3.168211,-1.776899 -3.405302,-1.279083 -6.93751,-1.298825 -9.547145,-0.05336 -1.384826,0.660915 -2.882831,2.087788 -3.492925,3.327066 -1.613453,3.27739 -0.518542,6.760856 2.799023,8.905101 0.89896,0.581026 3.71523,1.776494 6.089467,2.584895 2.628842,0.895091 4.618808,2.337 5.329836,3.861944 0.746014,1.599978 0.334432,3.558024 -1.000939,4.761816 -2.860189,2.578367 -7.657413,2.367783 -11.98374,-0.52605 -0.742993,-0.49698 -1.444414,-0.867232 -1.558712,-0.822782 -0.328873,0.127895 -1.413499,1.910183 -1.316418,2.163174 0.122479,0.319173 1.862905,1.577389 2.923517,2.113514 3.259629,1.647698 7.61951,2.127581 10.59984,1.166702 z m 5.336464,-35.993592 c 0,-0.302032 -0.110164,-1.082493 -0.244812,-1.734358 C 34.434041,9.6988332 31.882542,6.6574851 28.536594,5.6746894 27.339627,5.3231079 25.239897,5.3510607 23.996423,5.7351309 20.533224,6.804804 17.744151,10.631403 17.28195,14.947366 l -0.109467,1.022196 h 9.164975 9.164977 z"
     id="path34" />
  <path
     style="fill:#d40000;stroke-width:0.155032"
     d="M 6.2788149,58.924502 C 5.0939807,58.633813 4.1928706,57.823576 3.4717527,56.400518 2.8936012,55.25959 2.8747767,54.973422 1.7147126,29.689935 L 1.1243134,16.82224 1.5213567,16.395901 1.9184,15.969562 h 6.010236 6.010236 l 0.08853,-0.581372 c 0.494198,-3.245321 1.089309,-5.082309 2.265775,-6.9940036 2.881344,-4.6820254 7.969912,-6.9864558 12.735744,-5.7675615 3.592556,0.9188214 6.779876,3.8726342 8.450009,7.8309501 0.57959,1.373668 1.120191,3.426042 1.125183,4.271727 0.0018,0.298437 0.04527,0.699584 0.09669,0.891437 l 0.09348,0.348823 3.663939,5.11e-4 c 5.334398,7.44e-4 8.525019,0.15422 8.793778,0.422979 0.312324,0.312324 0.288055,1.545566 -0.245418,12.471518 -1.00457,20.574387 -1.311134,25.82658 -1.565372,26.818504 -0.224983,0.877794 -1.069873,1.976338 -2.056651,2.67411 l -0.896429,0.633883 -19.872108,0.02377 C 15.686361,59.027913 6.5346185,58.987261 6.2788149,58.924502 Z M 29.327424,51.687994 c 2.87503,-0.653911 5.080035,-2.414903 6.042833,-4.82601 0.468992,-1.174486 0.519426,-4.018344 0.09283,-5.234549 -0.841868,-2.400127 -3.383485,-4.239718 -8.564955,-6.199207 -3.790234,-1.433362 -5.112152,-2.29524 -5.878226,-3.832553 -0.757337,-1.519776 -0.346501,-3.18258 1.10118,-4.45688 1.115367,-0.981783 2.137797,-1.305432 4.156916,-1.315863 2.030217,-0.01048 3.19639,0.300335 5.542101,1.477148 l 1.511256,0.758177 0.534021,-0.812001 c 0.807801,-1.228302 0.839953,-1.547385 0.204745,-2.031883 -0.724493,-0.552598 -2.323656,-1.257787 -3.949786,-1.741751 -1.827164,-0.543799 -4.745044,-0.685083 -6.419738,-0.310848 -5.749309,1.284769 -8.10985,7.433065 -4.420704,11.514222 1.277319,1.413048 2.995327,2.318088 7.666142,4.038498 2.90104,1.068545 4.899854,2.523148 5.542517,4.033472 0.621163,1.459795 0.128811,3.428979 -1.135622,4.541979 -1.325509,1.166759 -2.850318,1.691446 -4.933858,1.697742 -2.209078,0.0067 -4.295426,-0.695054 -7.002808,-2.355347 -1.020422,-0.625769 -1.360986,-0.765598 -1.562457,-0.641511 -0.337506,0.20787 -1.265338,1.746501 -1.265338,2.098316 0,0.311131 1.776723,1.623334 3.100649,2.289989 1.116037,0.561974 2.701139,1.07773 4.082647,1.3284 1.591179,0.288714 4.241346,0.279394 5.555655,-0.01954 z m 6.12563,-36.954755 C 35.271046,12.373003 34.174681,9.8945972 32.539193,8.1462535 31.447389,6.9791134 30.429853,6.2923659 29.050483,5.7916814 c -1.342,-0.4871196 -3.731104,-0.513055 -5.2091,-0.056548 -3.101437,0.9579363 -5.873436,4.5140796 -6.473483,8.3047046 -0.09377,0.592375 -0.201111,1.268898 -0.238535,1.503384 l -0.06804,0.42634 h 9.243535 9.243533 z"
     id="path36" />
  <path
     style="fill:#ffffff;stroke-width:0.155032"
     d="m 70.152192,52.808366 c -1.644185,-0.271051 -2.861028,-0.634742 -4.221105,-1.261606 -1.068244,-0.492359 -3.256442,-1.899091 -3.602291,-2.315813 -0.120027,-0.144622 0.04072,-0.508341 0.610166,-1.380653 0.425217,-0.651367 0.8569,-1.184304 0.959295,-1.184304 0.102394,0 0.697643,0.35358 1.322774,0.785733 3.621269,2.503382 7.868614,3.097445 11.104413,1.55314 3.274001,-1.562537 3.816224,-5.192197 1.127062,-7.54461 -1.09761,-0.960163 -2.166076,-1.483446 -4.980928,-2.439414 -4.64752,-1.578374 -5.997418,-2.264124 -7.512311,-3.816268 -3.303177,-3.3844 -2.43764,-8.438192 1.894543,-11.062057 2.583907,-1.56499 6.232589,-1.770941 9.964778,-0.562463 1.684466,0.545428 3.854564,1.680694 3.926474,2.054098 0.05358,0.27824 -0.638642,1.465228 -1.21573,2.084658 l -0.32908,0.353227 -1.113316,-0.61382 c -2.283889,-1.259207 -5.177544,-1.883207 -7.219931,-1.556934 -2.738386,0.43746 -4.544115,2.216657 -4.544115,4.477346 0,2.311375 1.604995,3.739125 5.775481,5.137675 3.938836,1.320867 5.831125,2.21654 7.516919,3.557966 1.085073,0.86342 1.557352,1.43162 2.130262,2.562935 1.45151,2.866267 0.475705,6.989265 -2.162878,9.138639 -0.97974,0.798091 -2.36456,1.492404 -3.694281,1.852217 -1.267614,0.343007 -4.191718,0.434921 -5.736201,0.180308 z"
     id="path42" />
  <path
     style="fill:#ffffff;stroke-width:0.155032"
     d="m 85.806554,52.834177 c -0.04182,-0.10969 -0.05805,-6.896839 -0.03606,-15.082554 l 0.03998,-14.883117 h 1.550324 1.550325 l 0.04042,6.627638 c 0.02223,3.645201 0.0661,6.627638 0.09749,6.627638 0.03139,0 0.455377,-0.239848 0.942197,-0.532996 3.569882,-2.149671 7.939264,-1.59195 10.88184,1.388989 1.21065,1.226438 2.05455,2.736395 2.36352,4.228951 0.10477,0.506126 0.17007,2.933779 0.17007,6.322997 v 5.501446 l -1.58909,-0.04418 -1.58908,-0.04418 -0.0775,-5.736201 -0.0775,-5.736201 -0.428229,-0.871987 c -0.505009,-1.028339 -1.690894,-2.192266 -2.716262,-2.665967 -0.604435,-0.279238 -1.013763,-0.337858 -2.359165,-0.337858 -1.557232,0 -1.669993,0.02286 -2.599637,0.526971 -1.16269,0.630486 -1.942398,1.453034 -2.495479,2.632589 l -0.408536,0.871284 -0.07752,5.658685 -0.07752,5.658685 -1.514265,0.0444 c -1.124532,0.03298 -1.533835,-0.0069 -1.590301,-0.155033 z"
     id="path44" />
  <path
     style="fill:#ffffff;stroke-width:0.155032"
     d="m 113.81984,52.484895 c -2.25485,-0.513269 -4.60584,-2.166851 -5.91283,-4.158813 -1.26021,-1.920676 -1.76404,-4.713319 -1.25135,-6.935992 0.44876,-1.94548 1.74676,-3.971597 3.36936,-5.259414 3.20118,-2.540705 7.85676,-2.696768 11.2516,-0.377173 1.37978,0.942762 2.31216,2.020387 3.07018,3.548445 1.12203,2.261868 1.32471,4.475687 0.6181,6.751373 -0.87979,2.83341 -3.36285,5.317773 -6.20766,6.210912 -1.3244,0.415803 -3.62788,0.518749 -4.9374,0.220662 z m 3.41583,-3.045173 c 1.87043,-0.391332 3.6239,-1.780498 4.4369,-3.515087 0.37227,-0.794262 0.4153,-1.063899 0.41363,-2.591843 -0.002,-1.570402 -0.0377,-1.77752 -0.45418,-2.617243 -0.60412,-1.217982 -1.76745,-2.352195 -3.02261,-2.94697 -0.9465,-0.448513 -1.13594,-0.482053 -2.72264,-0.482053 -1.52819,0 -1.79801,0.04342 -2.5972,0.41795 -2.78942,1.307214 -4.28062,4.474462 -3.45649,7.341389 0.9206,3.20248 4.09401,5.086079 7.40259,4.393857 z"
     id="path48" />
  <path
     style="fill:#ffffff;stroke-width:0.155032"
     d="m 129.02495,62.661062 c -0.15428,-0.09795 -0.18641,-3.061206 -0.15503,-14.299371 l 0.0396,-14.175814 1.39257,-0.04532 c 1.66263,-0.05411 1.78559,0.04163 1.78559,1.390268 v 0.898104 l 1.04325,-0.699667 c 1.55035,-1.039765 3.14517,-1.512427 5.15805,-1.52871 1.27664,-0.01033 1.86197,0.06085 2.71307,0.329928 5.68301,1.796686 8.35763,7.996453 5.71978,13.258457 -0.75884,1.513753 -2.653,3.397243 -4.13769,4.114397 -2.01036,0.971068 -4.35008,1.272121 -6.31686,0.812794 -1.02389,-0.239124 -2.81656,-1.054877 -3.55947,-1.619739 l -0.54261,-0.412571 -0.0775,5.858984 c -0.0426,3.222441 -0.13395,5.946189 -0.20294,6.052774 -0.14164,0.218857 -2.53199,0.273592 -2.85977,0.06549 z m 11.13502,-13.140654 c 4.56221,-1.334063 5.97471,-7.195906 2.52103,-10.46225 -1.93045,-1.825744 -4.69151,-2.270382 -7.14669,-1.150896 -1.06295,0.484668 -2.33963,1.775348 -2.91308,2.945011 -0.42435,0.865534 -0.45605,1.054127 -0.45605,2.713068 0,1.717299 0.0189,1.819086 0.51397,2.767438 1.43391,2.746822 4.5083,4.056842 7.48082,3.187629 z"
     id="path52" />
  <path
     style="fill:#ff6600;stroke-width:0.155032"
     d=""
     id="path853" />
  <path
     style="fill:#ffffff;stroke-width:0.155032"
     d="M 23.395955,51.543631 C 22.030985,51.243938 20.312404,50.616926 19.318497,50.056 18.38503,49.529183 16.901848,48.472517 16.749224,48.225566 c -0.125333,-0.202794 0.56936,-1.556613 0.997113,-1.943174 0.333604,-0.301479 0.346096,-0.301664 0.830677,-0.01229 1.65578,0.988766 4.399422,2.256252 5.353853,2.473333 1.333299,0.303253 3.694752,0.318977 4.773365,0.03178 2.530411,-0.673745 4.085135,-2.462422 4.085135,-4.699859 0,-2.277884 -1.831272,-3.874568 -6.55119,-5.71198 -5.115747,-1.991503 -6.850512,-3.17397 -7.965147,-5.42928 -1.635582,-3.309375 -0.08558,-7.247265 3.535696,-8.982718 1.569276,-0.752055 2.479369,-0.899568 5.009042,-0.811892 1.808806,0.06269 2.394316,0.146513 3.49108,0.499786 1.782229,0.574065 3.410649,1.347776 3.853093,1.83072 l 0.364862,0.398262 -0.411263,0.748096 c -0.788891,1.435002 -0.662836,1.393844 -2.08262,0.679991 -2.367999,-1.190607 -3.412043,-1.465487 -5.599884,-1.47436 -2.307245,-0.0094 -3.178073,0.231936 -4.253521,1.178584 -2.015506,1.774119 -2.138134,3.992043 -0.321177,5.809 0.936051,0.936051 1.882064,1.440677 5.199046,2.773297 1.330939,0.534715 2.798847,1.163248 3.262016,1.396742 2.288539,1.153702 4.046362,2.63363 4.734571,3.986082 0.819179,1.609827 0.803594,4.649933 -0.0329,6.418139 -0.635066,1.342422 -2.046804,2.678175 -3.626994,3.43178 -0.724777,0.345651 -1.687474,0.704507 -2.139327,0.797456 -1.111786,0.228703 -4.694293,0.186247 -5.858793,-0.06943 z"
     id="path855" />
</svg>
                        </a>
                    </div>
                    
                    
                    <input type="checkbox" hidden id="mobile-search-checkbox" class="header__search-checkbox">

                    <form id="searchName">

                        <div class="header_search">
                            
                                <div class="header_search-input-wrap">
                                    
                                        <form>
                                        <input type="text" name="name" class="header_search-input" placeholder="Nhập tìm kiếm">
                                    <!-- search history -->
                                        <div class="header_search-history">
                                            <h3 class="header_search-history-heading">
                                                Lịch sử tìm kiếm
                                            </h3>
                                            <ul class="header_search-history-list">
                                                <li class="header_search-history-item">
                                                    <a href="">Asus Vivo Book</a>
                                                </li>
                                                <li class="header_search-history-item">
                                                    <a href="">Điện thoại Oppo mới nhất</a>
                                                </li>
                                            </ul>
                                        </div>
                                        </form>
                                </div>
                                <button class="header_search-btn" type="submit">
                                    <i class="header_search-btn-icon fas fa-search"></i>
                                </button>
                            
                        </div>

                    </form>
                    <!-- Cart layout  -->
                    <div class="header_cart">
                        <div class="header_cart-wrap">
                            <i class="header_cart-icon fas fa-shopping-cart"></i>
                            <span class="header_cart-notice"><?php if (!Session::get('memberlogin')) {
                                                                    echo 0;
                                                                } else {
                                                                    if (isset($_SESSION['cart']) && $_SESSION['cart'] !=null) {
                                                                        $inCart = 0;
                                                                        foreach ($_SESSION['cart'] as $key => $val) {
                                                                            $inCart+=$_SESSION['cart'][$key]['qty'];
                                                                        }
                                                                        echo "$inCart";
                                                                    }else{
                                                                        echo 0;
                                                                    }
                                                                    
                                                                } ?></span>
                            <!-- cart trong : chua co san pham class : header_cart-list-no-cart -->
                            <div class="header_cart-list">

                                <?php
                                if (!Session::get('memberlogin')) {
                                    echo "<img src='resources/img/Lo_go_chua_co_san_pham.png' alt='Logo_chua_co_san_pham' class='no-cart' style='display: unset;'>
                                        <span class='header_cart-list-no-cart-msg' style='margin-bottom: 40px; display: block;'>
                                            Chưa Có Sản Phẩm
                                        </span>";
                                } else {
                                    
                                ?>





                                <div class="header_cart-list-item-info">
                                    <h4 class="header_cart-heading">Sản phẩm mới thêm</h4>
                                    <ul class="header_cart-list-item">
                                        <!-- cart item -->
                                    <?php 
                                    $cart = new cart();
                                    if (isset($_SESSION['cart']) && $_SESSION['cart'] !=null) {
                                        $checkCart = true;
                                        foreach ($_SESSION['cart'] as $key => $val) {
                                            $result = $cart->getProColorbyID($key)->fetch_assoc();
                                            $img = $result['img'];
                                            $proName = $result['productName'];
                                            $cost = $result['cost'];
                                            $quatity = $_SESSION['cart'][$key]['qty'];
                                            $color = $result['colorName'];
                                        ?>
                                            <li class="header_cart-item">
                                            <img src="<?php echo "admin/uploads/$img" ?>"
                                                alt="<?php echo $proName ?>" class="header_cart-img">
                                            <div class="header_cart-item-info">
                                                <div class="header_cart-item-head">
                                                    <h5 class="header_cart-item-name">
                                                      <?php echo $proName ?>
                                                        <!-- Pro Max 256GB ( LL 1 sim) - Hàng mới 100% -->
                                                    </h5>
                                                    <div class="header_cart-item-price-wrap">
                                                        <span
                                                            class="header_cart-item-price"><?php echo "₫".number_format($cost, 0, ',', '.')?></span>
                                                        <span class="header_cart-item-multiply">x</span>
                                                        <span
                                                            class="header_cart-item-qnt"><?php echo $quatity?></span>
                                                    </div>
                                                </div>
                                                <div class="header_cart-item-body">
                                                    <span class="header_cart-item-description">Phân loại hàng:
                                                       <?php echo $color ?></span>
                                                </div>
                                            </div>
                                        </li>
                                    
                                        
                                        <?php
                                        }
                                    } else {
                                        $checkCart = false;
                                        echo "<img src='resources/img/Lo_go_chua_co_san_pham.png' alt='Logo_chua_co_san_pham' class='no-cart' style='display: unset;'>
                                                <span class='header_cart-list-no-cart-msg' style='margin-bottom: 40px; display: block;'>
                                                    Chưa Có Sản Phẩm
                                                </span>";
                                    }
                                            ?>
                                    </ul>
                                    <a  href="cart.php" <?php if(!$checkCart){
                                        echo "style='display: none;'";
                                    } ?> class="header_cart-view-cart btn btn-primary" >
                                        Xem giỏ hàng 
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <ul class="header__sort-bar">
                <li class="header__sort-item">
                    <a href="" class="header__sort-link">Liên quan</a>
                </li>
                <li class="header__sort-item header__sort-item-active">
                    <a href="" class="header__sort-link">Mới nhất</a>
                </li>
                <li class="header__sort-item">
                    <a href="" class="header__sort-link">Bán chạy</a>
                </li>
                <li class="header__sort-item">
                    <a href="" class="header__sort-link">Giá</a>
                </li>
            </ul>
        </header>
<script>
    
    $(document).ready(function(){
    
    })

</script>