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

use Bisarca\Graph\Vertex\VertexInterface;

/**
 * Interface used to implement an undirected edge.
 */
interface EdgeInterface
{
    /**
     * Constructor for (optional) edge' vertices initialization.
     *
     * @param VertexInterface|null $vertexStart
     * @param VertexInterface|null $vertexEnd
     */
    public function __construct(
        VertexInterface $vertexStart = null,
        VertexInterface $vertexEnd = null
    );

    /**
     * Checks if the edge has a starting vertex.
     *
     * @return bool
     */
    public function hasVertexStart(): bool;

    /**
     * Gets the starting vertex.
     *
     * @return VertexInterface
     */
    public function getVertexStart(): VertexInterface;

    /**
     * Sets the starting vertex.
     *
     * @param VertexInterface $vertexStart
     */
    public function setVertexStart(VertexInterface $vertexStart);

    /**
     * Checks if the edge has an ending vertex.
     *
     * @return bool
     */
    public function hasVertexEnd(): bool;

    /**
     * Gets the ending vertex.
     *
     * @return VertexInterface
     */
    public function getVertexEnd(): VertexInterface;

    /**
     * Sets the ending vertex.
     *
     * @param VertexInterface $vertexEnd
     */
    public function setVertexEnd(VertexInterface $vertexEnd);
}
