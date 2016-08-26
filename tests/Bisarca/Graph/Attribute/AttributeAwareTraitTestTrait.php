<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Attribute;

use ReflectionException;
use ReflectionProperty;

trait AttributeAwareTraitTestTrait
{
    public function testSetAttribute()
    {
        $key = mt_rand();
        $value = mt_rand();

        $this->object->setAttribute($key, $value);

        try {
            $property = new ReflectionProperty(
                get_class($this->object),
                'attributes'
            );
        } catch (ReflectionException $exception) {
            // don't complete the test if invoked on the trait
            return;
        }

        $property->setAccessible(true);

        $attributes = $property->getValue($this->object);
        $this->assertArrayHasKey($key, $attributes);
        $this->assertSame($value, $attributes[$key]);
    }

    public function testHasAttribute()
    {
        $this->assertFalse($this->object->hasAttribute('undefined'));

        $key = mt_rand();

        $this->object->setAttribute($key, mt_rand());
        $this->assertTrue($this->object->hasAttribute($key));
    }

    /**
     * @depends testHasAttribute
     * @depends testSetAttribute
     */
    public function testRemoveAttribute()
    {
        $key = mt_rand();

        $this->object->setAttribute($key, mt_rand());

        $this->object->removeAttribute($key);
        $this->assertFalse($this->object->hasAttribute($key));
    }

    /**
     * @depends testRemoveAttribute
     * @depends testSetAttribute
     */
    public function testGetAttribute()
    {
        $default = mt_rand();
        $this->assertSame(
            $default,
            $this->object->getAttribute('undefined', $default)
        );

        $key = mt_rand();
        $value = mt_rand();

        $this->object->setAttribute($key, $value);

        $this->assertSame($value, $this->object->getAttribute($key));

        $this->object->removeAttribute($key);
        $this->assertNull($this->object->getAttribute($key));
    }

    /**
     * @depends testSetAttribute
     */
    public function testGetAttributes()
    {
        $attributes = $this->object->getAttributes();

        $this->assertInternalType('array', $attributes);
        $this->assertEmpty($attributes);

        $key = mt_rand();
        $value = mt_rand();

        $this->object->setAttribute($key, $value);

        $attributes = $this->object->getAttributes();
        $this->assertArrayHasKey($key, $attributes);
        $this->assertSame($value, $attributes[$key]);
    }

    /**
     * @depends testGetAttributes
     */
    public function testClearAttributes()
    {
        $this->object->setAttribute(mt_rand(), mt_rand());
        $this->assertNotEmpty($this->object->getAttributes());

        $this->object->clearAttributes();

        $this->assertEmpty($this->object->getAttributes());
    }

    /**
     * @depends testSetAttribute
     */
    public function testIsEmptyAttributes()
    {
        $this->assertFalse($this->object->isEmptyAttributes());

        $this->object->setAttribute(mt_rand(), mt_rand());
        $this->assertTrue($this->object->isEmptyAttributes());
    }
}
