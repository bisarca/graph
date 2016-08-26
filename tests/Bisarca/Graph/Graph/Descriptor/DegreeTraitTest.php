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
use Bisarca\Graph\Vertex\Set as VertexSet;
use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Graph\Descriptor\DegreeTrait
 * @group unit
 */
class DegreeTraitTest extends TestCase
{
    use DegreeTraitTestTrait;

    /**
     * @var SetTrait
     */
    protected $object;

    /**
     * @var EdgeSet
     */
    protected $edgeSet;

    /**
     * @var VertexSet
     */
    protected $vertexSet;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = $this->getMockForTrait(DegreeTrait::class);
        $this->edgeSet = new EdgeSet();
        $this->vertexSet = new VertexSet();

        $this->object
            ->method('getEdgeSet')
            ->willReturn($this->edgeSet);

        $this->object
            ->method('getVertexSet')
            ->willReturn($this->vertexSet);
    }
}
