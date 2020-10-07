<?php

namespace GildedRose;

/**
 * Abstract Class for transactions loading from file into array
 */
abstract class BasicProduct

{

    public function __construct(Item $item)
    {
        $this->item = $item;
    }
}
