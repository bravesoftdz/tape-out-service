<?php

use PHPUnit\Framework\TestCase;
use \Dykyi\Handle\SocialDriverInterface;

define('TIME_LINE_COUNT',25);

/**
 * Class ServiceLocatorTest
 *
 * @coversDefaultClass ServiceLocator
 */
class ServiceLocatorTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
        $dotenv->load();
        parent::__construct($name, $data, $dataName);
    }

    /**
     * @covers \Dykyi\Config::env()
     */
    public function testEnv()
    {
        $this->assertNotEmpty(\Dykyi\Config::env('TWITTER_CONSUMER_KEY'));
    }

    public function serviceProvider()
    {
        return [
            [\Dykyi\Driver\FacebookDriver::class],
            [\Dykyi\Driver\TwitterDriver::class],
            [\Dykyi\Driver\NullDriver::class]
        ];
    }
    /**
     * @param string $service
     *
     * @covers ::createByName
     *
     * @dataProvider serviceProvider
     *
     * @return SocialDriverInterface
     */
    public function testService($service)
    {
        $serviceLocator = new \Dykyi\ServiceLocator();

        /** @var SocialDriverInterface $driver */
        $driver = $serviceLocator->createByName($service);

        $this->assertNotNull($driver);
        $this->assertInstanceOf(SocialDriverInterface::class, $driver);

        $data = $driver->getData(new \Dykyi\ResponseDataExtractor());
        $this->assertNotEmpty($data);

        $content = $driver->build($data, new \Dykyi\ViewBuilder());
        $this->assertNotEmpty($content);
    }
}