<?php
include ("dbconnect.php");
include 'accesstoken.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $phone = $_POST["mpesanum"];

      // Validation
      $errors = array();
      if (strlen($fname) < 5) {
          $errors[] = "First Name must be at least 5 characters long.";
      }
      if (preg_match('/\d/', $fname)) {
          $errors[] = "First Name must not contain numbers.";
      }
      if (strlen($lname) < 5) {
          $errors[] = "Last Name must be at least 5 characters long.";
      }
      if (preg_match('/\d/', $lname)) {
          $errors[] = "Last Name must not contain numbers.";
      }
  
  
      // Remove any spaces or hyphens in the phone number
      $phone = str_replace(array(' ', '-'), '', $phone);
  
      // If the phone number starts with '0', replace '0' with '254'
      if (substr($phone, 0, 1) == '0') {
          $phone = '254' . substr($phone, 1);
      }
  
      // If the phone number starts with '7', add '254' at the beginning
      if (substr($phone, 0, 1) == '7') {
          $phone = '254' . $phone;
      }
  
      // Ensure the phone number is 12 digits long (international format)
      if (strlen($phone) != 12) {
          $errors[] = "Invalid phone number format.";
      }
  
      if (count($errors) > 0) {
          echo '<script>';
          foreach ($errors as $error) {
              echo "Swal.fire('Error', '$error', 'error');";
          }
          echo '</script>';
      } else {
          // Proceed with STK push
          date_default_timezone_set('Africa/Nairobi');
          $processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
          $callbackurl = 'https://2327-105-163-0-210.ngrok-free.app/Riverside-Hostel-Management-System/MPESA/callback.php'; // Replace with your active ngrok URL
          $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
          $BusinessShortCode = '174379';
          $Timestamp = date('YmdHis');
          $Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
          $PartyA = $phone;
          $PartyB = $BusinessShortCode;
          $AccountReference = 'RIVERSIDE HOSTELS';
          $TransactionDesc = 'Room Booking';
          $Amount = '1';
          $stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
  
          $curl_post_data = array(
              'BusinessShortCode' => $BusinessShortCode,
              'Password' => $Password,
              'Timestamp' => $Timestamp,
              'TransactionType' => 'CustomerPayBillOnline',
              'Amount' => $Amount,
              'PartyA' => $PartyA,
              'PartyB' => $BusinessShortCode,
              'PhoneNumber' => $PartyA,
              'CallBackURL' => $callbackurl,
              'AccountReference' => $AccountReference,
              'TransactionDesc' => $TransactionDesc
          );
  
          $data_string = json_encode($curl_post_data);
  
          // Initiate CURL
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
          curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
          $curl_response = curl_exec($curl);
          $curl_error = curl_error($curl);
  
          if ($curl_response === false) {
              echo '<script>alert ("Error", "CURL Error: ' . $curl_error . '", "error");</script>';
          } else {
              $data = json_decode($curl_response);
              if ($data->ResponseCode == "0") {
                  $query = "INSERT INTO twobedroomhostel (`FirstName`, `LastName`, Gender, NumberPaid) VALUES (?, ?, ?, ?)";
                  $stmt = mysqli_prepare($conn, $query);
  
                  if ($stmt) {
                      mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $gender, $phone);
                      if (mysqli_stmt_execute($stmt)) {
                          echo '<script type="text/javascript">
                          Swal.fire({
                              title: "STK PUSH SUCCESS!",
                              text: "Please Enter Your MPESA Pin To Complete Booking",
                              icon: "success",
                              confirmButtonText: "OK"
                          }).then(function() {
                              window.location.href = "riverside.php";
                          });
                                </script>';
                      } else {
                          echo "Error: " . mysqli_error($conn);
                      }
                      mysqli_stmt_close($stmt);
                  } else {
                      echo "Error: " . mysqli_error($conn);
                  }
                  mysqli_close($conn);
              } else {
                  echo '<script>Swal.fire("Error", "STK Push Failed. Response: ' . $data->errorMessage . '", "error");</script>';
              }
          }
          curl_close($curl);
      }
  }
  ?>