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

use Bisarca\Graph\Vertex\Set;

trait OrderTrait
{
    /**
     * Gets the vertices set.
     *
     * @return Set
     */
    abstract public function getVertexSet(): Set;

    /**
     * Gets the number of vertices in a graph.
     *
     * @return int
     */
    public function getOrder(): int
    {
        return count($this->getVertexSet());
    }
}
