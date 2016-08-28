<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Graph\Descriptor;

use Bisarca\Graph\Edge\Set;
use Bisarca\Graph\Vertex\VertexInterface;

/**
 * Utility to detect loops from a Graph.
 */
trait LoopTrait
{
    /**
     * Gets the edges set.
     *
     * @return Set
     */
    abstract public function getEdgeSet(): Set;

    /**
     * Checks if the graph has an edge that is a loop.
     *
     * @return bool
     */
    public function hasLoop(): bool
    {
        $loop = false;

        foreach ($this->getEdgeSet() as $edge) {
            $loop = $loop || $edge->isLoop();
        }

        return $loop;
    }

    /**
     * Checks if the graph has an edge that is a loop and with a vertex $vertex.
     *
     * @param VertexInterface $vertex
     *
     * @return bool
     */
    public function hasLoopOn(VertexInterface $vertex): bool
    {
        $loop = false;

        foreach ($this->getEdgeSet() as $edge) {
            $loop = $loop || (
                $edge->isLoop() &&
                $vertex === $edge->getVertexStart()
            );
        }

        return $loop;
    }
}
