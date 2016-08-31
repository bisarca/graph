<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Identifier;

use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Identifier\IdentifierAwareTrait
 * @group unit
 */
class IdentifierAwareTraitTest extends TestCase
{
    use IdentifierAwareTraitTestTrait;

    /**
     * @var IdentifierAwareTrait
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = $this->getMockForTrait(IdentifierAwareTrait::class);
    }
}
