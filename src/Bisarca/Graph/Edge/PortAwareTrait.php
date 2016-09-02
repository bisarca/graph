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

trait PortAwareTrait
{
    /**
     * Source vertex port.
     *
     * @var null|PortInterface
     */
    private $sourcePort;

    /**
     * Target vertex port.
     *
     * @var null|PortInterface
     */
    private $targetPort;

    /**
     * Sets source vertex port.
     *
     * @param PortInterface $port
     */
    public function setSourcePort(PortInterface $port)
    {
        $this->sourcePort = $port;
    }

    /**
     * Checks if the edge has a port for the source vertex.
     *
     * @return bool
     */
    public function hasSourcePort(): bool
    {
        return null !== $this->sourcePort;
    }

    /**
     * Gets source vertex port.
     *
     * @return PortInterface
     */
    public function getSourcePort(): PortInterface
    {
        return $this->sourcePort;
    }

    /**
     * Removes the source vertex port.
     */
    public function removeSourcePort()
    {
        $this->sourcePort = null;
    }

    /**
     * Sets target vertex port.
     *
     * @param PortInterface $port
     */
    public function setTargetPort(PortInterface $port)
    {
        $this->targetPort = $port;
    }

    /**
     * Checks if the edge has a port for the target vertex.
     *
     * @return bool
     */
    public function hasTargetPort(): bool
    {
        return null !== $this->targetPort;
    }

    /**
     * Gets target vertex port.
     *
     * @return PortInterface
     */
    public function getTargetPort(): PortInterface
    {
        return $this->targetPort;
    }

    /**
     * Removes the target vertex port.
     */
    public function removeTargetPort()
    {
        $this->targetPort = null;
    }
}
