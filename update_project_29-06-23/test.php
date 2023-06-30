<!DOCTYPE html>
<html>
<head>
    <title>Send Data to Flask Server</title>
</head>
<body>
    <h1>Send Data to Flask Server</h1>
    <form method="post" action="">
        <input type="hidden" name="message" value="coin">
        <input type="hidden" name="message2" value="servo1">
        <input type="hidden" name="message3" value="close">
        <button type="submit" name="coin">coin</button>
        <button type="submit" name="close">close</button>
	<button type="submit" name="servo">servo</button>
    </form>

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
	}
	if (isset($_POST['servo'])) {
        // Data to send
        $data = array(
            'message' => $_POST['message2']
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
}
    if (isset($_POST['close'])) {
        // Data to send
        $data = array(
            'message' => $_POST['message3']
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
        // Check for cURL errors
        // Check for cURL errors
        if ($response === false) {
            $error = curl_error($curl);
            echo 'cURL error: ' . $error;
        } else {
            // Display the Flask server's response
            echo 'Response from Flask server: ' . $response;
        }

        // Close cURL
        curl_close($curl);
    }
    ?>
</body>
</html>
