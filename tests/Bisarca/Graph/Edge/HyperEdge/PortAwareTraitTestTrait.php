<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Edge\HyperEdge;

use Bisarca\Graph\Port\PortInterface;

trait PortAwareTraitTestTrait
{
    public function testSetPort()
    {
        $this->object->setPort($this->createMock(PortInterface::class));
    }

    /**
     * @depends testSetPort
     */
    public function testHasPort()
    {
        $this->assertFalse($this->object->hasPort());

        $this->object->setPort($this->createMock(PortInterface::class));
        $this->assertTrue($this->object->hasPort());
    }

    /**
     * @depends testSetPort
     */
    public function testGetPort()
    {
        $port = $this->createMock(PortInterface::class);

        $this->object->setPort($port);

        $this->assertSame($port, $this->object->getPort());
    }

    /**
     * @depends testSetPort
     * @depends testHasPort
     */
    public function testRemovePort()
    {
        $this->object->setPort($this->createMock(PortInterface::class));
        $this->assertTrue($this->object->hasPort());

        $this->object->removePort();
        $this->assertFalse($this->object->hasPort());
    }
}
