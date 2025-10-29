<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use SortedLinkedList\LinkedList;
use Tests\Traits\CreateListFromArrayTrait;

final class TypeRestrictionTest extends TestCase
{
    use CreateListFromArrayTrait;

    public function testLinkedListWithRestricedValueCreation(): void
    {
        $list1 = new LinkedList();
        $append = $list1->append(1.5);

        $this->assertFalse(
            $append,
            "Linked list with restricted value [float] was created."
        );

        $list1 = new LinkedList();
        $append = $list1->append(true);

        $this->assertFalse(
            $append,
            "Linked list with restricted value [bool] was created."
        );

        $list1 = new LinkedList();
        $append = $list1->append([45]);

        $this->assertFalse(
            $append,
            "Linked list with restricted value [array] was created."
        );

        $obj = (object) array('var' => 'value');
        $list1 = new LinkedList();
        $append = $list1->append($obj);

        $this->assertFalse(
            $append,
            "Linked list with restricted value [object] was created."
        );
    }

    public function testLinkedListWithDifferingNodeTypesCreation(): void
    {
        $list1 = $this->createListFromArray(['x','a','d','f']);
        $append = $list1->append(1);
        $this->assertFalse(
            $append,
            "Linked list with existing string nodes allowed a node " .
            "with integer value to be appended."
        );

        $list1 = $this->createListFromArray([1,2,3,4,5]);
        $append = $list1->append('a');
        $this->assertFalse(
            $append,
            "Linked list with existing integer nodes allowed a node " .
            "with string value to be appended."
        );
    }
}
