# sortedLinkedList - a basic Linked List implementation 

A linked list implementation allowing strings and ints in the nodes but not both, that has sort and reverse functionality. Support for PHPUnit and some basic test are included

## Installation:

- Clone the repo.
- ```composer install```

## Basic usage

### Initialize a list

```
// Initialize the list
$list = new LinkedList();
$list->append('dog');
$list->append('cat');
$list->append('elephant');
$list->append('zebra');
// Display the nodes of the list
echo $list->traverse();
echo "\n\n";
```

returns

```
dog -> cat -> elephant -> zebra
```

### Sort a list

```
$list->head = $list->sortList($list->head);
echo $list->traverse();
echo "\n\n";
```

returns

```
cat -> dog -> elephant -> zebra
```

### Reverse a list

```
$list->reverse();
echo $list->traverse();
echo "\n\n";
```

returns

```
zebra -> elephant -> dog -> cat
```

### Delete a node

```
$list->delete('elephant');
echo $list->traverse();
echo "\n\n";
```

returns

```
zebra -> dog -> cat
```

More usage exists in the `sortedLinkedList.php` file in the root directory

## Running Unit Tests

```
./vendor/bin/phpunit
```

returns

```
Nicholass-MBP-2:sortedLinkedList nicholasmichaels$ ./vendor/bin/phpunit 
PHPUnit 12.4.1 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.4.12
Configuration: /Users/nicholasmichaels/php-sandbox/coding-challenges/sortedLinkedList/phpunit.xml

........string(65) "$data parameter is not a valid type - must be a string or integer"
string(65) "$data parameter is not a valid type - must be a string or integer"
string(65) "$data parameter is not a valid type - must be a string or integer"
string(65) "$data parameter is not a valid type - must be a string or integer"
.string(63) "Error trying to insert a non-string node into a list of strings"
string(65) "Error trying to insert a non-integer node into a list of integers"
.                                                        10 / 10 (100%)

Time: 00:00.020, Memory: 14.00 MB

OK (10 tests, 20 assertions)
Nicholass-MBP-2:sortedLinkedList nicholasmichaels$
```

*Ignore the var_dumps for now. Ideally we would report this to a logging service.*
