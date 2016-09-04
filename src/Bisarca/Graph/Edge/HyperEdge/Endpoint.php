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

/**
 * Basic endpoint implementation.
 */
class Endpoint implements EndpointInterface, PortAwareInterface
{
    use PortAwareTrait;

    /**
     * Endpoint vertex.
     *
     * @var VertexInterface
     */
    private $vertex;

    /**
     * {@inheritdoc}
     */
    public function __construct(VertexInterface $vertex)
    {
        $this->vertex = $vertex;
    }

    /**
     * {@inheritdoc}
     */
    public function setVertex(VertexInterface $vertex)
    {
        $this->vertex = $vertex;
    }

    /**
     * {@inheritdoc}
     */
    public function getVertex(): VertexInterface
    {
        return $this->vertex;
    }
}
