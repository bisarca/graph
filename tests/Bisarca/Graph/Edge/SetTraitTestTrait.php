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
        $edges = array_fill(
            0,
            mt_rand(0, 10),
            $this->createMock(EdgeInterface::class)
        );

        $this->object->setEdges(...$edges);
    }

    public function testAddEdges()
    {
        $edges = array_fill(
            0,
            mt_rand(0, 10),
            $this->createMock(EdgeInterface::class)
        );

        $this->object->addEdges(...$edges);
    }

    public function testHasEdges()
    {
        $edge = $this->createMock(EdgeInterface::class);

        $this->assertFalse($this->object->hasEdges($edge));

        $this->object->addEdges($edge);
        $this->assertTrue($this->object->hasEdges($edge));
    }

    /**
     * @dataProvider hasEdgesWithMoreElementsDataProvider
     */
    public function testHasEdgesWithMoreElements(
        array $set1,
        array $set2,
        bool $expected
    ) {
        $this->object->setEdges(...$set1);
        $this->assertSame($expected, $this->object->hasEdges(...$set2));
    }

    /**
     * @return array
     */
    public function hasEdgesWithMoreElementsDataProvider(): array
    {
        $edges = [];
        for ($i = 0; $i < 3; ++$i) {
            $edges[] = $this->createMock(EdgeInterface::class);
        }

        return [
            [[$edges[0], $edges[1]], [$edges[0]], true],
            [[$edges[0], $edges[2]], [$edges[0], $edges[1]], false],
            [[$edges[0]], [$edges[0], $edges[1]], false],
            [[$edges[0]], [$edges[1]], false],
            [[$edges[0]], [], true],
            [[], [$edges[0]], false],
            [[], [], true],
        ];
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
