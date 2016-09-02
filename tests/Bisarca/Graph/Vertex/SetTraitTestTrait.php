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

    /**
     * @dataProvider hasVerticesWithMoreElementsDataProvider
     */
    public function testHasVerticesWithMoreElements(
        array $set1,
        array $set2,
        bool $expected
    ) {
        $this->object->setVertices(...$set1);
        $this->assertSame($expected, $this->object->hasVertices(...$set2));
    }

    /**
     * @return array
     */
    public function hasVerticesWithMoreElementsDataProvider(): array
    {
        $vertices = [];
        for ($i = 0; $i < 3; ++$i) {
            $vertices[] = $this->createMock(VertexInterface::class);
        }

        return [
            [[$vertices[0], $vertices[1]], [$vertices[0]], true],
            [[$vertices[0], $vertices[2]], [$vertices[0], $vertices[1]], false],
            [[$vertices[0]], [$vertices[0], $vertices[1]], false],
            [[$vertices[0]], [$vertices[1]], false],
            [[$vertices[0]], [], true],
            [[], [$vertices[0]], false],
            [[], [], true],
        ];
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
