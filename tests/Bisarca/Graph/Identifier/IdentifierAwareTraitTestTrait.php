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

trait IdentifierAwareTraitTestTrait
{
    public function testSetAndGetIdentifier()
    {
        $id = sha1(mt_rand());

        $this->object->setIdentifier($id);

        $this->assertSame($id, $this->object->getIdentifier());
    }

    /**
     * @depends testSetAndGetIdentifier
     */
    public function testHasIdentifier()
    {
        $this->assertFalse($this->object->hasIdentifier());

        $this->object->setIdentifier(sha1(mt_rand()));
        $this->assertTrue($this->object->hasIdentifier());
    }
}
