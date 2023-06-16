<?php 
 include_once('dbConfig.php');
 $bu = $_GET['bu'];
 $u_id = isset($_GET['u_id']);
 $query = mysqli_query($db,"SELECT * FROM vm_info WHERE vm_id = '$bu'");
 $vm_name = mysqli_fetch_array($query);
 $product = 0;
 $sensor1 = exec("python /var/www/html/sensor1.py");
 echo $sensor1;
 $sensor2 = exec("python /var/www/html/sensor2.py");
 echo $sensor2;
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

          
            <div class="text">
              <p>2.เลือกวิธีชำระเงิน</p>
            </div>
          

          <div class="icon">
            <i class="fa-solid fa-circle-chevron-right"></i>
          </div>

          
            <div class="text">
              <p>3.รับสินค้า</p>
            </div>
          
        </div>

        <div class="point-text">
          <a class="logo-point" href="/phone_points.php?bu=<?=$bu?>">คะเเนนสะสม</a>
        </div>
      </div>
    </div>
   
  <div class="container">
      <div class="product">
        
        <?php 
        $sql = mysqli_query($db,"SELECT * FROM vm_info WHERE vm_id ='$bu'");
        $vm =mysqli_fetch_array($sql);
        $query = mysqli_query($db,"SELECT * FROM product");
        
        while($result = mysqli_fetch_array($query)){
        ?>
        <?php 
        $product++;
        
         if($product == 1){
          $p = $vm['product1'];
         }else if($product == 2){
          $p = $vm['product2'];
         }else if ($product == 3){
          $p = $vm['product3'];
         }
         if($sensor1 == '0'){
        ?>
        <div class="product-item" >
            <?php if($u_id == ''){
            ?>
            <a class="product-item-link" href="/pay.php?bu=<?=$bu?>&id=<?=$result['p_id'] ?>">
            <?php } else if($u_id != ''){?>
              <a class="product-item-link" href="/pay.php?bu=<?=$bu?>&id=<?=$result['p_id']?>&u_id=<?=$u_id?>">
              <?php }?>
              <img class="product-img" src="<?=$result['img']?>" >
              <p class="product-font1"><?=$result['name']?></p>
              <p class="product-font2"><?=$result['p_price']?>฿</p>
            </a>
        </div>

	<?php }else if($sensor1 == '1' && $product == '1' ){ ?>
          <div class="product-item" >
            <a class="product-item-link">
              <img class="product-img" src="<?=$result['img']?>" >
              <p class="product-font1"><?=$result['name']?></p>
              <p class="product-font2">สินค้าหมด</p>
            </a>
	</div>

	<?php 
	 }
	    if($sensor2 =='0'){
        ?>
        <div class="product-item" >
            <?php if($u_id == ''){
            ?>
            <a class="product-item-link" href="/pay.php?bu=<?=$bu?>&id=<?=$result['p_id'] ?>">
            <?php } else if($u_id != ''){?>
              <a class="product-item-link" href="/pay.php?bu=<?=$bu?>&id=<?=$result['p_id']?>&u_id=<?=$u_id?>">
              <?php }?>
              <img class="product-img" src="<?=$result['img']?>" >
              <p class="product-font1"><?=$result['name']?></p>
              <p class="product-font2"><?=$result['p_price']?>฿</p>
            </a>
        </div>

	<?php }else if($sensor2 == '1' && $product == '2'){ ?>
          <div class="product-item" >
            <a class="product-item-link">
              <img class="product-img" src="<?=$result['img']?>" >
              <p class="product-font1"><?=$result['name']?></p>
              <p class="product-font2">สินค้าหมด</p>
            </a>
        </div>
        <?php

        }}?>
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
  window.location.href="index.php";
  window.clearTimeout;
}, 60000);
</script>
    
</body>
</html>
