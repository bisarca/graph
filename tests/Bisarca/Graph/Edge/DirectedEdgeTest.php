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

/**
 * @covers Bisarca\Graph\Edge\DirectedEdge
 * @group unit
 */
class DirectedEdgeTest extends EdgeTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = new DirectedEdge();
    }
}
