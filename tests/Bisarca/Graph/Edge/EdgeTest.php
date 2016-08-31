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
use Bisarca\Graph\Identifier\IdentifierAwareTraitTestTrait;
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
    use IdentifierAwareTraitTestTrait;

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

    public function testSetSource()
    {
        $vertex = $this->createMock(VertexInterface::class);
        $this->object->setSource($vertex);

        $property = new ReflectionProperty(Edge::class, 'source');
        $property->setAccessible(true);

        $this->assertSame($vertex, $property->getValue($this->object));
    }

    /**
     * @depends testSetSource
     */
    public function testHasSource()
    {
        $this->assertFalse($this->object->hasSource());

        $this->object->setSource(
            $this->createMock(VertexInterface::class)
        );
        $this->assertTrue($this->object->hasSource());
    }

    /**
     * @depends testSetSource
     */
    public function testGetSource()
    {
        $vertex = $this->createMock(VertexInterface::class);
        $this->object->setSource($vertex);

        $this->assertSame($vertex, $this->object->getSource());
    }

    public function testSetTarget()
    {
        $vertex = $this->createMock(VertexInterface::class);
        $this->object->setTarget($vertex);

        $property = new ReflectionProperty(Edge::class, 'target');
        $property->setAccessible(true);

        $this->assertSame($vertex, $property->getValue($this->object));
    }

    /**
     * @depends testSetTarget
     */
    public function testHasTarget()
    {
        $this->assertFalse($this->object->hasTarget());

        $this->object->setTarget($this->createMock(VertexInterface::class));
        $this->assertTrue($this->object->hasTarget());
    }

    /**
     * @depends testSetTarget
     */
    public function testGetTarget()
    {
        $vertex = $this->createMock(VertexInterface::class);
        $this->object->setTarget($vertex);

        $this->assertSame($vertex, $this->object->getTarget());
    }

    /**
     * @depends testSetSource
     * @depends testSetTarget
     *
     * @dataProvider isLoopDataProvider
     */
    public function testIsLoop(
        VertexInterface $vertex1 = null,
        VertexInterface $vertex2 = null,
        bool $expected
    ) {
        if (null !== $vertex1) {
            $this->object->setSource($vertex1);
        }
        if (null !== $vertex2) {
            $this->object->setTarget($vertex2);
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
