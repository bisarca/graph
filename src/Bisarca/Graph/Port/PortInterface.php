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

/**
 * Port interface.
 */
interface PortInterface
{
    /**
     * Initializes the required port name.
     *
     * @param string $name
     */
    public function __construct(string $name);

    /**
     * Sets the port name.
     *
     * @param string $name
     */
    public function setName(string $name);

    /**
     * Gets the port name.
     *
     * @return string
     */
    public function getName(): string;
}
