<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Edge\Descriptor;

use Bisarca\Graph\Vertex\VertexInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Edge\Descriptor\LoopTrait
 */
class LoopTraitTest extends TestCase
{
    /**
     * @dataProvider isLoopDataProvider
     */
    public function testIsLoop($edge, bool $expected)
    {
        $this->assertSame($expected, $edge->isLoop());
    }

    /**
     * @return array
     */
    public function isLoopDataProvider(): array
    {
        $edge1 = $this->getMockForTrait(LoopTrait::class);
        $edge1
            ->expects($this->once())
            ->method('hasVertexStart')
            ->willReturn(false);
        $edge1
            ->expects($this->never())
            ->method('hasVertexEnd');

        $edge2 = $this->getMockForTrait(LoopTrait::class);
        $edge2
            ->expects($this->once())
            ->method('hasVertexStart')
            ->willReturn(true);
        $edge2
            ->expects($this->once())
            ->method('hasVertexEnd')
            ->willReturn(false);
        $edge2
            ->expects($this->never())
            ->method('getVertexStart');

        $edge3 = $this->getMockForTrait(LoopTrait::class);
        $edge3
            ->expects($this->once())
            ->method('hasVertexStart')
            ->willReturn(true);
        $edge3
            ->expects($this->once())
            ->method('hasVertexEnd')
            ->willReturn(true);
        $edge3
            ->expects($this->once())
            ->method('getVertexStart')
            ->willReturn($this->getMock(VertexInterface::class));
        $edge3
            ->expects($this->once())
            ->method('getVertexEnd')
            ->willReturn($this->getMock(VertexInterface::class));

        $edge4 = $this->getMockForTrait(LoopTrait::class);
        $edge4
            ->expects($this->once())
            ->method('hasVertexStart')
            ->willReturn(true);
        $edge4
            ->expects($this->once())
            ->method('hasVertexEnd')
            ->willReturn(true);

        $vertex = $this->getMock(VertexInterface::class);

        $edge4
            ->expects($this->once())
            ->method('getVertexStart')
            ->willReturn($vertex);
        $edge4
            ->expects($this->once())
            ->method('getVertexEnd')
            ->willReturn($vertex);

        return [
            [$edge1, false],
            [$edge2, false],
            [$edge3, false],
            [$edge4, true],
        ];
    }
}
