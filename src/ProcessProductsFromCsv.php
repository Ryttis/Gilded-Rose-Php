<?php

namespace GildedRose;

class ProcessProductsFromCsv
/**
* Class  for csv file loading into array
*/

{
    public $item;
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        $this->openCsv();
    }

    private function openCsv()
    {
        echo "Name Sell_in Quality";
        print("\n");
        echo "--------------------";
            print("\n");
        $fileName = fopen($this->fileName, "r");
        while (!feof($fileName)) {
            $row = fgetcsv($fileName);
            $item = new Item($row[0],$row[1],$row[2]);
            $GildedRose = SetProductProcessingClass
            ::setProcessingClass($item);
            echo $item->name." ".$item->sell_in." ".$item->quality." Before";
            print("\n");
            $GildedRose->updateQuality();
            
            echo $item->name." ".$item->sell_in." ".$item->quality." After";
            print("\n");
        }
        fclose($fileName);
    }
}