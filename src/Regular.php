<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class Regular
 *
 * @package \GildedRose
 */
class Regular extends BasicProduct
{
    public function __construct(Item $item)
    {
        $this->item = $item;
    }
    /**
     * @param Item $item
     * @return void
     */
    public function updateQuality(Item $item): void
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
