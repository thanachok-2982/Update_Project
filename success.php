<?php 
 include_once('dbConfig.php');
 $price = $_GET['price'];
 $id = $_GET['id'];
 $bu = $_GET['bu'];
 $u_id = $_GET['u_id'];
 $method = $_GET['method'];
 $query = mysqli_query($db,"SELECT * FROM product WHERE p_id = '$id'");
 $result = mysqli_fetch_array($query);
 $query = mysqli_query($db,"SELECT * FROM vm_info  WHERE vm_id = '$bu'");
 $vm_name = mysqli_fetch_array($query);
 $p1 = $vm_name['product1']-1;
 $p2 = $vm_name['product2']-1;
 $p3 = $vm_name['product3']-1;
 $query = mysqli_query($db,"SELECT * FROM user WHERE u_id = '$u_id'");
 $sss = mysqli_fetch_array($query);
 
 $sql = "INSERT INTO `order_his`(`price`, `u_id`, `p_id`, `method`) VALUES ('$price','$u_id','$id','$method')";
 mysqli_query($db,$sql);

 if($id ==1){
  $query = mysqli_query($db,"UPDATE vm_info SET product1 ='$p1' WHERE vm_id = '$bu'");
 } else if ($id == 2){
  $query = mysqli_query($db,"UPDATE vm_info SET product2 ='$p2' WHERE vm_id = '$bu'");
 }else if ($id == 3){
  $query = mysqli_query($db,"UPDATE vm_info SET product3 ='$p3' WHERE vm_id = '$bu'");
 }

 if($method == 'points'){
  $num = $sss['points'] - $price;
  $query = mysqli_query($db,"UPDATE user SET points = '$num' WHERE u_id = '$u_id'");

 } else if ($method == 'credit'){
  $num = $sss['balance'] - $price;
  $query = mysqli_query($db,"UPDATE user SET balance = '$num' WHERE u_id = '$u_id'");
 }
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
          <a class="logo-header-text"  href="/index.php">สาขา <?=$vm_name['vm_name']?></a>
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
              <p>1.เลือกรายการสินค้า</p>
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

          <div class="text-bg">
            <div class="text">
              <p>3.รับสินค้า</p>
            </div>
          </div>
        </div>

        <div class="point-text">
          <a class="logo-point" href="/phone_points.php?bu=<?=$bu?>">คะเเนนสะสม</a>
        </div>
      </div>
    </div>

    <div class="container-all">
        <div class="container-all-back-closed">
            <div class="container-all-back">
                
            </div>

            
        </div>

        <div class="container-product-text">
            <div class="container-text">
                <p class="text-product-all">เสร็จสิ้น</p>
            </div>

            <div class="container-text-icon">
                <div class="container-icon-bg-green">
                    <div class="icon-bg">
                        <img src="/pic/check.png" class="icon-loading" >
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
      <script>

setTimeout(function () {
  window.location.href="thankyou.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$price?>&u_id=<?=$u_id?>";
}, 2000);
</script>

  </body>
</html>