<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class BasicProduct
 *
 * @package \GildedRose
 */
abstract class BasicProduct
{
    /**
     * @var \GildedRose\Item
     */
    protected $item;

    abstract public function updateQuality(Item $item): void;
}
