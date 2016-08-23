<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Vertex;

trait SetTraitTestTrait
{
    public function testSetVertices()
    {
        $vertex = $this->createMock(VertexInterface::class);

        $this->object->setVertices($vertex);
    }

    public function testAddVertices()
    {
        $vertex = $this->createMock(VertexInterface::class);

        $this->object->addVertices($vertex);
    }

    public function testHasVertices()
    {
        $vertex = $this->createMock(VertexInterface::class);

        $this->assertFalse($this->object->hasVertices($vertex));

        $this->object->addVertices($vertex);
        $this->assertTrue($this->object->hasVertices($vertex));
    }

    public function testRemoveVertices()
    {
        $vertex = $this->createMock(VertexInterface::class);
        $this->object->addVertices($vertex);

        $this->assertTrue($this->object->hasVertices($vertex));

        $this->object->removeVertices($vertex);
        $this->assertFalse($this->object->hasVertices($vertex));
    }

    public function testClearVertices()
    {
        $vertex = $this->createMock(VertexInterface::class);

        $this->object->addVertices($vertex);

        $this->object->clearVertices();
        $this->assertFalse($this->object->hasVertices($vertex));
    }

    public function testIsEmptyVertices()
    {
        $this->assertTrue($this->object->isEmptyVertices());

        $vertex = $this->createMock(VertexInterface::class);

        $this->object->addVertices($vertex);
        $this->assertFalse($this->object->isEmptyVertices());
    }

    public function testCountVertices()
    {
        $this->assertSame(0, $this->object->countVertices());

        $this->object->addVertices(
            $this->createMock(VertexInterface::class),
            $this->createMock(VertexInterface::class)
        );

        $this->assertSame(2, $this->object->countVertices());
    }
}
