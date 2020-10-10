<?php

declare(strict_types=1);

namespace GildedRose;

class Conjured extends BasicProduct 
{
    public function __construct($item)
    {
        $this->item = $item;
    }
    public function updateQuality($item):void
    {
        --$this->item->sell_in;

        if ($this->item->quality === 0) {
            return;
        }

        $this->item->quality -= 2;

        if ($this->item->sell_in <= 0) {
            $this->item->quality -= 2;
        }
    }
}
