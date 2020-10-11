<?php

declare(strict_types=1);

namespace GildedRose;


/**
 * Class Sulfuras
 *
 * @package \GildedRose
 */
class Sulfuras extends BasicProduct
{
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function updateQuality(Item $item): void
    {
        $this->item->quality = 80;
    }
}
