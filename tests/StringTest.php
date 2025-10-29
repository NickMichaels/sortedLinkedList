<?php

use PHPUnit\Framework\TestCase;
use SortedLinkedList\LinkedList;

final class StringTest extends TestCase
{
    public function testCanBeCreatedFromValidEmail(): void
    {

        $list = new LinkedList();
        $list->append('x');
        $list->append('a');
        $list->append('d');
        $list->append('f');
        $out1 = $list->traverse();

        $this->assertEquals($out1, "x -> a -> d -> f", "strings are not equals" );

        $list->head = $list->sortList($list->head);
        echo $list->traverse();

    }


}
