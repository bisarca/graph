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

use Bisarca\Graph\Exception\ExceptionInterface;
use Bisarca\Graph\Exception\GraphExceptionInterface;
use Bisarca\Graph\Graph;
use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Graph\Descriptor\DegreeException
 * @group unit
 */
class DegreeExceptionTest extends TestCase
{
    public function testCreateForNotRegular()
    {
        $graphDegree = mt_rand();
        $vertexDegree = mt_rand();
        $exception = DegreeException::createForNotRegular(
            $graphDegree,
            $vertexDegree
        );

        $this->assertInstanceOf(ExceptionInterface::class, $exception);
        $this->assertInstanceOf(GraphExceptionInterface::class, $exception);

        $this->expectException('Exception');
        $this->expectExceptionMessage(sprintf(
            'Graph is not regular (e.g. %d and %d).',
            $graphDegree,
            $vertexDegree
        ));

        throw $exception;
    }

    public function testCreateForEmpty()
    {
        $exception = DegreeException::createForEmpty();

        $this->assertInstanceOf(ExceptionInterface::class, $exception);
        $this->assertInstanceOf(GraphExceptionInterface::class, $exception);

        $this->expectException('Exception');
        $this->expectExceptionMessage('Graph is empty.');

        throw $exception;
    }
}
