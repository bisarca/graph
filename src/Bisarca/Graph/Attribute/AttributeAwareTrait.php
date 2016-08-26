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

/**
 * Trait to facilitate attributes implementation.
 */
trait AttributeAwareTrait
{
    /**
     * Contained attributes.
     *
     * @var array
     */
    private $attributes = [];

    /**
     * {@inheritdoc}
     */
    public function setAttribute(string $name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttribute(string $name, $default = null)
    {
        return $this->attributes[$name] ?? $default;
    }

    /**
     * {@inheritdoc}
     */
    public function removeAttribute(string $name)
    {
        unset($this->attributes[$name]);
    }

    /**
     * {@inheritdoc}
     */
    public function hasAttribute(string $name): bool
    {
        return isset($this->attributes[$name]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function clearAttributes()
    {
        $this->attributes = [];
    }

    /**
     * {@inheritdoc}
     */
    public function isEmptyAttributes(): bool
    {
        return !empty($this->attributes);
    }
}
