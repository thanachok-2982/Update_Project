<?php
include_once('dbConfig.php');
$price = $_GET['price'];
$id = $_GET['id'];
$bu = $_GET['bu'];
$u_id = isset($_GET['u_id']);
$method = $_GET['method'];
$query = mysqli_query($db, "SELECT * FROM product WHERE p_id = $id");
$result = mysqli_fetch_array($query);
$num = $result['p_price'];
$query = mysqli_query($db, "SELECT * FROM vm_info WHERE vm_id = '$bu'");
$vm_name = mysqli_fetch_array($query);
#$coin_validator = exec("python /var/www/html/open_module_and_send_coin.py ");
#echo $coin_validator;
$myfile = fopen("data.txt", "w");
$msg = 0;
fwrite($myfile, $msg . "\n");
fclose($myfile);
$myfile = fopen("text.txt", "w");
$msg = 0;
fwrite($myfile, $msg . "\n");
fclose($myfile);
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
      <div class="product-all">
        <div class="product-item-all">
          <img class="product-img" src="<?= $result['img'] ?>">
          <p class="product-font1"><?= $result['name'] ?></p>
          <p class="product-font2"><?= $result['p_price'] ?>฿</p>
        </div>
      </div>
    </div>

    <div class="container-product">
      <div class="box-text">
        <div class="box-tab">
          <p id="content_title_pay" class="text-box"></p>
        </div>


        <div class="box-pay-grid">
          <div class="box-pay-detail">
            <div class="img-pay-detail">
              <a class="pay-cash-link">
                <img class="cash-img" src="/pic/cash.png">
                <p id="content_title_pay1" class="cash-font"></p>
              </a>
            </div>
          </div>


          <div class="box-pay-detail">
            <div class="img-pay-detail">
              <p id="content_title_pay2" class="product-font1"></p>
              <p class="product-font2"><?= $price ?>฿</p>
            </div>
          </div>

          <!-- test -->
          <?php
          if ($price <= 0) {
            $price = $price * -1;
            if ($u_id == '') {
          ?>
              <script>
                window.location.href = "get_point.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $num ?>&cash_back=<?= $price ?>";
              </script>
            <?php } else { ?>
              <script>
                window.location.href = "get_point.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $num ?>&cash_back=<?= $price ?>&u_id=<?= $u_id ?>";
              </script>
          <?php }
          } ?>

        </div>
      </div>
    </div>

    <div class="countdown-container">
      <span class="countdown-container-text" id="countdown">2:00</span>
    </div>

    <script>
      window.onload = function() {
        var countdownElement = document.getElementById("countdown");
        var countdown = 2 * 60; // 1 นาทีในหน่วยวินาที

        var timer = setInterval(updateCountdown, 1000);

        function updateCountdown() {
          var minutes = Math.floor(countdown / 60);
          var seconds = countdown % 60;

          countdownElement.innerText = minutes.toString().padStart(2, "0") + ":" + seconds.toString().padStart(2, "0");

          if (countdown <= 0) {
            clearInterval(timer);
            window.location.href = "home.php?bu=<?= $bu ?>"; // เปลี่ยนไปยังหน้าอื่น
          } else {
            countdown--;
          }
        }
      };
    </script>

    <style>
      .countdown-container {
        width: 15vw;
        margin: 0 auto;
        border-radius: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
        background-color: #fb8500;
      }

      .countdown-container-text {
        font-size: 3vw;
        font-weight: 500;
        color: white;
      }
    </style>


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

  <script>
    let prevData = null;
    /* USE COIN  */
    function table() {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        let responseText = this.responseText;
        let test = JSON.parse(responseText);
        if (JSON.stringify(test) !== JSON.stringify(prevData)) {


          if (parseInt(test) == 1) {
            <?php $num = $price - 1; ?>
            <?php if ($u_id == '') {
            ?>
              window.location.href = "pay_cash.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $num ?>";
            <?php } else { ?>
              window.location.href = "pay_cash.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $num ?>&u_id=<?= $u_id ?>";
            <?php } ?>
          } else if (parseInt(test) == 2) {
            <?php $num = $price - 2; ?>
            <?php if ($u_id == '') {
            ?>
              window.location.href = "pay_cash.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $num ?>";
            <?php } else { ?>
              window.location.href = "pay_cash.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $num ?>&u_id=<?= $u_id ?>";
            <?php } ?>
          } else if (parseInt(test) == 5) {
            <?php $num = $price - 5; ?>
            <?php if ($u_id == '') {
            ?>
              window.location.href = "pay_cash.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $num ?>";
            <?php } else { ?>
              window.location.href = "pay_cash.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $num ?>&u_id=<?= $u_id ?>";
            <?php } ?>
          } else if (parseInt(test) == 10) {
            <?php $num = $price - 10; ?>
            <?php if ($u_id == '') {
            ?>
              window.location.href = "pay_cash.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $num ?>";
            <?php } else { ?>
              window.location.href = "pay_cash.php?bu=<?= $bu ?>&id=<?= $id ?>&method=cash&price=<?= $num ?>&u_id=<?= $u_id ?>";
            <?php } ?>
          }

        }
        prevData = test;
      }
      xhttp.open("GET", "system.php");
      xhttp.send();
    }

    setInterval(function() {
      table();
    }, 1000);
  </script>

  <script>
    setTimeout(function() {
      window.location.href = "home.php?bu=<?= $bu ?>";
      window.clearTimeout;
    }, 60000);
  </script>

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
      content_title_pay.innerText = 'เงินสด';
      content_title_pay1.innerText = 'เงินสด';
      content_title_pay2.innerText = 'กรุณาชำระเงินสดจำนวน';

      index_language.innerText = 'ภาษา';


    } else if (lang === 'en') {

      heading.innerText = 'Branch BU123';
      heading1.innerText = '1.Select products';
      heading2.innerText = '2.Choose payment';
      heading3.innerText = '3.Pick up';
      heading_points.innerText = 'Points';

      content_back.innerText = 'Back';
      content_title_pay.innerText = 'Cash';
      content_title_pay1.innerText = 'Cash';
      content_title_pay2.innerText = 'Please pay in cash';

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
