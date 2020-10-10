<?php

declare(strict_types=1);

namespace GildedRose;

class Brie extends BasicProduct
{
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function updateQuality(Item $item): void
    {
        ++$this->item->quality;

        --$this->item->sell_in;

        if ($this->item->sell_in <= 0) {
            ++$this->item->quality;
        }

        if ($this->item->quality >= 50) {
            $this->item->quality = 50;
        }
    }
}
