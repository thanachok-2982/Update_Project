<?php
include_once('dbConfig.php');
if (isset($_GET['bu']) && $_GET['bu'] != "") {
    $bu = $_GET['bu'];
} else {
    $bu = 1;
}
$sql = mysqli_query($db, "SELECT * FROM vm_info WHERE vm_id ='$bu'");
$vm = mysqli_fetch_array($sql);
$p = array($vm['product1'], $vm['product2'], $vm['product3']);

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $delete_query = mysqli_query($db, "DELETE FROM product WHERE p_id='$id'");
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
    $points = $_POST['product'];


    $update_query = mysqli_query($db, "UPDATE product SET img='$phone', name='$pin', p_price='$balance' WHERE p_id='$id'");
    if ($update_query) {
        // Update successful
        echo "Update successful.";
    } else {
        // Update failed
        echo "Update failed.";
    }

    foreach ($_POST['product']  as $item => $value) {

        if ($item == 0) {
            $sql = "UPDATE vm_info SET product1=$value WHERE vm_id=$bu";
            $result = mysqli_query($db, $sql) or die("Error in query: $sql " . mysqli_error($db));
        } else if ($item == 1) {
            $sql = "UPDATE vm_info SET product2=$value WHERE vm_id=$bu";
            $result = mysqli_query($db, $sql) or die("Error in query: $sql " . mysqli_error($db));
        } else if ($item == 2) {
            $sql = "UPDATE vm_info SET product3=$value WHERE vm_id=$bu";
            $result = mysqli_query($db, $sql) or die("Error in query: $sql " . mysqli_error($db));
        }
    }
}



