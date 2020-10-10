<?php

declare(strict_types=1);

namespace GildedRose;
use GildedRose\Item;
class LoadCsv

{
     /**
     * @var string
     */
    private $fileName;

    /**
     * @var array
     */
    public $items = [];

    /**
     * @var Item
     */
    private $row;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $this->openCsv();
    }

    private function openCsv(): void
    {
        $pointer = fopen($this->fileName, 'r');
        while (!feof($pointer)) {
            $row = fgetcsv($pointer);
            $item = new Item($row[0],intval($row[1]),intval($row[2]));
            array_push($this->items, $item);
        }
        fclose($pointer);
    }
}
