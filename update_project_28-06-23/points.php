<?php
include_once('dbConfig.php');
$bu = $_GET['bu'];
$u_id = $_GET['u_id'];
$querys = mysqli_query($db, "SELECT * FROM user WHERE u_id = '$u_id'");
$ruser = mysqli_fetch_array($querys);
$query = mysqli_query($db, "SELECT * FROM vm_info WHERE vm_id = '$bu'");
$vm_name = mysqli_fetch_array($query);
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
      <a id="heading" class="logo-header-text" href="/index.php">สาขา <?= $vm_name['vm_name'] ?></a>
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

        <div class="text">
          <p id="heading1"></p>
        </div>


        <div class="icon">
          <i class="fa-solid fa-circle-chevron-right"></i>
        </div>


        <div class="text">
          <p id="heading2"></p>
        </div>



        <div class="icon">
          <i class="fa-solid fa-circle-chevron-right"></i>
        </div>


        <div class="text">
          <p id="heading3"></p>
        </div>
      </div>

      <div class="point-text">
        <a id="heading_points" class="logo-point" href="/phone_points.php?bu=<?= $bu ?>"></a>
      </div>

    </div>
  </div>

  <div class="container-all">
    <div class="container-all-back-closed">
      <div class="container-all-back">
        <a id="content_back" class="logo-back" href="/home.php?bu=<?= $bu ?>"></a>
      </div>

      <div class="container-all-closed">
        <a class="fa-solid fa-circle-xmark" href="/home.php?bu=<?= $bu ?>" style="text-decoration: none; color: #383838;"></a>
      </div>
    </div>

    <div class="container-product">
      <div class="text-number-all">
        <div class="text-name-number1">
          <p id="content_title_pay" class="text-number1"></p>
          <p class="text-number2"><?= $ruser['phone'] ?></p>
        </div>

        <hr>

        <div class="text-name-number2">
          <div class="text-name-number-all">
            <div class="text-name-left">
              <p class="text-number3"><?= $ruser['points'] ?></p>
              <p id="content_title_pay1" class="text-number1"></p>
            </div>

            <div class="text-name-right">
              <p class="text-number2"><?= $ruser['balance'] ?></p>
              <p id="content_title_pay2" class="text-number1"></p>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="container-product">
      <div class="button-all-points">
        <div class="button-left-right">
          <div class="button-left">
            <a id="content_title_pay3" class="button-all-left" href="/index.php?bu=<?= $bu ?>"></a>
          </div>

          <div class="button-right">
            <a id="content_title_pay4" class="button-all-right" href="/home.php?bu=<?= $bu ?>&u_id=<?= $u_id ?>"></a>
          </div>
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


</body>

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
      content_title_pay.innerText = 'หมายเลขโทรศัพท์';
      content_title_pay1.innerText = 'คะเเนนสะสม';
      content_title_pay2.innerText = 'เครดิตเงินเกิน';
      content_title_pay3.innerText = 'ยกเลิก';
      content_title_pay4.innerText = 'สั่งสินค้า';


      index_language.innerText = 'ภาษา';


    } else if (lang === 'en') {

      heading.innerText = 'Branch BU123';
      heading1.innerText = '1.Select products';
      heading2.innerText = '2.Choose payment';
      heading3.innerText = '3.Pick up';
      heading_points.innerText = 'Points';

      content_back.innerText = 'Back';
      content_title_pay.innerText = 'Phone number';
      content_title_pay1.innerText = 'Points';
      content_title_pay2.innerText = 'Excess Credit';
      content_title_pay3.innerText = 'Cancel';
      content_title_pay4.innerText = 'Order';

      index_language.innerText = 'Language';

    }

    // บันทึกภาษาที่เลือกในคุกกี้
    document.cookie = `lang=${lang}; path=/`;
  }
</script>
<!-- Script สำหรับภาษา -->

</html>