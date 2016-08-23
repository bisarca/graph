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
use Bisarca\Graph\Vertex\VertexInterface;

/**
 * Basic edge implementation.
 */
class Edge implements EdgeInterface, AttributeAwareInterface
{
    use AttributeAwareTrait;
    use Descriptor\LoopTrait;

    /**
     * Starting vertex.
     *
     * @var VertexInterface|null
     */
    private $vertexStart;

    /**
     * Ending vertex.
     *
     * @var VertexInterface|null
     */
    private $vertexEnd;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        VertexInterface $vertexStart = null,
        VertexInterface $vertexEnd = null
    ) {
        $this->vertexStart = $vertexStart;
        $this->vertexEnd = $vertexEnd;
    }

    /**
     * {@inheritdoc}
     */
    public function hasVertexStart(): bool
    {
        return null !== $this->vertexStart;
    }

    /**
     * {@inheritdoc}
     */
    public function getVertexStart(): VertexInterface
    {
        return $this->vertexStart;
    }

    /**
     * {@inheritdoc}
     */
    public function setVertexStart(VertexInterface $vertexStart)
    {
        $this->vertexStart = $vertexStart;
    }

    /**
     * {@inheritdoc}
     */
    public function hasVertexEnd(): bool
    {
        return null !== $this->vertexEnd;
    }

    /**
     * {@inheritdoc}
     */
    public function getVertexEnd(): VertexInterface
    {
        return $this->vertexEnd;
    }

    /**
     * {@inheritdoc}
     */
    public function setVertexEnd(VertexInterface $vertexEnd)
    {
        $this->vertexEnd = $vertexEnd;
    }
}
