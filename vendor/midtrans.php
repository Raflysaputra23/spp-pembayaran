<?php

require_once dirname(__FILE__) . '/autoload.php'; 

\Midtrans\Config::$serverKey = 'SB-Mid-server-a0FxTb8hSjzGCYIIjkws71HL';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

$data = json_decode(file_get_contents('php://input'), true);
$params = [
    'transaction_details' => [
        'order_id' => rand(),
        'gross_amount' => $data["TotalHarga"],
    ],
    'item-details' => $data["Bulan"],
    'customer_details' => [
        'first_name' => $data["NamaLengkap"],
        'email' => $data["Email"],
        'phone' => $data["Phone"],
    ],
];

echo json_encode(\Midtrans\Snap::getSnapToken($params));