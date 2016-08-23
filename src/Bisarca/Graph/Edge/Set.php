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

use Bisarca\Graph\AbstractSet;

/**
 * Set of edges.
 */
class Set extends AbstractSet
{
    /**
     * Sets the optional contained edges.
     *
     * @param EdgeInterface[] $edges
     */
    public function __construct(EdgeInterface ...$edges)
    {
        $this->data = $edges;
    }

    /**
     * Sets the contained edges.
     *
     * @param EdgeInterface[] $edges
     */
    public function set(EdgeInterface ...$edges)
    {
        $this->data = $edges;
    }

    /**
     * Adds some edges.
     *
     * @param EdgeInterface[] $edges
     */
    public function add(EdgeInterface ...$edges)
    {
        $this->data = array_merge($this->data, $edges);
    }

    /**
     * Checks if all the edges are contained.
     *
     * @param EdgeInterface[] $edges
     *
     * @return bool
     */
    public function has(EdgeInterface ...$edges): bool
    {
        $intersection = array_uintersect(
            $this->data,
            $edges,
            function (EdgeInterface $a, EdgeInterface $b) {
                return $a !== $b;
            }
        );

        return count($intersection) === count($edges);
    }

    /**
     * Removes some edges.
     *
     * @param EdgeInterface[] $edges
     */
    public function remove(EdgeInterface ...$edges)
    {
        $this->data = array_udiff(
            $this->data,
            $edges,
            function (EdgeInterface $a, EdgeInterface $b) {
                return $a !== $b;
            }
        );
    }
}
