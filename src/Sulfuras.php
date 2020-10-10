<?php

declare(strict_types=1);

namespace GildedRose;

class Sulfuras extends BasicProduct 
{
    public function __construct($item)
    {
        $this->item = $item;
    }
    public function updateQuality($item):void
    {
        $this->item->quality = 80;
    }
}
