<?php

namespace src\Guzzle;

require __DIR__ . "/../../vendor/autoload.php";
use GuzzleHttp\Client;

class GuzzleHelper {

    protected $guzzleClient;
    protected $guzzleClientOptions;

    /**
     * Constructor - initialize properties.
     *
     * @param options array of GuzzleHttp\Client options
     * 
     * @throws none
     * @return none
     */ 
    function __construct($options = null) {
        // Use options if they are passed in, otherwise set using default.
        $this->guzzleClientOptions = $options;
        if (is_null($this->guzzleClientOptions)) {
            $this->guzzleClientOptions = [
                'timeout'  => 2.0,
            ];
        }
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
        $responseDescription = "";
        try {
            $client = $this->getGuzzleClient();
            $response = $client->request("GET", $url);
            if ($response->getStatusCode() == 200) {
                $responseDescription = "SUCCESS using Guzzle to call {$url}!";
            } else {
                $responseDescription = "FAILED using Guzzle to call {$url}!";
            }
        }
        catch (\Exception $e) {
            $response = null;
            $responseDescription = "PHP Exception caught using Guzzle to call {$url}! " . $e->getMessage();
        }

        return [
            "response" => $response,
            "responseDescription" => $responseDescription,
        ];
    }

    /**
     * Lazy load an instance of a GuzzleHttp\Client.
     *
     * @param array  $clientOptions  The constructor params
     * 
     * @throws none
     * @return Client GuzzleHttp\Client
     */ 
    protected function getGuzzleClient() {
        if (!is_a($this->guzzleClient, Client::class)) {
            $this->guzzleClient = $this->createGuzzleClient();
        }
        return $this->guzzleClient;
    }

    /**
     * Instantiate an instance of a GuzzleHttp\Client. Broken out for unit testing.
     *
     * @codeCoverageIgnore
     * @param array  $clientOptions  The constructor params
     * 
     * @throws none
     * @return Client GuzzleHttp\Client
     */ 
    protected function createGuzzleClient() {
        return new Client($this->guzzleClientOptions);
    }
}

?>