<?php
include_once('dbConfig.php');
$bu = $_GET['bu'];
$product = 0;
$sql = mysqli_query($db, "SELECT * FROM vm_info WHERE vm_id ='$bu'");
$vm = mysqli_fetch_array($sql);
// $p = array($vm['product1'], $vm['product2'], $vm['product3']);
if (isset($_POST['btn-ok'])) {
  foreach ($_POST['instock'] as $p_id => $value) {
    // Ensure the value is numeric and not negative
    $value = max(0, intval($value));
    
    // Update the in_stock value in the stock table for the specific product and vending machine
    $sql = "UPDATE stock SET in_stock=$value WHERE vm_id=$bu AND p_id=$p_id";
    $result = mysqli_query($db, $sql) or die("Error in query: $sql " . mysqli_error($db));
  }
?>
  <script>
    window.location.href = "admin_stock.php?bu=<?= $bu ?>";
  </script>
<?php
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

  <link href="/style_admin.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <div class="header-container">
      <a class="logo-header-text" href="index.php">สาขา BU229</a>
      <a href="admin_login.php">
        <img src="pic/logo.png" class="logo-header-img">
      </a>
    </div>
  </header>

  <nav>

    <div class="nav-bg">
      <form method="post">
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
                <style>
                  .add-stock .button {
                    width: 20px;
                    height: 20px;
                    border: 1px solid #c6c6c6;
                    border-radius: 10px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 10px;
                    cursor: pointer;
                  }

                  .add-stock .button:active {
                    background: #ccc;
                  }

                  .add-stock input {
                    width: 40px;
                    height: 20px;
                    padding: 5px 10px;
                    border: 1px solid #c6c6c6;
                    border-radius: 5px;
                    font-size: 10px;
                    text-align: center;
                    margin: 0 10px;
                  }
                </style>
                <?php
                $query = mysqli_query($db, "SELECT * FROM product");

                while ($result = mysqli_fetch_array($query)) {
                ?>
                  <?php
                  // $p[$product];
                  $id = $result['p_id'];
                  $smami = mysqli_query($db, "SELECT * FROM stock where vm_id = '$bu' AND p_id = '$id'");
                  $ans = mysqli_fetch_array($smami);


                  ?>


                  <tr>
                    <td><?= $result['p_id'] ?></td>
                    <td><img class="img-product-stock" src="<?= $result['img'] ?>"></td>
                    <td><?= $result['name'] ?></td>
                    <td><?= $result['p_price'] ?></td>
                    <td>
                      <div class="add-stock">

                        <div class="dec button">-</div>
                        <input type="text" name="instock[<?= $result['p_id'] ?>]" value="<?= $ans['in_stock'] ?>" class="input-filed">
                        <div class="inc button">+</div>
                      </div>

                    </td>
                  </tr>



                <?php
                  $product++;
                } ?>


              </table>
            </div>
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
            }

            .button-login-bg1 .button:hover {
              background-color: #3046B1;
            }
          </style>
          <div class="nav-button-addstock">
            <div class="button-login">
              <div class="button-login-bg1">
                <button type="submit" name="btn-ok" class="ok button" value="SAVE">ยืนยันการทำรายการ</button>

              </div>
            </div>
          </div>

          <hr>

          <div class="button-left-right">
            <div class="button-left">
              <div class="button-left-bg">
                <a class="button-all-text" href="admin_stock.php?bu=<?= $bu ?>">ย้อนกลับ</a>
              </div>
            </div>

            <div class="button-right">
              <div class="button-right-bg">
                <a class="button-all-text" href="admin_login.php">ออกจากระบบ</a>
              </div>
            </div>
          </div>


        </div>
      </form>
    </div>

  </nav>



  <script>
    var incrementButton = document.getElementsByClassName('inc');
    var decrementButton = document.getElementsByClassName('dec');
    for (var i = 0; i < incrementButton.length; i++) {
      var button = incrementButton[i];
      button.addEventListener('click', function(event) {
        var buttonClick = event.target;
        var input = buttonClick.parentElement.children[1];
        var inputValue = input.value;
        var newValue = parseInt(inputValue) + 1;
        if (newValue <= 10) {
          input.value = newValue;
        } else {
          alert("CAN NOT BE MORE THEN TEN");
        }

      })
    }

    for (var i = 0; i < decrementButton.length; i++) {
      var button = decrementButton[i];
      button.addEventListener('click', function(event) {
        var buttonClick = event.target;
        var input = buttonClick.parentElement.children[1];
        var inputValue = input.value;
        var newValue = parseInt(inputValue) - 1;
        if (newValue >= 0) {
          input.value = newValue;
        } else {
          alert("CAN NOT BE LESS THEN ZERO");
        }

      })
    }
  </script>
</body>
