<?php
namespace GildedRose;

Class Brie extends BasicProduct implements ProductFeatures
{

public function updateQuality(){

$this->item->quality += 1;

$this->item->sell_in -= 1;

if($this->item->sell_in <= 0){
    $this->item->quality += 1;
}

if($this->item->quality >= 50){
    $this->item->quality = 50;
}
}
}