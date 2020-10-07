<?php

namespace GildedRose;

interface ProductFeatures
{
    public function updateQuality();
}

class SetProductProcessingClass
{
    protected static $lookup = [
        'regular' => Regular::class,
        'Aged Brie' => Brie::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePass::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Conjured Mana Cake' => Conjured::class,
    ];
    public static function setProcessingClass($item)
    {
        $class = isset(static::$lookup[$item->name])
            ? static::$lookup[$item->name] : Item::class;
           
        return new $class($item);
    }
}
