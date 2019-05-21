<?php

require __DIR__ . "/../../vendor/autoload.php";
use src\Guzzle\GuzzleHelper;

$guzzleHelper = new GuzzleHelper();

$response = $guzzleHelper->makeGetRequest("www.google.com");
$displayString1 = $response["responseDescription"];

$response = $guzzleHelper->makeGetRequest("www.google.com/failTest");
$displayString2 = $response["responseDescription"];

include "test.html";

?>