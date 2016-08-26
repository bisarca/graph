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
 * Interface used to add secondary data to graph elements.
 */
interface AttributeAwareInterface
{
    /**
     * Sets a single attribute.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function setAttribute(string $name, $value);

    /**
     * Gets a single attribute, with a default value if not available.
     *
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getAttribute(string $name, $default = null);

    /**
     * Removes a single attribute.
     *
     * @param string $name
     */
    public function removeAttribute(string $name);

    /**
     * Checks if the attribute exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasAttribute(string $name): bool;

    /**
     * Gets all the attributes associated.
     *
     * @return array
     */
    public function getAttributes(): array;

    /**
     * Resets the contained attributes.
     */
    public function clearAttributes();

    /**
     * Checks if contains attributes.
     *
     * @return bool
     */
    public function isEmptyAttributes(): bool;
}
