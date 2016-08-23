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

use Bisarca\Graph\Edge\Set as Edges;
use Bisarca\Graph\Vertex\Set as Vertices;

/**
 * Interface used to describe the base of a graph.
 */
interface GraphInterface
{
    /**
     * Constructor for (optional) graph data initialization.
     *
     * @param Vertices|null $vertices
     * @param Edges|null    $edges
     */
    public function __construct(Vertices $vertices = null, Edges $edges = null);

    /**
     * Gets the Vertices set.
     *
     * @return Vertices
     */
    public function getVertexSet(): Vertices;

    /**
     * Sets the Vertices set.
     *
     * @param Vertices $vertices
     */
    public function setVertexSet(Vertices $vertices);

    /**
     * Gets the Edges set.
     *
     * @return Edges
     */
    public function getEdgeSet(): Edges;

    /**
     * Sets the Edges set.
     *
     * @param Edges $edges
     */
    public function setEdgeSet(Edges $edges);
}
