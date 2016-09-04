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

use Bisarca\Graph\Attribute\AttributeAwareInterface;
use Bisarca\Graph\Attribute\AttributeAwareTrait;
use Bisarca\Graph\Edge\HyperEdge\EndpointInterface;
use Bisarca\Graph\Identifier\IdentifierAwareInterface;
use Bisarca\Graph\Identifier\IdentifierAwareTrait;
use Bisarca\Graph\Vertex\Set as VertexSet;

/**
 * Basic hyperedge implementation.
 */
class HyperEdge implements HyperEdgeInterface, AttributeAwareInterface, IdentifierAwareInterface
{
    use AttributeAwareTrait;
    use IdentifierAwareTrait;

    /**
     * Contained endpoints.
     *
     * @var EndpointInterface[]
     */
    private $endpoints = [];

    /**
     * {@inheritdoc}
     */
    public function __construct(EndpointInterface ...$endpoints)
    {
        $this->endpoints = $endpoints;
    }

    /**
     * {@inheritdoc}
     */
    public function setEndpoints(EndpointInterface ...$endpoints)
    {
        $this->endpoints = $endpoints;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpoints(): array
    {
        return $this->endpoints;
    }

    /**
     * {@inheritdoc}
     */
    public function getVertexSet(): VertexSet
    {
        $vertices = [];

        foreach ($this->endpoints as $endpoint) {
            $vertices[] = $endpoint->getVertex();
        }

        return new VertexSet(...$vertices);
    }
}
