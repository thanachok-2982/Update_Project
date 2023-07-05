<?php
$test = isset($_GET['test']);
if($test == 1){
$data = array( 
    'message' => 'coin'
);

$url = 'http://localhost:5000/receive';

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($curl);
$test = 2;
}
?>

<script>
      let prevData = null;
      /* USE COIN  */
      function table() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          let responseText = this.responseText;
          let test = JSON.parse(responseText);
          if (JSON.stringify(test) !== JSON.stringify(prevData)) {


            if(parseInt(test) == 1){
	 window.location.href = "true_coin.php?test=1";	    }              	 
                  
          }
          prevData = test;
        }
        xhttp.open("GET", "coin.php");
        xhttp.send();
      }

      setInterval(function() {
        table();
      }, 1000);
    </script>
