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

use Bisarca\Graph\AbstractSetTest;
use ReflectionProperty;

/**
 * @covers Bisarca\Graph\Edge\Set
 * @group unit
 */
class SetTest extends AbstractSetTest
{
    /**
     * @var Set
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = new Set();
    }

    protected function getElement()
    {
        return $this->createMock(EdgeInterface::class);
    }

    public function testConstruct()
    {
        $edge = $this->getElement();

        $property = new ReflectionProperty(Set::class, 'data');
        $property->setAccessible(true);

        $set = new Set($edge);
        $this->assertSame([$edge], $property->getValue($set));

        $set = new Set($edge, $edge);
        $this->assertSame([$edge, $edge], $property->getValue($set));
    }

    public function testSet(array $edges = [])
    {
        $edge = $this->getElement();

        $property = new ReflectionProperty(Set::class, 'data');
        $property->setAccessible(true);

        $this->object->set($edge);
        $this->assertSame([$edge], $property->getValue($this->object));

        $this->object->set($edge, $edge);
        $this->assertSame([$edge, $edge], $property->getValue($this->object));
    }

    /**
     * @depends testConstruct
     * @depends testSet
     */
    public function testAdd()
    {
        $edge1 = $this->getElement();
        $edge2 = $this->getElement();

        $property = new ReflectionProperty(Set::class, 'data');
        $property->setAccessible(true);

        $this->object->set($edge1);

        $this->object->add($edge2);
        $this->assertSame([$edge1, $edge2], $property->getValue($this->object));
    }

    /**
     * @depends testSet
     */
    public function testHas()
    {
        $edge = $this->getElement();

        $this->assertFalse($this->object->has($edge));

        $this->object->set($edge);
        $this->assertTrue($this->object->has($edge));

        $edge1 = $this->getElement();
        $this->assertFalse($this->object->has($edge1));
    }

    /**
     * @depends testHas
     * @depends testSet
     */
    public function testRemove()
    {
        $edge = $this->getElement();

        $this->object->set($edge);
        $this->assertTrue($this->object->has($edge));

        $this->object->remove($edge);

        $this->assertFalse($this->object->has($edge));
    }
}
