<?php

namespace SortedLinkedList;

class Node
{
    public int|string $data;
    public ?Node $next;

    public function __construct(int|string $data)
    {
        $this->data = $data;
        // null value at first
        $this->next = null;
    }
}
