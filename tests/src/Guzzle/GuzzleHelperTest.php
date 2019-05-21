<?php

namespace tests\src\Guzzle;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use src\Guzzle\GuzzleHelper;

class GuzzleHelperTest extends TestCase
{
    protected const TEST_URL = "www.something.com";
    protected const SUCCESS = 200;
    protected const SERVER_ERROR = 500;

    protected $mockClient;
    protected $mockResponse;
    protected $mockGuzzleHelper;


    protected function setUp(): void {
        $this->mockResponse = $this->getMockBuilder("GuzzleHttp\Psr7\Response")
            ->disableOriginalConstructor()
            ->setMethods(['getStatusCode'])
            ->getMock();

        $this->mockClient = $this->getMockBuilder("GuzzleHttp\Client")
            ->disableOriginalConstructor()
            ->setMethods(['request'])
            ->getMock();
        $this->mockClient->method('request')->willReturn($this->mockResponse);

        $this->mockGuzzleHelper = $this->getMockBuilder("src\Guzzle\GuzzleHelper")
            ->setConstructorArgs([])
            ->setMethods(['createGuzzleClient'])
            ->getMock();
        $this->mockGuzzleHelper->method('createGuzzleClient')->willReturn($this->mockClient);
    }

    protected function tearDown(): void {
        
    }

    public function testMakeGetRequestSuccess()
    {
        $this->mockClient->method('request')->willReturn($this->mockResponse);
        $this->mockResponse->method('getStatusCode')->willReturn(self::SUCCESS);
        $result = $this->mockGuzzleHelper->makeGetRequest(self::TEST_URL);
        $expectedString = "SUCCESS using Guzzle to call " . self::TEST_URL . "!";
        $this->assertSame($expectedString, $result["responseDescription"]);
        $this->assertSame(self::SUCCESS, $result["response"]->getStatusCode());
    }

    public function testMakeGetRequestFail()
    {
        $this->mockClient->method('request')->willReturn($this->mockResponse);
        $this->mockResponse->method('getStatusCode')->willReturn(self::SERVER_ERROR);
        $result = $this->mockGuzzleHelper->makeGetRequest(self::TEST_URL);
        $expectedString = "FAILED using Guzzle to call " . self::TEST_URL . "!";
        $this->assertSame($expectedString, $result["responseDescription"]);
        $this->assertSame(self::SERVER_ERROR, $result["response"]->getStatusCode());
    }

    public function testMakeGetRequestException()
    {
        $exceptionText = "Exception!";
        $this->mockClient->method('request')->will($this->throwException(new \Exception($exceptionText)));
        $result = $this->mockGuzzleHelper->makeGetRequest(self::TEST_URL);
        $expectedString = "PHP Exception caught using Guzzle to call " . self::TEST_URL . "! " . $exceptionText;
        $this->assertSame($expectedString, $result["responseDescription"]);
        $this->assertNull($result["response"] ?? null);
    }
}
