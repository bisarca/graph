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

use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Edge\PortAwareTrait
 * @group unit
 */
class PortAwareTraitTest extends TestCase
{
    use PortAwareTraitTestTrait;

    /**
     * @var PortAwareTrait
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = $this->getMockForTrait(PortAwareTrait::class);
    }
}
