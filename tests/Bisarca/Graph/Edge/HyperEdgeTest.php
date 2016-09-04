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

use Bisarca\Graph\Attribute\AttributeAwareTraitTestTrait;
use Bisarca\Graph\Edge\HyperEdge\EndpointInterface;
use Bisarca\Graph\Identifier\IdentifierAwareTraitTestTrait;
use Bisarca\Graph\Vertex\VertexInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Edge\HyperEdge
 * @group unit
 */
class HyperEdgeTest extends TestCase
{
    use AttributeAwareTraitTestTrait;
    use IdentifierAwareTraitTestTrait;

    /**
     * @var HyperEdge
     */
    protected $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = new HyperEdge();
    }

    /**
     * @dataProvider endpointsDataProvider
     */
    public function testConstruct(array $endpoints)
    {
        $object = new HyperEdge(...$endpoints);

        $this->assertSame($endpoints, $object->getEndpoints());
    }

    /**
     * @dataProvider endpointsDataProvider
     */
    public function testSetAndGetEndpoints(array $endpoints)
    {
        $this->object->setEndpoints(...$endpoints);

        $this->assertSame($endpoints, $this->object->getEndpoints());
    }

    /**
     * @return array
     */
    public function endpointsDataProvider(): array
    {
        $e1 = $this->createMock(EndpointInterface::class);
        $e2 = $this->createMock(EndpointInterface::class);
        $e3 = $this->createMock(EndpointInterface::class);

        return [
            [[]],
            [[$e1]],
            [[$e1, $e2]],
            [[$e1, $e2, $e3]],
        ];
    }

    /**
     * @dataProvider endpointsDataProvider
     */
    public function testGetVertexSet(array $endpoints)
    {
        $this->assertCount(0, $this->object->getVertexSet());

        foreach ($endpoints as $endpoint) {
            $endpoint
                ->expects($this->once())
                ->method('getVertex')
                ->willReturn($this->createMock(VertexInterface::class));
        }

        $this->object->setEndpoints(...$endpoints);

        $vertexSet = $this->object->getVertexSet();
        $this->assertCount(count($endpoints), $vertexSet);

        foreach ($vertexSet as $vertex) {
            $this->assertInstanceOf(VertexInterface::class, $vertex);
        }
    }
}
