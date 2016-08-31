Every element in the library (so every Set, Edge, Vertex and the Graph itself)
can be identified with a string.

This string is generally an [URI](https://en.wikipedia.org/wiki/Uniform_Resource_Identifier).

There are three methods to identify elements:

```php
if (!$element->hasIdentifier()) {
    $element->setIdentifier('my-identifier');
}

var_dump($element->getIdentifier()); // string(13) "my-identifier"
```
