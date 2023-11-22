<?php
$recepient = 'Recepient phone number(254712345678)';
$message = "Please subscribe to my channel";

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.mobitechtechnologies.com/sms/sendsms',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING =>'',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 15,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
        "mobile": "'.$recepient.'",
        "response_type": "json",
        "sender_name": "22136", 
        "service_id": 0,
        "message": "'.$message.'"
    }',
    CURLOPT_HTTPHEADER => array(
        'h_api_key: YOUR_API_KEY',
        'Content-Type: application/json'
    )
));
$response = curl_exec($curl);
curl_close($curl);

$trim = trim($response, '[]');
$decode = json_decode($trim, true);
$status_code = $decode['status_code'];
$status_desc = $decode['status_desc'];
$mobile_number = $decode['mobile_number'];

echo 'Message status: ' . $status_desc . ' -> Sent to: ' . $mobile_number ;
