<?php 
 include_once('dbConfig.php');
 $bu = $_GET['bu'];
 $product = 0;
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
          <a class="logo-header-text"  href="index.php">สาขา BU229</a>
          <a href="admin_login.php">
              <img src="pic/logo.png" class="logo-header-img">
          </a>
      </div>
    </header>

    <nav>
        <div class="nav-bg">
            <div class="nav-stock">
              <div class="nav-table">
                <div class="table-stock">
                  <table>
                    <tr>
                    <th>รหัสสินค้า</th>
                    <th>รูปสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคาสินค้า</th>
                    <th>จำนวนสต๊อก</th>
                    </tr>

                    
                    
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
                    if($p !='0'){
                    ?>
                   
                        
                          <tr>
                          <td><?=$result['p_id']?></td>
                          <td><img class="img-product-stock" src="<?=$result['img']?>"></td>
                          <td><?=$result['name']?></td>
                          <td><?=$result['p_price']?></td>
                          <td><?=$p ?></td>
                          </tr>

                    <?php }else if($p == '0'){ ?>
                      
                          <tr>
                          <td><?=$result['p_id']?></td>
                          <td><img class="img-product-stock" src="<?=$result['img']?>"></td>
                          <td><?=$result['name']?></td>
                          <td><?=$result['p_price']?></td>
                          <td>สินค้าหมด</td>
                    </tr>
                    
                    <?php

                    }}?>
                    

                  

                  </table>
                </div>
              </div>

              <div class="nav-button-addstock">
                <div class="button-login">
                  <div class="button-login-bg2">
                      <a class="text-button-login" href="admin_addstock.php?bu=<?=$bu?>">เพิ่มสินค้า</a>
                  </div>
                </div>
              </div>

              <hr>

              <div class="button-left-right">
                <div class="button-left">
                    
                </div>
    
                <div class="button-right">
                    <div class="button-right-bg">
                      <a class="button-all-text" href="admin_login.php">ออกจากระบบ</a>
                    </div>
                </div>
              </div>
                

            </div>
        </div>

    </nav>

  </body>