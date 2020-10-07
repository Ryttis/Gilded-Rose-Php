<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;
use GildedRose\SetProductProcessingClass;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->name);
    }
    public function test_updates_regular_items_before_sell_date(): void
    {
        $items = new Item("regular", 10, 5);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 4);
        $this->assertEquals($items->sell_in, 9);
    }
    public function test_updates_regular_items_on_the_sell_date(): void
    {
        $items = new Item("regular", 0, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 8);
        $this->assertEquals($items->sell_in, -1);
    }
    public function test_updates_regular_items_after_the_sell_date(): void
    {
        $items = new Item("regular", -5, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 8);
        $this->assertEquals($items->sell_in, -6);
    }
    public function test_updates_regular_items_with_quality_0(): void
    { 
        $items = new Item("regular", 5, 0);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, 4);
    }
    public function test_updates_Brie_items_before_the_sell_date(): void
    {
        $items = new Item("Aged Brie", 5, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 11);
        $this->assertEquals($items->sell_in, 4);
    }
    public function test_updates_Brie_items_before_the_sell_date_with_maximum_quality(): void
    {
        $items = new Item("Aged Brie", 5, 50);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, 4);
    }    
    public function test_updates_Brie_tems_on_the_sell_date(): void
    {
        $items = new Item("Aged Brie", 0, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 12);
        $this->assertEquals($items->sell_in, -1);
    }
    public function test_updates_Brie_items_on_the_sell_date_near_maximum_quality(): void
    {
        $items = new Item("Aged Brie", 0, 49);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, -1);
    }
    public function test_updates_Brie_items_on_the_sell_date_with_maximum_quality(): void
    {
        $items = new Item("Aged Brie", 0, 50);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, -1);
    }
    public function test_updates_Brie_items_after_the_sell_date(): void
    {
        $items = new Item("Aged Brie", -10, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 12);
        $this->assertEquals($items->sell_in, -11);
    }
    public function test_updates_Briem_items_after_the_sell_date_with_maximum_quality(): void
    {
        $items = new Item("Aged Brie", -9, 50);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, -10);
    }
    
    
    public function test_updates_Sulfuras_items_before_the_sell_date(): void
    {
        $items = new Item("Sulfuras, Hand of Ragnaros", 5, 0);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 80);
        $this->assertEquals($items->sell_in, 5);
    }    
    public function test_updates_Sulfuras_items_on_the_sell_date(): void
    {
        $items = new Item("Sulfuras, Hand of Ragnaros", 0, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 80);
        $this->assertEquals($items->sell_in, 0);
    }
    public function test_updates_Sulfuras_items_after_the_sell_date(): void
    {
        $items = new Item("Sulfuras, Hand of Ragnaros", -1, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 80);
        $this->assertEquals($items->sell_in, -1);
    }
    public function test_updates_Backstage_pass_items_long_before_the_sell_date(): void
    {
        $items = new Item("Backstage passes to a TAFKAL80ETC concert", 11, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 11);
        $this->assertEquals($items->sell_in, 10);
    }
    public function test_Backstage_pass_items_close_to_the_sell_date(): void
    {
        $items = new Item("Backstage passes to a TAFKAL80ETC concert", 10, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 12);
        $this->assertEquals($items->sell_in, 9);
    }
    public function test_Backstage_pass_items_close_to_the_sell_data_at_max_quality(): void
    {
        $items = new Item("Backstage passes to a TAFKAL80ETC concert", 10, 5);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 7);
        $this->assertEquals($items->sell_in, 9);
    }
    public function test_Backstage_pass_items_very_close_o_the_sell_data(): void
    {
        $items = new Item("Backstage passes to a TAFKAL80ETC concert", 5, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 13);
        $this->assertEquals($items->sell_in, 4);
    }
    public function test_Backstage_pass_items_very_close_to_the_sell_data_at_max_quality(): void
    {
        $items = new Item("Backstage passes to a TAFKAL80ETC concert", 5, 5);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 8);
        $this->assertEquals($items->sell_in, 4);
    }
    public function test_Backstage_pass_items_with_one_day_left_to_sell(): void
    {
        $items = new Item("Backstage passes to a TAFKAL80ETC concert", 1, 1);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 4);
        $this->assertEquals($items->sell_in, 0);
    }
    public function test_Backstage_pass_items_with_one_day_left_to_sell_at_max_quality(): void
    {
        $items = new Item("Backstage passes to a TAFKAL80ETC concert", 1, 50);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, 0);
    }
    public function test_Backstage_pass_items_on_sell_date(): void
    {
        $items = new Item("Backstage passes to a TAFKAL80ETC concert", 0, 1);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, -1);
    }
    public function test_Backstage_pass_items_after_sell_date(): void
    {
        $items = new Item("Backstage passes to a TAFKAL80ETC concert", -1, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, -2);
    }
    
    public function test_Conjured_items_before_the_sell_date(): void
    {
        $items = new Item("Conjured Mana Cake", 10, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 8);
        $this->assertEquals($items->sell_in, 9);
    }
    public function test_Conjured_items_at_zero_quality(): void
    {
        $items = new Item("Conjured Mana Cake", 10, 0);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, 9);
    }
    public function test_Conjured_items_on_the_sell_date(): void
    {
        $items = new Item("Conjured Mana Cake", 0, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 6);
        $this->assertEquals($items->sell_in, -1);
    }
    public function test_Conjured_items_on_the_sell_date_at_0_quality(): void
    {
        $items = new Item("Conjured Mana Cake", 0, 0);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, -1);
    }
    public function test_Conjured_items_after_the_sell_date(): void
    { 
        $items = new Item("Conjured Mana Cake", -10, 10);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 6);
        $this->assertEquals($items->sell_in, -11);
    }
    public function test_Conjured_items_after_the_sell_date_at_zero_quality(): void
    {
        $items = new Item("Conjured Mana Cake", -10, 0);
        $gildedRose = SetProductProcessingClass::setProcessingClass($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, -11);
    }
}
