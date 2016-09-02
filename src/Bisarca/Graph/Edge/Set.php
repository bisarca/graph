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
     * @param GenericEdgeInterface[] $edges
     */
    public function __construct(GenericEdgeInterface ...$edges)
    {
        $this->data = $edges;
    }

    /**
     * Sets the contained edges.
     *
     * @param GenericEdgeInterface[] $edges
     */
    public function set(GenericEdgeInterface ...$edges)
    {
        $this->data = $edges;
    }

    /**
     * Adds some edges.
     *
     * @param GenericEdgeInterface[] $edges
     */
    public function add(GenericEdgeInterface ...$edges)
    {
        $this->data = array_merge($this->data, $edges);
    }

    /**
     * Checks if all the edges are contained.
     *
     * @param GenericEdgeInterface[] $edges
     *
     * @return bool
     */
    public function has(GenericEdgeInterface ...$edges): bool
    {
        $contained = true;

        foreach ($edges as $edge) {
            $contained = $contained && (
                false !== array_search($edge, $this->data, true)
            );
        }

        return $contained;
    }

    /**
     * Removes some edges.
     *
     * @param GenericEdgeInterface[] $edges
     */
    public function remove(GenericEdgeInterface ...$edges)
    {
        $this->data = array_udiff(
            $this->data,
            $edges,
            function (GenericEdgeInterface $a, GenericEdgeInterface $b) {
                return $a !== $b;
            }
        );
    }
}
