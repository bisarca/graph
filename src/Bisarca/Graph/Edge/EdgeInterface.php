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
 * Interface used to implement undirected edges.
 */
interface EdgeInterface extends GenericEdgeInterface
{
    /**
     * Constructor for (optional) edge' vertices initialization.
     *
     * @param VertexInterface|null $source
     * @param VertexInterface|null $target
     */
    public function __construct(
        VertexInterface $source = null,
        VertexInterface $target = null
    );

    /**
     * Checks if the edge has a starting vertex.
     *
     * @return bool
     */
    public function hasSource(): bool;

    /**
     * Gets the starting vertex.
     *
     * @return VertexInterface
     */
    public function getSource(): VertexInterface;

    /**
     * Sets the starting vertex.
     *
     * @param VertexInterface $source
     */
    public function setSource(VertexInterface $source);

    /**
     * Checks if the edge has an ending vertex.
     *
     * @return bool
     */
    public function hasTarget(): bool;

    /**
     * Gets the ending vertex.
     *
     * @return VertexInterface
     */
    public function getTarget(): VertexInterface;

    /**
     * Sets the ending vertex.
     *
     * @param VertexInterface $target
     */
    public function setTarget(VertexInterface $target);
}
