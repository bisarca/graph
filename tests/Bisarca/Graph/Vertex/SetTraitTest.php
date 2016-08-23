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

use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Vertex\SetTrait
 */
class SetTraitTest extends TestCase
{
    use SetTraitTestTrait;

    /**
     * @var SetTrait
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = $this->getMockForTrait(SetTrait::class);

        $this->object
            ->method('getVertexSet')
            ->willReturn(new Set());
    }
}
