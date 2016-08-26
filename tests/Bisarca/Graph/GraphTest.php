<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph;

use Bisarca\Graph\Attribute\AttributeAwareInterface;
use Bisarca\Graph\Attribute\AttributeAwareTrait;
use Bisarca\Graph\Attribute\AttributeAwareTraitTestTrait;
use Bisarca\Graph\Edge\EdgeInterface;
use Bisarca\Graph\Edge\Set as EdgeSet;
use Bisarca\Graph\Edge\SetTraitTestTrait as EdgesTestTrait;
use Bisarca\Graph\Graph\Descriptor;
use Bisarca\Graph\Vertex\Set as VertexSet;
use Bisarca\Graph\Vertex\SetTraitTestTrait as VerticesTestTrait;
use Bisarca\Graph\Vertex\VertexInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Graph
 * @group unit
 */
class GraphTest extends TestCase
{
    use AttributeAwareTraitTestTrait;
    use Descriptor\DegreeTraitTestTrait;
    use Descriptor\LoopTraitTestTrait;
    use Descriptor\OrderTraitTestTrait;
    use Descriptor\SizeTraitTestTrait;
    use EdgesTestTrait;
    use VerticesTestTrait;

    /**
     * @var Graph
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = new class() extends Graph implements AttributeAwareInterface {
            use AttributeAwareTrait;
        };
    }

    public function testSetVertexSet()
    {
        $this->object->setVertexSet($this->createMock(VertexSet::class));
    }

    /**
     * @depends testSetVertexSet
     */
    public function testGetVertexSet()
    {
        $vertices = $this->createMock(VertexSet::class);

        $this->object->setVertexSet($vertices);

        $this->assertSame($vertices, $this->object->getVertexSet());
    }

    public function testSetEdgeSet()
    {
        $this->object->setEdgeSet($this->createMock(EdgeSet::class));
    }

    /**
     * @depends testSetEdgeSet
     */
    public function testGetEdgeSet()
    {
        $edges = $this->createMock(EdgeSet::class);

        $this->object->setEdgeSet($edges);

        $this->assertSame($edges, $this->object->getEdgeSet());
    }

    /**
     * @depends testGetEdgeSet
     * @depends testGetVertexSet
     * @depends testSetEdgeSet
     * @depends testSetVertexSet
     */
    public function testConstruct()
    {
        $this->assertCount(0, $this->object->getEdgeSet());
        $this->assertCount(0, $this->object->getVertexSet());

        $vertices = new VertexSet(
            $this->createMock(VertexInterface::class),
            $this->createMock(VertexInterface::class)
        );
        $edges = new EdgeSet($this->createMock(EdgeInterface::class));

        $this->object = new Graph($vertices, $edges);

        $this->assertCount(1, $this->object->getEdgeSet());
        $this->assertCount(2, $this->object->getVertexSet());
    }
}
