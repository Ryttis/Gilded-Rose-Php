<?php

namespace GildedRose;

/**
 * Selecting different structures of loading  data
 *
 */

class Output
{
    protected $formatter = null;

    public function __construct($formatter)
    {
        $this->formatter = $formatter;
    }

    public function setStrategy($formatter)
    {
        $this->formatter = $formatter;
    }

    public function display($fileName)
    {
        return $this->formatter->loadProduct($fileName);
    }
    
}
