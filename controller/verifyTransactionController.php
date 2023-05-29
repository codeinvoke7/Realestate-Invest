<?php
require "database/database.php";

$curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/". $_GET['reference'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_57f975015bea0c6cc82150ce78f77f428a03c01d",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $data =json_decode($response, true);
  }
$trans_status = $data['data']['status'];
$status = $data['status'];
$message = $data['message'];
$transactionId = $data['data']['id'];
$reference = $data['data']['reference'];
$amount = $data['data']['amount'];

$user_id = $data['data']['metadata']['custom_fields'][0]['id'];
$firstname = $data['data']['metadata']['custom_fields'][1]['first_name'];
$lastname = $data['data']['metadata']['custom_fields'][2]['last_name'];
$order_id = $data['data']['metadata']['custom_fields'][3]['order_id'];
$email = $data['data']['customer']['email'];

// Output the retrieved values
// echo "Status: " . $status . "<br>";
// echo "Message: " . $message . "<br>";
// echo "Transaction ID: " . $transactionId . "<br>";
// echo "Reference: " . $reference . "<br>";
// echo "Amount: " . $amount . "<br>";
// echo "First Name: " . $firstName . "<br>";
// // Prepare the SQL statement
if($trans_status == 'success'){
$sql = $conn->query("INSERT INTO transaction (user_id, project_id, firstname, lastname, email, ref, `status`, amount, transaction_id) VALUES ($user_id, $order_id, '$firstname', '$lastname', '$email', '$reference', '$status', '$amount', '$transactionId')");
}
// Execute the query
if ($sql === TRUE) {
    echo "Congrats! Transaction successful. You'll be redirected to dashboard";
    header('Refresh:3 /users/dashboard');
} else {
    echo "Error: 'Unsuccessful'";
}