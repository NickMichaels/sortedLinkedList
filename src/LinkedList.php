<?php

namespace SortedLinkedList;

use Exception;
use SortedLinkedList\Node;

class LinkedList
{
    public ?Node $head;

    public function __construct()
    {
        // initially no head node
        $this->head = null;
    }

    /**
     * Validate the $data that we are going to put into a node and into this list
     *
     * Rules:
     * $data must be a string or an int
     * If the list already contains a node with a string,
     * all future nodes must be strings and the same for ints
     *
     * @param  mixed $data Data to populate into a node in the list
     * @return void
     */
    public function validateInput($data): void
    {
        if ((!is_string($data)) && (!is_int($data))) {
            throw new Exception(
                '$data parameter is not a valid type - must be a string or integer'
            );
        }

        // If we already have a node in this list
        // And the node contains a string, new nodes
        // can only contain a string. Same goes for with integers
        if ($this->head && $this->head->data) {
            if (is_int($this->head->data) && !is_int($data)) {
                throw new Exception(
                    'Error trying to insert a non-integer node into a list of integers'
                );
            }

            if (is_string($this->head->data) && !is_string($data)) {
                throw new Exception(
                    'Error trying to insert a non-string node into a list of strings'
                );
            }
        }
    }

    /**
     * Add a node to the beginning of the list
     *
     * @param  int|string $data Data to populate into a node in the list
     * @return bool
     */
    public function prepend($data): bool
    {
        try {
            $this->validateInput($data);
        } catch (Exception $e) {
            // Ideally we would do something else with this error
            // but that is out of scope for this project
            var_dump($e->getMessage());
            return false;
        }

        $newNode = new Node($data);
        // new node points to the current head
        // since we are only ordering based on these next "pointers",
        // that is all that we need to do to move that node
        $newNode->next = $this->head;

        // newNode is the new head
        $this->head = $newNode;

        return true;
    }

    /**
     * Add a new node to the end of the list
     *
     * @param  int|string $data Data to populate into a node in the list
     * @return bool
     */
    public function append($data): bool
    {
        try {
            $this->validateInput($data);
        } catch (Exception $e) {
            // Ideally we would do something else with this error
            // but that is out of scope for this project
            var_dump($e->getMessage());
            return false;
        }

        $newNode = new Node($data);
        // if we dont have a head node, aka an empty list
        // set this new node as the head
        if ($this->head === null) {
            $this->head = $newNode;
            return true;
        }

        // start at the beginning of the list
        $current = $this->head;
        while ($current->next !== null) {
            // iterate through and set the pointers
            // but do nothing else
            $current = $current->next;
        }
        // all that looping just got us to the last node
        // before this new one is added
        $current->next = $newNode;

        return true;
    }

    /**
     * Loop through the list and display each node
     *
     * Alternatively we could have had this method
     * echo the string itself, but I feel like this allows
     * for more flexibility
     *
     * @return string
     */
    public function traverse(): string
    {
        // set the var to be the head node
        $current = $this->head;
        $str = "";
        while ($current !== null) {
            $str .= strval($current->data) . " -> ";
            $current = $current->next;
        }

        // replace the last -> with a blank space
        $str = substr_replace(
            $str,
            "",
            intval(strrpos($str, " -> ")),
            strlen(" -> ")
        );

        return $str;
    }

    /**
     * Use a version of mergeSort on this list
     *
     * When first being called externally,
     * we pass the head node of a list
     *
     * We split the list, and then split each half again recursively
     * by calling this method again
     *
     * This effectively splits this list down into individual nodes
     * Which we then compare to one another and alter their $next
     * values in order to sort, though this happens in mergeNodes
     *
     * @param  ?Node $node
     * @return ?Node
     */
    public function sortList(?Node $node): ?Node
    {
        // If the list only has one node, then its already sorted
        if (!isset($node->next)) {
            return $node;
        }

        // split the list into two halves using fast and slow pointers
        $slow = $node;
        $fast = $node->next;
        while ($fast !== null && $fast->next !== null) {
            if (isset($slow->next)) {
                $slow = $slow->next;
            }
            $fast = $fast->next->next;
        }

        // After this the middle can be defined as $slow->next
        $middle = $slow->next;
        // break the link, for now
        $slow->next = null;

        // Call this recursively on each half,
        // this will split the list until we only have one node each
        $left = $this->sortList($node);
        $right = $this->sortList($middle);

        return $this->mergeNodes($left, $right);
    }

    /**
     * Compare nodes either as ints or strings and then merge them together
     *
     * @param  ?Node $first  First node to compare
     * @param  ?Node $second Second node to compare
     * @return ?Node
     */
    public function mergeNodes(?Node $first, ?Node $second): ?Node
    {
        // If either list is empty, return the other list
        if (!$first) {
            return $second;
        }
        if (!$second) {
            return $first;
        }

        // Once we are at this point, we know that we have two nodes
        // and due to the validation rules applied to apped and prepend
        // we know that they have matching data types
        $alphaList = false;
        if (is_string($first->data)) {
            $alphaList = true;
        }

        // Pick the smaller value between first and second nodes
        if ($alphaList) {
            if (strcmp(strval($first->data), strval($second->data)) <= 0) {
                $first->next = $this->mergeNodes($first->next, $second);
                return $first;
            } else {
                $second->next = $this->mergeNodes($first, $second->next);
                return $second;
            }
        } else {
            if ($first->data <= $second->data) {
                $first->next = $this->mergeNodes($first->next, $second);
                return $first;
            } else {
                $second->next = $this->mergeNodes($first, $second->next);
                return $second;
            }
        }
    }

    /**
     * Reverse the linked list
     *
     * @return void
     */
    public function reverse(): void
    {
        $previous = null;
        $current = $this->head;
        // iterate through each node
        while ($current !== null) {
            // grab the next node before we change anything
            $next = $current->next;
            // Set the next pointer to $prev
            $current->next = $previous;
            $previous = $current;
            $current = $next;
        }

        $this->head = $previous;
    }

    // Method to delete a node with a specific value
    /**
     * Reverse the linked list
     *
     * @param  int|string $data Data to delete from the list
     * @return void
     */
    public function delete($data): void
    {
        if ($this->head === null) {
            // List is empty, nothing to delete
            return;
        }

        if ($this->head->data === $data) {
            // If it matches the value of the head,
            // delete the head node by setting it to its
            // next pointer
            $this->head = $this->head->next;
            return;
        }

        $current = $this->head;
        // Loop through until we find the node that has the value to be deleted
        while ($current->next !== null && $current->next->data !== $data) {
            $current = $current->next;
        }

        if ($current->next !== null) {
            // "delete" the node by simply skipping it
            $current->next = $current->next->next;
        }
    }
}
