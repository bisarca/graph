<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Identifier;

trait IdentifierAwareTrait
{
    /**
     * Identifier.
     *
     * @var null|string
     */
    private $identifier;

    /**
     * Sets the identifier.
     *
     * @param string $identifier
     */
    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Checks if the element has an identifier.
     *
     * @return bool
     */
    public function hasIdentifier(): bool
    {
        return null !== $this->identifier;
    }

    /**
     * Gets the identifier.
     *
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }
}
