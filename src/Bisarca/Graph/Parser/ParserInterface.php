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

use Bisarca\Graph\GraphInterface;

/**
 * Generic graph format parser interface.
 */
interface ParserInterface
{
    /**
     * Sets the content to be parsed.
     *
     * @param string $content
     */
    public function setContent(string $content);

    /**
     * Gets the content to be parsed.
     *
     * @return string
     */
    public function getContent(): string;

    /**
     * Parses the content.
     *
     * @return GraphInterface
     */
    public function parse(): GraphInterface;
}
