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

/**
 * Utilities to interact with the edges set from the Graph object.
 */
trait SetTrait
{
    /**
     * Gets the edges set.
     *
     * @return EdgeSet
     */
    abstract public function getEdgeSet(): Set;

    /**
     * Sets the contained edges.
     *
     * @param GenericEdgeInterface[] $edges
     */
    public function setEdges(GenericEdgeInterface ...$edges)
    {
        $this
            ->getEdgeSet()
            ->set(...$edges);
    }

    /**
     * Adds some edges.
     *
     * @param GenericEdgeInterface[] $edges
     */
    public function addEdges(GenericEdgeInterface ...$edges)
    {
        $this
            ->getEdgeSet()
            ->add(...$edges);
    }

    /**
     * Checks if all the edges are contained.
     *
     * @param GenericEdgeInterface[] $edges
     *
     * @return bool
     */
    public function hasEdges(GenericEdgeInterface ...$edges): bool
    {
        return $this
            ->getEdgeSet()
            ->has(...$edges);
    }

    /**
     * Removes some edges.
     *
     * @param GenericEdgeInterface[] $edges
     */
    public function removeEdges(GenericEdgeInterface ...$edges)
    {
        $this
            ->getEdgeSet()
            ->remove(...$edges);
    }

    /**
     * Remove all contained elements.
     */
    public function clearEdges()
    {
        $this
            ->getEdgeSet()
            ->clear();
    }

    /**
     * Checks if no elements are contained.
     *
     * @return bool
     */
    public function isEmptyEdges(): bool
    {
        return $this
            ->getEdgeSet()
            ->isEmpty();
    }

    /**
     * Counts the number of edges.
     *
     * @return int
     */
    public function countEdges(): int
    {
        return $this
            ->getEdgeSet()
            ->count();
    }
}
