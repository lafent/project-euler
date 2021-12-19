<?php
namespace ProjectEuler\Tests;

use PHPUnit\Framework\TestCase;
use SmartsheetApi\SmartsheetClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class BaseUnitTest extends TestCase
{
    private $handlers = [];

    public function setUp() : void
    {
    }

    public function testBaseUnitTest() : void
    {
        $value = 1;

        $this->assertEquals(1, $value);
    }
}
