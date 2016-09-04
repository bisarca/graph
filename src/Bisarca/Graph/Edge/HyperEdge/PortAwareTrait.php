<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Edge\HyperEdge;

use Bisarca\Graph\Port\PortInterface;

/**
 * Interface for endpoints aware of ports.
 */
trait PortAwareTrait
{
    /**
     * Endpoint port.
     *
     * @var null|PortInterface
     */
    private $port;

    /**
     * Sets endpoint port.
     *
     * @param PortInterface $port
     */
    public function setPort(PortInterface $port)
    {
        $this->port = $port;
    }

    /**
     * Checks if the endpoint has a port.
     *
     * @return bool
     */
    public function hasPort(): bool
    {
        return null !== $this->port;
    }

    /**
     * Gets endpoint port.
     *
     * @return PortInterface
     */
    public function getPort(): PortInterface
    {
        return $this->port;
    }

    /**
     * Removes the port.
     */
    public function removePort()
    {
        $this->port = null;
    }
}
