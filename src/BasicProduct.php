<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Abstract Class for transactions loading from file into array
 */
abstract class BasicProduct
{
    /**
     * @var Item
     */
    protected $item;

    abstract public function updateQuality(Item $item): void;
}
