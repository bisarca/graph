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


## Descriptors

The `Graph` class contains many method those help to describe the graph itself.


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
