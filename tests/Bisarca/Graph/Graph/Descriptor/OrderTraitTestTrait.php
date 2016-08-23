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

use Bisarca\Graph\Vertex\VertexInterface;

trait OrderTraitTestTrait
{
    public function testGetOrder()
    {
        $this->assertSame(0, $this->object->getOrder());

        $vertex = $this->createMock(VertexInterface::class);

        if (isset($this->vertexSet)) {
            $this->vertexSet->add($vertex);
        } else {
            $this->object
                ->getVertexSet()
                ->add($vertex);
        }

        $this->assertSame(1, $this->object->getOrder());
    }
}
