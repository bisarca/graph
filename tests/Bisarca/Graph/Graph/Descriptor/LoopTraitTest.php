<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Graph\Descriptor;

use Bisarca\Graph\Edge\Set;
use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Graph\Descriptor\LoopTrait
 * @group unit
 */
class LoopTraitTest extends TestCase
{
    use LoopTraitTestTrait;

    /**
     * @var SetTrait
     */
    protected $object;

    /**
     * @var Set
     */
    protected $edgeSet;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = $this->getMockForTrait(LoopTrait::class);
        $this->edgeSet = new Set();

        $this->object
            ->method('getEdgeSet')
            ->willReturn($this->edgeSet);
    }
}
