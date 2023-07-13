<?php
include_once('dbConfig.php');
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $delete_query = mysqli_query($db, "DELETE FROM user WHERE u_id='$id'");
    if ($delete_query) {
        // Delete successful
        echo "Delete successful.";
    } else {
        // Delete failed
        echo "Delete failed.";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $pin = $_POST['pin'];
    $balance = $_POST['balance'];
    $points = $_POST['points'];

    // Check if phone number already exists
    $check_query = mysqli_query($db, "SELECT * FROM user WHERE phone='$phone' AND u_id != '$id'");
    if (mysqli_num_rows($check_query) > 0) {
        // Phone number already exists, show error message
        echo "Phone number already exists.";
    } else {
        // Phone number doesn't exist, proceed with update
        $update_query = mysqli_query($db, "UPDATE user SET phone='$phone', pin='$pin', balance='$balance', points='$points' WHERE u_id='$id'");
        if ($update_query) {
            // Update successful
            echo "Update successful.";
        } else {
            // Update failed
            echo "Update failed.";
        }
    }
}


if (isset($_POST['insert'])) {
    $phone = $_POST['phone'];
    $pin = $_POST['pin'];
    $balance = $_POST['balance'];
    $points = $_POST['points'];

    $select_sql = "SELECT * FROM user WHERE phone = '$phone'";
    $result = mysqli_query($db, $select_sql);
    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO user (phone, pin, balance, points, roles) VALUES ('$phone', '$pin', '$balance', '$points', 'user')";
        mysqli_query($db, $sql);
    } else {
        // If the phone value already exists, display an error message
        echo "Error: Phone number already exists";
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
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600&display=swap');

        body {
            font-family: 'Noto Sans Thai', sans-serif;
        }
    </style>

</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader1"></div>
        </div>
    </div>

    <style>
        .loader1 {
            animation: rotate 1s infinite;
            height: 50px;
            width: 50px;
        }

        .loader1:before,
        .loader1:after {
            border-radius: 50%;
            content: '';
            display: block;
            height: 20px;
            width: 20px;
        }

        .loader1:before {
            animation: ball1 1s infinite;
            background-color: #cb2025;
            box-shadow: 30px 0 0 #f8b334;
            margin-bottom: 10px;
        }

        .loader1:after {
            animation: ball2 1s infinite;
            background-color: #00a096;
            box-shadow: 30px 0 0 #97bf0d;
        }

        @keyframes rotate {
            0% {
                -webkit-transform: rotate(0deg) scale(0.8);
                -moz-transform: rotate(0deg) scale(0.8);
            }

            50% {
                -webkit-transform: rotate(360deg) scale(1.2);
                -moz-transform: rotate(360deg) scale(1.2);
            }

            100% {
                -webkit-transform: rotate(720deg) scale(0.8);
                -moz-transform: rotate(720deg) scale(0.8);
            }
        }

        @keyframes ball1 {
            0% {
                box-shadow: 30px 0 0 #f8b334;
            }

            50% {
                box-shadow: 0 0 0 #f8b334;
                margin-bottom: 0;
                -webkit-transform: translate(15px, 15px);
                -moz-transform: translate(15px, 15px);
            }

            100% {
                box-shadow: 30px 0 0 #f8b334;
                margin-bottom: 10px;
            }
        }

        @keyframes ball2 {
            0% {
                box-shadow: 30px 0 0 #97bf0d;
            }

            50% {
                box-shadow: 0 0 0 #97bf0d;
                margin-top: -20px;
                -webkit-transform: translate(15px, 15px);
                -moz-transform: translate(15px, 15px);
            }

            100% {
                box-shadow: 30px 0 0 #97bf0d;
                margin-top: 0;
            }
        }
    </style>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <style>
                                img.center {
                                    display: block;
                                    margin: 0 auto;
                                    margin-top: 25px;
                                }
                            </style>
                            <img class="center" src="pic/logo.png" width="70%" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                    </a>
                </div>

                <p class="text-topbar">VENDING MACHIN SYSTEM</p>
                <style>
                    .text-topbar {
                        color: #4361EE;
                        font-size: 25px;
                        font-weight: 600;
                        margin-left: 25px;
                        margin-bottom: -5px;
                    }
                </style>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->

            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="fa fa-pie-chart" aria-hidden="true"></i></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-blank.php" aria-expanded="false"><i class="fa fa-th-large" aria-hidden="true"></i><span class="hide-menu">จัดการรายการสินค้า</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="ads_info.php" aria-expanded="false"><i class="fa fa-picture-o" aria-hidden="true"></i><span class="hide-menu">จัดการข้อมูลโฆษณา</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="admin_info.php" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="hide-menu">จัดการข้อมูลพนักงาน</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="user_info.php" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i><span class="hide-menu">จัดการข้อมูลผู้ใช้งาน</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="login.php" aria-expanded="false"><i class="fa fa-sign-out" aria-hidden="true"></i><span class="hide-menu">ออกจากระบบ</span></a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h2 style="margin-top: 20px; font-family: 'Noto Sans Thai', sans-serif; font-weight: 500; color: #4361EE ;">จัดการข้อมูลผู้ใช้งาน</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">จัดการข้อมูลผู้ใช้งาน</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- STYLE for button -->
                <style>
                    /* Style for the button */
                    .button {
                        background-color: #008CBA;
                        border: none;
                        color: white;
                        padding: 12px 30px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        border-radius: 5px;
                        cursor: pointer;
                    }

                    /* Style for the popup form */
                    .popup {
                        display: none;
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.5);
                    }

                    .popup-content {
                        background-color: #fefefe;
                        margin: auto;
                        padding: 20px;
                        border: 1px solid #888;
                        width: 50%;
                        border-radius: 5px;
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    }


                    /* Style for the close button */
                    .close {
                        position: absolute;
                        top: 10px;
                        right: 20px;
                        font-size: 28px;
                        font-weight: bold;
                        color: #888;
                        cursor: pointer;
                    }

                    /* Style for the form fields */
                    input[type=text],
                    input[type=number] {
                        width: 100%;
                        padding: 12px 20px;
                        margin: 8px 0;
                        box-sizing: border-box;
                        border: 2px solid #ccc;
                        border-radius: 4px;
                        font-size: 16px;
                    }

                    input[type=submit] {
                        background-color: #4CAF50;
                        color: white;
                        padding: 12px 20px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        font-size: 16px;
                    }
                </style>
                <!-- END OF STYLE -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <button class="button" onclick="showPopup()">เพิ่มข้อมูลผู้ใช้งาน</button>
                                <hr>

                                <style>
                                    .button {
                                        background-color: #6772e5;
                                        border: none;
                                    }
                                </style>

                                <div class="popup" id="popup">
                                    <div class="popup-content">
                                        <span class="close" onclick="hidePopup()">&times;</span>
                                        <h2>เพิ่มข้อมูลผู้ใช้งาน</h2>
                                        <hr>
                                        <form action="" method="post">
                                            <label for="phone">เบอร :</label>
                                            <input type="text" id="phone" name="phone" placeholder="Enter phone number" required maxlength="10" autocomplete="new-password">

                                            <label for="pin">PIN:</label>
                                            <input type="text" id="pin" name="pin" placeholder="Enter PIN" required autocomplete="off" maxlength="6">

                                            <label for="balance">ยอดคงเหลือ:</label>
                                            <input type="number" id="balance" name="balance" placeholder="Enter balance" required autocomplete="off">

                                            <label for="points">คะแนนสะสม:</label>
                                            <input type="number" id="points" name="points" placeholder="Enter points" required autocomplete="off">
                                            <hr>

                                            <input type="submit" name="insert" value="เพิ่มข้อมูล">
                                        </form>
                                    </div>
                                </div>

                                <script>
                                    // Function to show the popup form
                                    function showPopup() {
                                        document.getElementById("popup").style.display = "block";
                                    }

                                    // Function to hide the popup form
                                    function hidePopup() {
                                        document.getElementById("popup").style.display = "none";
                                    }
                                </script>
                                <!-- DEMO TABLE -->
                                <div class="table-responsive">
                                    <table id="mytable" class="table">
                                        <!-- HEADER -->
                                        <thead align="center" class="top-table">
                                            <th>ลำดับ</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>PIN</th>
                                            <th>ยอดคงเหลือ</th>
                                            <th>คะแนนสะสม</th>
                                            <th>แก้ไข</th>
                                            <th>ลบ</th>
                                        </thead>

                                        <style>
                                            .top-table {
                                                background-color: #4361EE;
                                                color: white;

                                            }
                                        </style>
                                        <!-- END OF HEADER -->

                                        <!-- BODY -->
                                        <tbody align="center">
                                            <style>
                                                .product-img {
                                                    width: 50%;
                                                    height: 5vw;
                                                    object-fit: cover;
                                                    border-radius: 10px;
                                                }
                                            </style>
                                            <?php
                                            $query = mysqli_query($db, "SELECT * FROM user WHERE roles='user'");
                                            while ($result = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= $result['u_id'] ?></td>
                                                    <td><?= $result['phone'] ?></td>
                                                    <td><?= $result['pin'] ?></td>
                                                    <td><?= $result['balance'] ?></td>
                                                    <td><?= $result['points'] ?></td>
                                                    <td>
                                                        <button name="edit" class="btn btn-success" onclick="showEditPopup(<?= $result['u_id'] ?>, '<?= $result['phone'] ?>', '<?= $result['pin'] ?>', <?= $result['balance'] ?>, <?= $result['points'] ?>)">แก้ไข</button>

                                                        <style>
                                                            .btn-success {
                                                                background-color: #586575;
                                                                border: none;
                                                            }

                                                            .btn-success:hover {
                                                                border: none;
                                                                background-color: #7E8C8D;
                                                            }
                                                        </style>
                                                    </td>


                                                    <!--  -->
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?= $result['u_id'] ?>">
                                                            <button type="submit" name="delete" class="btn btn-danger">ลบ</button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                        <!-- END OF BODY -->
                                    </table>
                                </div>
                                <!-- END OF DEMO TABLE -->
                                <div class="popup" id="edit-popup">
                                    <div class="popup-content">
                                        <span class="close" onclick="hideEditPopup()">&times;</span>
                                        <h2>แก้ไข้ข้อมูล</h2>
                                        <form action="" method="post">
                                            <input type="hidden" id="edit-id" name="id">

                                            <label for="edit-phone">เบอร์โทรศัพท์:</label>
                                            <input type="text" id="edit-phone" name="phone" placeholder="Enter phone number" required maxlength="10" autocomplete="new-password">

                                            <label for="edit-pin">PIN:</label>
                                            <input type="text" id="edit-pin" name="pin" placeholder="Enter PIN" required autocomplete="off" maxlength="6">

                                            <label for="edit-balance">ยอดคงเหลือ:</label>
                                            <input type="number" id="edit-balance" name="balance" placeholder="Enter balance" required autocomplete="off">

                                            <label for="edit-points">คะแนนสะสม:</label>
                                            <input type="number" id="edit-points" name="points" placeholder="Enter points" required autocomplete="off">

                                            <input type="submit" name="update" value="Update">
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    function showEditPopup(id, phone, pin, balance, points) {
                                        document.getElementById("edit-popup").style.display = "block";
                                        document.getElementById("edit-id").value = id;
                                        document.getElementById("edit-phone").value = phone;
                                        document.getElementById("edit-pin").value = pin;
                                        document.getElementById("edit-balance").value = balance;
                                        document.getElementById("edit-points").value = points;
                                    }

                                    function hideEditPopup() {
                                        document.getElementById("edit-popup").style.display = "none";
                                    }
                                </script>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
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