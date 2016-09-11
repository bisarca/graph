<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Builder;

use Bisarca\Graph\GraphInterface;

/**
 * Generic graph format builder interface.
 */
interface BuilderInterface
{
    /**
     * Sets the graph to build.
     *
     * @param GraphInterface $graph
     */
    public function setGraph(GraphInterface $graph);

    /**
     * Gets the graph to build.
     *
     * @return GraphInterface
     */
    public function getGraph(): GraphInterface;

    /**
     * Builds the graph.
     *
     * @return string
     */
    public function build(): string;
}
