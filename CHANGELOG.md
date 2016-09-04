# Changelog
All Notable changes to `bisarca/graph` will be documented in this file.

## [Unreleased]

### Added
- edges, vertices, graph and sets identification using `Bisarca\Graph\Identifier\IdentifierAwareInterface` and `Bisarca\Graph\Identifier\IdentifierAwareTrait`
- edges documentation
- added directed edges with interface
- created a new level for the hierarchy of edges interfaces: `GenericEdgeInterface`
- allow nested graphs
- `Port` interfaces and implementations
- digraph utility

### Deprecated
- Nothing

### Fixed
- fixed wrong `::has(/* multiple elements */)` behaviour

### Remove
- replaced `Edge::*VertexStart` and `Edge::*VertexEnd` with `Edge::*Source` and `Edge::*Target`

### Security
- Nothing
