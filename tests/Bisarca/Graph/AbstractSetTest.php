<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph;

use Bisarca\Graph\Attribute\AttributeAwareTraitTestTrait;
use Bisarca\Graph\Identifier\IdentifierAwareTraitTestTrait;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Traversable;

/**
 * @covers Bisarca\Graph\AbstractSet
 * @group unit
 */
class AbstractSetTest extends TestCase
{
    use AttributeAwareTraitTestTrait;
    use IdentifierAwareTraitTestTrait;

    /**
     * @var AbstractSet
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = $this->getMockForAbstractClass(AbstractSet::class);
    }

    protected function getElement()
    {
        return new \stdClass();
    }

    public function testGetIterator()
    {
        $this->assertInstanceOf(
            Traversable::class,
            $this->object->getIterator()
        );
    }

    public function testClear()
    {
        $element = $this->getElement();

        $this->add($element);
        $this->assertCount(1, $this->object);

        $this->object->clear();
        $this->assertCount(0, $this->object);
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->object->isEmpty());

        $element = $this->getElement();

        $this->add($element);
        $this->assertFalse($this->object->isEmpty());
    }

    public function testCount()
    {
        $this->assertSame(0, $this->object->count());
        $this->assertCount(0, $this->object);

        $element = $this->getElement();

        $this->add($element);
        $this->add($element);

        $this->assertSame(2, $this->object->count());
        $this->assertCount(2, $this->object);
    }

    public function testGet()
    {
        $element1 = $this->getElement();
        $element2 = $this->getElement();

        $this->add($element1);
        $this->add($element2);

        $this->assertSame(
            [$element1, $element2],
            $this->object->get()
        );
    }

    private function add($element)
    {
        $reflection = new ReflectionClass($this->object);
        $property = $reflection->getProperty('data');
        $property->setAccessible(true);

        $data = $property->getValue($this->object);
        $data[] = $element;

        $property->setValue($this->object, $data);
    }
}
