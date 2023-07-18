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
