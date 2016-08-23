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

trait SizeTrait
{
    /**
     * Gets the edges set.
     *
     * @return Set
     */
    abstract public function getEdgeSet(): Set;

    /**
     * Gets the number of edges in a graph.
     *
     * @return int
     */
    public function getSize(): int
    {
        return count($this->getEdgeSet());
    }
}
