<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph;

use Bisarca\Graph\Edge\Set as EdgeSet;
use Bisarca\Graph\Graph\Descriptor;
use Bisarca\Graph\Identifier\IdentifierAwareInterface;
use Bisarca\Graph\Identifier\IdentifierAwareTrait;
use Bisarca\Graph\Vertex\Set as VertexSet;

/**
 * Basic graph implementation.
 */
class Graph implements GraphInterface, IdentifierAwareInterface
{
    use Descriptor\DegreeTrait;
    use Descriptor\LoopTrait;
    use Descriptor\OrderTrait;
    use Descriptor\SizeTrait;
    use Edge\SetTrait;
    use IdentifierAwareTrait;
    use Vertex\SetTrait;

    /**
     * Vertices set.
     *
     * @var VertexSet
     */
    private $vertices;

    /**
     * Edges set.
     *
     * @var EdgeSet
     */
    private $edges;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        VertexSet $vertices = null,
        EdgeSet $edges = null
    ) {
        $this->setVertexSet($vertices ?: new VertexSet());
        $this->setEdgeSet($edges ?: new EdgeSet());
    }

    /**
     * {@inheritdoc}
     */
    public function getVertexSet(): VertexSet
    {
        return $this->vertices;
    }

    /**
     * {@inheritdoc}
     */
    public function setVertexSet(VertexSet $vertices)
    {
        $this->vertices = $vertices;
    }

    /**
     * {@inheritdoc}
     */
    public function getEdgeSet(): EdgeSet
    {
        return $this->edges;
    }

    /**
     * {@inheritdoc}
     */
    public function setEdgeSet(EdgeSet $edges)
    {
        $this->edges = $edges;
    }
}
