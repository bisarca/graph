<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Edge;

use Bisarca\Graph\Port\PortInterface;

/**
 * Directed or undirected edge aware of ports.
 */
interface PortAwareInterface extends EdgeInterface
{
    /**
     * Sets source vertex port.
     *
     * @param PortInterface $port
     */
    public function setSourcePort(PortInterface $port);

    /**
     * Checks if the edge has a port for the source vertex.
     *
     * @return bool
     */
    public function hasSourcePort(): bool;

    /**
     * Gets source vertex port.
     *
     * @return PortInterface
     */
    public function getSourcePort(): PortInterface;

    /**
     * Removes the source vertex port.
     */
    public function removeSourcePort();

    /**
     * Sets target vertex port.
     *
     * @param PortInterface $port
     */
    public function setTargetPort(PortInterface $port);

    /**
     * Checks if the edge has a port for the target vertex.
     *
     * @return bool
     */
    public function hasTargetPort(): bool;

    /**
     * Gets target vertex port.
     *
     * @return PortInterface
     */
    public function getTargetPort(): PortInterface;

    /**
     * Removes the target vertex port.
     */
    public function removeTargetPort();
}
