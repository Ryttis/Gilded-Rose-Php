<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Item;
use GildedRose\SetProductProcessingClass;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
  
    public function testUpdatesRegularItemsBeforeSellDate(): void
    {
        $items = new Item('regular', 10, 5);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 4);
        $this->assertSame($items->sell_in, 9);
    }

    public function testUpdatesRegularItemsOnTheSellDate(): void
    {
        $items = new Item('regular', 0, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 8);
        $this->assertSame($items->sell_in, -1);
    }

    public function testUpdatesRegularItemsAfterTheSellDate(): void
    {
        $items = new Item('regular', -5, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 8);
        $this->assertSame($items->sell_in, -6);
    }

    public function testUpdatesRegularItemsWithQuality0(): void
    {
        $items = new Item('regular', 5, 0);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 0);
        $this->assertSame($items->sell_in, 4);
    }

    public function testUpdatesBrieItemsBeforeTheSellDate(): void
    {
        $items = new Item('Aged Brie', 5, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 11);
        $this->assertSame($items->sell_in, 4);
    }

    public function testUpdatesBrieItemsBeforeTheSellDateWithMaximumQuality(): void
    {
        $items = new Item('Aged Brie', 5, 50);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 50);
        $this->assertSame($items->sell_in, 4);
    }

    public function testUpdatesBrieTemsOnTheSellDate(): void
    {
        $items = new Item('Aged Brie', 0, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 12);
        $this->assertSame($items->sell_in, -1);
    }

    public function testUpdatesBrieItemsOnTheSellDateNearMaximumQuality(): void
    {
        $items = new Item('Aged Brie', 0, 49);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 50);
        $this->assertSame($items->sell_in, -1);
    }

    public function testUpdatesBrieItemsOnTheSellDateWithMaximumQuality(): void
    {
        $items = new Item('Aged Brie', 0, 50);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 50);
        $this->assertSame($items->sell_in, -1);
    }

    public function testUpdatesBrieItemsAfterTheSellDate(): void
    {
        $items = new Item('Aged Brie', -10, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 12);
        $this->assertSame($items->sell_in, -11);
    }

    public function testUpdatesBriemItemsAfterTheSellDateWithMaximumQuality(): void
    {
        $items = new Item('Aged Brie', -9, 50);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 50);
        $this->assertSame($items->sell_in, -10);
    }

    public function testUpdatesSulfurasItemsBeforeTheSellDate(): void
    {
        $items = new Item('Sulfuras, Hand of Ragnaros', 5, 0);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 80);
        $this->assertSame($items->sell_in, 5);
    }

    public function testUpdatesSulfurasItemsOnTheSellDate(): void
    {
        $items = new Item('Sulfuras, Hand of Ragnaros', 0, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 80);
        $this->assertSame($items->sell_in, 0);
    }

    public function testUpdatesSulfurasItemsAfterTheSellDate(): void
    {
        $items = new Item('Sulfuras, Hand of Ragnaros', -1, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 80);
        $this->assertSame($items->sell_in, -1);
    }

    public function testUpdatesBackstagePassItemsLongBeforeTheSellDate(): void
    {
        $items = new Item('Backstage passes to a TAFKAL80ETC concert', 11, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 11);
        $this->assertSame($items->sell_in, 10);
    }

    public function testBackstagePassItemsCloseToTheSellDate(): void
    {
        $items = new Item('Backstage passes to a TAFKAL80ETC concert', 10, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 12);
        $this->assertSame($items->sell_in, 9);
    }

    public function testBackstagePassItemsCloseToTheSellDataAtMaxQuality(): void
    {
        $items = new Item('Backstage passes to a TAFKAL80ETC concert', 10, 5);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 7);
        $this->assertSame($items->sell_in, 9);
    }

    public function testBackstagePassItemsVeryCloseOTheSellData(): void
    {
        $items = new Item('Backstage passes to a TAFKAL80ETC concert', 5, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 13);
        $this->assertSame($items->sell_in, 4);
    }

    public function testBackstagePassItemsVeryCloseToTheSellDataAtMaxQuality(): void
    {
        $items = new Item('Backstage passes to a TAFKAL80ETC concert', 5, 5);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 8);
        $this->assertSame($items->sell_in, 4);
    }

    public function testBackstagePassItemsWithOneDayLeftToSell(): void
    {
        $items = new Item('Backstage passes to a TAFKAL80ETC concert', 1, 1);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 4);
        $this->assertSame($items->sell_in, 0);
    }

    public function testBackstagePassItemsWithOneDayLeftToSellAtMaxQuality(): void
    {
        $items = new Item('Backstage passes to a TAFKAL80ETC concert', 1, 50);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 50);
        $this->assertSame($items->sell_in, 0);
    }

    public function testBackstagePassItemsOnSellDate(): void
    {
        $items = new Item('Backstage passes to a TAFKAL80ETC concert', 0, 1);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 0);
        $this->assertSame($items->sell_in, -1);
    }

    public function testBackstagePassItemsAfterSellDate(): void
    {
        $items = new Item('Backstage passes to a TAFKAL80ETC concert', -1, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 0);
        $this->assertSame($items->sell_in, -2);
    }

    public function testConjuredItemsBeforeTheSellDate(): void
    {
        $items = new Item('Conjured Mana Cake', 10, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 8);
        $this->assertSame($items->sell_in, 9);
    }

    public function testConjuredItemsAtZeroQuality(): void
    {
        $items = new Item('Conjured Mana Cake', 10, 0);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 0);
        $this->assertSame($items->sell_in, 9);
    }

    public function testConjuredItemsOnTheSellDate(): void
    {
        $items = new Item('Conjured Mana Cake', 0, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 6);
        $this->assertSame($items->sell_in, -1);
    }

    public function testConjuredItemsOnTheSellDateAt0Quality(): void
    {
        $items = new Item('Conjured Mana Cake', 0, 0);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 0);
        $this->assertSame($items->sell_in, -1);
    }

    public function testConjuredItemsAfterTheSellDate(): void
    {
        $items = new Item('Conjured Mana Cake', -10, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 6);
        $this->assertSame($items->sell_in, -11);
    }

    public function testConjuredItemsAfterTheSellDateAtZeroQuality(): void
    {
        $items = new Item('Conjured Mana Cake', -10, 0);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality($items);
        $this->assertSame($items->quality, 0);
        $this->assertSame($items->sell_in, -11);
    }
}
