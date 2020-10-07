<?php

namespace GildedRose;

class Regular extends BasicProduct implements ProductFeatures
{

    public function updateQuality()
    {

        $this->item->sell_in -= 1;
        $this->item->quality -= 1;

        if ($this->item->sell_in <= 0) {
            $this->item->quality -= 1;
        }


        if ($this->item->quality < 0) {
            $this->item->quality = 0;
        }
    }
}
