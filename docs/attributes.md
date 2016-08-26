Every element in this library can contain attributes.
Attributes are just meta-data attached to the element and used by the end user.

Attributes are available for `Graph`, `Edge\Set`, `Edge`, `Vertex\Set` and `Vertex`.
To be sure that an object allows attributes, than check if it implements the
`Bisarca\Graph\Attribute\AttributeAwareInterface` interface.

*Note:* For a rapid implementation, use the `Bisarca\Graph\Attribute\AttributeAwareTrait` trait.

The attributes are like elements in an array, so they are defined with
a string key and a variable value.

```php

$vertex->setAttribute('id', 'n0');

if ($graph->hasAttribute('name')) {
    var_dump($graph->getAttribute('name')); // string(11) "lorem ipsum"
}

$edge->removeAttribute('label');

// $vertex1 has a name and a color

var_dump($vertex1->getAttributes());
// array(2) {
//   'name' =>
//   string(11) "lorem ipsum"
//   'color' =>
//   string(5) "green"
// }

// remove all the attributes
$vertex1->clearAttributes();

// give me the vertex name of "undefined" (by default it's null)
var_dump($vertex1->getAttribute('name', 'undefined')) // string(9) "undefined"

if ($vertex1->isEmptyAttributes()) {
    // ...
}
```
