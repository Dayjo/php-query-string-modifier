PHP Query String Modifier 
=========================

[![endorse](https://api.coderwall.com/dayjo/endorsecount.png)](https://coderwall.com/dayjo)

Simple PHP class for modifying and managing query strings.


## Installation
Simply download the php file to your classes directory.

## Simple Usage

```php
$qs = new QueryString();
$qs->set('foo', 'bar');

echo $qs->string; // foo=bar
print_r( $qs->array ); // Array( [foo] => bar )
```

### Pagination Example
```php
$qs = new QueryString('search=my-search-terms&page=4');

$page = $qs->get('page') + 1;

$qs->set('page', $page);

echo $qs->string; // search=my-search-terms&page=5


```
