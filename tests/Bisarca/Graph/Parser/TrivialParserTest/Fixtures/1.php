<?php

/*
 * This file is part of the bisarca/graph package.
 *
 * (c) Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Bisarca\Graph\Edge\DirectedEdge;
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

$e1 = new DirectedEdge($v1, $v2);
$e2 = new DirectedEdge($v3, $v2);
$e3 = new DirectedEdge($v4, $v3);
$e4 = new DirectedEdge($v5, $v1);
$e4->setIdentifier('Happy New Year!');

$e5 = new DirectedEdge($v5, $v3);
$e5->setIdentifier('April Fools Day');

$e6 = new DirectedEdge($v6, $v3);
$e7 = new DirectedEdge($v6, $v1);
$e8 = new DirectedEdge($v7, $v5);
$e9 = new DirectedEdge($v7, $v6);
$e10 = new DirectedEdge($v7, $v1);

$graph->addEdges($e1, $e2, $e3, $e4, $e5, $e6, $e7, $e8, $e9, $e10);

return $graph;
