<?php
include_once('dbConfig.php');
$bu = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-widtp> h>, initial-scale=1.0">
    <title>Vending Machine</title>
    <link rel="icon" href="pic/logo-title1.png" type="image/icon type">

    <link href="style_admin.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="header-container">
            <a class="logo-header-text" href="index.php">สาขา BU229</a>
            <a href="admin_login.php">
                <img src="/pic/logo.png" class="logo-header-img">
            </a>
        </div>
    </header>

    <nav>
        <form method="post" autocomplete="off">
            <div class="nav-bg">
                <div class="nav-login">
                    <div class="nav-login-container">
                        <div class="nav-login-center">
                            <img src="/pic/logo.png" class="logo-login">
                        </div>

                        <p class="text-login">เข้าสู่ระบบ</p>

                        <div class="nav-input">
                            <p class="text-input">Username</p>
                            <input type="text" name="user" class="input-text" placeholder="Username พนักงาน" autocomplete="new-password">
                        </div>

                        <div class="nav-input">
                            <p class="text-input">Password</p>
                            <input type="text" name="pass" class="input-text" placeholder="Password" autocomplete="new-password">
                        </div>
                        <style>
                            .button-login-bg1 .button {
                                width: 100%;
                                height: 6vw;
                                border-radius: 5px;
                                background-color: #4361EE;
                                display: flex;
                                align-items: center;
                                text-align: center;
                                justify-content: center;
                                color: #FFF;
                                border-style: none;
                                cursor: pointer;
                            }

                            .button-login-bg1 .button:hover {
                                background-color: #3046B1;
                            }

                            .button-login-bg2 .button {
                                width: 100%;
                                height: 6vw;
                                border-radius: 5px;
                                background-color: #FB8500;
                                display: flex;
                                align-items: center;
                                text-align: center;
                                justify-content: center;
                                color: #FFF;
                                border-style: none;
                                cursor: pointer;
                            }

                            .button-login-bg2 .button:hover {
                                background-color: #ff6200;
                            }
                        </style>

                        <div class="button-login">
                            <div class="button-login-bg1">
                                <button type="submit" name='btn-ok' class="button" >เข้าสู่ระบบ 
                            </div>
                        </div>
                    </div>

                    <div class="button-login">
                        <div class="button-login-bg2">
                            <button type="submit" name='btn-back' class="button">กลับเข้าสู่หน้ารายการขาย
                        </div>
                    </div>
                </div>

                <div class="img-login">
                    <div class="img-login-pic">
                        <img class="img-pic" src="pic/undraw_moving_re_pipp.png">
                    </div>
                </div>
            </div>

            </div>
            </div>
        </form>

    </nav>
    <?php
    if (isset($_POST['btn-ok'])) {
        $user = mysqli_real_escape_string($db, $_POST['user']);
        $pass = mysqli_real_escape_string($db, $_POST['pass']);
        $query = mysqli_query($db, "SELECT * FROM user WHERE phone = '$user' AND pin = '$pass' AND roles = 'admin'");
        $result = mysqli_fetch_assoc($query);
        if ($user === $result['phone'] && $pass === $result['pin']) {
    ?>
            <script>
                window.location.href = "admin_stock.php?bu=<?= $bu ?>";
            </script>
        <?php
        }
    }
    if (isset($_POST['btn-back'])) {
        ?>
        <script>
            window.location.href = "index.php?bu=<?= $bu ?>";
        </script>
    <?php
    }
    ?>
</body>
