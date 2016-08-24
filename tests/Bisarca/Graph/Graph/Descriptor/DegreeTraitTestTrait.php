<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Graph\Descriptor;

use Bisarca\Graph\Edge\Edge;
use Bisarca\Graph\Edge\EdgeInterface;
use Bisarca\Graph\Vertex\VertexInterface;

trait DegreeTraitTestTrait
{
    /**
     * @dataProvider getVertexDegreeDataProvider
     */
    public function testGetVertexDegree(
        int $degree,
        array $edges,
        VertexInterface $vertex
    ) {
        $this->assertSame(0, $this->object->getVertexDegree($vertex));

        $this->addEdges(...$edges);
        $this->assertSame($degree, $this->object->getVertexDegree($vertex));
    }

    /**
     * @return array
     */
    public function getVertexDegreeDataProvider(): array
    {
        $vertex = $this->createMock(VertexInterface::class);

        return [
            [0, [new Edge()], $vertex],
            [1, [new Edge($vertex)], $vertex],
            [1, [new Edge(null, $vertex)], $vertex],
            [2, [new Edge($vertex, $vertex)], $vertex],
            [3, [new Edge($vertex, $vertex), new Edge($vertex)], $vertex],
            [3, [new Edge($vertex, $vertex), new Edge(null, $vertex)], $vertex],
        ];
    }

    public function testGetVertexInDegree()
    {
        $vertex = $this->createMock(VertexInterface::class);

        $this->assertSame(0, $this->object->getVertexInDegree($vertex));

        $this->addEdges(new Edge($vertex));
        $this->assertSame(0, $this->object->getVertexInDegree($vertex));

        $this->addEdges(new Edge(null, $vertex));
        $this->assertSame(1, $this->object->getVertexInDegree($vertex));
    }

    public function testGetVertexOutDegree()
    {
        $vertex = $this->createMock(VertexInterface::class);

        $this->assertSame(0, $this->object->getVertexOutDegree($vertex));

        $this->addEdges(new Edge(null, $vertex));
        $this->assertSame(0, $this->object->getVertexOutDegree($vertex));

        $this->addEdges(new Edge($vertex));
        $this->assertSame(1, $this->object->getVertexOutDegree($vertex));
    }

    /**
     * @dataProvider getMaxDegreeDataProvider
     */
    public function testGetMaxDegree(
        int $degree,
        array $edges,
        array $vertices
    ) {
        $this->addVertices(...$vertices);
        $this->addEdges(...$edges);
        $this->assertSame($degree, $this->object->getMaxDegree());
    }

    /**
     * @return array
     */
    public function getMaxDegreeDataProvider(): array
    {
        $vertex1 = $this->createMock(VertexInterface::class);
        $vertex2 = $this->createMock(VertexInterface::class);

        return [
            [2, [
                new Edge($vertex1, $vertex2),
                new Edge($vertex1),
                new Edge(),
            ], [
                $vertex1,
                $vertex2,
            ]],
            [1, [
                new Edge($vertex1),
                new Edge(),
            ], [
                $vertex1,
                $vertex2,
            ]],
            [1, [
                new Edge(),
                new Edge($vertex2),
            ], [
                $vertex1,
                $vertex2,
            ]],
            [0, [
                new Edge(),
            ], [
                $vertex1,
                $vertex2,
            ]],
            [0, [], [
                $vertex1,
                $vertex2,
            ]],
        ];
    }

    /**
     * @dataProvider getMinDegreeDataProvider
     */
    public function testGetMinDegree(
        int $degree,
        array $edges,
        array $vertices
    ) {
        $this->addVertices(...$vertices);
        $this->addEdges(...$edges);
        $this->assertSame($degree, $this->object->getMinDegree());
    }

    /**
     * @return array
     */
    public function getMinDegreeDataProvider(): array
    {
        $vertex1 = $this->createMock(VertexInterface::class);
        $vertex2 = $this->createMock(VertexInterface::class);

        return [
            [2, [
                new Edge($vertex1, $vertex1),
                new Edge(),
            ], [
                $vertex1,
            ]],
            [1, [
                new Edge($vertex1, $vertex2),
                new Edge($vertex1),
                new Edge(),
            ], [
                $vertex1,
                $vertex2,
            ]],
            [0, [
                new Edge(),
                new Edge($vertex2),
            ], [
                $vertex1,
                $vertex2,
            ]],
            [0, [
                new Edge(),
            ], [
                $vertex1,
                $vertex2,
            ]],
            [0, [], [
                $vertex1,
                $vertex2,
            ]],
        ];
    }

    public function testIsIsolatedVertex()
    {
        $vertex = $this->createMock(VertexInterface::class);

        $this->assertTrue($this->object->isIsolatedVertex($vertex));

        $edge = new Edge($vertex);

        $this->addEdges($edge);
        $this->assertFalse($this->object->isIsolatedVertex($vertex));
    }

    public function testIsLeafVertex()
    {
        $vertex = $this->createMock(VertexInterface::class);

        $this->assertFalse($this->object->isLeafVertex($vertex));

        $edge = new Edge($vertex);

        $this->addEdges($edge);
        $this->assertTrue($this->object->isLeafVertex($vertex));

        $this->addEdges($edge);
        $this->assertFalse($this->object->isLeafVertex($vertex));
    }

    public function testIsDominatingVertex()
    {
        $vertex = $this->createMock(VertexInterface::class);

        $this->assertFalse($this->object->isDominatingVertex($vertex));

        $this->addEdges(new Edge($vertex));

        $this->addVertices($vertex);
        $this->assertFalse($this->object->isDominatingVertex($vertex));

        $this->addVertices($vertex);
        $this->assertTrue($this->object->isDominatingVertex($vertex));
    }

    private function addVertices(VertexInterface ...$vertices)
    {
        if (isset($this->vertexSet)) {
            $this->vertexSet->add(...$vertices);

            return;
        }

        $this->object
            ->getVertexSet()
            ->add(...$vertices);
    }

    private function addEdges(EdgeInterface ...$edges)
    {
        if (isset($this->edgeSet)) {
            $this->edgeSet->add(...$edges);

            return;
        }

        $this->object
            ->getEdgeSet()
            ->add(...$edges);
    }
}
