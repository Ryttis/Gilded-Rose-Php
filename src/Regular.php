<?php

declare(strict_types=1);

namespace GildedRose;

class Regular extends BasicProduct 
{
    public function __construct($item)
    {
        $this->item = $item;
    }
    public function updateQuality($item):void
    {
        --$this->item->sell_in;
        --$this->item->quality;

        if ($this->item->sell_in <= 0) {
            --$this->item->quality;
        }

        if ($this->item->quality < 0) {
            $this->item->quality = 0;
        }
    }
}
