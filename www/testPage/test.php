<?php

require __DIR__ . "/../../vendor/autoload.php";
use GuzzleHttp\Client;

// Initialize guzzle Client
$client = new Client([
    'timeout'  => 2.0,
]);

// Ping google and check response
$displayString = "FAILED using Guzzle to ping google!";
try {
    $response = $client->request('GET', 'www.google.com/test');
    if ($response->getStatusCode() == 200) {
        $displayString = "SUCCESS using Guzzle to ping google!";
    }
}
catch (Exception $e) {
    $displayString = "PHP Exception caught using Guzzle to ping google! " . $e->getMessage();
}

include "test.html";

?>