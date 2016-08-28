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

/**
 * Utilities to interact with the vertices set from the Graph object.
 */
trait SetTrait
{
    /**
     * Gets the vertices set.
     *
     * @return Set
     */
    abstract public function getVertexSet(): Set;

    /**
     * Sets the contained vertices.
     *
     * @param VertexInterface[] $vertices
     */
    public function setVertices(VertexInterface ...$vertices)
    {
        $this
            ->getVertexSet()
            ->set(...$vertices);
    }

    /**
     * Adds some vertices.
     *
     * @param VertexInterface[] $vertices
     */
    public function addVertices(VertexInterface ...$vertices)
    {
        $this
            ->getVertexSet()
            ->add(...$vertices);
    }

    /**
     * Checks if all the vertices are contained.
     *
     * @param VertexInterface[] $vertices
     *
     * @return bool
     */
    public function hasVertices(VertexInterface ...$vertices): bool
    {
        return $this
            ->getVertexSet()
            ->has(...$vertices);
    }

    /**
     * Removes some vertices.
     *
     * @param VertexInterface[] $vertices
     */
    public function removeVertices(VertexInterface ...$vertices)
    {
        $this
            ->getVertexSet()
            ->remove(...$vertices);
    }

    /**
     * Remove all contained elements.
     */
    public function clearVertices()
    {
        $this
            ->getVertexSet()
            ->clear();
    }

    /**
     * Checks if no elements are contained.
     *
     * @return bool
     */
    public function isEmptyVertices(): bool
    {
        return $this
            ->getVertexSet()
            ->isEmpty();
    }

    /**
     * Gets the number of contained vertices.
     *
     * @return int
     */
    public function countVertices(): int
    {
        return $this
            ->getVertexSet()
            ->count();
    }
}
