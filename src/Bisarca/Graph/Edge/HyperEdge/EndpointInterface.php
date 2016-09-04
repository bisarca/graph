<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Edge\HyperEdge;

use Bisarca\Graph\Vertex\VertexInterface;

interface EndpointInterface
{
    /**
     * Constructor for required vertex.
     *
     * @param VertexInterface $vertex
     */
    public function __construct(VertexInterface $vertex);

    /**
     * Sets the contained vertex.
     *
     * @param VertexInterface $vertex
     */
    public function setVertex(VertexInterface $vertex);

    /**
     * Gets the contained vertex.
     *
     * @return VertexInterface
     */
    public function getVertex(): VertexInterface;
}
