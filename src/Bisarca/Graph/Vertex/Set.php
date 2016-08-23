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

use Bisarca\Graph\AbstractSet;

/**
 * Set of vertices.
 */
class Set extends AbstractSet
{
    /**
     * Sets the optional contained vertices.
     *
     * @param VertexInterface[] $vertices
     */
    public function __construct(VertexInterface ...$vertices)
    {
        $this->data = $vertices;
    }

    /**
     * Sets the contained vertices.
     *
     * @param VertexInterface[] $vertices
     */
    public function set(VertexInterface ...$vertices)
    {
        $this->data = $vertices;
    }

    /**
     * Adds some vertices.
     *
     * @param VertexInterface[] $vertices
     */
    public function add(VertexInterface ...$vertices)
    {
        $this->data = array_merge($this->data, $vertices);
    }

    /**
     * Checks if all the vertices are contained.
     *
     * @param VertexInterface[] $vertices
     *
     * @return bool
     */
    public function has(VertexInterface ...$vertices): bool
    {
        $intersection = array_uintersect(
            $this->data,
            $vertices,
            function (VertexInterface $a, VertexInterface $b) {
                return $a !== $b;
            }
        );

        return count($intersection) === count($vertices);
    }

    /**
     * Removes some vertices.
     *
     * @param VertexInterface[] $vertices
     */
    public function remove(VertexInterface ...$vertices)
    {
        $this->data = array_udiff(
            $this->data,
            $vertices,
            function (VertexInterface $a, VertexInterface $b) {
                return $a !== $b;
            }
        );
    }
}
