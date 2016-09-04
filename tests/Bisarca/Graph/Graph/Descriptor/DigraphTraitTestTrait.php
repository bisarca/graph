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

use Bisarca\Graph\Edge\DirectedEdgeInterface;
use Bisarca\Graph\Edge\EdgeInterface;
use Bisarca\Graph\Edge\GenericEdgeInterface;
use Bisarca\Graph\Edge\HyperEdgeInterface;

trait DigraphTraitTestTrait
{
    /**
     * @dataProvider isDigraphDataProvider
     */
    public function testIsDigraph(bool $expected, array $edges)
    {
        $this->assertFalse($this->object->isDigraph());

        $this->setEdges(...$edges);
        $this->assertSame($expected, $this->object->isDigraph());
    }

    public function isDigraphDataProvider()
    {
        $directedEdge = $this->createMock(DirectedEdgeInterface::class);

        $edges = [
            $directedEdge,
            $this->createMock(EdgeInterface::class),
            $this->createMock(GenericEdgeInterface::class),
            $this->createMock(HyperEdgeInterface::class),
        ];

        yield [true, [$directedEdge]];
        yield [false, [$edges[1]]];
        yield [false, [$edges[2]]];
        yield [false, [$edges[3]]];

        for ($i = 0; $i < 24; ++$i) {
            shuffle($edges);

            $tmp = array_slice($edges, mt_rand(0, count($edges)));

            yield [
                false !== array_search($directedEdge, $tmp, true),
                $tmp,
            ];
        }
    }

    private function setEdges(GenericEdgeInterface ...$edges)
    {
        if (isset($this->edgeSet)) {
            $this->edgeSet->set(...$edges);

            return;
        }

        $this->object
            ->getEdgeSet()
            ->set(...$edges);
    }
}
