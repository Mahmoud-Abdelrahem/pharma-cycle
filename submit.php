<?php
include "./app/config.php";
require __DIR__ . "/vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['item_id'])) {
        $item_id = $_POST['item_id'];

        $select = "SELECT * FROM stock where id = $item_id";
        $s = mysqli_query($conn, $select);
        $row = mysqli_fetch_assoc($s);
    }
}

$stripe_secret_key = "sk_test_51PVJF204OGesDAKctvubLDmlsDyytd94jji91O5E9KSJoSsnWSFG1r7entbArSxLVZwoYfcCyHdGwgnWEXRMsfy300Qq5XdjoG";
\Stripe\Stripe::setApiKey($stripe_secret_key);

$price_in_EGP = intval($row['price'] * 100);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/pharam-Cycle/stock.php",
    "cancel_url" => "http://localhost/pharam-Cycle/stock.php",
    "locale" => "auto",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "unit_amount" => $price_in_EGP,
                "currency" => "EGP",
                "product_data" => [
                    "name" => $row['name'],
                    "description" => $row['description']
                ],
            ],
        ],
    ],
]);

http_response_code(303);
header("Location: " . $checkout_session->url);