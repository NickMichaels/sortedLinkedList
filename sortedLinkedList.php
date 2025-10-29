<?php

require __DIR__ . '/vendor/autoload.php';

use SortedLinkedList\LinkedList;

/**
 * “Implement a library providing SortedLinkedList
 * (linked list that keeps values sorted). It should be
 * able to hold string or int values, but not both. 
 */

// String cases
echo "-----\n\n";
echo "Create a new LinkedList with 4 string Nodes\n\n";
// Initialize the list
$list = new LinkedList();
$list->append('dog');
$list->append('cat');
$list->append('elephant');
$list->append('zebra');
// Display the nodes of the list
echo $list->traverse();
echo "\n\n";

echo "-----\n\n";
echo "Sort the LinkedList \n\n";
$list->head = $list->sortList($list->head);
echo $list->traverse();
echo "\n\n";

echo "-----\n\n";
echo "Reverse the LinkedList \n\n";
$list->reverse();
echo $list->traverse();
echo "\n\n";

echo "-----\n\n";
echo "Delete the 'elephant' Node\n\n";
$list->delete('elephant');
echo $list->traverse();
echo "\n\n";

echo "-----\n\n";
echo "Create another LinkedList\n\n";
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
echo "-----\n\n";

echo "Sort this LinkedList\n\n";
$list->head = $list->sortList($list->head);
echo $list->traverse();
echo "\n\n";
echo "-----\n\n";

// Integer cases
echo "Create a LinkedList with integers\n\n";
$list = new LinkedList();
$list->append(8);
$list->append(2);
$list->append(9);
$list->append(5);

echo $list->traverse();
echo "\n\n";
echo "-----\n\n";

echo "Sort this integer LinkedList\n\n";
$list->head = $list->sortList($list->head);
echo $list->traverse();
echo "\n\n";
echo "-----\n\n";

echo "Delete the Node with integer value 5\n\n";
$list->delete(5);
echo $list->traverse();
echo "\n\n";
echo "-----\n\n";

echo "Create another integer LinkedList\n\n";
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
echo "-----\n\n";
echo "Sort this LinkedList\n\n";
$list->head = $list->sortList($list->head);
echo $list->traverse();
echo "\n\n";
echo "-----\n\n";

// Error cases
echo "Try to create a LinkedList with a float Node. " . 
    "This should return false and var_dump an error. " . 
    "Ideally we would report this to a logging service.\n\n";
$list = new LinkedList();
$list->append(1.5);
echo "\n";
echo "-----\n\n";

echo "Try to append a string Node LinkedList with an integer Node. " . 
   "This should return false and var_dump an error.\n\n";
$list = new LinkedList();
$list->append(1);
$list->append("hello");
echo "\n";
echo "-----\n\n";

echo "Try to append an integer Node LinkedList with a string Node. " . 
    "This should return false and var_dump an error.\n\n";
$list = new LinkedList();
$list->append("hello");
$list->append(3);
echo "\n";
echo "-----\n\n";
