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

use Exception;

/**
 * Exception for degrees related method.
 */
class DegreeException extends Exception implements ExceptionInterface
{
    /**
     * Creates an exception for not regular graphs.
     *
     * @param int $graphDegree
     * @param int $vertexDegree
     *
     * @return DegreeException
     */
    public static function createForNotRegular(
        int $graphDegree,
        int $vertexDegree
    ): DegreeException {
        return new self(sprintf(
            'Graph is not regular (e.g. %d and %d).',
            $graphDegree,
            $vertexDegree
        ));
    }

    /**
     * Creates an exception for empty graphs.
     *
     * @return DegreeException
     */
    public static function createForEmpty(): DegreeException
    {
        return new self('Graph is empty.');
    }
}
