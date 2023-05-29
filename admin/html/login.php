<?php
include_once('dbConfig.php');
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "select * from ad_info where ad_id ='" . $id . "'";
    $result = mysqli_query($db, $sql);
    $query = mysqli_query($db, "SELECT * FROM ad_info WHERE ad_id='$id'");
    $result = mysqli_fetch_array($query);
    $ad_id = $result['ad_img'];
    $delete_query = mysqli_query($db, "DELETE FROM ad_info WHERE ad_id='$id'");
    unlink($ad_id);
    if ($delete_query) {
    } else {
        // Delete failed
        echo "Delete failed.";
    }
}

if (isset($_POST['update'])) {
    if ($_FILES['doc']['name'] != "") {
        $fileid = $_POST['id'];
        $query = mysqli_query($db, "SELECT * FROM ad_info WHERE ad_id='$fileid'");
        $result = mysqli_fetch_array($query);
        $ad_id = $result['ad_img'];
        $filename =  $_FILES['doc']['name'];
        $tempname =  $_FILES['doc']['tmp_name'];
        unlink($ad_id);
        move_uploaded_file($tempname, 'pic/' . $filename);

        $sql = "update ad_info set ad_img='pic/" . $filename . "' where ad_id ='" . $fileid . "'";
        $result = mysqli_query($db, $sql);

        if ($result) {
        } else {
            echo "error";
        }
    }
}


if (isset($_POST['insert'])) {
    $filename =  $_FILES['doc']['name'];
    $tempname =  $_FILES['doc']['tmp_name'];
    move_uploaded_file($tempname, 'pic/' . $filename);

    $sql = "insert into ad_info (ad_img) values ('pic/" . $filename . "')";
    $result = mysqli_query($db, $sql);

    if ($result) {
        echo "data inserted";
    } else {
        echo "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Vending Machine System</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="pic/logo-title1.png">
    <!-- Bootstrap Core CSS -->
    <link href="../assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body class="fix-header card-no-border fix-sidebar">


    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form>
        <h3>Vending Machine System</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Username" id="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password">

        <a href="index.php" class="button-login">Login</a>

    </form>

    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #2F4BD0;
            background-image: linear-gradient(#4361EE, #2F4BD0);
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad,
                    #23a2f6);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: -30px;
            bottom: -80px;
        }

        form {
            height: 520px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        .button-login {
            width: 100%;
            height: 50px;
            font-size: 16px;
            border-radius: 5px;
            font-weight: 500;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1845ad;
            margin-top: 50px;
            text-decoration: none;
        }

        .button-login:hover {
            background-color: #34495E;
            color: white;
        }

        .footer {
            bottom: 0;
            color: gainsboro;
            left: 0px;
            padding: 17px 15px;
            position: absolute;
            right: 0;
            border-top: 1px solid rgba(120, 130, 140, 0.13);
        }
    </style>

    <!-- ============================================================== -->
    <footer class="footer"> © 2566 DASHBOARD by Vending Machine </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>