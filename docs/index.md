The graph component is used to model graphs classes and entities in your
application.
It's based on the [Graph](https://en.wikipedia.org/wiki/Graph_(discrete_mathematics))
definition of Wikipedia.


Installation
============

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this library:

```bash
$ composer require bisarca/graph
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the Composer documentation.


Main classes
============

This library uses three main classes as defined in the Graph definition.


Graph
-----

A graph is an ordered pair of vertices and edges \\(G = (V,E)\\).

```php
use Bisarca\Graph\Edge\Set as Edges;
use Bisarca\Graph\Graph;
use Bisarca\Graph\Vertex\Set as Vertices;

$vertices = new Vertices();
$edges = new Edges();

// $graph = new Graph();
$graph = new Graph($vertices, $edges);
```

[Read more](graph.md).


Vertex
------

A vertex is just an identifier for a graph element.

```php
use Bisarca\Graph\Vertex\Vertex;

$vertex = new Vertex();
```

It should be used to define which are the objects a graph contains.

```php
use Bisarca\Graph\Vertex\Vertex;
use Bisarca\Graph\Vertex\VertexInterface;

class FileVertex extends Vertex {}

// or directly the interface

class FileVertex implements VertexInterface {}
```


Edge
----

An edge is a connection between two vertices.

```php
use Bisarca\Graph\Edge\Edge;
use Bisarca\Graph\Vertex\Vertex;

$vertex1 = new Vertex();
$vertex2 = new Vertex();

$edge = new Edge($vertex1, $vertex2);
```

Like the `Vertex` class, it should be used to define which are the connections
in your graph.

```php
use Bisarca\Graph\Edge\Edge;
use Bisarca\Graph\Edge\EdgeInterface;

class DirectoryEdge extends Edge {}

// or directly the interface

class DirectoryEdge implements EdgeInterface {}
```

[Read more](edge.md).
