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
use Bisarca\Graph\Identifier\IdentifierAwareInterface;
use Bisarca\Graph\Identifier\IdentifierAwareTrait;
use Bisarca\Graph\Vertex\Set as VertexSet;
use Bisarca\Graph\Vertex\VertexInterface;

/**
 * Basic edge implementation.
 */
class Edge implements EdgeInterface, AttributeAwareInterface, IdentifierAwareInterface
{
    use AttributeAwareTrait;
    use Descriptor\LoopTrait;
    use IdentifierAwareTrait;

    /**
     * Starting vertex.
     *
     * @var VertexInterface|null
     */
    private $source;

    /**
     * Ending vertex.
     *
     * @var VertexInterface|null
     */
    private $target;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        VertexInterface $source = null,
        VertexInterface $target = null
    ) {
        $this->source = $source;
        $this->target = $target;
    }

    /**
     * {@inheritdoc}
     */
    public function hasSource(): bool
    {
        return null !== $this->source;
    }

    /**
     * {@inheritdoc}
     */
    public function getSource(): VertexInterface
    {
        return $this->source;
    }

    /**
     * {@inheritdoc}
     */
    public function setSource(VertexInterface $source)
    {
        $this->source = $source;
    }

    /**
     * {@inheritdoc}
     */
    public function hasTarget(): bool
    {
        return null !== $this->target;
    }

    /**
     * {@inheritdoc}
     */
    public function getTarget(): VertexInterface
    {
        return $this->target;
    }

    /**
     * {@inheritdoc}
     */
    public function setTarget(VertexInterface $target)
    {
        $this->target = $target;
    }

    /**
     * {@inheritdoc}
     */
    public function getVertexSet(): VertexSet
    {
        $vertices = [];
        if (null !== $this->source) {
            $vertices[] = $this->source;
        }
        if (null !== $this->target) {
            $vertices[] = $this->target;
        }

        return new VertexSet(...$vertices);
    }
}
