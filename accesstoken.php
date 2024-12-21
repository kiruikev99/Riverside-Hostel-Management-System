<?php
// MPESA API KEYS
$consumerKey = "cXiQamwG9O6gQqi9ltDViR4Q9Cu0B0Y1"; // Fill with your app Consumer Key
$consumerSecret = "tSp8Y7k5dAe9CsBi"; // Fill with your app Consumer Secret

// ACCESS TOKEN URL
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$headers = ['Content-Type:application/json; charset=utf8'];

$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// Log responses and errors for debugging
$log_file = 'access_token_log.txt';

if ($status == 200) {
    $result = json_decode($result);
    if (isset($result->access_token)) {
        $access_token = $result->access_token;
        file_put_contents($log_file, date('Y-m-d H:i:s') . " - Access token obtained: " . $access_token . "\n", FILE_APPEND);
    } else {
        // Handle the case where the access token is not present in the response
        $error_message = 'Error: Access token not found in the response';
        echo $error_message;
        file_put_contents($log_file, date('Y-m-d H:i:s') . " - " . $error_message . "\n", FILE_APPEND);
        file_put_contents($log_file, date('Y-m-d H:i:s') . " - Response: " . print_r($result, true) . "\n", FILE_APPEND);
    }
} else {
    // Handle the error and print the status code and response
    $error_message = 'Error: Failed to obtain access token. HTTP Status Code: ' . $status;
    echo $error_message;
    file_put_contents($log_file, date('Y-m-d H:i:s') . " - " . $error_message . "\n", FILE_APPEND);
    file_put_contents($log_file, date('Y-m-d H:i:s') . " - Response: " . print_r($result, true) . "\n", FILE_APPEND);
}

curl_close($curl);
?>
