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

use Bisarca\Graph\Vertex\Set;
use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Graph\Descriptor\OrderTrait
 * @group unit
 */
class OrderTraitTest extends TestCase
{
    use OrderTraitTestTrait;

    /**
     * @var SetTrait
     */
    protected $object;

    /**
     * @var Set
     */
    protected $vertexSet;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = $this->getMockForTrait(OrderTrait::class);
        $this->vertexSet = new Set();

        $this->object
            ->method('getVertexSet')
            ->willReturn($this->vertexSet);
    }
}
