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

use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Graph\Descriptor\DegreeTrait
 */
class DegreeTraitTest extends TestCase
{
    use DegreeTraitTestTrait;

    /**
     * @var SetTrait
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = $this->getMockForTrait(DegreeTrait::class);
    }
}
