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

use Bisarca\Graph\AbstractSetTest;
use Bisarca\Graph\Graph;
use ReflectionProperty;

/**
 * @covers Bisarca\Graph\Vertex\Set
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
        return mt_rand(0, 1)
            ? $this->createMock(VertexInterface::class)
            : $this->createMock(Graph::class);
    }

    public function testConstruct()
    {
        $vertex = $this->getElement();

        $property = new ReflectionProperty(Set::class, 'data');
        $property->setAccessible(true);

        $set = new Set($vertex);
        $this->assertSame([$vertex], $property->getValue($set));

        $set = new Set($vertex, $vertex);
        $this->assertSame([$vertex, $vertex], $property->getValue($set));
    }

    public function testSet(array $vertices = [])
    {
        $vertex = $this->getElement();

        $property = new ReflectionProperty(Set::class, 'data');
        $property->setAccessible(true);

        $this->object->set($vertex);
        $this->assertSame([$vertex], $property->getValue($this->object));

        $this->object->set($vertex, $vertex);
        $this->assertSame(
            [$vertex, $vertex],
            $property->getValue($this->object)
        );
    }

    /**
     * @depends testConstruct
     * @depends testSet
     */
    public function testAdd()
    {
        $vertex1 = $this->getElement();
        $vertex2 = $this->getElement();

        $property = new ReflectionProperty(Set::class, 'data');
        $property->setAccessible(true);

        $this->object->set($vertex1);

        $this->object->add($vertex2);
        $this->assertSame(
            [$vertex1, $vertex2],
            $property->getValue($this->object)
        );
    }

    /**
     * @depends testSet
     */
    public function testGet()
    {
        $vertex = $this->getElement();

        $this->object->set($vertex);
        $this->assertSame([$vertex], $this->object->get());
    }

    /**
     * @depends testSet
     */
    public function testHas()
    {
        $vertex = $this->getElement();

        $this->assertFalse($this->object->has($vertex));

        $this->object->set($vertex);
        $this->assertTrue($this->object->has($vertex));

        $vertex1 = $this->getElement();
        $this->assertFalse($this->object->has($vertex1));
    }

    /**
     * @depends testHas
     * @depends testSet
     */
    public function testRemove()
    {
        $vertex = $this->getElement();

        $this->object->set($vertex);
        $this->assertTrue($this->object->has($vertex));

        $this->object->remove($vertex);

        $this->assertFalse($this->object->has($vertex));
    }
}
