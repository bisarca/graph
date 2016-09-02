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

use Bisarca\Graph\Port\PortInterface;

/**
 * Interface for vertices aware of ports.
 */
interface PortAwareInterface
{
    /**
     * Sets vertex ports.
     *
     * @param PortInterface[] $ports
     */
    public function setPorts(PortInterface ...$ports);

    /**
     * Adds some vertex ports.
     *
     * @param PortInterface[] $ports
     */
    public function addPorts(PortInterface ...$ports);

    /**
     * Checks if the vertex has some ports.
     *
     * @param PortInterface[] $ports
     *
     * @return bool
     */
    public function hasPorts(PortInterface ...$ports): bool;

    /**
     * Gets vertex ports.
     *
     * @return PortInterface[]
     */
    public function getPorts(): array;

    /**
     * Removes some ports.
     *
     * @param PortInterface $ports
     */
    public function removePorts(PortInterface ...$ports);

    /**
     * Checks if the vertex has at least one port.
     *
     * @return bool
     */
    public function isEmptyPorts(): bool;

    /**
     * Removes all the ports.
     */
    public function clearPorts();
}
