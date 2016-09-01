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

use Bisarca\Graph\Vertex\Set as VertexSet;

/**
 * Interface used to implement directed, undirected and hyper edges.
 */
interface GenericEdgeInterface
{
    /**
     * Gets vertices set.
     *
     * @return VertexSet
     */
    public function getVertexSet(): VertexSet;
}
