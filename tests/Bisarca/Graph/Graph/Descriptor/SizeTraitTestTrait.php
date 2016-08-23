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

use Bisarca\Graph\Edge\EdgeInterface;

trait SizeTraitTestTrait
{
    public function testGetSize()
    {
        $this->assertSame(0, $this->object->getSize());

        $edge = $this->createMock(EdgeInterface::class);

        if (isset($this->edgeSet)) {
            $this->edgeSet->add($edge);
        } else {
            $this->object
                ->getEdgeSet()
                ->add($edge);
        }

        $this->assertSame(1, $this->object->getSize());
    }
}
