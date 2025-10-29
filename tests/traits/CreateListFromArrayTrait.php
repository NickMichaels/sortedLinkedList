<?php

namespace Tests\Traits;

use SortedLinkedList\LinkedList;

trait CreateListFromArrayTrait
{
    /**
     * Helpfer function to quickly create a linked list
     * from a passed array
     *
     * @param  array<int>|array<string> $arr Array of values to populate into nodes in a linked list
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
