<?php
include_once('dbConfig.php');
$id = $_GET['id'];
$bu = $_GET['bu'];
$u_id = $_GET['u_id'];
$method = $_GET['method'];
$query = mysqli_query($db, "SELECT * FROM product WHERE p_id = $id");
$result = mysqli_fetch_array($query);
$query = mysqli_query($db, "SELECT * FROM vm_info WHERE vm_id = '$bu'");
$vm_name = mysqli_fetch_array($query);
$query = mysqli_query($db, "SELECT * FROM user WHERE u_id = '$u_id'");
$uinfo = mysqli_fetch_array($query);
$totaluse = ($_GET['price'] / 5) * 10;
?>

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
      <a id="heading" class="logo-header-text" href="/index.php"><?= $vm_name['vm_name'] ?></a>
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
            <p id="heading1"></p>
          </div>
        </div>

        <div class="icon">
          <i class="fa-solid fa-circle-chevron-right"></i>
        </div>

        <div class="text-bg">
          <div class="text">
            <p id="heading2"></p>
          </div>
        </div>


        <div class="icon">
          <i class="fa-solid fa-circle-chevron-right"></i>
        </div>


        <div class="text">
          <p id="heading3"></p>
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

      </div>

      <div class="container-all-closed">
        <a class="fa-solid fa-circle-xmark" href="/home.php?bu=<?= $bu ?>" style="text-decoration: none; color: #383838;"></a>
      </div>
    </div>

    <div class="container-product">
      <div class="text-number-all">
        <div class="text-name-number1">
          <p id="content_title_pay" class="text-number1"></p>
          <p class="text-number2"><?= $uinfo['phone'] ?></p>
        </div>

        <hr>

        <div class="text-name-number2">
          <div class="text-name-number-all">
            <div class="text-name-left">
              <p class="text-number3"><?= $uinfo['points'] ?></p>
              <p id="content_title_pay1" class="text-number1"></p>
            </div>

            <div class="text-name-right">
              <p class="text-number2"><?= $uinfo['balance'] ?></p>
              <p id="content_title_pay2" class="text-number1"></p>
            </div>
          </div>
        </div>

        <hr>

        <div class="text-name-number2">
          <div class="text-name-number-all">
            <div class="text-name-left">
              <p class="text-number4">-<?= $totaluse ?></p>
              <p id="content_title_pay3" class="text-number1"></p>
            </div>

            <div class="text-name-right">

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container-product">
      <div class="button-all">
        <div class="button-left-right">

          <?php
          if ($uinfo['points'] >= $totaluse) { ?>
            <div class="button-left">
              <a id="content_title_pay4" class="button-all-left" href="/home.php?bu=<?= $bu ?>"></a>
            </div>

            <div class="button-right">
              <a id="content_title_pay5" class="button-all-right" href="/wait.php?bu=<?= $bu ?>&id=<?= $id ?>&method=<?= $method ?>&price=<?= $totaluse ?>&u_id=<?= $u_id ?>"></a>
            </div>

          <?php } else if ($uinfo['points'] < $totaluse) { ?>
            <div class="button-left">
              <a class="button-all-left" href="/pay.php?bu=<?= $bu ?>&id=<?= $id ?>">เปลี่ยนวิธีชำระเงิน</a>
            </div>
          <?php } ?>
        </div>

      </div>
    </div>

  </div>


  <footer>
    <div class="footer-container">
      <div class="footer-button-logo">
        <div class="footer-button">
          <p id="index_language" class="button-text"></p>
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

  <!-- Script สำหรับภาษา -->
  <!-- Script สำหรับภาษา -->
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


        content_title_pay.innerText = 'หมายเลขโทรศัพท์';
        content_title_pay1.innerText = 'คะเเนนสะสม';
        content_title_pay2.innerText = 'เครดิตเงินเกิน';
        content_title_pay3.innerText = 'คะเเนนที่ต้องใช้';
        content_title_pay4.innerText = 'ยกเลิก';
        content_title_pay5.innerText = 'ยืนยัน';


        index_language.innerText = 'ภาษา';


      } else if (lang === 'en') {

        heading.innerText = 'Branch BU123';
        heading1.innerText = '1.Select products';
        heading2.innerText = '2.Choose payment';
        heading3.innerText = '3.Pick up';
        heading_points.innerText = 'Points';


        content_title_pay.innerText = 'Phone number';
        content_title_pay1.innerText = 'Points';
        content_title_pay2.innerText = 'Excess Credit';
        content_title_pay3.innerText = 'Required Points';
        content_title_pay4.innerText = 'Cancel';
        content_title_pay5.innerText = 'Confirm';

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
  </script>

  <script>
    // โหลดภาษาที่เลือกจากคุกกี้เมื่อหน้าถูกโหลด
    window.addEventListener("load", function() {
      const lang = getLanguage();
      changeLanguage(lang);
    });
  </script>

  <!-- Script สำหรับภาษา -->
  <!-- Script สำหรับภาษา -->
  <!-- Script สำหรับภาษา -->


</body>

</html>