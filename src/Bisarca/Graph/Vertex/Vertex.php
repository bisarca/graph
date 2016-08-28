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

use Bisarca\Graph\Attribute\AttributeAwareInterface;
use Bisarca\Graph\Attribute\AttributeAwareTrait;

/**
 * Basic vertex element implementation.
 */
class Vertex implements VertexInterface, AttributeAwareInterface
{
    use AttributeAwareTrait;
}
