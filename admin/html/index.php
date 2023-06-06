<?php
include_once('dbConfig.php');

$result  = mysqli_query($db, "SELECT o.p_id, p.name, SUM(o.price) as total_sales FROM order_his o JOIN product p ON o.p_id = p.p_id GROUP BY o.p_id");

// Format the data for Chart.js
$labels = array();
$data = array();
while ($row = $result->fetch_assoc()) {
    $labels[] = $row["name"];
    $data[] = $row["total_sales"];
}


// Determine the index of the top sale
$maxIndex = array_keys($data, max($data))[0];

// Define the colors for the chart
$backgroundColor = array();
$borderColor = array();
for ($i = 0; $i < count($data); $i++) {
    if ($i == $maxIndex) {
        $backgroundColor[] = "rgba(255, 99, 132, 0.2)";
        $borderColor[] = "rgba(255, 99, 132, 1)";
    } else {
        $backgroundColor[] = "rgba(75, 192, 192, 0.2)";
        $borderColor[] = "rgba(75, 192, 192, 1)";
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
    <link href="../assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="css/pages/dashboard1.css" rel="stylesheet">
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

<body class="fix-header fix-sidebar card-no-border">
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
                        <h2 style="margin-top: 20px; font-family: 'Noto Sans Thai', sans-serif; font-weight: 500; color: #4361EE ;">Dashboard</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าเเรก</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Sales Chart and browser state-->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div>
                                        <h5 class="card-title mb-0">Sales Chart</h5>
                                    </div>
                                    <div class="ms-auto">
                                        <ul class="list-inline text-center font-12">
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                                <canvas id="sales-chart" style="height: 349px; width:100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4 no-block">
                                    <h5 class="card-title mb-0 align-self-center">Our Visitors</h5>
                                    <div class="ms-auto">
                                        <select class="form-select b-0">
                                            <option selected="">Today</option>
                                            <option value="1">Tomorrow</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="visitor" style="height:260px; width:100%;"></div>
                                <ul class="list-inline mt-4 text-center font-12">
                                    <li><i class="fa fa-circle text-purple"></i> Tablet</li>
                                    <li><i class="fa fa-circle text-success"></i> Desktops</li>
                                    <li><i class="fa fa-circle text-info"></i> Mobile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Sales Chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Projects of the Month -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Projects of the Month</h5>
                                    </div>
                                    <div class="ms-auto">
                                        <select class="form-select b-0">
                                            <option selected="">January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive mt-3 no-wrap">
                                    <table class="table vm no-th-brd pro-of-month">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Assigned</th>
                                                <th>Name</th>
                                                <th>Budget</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width:50px;"><span class="round">S</span></td>
                                                <td>
                                                    <h6>Sunil Joshi</h6><small class="text-muted">Web Designer</small>
                                                </td>
                                                <td>Elite Admin</td>
                                                <td>$3.9K</td>
                                            </tr>
                                            <tr class="active">
                                                <td><span class="round"><img src="../assets/images/users/2.jpg" alt="user" width="50"></span></td>
                                                <td>
                                                    <h6>Andrew</h6><small class="text-muted">Project Manager</small>
                                                </td>
                                                <td>Real Homes</td>
                                                <td>$23.9K</td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-success">B</span></td>
                                                <td>
                                                    <h6>Bhavesh patel</h6><small class="text-muted">Developer</small>
                                                </td>
                                                <td>MedicalPro Theme</td>
                                                <td>$12.9K</td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-primary">N</span></td>
                                                <td>
                                                    <h6>Nirav Joshi</h6><small class="text-muted">Frontend Eng</small>
                                                </td>
                                                <td>Elite Admin</td>
                                                <td>$10.9K</td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-warning">M</span></td>
                                                <td>
                                                    <h6>Micheal Doe</h6><small class="text-muted">Content Writer</small>
                                                </td>
                                                <td>Helping Hands</td>
                                                <td>$12.9K</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="up-img" style="background-image:url(../assets/images/big/img1.jpg)"></div>
                            <div class="card-body">
                                <h5 class=" card-title">Business development of rules</h5>
                                <span class="label label-info label-rounded">Technology</span>
                                <p class="mb-0 mt-3">Titudin venenatis ipsum aciat. Vestibu ullamer quam. nenatis
                                    ipsum ac feugiat. Ibulum ullamcorper.</p>
                                <div class="d-flex mt-3">
                                    <a class="link" href="javascript:void(0)">Read more</a>
                                    <div class="ms-auto align-self-center">
                                        <a href="javascript:void(0)" class="link me-2"><i class="fa fa-heart-o"></i></a>
                                        <a href="javascript:void(0)" class="link me-2"><i class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
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
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/node_modules/d3/d3.min.js"></script>
    <script src="../assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById("sales-chart").getContext("2d");
        const data = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: "Total Sales",
                data: <?php echo json_encode($data); ?>,
                backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(255, 206, 86, 0.2)"],
                borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)", "rgba(255, 206, 86, 1)"],
                borderWidth: 1,
            }, ],
        };

        const myChart = new Chart(ctx, {
            type: "bar",
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>
</body>

</html>