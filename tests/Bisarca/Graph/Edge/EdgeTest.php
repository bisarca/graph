<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Edge;

use Bisarca\Graph\Attribute\AttributeAwareTraitTestTrait;
use Bisarca\Graph\Vertex\VertexInterface;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

/**
 * @covers Bisarca\Graph\Edge\Edge
 * @group unit
 */
class EdgeTest extends TestCase
{
    use AttributeAwareTraitTestTrait;

    /**
     * @var Edge
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = new Edge();
    }

    public function testSetVertexStart()
    {
        $vertex = $this->createMock(VertexInterface::class);
        $this->object->setVertexStart($vertex);

        $property = new ReflectionProperty(Edge::class, 'vertexStart');
        $property->setAccessible(true);

        $this->assertSame($vertex, $property->getValue($this->object));
    }

    /**
     * @depends testSetVertexStart
     */
    public function testHasVertexStart()
    {
        $this->assertFalse($this->object->hasVertexStart());

        $this->object->setVertexStart(
            $this->createMock(VertexInterface::class)
        );
        $this->assertTrue($this->object->hasVertexStart());
    }

    /**
     * @depends testSetVertexStart
     */
    public function testGetVertexStart()
    {
        $vertex = $this->createMock(VertexInterface::class);
        $this->object->setVertexStart($vertex);

        $this->assertSame($vertex, $this->object->getVertexStart());
    }

    public function testSetVertexEnd()
    {
        $vertex = $this->createMock(VertexInterface::class);
        $this->object->setVertexEnd($vertex);

        $property = new ReflectionProperty(Edge::class, 'vertexEnd');
        $property->setAccessible(true);

        $this->assertSame($vertex, $property->getValue($this->object));
    }

    /**
     * @depends testSetVertexEnd
     */
    public function testHasVertexEnd()
    {
        $this->assertFalse($this->object->hasVertexEnd());

        $this->object->setVertexEnd($this->createMock(VertexInterface::class));
        $this->assertTrue($this->object->hasVertexEnd());
    }

    /**
     * @depends testSetVertexEnd
     */
    public function testGetVertexEnd()
    {
        $vertex = $this->createMock(VertexInterface::class);
        $this->object->setVertexEnd($vertex);

        $this->assertSame($vertex, $this->object->getVertexEnd());
    }

    /**
     * @depends testSetVertexStart
     * @depends testSetVertexEnd
     *
     * @dataProvider isLoopDataProvider
     */
    public function testIsLoop(
        VertexInterface $vertex1 = null,
        VertexInterface $vertex2 = null,
        bool $expected
    ) {
        if (null !== $vertex1) {
            $this->object->setVertexStart($vertex1);
        }
        if (null !== $vertex2) {
            $this->object->setVertexEnd($vertex2);
        }

        $this->assertSame($expected, $this->object->isLoop());
    }

    /**
     * @return array
     */
    public function isLoopDataProvider(): array
    {
        $vertex1 = $this->createMock(VertexInterface::class);
        $vertex2 = $this->createMock(VertexInterface::class);

        return [
            [$vertex1, $vertex1, true],
            [$vertex1, $vertex2, false],
            [$vertex1, null, false],
            [$vertex2, $vertex2, true],
            [null, $vertex2, false],
            [null, null, false],
        ];
    }
}
