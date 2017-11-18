<?php

use PHPUnit\Framework\TestCase;

/**
 * Class ViewBuilderTest
 *
 * @coversDefaultClass ViewBuilder
 */
class ViewBuilderTest extends TestCase
{
    /**
     * @covers ::build
     */
    public function testBuild()
    {
        $viewBuilder = new \Dykyi\ViewBuilder();
        $view = $viewBuilder->build([3,'r','c','d']);
        $this->assertNotEmpty($view);
    }
}