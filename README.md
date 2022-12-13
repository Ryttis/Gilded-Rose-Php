# GildedRose Kata - PHP Version

### Requirements
php: 7.3 or above

### Installation - nera lietuvisko zodzio
composer install

### Tests
Just run phpunit to execute all the tests.
Or You can run - composer test

### Description
This is  PHP solution to Gilded Rose Refactoring Kata.

* Absctact Class BasicProduct was used for implementing updateQuality() method in all product classes.
* Factory Pattern was used to build Products (implementations of Items)
* Item class was injected as dependency.


### Product
* In all product classes implemented updateQuality() method - updates $sell_in and $quality properties values injected from Item class. 
* If you want to introduce a new product - simply create a product class in src directory and update protected static $lookup array in SetProductProcessingClass class - add product name with asocialted class name.

Good luck