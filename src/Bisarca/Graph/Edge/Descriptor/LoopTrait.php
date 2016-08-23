<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Edge\Descriptor;

use Bisarca\Graph\Vertex\VertexInterface;

trait LoopTrait
{
    /**
     * Checks if the edge has a starting vertex.
     *
     * @return bool
     */
    abstract public function hasVertexStart(): bool;

    /**
     * Gets the starting vertex.
     *
     * @return VertexInterface
     */
    abstract public function getVertexStart(): VertexInterface;

    /**
     * Checks if the edge has an ending vertex.
     *
     * @return bool
     */
    abstract public function hasVertexEnd(): bool;

    /**
     * Gets the ending vertex.
     *
     * @return VertexInterface
     */
    abstract public function getVertexEnd(): VertexInterface;

    /**
     * Checks if the edge is a loop.
     *
     * @return bool
     */
    public function isLoop(): bool
    {
        return $this->hasVertexStart() && $this->hasVertexEnd() &&
            $this->getVertexStart() === $this->getVertexEnd();
    }
}
