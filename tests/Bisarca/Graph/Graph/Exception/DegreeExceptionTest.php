<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bisarca\Graph\Graph\Exception;

use Bisarca\Graph\Exception\ExceptionInterface as BaseExceptionInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Bisarca\Graph\Graph\Exception\DegreeException
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

        $this->assertInstanceOf(BaseExceptionInterface::class, $exception);
        $this->assertInstanceOf(ExceptionInterface::class, $exception);

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

        $this->assertInstanceOf(BaseExceptionInterface::class, $exception);
        $this->assertInstanceOf(ExceptionInterface::class, $exception);

        $this->expectException('Exception');
        $this->expectExceptionMessage('Graph is empty.');

        throw $exception;
    }
}
