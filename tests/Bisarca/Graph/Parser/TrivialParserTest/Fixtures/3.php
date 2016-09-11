<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Bisarca\Graph\Graph;
use Bisarca\Graph\Vertex\Vertex;

$graph = new Graph();

$v1 = new Vertex();
$v1->setIdentifier('January');

$v2 = new Vertex();
$v2->setIdentifier('March');

$v3 = new Vertex();
$v3->setIdentifier('April');

$v4 = new Vertex();
$v4->setIdentifier('May');

$v5 = new Vertex();
$v5->setIdentifier('December');

$v6 = new Vertex();
$v6->setIdentifier('June');

$v7 = new Vertex();
$v7->setIdentifier('September');

$graph->addVertices($v1, $v2, $v3, $v4, $v5, $v6, $v7);

return $graph;
