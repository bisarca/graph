A vertex may specify different logical locations for edges to connect.
The logical locations are called "ports".

As an analogy, thinck of the graph as a mother board, the vertices as integrated
circuits and the edges as connecting wires.
Then the pins on the integrated circuits correspond to portsof a vertex.

The ports of a vertex are declared by `Bisarca\Graph\Port\Port` elements as
children of the corresponding `Vertex` elements.
Each port element must have a name, which is an identifier for this port.

The edge element has optional *sourceport* and *targetport* with which an edge
may specify the port on the source, resp. target, vertex.

```php
use Bisarca\Graph\Edge\Edge;
use Bisarca\Graph\Port\Port;
use Bisarca\Graph\Vertex\Vertex;

$fooPort = new Port('foo');
$barPort = new Port('bar');

$vertex1 = new Vertex();
$vertex1->setPorts($fooPort);

$vertex2 = new Vertex();
$vertex2->setPorts($barPort);

$edge = new Edge($vertex1, $vertex2);

$edge->setSourcePort($fooPort);
$edge->setTargetPort($barPort);
```
