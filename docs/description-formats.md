This library also supports different description formats for graphs.

Mainly there are 2 interfaces: a `ParserInterface` and a `BuilderInterface`, the 
first is used extract a `GraphInterface` from a file, the second is used to obtain
a file from a `GraphInterface`.

Currently supported formats are:


## Trivial Graph Format

The [Trivial Graph Format](https://en.wikipedia.org/wiki/Trivial_Graph_Format)
allows to transport only informations about vertices, directed edges and
related identifiers.

An example of this format is:

```
1 December
2 January
3 April
#
1 2 Happy New Year!
3 1
```

and the related Graph is:

```php
use Bisarca\Graph\Edge\DirectedEdge;
use Bisarca\Graph\Graph;
use Bisarca\Graph\Vertex\Vertex;

$graph = new Graph();

$v1 = new Vertex();
$v1->setIdentifier('December');

$v2 = new Vertex();
$v2->setIdentifier('January');

$v3 = new Vertex();
$v3->setIdentifier('April');

$graph->addVertices($v1, $v2, $v3);

$e1 = new DirectedEdge($v1, $v2);
$e1->setIdentifier('Happy New Year!');

$e2 = new DirectedEdge($v3, $v1);

$graph->addEdges($e1, $e2);
```

To pass from the tgf file to the `Graph` instance use the `TrivialParser`

```php
use Bisarca\Graph\Parser\TrivialParser;

$parser = new TrivialParser();

$parser->setContent(file_get_contents('example.tgf'));
$graph = $parser->parse();
```

and to pass from the `Graph` instance to the tgf file, use the `TrivialBuilder`

```php
use Bisarca\Graph\Builder\TrivialBuilder;

// $graph = new Graph();

$builder = new TrivialBuilder();
$builder->setGraph($graph);

file_put_contents('example.tgf', $builder->build());
```
