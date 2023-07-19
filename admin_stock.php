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
      <a class="logo-header-text" href="index.php">สาขา BU229</a>
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
              $sql = mysqli_query($db, "SELECT * FROM vm_info WHERE vm_id ='$bu'");
              $vm = mysqli_fetch_array($sql);
              $query = mysqli_query($db, "SELECT * FROM product");

              while ($result = mysqli_fetch_array($query)) {
              ?>
                <?php
                $product++;

                if ($product == 1) {
                  $p = $vm['product1'];
                } else if ($product == 2) {
                  $p = $vm['product2'];
                } else if ($product == 3) {
                  $p = $vm['product3'];
                }
                if ($p != '0') {
                ?>


                  <tr>
                    <td><?= $result['p_id'] ?></td>
                    <td><img class="img-product-stock" src="<?= $result['img'] ?>"></td>
                    <td><?= $result['name'] ?></td>
                    <td><?= $result['p_price'] ?></td>
                    <td><?= $p ?></td>
                  </tr>

                <?php } else if ($p == '0') { ?>

                  <tr>
                    <td><?= $result['p_id'] ?></td>
                    <td><img class="img-product-stock" src="<?= $result['img'] ?>"></td>
                    <td><?= $result['name'] ?></td>
                    <td><?= $result['p_price'] ?></td>
                    <td>สินค้าหมด</td>
                  </tr>

              <?php

                }
              } ?>




            </table>
          </div>
        </div>

        <div class="nav-door">
          <p class="text-door">สถานะประตูตู้จำหน่ายสินค้า</p>
<div id="data-container">
          <div class="door-status">
            <div class="text-status">
              <h4>สถานะ : </h4>
              <h4 style="color: #e63946;">ประตูปิดอยู่</h4>
              <h4 style="color: #55a630;">ประตูเปิดอยู่</h4>
	    </div>
	</div>
            <form method="post" action="">
	<input type="hidden" name="message" value="open">
            <div class="button-open">
              
		<button type="submit" name="coin" class="open-door">เปิดประตู</button>
            </div>
            </form>
          </div>
        </div>
	      <?php
        if (isset($_POST['coin'])) {
        // Data to send
        $data = array(
            'message' => $_POST['message']
        );

        // URL of the Flask server
        $url = 'http://localhost:5000/receive';

        // Initialize cURL
        $curl = curl_init($url);

        // Set cURL options
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        // Send the request and store the response
        $response = curl_exec($curl);
	curl_close($curl);

	}
		?>
      
        <div class="nav-button-addstock01">
          <div class="button-login">
            <div class="button-login-bg2">
              <a class="text-button-login" href="admin_addstock.php?bu=<?= $bu ?>">เพิ่มสินค้า</a>
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
<!DOCTYPE html>
<html>
<head>
    <title>Real-time Data Display</title>
<style>
        /* Add your CSS styles here */
        #data-container {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            border: 2px solid #ccc;
            background-color: #f9f9f9;
        }

        /* Custom styles for Text 1 */
        #data-container.text1 {
            color: #e63946; /* Change color to your preference for Text 1 */
        }

        /* Custom styles for Text 2 */
        #data-container.text2 {
            color: #55a630; /* Change color to your preference for Text 2 */
        }

        /* Custom styles for the error message */
        #data-container.error {
            color: red;
        }
    </style>
</head>
<body>

    <script>
        function fetchData() {
            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Set up the AJAX request
            xhr.open('GET', 'door.txt', true);

            // Define the function to handle the response
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Get the data received from the file
                        var data = xhr.responseText.trim();

                        // Display the appropriate text based on the data
                        if (data === '1') {
                            document.getElementById('data-container').innerText = 'ประตูปิดอยู่';
                            document.getElementById('data-container').className = 'text1'; // Apply Text 1 styles
                        } else if (data === '0') {
                            document.getElementById('data-container').innerText = 'ประตูเปิดอยู่';
                            document.getElementById('data-container').className = 'text2'; // Apply Text 2 styles
                        } else {
                            // If the data is neither 0 nor 1, display an error message
                            document.getElementById('data-container').innerText = 'Invalid Data';
                            document.getElementById('data-container').className = 'error'; // Apply error styles
                        }
                    }
                }
            };

            // Send the AJAX request
            xhr.send();
        }

        // Fetch the data initially when the page loads
        fetchData();

        // Periodically fetch the data every 2 seconds (adjust the interval as needed)
        setInterval(fetchData, 2000);
    </script>
</body>
</html>
</body>





