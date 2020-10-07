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
        $fileName = fopen($this->fileName, "r");
        while (!feof($fileName)) {
            $row = fgetcsv($fileName);
            $this->item = SetProductProcessingClass
            ::setProcessingClass(new Item($row[0],$row[1],$row[2]));
            print_r($this->item);
            print("\n");
            $this->item->updateProductQuality();
            print_r($this->item);
        }
        fclose($fileName);
    }
}