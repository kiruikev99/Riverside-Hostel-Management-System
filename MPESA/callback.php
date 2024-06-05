<?php
include 'dbconnect.php';
header("Content-Type: application/json");
$stkCallbackResponse = file_get_contents('php://input');
$logFile = "MpesaResponse.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

  