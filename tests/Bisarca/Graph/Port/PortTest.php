<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Port;

use PHPUnit\Framework\TestCase;
use ReflectionProperty;

/**
 * @covers Bisarca\Graph\Port\Port
 * @group unit
 */
class PortTest extends TestCase
{
    /**
     * @var Port
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = new Port('');
    }

    public function testConstruct()
    {
        $name = sha1(mt_rand());

        $port = new Port($name);

        $property = new ReflectionProperty(Port::class, 'name');
        $property->setAccessible(true);

        $this->assertSame($name, $property->getValue($port));
    }

    public function testSetName()
    {
        $name = sha1(mt_rand());

        $this->object->setName($name);

        $property = new ReflectionProperty(Port::class, 'name');
        $property->setAccessible(true);

        $this->assertSame($name, $property->getValue($this->object));
    }

    /**
     * @depends testSetName
     */
    public function testGetName()
    {
        $name = sha1(mt_rand());

        $this->object->setName($name);

        $this->assertSame($name, $this->object->getName());
    }
}
