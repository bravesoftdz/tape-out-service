<?php

use PHPUnit\Framework\TestCase;
use Dykyi\ResponseDataExtractor;

/**
 * Class ResponceDataTest
 *
 * @coversDefaultClass ResponseDataExtractor
 */
class ResponseDataTest extends TestCase
{
    /**
     * @covers ::extract
     */
    public function testResponse()
    {
        $response = new ResponseDataExtractor();

        $stub = $this->createMock(\Psr\Http\Message\ResponseInterface::class);
        $stub->method('getBody')->willReturn(json_encode(['test' => true]));

        $data = $response->extract($stub);
        $this->assertNotEmpty($data);
    }


    /**
     * @covers ::extract
     */
    public function testResponseError()
    {
        $response = new ResponseDataExtractor();

        $stub = $this->createMock(\Psr\Http\Message\ResponseInterface::class);
        $stub->method('getBody')->willReturn(null);

        $this->expectException(\Dykyi\Exceptions\ClientException::class);

        $response->extract($stub);
    }
}