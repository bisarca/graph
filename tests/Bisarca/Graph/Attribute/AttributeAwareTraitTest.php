<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Attribute;

use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Attribute\AttributeAwareTrait
 */
class AttributeAwareTraitTest extends TestCase
{
    use AttributeAwareTraitTestTrait;

    /**
     * @var AttributeAwareTrait
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = $this->getMockForTrait(AttributeAwareTrait::class);
    }
}
