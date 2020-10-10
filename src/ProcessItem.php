<?php

declare(strict_types=1);

namespace GildedRose;

class ProcessItem

{
    public $items;
  
    public function loadProduct(string $fileName): void
    {
        $this->items = new LoadCsv($fileName);
    
        foreach ($this->items as $item) {
            echo $item[0]->name . $item[0]->sell_in . $item[0]->quality;
            $GildedRose = SetProductProcessingClass
                ::setProcessingClass($item[0]);
            $GildedRose->updateQuality($item[0]);
            print("\n");
            echo $item[0]->name . $item[0]->sell_in . $item[0]->quality;
            print("\n");
        }

        // echo $item->name . ' ' . $item->sell_in . ' ' . $item->quality . ' Before';
        //     print "\n";
        //     $GildedRose->updateQuality($item->name, $item->quality, $item->sell_in);

        //     echo $item->name . ' ' . $item->sell_in . ' ' . $item->quality . ' After';
        //     print "\n";
    }
}
