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

use Bisarca\Graph\Attribute\AttributeAwareTraitTestTrait;
use Bisarca\Graph\Identifier\IdentifierAwareTraitTestTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Vertex\Vertex
 * @group unit
 */
class VertexTest extends TestCase
{
    use AttributeAwareTraitTestTrait;
    use IdentifierAwareTraitTestTrait;
    use PortAwareTraitTestTrait;

    /**
     * @var Vertex
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = new Vertex();
    }
}
