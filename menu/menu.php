<?php

session_start();
include("../mysql/connect.php");

//Kiểm tra nếu đã đăng nhập (get user_mail == true) sẽ lấy giá trị từ database
if(session_id() == '') session_start();
if (isset($_SESSION['user_mail']) == true) {
    //GET CURRENT VALUES FROM DATABASE (User_name)
    $conn_gcv = mysqli_connect("localhost", "tanluc1", "tanluc1", "ludu");
    $gcv_mail = $_SESSION['user_mail'];
    $gcv_sql = "SELECT * FROM Users WHERE user_mail='$gcv_mail'";
    $gcv_query = mysqli_query($conn_gcv, $gcv_sql);
    if ($row = mysqli_fetch_assoc($gcv_query)) { 
	$current_username = $row['user_name'];
    }
} 

?>

<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="../images/logo1.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../css-file/design2.css">
    <link rel="stylesheet" href="../css-file/script.js">
    <link rel="stylesheet" href="../css-file/style.css">

    <title>LUDU - Cửa hàng</title>
<!--Header Start-->
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <img src="../images/logo1.png" width="100px"/>
            <ul class="snip1378 me-lg-auto" style="margin-left: 120px;"> 
                <li><a href="../index.php" class="nav-link px-2 text-white">HOME</a></li>
                <li><a href="#" class="nav-link px-2 text-secondary">MENU</a></li>
                <li><a href="../product.php" class="nav-link px-2 text-white">PRODUCT</a></li>
                <li><a href="../introduce.php" class="nav-link px-2 text-white">INTRODUCE</a></li>
                <li><a href="../aboutUs.php" class="nav-link px-2 text-white">ABOUT US</a></li>
            </ul>
            <div class="col-md-3 col-lg-2 button-outline">
                    
                      <a class="btn cart btn-outline-light btn-floating m-1" href="../cart.php" role="button"><i
                           class="fas fa-shopping-cart"></i></a>
                          <div class="btn-login-logout">
                          <?php
                           if (!empty($_SESSION['user_mail'])) { ?> 
                            <div class="dropdown">
                           <button class="btn-log-in btn btn-danger text-capitalize" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $current_username; ?></button>
                           <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="../profile.php">Profile</a></li>
                           <li><a class="dropdown-item" href="./changepassword.php">Change Password</a></li>
                       </ul>
                   

                        <a href="../logout.php" type="button" class="btn btn-outline-light me-2">Log out</a>
                        <?php
                        } else { ?>
                            <a href="../login.php" type="button" class="btn btn-outline-light me-2">Sign in/out</a>
                            <?php
                        }
                        ?>   
                    </div>
            </div>
        </div>
    </div>
