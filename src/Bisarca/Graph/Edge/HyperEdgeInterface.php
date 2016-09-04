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

use Bisarca\Graph\Edge\HyperEdge\EndpointInterface;

/**
 * Hyperedges interface.
 */
interface HyperEdgeInterface extends GenericEdgeInterface
{
    /**
     * Constructor for required contained endpoints.
     *
     * @param EndpointInterface[] $endpoints
     */
    public function __construct(EndpointInterface ...$endpoints);

    /**
     * Sets the contained endpoints.
     *
     * @param EndpointInterface[] $endpoints
     */
    public function setEndpoints(EndpointInterface ...$endpoints);

    /**
     * Gets the contained endpoints.
     *
     * @return EndpointInterface[]
     */
    public function getEndpoints(): array;
}
