<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Builder;

use Bisarca\Graph\Edge\EdgeInterface;
use Bisarca\Graph\Graph;
use Bisarca\Graph\GraphInterface;
use Bisarca\Graph\Identifier\IdentifierAwareInterface;
use Bisarca\Graph\Vertex\Set as VertexSet;
use Bisarca\Graph\Vertex\VertexInterface;

/**
 * Builds the TGF graphs.
 *
 * @link https://en.wikipedia.org/wiki/Trivial_Graph_Format
 */
class TrivialBuilder implements BuilderInterface
{
    /**
     * Graph to build.
     *
     * @var null|GraphInterface
     */
    private $graph;

    private $vertices = [];

    /**
     * {@inheritdoc}
     */
    public function setGraph(GraphInterface $graph)
    {
        $this->graph = $graph;
    }

    /**
     * {@inheritdoc}
     */
    public function getGraph(): GraphInterface
    {
        return $this->graph;
    }

    /**
     * {@inheritdoc}
     */
    public function build(): string
    {
        $this->storeVertices($this->graph->getVertexSet());

        $output = '';

        foreach ($this->graph->getVertexSet() as $vertex) {
            $output .= $this->buildVertex($vertex);
        }

        $output .= '#'.PHP_EOL;

        foreach ($this->graph->getEdgeSet() as $edge) {
            $output .= $this->buildEdge($edge);
        }

        return $output;
    }

    /**
     * Stores vertixes to be extracted later.
     *
     * @param VertexSet $vertexSet
     */
    private function storeVertices(VertexSet $vertexSet)
    {
        foreach ($vertexSet as $index => $vertex) {
            $this->vertices[$index + 1] = $vertex;
        }
    }

    /**
     * Builds a vertex.
     *
     * @param VertexInterface $vertex
     *
     * @return string
     */
    private function buildVertex(VertexInterface $vertex): string
    {
        $output = array_search($vertex, $this->vertices, true);

        if (
            $vertex instanceof IdentifierAwareInterface &&
            $vertex->hasIdentifier()
        ) {
            $output .= ' '.$vertex->getIdentifier();
        }

        return $output.PHP_EOL;
    }

    /**
     * Builds an edge.
     *
     * @param EdgeInterface $edge
     *
     * @return string
     */
    private function buildEdge(EdgeInterface $edge): string
    {
        if (!$edge->hasSource() || !$edge->hasTarget()) {
            return '';
        }

        $output = sprintf(
            '%d %d',
            array_search($edge->getSource(), $this->vertices, true),
            array_search($edge->getTarget(), $this->vertices, true)
        );

        if (
            $edge instanceof IdentifierAwareInterface &&
            $edge->hasIdentifier()
        ) {
            $output .= ' '.$edge->getIdentifier();
        }

        return $output.PHP_EOL;
    }
}
