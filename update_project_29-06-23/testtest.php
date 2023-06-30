<?php
include_once('dbConfig.php');
$id = $_GET['id'];
$bu = $_GET['bu'];
$u_id = isset($_GET['u_id']);
$query = mysqli_query($db, "SELECT * FROM product WHERE p_id = $id");
$result = mysqli_fetch_array($query);
$query = mysqli_query($db, "SELECT * FROM vm_info WHERE vm_id = '$bu'");
$vm_name = mysqli_fetch_array($query);
?>
<script>
    setTimeout(function() {
        window.location.href = "home.php?bu=<?= $bu ?>";
        window.clearTimeout;
    }, 60000);
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-widtp> h>, initial-scale=1.0">
    <title>Vending Machine</title>
    <link rel="icon" href="/pic/logo-title1.png" type="image/icon type">

    <link href="/style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="header-container">
            <a class="logo-header-text" href="/index.php">สาขา <?= $vm_name['vm_name'] ?></a>
            <a href="/admin_login.php">
                <img src="/pic/logo.png" class="logo-header-img">
            </a>
        </div>
    </header>

    <nav>
        <div class="slider">
            <figure>
                <div class="nav-container">
                    <img class="banner-header-img" src="/pic/bn1.png">
                </div>

                <div class="nav-container">
                    <img class="banner-header-img" src="/pic/bn2.png">
                </div>

                <div class="nav-container">
                    <img class="banner-header-img" src="/pic/bn3.png">
                </div>

                <div class="nav-container">
                    <img class="banner-header-img" src="/pic/bn4.png">
                </div>

            </figure>
        </div>
    </nav>

    <div class="banner-add">
        <div class="banner-add-home">
            <img class="banner-add-img" src="/pic/b1.png">
        </div>
    </div>

    <div class="text-container">
        <div class="text-icon-point">
            <div class="text-icon">

                <div class="text-bg">
                    <div class="text">
                        <p> 1.เลือกรายการสินค้า</p>
                    </div>
                </div>

                <div class="icon">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </div>

                <div class="text-bg">
                    <div class="text">
                        <p>2.เลือกวิธีชำระเงิน</p>
                    </div>
                </div>

                <div class="icon">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </div>

                <div class="text">
                    <p>3.รับสินค้า</p>
                </div>
            </div>

            <div class="point-text">
                <a class="logo-point" href="/phone_points.php?bu=<?= $bu ?>">คะเเนนสะสม</a>
            </div>

        </div>
    </div>

    <div class="container-all">
        <div class="container-all-back-closed">
            <div class="container-all-back">
                <a class="logo-back" href="/home.php?bu=<?= $bu ?>">ย้อนกลับ</a>
            </div>

            <div class="container-all-closed">
                <a class="fa-solid fa-circle-xmark" href="/home.php?bu=<?= $bu ?>" style="text-decoration: none; color: #383838;"></a>
            </div>
        </div>

        <div class="container-product">
            <div class="product-all">
                <div class="product-item-all">
                    <img class="product-img" src="<?= $result['img']; ?>">
                    <p class="product-font1"><?= $result['name']; ?></p>
                    <p class="product-font2"><?= $result['p_price']; ?>฿</p>
                </div>
            </div>
        </div>

        <div class="container-product">
            <div class="box-text">
                <div class="box-tab">
                    <p class="text-box">เลือกช่องทางการชำระเงิน</p>
                </div>

                <div class="box-pay">
                    <div class="box-pay-detail">
                        <div class="img-pay-detail">


                            <?php if ($u_id == '') {

                                $myfile = fopen("text.txt", "w");
                                $msg = '1';

                                fwrite($myfile, $msg . "\n");
                                fclose($myfile);
                            ?>
                                <a class="pay-cash-link" href="/pay_cash.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $result['p_price'] ?>">
                                <?php
                            } else if ($u_id != '') {
                                $myfile = fopen("text.txt", "w");
                                $msg = '1';

                                fwrite($myfile, $msg . "\n");
                                fclose($myfile);
                                ?>
                                    <a class="pay-cash-link" href="/pay_cash.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $result['p_price'] ?>&u_id=<?= $u_id ?>">
                                    <?php } ?>

                                    <img class="cash-img" src="/pic/cash.png">
                                    <p class="cash-font">เงินสด</p>
                                    </a>
                        </div>
                    </div>

                    <div class="box-pay-detail">
                        <div class="img-pay-detail">

                            <?php if ($u_id == '') { ?>
                                <a class="pay-cash-link" href="/pay_qr.php?bu=<?= $bu ?>&id=<?= $id ?>&method=pay">
                                <?php } else if ($u_id != '') { ?>
                                <?php } ?>
                                <a class="pay-cash-link" href="/pay_qr.php?bu=<?= $bu ?>&id=<?= $id ?>&method=pay&u_id">
                                    <img class="cash-img" src="/pic/QR.png">
                                    <p class="cash-font">พร้อมเพย์</p>
                                </a>
                        </div>
                    </div>

                    <div class="box-pay-detail">
                        <div class="img-pay-detail">

                            <?php if ($u_id == '') { ?>
                                <a class="pay-cash-link" href="/pay_points.php?bu=<?= $bu ?>&id=<?= $id ?>&method=points">
                                <?php } else if ($u_id != '') { ?>
                                    <a class="pay-cash-link" href="/pay_points_password.php?bu=<?= $bu ?>&id=<?= $id ?>&method=points&price=<? $result['p_price'] ?>&u_id=<?= $u_id ?>">
                                    <?php } ?>


                                    <img class="cash-img" src="/pic/point.png">
                                    <p class="cash-font">คะเเนนสะสม</p>
                                    </a>
                        </div>
                    </div>

                    <div class="box-pay-detail">
                        <div class="img-pay-detail">
                            <?php if ($u_id == '') { ?>
                                <a class="pay-cash-link" href="/pay_cashback.php?bu=<?= $bu ?>&id=<?= $id ?>&method=credit">
                                <?php } else if ($u_id != '') { ?>
                                    <a class="pay-cash-link" href="/pay_cashback_password.php?bu=<?= $bu ?>&id=<?= $id ?>&method=credit&price=<? $result['p_price'] ?>&u_id=<?= $u_id ?>">
                                    <?php } ?>


                                    <img class="cash-img" src="/pic/cash back.png">
                                    <p class="cash-font">เครดิตเงินเกิน</p>
                                    </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>




    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-button-logo">
                <div class="footer-button">
                    <p class="button-text">เลือกภาษา</p>
                    <button class="button-thai">ไทย</button>
                    <button class="button-eng">Eng</button>
                </div>

                <div class="foorter-logo">
                    <img src="/pic/school-of-engineering.png" class="logo-university">
                </div>
            </div>

        </div>
    </footer>


</body>

</html>