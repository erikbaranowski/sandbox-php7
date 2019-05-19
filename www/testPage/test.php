<?php

require __DIR__ . "/../../vendor/autoload.php";
use GuzzleHttp\Client;

$displayString1 = testURL("www.google.com");
$displayString2 = testURL("www.google.com/failTest");
include "test.html";

/**
 * Makes a GET request to the specified url.
 *
 * @param string  $url  The url to make a GET request to
 * 
 * @throws none
 * @return resultString
 */ 
function testURL($url) {
    // Initialize guzzle Client
    $client = new Client([
        'timeout'  => 2.0,
    ]);

    // Ping the url with a GET request and check the response
    $resultString = "FAILED using Guzzle to ping {$url}!";
    try {
        $response = $client->request("GET", $url);
        if ($response->getStatusCode() == 200) {
            $resultString = "SUCCESS using Guzzle to ping {$url}!";
        }
    }
    catch (Exception $e) {
        $resultString = "PHP Exception caught using Guzzle to ping {$url}! " . $e->getMessage();
    }

    return $resultString;
}

?>