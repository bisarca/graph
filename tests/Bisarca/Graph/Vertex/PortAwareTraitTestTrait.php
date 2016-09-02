<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Vertex;

use Bisarca\Graph\Port\PortInterface;

trait PortAwareTraitTestTrait
{
    public function testSetPorts()
    {
        $ports = array_fill(
            0,
            mt_rand(0, 10),
            $this->createMock(PortInterface::class)
        );

        $this->object->setPorts(...$ports);
    }

    public function testAddPorts()
    {
        $ports = array_fill(
            0,
            mt_rand(0, 10),
            $this->createMock(PortInterface::class)
        );

        $this->object->addPorts(...$ports);
    }

    /**
     * @depends testAddPorts
     */
    public function testHasPorts()
    {
        $port = $this->createMock(PortInterface::class);

        $this->assertFalse($this->object->hasPorts($port));

        $this->object->addPorts($port);
        $this->assertTrue($this->object->hasPorts($port));
    }

    /**
     * @depends testSetPorts
     */
    public function testGetPorts()
    {
        $ports = array_fill(
            0,
            mt_rand(0, 10),
            $this->createMock(PortInterface::class)
        );

        $this->object->setPorts(...$ports);
        $this->assertSame($ports, $this->object->getPorts());
    }

    /**
     * @depends testAddPorts
     * @depends testHasPorts
     */
    public function testRemovePorts()
    {
        $port = $this->createMock(PortInterface::class);
        $this->object->addPorts($port);

        $this->assertTrue($this->object->hasPorts($port));

        $this->object->removePorts($port);
        $this->assertFalse($this->object->hasPorts($port));
    }

    /**
     * @depends testSetPorts
     */
    public function testIsEmptyPorts()
    {
        $this->assertTrue($this->object->isEmptyPorts());

        $this->object->setPorts($this->createMock(PortInterface::class));
        $this->assertFalse($this->object->isEmptyPorts());
    }

    /**
     * @depends testSetPorts
     * @depends testIsEmptyPorts
     */
    public function testClearPorts()
    {
        $this->object->setPorts($this->createMock(PortInterface::class));
        $this->assertFalse($this->object->isEmptyPorts());

        $this->object->clearPorts();
        $this->assertTrue($this->object->isEmptyPorts());
    }
}
