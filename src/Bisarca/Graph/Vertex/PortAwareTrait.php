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

trait PortAwareTrait
{
    /**
     * Vertex ports.
     *
     * @var PortInterface[]
     */
    private $ports = [];

    /**
     * Sets vertex ports.
     *
     * @param PortInterface[] $ports
     */
    public function setPorts(PortInterface ...$ports)
    {
        $this->ports = $ports;
    }

    /**
     * Adds some vertex ports.
     *
     * @param PortInterface[] $ports
     */
    public function addPorts(PortInterface ...$ports)
    {
        $this->ports = array_merge($this->ports, $ports);
    }

    /**
     * Checks if the vertex has some ports.
     *
     * @param PortInterface[] $ports
     *
     * @return bool
     */
    public function hasPorts(PortInterface ...$ports): bool
    {
        $intersection = array_uintersect(
            $this->ports,
            $ports,
            function (PortInterface $a, PortInterface $b) {
                return $a !== $b;
            }
        );

        return count($intersection) === count($ports);
    }

    /**
     * Gets vertex ports.
     *
     * @return PortInterface[]
     */
    public function getPorts(): array
    {
        return $this->ports;
    }

    /**
     * Removes some ports.
     *
     * @param PortInterface $ports
     */
    public function removePorts(PortInterface ...$ports)
    {
        $this->ports = array_udiff(
            $this->ports,
            $ports,
            function (PortInterface $a, PortInterface $b) {
                return $a !== $b;
            }
        );
    }

    /**
     * Checks if the vertex has at least one port.
     *
     * @return bool
     */
    public function isEmptyPorts(): bool
    {
        return empty($this->ports);
    }

    /**
     * Removes all the ports.
     */
    public function clearPorts()
    {
        $this->ports = [];
    }
}
