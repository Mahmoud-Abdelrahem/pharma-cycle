<?php
require "./stripe/init.php";

$publishableKey ="pk_test_51PVJF204OGesDAKc7D7jIewCDVsvar5qBorbpe4tIFQQDLjforSWD7ATjx3zFtEI9Q1N1IrQJbJ0QldDwPDnKkTA00bdNKhoO9";

$secretKey ="sk_test_51PVJF204OGesDAKctvubLDmlsDyytd94jji91O5E9KSJoSsnWSFG1r7entbArSxLVZwoYfcCyHdGwgnWEXRMsfy300Qq5XdjoG";

\Stripe\Stripe::setApiKey($secretKey);
?>
