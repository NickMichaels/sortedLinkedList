<?php

require __DIR__ . '/../vendor/autoload.php';

use SortedLinkedList\LinkedList;

/**
 * “Implement a library providing SortedLinkedList
 * (linked list that keeps values sorted). It should be
 * able to hold string or int values, but not both. Try to
 * think about what you'd expect from such library as a
 * user in terms of usability and best practices, and
 * apply those.”
 *
 */

// String cases
$list = new LinkedList();
$list->append('x');
$list->append('a');
$list->append('d');
$list->append('f');
echo $list->traverse();
echo "\n\n";
$list->head = $list->sortList($list->head);
echo $list->traverse();
echo "\n\n";

// delete test
$list->delete('x');
echo $list->traverse();
echo "\n\n";

$list = new LinkedList();
$list->append('l');
$list->append('l');
$list->append('c');
$list->append('m');
$list->append('z');
$list->append('a');
$list->append('w');
$list->append('d');
$list->append('f');
echo $list->traverse();
echo "\n\n";
$list->head = $list->sortList($list->head);
echo $list->traverse();
echo "\n\n";

// Integer cases
$list = new LinkedList();
$list->append(8);
$list->append(2);
$list->append(9);
$list->append(5);

echo $list->traverse();
echo "\n\n";
$list->head = $list->sortList($list->head);
echo $list->traverse();
echo "\n\n";

// delete test
$list->delete(5);
echo $list->traverse();
echo "\n\n";

$list = new LinkedList();
$list->append(67);
$list->append(33);
$list->append(75);
$list->append(17);
$list->append(3);
$list->append(99);
$list->append(2);

echo $list->traverse();
echo "\n\n";
$list->head = $list->sortList($list->head);
echo $list->traverse();
echo "\n\n";

// Error cases
$list = new LinkedList();
//$list->append(1.5);

$list = new LinkedList();
$list->append(1);
$list->append("hello");

$list = new LinkedList();
$list->append("hello");
$list->append(3);
