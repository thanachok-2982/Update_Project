<?php 
 include_once('dbConfig.php');
 $bu = isset($_GET['bu']);
 if($bu == ""){
 $bu = 1;
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vending Machine</title>
    <link rel="icon" href="/pic/logo-title1.png" type="image/icon type">

    <link href="/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
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

    <div class="text-container-title">
        <div class="text-title">
            <h1>" Touch to Start "</h1>
            <h1>กรุณากดหน้าจอเพื่อสั่งสินค้า</h1>
        </div>
      
        <div class="button-title">
            <a class="button-title-pay" href="/home.php?bu=<?=$bu?>" > สั่งซื้อสินค้า </a>
            <a class="button-title-point" href="/phone_points.php?bu=<?=$bu?>" > คะเเนนสะสม </a>
        </div>
    </div>

   
    
  
</body>
</html>