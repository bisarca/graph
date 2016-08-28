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
     * @param EdgeInterface[] $edges
     */
    public function setEdges(EdgeInterface ...$edges)
    {
        $this
            ->getEdgeSet()
            ->set(...$edges);
    }

    /**
     * Adds some edges.
     *
     * @param EdgeInterface[] $edges
     */
    public function addEdges(EdgeInterface ...$edges)
    {
        $this
            ->getEdgeSet()
            ->add(...$edges);
    }

    /**
     * Checks if all the edges are contained.
     *
     * @param EdgeInterface[] $edges
     *
     * @return bool
     */
    public function hasEdges(EdgeInterface ...$edges): bool
    {
        return $this
            ->getEdgeSet()
            ->has(...$edges);
    }

    /**
     * Removes some edges.
     *
     * @param EdgeInterface[] $edges
     */
    public function removeEdges(EdgeInterface ...$edges)
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
