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
  <style>
        .popup {
            width: 400px;
            background: #fff;
            border-radius: 6px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 0 30px 30px;
            color: #333;
            visibility: hidden;
            z-index: 2;
          }
        .popup img{
            width: 100px;
            margin-top: -50px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .popup h2{
            font-size: 38px;
            font-weight: 500;
            margin: 30px 0 10px;
        }
        .popup button{
            width: 100%;
            margin-top: 30px;
            padding: 10px 0;
            background: #6fd649;
            color: #fff;
            border: 0;
            outline: none;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .popup button:hover {
          background-color: #5ac02a; 
        }
        .overlay {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.5);
          visibility: hidden;
          z-index: 1;
          bottom: 0; 
        }
    </style>
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
            <p id="heading1">1.เลือกรายการสินค้า</p>
          </div>
        </div>

        <div class="icon">
          <i class="fa-solid fa-circle-chevron-right"></i>
        </div>

        <div class="text-bg">
          <div class="text">
            <p id="heading2">2.เลือกวิธีชำระเงิน</p>
          </div>
        </div>


        <div class="icon">
          <i class="fa-solid fa-circle-chevron-right"></i>
        </div>


        <div class="text">
          <p id="heading3">3.รับสินค้า</p>
        </div>

      </div>

      <div class="point-text">
        <a id="heading_points" class="logo-point" href="/phone_points.php?bu=<?= $bu ?>">คะเเนนสะสม</a>
      </div>

    </div>
  </div>

  <div class="container-all">
    <div class="container-all-back-closed">
      <div class="container-all-back">
        <a id="content_back" class="logo-back" href="/home.php?bu=<?= $bu ?>">ย้อนกลับ</a>
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
          <p id="content_title_pay" class="text-box">เลือกช่องทางการชำระเงิน</p>
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
 
                <a class="pay-cash-link" onclick="openPopup()">
                
                  <div class="popup" id="popup">
                      <img src="https://pngimg.com/d/exclamation_mark_PNG32.png"  >
                      <h2>คำเตือน</h2>
                      <p style="font-size: 18px;">ระบบไม่สามารถคืนเหรียญให้ท่านได้ ทางเราจะเก็บเป็นระบบเครดิตเงินเกินแทนค่ะ</p>
                      <button type="button" onclick="window.location.href = 'pay_cash.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$result['p_price']?>';">ดำเนินการต่อ</button>
                  </div>
                  

                <?php
              } else if ($u_id != '') {
                $myfile = fopen("text.txt", "w");
                $msg = '1';

                fwrite($myfile, $msg . "\n");
                fclose($myfile);
                ?>

                  <a class="pay-cash-link" onclick="openPopup()">
                  
                    <div class="popup" id="popup">
                        <img src="https://pngimg.com/d/exclamation_mark_PNG32.png"  >
                        <h2>คำเตือน</h2>
                        <p style="font-size: 18px;">ระบบไม่สามารถคืนเหรียญให้ท่านได้ ทางเราจะเก็บเป็นระบบเครดิตเงินเกินแทนค่ะ</p>
                        <button type="button" onclick="window.location.href = 'pay_cash.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?= $result['p_price']?>&u_id=<?= $u_id?>';">ดำเนินการต่อ</button>
                    </div>
                    

                  <?php } ?>

                  <img class="cash-img" src="/pic/cash.png">
                  <p id="content_title_pay1" class="cash-font">เงินสด</p>
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
                  <p id="content_title_pay2" class="cash-font">พร้อมเพย์</p>
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
                  <p id="content_title_pay3" class="cash-font">คะเเนนสะสม</p>
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
                  <p id="content_title_pay4" class="cash-font">เครดิตเงินเกิน</p>
                  </a>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>
  <div class="overlay" id="overlay" onclick="closePopup()"></div>
  <footer>
    <div class="footer-container">
      
      <div class="footer-button-logo">
        <div class="footer-button">
          <p id="index_language" class="button-text">ภาษา</p>
          <div id="myDIV">
            <button class="buttonTHEN active" onclick="changeLanguage('th')">ไทย</button>
            <button class="buttonTHEN" onclick="changeLanguage('en')">Eng</button>
          </div>
        </div>

        <div class="foorter-logo">
          <img src="/pic/school-of-engineering.png" class="logo-university">
        </div>
      </div>

    </div>
  </footer>


</body>
<script>
  function openPopup() {
    var popup = document.getElementById("popup");
    var overlay = document.getElementById("overlay");
    popup.style.visibility = "visible";
    overlay.style.visibility = "visible";
  }

  function closePopup() {
    var popup = document.getElementById("popup");
    var overlay = document.getElementById("overlay");
    popup.style.visibility = "hidden";
    overlay.style.visibility = "hidden";
  }
</script>


<!-- Script สำหรับภาษา -->

<script src="script.js"></script>

<script>
  function changeLanguage(lang) {

    const heading = document.getElementById('heading');
    const heading1 = document.getElementById('heading1');
    const heading2 = document.getElementById('heading2');
    const heading3 = document.getElementById('heading3');
    const heading_points = document.getElementById('heading_points');

    const content_back = document.getElementById('content_back');
    const content_title_pay = document.getElementById('content_title_pay');
    const content_title_pay1 = document.getElementById('content_title_pay1');
    const content_title_pay2 = document.getElementById('content_title_pay2');
    const content_title_pay3 = document.getElementById('content_title_pay3');
    const content_title_pay4 = document.getElementById('content_title_pay4');

    const index_language = document.getElementById('index_language');

    if (lang === 'th') {

      heading.innerText = 'สาขา BU123';
      heading1.innerText = '1.เลือกรายการสินค้า';
      heading2.innerText = '2.เลือกวิธีชำระเงิน';
      heading3.innerText = '3.รับสินค้า';
      heading_points.innerText = 'คะเเนนสะสม';

      content_back.innerText = 'ย้อนกลับ';
      content_title_pay.innerText = 'เลือกช่องทางการชำระเงิน';
      content_title_pay1.innerText = 'เงินสด';
      content_title_pay2.innerText = 'พร้อมเพย์';
      content_title_pay3.innerText = 'คะเเนนสะสม';
      content_title_pay4.innerText = 'เครดิตเงินเกิน';

      index_language.innerText = 'ภาษา';


    } else if (lang === 'en') {

      heading.innerText = 'Branch BU123';
      heading1.innerText = '1.Select products';
      heading2.innerText = '2.Choose payment';
      heading3.innerText = '3.Pick up';
      heading_points.innerText = 'Points';

      content_back.innerText = 'Back';
      content_title_pay.innerText = 'Choose a payment method';
      content_title_pay1.innerText = 'Cash';
      content_title_pay2.innerText = 'PromptPay';
      content_title_pay3.innerText = 'Points';
      content_title_pay4.innerText = 'Credit';

      index_language.innerText = 'Language';

    }

    // บันทึกภาษาที่เลือกในคุกกี้
    document.cookie = `lang=${lang}; path=/`;
  }

  function getLanguage() {
    // อ่านค่าภาษาที่เลือกจากคุกกี้
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].trim();
      if (cookie.startsWith('lang=')) {
        return cookie.substring(5);
      }
    }
    // ถ้าไม่มีคุกกี้ภาษา ให้ใช้ภาษาเริ่มต้น (ภาษาไทย)
    return 'th';
  }

  window.addEventListener("load", function() {
    const lang = getLanguage();
    changeLanguage(lang);
  });
</script>
<!-- Script สำหรับภาษา -->

</html>
