<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Parser;

use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Parser\TrivialParser
 */
class TrivialParserTest extends TestCase
{
    /**
     * @var TrivialParser
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = new TrivialParser();
    }

    /**
     * @group unit
     */
    public function testSetAndGetContent()
    {
        $this->assertEmpty($this->object->getContent());

        $content = sha1(mt_rand());

        $this->object->setContent($content);
        $this->assertSame($content, $this->object->getContent());
    }

    /**
     * @dataProvider parseDataProvider
     * @group functional
     */
    public function testParse(int $index)
    {
        $dir = __DIR__.'/TrivialParserTest/Fixtures/';

        $this->object->setContent(file_get_contents($dir.$index.'.tgf'));
        $this->assertEquals(require $dir.$index.'.php', $this->object->parse());
    }

    public function parseDataProvider()
    {
        for ($i = 1; $i < 4; ++$i) {
            yield [$i];
        }
    }
}
