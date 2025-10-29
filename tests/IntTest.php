<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use SortedLinkedList\LinkedList;
use Tests\Traits\CreateListFromArrayTrait;

final class IntTest extends TestCase
{
    use CreateListFromArrayTrait;

    public function testLinkedListWithIntCreation(): void
    {
        $list1 = $this->createListFromArray([8,2,9,5]);
        $out1 = $list1->traverse();

        $this->assertEquals(
            "8 -> 2 -> 9 -> 5",
            $out1,
            "Linked list with expected integer values not properly created."
        );
        $list2 = $this->createListFromArray(
            [67, 33, 75, 17, 3, 99, 2]
        );
        $out2 = $list2->traverse();

        $this->assertEquals(
            "67 -> 33 -> 75 -> 17 -> 3 -> 99 -> 2",
            $out2,
            "Linked list with expected integer values not properly created."
        );
    }

    public function testLinkedListWithIntSorted(): void
    {
        $list1 = $this->createListFromArray([8,2,9,5]);
        $list1->head = $list1->sortList($list1->head);
        $out1 = $list1->traverse();
        $this->assertEquals(
            "2 -> 5 -> 8 -> 9",
            $out1,
            "Linked list with integer values not properly sorted."
        );

        $list2 = $this->createListFromArray(
            [67, 33, 75, 17, 3, 99, 2]
        );
        $list2->head = $list2->sortList($list2->head);
        $out2 = $list2->traverse();
        $this->assertEquals(
            "2 -> 3 -> 17 -> 33 -> 67 -> 75 -> 99",
            $out2,
            "Linked list with integer values not properly sorted."
        );
    }

    public function testLinkedListWithIntReversed(): void
    {
        $list1 = $this->createListFromArray(
            [67, 33, 75, 17, 3, 99, 2]
        );
        $list1->reverse();

        $out1 = $list1->traverse();
        $this->assertEquals(
            "2 -> 99 -> 3 -> 17 -> 75 -> 33 -> 67",
            $out1,
            "Linked list with integer values not properly reversed."
        );

        $list1->head = $list1->sortList($list1->head);
        $list1->reverse();
        $out2 = $list1->traverse();

        $this->assertEquals(
            "99 -> 75 -> 67 -> 33 -> 17 -> 3 -> 2",
            $out2,
            "Linked list with integer values not properly sorted and reversed."
        );
    }

    public function testLinkedListWithIntDeletion(): void
    {
        $list1 = $this->createListFromArray([8,2,9,5]);
        $list1->delete(5);
        $out1 = $list1->traverse();
        $this->assertEquals(
            "8 -> 2 -> 9",
            $out1,
            "Node not properly deleted from Linked list."
        );
    }
}
