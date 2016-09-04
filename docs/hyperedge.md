Hyperedges are a generalization of edges in the sense that they do not only
relate two endpoints to each other, they express a relation between an arbitrary
number of endpoints.

Hyperedges are declared by a `Bisarca\Graph\Edge\HyperEdge` element.

For each endpoint of the hyperedge, this hyperedge element contains an
`Bisarca\Graph\Edge\HyperEdge\Endpoint` element.

The `Endpoint` element must contain a `Vertex`, which contains the identifier
of a vertex in the graph.

```php
use Bisarca\Graph\Edge\HyperEdge;
use Bisarca\Graph\Edge\HyperEdge\Endpoint;

$endpoint1 = new Endpoint(new Vertex());
$endpoint2 = new Endpoint(new Vertex());
$endpoint3 = new Endpoint(new Vertex());

$hyperedge = new HyperEdge($endpoint1, $endpoint2, $endpoint3);

$graph
    ->getEdgeSet()
    ->add($hyperedge);
```
