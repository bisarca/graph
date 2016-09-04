<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Edge\HyperEdge;

use Bisarca\Graph\Vertex\VertexInterface;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

/**
 * @covers Bisarca\Graph\Edge\HyperEdge\Endpoint
 * @group unit
 */
class EndpointTest extends TestCase
{
    use PortAwareTraitTestTrait;

    /**
     * @var Endpoint
     */
    protected $object;

    /**
     * @var VertexInterface
     */
    protected $vertex;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->vertex = $this->createMock(VertexInterface::class);
        $this->object = new Endpoint($this->vertex);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstruct()
    {
        new Endpoint();
    }

    public function testSetVertex()
    {
        $vertex = $this->createMock(VertexInterface::class);

        $this->object->setVertex($vertex);

        $property = new ReflectionProperty(Endpoint::class, 'vertex');
        $property->setAccessible(true);

        $this->assertSame($vertex, $property->getValue($this->object));
    }

    public function testGetVertex()
    {
        $this->assertSame($this->vertex, $this->object->getVertex());
    }
}
