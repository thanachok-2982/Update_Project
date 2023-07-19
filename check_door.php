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
    <div id="data-container"></div>

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
