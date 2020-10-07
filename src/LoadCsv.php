<?php

namespace GildedRose;


/**
 * Class for commission calculation from transactions file 
 */
class LoadCsv

{
    public function loadProduct($fileName)
    {
        new ProcessProductsFromCsv($fileName);
    }
}
