<?php

namespace GildedRose;

class Conjured extends BasicProduct implements ProductFeatures
{

    public function updateQuality()
    {

        $this->item->sell_in -= 1;

        if ($this->item->quality == 0) {
            return;
        }

        $this->item->quality -= 2;

        if ($this->item->sell_in <= 0) {
            $this->item->quality -= 2;
        }
    }
}
