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

use Bisarca\Graph\Port\PortInterface;

trait PortAwareTraitTestTrait
{
    public function testSetSourcePort()
    {
        $this->object->setSourcePort($this->createMock(PortInterface::class));
    }

    /**
     * @depends testSetSourcePort
     */
    public function testHasSourcePort()
    {
        $this->assertFalse($this->object->hasSourcePort());

        $this->object->setSourcePort($this->createMock(PortInterface::class));
        $this->assertTrue($this->object->hasSourcePort());
    }

    /**
     * @depends testSetSourcePort
     */
    public function testGetSourcePort()
    {
        $port = $this->createMock(PortInterface::class);

        $this->object->setSourcePort($port);
        $this->assertSame($port, $this->object->getSourcePort());
    }

    /**
     * @depends testSetSourcePort
     * @depends testHasSourcePort
     */
    public function testRemoveSourcePort()
    {
        $this->object->setSourcePort($this->createMock(PortInterface::class));
        $this->assertTrue($this->object->hasSourcePort());

        $this->object->removeSourcePort();
        $this->assertFalse($this->object->hasSourcePort());
    }

    public function testSetTargetPort()
    {
        $this->object->setTargetPort($this->createMock(PortInterface::class));
    }

    /**
     * @depends testSetTargetPort
     */
    public function testHasTargetPort()
    {
        $this->assertFalse($this->object->hasTargetPort());

        $this->object->setTargetPort($this->createMock(PortInterface::class));
        $this->assertTrue($this->object->hasTargetPort());
    }

    /**
     * @depends testSetTargetPort
     */
    public function testGetTargetPort()
    {
        $port = $this->createMock(PortInterface::class);

        $this->object->setTargetPort($port);
        $this->assertSame($port, $this->object->getTargetPort());
    }

    /**
     * @depends testSetTargetPort
     * @depends testHasTargetPort
     */
    public function testRemoveTargetPort()
    {
        $this->object->setTargetPort($this->createMock(PortInterface::class));
        $this->assertTrue($this->object->hasTargetPort());

        $this->object->removeTargetPort();
        $this->assertFalse($this->object->hasTargetPort());
    }
}
