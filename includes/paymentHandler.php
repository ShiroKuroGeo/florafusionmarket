<?php

class paymentHandler{
  private  $apiKey;
  private $currency;
  private $refKey;

  public function __construct($apiKey, $currency, $refKey){
    $this->apiKey = $apiKey;
    $this->currency = 'PHP';

    // Generate REF_KEY
    $randomNumber = rand(1000,9999);
    $stringPrefix = 'CREDITS';
    $this->refKey = 'REF_' . $stringPrefix . $randomNumber;
  }

  public function purschaseData(){
    return "INSERT INTO `purchases`(`customer_id`, `product_id`, `purchase_name`, `description`, `payment_method`, `checkout_url`, `amount`, `status`, `purchase_date`) VALUES (?,?,?,?,?,?,?,?,?)";
  }

  public function createCheckoutSession(){
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://api.paymongo.com/v1/checkout_sessions",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode([
        'data' => [
            'attributes' => [
                    'send_email_receipt' => false,
                    'show_description' => true,
                    'show_line_items' => true,
                    'line_items' =>[
                      [
                        'currency' => $instance->currency,
                        'amount' => $amount,
                        'description' => $resquest->description,
                        'name' => $resquest->purchase_name,
                        'quantity' => 1,
                      ]
                    ],
                    'payment_method_type' =>[$request->payment_method],
                    'reference_number' =>$instance->refKey,
                    'description' => $request->description,
            ]
        ]
      ]),
      CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "accept: application/json",
        "Authorization : Bearer" . $this->apiKey
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      // header('Content-Type: application/json');
      echo $response;
    }
      }
}

// $apiKey = 'sk_test_zJ2yjz7J9ypr1tbgx8uPXfAk'; // Replace with your actual Paymongo API key

// $curl = curl_init();

// curl_setopt_array($curl, [
//   CURLOPT_URL => "https://api.paymongo.com/v1/checkout_sessions",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => json_encode([
//     'data' => [
//       'attributes' => [
//         'send_email_receipt' => false,
//         'show_description' => true,
//         'show_line_items' => true,
//         'line_items' => [
//           [
//             'currency' => $instance ->currency,
//             'amount' => $amount,
//             'description' => $request->description,
//             'name' => $request->name,
//             'quantity' => 1,
//           ]
//         ],
//         'payment_method_type' =>[$request->payment_method],
//         'reference_'
//       ]
//     ]
//   ]),
//   CURLOPT_HTTPHEADER => [
//     "Content-Type: application/json",
//     "accept: application/json",
//     "Authorization: Bearer " . $apiKey
//   ],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   header('Content-Type: application/json');
//   echo $response;
// }


