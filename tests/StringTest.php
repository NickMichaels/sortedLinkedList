<?php

use PHPUnit\Framework\TestCase;
use SortedLinkedList\LinkedList;

final class StringTest extends TestCase
{
    public function testLinkedListWithStringCreation(): void
    {
        $list1 = $this->createListFromArray(['x','a','d','f']);
        $out1 = $list1->traverse();

        $this->assertEquals($out1, "x -> a -> d -> f", "strings are not equals");

        $list2 = $this->createListFromArray(
            ['l','l','c','m','z','a','w','d','f']
        );
        $out2 = $list2->traverse();

        $this->assertEquals(
            $out2, 
            "l -> l -> c -> m -> z -> a -> w -> d -> f", 
            "strings are not equals"
        );
    }

    public function testLinkedListWithStringSorted(): void
    {
        $list1 = $this->createListFromArray(['x','a','d','f']);
        $list1->head = $list1->sortList($list1->head);
        $out1 = $list1->traverse();
        $this->assertEquals($out1, "a -> d -> f -> x", "strings are not equals");

        $list2 = $this->createListFromArray(
            ['l','l','c','m','z','a','w','d','f']
        );
        $list2->head = $list2->sortList($list2->head);
        $out2 = $list2->traverse();
        $this->assertEquals(
            $out2, 
            "a -> c -> d -> f -> l -> l -> m -> w -> z", 
            "strings are not equals"
        );
    }

    /**
     * Helpfer function to quickly create4 a linked list
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
