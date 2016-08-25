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

use Bisarca\Graph\Attribute\AttributeAwareInterface;
use Bisarca\Graph\Attribute\AttributeAwareTrait;
use Countable;
use IteratorAggregate;
use Traversable;

/**
 * Abstract set of utilities for internal sets.
 */
abstract class AbstractSet implements AttributeAwareInterface, Countable, IteratorAggregate
{
    use AttributeAwareTrait;

    /**
     * Contained elements.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Gets the contained elements.
     *
     * @return array
     */
    public function get(): array
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator(): Traversable
    {
        yield from $this->data;
    }

    /**
     * Remove all contained elements.
     */
    public function clear()
    {
        $this->data = [];
    }

    /**
     * Checks if no elements are contained.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->data);
    }

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return count($this->data);
    }
}
