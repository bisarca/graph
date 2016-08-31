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

/**
 * Descriptor used to check if and Edge is a loop.
 */
trait LoopTrait
{
    /**
     * Checks if the edge has a starting vertex.
     *
     * @return bool
     */
    abstract public function hasSource(): bool;

    /**
     * Gets the starting vertex.
     *
     * @return VertexInterface
     */
    abstract public function getSource(): VertexInterface;

    /**
     * Checks if the edge has an ending vertex.
     *
     * @return bool
     */
    abstract public function hasTarget(): bool;

    /**
     * Gets the ending vertex.
     *
     * @return VertexInterface
     */
    abstract public function getTarget(): VertexInterface;

    /**
     * Checks if the edge is a loop.
     *
     * @return bool
     */
    public function isLoop(): bool
    {
        return $this->hasSource() && $this->hasTarget() &&
            $this->getSource() === $this->getTarget();
    }
}
