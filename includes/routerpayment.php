<?php 
require_once ('paymentHandler.php');

$apiKey = 'sk_test_zJ2yjz7J9ypr1tbgx8uPXfAk';

$paymongo = new paymentHandler($apiKey);
$response = $paymongo->createCheckoutSession();



header('Content-Type: application/json');
echo $respons;