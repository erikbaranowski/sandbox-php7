<?php

namespace src\Guzzle;

require __DIR__ . "/../../vendor/autoload.php";
use GuzzleHttp\Client;

class GuzzleHelper {

    protected $guzzleClient;

    /**
     * Constructor, initialize properties.
     *
     * @param options array of GuzzleHttp\Client options
     * 
     * @throws none
     * @return none
     */ 
    function __construct($options = null) {
        // Use options if they are passed in, otherwise set using default.
        $clientOptions = $options;
        if (is_null($clientOptions)) {
            $clientOptions = [
                'timeout'  => 2.0,
            ];
        }

        // Initialize guzzle Client
        $this->guzzleClient = new Client($clientOptions);
    }

    /**
     * Makes a GET request to the specified url.
     *
     * @param string  $url  The url to make a GET request to
     * 
     * @throws none
     * @return array containing response (GuzzleHttp\Psr7\Response) and responseDescription (string)
     */ 
    public function makeGetRequest($url) {
        // Ping the url with a GET request and check the response
        $responseDescription = "FAILED using Guzzle to call {$url}!";
        try {
            $response = $this->guzzleClient->request("GET", $url);
            if ($response->getStatusCode() == 200) {
                $responseDescription = "SUCCESS using Guzzle to call {$url}!";
            }
        }
        catch (\Exception $e) {
            $responseDescription = "PHP Exception caught using Guzzle to call {$url}! " . $e->getMessage();
        }

        return [
            "response" => $response,
            "responseDescription" => $responseDescription,
        ];
    }
}

?>