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

trait SetTraitTestTrait
{
    public function testSetEdges()
    {
        $edge = $this->createMock(EdgeInterface::class);

        $this->object->setEdges($edge);
    }

    public function testAddEdges()
    {
        $edge = $this->createMock(EdgeInterface::class);

        $this->object->addEdges($edge);
    }

    public function testHasEdges()
    {
        $edge = $this->createMock(EdgeInterface::class);

        $this->assertFalse($this->object->hasEdges($edge));

        $this->object->addEdges($edge);
        $this->assertTrue($this->object->hasEdges($edge));
    }

    public function testRemoveEdges()
    {
        $edge = $this->createMock(EdgeInterface::class);
        $this->object->addEdges($edge);

        $this->assertTrue($this->object->hasEdges($edge));

        $this->object->removeEdges($edge);
        $this->assertFalse($this->object->hasEdges($edge));
    }

    public function testClearEdges()
    {
        $edge = $this->createMock(EdgeInterface::class);

        $this->object->addEdges($edge);

        $this->object->clearEdges();
        $this->assertFalse($this->object->hasEdges($edge));
    }

    public function testIsEmptyEdges()
    {
        $this->assertTrue($this->object->isEmptyEdges());

        $edge = $this->createMock(EdgeInterface::class);

        $this->object->addEdges($edge);
        $this->assertFalse($this->object->isEmptyEdges());
    }

    public function testCountEdges()
    {
        $this->assertSame(0, $this->object->countEdges());

        $this->object->addEdges(
            $this->createMock(EdgeInterface::class),
            $this->createMock(EdgeInterface::class)
        );

        $this->assertSame(2, $this->object->countEdges());
    }
}
