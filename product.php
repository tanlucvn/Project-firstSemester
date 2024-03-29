<?php
session_start();
include("mysql/connect.php");

if (isset($_POST["add"])) {
    if (!empty($_SESSION['user_mail'])) {
        $pname = $_POST["hidden_name"];
        $price = $_POST["hidden_price"];
        $quantity = $_POST["quantity"];
        $id = $_SESSION['id'];
        $sql = "INSERT INTO cart (user_id,pname,price, quantity) values ('$id','$pname','$price', '$quantity')";
        $result = $conn->query($sql);

        echo '<script>window.location="cart.php"</script>';
    } else {
        echo "<script>
            alert('Vui lòng đăng nhập trước khi sử dụng tính năng này!')
            window.location.href='login.php'
        </script>";
    }
}

//Kiểm tra nếu đã đăng nhập (get user_mail == true) sẽ lấy giá trị từ database
if(session_id() == '') session_start();
if (isset($_SESSION['user_mail']) == true) {
    //GET CURRENT VALUES FROM DATABASE (User_name)
    $gcv_mail = $_SESSION['user_mail'];
    $gcv_sql = "SELECT * FROM Users WHERE user_mail='$gcv_mail'";
    $gcv_query = mysqli_query($conn, $gcv_sql);
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
    <link rel="icon" type="image/jpg" href="images/logo1.png"/>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="./css-file/design2.css">
    <link rel="stylesheet" href="./script.js">
    <link rel="stylesheet" href="./css-file/style.css">

    <title>LUDU - Đặt hàng</title>
<!--Header Start-->
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <img src="images/logo1.png" width="100px"/>
            <ul class="snip1378 me-lg-auto" style="margin-left: 120px;"> 
                <li><a href="index.php" class="nav-link px-2 text-secondary">HOME</a></li>
                <li><a href="menu/menu.php" class="nav-link px-2 text-white">MENU</a></li>
                <li><a href="product.php" class="nav-link px-2 text-white">PRODUCT</a></li>
                <li><a href="introduce.php" class="nav-link px-2 text-white">INTRODUCE</a></li>
                <li><a href="aboutUs.php" class="nav-link px-2 text-white">ABOUT US</a></li>
            </ul>
            <div class="col-md-3 col-lg-2 button-outline">
                    
                      <a class="btn cart btn-outline-light btn-floating m-1" href="cart.php" role="button"><i
                           class="fas fa-shopping-cart"></i></a>
                          <div class="btn-login-logout">
                          <?php
                           if (!empty($_SESSION['user_mail'])) { ?> 
                            <div class="dropdown">
                           <button class="btn-log-in btn btn-danger text-capitalize" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $current_username; ?></button>
                           <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                           <li><a class="dropdown-item" href="./changepassword.php">Change Password</a></li>
                       </ul>
                   

                        <a href="logout.php" type="button" class="btn btn-outline-light me-2">Log out</a>
                        <?php
                        } else { ?>
                            <a href="login.php" type="button" class="btn btn-outline-light me-2">Sign in/out</a>
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

        /* end */
        body {
            font-family: -apple-system, ".SFNSText-Regular", 'Helvetica Neue', sans-serif;
            line-height: 1.5;
            color: grey;
            align-items: center;
            justify-content: center;
            background-color:  background;
            --webkit-filter: hue-rotate(- 90 deg);
            position: relative;
        }

        img {
            max-width: 100%;
            height: auto;
            vertical-align: top;
        }


        a {
            text-decoration: none;
            color: inherit;
        }


        
        :last-child {
            margin-bottom: 0;
        }

        

        .btn {
            display: inline-block;
            color:  white;
            text-align: center;
            padding: 1.75em 3.5em;
            white-space: nowrap;
            border-radius: 5px;

        }

        .product {
            position: relative;
            border-radius: 12px;
            background-color:  white;
            transition: box-shadow  time  easing;
            border: 1px solid #939090;
            margin: 50px 25px 10px -1px;
            padding: 10px;
            text-align: center;

        }

        .product__image {
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
        }

        .product__title {
            font-size: 30px;
            color: #ffffff;
            margin: 0 0 0.5em 0;
            line-height: 1.1;
        }

        p {
            margin: 0 0 10px;
            color: #ffffff;
        }

        .product__price {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            top: -30px;
            left: -30px;
            width: 80px;
            height: 80px;
            background-color: #d9534f;
            color: rgba(0, 0, 0, 0.95);
            border-radius: 50%;

        }

        .product__btn {
            position: absolute;
            bottom: -30px;
            right: 65px;
            background-color: #d9534f;
            transition: background-color  time  easing, box-shadow  time  easing;


             /*:hover {*/ /*    @include shadow-dark;*/ /*    background-color: mix($ accent, $ black, 95%);*/ /*}*/

        }

        .nav-tabs a {
            color: #ffffff;
        }

        .nav-tabs {
            border-bottom: 5px solid #d9534f;

        }

        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
            color: #d9534f;
            cursor: default;
            background-color: transparent;
            border: 5px solid #d9534f;
            border-bottom-color: transparent;
        }

        .nav > li > a:hover, .nav > li > a:focus {
            background-color: transparent;
            text-decoration: none;
            border-color: transparent;
        }
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

    </style>


    <main class="site-wrapper">

        <div class="pt-table desktop-768">
            <div class="pt-tablecell page-home relative" style="background-image: url(https://scontent.fesb3-2.fna.fbcdn.net/v/t1.6435-9/37904225_688725644825738_6160377175833837568_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=e3f864&_nc_ohc=mmYcEQ-g-N4AX9lbi4P&_nc_ht=scontent.fesb3-2.fna&oh=00_AT9iEiiSnIY863LcnCZ-Mg5islvP-jmzDMbr1QG03OxayQ&oe=620128D6);
    background-position: center;
    background-size: cover;">
                <div class="overlay"></div>
                <div class="container" style="margin-bottom: 50px">
                    <br>
                    <ul class="nav nav-tabs">
                        <?php
                        $sql = "select * from category order by categoryid asc limit 1";
                        $fquery = $conn->query($sql);
                        $frow = $fquery->fetch_array();
                        ?>
                        <li class="active"><a data-toggle="tab"
                                              href="#<?php echo $frow['catname'] ?>"><?php echo $frow['catname'] ?></a>
                        </li>
                        <?php

                        $sql = "select * from category order by categoryid asc";
                        $nquery = $conn->query($sql);
                        $num = $nquery->num_rows - 1;

                        $sql = "select * from category order by categoryid asc limit 1, $num";
                        $query = $conn->query($sql);
                        while ($row = $query->fetch_array()) {
                            ?>
                            <li><a data-toggle="tab"
                                   href="#<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>

                    <div class="tab-content">
                        <?php
                        $sql = "select * from category order by categoryid asc limit 1";
                        $fquery = $conn->query($sql);
                        $ftrow = $fquery->fetch_array();
                        ?>
                        <div id="<?php echo $ftrow['catname']; ?>" class="tab-pane fade in active"
                             style="margin-top: 10px;">
                            <?php

                            $sql = "select * from product where categoryid='" . $ftrow['categoryid'] . "'";
                            $pfquery = $conn->query($sql);
                            $inc = 4;
                            while ($pfrow = $pfquery->fetch_array()) {
                                $inc = ($inc == 4) ? 1 : $inc + 1;
                                if ($inc == 1) echo "<div class='row'>";
                                ?>
                                <div class="col-md-3">
                                    <div class="row" style="padding-bottom: 40px;">

                                        <form method="post"
                                              action="product.php?action=add&id=<?php echo $pfrow["id"]; ?>">
                                            <div class="col-6 col-md-12 product">

                                                <span class="product__price text-light fs-4"><?php echo number_format($pfrow['price'], 3);?> VND</span>
                                                <img class="product__image" src="<?php echo $pfrow["image"]; ?>">
                                                <h1 class="product__title"><?php echo $pfrow["pname"]; ?></h1>
                                                <p><?php echo $pfrow["pdescription"]; ?></p>
                                                <input type="text" name="quantity" class="form-control" value="1">
                                                <input type="hidden" name="hidden_name"
                                                       value="<?php echo $pfrow["pname"]; ?>">
                                                <input type="hidden" name="hidden_price"
                                                       value="<?php echo $pfrow["price"]; ?>">
                                                <input href="" type="submit" name="add" class="product__btn btn text-light"
                                                       value="Thêm vào giỏ hàng" </input>

                                                <br>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                if ($inc == 4) echo "</div>";
                            }
                            if ($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>";
                            if ($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>";
                            if ($inc == 3) echo "<div class='col-md-3'></div></div>";
                            ?>
                        </div>
                        <?php

                        $sql = "select * from category order by categoryid asc";
                        $tquery = $conn->query($sql);
                        $tnum = $tquery->num_rows - 1;

                        $sql = "select * from category order by categoryid asc limit 1, $tnum";
                        $cquery = $conn->query($sql);
                        while ($trow = $cquery->fetch_array()) {
                            ?>
                            <div id="<?php echo $trow['catname']; ?>" class="tab-pane fade" style="margin-top:20px;">
                                <?php

                                $sql = "select * from product where categoryid='" . $trow['categoryid'] . "'";
                                $pquery = $conn->query($sql);
                                $inc = 4;
                                while ($prow = $pquery->fetch_array()) {
                                    $inc = ($inc == 4) ? 1 : $inc + 1;
                                    if ($inc == 1) echo "<div class='row'>";
                                    ?>
                                    <div class="col-md-3">
                                        <div class="row">

                                            <form method="post"
                                                  action="product.php?action=add&id=<?php echo $prow["id"]; ?>">
                                                <div class="col-6 col-md-12 product">

                                                    <span class="product__price text-light fs-4"><?php echo number_format($prow['price'], 3);?> VND</span>
                                                    <img class="product__image" src="<?php echo $prow["image"]; ?>">
                                                    <h1 class="product__title"><?php echo $prow["pname"]; ?></h1>
                                                    <p><?php echo $prow["pdescription"]; ?></p>
                                                    <input type="text" name="quantity" class="form-control" value="1">
                                                    <input type="hidden" name="hidden_name"
                                                           value="<?php echo $prow["pname"]; ?>">
                                                    <input type="hidden" name="hidden_price"
                                                           value="<?php echo $prow["price"]; ?>">
                                                    <input href="" type="submit" name="add" class="product__btn btn text-light"
                                                           value="Thêm vào giỏ hàng" </input>


                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                    if ($inc == 4) echo "</div>";
                                }
                                if ($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>";
                                if ($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>";
                                if ($inc == 3) echo "<div class='col-md-3'></div></div>";
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

    </main>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
