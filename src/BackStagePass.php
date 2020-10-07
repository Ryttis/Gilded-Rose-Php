<?php

namespace GildedRose;

class BackStagePass extends BasicProduct implements ProductFeatures
{

    public function updateQuality()
    {

        $this->item->sell_in -= 1;

        if ($this->item->quality >= 50) {
            return;
        }

        if ($this->item->sell_in < 0) {
            return $this->item->quality = 0;
        }
        $this->item->quality += 1;

        if ($this->item->sell_in < 10) {
            $this->item->quality += 1;
        }
        if ($this->item->sell_in < 5) {
            $this->item->quality += 1;
        }
    }
}
