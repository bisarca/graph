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

use Bisarca\Graph\Edge\Set as EdgeSet;
use Bisarca\Graph\Graph\Exception\DegreeException;
use Bisarca\Graph\Vertex\Set as VertexSet;
use Bisarca\Graph\Vertex\VertexInterface;

/**
 * Utilities related to vertex and graph degree.
 */
trait DegreeTrait
{
    /**
     * Gets the edges set.
     *
     * @return EdgeSet
     */
    abstract public function getEdgeSet(): EdgeSet;

    /**
     * Gets the vertices set.
     *
     * @return VertexSet
     */
    abstract public function getVertexSet(): VertexSet;

    /**
     * Gets vertex degree.
     *
     * @param VertexInterface $vertex
     *
     * @return int
     */
    public function getVertexDegree(VertexInterface $vertex): int
    {
        return $this->getVertexInDegree($vertex) + $this->getVertexOutDegree($vertex);
    }

    /**
     * Gets vertex in degree.
     *
     * @param VertexInterface $vertex
     *
     * @return int
     */
    public function getVertexInDegree(VertexInterface $vertex): int
    {
        $counter = 0;

        foreach ($this->getEdgeSet() as $edge) {
            $counter += $edge->hasTarget() && $vertex === $edge->getTarget();
        }

        return $counter;
    }

    /**
     * Gets vertex out degree.
     *
     * @param VertexInterface $vertex
     *
     * @return int
     */
    public function getVertexOutDegree(VertexInterface $vertex): int
    {
        $counter = 0;

        foreach ($this->getEdgeSet() as $edge) {
            $counter += $edge->hasSource() && $vertex === $edge->getSource();
        }

        return $counter;
    }

    /**
     * Gets maximum degree.
     *
     * @return int
     */
    public function getMaxDegree(): int
    {
        $maximum = 0;

        foreach ($this->getVertexSet() as $vertex) {
            $maximum = max($maximum, $this->getVertexDegree($vertex));
        }

        return $maximum;
    }

    /**
     * Gets minimum degree.
     *
     * @return int
     */
    public function getMinDegree(): int
    {
        $minimum = PHP_INT_MAX;

        foreach ($this->getVertexSet() as $vertex) {
            $minimum = min($minimum, $this->getVertexDegree($vertex));
        }

        return $minimum;
    }

    /**
     * Checks if vertex is isolated.
     *
     * @param VertexInterface $vertex
     *
     * @return bool
     */
    public function isIsolatedVertex(VertexInterface $vertex): bool
    {
        return 0 === $this->getVertexDegree($vertex);
    }

    /**
     * Checks if vertex is a leaf.
     *
     * @param VertexInterface $vertex
     *
     * @return bool
     */
    public function isLeafVertex(VertexInterface $vertex): bool
    {
        return 1 === $this->getVertexDegree($vertex);
    }

    /**
     * Checks if vertex is dominating.
     *
     * @param VertexInterface $vertex
     *
     * @return bool
     */
    public function isDominatingVertex(VertexInterface $vertex): bool
    {
        return (count($this->getVertexSet()) - 1) === $this->getVertexDegree($vertex);
    }

    /**
     * Gets graph degree.
     *
     * @throws DegreeException If the graph isn't k-regular
     * @throws DegreeException If the graph doesn't contain vertices
     *
     * @return int
     */
    public function getDegree(): int
    {
        $graphDegree = null;

        foreach ($this->getVertexSet() as $vertex) {
            $vertexDegree = $this->getVertexDegree($vertex);

            if (null === $graphDegree) {
                $graphDegree = $vertexDegree;
            }

            if ($vertexDegree !== $graphDegree) {
                throw DegreeException::createForNotRegular($graphDegree, $vertexDegree);
            }
        }

        if (null === $graphDegree) {
            throw DegreeException::createForEmpty();
        }

        return $graphDegree;
    }

    /**
     * Checks if the graph is regular.
     *
     * @return bool
     */
    public function isRegular(): bool
    {
        try {
            $this->getDegree();

            return true;
        } catch (DegreeException $exception) {
            return false;
        }
    }

    /**
     * Has a defined regularity.
     *
     * @param int $regularity
     *
     * @return bool
     */
    public function hasRegularity(int $regularity): bool
    {
        try {
            return $regularity === $this->getDegree();
        } catch (DegreeException $exception) {
            return false;
        }
    }

    /**
     * Checks if all the vertices have the same value for in-degree and out-degree.
     *
     * @return bool
     */
    public function isBalanced(): bool
    {
        $balanced = true;

        foreach ($this->getVertexSet() as $vertex) {
            $balanced = $balanced && $this->getVertexInDegree($vertex) === $this->getVertexOutDegree($vertex);
        }

        return $balanced;
    }

    /**
     * Checks if a graph is cubic.
     *
     * @return bool
     */
    public function isCubic(): bool
    {
        return $this->hasRegularity(3);
    }
}