if (isset($_POST['insert'])) {
    $phone = $_POST['phone'];
    $pin = $_POST['pin'];
    $balance = $_POST['balance'];

    $sql = "INSERT INTO product (img, name, p_price ) VALUES ('$phone', '$pin', '$balance')";
    mysqli_query($db, $sql);
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

        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .img-product-stock {
            width: 100px;
            /*ปรับขนาดภาพ*/
            height: auto;
            padding: 5px;
        }

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
                        <h2 style="margin-top: 20px; font-family: 'Noto Sans Thai', sans-serif; font-weight: 500; color: #4361EE ;">จัดการรายการสินค้า</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">จัดการรายการสินค้า</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $query = mysqli_query($db, "SELECT COUNT(*) FROM vm_info;");
                                $count = mysqli_fetch_array($query)[0];
                                ?>

                                <select id="filter-select" onchange="updateBu()" class="btn-dropdow">
                                    <option value="">กรุณาเลือกตู้จัดการรายการสินค้า</option>
                                    <?php
                                    $i = 1;
                                    while ($i <= $count) {
                                        echo "<option value=\"$i\">$i</option>";
                                        $i++;
                                    }
                                    ?>
                                </select>

                                <style>
                                    .btn-dropdow {
                                        background-color: #FB8500;
                                        border: none;
                                        color: white;
                                        padding: 10px;
                                        border-radius: 5px;
                                        font-size: 16px;
                                    }
                                </style>
                                <hr>

                                <button class="btn btn-primary" onclick="showPopup()">เพิ่มข้อมูลรายการสินค้า</button>
                                <hr>


                                <div class="popup" id="popup">
                                    <div class="popup-content">
                                        <span class="close" onclick="hidePopup()">&times;</span>
                                        <h2>เพิ่มข้อมูลรายการสินค้า</h2>
                                        <hr>
                                        <form action="" method="post">
                                            <label for="phone">รูปภาพสินค้า :</label>
                                            <input type="text" id="phone" name="phone" placeholder="เลือกไฟล์รูปภาพสินค้า" required autocomplete="new-password">

                                            <label for="pin">ชื่อสินค้า:</label>
                                            <input type="text" id="pin" name="pin" placeholder="ชื่อสินค้า" required autocomplete="off">

                                            <label for="balance">ราคาสินค้า:</label>
                                            <input type="number" id="balance" name="balance" placeholder="ราคาสินค้า" required autocomplete="off">

                                            <label for="points">จำนวนสต๊อก:</label>
                                            <input type="number" id="product['<?= $product ?>']" name="points" placeholder="จำนวนสต๊อก" required autocomplete="off">

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
                                        <tr align="center" class="top-table">
                                            <th>รหัสสินค้า</th>
                                            <th>รูปสินค้า</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>ราคาสินค้า</th>
                                            <th>จำนวนสต๊อก</th>
                                            <th>แก้ไข</th>
                                            <th>ลบ</th>
                                        </tr>

                                        <style>
                                            .top-table {
                                                background-color: #4361EE;
                                                color: white;
                                                align-items: center;
                                            }
                                        </style>

                                        <?php
                                        $product = 0;
                                        $sql = mysqli_query($db, "SELECT * FROM vm_info WHERE vm_id ='$bu'");
                                        $vm = mysqli_fetch_array($sql);
                                        $query = mysqli_query($db, "SELECT * FROM product");

                                        while ($result = mysqli_fetch_array($query)) {
                                            $product++;

                                            if ($product == 1) {
                                                $p = $vm['product1'];
                                            } else if ($product == 2) {
                                                $p = $vm['product2'];
                                            } else if ($product == 3) {
                                                $p = $vm['product3'];
                                            }

                                            if ($p != '0') {
                                        ?>

                                                <tr align="center">
                                                    <td><?= $result['p_id'] ?></td>
                                                    <td><img class="img-product-stock" src="<?= $result['img'] ?>"></td>
                                                    <td><?= $result['name'] ?></td>
                                                    <td><?= $result['p_price'] ?></td>
                                                    <td><?= $p ?></td>
                                                    <td>
                                                        <button name="edit" class="btn btn-success" onclick="showEditPopup(<?= $result['p_id'] ?>, '<?= $result['img'] ?>', '<?= $result['name'] ?>', <?= $result['p_price'] ?>, <?= $p ?>)">แก้ไข</button>
                                                    </td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?= $result['p_id'] ?>">
                                                            <button type="submit" name="delete" class="btn btn-danger">ลบ</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            <?php } else if ($p == '0') { ?>

                                                <tr align="center">
                                                    <td><?= $result['p_id'] ?></td>
                                                    <td><img class="img-product-stock" src="<?= $result['img'] ?>"></td>
                                                    <td><?= $result['name'] ?></td>
                                                    <td><?= $result['p_price'] ?></td>
                                                    <td>สินค้าหมด</td>
                                                    <td>
                                                        <button name="edit" class="btn btn-success" onclick="showEditPopup(<?= $result['p_id'] ?>, '<?= $result['img'] ?>', '<?= $result['name'] ?>', <?= $result['p_price'] ?>, <?= $p ?>)">แก้ไข</button>

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
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?= $result['p_id'] ?>">
                                                            <button type="submit" name="delete" class="btn btn-danger">ลบ</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                        <?php
                                            }
                                        } ?>

                                    </table>
                                </div>
                            </div>
                            <div class="popup" id="edit-popup">
                                <div class="popup-content">
                                    <span class="close" onclick="hideEditPopup()">&times;</span>
                                    <h2>แก้ไข้ข้อมูล</h2>
                                    <form action="" method="post">
                                        <input type="hidden" id="edit-id" name="id">

                                        <label for="edit-phone">รูป:</label>
                                        <input type="text" id="edit-phone" name="phone" placeholder="Enter phone number" required autocomplete="new-password">

                                        <label for="edit-pin">ชื่อสินค้า:</label>
                                        <input type="text" id="edit-pin" name="pin" placeholder="Enter PIN" required autocomplete="off">

                                        <label for="edit-balance">ราคาสินค้า:</label>
                                        <input type="number" id="edit-balance" name="balance" placeholder="Enter balance" required autocomplete="off">

                                        <label for="edit-points">จำนวนสต๊อก:</label>
                                        <input type="number" id="edit-points" name="product[<?= $product ?>]" placeholder="Enter points" required autocomplete="off">

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

                            <script>
                                function updateBu() {
                                    const filterSelect = document.getElementById('filter-select');
                                    const selectedValue = filterSelect.value;
                                    if (selectedValue !== "") {
                                        window.location.href = `pages-blank.php?bu=${selectedValue}`;
                                    }
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