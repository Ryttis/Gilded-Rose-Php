<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class BackStagePass
 *
 * @package \GildedRose
 */
class BackStagePass extends BasicProduct
{
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function updateQuality(Item $item): void
    {
        --$this->item->sell_in;

        if ($this->item->quality >= 50) {
            exit;
        }

        if ($this->item->sell_in < 0) {
            $this->item->quality = 0;
            exit;
        }
        ++$this->item->quality;

        if ($this->item->sell_in < 10) {
            ++$this->item->quality;
        }
        if ($this->item->sell_in < 5) {
            ++$this->item->quality;
        }
    }
}
