from flask import Flask, request, jsonify
import requests

app = Flask(__name__)

@app.route('/test', methods=['POST'])
def test():
    # Get the request data as a JSON object
    req_data = request.get_json()

    # Set the URL for the PHP web app
    url = 'localhost/test1.php'

    # Send the POST request to the PHP web app
    response = requests.post(url, data=req_data)

    # Check if the request was successful
    if response.ok:
        # Parse the returned data as a JSON object
        responseData = response.json()

        # Return the data as a JSON response from the Python API
        return jsonify(responseData)
    else:
        # Return an error response
        return jsonify({'error': 'Request failed'}), response.status_code

if __name__ == '__main__':
    app.run(debug=True)
