<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class SetProductProcessingClass
 *
 * @package \GildedRose
 */
class SetProductProcessingClass
{
    /**
     * @var array
     */
    protected static $lookup = [
        'regular' => Regular::class,
        'Aged Brie' => Brie::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackStagePass::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Conjured Mana Cake' => Conjured::class,
    ];

    public static function setProcessingClass(Item $item): BasicProduct
    {
        $class = isset(static::$lookup[$item->name])
            ? static::$lookup[$item->name] : Item::class;

        return new $class($item);
    }
}
