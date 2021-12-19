<?php
namespace ProjectEuler\Tests;

use PHPUnit\Framework\TestCase;
use SmartsheetApi\SmartsheetClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class ProblemsUnitTest extends TestCase
{
    public function testProblemOneSolution() : void
    {
        $max_count = 10;
        $solution = 0;

        for ($i = 1; $i < $max_count; $i++) {
            if ($i % 3 === 0 || $i % 5 === 0) {
                $solution += $i;
            }
        }

        $this->assertEquals(23, $solution);
    }
}
