<?php 
 include_once('dbConfig.php');
 if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "select * from ad_info where ad_id ='".$id."'";
    $result = mysqli_query($db,$sql);
    $query = mysqli_query($db,"SELECT * FROM ad_info WHERE ad_id='$id'");
    $result = mysqli_fetch_array($query);
    $ad_id = $result['ad_img'];
    $delete_query = mysqli_query($db, "DELETE FROM ad_info WHERE ad_id='$id'");
    unlink($ad_id);
    if($delete_query) {
    } else {
        // Delete failed
        echo "Delete failed.";
    }
}

 if(isset($_POST['update'])) {
    if($_FILES['doc']['name'] != ""){
    $fileid = $_POST['id'];
    $query = mysqli_query($db,"SELECT * FROM ad_info WHERE ad_id='$fileid'");
    $result = mysqli_fetch_array($query);
    $ad_id = $result['ad_img'];
    $filename =  $_FILES['doc']['name'];
    $tempname =  $_FILES['doc']['tmp_name'];
    unlink($ad_id);
    move_uploaded_file($tempname,'pic/'.$filename);

    $sql = "update ad_info set ad_img='pic/".$filename."' where ad_id ='".$fileid."'";
    $result = mysqli_query($db,$sql);

    if($result){

    } else {
        echo "error";
    }}

}


 if(isset($_POST['insert'])){
    $filename =  $_FILES['doc']['name'];
    $tempname =  $_FILES['doc']['tmp_name'];
    move_uploaded_file($tempname,'pic/'.$filename);

    $sql = "insert into ad_info (ad_img) values ('pic/".$filename."')";
    $result = mysqli_query($db,$sql);

    if($result){
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
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>VM</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
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
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Wait</p>
        </div>
    </div>
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
                            <img src="" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="" class="light-logo" alt="homepage" /></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            
                        </li>
                    </ul>
                </div>
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
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i
                                    class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-blank.php" aria-expanded="false"><i
                                    class="fa fa-user-circle-o"></i><span class="hide-menu">จัดการรายการสินค้า</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="ads_info.php" aria-expanded="false"><i
                                    class="fa fa-table"></i><span class="hide-menu">จัดการข้อมูลโฆษณา</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="admin_info.php" aria-expanded="false"><i
                                    class="fa fa-smile-o"></i><span class="hide-menu">จัดการข้อมูลพนักงาน</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="user_info.php" aria-expanded="false"><i
                                    class="fa fa-globe"></i><span class="hide-menu">จัดการข้อมูลผู้ใช้งาน</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="user_info.php" aria-expanded="false"><i
                                    class="fa fa-bookmark-o"></i><span class="hide-menu">ออกจากระบบ</span></a>
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
                        <h3 class="text-themecolor">จัดการรายการสินค้า</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">จัดการรายการสินค้า</li>
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
			background-color: rgba(0,0,0,0.5);
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
		input[type=text], input[type=number] {
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
                            <button class="button" onclick="showPopup()">เพิ่มโฆษณา</button>

                            <div class="popup" id="popup">
                                <div class="popup-content">
                                    <span class="close" onclick="hidePopup()">&times;</span>
                                    <h2>เพิ่มโฆษณา</h2>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <label for="phone">รูปภาพ :</label>
                                        <input type="file" id="phone" name="doc" placeholder="Enter phone Username" required autocomplete="new-password">
                                        <br>
                                        <input type="submit" name="insert" value="Submit">
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
                                    <thead align="center">
                                        <th>#</th>
                                        <th>รูปภาพ</th>
                                        <th>วัน เวลา</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </thead>
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
                                    $query = mysqli_query($db,"SELECT * FROM ad_info ");
                                    while($result = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?=$result['ad_id']?></td>
                                        <td><img class="img-product-stock" src="<?=$result['ad_img']?>" width="600" height="250"></td>
                                        <td><?=$result['ad_time']?></td>
                                        <td>
                                            <button name="edit" class="btn btn-success" onclick="showEditPopup(<?=$result['ad_id']?>, '<?=$result['ad_img']?>', '<?=$result['ad_time']?>')">แก้ไข</button>
                                        </td>

                                      
                                        <!--  -->
                                        <td><form action="" method="post">
                                            <input type="hidden" name="id" value="<?=$result['ad_id']?>">
                                            <button type="submit" name="delete" class="btn btn-danger">ลบ</button>
                                        </form></td>
                                        
                                    </tr>
                                    <?php }?>

                                    </tbody>
                                    <!-- END OF BODY -->
                                </table>
                            </div>
                            <!-- END OF DEMO TABLE -->
                            <div class="popup" id="edit-popup">
                                <div class="popup-content">
                                    <span class="close" onclick="hideEditPopup()">&times;</span>
                                    <h2>เปลี่ยนรูปภาพ</h2>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="edit-id" name="id">
                                        <label for="edit-phone">รูปภาพ</label>
                                        <input type="file" id="edit-phone" name="doc" placeholder="Enter phone number" required autocomplete="new-password">
                                        <br>
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