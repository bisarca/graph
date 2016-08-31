An edge is a connection between two vertices.

An edge is (together with vertices) one of the two basic units out of which
graphs are constructed. Each edge has on or two vertices to
which it is attached, called its endpoints.


An edge has exactly two endpoints: a *source* vertex and a *target* vertex.

An example duplicating an edge, vertex by vertex:

```php
use Bisarca\Graph\Edge\Edge;
use Bisarca\Graph\Vertex\Vertex;

$originalEdge = new Edge(/* ... */);
$newEdge = new Edge();

if (!$newEdge->hasSource()) {
    $newEdge->setSource($originalEdge->getSource());
}

if (!$newEdge->hasTarget()) {
    $newEdge->setTarget($originalEdge->getTarget());
}
```


## Directed Edges

Edges by default are undirected, to define edges as directed, use the `Bisarca\Graph\Edge\DirectedEdgeInterface` interface or the `Bisarca\Graph\Edge\DirectedEdge` implementation.

Example:

```php
use Bisarca\Graph\Edge;

class FriendshipEdge extends Edge\Edge {}
// class FriendshipEdge implements Edge\EdgeInterface {}

class FollowingEdge extends Edge\DirectedEdge {}
// class FollowingEdge implements Edge\DirectedEdgeInterface {}
```


## Descriptors

The `Edge` class contains many method those help to describe the edge itself.


### Loop

A loop or self-loop is an edge both of whose endpoints are the same vertex.

```php
use Bisarca\Graph\Edge\Edge;
use Bisarca\Graph\Vertex\Vertex;

$vertex = new Vertex();

$edge1 = new Edge($vertex, $vertex);
$edge2 = new Edge($vertex);
$edge3 = new Edge(null, $vertex);

var_dump($edge1->isLoop()); // bool(true)
var_dump($edge2->isLoop()); // bool(false)
var_dump($edge3->isLoop()); // bool(false)
```
