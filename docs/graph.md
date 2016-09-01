A graph is an ordered pair of vertices and edges \\(G = (V,E)\\).

The graph class is generally the main class you'll use, you can use both the
default `Graph` class or the `GraphInterface` interface.

A graph always contains a set of vertices \\(V\\) that you're free to set or get,
and contains a set of edges \\(E\\) you can approach in the same way:

```php
use Bisarca\Graph\Graph;

$graph = new Graph();

// e.g. add a new vertex to the set

$vertices = $graph->getVertexSet(); // Bisarca\Graph\Vertex\Set

$vertices->add(new Vertex());

$graph->setVertexSet($vertices);

// e.g. add a new vertex to the set

$edges = $graph->getEdgeSet(); // Bisarca\Graph\Edge\Set

$edges->add(new Edge());

$graph->setEdgeSet($edges);
```

When a graph is defined, it generally already contains these sets, so you can do:

```php
use Bisarca\Graph\Edge\Set as Edges;
use Bisarca\Graph\Graph;
use Bisarca\Graph\Vertex\Set as Vertices;

$vertices = new Vertices();
$edges = new Edges();

$graph = new Graph($vertices, $edges);
```

You can also attach nested graphs, because a graph can be considered a vertex too.
**Attention:** only the basic implementation is considered a vertex, if you
want to declare your graph as a vertex you'll need to implement both the `GraphInterface` and the `VertexInterface`.

```php
use Bisarca\Graph\Graph;

$vertices = $graph->getVertexSet(); // Bisarca\Graph\Vertex\Set

$vertices->add(new Graph());

$graph->setVertexSet($vertices);
```


## Descriptors

The `Graph` class contains many method those help to describe the graph itself.


### Loop

A graph also offers a way to check if it contains a loop.

```php
// $graph1 contains a loop on $vertex1
// $graph2 doesn't contain a loop

var_dump(
    $graph1->hasLoop(),           // bool(true)
    $graph1->hasLoopOn($vertex1), // bool(true)
    $graph1->hasLoopOn($vertex2), // bool(false)
    $graph2->hasLoop(),           // bool(false)
    $graph2->hasLoopOn($vertex1)  // bool(false)
);

```


### Size

The size of a graph \\(G\\) is the number of its edges, \\(|E(G)|\\).

```php
// graph with 5 edges

$size = $graph->getSize();
// $size === 5
```

See also [order](#order), the number of vertices.


### Order

The order of a graph \\(G\\) is the number of its vertices, \\(|V(G)|\\).

```php
// graph with 6 vertices

$order = $graph->getOrder();
// $order === 6
```

See also [size](#size), the number of edges.


### Degree

To know what the following methods will do, read the [graphs degree page on Wikipedia](https://en.wikipedia.org/wiki/Degree_(graph_theory)).

```php
// maximum degree of a vertex in $graph
$maxDegree = $graph->getMaxDegree();

// minimum degree of a vertex in $graph
$minDegree = $graph->getMinDegree();

// flag used to check if the graph is regular
// (every vertex has the same degree)
if ($graph->isRegular()) {
    
    // if the graph is regular, than you can get the graph degree
    // if you don't check the regularity of the graph and the graph is
    // not regular or it's empty, than when you'll call the getDegree
    // method you'll obtain a Bisarca\Graph\Graph\Descriptor\DegreeException
    $graphDegree = $graph->getDegree();
}

// flag used to check if the graph is regular and
// all its edges have the degree $degree
if ($graph->hasRegularity(3)) {
    // the graph is cubic, you can also check with: $graph->isCubic()
}

// a graph is balanced if for every vertex the in-degree and out-degree value is the same,
// than the graph is called a balanced directed graph
if ($graph->isBalanced()) {
    // ...
}
```

Inside a graph, a vertex has more implicit properties,
so some helpers are available:

```php
// number of incoming edges inside of $graph, linked to $vertex
$vertexInDegree = $graph->getVertexInDegree($vertex);

// number of outgoing edges inside of $graph, linked from $vertex
$vertexOutDegree = $graph->getVertexOutDegree($vertex);

// sum of ingoing and outgoing edges inside of $graph,
// linked from/to $vertex
$vertexDegree = $graph->getVertexDegree($vertex);


if ($graph->isIsolatedVertex($vertex)) {
    // vertex with degree 0
}

if ($graph->isLeafVertex($vertex)) {
    // vertex with degree 1
}

if ($graph->isDominatingVertex($vertex)) {
    // vertex with degree |V(G)| - 1
}
```
