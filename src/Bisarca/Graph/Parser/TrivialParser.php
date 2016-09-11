<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Parser;

use Bisarca\Graph\Edge\DirectedEdge;
use Bisarca\Graph\Edge\Set as EdgeSet;
use Bisarca\Graph\Graph;
use Bisarca\Graph\GraphInterface;
use Bisarca\Graph\Vertex\Set as VertexSet;
use Bisarca\Graph\Vertex\Vertex;

/**
 * Parses the TGF graphs.
 *
 * @link https://en.wikipedia.org/wiki/Trivial_Graph_Format
 */
class TrivialParser implements ParserInterface
{
    /**
     * Content to be parsed.
     *
     * @var string
     */
    private $content = '';

    /**
     * Contained vertices.
     *
     * @var array
     */
    private $vertices = [];

    /**
     * Contained edges.
     *
     * @var array
     */
    private $edges = [];

    /**
     * {@inheritdoc}
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function parse(): GraphInterface
    {
        // vertices will be indexed with id: label
        $this->vertices = [];
        // edges aren't indexed
        $this->edges = [];

        // split by EOL
        $matches = [];
        preg_match('/^([^#]+)(#([^#]+))?$/', $this->content, $matches);

        $vertexRows = explode(PHP_EOL, $matches[1]);
        $vertexRows = array_map('trim', $vertexRows);
        $vertexRows = array_filter($vertexRows);

        array_map([$this, 'addVertex'], $vertexRows);

        if (isset($matches[3])) {
            $edgeRows = explode(PHP_EOL, $matches[3]);
            $edgeRows = array_map('trim', $edgeRows);
            $edgeRows = array_filter($edgeRows);

            array_map([$this, 'addEdge'], $edgeRows);
        }

        return new Graph(
            new VertexSet(...$this->vertices),
            new EdgeSet(...$this->edges)
        );
    }

    /**
     * Adds an edge.
     *
     * @param string $row
     */
    private function addEdge(string $row)
    {
        $matches = [];
        preg_match('/^(\d+)\s+(\d+)(\s+(.+))?$/', $row, $matches);

        $edge = new DirectedEdge(
            $this->vertices[$matches[1]],
            $this->vertices[$matches[2]]
        );

        if (isset($matches[3]) && $identifier = trim($matches[3])) {
            $edge->setIdentifier($identifier);
        }

        $this->edges[] = $edge;
    }

    /**
     * Adds a vertex.
     *
     * @param string $row
     */
    private function addVertex(string $row)
    {
        $matches = [];
        preg_match('/^(\d+)\s*(.*)/', $row, $matches);

        $vertex = new Vertex();

        if ($identifier = trim($matches[2])) {
            $vertex->setIdentifier($identifier);
        }

        $this->vertices[$matches[1]] = $vertex;
    }
}