</header>
<!--Header End-->
    <style>
        
        /*
            NAVBAR MENU
        */
        .bg-dark{
           background-color: rgba(0, 0, 0, 0.2);
        }
        
        .btn-secondary:hover{
            
            color: #d9534f;
        }

        .container-fluid {
            border-top: 4px solid #d9534f;
            padding-left: 0px;
            padding-right: 0px;
        }

        .dropdown .btn-primary {
            background-color: white;
        }

        .dropdown-menu {
            background-color: white;
        }
        .text-white{
            font-size: 1.6rem;
        }
        .button-outline{
            display: flex;
            margin-bottom: 14px;
        }
        .btn-login-logout{
            display: flex;
            align-items: center;
        }
        .cart{
            display: flex;
            align-items: center;
            margin-left: 1px;
        }

        .btn-log-in{
            margin-bottom: 2px;
        }


        .heading-page {
            text-transform: uppercase;
            font-size: 43px;
            font-weight: bolder;
            letter-spacing: 3px;
            color: #ffc107;
        }

        a {
            color: inherit;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        a:hover, a:focus {
            color: #ababab;
            text-decoration: none;
            outline: 0 none;
        }

        h1, h2, h3,
        h4, h5, h6 {
            color: #1e2530;
            font-family: "Open Sans", sans-serif;
            margin: 0;
            line-height: 1.3;
        }

        p {
            margin-bottom: 20px;
        }

        p:last-child {
            margin-bottom: 0;
        }

        /*
         * Selection color
         */
        ::-moz-selection {
            background-color: #ffc107;
            color: #fff;
        }

        ::selection {
            background-color: #ffc107;
            color: #fff;
        }


        button, input, select,
        textarea, label {
            font-weight: 400;
        }

        .btn {
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .btn:hover, .btn:focus, .btn:active:focus {
            outline: 0 none;
        }


        /*
         *  CSS Helper Class
         */
        .clear:before, .clear:after {
            content: " ";
            display: table;
        }

        .clear:after {
            clear: both;
        }

        .pt-table {
            display: table;
            width: 100%;
            height: -webkit-calc(100vh - 4px);
            height: -moz-calc(100vh - 4px);
            height: calc(100vh - 4px);
        }

        .pt-tablecell {
            display: table-cell;
            vertical-align: middle;
        }

        .overlay {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }

        .relative {
            position: relative;
        }

        .preloader.active .loading-mask {
            width: 0;
        }

        /*------------------------------------------------
            Start Styling
        -------------------------------------------------*/
        .mt20 {
            margin-top: 20px;
        }

        .page-title {
            margin-bottom: 75px;
        }

        .page-title img {
            margin-bottom: 20px;
        }

        .page-title h2 {
            font-size: 68px;
            margin-bottom: 25px;
            position: relative;
            z-index: 0;
            font-weight: 900;
            text-transform: uppercase;
        }

        .page-title p {
            font-size: 16px;
        }

        .page-title .title-bg {
            color: rgba(30, 37, 48, 0.07);
            font-size: 158px;
            left: 0;
            letter-spacing: 10px;
            line-height: 0.7;
            position: absolute;
            right: 0;
            top: 50%;
            z-index: -1;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
        }


        /*------------------------------------------------
            Home Page
        -------------------------------------------------*/

        .hexagon-item:first-child {
            margin-left: 0;
        }

        .page-home {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            vertical-align: middle;
            border-top: 4px solid #d9534f;
        }

        .page-home .overlay {
            background-color: rgba(14, 17, 24, 0.97);
        }

        /* End of container */
        .hexagon-item {
            cursor: pointer;
            width: 200px;
            height: 173.20508px;
            float: left;
            margin-left: -29px;
            z-index: 0;
            position: relative;
            -webkit-transform: rotate(30deg);
            -moz-transform: rotate(30deg);
            -ms-transform: rotate(30deg);
            -o-transform: rotate(30deg);
            transform: rotate(30deg);
        }

        .hexagon-item:first-child {
            margin-left: 0;
        }

        .hexagon-item:hover {
            z-index: 1;
        }

        .hexagon-item:hover .hex-item:last-child {
            opacity: 1;
            -webkit-transform: scale(1.3);
            -moz-transform: scale(1.3);
            -ms-transform: scale(1.3);
            -o-transform: scale(1.3);
            transform: scale(1.3);
        }

        .hexagon-item:hover .hex-item:first-child {
            opacity: 1;
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -ms-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }

        .hexagon-item:hover .hex-item:first-child div:before,
        .hexagon-item:hover .hex-item:first-child div:after {
            height: 5px;
        }

        .hexagon-item:hover .hex-item div::before,
        .hexagon-item:hover .hex-item div::after {
            background-color: #d9534d;
        }

        .hexagon-item:hover .hex-content svg {
            -webkit-transform: scale(0.97);
            -moz-transform: scale(0.97);
            -ms-transform: scale(0.97);
            -o-transform: scale(0.97);
            transform: scale(0.97);
        }

        .page-home .hexagon-item:nth-last-child(1),
        .page-home .hexagon-item:nth-last-child(2),
        .page-home .hexagon-item:nth-last-child(3) {
            -webkit-transform: rotate(30deg) translate(87px, -80px);
            -moz-transform: rotate(30deg) translate(87px, -80px);
            -ms-transform: rotate(30deg) translate(87px, -80px);
            -o-transform: rotate(30deg) translate(87px, -80px);
            transform: rotate(30deg) translate(87px, -80px);
        }

        .hex-item {
            position: absolute;
            top: 0;
            left: 50px;
            width: 100px;
            height: 173.20508px;
        }

        .hex-item:first-child {
            z-index: 0;
            -webkit-transform: scale(0.9);
            -moz-transform: scale(0.9);
            -ms-transform: scale(0.9);
            -o-transform: scale(0.9);
            transform: scale(0.9);
            -webkit-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            -moz-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            -o-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .hex-item:last-child {
            transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            z-index: 1;
        }

        .hex-item div {
            box-sizing: border-box;
            position: absolute;
            top: 0;
            width: 100px;
            height: 173.20508px;
            -webkit-transform-origin: center center;
            -moz-transform-origin: center center;
            -ms-transform-origin: center center;
            -o-transform-origin: center center;
            transform-origin: center center;
        }

        .hex-item div::before, .hex-item div::after {
            background-color: #1e2530;
            content: "";
            position: absolute;
            width: 100%;
            height: 3px;
            -webkit-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
            -moz-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
            -o-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
        }

        .hex-item div:before {
            top: 0;
        }

        .hex-item div:after {
            bottom: 0;
        }

        .hex-item div:nth-child(1) {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        .hex-item div:nth-child(2) {
            -webkit-transform: rotate(60deg);
            -moz-transform: rotate(60deg);
            -ms-transform: rotate(60deg);
            -o-transform: rotate(60deg);
            transform: rotate(60deg);
        }

        .hex-item div:nth-child(3) {
            -webkit-transform: rotate(120deg);
            -moz-transform: rotate(120deg);
            -ms-transform: rotate(120deg);
            -o-transform: rotate(120deg);
            transform: rotate(120deg);
        }

        .hex-content {
            color: #fff;
            display: block;
            height: 180px;
            margin: 0 auto;
            position: relative;
            text-align: center;
            transform: rotate(-30deg);
            width: 156px;
        }

        .hex-content .hex-content-inner {
            left: 50%;
            margin: -3px 0 0 2px;
            position: absolute;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .hex-content .icon {
            display: block;
            font-size: 36px;
            line-height: 30px;
            margin-bottom: 11px;
        }

        .hex-content .title {
            display: block;
            font-family: "Open Sans", sans-serif;
            font-size: 14px;
            letter-spacing: 1px;
            line-height: 24px;
            text-transform: uppercase;
        }

        .hex-content svg {
            left: -7px;
            position: absolute;
            top: -13px;
            transform: scale(0.87);
            z-index: -1;
            -webkit-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
            -moz-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
            -o-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
        }

        .hex-content:hover {
            color: #fff;
        }

        .page-home .hexagon-item:nth-last-child(1), .page-home .hexagon-item:nth-last-child(2), .page-home .hexagon-item:nth-last-child(3) {
            -webkit-transform: rotate(30deg) translate(87px, -80px);
            -moz-transform: rotate(30deg) translate(87px, -80px);
            -ms-transform: rotate(30deg) translate(87px, -80px);
            -o-transform: rotate(30deg) translate(87px, -80px);
            transform: rotate(30deg) translate(87px, -80px);
        }

        /*------------------------------------------------
            Welcome Page
        -------------------------------------------------*/
        .author-image-large img {
            height: -webkit-calc(100vh - 4px);
            height: -moz-calc(100vh - 4px);
            height: calc(100vh - 4px);
        }


        @media (min-width: 1200px) {
            .col-lg-offset-2 {
                margin-left: 16.66666667%;
            }
        }

        @media (min-width: 1200px) {
            .col-lg-8 {
                width: 66.66666667%;
            }
        }

        .hexagon-item:first-child {
            margin-left: 0;
        }

        .pt-table.desktop-768 .pt-tablecell {
            padding-bottom: 110px;
            padding-top: 60px;
        }


        .hexagon-item:hover .icon i {
            color: #d9534f;
            transition: 0.6s;

        }


        .hexagon-item:hover .title {
            -webkit-animation: focus-in-contract 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: focus-in-contract 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        /***************************/

        @-webkit-keyframes focus-in-contract {
            0% {
                letter-spacing: 1em;
                -webkit-filter: blur(12px);
                filter: blur(12px);
                opacity: 0;
            }
            100% {
                -webkit-filter: blur(0px);
                filter: blur(0px);
                opacity: 1;
            }
        }

        @keyframes focus-in-contract {
            0% {
                letter-spacing: 1em;
                -webkit-filter: blur(12px);
                filter: blur(12px);
                opacity: 0;
            }
            100% {
                -webkit-filter: blur(0px);
                filter: blur(0px);
                opacity: 1;
            }
        }


        @media only screen and (max-width: 767px) {
            .hexagon-item {
                float: none;
                margin: 0 auto 50px;
            }

            .hexagon-item:first-child {
                margin-left: auto;
            }

            .page-home .hexagon-item:nth-last-child(1), .page-home .hexagon-item:nth-last-child(2), .page-home .hexagon-item:nth-last-child(3) {
                -webkit-transform: rotate(30deg) translate(0px, 0px);
                -moz-transform: rotate(30deg) translate(0px, 0px);
                -ms-transform: rotate(30deg) translate(0px, 0px);
                -o-transform: rotate(30deg) translate(0px, 0px);
                transform: rotate(30deg) translate(0px, 0px);
            }

        }

    </style>


    <main class="site-wrapper">
        <div class="pt-table desktop-768">
            <div class="pt-tablecell page-home relative" style="background-image: url(https://scontent.fesb3-2.fna.fbcdn.net/v/t1.6435-9/37904225_688725644825738_6160377175833837568_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=e3f864&_nc_ohc=mmYcEQ-g-N4AX9lbi4P&_nc_ht=scontent.fesb3-2.fna&oh=00_AT9iEiiSnIY863LcnCZ-Mg5islvP-jmzDMbr1QG03OxayQ&oe=620128D6);
    background-position: center;
    background-size: cover;">
                <div class="overlay"></div>

                <div class="container" class="page-home">
                    <div class="row">
                        <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                            <div class="page-title  home text-center">
                                  <span class="heading-page" style="color: #d9534f;"> LUDU STORE MENU
                                  </span>
                                <p class="mt20"></p>
                            </div>

                            <div class="hexagon-menu clear">
                                <div class="hexagon-item">
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <a class="hex-content" href="./freshFruit.php">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                <i class='fas fa-apple-alt'></i>
                                                </span>
                                                <span class="title">Fruit</span>
                                            </span>
                                        <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                                  fill="#1e2530"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="hexagon-item">
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <a class="hex-content" href="./freshFlower.php">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                <i class='fas fa-seedling'></i>
                                                </span>
                                                <span class="title">FLOWER</span>
                                            </span>
                                        <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                                  fill="#1e2530"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="hexagon-item">
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <a class="hex-content" href="./package.php">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                <i class='fa fa-shopping-bag'></i>
                                                </span>
                                                <span class="title">Packaging</span>
                                            </span>
                                        <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                                  fill="#1e2530"></path>
                                        </svg>
                                    </a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


    <!--Footer Start-->
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/a123.1e/"
                   role="button" target="_blank"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/duy.tranthe.9003/"
                   role="button" target="_blank"><i class="fab fa-facebook-f"></i></a>

            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white" href="www.ludustore.com.vn">ludustore.com.vn</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!--Footer End-->

    </main>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>