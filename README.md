# GildedRose Kata - PHP Version



### Requirements
php: 7.3 or above

###Installation
composer install

### Tests
Just run phpunit to execute all the tests.
Or You can run - composer test

### Description
This is  PHP solution to Gilded Rose Refactoring Kata.

* Absctact Class BasicProduct was used for implementing updateQuality() method in all product classes.
* Factory Pattern was used to build Products (implementations of Items)
* Item class was injected as dependency.

### New Product
 If you want to introduce a new product, first create a class in src directory.

Good luck