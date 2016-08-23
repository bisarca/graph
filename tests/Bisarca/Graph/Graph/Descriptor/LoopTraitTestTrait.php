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

use Bisarca\Graph\Edge\Edge;
use Bisarca\Graph\Vertex\VertexInterface;

trait LoopTraitTestTrait
{
    public function testHasLoop()
    {
        $this->assertFalse($this->object->hasLoop());

        $vertex = $this->createMock(VertexInterface::class);

        if (isset($this->edgeSet)) {
            $this->edgeSet->add(new Edge($vertex, $vertex));
        } else {
            $this->object
                ->getEdgeSet()
                ->add(new Edge($vertex, $vertex));
        }

        $this->assertTrue($this->object->hasLoop());
    }

    public function testHasLoopOn()
    {
        $vertex = $this->createMock(VertexInterface::class);

        $this->assertFalse($this->object->hasLoopOn($vertex));

        if (isset($this->edgeSet)) {
            $this->edgeSet->add(new Edge($vertex, $vertex));
        } else {
            $this->object
                ->getEdgeSet()
                ->add(new Edge($vertex, $vertex));
        }

        $this->assertTrue($this->object->hasLoopOn($vertex));

        $vertex1 = $this->createMock(VertexInterface::class);
        $this->assertFalse($this->object->hasLoopOn($vertex1));
    }
}
