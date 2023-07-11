<?php
include_once('dbConfig.php');
$bu = $_GET['bu'];
$u_id = isset($_GET['u_id']);
$query = mysqli_query($db, "SELECT * FROM vm_info WHERE vm_id = '$bu'");
$vm_name = mysqli_fetch_array($query);
$product = 0;
$sensor1 = exec("python /var/www/html/sensor1.py");
echo $sensor1;
$sensor2 = exec("python /var/www/html/sensor2.py");
echo $sensor2;
#$data = array(
# 'message' => 'magnetic_open'
#);

// URL of the Flask server
#$url = 'http://localhost:5000/receive';

// Initialize cURL
#$curl = curl_init($url);

// Set cURL options
#curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
#curl_setopt($curl, CURLOPT_POST, true);
#curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// Send the request and store the response
#$response = curl_exec($curl);
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
  <script src="header.js"></script>
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

  <div class="container">
    <div class="product">
      <?php
      $sql = mysqli_query($db, "SELECT * FROM vm_info WHERE vm_id ='$bu'");
      $vm = mysqli_fetch_array($sql);
      $query = mysqli_query($db, "SELECT * FROM product");

      while ($result = mysqli_fetch_array($query)) {
      ?>
        <?php
        $product++;

        if ($product == 1) {
          $p = $vm['product1'];
          $sensor = $sensor1;
        } else if ($product == 2) {
          $p = $vm['product2'];
          $sensor = $sensor2;
        } else if ($product == 3) {
          $p = $vm['product3'];
          $sensor = $sensor3;
        }
        if ($p != '' && $sensor != 1) {
        ?>
          <div class="product-item">
            <?php if ($u_id == '') {
            ?>
              <a class="product-item-link" href="/pay.php?bu=<?= $bu ?>&id=<?= $result['p_id'] ?>">
              <?php } else if ($u_id != '') { ?>
                <a class="product-item-link" href="/pay.php?bu=<?= $bu ?>&id=<?= $result['p_id'] ?>&u_id=<?= $u_id ?>">
                <?php } ?>
                <img class="product-img" src="<?= $result['img'] ?>">
                <p class="product-font1"><?= $result['name'] ?></p>
                <p class="product-font2"><?= $result['p_price'] ?>฿</p>
                </a>
          </div>

        <?php } else if ($p != '' && $sensor != 0) { ?>
          <div class="product-item">
            <a class="product-item-link">
              <img class="product-img" src="<?= $result['img'] ?>">
              <p class="product-font1"><?= $result['name'] ?></p>
              <p class="product-font2">สินค้าหมด</p>
            </a>
          </div>
      <?php

        }
      } ?>
    </div>
  </div>

  <div class="banner-add">
    <div class="banner-add-home">
      <img class="banner-add-img" src="/pic/b2.png">
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

<script>
  setTimeout(function() {
    window.location.href = "index.php";
    window.clearTimeout;
  }, 60000);
</script>

<script src="script.js"></script>
<script>
  function changeLanguage(lang) {

    const heading = document.getElementById('heading');
    const heading1 = document.getElementById('heading1');
    const heading2 = document.getElementById('heading2');
    const heading3 = document.getElementById('heading3');
    const heading_points = document.getElementById('heading_points');


    const index_language = document.getElementById('index_language');

    if (lang === 'th') {

      heading.innerText = 'สาขา BU123';
      heading1.innerText = '1.เลือกรายการสินค้า';
      heading2.innerText = '2.เลือกวิธีชำระเงิน';
      heading3.innerText = '3.รับสินค้า';
      heading_points.innerText = 'คะเเนนสะสม';

      index_language.innerText = 'ภาษา';


    } else if (lang === 'en') {

      heading.innerText = 'Branch BU123';
      heading1.innerText = '1.Select products';
      heading2.innerText = '2.Choose payment';
      heading3.innerText = '3.Pick up';
      heading_points.innerText = 'Points';

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

</html>