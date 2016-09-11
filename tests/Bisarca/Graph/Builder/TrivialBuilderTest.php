<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Builder;

use Bisarca\Graph\GraphInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Builder\TrivialBuilder
 */
class TrivialBuilderTest extends TestCase
{
    /**
     * @var TrivialBuilder
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = new TrivialBuilder();
    }

    /**
     * @expectedException TypeError
     * @group unit
     */
    public function testGetGraphWithException()
    {
        $this->object->getGraph();
    }

    /**
     * @group unit
     */
    public function testSetAndGetGraph()
    {
        $graph = $this->createMock(GraphInterface::class);

        $this->object->setGraph($graph);
        $this->assertSame($graph, $this->object->getGraph());
    }

    /**
     * @dataProvider buildDataProvider
     * @group functional
     */
    public function testBuild(int $index)
    {
        $dir = __DIR__.'/TrivialBuilderTest/Fixtures/';

        $graph = require $dir.$index.'.php';

        $this->object->setGraph($graph);
        $this->assertEquals(
            file_get_contents($dir.$index.'.tgf'),
            $this->object->build()
        );
    }

    public function buildDataProvider()
    {
        for ($i = 1; $i < 3; ++$i) {
            yield [$i];
        }
    }
}
