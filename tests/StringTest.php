<?php

use PHPUnit\Framework\TestCase;
use SortedLinkedList\LinkedList;

final class StringTest extends TestCase
{
    public function testLinkedListWithStringCreation(): void
    {
        $list1 = $this->createListFromArray(['x','a','d','f']);
        $out1 = $list1->traverse();

        $this->assertEquals(
            "x -> a -> d -> f", 
            $out1, 
            "Linked list with expected string values not properly created."
        );

        $list2 = $this->createListFromArray(
            ['l','l','c','m','z','a','w','d','f']
        );
        $out2 = $list2->traverse();

        $this->assertEquals(
            "l -> l -> c -> m -> z -> a -> w -> d -> f",
            $out2,
            "Linked list with expected string values not properly created."
        );
    }

    public function testLinkedListWithStringSorted(): void
    {
        $list1 = $this->createListFromArray(['x','a','d','f']);
        $list1->head = $list1->sortList($list1->head);
        $out1 = $list1->traverse();
        $this->assertEquals(
            "a -> d -> f -> x", 
            $out1,
            "Linked list with string values not properly sorted."
        );

        $list2 = $this->createListFromArray(
            ['l','l','c','m','z','a','w','d','f']
        );
        $list2->head = $list2->sortList($list2->head);
        $out2 = $list2->traverse();
        $this->assertEquals(
            "a -> c -> d -> f -> l -> l -> m -> w -> z",
            $out2,
            "Linked list with string values not properly sorted."
        );
    }

    public function testLinkedListWithStringReversed(): void
    {
        $list1 = $this->createListFromArray(
            ['l','l','c','m','z','a','w','d','f']
        );
        $list1->reverse();
        
        $out1 = $list1->traverse();
        $this->assertEquals(
            "f -> d -> w -> a -> z -> m -> c -> l -> l",
            $out1,
            "Linked list with string values not properly reversed."
        );

        $list1->head = $list1->sortList($list1->head);
        $list1->reverse();
        $out2 = $list1->traverse();
        //var_dump($out2);
        $this->assertEquals(
            "z -> w -> m -> l -> l -> f -> d -> c -> a",
            $out2,
            "Linked list with string values not properly sorted and reversed."
        );
    }

    public function testLinkedListWithStringDeletion(): void
    {
        $list1 = $this->createListFromArray(['x','a','d','f']);
        $list1->delete('x');
        $out1 = $list1->traverse();
        $this->assertEquals(
            "a -> d -> f",
            $out1,
            "Node not properly deleted from Linked list.");
    }

    /**
     * Helpfer function to quickly create a linked list
     * from a passed array
     *
     * @param  array $arr Array of values to populate into nodes in a linked list
     * @return LinkedList
     */
    public function createListFromArray(array $arr): LinkedList
    {
        $list = new LinkedList();
        foreach ($arr as $val) {
            $list->append($val);
        }
        return $list;
    }
}
