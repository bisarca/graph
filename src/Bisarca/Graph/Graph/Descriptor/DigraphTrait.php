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

use Bisarca\Graph\Edge\DirectedEdgeInterface;
use Bisarca\Graph\Edge\Set;

/**
 * Descriptor used to check if a Graph is directed.
 */
trait DigraphTrait
{
    /**
     * Gets the edges set.
     *
     * @return Set
     */
    abstract public function getEdgeSet(): Set;

    /**
     * Checks if the graph id directed.
     *
     * @return bool
     */
    public function isDigraph(): bool
    {
        $directed = false;

        foreach ($this->getEdgeSet() as $edge) {
            $directed = $directed || $edge instanceof DirectedEdgeInterface;
        }

        return $directed;
    }
}
